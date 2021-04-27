-----------------------------------------
-- Drop old schema
-----------------------------------------
 
DROP TABLE IF EXISTS countries CASCADE;
DROP TABLE IF EXISTS images CASCADE;
DROP TABLE IF EXISTS developers CASCADE;
DROP TABLE IF EXISTS categories CASCADE;
DROP TABLE IF EXISTS tags CASCADE;
DROP TABLE IF EXISTS addresses CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS games CASCADE;
DROP TABLE IF EXISTS game_keys CASCADE;
DROP TABLE IF EXISTS game_image CASCADE;
DROP TABLE IF EXISTS game_tags CASCADE;
DROP TABLE IF EXISTS cart_items CASCADE;
DROP TABLE IF EXISTS wishlist_items CASCADE;
DROP TABLE IF EXISTS purchases CASCADE;
DROP TABLE IF EXISTS reviews CASCADE;
DROP TABLE IF EXISTS reports CASCADE;
 
DROP TYPE IF EXISTS PAYMENT_METHOD;
DROP TYPE IF EXISTS PURCHASE_STATUS;
DROP TYPE IF EXISTS REPORT_STATUS;
DROP TYPE IF EXISTS REPORT_TYPE;

DROP FUNCTION IF EXISTS update_game_score() CASCADE;
DROP FUNCTION IF EXISTS add_review() CASCADE;
DROP FUNCTION IF EXISTS check_review_repeats() CASCADE;
DROP FUNCTION IF EXISTS find_available_key() CASCADE;
DROP FUNCTION IF EXISTS remove_key_availability() CASCADE;
DROP FUNCTION IF EXISTS remove_cart_product() CASCADE;
DROP FUNCTION IF EXISTS remove_wishlist_product() CASCADE;
DROP FUNCTION IF EXISTS update_deleted_user_reviews() CASCADE;
 
DROP TRIGGER IF EXISTS update_score ON games;
DROP TRIGGER IF EXISTS add_review ON reviews;
DROP TRIGGER IF EXISTS check_review_repeats ON reviews;
DROP TRIGGER IF EXISTS make_purchase ON purchases;
DROP TRIGGER IF EXISTS remove_availability ON purchases;
DROP TRIGGER IF EXISTS remove_cart_product ON purchases;
DROP TRIGGER IF EXISTS remove_wishlist_product ON purchases;
DROP TRIGGER IF EXISTS update_review_on_user_delete ON users;
 
-----------------------------------------
-- Types
-----------------------------------------
 
CREATE TYPE PAYMENT_METHOD AS ENUM ('PayPal', 'MB', 'BankTransfer');
CREATE TYPE PURCHASE_STATUS AS ENUM ('Aborted', 'Pending', 'Completed');
CREATE TYPE REPORT_STATUS AS ENUM ('Open', 'In Progress', 'Closed');
CREATE TYPE REPORT_TYPE AS ENUM ('Bug', 'Review');
 
-----------------------------------------
-- Tables
-----------------------------------------
 
CREATE TABLE countries (
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL CONSTRAINT countries_name_uk UNIQUE
);

CREATE TABLE images (
    id SERIAL PRIMARY KEY,
    path TEXT NULL CONSTRAINT images_path_uk UNIQUE
);

CREATE TABLE developers(
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL CONSTRAINT name_developer_uk UNIQUE
);

CREATE TABLE categories(
    id SERIAL PRIMARY KEY, 
    name TEXT NOT NULL CONSTRAINT name_category_uk UNIQUE
);


CREATE TABLE tags(
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL CONSTRAINT name_tag_uk UNIQUE
);

CREATE TABLE addresses (
    id SERIAL PRIMARY KEY,
    line1 TEXT NOT NULL,
    line2 TEXT,
    postal_code TEXT NOT NULL,
    city TEXT NOT NULL,
    region TEXT NOT NULL,
    country_id INTEGER REFERENCES countries (id)
);
 
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email TEXT NOT NULL CONSTRAINT user_email_uk UNIQUE,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL,
    username TEXT NOT NULL CONSTRAINT user_username_uk UNIQUE,
    password TEXT NOT NULL,
    nif TEXT,
    banned BOOLEAN NOT NULL DEFAULT false,
    restricted BOOLEAN NOT NULL DEFAULT false,
    is_admin BOOLEAN NOT NULL DEFAULT false,
    avatar_id INTEGER REFERENCES images (id),
    addresses_id INTEGER REFERENCES addresses (id)
);

CREATE TABLE games(
    id SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    score DECIMAL CONSTRAINT score_ck CHECK (score > 0 and score < 6),
    launch_date DATE,
    listed BOOLEAN NOT NULL DEFAULT true,
    parent_id INTEGER REFERENCES games (id),
    developer_id INTEGER NOT NULL REFERENCES developers (id),
    category_id INTEGER NOT NULL REFERENCES categories (id)
);

CREATE TABLE game_keys (
    id SERIAL PRIMARY KEY,
    key TEXT NOT NULL CONSTRAINT _uk UNIQUE,
    available BOOLEAN NOT NULL DEFAULT true,
    game_id INTEGER NOT NULL REFERENCES games(id)
);

CREATE TABLE game_image (
    image_id INTEGER PRIMARY KEY REFERENCES images(id),
    game_id INTEGER REFERENCES games(id)
);

CREATE TABLE game_tags(
    tag_id INTEGER NOT NULL REFERENCES tags (id),
    game_id INTEGER NOT NULL REFERENCES games (id),
    PRIMARY KEY(tag_id, game_id)
);

CREATE TABLE cart_items(
    game_id INTEGER NOT NULL REFERENCES games (id),
    user_id INTEGER NOT NUll REFERENCES users (id),
   PRIMARY KEY(game_id, user_id)
);

CREATE TABLE wishlist_items(
    game_id INTEGER NOT NULL REFERENCES games (id),
    user_id INTEGER NOT NUll REFERENCES users (id),
    PRIMARY KEY(game_id, user_id)
);

CREATE TABLE purchases(
    id SERIAL PRIMARY KEY,
    "timestamp" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    price DECIMAL NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    status PURCHASE_STATUS NOT NULL DEFAULT 'Pending',
    method PAYMENT_METHOD NOT NULL,
    key_id INTEGER NOT NULL REFERENCES game_keys (id),
    buyer_id INTEGER NOT NULL REFERENCES users (id)
);

CREATE TABLE reviews(
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    publication_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    score INTEGER CONSTRAINT score_ck CHECK (score > 0 AND score < 6),
    reviewer_id INTEGER NOT NULL REFERENCES users (id),
    game_id INTEGER NOT NULL REFERENCES games (id)
);

CREATE TABLE reports(
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    r_type REPORT_TYPE NOT NULL DEFAULT 'Bug',
    submission_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    r_status REPORT_STATUS NOT NULL DEFAULT 'Open',
    reporter_id INTEGER NOT NULL REFERENCES users (id),
    admin_id INTEGER REFERENCES users (id), --Tem que ter constraint a verificar se user é admin
    review_id INTEGER REFERENCES reviews (id) CONSTRAINT review_id_ck
    CHECK ((r_type='Review' AND review_id is NOT NULL) OR r_type='Bug')
);
 
-----------------------------------------
-- INDEXES
-----------------------------------------
 
CREATE INDEX review_game_id_idx ON reviews USING hash (game_id); 

CREATE INDEX image_game_id_idx ON game_image USING hash (game_id); 
 
CREATE INDEX purchase_id_idx ON purchases USING hash (buyer_id); 
 
CREATE INDEX game_category_id_idx ON games USING hash (category_id); 
 
CREATE INDEX cart_items_user_id_idx ON cart_items USING hash (user_id); 
 
CREATE INDEX withlist_items_user_id_idx ON wishlist_items USING hash (user_id); 
 
-----------------------------------------
-- TRIGGERS and UDFs
-----------------------------------------
 
CREATE FUNCTION update_game_score() RETURNS TRIGGER AS 
$BODY$
BEGIN 
    WITH score_avg AS (
        SELECT AVG(score)::numeric(1) as avg
        FROM reviews
        WHERE game_id=New.game_id 
    )

    UPDATE games
    SET score = score_avg.avg
    FROM score_avg;
    RETURN NULL;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER update_score 
    AFTER INSERT OR UPDATE OR DELETE ON reviews
    EXECUTE PROCEDURE update_game_score();  
 

CREATE FUNCTION add_review() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF NOT EXISTS (SELECT game_keys.game_id
                    FROM purchases
                    JOIN game_keys ON purchases.key_id = game_keys.id
                    WHERE purchases.buyer_id = New.reviewer_id
                    AND game_keys.game_id = New.game_id)
                THEN
    RAISE EXCEPTION 'You can not review a game you do not own.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_review
    BEFORE INSERT ON reviews
    FOR EACH ROW
    EXECUTE PROCEDURE add_review();


CREATE FUNCTION check_review_repeats() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT id 
                FROM reviews
                WHERE game_id=New.game_id AND reviewer_id=New.game_id) THEN
    RAISE EXCEPTION 'You can only review a game once.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER check_review_repeats
    BEFORE INSERT ON reviews
    FOR EACH ROW
    EXECUTE PROCEDURE check_review_repeats();
 

CREATE FUNCTION find_available_key() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF NOT EXISTS (SELECT game_keys.id
                    FROM game_keys
                    WHERE game_keys.id = New.key_id AND game_keys.available=TRUE) THEN
    RAISE EXCEPTION 'This key is not available for purchase.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER make_purchase
    BEFORE INSERT ON purchases
    FOR EACH ROW
    EXECUTE PROCEDURE find_available_key();


CREATE FUNCTION remove_key_availability() RETURNS TRIGGER AS
$BODY$
BEGIN
    UPDATE game_keys
    SET available=FALSE
    WHERE id=New.key_id;
    RETURN NULL;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER remove_availability
    AFTER INSERT ON purchases
    FOR EACH ROW
    EXECUTE PROCEDURE remove_key_availability();


CREATE FUNCTION remove_cart_product() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT id FROM game_keys WHERE id=New.key_id) THEN
    DELETE FROM cart_items
    WHERE cart_items.user_id=New.buyer_id AND game_id=Key.game_id;
    END IF;
    RETURN NULL;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER remove_cart_product 
    AFTER INSERT ON purchases
    EXECUTE PROCEDURE remove_cart_product();


CREATE FUNCTION remove_wishlist_product() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT id FROM game_keys WHERE id=New.key_id) THEN
    DELETE FROM wishlist_items
    WHERE user_id=New.buyer_id AND game_id=Key.game_id;
    END IF;
    RETURN NULL;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER remove_wishlist_product 
    AFTER INSERT ON purchases
    EXECUTE PROCEDURE remove_wishlist_product();


CREATE FUNCTION update_deleted_user_reviews() RETURNS TRIGGER AS
$BODY$
BEGIN
    DELETE FROM reviews
    WHERE reviews.reviewer_id=New.id;
    RETURN NULL;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER update_review_on_user_delete
    AFTER DELETE ON users
    FOR EACH ROW
    EXECUTE PROCEDURE update_deleted_user_reviews();

-----------------------------------------
-- end
-----------------------------------------

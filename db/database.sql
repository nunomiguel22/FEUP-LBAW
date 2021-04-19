-----------------------------------------
-- Drop old schmema
-----------------------------------------
 
DROP TABLE IF EXISTS country CASCADE;
DROP TABLE IF EXISTS photo CASCADE;
DROP TABLE IF EXISTS developer CASCADE;
DROP TABLE IF EXISTS category CASCADE;
DROP TABLE IF EXISTS tag CASCADE;
DROP TABLE IF EXISTS addresses CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;
DROP TABLE IF EXISTS game CASCADE;
DROP TABLE IF EXISTS game_key CASCADE;
DROP TABLE IF EXISTS game_image CASCADE;
DROP TABLE IF EXISTS game_tag CASCADE;
DROP TABLE IF EXISTS in_cart CASCADE;
DROP TABLE IF EXISTS in_wishlist CASCADE;
DROP TABLE IF EXISTS purchase CASCADE;
DROP TABLE IF EXISTS review CASCADE;
DROP TABLE IF EXISTS report CASCADE;
 
DROP TYPE IF EXISTS PAYMENT_METHOD;
DROP TYPE IF EXISTS PURCHASE_STATUS;
DROP TYPE IF EXISTS REPORT_STATUS;
DROP TYPE IF EXISTS REPORT_TYPE;

DROP FUNCTION IF EXISTS update_game_score() CASCADE;
DROP FUNCTION IF EXISTS add_review() CASCADE;
DROP FUNCTION IF EXISTS find_available_key() CASCADE;
DROP FUNCTION IF EXISTS remove_cart_product() CASCADE;
DROP FUNCTION IF EXISTS remove_wishlist_product() CASCADE;
DROP FUNCTION IF EXISTS update_deleted_user_reviews() CASCADE;
 
DROP TRIGGER IF EXISTS update_score ON products;
DROP TRIGGER IF EXISTS add_review ON review;
DROP TRIGGER IF EXISTS make_purchase ON purchase;
DROP TRIGGER IF EXISTS remove_cart_product ON purchase;
DROP TRIGGER IF EXISTS remove_wishlist_product ON purchase;
DROP TRIGGER IF EXISTS update_review_on_user_delete ON "user";
 
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
 
CREATE TABLE country (
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL CONSTRAINT country_name_uk UNIQUE
);

CREATE TABLE photo (
    id SERIAL PRIMARY KEY,
    path TEXT NULL CONSTRAINT photo_path_uk UNIQUE
);

CREATE TABLE developer(
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL CONSTRAINT name_developer_uk UNIQUE
);

CREATE TABLE category(
    id SERIAL PRIMARY KEY, 
    name TEXT NOT NULL CONSTRAINT name_category_uk UNIQUE
);


CREATE TABLE tag(
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
    country_id INTEGER REFERENCES country (id)
);
 
CREATE TABLE "user" (
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
    avatar_id INTEGER REFERENCES photo (id),
    addresses_id INTEGER REFERENCES addresses (id)
);

CREATE TABLE game(
    id SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    price DOUBLE NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    score DOUBLE CONSTRAINT score_ck CHECK (score > 0 and score < 6),
    launch_date DATE,
    listed BOOLEAN NOT NULL DEFAULT true,
    parent_id INTEGER REFERENCES game (id),
    dev_id INTEGER NOT NULL REFERENCES developer (id),
    category_id INTEGER NOT NULL REFERENCES category (id)
);

CREATE TABLE game_key(
    id SERIAL PRIMARY KEY,
    key TEXT NOT NULL CONSTRAINT game_key_uk UNIQUE,
    available BOOLEAN NOT NULL DEFAULT true,
    game_id INTEGER NOT NULL REFERENCES game(id)
);

CREATE TABLE game_image (
    photo_id INTEGER PRIMARY KEY REFERENCES photo(id),
    game_id INTEGER REFERENCES game(id)
);

CREATE TABLE game_tag(
    tag_id INTEGER NOT NULL REFERENCES tag (id),
    game_id INTEGER NOT NULL REFERENCES game (id),
    PRIMARY_KEY(tag_id, game_id)
);

CREATE TABLE in_cart(
    game_id INTEGER NOT NULL REFERENCES game (id),
    user_id INTEGER NOT NUll REFERENCES "user" (id),
    PRIMARY_KEY(game_id, user_id)
);

CREATE TABLE in_wishlist(
    game_id INTEGER NOT NULL REFERENCES game (id),
    user_id INTEGER NOT NUll REFERENCES "user" (id),
    PRIMARY_KEY(game_id, user_id)
);

CREATE TABLE purchase(
    id SERIAL PRIMARY KEY,
    "timestamp" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    price DOUBLE NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    status PURCHASE_STATUS NOT NULL DEFAULT 'Pending',
    method PAYMENT_METHOD NOT NULL,
    key_id INTEGER NOT NULL REFERENCES game_key (id),
    buyer_id INTEGER NOT NULL REFERENCES "user" (id)
);

CREATE TABLE review(
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    publication_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    score INTEGER CONSTRAINT score_ck CHECK (score > 0 AND score < 6),
    reviewer_id INTEGER NOT NULL REFERENCES "user" (id),
    game_id INTEGER NOT NULL REFERENCES game (id)
);

CREATE TABLE report(
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    r_type REPORT_TYPE NOT NULL DEFAULT 'Bug',
    submission_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    r_status REPORT_STATUS NOT NULL DEFAULT 'Open',
    reporter_id INTEGER NOT NULL REFERENCES "user" (id),
    admin_id INTEGER REFERENCES "user" (id), --Tem que ter constraint a verificar se user é admin
    review_id INTEGER REFERENCES review (id) CONSTRAINT review_id_ck
    CHECK ((r_type='Review' AND review_id is NOT NULL) OR r_type='Bug')
);
 
-----------------------------------------
-- INDEXES
-----------------------------------------
 
CREATE INDEX review_game_id_idx ON review USING hash (game_id); 

CREATE INDEX game_image_game_id_idx ON game_image USING hash (game_id); 
 
CREATE INDEX purchase_id_idx ON purchase USING hash (buyer_id); 
 
CREATE INDEX game_category_id_idx ON game USING hash (category_id); 
 
CREATE INDEX in_cart_user_id_idx ON in_cart USING hash (user_id); 
 
CREATE INDEX in_wishlist_user_id_idx ON in_wishlist USING hash (user_id); 
 
-----------------------------------------
-- TRIGGERS and UDFs
-----------------------------------------
 
CREATE FUNCTION update_game_score() RETURN TRIGGER 
AS 
$BODY$
BEGIN 
    UPDATE products
    SET score = (AVG(score) FROM reviews WHERE game_id=New.game_id)
    WHERE game_id=New.game_id
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER update_score 
AFTER INSERT OR UPDATE OR DELETE ON review
EXECUTE PROCEDURE update_game_score();  
 
CREATE FUNCTION add_review() RETURN TRIGGER 
AS
$BODY$
BEGIN
    IF NOT EXISTS (SELECT Key.game_id
                    FROM purchase AS Purchase, game_key AS Key, "user" as User
                    WHERE Purchase.key_id=Key.id AND Key.game_id=New.game_id
                    AND New.user_id=Purchase.user_id AND User.id = *LOGGED_USER_ID*) THEN
    RAISE EXCEPTION 'You can not review a game you do not own.';
    END IF 
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER add_review
BEFORE INSERT ON review
FOR EACH ROW
EXECUTE PROCEDURE add_review();

CREATE FUNCTION check_review_repeats() RETURN TRIGGER 
AS
$BODY$
BEGIN
    IF EXISTS (SELECT id 
                FROM review
                WHERE game_id=New.game_id AND user_id=New.game_id) THEN
    RAISE EXCEPTION 'You can only review a game once.';
    END IF
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER check_review_repeats
BEFORE INSERT ON review
FOR EACH ROW
EXECUTE PROCEDURE check_review_repeats();
 
CREATE FUNCTION find_available_key() RETURN TRIGGER 
AS
$BODY$
BEGIN
    IF NOT EXISTS (SELECT Key.available
                    FROM game_key AS Key, game AS Game
                    WHERE Game.id=Key.game_id AND Key.available=TRUE AND Game.id=*CURRENT_GAME_ID*) THEN
    RAISE EXCEPTION 'There are no available keys for the game you are trying to purchase.';
    END IF
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER make_purchase
BEFORE INSERT ON purchase
FOR EACH ROW
EXECUTE PROCEDURE find_available_key();

CREATE FUNCTION remove_cart_product() RETURNS TRIGGER 
AS
$BODY$
BEGIN
    SELECT FROM game_key AS Key WHERE id=New.key_id
	
    DELETE FROM in_cart
    WHERE user_id=New.buyer_id AND game_id=Key.game_id
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER remove_cart_product 
AFTER INSERT ON purchase
EXECUTE PROCEDURE remove_cart_product();

CREATE FUNCTION remove_wishlist_product() RETURNS TRIGGER 
AS
$BODY$
BEGIN
    SELECT FROM game_key AS Key WHERE id=New.key_id
	
    DELETE FROM in_wishlist
    WHERE user_id=New.buyer_id AND game_id=Key.game_id
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER remove_wishlist_product 
AFTER INSERT ON purchase
EXECUTE PROCEDURE remove_wishlist_product();

CREATE FUNCTION update_deleted_user_reviews() RETURNS TRIGGER 
AS
$BODY$
BEGIN
    UPDATE review
    SET user_id=*DELETED_USER_ID*
    WHERE user_id=New.id
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER update_review_on_user_delete
AFTER DELETE ON "user"
FOR EACH ROW
EXECUTE PROCEDURE update_deleted_user_reviews();

-----------------------------------------
-- end
-----------------------------------------

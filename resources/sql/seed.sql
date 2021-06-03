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
DROP TABLE IF EXISTS game_tag CASCADE;
DROP TABLE IF EXISTS cart_items CASCADE;
DROP TABLE IF EXISTS wishlist_items CASCADE;
DROP TABLE IF EXISTS purchases CASCADE;
DROP TABLE IF EXISTS reviews CASCADE;
DROP TABLE IF EXISTS reports CASCADE;
DROP TABLE IF EXISTS password_resets CASCADE;
 
DROP TYPE IF EXISTS PAYMENT_METHOD;
DROP TYPE IF EXISTS PURCHASE_STATUS;
DROP TYPE IF EXISTS REPORT_STATUS;
DROP TYPE IF EXISTS REPORT_TYPE;

DROP MATERIALIZED VIEW IF EXISTS game_search;

DROP FUNCTION IF EXISTS update_game_score() CASCADE;
DROP FUNCTION IF EXISTS add_review() CASCADE;
DROP FUNCTION IF EXISTS make_purchase() CASCADE;
DROP FUNCTION IF EXISTS restore_key_availability() CASCADE;
DROP FUNCTION IF EXISTS update_deleted_user_reviews() CASCADE;

DROP TRIGGER IF EXISTS update_score ON games;
DROP TRIGGER IF EXISTS add_review ON reviews;
DROP TRIGGER IF EXISTS make_purchase ON purchases;
DROP TRIGGER IF EXISTS restore_key_availability ON purchases;
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
    image_id INTEGER DEFAULT 1 REFERENCES images (id),
    addresses_id INTEGER REFERENCES addresses (id)  ON DELETE CASCADE,
    "description" TEXT DEFAULT 'No description yet',
    remember_token TEXT,
    email_verified_at TIMESTAMP
);

CREATE TABLE games(
    id SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    score DECIMAL CONSTRAINT score_ck CHECK (score > 0 and score < 6) DEFAULT 3,
    launch_date DATE,
    listed BOOLEAN NOT NULL DEFAULT true,
    parent_id INTEGER REFERENCES games (id),
    developer_id INTEGER NOT NULL REFERENCES developers (id),
    category_id INTEGER NOT NULL REFERENCES categories (id)
);

CREATE TABLE game_keys (
    id SERIAL PRIMARY KEY,
    "key" TEXT NOT NULL CONSTRAINT gamekeys_key_uk UNIQUE,
    available BOOLEAN NOT NULL DEFAULT true,
    game_id INTEGER NOT NULL REFERENCES games(id)
);

CREATE TABLE game_image (
    image_id INTEGER PRIMARY KEY REFERENCES images(id) ON DELETE CASCADE,
    game_id INTEGER REFERENCES games(id)
);

CREATE TABLE game_tag(
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
    "timestamp" TIMESTAMP(0) WITH TIME zone DEFAULT now()::timestamp(0) NOT NULL,
    price DECIMAL NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    "status" PURCHASE_STATUS NOT NULL DEFAULT 'Pending',
    "method" PAYMENT_METHOD NOT NULL,
    payment_uuid TEXT NOT NULL,
    game_key_id INTEGER NOT NULL REFERENCES game_keys (id),
    user_id INTEGER NOT NULL REFERENCES users (id)
);

CREATE TABLE reviews(
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    publication_date TIMESTAMP(0) WITH TIME zone DEFAULT now()::timestamp(0) NOT NULL,
    score INTEGER CONSTRAINT score_ck CHECK (score > 0 AND score < 6),
    user_id INTEGER NOT NULL REFERENCES users (id),
    game_id INTEGER NOT NULL REFERENCES games (id),
    UNIQUE (user_id, game_id)
);

CREATE TABLE reports(
    id SERIAL PRIMARY KEY,
    description TEXT NOT NULL,
    r_type REPORT_TYPE NOT NULL DEFAULT 'Bug',
    submission_date TIMESTAMP(0) WITH TIME zone DEFAULT now()::timestamp(0) NOT NULL,
    r_status REPORT_STATUS NOT NULL DEFAULT 'Open',
    reporter_id INTEGER NOT NULL REFERENCES users (id),
    admin_id INTEGER REFERENCES users (id), --Tem que ter constraint a verificar se user é admin
    review_id INTEGER REFERENCES reviews (id) CONSTRAINT review_id_ck
    CHECK ((r_type='Review' AND review_id is NOT NULL) OR r_type='Bug')
);

CREATE TABLE password_resets (
    email TEXT,
    token TEXT,
    created_at TIMESTAMP
);

-----------------------------------------
-- VIEWS
-----------------------------------------

CREATE MATERIALIZED VIEW game_search AS
SELECT games.id as game_id,
setweight(to_tsvector('simple', games.title), 'A') || 
setweight(to_tsvector('english', games.description),'B') ||
setweight(to_tsvector('simple', developers.name), 'B') ||
setweight(to_tsvector('simple', coalesce(string_agg(tags.name, ' '), '')), 'C') as "search"
FROM games
JOIN developers ON (developers.id = games.developer_id)
LEFT JOIN game_tag ON (game_tag.game_id = games.id)
LEFT JOIN tags ON (game_tag.tag_id = tags.id)
GROUP BY games.id, developers.name;

 
-----------------------------------------
-- INDEXES
-----------------------------------------
 
CREATE INDEX review_game_id_idx ON reviews USING hash (game_id); 

CREATE INDEX image_game_id_idx ON game_image USING hash (game_id); 
 
CREATE INDEX purchase_id_idx ON purchases USING hash (user_id); 
 
CREATE INDEX game_category_id_idx ON games USING hash (category_id); 
 
CREATE INDEX cart_items_user_id_idx ON cart_items USING hash (user_id); 
 
CREATE INDEX withlist_items_user_id_idx ON wishlist_items USING hash (user_id); 

CREATE INDEX game_search_idx ON game_search USING gin(search);


 
-----------------------------------------
-- TRIGGERS and UDFs
-----------------------------------------


 
CREATE FUNCTION update_game_score() RETURNS TRIGGER AS 
$BODY$
BEGIN 
    WITH score_avg AS (
        SELECT AVG(score)::numeric(1) as avg
        FROM reviews
        WHERE reviews.game_id=New.game_id 
    )

    UPDATE games
    SET score = score_avg.avg
    FROM score_avg
    WHERE games.id=New.game_id; 
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER update_score 
    AFTER INSERT OR UPDATE OR DELETE ON reviews
    FOR EACH ROW
    EXECUTE PROCEDURE update_game_score();  
 

CREATE FUNCTION add_review() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF NOT EXISTS (SELECT game_keys.game_id
                    FROM purchases
                    JOIN game_keys ON purchases.game_key_id = game_keys.id
                    WHERE purchases.user_id = New.user_id
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
 

CREATE FUNCTION make_purchase() RETURNS TRIGGER AS
$BODY$
DECLARE
    game_key RECORD;
BEGIN
    SELECT INTO game_key * FROM game_keys WHERE (id = NEW.game_key_id);

    IF game_key.available=false THEN
        RAISE EXCEPTION 'This key is not available for purchase.';
    END IF;

    DELETE FROM cart_items
    WHERE (cart_items.user_id=New.user_id AND game_id= game_key.game_id);

    UPDATE game_keys
    SET available=false
    WHERE game_keys.id=game_key.id;
     
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER make_purchase
    BEFORE INSERT ON purchases
    FOR EACH ROW
    EXECUTE PROCEDURE make_purchase();


CREATE FUNCTION restore_key_availability() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF (NEW.status = 'Aborted') THEN
        UPDATE game_keys
        SET available=true
        WHERE id=New.game_key_id;
    END IF;
    RETURN NULL;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER restore_key_availability
    AFTER UPDATE ON purchases
    FOR EACH ROW
    EXECUTE PROCEDURE restore_key_availability();


CREATE FUNCTION update_deleted_user_reviews() RETURNS TRIGGER AS
$BODY$
BEGIN
    DELETE FROM reports WHERE reports.review_id=New.id;

    DELETE FROM reviews
    WHERE reviews.user_id=New.id;
    RETURN NULL;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER update_review_on_user_delete
    AFTER DELETE ON users
    FOR EACH ROW
    EXECUTE PROCEDURE update_deleted_user_reviews();


DROP FUNCTION IF EXISTS game_update() CASCADE;
DROP TRIGGER IF EXISTS game_update ON games;
CREATE OR REPLACE FUNCTION game_update() RETURNS TRIGGER AS $$
BEGIN
  REFRESH MATERIALIZED VIEW game_search;
  RETURN NEW;
END
$$ LANGUAGE 'plpgsql';


CREATE TRIGGER game_update
    AFTER INSERT OR UPDATE ON games
    FOR EACH ROW
    EXECUTE PROCEDURE game_update();

DROP FUNCTION IF EXISTS game_tag_update() CASCADE;
DROP TRIGGER IF EXISTS game_tag_update ON games;
CREATE OR REPLACE FUNCTION game_tag_update() RETURNS TRIGGER AS $$
BEGIN
  REFRESH MATERIALIZED VIEW game_search;
  RETURN NEW;
END
$$ LANGUAGE 'plpgsql';


CREATE TRIGGER game_tag_update
    AFTER INSERT OR DELETE ON game_tag
    FOR EACH ROW
    EXECUTE PROCEDURE game_tag_update();




-----------------------------------------
-- end
-----------------------------------------



-----------------------------------------
-- Populate the database
-----------------------------------------

INSERT INTO countries(name) VALUES 
('Afghanistan')
,('Aland Islands')
,('Albania')
,('Algeria')
,('American Samoa')
,('Andorra')
,('Angola')
,('Anguilla')
,('Antarctica')
,('Antigua and Barbuda')
,('Argentina')
,('Armenia')
,('Aruba')
,('Australia')
,('Austria')
,('Azerbaijan')
,('Bahamas')
,('Bahrain')
,('Bangladesh')
,('Barbados')
,('Belarus')
,('Belgium')
,('Belize')
,('Benin')
,('Bermuda')
,('Bhutan')
,('Bolivia')
,('Bonaire, Sint Eustatius and Saba')
,('Bosnia and Herzegovina')
,('Botswana')
,('Bouvet Island')
,('Brazil')
,('British Indian Ocean Territory')
,('Brunei')
,('Bulgaria')
,('Burkina Faso')
,('Burundi')
,('Cambodia')
,('Cameroon')
,('Canada')
,('Cape Verde')
,('Cayman Islands')
,('Central African Republic')
,('Chad')
,('Chile')
,('China')
,('Christmas Island')
,('Cocos (Keeling) Islands')
,('Colombia')
,('Comoros')
,('Congo')
,('Cook Islands')
,('Costa Rica')
,('Ivory Coast')
,('Croatia')
,('Cuba')
,('Curacao')
,('Cyprus')
,('Czech Republic')
,('Democratic Republic of the Congo')
,('Denmark')
,('Djibouti')
,('Dominica')
,('Dominican Republic')
,('Ecuador')
,('Egypt')
,('El Salvador')
,('Equatorial Guinea')
,('Eritrea')
,('Estonia')
,('Ethiopia')
,('Falkland Islands (Malvinas)')
,('Faroe Islands')
,('Fiji')
,('Finland')
,('France')
,('French Guiana')
,('French Polynesia')
,('French Southern Territories')
,('Gabon')
,('Gambia')
,('Georgia')
,('Germany')
,('Ghana')
,('Gibraltar')
,('Greece')
,('Greenland')
,('Grenada')
,('Guadaloupe')
,('Guam')
,('Guatemala')
,('Guernsey')
,('Guinea')
,('Guinea-Bissau')
,('Guyana')
,('Haiti')
,('Heard Island and McDonald Islands')
,('Honduras')
,('Hong Kong')
,('Hungary')
,('Iceland')
,('India')
,('Indonesia')
,('Iran')
,('Iraq')
,('Ireland')
,('Isle of Man')
,('Israel')
,('Italy')
,('Jamaica')
,('Japan')
,('Jersey')
,('Jordan')
,('Kazakhstan')
,('Kenya')
,('Kiribati')
,('Kosovo')
,('Kuwait')
,('Kyrgyzstan')
,('Laos')
,('Latvia')
,('Lebanon')
,('Lesotho')
,('Liberia')
,('Libya')
,('Liechtenstein')
,('Lithuania')
,('Luxembourg')
,('Macao')
,('Macedonia')
,('Madagascar')
,('Malawi')
,('Malaysia')
,('Maldives')
,('Mali')
,('Malta')
,('Marshall Islands')
,('Martinique')
,('Mauritania')
,('Mauritius')
,('Mayotte')
,('Mexico')
,('Micronesia')
,('Moldava')
,('Monaco')
,('Mongolia')
,('Montenegro')
,('Montserrat')
,('Morocco')
,('Mozambique')
,('Myanmar (Burma)')
,('Namibia')
,('Nauru')
,('Nepal')
,('Netherlands')
,('New Caledonia')
,('New Zealand')
,('Nicaragua')
,('Niger')
,('Nigeria')
,('Niue')
,('Norfolk Island')
,('North Korea')
,('Northern Mariana Islands')
,('Norway')
,('Oman')
,('Pakistan')
,('Palau')
,('Palestine')
,('Panama')
,('Papua New Guinea')
,('Paraguay')
,('Peru')
,('Phillipines')
,('Pitcairn')
,('Poland')
,('Portugal')
,('Puerto Rico')
,('Qatar')
,('Reunion')
,('Romania')
,('Russia')
,('Rwanda')
,('Saint Barthelemy')
,('Saint Helena')
,('Saint Kitts and Nevis')
,('Saint Lucia')
,('Saint Martin')
,('Saint Pierre and Miquelon')
,('Saint Vincent and the Grenadines')
,('Samoa')
,('San Marino')
,('Sao Tome and Principe')
,('Saudi Arabia')
,('Senegal')
,('Serbia')
,('Seychelles')
,('Sierra Leone')
,('Singapore')
,('Sint Maarten')
,('Slovakia')
,('Slovenia')
,('Solomon Islands')
,('Somalia')
,('South Africa')
,('South Georgia and the South Sandwich Islands')
,('South Korea')
,('South Sudan')
,('Spain')
,('Sri Lanka')
,('Sudan')
,('Suriname')
,('Svalbard and Jan Mayen')
,('Swaziland')
,('Sweden')
,('Switzerland')
,('Syria')
,('Taiwan')
,('Tajikistan')
,('Tanzania')
,('Thailand')
,('Timor-Leste (East Timor)')
,('Togo')
,('Tokelau')
,('Tonga')
,('Trinidad and Tobago')
,('Tunisia')
,('Turkey')
,('Turkmenistan')
,('Turks and Caicos Islands')
,('Tuvalu')
,('Uganda')
,('Ukraine')
,('United Arab Emirates')
,('United Kingdom')
,('United States')
,('United States Minor Outlying Islands')
,('Uruguay')
,('Uzbekistan')
,('Vanuatu')
,('Vatican City')
,('Venezuela')
,('Vietnam')
,('Virgin Islands, British')
,('Virgin Islands, US')
,('Wallis and Futuna')
,('Western Sahara')
,('Yemen');


INSERT INTO images(path) VALUES ('images/logo/facebook_profile_image.png');
INSERT INTO images(path) VALUES ('images/games/BL3.jpg');
INSERT INTO images(path) VALUES ('images/games/Control.jpg');
INSERT INTO images(path) VALUES ('images/games/CP2077.jpg');
INSERT INTO images(path) VALUES ('images/games/CP2077C1.jpg');
INSERT INTO images(path) VALUES ('images/games/CP2077C2.jpg');
INSERT INTO images(path) VALUES ('images/games/CSGO.jpg');
INSERT INTO images(path) VALUES ('images/games/GR.jpg');
INSERT INTO images(path) VALUES ('images/games/GTAV.jpg');
INSERT INTO images(path) VALUES ('images/games/h3.jpg');
INSERT INTO images(path) VALUES ('images/games/MW3.jpg');
INSERT INTO images(path) VALUES ('images/games/Outriders.jpg');

INSERT INTO addresses(line1, postal_code, city, region, country_id) VALUES ('Rua Dr. Roberto Frias', '4200-465', 'Porto', 'Porto', 177);

INSERT INTO users(email, first_name, last_name, username, password, is_admin, image_id, addresses_id) VALUES('lbaw@lbaw.pt', 'PNome', 'LNome', 'lbaw', '$2y$10$REP/9v3A7pr477Lne7ttKOBVKJuWrkvsSihNIkYGePO6rLgWehUCu', true, 1, 1);
INSERT INTO users(email, first_name, last_name, username, password, is_admin, image_id, addresses_id) VALUES('lbaw2@lbaw.pt', 'PNome', 'LNome', 'lbaw_normal', '$2y$10$REP/9v3A7pr477Lne7ttKOBVKJuWrkvsSihNIkYGePO6rLgWehUCu', false, 1, 1);
INSERT INTO users(email, first_name, last_name, username, password, banned, is_admin, image_id, addresses_id) VALUES('banned@email.com', 'sdf', 'asd', 'banned_user', '$2y$10$REP/9v3A7pr477Lne7ttKOBVKJuWrkvsSihNIkYGePO6rLgWehUCu', true, false, 1, 1);

INSERT INTO developers(name) VALUES ('CDProjekt Red');
INSERT INTO developers(name) VALUES ('Rockstar North');
INSERT INTO developers(name) VALUES ('2k');
INSERT INTO developers(name) VALUES ('Valve');
INSERT INTO developers(name) VALUES ('One More Level');
INSERT INTO developers(name) VALUES ('IO Interactive');
INSERT INTO developers(name) VALUES ('Infinity Ward');
INSERT INTO developers(name) VALUES ('Square Enix');
INSERT INTO developers(name) VALUES ('Remedy Entertainment');


INSERT INTO categories(name) VALUES ('Action');
INSERT INTO categories(name) VALUES ('Adventure');
INSERT INTO categories(name) VALUES ('Role-Playing');
INSERT INTO categories(name) VALUES ('Simulation');
INSERT INTO categories(name) VALUES ('Strategy');
INSERT INTO categories(name) VALUES ('Sports and Racing');

INSERT INTO tags(name) VALUES ('Action-RPG');
INSERT INTO tags(name) VALUES ('Fighting');
INSERT INTO tags(name) VALUES ('Puzzle');
INSERT INTO tags(name) VALUES ('Sci-Fi');
INSERT INTO tags(name) VALUES ('Real-time Strategy');
INSERT INTO tags(name) VALUES ('Racing');
INSERT INTO tags(name) VALUES ('JRPG');
INSERT INTO tags(name) VALUES ('First-Person Shooter');
INSERT INTO tags(name) VALUES ('Third-Person Shooter');
INSERT INTO tags(name) VALUES ('Casual');
INSERT INTO tags(name) VALUES ('Platformer');

INSERT INTO games(title,description,price,launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Cyberpunk 2077', 
            'Cyberpunk 2077 is an open-world, action-adventure story set in Night City, a megalopolis obsessed with
            power, glamour and body modification. You play as V, a mercenary outlaw going after a one-of-a-kind implant
            that is the key to immortality. You can customize your character’s cyberware,
            skillset and playstyle, and explore a vast city where the choices you make shape the story and the world
            around you.', 59.99, '2020-12-20'::date, true, null, 1, 1);

INSERT INTO games(title,description,price,launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Borderlands 3', 
            'The original shooter-looter returns, packing bazillions of guns and a mayhem-fueled adventure! 
            Blast through new worlds and enemies as one of four new Vault Hunters.', 
            59.99, '2020-03-13'::date, true, null, 3, 1);

INSERT INTO games(title,description,price,launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Control', 
            'Winner of over 80 awards, Control is a visually stunning third-person action-adventure that will keep you on the edge of your seat.', 
            39.99, '2020-8-27'::date, true, null, 9, 2);

INSERT INTO games(title,description,price,launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Counter-Strike: Global Offensive', 
            'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. 
            CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS content (de_dust2, etc.).', 
            8.99, '2012-08-21'::date, true, null, 4, 1);

INSERT INTO games(title,description,price,launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Ghostrunner', 
            'Ghostrunner offers a unique single-player experience: fast-paced, violent combat, and an original setting that blends science fiction with post-apocalyptic themes. 
            It tells the story of a world that has already ended and its inhabitants who fight to survive.', 
            29.99, '2020-10-27'::date, true, null, 5, 1);

INSERT INTO games(title,description,price,launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Grand Theft Auto V', 
            'Grand Theft Auto V for PC offers players the option to explore the award-winning world of Los Santos and Blaine County in resolutions of up to 4k and beyond, as well as the chance to experience the game running at 60 frames per second.', 
            29.99, '2015-04-14'::date, true, null, 2, 1);

INSERT INTO games(title,description,price,launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Hitman 3', 
            'Death Awaits. Agent 47 returns in HITMAN 3, the dramatic conclusion to the World of Assassination trilogy.', 
            44.99, '2021-01-20'::date, true, null, 6, 1);

INSERT INTO games(title,description,price,launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Modern Warfare® 3', 
            'The best-selling first-person action series of all-time returns with an epic sequel to the multiple GOTY award winner Call of Duty®: Modern Warfare® 2', 
            39.99, '2011-11-08'::date, false, null, 7, 1);

INSERT INTO games(title,description,price,launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Outriders', 
            'Outriders’ brutal and bloody combat combines frenetic gunplay, violent powers and deep RPG systems to create a true genre hybrid.', 
            59.99, '2021-04-01'::date, true, null, 8, 1);

INSERT INTO game_keys("key",available,game_id) VALUES ('757A-D8466F-A453','true',1);
INSERT INTO game_keys("key",available,game_id) VALUES ('79749-432-3076','true',2);
INSERT INTO game_keys("key",available,game_id) VALUES ('1218-58-2960','true',3);
INSERT INTO game_keys("key",available,game_id) VALUES ('31845-618-36','true',4);
INSERT INTO game_keys("key",available,game_id) VALUES ('318DA45-618EFA-3HJV6','true',1);
INSERT INTO game_keys("key",available,game_id) VALUES ('79749-432-3075','true',2);



INSERT INTO game_image(image_id,game_id) VALUES (2,2);
INSERT INTO game_image(image_id,game_id) VALUES (3,3);
INSERT INTO game_image(image_id,game_id) VALUES (4,1);
INSERT INTO game_image(image_id,game_id) VALUES (5,1);
INSERT INTO game_image(image_id,game_id) VALUES (6,1);
INSERT INTO game_image(image_id,game_id) VALUES (7,4);
INSERT INTO game_image(image_id,game_id) VALUES (8,5);
INSERT INTO game_image(image_id,game_id) VALUES (9,6);
INSERT INTO game_image(image_id,game_id) VALUES (10,7);
INSERT INTO game_image(image_id,game_id) VALUES (11,8);
INSERT INTO game_image(image_id,game_id) VALUES (12,9);

INSERT INTO game_tag(tag_id,game_id) VALUES (1,1);
INSERT INTO game_tag(tag_id,game_id) VALUES (4,1);
INSERT INTO game_tag(tag_id,game_id) VALUES (8,1);


INSERT INTO purchases("timestamp", price, "status", "method", payment_uuid, game_key_id, user_id) VALUES ('2019-03-01', 59.99, 'Pending', 'PayPal', '45', 1, 1);
INSERT INTO purchases("timestamp", price, "status", "method", payment_uuid, game_key_id, user_id) VALUES ('2020-12-07', 59.99, 'Completed', 'PayPal', 'aC', 2, 1);
INSERT INTO purchases("timestamp", price, "status", "method", payment_uuid, game_key_id, user_id) VALUES ('2021-02-07', 8.99, 'Aborted', 'PayPal', 'BA', 4, 1);
INSERT INTO purchases("timestamp", price, "status", "method", payment_uuid, game_key_id, user_id) VALUES ('2019-03-10', 39.99, 'Completed', 'PayPal', 'ASDASD', 3, 1);
INSERT INTO purchases("timestamp", price, "status", "method", payment_uuid, game_key_id, user_id) VALUES ('2020-12-07', 59.99, 'Completed', 'PayPal', 'aB', 6, 2);


INSERT INTO cart_items(game_id, user_id) VALUES (2, 1);
INSERT INTO cart_items(game_id, user_id) VALUES (9, 1);
INSERT INTO cart_items(game_id, user_id) VALUES (6, 2);
INSERT INTO cart_items(game_id, user_id) VALUES (1, 2);

INSERT INTO wishlist_items(game_id, user_id) VALUES(1, 1);
INSERT INTO wishlist_items(game_id, user_id) VALUES(3, 1);
INSERT INTO wishlist_items(game_id, user_id) VALUES(8, 1);


-- INSERT INTO reviews (description, score, user_id, game_id) VALUES ('this it to test see reviews', 4, 2, 2);

-----------------------------------------
-- end
-----------------------------------------

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
    address_id INTEGER REFERENCES addresses (id)  ON DELETE CASCADE,
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
INSERT INTO images(path) VALUES ('images/games/HollowKnight.jpg');
INSERT INTO images(path) VALUES ('images/games/Celeste.jpg');
INSERT INTO images(path) VALUES ('images/games/Undertale.jpg');
INSERT INTO images(path) VALUES ('images/games/Hades.jpg');
INSERT INTO images(path) VALUES ('images/games/DarkestDungeon.jpg');
INSERT INTO images(path) VALUES ('images/games/DarkSouls.jpg');
INSERT INTO images(path) VALUES ('images/games/Slay_the_spire.jpg');
INSERT INTO images(path) VALUES ('images/games/DeadCells.jpg');
INSERT INTO images(path) VALUES ('images/games/OriAndTheBlindForestDefinitiveEdition.jpg');
INSERT INTO images(path) VALUES ('images/games/OriAndTheWillOfTheWisps.jpg');
INSERT INTO images(path) VALUES ('images/games/BabaIsYou.jpg');
INSERT INTO images(path) VALUES ('images/games/Witcher3.jpg');
INSERT INTO images(path) VALUES ('images/games/MHW.jpg');
INSERT INTO images(path) VALUES ('images/games/Skyrim.jpg');
INSERT INTO images(path) VALUES ('images/games/Portal2.jpg');
INSERT INTO images(path) VALUES ('images/games/Portal.jpg');
INSERT INTO images(path) VALUES ('images/games/Civ_V.jpg');
INSERT INTO images(path) VALUES ('images/games/SidMeiersCivilizationVI.jpg');
INSERT INTO images(path) VALUES ('images/games/Stardew-Valley.jpg');
INSERT INTO images(path) VALUES ('images/games/PhoenixWrightAceAttorneyTrilogy.jpg');
INSERT INTO images(path) VALUES ('images/games/P4G.jpg');
INSERT INTO images(path) VALUES ('images/games/DQXI.jpg');
INSERT INTO images(path) VALUES ('images/games/P5S.jpg');
INSERT INTO images(path) VALUES ('images/games/ValkyriaChronicles.jpg');
INSERT INTO images(path) VALUES ('images/games/Cuphead.jpg');
INSERT INTO images(path) VALUES ('images/games/The-Walking-Dead.jpg');
INSERT INTO images(path) VALUES ('images/games/TheWalkingDeadSeasonTwo.jpg');
INSERT INTO images(path) VALUES ('images/games/Oneshot.jpg');
INSERT INTO images(path) VALUES ('images/games/ShovelKnight.jpg');
INSERT INTO images(path) VALUES ('images/games/disco-elysium.jpg');
INSERT INTO images(path) VALUES ('images/games/MassEffect.jpg');
INSERT INTO images(path) VALUES ('images/games/Griftlands.jpg');
INSERT INTO images(path) VALUES ('images/games/plants-vs-zombies.jpg');
INSERT INTO images(path) VALUES ('images/games/TotalWarhammer2.jpg');
INSERT INTO images(path) VALUES ('images/games/Frostpunk.jpg');
INSERT INTO images(path) VALUES ('images/games/TotalWarRome.jpg');
INSERT INTO images(path) VALUES ('images/games/LC.jpg');
INSERT INTO images(path) VALUES ('images/games/PapersPls.jpg');
INSERT INTO images(path) VALUES ('images/games/citiesskylines.jpg');
INSERT INTO images(path) VALUES ('images/games/stellaris.jpg');
INSERT INTO images(path) VALUES ('images/games/Sims4.jpg');
INSERT INTO images(path) VALUES ('images/games/Spore.jpg');
INSERT INTO images(path) VALUES ('images/games/Factorio.jpg');
INSERT INTO images(path) VALUES ('images/games/planet-zoo.jpg');
INSERT INTO images(path) VALUES ('images/games/PlanetCoaster.jpg');
INSERT INTO images(path) VALUES ('images/games/KnockoutCity.jpg');
INSERT INTO images(path) VALUES ('images/games/fifa21.jpg');
INSERT INTO images(path) VALUES ('images/games/FH4.jpg');
INSERT INTO images(path) VALUES ('images/games/nba2k21.jpg');
INSERT INTO images(path) VALUES ('images/games/Oliver-n-Benji.jpg');
INSERT INTO images(path) VALUES ('images/games/ProjectCars3.jpg');
INSERT INTO images(path) VALUES ('images/games/footballManager.jpg');
INSERT INTO images(path) VALUES ('images/games/need-for-speed-heat.jpg');
INSERT INTO images(path) VALUES ('images/games/assetoCorsa.jpeg');
INSERT INTO images(path) VALUES ('images/games/GolfWithFriends.jpg');


INSERT INTO addresses(line1, postal_code, city, region, country_id) VALUES ('Rua Dr. Roberto Frias', '4200-465', 'Porto', 'Porto', 177);

INSERT INTO users(email, first_name, last_name, username, password, is_admin, image_id, address_id) VALUES('lbaw@lbaw.pt', 'PNome', 'LNome', 'lbaw', '$2y$10$REP/9v3A7pr477Lne7ttKOBVKJuWrkvsSihNIkYGePO6rLgWehUCu', true, 1, 1);
INSERT INTO users(email, first_name, last_name, username, password, is_admin, image_id, address_id) VALUES('lbaw2@lbaw.pt', 'PNome', 'LNome', 'lbaw_normal', '$2y$10$REP/9v3A7pr477Lne7ttKOBVKJuWrkvsSihNIkYGePO6rLgWehUCu', false, 1, null);
INSERT INTO users(email, first_name, last_name, username, password, banned, is_admin, image_id, address_id) VALUES('banned@email.com', 'sdf', 'asd', 'banned_user', '$2y$10$REP/9v3A7pr477Lne7ttKOBVKJuWrkvsSihNIkYGePO6rLgWehUCu', true, false, 1, null);

INSERT INTO developers(name) VALUES ('CDProjekt Red');
INSERT INTO developers(name) VALUES ('Rockstar North');
INSERT INTO developers(name) VALUES ('2k');
INSERT INTO developers(name) VALUES ('Valve');
INSERT INTO developers(name) VALUES ('One More Level');
INSERT INTO developers(name) VALUES ('IO Interactive');
INSERT INTO developers(name) VALUES ('Infinity Ward');
INSERT INTO developers(name) VALUES ('Square Enix');
INSERT INTO developers(name) VALUES ('Remedy Entertainment');
INSERT INTO developers(name) VALUES ('Team Cherry');
INSERT INTO developers(name) VALUES ('Extremely OK Games');
INSERT INTO developers(name) VALUES ('Toby Fox');
INSERT INTO developers(name) VALUES ('Supergiant Games');
INSERT INTO developers(name) VALUES ('Red Hook Studios');
INSERT INTO developers(name) VALUES ('From Software');
INSERT INTO developers(name) VALUES ('Mega Crit Games');
INSERT INTO developers(name) VALUES ('Motion Twin');
INSERT INTO developers(name) VALUES ('Moon Studios');
INSERT INTO developers(name) VALUES ('Hempuli Oy');
INSERT INTO developers(name) VALUES ('Capcom');
INSERT INTO developers(name) VALUES ('Bethesda');
INSERT INTO developers(name) VALUES ('Firaxis Games');
INSERT INTO developers(name) VALUES ('Concerned Ape');
INSERT INTO developers(name) VALUES ('Atlus');
INSERT INTO developers(name) VALUES ('Sega');
INSERT INTO developers(name) VALUES ('Studio MDHR');
INSERT INTO developers(name) VALUES ('Telltale Games');
INSERT INTO developers(name) VALUES ('Future Cat');
INSERT INTO developers(name) VALUES ('Yatch Club Games');
INSERT INTO developers(name) VALUES ('ZA/UM');
INSERT INTO developers(name) VALUES ('Bioware');
INSERT INTO developers(name) VALUES ('Klei Entertainment');
INSERT INTO developers(name) VALUES ('PopCap Games');
INSERT INTO developers(name) VALUES ('Creative Assembly');
INSERT INTO developers(name) VALUES ('11 bit studios');
INSERT INTO developers(name) VALUES ('Project Moon');
INSERT INTO developers(name) VALUES ('Lucas Pope');
INSERT INTO developers(name) VALUES ('Colossal Order');
INSERT INTO developers(name) VALUES ('Paradox Development Studio');
INSERT INTO developers(name) VALUES ('Maxis');
INSERT INTO developers(name) VALUES ('Wube Software');
INSERT INTO developers(name) VALUES ('Frontier Developments');
INSERT INTO developers(name) VALUES ('Velan Studios');
INSERT INTO developers(name) VALUES ('EA');
INSERT INTO developers(name) VALUES ('Playground Games');
INSERT INTO developers(name) VALUES ('Visual Concepts');
INSERT INTO developers(name) VALUES ('Tamsoft Corporation');
INSERT INTO developers(name) VALUES ('Slightly Mad Studios');
INSERT INTO developers(name) VALUES ('Sports Interactive');
INSERT INTO developers(name) VALUES ('Ghost Games');
INSERT INTO developers(name) VALUES ('Kunos Simulazioni');
INSERT INTO developers(name) VALUES ('Blacklight Interactive');


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
INSERT INTO tags(name) VALUES ('Sim-Racing');
INSERT INTO tags(name) VALUES ('JRPG');
INSERT INTO tags(name) VALUES ('First-Person Shooter');
INSERT INTO tags(name) VALUES ('Third-Person Shooter');
INSERT INTO tags(name) VALUES ('Casual');
INSERT INTO tags(name) VALUES ('Platformer');
INSERT INTO tags(name) VALUES ('Co-op');
INSERT INTO tags(name) VALUES ('Hack and Slash');
INSERT INTO tags(name) VALUES ('Open World');
INSERT INTO tags(name) VALUES ('Stealth');
INSERT INTO tags(name) VALUES ('Metroidvania');
INSERT INTO tags(name) VALUES ('Turn based');
INSERT INTO tags(name) VALUES ('Roguelike');
INSERT INTO tags(name) VALUES ('Deckbuilder');
INSERT INTO tags(name) VALUES ('Visual Novel');
INSERT INTO tags(name) VALUES ('Boss Rush');
INSERT INTO tags(name) VALUES ('Investigation');
INSERT INTO tags(name) VALUES ('Tower Defense');
INSERT INTO tags(name) VALUES ('City Builder');
INSERT INTO tags(name) VALUES ('Horror');
INSERT INTO tags(name) VALUES ('Sports');
INSERT INTO tags(name) VALUES ('Racing');
INSERT INTO tags(name) VALUES ('Management');
INSERT INTO tags(name) VALUES ('Grand Strategy');



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

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Hollow Knight',
            'Forge your own path in Hollow Knight! An epic action adventure through a vast ruined kingdom of insects and heroes. 
            Explore twisting caverns, battle tainted creatures and befriend bizarre bugs, all in a classic, hand-drawn 2D style.',
            14.99, '2017-02-24'::date, true, null, 10, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Celeste',
            'Help Madeline survive her inner demons on her journey to the top of Celeste Mountain, in this super-tight platformer from the creators of TowerFall. 
            Brave hundreds of hand-crafted challenges, uncover devious secrets, and piece together the mystery of the mountain.',
            19.99, '2018-01-25'::date, true, null, 11, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Undertale',
            'UNDERTALE! The RPG game where you dont have to destroy anyone.',
            9.99, '2015-09-15'::date, true, null, 12, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Hades',
            'Defy the god of the dead as you hack and slash out of the Underworld in this rogue-like dungeon crawler from the creators of Bastion, Transistor, and Pyre.',
            20.99, '2020-09-17'::date, true, null, 13, 1);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Darkest Dungeon',
            'Darkest Dungeon is a challenging gothic turn-based RPG about the psychological stresses of adventuring. 
            Recruit, train, and lead a team of flawed heroes against unimaginable horrors, stress, disease, and the ever-encroaching dark. 
            Can you keep your heroes together when all hope is lost?',
            22.99, '2016-01-19'::date, true, null, 14, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Dark Souls Remastered',
            'Then, there was fire. Re-experience the critically acclaimed, genre-defining game that started it all. 
            Beautifully remastered, return to Lordran in stunning high-definition detail running at 60fps.',
            39.99, '2018-05-23'::date, true, null, 15, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Slay the Spire',
            'We fused card games and roguelikes together to make the best single player deckbuilder we could. 
            Craft a unique deck, encounter bizarre creatures, discover relics of immense power, and Slay the Spire!',
            20.99, '2019-01-23'::date, true, null, 16, 5);


INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Dead Cells',
            'Dead Cells is a rogue-lite, metroidvania inspired, action-platformer. 
            You will explore a sprawling, ever-changing castle... assuming you’re able to fight your way past its keepers in 2D souls-lite combat. 
            No checkpoints. Kill, die, learn, repeat.',
            24.99, '2018-08-06'::date, true, null, 17, 1);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Ori and the Blind Forest: Definitive Edition',
            '“Ori and the Blind Forest” tells the tale of a young orphan destined for heroics, through a visually stunning Action-Platformer crafted by Moon Studios.',
            4.99, '2016-04-27'::date, true, null, 18, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Ori and the Will of the Wisps',
            'Play the critically acclaimed masterpiece. Embark on a new journey in a vast, exotic world where you’ll encounter towering enemies and challenging puzzles on your quest to unravel Ori’s destiny.',
            29.99, '2020-03-11'::date, true, null, 18, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Baba is You',
            'Baba Is You is a puzzle game where the rules you have to follow are present as blocks you can interact with. 
            By manipulating them, you can change how the game works, repurpose things you find in the levels and cause surprising interactions!',
            12.49, '2019-03-13'::date, true, null, 19, 5);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('The Witcher 3: Wild Hunt',
            'As war rages on throughout the Northern Realms, you take on the greatest contract of your life — tracking down the Child of Prophecy, a living weapon that can alter the shape of the world.',
            29.99, '2015-05-18'::date, true, null, 1, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Monster Hunter: World',
            'Welcome to a new world! In Monster Hunter: World, the latest installment in the series, you can enjoy the ultimate hunting experience, using everything at your disposal to hunt monsters in a new world teeming with surprises and excitement.',
            29.99, '2018-08-09'::date, true, null, 20, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('The Elder Scrolls V: Skyrim Special Edition',
            'Winner of more than 200 Game of the Year Awards, Skyrim Special Edition brings the epic fantasy to life in stunning detail. 
            The Special Edition includes the critically acclaimed game and add-ons with all-new features like remastered art and effects, volumetric god rays, dynamic depth of field, screen-space reflections, and more. 
            Skyrim Special Edition also brings the full power of mods to the PC and consoles. New quests, environments, characters, dialogue, armor, weapons and more – with Mods, there are no limits to what you can experience.',
            39.99, '2016-10-28'::date, true, null, 21, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Portal 2',
            'The "Perpetual Testing Initiative" has been expanded to allow you to design co-op puzzles for you and your friends!',
            8.19, '2011-04-19'::date, true, null, 4, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Portal',
            'Portal™ is a new single player game from Valve. Set in the mysterious Aperture Science Laboratories, Portal has been called one of the most innovative new games on the horizon and will offer gamers hours of unique gameplay.',
            8.19, '2007-10-10'::date, true, null, 4, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Sid Meier’s Civilization V',
            'Create, discover, and download new player-created maps, scenarios, interfaces, and more!',
            29.99, '2010-09-23'::date, true, null, 22, 5);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Sid Meier’s Civilization VI',
            'Civilization VI offers new ways to interact with your world, expand your empire across the map, advance your culture, and compete against history’s greatest leaders to build a civilization that will stand the test of time. 
            Play as one of 20 historical leaders including Roosevelt (America) and Victoria (England).',
            59.99, '2016-10-21'::date, true, null, 22, 5);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Stardew Valley',
            'You’ve inherited your grandfather’s old farm plot in Stardew Valley. Armed with hand-me-down tools and a few coins, you set out to begin your new life. 
            Can you learn to live off the land and turn these overgrown fields into a thriving home?',
            13.99, '2016-02-26'::date, true, null, 23, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Phoenix Wright: Ace Attorney Trilogy',
            'Become Phoenix Wright and experience the thrill of battle as you fight to save your innocent clients in a court of law. 
            Play all 14 episodes, spanning the first three games, in one gorgeous collection.',
            29.99, '2019-04-09'::date, true, null, 20, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Persona 4 Golden',
            'A coming of age story that sets the protagonist and his friends on a journey kickstarted by a chain of serial murders.',
            19.99, '2020-06-21'::date, true, null, 24, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('DRAGON QUEST XI S: Echoes of an Elusive Age - Definitive Edition',
            'The Definitive Edition includes the critically acclaimed DRAGON QUEST XI, plus additional scenarios, orchestral soundtrack, 2D mode and more! 
            Whether you are a longtime fan or a new adventurer, this is the ultimate DQXI experience.',
            39.99, '2020-12-04'::date, true, null, 8, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Persona 5 Strikers',
            'Join the Phantom Thieves and strike back against the corruption overtaking cities across Japan. 
            A summer vacation with close friends takes a sudden turn as a distorted reality emerges; reveal the truth and redeem the hearts of those imprisoned at the center of the crisis!',
            59.99, '2021-02-23'::date, true, null, 24, 1);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Valkyria Chronicles',
            'The critically acclaimed Valkyria Chronicles is now available on PC in 1080p True HD, including all previously released DLC!',
            19.99, '2014-11-11'::date, true, null, 25, 5);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Cuphead',
            'Cuphead is a classic run and gun action game heavily focused on boss battles. 
            Inspired by cartoons of the 1930s, the visuals and audio are painstakingly created with the same techniques of the era, i.e. traditional hand drawn cel animation, watercolor backgrounds, and original jazz recordings.',
            19.99, '2017-09-29'::date, true, null, 26, 1);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('The Walking Dead',
            'A five-part adventure horror series set in the same universe as Robert Kirkman’s award-winning comic book series.',
            14.99, '2012-04-24'::date, true, null, 27, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('The Walking Dead: Season Two',
            'The Walking Dead: Season Two continues the story of Clementine, a young girl orphaned by the undead apocalypse. 
            Left to fend for herself, she has been forced to learn how to survive in a world gone mad.',
            14.99, '2013-12-17'::date, true, null, 27, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Oneshot',
            'OneShot is a surreal top down Puzzle/Adventure game with unique gameplay capabilities. You are to guide a child through a mysterious world on a mission to restore its long-dead sun. The world knows you exist.',
            9.99, '2016-12-08'::date, true, null, 28, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Shovel Knight: Treasure Throve',
            'Shovel Knight: Treasure Trove is the complete Shovel Knight collection, containing all 5 games in the epic saga! Dig, blast, slash, and bash your way through a fantastical, 8-bit inspired world of pixel-perfect platforming, memorable characters, and world-class action-adventure gameplay.',
            39.99, '2014-06-26'::date, true, null, 29, 2);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Disco Elysium',
            'Disco Elysium - The Final Cut is a groundbreaking role playing game. 
            You’re a detective with a unique skill system at your disposal and a whole city to carve your path across. 
            Interrogate unforgettable characters, crack murders or take bribes. Become a hero or an absolute disaster of a human being.',
            39.99, '2019-10-15'::date, true, null, 30, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Mass Effect Legendary Edition',
            'The Mass Effect™ Legendary Edition includes single-player base content and over 40 DLC from the highly acclaimed Mass Effect, Mass Effect 2, and Mass Effect 3 games, including promo weapons, armors, and packs — remastered and optimized for 4K Ultra HD.',
            59.99, '2021-05-14'::date, true, null, 31, 3);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Griftlands',
            'Griftlands is a deck-building roguelite where you negotiate, fight, steal or otherwise persuade others to get your way. 
            Every decision is important, be it the jobs you take, the friends you make, or the cards you collect.',
            16.79, '2021-06-01'::date, true, null, 32, 5);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Plants vs Zombies GOTY Edition',
            'Zombies are invading your home, and the only defense is your arsenal of plants! Armed with an alien nursery-worth of zombie-zapping plants like peashooters and cherry bombs, you’ll need to think fast and plant faster to stop dozens of types of zombies dead in their tracks.',
            4.99, '2009-05-05'::date, true, null, 33, 5);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Total War: Warhammer II',
            'Strategy gaming perfected. A breath-taking campaign of exploration, expansion and conquest across a fantasy world. Turn-based civilisation management and real-time epic strategy battles with thousands of troops and monsters at your command.',
            59.99, '2017-09-28'::date, true, null, 34, 5);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Frostpunk',
            'Frostpunk is the first society survival game. As the ruler of the last city on Earth, it is your duty to manage both its citizens and infrastructure. What decisions will you make to ensure your society’s survival? What will you do when pushed to breaking point? Who will you become in the process?',
            29.99, '2018-04-24'::date, true, null, 35, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Total War: Rome Remastered',
            'Total War: ROME REMASTERED lets you relive the legacy that defined the award-winning strategy game series. 
            Remastered to 4K with multiple improvements to visuals as well as refinements to gameplay, it’s time to revisit a true classic. Not everyone gets a second chance to conquer the Roman Empire.',
            29.99, '2021-04-29'::date, true, null, 34, 5);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Lobotomy Corporation',
            'A roguelite monster-management simulation inspired by the likes of the SCP Foundation, Cabin in the Woods, and Warehouse 13. 
            Order your employees to perform work with the creatures and watch as it unfolds; harness greater energy, and expand the facility',
            22.99, '2018-04-09'::date, true, null, 36, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Papers Please',
            'Congratulations. The October labor lottery is complete. Your name was pulled. 
            For immediate placement, report to the Ministry of Admission at Grestin Border Checkpoint. 
            An apartment will be provided for you and your family in East Grestin. Expect a Class-8 dwelling.',
            8.99, '2013-08-08'::date, true, null, 37, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Cities Skylines',
            'Cities: Skylines is a modern take on the classic city simulation. 
            The game introduces new game play elements to realize the thrill and hardships of creating and maintaining a real city whilst expanding on some well-established tropes of the city building experience.',
            27.99, '2015-03-10'::date, true, null, 38, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Stelaris',
            'Explore a galaxy full of wonders in this sci-fi grand strategy game from Paradox Development Studios. 
            Interact with diverse alien races, discover strange new worlds with unexpected events and expand the reach of your empire. 
            Each new adventure holds almost limitless possibilities.',
            39.99, '2016-05-09'::date, true, null, 39, 5);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('The Sims 4',
            'Play with life and discover the possibilities. Unleash your imagination and create a world of Sims that’s wholly unique. 
            Explore and customize every detail from Sims to homes–and much more.',
            39.99, '2014-09-02'::date, true, null, 40, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Spore',
            'Be the architect of your own universe with Spore, an exciting single-player adventure. From Single Cell to Galactic God, evolve your creature in a universe of your own creations.',
            19.99, '2008-12-19'::date, true, null, 40, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Factorio',
            'Factorio is a game about building and creating automated factories to produce items of increasing complexity, within an infinite 2D world. 
            Use your imagination to design your factory, combine simple elements into ingenious structures, and finally protect it from the creatures who don’t really like you.',
            25.00, '2020-08-14'::date, true, null, 41, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Planet Zoo',
            'Build a world for wildlife in Planet Zoo. From the developers of Planet Coaster and Zoo Tycoon comes the ultimate zoo sim. 
            Construct detailed habitats, manage your zoo, and meet authentic living animals who think, feel and explore the world you create around them.',
            44.99, '2019-11-05'::date, true, null, 42, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Planet Coaster',
            'Planet Coaster® - the future of coaster park simulation games has arrived! Surprise, delight and thrill incredible crowds as you build your coaster park empire - let your imagination run wild, and share your success with the world.',
            37.99, '2016-11-17'::date, true, null, 42, 4);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Knockout City',
            'Team up and duke it out with rival Crews in Knockout City™, where EPIC DODGEBALL BATTLES settle the score in team-based multiplayer matches. 
            Throw, catch, pass, dodge, and tackle your way to dodgeball dominance!',
            19.99, '2021-05-21'::date, true, null, 43, 6);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('FIFA 2021',
            'Football is back with EA SPORTS™ FIFA 21, featuring more ways to team up on the street or in the stadium to enjoy even bigger victories with friends.',
            59.99, '2020-10-09'::date, true, null, 44, 6);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Forza Horizon 4',
            'Dynamic seasons change everything at the world’s greatest automotive festival. 
            Go it alone or team up with others to explore beautiful and historic Britain in a shared open world.',
            69.99, '2021-03-09'::date, true, null, 45, 6);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('NBA 2K21',
            'NBA 2K21 is the latest title in the world-renowned, best-selling NBA 2K series, delivering an industry-leading sports video game experience.',
            59.99, '2020-09-04'::date, true, null, 46, 6);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Captain Tsubasa: Rise of New Champions',
            'Captain Tsubasa: Rise of New Champions is an arcade football game bringing a refreshing look to the football genre with the exhilarating action and over the top shots that made the license famous. Defy The Laws of Football Become Legend',
            49.99, '2020-09-28'::date, true, null, 47, 6);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Project Cars 3',
            'Journey from weekend warrior to racing legend & experience the thrill & emotion of authentic racing. 
            Own, upgrade and personalise hundreds of cars, customise your driver, tailor every setting & play the way you want in YOUR Ultimate Driver Journey.',
            59.99, '2020-08-27'::date, true, null, 48, 6);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Football Manager 2021',
            'New additions and game upgrades deliver added levels of depth, drama and football authenticity. FM21 empowers you like never before to develop your skills and command success at your club.',
            54.99, '2020-11-23'::date, true, null, 49, 6);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Need for Speed Heat',
            'Hustle by day and risk it all at night in Need for Speed™ Heat Deluxe Edition, a white-knuckle street racer, where the lines of the law fade as the sun starts to set.',
            69.99, '2019-11-08'::date, true, null, 50, 6);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Assetto Corsa',
            'Assetto Corsa v1.16 introduces the new "Laguna Seca" laser-scanned track, 7 new cars among which the eagerly awaited Alfa Romeo Giulia Quadrifoglio! Check the changelog for further info!',
            19.99, '2014-12-19'::date, true, null, 51, 6);

INSERT INTO games(title,description,price, launch_date,listed,parent_id,developer_id,category_id) 
VALUES ('Golf With Your Friends',
            'Why have friends if not to play Golf... With Your Friends! Nothing is out of bounds as you take on courses filled with fast paced, exciting, simultaneous mini golf for up to 12 players!',
            14.99, '2020-05-19'::date, true, null, 52, 6);


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
INSERT INTO game_image(image_id,game_id) VALUES (13,10);
INSERT INTO game_image(image_id,game_id) VALUES (14,11);
INSERT INTO game_image(image_id,game_id) VALUES (15,12);
INSERT INTO game_image(image_id,game_id) VALUES (16,13);
INSERT INTO game_image(image_id,game_id) VALUES (17,14);
INSERT INTO game_image(image_id,game_id) VALUES (18,15);
INSERT INTO game_image(image_id,game_id) VALUES (19,16);
INSERT INTO game_image(image_id,game_id) VALUES (20,17);
INSERT INTO game_image(image_id,game_id) VALUES (21,18);
INSERT INTO game_image(image_id,game_id) VALUES (22,19);
INSERT INTO game_image(image_id,game_id) VALUES (23,20);
INSERT INTO game_image(image_id,game_id) VALUES (24,21);
INSERT INTO game_image(image_id,game_id) VALUES (25,22);
INSERT INTO game_image(image_id,game_id) VALUES (26,23);
INSERT INTO game_image(image_id,game_id) VALUES (27,24);
INSERT INTO game_image(image_id,game_id) VALUES (28,25);
INSERT INTO game_image(image_id,game_id) VALUES (29,26);
INSERT INTO game_image(image_id,game_id) VALUES (30,27);
INSERT INTO game_image(image_id,game_id) VALUES (31,28);
INSERT INTO game_image(image_id,game_id) VALUES (32,29);
INSERT INTO game_image(image_id,game_id) VALUES (33,30);
INSERT INTO game_image(image_id,game_id) VALUES (34,31);
INSERT INTO game_image(image_id,game_id) VALUES (35,32);
INSERT INTO game_image(image_id,game_id) VALUES (36,33);
INSERT INTO game_image(image_id,game_id) VALUES (37,34);
INSERT INTO game_image(image_id,game_id) VALUES (38,35);
INSERT INTO game_image(image_id,game_id) VALUES (39,36);
INSERT INTO game_image(image_id,game_id) VALUES (40,37);
INSERT INTO game_image(image_id,game_id) VALUES (41,38);
INSERT INTO game_image(image_id,game_id) VALUES (42,39);
INSERT INTO game_image(image_id,game_id) VALUES (43,40);
INSERT INTO game_image(image_id,game_id) VALUES (44,41);
INSERT INTO game_image(image_id,game_id) VALUES (45,42);
INSERT INTO game_image(image_id,game_id) VALUES (46,43);
INSERT INTO game_image(image_id,game_id) VALUES (47,44);
INSERT INTO game_image(image_id,game_id) VALUES (48,45);
INSERT INTO game_image(image_id,game_id) VALUES (49,46);
INSERT INTO game_image(image_id,game_id) VALUES (50,47);
INSERT INTO game_image(image_id,game_id) VALUES (51,48);
INSERT INTO game_image(image_id,game_id) VALUES (52,49);
INSERT INTO game_image(image_id,game_id) VALUES (53,50);
INSERT INTO game_image(image_id,game_id) VALUES (54,51);
INSERT INTO game_image(image_id,game_id) VALUES (55,52);
INSERT INTO game_image(image_id,game_id) VALUES (56,53);
INSERT INTO game_image(image_id,game_id) VALUES (57,54);
INSERT INTO game_image(image_id,game_id) VALUES (58,55);
INSERT INTO game_image(image_id,game_id) VALUES (59,56);
INSERT INTO game_image(image_id,game_id) VALUES (60,57);
INSERT INTO game_image(image_id,game_id) VALUES (61,58);
INSERT INTO game_image(image_id,game_id) VALUES (62,59);
INSERT INTO game_image(image_id,game_id) VALUES (63,60);
INSERT INTO game_image(image_id,game_id) VALUES (64,61);
INSERT INTO game_image(image_id,game_id) VALUES (65,62);
INSERT INTO game_image(image_id,game_id) VALUES (66,63);
INSERT INTO game_image(image_id,game_id) VALUES (67,64);


--Cyberpunk 2077
INSERT INTO game_tag(tag_id,game_id) VALUES (1,1);
INSERT INTO game_tag(tag_id,game_id) VALUES (4,1);
INSERT INTO game_tag(tag_id,game_id) VALUES (8,1);
INSERT INTO game_tag(tag_id,game_id) VALUES (14,1);
--Borderlands 3
INSERT INTO game_tag(tag_id,game_id) VALUES (1,2);
INSERT INTO game_tag(tag_id,game_id) VALUES (4,2);
INSERT INTO game_tag(tag_id,game_id) VALUES (8,2);
INSERT INTO game_tag(tag_id,game_id) VALUES (12,2);
--Control
INSERT INTO game_tag(tag_id,game_id) VALUES (4,3);
INSERT INTO game_tag(tag_id,game_id) VALUES (9,3);
--CS:GO
INSERT INTO game_tag(tag_id,game_id) VALUES (8,4);
--Ghostrunner
INSERT INTO game_tag(tag_id,game_id) VALUES (4,5);
INSERT INTO game_tag(tag_id,game_id) VALUES (13,5);
--GTA V
INSERT INTO game_tag(tag_id,game_id) VALUES (14,6);
--Hitman 3
INSERT INTO game_tag(tag_id,game_id) VALUES (15,7);
--MW3
INSERT INTO game_tag(tag_id,game_id) VALUES (8,8);
--Outriders
INSERT INTO game_tag(tag_id,game_id) VALUES (1,9);
INSERT INTO game_tag(tag_id,game_id) VALUES (4,9);
INSERT INTO game_tag(tag_id,game_id) VALUES (9,9);
INSERT INTO game_tag(tag_id,game_id) VALUES (12,9);
--Hollow Knight
INSERT INTO game_tag(tag_id,game_id) VALUES (11,10);
INSERT INTO game_tag(tag_id,game_id) VALUES (16,10);
--Celeste
INSERT INTO game_tag(tag_id,game_id) VALUES (11,11);
--Undertale
INSERT INTO game_tag(tag_id,game_id) VALUES (17,12);
--Hades
INSERT INTO game_tag(tag_id,game_id) VALUES (18,13);
--Darkest Dungeon
INSERT INTO game_tag(tag_id,game_id) VALUES (17,14);
INSERT INTO game_tag(tag_id,game_id) VALUES (25,14);
--Dark Souls
INSERT INTO game_tag(tag_id,game_id) VALUES (1,15);
--Slay the Spire
INSERT INTO game_tag(tag_id,game_id) VALUES (18,16);
INSERT INTO game_tag(tag_id,game_id) VALUES (19,16);
--Dead Cells
INSERT INTO game_tag(tag_id,game_id) VALUES (16,17);
INSERT INTO game_tag(tag_id,game_id) VALUES (18,17);
--Ori BF
INSERT INTO game_tag(tag_id,game_id) VALUES (11,18);
INSERT INTO game_tag(tag_id,game_id) VALUES (16,18);
--Ori WW
INSERT INTO game_tag(tag_id,game_id) VALUES (11,19);
INSERT INTO game_tag(tag_id,game_id) VALUES (16,19);
--Baba is you
INSERT INTO game_tag(tag_id,game_id) VALUES (3,20);
--Witcher 3
INSERT INTO game_tag(tag_id,game_id) VALUES (1,21);
INSERT INTO game_tag(tag_id,game_id) VALUES (14,21);
--MHW
INSERT INTO game_tag(tag_id,game_id) VALUES (1,22);
INSERT INTO game_tag(tag_id,game_id) VALUES (12,22);
--Skyrim
INSERT INTO game_tag(tag_id,game_id) VALUES (1,23);
INSERT INTO game_tag(tag_id,game_id) VALUES (14,23);
--Portal 2
INSERT INTO game_tag(tag_id,game_id) VALUES (3,24);
--Portal 
INSERT INTO game_tag(tag_id,game_id) VALUES (3,25);
--Civ V
INSERT INTO game_tag(tag_id,game_id) VALUES (17,26);
INSERT INTO game_tag(tag_id,game_id) VALUES (29,26);
--Civ VI
INSERT INTO game_tag(tag_id,game_id) VALUES (17,27);
INSERT INTO game_tag(tag_id,game_id) VALUES (29,27);
--Stardew Valley
INSERT INTO game_tag(tag_id,game_id) VALUES (10,28);
--Ace Attorney
INSERT INTO game_tag(tag_id,game_id) VALUES (20,29);
INSERT INTO game_tag(tag_id,game_id) VALUES (22,29);
--Persona 4
INSERT INTO game_tag(tag_id,game_id) VALUES (7,30);
INSERT INTO game_tag(tag_id,game_id) VALUES (17,30);
--DQXI
INSERT INTO game_tag(tag_id,game_id) VALUES (7,31);
INSERT INTO game_tag(tag_id,game_id) VALUES (17,31);
--P5 Strikers
INSERT INTO game_tag(tag_id,game_id) VALUES (1,32);
INSERT INTO game_tag(tag_id,game_id) VALUES (7,32);
INSERT INTO game_tag(tag_id,game_id) VALUES (13,32);
--Valkyria Chronicles
INSERT INTO game_tag(tag_id,game_id) VALUES (7,33);
INSERT INTO game_tag(tag_id,game_id) VALUES (17,33);
--Cuphead
INSERT INTO game_tag(tag_id,game_id) VALUES (21,34);
--Walking Dead
INSERT INTO game_tag(tag_id,game_id) VALUES (20,35);
--Walking Dead 2
INSERT INTO game_tag(tag_id,game_id) VALUES (20,36);
--Oneshot
INSERT INTO game_tag(tag_id,game_id) VALUES (3,37);
--Shovel Knight
INSERT INTO game_tag(tag_id,game_id) VALUES (11,38);
--Disco Elysium
INSERT INTO game_tag(tag_id,game_id) VALUES (22,39);
--Mass Effect
INSERT INTO game_tag(tag_id,game_id) VALUES (1,40);
INSERT INTO game_tag(tag_id,game_id) VALUES (4,40);
INSERT INTO game_tag(tag_id,game_id) VALUES (9,40);
--Griftlands
INSERT INTO game_tag(tag_id,game_id) VALUES (4,41);
INSERT INTO game_tag(tag_id,game_id) VALUES (18,41);
INSERT INTO game_tag(tag_id,game_id) VALUES (19,41);
--PvZ
INSERT INTO game_tag(tag_id,game_id) VALUES (23,42);
--Warhammer
INSERT INTO game_tag(tag_id,game_id) VALUES (5,43);
--Frostpunk
INSERT INTO game_tag(tag_id,game_id) VALUES (4,44);
INSERT INTO game_tag(tag_id,game_id) VALUES (24,44);
--Total War Rome
INSERT INTO game_tag(tag_id,game_id) VALUES (5,45);
--Lobotomy Corporation
INSERT INTO game_tag(tag_id,game_id) VALUES (25,46);
INSERT INTO game_tag(tag_id,game_id) VALUES (28,46);
--Papers Please
INSERT INTO game_tag(tag_id,game_id) VALUES (3,47);
--Cities Skylines
INSERT INTO game_tag(tag_id,game_id) VALUES (24,48);
--Stellaris
INSERT INTO game_tag(tag_id,game_id) VALUES (4,49);
INSERT INTO game_tag(tag_id,game_id) VALUES (29,49);
--Sims 4
INSERT INTO game_tag(tag_id,game_id) VALUES (10,50);
--Spore
INSERT INTO game_tag(tag_id,game_id) VALUES (4,51);
INSERT INTO game_tag(tag_id,game_id) VALUES (5,51);
INSERT INTO game_tag(tag_id,game_id) VALUES (10,51);
--Factorio
INSERT INTO game_tag(tag_id,game_id) VALUES (12,52);
INSERT INTO game_tag(tag_id,game_id) VALUES (28,52);
--Planet Zoo
INSERT INTO game_tag(tag_id,game_id) VALUES (10,53);
INSERT INTO game_tag(tag_id,game_id) VALUES (24,53);
INSERT INTO game_tag(tag_id,game_id) VALUES (28,53);
--Planet Coaster
INSERT INTO game_tag(tag_id,game_id) VALUES (10,54);
INSERT INTO game_tag(tag_id,game_id) VALUES (24,54);
INSERT INTO game_tag(tag_id,game_id) VALUES (28,54);
--KO City
INSERT INTO game_tag(tag_id,game_id) VALUES (26,55);
--FIFA
INSERT INTO game_tag(tag_id,game_id) VALUES (26,56);
--FH4
INSERT INTO game_tag(tag_id,game_id) VALUES (27,57);
--NBA
INSERT INTO game_tag(tag_id,game_id) VALUES (26,58);
--Oliver and Benji
INSERT INTO game_tag(tag_id,game_id) VALUES (26,59);
--Project Cars 
INSERT INTO game_tag(tag_id,game_id) VALUES (27,60);
--Football Manager
INSERT INTO game_tag(tag_id,game_id) VALUES (26,61);
INSERT INTO game_tag(tag_id,game_id) VALUES (28,61);
--Need 4 Speed
INSERT INTO game_tag(tag_id,game_id) VALUES (27,62);
--Asseto Corsa
INSERT INTO game_tag(tag_id,game_id) VALUES (27,63);
--Golf with your friends
INSERT INTO game_tag(tag_id,game_id) VALUES (10,64);
INSERT INTO game_tag(tag_id,game_id) VALUES (26,64);




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


INSERT INTO reviews (description, score, user_id, game_id) VALUES ('this it to test see reviews', 4, 2, 2);

-----------------------------------------
-- end
-----------------------------------------

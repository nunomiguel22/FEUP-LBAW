CREATE TYPE PAYMENT_METHOD AS ENUM ('PayPal', 'MB', 'BankTransfer');
CREATE TYPE PURCHASE_STATUS AS ENUM ('Aborted', 'Pending', 'Completed');
CREATE TYPE REPORT_STATUS AS ENUM ('Open', 'In Progress', 'Closed');
CREATE TYPE REPORT_TYPE AS ENUM ('Bug', 'Review');
 
-- Tables
 
CREATE TABLE country (
    id SERIAL PRIMARY KEY,
    name TEXT NOT NULL CONSTRAINT country_name_uk UNIQUE
);

CREATE TABLE photo (
    id SERIAL PRIMARY KEY,
    path TEXT NULL CONSTRAINT photo_path_uk UNIQUE
);

CREATE TABLE developer(
    id SERIAL PRIMARY_KEY,
    name TEXT NOT NUll CONSTRAINT name_developer_uk UNIQUE
);

CREATE TABLE category(
    id SERIAL PRIMARY_KEY, 
    name TEXT NOT NULL CONSTRAINT name_category_uk UNIQUE
);

CREATE TABLE game_key(
    id SERIAL PRIMARY_KEY,
    key TEXT NOT NULL CONSTRAINT game_key_uk UNIQUE,
    used BOOLEAN NOT NULL DEFAULT false
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
 
CREATE TABLE user (
    id SERIAL PRIMARY KEY,
    email TEXT NOT NULL CONSTRAINT user_email_uk UNIQUE,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL,
    username TEXT NOT NULL CONSTRAINT user_username_uk UNIQUE,
    password TEXT NOT NULL,
    nif TEXT,
    banned BOOLEAN NOT NULL DEFAULT false,
    restricted BOOLEAN NOT NULL DEFAULT false,
    is_admin BOOLEAN NOT NOT DEFAULT false
    avatar_id INTEGER REFERENCES photo (id),
    addresses_id INTEGER REFERENCES addresses (id)
);

CREATE TABLE game(
    id SERIAL PRIMARY KEY,
    title TEXT NOT NULL,
    description NOT NULL,
    price DOUBLE NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    score DOUBLE CONSTRAINT score_ck CHECK (score > 0 and score < 6),
    launch_date DATE,
    listed BOOLEAN NOT NULL DEFAULT true,
    parent_id INTEGER REFERENCES game (id),
    dev_id INTEGER NOT NULL REFERENCES developer (id),
    category_id INTEGER NOT NULL REFERENCES category (id),

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
    user_id INTEGER NOT NUll REFERENCES user (id),
    PRIMARY_KEY(game_id, user_id)
);

CREATE TABLE in_wishlist(
    game_id INTEGER NOT NULL REFERENCES game (id),
    user_id INTEGER NOT NUll REFERENCES user (id)
    PRIMARY_KEY(game_id, user_id)
);

CREATE TABLE purchase(
    id SERIAL PRIMARY_KEY,
    "timestamp" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    price DOUBLE NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    status PURCHASE_STATUS NOT NULL DEFAULT 'Pending',
    method PAYMENT_METHOD NOT NULL,
    key_id INTEGER NOT NULL REFERENCES game_key (id),
    buyer_id INTEGER NOT NULL REFERENCES user (id)
);

CREATE TABLE review(
    id SERIAL PRIMARY_KEY,
    description TEXT NOT NULL,
    publication_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    score INTEGER CONSTRAINT score_ck CHECK (score > 0 AND score < 6),
    reviewer_id INTEGER NOT NULL REFERENCES user (id),
    game_id INTEGER NOT NULL REFERENCES game (id)
);

CREATE TABLE report(
    id SERIAL PRIMARY_KEY,
    description TEXT NOT NULL,
    r_type REPORT_TYPE NOT NULL DEFAULT 'Bug',
    submission_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    r_status REPORT_STATUS NOT NULL DEFAULT 'Open',
    reporter_id INTEGER NOT NULL REFERENCES user (id),
    admin_id INTEGER REFERENCES user (id), --Tem que ter constraint a verificar se user é admin
    review_id INTEGER REFERENCES review (id) CONSTRAINT review_id_ck
    CHECK ((r_type='Review' AND review_id is NOT NULL) OR r_type='Bug')
);

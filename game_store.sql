CREATE TYPE payment_method AS ENUM ('PayPal', 'MB', 'BankTransfer');
CREATE TYPE purchase_status AS ENUM ('Aborted', 'Pending', 'Completed');
CREATE TYPE report_status AS ENUM ('Open', 'In Progress', 'Closed');
CREATE TYPE report_type AS ENUM ('Bug', 'Review');
 
-- Tables
 
 
CREATE TABLE country (
    id SERIAL PRIMARY KEY,
    name text NOT NULL CONSTRAINT country_name_uk UNIQUE
);


CREATE TABLE photo (
    id SERIAL PRIMARY KEY,
    path text NULL CONSTRAINT photo_path_uk UNIQUE
)

CREATE TABLE addresses (
    id SERIAL PRIMARY KEY,
    postal_code text NOT NULL,
    city text NOT NULL,
    region text NOT NULL,
    country_id INTEGER REFERENCES country (id)
)

 
CREATE TABLE user (
    id SERIAL PRIMARY KEY,
    email text NOT NULL CONSTRAINT user_email_uk UNIQUE,
    first_name text NOT NULL,
    last_name text NOT NULL,
    username text NOT NULL CONSTRAINT user_username_uk UNIQUE,
    password text NOT NULL,
    nif text NOT NULL CONSTRAINT user_nif_uk UNIQUE,
    avatar_id INTEGER REFERENCES photo (id),
    addresses_id INTEGER REFERENCES addresses (id),
    banned BOOLEAN NOT NULL DEFAULT false,
    restricted BOOLEAN NOT NULL DEFAULT false,
    is_admin BOOLEAN NOT NOT DEFAULT false
);

CREATE TABLE game{
    id SERIAL PRIMARY KEY,
    title text NOT NULL,
    description NOT NULL,
    price INTEGER NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    classification double CONSTRAINT classification_ck CHECK (classification > 0),
    launch_date date,
    dev_id INTEGER NOT NULL REFERENCES developer (id),
    category_id INTEGER NOT NULL REFERENCES category (id),
    listed BOOLEAN NOT NULL DEFAULT true
}

CREATE TABLE game_image (
    photo_id INTEGER PRIMARY KEY REFERENCES photo(id) ON UPDATE CASCADE ON DELETE CASCADE,
    game_id INTEGER REFERENCES game(id)
)

CREATE TABLE tag{
    id SERIAL PRIMARY KEY,
    name text NOT NULL CONSTRAINT name_tag_uk UNIQUE
}

CREATE TABLE game_tag{
    tag_id INTEGER NOT NULL REFERENCES tag (id),
    game_id INTEGER NOT NULL REFERENCES game (id),
    PRIMARY_KEY(tag_id, game_id)
}

CREATE TABLE category{
    id SERIAL PRIMARY_KEY, 
    name text NOT NULL CONSTRAINT name_category_uk UNIQUE
}

CREATE TABLE developer{
    id SERIAL PRIMARY_KEY,
    name text NOT NUll CONSTRAINT name_developer_uk UNIQUE
}

CREATE TABLE in_cart{
    game_id INTEGER NOT NULL REFERENCES game (id),
    user_id INTEGER NOT NUll REFERENCES user (id)
}

CREATE TABLE in_wishlist{
    game_id INTEGER NOT NULL REFERENCES game (id),
    user_id INTEGER NOT NUll REFERENCES user (id)
}

CREATE TABLE game_key{
    id SERIAL PRIMARY_KEY,
    key text NOT NULL CONSTRAINT game_key_uk UNIQUE,
    used BOOLEAN NOT NULL DEFAULT false
}

CREATE TABLE purchase{
    id SERIAL PRIMARY_KEY,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    price DOUBLE NOT NULL CONSTRAINT price_ck CHECK (price > 0),
    TYPE purchase_status NOT NULL DEFAULT 'Pending',
    TYPE payment_method NOT NULL,
    key_id INTEGER NOT NULL REFERENCES game_key (id),
    buyer_id INTEGER NOT NULL REFERENCES user (id)
}

CREATE TABLE review{
    id SERIAL PRIMARY_KEY,
    description text NOT NULL,
    publication_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    classification INTEGER CONSTRAINT classification_ck CHECK (classification > 0),
    reviewer_id INTEGER NOT NULL REFERENCES user (id),
    game_id INTEGER NOT NULL REFERENCES game (id)
}

CREATE TABLE report{
    id SERIAL PRIMARY_KEY,
    "text" text NOT NULL,
    submission_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    reporter_id INTEGER NOT NULL REFERENCES user (id),
    admin_id INTEGER REFERENCES user (id), --Tem que ter constraint a verificar se user é admin
    TYPE report_status NOT NULL DEFAULT 'Open',
    TYPE report_type NOT NULL,
    review_id INTEGER REFERENCES review (id) --Só há se é review report
}

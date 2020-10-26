-- DROP DATABASE IF EXISTS GameRate;
CREATE DATABASE IF NOT EXISTS GameRate;
USE GameRate;

CREATE TABLE IF NOT EXISTS users(
    user_id INT PRIMARY KEY auto_increment,
    user_name varchar(60) NOT NULL,
    user_img VARCHAR(180),
    user_email VARCHAR(120) UNIQUE NOT NULL,
    user_password VARCHAR(180) NOT NULL,
    user_status enum('Active','Inactive') default 'Active',
    user_privilege enum('Administrator','Rater') DEFAULT 'Rater',
    user_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    user_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
    );

CREATE TABLE IF NOT EXISTS categories(
    id_category smallint PRIMARY KEY auto_increment,
    name_category VARCHAR(50) NOT NULL,
    desc_category TEXT,
    icon_category VARCHAR(180),
    status_category enum('Active','Inactive') default 'Active',
    created_category timestamp default CURRENT_TIMESTAMP,
    updated_category timestamp default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP 
);

CREATE OR REPLACE VIEW session_vw AS SELECT user_id,user_email,user_password,user_update_pass,user_status,user_privilege from users;
-- INSERT INTO users(user_email,user_privilege,user_password) VALUES('demo@demo.com','Administrator','123x');

CREATE TABLE IF NOT EXISTS games(
    id_game INT PRIMARY KEY auto_increment,
    name_game VARCHAR(60) NOT NULL,
    desc_game text,
    category_id SMALLINT NOT NULL,
    img_game VARCHAR(180),
    trailer_game VARCHAR(180),
    status_game ENUM('Active','Inactive') DEFAULT 'Active',
    created_game timestamp default current_timestamp,
    update_game timestamp default current_timestamp on update current_timestamp,
    rate_game DOUBLE,
    FOREIGN KEY(category_id) REFERENCES categories(id_category)
);

CREATE TABLE IF NOT EXISTS comments(
    id_comment INT PRIMARY KEY auto_increment,
    comment TEXT,
    user_id INT,
    game_id INT,
    status_comment ENUM('Active','Inactive') DEFAULT 'Active',
    created_comment timestamp default current_timestamp,
    update_comment timestamp default current_timestamp on update current_timestamp,
    FOREIGN KEY(user_id) REFERENCES users(user_id),
    FOREIGN KEY(game_id) REFERENCES games(id_game)
); 


INSERT INTO comments(comment,user_id,game_id) VALUES("Este juego es genial",1,1);

-- view para tener el nombre del usuario del comentario
CREATE OR REPLACE VIEW comments_vw AS SELECT comments.id_comment, comments.comment AS content, comments.user_id, comments.game_id, comments.status_comment, users.user_name, users.user_email, games.name_game FROM comments JOIN games ON comments.game_id = games.id_game JOIN users ON comments.user_id = users.user_id;

SELECT comments.id_comment, comments.comment AS content, comments.user_id, comments.game_id, comments.status_comment, users.user_name, users.user_email, games.name_game FROM comments JOIN games ON comments.game_id = games.id_game JOIN users ON comments.user_id = users.user_id;
-- DROP DATABASE IF EXISTS GameRate;
CREATE DATABASE IF NOT EXISTS GameRate;
USE GameRate;

CREATE TABLE IF NOT EXISTS users(
    user_id INT PRIMARY KEY auto_increment,
    user_name varchar(60) NOT NULL,
    user_img VARCHAR(180) DEFAULT 'user_default_img.png',
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

CREATE OR REPLACE VIEW session_vw AS SELECT user_id,user_name,user_img,user_email,user_password,user_update_pass,user_status,user_privilege from users;
-- INSERT INTO users(user_email,user_privilege,user_password) VALUES('demo@demo.com','Administrator','123x');

CREATE TABLE IF NOT EXISTS games(
    id_game INT PRIMARY KEY auto_increment,
    name_game VARCHAR(60) NOT NULL,
    desc_game text,
    category_id SMALLINT NOT NULL,
    img_game VARCHAR(180),
    trailer_game VARCHAR(180),
    status_game ENUM('Active','Inactive') DEFAULT 'Active',
    FOREIGN KEY(category_id) REFERENCES categories(id_category),
    created_game timestamp default current_timestamp,
    update_game timestamp default current_timestamp on update current_timestamp
);

CREATE TABLE IF NOT EXISTS comments(
    id_comment INT PRIMARY KEY auto_increment,
    comment TEXT NOT NULL,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    status_comment ENUM('Active','Inactive') DEFAULT 'Active',
    FOREIGN KEY(user_id) REFERENCES users(user_id),
    FOREIGN KEY(game_id) REFERENCES games(id_game), 
    created_comment timestamp default current_timestamp,
    update_comment timestamp default current_timestamp on update current_timestamp
); 


INSERT INTO comments(comment,user_id,game_id) VALUES("Este juego es genial",1,1);

-- view para tener el nombre del usuario del comentario
CREATE OR REPLACE VIEW comments_vw AS SELECT comments.id_comment, comments.comment AS content, comments.user_id, comments.game_id, comments.status_comment, users.user_name, users.user_email, games.name_game FROM comments JOIN games ON comments.game_id = games.id_game JOIN users ON comments.user_id = users.user_id;

SELECT comments.id_comment, comments.comment AS content, comments.user_id, comments.game_id, comments.status_comment, users.user_name, users.user_email, games.name_game FROM comments JOIN games ON comments.game_id = games.id_game JOIN users ON comments.user_id = users.user_id;

CREATE TABLE game_rate(
    id_game_rate INT PRIMARY KEY auto_increment NOT NULL,
    rate INT NOT NULL,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    FOREIGN KEY(user_id) REFERENCES users(user_id),
    FOREIGN KEY(game_id) REFERENCES games(id_game),
    created_rate timestamp default current_timestamp,
    update_rate timestamp default current_timestamp on update current_timestamp
);

INSERT INTO game_rate(rate,user_id,game_id) VALUES(8,1,1);
INSERT INTO game_rate(rate,user_id,game_id) VALUES(7,3,1);
INSERT INTO game_rate(rate,user_id,game_id) VALUES(6,1,2);
INSERT INTO game_rate(rate,user_id,game_id) VALUES(10,3,2);

--  view para ver la calificacion que le puso el usuario a juego
CREATE OR REPLACE VIEW user_rate_game AS SELECT g.name_game,u.user_email,gr.rate from game_rate as gr JOIN games AS g ON gr.game_id = g.id_game JOIN users AS u ON gr.user_id = u.user_id;

-- Una view para obtener el promedio de la calificaion que le han puesto los juegadores al juego
CREATE OR REPLACE VIEW rates_vw AS SELECT g.name_game,g.desc_game,g.img_game,g.id_game,g.category_id,g.trailer_game, AVG(gr.rate) AS rate from game_rate AS gr RIGHT JOIN games AS g ON gr.game_id = g.id_game GROUP BY g.name_game;


-- View para obtener juegos ordenados por calificacion
CREATE OR REPLACE VIEW best_rates AS SELECT g.name_game,g.desc_game,g.img_game,g.id_game,g.category_id,g.trailer_game, AVG(gr.rate) AS rate from game_rate AS gr RIGHT JOIN games AS g ON gr.game_id = g.id_game GROUP BY g.name_game ORDER BY rate DESC;
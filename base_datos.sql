DROP DATABASE IF EXISTS GameRate;
CREATE DATABASE IF NOT EXISTS GameRate;
USE GameRate;

CREATE TABLE users(
    user_id INT PRIMARY KEY auto_increment,
    user_email VARCHAR(120) UNIQUE NOT NULL,
    user_password VARCHAR(180) NOT NULL,
    user_status enum('Active','Inactive') default 'Active',
    user_privilege enum('Administrator','Rater','Super_Rater') NOT NULL,
    user_temp_password VARCHAR(180),
    user_update_pass enum('N','S') DEFAULT 'N',
    user_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    user_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
    );

CREATE TABLE categories(
    id_category smallint PRIMARY KEY auto_increment,
    name_category VARCHAR(50) NOT NULL,
    desc_category TEXT,
    icon_category VARCHAR(180),
    status_category enum('Active','Inactive') default 'Active',
    created_category timestamp default CURRENT_TIMESTAMP,
    updated_category timestamp default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP 
);

CREATE OR REPLACE VIEW session_vw AS SELECT user_id,user_email,user_password,user_update_pass,user_status,user_privilege from users;
INSERT INTO users(user_email,user_privilege,user_password) VALUES('demo@demo.com','Administrator','123x');


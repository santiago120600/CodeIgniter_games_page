CREATE DATABASE IF NOT EXISTS GameRate;
USE GameRate;

CREATE TABLE users(
    user_id INT PRIMARY KEY auto_increment,
    user_email VARCHAR(120) UNIQUE NOT NULL,
    user_password VARCHAR(180) NOT NULL,
    user_status enum('Active','Inactive') default 'Active',
    user_privilege enum('Administrator','Salesman') NOT NULL,
    user_temp_password VARCHAR(180),
    user_update_pass enum('N','S') DEFAULT 'N',
    user_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    user_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP
    );

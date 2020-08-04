# - - - - - - - - - - - - - - - - - - - - Create DataBase - - - - - - - - - - - - - - - - - - - -  #

# Create DataBase
DROP DATABASE IF EXISTS VietProShop_Laravel;
CREATE DATABASE IF NOT EXISTS VietProShop_Laravel CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE VietProShop_Laravel;

# - - - - - - - - - - - - - - - - - - - - Create Tables - - - - - - - - - - - - - - - - - - - -  #

# Create Table
DROP TABLE IF EXISTS vp_users;
CREATE TABLE IF NOT EXISTS vp_users (
    id INT AUTO_INCREMENT,

    email VARCHAR(64),
    password VARCHAR(64),
    level  TINYINT,
    remember_token VARCHAR(128),

    created_by NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    created_at DATETIME DEFAULT CURRENT_TIME,
    updated_by NVARCHAR(32) DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL,
    version INT DEFAULT 1,
    deleted BOOLEAN DEFAULT FALSE,

    PRIMARY KEY (id)
) ENGINE InnoDB;

# - - - - - - - - - - - - - - - - - - - - Insert Data - - - - - - - - - - - - - - - - - - - -  #

#Password: 123456
INSERT INTO vp_users (email, password, level)
VALUES ('DinhHieu8896@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO vp_users (email, password, level)
VALUES ('Hieu.iceTea@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 2);
INSERT INTO vp_users (email, password, level)
VALUES ('A@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO vp_users (email, password, level)
VALUES ('B@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 2);

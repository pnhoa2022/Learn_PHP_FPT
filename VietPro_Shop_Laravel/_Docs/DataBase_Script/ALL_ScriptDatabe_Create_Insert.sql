# - - - - - - - - - - - - - - - - - - - - Create DataBase - - - - - - - - - - - - - - - - - - - -  #
# Create DataBase
DROP DATABASE IF EXISTS VietPro_Shop_Laravel;
CREATE DATABASE IF NOT EXISTS VietPro_Shop_Laravel CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE VietPro_Shop_Laravel;
#SET time_zone = '+7:00';
# - - - - - - - - - - - - - - - - - - - - Create Tables - - - - - - - - - - - - - - - - - - - -  #

# Create Table
DROP TABLE IF EXISTS user;
CREATE TABLE IF NOT EXISTS user (
    user_id INT AUTO_INCREMENT,

    name VARCHAR(64),
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

    PRIMARY KEY (user_id)
) ENGINE InnoDB;

# Create Table
DROP TABLE IF EXISTS category;
CREATE TABLE IF NOT EXISTS category (
    category_id INT AUTO_INCREMENT,

    name VARCHAR(64),
    slug VARCHAR(64),

    created_by NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    created_at DATETIME DEFAULT CURRENT_TIME,
    updated_by NVARCHAR(32) DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL,
    version INT DEFAULT 1,
    deleted BOOLEAN DEFAULT FALSE,

    PRIMARY KEY (category_id)
) ENGINE InnoDB;

# - - - - - - - - - - - - - - - - - - - - Insert Data - - - - - - - - - - - - - - - - - - - -  #

#Password: 123456
INSERT INTO user (name, email, password, level)
VALUES ('Hiếu iceTea', 'DinhHieu8896@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO user (name, email, password, level)
VALUES ('Hiếu iceTea', 'Hieu.iceTea@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 2);
INSERT INTO user (name, email, password, level)
VALUES ('Hiếu iceTea', 'A@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO user (name, email, password, level)
VALUES ('Hiếu iceTea', 'B@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 2);

INSERT INTO category (name, slug)
VALUES ('iPhone', 'iPhone');
INSERT INTO category (name, slug)
VALUES ('Samsung', 'Samsung');
INSERT INTO category (name, slug)
VALUES ('LG', 'LG');
INSERT INTO category (name, slug)
VALUES ('SONY', 'SONY');
INSERT INTO category (name, slug)
VALUES ('Xiaomi', 'Xiaomi');



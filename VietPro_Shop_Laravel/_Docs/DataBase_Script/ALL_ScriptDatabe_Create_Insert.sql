# - - - - - - - - - - - - - - - - - - - - Create DataBase - - - - - - - - - - - - - - - - - - - -  #
# Create DataBase
DROP DATABASE IF EXISTS `VietPro_Shop_Laravel`;
CREATE DATABASE IF NOT EXISTS `VietPro_Shop_Laravel` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `VietPro_Shop_Laravel`;
#SET time_zone = '+7:00';
# - - - - - - - - - - - - - - - - - - - - Create Tables - - - - - - - - - - - - - - - - - - - -  #

# Create Table
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
    `user_id` INT AUTO_INCREMENT,

    `name` VARCHAR(64),
    `email` VARCHAR(64),
    `password` VARCHAR(64),
    `level`  TINYINT,
    `remember_token` VARCHAR(128),

    `created_by` NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    `created_at` DATETIME DEFAULT CURRENT_TIME,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` DATETIME DEFAULT NULL,
    `version` INT DEFAULT 1,
    `deleted` BOOLEAN DEFAULT FALSE,

    PRIMARY KEY (`user_id`)
) ENGINE InnoDB;

# Create Table
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
    `category_id` INT AUTO_INCREMENT,

    `name` VARCHAR(64),
    `slug` VARCHAR(64),

    `created_by` NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    `created_at` DATETIME DEFAULT CURRENT_TIME,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` DATETIME DEFAULT NULL,
    `version` INT DEFAULT 1,
    `deleted` BOOLEAN DEFAULT FALSE,

    PRIMARY KEY (`category_id`)
) ENGINE InnoDB;

# Create Table
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
    `product_id` INT AUTO_INCREMENT,

    `category_id` INT UNSIGNED,

    `name` VARCHAR(64),
    `slug` VARCHAR(64),
    `price` INT(64) UNSIGNED,
    `image` VARCHAR(128),
    `warranty` VARCHAR(64),
    `accessories` VARCHAR(64),
    `condition` VARCHAR(64),
    `promotion` VARCHAR(64),
    `status` BOOLEAN,
    `description` TEXT,
    `featured` BOOLEAN,

    `created_by` NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    `created_at` DATETIME DEFAULT CURRENT_TIME,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` DATETIME DEFAULT NULL,
    `version` INT DEFAULT 1,
    `deleted` BOOLEAN DEFAULT FALSE,

    PRIMARY KEY (`product_id`)
) ENGINE InnoDB;

# - - - - - - - - - - - - - - - - - - - - Insert Data - - - - - - - - - - - - - - - - - - - -  #

#Password: 123456
INSERT INTO user (name, email, password, level)
VALUES ('Hiếu iceTea', 'DinhHieu8896@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO user (name, email, password, level)
VALUES ('Host', 'Hieu.iceTea@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 0);
INSERT INTO user (name, email, password, level)
VALUES ('Admin', 'admin@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO user (name, email, password, level)
VALUES ('User', 'host@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 2);

INSERT INTO category (name, slug)
VALUES ('iPhone', 'iphone');
INSERT INTO category (name, slug)
VALUES ('Samsung', 'samsung');
INSERT INTO category (name, slug)
VALUES ('Xiaomi', 'xiaomi');
INSERT INTO category (name, slug)
VALUES ('LG', 'lg');
INSERT INTO category (name, slug)
VALUES ('SONY', 'sony');

INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (3, 'Xiaomi Redmi Note 5 Pro', 'slug', 15599000, 'product_image_demo_1.jpg', 'warranty', 'accessories', 'condition', 'promotion', 1, 'Miêu tả 3', 0);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (2, 'Samsung Galaxy S10 512G', 'slug', 18699000, 'product_image_demo_2.jpg', 'warranty', 'accessories', 'condition', 'promotion', 0, 'Miêu tả 2', 0);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (1, 'iPhone 7 Plus 128G', 'slug', 22599000, 'product_image_demo_3.jpg', 'warranty', 'accessories', 'condition', 'promotion', 1, 'Miêu tả 1', 1);

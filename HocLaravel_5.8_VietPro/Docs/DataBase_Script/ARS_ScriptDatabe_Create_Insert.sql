# - - - - - - - - - - - - - - - - - - - - Create DataBase - - - - - - - - - - - - - - - - - - - -  #

# Create DataBase
DROP DATABASE IF EXISTS HocLaravel_5_8_VietPro;
CREATE DATABASE IF NOT EXISTS HocLaravel_5_8_VietPro CHARACTER SET utf8 COLLATE utf8_general_ci;;

USE HocLaravel_5_8_VietPro;

# - - - - - - - - - - - - - - - - - - - - Create Tables - - - - - - - - - - - - - - - - - - - -  #

# Create Table
DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
    id_user INT AUTO_INCREMENT,

    email VARCHAR(64),
    password VARCHAR(64),
    level  TINYINT,

    created_by NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    created_at DATETIME DEFAULT CURRENT_TIME,
    updated_by NVARCHAR(32) DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL,
    version INT DEFAULT 1,
    active BOOLEAN DEFAULT TRUE,

    PRIMARY KEY (id_user)
) ENGINE InnoDB;


# Create Table
DROP TABLE IF EXISTS info;
CREATE TABLE IF NOT EXISTS info (
     id_info INT AUTO_INCREMENT,

     id_number INT,
     address VARCHAR(64),
     phone VARCHAR(64),
     id_user INT UNSIGNED,

     created_by NVARCHAR(32) DEFAULT 'Hieu-iceTea',
     created_at DATETIME DEFAULT CURRENT_TIME,
     updated_by NVARCHAR(32) DEFAULT NULL,
     updated_at DATETIME DEFAULT NULL,
     version INT DEFAULT 1,
     active BOOLEAN DEFAULT TRUE,

     PRIMARY KEY (id_info)
) ENGINE InnoDB;

# Create Table
DROP TABLE IF EXISTS comment;
CREATE TABLE IF NOT EXISTS comment (
    id_comment INT AUTO_INCREMENT,

    content VARCHAR(64),
    id_user INT UNSIGNED,

    created_by NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    created_at DATETIME DEFAULT CURRENT_TIME,
    updated_by NVARCHAR(32) DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL,
    version INT DEFAULT 1,
    active BOOLEAN DEFAULT TRUE,

    PRIMARY KEY (id_comment)
) ENGINE InnoDB;

# - - - - - - - - - - - - - - - - - - - - Insert Data - - - - - - - - - - - - - - - - - - - -  #

#Password: 123456
INSERT INTO users (email, password, level)
VALUES ('DinhHieu8896@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO users (email, password, level)
VALUES ('Hieu.iceTea@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 2);
INSERT INTO users (email, password, level)
VALUES ('A@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO users (email, password, level)
VALUES ('B@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 2);

INSERT INTO info (id_number, address, phone, id_user)
VALUES (123456, 'Ha Noi', '0868663315', 1);
INSERT INTO info (id_number, address, phone, id_user)
VALUES (123456, 'Nghe An', '0328799000', 2);

INSERT INTO comment (content, id_user)
VALUES ('Hiếu đẹp trai', 1);
INSERT INTO comment (content, id_user)
VALUES ('Hiếu tài giỏi vô đối', 1);
INSERT INTO comment (content, id_user)
VALUES ('content Ahihi', 2);

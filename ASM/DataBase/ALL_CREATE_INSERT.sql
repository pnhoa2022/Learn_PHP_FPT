DROP DATABASE IF EXISTS ASM_PHP;
CREATE DATABASE IF NOT EXISTS ASM_PHP;

USE ASM_PHP;

DROP TABLE IF EXISTS Users;
CREATE TABLE IF NOT EXISTS Users
(
    IDUser      INT AUTO_INCREMENT,

    UserName    VARCHAR(128),
    Password    VARCHAR(128),
    Email       VARCHAR(64),
    Phone       VARCHAR(32),
    FullName    VARCHAR(64),

    CreatedBy   NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    UpdatedBy   NVARCHAR(32) DEFAULT NULL,
    CreatedDate DATETIME     DEFAULT CURRENT_TIME,
    UpdatedDate DATETIME     DEFAULT NULL,
    Enabled     BOOLEAN      DEFAULT TRUE,

    PRIMARY KEY (IDUser)
) ENGINE InnoDB;

INSERT INTO Users (UserName, Password, Email, Phone, FullName)
VALUES ('Hieu-iceTea', 'abc123', 'DinhHieu8896@gmail.com', '0868 6633 15', 'Nguyễn Đình Hiếu');


DROP TABLE IF EXISTS Product;
CREATE TABLE IF NOT EXISTS Product
(
    IDProduct   INT AUTO_INCREMENT,

    Name        VARCHAR(128),
    Description VARCHAR(128),
    Image       VARCHAR(128),

    CreatedBy   NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    UpdatedBy   NVARCHAR(32) DEFAULT NULL,
    CreatedDate DATETIME     DEFAULT CURRENT_TIME,
    UpdatedDate DATETIME     DEFAULT NULL,
    Enabled     BOOLEAN      DEFAULT TRUE,

    PRIMARY KEY (IDProduct)
) ENGINE InnoDB;

INSERT INTO Product (Name, Description, Image)
    VALUES ('Macbook PRO 1', 'Description 1', 'macbook_1.jpg');
INSERT INTO Product (Name, Description, Image)
    VALUES ('Macbook Air 2', 'Description 2', 'macbook_2.jpg');
INSERT INTO Product (Name, Description, Image)
    VALUES ('PC 3', 'Description 3', 'macbook_3.jpg');
INSERT INTO Product (Name, Description, Image)
    VALUES ('Laptop 4', 'Description 4', 'macbook-air-2020-feature-3.jpg');
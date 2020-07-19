DROP DATABASE IF EXISTS Authentication;
CREATE DATABASE IF NOT EXISTS Authentication;

USE Authentication;

DROP TABLE IF EXISTS Users ;
CREATE TABLE IF NOT EXISTS Users (
    IDUser INT AUTO_INCREMENT,

    UserName VARCHAR(128),
    Password VARCHAR(128),
    Email VARCHAR(64),
    Phone VARCHAR(32),
    FullName VARCHAR(64),

    # 0: host | 1: admin | 2: user
    Type INT,

    CreatedBy NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    UpdatedBy NVARCHAR(32) DEFAULT NULL,
    CreatedDate DATETIME DEFAULT CURRENT_TIME,
    UpdatedDate DATETIME DEFAULT NULL,
    Version INT DEFAULT 1,
    Enabled BOOLEAN DEFAULT TRUE,

    PRIMARY KEY (IDUser)
) ENGINE InnoDB;

INSERT INTO Users (UserName, Password, Email, Phone, FullName, Type)
    VALUES ('Host', '$2y$10$zB86lyE0ePe24Ri4pIQJbOa.5gBcy4evyM37VNXUuPrEp6hQggWlm', 'DinhHieu8896@gmail.com', '0868 6633 15', 'Nguyễn Đình Hiếu', 0);
INSERT INTO Users (UserName, Password, Email, Phone, FullName, Type)
VALUES ('Hieu-iceTea', '$2y$10$zB86lyE0ePe24Ri4pIQJbOa.5gBcy4evyM37VNXUuPrEp6hQggWlm', 'DinhHieu8896@gmail.com', '0868 6633 15', 'Nguyễn Đình Hiếu', 0);
INSERT INTO Users (UserName, Password, Email, Phone, FullName, Type)
VALUES ('Admin', '$2y$10$zB86lyE0ePe24Ri4pIQJbOa.5gBcy4evyM37VNXUuPrEp6hQggWlm', 'DinhHieu8896@gmail.com', '0868 6633 15', 'Nguyễn Đình Hiếu', 1);
INSERT INTO Users (UserName, Password, Email, Phone, FullName, Type)
VALUES ('User', '$2y$10$zB86lyE0ePe24Ri4pIQJbOa.5gBcy4evyM37VNXUuPrEp6hQggWlm', 'DinhHieu8896@gmail.com', '0868 6633 15', 'Nguyễn Đình Hiếu', 2);

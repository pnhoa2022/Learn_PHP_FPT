DROP DATABASE IF EXISTS MyUsers;
CREATE DATABASE IF NOT EXISTS MyUsers;

USE MyUsers;

DROP TABLE IF EXISTS Users ;
CREATE TABLE IF NOT EXISTS Users (
    IDUser INT AUTO_INCREMENT,

    UserName VARCHAR(128),
    Password VARCHAR(128),
    Email VARCHAR(64),
    Phone VARCHAR(32),
    FullName VARCHAR(64),

    CreatedBy NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    UpdatedBy NVARCHAR(32) DEFAULT NULL,
    CreatedDate DATETIME DEFAULT CURRENT_TIME,
    UpdatedDate DATETIME DEFAULT NULL,
    Enabled BOOLEAN DEFAULT TRUE,

    PRIMARY KEY (IDUser)
) ENGINE InnoDB;

SELECT * FROM Users WHERE UserName = '';

SELECT * FROM Users WHERE UserName = 'Hieu-iceTea';

INSERT INTO Users (UserName, Password, Email, Phone, FullName)
    VALUES ('UserName', 'Password', 'Email', 'Phone', 'FullName');
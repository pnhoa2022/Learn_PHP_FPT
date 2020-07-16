DROP DATABASE IF EXISTS Practical_Exam_PHP;
CREATE DATABASE IF NOT EXISTS Practical_Exam_PHP;

USE Practical_Exam_PHP;

DROP TABLE IF EXISTS Users;
CREATE TABLE IF NOT EXISTS Users
(
    IDUser      INT AUTO_INCREMENT,

    UserName    VARCHAR(128),
    Password    VARCHAR(128),
    Email       VARCHAR(64),
    FullName    VARCHAR(64),

    CreatedBy   NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    UpdatedBy   NVARCHAR(32) DEFAULT NULL,
    CreatedDate DATETIME     DEFAULT CURRENT_TIME,
    UpdatedDate DATETIME     DEFAULT NULL,
    Enabled     BOOLEAN      DEFAULT TRUE,

    PRIMARY KEY (IDUser)
) ENGINE InnoDB;

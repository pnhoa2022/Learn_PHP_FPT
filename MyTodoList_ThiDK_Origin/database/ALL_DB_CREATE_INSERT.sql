# - - - - - - - - - - - - - - - - - - - - Create DataBase - - - - - - - - - - - - - - - - - - - -  #

# Create DataBase
DROP DATABASE IF EXISTS MyTodoList;
CREATE DATABASE IF NOT EXISTS MyTodoList;

USE MyTodoList;

# - - - - - - - - - - - - - - - - - - - - Create Tables - - - - - - - - - - - - - - - - - - - -  #

# Create Table
DROP TABLE IF EXISTS Tasks;
CREATE TABLE IF NOT EXISTS Tasks (
    ID INT(10) AUTO_INCREMENT,

    Name VARCHAR(255) NOT NULL,

    Created_By NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    Created_At DATETIME DEFAULT CURRENT_TIME,
    Updated_By NVARCHAR(32) DEFAULT NULL,
    Updated_At DATETIME DEFAULT NULL,
    Version INT DEFAULT 1,
    Enabled BOOLEAN DEFAULT TRUE,

    PRIMARY KEY (ID)
) ENGINE InnoDB;


# - - - - - - - - - - - - - - - - - - - - Insert Data - - - - - - - - - - - - - - - - - - - -  #

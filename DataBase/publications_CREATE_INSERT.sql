DROP DATABASE IF EXISTS publications;
CREATE DATABASE IF NOT EXISTS publications;

USE publications;

DROP TABLE IF EXISTS classics ;
CREATE TABLE IF NOT EXISTS classics  (
    author VARCHAR(128),
    title VARCHAR(128),
    category VARCHAR(16),
    year SMALLINT,
    isbn CHAR(13),

    INDEX (author(20)),
    INDEX (title(20)),
    INDEX (category(4)),
    INDEX (year),

    CreatedBy NVARCHAR(32),
    UpdatedBy NVARCHAR(32),
    CreatedDate DATETIME,
    UpdatedDate DATETIME,
    Enabled BOOLEAN,

    PRIMARY KEY (isbn)
) ENGINE InnoDB;

ALTER TABLE classics ADD FULLTEXT (author, title);

INSERT INTO classics (author, title, category, year, isbn, CreatedBy, UpdatedBy, CreatedDate, UpdatedDate, Enabled)
    VALUES ('Charles Dickens', 'Little Dorrit', 'Fiction', '1857', '9788141439969', 'Hieu-iceTea', NULL, CURRENT_TIME, NULL, true);
INSERT INTO classics (author, title, category, year, isbn, CreatedBy, UpdatedBy, CreatedDate, UpdatedDate, Enabled)
    VALUES ('Hieu iceTea', 'Developer', 'IT', '1996', '08081996', 'Hieu-iceTea', NULL, CURRENT_TIME, NULL, true);


DROP TABLE IF EXISTS customers  ;
CREATE TABLE IF NOT EXISTS customers   (
    name VARCHAR(128),
    isbn CHAR(13),

    CreatedBy NVARCHAR(32),
    UpdatedBy NVARCHAR(32),
    CreatedDate DATETIME,
    UpdatedDate DATETIME,
    Enabled BOOLEAN,

    PRIMARY KEY (isbn)
) ENGINE InnoDB;

INSERT INTO customers (name, isbn, CreatedBy, UpdatedBy, CreatedDate, UpdatedDate, Enabled)
    VALUES ('Joe Bloggs', '9780099533474', 'Hieu-iceTea', NULL, CURRENT_TIME, NULL, true)
DROP DATABASE IF EXISTS myGallery;
CREATE DATABASE IF NOT EXISTS myGallery;

USE myGallery;

DROP TABLE IF EXISTS gallery ;
CREATE TABLE IF NOT EXISTS gallery (
    IDGallery INT(11) AUTO_INCREMENT,
    titleGallery VARCHAR(128),
    descGallery VARCHAR(128),
    imgFullNameGallery VARCHAR(128),
    orderGallery INT(11),

    CreatedBy NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    UpdatedBy NVARCHAR(32) DEFAULT NULL,
    CreatedDate DATETIME DEFAULT CURRENT_TIME,
    UpdatedDate DATETIME DEFAULT NULL,
    Enabled BOOLEAN DEFAULT TRUE,

    PRIMARY KEY (IDGallery)
) ENGINE InnoDB;

INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery)
    VALUES ('Nail', 'Softly hand', 'hand.jpg', 1);
INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery)
    VALUES ('titleGallery2', 'descGallery2', 'teamwork.jpg', 2);
INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery)
    VALUES ('titleGallery3', 'descGallery3', 'bluesky.jpg', 3);
INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery)
    VALUES ('titleGallery4', 'descGallery4', 'cascade.jpg', 4);
INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery)
    VALUES ('titleGallery5', 'descGallery5', 'mount.jpg', 5);
INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery)
    VALUES ('titleGallery6', 'descGallery6', 'face.jpg', 6);
INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery)
    VALUES ('titleGallery7', 'descGallery7', 'flying.jpg', 7);
INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery)
    VALUES ('titleGallery8', 'descGallery8', 'countryside.jpg', 8);


SELECT * FROM gallery ORDER BY orderGallery DESC;
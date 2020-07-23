DROP DATABASE IF EXISTS My_Note;
CREATE DATABASE IF NOT EXISTS My_Note;

USE My_Note;

DROP TABLE IF EXISTS Note ;
CREATE TABLE IF NOT EXISTS Note (
    IDNote INT AUTO_INCREMENT,

    Title VARCHAR(128),
    Content  VARCHAR(256),

    CreatedBy NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    UpdatedBy NVARCHAR(32) DEFAULT NULL,
    CreatedDate DATETIME DEFAULT CURRENT_TIME,
    UpdatedDate DATETIME DEFAULT NULL,
    Version INT DEFAULT 1,
    Enabled BOOLEAN DEFAULT TRUE,

    PRIMARY KEY (IDNote)
) ENGINE InnoDB;


INSERT INTO Note (Title, Content) VALUES ('Việc cần làm', 'Học MVC, Laravel');
INSERT INTO Note (Title, Content) VALUES ('Món ăn ngon', 'Sườn xào chua ngọt, Canh bí hầm xương, Trứng muối');
INSERT INTO Note (Title, Content) VALUES ('Các câu tán gái hay ho', 'Ahihi, Hiếu không có đâu');

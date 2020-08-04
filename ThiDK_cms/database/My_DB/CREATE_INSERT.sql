DROP DATABASE IF EXISTS cms;
CREATE DATABASE IF NOT EXISTS cms;

USE cms;

DROP TABLE IF EXISTS Notes ;
CREATE TABLE IF NOT EXISTS Notes (
    ID INT AUTO_INCREMENT,

    Title VARCHAR(128),
    Content  VARCHAR(256),

    Created_By NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    Created_At DATETIME DEFAULT CURRENT_TIME,
    Updated_By NVARCHAR(32) DEFAULT NULL,
    Updated_At DATETIME DEFAULT NULL,
    Version INT DEFAULT 1,
    Enabled BOOLEAN DEFAULT TRUE,

    PRIMARY KEY (ID)
) ENGINE InnoDB;


INSERT INTO Notes (Title, Content) VALUES ('Việc cần làm', 'Học MVC, Laravel');
INSERT INTO Notes (Title, Content) VALUES ('Món ăn ngon', 'Sườn xào chua ngọt, Canh bí hầm xương, Trứng muối');
INSERT INTO Notes (Title, Content) VALUES ('Các câu tán gái hay ho', 'Ahihi, Hiếu không có đâu');


# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                           Create DataBase                                           #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

# Create DataBase
#DROP DATABASE IF EXISTS `epiz_29739365_Shop_Mobile_VietPro`;
#CREATE DATABASE IF NOT EXISTS `epiz_29739365_Shop_Mobile_VietPro` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

#SHOW VARIABLES LIKE 'SQL_MODE';
#SHOW GLOBAL VARIABLES LIKE 'SQL_MODE';
#SET SQL_MODE = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
#SET GLOBAL SQL_MODE = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
#SET SQL_MODE = 'ALLOW_INVALID_DATES';

USE `epiz_29739365_Shop_Mobile_VietPro`;

SET time_zone = '+07:00';
ALTER DATABASE `epiz_29739365_Shop_Mobile_VietPro` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                            Create Tables                                            #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

# Create Table
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user`
(
    `user_id`        INT AUTO_INCREMENT,

    `name`           VARCHAR(64)  NOT NULL,
    `email`          VARCHAR(64)  NOT NULL,
    `password`       VARCHAR(128) NOT NULL,
    `level`          TINYINT      NOT NULL,
    `remember_token` VARCHAR(128),

    `created_by`     NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    `created_at`     TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`     NVARCHAR(32) DEFAULT NULL,
    `updated_at`     TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`        INT          DEFAULT 1,
    `deleted`        BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`user_id`)
) ENGINE InnoDB;

# Create Table
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category`
(
    `category_id` INT AUTO_INCREMENT,

    `name`        VARCHAR(64) NOT NULL,
    `slug`        VARCHAR(64) NOT NULL,

    `created_by`  NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    `created_at`  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`  NVARCHAR(32) DEFAULT NULL,
    `updated_at`  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`     INT          DEFAULT 1,
    `deleted`     BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`category_id`)
) ENGINE InnoDB;

# Create Table
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product`
(
    `product_id`  INT AUTO_INCREMENT,

    `category_id` INT UNSIGNED NOT NULL,

    `name`        VARCHAR(64)  NOT NULL,
    `slug`        VARCHAR(64)  NOT NULL,
    `price`       INT UNSIGNED,
    `image`       VARCHAR(128),
    `warranty`    VARCHAR(64),
    `accessories` VARCHAR(64),
    `condition`   VARCHAR(64),
    `promotion`   VARCHAR(64),
    `status`      BOOLEAN,
    `description` TEXT,
    `featured`    BOOLEAN,

    `created_by`  NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    `created_at`  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`  NVARCHAR(32) DEFAULT NULL,
    `updated_at`  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`     INT          DEFAULT 1,
    `deleted`     BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`product_id`)
) ENGINE InnoDB;

# Create Table
DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment`
(
    `comment_id` INT AUTO_INCREMENT,

    `product_id` INT UNSIGNED NOT NULL,

    `email`      VARCHAR(64),
    `name`       VARCHAR(64),
    `content`    VARCHAR(256),

    `created_by` NVARCHAR(32) DEFAULT 'Hieu-iceTea',
    `created_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`comment_id`)
) ENGINE InnoDB;

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                             Insert Data                                             #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

#Password: 123456

INSERT INTO user (name, email, password, level)
VALUES ('Hiếu iceTea', 'DinhHieu8896@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO user (name, email, password, level)
VALUES ('Hiếu iceTea', 'Hieu.iceTea@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 0);
INSERT INTO user (name, email, password, level)
VALUES ('Host', 'host@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 0);
INSERT INTO user (name, email, password, level)
VALUES ('Admin', 'admin@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 1);
INSERT INTO user (name, email, password, level)
VALUES ('User', 'user@gmail.com', '$2y$10$YKY51A9REcXLZVRAC87AcuXnC.Nb8WK8rD/WgfAVxPSAelLZHQf06', 2);

INSERT INTO category (name, slug)
VALUES ('iPhone', 'iphone');
INSERT INTO category (name, slug)
VALUES ('Samsung', 'samsung');
INSERT INTO category (name, slug)
VALUES ('Xiaomi', 'xiaomi');
INSERT INTO category (name, slug)
VALUES ('LG', 'lg');
INSERT INTO category (name, slug)
VALUES ('SONY', 'sony');

INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (1, 'iPhone 6s Plus', 'iphone-6s-plus', 22599000, 'product_image_demo_4.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 1, 'Mô tả', 0);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (1, 'iPhone XS Max', 'iphone-xs-max', 22599000, 'product_image_demo_5.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 1, 'Mô tả', 1);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (1, 'iPhone 11', 'iphone-11', 22599000, 'product_image_demo_6.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 1, 'Mô tả', 1);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (1, 'iPhone 11 PRO MAX', 'iphone-11-pro-max', 22599000, 'product_image_demo_7.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 1, 'Mô tả', 0);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (1, 'iPhone 12', 'iphone-12', 22599000, 'product_image_demo_8.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 1, 'Mô tả', 1);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (1, 'iPhone 8', 'iphone-8', 22599000, 'product_image_demo_9.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 1, 'Mô tả', 1);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (1, 'iPhone 8 Plus', 'iphone-8-plus', 22599000, 'product_image_demo_10.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 1, 'Mô tả', 0);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (3, 'Xiaomi Redmi Note 5 Pro', 'xiaomi-redmi-note-5-Pro', 15599000, 'product_image_demo_1.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 1, 'Miêu tả 3', 1);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (2, 'Samsung Galaxy S10 512G', 'samsung-galaxy-s10-512g', 18699000, 'product_image_demo_2.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 0, 'Miêu tả 2', 1);
INSERT INTO product (category_id, name, slug, price, image, warranty, accessories, `condition`, promotion, status, description, featured)
VALUES (1, 'iPhone 7 Plus 128G', 'iphone-7-plus-128g', 22599000, 'product_image_demo_3.jpg', '1 đổi 1 trong 12 tháng', 'Dây cáp sạc, tai nghe', 'Máy mới 100%', 'Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank', 1, '<h2>Đặc điểm nổi bật của iPhone 7 Plus 128GB</h2><br><p><img src="https://cdn.tgdd.vn/Products/Images/42/87839/Slider/--man-hinh.jpg" /></p><br><h3>Được&nbsp;<a href="https://www.thegioididong.com/apple" target="_blank">Apple</a>&nbsp;c&ocirc;ng bố v&agrave;o th&aacute;ng 9/2016 đến nay cũng gần 3 năm nhưng&nbsp;<a href="https://www.thegioididong.com/dtdd/iphone-7-plus-128gb" target="_blank">iPhone 7 Plus 128 GB</a>&nbsp;vẫn chưa c&oacute; dấu hiệu hạ nhiệt. Được xem l&agrave; phi&ecirc;n bản chuyển m&igrave;nh của&nbsp;<a href="https://www.thegioididong.com/dtdd/iphone-6-plus-128gb" target="_blank">iPhone 6 Plus</a>&nbsp;c&oacute; tuy vẫn giữ nguy&ecirc;n k&iacute;ch thước nhưng vẫn một v&agrave;i sự thay đổi về camera, chất lượng pin v&agrave; hiệu năng được n&acirc;ng cấp.&nbsp;</h3><br><h3>Thay đổi về thiết kế mặt lưng c&ugrave;ng với camera&nbsp;so với iPhone 6 Plus</h3><br><p>Mặt lưng của iPhone 7 Plus được thiết kế với phần ăng-ten được đưa v&ograve;ng l&ecirc;n tr&ecirc;n thay v&igrave; cắt ngang mặt lưng như những phi&ecirc;n bản trước l&agrave; iPhone 6 Plus mang lại cảm gi&aacute;c thoải m&aacute;i khi cầm nắm.</p><br><p><a href="https://www.thegioididong.com/images/42/87839/iphone-7-plus-128gb-272320-092340.jpg" onclick="return false;"><img alt="Thay đổi với thiết kế mặt lưng - iPhone 7 Plus" src="https://cdn.tgdd.vn/Products/Images/42/87839/iphone-7-plus-128gb-272320-092340.jpg" /></a></p><br><p>Ở phi&ecirc;n bản n&acirc;ng cấp n&agrave;y th&igrave; cổng 3.5 mm của tai nghe được loại bỏ ho&agrave;n to&agrave;n, thay v&agrave;o đ&oacute; cổng lightning sẽ ki&ecirc;m lu&ocirc;n nhiệm vụ của cổng 3.5 mm bấy l&acirc;u nay.</p><br><p><a href="https://www.thegioididong.com/images/42/87839/iphone-7-plus-128gb-272020-092047.jpg" onclick="return false;"><img alt="Loại bỏ jack 3.5mm trên iPhone 7 Plus - iPhone 7 Plus" src="https://cdn.tgdd.vn/Products/Images/42/87839/iphone-7-plus-128gb-272020-092047.jpg" /></a></p><br><p>N&uacute;t home quen thuộc cũng được nh&agrave; Apple n&acirc;ng cấp, loại bỏ n&uacute;t home vật l&yacute; m&agrave; thay v&agrave;o đ&oacute; l&agrave; cảm biến lực cho việc thao t&aacute;c mượt m&agrave;, nhanh ch&oacute;ng v&agrave; l&agrave;m cho độ bền của n&uacute;t cao hơn.</p><br><p><a href="https://www.thegioididong.com/images/42/87839/iphone-7-plus-128gb-173420-103408.jpg" onclick="return false;"><img alt="Nút Home cảm ứng thay thế nút Home vật lý - iPhone 7 Plus" src="https://cdn.tgdd.vn/Products/Images/42/87839/iphone-7-plus-128gb-173420-103408.jpg" /></a></p><br><p><a href="https://www.thegioididong.com/hoi-dap/man-hinh-retina-la-gi-905780" target="_blank">M&agrave;n h&igrave;nh Retina</a>&nbsp;tr&ecirc;n 7 Plus hỗ trợ DCI-P3 gam m&agrave;u rộng, nghĩa l&agrave; ch&uacute;ng c&oacute; khả năng t&aacute;i tạo m&agrave;u sắc trong phạm vi của sRGB. N&oacute;i đơn giản, ch&uacute;ng c&oacute; thể hiển thị sống động hơn, sắc th&aacute;i h&igrave;nh ảnh tốt hơn trước đ&oacute;. Độ ph&acirc;n giải, mật độ điểm ảnh v&agrave; k&iacute;ch thước m&agrave;n h&igrave;nh vẫn giữ nguy&ecirc;n so với iPhone 6s Plus.</p><br><p><a href="https://www.thegioididong.com/images/42/87839/iphone-7-plus-128gb-272120-092123.jpg" onclick="return false;"><img alt="Màn hình Retina trên iPhone 7 Plus - iPhone 7 Plus" src="https://cdn.tgdd.vn/Products/Images/42/87839/iphone-7-plus-128gb-272120-092123.jpg" /></a></p><br><h3>Phần camera k&eacute;p được cải thiện tối ưu</h3><br><p>iPhone 7 Plus l&agrave; chiếc&nbsp;<a href="https://www.thegioididong.com/dtdd" target="_blank">smartphone</a>&nbsp;đầu ti&ecirc;n được trang bị camera k&eacute;p độc đ&aacute;o, với cụm camera ch&iacute;nh&nbsp;<a href="https://www.thegioididong.com/dtdd-camera-goc-rong" target="_blank">g&oacute;c rộng</a>&nbsp;v&agrave; camera phụ&nbsp;<a href="https://www.thegioididong.com/dtdd-camera-zoom" target="_blank">telephoto</a>&nbsp;cho người d&ugrave;ng dễ d&agrave;ng lưu lại những khoảng khắc đ&aacute;ng nhớ.</p><br><p><a href="https://www.thegioididong.com/images/42/87839/iphone-7-plus-128gb-273820-093851.jpg" onclick="return false;"><img alt="Thiết kế camera kép - iPhone 7 Plus" src="https://cdn.tgdd.vn/Products/Images/42/87839/iphone-7-plus-128gb-273820-093851.jpg" /></a></p><br><p>Hơn nữa, theo tr&agrave;o lưu selfie n&ecirc;n camera trước tr&ecirc;n iPhone 7 Plus được n&acirc;ng l&ecirc;n 7MP.</p><br><p><a href="https://www.thegioididong.com/images/42/87839/iphone-7-plus-128gb-274720-094723.jpg" onclick="return false;"><img alt="Ảnh chụp từ camera - iPhone 7 Plus" src="https://cdn.tgdd.vn/Products/Images/42/87839/iphone-7-plus-128gb-274720-094723.jpg" /></a></p><br><p>Smartphone n&agrave;y được trang bị hệ thống loa k&eacute;p, 2 loa được bố tr&iacute; ở đầu v&agrave; đu&ocirc;i m&aacute;y. Apple kh&ocirc;ng chia sẻ nhiều về hệ thống loa k&eacute;p n&agrave;y nhưng chắc chắn sẽ l&agrave;m h&agrave;i l&ograve;ng người d&ugrave;ng . Điều n&agrave;y sẽ được kiểm chứng, đ&aacute;nh gi&aacute; khi sản phẩm được sử dụng nhiều trong thời gian tới.</p><br><h3>Cấu h&igrave;nh mạnh mẽ, chiến mọi loại game</h3><br><p>Với con chip Apple A10 Fusion 4 nh&acirc;n mạnh mẽ cho ph&eacute;p người d&ugrave;ng chiến hầu hết mọi loại game đ&igrave;nh đ&aacute;m như PUBG, Li&ecirc;n Qu&acirc;n Mobile, Free Fire,... với cấu h&igrave;nh game gần như tốt nhất</p><br><p><a href="https://www.thegioididong.com/images/42/87839/iphone-7-plus-128gb-170220-110231.jpg" onclick="return false;"><img alt="Cấu hình mạnh, chơi game mượt mà nè - iPhone 7 Plus" src="https://cdn.tgdd.vn/Products/Images/42/87839/iphone-7-plus-128gb-170220-110231.jpg" /></a></p><br><p>Theo Apple c&ocirc;ng bố, iPhone 7 Plus với lượng pin chỉ c&oacute; 2900 mAh nhưng smartphone n&agrave;y vẫn cho người dừng trải nghiệm lướt web l&ecirc;n đến 13h cho trải nghiệm tốt hơn.</p><br><p><a href="https://www.thegioididong.com/images/42/87839/iphone-7-plus-128gb-272320-092314.jpg" onclick="return false;"><img alt="Tham khảo iPhone 7 Plus tại Thế Giới Di Động nghen - iPhone 7 Plus" src="https://cdn.tgdd.vn/Products/Images/42/87839/iphone-7-plus-128gb-272320-092314.jpg" /></a></p><br><p>Như vậy, iPhone 7 Plus với mức gi&aacute; vừa phải, ph&ugrave; hợp với t&uacute;i tiền nhưng mang cho m&igrave;nh nhiều điểm mạnh, nếu bạn l&agrave; một người th&iacute;ch thiết kế đẹp, camera tốt v&agrave; cần thiết bị c&oacute; cấu h&igrave;nh tốt th&igrave; sản phẩm chắc chắn l&agrave; sự lựa chọn đ&aacute;ng lưu t&acirc;m trong tầm gi&aacute;</p>', 1);

INSERT INTO comment (product_id, email, name, content)
VALUES (10, 'DinhHieu8896@gmail.com', 'Nguyễn Đình Hiếu', 'Sản phẩm tuyệt vời!');
INSERT INTO comment (product_id, email, name, content)
VALUES (10, 'Hieu.iceTea@gmail.com', 'Hiếu iceTea', 'Tôi đã mua nó và rất hài lòng!');

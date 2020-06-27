/*
 Navicat Premium Data Transfer

 Source Server         : DBLocal
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : applestore

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 24/06/2020 14:30:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `level` int(11) NULL DEFAULT NULL COMMENT '1-normal, 2-admin',
  `status` int(11) NULL DEFAULT NULL COMMENT '1-active, 0 deactive',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'Dương Bắc', 'Đông', 'duongdong2203@gmail.com', 'admin', 'D033E22AE348AEB5660FC2140AEC35850C4DA997', 2, 1);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'iPhone', 'Smartphone', 'iphone');
INSERT INTO `categories` VALUES (2, 'iPad', 'Tablet', 'ipad');
INSERT INTO `categories` VALUES (3, 'Macbook', 'Laptop', 'mac');
INSERT INTO `categories` VALUES (4, 'Watch', 'Smartwatch', 'watch');

-- ----------------------------
-- Table structure for details
-- ----------------------------
DROP TABLE IF EXISTS `details`;
CREATE TABLE `details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Screen` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Operating_System` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Front_Camera` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Rear_Camera` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `CPU` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `RAM` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ROM` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `MicroUSB` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Battery` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Size` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  CONSTRAINT `details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of details
-- ----------------------------
INSERT INTO `details` VALUES (1, 'LED Backlit 13.3\", IPS, Retina', ' MacOS', 'HD Webcam', ' No', 'Intel Core i5 Coffee Lake, 1.40 GHz', '8GB, DDR3L, 2133 MHz', 'SSD 256GB NVMe PCle', '2 x Thunderbolt (USB-C)', 'About 10 hours', '14.9 mm, 1.39 kg', 1);
INSERT INTO `details` VALUES (2, 'AMOLED 2.2\"', 'watchOS 6.0', '0.08 MP', '0.08 MP', 'Apple S4 64 bit', 'No', '16GB', 'Wifi, Bluetooth v5.0, GPS', '340 mAh', 'Diameter 44mm, 30.1g', 2);
INSERT INTO `details` VALUES (3, 'OLED 1.9\"', 'watchOS 6.0', 'No', 'No', 'Apple W2', 'No', '8GB', 'Wifi, Bluetooth', '334 mAh', 'Diameter 38mm, 26.7g', 3);
INSERT INTO `details` VALUES (4, 'Liquid Retina, 11\"', 'iOS 12', '7 MP', '12 MP', 'Apple A12X Bionic 64 bit', '4GB', '64GB', 'USB Type-C, Wifi, Bluetooth 5.0, No support 3G/4G', 'Lithium - Polymer, 30.4 Wh', '5.9 mm, 468g', 4);
INSERT INTO `details` VALUES (5, 'LED Backlit LCD, 10.2\"', ' iOS 13', ' 1.2 MP', ' 8 MP', 'Apple A10 Fusion, 2.34 GHz', '3GB', '128GB', 'Lightning, Wifi, Bluetooth, 3G/4G LTE', ' Lithium - Ion, 8600 mAh', ' 7.5 mm, 493g', 5);
INSERT INTO `details` VALUES (6, 'IPS LCD, 6.1\", Liquid Retina', ' iOS 12', ' 7 MP', ' 12 MP', ' Apple A12 Bionic 6 core', '3GB', '128GB', 'Lightning, NFC, OTG', 'Li-ion, 2942 mAh', '8.3 mm, 194g', 6);
INSERT INTO `details` VALUES (7, 'OLED, 6.5\", Super Retina', 'iOS 12', '7 MP', '12 MP', 'Apple A12 Bionic 6 core', '4GB', '256GB', 'Lightning, NFC, OTG', 'Li-ion, 3174 mAh', '7.7 mm, 208g', 7);
INSERT INTO `details` VALUES (8, 'LED Backlit, IPS, Retina 13\"', 'MacOS', 'HD Webcam', 'No', 'Intel Core i5 Coffee Lake, 1.60 GHz', '8GB, DDR3, 2133 MHz', 'SSD 128GB', '2 x Thunderbolt 3 (USB-C)', 'About 10 hours', '4.1 mm to 15.6 mm, 1.25 kg', 8);
INSERT INTO `details` VALUES (9, 'LED Backlit, IPS, Retina 15.4\"', 'MacOS', 'HD Webcam', 'No', 'Intel Core i7 Coffee Lake, 2.60 GHz', '16GB, DDR4 (On board), 2400 MHz', '256GB', '4 x Thunderbolt 3 (USB-C)', 'About 10 hours', '15.5 mm, 1.83 kg', 9);
INSERT INTO `details` VALUES (10, 'IPS LCD, 6.1\", Liquid Retina', 'iOS 13', '12 MP', '12 MP', 'Apple A13 Bionic 6 core', '4GB', '128GB', 'Lightning, NFC, OTG', 'Li-ion, 3110 mAh', '8.3 mm, 194g', 10);
INSERT INTO `details` VALUES (11, 'OLED 6.5\", Super Retina XDR', 'iOS 13', '12 MP', '3 Camera 12MP', 'Apple A13 Bionic 6 core', '4GB', '512GB', 'Lightning, NFC, OTG', 'Li-ion, 3969 mAh', '8.1 mm, 226g', 11);
INSERT INTO `details` VALUES (12, 'LED Backlit LCD, 10.2\"', 'iOS 13', '1.2 MP', '8 MP', 'Apple A10 Fusion, 2.34 Ghz', '3GB', '128GB', 'Wifi, Bluetooth 3G/4G LTE', 'Lithium - Ion, 8600 mAh', '7.5 mm, 493g', 12);
INSERT INTO `details` VALUES (13, 'LED Backlit LCD, 7.9\"', 'iOS 12', '7 MP', '8 MP', 'Apple A12 Bionic 6 core 2.5 GHz', '3GB', '64GB', 'Wifi, Bluetooth, No support 3G/4G', 'Lithium - Polymer, 5124 mAh', '6.1 mm, 300g', 13);
INSERT INTO `details` VALUES (14, 'LED Backlit, IPS LCD, 5.5\", Retina HD', 'iOS 12', '7 MP', '12 MP', 'Apple A11 Bionic 6 core', '3GB', '64GB', 'Lightning, NFC, OTG', 'Li-ion, 2691 mAh', '7.5 mm, 205g', 14);
INSERT INTO `details` VALUES (15, 'LED Backlit, IPS LCD, 5.5\", Retina HD', 'iOS 12', '5 MP', '12 MP', 'Apple A9 2 core 64 bit', '2GB', '32GB', 'Lightning, NFC, OTG', 'Li-ion, 2750 mAh', '7.3 mm, 192g', 15);
INSERT INTO `details` VALUES (16, '13.3 inch, WXGA+(1440 x 900)', 'MacOS', 'HD Webcam', 'No', 'Intel Core i5 Broadwell, 1.80 GHz', '8GB, DDR3(On board), 1600 MHz', 'SSD 128GB', 'MagSafe 2, 2 x USB 3.0, Thunderbolt 2', 'About 12 hours', '17 mm, 1.35 kg', 16);
INSERT INTO `details` VALUES (17, 'LED Backlit, IPS LCD, 4.7\", Retina HD', 'iOS 12', '7 MP', '12 MP', 'Apple A10 Fusion 4 core 64 bit', '2GB', '32GB', 'Lightning, Air Play, NFC, OTG, HDMI', 'Li-ion, 1960 mAh', '7.1 mm, 138g', 17);
INSERT INTO `details` VALUES (18, 'OLED 1.78\"', 'watchOS 6.0', 'No', 'No', 'Apple S5 64 bit', 'No', '32GB', 'Wifi, Bluetooth v5.0, GPS', 'About 18 hours', 'Diameter 44 mm, 36.7g', 18);
INSERT INTO `details` VALUES (19, 'OLED 1.57\"', 'watchOS 6.0', 'No', 'No', 'Apple S5 64 bit', 'No', '32GB', 'Wifi, Bluetooth v5.0, GPS', 'About 18 hours', 'Diameter 4 mm, 30g', 19);
INSERT INTO `details` VALUES (20, 'LED Backlit LCD, 10.2\"', 'iOS 13', '1.2 MP', '8 MP', 'Apple A10 Fusion, 2.34 GHz', '3GB', '32GB', 'Wifi, Bluetooth, GPS, No support 3G/4G', 'Li-ion, 8600 mAh', '7.5 mm, 483g', 20);
INSERT INTO `details` VALUES (21, 'LED Backlit LCD, 9.7\"', 'iOS 12', '1.2 MP', '8 MP', 'Apple A10 Fusion, 2.34 GHz', '2GB', '32GB', 'Wifi, Bluetooth, GPS, No support 3G/4G', 'Li-ion, 8600 mAh', '7.5 mm, 469g', 21);
INSERT INTO `details` VALUES (22, 'OLED, 5.8\", Super Retina', 'iOS 12', '7 MP', '12 MP', 'Apple A11 Bionic 6 core', '3GB', '64GB', 'Lightning, NFC, OTG', 'Li-ion, 2716 mAh', '7.7 mm, 174g', 22);
INSERT INTO `details` VALUES (23, 'LED Backlit, IPS LCD, 5.5\", Retina HD', 'iOS 12', '7 MP', '12 MP', 'Apple A10 Fusion 4 core 64 bit', '3GB', '32GB', 'Lightning, Air Play, NFC, OTG, HDMI', 'Li-ion, 2900 mAh', '7.3 mm, 188g', 23);
INSERT INTO `details` VALUES (24, 'Retina 27 inch, 5K (5120 x 2880)', 'MacOS', 'HD Webcam', 'No', 'Intel Core i5 Coffee Lake, 3.0 GHz', '8GB, DDR4 (On board), 2666 MHz', '1TB Fusion Drive', '3 x USB 3.0, LAN(RJ45), 2 x Thunderbolt 3 (USB-C),', 'Updating', '203 mm, 9.42g', 24);
INSERT INTO `details` VALUES (25, '15.4 inch, Retina (2880 x 1800)', 'MacOS', 'HD Webcam', 'No', 'Intel Core i9 Coffee Lake, 2.30 GHz', '16GB, DDR4 (On board), 2400 MHz', 'SSD 512GB', '4 x Thunderbolt 3 (USB-C)', 'About 10 hours', '15.5 mm, 1.83g', 25);
INSERT INTO `details` VALUES (26, 'AMOLED 2.2\"', 'watchOS 6.0', '0.08 MP', '0.08 MP', 'Apple S4 64 bit', 'No', '16GB', 'Wifi, Bluetooth v5.0, GPS', '340 mAh', 'Diameter 44 mm, 30.1g', 26);
INSERT INTO `details` VALUES (27, 'AMOLED 2.0\"', 'watchOS 5.0', 'No', 'No', 'Apple S4 64 bit', 'No', '16GB', 'Bluetooth v5.0, Wifi, GPS', '340 mAh', 'Updating', 27);
INSERT INTO `details` VALUES (28, 'LED Backlit LCD, 10.2\"', 'iOS 13', '1.2 MP', '8 MP', 'Apple A10 Fusion 2.34 GHz', '3GB', '32GB', 'Wifi, Bluetooth, 3G/4G LTE', 'Li-ion, 8600 mAh', '7.5 mm, 493g', 28);
INSERT INTO `details` VALUES (29, 'LED Backlit LCD, 7.9\"', 'iOS 12', '7 MP', '8 MP', 'Apple A12 Bionic 6 core, 2.50 GHz', '3GB', '64GB', 'Wifi, Bluetooth, Support 4G', 'Lithium - Polymer, 5124 mAh', '6.1 mm, 308g', 29);
INSERT INTO `details` VALUES (30, 'OLED, 6.5\", Super Retina', 'iOS 12', '7 MP', '12 MP', 'Apple A12 Bionic 6 core', '4GB', '256GB', 'Lightning, NFC, OTG', 'Li-ion, 3174 mAh', '7.7 mm, 208g', 30);
INSERT INTO `details` VALUES (31, 'OLED, 6.5\", Super Retina XDR', 'iOS 13', '12 MP', '3 Camera 12 MP', 'Apple A13 Bionic 6 core', '4GB', '512GB', 'Lightning, NFC, OTG', 'Li-ion, 3969 mAg', '8.1 mm, 226g', 31);

-- ----------------------------
-- Table structure for news_letter
-- ----------------------------
DROP TABLE IF EXISTS `news_letter`;
CREATE TABLE `news_letter`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `register_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of news_letter
-- ----------------------------
INSERT INTO `news_letter` VALUES (18, 'anhduc@gmail.com', 1, '2020-06-05 14:09:06');

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 0) NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `order_id` int(11) NULL DEFAULT NULL,
  `product_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `order_id`(`order_id`) USING BTREE,
  INDEX `product_id`(`product_id`) USING BTREE,
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES (15, 'iPad Cellular 64GB 2019', 646, 1, '2020-06-24 02:06:32', NULL, 11, 29);
INSERT INTO `order_details` VALUES (16, 'iPhone XS Max 256GB', 1465, 4, '2020-06-24 02:06:32', NULL, 11, 30);
INSERT INTO `order_details` VALUES (17, 'iPhone XS Max 256GB', 1465, 6, '2020-06-24 07:10:16', NULL, 12, 30);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL,
  `totalPrice` decimal(10, 0) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (11, 37, 6831, '2020-06-24 02:06:32', 0);
INSERT INTO `orders` VALUES (12, 37, 9230, '2020-06-24 07:10:16', 1);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 0) NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `quantity` int(11) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL COMMENT '1-active, 0-deactive',
  `category_id` int(11) NULL DEFAULT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_id`(`category_id`) USING BTREE,
  INDEX `admin_id`(`admin_id`) USING BTREE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Mac Pro Touch 2019', 1723, 'img/product/10030.png', 100, '2020-04-20 23:27:49', 1, 3, 1);
INSERT INTO `products` VALUES (2, 'Apple Watch S4', 516, 'img/product/10029.png', 100, '2020-04-20 23:28:37', 1, 4, 1);
INSERT INTO `products` VALUES (3, 'Apple Watch S3', 245, 'img/product/10028.png', 100, '2020-04-20 23:29:12', 1, 4, 1);
INSERT INTO `products` VALUES (4, 'iPad Wifi 64GB 2018', 947, 'img/product/10027.png', 100, '2020-04-20 23:30:10', 1, 2, 1);
INSERT INTO `products` VALUES (5, 'iPad Pro', 646, 'img/product/10026.png', 100, '2020-04-20 23:30:45', 1, 2, 1);
INSERT INTO `products` VALUES (6, 'iPhone XR 128GB', 818, 'img/product/10025.png', 100, '2020-04-20 23:32:29', 1, 1, 1);
INSERT INTO `products` VALUES (7, 'iPhone XS Max 256GB', 1465, 'img/product/10024.png', 100, '2020-04-20 23:33:34', 1, 1, 1);
INSERT INTO `products` VALUES (8, 'Macbook Air 2019', 1206, 'img/product/10023.png', 100, '2020-04-20 23:34:28', 1, 3, 1);
INSERT INTO `products` VALUES (9, 'MacPro Touch 256GB', 2585, 'img/product/10022.png', 100, '2020-04-20 23:35:30', 1, 3, 1);
INSERT INTO `products` VALUES (10, 'iPhone 11 128GB', 1034, 'img/product/10021.png', 100, '2020-04-20 23:35:57', 1, 1, 1);
INSERT INTO `products` VALUES (11, 'iPad Cellular 128GB', 646, 'img/product/10019.png', 100, '2020-04-20 23:36:56', 1, 2, 1);
INSERT INTO `products` VALUES (12, 'iPhone 11 ProMax 512GB', 1896, 'img/product/10020.png', 100, '2020-04-20 23:37:29', 1, 1, 1);
INSERT INTO `products` VALUES (13, 'iPad Mini 64GB 2019', 473, 'img/product/10018.png', 100, '2020-04-21 22:36:01', 1, 2, 1);
INSERT INTO `products` VALUES (14, 'iPhone 8 Plus 64GB', 689, 'img/product/10017.png', 100, '2020-04-21 22:36:49', 1, 1, 1);
INSERT INTO `products` VALUES (15, 'iPhone 6S Plus 32GB', 387, 'img/product/10016.png', 100, '2020-04-21 22:37:24', 1, 1, 1);
INSERT INTO `products` VALUES (16, 'Macbook Air 2017', 926, 'img/product/10015.png', 100, '2020-04-21 22:37:59', 1, 3, 1);
INSERT INTO `products` VALUES (17, 'iPhone 7 32GB', 430, 'img/product/10014.png', 100, '2020-04-21 22:38:38', 1, 1, 1);
INSERT INTO `products` VALUES (18, 'Apple Watch S5', 531, 'img/product/10013.png', 100, '2020-04-21 22:39:15', 1, 4, 1);
INSERT INTO `products` VALUES (19, 'Apple Watch S5 Black', 490, 'img/product/10012.png', 100, '2020-04-21 22:40:00', 1, 4, 1);
INSERT INTO `products` VALUES (20, 'iPad Wifi 32GB 2019', 387, 'img/product/10011.png', 100, '2020-04-21 22:40:37', 1, 2, 1);
INSERT INTO `products` VALUES (21, ' iPad Wifi 32GB 2018', 374, 'img/product/10010.png', 100, '2020-04-21 22:41:30', 1, 2, 1);
INSERT INTO `products` VALUES (22, 'iPhone XR 64GB', 861, 'img/product/10009.png', 100, '2020-04-21 22:42:06', 1, 1, 1);
INSERT INTO `products` VALUES (23, 'iPhone 7S Plus 32GB', 559, 'img/product/10008.png', 100, '2020-04-21 22:42:42', 1, 1, 1);
INSERT INTO `products` VALUES (24, 'iMac 5K Rena', 2068, 'img/product/10007.png', 100, '2020-04-21 22:43:24', 1, 3, 1);
INSERT INTO `products` VALUES (25, 'MacPro Touch 512GB', 3016, 'img/product/10006.png', 100, '2020-04-21 22:44:18', 1, 3, 1);
INSERT INTO `products` VALUES (26, 'Apple Watch S4', 516, 'img/product/10005.png', 100, '2020-04-21 22:44:51', 1, 4, 1);
INSERT INTO `products` VALUES (27, 'Apple Watch S4', 473, 'img/product/10004.png', 100, '2020-04-21 22:45:21', 1, 4, 1);
INSERT INTO `products` VALUES (28, 'iPad Cellular 32GB 2019', 559, 'img/product/10003.png', 100, '2020-04-21 22:45:59', 1, 2, 1);
INSERT INTO `products` VALUES (29, 'iPad Cellular 64GB 2019', 646, 'img/product/10002.png', 100, '2020-04-21 22:46:39', 1, 2, 1);
INSERT INTO `products` VALUES (30, 'iPhone XS Max 256GB', 1465, 'img/product/10001.png', 100, '2020-04-21 22:47:14', 1, 1, 1);
INSERT INTO `products` VALUES (31, 'iPhone 11 Pro Max 512GB', 1896, 'img/product/10000.png', 100, '2020-04-21 22:47:55', 1, 1, 1);
INSERT INTO `products` VALUES (34, 'Test Upload Ảnh', 987, 'img/product/avt.jpg', NULL, '2020-04-25 04:31:39', 0, 1, 1);
INSERT INTO `products` VALUES (35, 'test', 123, 'img/product/btnThem1SVDB.jpg', NULL, '2020-04-28 19:07:48', 0, 1, 1);
INSERT INTO `products` VALUES (42, 'Test', 123, '', NULL, '2020-06-24 12:45:07', 0, 1, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` date NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL COMMENT '1-active, 0-deactive',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (37, NULL, 'Dương Bắc Đông', NULL, '0915272291', NULL, 'bacdong', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, '2020-06-24', 1);

SET FOREIGN_KEY_CHECKS = 1;

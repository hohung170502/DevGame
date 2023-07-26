DROP DATABASE IF EXISTS `devgame`;
CREATE DATABASE `devgame`;
USE `devgame`;

CREATE TABLE `account` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `password` varchar(255),
  `email` varchar(255) DEFAULT "",
  `role` int DEFAULT 0 COMMENT '0:Khách-1:Admin',
  `created_at` timestamp
);

CREATE TABLE `games` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `status` int DEFAULT 1 COMMENT '0:Hết hàng-1:Còn hàng',
  `desc` varchar(5000),
  `price` int,
  `discount` int DEFAULT 0,
  `type` int COMMENT '0:Steam-1:Epic-2:Code Wallet',
  `image` varchar(255) DEFAULT "",
  `author` int,
  `created_at` timestamp
);

ALTER TABLE `games` ADD FOREIGN KEY (`author`) REFERENCES `account` (`id`);

INSERT INTO `account` (`username`, `password`, `email`, `role`) VALUES ('admin', '4297f44b13955235245b2497399d7a93', 'admin@gmail.com', 1);

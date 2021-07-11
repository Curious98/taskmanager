--
-- MySQL 5.5.5
-- Sun, 11 Jul 2021 00:09:33 +0000
--

CREATE DATABASE `week3` DEFAULT CHARSET utf8mb4;

USE `week3`;

CREATE TABLE `task` (
   `id` int(11) not null auto_increment,
   `title` varchar(50),
   `details` varchar(5000),
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7;
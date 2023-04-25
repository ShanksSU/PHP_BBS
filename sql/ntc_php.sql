-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2022-01-10 01:01:18
-- 伺服器版本： 5.7.31
-- PHP 版本： 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ntc_php`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ntc_content`
--

DROP TABLE IF EXISTS `ntc_content`;
CREATE TABLE IF NOT EXISTS `ntc_content` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `module_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `times` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `ntc_content`
--

INSERT INTO `ntc_content` (`id`, `module_id`, `title`, `content`, `time`, `member_id`, `times`) VALUES
(1, 9, '安安', 'panda', '2021-11-08 13:26:33', 4, NULL),
(2, 18, '1313', '465465', '2021-11-13 03:05:02', 4, NULL),
(4, 19, 'dqwdq', 'fwf\r\n', '2021-11-13 03:35:56', 4, NULL),
(5, 19, 'dqwf', 'fqf', '2021-11-13 03:40:29', 4, NULL),
(10, 19, 'TR', 'TT', '2021-12-29 16:58:23', 10, NULL),
(11, 19, '1561', '718487', '2021-12-29 21:47:13', 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `ntc_father_module`
--

DROP TABLE IF EXISTS `ntc_father_module`;
CREATE TABLE IF NOT EXISTS `ntc_father_module` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `module_name` varchar(64) NOT NULL,
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=179 DEFAULT CHARSET=utf8 COMMENT='父模塊';

--
-- 傾印資料表的資料 `ntc_father_module`
--

INSERT INTO `ntc_father_module` (`id`, `module_name`, `sort`) VALUES
(172, 'Anime015', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ntc_member`
--

DROP TABLE IF EXISTS `ntc_member`;
CREATE TABLE IF NOT EXISTS `ntc_member` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `register_time` datetime NOT NULL,
  `last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `ntc_member`
--

INSERT INTO `ntc_member` (`id`, `name`, `pw`, `photo`, `register_time`, `last_time`) VALUES
(1, 'root', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2021-11-08 09:57:15', NULL),
(21, 'ERT', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-01-08 22:47:44', NULL),
(20, 'dianli', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2022-01-06 22:13:48', NULL),
(19, 'pamda', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2021-12-29 19:13:16', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `ntc_reply`
--

DROP TABLE IF EXISTS `ntc_reply`;
CREATE TABLE IF NOT EXISTS `ntc_reply` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content_id` int(10) UNSIGNED NOT NULL,
  `quote_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `ntc_reply`
--

INSERT INTO `ntc_reply` (`id`, `content_id`, `quote_id`, `content`, `time`, `member_id`) VALUES
(1, 2, 0, '8418456145nrnd', '2021-11-13 18:15:46', 4),
(2, 4, 0, '465', '2021-11-14 13:51:58', 4),
(3, 4, 0, '888', '2021-11-14 13:52:27', 4),
(4, 7, 0, 'fwefw', '2021-11-14 14:27:47', 4),
(5, 7, 0, 'gwgwg', '2021-11-14 14:27:52', 4),
(6, 7, 0, 'fwegzw', '2021-11-14 14:35:29', 4),
(7, 7, 4, 'fwfwfw', '2021-11-14 14:39:25', 4),
(8, 3, 0, '讚喔\r\n', '2021-11-14 14:44:16', 4),
(9, 3, 0, '47847', '2021-11-14 15:27:25', 4),
(10, 3, 0, 'wefwafw22', '2021-11-14 15:27:35', 4),
(11, 7, 6, 'herthsd', '2021-11-14 15:37:02', 4),
(12, 3, 0, 'vwsvws', '2021-11-14 15:46:32', 4),
(13, 3, 10, 'wefwefw', '2021-11-14 15:46:38', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `ntc_son_module`
--

DROP TABLE IF EXISTS `ntc_son_module`;
CREATE TABLE IF NOT EXISTS `ntc_son_module` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `father_module_id` int(11) NOT NULL,
  `module_name` varchar(64) NOT NULL,
  `info` varchar(256) NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `ntc_son_module`
--

INSERT INTO `ntc_son_module` (`id`, `father_module_id`, `module_name`, `info`, `member_id`, `sort`) VALUES
(1, 169, 'AAA', 'j6', 0, 0),
(2, 164, '0132132', '', 0, 0),
(3, 163, '0132132', 'fwef', 0, 0),
(4, 164, '安安安', 'fwef', 0, 0),
(5, 164, 'dfwf', '22', 0, 0),
(6, 163, 'fqw', 'qq', 0, 0),
(7, 163, '哀哀', 'fw', 0, 0),
(8, 164, 'fwfwwww', 'fwef', 0, 0),
(10, 177, 'i3', '', 0, 6),
(12, 176, 'CPU', 'NULL', 0, 0),
(14, 177, 'af', 'faqw', 0, 5),
(19, 172, 'A2', 'as', 0, 0),
(18, 172, 'A1', 'fe', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

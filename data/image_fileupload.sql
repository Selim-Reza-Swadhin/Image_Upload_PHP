-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 14, 2020 at 04:01 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `image_fileupload`
--

-- --------------------------------------------------------

--
-- Table structure for table `insert_image`
--

DROP TABLE IF EXISTS `insert_image`;
CREATE TABLE IF NOT EXISTS `insert_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `insert_image2`
--

DROP TABLE IF EXISTS `insert_image2`;
CREATE TABLE IF NOT EXISTS `insert_image2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `insert_image3`
--

DROP TABLE IF EXISTS `insert_image3`;
CREATE TABLE IF NOT EXISTS `insert_image3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

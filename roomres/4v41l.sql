-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 11:35 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `connect_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `4v41l`
--

DROP TABLE IF EXISTS `4v41l`;
CREATE TABLE IF NOT EXISTS `4v41l` (
  `id` int(1) NOT NULL,
  `stat` int(1) NOT NULL,
  `img` varchar(100) NOT NULL,
  UNIQUE KEY `avail` (`stat`,`img`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4v41l`
--

TRUNCATE TABLE `4v41l`;
--
-- Dumping data for table `4v41l`
--

INSERT INTO `4v41l` (`id`, `stat`, `img`) VALUES
(0, 0, 'on.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

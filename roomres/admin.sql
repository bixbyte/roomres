-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 11:34 PM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `a_idnum` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `auto_aproove` int(1) NOT NULL,
  `paski` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL COMMENT 'm/f/a',
  PRIMARY KEY (`id`),
  UNIQUE KEY `a_idnum` (`a_idnum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `a_idnum`, `email`, `auto_aproove`, `paski`, `gender`) VALUES
(1, 'Mens Dorm Main Admin', 'amensa0101', 'ianmin2@ueab.ac.ke', 1, 'sZTNsJm8gGZ3bA==', 'm'),
(2, 'Ladies Dorm Main Admin', 'awooms0010', 'ianmin2@ueab.ac.ke', 1, 'sZTNsJm8gGZ3bA==', 'f'),
(3, 'Mixed Residence Main Admin', 'alalal0011', 'ianmin2@ueab.ac.ke', 1, 'sZTNsJm8gGZ3bA==', 'a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2014 at 11:32 PM
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
CREATE DATABASE IF NOT EXISTS `connect_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `connect_db`;

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

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(20) NOT NULL,
  `rnum` int(255) NOT NULL,
  `trim` int(255) NOT NULL,
  `authby` int(255) NOT NULL,
  `residence` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `s_idnum` int(255) NOT NULL,
  `room` int(255) NOT NULL,
  `residence` int(255) NOT NULL,
  `day_in` varchar(100) NOT NULL,
  `day_out` int(100) NOT NULL,
  `trimester` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservants`
--

DROP TABLE IF EXISTS `reservants`;
CREATE TABLE IF NOT EXISTS `reservants` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `s_idnum` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rnum` int(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `reckey` varchar(255) NOT NULL,
  `actif` int(1) NOT NULL,
  `res` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_idnum` (`s_idnum`),
  UNIQUE KEY `s_idnum_2` (`s_idnum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

DROP TABLE IF EXISTS `residence`;
CREATE TABLE IF NOT EXISTS `residence` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gsc` (`name`,`gender`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `r_number` int(255) NOT NULL,
  `max_capacity` int(2) NOT NULL,
  `curr_capacity` int(2) NOT NULL,
  `residence` int(255) NOT NULL,
  `available` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gsc` (`r_number`,`max_capacity`,`residence`),
  UNIQUE KEY `roomres` (`residence`,`r_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1301 ;

-- --------------------------------------------------------

--
-- Table structure for table `trimester`
--

DROP TABLE IF EXISTS `trimester`;
CREATE TABLE IF NOT EXISTS `trimester` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gsc` (`name`,`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

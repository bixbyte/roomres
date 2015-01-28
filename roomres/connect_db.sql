-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2014 at 07:56 AM
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

CREATE TABLE IF NOT EXISTS `4v41l` (
  `id` int(1) NOT NULL,
  `stat` int(1) NOT NULL,
  `img` varchar(100) NOT NULL,
  UNIQUE KEY `avail` (`stat`,`img`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `4v41l`
--

INSERT INTO `4v41l` (`id`, `stat`, `img`) VALUES
(0, 0, 'on.png');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(20) NOT NULL,
  `rnum` int(255) NOT NULL,
  `trim` int(255) NOT NULL,
  `authby` int(255) NOT NULL,
  `residence` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `s_id`, `rnum`, `trim`, `authby`, `residence`) VALUES
(1, 'sbasem1321', 7, 1, 1, 3),
(2, 'sbasem1321', 12, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `a_idnum`, `email`, `auto_aproove`, `paski`, `gender`) VALUES
(1, 'Mens Dorm Main Admin', 'amensa0101', 'ianmin2@ueab.ac.ke', 1, 'sZTNsJm8gGZ3bA==', 'm'),
(2, 'Ladies Dorm', 'awooms0010', 'ianmin2@ueab.ac.ke', 1, 'sZTNsJm8gGZ3bA==', 'f'),
(3, 'Mixed Residence Main Admin', 'alalal0011', 'ianmin2@ueab.ac.ke', 1, 'sZTNsJm8gGZ3bA==', 'a'),
(4, 'Technical Admin', 'skamia1321', 'ianmin2@live.com', 0, 'sZTNsJm8gGZ3bA==', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `reservants`
--

INSERT INTO `reservants` (`id`, `name`, `s_idnum`, `email`, `rnum`, `tel`, `passwd`, `gender`, `reckey`, `actif`, `res`) VALUES
(1, 'Ian Innocent Mbae', 'SKAMIA1321', 'roomres@ueab.ac.ke', 0, '+254725678447', 'sZTNsJm8gGZ3bA==', 'm', '744301f773e6415f9be666ee565e3a58', 1, 0),
(2, 'Emmanuella Bashwira Iragi', 'SBASEM1321', 'emma.iragi@gmail.com', 12, '0715068244', 'raDMpGGC', 'f', 'e93ae10c60e74da09a01515226edf727', 1, 3),
(3, 'Localhost Test', 'SKAMIA1320', 'ianmin2@ueab.ac.ke', 0, '+254725678447', 'sZTNsJm8gGZ3bA==', 'm', '744301f773e6415f9be666ee565e3a58', 0, 0),
(6, 'Localhost Test', 'SKAMIA1319', 'ianmin2@ueab.ac.ke', 0, '+254725678447', 'sZTNsJm8gGZ3bA==', 'm', '744301f773e6415f9be666ee565e3a58', 1, 0),
(7, 'Roomres Hourly Email Test', 'IANMIN2345', 'ianmin2@live.com', 0, '+254725678447', 'sZTNsJm8gGZ3bA==', 'm', '3a9117c232e41585e9f978366d2bfa9d', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

CREATE TABLE IF NOT EXISTS `residence` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gsc` (`name`,`gender`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`id`, `name`, `gender`) VALUES
(3, 'Ladies Dorm 1', 'f'),
(4, 'Nana hostel', 'a'),
(1, 'NEW MENS DORM', 'm'),
(2, 'OLD MENS DORM', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `r_number`, `max_capacity`, `curr_capacity`, `residence`, `available`) VALUES
(1, 1, 4, 0, 1, 1),
(2, 2, 4, 0, 1, 1),
(3, 3, 4, 0, 1, 1),
(4, 4, 4, 0, 1, 1),
(5, 5, 4, 0, 1, 1),
(6, 6, 4, 0, 1, 1),
(7, 7, 4, 0, 1, 1),
(8, 8, 4, 0, 1, 1),
(9, 9, 4, 0, 1, 1),
(10, 10, 4, 0, 1, 1),
(11, 1, 4, 0, 2, 1),
(12, 2, 4, 0, 2, 1),
(13, 3, 4, 0, 2, 1),
(14, 4, 4, 0, 2, 1),
(15, 5, 4, 0, 2, 1),
(16, 6, 4, 0, 2, 1),
(17, 7, 4, 0, 2, 1),
(18, 8, 4, 0, 2, 1),
(19, 9, 4, 0, 2, 1),
(20, 10, 4, 0, 2, 1),
(21, 1, 2, 0, 3, 1),
(22, 2, 2, 0, 3, 1),
(23, 3, 2, 0, 3, 1),
(24, 4, 2, 0, 3, 1),
(25, 5, 2, 0, 3, 1),
(26, 6, 2, 0, 3, 1),
(27, 7, 2, 0, 3, 1),
(28, 8, 2, 0, 3, 1),
(29, 9, 2, 0, 3, 1),
(30, 10, 2, 0, 3, 1),
(31, 1, 4, 0, 4, 1),
(32, 2, 4, 0, 4, 1),
(33, 3, 4, 0, 4, 1),
(34, 4, 4, 0, 4, 1),
(35, 5, 4, 0, 4, 1),
(36, 6, 4, 0, 4, 1),
(37, 7, 4, 0, 4, 1),
(38, 8, 4, 0, 4, 1),
(39, 9, 4, 0, 4, 1),
(40, 10, 4, 0, 4, 1),
(41, 11, 4, 0, 4, 1),
(42, 12, 4, 0, 4, 1),
(43, 13, 4, 0, 4, 1),
(44, 14, 4, 0, 4, 1),
(45, 15, 4, 0, 4, 1),
(46, 16, 4, 0, 4, 1),
(47, 17, 4, 0, 4, 1),
(48, 18, 4, 0, 4, 1),
(49, 19, 4, 0, 4, 1),
(50, 20, 4, 0, 4, 1),
(51, 21, 4, 0, 4, 1),
(52, 22, 4, 0, 4, 1),
(53, 23, 4, 0, 4, 1),
(54, 24, 4, 0, 4, 1),
(55, 25, 4, 0, 4, 1),
(56, 26, 4, 0, 4, 1),
(57, 27, 4, 0, 4, 1),
(58, 28, 4, 0, 4, 1),
(59, 29, 4, 0, 4, 1),
(60, 30, 4, 0, 4, 1),
(61, 31, 4, 0, 4, 1),
(62, 32, 4, 0, 4, 1),
(63, 33, 4, 0, 4, 1),
(64, 34, 4, 0, 4, 1),
(65, 35, 4, 0, 4, 1),
(66, 36, 4, 0, 4, 1),
(67, 37, 4, 0, 4, 1),
(68, 38, 4, 0, 4, 1),
(69, 39, 4, 0, 4, 1),
(70, 40, 4, 0, 4, 1),
(71, 41, 4, 0, 4, 1),
(72, 42, 4, 0, 4, 1),
(73, 43, 4, 0, 4, 1),
(74, 44, 4, 0, 4, 1),
(75, 45, 4, 0, 4, 1),
(76, 46, 4, 0, 4, 1),
(77, 47, 4, 0, 4, 1),
(78, 48, 4, 0, 4, 1),
(79, 49, 4, 0, 4, 1),
(80, 50, 4, 0, 4, 1),
(81, 51, 4, 0, 4, 1),
(82, 52, 4, 0, 4, 1),
(83, 53, 4, 0, 4, 1),
(84, 54, 4, 0, 4, 1),
(85, 55, 4, 0, 4, 1),
(86, 56, 4, 0, 4, 1),
(87, 57, 4, 0, 4, 1),
(88, 58, 4, 0, 4, 1),
(89, 59, 4, 0, 4, 1),
(90, 60, 4, 0, 4, 1),
(91, 61, 4, 0, 4, 1),
(92, 62, 4, 0, 4, 1),
(93, 63, 4, 0, 4, 1),
(94, 64, 4, 0, 4, 1),
(95, 65, 4, 0, 4, 1),
(96, 66, 4, 0, 4, 1),
(97, 67, 4, 0, 4, 1),
(98, 68, 4, 0, 4, 1),
(99, 69, 4, 0, 4, 1),
(100, 70, 4, 0, 4, 1),
(101, 71, 4, 0, 4, 1),
(102, 72, 4, 0, 4, 1),
(103, 73, 4, 0, 4, 1),
(104, 74, 4, 0, 4, 1),
(105, 75, 4, 0, 4, 1),
(106, 76, 4, 0, 4, 1),
(107, 77, 4, 0, 4, 1),
(108, 78, 4, 0, 4, 1),
(109, 79, 4, 0, 4, 1),
(110, 80, 4, 0, 4, 1),
(111, 81, 4, 0, 4, 1),
(112, 82, 4, 0, 4, 1),
(113, 83, 4, 0, 4, 1),
(114, 84, 4, 0, 4, 1),
(115, 85, 4, 0, 4, 1),
(116, 86, 4, 0, 4, 1),
(117, 87, 4, 0, 4, 1),
(118, 88, 4, 0, 4, 1),
(119, 89, 4, 0, 4, 1),
(120, 90, 4, 0, 4, 1),
(121, 91, 4, 0, 4, 1),
(122, 92, 4, 0, 4, 1),
(123, 93, 4, 0, 4, 1),
(124, 94, 4, 0, 4, 1),
(125, 95, 4, 0, 4, 1),
(126, 96, 4, 0, 4, 1),
(127, 97, 4, 0, 4, 1),
(128, 98, 4, 0, 4, 1),
(129, 99, 4, 0, 4, 1),
(130, 100, 4, 0, 4, 1),
(131, 11, 2, 0, 3, 1),
(132, 12, 2, 1, 3, 1),
(133, 13, 2, 0, 3, 1),
(134, 14, 2, 0, 3, 1),
(135, 15, 2, 0, 3, 1),
(136, 16, 2, 0, 3, 1),
(137, 17, 2, 0, 3, 1),
(138, 18, 2, 0, 3, 1),
(139, 19, 2, 0, 3, 1),
(140, 20, 2, 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trimester`
--

CREATE TABLE IF NOT EXISTS `trimester` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gsc` (`name`,`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trimester`
--

INSERT INTO `trimester` (`id`, `name`, `year`) VALUES
(1, 'Apr ~ Aug 2014', 2014);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2021 at 06:08 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tasweqar`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `ADID` int(30) NOT NULL AUTO_INCREMENT,
  `city` text,
  `province` text,
  `zip` int(30) DEFAULT NULL,
  `street` text,
  `homenum` text,
  `Gmap` text NOT NULL,
  `pro_ID` int(30) DEFAULT NULL,
  PRIMARY KEY (`ADID`)
) ENGINE=MyISAM AUTO_INCREMENT=233 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`ADID`, `city`, `province`, `zip`, `street`, `homenum`, `Gmap`, `pro_ID`) VALUES
(142, 'JEDDAH', 'safaa4', 475, 'alsbaeen', '23/5', 'https://googlemap.com', 142),
(141, 'RIYADAH', 'riyad', 212, '13/21', '13', 'https://googlemap.com', 141),
(140, 'MAKKAH', 'marwa2', 1245, 'marwaS', '15', 'https://googlemap.com', 140),
(139, 'RIYADAH', 'phom', 1214, '40', '100/5', 'https//map.com/hhkjyytuy22/', 139),
(138, 'RIYADAH', 'eastern', 333, 'bn ali', '1/2', 'https//map.com/hhkjyytuy22/', 138),
(143, 'MAKKAH', 'phomjuty', 124, 'marwaS1', '105', 'https://googlemap.com', 143),
(147, 'MAKKAH', 'phomjuty hgj', 1214, '40', '22', 'https//map.com/hhkjyytuy/', 147),
(145, 'RIYADAH', 'alshargiya', 2125, 'karary', '10015', 'https://map.googlemap/', 145),
(209, 'RIYADH', 'riyadh', 60, '60', '60', 'https://www.google.com/maps', 209),
(149, 'JUBAIL', 'phomjuty hgj', 1214, '40', '55', 'https//map.com/hhkjyytuy22/', 149),
(208, 'RIYADH', 'eastern', 59, '59', '59', 'https://www.google.com/maps', 208),
(154, 'JUBAIL', 'alshargiya', 2125, '100/8 karary', '1110', 'https://map.googlemap', 154),
(153, 'JUBAIL', 'jubail', 124, '13/5', '121', 'https//map.com/hhkjyytuy22/', 153),
(155, 'JUBAIL', 'estern', 34322, '233', '433', 'https://www.google.com/maps', 155),
(207, 'RIYADH', 'eastern', 59, 'malik', '59', 'https://www.google.com/maps', 207),
(157, 'JUBAIL', 'estern', 45, '12s', '17/2', 'https://map.googlemap', 157),
(206, 'RIYADH', 'eastern', 58, 'malik', '58', 'https://www.google.com/maps', 206),
(159, 'RIYADH', 'phomjuty hgj', 121, '40', '1211', 'https://www.google.com/maps', 159),
(205, 'RIYADH', 'eastern', 55, '55', '55', 'https://www.google.com/maps', NULL),
(204, 'RIYADH', 'eastern', 55, '55', '55', 'https://www.google.com/maps', NULL),
(203, 'RIYADH', 'safaa4', 55, '55', '55', 'https://www.google.com/maps', NULL),
(163, 'RIYADH', 'phomjuty hgj', 121, '40', '1212', 'https://www.google.com/maps', 163),
(201, 'JUBAIL', 'safaa4', 52, '51', '52', 'https://www.google.com/maps', 201),
(165, 'RIYADH', 'phomjuty hgj', 121, '40', '1213', 'https://www.google.com/maps', 165),
(166, 'RIYADH', 'phomjuty hgj', 121, '40', '1214', 'https://www.google.com/maps', 166),
(167, 'RIYADH', 'shrqiyah', 12, '15', '13/7', 'https://google.map', 167),
(200, 'JUBAIL', 'safaa4', 52, '51', '52', 'https://www.google.com/maps', 200),
(199, 'JUBAIL', 'safaa4', 52, '51', '52', 'https://www.google.com/maps', 199),
(198, 'JUBAIL', 'safaa4', 52, '51', '52', 'https://www.google.com/maps', 198),
(197, 'JUBAIL', 'safaa4', 52, '51', '52', 'https://www.google.com/maps', 197),
(202, 'RIYADH', 'safaa4', 55, '55', '55', 'https://www.google.com/maps', NULL),
(195, 'RIYADH', 'eastern', 50, '50', '50', 'https://www.google.com/maps', 195),
(190, 'RIYADH', 'shargiah', 581, 'malik', '11', 'https://www.google.com/maps', 190),
(188, 'MAKKAH', 'sargiyah', 120, '120', '120', 'https://google.map', 188),
(187, 'RIYADH', 'alshargiya', 102, '102', '102', 'https://google.map', 187),
(186, 'JUBAIL', 'alshargiya', 24, 'kh1', '10/24', 'https://map.googlemap', 186),
(185, 'JUBAIL', 'alshargiya', 24, 'kh1', '10/24', 'https://map.googlemap', 185),
(180, 'JUBAIL', 'alshargiya', 2125, 'karary', '107', 'https://map.googlemap', 180),
(184, 'JUBAIL', 'alshargiya', 23, 'kh1', '10/20', 'https://map.googlemap', 184),
(183, 'RIYADH', 'alshargiya', 2125, '12s', '10/8', 'https://map.googlemap', 183),
(210, 'RIYADH', 'safaa4', 61, '61', '61', 'https://www.google.com/maps', 210),
(211, 'RIYADH', 'safaa4', 62, '62', '62', 'https://www.google.com/maps', 211),
(212, 'JUBAIL', 'eastern', 63, '63s', '63', 'https://www.google.com/maps', 212),
(213, 'RIYADH', 'riyad', 64, '64s', '64', 'https://www.google.com/maps', 213),
(214, 'RIYADH', 'riyad', 64, '64s', '64', 'https://www.google.com/maps', NULL),
(215, 'RIYADH', 'eastern', 33, 'bn ali', '65', 'https://www.google.com/maps', 215),
(216, 'RIYADH', 'safaa4', 65, '65', '65', 'https://www.google.com/maps', NULL),
(217, 'RIYADH', 'safaa4', 333, 'bn ali', '333', 'https://www.google.com/maps', 217),
(218, 'RIYADH', 'safaa4', 333, 'bn ali', '333', 'https://www.google.com/maps', NULL),
(219, 'RIYADH', 'safaa4', 33, 'bn ali', '33', 'https://www.google.com/maps', 219),
(220, 'RIYADH', 'jeddah', 21, '13/21', '66', 'https://www.google.com/maps', 220),
(231, 'RIYADH', 'eastern', 77, '77', '77', 'https://www.google.com/maps', 231),
(230, 'JUBAIL', 'kio', 124, '40', '77', 'https://www.google.com/maps', 230),
(232, 'JUBAIL', 'kio', 78, '78', '78', 'https://www.google.com/maps', 232);

-- --------------------------------------------------------

--
-- Table structure for table `approvedreq`
--

DROP TABLE IF EXISTS `approvedreq`;
CREATE TABLE IF NOT EXISTS `approvedreq` (
  `app_ID` int(30) NOT NULL AUTO_INCREMENT,
  `app_pays_status` text,
  `app_date` date NOT NULL,
  `sell_ID` int(30) DEFAULT NULL,
  `req_id` int(20) NOT NULL,
  `pro_ID` int(30) NOT NULL,
  PRIMARY KEY (`app_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=484 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvedreq`
--

INSERT INTO `approvedreq` (`app_ID`, `app_pays_status`, `app_date`, `sell_ID`, `req_id`, `pro_ID`) VALUES
(482, 'paid', '2021-12-18', 8, 96, 231),
(474, 'paid', '2021-12-09', 6, 83, 139),
(471, 'paid', '2021-11-30', 18, 78, 140),
(470, 'paid', '2021-11-30', 18, 77, 141),
(476, 'paid', '2021-12-10', 6, 84, 145),
(477, 'paid', '2021-12-12', 6, 90, 153),
(478, 'paid', '2021-12-16', 7, 91, 159),
(479, 'paid', '2021-12-16', 18, 92, 167),
(481, 'paid', '2021-12-18', 8, 94, 183),
(483, 'paid', '2021-12-18', 8, 95, 215);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `com_ID` int(30) NOT NULL AUTO_INCREMENT,
  `com_title` text NOT NULL,
  `com_text` text NOT NULL,
  `com_status` text NOT NULL,
  `com_date` date NOT NULL,
  `ac_ID` int(20) NOT NULL,
  `emp_ID` int(30) DEFAULT NULL,
  `emp_comment` text,
  PRIMARY KEY (`com_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`com_ID`, `com_title`, `com_text`, `com_status`, `com_date`, `ac_ID`, `emp_ID`, `emp_comment`) VALUES
(65, 'buyer complaint', 'i cant add my request', 'responded', '2021-12-15', 22, 6, 'thank you'),
(64, 'seller complaint', 'i can not add my request ', 'on hold', '2021-12-15', 18, NULL, 'under processing..');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `em_ID` int(30) NOT NULL AUTO_INCREMENT,
  `em_fname` text NOT NULL,
  `em_lname` text NOT NULL,
  `em_pass` text NOT NULL,
  `em_phone` int(30) NOT NULL,
  `em_mail` text NOT NULL,
  `em_pos` text NOT NULL,
  `em_gender` text NOT NULL,
  `em_dob` date DEFAULT NULL,
  PRIMARY KEY (`em_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`em_ID`, `em_fname`, `em_lname`, `em_pass`, `em_phone`, `em_mail`, `em_pos`, `em_gender`, `em_dob`) VALUES
(6, 'admin    ', 'qahtani                    ', '555', 54567854, 'admin@gmail.com                    ', 'admin', 'female', '2021-10-03'),
(7, 'rana ', 'Algahtani ', '1234', 5647892, 'rana@mail.com ', 'employee', 'female', '2000-11-16'),
(5, 'alla  ', 'alaadeen  ', '1334', 910169450, 'alla@gmail.com  ', 'manager', 'female', '2021-11-14'),
(8, 'Nouf          ', 'Alenazi         ', '1434', 1254879, 'nouf@mail.com         ', 'manager', 'female', '2001-11-08');

-- --------------------------------------------------------

--
-- Table structure for table `imges`
--

DROP TABLE IF EXISTS `imges`;
CREATE TABLE IF NOT EXISTS `imges` (
  `imgID` int(30) NOT NULL AUTO_INCREMENT,
  `pro_ID` int(30) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`imgID`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imges`
--

INSERT INTO `imges` (`imgID`, `pro_ID`, `img`) VALUES
(47, 154, 'home3.png'),
(46, 153, 'home1.png'),
(44, 152, 'home1.png'),
(45, 152, 'home2.png'),
(42, 146, 'home3.png'),
(43, 149, 'home2.png'),
(41, 146, 'home1.png'),
(40, 145, 'home2.png'),
(39, 144, 'home2.png'),
(38, 143, 'home2.png'),
(37, 142, 'home2.png'),
(36, 142, 'vid.mp4'),
(35, 141, 'home1.png'),
(34, 140, 'home3.png'),
(33, 140, 'home2.png'),
(32, 140, 'home1.png'),
(31, 139, 'home3.png'),
(30, 138, 'home2.png'),
(29, 138, 'home1.png'),
(48, 155, 'home1.png'),
(49, 155, 'home2.png'),
(50, 155, 'home3.png'),
(51, 157, 'home2.png'),
(52, 157, 'home3.png'),
(53, 159, 'home1.png'),
(54, 159, 'home2.png'),
(55, 163, 'home1.png'),
(56, 163, 'home2.png'),
(57, 165, 'home1.png'),
(58, 165, 'home2.png'),
(59, 166, 'home1.png'),
(60, 166, 'home2.png'),
(61, 167, 'home1.png'),
(62, 167, 'home2.png'),
(63, 180, 'home2.png'),
(64, 183, 'home3.png'),
(65, 184, 'home3.png'),
(66, 185, 'home3.png'),
(67, 186, 'home3.png'),
(68, 187, 'home1.png'),
(69, 188, 'home1.png'),
(70, 190, 'home1.png'),
(71, 191, 'home2.png'),
(72, 192, 'home2.png'),
(73, 193, 'home1.png'),
(74, 194, 'home1.png'),
(75, 195, 'home2.png'),
(76, 196, 'home2.png'),
(77, 197, 'home2.png'),
(78, 198, 'home2.png'),
(79, 199, 'home2.png'),
(80, 200, 'home2.png'),
(81, 201, 'home2.png'),
(82, 206, 'home2.png'),
(83, 207, 'home2.png'),
(84, 208, 'home2.png'),
(85, 209, 'home3.png'),
(86, 210, 'home2.png'),
(87, 211, 'home2.png'),
(88, 212, 'home1.png'),
(89, 212, 'home2.png'),
(90, 213, 'home2.png'),
(91, 213, 'home3.png'),
(92, 215, 'home2.png'),
(93, 215, 'home3.png'),
(94, 217, 'home2.png'),
(95, 219, 'home2.png'),
(96, 220, 'home3.png'),
(97, 221, 'home3.png'),
(98, 222, 'home3.png'),
(99, 223, 'home3.png'),
(100, 224, 'home3.png'),
(101, 225, 'home3.png'),
(102, 226, 'home3.png'),
(103, 227, 'home3.png'),
(104, 228, 'home3.png'),
(105, 229, 'home3.png'),
(106, 230, 'home1.png'),
(107, 231, 'home2.png'),
(108, 232, 'home1.png');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `pay_ID` int(20) NOT NULL AUTO_INCREMENT,
  `acept_req_id` int(20) NOT NULL,
  `amount` int(30) NOT NULL,
  `pay_date` date NOT NULL,
  `commetion` text NOT NULL,
  `comStatus` text NOT NULL,
  PRIMARY KEY (`pay_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_ID`, `acept_req_id`, `amount`, `pay_date`, `commetion`, `comStatus`) VALUES
(15, 77, 20000, '2021-11-30', '400', 'paid'),
(14, 78, 15000000, '2021-11-30', '300000', 'paid'),
(16, 83, 150000, '2021-12-09', '3000', 'paid'),
(17, 84, 15000000, '2021-12-11', '300000', 'paid'),
(18, 90, 500000, '2021-12-12', '12500', 'paid'),
(19, 91, 600000, '2021-12-16', '15000', 'paid'),
(20, 92, 17000, '2021-12-16', '425', 'paid'),
(21, 93, 150000, '2021-12-18', '3750', 'paid'),
(22, 93, 150000, '2021-12-18', '3750', 'paid'),
(23, 94, 2000, '2021-12-18', '50', 'paid'),
(25, 96, 150000, '2021-12-18', '3750', 'paid'),
(26, 96, 150000, '2021-12-18', '3750', 'paid'),
(27, 95, 150000, '2021-12-18', '3750', 'paid'),
(28, 95, 150000, '2021-12-18', '3750', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `pro_ID` int(30) NOT NULL,
  `pro_type` text,
  `pro_category` text,
  `Added_Date` date DEFAULT NULL,
  `pro_Age` int(20) DEFAULT NULL,
  `pro_img` varchar(30) DEFAULT NULL,
  `no_img` int(30) NOT NULL DEFAULT '1',
  `pro_sqm` int(30) DEFAULT NULL,
  `pro_description` text,
  `pro_status` text,
  `pro_price` int(30) NOT NULL,
  `sell_ID` int(30) DEFAULT NULL,
  `owner` text NOT NULL,
  `imgMap` text NOT NULL,
  `Document` text NOT NULL,
  PRIMARY KEY (`pro_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pro_ID`, `pro_type`, `pro_category`, `Added_Date`, `pro_Age`, `pro_img`, `no_img`, `pro_sqm`, `pro_description`, `pro_status`, `pro_price`, `sell_ID`, `owner`, `imgMap`, `Document`) VALUES
(142, 'rent', 'VILLA', '2021-12-02', 2, 'home1.png', 2, 1000, 'new villah design', 'active', 6000000, 18, 'sara alsarara ', 'R.jpg', 'doc.jpg'),
(141, 'sale', 'APARTMENT', '2021-11-30', 3, 'home1.png', 1, 200, 'dublex', 'closed', 20000, 18, 'sara alsarara', 'R.jpg', 'doc.jpg'),
(140, 'rent', 'VILLA', '2021-11-30', 3, 'home1.png', 3, 700, 'with furniture', 'closed', 15000000, 18, 'sara alsarara', 'R.jpg', 'doc.jpg'),
(139, 'rent', 'LAND', '2021-11-30', 1, 'home2.png', 1, 1500, 'investment', 'closed', 150000, 18, 'sara alsarara', 'R.jpg', 'doc.jpg'),
(138, 'sale', 'HOUSE', '2021-11-30', 1, 'home1.png', 2, 500, 'this house for higher price ', 'rejected', 600000, 18, 'sara alsarara', 'R.jpg', 'doc.jpg'),
(143, 'sale', 'HOUSE', '2021-12-06', 1, 'home2.png', 1, 200, '', 'rejected', 15000000, 18, 'sara alsarara ', 'R.jpg', 'doc.jpg'),
(147, 'sale', 'HOUSE', '2021-12-08', 2, 'home2.png', 1, 1500, '', 'inactive', 600000, 18, 'sara alsrara', 'R.jpg', 'doc.jpg'),
(145, 'sale', 'HOUSE', '2021-12-06', 1, 'home1.png', 1, 1500, '', 'closed', 1500000, 18, 'sara alsarara ', 'R.jpg', 'doc.jpg'),
(149, 'sale', 'HOUSE', '2021-12-08', 2, 'home2.png', 1, 800, '', 'inactive', 150000, 18, 'sara alsrara', 'R.jpg', 'doc.jpg'),
(154, 'rent', 'VILLA', '2021-12-11', 1, 'home3.png', 1, 700, '', 'inactive', 2000000, 23, 'lamya qhtani', 'R.jpg', 'doc.jpg'),
(153, 'sale', 'LAND', '2021-12-11', 1, 'home1.png', 1, 2000, 'land for investment', 'closed', 500000, 23, 'lamyaa qhtani', 'R.jpg', 'doc.jpg'),
(155, 'sale', 'HOUSE', '2021-12-11', 1, 'home1.png', 1, 700, '', 'inactive', 1400000, 23, 'lamyaa  qhtani ', 'R.jpg', 'doc.jpg'),
(157, 'rent', 'APARTMENT', '2021-12-11', 2, 'home2.png', 2, 300, 'furnished appartment', 'inactive', 1200000, 23, 'lamya qhtani', 'R.jpg', 'doc.jpg'),
(159, 'sale', 'APARTMENT', '2021-12-15', 1, 'home1.png', 1, 150, '', 'closed', 600000, 18, 'sara  alsarara  ', 'R.jpg', 'doc.jpg'),
(163, 'sale', 'APARTMENT', '2021-12-15', 1, 'home1.png', 1, 150, '', 'active', 600000, 18, 'sara  alsarara  ', 'R.jpg', 'doc.jpg'),
(165, 'sale', 'APARTMENT', '2021-12-15', 1, 'home1.png', 1, 150, '', 'inactive', 600000, 18, 'sara  alsarara  ', 'R.jpg', 'doc.jpg'),
(166, 'sale', 'APARTMENT', '2021-12-15', 1, 'home1.png', 1, 150, '', 'inactive', 600000, 18, 'sara  alsarara  ', 'R.jpg', 'doc.jpg'),
(167, 'rent', 'HOUSE', '2021-12-16', 1, 'home1.png', 1, 350, '', 'closed', 17000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(180, 'sale', 'APARTMENT', '2021-12-17', 1, 'home2.png', 1, 300, '', 'inactive', 1000000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(183, 'rent', 'VILLA', '2021-12-17', 1, 'home3.png', 1, 600, '', 'closed', 2000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(184, 'sale', 'LAND', '2021-12-17', 0, 'home3.png', 1, 1500, '', 'inactive', 1200000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(185, 'sale', 'LAND', '2021-12-17', 0, 'home3.png', 1, 1500, '', 'inactive', 1200000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(186, 'sale', 'LAND', '2021-12-17', 0, 'home3.png', 1, 1500, '', 'inactive', 1500000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(187, 'rent', 'LAND', '2021-12-17', 0, 'home1.png', 1, 1200, '', 'inactive', 17000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(188, 'sale', 'HOUSE', '2021-12-17', 1, 'home1.png', 1, 500, 'no description', 'inactive', 700000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(190, 'rent', 'VILLA', '2021-12-18', 1, 'home1.png', 1, 1000, 'this for rent', 'inactive', 15000000, 18, 'sara alsrara', 'R.jpg', 'doc.jpg'),
(212, 'sale', 'VILLA', '2021-12-18', 1, 'home1.png', 1, 800, '', 'inactive', 15000000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(211, 'rent', 'VILLA', '2021-12-18', 1, 'home2.png', 1, 1000, '', 'inactive', 20000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(210, 'rent', 'HOUSE', '2021-12-18', 3, 'home2.png', 1, 1000, '', 'inactive', 15000000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(209, 'sale', 'LAND', '2021-12-18', 1, 'home3.png', 1, 1500, '', 'inactive', 150000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(208, 'sale', 'HOUSE', '2021-12-18', 1, 'home2.png', 1, 800, 'no description', 'inactive', 150000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(207, 'sale', 'HOUSE', '2021-12-18', 1, 'home2.png', 1, 800, 'no description', 'inactive', 150000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(206, 'sale', 'HOUSE', '2021-12-18', 1, 'home2.png', 1, 800, 'no description', 'inactive', 150000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(213, 'rent', 'LAND', '2021-12-18', 1, 'home2.png', 1, 1000, '', 'inactive', 50000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(215, 'sale', 'APARTMENT', '2021-12-18', 1, 'home2.png', 2, 150, '', 'closed', 150000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(217, 'sale', 'HOUSE', '2021-12-18', 1, 'home2.png', 1, 200, '', 'inactive', 150000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(219, 'sale', 'HOUSE', '2021-12-18', 1, 'home2.png', 1, 200, '', 'inactive', 150000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(220, 'sale', 'HOUSE', '2021-12-18', 1, 'home3.png', 1, 200, '', 'inactive', 150000, 18, 'sara   alsarara   ', 'doc.jpg', 'doc.jpg'),
(230, 'rent', 'LAND', '2021-12-18', 1, 'home1.png', 1, 200, '', 'inactive', 20000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(231, 'rent', 'VILLA', '2021-12-18', 2, 'home2.png', 1, 200, '', 'closed', 150000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg'),
(232, 'rent', 'VILLA', '2021-12-18', 1, 'home1.png', 1, 800, '', 'inactive', 2000, 18, 'sara   alsarara   ', 'R.jpg', 'doc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `regesterdacounts`
--

DROP TABLE IF EXISTS `regesterdacounts`;
CREATE TABLE IF NOT EXISTS `regesterdacounts` (
  `Ac_ID` int(30) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(50) NOT NULL,
  `user_Lname` text,
  `Password` varchar(30) NOT NULL,
  `Email` text NOT NULL,
  `phone` int(60) NOT NULL,
  `address` text NOT NULL,
  `type` int(30) NOT NULL,
  `gender` text,
  `dob` date DEFAULT NULL,
  `cardNo` int(50) DEFAULT NULL,
  PRIMARY KEY (`Ac_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regesterdacounts`
--

INSERT INTO `regesterdacounts` (`Ac_ID`, `User_Name`, `user_Lname`, `Password`, `Email`, `phone`, `address`, `type`, `gender`, `dob`, `cardNo`) VALUES
(23, 'lamyaa ', ' qhtani ', '444 ', 'lamya@mail.com ', 56897432, 'jubail ', 1, 'female', '2000-05-05', 789456),
(21, 'roba', 'khalid', '123', 'robakh@mail.com', 2547896, 'saffa', 2, 'female', '1990-07-05', 1254789),
(22, 'omer', 'ameen', '123', 'omer@gmail.com', 1254879, 'jeddah', 2, 'male', '2000-05-04', 79456),
(19, 'reem', 'bakur', '1235', 'reem@mail.com', 5328974, 'jubail', 2, 'female', '2000-05-12', 47859),
(20, 'roba', 'almokhtar', '1234', 'roba@mail.com', 5772525, 'jeddah', 1, 'female', '1999-05-03', 25897),
(18, 'sara   ', 'alsarara   ', '1212   ', 'sara@mail.com   ', 552326544, 'jubail   ', 1, 'female', '2000-05-11', 123456),
(24, 'maram', 'Alahmadi', '666', 'maram@gmail.com', 555345066, 'jubail', 2, 'female', '2001-12-22', 789456123);

-- --------------------------------------------------------

--
-- Table structure for table `rejected`
--

DROP TABLE IF EXISTS `rejected`;
CREATE TABLE IF NOT EXISTS `rejected` (
  `rej_id` int(20) NOT NULL AUTO_INCREMENT,
  `pro_ID` int(30) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`rej_id`)
) ENGINE=MyISAM AUTO_INCREMENT=174 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejected`
--

INSERT INTO `rejected` (`rej_id`, `pro_ID`, `comment`) VALUES
(168, 143, 'please add more photo'),
(161, 138, 'this request has acceded price limit.');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedrequests`
--

DROP TABLE IF EXISTS `rejectedrequests`;
CREATE TABLE IF NOT EXISTS `rejectedrequests` (
  `ID` int(30) NOT NULL AUTO_INCREMENT,
  `RqID` int(30) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedrequests`
--

INSERT INTO `rejectedrequests` (`ID`, `RqID`, `comment`) VALUES
(2, 81, 'Documents must be more precise'),
(6, 85, 'incomplete request');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

DROP TABLE IF EXISTS `rent`;
CREATE TABLE IF NOT EXISTS `rent` (
  `ID` int(30) NOT NULL AUTO_INCREMENT,
  `pro_ID` int(30) NOT NULL,
  `freq` text NOT NULL,
  `period` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`ID`, `pro_ID`, `freq`, `period`) VALUES
(1, 183, 'Monthly', '6 months'),
(4, 167, 'yearly', '2 year'),
(3, 142, 'yearly', '1 year'),
(5, 140, 'Monthly', '6 months'),
(6, 139, 'Monthly', '4 months'),
(7, 187, 'Yearly', '1 year'),
(8, 190, 'monthly', '4 month'),
(14, 210, 'Yearly', '2 years'),
(15, 211, 'Monthly', '6 months'),
(16, 213, 'Yearly', '2 years'),
(17, 215, 'Yearly', '1 year'),
(18, 230, 'Yearly', '2 years'),
(19, 231, 'Monthly', '6 months'),
(20, 232, 'Monthly', '3 months');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `RqID` int(20) NOT NULL AUTO_INCREMENT,
  `buy_ID` int(20) NOT NULL,
  `sell_ID` int(30) NOT NULL,
  `fromUser` text NOT NULL,
  `req_type` text NOT NULL,
  `pro_ID` int(20) NOT NULL,
  `req_status` text,
  `req_date` date NOT NULL,
  PRIMARY KEY (`RqID`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`RqID`, `buy_ID`, `sell_ID`, `fromUser`, `req_type`, `pro_ID`, `req_status`, `req_date`) VALUES
(82, 21, 18, 'roba khalid', 'rent', 142, 'closed', '2021-12-07'),
(81, 21, 18, 'roba khalid', 'sale', 145, 'rejected', '2021-12-07'),
(80, 19, 18, 'reem bakur', 'rent', 142, 'closed', '2021-12-02'),
(78, 19, 18, 'reem bakur', 'rent', 140, 'paid', '2021-11-30'),
(79, 19, 18, 'reem bakur', 'rent', 139, 'closed', '2021-12-02'),
(77, 19, 18, 'reem bakur', 'sale', 141, 'paid', '2021-11-30'),
(83, 21, 18, 'roba khalid', 'rent', 139, 'paid', '2021-12-07'),
(84, 22, 18, 'omer ameen', 'sale', 145, 'paid', '2021-12-10'),
(85, 24, 18, 'maram Alahmadi', 'rent', 142, 'rejected', '2021-12-12'),
(92, 22, 18, 'omer ameen', 'rent', 167, 'paid', '2021-12-16'),
(91, 22, 18, 'omer ameen', 'sale', 159, 'paid', '2021-12-16'),
(90, 24, 23, 'maram Alahmadi', 'sale', 153, 'paid', '2021-12-12'),
(94, 22, 18, 'omer ameen', 'rent', 183, 'paid', '2021-12-18'),
(95, 22, 18, 'omer ameen', 'rent', 215, 'paid', '2021-12-18'),
(96, 22, 18, 'omer ameen', 'rent', 231, 'paid', '2021-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

DROP TABLE IF EXISTS `structure`;
CREATE TABLE IF NOT EXISTS `structure` (
  `strcID` int(20) NOT NULL AUTO_INCREMENT,
  `floor` int(20) NOT NULL DEFAULT '0',
  `bedrooms` int(20) NOT NULL DEFAULT '0',
  `rooms` int(20) NOT NULL DEFAULT '0',
  `pro_ID` int(30) NOT NULL,
  PRIMARY KEY (`strcID`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `structure`
--

INSERT INTO `structure` (`strcID`, `floor`, `bedrooms`, `rooms`, `pro_ID`) VALUES
(116, 0, 2, 5, 149),
(115, 0, 2, 4, 149),
(113, 0, 1, 3, 201),
(112, 0, 1, 3, 200),
(111, 0, 1, 3, 199),
(110, 0, 1, 3, 198),
(109, 0, 1, 3, 197),
(114, 0, 2, 4, 149),
(107, 0, 2, 3, 195),
(102, 1, 3, 4, 190),
(101, 0, 3, 6, 153),
(100, 0, 3, 6, 188),
(99, 1, 5, 3, 183),
(96, 0, 3, 5, 180),
(95, 0, 3, 5, 143),
(94, 0, 3, 5, 143),
(93, 0, 3, 5, 143),
(92, 0, 3, 5, 143),
(91, 0, 3, 5, 143),
(90, 3, 5, 10, 138),
(82, 1, 2, 3, 166),
(81, 1, 2, 3, 165),
(83, 0, 0, 0, 167),
(79, 1, 2, 3, 163),
(85, 3, 5, 10, 138),
(84, 3, 5, 10, 138),
(76, 1, 2, 3, 159),
(86, 3, 5, 10, 138),
(74, 1, 2, 3, 153),
(73, 1, 5, 6, 157),
(72, 2, 2, 4, 155),
(87, 3, 5, 10, 138),
(70, 2, 3, 5, 154),
(68, 2, 2, 4, 149),
(88, 3, 5, 10, 138),
(89, 3, 5, 10, 138),
(63, 3, 2, 6, 145),
(65, 1, 3, 7, 147),
(61, 0, 2, 2, 143),
(60, 2, 3, 5, 142),
(59, 0, 2, 5, 141),
(58, 2, 5, 10, 140),
(57, 1, 3, 9, 138),
(117, 0, 2, 5, 149),
(118, 0, 3, 6, 206),
(119, 0, 3, 6, 207),
(120, 1, 2, 3, 208),
(121, 0, 7, 10, 210),
(122, 2, 5, 13, 211),
(123, 1, 2, 4, 212),
(124, 0, 2, 4, 213),
(125, 0, 2, 5, 215),
(126, 2, 7, 12, 215),
(127, 0, 3, 2, 217),
(128, 0, 3, 2, 217),
(129, 0, 3, 2, 219),
(130, 0, 1, 1, 220),
(140, 2, 4, 6, 231),
(141, 1, 1, 2, 232);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

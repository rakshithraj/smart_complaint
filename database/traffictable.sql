-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2014 at 09:09 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `complintbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `traffictable`
--

CREATE TABLE IF NOT EXISTS `traffictable` (
  `complaintId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(100) NOT NULL,
  `Priority` int(10) NOT NULL,
  `myLocation` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Category` varchar(10) NOT NULL DEFAULT 'traffic',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`complaintId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `traffictable`
--

INSERT INTO `traffictable` (`complaintId`, `userId`, `Priority`, `myLocation`, `message`, `image`, `created_at`, `Category`, `status`) VALUES
(34, 'rahul@ymail.com', 0, 'adada asda', '   enter ur complaint here', '2014-04-23-05-25-16--358665426.jpeg', '2014-04-28 11:09:42', 'traffic', 0),
(35, 'rahul@ymail.com', 0, 'WFWFSF', '   enter ur complaint here', '2014-04-23-05-25-16--358665426.jpeg', '2014-04-28 11:14:06', 'traffic', 0),
(36, 'rahul@ymail.com', 0, 'as safsa sf', '   enter ur complaint here', '2014-04-23-05-25-16--358665426.jpeg', '2014-04-28 11:36:12', 'traffic', 1),
(37, 'rahul@ymail.com', 0, 'as safsa sf', '   enter ur complaint here', '2014-04-23-05-25-16--358665426.jpeg', '2014-04-28 11:41:02', 'traffic', 0),
(38, 'rahul@ymail.com', 0, 'adada ', '   enter ur complaint here', '2014-04-23-05-25-16--358665426.jpeg', '2014-04-28 11:42:00', 'traffic', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

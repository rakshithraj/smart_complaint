-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2015 at 10:46 AM
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
-- Table structure for table `admintable`
--

CREATE TABLE IF NOT EXISTS `admintable` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`username`, `password`) VALUES
('student', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `logintable`
--

CREATE TABLE IF NOT EXISTS `logintable` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `GcmId` text NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`Email`, `Password`, `Name`, `Age`, `Contact`, `City`, `State`, `sex`, `GcmId`) VALUES
('raj.rakshith@ymail.com', '6563231', 'rakshith', '12', '9035308757', 'mangalore', 'mangalore', 'male', 'APA91bF860zKc8XcGytTeixlxrCoUxsBaU02hEzu-Y26p1husRR7QiMrjHjFWQ_NPRg3eSeiEYQzmfB_mLQdJJSg39axwfYeaECJd37o1s-xJYWU-tekb7gPkIK5ae38qmfT2ZT42wp4'),
('raj@gmail.com', '6563231', 'raj', '25', '9035308757', 'mangalore', 'mangalore', 'male', 'APA91bG7-zFIg0Ss3W2HuUSc4UJntv1B5NrdU9AlfRo8osGxZBe8q5RDXgIIVAqUX4F5wpkAoQ1YCfCpYKGgC5qZYQPQt3nBZYjc4eBS6Bb79svRCQJyh0RjWjOKhkKVVBhm7OYZw3l4');

-- --------------------------------------------------------

--
-- Table structure for table `mescomtable`
--

CREATE TABLE IF NOT EXISTS `mescomtable` (
  `complaintId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(100) NOT NULL,
  `Priority` int(10) NOT NULL,
  `myLocation` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Category` varchar(10) NOT NULL DEFAULT 'mescom',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`complaintId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mescomtable`
--

INSERT INTO `mescomtable` (`complaintId`, `userId`, `Priority`, `myLocation`, `message`, `image`, `created_at`, `Category`, `status`) VALUES
(2, '', 0, '', 'mescom1', '', '2015-10-14 09:47:51', 'mescom', 0),
(3, '', 0, '', 'mescom2', '', '2015-10-14 09:47:58', 'mescom', 0),
(4, '', 0, '', 'mescom3', '', '2015-10-14 09:48:02', 'mescom', 0),
(5, '', 0, '', 'mescom4', '', '2015-10-14 09:48:07', 'mescom', 0),
(6, '', 0, '', 'mescom5', '', '2015-10-14 12:29:05', 'mescom', 0),
(7, '', 0, '', 'mescom6', '', '2015-10-14 12:29:11', 'mescom', 0),
(8, '', 0, '', 'mescom7', '', '2015-10-14 12:29:15', 'mescom', 0),
(9, '', 0, '', 'mescom8', '', '2015-10-14 12:29:19', 'mescom', 0),
(10, '', 0, '', 'mescom9', '', '2015-10-14 12:29:26', 'mescom', 0),
(11, '', 0, '', 'mescom10', '', '2015-10-14 12:29:31', 'mescom', 2),
(12, '', 0, '', 'mescom11', '', '2015-10-14 12:29:34', 'mescom', 2),
(13, '', 0, '', 'mescom12', '', '2015-10-14 12:29:38', 'mescom', 0),
(14, '', 0, '', 'mescom13', '', '2015-10-14 12:29:42', 'mescom', 2),
(15, '', 0, '', 'mescom14', '', '2015-10-14 12:29:47', 'mescom', 0),
(16, '', 0, '', 'mescom15', '', '2015-10-14 12:29:52', 'mescom', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mnpotable`
--

CREATE TABLE IF NOT EXISTS `mnpotable` (
  `complaintId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(100) NOT NULL,
  `Priority` int(10) NOT NULL,
  `myLocation` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Category` varchar(10) NOT NULL DEFAULT 'mnpo',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`complaintId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mnpotable`
--

INSERT INTO `mnpotable` (`complaintId`, `userId`, `Priority`, `myLocation`, `message`, `image`, `created_at`, `Category`, `status`) VALUES
(1, '', 0, '', 'mnpo1 jjhjhhhhhhhhhhhhhhh hhhhhhhhhhhhh hhhhhhhhhhh hhhhhhhhhhhhh hhhhhhhhhhhhh hhhhhhhhhhhhhhhhhhh', '', '2015-10-14 09:48:24', 'mnpo', 0),
(2, '', 0, '', 'mnpo2', '', '2015-10-14 09:48:36', 'mnpo', 0),
(3, '', 0, '', 'mnpo3', '', '2015-10-14 09:48:40', 'mnpo', 0),
(4, '', 0, '', 'mnpo4', '', '2015-10-14 09:48:43', 'mnpo', 0),
(5, 'raj.rakshith@ymail.com', 0, 'jjj jjj', 'njjjjjjjj j', '2015-09-29-17-24-48--93747993.jpg', '2015-10-17 15:51:09', 'mnpo', 0),
(6, '', 1, 'ffffff', 'fffffffffffffff', 'images-1.jpg', '2015-12-01 10:44:00', 'mnpo', 0),
(7, 'raj.rakshith@ymail.com', 1, 'fffffdddd', 'fffff', 'images-1.jpg', '2015-12-01 12:20:38', 'mnpo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `policetable`
--

CREATE TABLE IF NOT EXISTS `policetable` (
  `complaintId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(100) NOT NULL,
  `Priority` int(10) NOT NULL,
  `myLocation` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Category` varchar(10) NOT NULL DEFAULT 'police',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`complaintId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `policetable`
--

INSERT INTO `policetable` (`complaintId`, `userId`, `Priority`, `myLocation`, `message`, `image`, `created_at`, `Category`, `status`) VALUES
(8, '', 0, '', 'police1', '', '2015-10-14 09:49:40', 'police', 0),
(9, '', 0, '', 'police2', '', '2015-10-14 09:49:45', 'police', 0),
(10, '', 0, '', 'police3', '', '2015-10-14 09:49:50', 'police', 0),
(11, '', 0, '', 'police4', '', '2015-10-14 09:50:04', 'police', 0),
(12, 'raj.rakshith@ymail.com', 1, 'hh hdfhdfh ffd dhd', 'hghhgh', 'images.jpg', '2015-10-20 09:39:49', 'police', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `traffictable`
--

INSERT INTO `traffictable` (`complaintId`, `userId`, `Priority`, `myLocation`, `message`, `image`, `created_at`, `Category`, `status`) VALUES
(43, '', 0, '', 'traffic1', '', '2015-10-14 09:50:41', 'traffic', 1),
(44, '', 0, '', 'traffic2', '', '2015-10-14 09:50:49', 'traffic', 0),
(45, '', 0, '', 'traffic3', '', '2015-10-14 09:50:54', 'traffic', 2),
(46, '', 0, '', 'traffic4', '', '2015-10-14 09:50:57', 'traffic', 0),
(47, 'raj@gmail.com', 0, 'complaint my', 'my complaints', 'images-1.jpg', '2015-10-14 13:07:08', 'traffic', 1),
(48, 'raj.rakshith@ymail.com', 1, 'jhjjjhj', 'gggg sdgsdg', 'images.jpg', '2015-10-17 15:52:09', 'traffic', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

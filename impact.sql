-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 20, 2019 at 04:21 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impact`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

DROP TABLE IF EXISTS `accommodation`;
CREATE TABLE IF NOT EXISTS `accommodation` (
  `ID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Day1` tinyint(1) NOT NULL,
  `Day2` tinyint(1) NOT NULL,
  `Day3` tinyint(1) NOT NULL,
  `Day4` tinyint(1) NOT NULL,
  `Day5` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accommodation prices`
--

DROP TABLE IF EXISTS `accommodation prices`;
CREATE TABLE IF NOT EXISTS `accommodation prices` (
  `Dormitory` tinyint(4) UNSIGNED NOT NULL,
  `Non-AC rooms` tinyint(4) UNSIGNED NOT NULL,
  `AC rooms` tinyint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accommodation prices`
--

INSERT INTO `accommodation prices` (`Dormitory`, `Non-AC rooms`, `AC rooms`) VALUES
(150, 175, 250);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Name` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Username`, `Password`) VALUES
('Edwin Charles', 'charlymk56@gmail.com', '*A9FEC46232334C5EA0250FEB6707063F8A5570D7'),
('Jijo Punnoose', 'Jijop@gmail.com', '*95DF4C53BF6111A35307FA106F6E4AB608E4E9E7'),
('Joash Philip', 'joashvp@gmail.com', '*CBE324BD93D7CA2F57549D2DCA544A98516EFE2F'),
('John Joseph', 'johnjo@gmail.com', '*F720ABACACBD1D26B6904DC0011FFAFD1F2DBA7C');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `ID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Breakfast` varchar(50) DEFAULT NULL,
  `Morning Tea` varchar(50) DEFAULT NULL,
  `Lunch` varchar(50) DEFAULT NULL,
  `Evening Tea` varchar(50) DEFAULT NULL,
  `Dinner` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food price`
--

DROP TABLE IF EXISTS `food price`;
CREATE TABLE IF NOT EXISTS `food price` (
  `Breakfast` tinyint(3) UNSIGNED NOT NULL,
  `Morning tea` tinyint(3) UNSIGNED NOT NULL,
  `Lunch` tinyint(3) UNSIGNED NOT NULL,
  `Evening Tea` tinyint(3) UNSIGNED NOT NULL,
  `Dinner` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food price`
--

INSERT INTO `food price` (`Breakfast`, `Morning tea`, `Lunch`, `Evening Tea`, `Dinner`) VALUES
(100, 25, 150, 25, 100);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `ID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Total` float NOT NULL,
  `Paid` float NOT NULL,
  `Due` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Submission` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `First Name` varchar(15) NOT NULL,
  `Last Name` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `Age` int(2) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Phone Number` bigint(14) UNSIGNED NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Current residence Kerala` varchar(15) NOT NULL,
  `Association with IMPACT network` varchar(50) NOT NULL,
  `Food` varchar(5) NOT NULL,
  `Accommodation` varchar(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD CONSTRAINT `accommodation_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

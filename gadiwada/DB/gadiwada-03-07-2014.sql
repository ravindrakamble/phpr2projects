-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2014 at 05:26 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gadiwada`
--
CREATE DATABASE IF NOT EXISTS `gadiwada` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gadiwada`;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_ID` int(11) DEFAULT NULL,
  `NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CITY_ID` (`CITY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE IF NOT EXISTS `car_model` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CAR_ID` int(11) DEFAULT NULL,
  `MODEL_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CAR_ID` (`CAR_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE IF NOT EXISTS `car_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `city_name`) VALUES
(1, 'Bangalore'),
(2, 'Pune'),
(3, 'Bhubaneswar');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FEATURE_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `package_local`
--

CREATE TABLE IF NOT EXISTS `package_local` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_ID` int(11) DEFAULT NULL,
  `PACKAGE_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CITY_ID` (`CITY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `package_outstation`
--

CREATE TABLE IF NOT EXISTS `package_outstation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_ID` int(11) DEFAULT NULL,
  `PACKAGE_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CITY_ID` (`CITY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`ID`);

--
-- Constraints for table `car_model`
--
ALTER TABLE `car_model`
  ADD CONSTRAINT `car_model_ibfk_1` FOREIGN KEY (`CAR_ID`) REFERENCES `car_type` (`ID`);

--
-- Constraints for table `package_local`
--
ALTER TABLE `package_local`
  ADD CONSTRAINT `package_local_ibfk_1` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`ID`);

--
-- Constraints for table `package_outstation`
--
ALTER TABLE `package_outstation`
  ADD CONSTRAINT `package_outstation_ibfk_1` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

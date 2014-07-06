-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2014 at 01:23 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gadivada`
--
CREATE DATABASE IF NOT EXISTS `gadivada` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gadivada`;

-- --------------------------------------------------------

--
-- Table structure for table `agent_contacts`
--

CREATE TABLE IF NOT EXISTS `agent_contacts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AGENT_ID` int(11) NOT NULL,
  `CONTACT_NAME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `PHONE_NO` varchar(20) DEFAULT NULL,
  `MOBILE_NO` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_AGENT_CONTACTS.AGENT_ID` (`AGENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `agent_contacts`
--

INSERT INTO `agent_contacts` (`ID`, `AGENT_ID`, `CONTACT_NAME`, `EMAIL`, `PHONE_NO`, `MOBILE_NO`) VALUES
(1, 1, 'User 1', 'user1@taxino1.com', '1234567890', '9876543210'),
(2, 1, 'User 11', 'user1@taxino1.com', '1234567890', '9876543210'),
(3, 2, 'User 2', 'user1@taxtonrent.com', '1234567890', '9876543210'),
(4, 2, 'User 21', 'user1@taxtonrent.com', '1234567890', '9876543210'),
(5, 3, 'User 3', 'user1@olacab.com', '1234567890', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_ID` int(11) NOT NULL,
  `AREA_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_AREA.CITY_ID` (`CITY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE IF NOT EXISTS `car_model` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MODEL_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`ID`, `MODEL_NAME`) VALUES
(1, 'Indica'),
(2, 'Figo'),
(3, 'Indigo'),
(4, 'Etios liva');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE IF NOT EXISTS `car_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`ID`, `TYPE_NAME`) VALUES
(1, '4 seater'),
(2, '5 seater'),
(3, '6 seater'),
(4, '7 seater');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `CITY_NAME`) VALUES
(1, 'Bangalore'),
(2, 'Pune'),
(3, 'Bhubaneshwar');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE IF NOT EXISTS `discount_coupons` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `COUPON_CODE` varchar(100) DEFAULT NULL,
  `DISCOUNT_AMOUNT` decimal(10,2) DEFAULT NULL,
  `DISCOUNT_PERCENTAGE` decimal(5,2) DEFAULT NULL,
  `EXPIRY_DATE` varchar(40) DEFAULT NULL,
  `MIN_PURCHASE_PRICE` decimal(10,2) DEFAULT NULL,
  `COUPON_TYPE` varchar(40) DEFAULT NULL,
  `MAX_LIMIT` int(11) DEFAULT NULL,
  `PASSENGER_MOBILE_NO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `discount_coupons`
--

INSERT INTO `discount_coupons` (`ID`, `COUPON_CODE`, `DISCOUNT_AMOUNT`, `DISCOUNT_PERCENTAGE`, `EXPIRY_DATE`, `MIN_PURCHASE_PRICE`, `COUPON_TYPE`, `MAX_LIMIT`, `PASSENGER_MOBILE_NO`) VALUES
(1, 'AXMGG123', '100.00', '0.00', '31/12/2014', '1000.00', 'General', 50, ''),
(2, 'AXMGG124', '0.00', '10.00', '31/08/2014', '0.00', 'Specific', 0, '9591940200');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FEATURE_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`ID`, `FEATURE_NAME`) VALUES
(1, 'Luggage Carrier'),
(2, 'Music'),
(3, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AGENT_ID` int(11) NOT NULL,
  `CAR_TYPE` varchar(100) DEFAULT NULL,
  `CAR_NAME` varchar(100) DEFAULT NULL,
  `CAR_NUMBER` varchar(20) DEFAULT NULL,
  `PURCHASE_YEAR` varchar(20) DEFAULT NULL,
  `CAR_FEATURES` varchar(200) DEFAULT NULL,
  `OWNER_NAME` varchar(100) DEFAULT NULL,
  `OWNER_NUMBER` varchar(100) DEFAULT NULL,
  `AGREEMEST_START_DATE` varchar(50) DEFAULT NULL,
  `AGREEMEST_END_DATE` varchar(50) DEFAULT NULL,
  `AC` int(2) DEFAULT NULL,
  `NON_AC` int(2) DEFAULT NULL,
  `LOCAL` int(2) DEFAULT NULL,
  `OUTSTATION` int(2) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_INVENTORY.AGENT_ID` (`AGENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `AGENT_ID`, `CAR_TYPE`, `CAR_NAME`, `CAR_NUMBER`, `PURCHASE_YEAR`, `CAR_FEATURES`, `OWNER_NAME`, `OWNER_NUMBER`, `AGREEMEST_START_DATE`, `AGREEMEST_END_DATE`, `AC`, `NON_AC`, `LOCAL`, `OUTSTATION`) VALUES
(1, 1, '4 seater', 'Indica', 'OR-05-AB-1990', '2012', 'Roof Luggage,Music', 'Owner 1', '12345', '1/1/2014', '31/12/2014', 1, 0, 1, 1),
(2, 1, '4 seater', 'Indica', 'OR-05-AB-1991', '2012', 'Roof Luggage', 'Owner 2', '12345', '1/1/2014', '31/1/2014', 0, 1, 1, 1),
(3, 1, '4 seater', 'Indigo', 'OR-05-AB-1992', '2012', 'Roof Luggage,Music', 'Owner 3', '12345', '1/1/2014', '31/12/2014', 1, 0, 1, 1),
(4, 1, '7 seater', 'Bolero SLX', 'OR-05-AB-1993', '2012', 'Roof Luggage,Music', 'Owner 4', '12345', '1/1/2014', '31/12/2014', 1, 0, 1, 1),
(5, 1, '8 seater', 'Sumo', 'OR-05-AB-1994', '2012', 'Roof Luggage,Music', 'Owner 5', '12345', '1/1/2014', '31/05/2014', 1, 0, 1, 1),
(6, 1, '9 seater', 'Tavera', 'OR-05-AB-1995', '2012', 'Roof Luggage,Music', 'Owner 6', '12345', '1/1/2014', '31/12/2014', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_local`
--

CREATE TABLE IF NOT EXISTS `package_local` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_ID` int(11) NOT NULL,
  `LOCAL_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_PACKAGE_LOCAL.CITY_ID` (`CITY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `package_local`
--

INSERT INTO `package_local` (`ID`, `CITY_ID`, `LOCAL_NAME`) VALUES
(1, 1, 'Airport'),
(2, 1, 'Railway station'),
(3, 1, '40km/4hr');

-- --------------------------------------------------------

--
-- Table structure for table `package_outstation`
--

CREATE TABLE IF NOT EXISTS `package_outstation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_ID` int(11) NOT NULL,
  `OUTSTATION_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_PACKAGE_OUTSTATION.CITY_ID` (`CITY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `package_outstation`
--

INSERT INTO `package_outstation` (`ID`, `CITY_ID`, `OUTSTATION_NAME`) VALUES
(1, 1, 'Mysore'),
(2, 1, 'Mangalore'),
(3, 1, '100km/10hr'),
(4, 1, '150km/10hr');

-- --------------------------------------------------------

--
-- Table structure for table `travel_agent`
--

CREATE TABLE IF NOT EXISTS `travel_agent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BUSINESS_NAME` varchar(100) DEFAULT NULL,
  `BUSINESS_TYPE` varchar(100) DEFAULT NULL,
  `WEBSITE_URL` varchar(100) DEFAULT NULL,
  `CORPORATION_NUMBER` varchar(100) DEFAULT NULL,
  `PAN` varchar(40) DEFAULT NULL,
  `BUSINESS_TAN` varchar(40) DEFAULT NULL,
  `STARTED_IN` int(10) DEFAULT NULL,
  `OTHER_BUSINESS` varchar(200) DEFAULT NULL,
  `ADDRESS_LINE_1` varchar(100) DEFAULT NULL,
  `ADDRESS_LINE_2` varchar(100) DEFAULT NULL,
  `COUNTRY` varchar(50) DEFAULT NULL,
  `STATE` varchar(50) DEFAULT NULL,
  `CITY` varchar(50) DEFAULT NULL,
  `PINCODE` varchar(10) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `travel_agent`
--

INSERT INTO `travel_agent` (`ID`, `BUSINESS_NAME`, `BUSINESS_TYPE`, `WEBSITE_URL`, `CORPORATION_NUMBER`, `PAN`, `BUSINESS_TAN`, `STARTED_IN`, `OTHER_BUSINESS`, `ADDRESS_LINE_1`, `ADDRESS_LINE_2`, `COUNTRY`, `STATE`, `CITY`, `PINCODE`, `USERNAME`, `PASSWORD`) VALUES
(1, 'Taxi No 1', 'PVT LTD', 'www.taxino1.com', 'ABCD1234', 'ABCDE54321', 'EDCBA12345', 1990, '', 'Baangalore 1', 'Bangalore2', 'India', 'Karnataka', 'Bangalore', '560078', 'user1@gmail.com', 'user1'),
(2, 'Taxi on Rent', 'Proprietor', 'www.taxionrent.com', 'ABCD1234', 'ABCDE54321', 'EDCBA12345', 1995, '', 'Baangalore 1', 'Bangalore2', 'India', 'Karnataka', 'Bangalore', '560078', 'user2@gmail.com', 'user2'),
(3, 'OLA CAB', 'PVT LTD', 'www.olacab.com', 'ABCD1234', 'ABCDE54321', 'EDCBA12345', 2000, '', 'Baangalore 1', 'Bangalore2', 'India', 'Karnataka', 'Bangalore', '560078', 'user3@gmail.com', 'user3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent_contacts`
--
ALTER TABLE `agent_contacts`
  ADD CONSTRAINT `FK_AGENT_CONTACTS.AGENT_ID` FOREIGN KEY (`AGENT_ID`) REFERENCES `travel_agent` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `FK_AREA.CITY_ID` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK_INVENTORY.AGENT_ID` FOREIGN KEY (`AGENT_ID`) REFERENCES `travel_agent` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_local`
--
ALTER TABLE `package_local`
  ADD CONSTRAINT `FK_PACKAGE_LOCAL.CITY_ID` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package_outstation`
--
ALTER TABLE `package_outstation`
  ADD CONSTRAINT `FK_PACKAGE_OUTSTATION.CITY_ID` FOREIGN KEY (`CITY_ID`) REFERENCES `city` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

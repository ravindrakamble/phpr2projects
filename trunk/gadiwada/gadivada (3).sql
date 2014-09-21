-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2014 at 08:05 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gadivada`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gadivada.com', '21232f297a57a5a743894a0e4a801fc3');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`ID`, `CITY_ID`, `AREA_NAME`) VALUES
(1, 2, 'Pimpri'),
(2, 22, 'Mumbai 12');

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE IF NOT EXISTS `car_model` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE_ID` int(11) NOT NULL DEFAULT '0',
  `MODEL_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`ID`, `TYPE_ID`, `MODEL_NAME`) VALUES
(1, 1, 'Innova'),
(2, 1, 'Fortuner'),
(3, 11, 'Indica'),
(4, 10, 'Indigo'),
(5, 10, 'aaaa'),
(7, 0, ''),
(8, 0, ''),
(9, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE IF NOT EXISTS `car_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`ID`, `TYPE_NAME`) VALUES
(1, '12 seater'),
(10, '5 seater'),
(11, '4 seater'),
(12, '10 seater');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `CITY_NAME`) VALUES
(2, 'Pune1'),
(3, 'Bhubaneshwar'),
(22, 'Mumbai'),
(23, 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CUST_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE` bigint(20) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `CUST_NAME`, `EMAIL`, `PHONE`, `PASSWORD`, `STATUS`) VALUES
(2, 'reena', 'reena@gmail.com', 7411045442, 'd41d8cd98f00b204e9800998ecf8427e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cust_booking`
--

CREATE TABLE IF NOT EXISTS `cust_booking` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CUST_ID` int(11) NOT NULL,
  `AGENT_ID` int(11) NOT NULL,
  `RECEIPT_DATE` varchar(200) DEFAULT NULL,
  `BILL_NO` bigint(20) NOT NULL,
  `CAR_NO` varchar(200) DEFAULT NULL,
  `CAR_TYPE` varchar(200) DEFAULT NULL,
  `OWNER_MOBILE` int(11) DEFAULT NULL,
  `JOURNEY_DATE` varchar(200) DEFAULT NULL,
  `JOURNEY_TIME` varchar(200) DEFAULT NULL,
  `AREA` varchar(200) DEFAULT NULL,
  `CITY` varchar(200) DEFAULT NULL,
  `DESTINATION` varchar(255) DEFAULT NULL,
  `FARE` varchar(255) DEFAULT NULL,
  `TOTAL_AMOUNT` int(11) DEFAULT NULL,
  `AMOUNT_PAID` int(11) DEFAULT NULL,
  `BALANCE` int(11) DEFAULT NULL,
  `REMARKS` varchar(255) DEFAULT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`),
  KEY `FK_cust_booking.CUST_ID` (`CUST_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `cust_booking`
--

INSERT INTO `cust_booking` (`ID`, `CUST_ID`, `AGENT_ID`, `RECEIPT_DATE`, `BILL_NO`, `CAR_NO`, `CAR_TYPE`, `OWNER_MOBILE`, `JOURNEY_DATE`, `JOURNEY_TIME`, `AREA`, `CITY`, `DESTINATION`, `FARE`, `TOTAL_AMOUNT`, `AMOUNT_PAID`, `BALANCE`, `REMARKS`, `STATUS`) VALUES
(27, 2, 2, '14-07-2014', 2147483647, 'Indigo', '5 seater', 2147483647, '15/07/2014', '***** ', 'Pimpri', 'Pune', '******', '******', 1000, 500, 500, '', 0),
(28, 2, 2, '14-07-2014', 2147483647, 'Indigo', '5 seater', 2147483647, '15/07/2014', '***** ', 'Pimpri', 'Pune', '******', '******', 1212, 500, 712, '', 0),
(29, 2, 2, '14-07-2014', 2147483647, 'Indigo', '5 seater', 2147483647, '15/07/2014', '***** ', 'Pimpri', 'Pune', '******', '******', 100, 10, 90, '', 0),
(30, 2, 2, '14-07-2014', 71405358687, 'Indigo', '5 seater', 2147483647, '15/07/2014', '***** ', 'Pimpri', 'Pune', '******', '******', 100, 10, 90, '', 0),
(31, 2, 1, '03-08-2014', 11407049277, 'Indica', '4 seater', 12345, '', '***** ', '', '', '******', '******', 0, 0, 0, '', 1),
(32, 2, 1, '27-08-2014', 11409159570, 'Indica', '4 seater', 12345, '28/08/2014', '10:42 pm ', '', '0', '******', '******', 1000, 500, 500, 'Good', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `discount_coupons`
--

INSERT INTO `discount_coupons` (`ID`, `COUPON_CODE`, `DISCOUNT_AMOUNT`, `DISCOUNT_PERCENTAGE`, `EXPIRY_DATE`, `MIN_PURCHASE_PRICE`, `COUPON_TYPE`, `MAX_LIMIT`, `PASSENGER_MOBILE_NO`) VALUES
(1, 'AXMGG123', '100.00', '0.00', '31/12/2014', '1000.00', 'General', 50, ''),
(2, 'AXMGG124', '0.00', '10.00', '31/08/2014', '0.00', 'Specific', 0, '9591940200'),
(6, 'HDFC2020', '100.00', '10.00', '08/26/2014', '1000.00', 'General', 90, '');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FEATURE_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`ID`, `FEATURE_NAME`) VALUES
(1, 'Luggage Carrier'),
(2, 'Music'),
(3, 'Video'),
(5, 'as'),
(6, 'asd'),
(7, 'asdrtwert'),
(8, 'asdfasf'),
(9, 'qwertre'),
(10, 'jutyujtyju'),
(11, 'tyry'),
(12, 'eryjrtju');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `AGENT_ID`, `CAR_TYPE`, `CAR_NAME`, `CAR_NUMBER`, `PURCHASE_YEAR`, `CAR_FEATURES`, `OWNER_NAME`, `OWNER_NUMBER`, `AGREEMEST_START_DATE`, `AGREEMEST_END_DATE`, `AC`, `NON_AC`, `LOCAL`, `OUTSTATION`) VALUES
(1, 1, '4 seater', 'Indica', 'OR-05-AB-1990', '2012', 'Roof Luggage,Music', 'Owner', '12345', '1/1/2014', '31/12/2014', 1, 0, 1, 1),
(2, 1, '4 seater', 'Indica', 'OR-05-AB-1991', '2012', 'Roof Luggage', 'Owner 2', '12345', '1/1/2014', '31/1/2014', 0, 1, 1, 1),
(3, 1, '4 seater', 'Indigo', 'OR-05-AB-1992', '2012', 'Roof Luggage,Music', 'Owner 3', '12345', '1/1/2014', '31/12/2014', 1, 0, 1, 1),
(4, 1, '7 seater', 'Bolero SLX', 'OR-05-AB-1993', '2012', 'Roof Luggage,Music', 'Owner 4', '12345', '1/1/2014', '31/12/2014', 1, 0, 1, 1),
(5, 1, '8 seater', 'Sumo', 'OR-05-AB-1994', '2012', 'Roof Luggage,Music', 'Owner 5', '12345', '1/1/2014', '31/05/2014', 1, 0, 1, 1),
(6, 1, '9 seater', 'Tavera', 'OR-05-AB-1995', '2012', 'Roof Luggage,Music', 'Owner 6', '12345', '1/1/2014', '31/12/2014', 1, 0, 0, 1),
(7, 2, '5 seater', 'Indigo', 'OR-05-AB-1994', '1988', 'Luggage Carrier,Music,Video', 'User', '7411045442', '06/07/2014', '28/08/2014', 1, 1, 1, 1),
(8, 2, '4 seater', 'Indica', 'OR-05-AB-1000', '2000', 'Music,Video', 'user', '567567567567', '09/07/2014', '30/08/2014', 1, 0, 0, 1),
(9, 2, '0', '', '', '', NULL, '', '', '', '', 0, 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `package_local`
--

INSERT INTO `package_local` (`ID`, `CITY_ID`, `LOCAL_NAME`) VALUES
(1, 2, 'pune edit 1'),
(2, 3, 'Bhu 123'),
(3, 2, 'Pune-Lonavla');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `package_outstation`
--

INSERT INTO `package_outstation` (`ID`, `CITY_ID`, `OUTSTATION_NAME`) VALUES
(2, 3, 'Bhu 2'),
(3, 2, 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_local`
--

CREATE TABLE IF NOT EXISTS `pricing_local` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `price_for` varchar(50) NOT NULL COMMENT '1-Fexible, 2-Package',
  `car_type_id` int(11) NOT NULL,
  `car_model_id` int(11) NOT NULL,
  `ac_nonac` varchar(50) NOT NULL,
  `package` varchar(200) DEFAULT NULL,
  `extra_per_km` decimal(10,2) DEFAULT NULL,
  `extra_per_hr` decimal(10,2) DEFAULT NULL,
  `min_halt_time` varchar(40) DEFAULT NULL,
  `price_per_min_booking_time` decimal(10,2) DEFAULT NULL,
  `price_per_km` decimal(10,2) DEFAULT NULL,
  `commision_fixed` decimal(5,2) DEFAULT NULL,
  `commision_percentage` decimal(5,2) DEFAULT NULL,
  `base_operating_area_0` varchar(40) DEFAULT NULL,
  `base_operating_area_1` varchar(40) DEFAULT NULL,
  `base_operating_area_2` varchar(40) DEFAULT NULL,
  `base_operating_area_3` varchar(40) DEFAULT NULL,
  `base_operating_area_4` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_pricing_local.car_type_id` (`car_type_id`),
  KEY `FK_pricing_local.car_model_id` (`car_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pricing_local`
--

INSERT INTO `pricing_local` (`ID`, `price_for`, `car_type_id`, `car_model_id`, `ac_nonac`, `package`, `extra_per_km`, `extra_per_hr`, `min_halt_time`, `price_per_min_booking_time`, `price_per_km`, `commision_fixed`, `commision_percentage`, `base_operating_area_0`, `base_operating_area_1`, `base_operating_area_2`, `base_operating_area_3`, `base_operating_area_4`) VALUES
(2, 'Flexible', 1, 2, 'NON AC', NULL, NULL, NULL, '100', '12.00', '12.00', NULL, NULL, '111', '222', '333', '444', '555'),
(6, 'Flexible', 10, 5, 'NON AC', NULL, NULL, NULL, '16', '0.00', '0.00', NULL, NULL, '12', '222', '32', '42', '52'),
(9, 'Flexible', 1, 1, 'AC', '0', '12.00', '8.00', '255', '15.00', '20.00', NULL, NULL, '9', '8', '7', '6', '5'),
(10, 'Package', 10, 4, 'AC', '0', '19.00', '8.00', NULL, NULL, NULL, NULL, NULL, '19', '20', '39', '40', '59');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_outstation`
--

CREATE TABLE IF NOT EXISTS `pricing_outstation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `price_for` varchar(50) NOT NULL COMMENT '1-Fexible, 2-Package',
  `car_type_id` int(11) NOT NULL,
  `car_model_id` int(11) NOT NULL,
  `ac_nonac` varchar(50) NOT NULL,
  `package` varchar(255) NOT NULL,
  `min_time_hr` varchar(40) DEFAULT NULL,
  `price_per_min_booking_time` decimal(10,2) DEFAULT NULL,
  `extra_price_per_hr` decimal(10,2) DEFAULT NULL,
  `price_per_km` decimal(10,2) DEFAULT NULL,
  `commision_fixed` decimal(5,2) DEFAULT NULL,
  `commision_percentage` decimal(5,2) DEFAULT NULL,
  `base_operating_area_0` varchar(40) DEFAULT NULL,
  `base_operating_area_1` varchar(40) DEFAULT NULL,
  `base_operating_area_2` varchar(40) DEFAULT NULL,
  `base_operating_area_3` varchar(40) DEFAULT NULL,
  `base_operating_area_4` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_pricing_outstation.car_type_id` (`car_type_id`),
  KEY `FK_pricing_outstation.car_model_id` (`car_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pricing_outstation`
--

INSERT INTO `pricing_outstation` (`ID`, `price_for`, `car_type_id`, `car_model_id`, `ac_nonac`, `package`, `min_time_hr`, `price_per_min_booking_time`, `extra_price_per_hr`, `price_per_km`, `commision_fixed`, `commision_percentage`, `base_operating_area_0`, `base_operating_area_1`, `base_operating_area_2`, `base_operating_area_3`, `base_operating_area_4`) VALUES
(1, '0', 1, 1, '0', '', '1', '22.00', '12.00', '100.00', NULL, NULL, '12', '12', '12', '12', '12'),
(2, '0', 10, 4, '0', '', '2', '33.00', '43.00', '234.00', NULL, NULL, '234', '23412', '1234', '23413', '1234'),
(3, '0', 11, 3, '0', '', '234', '234.00', '234.00', '234.00', NULL, NULL, '5', '34', '12343', '34', '34'),
(4, '0', 1, 2, '0', '', '122', '123.00', '123.00', '123.00', NULL, NULL, '13212', '123', '12341', '123', '123'),
(6, 'Flexible', 1, 1, 'AC', '', '43', '34.00', '234.00', '34.00', NULL, NULL, '3', '3234', '3', '34', '555'),
(7, 'Flexible', 1, 2, 'AC', '', '1', '123.00', '234.00', '234.00', NULL, NULL, '111', '222', '333', '444', '555');

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
  `PASSWORD` varchar(50) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `travel_agent`
--

INSERT INTO `travel_agent` (`ID`, `BUSINESS_NAME`, `BUSINESS_TYPE`, `WEBSITE_URL`, `CORPORATION_NUMBER`, `PAN`, `BUSINESS_TAN`, `STARTED_IN`, `OTHER_BUSINESS`, `ADDRESS_LINE_1`, `ADDRESS_LINE_2`, `COUNTRY`, `STATE`, `CITY`, `PINCODE`, `USERNAME`, `PASSWORD`, `STATUS`) VALUES
(1, 'Taxi No 1', 'PVT LTD', 'www.taxino1.com', 'ABCD1234', 'ABCDE54321', 'EDCBA12345', 1990, '', 'Baangalore 1', 'Bangalore2', 'India', 'Karnataka', 'Pune', '560078', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', 0),
(2, 'Taxi on Rent', 'Proprietor', 'www.taxionrent.com', 'ABCD1234', 'ABCDE54321', 'EDCBA12345', 1995, '', 'Baangalore 1', 'Bangalore2', 'India', 'Karnataka', 'Pune', '560078', 'user2@gmail.com', '7e58d63b60197ceb55a1c487989a3720', 1),
(3, 'OLA CAB', 'PVT LTD', 'www.olacab.com', 'ABCD1234', 'ABCDE54321', 'EDCBA12345', 2000, '', 'Baangalore 1', 'Bangalore2', 'India', 'Karnataka', 'Bangalore', '560078', 'user3@gmail.com', '92877af70a45fd6a2ed7fe81e1236b78', 1);

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
-- Constraints for table `cust_booking`
--
ALTER TABLE `cust_booking`
  ADD CONSTRAINT `FK_cust_booking.CUST_ID` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `pricing_local`
--
ALTER TABLE `pricing_local`
  ADD CONSTRAINT `FK_pricing_local.car_model_id` FOREIGN KEY (`car_model_id`) REFERENCES `car_model` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pricing_local.car_type_id` FOREIGN KEY (`car_type_id`) REFERENCES `car_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pricing_outstation`
--
ALTER TABLE `pricing_outstation`
  ADD CONSTRAINT `FK_pricing_outstation.car_model_id` FOREIGN KEY (`car_model_id`) REFERENCES `car_model` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pricing_outstation.car_type_id` FOREIGN KEY (`car_type_id`) REFERENCES `car_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

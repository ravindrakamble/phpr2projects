-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2014 at 07:20 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 26, 'Pimpri'),
(2, 26, 'Balaji Nagar'),
(3, 27, 'Juhu'),
(4, 27, 'Dombivli'),
(5, 29, 'Place1'),
(6, 30, 'kol');

-- --------------------------------------------------------

--
-- Table structure for table `cancellation`
--

CREATE TABLE IF NOT EXISTS `cancellation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payers` varchar(100) NOT NULL,
  `deduction` varchar(50) NOT NULL,
  `time1` varchar(50) NOT NULL,
  `time2` varchar(50) NOT NULL,
  `time3` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cancellation`
--

INSERT INTO `cancellation` (`id`, `payers`, `deduction`, `time1`, `time2`, `time3`) VALUES
(1, 'full', '12', '1', '2', '3'),
(3, 'partial', '33333', '2312', '1231', '1232');

-- --------------------------------------------------------

--
-- Table structure for table `car_model`
--

CREATE TABLE IF NOT EXISTS `car_model` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE_ID` int(11) NOT NULL DEFAULT '0',
  `MODEL_NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `car_model`
--

INSERT INTO `car_model` (`ID`, `TYPE_ID`, `MODEL_NAME`) VALUES
(13, 13, 'Indica'),
(14, 13, 'Indigo'),
(15, 14, 'Duster'),
(16, 17, 'Innova'),
(17, 17, 'Fortuner');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE IF NOT EXISTS `car_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`ID`, `TYPE_NAME`) VALUES
(13, '4 Seater'),
(14, '6 Seater'),
(15, '5 Seater'),
(16, '10 Seater'),
(17, '12 Seater');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CITY_NAME` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ID`, `CITY_NAME`) VALUES
(26, 'Pune'),
(27, 'Mumbai'),
(28, 'Bangalore'),
(29, 'Bhuvneshwar'),
(30, 'Kolkata');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `CUST_NAME`, `EMAIL`, `PHONE`, `PASSWORD`, `STATUS`) VALUES
(2, 'reena', 'reena@gmail.com', 7411045442, '098f6bcd4621d373cade4e832627b4f6', 1),
(3, 'Ravindra', 'ravi@gmail.com', 989898989898, '63dd3e154ca6d948fc380fa576343ba6', 1);

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
  `BOOKED_BY` varchar(50) NOT NULL,
  `INV_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_cust_booking.CUST_ID` (`CUST_ID`),
  KEY `FK_cust_booking.INV_ID` (`INV_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cust_booking`
--

INSERT INTO `cust_booking` (`ID`, `CUST_ID`, `AGENT_ID`, `RECEIPT_DATE`, `BILL_NO`, `CAR_NO`, `CAR_TYPE`, `OWNER_MOBILE`, `JOURNEY_DATE`, `JOURNEY_TIME`, `AREA`, `CITY`, `DESTINATION`, `FARE`, `TOTAL_AMOUNT`, `AMOUNT_PAID`, `BALANCE`, `REMARKS`, `STATUS`, `BOOKED_BY`, `INV_ID`) VALUES
(1, 2, 2, '24-09-2014', 31411578436, 'DL-98-9098', '4 Seater', 2147483647, '29/09/2014', '10:37 pm ', '', '0', '******', '******', 0, 0, 0, '', 1, 'agent', 3);

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE IF NOT EXISTS `discount_coupons` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `COUPON_CODE` varchar(100) DEFAULT NULL,
  `DISCOUNT_AMOUNT` int(11) DEFAULT NULL,
  `DISCOUNT_PERCENTAGE` int(11) DEFAULT NULL,
  `EXPIRY_DATE` varchar(40) DEFAULT NULL,
  `MIN_PURCHASE_PRICE` int(11) DEFAULT NULL,
  `COUPON_TYPE` varchar(40) DEFAULT NULL,
  `MAX_LIMIT` int(11) DEFAULT NULL,
  `PASSENGER_MOBILE_NO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `discount_coupons`
--

INSERT INTO `discount_coupons` (`ID`, `COUPON_CODE`, `DISCOUNT_AMOUNT`, `DISCOUNT_PERCENTAGE`, `EXPIRY_DATE`, `MIN_PURCHASE_PRICE`, `COUPON_TYPE`, `MAX_LIMIT`, `PASSENGER_MOBILE_NO`) VALUES
(1, 'AXMGG123', 100, 10, '01/09/2014', 2000, 'Specific', NULL, '2366565675');

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
(1, 'Video'),
(2, 'Music'),
(3, 'Luggage carrier');

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
  `BOOKING_STATUS` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`ID`),
  KEY `FK_INVENTORY.AGENT_ID` (`AGENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`ID`, `AGENT_ID`, `CAR_TYPE`, `CAR_NAME`, `CAR_NUMBER`, `PURCHASE_YEAR`, `CAR_FEATURES`, `OWNER_NAME`, `OWNER_NUMBER`, `AGREEMEST_START_DATE`, `AGREEMEST_END_DATE`, `AC`, `NON_AC`, `LOCAL`, `OUTSTATION`, `BOOKING_STATUS`) VALUES
(1, 4, '13', '13', 'KA-09-9090', '2010', 'Video,Music', 'Shantosh', '8978675645', '07/09/2014', '10/11/2014', 1, 0, 1, 0, b'1'),
(2, 4, '17', '16', 'KA-02-2011', '2012', 'Video,Music,Luggage carrier', 'Shravan', '878767655567', '30/09/2014', '10/10/2014', 1, 0, 1, 0, b'1'),
(3, 2, '13', '13', 'DL-98-9098', '1990', 'Music,Luggage carrier', 'Ganesh', '887767667655', '23/09/2014', '10/12/2014', 0, 1, 1, 0, b'0'),
(4, 2, '14', '15', 'MH-01-2000', '2000', 'Video,Music', 'Uttam', '986767654543', '30/09/2014', '10/11/2014', 1, 0, 0, 1, b'1'),
(5, 2, '17', '17', 'LO-09-8787', '1020', 'Video,Luggage carrier', 'Vakratund', '9845124567', '30/09/2014', '10/11/2014', 1, 0, 0, 1, b'1');

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
(1, 28, 'Airport'),
(2, 28, 'Railway station'),
(3, 26, 'Airport Road'),
(4, 29, '40km/4hr');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `package_outstation`
--

INSERT INTO `package_outstation` (`ID`, `CITY_ID`, `OUTSTATION_NAME`) VALUES
(1, 27, '40km/4hr'),
(2, 30, 'Airport');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_local`
--

CREATE TABLE IF NOT EXISTS `pricing_local` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) NOT NULL,
  `price_for` varchar(50) NOT NULL COMMENT '1-Fexible, 2-Package',
  `car_type_id` int(11) NOT NULL,
  `car_model_id` int(11) NOT NULL,
  `ac_nonac` varchar(50) NOT NULL,
  `package` varchar(200) DEFAULT NULL,
  `extra_per_km` int(11) DEFAULT NULL,
  `extra_per_hr` int(11) DEFAULT NULL,
  `min_halt_time` varchar(40) DEFAULT NULL,
  `price_per_min_booking_time` int(11) DEFAULT NULL,
  `price_per_km` int(11) DEFAULT NULL,
  `commision_fixed` int(11) DEFAULT NULL,
  `commision_percentage` int(11) DEFAULT NULL,
  `base_operating_area_0` varchar(40) DEFAULT NULL,
  `base_operating_area_1` varchar(40) DEFAULT NULL,
  `base_operating_area_2` varchar(40) DEFAULT NULL,
  `base_operating_area_3` varchar(40) DEFAULT NULL,
  `base_operating_area_4` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_pricing_local.car_type_id` (`car_type_id`),
  KEY `FK_pricing_local.car_model_id` (`car_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pricing_local`
--

INSERT INTO `pricing_local` (`ID`, `agent_id`, `price_for`, `car_type_id`, `car_model_id`, `ac_nonac`, `package`, `extra_per_km`, `extra_per_hr`, `min_halt_time`, `price_per_min_booking_time`, `price_per_km`, `commision_fixed`, `commision_percentage`, `base_operating_area_0`, `base_operating_area_1`, `base_operating_area_2`, `base_operating_area_3`, `base_operating_area_4`) VALUES
(2, 2, 'Package', 17, 17, 'AC', '2', 2, 2, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_outstation`
--

CREATE TABLE IF NOT EXISTS `pricing_outstation` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `agent_id` int(11) NOT NULL,
  `price_for` varchar(50) NOT NULL COMMENT '1-Fexible, 2-Package',
  `car_type_id` int(11) NOT NULL,
  `car_model_id` int(11) NOT NULL,
  `ac_nonac` varchar(50) NOT NULL,
  `package` varchar(255) NOT NULL,
  `min_time_hr` varchar(40) DEFAULT NULL,
  `price_per_min_booking_time` int(11) DEFAULT NULL,
  `extra_price_per_hr` int(11) DEFAULT NULL,
  `price_per_km` int(11) DEFAULT NULL,
  `commision_fixed` int(11) DEFAULT NULL,
  `commision_percentage` int(11) DEFAULT NULL,
  `base_operating_area_0` varchar(40) DEFAULT NULL,
  `base_operating_area_1` varchar(40) DEFAULT NULL,
  `base_operating_area_2` varchar(40) DEFAULT NULL,
  `base_operating_area_3` varchar(40) DEFAULT NULL,
  `base_operating_area_4` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_pricing_outstation.car_type_id` (`car_type_id`),
  KEY `FK_pricing_outstation.car_model_id` (`car_model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pricing_outstation`
--

INSERT INTO `pricing_outstation` (`ID`, `agent_id`, `price_for`, `car_type_id`, `car_model_id`, `ac_nonac`, `package`, `min_time_hr`, `price_per_min_booking_time`, `extra_price_per_hr`, `price_per_km`, `commision_fixed`, `commision_percentage`, `base_operating_area_0`, `base_operating_area_1`, `base_operating_area_2`, `base_operating_area_3`, `base_operating_area_4`) VALUES
(2, 2, 'Flexible', 13, 13, 'AC', '', '123', 2341, 1231, 31231, NULL, NULL, '', '', '', '', ''),
(8, 2, 'Package', 14, 15, 'AC', '2', NULL, NULL, 11, 11, NULL, NULL, '', '', '', '', ''),
(9, 2, 'Package', 17, 16, 'AC', '1', NULL, NULL, 22, 22, NULL, NULL, '', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `travel_agent`
--

INSERT INTO `travel_agent` (`ID`, `BUSINESS_NAME`, `BUSINESS_TYPE`, `WEBSITE_URL`, `CORPORATION_NUMBER`, `PAN`, `BUSINESS_TAN`, `STARTED_IN`, `OTHER_BUSINESS`, `ADDRESS_LINE_1`, `ADDRESS_LINE_2`, `COUNTRY`, `STATE`, `CITY`, `PINCODE`, `USERNAME`, `PASSWORD`, `STATUS`) VALUES
(2, 'Taxi on Rent', 'Proprietor', 'www.taxionrent.com', 'ABCD1234', 'ABCDE54321', 'EDCBA12345', 1995, '', 'Baangalore 1', 'Bangalore2', 'India', 'Karnataka', 'Pune', '560078', 'user2@gmail.com', '7e58d63b60197ceb55a1c487989a3720', 1),
(3, 'OLA CAB', 'PVT LTD', 'www.olacab.com', 'ABCD1234', 'ABCDE54321', 'EDCBA12345', 2000, '', 'Baangalore 1', 'Bangalore2', 'India', 'Karnataka', 'Bangalore', '560078', 'user3@gmail.com', '92877af70a45fd6a2ed7fe81e1236b78', 0),
(4, 'Ravindra', 'Individual', 'www.google.com', 'FG56565', 'HU67HJH', 'HH7777HH', 2014, 'Flight booking', 'asdasj', 'jhhjh', 'india', 'Karnataka', 'Bangalore', '560078', 'ravindra@gmail.com', 'da5f05e5a77b8ddb8fb308eeab603575', 1);

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
  ADD CONSTRAINT `FK_cust_booking.CUST_ID` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cust_booking.INV_ID` FOREIGN KEY (`INV_ID`) REFERENCES `inventory` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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

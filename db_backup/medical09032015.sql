-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 11:40 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_info`
--

CREATE TABLE IF NOT EXISTS `billing_info` (
  `billno` int(11) NOT NULL,
  PRIMARY KEY (`billno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_info`
--

INSERT INTO `billing_info` (`billno`) VALUES
(2),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27);

-- --------------------------------------------------------

--
-- Table structure for table `consulting_info`
--

CREATE TABLE IF NOT EXISTS `consulting_info` (
  `doctor_id` int(10) NOT NULL,
  `consulting_charge` int(11) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consulting_info`
--

INSERT INTO `consulting_info` (`doctor_id`, `consulting_charge`) VALUES
(1, 500),
(2, 200);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `visitor_id` int(10) NOT NULL,
  `patent_id` int(10) DEFAULT NULL,
  `discount_discription` varchar(100) DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`visitor_id`, `patent_id`, `discount_discription`, `discount_amount`) VALUES
(0, 0, '', 0),
(1, 1, 'ESI Hospital', 100),
(2, 2, '', 0),
(4, 4, 'Insurance', 123),
(5, 5, 'Type Reference', 100),
(6, 6, 'RefName', 200),
(7, 7, 'Ref', 100),
(8, 8, 'Ref', 100),
(9, 9, 'ESI Hospital', 200),
(11, 11, 'Discount Name', 1234),
(18, 18, '', 0),
(19, 19, 'Mallaya Hospital', 500),
(20, 20, '', 0),
(21, 21, '', 0),
(22, 22, '', 0),
(23, 23, '', 0),
(24, 11, '', 0),
(26, 19, '', 0),
(27, 6, '', 0),
(29, 29, 'Christmas Discount', 500),
(30, 30, '', 0),
(32, 32, '', 0),
(33, 32, 'Family Checkup 599', 599),
(35, 35, '', 0),
(37, 32, '', 0),
(39, 29, '', 0),
(40, 29, '', 0),
(41, 32, '', 0),
(42, 18, '', 0),
(49, 49, '', 0),
(50, 50, 'Banu Nursing Home', 100),
(51, 51, '', 0),
(52, 52, '', 0),
(53, 53, '', 0),
(54, 54, '', 0),
(55, 55, '', 0),
(56, 56, '', 0),
(57, 49, 'ESI Hospital', 55),
(58, 50, 'Something', 55),
(59, 59, 'KIMES Hospital', 55),
(61, 61, 'Kumar (KIMS Hospital)', 200);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_information`
--

CREATE TABLE IF NOT EXISTS `doctors_information` (
  `doctor_id` int(10) NOT NULL,
  `doctor_firstname` varchar(20) DEFAULT NULL,
  `doctor_lastname` varchar(20) DEFAULT NULL,
  `doctor_mobile_no` varchar(15) DEFAULT NULL,
  `doctor_phone_no` varchar(15) DEFAULT NULL,
  `doctor_address` varchar(50) DEFAULT NULL,
  `doctor_city` varchar(15) DEFAULT NULL,
  `doctor_pin` varchar(15) DEFAULT NULL,
  `doctor_state` varchar(2) DEFAULT NULL,
  `specialist` varchar(90) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors_information`
--

INSERT INTO `doctors_information` (`doctor_id`, `doctor_firstname`, `doctor_lastname`, `doctor_mobile_no`, `doctor_phone_no`, `doctor_address`, `doctor_city`, `doctor_pin`, `doctor_state`, `specialist`, `summary`, `status`) VALUES
(1, 'Noushad', 'Ali', '09986368357', '09986368357', 'Garvebhavi Palya', 'Bangalore', '560068', 'Ka', 'Mental Specilist', ' Mental Specilist', 1),
(2, 'Pavan', 'Kumar', '99999', '8888', 'BANGALORE', 'BANGALORE', '123456', 'Ka', 'Eye', ' ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `investigation_information`
--

CREATE TABLE IF NOT EXISTS `investigation_information` (
  `investigation_id` int(10) NOT NULL DEFAULT '0',
  `investigation_name` varchar(100) DEFAULT NULL,
  `investigation_fee` float DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`investigation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_information`
--

INSERT INTO `investigation_information` (`investigation_id`, `investigation_name`, `investigation_fee`, `summary`, `status`) VALUES
(1, '17-OH Progesterone', 1500, 'sdfasdf dsf', '1'),
(2, '24 hrs  Urine 17 ketosteroids', 2700, 'Test Info', '1'),
(3, '24 hrs Urine Amylase', 400, '   24 hrs Urine Amylase', '1'),
(4, '24 hrs Urine Calcium', 250, ' 24 hrs Urine Calcium', '1'),
(5, '24 hrs Urine Chloride', 300, ' 24 hrs Urine Chloride', '1'),
(6, '24 hrs Urine Cortisol', 1200, ' 24 hrs Urine Cortisol', '1'),
(7, '24 hrs Urine Creatinine', 250, ' 24 hrs Urine Creatinine', '1'),
(8, ' 24 hrs Urine Creatinine Clearance', 430, ' 24 hrs Urine Creatinine Clearance', '1'),
(9, '24 hrs Urine Copper', 2000, '  24 hrs Urine Copper ', '1'),
(10, '24 hrs Urine for AFB', 200, '24 hrs Urine for AFB ', '1'),
(11, '24 hs Urine Microalbumin', 300, ' 24 hs Urine Microalbumin', '1'),
(12, '24 hrs Urine Metanephrine', 2000, ' 24 hrs Urine Metanephrine', '1'),
(13, '24 hrs Urine Oxalate', 2000, ' 24 hrs Urine Oxalate', '1'),
(14, '24 hrs Urine Sodium', 250, '  24 hrs Urine Sodium ', '1'),
(15, '24 hrs Urine Phosphorus', 250, '24 hrs Urine Phosphorus ', '1'),
(16, '24 hrs Urine Potassium', 200, '24 hrs Urine Potassium ', '1'),
(17, '24 hrs Urine Protein', 350, ' 24 hrs Urine Protein', '1'),
(18, '24 hrs Urine Protein electrophoresis ', 1500, '24 hrs Urine Protein electrophoresis ', '1'),
(19, ' 24 hrs Urine protein creatinine Ratio', 400, ' 24 hrs Urine protein creatinine Ratio', '1'),
(20, 'Ultrasound A.V Fistula Doppler', 800, ' Ultrasound A.V Fistula Doppler', '1'),
(21, 'Ultrasound Renal Artery Dopple', 1000, 'Ultrasound Renal Artery Dopple', '1'),
(22, ' Ultrasound Carotid And Vertebral Doppler', 1000, ' Ultrasound Carotid And Vertebral Doppler', '1'),
(23, 'Ultrasound Venous Doppler (Both Limbs)', 1400, 'Ultrasound Venous Doppler (Both Limbs)', '1'),
(24, 'Ultrasound Venous Doppler (Single Limb)', 700, 'Ultrasound Venous Doppler (Single Limb)', '1'),
(25, ' Ultrasound Arterial Doppler (Both Limbs)', 1400, ' Ultrasound Arterial Doppler (Both Limbs)', '1'),
(26, ' Ultrasound Arterial Doppler(Single Limb)', 700, ' Ultrasound Arterial Doppler(Single Limb)', '1'),
(27, 'Ultrasound Fetal Doppler', 600, ' Ultrasound Fetal Doppler', '1'),
(28, 'Ultrasound Fetal well being (BPP)', 800, 'Ultrasound Fetal well being (BPP)', '1'),
(29, 'Ultrasound Interval Growth', 800, 'Ultrasound Interval Growth', '1'),
(30, 'Ultrasound Anomaly scan ', 800, 'Ultrasound Anomaly scan ', '1'),
(31, 'Ultrasound NT scan ', 600, ' Ultrasound NT scan ', '1'),
(32, 'Ultrasound Early pregnancy', 600, 'Ultrasound Early pregnancy', '1'),
(33, 'Ultrasound Sonomammogram', 600, ' Ultrasound Sonomammogram', '1'),
(34, 'Ultrasound Neurosonogram', 500, ' Ultrasound Neurosonogram', '1'),
(35, 'Ultrasound Small part', 500, 'Ultrasound Small part', '1'),
(36, 'Ultrasound TVS scan', 600, 'Ultrasound TVS scan', '1'),
(37, ' Ultrasound Follicular (3 package)', 1200, ' Ultrasound Follicular (3 package)', '1'),
(38, 'Ultrasound Follicular (single)', 500, 'Ultrasound Follicular (single)', '1'),
(39, 'Ultrasound Neck ', 600, ' Ultrasound Neck ', '1'),
(40, 'Ultrasound Soft tissue', 500, 'Ultrasound Soft tissue ', '1'),
(41, 'Ultrasound Scrotum', 600, ' Ultrasound Scrotum', '1'),
(42, 'Ultrasound  Chest ', 500, 'Ultrasound  Chest ', '1'),
(43, 'Ultrasound  Pelvis ', 500, 'Ultrasound  Pelvis ', '1'),
(44, 'Ultrasound Abdomen and pelvis', 600, 'Ultrasound Abdomen and pelvis', '1');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_record`
--

CREATE TABLE IF NOT EXISTS `investigation_record` (
  `visitor_id` int(10) DEFAULT NULL,
  `patent_id` int(10) DEFAULT NULL,
  `investigation_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigation_record`
--

INSERT INTO `investigation_record` (`visitor_id`, `patent_id`, `investigation_id`) VALUES
(1, 1, 3),
(1, 1, 4),
(1, 1, 7),
(1, 1, 8),
(1, 1, 1),
(1, 1, 7),
(1, 1, 4),
(2, 2, 4),
(4, 4, 3),
(4, 4, 5),
(4, 4, 5),
(5, 5, 3),
(5, 5, 1),
(6, 6, 4),
(7, 7, 2),
(8, 8, 1),
(8, 8, 2),
(8, 8, 5),
(9, 9, 3),
(9, 9, 4),
(9, 9, 7),
(11, 11, 2),
(11, 11, 3),
(11, 11, 7),
(18, 18, 3),
(18, 18, 2),
(19, 19, 3),
(19, 19, 4),
(19, 19, 4),
(20, 20, 3),
(20, 20, 3),
(20, 20, 4),
(20, 20, 4),
(20, 20, 7),
(20, 20, 2),
(0, 0, 3),
(0, 0, 3),
(0, 0, 4),
(0, 0, 4),
(0, 0, 7),
(0, 0, 2),
(21, 21, 3),
(21, 21, 3),
(21, 21, 4),
(21, 21, 2),
(21, 21, 3),
(21, 21, 3),
(21, 21, 4),
(21, 21, 2),
(22, 22, 3),
(22, 22, 3),
(22, 22, 4),
(22, 22, 2),
(23, 23, 3),
(23, 23, 3),
(23, 23, 4),
(23, 23, 2),
(24, 11, 10),
(24, 11, 11),
(26, 19, 2),
(26, 19, 3),
(27, 6, 8),
(29, 29, 3),
(29, 29, 2),
(29, 29, 4),
(30, 30, 2),
(30, 30, 3),
(30, 30, 4),
(32, 32, 3),
(32, 32, 4),
(32, 32, 2),
(33, 32, 3),
(33, 32, 4),
(35, 35, 10),
(37, 32, 3),
(37, 32, 2),
(39, 29, 0),
(39, 29, 3),
(40, 29, 3),
(41, 32, 3),
(42, 18, 3),
(42, 18, 2),
(49, 49, 2),
(50, 50, 3),
(50, 50, 4),
(50, 50, 7),
(55, 55, 3),
(56, 56, 3),
(57, 49, 1),
(57, 49, 2),
(57, 49, 5),
(57, 49, 7),
(58, 50, 1),
(59, 59, 3),
(61, 61, 22),
(61, 61, 23),
(61, 61, 22);

-- --------------------------------------------------------

--
-- Table structure for table `patent`
--

CREATE TABLE IF NOT EXISTS `patent` (
  `patent_id` int(11) NOT NULL,
  PRIMARY KEY (`patent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patent`
--

INSERT INTO `patent` (`patent_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62);

-- --------------------------------------------------------

--
-- Table structure for table `patient_information`
--

CREATE TABLE IF NOT EXISTS `patient_information` (
  `patientid` int(10) NOT NULL,
  `title` varchar(5) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `marital_status` varchar(1) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `pin` varchar(7) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `registereddated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`patientid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_information`
--

INSERT INTO `patient_information` (`patientid`, `title`, `firstname`, `lastname`, `age`, `gender`, `marital_status`, `address`, `state`, `pin`, `country`, `phone`, `mobile`, `registereddated`) VALUES
(0, 'Mr', 'Noushad', 'Ali', 23, 'M', 'S', 'Bangalore', 'KA', '560068', 'India', '8888888888', '99999999999', '2015-02-07 20:43:50'),
(1, 'Mr', 'Noushad', 'Ali', 24, 'M', 'S', 'JP Nagar', 'KA', '', 'India', '8888888888', '9999999999', NULL),
(2, 'Mr', 'Srinivas', '', 25, 'M', 'S', 'Jayanagar', 'KA', '', 'India', '88888', '9999', '2015-01-26 08:25:16'),
(4, 'Mr', 'Noushad', 'Ai', 25, 'M', 'S', 'Address', 'KA', '560068', 'India', '8888', '999', '2015-01-31 08:16:36'),
(5, 'Mr', 'FirstName', 'LastName', 12, 'M', 'S', 'Address', 'KA', '560085', 'India', '8888888888', '999999999', '2015-01-31 17:12:09'),
(6, 'Mr', 'TestFirstName', 'TestLastName', 12, 'M', 'S', 'My Addpress', 'KA', '12345', 'India', '88888888', '999999', '2015-01-31 17:35:34'),
(7, 'Mr', 'SecondTest', 'LastNamesecond', 12, 'M', 'S', 'Address', 'KA', '12345', 'India', '88888', '99999', '2015-01-31 17:36:43'),
(8, 'Mr', 'TestF', 'TestL', 45, 'M', 'S', 'Address', 'KA', '123456', 'India', '8888', '99999', '2015-01-31 18:07:08'),
(9, 'Mr', 'Noushadali', 'Ali', 25, 'M', 'S', '#40, Hosur Main Road, Garvebhavi Palya', 'KA', '560068', 'India', '23128108', '9986368357', '2015-01-31 20:15:18'),
(11, 'Miss', 'Preethi', 'Guptha', 12, 'F', 'S', 'Indra Nagar', 'KA', '560068', 'India', '1234567891', '1987654321', '2015-02-01 09:40:58'),
(18, 'Mr', 'Kalyan', 'Avasthi', 46, 'M', 'S', 'Koramangala', 'KA', '560012', 'India', '88888', '99999', '2015-02-07 17:31:38'),
(19, 'Miss', 'Pooja', 'Guptha', 25, 'F', 'M', 'Malleshwaram', 'KA', '12345', 'India', '8888', '9999', '2015-02-07 18:09:39'),
(20, 'Mr', 'Noushad', 'Ali', 23, 'M', 'S', 'Bangalore', 'KA', '560068', 'India', '8888888888', '99999999999', '2015-02-07 20:40:38'),
(21, 'Mr', 'Noushad', 'Ali', 20, 'M', 'S', 'Bangalre', 'KA', '123', 'India', '22222', '3333333', '2015-02-07 20:46:10'),
(22, 'Mr', 'Noushad', 'Ali', 20, 'M', 'S', 'Bangalre', 'KA', '123', 'India', '22222', '3333333', '2015-02-07 20:48:12'),
(23, 'Mr', 'Noushad', 'Ali', 20, 'M', 'S', 'Bangalre', 'KA', '123', 'India', '22222', '3333333', '2015-02-07 20:49:40'),
(29, 'Mr', 'King', 'Khan', 45, 'M', 'M', 'Mumbai', 'KA', '12345', 'India', '88888', '99999', '2015-02-08 08:51:09'),
(30, 'Mr', 'Kiran', 'Kumar', 24, 'M', 'S', 'Bannargatta', 'KA', '', 'India', '888', '999', '2015-02-08 10:35:22'),
(32, 'Mr', 'Imran', 'Khan', 27, 'M', 'M', 'Koramangala', 'KA', '', 'India', '', '9912345678', '2015-02-08 11:55:11'),
(35, 'Mr', 'Kiran ', 'Kumar', 15, 'M', 'S', 'Bannergatta', 'KA', '', 'India', '', '9845123456', '2015-02-08 12:12:08'),
(49, 'Mr', 'Sunil ', 'Guptha', 54, 'M', 'M', 'Shivaji nagar', 'KA', '560001', 'India', '', '', '2015-03-07 09:46:24'),
(50, 'Mr', 'Sandeep', 'Kumar', 50, 'M', 'M', '#40, Hosure main road, Garvebhavipaly, 8th Cross, Bangalore ', 'KA', '560068', 'India', '', '', '2015-03-07 10:26:22'),
(51, 'Mr', '', '', 0, '0', '0', '', 'KA', '', 'India', '', '', '2015-03-07 20:52:31'),
(52, 'Mr', '', '', 0, '0', '0', '', 'KA', '', 'India', '', '', '2015-03-07 20:52:32'),
(53, 'Mr', '', '', 0, '0', '0', '', 'KA', '', 'India', '', '', '2015-03-07 20:52:45'),
(54, 'Mr', 'asdf', '', 23, '0', '0', '', 'KA', '', 'India', '', '', '2015-03-07 21:04:38'),
(55, 'Mr', 'asdf', '', 23, '0', '0', '', 'KA', '', 'India', '', '', '2015-03-08 02:57:19'),
(56, 'Mr', 'asf', '', 23, '0', '0', '', 'KA', '', 'India', '', '', '2015-03-08 03:00:35'),
(59, 'Mr', 'Kaleem ', 'Khan', 29, 'M', 'S', 'JP Nagar', 'KA', '560085', 'India', '888888888', '9999999999', '2015-03-08 14:01:58'),
(61, 'Mr', 'Noushad', 'Khan', 26, 'M', 'M', 'Dubai', 'KA', '', 'India', '', '9986368357', '2015-03-09 06:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `visitor_id` int(10) NOT NULL,
  `patent_id` int(10) DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `prescription` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `patentid` int(10) DEFAULT NULL,
  `visitorid` int(10) NOT NULL,
  `hospital_name` varchar(20) DEFAULT NULL,
  `doc_title` varchar(5) DEFAULT NULL,
  `doctor_name` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`visitorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`patentid`, `visitorid`, `hospital_name`, `doc_title`, `doctor_name`, `address`, `state`) VALUES
(1, 1, 'KC General', 'Mr', 'Uma', 'Malleshwaram', 'KA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `access_rights` int(2) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `access_rights`, `summary`) VALUES
(201501, 'username', '2bb35f9622cd2481bfe232590b927ac1', 10, ' Test'),
(201502, 'Noushadali', 'a62d609ab4f99490f8f6a9961300b3a9', 9, ' asdfasdf'),
(201503, 'nous', 'e0e9ee8a45dc5a12aacdc5400c73ecf6', 10, 'sdfasdf '),
(201504, 'vk1234', '2fdf9095ee62e7b0bdcb91ccb7cc9f13', 10, ' '),
(201505, 'ali', 'afbf79adff8de10219da8e633c2064f9', 10, 'im admin '),
(201506, 'noushadali', 'afbf79adff8de10219da8e633c2064f9', 10, 'Im Admin '),
(201507, 'thejaswi', '2fdf9095ee62e7b0bdcb91ccb7cc9f13', 8, ' Front office from 02022015'),
(201508, 'thejeswi', '8d2d7068005827a2258e9bedcf6ba772', 10, ' Im an Admin'),
(201509, 'frontend', '2fdf9095ee62e7b0bdcb91ccb7cc9f13', 8, ' Front End');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `visitor_id` int(11) NOT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visitor_id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_record`
--

CREATE TABLE IF NOT EXISTS `visitor_record` (
  `visitor_id` int(10) NOT NULL,
  `patent_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bill_no` int(10) NOT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `visited_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor_record`
--

INSERT INTO `visitor_record` (`visitor_id`, `patent_id`, `user_id`, `bill_no`, `doctor_id`, `visited_date`) VALUES
(6, 6, 1, 0, NULL, '2015-01-31 11:11:11'),
(7, 7, 1, 0, NULL, '2015-01-01 12:12:12'),
(8, 8, 1, 0, NULL, '2015-01-31 23:37:09'),
(9, 9, 1, 0, NULL, '2015-02-01 01:45:18'),
(11, 11, 1, 0, NULL, '2015-02-01 15:10:59'),
(18, 18, 201505, 0, NULL, '2015-02-07 23:01:38'),
(19, 19, 201505, 0, NULL, '2015-02-07 23:39:40'),
(23, 23, 201505, 3, NULL, '2015-02-08 02:19:40'),
(24, 11, 201505, 3, NULL, '2015-02-08 02:25:28'),
(26, 19, 201505, 3, NULL, '2015-02-08 02:56:45'),
(27, 6, 201505, 5, NULL, '2015-02-08 03:00:21'),
(29, 29, 201506, 6, NULL, '2015-02-08 14:21:09'),
(30, 30, 201506, 7, NULL, '2015-02-08 16:05:22'),
(32, 32, 201505, 8, NULL, '2015-02-08 17:25:12'),
(33, 32, 201505, 9, NULL, '2015-02-08 17:27:45'),
(35, 35, 201507, 10, NULL, '2015-02-08 17:42:09'),
(37, 32, 201506, 11, NULL, '2015-02-09 23:30:49'),
(39, 29, 201505, 12, NULL, '2015-02-10 23:15:32'),
(40, 29, 201505, 13, NULL, '2015-02-11 02:10:15'),
(41, 32, 201505, 14, 1, '2015-02-11 02:18:26'),
(42, 18, 201505, 15, 2, '2015-02-11 02:19:10'),
(49, 49, 201505, 16, 1, '2015-03-07 15:16:24'),
(50, 50, 201505, 17, 1, '2015-03-07 15:56:22'),
(51, 51, 201505, 18, 0, '2015-03-08 02:22:32'),
(52, 52, 201505, 19, 0, '2015-03-08 02:22:33'),
(53, 53, 201505, 20, 0, '2015-03-08 02:22:45'),
(54, 54, 201505, 21, 0, '2015-03-08 02:34:38'),
(55, 55, 201505, 22, 2, '2015-03-08 08:27:20'),
(56, 56, 201505, 23, 1, '2015-03-08 08:30:36'),
(57, 49, 201505, 24, 2, '2015-03-08 10:09:30'),
(58, 50, 201505, 25, 2, '2015-03-08 10:12:37'),
(59, 59, 201509, 26, 1, '2015-03-08 19:31:58'),
(61, 61, 201505, 27, 2, '2015-03-09 11:34:30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

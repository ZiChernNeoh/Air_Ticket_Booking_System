-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2020 at 04:22 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline2`
--

-- --------------------------------------------------------

--
-- Table structure for table `airplane`
--

CREATE TABLE `airplane` (
  `ID` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `company` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airplane`
--

INSERT INTO `airplane` (`ID`, `type`, `company`) VALUES
('1170', 'B738', 'Boeing'),
('1201', 'A320', 'Airbus');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `code` varchar(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`code`, `city`, `state`, `country`) VALUES
('ADL', 'Adelaide', 'South Australia', 'Australia'),
('AKL', 'Auckland', 'Auckland', 'New Zealand'),
('AOR', 'Alor Setar', 'Alor Setar', 'Malaysia'),
('BKI', 'Kota Kinabalu', 'Sabah', 'Malaysia'),
('BKK', 'Bangkok', 'Bangkok', 'Thailand'),
('BTJ', 'Bandar Aceh', 'Aceh', 'Indonesia'),
('BTU', 'Bintulu', 'Sarawak', 'Malaysia'),
('CGK', 'Jakarta', 'Jakarta', 'Indonesia'),
('HKT', 'Phuket', 'Phuket', 'Thailand'),
('JHB', 'Johor Bahru', 'Johor Bahru', 'Malaysia'),
('KBR', 'Kota Bharu', 'Kota Bharu', 'Indonesia'),
('KCH', 'Kuching', 'Sarawak', 'Malaysia'),
('KUA', 'Kuantan', 'Pahang', 'Malaysia'),
('KUL', 'Kuala Lumpur', 'Kuala Lumpur', 'Malaysia'),
('LBU', 'Labuan', 'Labuan', 'Malaysia'),
('LGK', 'Langkawi', 'Kedah', 'Malaysia'),
('PEN', 'Butterworth', 'Penang', 'Malaysia'),
('SBW', 'Sibu', 'Sarawak', 'Malaysia'),
('SDK', 'Sandakan', 'Sabah', 'Malaysia'),
('SZB', 'Subang Jaya', 'Selangor', 'Malaysia'),
('TGG', 'Kuala Terengganu', 'Terengganu', 'Malaysia'),
('TWU', 'Tawau', 'Sabah', 'Malaysia'),
('XSP', 'Singapore Seletar', 'Singapore', 'Singapore');

-- --------------------------------------------------------

--
-- Table structure for table `boarding`
--

CREATE TABLE `boarding` (
  `flight` varchar(10) NOT NULL,
  `ticketID` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `arrival` varchar(10) NOT NULL,
  `departure` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boarding`
--

INSERT INTO `boarding` (`flight`, `ticketID`, `username`, `date`, `arrival`, `departure`, `status`) VALUES
('FY0001', '100', 'abc', '2020-11-17', 'TWU', 'KUL', 'unchecked'),
('FY0001', '101', 'abc', '2020-11-17', 'TWU', 'KUL', 'unchecked'),
('FY0013', '72', 'BlueBanana', '2020-10-13', 'JHB', 'SZB', 'check'),
('FY0003', '73', 'BlueBanana', '2020-12-02', 'PEN', 'SZB', 'check'),
('FY0006', '74', 'BlueBanana', '2020-11-25', 'SZB', 'JHB', 'check'),
('FY0012', '77', 'BlueBanana', '2020-11-26', 'LGK', 'KUL', 'check'),
('FY0004', '83', 'BlueBanana', '2020-11-26', 'CGK', 'KUL', 'check'),
('FY0008', '84', 'BlueBanana', '2020-11-27', 'XSP', 'KUL', 'unchecked'),
('FY0006', '85', 'BlueBanana', '2020-11-28', 'SZB', 'JHB', 'check'),
('FY0001', '86', 'echo', '2020-11-20', 'TWU', 'KUL', 'unchecked'),
('FY0009', '87', 'eve', '2020-11-21', 'BKI', 'KUL', 'unchecked'),
('FY0006', '88', 'james', '2020-11-22', 'SZB', 'JHB', 'check'),
('FY0020', '89', 'jessica', '2020-11-24', 'ADL', 'XSP', 'check'),
('FY0012', '90', 'joanne', '2020-11-24', 'LGK', 'KUL', 'check'),
('FY0011', '91', 'john', '2020-11-25', 'HKT', 'KUL', 'check'),
('FY0011', '92', 'laurent', '2020-11-25', 'HKT', 'KUL', 'check'),
('FY0017', '93', 'leonardo', '2020-11-26', 'KUL', 'AKL', 'check'),
('FY0019', '94', 'lim2010', '2020-11-27', 'PEN', 'LBU', 'check'),
('FY0004', '96', 'michael', '2020-11-28', 'CGK', 'KUL', 'check'),
('FY0001', '99', 'abc', '2020-11-17', 'TWU', 'KUL', 'unchecked');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ID` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `date` date NOT NULL,
  `flightno` varchar(10) NOT NULL,
  `username` varchar(45) NOT NULL,
  `classtype` varchar(20) NOT NULL,
  `paid` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ID`, `time`, `date`, `flightno`, `username`, `classtype`, `paid`) VALUES
(72, '2020-10-26 10:41:14', '2020-10-13', 'FY0013', 'BlueBanana', 'Economy', 1),
(73, '2020-11-11 02:13:51', '2020-12-02', 'FY0003', 'BlueBanana', 'Business', 1),
(74, '2020-11-12 02:13:25', '2020-11-25', 'FY0006', 'BlueBanana', 'Economy', 1),
(77, '2020-11-15 01:37:59', '2020-11-26', 'FY0012', 'BlueBanana', 'Business', 1),
(83, '2020-11-16 02:34:31', '2020-11-26', 'FY0004', 'BlueBanana', 'Economy', 1),
(84, '2020-11-19 05:29:09', '2020-11-27', 'FY0008', 'BlueBanana', 'Economy', 1),
(85, '2020-11-19 05:39:25', '2020-11-28', 'FY0006', 'BlueBanana', 'Economy', 1),
(86, '2020-11-19 09:48:02', '2020-11-20', 'FY0001', 'echo', 'Economy', 1),
(87, '2020-11-19 09:49:54', '2020-11-21', 'FY0009', 'eve', 'Business', 1),
(88, '2020-11-19 09:51:19', '2020-11-22', 'FY0006', 'james', 'Business', 1),
(89, '2020-11-19 09:54:38', '2020-11-24', 'FY0020', 'jessica', 'Business', 1),
(90, '2020-11-19 09:56:04', '2020-11-24', 'FY0012', 'joanne', 'Economy', 1),
(91, '2020-11-19 09:57:33', '2020-11-25', 'FY0011', 'john', 'Business', 1),
(92, '2020-11-19 09:58:58', '2020-11-25', 'FY0011', 'laurent', 'Business', 1),
(93, '2020-11-19 09:59:58', '2020-11-26', 'FY0017', 'leonardo', 'Economy', 1),
(94, '2020-11-19 10:00:57', '2020-11-27', 'FY0019', 'lim2010', 'Business', 1),
(96, '2020-11-19 10:02:10', '2020-11-28', 'FY0004', 'michael', 'Economy', 1),
(99, '2020-11-22 07:39:49', '2020-11-17', 'FY0001', 'abc', 'Economy', 1),
(100, '2020-12-22 09:01:10', '2020-11-17', 'FY0001', 'abc', 'Economy', 1),
(101, '2020-12-22 09:05:10', '2020-11-17', 'FY0001', 'abc', 'Economy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `number` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` float NOT NULL,
  `action` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`number`, `name`, `capacity`, `price`, `action`, `status`) VALUES
('FY0001', 'Business', 30, 1500, 'Add', 'Approved'),
('FY0001', 'Economy', 50, 1230, 'Add', 'Approved'),
('FY0002', 'Business', 30, 2000, 'Add', 'Approved'),
('FY0002', 'Economy', 50, 1560, 'Add', 'Approved'),
('FY0003', 'Business', 20, 330, 'Add', 'Approved'),
('FY0003', 'Economy', 40, 230, 'Add', 'Approved'),
('FY0004', 'Business', 30, 2500, 'Update', 'Approved'),
('FY0004', 'Economy', 50, 1500, 'Update', 'Approved'),
('FY0005', 'Business', 20, 2660, 'Add', 'Approved'),
('FY0005', 'Economy', 40, 1660, 'Add', 'Approved'),
('FY0006', 'Business', 20, 330, 'Add', 'Approved'),
('FY0006', 'Economy', 40, 230, 'Add', 'Approved'),
('FY0007', 'Business', 20, 750, 'Add', 'Approved'),
('FY0007', 'Economy', 40, 550, 'Add', 'Approved'),
('FY0008', 'Business', 30, 1400, 'Add', 'Approved'),
('FY0008', 'Economy', 50, 1100, 'Add', 'Approved'),
('FY0009', 'Business', 30, 890, 'Add', 'Approved'),
('FY0009', 'Economy', 50, 690, 'Add', 'Approved'),
('FY0010', 'Business', 20, 356, 'Add', 'Approved'),
('FY0010', 'Economy', 40, 256, 'Add', 'Approved'),
('FY0011', 'Business', 30, 2890, 'Update', 'Approved'),
('FY0011', 'Economy', 50, 1890, 'Update', 'Approved'),
('FY0012', 'Business', 20, 356, 'Add', 'Approved'),
('FY0012', 'Economy', 40, 256, 'Add', 'Approved'),
('FY0013', 'Business', 20, 450, 'Add', 'Approved'),
('FY0013', 'Economy', 40, 350, 'Add', 'Approved'),
('FY0014', 'Business', 30, 490, 'Add', 'Approved'),
('FY0014', 'Economy', 50, 390, 'Add', 'Approved'),
('FY0015', 'Business', 20, 256, 'Add', 'Approved'),
('FY0015', 'Economy', 40, 156, 'Add', 'Approved'),
('FY0016', 'Business', 30, 2780, 'Add', 'Approved'),
('FY0016', 'Economy', 50, 1780, 'Add', 'Approved'),
('FY0017', 'Business', 20, 2800, 'Update', 'Approved'),
('FY0017', 'Economy', 40, 1800, 'Update', 'Approved'),
('FY0018', 'Business', 30, 2400, 'Add', 'Approved'),
('FY0018', 'Economy', 50, 1400, 'Add', 'Approved'),
('FY0019', 'Business', 20, 436, 'Add', 'Approved'),
('FY0019', 'Economy', 40, 336, 'Add', 'Approved'),
('FY0020', 'Business', 30, 2890, 'Add', 'Approved'),
('FY0020', 'Economy', 50, 1890, 'Add', 'Approved'),
('FY0021', 'Business', 20, 2560, 'Add', 'Approved'),
('FY0021', 'Economy', 40, 1560, 'Add', 'Approved'),
('FY0022', 'Business', 20, 2143, 'Add', 'Approved'),
('FY0022', 'Economy', 40, 1143, 'Add', 'Approved'),
('FY0023', 'Business', 30, 2789, 'Add', 'Approved'),
('FY0023', 'Economy', 50, 1789, 'Add', 'Approved'),
('FY0024', 'Business', 20, 2100, 'Add', 'Approved'),
('FY0024', 'Economy', 40, 1900, 'Add', 'Approved'),
('FY0025', 'Business', 20, 2420, 'Update', 'Approved'),
('FY0025', 'Economy', 40, 1420, 'Update', 'Approved'),
('FY0026', 'Business', 30, 2650, 'Add', 'Approved'),
('FY0026', 'Economy', 50, 1650, 'Add', 'Approved'),
('FY0027', 'Business', 20, 2478, 'Update', 'Approved'),
('FY0027', 'Economy', 40, 1478, 'Update', 'Approved'),
('FY0028', 'Business', 30, 2423, 'Add', 'Approved'),
('FY0028', 'Economy', 50, 1423, 'Add', 'Approved'),
('FY0029', 'Business', 30, 2235, 'Add', 'Approved'),
('FY0029', 'Economy', 50, 1235, 'Add', 'Approved'),
('FY0030', 'Business', 20, 2478, 'Add', 'Approved'),
('FY0030', 'Economy', 40, 1478, 'Add', 'Disapproved'),
('FY0031', 'Business', 50, 350, 'Update', 'Pending'),
('FY0031', 'Economy', 30, 250, 'Update', 'Pending'),
('FY0032', 'Business', 30, 2500, 'Delete', 'Pending'),
('FY0032', 'Economy', 50, 1400, 'Delete', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `crews`
--

CREATE TABLE `crews` (
  `flight` varchar(10) NOT NULL,
  `pilot_name` varchar(20) NOT NULL,
  `co_pilot_name` varchar(20) NOT NULL,
  `attendant_1` varchar(20) NOT NULL,
  `attendant_2` varchar(20) NOT NULL,
  `attendant_3` varchar(20) NOT NULL,
  `attendant_4` varchar(20) NOT NULL,
  `attendant_5` varchar(20) NOT NULL,
  `attendant_6` varchar(20) NOT NULL,
  `action` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crews`
--

INSERT INTO `crews` (`flight`, `pilot_name`, `co_pilot_name`, `attendant_1`, `attendant_2`, `attendant_3`, `attendant_4`, `attendant_5`, `attendant_6`, `action`, `status`) VALUES
('FY0030', 'Pinky', 'Owen', 'Tommy', 'Rainie', 'Ewin', 'Winnie', 'Henry', 'Franky', 'Add', 'Approved'),
('FY0031', 'Craig', 'Andy', 'Lisa', 'Grace', 'Jack', 'Houston', 'Deborah', 'Siti', 'Update', 'Disapproved'),
('FY0034', 'Melvin', 'Nelson', 'Bentley', 'Vivian', 'Tony', 'Sandara', 'Kenny', 'Alvin', 'Delete', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `number` varchar(20) NOT NULL,
  `airplane_id` varchar(10) NOT NULL,
  `departure` varchar(10) NOT NULL,
  `d_time` datetime NOT NULL,
  `arrival` varchar(10) NOT NULL,
  `a_time` datetime NOT NULL,
  `action` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`number`, `airplane_id`, `departure`, `d_time`, `arrival`, `a_time`, `action`, `status`) VALUES
('FY0001', '1170', 'KUL', '2020-11-17 12:00:00', 'TWU', '2020-11-17 02:00:00', 'Add', 'Approved'),
('FY0002', '1170', 'KUL', '2020-11-17 05:00:00', 'AKL', '2020-11-17 09:00:00', 'Add', 'Approved'),
('FY0003', '1201', 'SZB', '2020-11-17 07:00:00', 'PEN', '2020-11-17 07:45:00', 'Add', 'Approved'),
('FY0004', '1170', 'KUL', '2020-11-17 03:00:00', 'CGK', '2020-11-17 05:00:00', 'Update', 'Approved'),
('FY0005', '1201', 'ADL', '2020-11-17 08:00:00', 'KUL', '2020-11-17 12:00:00', 'Add', 'Approved'),
('FY0006', '1201', 'JHB', '2020-11-17 08:00:00', 'SZB', '2020-11-17 08:30:00', 'Add', 'Approved'),
('FY0007', '1201', 'KCH', '2020-11-17 10:00:00', 'KUL', '2020-11-17 12:00:00', 'Add', 'Approved'),
('FY0008', '1170', 'KUL', '2020-11-17 03:00:00', 'XSP', '2020-11-17 03:45:00', 'Add', 'Approved'),
('FY0009', '1170', 'KUL', '2020-11-17 04:00:00', 'BKI', '2020-11-17 05:45:00', 'Add', 'Approved'),
('FY0010', '1201', 'KCH', '2020-11-17 06:00:00', 'BKI', '2020-11-17 06:30:00', 'Add', 'Approved'),
('FY0011', '1170', 'KUL', '2020-11-17 05:00:00', 'HKT', '2020-11-17 07:00:00', 'Update', 'Approved'),
('FY0012', '1201', 'KUL', '2020-11-17 05:00:00', 'LGK', '2020-11-17 05:30:00', 'Add', 'Approved'),
('FY0013', '1201', 'SZB', '2020-11-17 09:45:00', 'JHB', '2020-11-17 10:30:00', 'Add', 'Approved'),
('FY0014', '1170', 'AOR', '2020-11-17 04:00:00', 'JHB', '2020-11-17 04:45:00', 'Add', 'Approved'),
('FY0015', '1201', 'KUL', '2020-11-17 07:00:00', 'KUA', '2020-11-17 07:20:00', 'Add', 'Approved'),
('FY0016', '1170', 'KUL', '2020-11-17 05:00:00', 'BTU', '2020-11-17 06:30:00', 'Add', 'Approved'),
('FY0017', '1201', 'AKL', '2020-11-17 06:00:00', 'KUL', '2020-11-17 10:00:00', 'Update', 'Approved'),
('FY0018', '1170', 'HKT', '2020-11-17 09:56:00', 'BTJ', '2020-11-17 11:25:00', 'Add', 'Approved'),
('FY0019', '1201', 'LBU', '2020-11-17 05:56:00', 'PEN', '2020-11-17 06:26:00', 'Add', 'Approved'),
('FY0020', '1170', 'XSP', '2020-11-17 08:45:00', 'ADL', '2020-11-17 11:46:00', 'Add', 'Approved'),
('FY0021', '1201', 'BKK', '2020-11-17 05:20:00', 'SBW', '2020-11-17 07:56:00', 'Add', 'Approved'),
('FY0022', '1201', 'KCH', '2020-11-17 09:54:00', 'AKL', '2020-11-17 12:00:00', 'Add', 'Approved'),
('FY0023', '1170', 'BTJ', '2020-11-17 04:36:00', 'BTU', '2020-11-17 05:59:00', 'Add', 'Approved'),
('FY0024', '1201', 'PEN', '2020-11-17 05:54:00', 'CGK', '2020-11-17 07:45:00', 'Add', 'Approved'),
('FY0025', '1201', 'SBW', '2020-11-17 04:23:00', 'HKT', '2020-11-17 06:52:00', 'Update', 'Approved'),
('FY0026', '1170', 'XSP', '2020-11-17 09:29:00', 'ADL', '2020-11-17 11:56:00', 'Add', 'Approved'),
('FY0027', '1201', 'LGK', '2020-11-17 07:45:00', 'AKL', '2020-11-17 10:56:00', 'Update', 'Approved'),
('FY0028', '1170', 'BTJ', '2020-11-17 05:59:00', 'XSP', '2020-11-17 07:56:00', 'Add', 'Approved'),
('FY0029', '1170', 'BKK', '2020-11-17 05:49:00', 'BKI', '2020-11-17 07:20:00', 'Add', 'Approved'),
('FY0030', '1201', 'BTJ', '2020-11-17 08:56:00', 'JHB', '2020-11-17 10:56:00', 'Add', 'Approved'),
('FY0031', '1170', 'AOR', '2020-11-17 23:00:00', 'BKK', '2020-11-17 02:00:00', 'Update', 'Disapproved'),
('FY0032', '1201', 'ADL', '2020-11-17 08:10:00', 'KUL', '2020-11-17 10:00:00', 'Delete', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `passanger`
--

CREATE TABLE `passanger` (
  `username` varchar(30) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cellphone` varchar(15) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passanger`
--

INSERT INTO `passanger` (`username`, `firstname`, `middlename`, `lastname`, `email`, `cellphone`, `gender`, `birthday`, `password`) VALUES
('abc', 'abc', NULL, '', 'abc@utd.edu', NULL, NULL, NULL, 'abcdef123456'),
('Amaze', NULL, NULL, 'Lee', 'amazinglee@utd.edu', '03296510234', 'Male', '1992-05-01', 'amazinglegend69'),
('angela', 'Angela', NULL, 'Yang', 'angela1993@gmail.com', '6498102457', 'Female', '1993-09-10', 'angelaprincess'),
('austin', 'Austin ', NULL, 'Jam', 'austindajam@outlook.com', '20310497263', 'Male', '2002-12-30', 'austin6969'),
('bell', 'Bell', NULL, 'Lam', 'bell_lammie@utd.edu', '3207598381', 'Female', '1982-03-24', 'ringingabell'),
('BlueBanana', 'Ethan', '', 'Chong', 'ethanchongxz25@gmail.com', '0165288528', 'Male', '2001-10-29', 'Lamborghini05'),
('chloe', 'Chloe', NULL, 'Ranka', 'chloeeeran@outlook.com', '8102943845', 'Female', '1983-09-10', 'chloooee9696'),
('coma', 'Coma', NULL, 'Chin', 'comachin100@gmail.com', '8493650193', 'Female', '2001-02-28', 'comaoutthesky'),
('echo', 'Echo', NULL, 'Chan', 'echohoe@gmail.com', '7401934958', 'Male', '1984-11-20', 'echoindahouse'),
('eve', 'eve', '', 'adi', 'eve@utd.edu', '2143456543', '', '0000-00-00', 'Eve123'),
('james', 'James', NULL, 'Bond', 'jamesbond1980@gmail.com', '3291045923', 'Male', '1980-10-20', 'jamesbond007'),
('jessica', 'Jessica', NULL, 'Fu', 'jessfu3032@gmail.com', '9901357623', 'Female', '1997-05-20', 'jess<3cat'),
('joanne', 'Joanne', NULL, 'Loo', 'joanneloo_32@gmail.com', '3204391578', 'Female', '1991-07-25', 'loojoanneXD'),
('john', 'John', NULL, 'Sins', 'johnsins@gmail.com', '0123456789', 'Male', '2000-11-11', '1234567'),
('laurent', 'Saint', NULL, 'Laurent', 'saint_laurent@yahoo.com', '8293108295', 'Female', '1985-03-24', 'yvessaintlaurent'),
('leonardo', 'Leonardo', NULL, 'Benedict', 'leonardodavinci@outlook.com', '0147289173', 'Male', '2000-06-30', 'leonardo_vinci123'),
('lim2010', 'Lim', NULL, 'Ching', 'chinglim0000@yahoo.com', '0192837546', 'Male', '1999-07-18', 'chingchonglim'),
('michael', 'Michael', '', 'Wong', 'michaelwong515@gmail.com', '4392104698', 'Male', '1990-05-15', 'jacksonmichael'),
('oni', 'Oni', NULL, 'Chan', 'onichan499@gmail.com', '9214503956', 'Male', '1987-03-10', 'oni4chan'),
('pog', 'Poguwu', NULL, 'Jr', 'jrpog999@gmail.com', '71028394750', 'Male', '2001-01-15', 'pogisdabest'),
('qun', 'Qun', NULL, 'Niu', 'qun@utd.edu', '', 'Female', NULL, 'Niuqun1'),
('sally', 'Sally', NULL, 'Tan', 'sallytan123@gmail.com', '9543829730', 'Female', '1998-09-28', 'Sally5555'),
('sam', 'Sam', NULL, 'Kim', 'kimsam987@outlook.com', '07492176502', 'Male', '1995-08-30', 'q!0p@g4b2#'),
('serene', 'Serene', NULL, 'Ong', 'serenitysky@yahoo.com', '4392013904', 'Female', '1999-04-23', 'serenity1010'),
('song', 'Song', NULL, 'Tao', 'ts@utd.edu', NULL, 'Male', NULL, 'Songtao1'),
('tao', 's', '', 't', 't@utd.edu', '987654321', '', '2015-12-06', 'Ts123456'),
('web', 'web', '', 'pro', 'web@utd.edu', '9998887777', '', '2015-12-06', 'Web123'),
('xianchu', 'xianchu', NULL, 'chen', 'xian@utd.edu', '', 'Male', NULL, 'Xianchu1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `email` varchar(50) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `position` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`email`, `firstname`, `lastname`, `password`, `position`) VALUES
('adrianwck@firefly', 'Adrian', 'Wong', '2222', 'boardingAdmin'),
('changzy@firefly', 'Chang', 'Yang', '1111', 'flightAdmin'),
('ethanchongxz@firefly', 'Ethan', 'Chong', '0000', 'manager'),
('neohzc@firefly', 'Neoh', 'Zi Chern', '1234', 'crewAdmin'),
('sulw@firefly', 'Su', 'Lay Nwe', '5678', 'FlSalesAdmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airplane`
--
ALTER TABLE `airplane`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `boarding`
--
ALTER TABLE `boarding`
  ADD PRIMARY KEY (`ticketID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ID`,`flightno`),
  ADD KEY `username_idx` (`username`),
  ADD KEY `classname_idx` (`classtype`),
  ADD KEY `flightno_idx` (`flightno`,`classtype`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`number`,`name`),
  ADD KEY `number_idx` (`number`);

--
-- Indexes for table `crews`
--
ALTER TABLE `crews`
  ADD PRIMARY KEY (`flight`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`number`),
  ADD KEY `code_idx` (`departure`,`arrival`),
  ADD KEY `airplaneid_idx` (`airplane_id`),
  ADD KEY `arrival_idx` (`arrival`);

--
-- Indexes for table `passanger`
--
ALTER TABLE `passanger`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `flightno` FOREIGN KEY (`flightno`,`classtype`) REFERENCES `class` (`number`, `name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `passanger` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `number` FOREIGN KEY (`number`) REFERENCES `flight` (`number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `airplaneid` FOREIGN KEY (`airplane_id`) REFERENCES `airplane` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arrival` FOREIGN KEY (`arrival`) REFERENCES `airport` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `departure` FOREIGN KEY (`departure`) REFERENCES `airport` (`code`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

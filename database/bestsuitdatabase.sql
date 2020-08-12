-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 09:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bestsuitdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `key_management`
--

CREATE TABLE IF NOT EXISTS `key_management` (
  `IDNUMBER` varchar(30) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ROOM_NUMBER` varchar(10) NOT NULL,
  `DATE` date NOT NULL,
  `TIME` time NOT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st`
--

CREATE TABLE IF NOT EXISTS `st` (
  `studentid` varchar(50) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `statuss` varchar(50) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `checkindate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st`
--

INSERT INTO `st` (`studentid`, `fullname`, `statuss`, `room`, `checkindate`) VALUES
('null', 'null', 'null', 'room1', 'null'),
('null', 'null', 'null', 'room2', 'null'),
('null', 'null', 'null', 'room3', 'null'),
('null', 'null', 'null', 'room4', 'null'),
('null', 'null', 'null', 'room5', 'null'),
('null', 'null', 'null', 'room6', 'null'),
('null', 'null', 'null', 'room7', 'null'),
('null', 'null', 'null', 'room8', 'null'),
('null', 'null', 'null', 'room9', 'null'),
('null', 'null', 'null', 'room10', 'null'),
('null', 'null', 'null', 'room11', 'null'),
('null', 'null', 'null', 'room12', 'null'),
('null', 'null', 'null', 'room13', 'null'),
('null', 'null', 'null', 'room14', 'null'),
('null', 'null', 'null', 'room15', 'null'),
('null', 'null', 'null', 'room16', 'null'),
('null', 'null', 'null', 'room17', 'null'),
('null', 'null', 'null', 'room18', 'null'),
('null', 'null', 'null', 'room19', 'null'),
('null', 'null', 'null', 'room20', 'null'),
('null', 'null', 'null', 'room21', 'null'),
('null', 'null', 'null', 'room22', 'null'),
('null', 'null', 'null', 'room23', 'null'),
('null', 'null', 'null', 'room24', 'null'),
('null', 'null', 'null', 'room25', 'null'),
('null', 'null', 'null', 'room26', 'null'),
('null', 'null', 'null', 'room27', 'null'),
('null', 'null', 'null', 'room28', 'null'),
('null', 'null', 'null', 'room29', 'null'),
('null', 'null', 'null', 'room30', 'null'),
('null', 'null', 'null', 'room31', 'null'),
('null', 'null', 'null', 'room32', 'null'),
('null', 'null', 'null', 'room32', 'null'),
('null', 'null', 'null', 'room34', 'null'),
('null', 'null', 'null', 'room33', 'null'),
('null', 'null', 'null', 'room36', 'null'),
('null', 'null', 'null', 'room37', 'null'),
('null', 'null', 'null', 'room38', 'null'),
('null', 'null', 'null', 'room39', 'null'),
('null', 'null', 'null', 'room40', 'null'),
('null', 'null', 'null', 'room41', 'null'),
('null', 'null', 'null', 'room42', 'null'),
('null', 'null', 'null', 'room43', 'null'),
('null', 'null', 'null', 'room44', 'null'),
('null', 'null', 'null', 'room45', 'null'),
('null', 'null', 'null', 'room46', 'null'),
('null', 'null', 'null', 'room47', 'null'),
('null', 'null', 'null', 'room48', 'null'),
('null', 'null', 'null', 'room49', 'null'),
('null', 'null', 'null', 'room50', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `studentregistration`
--

CREATE TABLE IF NOT EXISTS `studentregistration` (
  `studentid` varchar(20) NOT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `middlename` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `program` varchar(30) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `disability` varchar(10) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `dateofbirth` varchar(15) DEFAULT NULL,
  `placeofbirth` varchar(30) DEFAULT NULL,
  `studentemail` varchar(50) DEFAULT NULL,
  `registrationdate` varchar(15) DEFAULT NULL,
  `guardianname` varchar(30) DEFAULT NULL,
  `guardiancontact` varchar(11) DEFAULT NULL,
  `location` varchar(25) DEFAULT NULL,
  `guardianemail` varchar(50) DEFAULT NULL,
  `imagename` varchar(100) DEFAULT NULL,
  `studentcontact` varchar(11) DEFAULT NULL,
  `roomnumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE IF NOT EXISTS `useraccount` (
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `accounttype` varchar(20) NOT NULL,
  `question` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `regdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`firstname`, `middlename`, `lastname`, `username`, `pass`, `contact`, `gender`, `accounttype`, `question`, `answer`, `regdate`) VALUES
('Administrator', 'Administrator', 'Administrator', 'Admin', '5586123', '0245181940', 'male', 'Administrator', 'upQuestion', 'Ford Escape', ''),
('Porter', 'Porter', 'Porter', 'Porter', 'porters', '0245181940', 'male', 'porter', 'upQuestion', 'Beans', '');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
`id` int(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `indexnumber` varchar(15) DEFAULT NULL,
  `contact` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `friendname` varchar(50) NOT NULL,
  `friendsroom` varchar(50) NOT NULL,
  `date_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_log`
--

CREATE TABLE IF NOT EXISTS `visitor_log` (
`visitorid` int(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `RoomNumber` varchar(50) NOT NULL,
  `friendname` varchar(50) NOT NULL,
  `statuss` varchar(50) NOT NULL,
  `date_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `key_management`
--
ALTER TABLE `key_management`
 ADD PRIMARY KEY (`IDNUMBER`);

--
-- Indexes for table `studentregistration`
--
ALTER TABLE `studentregistration`
 ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
 ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `indexnumber` (`indexnumber`);

--
-- Indexes for table `visitor_log`
--
ALTER TABLE `visitor_log`
 ADD PRIMARY KEY (`visitorid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `visitor_log`
--
ALTER TABLE `visitor_log`
MODIFY `visitorid` int(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

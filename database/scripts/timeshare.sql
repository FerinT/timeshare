-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 28, 2016 at 03:13 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TIMESHARE`
--

-- --------------------------------------------------------

--
-- Table structure for table `Registration`
--
DROP SCHEMA IF EXISTS TIMESHARE;
CREATE SCHEMA TIMESHARE;
USE TIMESHARE;

CREATE TABLE `Registration` (
  `id` int(10) UNSIGNED NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Schedule`
--

CREATE TABLE `Schedule` (
  `ScheduleID` int(10) UNSIGNED NOT NULL,
  `ScheduleArray` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `ServiceID` int(11) NOT NULL,
  `ScheduleID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Category` varchar(60) NOT NULL,
  `RatePerHour` varchar(30) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `SubCategories` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `TransactionID` int(11) NOT NULL,
  `BuyerID` int(11) NOT NULL,
  `DateOfSale` varchar(30) NOT NULL,
  `SellerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TransactionLine`
--

CREATE TABLE `TransactionLine` (
  `TransactionLineID` int(11) NOT NULL,
  `ServiceID` int(11) NOT NULL,
  `TransactionID` int(11) NOT NULL,
  `RatePerHour` varchar(30) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(10) UNSIGNED NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `profilepicture` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Registration`
--
ALTER TABLE `Registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Schedule`
--
ALTER TABLE `Schedule`
  ADD PRIMARY KEY (`ScheduleID`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `TransactionLine`
--
ALTER TABLE `TransactionLine`
  ADD PRIMARY KEY (`TransactionLineID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Registration`
--
ALTER TABLE `Registration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Schedule`
--
ALTER TABLE `Schedule`
  MODIFY `ScheduleID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Transaction`
--
ALTER TABLE `Transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TransactionLine`
--
ALTER TABLE `TransactionLine`
  MODIFY `TransactionLineID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- Entity Insert statements

INSERT INTO `Schedule` (`ScheduleID`, `ScheduleArray`) VALUES
  (1, '1,0,1,1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0,1,1,0,0'),
  (2, '0,1,0,0,0,1,0,0,1,0,0,1,0,0,0,1,0,0,0,0,1,1,0,1,0,1,0,1,0,0,0,1,0,0,1,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,0,0,1,0,0,0,0,0,1,1,0,0,0,0,1,0,0,0,0,0,0,1,0,0,0,0,1,1,0,0,0,1,1'),
  (3, '1,0,0,0,1,0,1,0,0,0,0,0,0,1,0,1,0,0,1,0,0,0,0,0,1,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,0,0,0,1,1,0,0,1,0,0,1,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,1,0,0,1,0,1'),
  (4, '1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,1,0,1,1,1,0,0,1,0,1,1,1,0,1,0,0,0,0,0,0,1,0,0,0,0,0,0,1,0,0,0,0,0,0,1,0,0,0,0,0,1,0,0,1,0,1,0'),
  (5, '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,1,1,0,0,1,0,1,0,1,0,1,1,0,1,0,1,0,0,0,0,1,1,1,0,0,0,0,1,0,0,0,0,0,0,1,0,0,1,0,0,0,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,0,1'),
  (6, '0,0,1,0,0,1,0,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,1,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0,1,0,0,0,0,0,1,0,0,1,0,0,1'),
  (7, '0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,1,0,1,0,0,0,0,1,0,1,1,1,0,0,0,0,1,1,1,0,0,0,0,1,1,1,0,0,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'),
  (8, '0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,1,1,0,0,0,0,0,0,0,0'),
  (9, '0,0,0,0,1,0,0,1,1,0,1,1,0,0,1,0,0,1,1,0,0,0,0,0,1,0,0,0,0,1,1,0,0,0,0,0,0,1,0,0,0,0,0,0,1,1,0,0,1,0,0,0,0,0,0,1,0,0,0,0,0,1,1,0,0,1,1,1,1,1,0,0,1,0,0,1,1,0,0,0,0,0,1,1'),
  (10, '1,1,1,1,1,1,0,1,1,1,1,1,1,0,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,1,0,0,0,0,0,0,1,1,1,0,0,0,0,0,1,1,0,0,1,0,0,0,0,0,0,1,1,0,0,0,0,0,1,1,0,0,0,0,0,1'),
  (11, '0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,1,1,0,0,0,0,0,1,1,0,0,0,0,0,1,1,0,0,0,1,0,0,0,0,0,0,1,0,0,0,0,1,0,1,0,0,0,0,1,0,1,0,0,0,0,1,0,1,0,0,0,0,1,0,1,0,0,0,0,1,0,1,0');

INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (1, 1, 1, 'Education', '150', 'Bellville', 'Maths');
INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (2, 2, 2, 'Education', '200', 'Bellville', 'Maths');
INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (3, 3, 3, 'Education', '350', 'Blouberg', 'English');
INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (4, 4, 4, 'Entertainment', '600', 'Bellville', 'Music');
INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (5, 5, 5, 'Education', '435', 'Plattekloof', 'Physical Science');
INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (6, 6, 6, 'Education', '100', 'Bellville', 'Art');
INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (7, 7, 7, 'Education', '250', 'Soneike', 'Drama');
INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (8, 8, 8, 'Education', '350', 'Paarl', 'Afrikaans');
INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (9, 9, 9, 'Education', '200', 'Bellville', 'Maths');
INSERT INTO service (ServiceID, ScheduleID, UserID, Category, RatePerHour, Location, SubCategories)
VALUES (10, 10, 10, 'Education', '300', 'Bellville', 'Maths');

INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (1, 'ferintaylor@gmail.com', 'ferin', 'admin123', NULL );
INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (2, 'ferintaylor@gmail.com', 'john', 'admin123', NULL );
INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (3, 'ferintaylor@gmail.com', 'basil', 'admin123', NULL );
INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (4, 'ferintaylor@gmail.com', 'edward', 'admin123', NULL );
INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (5, 'ferintaylor@gmail.com', 'waleed', 'admin123', NULL );
INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (6, 'ferintaylor@gmail.com', 'simon', 'admin123', NULL );
INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (7, 'ferintaylor@gmail.com', 'khaled', 'admin123', NULL );
INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (8, 'ferintaylor@gmail.com', 'kanye', 'admin123', NULL );
INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (9, 'ferintaylor@gmail.com', 'Sally', 'admin123', NULL );
INSERT INTO user (userid, emailaddress, name, password, profilepicture)
VALUES (10, 'ferintaylor@gmail.com', 'Passy', 'admin123', NULL );

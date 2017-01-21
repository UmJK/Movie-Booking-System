-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2016 at 09:32 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mbs`
--
CREATE DATABASE IF NOT EXISTS `mbs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mbs`;

-- --------------------------------------------------------

--
-- Table structure for table `booked_seat`
--

CREATE TABLE IF NOT EXISTS `booked_seat` (
  `SEAT_NO` int(11) NOT NULL,
  `TICKET_ID` int(11) NOT NULL,
  PRIMARY KEY (`SEAT_NO`,`TICKET_ID`),
  KEY `TICKET_ID_FK1` (`TICKET_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE IF NOT EXISTS `cashier` (
  `CASHIER_ID` int(11) NOT NULL,
  `PASSWORD` varchar(8) NOT NULL,
  `TICKET_ID` int(11) NOT NULL,
  PRIMARY KEY (`CASHIER_ID`,`TICKET_ID`),
  KEY `TICKET_ID_FK` (`TICKET_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie_details`
--

CREATE TABLE IF NOT EXISTS `movie_details` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Info` varchar(100) NOT NULL,
  `Trailer` varchar(200) NOT NULL,
  `now_showing` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_details`
--

INSERT INTO `movie_details` (`id`, `Name`, `Info`, `Trailer`, `now_showing`) VALUES
(1, 'Kung Fu Panda', 'Movie in china', '10r9ozshGVE', 1),
(2, 'Ae Dil Hai Mushkil', 'A Love Story', 'Z_PODraXg4E', 1),
(3, 'PINK', 'Movie about feminism', 'AL2TShb6fFs', 1),
(4, 'Monster University', 'Animated Movie', 'xBzPioph8CI', 1),
(5, 'The Boss Baby', 'Animated Movie', 'tquIfapGVqs', 1),
(6, 'Fast And Furious 8', 'Action Movie', 'NqEQZUvE0A4', 0),
(7, 'Dangal', 'Bollywood Movie', 'x_7YlGv9u1g', 1),
(8, 'Jolly LLB 2', 'Bollywood Movie', 'XbPpjh7aXfQ', 1),
(9, 'Shivaay', 'Bollywood Movie', 'poLjq0u4_5A', 1),
(10, 'Miss Sloane', 'Action Movie', 'AMUkfmUu44k', 1),
(11, 'Rock on 2', 'Animated Movie', 'moDxQHoGNUQ', 1),
(12, 'Almost Christmas', 'American Christmas comedy-drama film', '-mw-Rhm8OIw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `Showid` int(11) NOT NULL,
  `Occupied` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`Showid`, `Occupied`) VALUES
(1, '3A,12B,5C');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE IF NOT EXISTS `shows` (
  `SHOW_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `TIME` varchar(20) NOT NULL,
  `Movie_Id` int(11) NOT NULL,
  `seats_occupied` varchar(500) NOT NULL,
  `Price` int(5) NOT NULL,
  PRIMARY KEY (`SHOW_ID`,`Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`SHOW_ID`, `Date`, `TIME`, `Movie_Id`, `seats_occupied`, `Price`) VALUES
(1, '2016-11-09', '09:00 AM - 12:00 PM', 1, ',13E,12E,11E,21E,22E,23E,19G,18G,17G,13C,14C', 120),
(2, '2016-11-09', '02:00 PM - 05:00 PM', 2, '', 120),
(3, '2016-11-09', '06:00 PM - 09:00 PM', 2, '', 150),
(4, '2016-11-09', '10:00 PM - 01:00 AM', 1, '', 180),
(5, '2016-11-10', '09:00 AM - 12:00 PM', 3, '', 150),
(6, '2016-11-10', '02:00 PM - 05:00 PM', 4, '', 120),
(7, '2016-11-10', '06:00 PM - 09:00 PM', 5, '', 150),
(8, '2016-11-10', '10:00 PM - 01:00 AM', 3, '', 200),
(9, '2016-11-11', '09:00 AM - 12:00 PM', 7, '', 180),
(10, '2016-11-11', '02:00 PM - 05:00 PM', 4, ',8E,9E,10E', 150),
(11, '2016-11-11', '06:00 PM - 09:00 PM', 7, '', 150),
(12, '2016-11-11', '10:00 PM - 01:00 AM', 4, '', 150),
(13, '2016-11-12', '09:00 AM - 12:00 PM', 8, '', 120),
(14, '2016-11-12', '02:00 PM - 05:00 PM', 5, '', 150),
(15, '2016-11-12', '06:00 PM - 09:00 PM', 10, ',6E,7E,8E,7D,9D,9C,8C', 180),
(16, '2016-11-12', '10:00 PM - 01:00 AM', 9, '', 200),
(17, '2016-11-13', '09:00 AM - 12:00 PM', 8, ',6E,7E,8E', 200),
(18, '2016-11-13', '02:00 PM - 05:00 PM', 7, '', 100),
(19, '2016-11-13', '06:00 PM - 09:00 PM', 9, ',6C,7C,8C,9C', 100),
(20, '2016-11-13', '10:00 PM - 01:00 AM', 11, ',6E,7E,8E,12E,13E,13D', 100),
(21, '2016-11-14', '09:00 AM - 12:00 PM', 10, '', 100),
(22, '2016-11-14', '02:00 PM - 05:00 PM', 8, '', 150),
(23, '2016-11-14', '06:00 PM - 09:00 PM', 11, ',11B,12B,13B', 200),
(24, '2016-11-14', '10:00 PM - 01:00 AM', 10, ',6F,7F,7G', 150),
(25, '2016-11-15', '09:00 AM - 12:00 PM', 10, '', 100),
(26, '2016-11-15', '02:00 PM - 05:00 PM', 12, '', 180),
(27, '2016-11-15', '06:00 PM - 09:00 PM', 8, '', 150),
(28, '2016-11-15', '10:00 PM - 01:00 AM', 9, '', 120);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `TICKET_ID` int(20) NOT NULL,
  `SHOW_ID` int(20) NOT NULL,
  `SHOW_DATE` date NOT NULL,
  `C_ID` int(20) NOT NULL,
  `Seat_No` varchar(200) NOT NULL,
  PRIMARY KEY (`TICKET_ID`,`SHOW_ID`,`C_ID`),
  KEY `C_ID_FK` (`C_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `Email_Id` varchar(30) NOT NULL DEFAULT '',
  `Password` varchar(15) NOT NULL,
  PRIMARY KEY (`Email_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`First_Name`, `Last_Name`, `Email_Id`, `Password`) VALUES
('abhay', 'garg', 'gargabhay1999@gmail.com', '1234'),
('u', 's', 'us@gmail.com', '4567');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_seat`
--
ALTER TABLE `booked_seat`
  ADD CONSTRAINT `TICKET_ID_FK1` FOREIGN KEY (`TICKET_ID`) REFERENCES `ticket` (`TICKET_ID`);

--
-- Constraints for table `cashier`
--
ALTER TABLE `cashier`
  ADD CONSTRAINT `TICKET_ID_FK` FOREIGN KEY (`TICKET_ID`) REFERENCES `ticket` (`TICKET_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

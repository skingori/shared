-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2014 at 08:14 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prison`
--
CREATE DATABASE IF NOT EXISTS `prison` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prison`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `Admin_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_Name` varchar(20) NOT NULL,
  `Admin_Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Admin_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`Admin_Id`, `Admin_Name`, `Admin_Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE IF NOT EXISTS `announce` (
  `to` varchar(17) NOT NULL,
  `Id` varchar(13) NOT NULL,
  `subject` varchar(14) NOT NULL,
  `message` varchar(70) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`to`, `Id`, `subject`, `message`) VALUES
('', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `court`
--

CREATE TABLE IF NOT EXISTS `court` (
  `National_id` int(12) NOT NULL,
  `File_number` varchar(14) NOT NULL,
  `Dateoftrial` date NOT NULL,
  `Sentence` varchar(14) NOT NULL,
  `Location` varchar(15) NOT NULL,
  PRIMARY KEY (`National_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `policestation_tbl`
--

CREATE TABLE IF NOT EXISTS `policestation_tbl` (
  `Station_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Station_Name` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Station_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=898 ;

--
-- Dumping data for table `policestation_tbl`
--

INSERT INTO `policestation_tbl` (`Station_Id`, `Station_Name`, `Address`, `City`, `Email`, `Mobile`, `UserName`, `Password`) VALUES
(897, 'kimaya', 'kimaya', 'nairobi', 'policpol@police.com', 888766, 'police', 'police');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(10) NOT NULL DEFAULT '0',
  `Full_Name` varchar(23) NOT NULL,
  `DOB` date NOT NULL,
  `Address` varchar(20) NOT NULL,
  `County` varchar(20) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Education` varchar(20) NOT NULL,
  `Marital` varchar(20) NOT NULL,
  `Offence` varchar(90) NOT NULL,
  `Date_in` date NOT NULL,
  `Sentence` varchar(13) NOT NULL,
  `File_num` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `Full_Name`, `DOB`, `Address`, `County`, `Gender`, `Education`, `Marital`, `Offence`, `Date_in`, `Sentence`, `File_num`) VALUES
(0, '', '0000-00-00', '', 'Nairobi', 'Male', 'Never', 'Divorced', 'Killing', '0000-00-00', '', ''),
(1, 'WEST LAND', '1984-09-02', 'MOMABSA', 'Mombassa', 'Male', 'Bachelor Degree', 'Married', 'Raping', '2014-12-11', '', '001'),
(1345, 'JONHY BARRY', '1988-09-02', 'LIKONI', 'Mombassa', 'Male', 'O level', 'Married', 'Stealing', '2014-08-08', '', '000123'),
(6677786, '', '0000-00-00', '', 'Nairobi', 'Male', 'Never', 'Divorced', 'Killing', '0000-00-00', '', ''),
(9125678, 'EMMILIYU', '1980-10-02', 'RONGAI', 'Nairobi', 'Male', 'Never', 'Single', 'Killing', '2014-07-10', '', '675'),
(67008689, 'WEST', '1985-09-02', 'TAIO', 'Mombassa', 'Male', 'O level', 'Single', 'Stealing', '2014-11-11', '', '8794'),
(78004379, 'mamy', '1980-09-02', 'LABAB', 'Nairobi', 'Male', 'Diploma', 'Divorced', 'Robbery', '2012-10-10', '', '234'),
(667778689, 'WEST', '1985-09-02', 'TAIO', 'Nairobi', 'Female', 'Bachelor Degree', 'Single', 'Robbery', '2014-11-11', '', '8794'),
(670078689, 'WEST', '1985-09-02', 'TAIO', 'Nairobi', 'Female', 'Bachelor Degree', 'Single', 'Robbery', '2014-11-11', '', '8794'),
(780043465, 'mamy', '1980-09-02', 'LABAB', 'Nairobi', 'Male', 'O level', 'Divorced', 'Robbery', '2012-10-10', '', '234'),
(2147483647, 'emmiyly', '1980-09-02', 'langatta', 'Nakuru', 'Male', 'O level', 'Married', 'Robbery', '2014-10-10', '', '9883');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE IF NOT EXISTS `transfer` (
  `National_id` int(16) NOT NULL,
  `File_num` varchar(16) NOT NULL,
  `From_prison` varchar(17) NOT NULL,
  `To_prison` varchar(18) NOT NULL,
  `Dateoftransfer` date NOT NULL,
  PRIMARY KEY (`National_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `User_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Mobile` int(11) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `BirthDate` date NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Station_Name` varchar(20) NOT NULL,
  `VerificationProof` varchar(100) NOT NULL,
  PRIMARY KEY (`User_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`User_Id`, `Name`, `Address`, `City`, `Mobile`, `Email`, `Gender`, `BirthDate`, `UserName`, `Password`, `Station_Name`, `VerificationProof`) VALUES
(8, 'user', 'user', 'nairobi', 98888, 'user@user.com', 'male', '2013-11-04', 'user', 'user', 'user', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

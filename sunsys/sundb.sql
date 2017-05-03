-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 04, 2017 at 01:07 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sundb`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `apart_name` varchar(50) NOT NULL,
  `apart_loc` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `mobile_num` varchar(20) NOT NULL,
  `apart_status` varchar(10) NOT NULL,
  `apart_price` varchar(6) NOT NULL,
  `regdate` varchar(20) NOT NULL,
  `num_units` varchar(20) NOT NULL,
  `cancel_charge` int(5) NOT NULL,
  `other_det` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `logs` varchar(100) NOT NULL,
  `furniture` varchar(600) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`apart_name`, `apart_loc`, `owner_name`, `mobile_num`, `apart_status`, `apart_price`, `regdate`, `num_units`, `cancel_charge`, `other_det`, `id`, `logs`, `furniture`) VALUES
('KAMAU AND SONS', 'Utawala', 'user samson', '214748387', 'new', '10000', 'Thu Nov 03 2016', 'Ba,Bs', 0, '', 29, 'Apartment added', 'Dstv, Zuku internet'),
('', '', 'tftfgfghfg fight', '76868', 'new', '', '', '', 0, '', 30, 'Apartment added', ''),
('MY NEW APART', 'NYERI', 'samson kingori', '4387857', 'new', '56000', 'Sun Jan 15 2017', '23', 0, '', 31, 'Apartment added', 'XX XX \r\nFFFFF\r\nKKKKK\r\nIIIIIII');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `apart_booked` varchar(50) NOT NULL,
  `booked_by` varchar(50) NOT NULL,
  `book_from` varchar(20) NOT NULL,
  `book_to` varchar(20) NOT NULL,
  `book_status` varchar(20) NOT NULL,
  `deposit_paid` varchar(20) NOT NULL,
  `bal_paid` varchar(20) NOT NULL,
  `book_contact` int(20) NOT NULL,
  `email_adre` varchar(50) NOT NULL,
  `charges_paid` int(20) NOT NULL,
  `id` int(11) NOT NULL,
  `unit_booked` varchar(11) NOT NULL,
  `logs` varchar(200) NOT NULL,
  `paymentmode` varchar(20) NOT NULL,
  `mpesaref` varchar(250) NOT NULL,
  `bankref` varchar(250) NOT NULL,
  `owner_num` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`apart_booked`, `booked_by`, `book_from`, `book_to`, `book_status`, `deposit_paid`, `bal_paid`, `book_contact`, `email_adre`, `charges_paid`, `id`, `unit_booked`, `logs`, `paymentmode`, `mpesaref`, `bankref`, `owner_num`) VALUES
('NEW APART', 'Maina Mwangi  james', 'Sat Nov 19 2016', 'Wed Dec 21 2016', 'paid', '4500', '4500', 2147483647, '', 0, 26, '0', '', '', '5645465GFGFGF65', 'FGGF6546578687HGFG', 2147483647),
('SAMSY APARTMENTS NEW!!', 'Maina Mwangi  james', 'Fri Nov 18 2016', 'Tue Dec 13 2016', 'paid', '5000', '5000', 2147483647, '', 0, 27, '', '', '', '', 'GHG5697GHFGF23', 2147483647),
('KAMAU AND SONS', 'Maina Mwangi  james', 'Thu Nov 03 2016', 'Sun Nov 20 2016', 'paid', '5000', '5000', 454534734, '', 0, 28, '', '', '', 'K67667GGHHHJFD', '', 214748387),
('KAMAU AND SONS', 'Maina Mwangi  james', 'Sun Nov 27 2016', 'Thu Dec 15 2016', 'canceled', '5000', '', 454534734, '', 750, 29, '', '', '', 'K4555FGDFIUIHHB', '', 214748387),
('KAMAU AND SONS', 'Maina Mwangi  james', 'Thu Dec 15 2016', 'Sat Dec 31 2016', 'paid', '5000', '5000', 454534734, '', 0, 30, '', '', '', '', 'HJGKUYU65765', 214748387),
('KAMAU AND SONS', 'samson kingori  mwangi', 'Sat Nov 12 2016', 'Thu Dec 08 2016', 'paid', '5000', '5000', 4387857, '', 0, 31, '', '', '', '232HGFGD3UIIYU', 'GGG676667HJJH', 214748387),
('MY NEW APART', 'jamamma sasasas  samson', 'Sun Jan 15 2017', 'Sun Jan 15 2017', 'paid', '28000', '28000', 2147483647, '', 0, 32, '', '', '', 'HHGGDD55QQ9JK', '', 4387857),
('KAMAU AND SONS', 'Samson Kingori  Mwangi', 'Sun Feb 26 2017', 'Sun Feb 26 2017', 'paid', '5000', '5000', 2143434545, '', 0, 33, '', '', '', '', 'gh', 214748387);

-- --------------------------------------------------------

--
-- Table structure for table `damages`
--

CREATE TABLE `damages` (
  `damageid` int(11) NOT NULL,
  `damageby` varchar(20) NOT NULL,
  `mobilenumber` int(10) NOT NULL,
  `date_reg` date NOT NULL,
  `damage` varchar(100) NOT NULL,
  `charges` varchar(100) NOT NULL,
  `otherdetails` varchar(100) NOT NULL,
  `logs` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damages`
--

INSERT INTO `damages` (`damageid`, `damageby`, `mobilenumber`, `date_reg`, `damage`, `charges`, `otherdetails`, `logs`) VALUES
(1, 'sassy', 45454, '0000-00-00', '233', '232', '', 'Damage adde'),
(2, 'sassy', 45454, '0000-00-00', '233', '232', '', 'Damage adde'),
(3, 'asnnnn', 34343, '0000-00-00', 'erercere', '45', 'error', 'Damage adde'),
(4, 'asnnnn', 34343, '0000-00-00', 'erercere', '45', 'error', 'Damage adde'),
(5, '4545', 545, '0000-00-00', '4545', '454', 'esddsdc\r\nryytyt', 'Damage adde'),
(6, 'were', 34343, '2016-12-28', '3ewwrwr', '344', '34343dsxgsdgdfhgfhgfh', 'Damage adde');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(255) NOT NULL,
  `image_id` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image_id`, `location`) VALUES
(8, 'NEW APART', '../upload/SAM_1496.JPG'),
(9, 'SAMSY APARTMENTS NEW!!', '../upload/SAM_1532.JPG'),
(10, 'ANOTHER NEW APARTMENT', '../upload/SAM_1496.JPG'),
(11, 'KAMAU AND SONS', '../upload/IMG_2684.JPG'),
(12, 'MY NEW APART', '../upload/estatement2.png');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logsid` int(11) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `activity_by` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logsid`, `activity`, `activity_by`, `date`) VALUES
(5, 'User Activated', 'By admin', '2016-10-31 19:03:37'),
(6, 'User Activated', 'By admin', '2016-10-31 19:03:41'),
(7, 'User Activated', 'By admin', '2016-10-31 19:05:22'),
(8, 'Booking done', 'By user', '2016-11-03 14:11:44'),
(9, 'User Activated', 'By admin', '2016-11-04 15:16:30'),
(10, 'Profile updated', 'By user', '2016-11-04 15:30:52'),
(11, 'user profile updated', 'By admin', '2016-11-05 15:08:35'),
(12, 'message Addaed', 'By user', '2016-11-05 15:35:12'),
(13, 'Profile updated', 'By user', '2016-11-05 16:07:59'),
(14, 'User Activated', 'By admin', '2016-11-05 23:47:12'),
(15, 'User Activated', 'By admin', '2016-11-05 23:47:16'),
(16, 'User Activated', 'By admin', '2016-11-05 23:47:27'),
(17, 'user profile updated', 'By admin', '2016-11-06 11:08:46'),
(18, 'user profile updated', 'By admin', '2016-11-09 00:29:43'),
(19, 'Canceled booking', 'By admin', '2016-11-09 00:35:17'),
(20, 'Canceled booking', 'By admin', '2016-11-09 00:35:25'),
(21, 'Canceled booking', 'By admin', '2016-11-09 00:35:29'),
(22, 'Canceled booking', 'By admin', '2016-11-09 00:35:33'),
(23, 'Canceled booking', 'By admin', '2016-11-09 00:35:37'),
(24, 'Canceled booking', 'By admin', '2016-11-09 00:35:41'),
(25, 'Canceled booking', 'By admin', '2016-11-09 00:35:46'),
(26, 'Canceled booking', 'By admin', '2016-11-09 00:35:50'),
(27, 'Canceled booking', 'By admin', '2016-11-09 00:35:58'),
(28, 'Canceled booking', 'By admin', '2016-11-09 00:38:10'),
(29, 'Booking done', 'By user', '2016-11-21 16:25:59'),
(30, 'message Addaed', 'By user', '2016-11-21 16:31:33'),
(31, 'User Activated', 'By admin', '2016-12-28 02:32:18'),
(32, 'Damage Addaed', 'By admin', '2016-12-28 02:51:27'),
(33, 'Damage Addaed', 'By admin', '2016-12-28 02:53:20'),
(34, 'Damage Addaed', 'By admin', '2016-12-28 02:54:09'),
(35, 'Damage Addaed', 'By admin', '2016-12-28 02:54:32'),
(36, 'Damage Addaed', 'By admin', '2016-12-28 02:54:45'),
(37, 'Damage Addaed', 'By admin', '2016-12-28 02:57:18'),
(38, 'User Activated', 'By admin', '2016-12-31 00:02:44'),
(39, 'user profile updated', 'By admin', '2016-12-31 00:03:03'),
(40, 'user profile updated', 'By admin', '2016-12-31 00:04:15'),
(41, 'user profile updated', 'By admin', '2016-12-31 00:21:15'),
(42, 'user profile updated', 'By admin', '2016-12-31 00:21:38'),
(43, 'user profile updated', 'By admin', '2016-12-31 00:26:58'),
(44, 'user profile updated', 'By property owner', '2016-12-31 00:31:43'),
(45, 'user profile updated', 'By admin', '2017-01-14 17:25:50'),
(46, 'User Activated', 'By admin', '2017-01-15 10:34:08'),
(47, 'user profile updated', 'By admin', '2017-01-15 10:35:30'),
(48, 'New apartment added', 'By property owner', '2017-01-15 10:39:41'),
(49, 'user profile updated', 'By property owner', '2017-01-15 10:42:16'),
(50, 'Booking done', 'By user', '2017-01-15 10:46:04'),
(51, 'User Activated', 'By admin', '2017-01-16 13:55:37'),
(52, 'Canceled booking', 'By admin', '2017-02-26 23:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msgid` int(11) NOT NULL,
  `type` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date_sent` varchar(250) NOT NULL,
  `sent_by` varchar(250) NOT NULL,
  `apartment` varchar(250) NOT NULL,
  `contact_num` varchar(250) NOT NULL,
  `msg_status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msgid`, `type`, `message`, `date_sent`, `sent_by`, `apartment`, `contact_num`, `msg_status`) VALUES
(1, '2', 'Thank to all', 'now()', 'samson kingori', 'KAMAU AND SONS', '4387857', 'unread'),
(2, '2', 'ty', 'now()', 'samson kingori', 'KAMAU AND SONS', '4387857', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) NOT NULL,
  `policynumber` varchar(20) NOT NULL,
  `policytype` varchar(50) NOT NULL,
  `otherdetails` varchar(100) NOT NULL,
  `logs` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `policynumber`, `policytype`, `otherdetails`, `logs`) VALUES
(1, '2324', 'Policy', '', 'Policy added by admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `emailad` varchar(20) NOT NULL,
  `idcard` int(20) NOT NULL,
  `phonenum` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sirname` varchar(20) NOT NULL,
  `othernames` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `logs` varchar(200) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_account` int(50) NOT NULL,
  `pass_status` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `emailad`, `idcard`, `phonenum`, `password`, `sirname`, `othernames`, `category`, `status`, `logs`, `bank_name`, `bank_account`, `pass_status`) VALUES
(1, 'admin', 'info.samsy@gmail.com', 343434343, 2143434545, '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Mwangi', 'Samson Kingori', '4', 'active', 'Admin changed password', '', 0, 'secure'),
(2, 'smwangi', 'smwangi@gmail.com', 35453453, 4387857, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'mwangi', 'samson kingori', '1', 'active', 'Property owner profile edited', 'EQUITY', 3243254, 'secure'),
(3, 'samson', 'd@j.com', 1212121221, 2147483647, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'samson', 'jamamma sasasas', '2', 'active', 'user activated', '', 0, ''),
(4, 'administrator', 'sa@gghh.com', 22324324, 2147483647, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin', 'admin mwangi', '4', 'active', 'user activated', '', 0, ''),
(5, 'sam', 'ugt', 778575, 76868, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'gfghfghfgh', 'tftfgfghfg fight', '4', 'active', 'user activated', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apart_booked` (`apart_booked`);

--
-- Indexes for table `damages`
--
ALTER TABLE `damages`
  ADD PRIMARY KEY (`damageid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`,`image_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logsid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msgid`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `damages`
--
ALTER TABLE `damages`
  MODIFY `damageid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logsid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msgid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2014 at 05:40 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vision`
--

-- --------------------------------------------------------

--
-- Table structure for table `bursarystudent`
--

CREATE TABLE IF NOT EXISTS `bursarystudent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `CLASS` varchar(35) NOT NULL,
  `SEX` varchar(1) NOT NULL,
  `AMOUNT` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bursarystudent`
--

INSERT INTO `bursarystudent` (`ID`, `NAME`, `CLASS`, `SEX`, `AMOUNT`) VALUES
(1, 'JAC romeo', 'SENIOR THREE', 'F', 300000),
(2, 'jack', '', '', 400),
(3, 'him', '', '', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `CLUB_ID` varchar(5) NOT NULL,
  `NAME` varchar(15) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `CHAIRMAN` varchar(72) NOT NULL,
  `PATRON` varchar(50) NOT NULL,
  `DATE` date NOT NULL,
  `STATUS` varchar(25) NOT NULL,
  PRIMARY KEY (`CLUB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`CLUB_ID`, `NAME`, `DESCRIPTION`, `CHAIRMAN`, `PATRON`, `DATE`, `STATUS`) VALUES
('23w', 'jjj', 'fgd', 'dsfrsd', 'dgfsr', '2013-07-24', 'Active'),
('A122', 'WILD LIFE', 'FOREST', 'HERBERT', 'NANA', '2013-09-03', 'active'),
('A123', 'SCOUT CLUB', 'STEADY', 'JACK', 'MUGAGA', '2012-05-08', 'active'),
('A124', 'TASO', 'PROVIDE', 'KIVOSA', 'HIM', '2013-06-14', 'active'),
('dsfas', 'dsfsad', 'sdfsa', 'sfaweewfwe', 'sdcsa', '2013-07-24', 'Active'),
('F100', 'FOOTBALL', 'ARSENAL FC', 'JACK', 'SON', '2013-07-13', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `clubmember`
--

CREATE TABLE IF NOT EXISTS `clubmember` (
  `CLUB_ID` varchar(5) NOT NULL,
  `MEMBER_ID` varchar(45) NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`CLUB_ID`,`MEMBER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubmember`
--

INSERT INTO `clubmember` (`CLUB_ID`, `MEMBER_ID`, `DATE`) VALUES
('A122', 'cubed tevvez', '2013-07-22'),
('A122', 'herbert samz', '2013-06-14'),
('A122', 'jackson hreb', '2013-06-14'),
('A122', 'NANI lous', '2013-07-04'),
('A123', 'herbert samz', '2013-06-14'),
('A123', 'JAC romeo', '2013-06-14'),
('A124', 'cubed tevvez', '2013-06-14'),
('A124', 'FRED john', '2013-07-04'),
('A124', 'NANI lous', '2013-06-14'),
('F100', 'herbert samz', '2013-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE IF NOT EXISTS `expenditure` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ITEM` varchar(50) NOT NULL,
  `AMOUNT` float NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `expenditure`
--


-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `SUB_ID` varchar(7) NOT NULL,
  `LMARK` int(2) NOT NULL,
  `HMARK` int(3) NOT NULL,
  `AGGREGATE` smallint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`ID`, `SUB_ID`, `LMARK`, `HMARK`, `AGGREGATE`) VALUES
(1, 'AGR', 90, 95, 1),
(5, 'CHEM', 85, 89, 2),
(6, 'ART', 96, 100, 1),
(7, 'BIO', 76, 81, 3),
(8, 'CRE', 82, 87, 2),
(9, 'GEO', 65, 72, 3),
(10, 'GEO', 45, 50, 4),
(11, 'LIT', 57, 62, 4),
(12, 'BIO', 46, 55, 4),
(13, 'LIT', 47, 56, 1),
(14, 'PHY', 23, 40, 7),
(15, 'BIO', 0, 15, 9),
(16, 'AGR', 62, 65, 6),
(17, 'LIT', 55, 57, 4),
(18, 'HIST', 10, 35, 7);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image_id`, `location`) VALUES
(24, '23', 'upload/Capture.PNG'),
(9, 'cubed tevvez', 'upload/936787_388129121304239_1854243492_n.jpg'),
(29, 'emilly', 'upload/3_2.jpg'),
(13, 'FRED john', 'upload/jackss.PNG'),
(19, 'Gideon', 'upload/feature_mental.gif'),
(10, 'herbert samz', 'upload/kk.PNG'),
(12, 'JAC romeo', 'upload/jac.PNG'),
(8, 'jackson hreb', 'upload/dd.PNG'),
(23, 'jasso', 'upload/1003254_139289079600772_600430553_n.jpg'),
(17, 'jolly', 'upload/Tulips.jpg'),
(21, 'lillian', 'upload/969983_139540719575608_652983355_n.jpg'),
(20, 'maniraguha', 'upload/945922_139288632934150_1239182602_n.jpg'),
(30, 'mut', 'upload/image.jpg'),
(11, 'NANI lous', 'upload/551779_239753149475171_273745233_n.jpg'),
(25, 'ngoroye', 'upload/8db594cdfc5a95f59f59d8f3aeead3be.jpg'),
(28, 'NYIRAMAHIRWE EMILLY', 'upload/3_2.jpg'),
(18, 'ONYANGO', 'upload/phonewor.PNG'),
(15, 'rebecca me', 'upload/vlcsnap-2013-06-22-15h42m40s140.png'),
(16, 'safi', 'upload/Penguins.jpg'),
(14, 'testing', 'upload/7.jpg'),
(22, 'working', 'upload/5897_139288476267499_1719977008_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `itempay`
--

CREATE TABLE IF NOT EXISTS `itempay` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `STNAME` varchar(255) NOT NULL,
  `ITEM` varchar(255) NOT NULL,
  `AMOUNT` float NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `itempay`
--

INSERT INTO `itempay` (`ID`, `STNAME`, `ITEM`, `AMOUNT`, `DATE`) VALUES
(3, 'jackson hreb', 'sugar', 2500, '2013-07-23'),
(5, 'herbert samz', 'slasher,\r\noil', 2500, '2013-07-24'),
(11, 'herbert samz', 'dfdsfdsfs', 323, '2013-07-24'),
(12, 'jackson hreb', 'bullete', 500, '2013-08-14');

-- --------------------------------------------------------

--
-- Table structure for table `nonstaff`
--

CREATE TABLE IF NOT EXISTS `nonstaff` (
  `NONS_ID` int(5) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(30) NOT NULL,
  `SEX` varchar(1) NOT NULL,
  `AGE` varchar(5) NOT NULL,
  `DUTY` varchar(45) NOT NULL,
  `STATUS` varchar(25) NOT NULL,
  PRIMARY KEY (`NONS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `nonstaff`
--

INSERT INTO `nonstaff` (`NONS_ID`, `NAME`, `SEX`, `AGE`, `DUTY`, `STATUS`) VALUES
(5, 'rebecca me', 'F', '30-35', 'Gate keeper', 'active'),
(7, 'sinamu', 'F', '35-40', 'sweeper', 'terminated'),
(9, 'jackson', 'F', '25-30', 'store keeper', 'active'),
(10, 'rebecca', 'M', '25-30', 'sweeper', 'active'),
(11, 'red', 'M', '12', 'store keeper', 'Active'),
(12, 'Ngobi Daniel', 'M', '23', 'Askari', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `nonstaffpay`
--

CREATE TABLE IF NOT EXISTS `nonstaffpay` (
  `NON_ID` varchar(255) NOT NULL,
  `PAY_ID` int(1) NOT NULL AUTO_INCREMENT,
  `SALARY` float NOT NULL,
  `PAYAMOUNT` double NOT NULL,
  `CREDIT` double NOT NULL,
  `DAYPAY1` date NOT NULL,
  `DAYPAY2` date NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  PRIMARY KEY (`NON_ID`),
  UNIQUE KEY `PAY_ID` (`PAY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `nonstaffpay`
--

INSERT INTO `nonstaffpay` (`NON_ID`, `PAY_ID`, `SALARY`, `PAYAMOUNT`, `CREDIT`, `DAYPAY1`, `DAYPAY2`, `STATUS`) VALUES
('Ngobi Daniel', 22, 20000, 0, 20000, '0000-00-00', '0000-00-00', ''),
('red', 21, 600, 600, 0, '2013-11-11', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `STUDENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STNAME` varchar(255) NOT NULL,
  `CLASS` varchar(15) NOT NULL,
  `TERM` varchar(15) NOT NULL,
  `YEAR` int(4) NOT NULL,
  `TUTION` float NOT NULL,
  `AMOUNT` float NOT NULL,
  `DUES` float NOT NULL,
  `BALANCE` float NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`STUDENT_ID`, `STNAME`, `CLASS`, `TERM`, `YEAR`, `TUTION`, `AMOUNT`, `DUES`, `BALANCE`, `DATE`) VALUES
(8, 'cubed tevvez', 'SENIOR THREE', 'THIRD TERM', 2013, 300000, 34000, 266000, -266000, '2013-07-20'),
(10, 'rebecca me', 'SENIOR ONE', 'FIRST TERM', 2011, 500, 700, -200, 200, '2013-07-24'),
(13, 'jackson hreb', 'SENIOR ONE', 'FIRST TERM', 2011, 5000, 5000, 0, 0, '2013-07-22'),
(16, 'FRED john', 'SENIOR TWO', 'FIRST TERM', 2011, 500, 400, 100, -100, '2013-07-23'),
(17, 'NANI lous', 'SENIOR THREE', 'SECOND TERM', 2014, 5000, 2500, 2500, -2500, '2013-07-23'),
(18, 'safi', 'SENIOR THREE', 'SECOND TERM', 2013, 600, 0, 600, 1900, '2013-07-23'),
(19, 'herbert samz', 'SENIOR FIVE', 'SECOND TERM', 2013, 30000, 3000, 27000, -27000, '2013-07-23'),
(22, 'ONYANGO', 'SENIOR THREE', 'SECOND TERM', 2013, 200000, 5000000, -4800000, 4800000, '2013-07-24'),
(23, 'Gideon', 'SENIOR ONE', 'FIRST TERM', 2013, 5000, 2500, 2500, -2500, '2013-08-07'),
(24, 'maniraguha', 'SENIOR FIVE', 'SECOND TERM', 2013, 6000, 7000, -1000, 1000, '2013-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `STUDENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STNAME` varchar(255) NOT NULL,
  `SEX` char(1) NOT NULL,
  `AGE` int(2) NOT NULL,
  `DISTRICT` varchar(15) NOT NULL,
  `GUARDIAN` varchar(30) NOT NULL,
  `OFFERING` varchar(15) NOT NULL,
  `CLASS` varchar(15) NOT NULL,
  `STATUS` varchar(25) NOT NULL,
  `DATE` date NOT NULL,
  PRIMARY KEY (`STUDENT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENT_ID`, `STNAME`, `SEX`, `AGE`, `DISTRICT`, `GUARDIAN`, `OFFERING`, `CLASS`, `STATUS`, `DATE`) VALUES
(1, 'jackson hreb', 'M', 12, 'KISORO', 'jacob', 'DAY', 'SENIOR ONE', 'ACTIVE', '2013-05-03'),
(2, 'cubed tevvez', 'M', 14, 'Kisoro', 'yurself', 'Day', 'SENIOR SIX', 'Active', '2013-07-04'),
(3, 'herbert samz', 'M', 25, 'kidoro', 'mself', 'DAY', 'SENIOR TWO', 'expelled', '0000-00-00'),
(4, 'NANI lous', 'F', 33, 'EASTA', 'FAGUSON', 'BORDING', 'SENIOR FOUR', 'Active', '0000-00-00'),
(5, 'JAC romeo', 'F', 13, 'KABALE', 'SINAM', 'DAY', 'SENIOR THREE', 'died', '0000-00-00'),
(6, 'FRED john', 'F', 20, 'KABALE', 'jackson', 'BORDING', 'SENIOR ONE', 'Active', '0000-00-00'),
(8, 'rebecca me', 'F', 17, 'HERE', 'FATHER', 'BORDING', 'SENIOR FIVE', 'Active', '2013-07-19'),
(9, 'safi', 'F', 12, 'HERE', 'FATHER', 'DAY', 'SENIOR TWO', 'Active', '2013-07-19'),
(11, 'jolly', 'F', 12, 'kabale', 'jesca', 'BORDING', 'SENIOR THREE', 'Active', '2013-07-22'),
(13, 'jasso', 'M', 29, 'kapale', '1qws', 'BORDING', 'SENIOR ONE', 'Active', '2013-07-22'),
(16, 'lillian', 'F', 20, 'Mbarara', 'JA', 'BORDING', 'SENIOR SIX', 'Active', '2013-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `studentmark`
--

CREATE TABLE IF NOT EXISTS `studentmark` (
  `YEAR` int(4) NOT NULL,
  `TERM` varchar(15) NOT NULL,
  `CODE` varchar(7) NOT NULL,
  `STUDENT_ID` varchar(255) NOT NULL,
  `TEST` int(3) DEFAULT NULL,
  `EXAM` int(3) DEFAULT NULL,
  `TNAME` varchar(15) NOT NULL,
  PRIMARY KEY (`CODE`,`STUDENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmark`
--

INSERT INTO `studentmark` (`YEAR`, `TERM`, `CODE`, `STUDENT_ID`, `TEST`, `EXAM`, `TNAME`) VALUES
(2013, 'FIRST TERM', 'AGR', 'cubed tevvez', 45, 80, 'YH'),
(2014, 'SECOND TERM', 'AGR', 'FRED john', 60, 80, 'jk'),
(2013, 'FIRST TERM', 'AGR', 'Gideon', 88, 99, 'mj'),
(2013, 'THIRD TERM', 'AGR', 'jackson hreb', 77, 80, 'YH'),
(2013, 'FIRST TERM', 'AGR', 'ngoroye', 88, 99, 'ngw'),
(2013, 'THIRD TERM', 'ART', 'jackson hreb', 49, 100, 'AA'),
(2014, 'THIRD TERM', 'BIO', 'jackson hreb', 45, 76, 'YH'),
(2012, 'THIRD TERM', 'BIO', 'NANI lous', 78, 56, 'YH'),
(2015, 'FIRST TERM', 'CHEM', 'cubed tevvez', 91, 0, 'Daniel'),
(2013, 'SECOND TERM', 'CHEM', 'FRED john', 45, 0, 'SK'),
(2013, 'SECOND TERM', 'CHEM', 'jackson hreb', 78, 98, 'SK'),
(2014, 'FIRST TERM', 'CRE', 'jackson hreb', 60, 0, 'ok'),
(2013, 'SECOND TERM', 'CRE', 'safi', 78, 98, 'SK'),
(2013, 'FIRST TERM', 'ENG', 'cubed tevvez', 23, 23, 'Daniel'),
(2013, 'THIRD TERM', 'ENG', 'jackson hreb', 100, 100, 'ZZ'),
(2014, 'FIRST TERM', 'ENG', 'NANI lous', 78, 0, 'ok'),
(2013, 'THIRD TERM', 'FRE', 'jackson hreb', 56, 72, 'KJ'),
(2013, 'SECOND TERM', 'HIST', 'cubed tevvez', 45, 0, 'Daniel'),
(2013, 'THIRD TERM', 'LIT', 'jackson hreb', 67, 90, 'SJ'),
(2013, 'THIRD TERM', 'MTC', 'jackson hreb', 88, 90, 'KJ'),
(2013, 'SECOND TERM', 'MTC', 'maniraguha', 70, 77, 'MJ'),
(2013, 'SECOND TERM', 'MUS', 'JAC romeo', 66, 0, 'HJ'),
(2014, 'SECOND TERM', 'MUS', 'JACKSON HREB', 45, 0, 'Daniel'),
(2013, 'FIRST TERM', 'PHY', 'herbert samz', 45, 68, 'YH'),
(2013, 'THIRD TERM', 'PHY', 'jackson hreb', 88, 66, 'JH');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `ID` int(2) NOT NULL AUTO_INCREMENT,
  `CODE` varchar(5) NOT NULL,
  `SUBJECTNAME` varchar(50) NOT NULL,
  PRIMARY KEY (`CODE`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`ID`, `CODE`, `SUBJECTNAME`) VALUES
(1, 'AGR', 'AGRICULTURE'),
(2, 'ART', 'ART'),
(3, 'BIO', 'BIOLOGY'),
(4, 'CHEM', 'CHEMISTRY'),
(5, 'CRE', 'CHRISTIAN RELIGIOUS EDUCATION'),
(6, 'ENG', 'ENGLISH'),
(7, 'FRE', 'FRENCH'),
(8, 'GEO', 'GEOGRAPHY'),
(9, 'HIST', 'HISTORY'),
(13, 'LIT', 'LITERATURE'),
(10, 'MTC', 'MATHEMATICS'),
(11, 'MUS', 'MUSIC'),
(12, 'PHY', 'PHYSICS');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `TEACH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMES` varchar(30) NOT NULL,
  `SEX` char(1) NOT NULL,
  `AGE` int(2) NOT NULL,
  `QUALITY` varchar(30) NOT NULL,
  `STATUS` varchar(25) NOT NULL,
  PRIMARY KEY (`TEACH_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TEACH_ID`, `NAMES`, `SEX`, `AGE`, `QUALITY`, `STATUS`) VALUES
(2, 'Hackson', 'F', 25, 'NTC', 'Active'),
(3, 'jackson', 'M', 44, 'BSSE', 'active'),
(5, 'IT WORKS', 'M', 24, 'BASE', 'active'),
(6, 'kananura', 'M', 21, 'NTC', 'left'),
(7, 'sebdir', 'F', 36, 'BBA', 'Active'),
(9, 'red', 'F', 20, 'BBA', 'Active'),
(10, 'lydia', 'F', 20, 'BBA', 'Active'),
(11, 'RIMA', 'F', 20, 'ddd', 'Active'),
(14, 'NGOBI DANIEL', 'M', 26, 'Bachelors', 'Active'),
(15, 'NGOBI DANIEl1', 'M', 28, 'bach', 'Active'),
(17, 'mugisha', 'M', 20, 'BSSE', 'Active'),
(18, 'MANIRAGUHA JOSEPH', 'M', 25, 'NTC', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `teachercheck`
--

CREATE TABLE IF NOT EXISTS `teachercheck` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(300) NOT NULL,
  `DATE` date NOT NULL,
  `TIME` time NOT NULL,
  `COMMENT` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `teachercheck`
--

INSERT INTO `teachercheck` (`ID`, `NAME`, `DATE`, `TIME`, `COMMENT`) VALUES
(27, 'siname jackson', '2013-07-21', '16:55:05', ''),
(28, 'emmanu hima', '2013-07-21', '16:56:37', ''),
(30, 'NGOBI DANIEL', '2013-07-22', '18:18:24', ''),
(31, 'siname jackson', '2013-07-22', '22:18:24', ''),
(32, 'siname jackson', '2013-07-22', '22:27:22', ''),
(52, 'JACKSON SINAME', '2013-08-04', '17:54:31', ''),
(53, 'MUGISHA', '2013-08-07', '19:19:25', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachersalary`
--

CREATE TABLE IF NOT EXISTS `teachersalary` (
  `TEACH_ID` varchar(255) NOT NULL,
  `PAY_ID` int(1) NOT NULL AUTO_INCREMENT,
  `SALARY` float NOT NULL,
  `PAYAMOUNT` double NOT NULL,
  `CREDIT` double NOT NULL,
  `DAYPAY1` date NOT NULL,
  `DAYPAY2` date NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  PRIMARY KEY (`TEACH_ID`),
  UNIQUE KEY `PAY_ID` (`PAY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `teachersalary`
--

INSERT INTO `teachersalary` (`TEACH_ID`, `PAY_ID`, `SALARY`, `PAYAMOUNT`, `CREDIT`, `DAYPAY1`, `DAYPAY2`, `STATUS`) VALUES
('Hackson', 2, 70000, 76000, -6000, '2013-01-02', '0000-00-00', ''),
('IT WORKS', 14, 5600000, 0, 0, '0000-00-00', '0000-00-00', ''),
('jackson', 4, 23000, 23000, 0, '2012-06-11', '0000-00-00', ''),
('kananura', 10, 450000, 0, 0, '0000-00-00', '0000-00-00', ''),
('lydia', 21, 12300, 0, 12300, '0000-00-00', '0000-00-00', ''),
('MANIRAGUHA JOSEPH', 27, 150000, 150000, 0, '2013-08-08', '0000-00-00', ''),
('mugisha', 26, 6000, 6000, 0, '2013-05-05', '0000-00-00', ''),
('NGOBI DANIEL', 23, 200000, 500, 199500, '2013-07-17', '0000-00-00', ''),
('NGOBI DANIEl1', 24, 23333, 0, 23333, '0000-00-00', '0000-00-00', ''),
('red', 20, 400, 500, -100, '2013-03-10', '0000-00-00', ''),
('RIMA', 22, 0, 0, 0, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `LEVEL` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `FNAME`, `LNAME`, `LEVEL`) VALUES
(11, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'DERICK', 'DAN', 1),
(13, 'jackson', 'e99a18c428cb38d5f260853678922e03', 'NANI', 'LOUS', 2),
(14, 'secretary', '21232f297a57a5a743894a0e4a801fc3', 'Mrs', 'Erina', 3),
(15, 'bursar', '21232f297a57a5a743894a0e4a801fc3', 'Mr ', 'Bursar', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clubmember`
--
ALTER TABLE `clubmember`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`CLUB_ID`) REFERENCES `club` (`CLUB_ID`);

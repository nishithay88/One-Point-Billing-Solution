-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2014 at 02:06 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE IF NOT EXISTS `credit` (
  `id` int(11) NOT NULL,
  `mode` varchar(10) NOT NULL,
  `cardnum` int(16) NOT NULL,
  `name` varchar(30) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`cardnum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`id`, `mode`, `cardnum`, `name`, `month`, `year`) VALUES
(98, 'visa', 2147483647, 'ddff', 'Jan', 14);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `g1` char(1) NOT NULL,
  `date1` varchar(6) NOT NULL,
  `month1` varchar(11) NOT NULL,
  `year1` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `s1i` varchar(32) NOT NULL,
  `s1ii` int(11) NOT NULL,
  `s2` int(32) NOT NULL,
  `s2t` varchar(20) NOT NULL,
  `s3` int(20) NOT NULL,
  `s3t` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `firstname`, `middlename`, `lastname`, `g1`, `date1`, `month1`, `year1`, `email`, `username`, `password`, `s1i`, `s1ii`, `s2`, `s2t`, `s3`, `s3t`) VALUES
(98, 'hg', 'hg', 'hg', 'f', '1', 'Jan', 60, 'mani.tandle@gmail.com', 'lk', '25', '1', 0, 1, '', 0, ''),
(119, 'Mutpur', '', 'Sowmya', 'f', '1', 'Jan', 60, 'sowmya1198@gmail.com', 'rt3', 'we', 'Jan', 14, 1, 'rt', 1, 'rt');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE IF NOT EXISTS `policy` (
  `id` int(11) DEFAULT NULL,
  `polno` int(9) NOT NULL DEFAULT '0',
  `company` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`polno`),
  KEY `id` (`id`),
  KEY `PolNo` (`polno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `polno`, `company`) VALUES
(98, 111111111, 'max'),
(98, 222222222, 'max'),
(98, 333333333, 'max'),
(98, 444444444, 'max'),
(98, 555555555, 'max'),
(98, 666666666, 'max'),
(98, 777777777, 'max'),
(98, 888888888, 'max');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `polno` int(9) NOT NULL,
  `company` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `polno`, `company`) VALUES
(1, 123456789, 'lic'),
(2, 234567891, 'lic'),
(3, 345678912, 'lic'),
(4, 456789123, 'lic'),
(5, 567891234, 'lic'),
(6, 678912345, 'lic'),
(7, 789123456, 'lic'),
(8, 891234567, 'lic'),
(9, 912345678, 'lic'),
(10, 111111111, 'max'),
(11, 222222222, 'max'),
(12, 333333333, 'max'),
(13, 444444444, 'max'),
(14, 555555555, 'max'),
(15, 666666666, 'max'),
(16, 777777777, 'max'),
(17, 888888888, 'max'),
(18, 999999999, 'max'),
(19, 111101111, 'other'),
(20, 222202222, 'other'),
(21, 333303333, 'other'),
(22, 444404444, 'other'),
(23, 555505555, 'other'),
(24, 666606666, 'other'),
(25, 777707777, 'other'),
(26, 888808888, 'other'),
(27, 999909999, 'other');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `policy_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
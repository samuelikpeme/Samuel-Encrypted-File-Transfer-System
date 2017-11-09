-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2017 at 02:05 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cryptography`
--
CREATE DATABASE IF NOT EXISTS `cryptography` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cryptography`;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `UserID` int(255) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `GETS` varchar(4) DEFAULT NULL,
  `TOUSER` varchar(255) NOT NULL,
  `Messaging` datetime DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `enterkey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`UserID`, `Username`, `Message`, `GETS`, `TOUSER`, `Messaging`, `photo`, `enterkey`) VALUES
(58, 'IKPEME', 'W>,->b ;,Db[->', NULL, 'JERRY', '2017-10-18 22:27:07', 'g', 'b69a8768d880d086a2a75b7ed3045064ef7e6264'),
(59, 'Perry', '[v', NULL, 'JERRY', '2017-10-22 00:32:13', 'g', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06'),
(60, 'luis', 'vPbP-bP%>>b-b1''Pbv!b2>P''P', NULL, 'bassman', '2017-11-07 11:59:34', 'g', 'd435a6cdd786300dff204ee7c2ef942d3e9034e2');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `UserID` int(255) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` char(6) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `security` varchar(255) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`UserID`, `First_Name`, `Last_Name`, `Password`, `Gender`, `phone`, `username`, `email`, `security`) VALUES
(8, 'SAMUEL', 'IKPEME', 'de3c930bb2c844d73dd1427d6fef364c2642a29b', 'M', '07035577785', 'IKPEME', 'samuelsees2@gmail.com', '35782e220ed54928c23143934da0ff3ed8e49bf4'),
(9, 'VIVIAN', 'IKPEME', '035b51b24380c39e9a4e6cb82e6871647a4e9b99', 'F', '09055225625', 'JERRY', 'jerrysees2@gmail.com', '3238fc20fd7bf7fd6565fecaa3c021715e463457'),
(10, 'Katie', 'Kelvin', '35f9d7a139b2bfac3e490d9dbd6ca2db3378643d', 'F', '08102723539', 'Perry', 'daakwuru@gmail.com', '35f9d7a139b2bfac3e490d9dbd6ca2db3378643d'),
(11, 'David', 'Akwuru', '5fa339bbbb1eeaced3b52e54f44576aaf0d77d96', 'M', '08125607519', 'dayboy20', 'dakwuru@yahoo.com', 'b0399d2029f64d445bd131ffaa399a42d2f8e7dc'),
(12, 'luis', 'raph', 'db7b5cfc5da84ea5f7898a4519e5174561c58dbf', 'M', '08125607519', 'luis', 'lordralph41@gmail.com', 'faea5242a00c52da62a0f00df168c199b7ab748d'),
(13, 'bassey', 'emman', 'f3fb1ad3fc6a5635783a6dd454c5bfc8c3641304', 'M', '08102723539', 'bassman', 'bassman@gmail.com', '914ee49c01d63b4c2cf8bf2de520c19f1dd8a340'),
(14, 'adeniran', 'adenike', 'd0f4cba667d85e1f933cda6b016c6a7a5ddd238c', 'F', '08105987084', 'adenike', 'adenikeabigail1@gmail.com', '945370a2a6569933cc3b11eb334254d66ee97e11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(255) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`) VALUES
(7, 'IKPEME', 'de3c930bb2c844d73dd1427d6fef364c2642a29b'),
(8, 'JERRY', '035b51b24380c39e9a4e6cb82e6871647a4e9b99'),
(9, 'Perry', '35f9d7a139b2bfac3e490d9dbd6ca2db3378643d'),
(10, 'dayboy20', '5fa339bbbb1eeaced3b52e54f44576aaf0d77d96'),
(11, 'luis', 'db7b5cfc5da84ea5f7898a4519e5174561c58dbf'),
(12, 'bassman', 'f3fb1ad3fc6a5635783a6dd454c5bfc8c3641304'),
(13, 'adenike', 'd0f4cba667d85e1f933cda6b016c6a7a5ddd238c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

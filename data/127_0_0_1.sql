-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 06:36 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-billingsystem`
--
CREATE DATABASE IF NOT EXISTS `e-billingsystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e-billingsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `BillId` int(10) NOT NULL,
  `EntpId` int(3) NOT NULL,
  `CustmrName` varchar(25) NOT NULL,
  `BillDt` date NOT NULL,
  PRIMARY KEY (`BillId`,`EntpId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`BillId`, `EntpId`, `CustmrName`, `BillDt`) VALUES
(0, 0, '0', '1947-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `EntpId` int(3) NOT NULL,
  `ProdctId` varchar(10) NOT NULL,
  `Qntities` int(5) NOT NULL,
  PRIMARY KEY (`EntpId`,`ProdctId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enterprise`
--

DROP TABLE IF EXISTS `enterprise`;
CREATE TABLE IF NOT EXISTS `enterprise` (
  `EntpId` int(3) NOT NULL,
  `EntpName` varchar(50) NOT NULL,
  `EntpAddrs` varchar(150) NOT NULL,
  `EntpContctNo` varchar(10) DEFAULT NULL,
  `EntpEml` varchar(50) NOT NULL,
  `EntpPasswrd` varchar(25) NOT NULL,
  `EntpSecQstn` varchar(100) NOT NULL,
  `EntpSecQstnAnsr` varchar(100) NOT NULL,
  `EntpSttus` tinyint(1) NOT NULL,
  PRIMARY KEY (`EntpId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enterprise`
--

INSERT INTO `enterprise` (`EntpId`, `EntpName`, `EntpAddrs`, `EntpContctNo`, `EntpEml`, `EntpPasswrd`, `EntpSecQstn`, `EntpSecQstnAnsr`, `EntpSttus`) VALUES
(0, '0', '0', '0', '0', '0', '0', '0', 0),
(1, 'Chirag Enterprise', 'Rajkot', '1234567899', 'chirag@gmail.com', '1234', 'What is my neak name?', 'Chigu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ProdctId` int(10) NOT NULL,
  `EntpId` int(10) NOT NULL,
  `ProdctName` varchar(50) NOT NULL,
  `ProdctRt` int(5) NOT NULL,
  `ProdctGstRt` int(2) DEFAULT '0',
  `ProdctStock` int(10) NOT NULL,
  `ProdctSttus` tinyint(1) NOT NULL,
  PRIMARY KEY (`ProdctId`,`EntpId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProdctId`, `EntpId`, `ProdctName`, `ProdctRt`, `ProdctGstRt`, `ProdctStock`, `ProdctSttus`) VALUES
(0, 0, '0', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `EntpId` int(3) NOT NULL,
  `BillId` int(10) NOT NULL,
  `ProdctId` varchar(10) NOT NULL,
  `Quntities` int(5) NOT NULL,
  PRIMARY KEY (`EntpId`,`BillId`,`ProdctId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

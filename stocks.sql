-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2024 at 01:14 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stocks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'bcd2024', 'abc111');

-- --------------------------------------------------------

--
-- Table structure for table `managestock`
--

DROP TABLE IF EXISTS `managestock`;
CREATE TABLE IF NOT EXISTS `managestock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sid` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `dfrom` varchar(100) NOT NULL,
  `doa` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `managestock`
--

INSERT INTO `managestock` (`id`, `sid`, `item`, `dfrom`, `doa`, `qty`, `price`, `description`) VALUES
(7, 'BCD/325', 'HP VICTUS LAPTOP', 'GUWAHATI', '2024-10-22', '8', '72000', 'bh bbh');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sid` varchar(100) NOT NULL,
  `stock_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bname` varchar(100) NOT NULL,
  `bshop` varchar(100) NOT NULL,
  `dop` varchar(100) NOT NULL,
  `rqty` varchar(100) NOT NULL,
  `tprice` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `bemail` varchar(100) NOT NULL,
  `baddress` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `sid`, `stock_id`, `bname`, `bshop`, `dop`, `rqty`, `tprice`, `phone`, `bemail`, `baddress`) VALUES
(11, 'S909', 'BCD/325', 'Mohit Kedia', 'Bramaputra Computers', '2024-10-22', '2', '144000', '07002345114', 'singhanjum5@gmail.com', 'Dhsk College, Dibrugarh\r\nPODUM NAGAR BYE LANE 2 OPPOSITE PUBLIC HIGH SCHOOL');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

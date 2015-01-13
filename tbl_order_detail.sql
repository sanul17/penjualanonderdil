-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2015 at 11:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_order_detail` (
  `kd_order` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `potongan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`kd_order`, `kd_barang`, `qty`, `potongan`) VALUES
('OD00000002', 'BR00000002', '8', 0),
('OD00000001', 'BR00000001', '4', 0),
('OD00000001', 'BR00000002', '4', 0),
('OD00000001', 'BR00000003', '5', 0),
('OD00000003', 'BR00000002', '3', 0),
('OD00000004', 'BR00000002', '4', 0),
('OD00000004', 'BR00000003', '5', 0),
('OD00000005', 'BR00000001', '3', 0),
('OD00000005', 'BR00000003', '5', 0),
('OD00000006', 'BR00000002', '6', 0),
('OD00000007', 'BR00000001', '5', 0),
('OD00000008', 'BR00000003', '2', 0),
('OD00000009', 'BR00000001', '3', 0),
('OD00000009', 'BR00000002', '4', 0),
('OD00000010', 'BR00000002', '3', 0),
('OD00000010', 'BR00000003', '4', 0),
('OD00000011', 'BR00000001', '20', 0),
('OD00000011', 'BR00000002', '40', 0),
('OD00000011', 'BR00000003', '10', 0),
('OD00000012', 'BR00000001', '3', 40),
('OD00000013', 'BR00000001', '3', 10),
('OD00000013', 'BR00000003', '1', 20),
('OD00000013', 'BR00000002', '3', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

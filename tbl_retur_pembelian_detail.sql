-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2015 at 04:04 AM
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
-- Table structure for table `tbl_retur_pembelian_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_retur_pembelian_detail` (
  `kd_retur_pembelian` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty_sisa` int(11) NOT NULL,
  `qty_retur` int(11) NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_retur_pembelian_detail`
--

INSERT INTO `tbl_retur_pembelian_detail` (`kd_retur_pembelian`, `kd_barang`, `qty_sisa`, `qty_retur`, `keterangan`) VALUES
('RB00000001', 'BR00000003', 0, 2, '1'),
('RB00000001', 'BR00000007', 0, 3, '2'),
('RB00000001', 'BR00000007', 0, 3, '3'),
('RB00000002', 'BR00000007', 0, 2, '4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

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
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE IF NOT EXISTS `tbl_pembelian` (
  `kd_pembelian` varchar(10) NOT NULL,
  `kd_supplier` varchar(5) NOT NULL,
  `tgl_pembelian` int(20) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `kd_user` varchar(5) NOT NULL,
  `retur_status` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kd_pembelian`, `kd_supplier`, `tgl_pembelian`, `total_harga`, `kd_user`, `retur_status`) VALUES
('PB00000001', 'SP001', 1433704640, 0, 'KD001', 1),
('PB00000002', 'SP001', 1433707282, 0, 'KD001', 0),
('PB00000003', 'SP001', 1433882479, 0, 'KD001', 0),
('PB00000004', 'SP001', 1433894503, 0, 'KD001', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
 ADD PRIMARY KEY (`kd_pembelian`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

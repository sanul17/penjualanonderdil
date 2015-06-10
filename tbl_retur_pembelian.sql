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
-- Table structure for table `tbl_retur_pembelian`
--

CREATE TABLE IF NOT EXISTS `tbl_retur_pembelian` (
  `kd_retur_pembelian` varchar(10) NOT NULL,
  `kd_pembelian` varchar(10) NOT NULL,
  `tgl_retur_pembelian` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL,
  `kd_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_retur_pembelian`
--

INSERT INTO `tbl_retur_pembelian` (`kd_retur_pembelian`, `kd_pembelian`, `tgl_retur_pembelian`, `keterangan`, `kd_user`) VALUES
('RB00000001', 'PB00000001', 1433896675, 0, 'KD001'),
('RB00000002', 'PB00000004', 1433897621, 0, 'KD001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_retur_pembelian`
--
ALTER TABLE `tbl_retur_pembelian`
 ADD PRIMARY KEY (`kd_retur_pembelian`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 02:26 AM
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
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('113f80fb3f115c602d7192f639988941', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1421604500, ''),
('25887d4d2f321acaa6cdf3897ccb2084', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36', 1423611168, 'a:7:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Wed-Feb-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";}'),
('2a9ecd7e405bd6f28bf7965022a67108', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1421154190, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"lucky";s:10:"last_login";s:12:"Mon-Jan-2015";s:4:"nama";s:5:"Lucky";s:5:"level";s:5:"sales";s:8:"kd_sales";s:5:"SL001";s:14:"new_expiration";i:2592000;}'),
('2c764d40ec269d199ce76eb857a8c218', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1421178181, 'a:9:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Tue-Jan-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";s:14:"new_expiration";i:2592000;s:13:"cart_contents";a:3:{s:32:"4c19e5db666257945795e0ca3f1b3aa9";a:7:{s:5:"rowid";s:32:"4c19e5db666257945795e0ca3f1b3aa9";s:2:"id";s:10:"BR00000001";s:3:"qty";s:1:"3";s:5:"price";s:6:"600000";s:4:"name";s:11:"ACCU Kering";s:7:"options";a:1:{s:8:"qty_stok";s:2:"32";}s:8:"subtotal";i:1800000;}s:11:"total_items";i:3;s:10:"cart_total";i:1800000;}}'),
('3486802b23e075471ce87a357ad6c893', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1421424187, 'a:9:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Thu-Jan-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";s:14:"new_expiration";i:2592000;s:13:"cart_contents";a:5:{s:32:"3ac2491f746a56bcd5e877444f43ad37";a:6:{s:5:"rowid";s:32:"3ac2491f746a56bcd5e877444f43ad37";s:2:"id";s:10:"BR00000001";s:3:"qty";s:2:"10";s:5:"price";s:6:"120000";s:4:"name";s:11:"ACCU Kering";s:8:"subtotal";i:1200000;}s:32:"889270281aa92f3ebf6a3724d629ad7a";a:6:{s:5:"rowid";s:32:"889270281aa92f3ebf6a3724d629ad7a";s:2:"id";s:10:"BR00000002";s:3:"qty";s:1:"1";s:5:"price";s:5:"54000";s:4:"name";s:16:"AS Kick Starter ";s:8:"subtotal";i:54000;}s:32:"d8b66dd2660080945f101c719601d54a";a:6:{s:5:"rowid";s:32:"d8b66dd2660080945f101c719601d54a";s:2:"id";s:10:"BR00000003";s:3:"qty";s:1:"4";s:5:"price";s:5:"40000";s:4:"name";s:16:"AS Ban Belakang ";s:8:"subtotal";i:160000;}s:11:"total_items";i:15;s:10:"cart_total";i:1414000;}}'),
('4112bf5f8f59b40af39bf532c01ce138', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1421604500, ''),
('44d81d78f4054d3619be2122295bfa26', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1421604518, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"johny";s:10:"last_login";s:12:"Sun-Jan-2015";s:4:"nama";s:11:"Johny Super";s:5:"level";s:5:"sales";s:8:"kd_sales";s:5:"SL002";s:14:"new_expiration";i:2592000;}'),
('4ee558a300c7c9f87b024777cf382461', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36', 1425864186, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Sun-Mar-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";s:14:"new_expiration";i:2592000;}'),
('5506333e91aff37c5dc62caae8255465', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1421167255, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Mon-Jan-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";s:14:"new_expiration";i:2592000;}'),
('5a677f3c16e686348f40d9abd5bd09a7', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.91 Safari/537.36 OPR/27.0.16', 1422801004, ''),
('6af5f589a25a60130c78308c78e4e2f6', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.99 Safari/537.36', 1421592620, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"johny";s:10:"last_login";s:12:"Sun-Jan-2015";s:4:"nama";s:11:"Johny Super";s:5:"level";s:5:"sales";s:8:"kd_sales";s:5:"SL002";s:14:"new_expiration";i:2592000;}'),
('6afc374b6905669885cae1ad8edc2a4d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1421604501, ''),
('74d6b8a4b970d72b8dafe5040f721ce6', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1420317256, 'a:6:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"lucky";s:4:"nama";s:5:"Lucky";s:5:"level";s:5:"sales";s:14:"new_expiration";i:2592000;}'),
('8af2e6fdffe2d5ecbbdfe61351b34b1c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1421604500, ''),
('934425619ae2ee4e08765f6ec9ac35f9', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:36.0) Gecko/20100101 Firefox/36.0', 1425822621, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"lucky";s:10:"last_login";s:12:"Sun-Jan-2015";s:4:"nama";s:5:"Lucky";s:5:"level";s:5:"sales";s:8:"kd_sales";s:5:"SL001";s:14:"new_expiration";i:2592000;}'),
('a33b5d8ee83ae218090c49f36f8223ac', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1420407149, 'a:7:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Sat-Jan-2015";s:4:"nama";s:5:"Owner";s:5:"level";s:5:"owner";s:14:"new_expiration";i:2592000;}'),
('add072df3a52e9cc62b1fe6f6ed329b8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1420717615, ''),
('c43fcc3784099771c0fa152a930b068b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1421013855, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Sun-Jan-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";s:14:"new_expiration";i:2592000;}'),
('c94ec69c8321b34e21978152db70fb9b', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36 OPR/26.0.16', 1421625529, ''),
('dc8effad225a4057a2864da6e06b41af', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36', 1425707032, ''),
('df899a928d3c4b05f03d2e1a033d9dd9', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1421604500, ''),
('e690d6b78d53d319ad396d6230465d64', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1420717615, ''),
('e70db18d7dc1f027b56633fb5f6c687a', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36', 1425723443, 'a:7:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Sat-Mar-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";}'),
('eed00ebc73168580f5a36fe888df7019', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36', 1425681461, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Sat-Mar-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";s:14:"new_expiration";i:2592000;}'),
('f788cf7c1e9c91839cdcef9e9aa8bb3e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0', 1421604500, ''),
('fc5f2914acaa39e762fb5d1da12a6944', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.99 Safari/537.36', 1422169420, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Tue-Jan-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";s:14:"new_expiration";i:2592000;}'),
('fce51e703cef72f120b8879aeafd43f7', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36', 1421306575, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";s:13:"yesGetMeLogin";s:8:"username";s:5:"owner";s:10:"last_login";s:12:"Wed-Jan-2015";s:4:"nama";s:8:"Ci Santi";s:5:"level";s:5:"owner";s:7:"kd_user";s:5:"KD001";s:14:"new_expiration";i:2592000;}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `kd_barang` varchar(10) NOT NULL,
  `id_tipe_kategori` int(11) NOT NULL,
  `brand` varchar(35) NOT NULL,
  `min_stok` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `modal` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `posisi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `id_tipe_kategori`, `brand`, `min_stok`, `stok`, `modal`, `harga`, `posisi`) VALUES
('BR00000001', 1, 'xyz', 5, 10, 5000, 10000, 'A1'),
('BR00000002', 2, 'yzyaa', 5, 15, 7000, 8000, 'A2'),
('BR00000003', 6, 'asu', 5, 20, 4000, 40000, 'A2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `kd_order` varchar(10) NOT NULL,
  `kd_sales` varchar(5) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `potongan` int(10) NOT NULL,
  `alamat` longtext NOT NULL,
  `tgl_order` int(20) NOT NULL,
  `status` enum('Pending','Confirm') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`kd_order`, `kd_sales`, `nama_pelanggan`, `potongan`, `alamat`, `tgl_order`, `status`) VALUES
('OD00000001', 'SL001', 'SANUL', 56, 'SKIP LAMA', 1425817488, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_order_detail` (
  `kd_order` varchar(10) NOT NULL,
  `id_tipe_kategori` int(11) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`kd_order`, `id_tipe_kategori`, `kd_barang`, `qty`) VALUES
('OD00000001', 2, '', '44'),
('OD00000001', 4, '', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan` (
  `kd_penjualan` varchar(10) NOT NULL,
  `kd_order` varchar(10) DEFAULT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `alamat` longtext NOT NULL,
  `tgl_penjualan` int(20) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `kd_user` varchar(5) NOT NULL,
  `jenis` enum('Order','Cash') NOT NULL DEFAULT 'Order'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_penjualan_detail` (
  `kd_penjualan` varchar(10) NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `harga_tersimpan` int(10) NOT NULL,
  `potongan` int(10) NOT NULL,
  `dus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `kd_sales` varchar(5) NOT NULL,
  `nama_sales` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`kd_sales`, `nama_sales`, `username`, `password`) VALUES
('SL001', 'Lucky', 'lucky', 'lucky'),
('SL002', 'Johny Super', 'johny', 'johny');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipe_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_tipe_kategori` (
`id_tipe_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tipe_kategori`
--

INSERT INTO `tbl_tipe_kategori` (`id_tipe_kategori`, `kategori`, `type`) VALUES
(1, 'AKI KERING', 'YAMAHA'),
(2, 'AKI BASAH', 'YAMAHA'),
(3, 'AKI KERING', 'HONDA'),
(4, 'AKI BASAH', 'HONDA'),
(5, 'STANG ', 'AZX'),
(6, 'STANG PANJANG', 'YXZw');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `kd_user` varchar(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `level` enum('owner','admin','gudang','keuangan') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kd_user`, `username`, `password`, `nama_user`, `level`) VALUES
('KD001', 'owner', 'owner', 'Ci Santi', 'owner'),
('KD002', 'gudang', 'gudang', 'Si Gudang', 'gudang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
 ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
 ADD PRIMARY KEY (`kd_order`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
 ADD PRIMARY KEY (`kd_penjualan`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
 ADD PRIMARY KEY (`kd_sales`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_tipe_kategori`
--
ALTER TABLE `tbl_tipe_kategori`
 ADD PRIMARY KEY (`id_tipe_kategori`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`kd_user`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_tipe_kategori`
--
ALTER TABLE `tbl_tipe_kategori`
MODIFY `id_tipe_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

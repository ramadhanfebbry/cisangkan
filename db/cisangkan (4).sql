-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2016 at 05:09 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cisangkan`
--
CREATE DATABASE IF NOT EXISTS `cisangkan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cisangkan`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` varchar(12) NOT NULL,
  `id_kategori` smallint(3) NOT NULL,
  `type` varchar(20) NOT NULL,
  `unit` enum('pcs','dus') NOT NULL,
  `warna` varchar(15) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P-PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_kategori`, `type`, `unit`, `warna`, `berat`, `warehouse`) VALUES
('1', 2, 'njnjanjan', 'pcs', 'mjnknkn', 'kkmkm', 'P-PGD GTG Warna-site'),
('2', 3, 'fdf', 'pcs', 'fdg', '2', 'P-PGD GTG Warna-site');

-- --------------------------------------------------------

--
-- Table structure for table `tb_do`
--

CREATE TABLE IF NOT EXISTS `tb_do` (
  `id_do` varchar(12) NOT NULL,
  `date_do` date NOT NULL,
  `id_plv` varchar(12) NOT NULL,
  PRIMARY KEY (`id_do`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_do`
--

INSERT INTO `tb_do` (`id_do`, `date_do`, `id_plv`) VALUES
('DO-00001', '2016-09-06', 'PL00002'),
('DO-00002', '2016-09-08', 'xcdfg'),
('DO-00003', '2016-09-08', 'vfee');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jrp`
--

CREATE TABLE IF NOT EXISTS `tb_jrp` (
  `id_jrp` varchar(18) NOT NULL,
  `ship_date` date NOT NULL,
  `sales_order` enum('soja','soba') NOT NULL,
  `delivery_name` varchar(30) NOT NULL,
  `delivery_city` varchar(15) NOT NULL,
  `delivery_address` varchar(30) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `type` varchar(12) NOT NULL,
  `warna` varchar(12) NOT NULL,
  `quantity` varchar(5) NOT NULL,
  `delivery_remender` varchar(30) NOT NULL,
  `quantity_confirm` varchar(30) NOT NULL,
  `tonase` varchar(6) NOT NULL,
  PRIMARY KEY (`id_jrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jrp`
--

INSERT INTO `tb_jrp` (`id_jrp`, `ship_date`, `sales_order`, `delivery_name`, `delivery_city`, `delivery_address`, `id_barang`, `type`, `warna`, `quantity`, `delivery_remender`, `quantity_confirm`, `tonase`) VALUES
('Jrp-000001', '2016-08-02', 'soja', 'mnk', 'jbkj', 'bj ', '2', '', '', '78', '', '', ''),
('Jrp-00002', '0000-00-00', 'soja', 'rosmana', 'jakrta', ' kmasaohd', 'gtg ', '', '', '89', '', '', ''),
('Jrp-00009', '2016-09-03', 'soba', 'uci', 'garut', ' jaln pembangkitan', '234', '', '', '12', '', '', ''),
('Jrp-00010', '2016-09-09', 'soba', 'ani', 'hay', 'fnjd', '89', '', '', '4', '', '', ''),
('Jrp-00011', '2016-09-08', 'soba', 'ulfah', 'garut', ' kadungira', '123', '', '', '57', '', '', ''),
('Jrp-00012', '2016-09-08', 'soja', 'Maulida', 'Jakarta', ' kota baru jalan otista no 28', '12mt', '', '', '23', '', '', ''),
('Jrp-00013', '2016-09-06', 'soba', 'nani', 'jatinangor', ' kalapa sawit', 'gtg 345', '', '', '12', '', '', ''),
('Jrp-00014', '2016-09-14', 'soba', 'lp', 'ko', ' fe', 'jh', '', '', '45', '', '', ''),
('Jrp-00015', '2016-08-17', 'soja', 'nk', 'jakrta', ' jnd', 'df', '', '', '56', '', '', ''),
('Jrp-00016', '2016-09-09', 'soja', 'jcf', 'cccvn', ' mc', 'cnm', '', '', '45', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` smallint(3) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nm_kategori`) VALUES
(1, 'Genteng'),
(2, 'Paving Block'),
(3, 'Concrete Block'),
(4, 'Roster'),
(5, 'Concrete Tile & Pearlstone'),
(6, 'Kanstein'),
(7, 'Batu Alam'),
(8, 'Batu Beton');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE IF NOT EXISTS `tb_kendaraan` (
  `id_kendaraan` varchar(10) NOT NULL,
  `jenis_truk` enum('kontainer','puso') NOT NULL,
  `plat` varchar(10) NOT NULL,
  `nama_awal_sopir` varchar(20) NOT NULL,
  `nama_akhir_sopir` varchar(20) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  PRIMARY KEY (`id_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `jenis_truk`, `plat`, `nama_awal_sopir`, `nama_akhir_sopir`, `no_tlp`) VALUES
('Ac001', 'kontainer', 'T 4123 AB', 'Asep', 'Sopandi', '08987677678'),
('Ac002', 'puso', 'T 8128 D', 'Juhdi', 'T', '08213456321'),
('Ac003', 'kontainer', 'T 4567 QW', 'Agus', 'Darman', '08763554456'),
('Ac004', 'puso', 'T 9097 AB', 'Ahmad', 'Sobirin', '09876568908');

-- --------------------------------------------------------

--
-- Table structure for table `tb_plv`
--

CREATE TABLE IF NOT EXISTS `tb_plv` (
  `id_plv` varchar(10) NOT NULL,
  `date_plv` date NOT NULL,
  `id_jrp` varchar(18) NOT NULL,
  `id_kendaraan` varchar(10) NOT NULL,
  `quantity_confirm` varchar(4) NOT NULL,
  `delivery_remender` varchar(4) NOT NULL,
  PRIMARY KEY (`id_plv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_plv`
--

INSERT INTO `tb_plv` (`id_plv`, `date_plv`, `id_jrp`, `id_kendaraan`, `quantity_confirm`, `delivery_remender`) VALUES
('PL-00001', '2016-09-06', 'Jrp-000001', 'Ac001', '', ''),
('PL-00002', '2016-09-06', 'Jrp-000002', 'Ac001', '', ''),
('PL-00003', '2016-09-06', 'Jrp-000002', 'Ac002', '', ''),
('PL-00004', '2016-09-06', 'kkl', 'mmm', '', ''),
('PL-00005', '2016-09-08', ' c', 'cv', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rdo`
--

CREATE TABLE IF NOT EXISTS `tb_rdo` (
  `id_rdo` varchar(12) NOT NULL,
  `date_rdo` date NOT NULL,
  `id_do` varchar(12) NOT NULL,
  PRIMARY KEY (`id_rdo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rdo`
--

INSERT INTO `tb_rdo` (`id_rdo`, `date_rdo`, `id_do`) VALUES
('RDO-00001', '2016-09-06', 'dlmm'),
('RDO-00002', '2016-09-06', 'vcccg6gt');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama_awal` varchar(64) NOT NULL,
  `nama_akhir` varchar(64) NOT NULL,
  `level` enum('super admin','bag ppic','bag distribusi','bag gudang','kabag distribusi') NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama_awal`, `nama_akhir`, `level`) VALUES
('Ahmad', '827ccb0eea8a706c4c34a16891f84e7b', 'Ahmad', 'Robiansyah', 'bag distribusi'),
('Akbar', '827ccb0eea8a706c4c34a16891f84e7b', 'Johan', 'Akbar', 'kabag distribusi'),
('Ankus', '827ccb0eea8a706c4c34a16891f84e7b', 'Ani', 'Kusumawati', 'super admin'),
('Dewiks', '827ccb0eea8a706c4c34a16891f84e7b', 'Dewi', 'Kartika', 'bag ppic'),
('Firman2', '827ccb0eea8a706c4c34a16891f84e7b', 'Firrmansyah', 'Akhmad', 'bag gudang'),
('Ilham', '827ccb0eea8a706c4c34a16891f84e7b', 'Ilham', 'Nurdiansyah', 'bag distribusi'),
('kuya', '827ccb0eea8a706c4c34a16891f84e7b', 'uya', 'uya', 'kabag distribusi'),
('Mirna_', '827ccb0eea8a706c4c34a16891f84e7b', 'Mirna', 'Miranti', 'super admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

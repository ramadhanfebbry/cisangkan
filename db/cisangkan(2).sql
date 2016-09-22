-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 08:05 AM
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
-- Table structure for table `tb_batu`
--

CREATE TABLE IF NOT EXISTS `tb_batu` (
  `id_barang` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `berat` varchar(4) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P-PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_batu`
--

INSERT INTO `tb_batu` (`id_barang`, `type`, `warna`, `berat`, `warehouse`) VALUES
('BA-00001', 'Batu Grooved swift', 'grey', '28', 'P-PGD Block-site'),
('BA-00002', 'Batu Grooved loose', 'ivory', '17', 'P-PGD Block-site');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bbg`
--

CREATE TABLE IF NOT EXISTS `tb_bbg` (
  `id_barang` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `berat` varchar(4) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P-PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bbg`
--

INSERT INTO `tb_bbg` (`id_barang`, `type`, `berat`, `warehouse`) VALUES
('BBG-00001', 'Dia 600 cm', '1000', 'P-PGD Block-site'),
('BBG-00002', 'Dia 80 cm', '740', 'P-PGD Block-site');

-- --------------------------------------------------------

--
-- Table structure for table `tb_concrete`
--

CREATE TABLE IF NOT EXISTS `tb_concrete` (
  `id_barang` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `berat` varchar(4) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P-PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_concrete`
--

INSERT INTO `tb_concrete` (`id_barang`, `type`, `berat`, `warehouse`) VALUES
('CB-00001', 'K.01.1', '2.5', 'P-PGD Block-site'),
('CB-00002', 'K.01.3', '7.7', 'P-PGD Block-site');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ctp`
--

CREATE TABLE IF NOT EXISTS `tb_ctp` (
  `id_barang` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `berat` varchar(4) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P-PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ctp`
--

INSERT INTO `tb_ctp` (`id_barang`, `type`, `warna`, `berat`, `warehouse`) VALUES
('CTP-00001', 'Stone tile', 'Terracotta', '12.0', 'P-PGD Block-site'),
('CTP-00002', 'Classico', 'Tornado', '12.0', 'P-PGD Block-site');

-- --------------------------------------------------------

--
-- Table structure for table `tb_do`
--

CREATE TABLE IF NOT EXISTS `tb_do` (
  `id_do` varchar(12) NOT NULL,
  `date_do` date NOT NULL,
  `description` text NOT NULL,
  `id_plv` int(6) NOT NULL,
  `id_jrp` int(6) NOT NULL,
  `konfm_brg` int(3) NOT NULL,
  PRIMARY KEY (`id_do`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_genteng`
--

CREATE TABLE IF NOT EXISTS `tb_genteng` (
  `id_barang` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `berat` varchar(6) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P- PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_genteng`
--

INSERT INTO `tb_genteng` (`id_barang`, `type`, `warna`, `berat`, `warehouse`) VALUES
('GTG-00001', 'GTG Victoria State', 'Natural', '4.75', 'P-PGD GTG Warna-site'),
('GTG-00002', 'GTG Victoria State nok atas', 'blue', '4.75', 'P-PGD GTG Warna-site'),
('GTG-00003', 'uhdsi', 'merah', '5', 'P-PGD GTG Warna-site');

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
  `quantity` varchar(5) NOT NULL,
  `delivery_remender` varchar(30) NOT NULL,
  `quantity_confirm` varchar(30) NOT NULL,
  `tonase` varchar(6) NOT NULL,
  PRIMARY KEY (`id_jrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jrp`
--

INSERT INTO `tb_jrp` (`id_jrp`, `ship_date`, `sales_order`, `delivery_name`, `delivery_city`, `delivery_address`, `id_barang`, `quantity`, `delivery_remender`, `quantity_confirm`, `tonase`) VALUES
('Jrp-000001-160826', '2016-08-02', 'soja', 'mnk', 'jbkj', 'bj ', '78', '78', '', '', ''),
('Jrp-00002-160827', '0000-00-00', 'soja', 'rosmana', 'jakrta', ' kmasaohd', 'gtg ', '89', '', '', ''),
('Jrp-00003-160827', '0000-00-00', 'soja', 'm', 'm', 'uh', '89j', '78', '', '', ''),
('Jrp-00004-160827', '0000-00-00', 'soja', 'poi', 'mh', ' hgbl', 'h8', '76', '', '', ''),
('Jrp-00005-160828', '0000-00-00', 'soja', 'ania', 'shxka', 'bksdha', '6gc', '67', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kanstein`
--

CREATE TABLE IF NOT EXISTS `tb_kanstein` (
  `id_barang` varchar(10) NOT NULL,
  `type` varchar(55) NOT NULL,
  `berat` varchar(4) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P-PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kanstein`
--

INSERT INTO `tb_kanstein` (`id_barang`, `type`, `berat`, `warehouse`) VALUES
('K-00001', 'rmfl', '45', 'P-PGD GTG Warna-site'),
('K-00002', 'ksadm', '45', 'P-PGD Block-site'),
('K-00003', 'nmx', '90', 'P-PGD GTG Warna-site'),
('K-00004', 'mcm', '87', 'P-PGD GTG Warna-site');

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
('Ac001', 'puso', 'T 4123 AB', 'Asep', 'Sopandi', '08987677678'),
('Ac002', 'puso', 'T 8128 D', 'Juhdi', 'T', '08213456321'),
('Ac003', 'puso', 'T 4567 QW', 'Agus', 'Darman', '08763554321');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paving`
--

CREATE TABLE IF NOT EXISTS `tb_paving` (
  `id_barang` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tebal` varchar(3) NOT NULL,
  `warna` varchar(15) NOT NULL,
  `berat` varchar(4) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P-PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paving`
--

INSERT INTO `tb_paving` (`id_barang`, `type`, `tebal`, `warna`, `berat`, `warehouse`) VALUES
('PB-00001', 'PB Truepave', '', 'merah', '2.5', 'P-PGD Block-site'),
('PB-00002', 'PB Halfpave', '', 'kuning', '2.6', 'P-PGD Block-site'),
('PB-00003', 'Classico-01', '6', 'merah', '3.0', 'P-PGD GTG Warna-site');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pb`
--

CREATE TABLE IF NOT EXISTS `tb_pb` (
  `id_pb` int(6) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `tebal` varchar(3) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `berat` smallint(4) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P-PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_pb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_plv`
--

CREATE TABLE IF NOT EXISTS `tb_plv` (
  `id_plv` varchar(10) NOT NULL,
  `date_plv` date NOT NULL,
  `id_kendaraan` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `quantity_order` int(5) NOT NULL,
  `unit` enum('pcs') NOT NULL,
  `quantity_konfirm` int(5) NOT NULL,
  `id_jrp` int(6) NOT NULL,
  PRIMARY KEY (`id_plv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rdo`
--

CREATE TABLE IF NOT EXISTS `tb_rdo` (
  `no_rdo` varchar(12) NOT NULL,
  `date_rdo` date NOT NULL,
  `quantity` int(5) NOT NULL,
  `id_do` int(11) NOT NULL,
  PRIMARY KEY (`no_rdo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_roster`
--

CREATE TABLE IF NOT EXISTS `tb_roster` (
  `id_barang` varchar(10) NOT NULL,
  `type` varchar(55) NOT NULL,
  `berat` varchar(4) NOT NULL,
  `warehouse` enum('P-PGD GTG Warna-site','P-PGD Block-site') NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_roster`
--

INSERT INTO `tb_roster` (`id_barang`, `type`, `berat`, `warehouse`) VALUES
('R-00001', 'Roster R-01', '3.8', 'P-PGD Block-site'),
('R-00002', 'Roster R-02', '4.1', 'P-PGD Block-site');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama_awal` varchar(64) NOT NULL,
  `nama_akhir` varchar(64) NOT NULL,
  `level` enum('super_admin','bag_ppic','bag_distribusi','bag_gudang','kabag_distribusi') NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama_awal`, `nama_akhir`, `level`) VALUES
('ahmad', '827ccb0eea8a706c4c34a16891f84e7b', 'ahmad', 'arif', 'bag_distribusi'),
('ankus', '827ccb0eea8a706c4c34a16891f84e7b', 'ani', 'kusuma', 'super_admin'),
('dewiks', '827ccb0eea8a706c4c34a16891f84e7b', 'dewi', 'kartika', 'bag_ppic'),
('firman', '827ccb0eea8a706c4c34a16891f84e7b', 'firman', 'Nurodin', 'bag_gudang'),
('jkk', '827ccb0eea8a706c4c34a16891f84e7b', 'aset', 'as', 'bag_ppic');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

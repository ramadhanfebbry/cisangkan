-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2016 at 12:17 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_puskesmas_kk`
--
CREATE DATABASE IF NOT EXISTS `db_puskesmas_kk` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_puskesmas_kk`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jkn`
--

CREATE TABLE IF NOT EXISTS `tb_jkn` (
  `id_pasien` varchar(16) NOT NULL,
  `no_kartu` varchar(15) NOT NULL,
  `nm_pasien` varchar(64) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `usia` int(4) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jkn`
--

INSERT INTO `tb_jkn` (`id_pasien`, `no_kartu`, `nm_pasien`, `jk`, `usia`, `alamat`) VALUES
('P-000001', '1234567891012', 'Ratih', 'P', 34, 'jatihurip'),
('P-000002', '1234567890987', 'dela medina', 'P', 34, 'Cimahi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE IF NOT EXISTS `tb_obat` (
  `id_obat` smallint(3) NOT NULL AUTO_INCREMENT,
  `nm_obat` varchar(64) NOT NULL,
  `satuan` enum('Botol','Set','Buah','Tablet','Kaplet','Ampul','Kapsul','Supp','Pot','Vial','Tube','Roll','Ples','Pcs','Sachet','Paket') NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nm_obat`, `satuan`) VALUES
(1, 'Air Raksa Dental Use', 'Botol'),
(2, 'Alat Suntik Sekali Pakai 0,5 ml', 'Set'),
(3, 'Alat Suntik Sekali Pakai 1 ml', 'Set'),
(4, 'Alat Suntik Sekali Pakai 2,5 ml', 'Set'),
(5, 'Alat Suntik Sekali Pakai 5 ml', 'Set'),
(6, 'Alat Suntik Sekali Pakai 10 ml', 'Tablet'),
(7, 'Albendazol 400 mg', 'Tablet'),
(8, 'Alopurinol Tablet 100 mg', 'Tablet'),
(9, 'Alopurinol Tablet 300 mg', 'Tablet'),
(10, 'Ambroxol Sirup', 'Botol'),
(11, 'Ambroxol Tablet 30 mg', 'Tablet'),
(12, 'Ampisilin Kaplet 500 mg', 'Kaplet'),
(13, 'Aminofilin Inj 24 mg/ml-10ml', 'Ampul'),
(14, 'Aminofilin Tabet 200 mg', 'Tablet'),
(15, 'Amitriptilina HCI Tablet Salut 25 mg', 'Tablet'),
(16, 'Amlodipin Tablet 5 mg', 'Tablet'),
(17, 'Amlodipin Tablet 10 mg', 'Tablet'),
(18, 'Amoksilin Kapsul 250 mg', 'Kapsul'),
(19, 'Amoksilin Sirup Kering 125 mg/5ml', 'Botol'),
(20, 'Amoksilin Sirup Kering Forte 250 mg/5ml', 'Botol'),
(21, 'Amoksilin 500 mg', 'Kaplet'),
(22, 'Amoksilin + Asamklavulanat 625 mg', 'Tablet'),
(23, 'Amoniak Liquid', 'Botol'),
(24, 'Ampisilin 1 gr inj', 'Ampul'),
(25, 'Antalgin(Metampiron) Tablet 500 mg', 'Tablet'),
(26, 'Antasida DOEN I Tablet Kombinasi', 'Tablet'),
(27, 'Antasida DOEN II Suspensi Kombinasi ', 'Botol'),
(28, 'Anti Hemoroid Suppositorida', 'Supp'),
(29, 'Antifungi DOEN Kombinasi', 'Pot'),
(30, 'Antimigren DOEN/Ergotamin Kafein', 'Tablet'),
(31, 'Articain HCI 4%', 'Ampul'),
(32, 'Aqua Pro Injeksi Steril Bebas Pirogen -20ml', 'Ampul'),
(33, 'Aquadest Steril -500 ml', 'Botol'),
(34, 'Asam Askorbat (VIT C) Tablet 50 mg', 'Tablet'),
(35, 'Asam Folat Tablet 0,4 mg', 'Tablet'),
(36, 'Asam Mefenamat 500 mg', 'Tablet'),
(37, 'Asam Asetilsalisilat Tablet 500 mg (ASETOSA)', 'Tablet'),
(38, 'Asiklovir cr', 'Tube'),
(39, 'Asiklovir tab 200 mg', 'Tablet'),
(40, 'Asiklovir tab 400 mg', 'Tablet'),
(41, 'Atapulgit', 'Tablet'),
(42, 'Atrofin Sulfat Injeksi 0,25 mg/ml-1 ml', 'Ampul'),
(43, 'Bedak Salisil Serbuk 2%', 'Buah'),
(44, 'Benzatin Benzil Penisilin 1,2 juta IU/Vial', 'Vial'),
(45, 'Betametason Krim 0.1%', 'Tube'),
(46, 'Bismicon Jelly', 'Tube'),
(47, 'Bisturi', 'Buah'),
(48, 'Bloodseet', 'Buah'),
(49, 'Bedah', 'Roll'),
(50, 'Clorofenol (CHKM)', 'Ples'),
(51, 'Deksametason inj 5 mgg/ml-1 ml', 'Ampul'),
(52, 'Deksametason Tablet 0,5 mg', 'Tablet'),
(53, 'Devitalisasi Pasta (Non arsen)', 'Botol'),
(54, 'Difenhidramin inj 10 mg/ml', 'Ampul'),
(55, 'Digoksin Tablet 0,25 mg', 'Tablet'),
(56, 'Dimenhidrinat Tablet 50 mg', 'Tablet'),
(57, 'Domperidon Tablet 10 mg', 'Tablet'),
(58, 'Ekstrak Belladona Tablet 10 mg', 'Tablet'),
(59, 'Epinefrina HCI/Birtartrat(Adrenalin)inj 0,1%', 'Ampul'),
(60, 'Eritromisin 250 mg', 'Tablet'),
(61, 'Eritromisin 500 mg', 'Tablet'),
(62, 'Eritromisin Sirup Kering 200 mg/5 ml', 'Botol'),
(63, 'Etakridin (Rivanol) Larutan 0,1 %-300 ml', 'Botol'),
(64, 'Etambutol HcI Tablet 250 mg', 'Tablet'),
(65, 'Etambutol HcI Tablet 500 mg', 'Tablet'),
(66, 'Etanol 70%-100 ml', 'Botol'),
(67, 'Etanol 70%-1000 ml', 'Botol'),
(68, 'Etil Kloridsa Semprot -100 ml', 'Botol'),
(69, 'Eugenol Cairan', 'Botol'),
(70, 'Fenitoin Kapsul 100 mg', 'Kapsul'),
(71, 'Fenoksimetil Penisilin Tablet 250 mg', 'Tablet'),
(72, 'Fenoksimetil Penisilin Tablet 500 mg', 'Tablet'),
(73, 'Fenol Gliserol Tetes Telinga 10%', 'Botol'),
(74, 'Fitomenadion(Vit K1) inj 2 mg/ml-1ml', 'Ampul'),
(75, 'Fitomenadion(Vit K1) inj 10 mg/ml-1ml', 'Ampul'),
(76, 'Fitomenadion(Vit K1) Tablet Salut Gula 10 mg', 'Tablet'),
(77, 'Furosemid Tablet 40 mg', 'Tablet'),
(78, 'Folley Catheter', 'Pcs'),
(79, 'Garam Oralit 200 ml air', 'Sachet'),
(80, 'Gentamisin Inj 40 mg/ml', 'Vial'),
(81, 'Gentamycin Salep Kulit', 'Tube'),
(82, 'Gentian Violet Larutan 1 %-10 ml', 'Botol'),
(83, 'Glas Lonomer Cement', 'Set'),
(84, 'Glibenklamid Tablet 5 mg', 'Tablet'),
(85, 'Glimepride Tablet 1 mg', 'Tablet'),
(86, 'Glukosa Larutan Infus 5% Steril-500 ml', 'Botol'),
(87, 'Glukosa Larutan Infus 10% Steril-500 ml', 'Botol'),
(88, 'Griseofulvin Tablet 125 mg micronized', 'Tablet'),
(89, 'Gliseril Gyayakolat Tablet 100 mg', 'Tablet'),
(90, 'Haloperidol Tablet 0,5 mg', 'Tablet'),
(91, 'Haloperidol Tablet 1,5 mg', 'Tablet'),
(92, 'Haloperidol Tablet 2 mg', 'Tablet'),
(93, 'Haloperidol Tablet 5 mg', 'Tablet'),
(94, 'Hidroklortiazid (HCT) Tablet 25 mg', 'Tablet'),
(95, 'Hidrokortison Krim 2,5%', 'Tube'),
(96, 'Ibuprefon Tablet 200 mg', 'Tablet'),
(97, 'Ibuprefon Tablet 400 mg', 'Tablet'),
(98, 'Ibuprefon Sirup 100 mg/5 ml', 'Botol'),
(99, 'Infusion Set Anak', 'Set'),
(100, 'Infusion Set Dewasa', 'Set'),
(101, 'Isoniazida (INH) Tablet 300 mg', 'Tablet'),
(102, 'Isosorbit 5 mg', 'Tablet'),
(103, 'IV Cateer 24', 'Buah'),
(104, 'IV Cateer 22', 'Buah'),
(105, 'IV Cateer 20', 'Buah'),
(106, 'IV Cateer 18', 'Buah'),
(107, 'Jarum Jahit Kulit No.12 ', 'Buah'),
(108, 'Jarum Jahit Otot No.12', 'Buah'),
(109, 'Kalsium Permnanganat', 'Pot'),
(110, 'Kalsium Glukonat Injeksi i.v 10%', 'Ampul'),
(111, 'Kalsium /hidroksida Pasta', 'Set'),
(112, 'Kalsium Laktat (Kalk) Tablet 500 mg', 'Tablet'),
(113, 'Kapas Pembalut/Absorben 250 mg', 'Buah'),
(114, 'Kaptropil 12,5 mg', 'Tablet'),
(115, 'Kaptropil 12 mg', 'Tablet'),
(116, 'Karbamazepin Tablet 200 mg', 'Tablet'),
(117, 'Kasa Kompres 16x16 steril', 'Buah'),
(118, 'Kasa Hidrofil 36 m x 80 cm', 'Roll'),
(119, 'Kasa Pembalut Hidrofil 4m x 10cm', 'Roll'),
(120, 'Ketokonazol 200 mg', 'Tablet'),
(121, 'Kloramfenikol Kapsul 250 mg', 'Kapsul'),
(122, 'Kloramfenikol Salep Mata 1%', 'Tube'),
(123, 'Kloramfenikol Susp 125 ml', 'Botol'),
(124, 'Kloramfenikol Tetes Telinga 3%', 'Ples'),
(125, 'Klorfenariamin Maleat (CTM) Tablet mg', 'Tablet'),
(126, 'Klorpromazin Injeksi 5 mg/ml-2ml', 'Ampul'),
(127, 'Kloramfenikol 10 MG', 'Tablet'),
(128, 'Klorine', 'Botol'),
(129, 'Kotrimoksazol Anak', 'Tablet'),
(130, 'Kotrimoksazol Susp', 'Botol'),
(131, 'Kotrimoksazol Tablet 480 mg / MIRATRIM', 'Tablet'),
(132, 'Lidocain inj 2% (HCI)', 'Ampul'),
(133, 'Lidocain Compositum inj Kombinasi', 'Ampul'),
(134, 'Lidocain HCI 20 mg, Adrenalin 0,0125 mg', 'Ampul'),
(135, 'Lisol', 'Botol'),
(136, 'Loratadine 10 mg', 'Tablet'),
(137, 'Magnesium Sulfat Inj 20%', 'Vial'),
(138, 'Magnesium Sulfat Inj 40%', 'Vial'),
(139, 'Masker', 'Buah'),
(140, 'Metilergometrin Maleat Tab', 'Tablet'),
(141, 'Metilergometrin Maleat Inj', 'Ampul'),
(142, 'Metronidazol  Tablet 250 mg', 'Tablet'),
(143, 'Metronidazol  Tablet 500 mg', 'Tablet'),
(144, 'Metformin', 'Tablet'),
(145, 'Metoklopramide Inj', 'Ampul'),
(146, 'Mikonazol Krim 2%', 'Tube'),
(147, 'Mummying Pasta', 'Botol'),
(148, 'Natrium Bikarbonat Tablet 500 mg', 'Tablet'),
(149, 'Natrium Diklofenak', 'Tablet'),
(150, 'Natrium Klorida Lar.infus 0,9% Steril', 'Botol'),
(151, 'Nifedipin 10 mg', 'Tablet'),
(152, 'Nistatin Tablet Vaginal 100.000 IU/g', 'Tablet'),
(153, 'Nistatin Tablet Vaginal 500.000 IU/g', 'Tablet'),
(154, 'Norit', 'Tablet'),
(155, 'Obat Antituberkulosis anak/FDC Anak', 'Paket'),
(156, 'Obat Antituberkulosis', 'Paket'),
(157, 'Obat Antituberkulosis Kategori 2/FDC2', 'Paket'),
(158, 'Obat Antituberkulosis Kombipak Kat.I Dewasa', 'Paket'),
(159, 'OAT Sisipan/FDC Sisipan', 'Paket'),
(160, 'Obat Batuk Hitam (OBH) Cairan-100 ml', 'Botol'),
(161, 'Oksitetrasiklin HCI inj i.m 50 mg/ml-10 ml', 'Vial'),
(162, 'Oksitetrasiklin HCI Salep Kulit 3%', 'Tube'),
(163, 'Oksitetrasiklin HCI 1% Salep Mata', 'Tube'),
(164, 'Oksitoksin inj 10 IU/ml-1 ml', 'Ampul'),
(165, 'Omeprazol', 'Kapsul'),
(166, 'Oseltamivir 75', 'Tablet'),
(167, 'Papaverin Tab', 'Tablet'),
(168, 'Paraformaldehid', 'Tablet'),
(169, 'Parasetamol Sirup 120 mg/5 ml', 'Botol'),
(170, 'Parasetamol Tablet 100 mg', 'Tablet'),
(171, 'Parasetamol Tablet 500 mg', 'Tablet'),
(172, 'Parafin Liquid', 'Botol'),
(173, 'Piralent Inj', 'Ampul'),
(174, 'Pirazinamid 500 mg', 'Tablet'),
(175, 'Piridoksin HCI (Vit B6) Tablet 10 mg', 'Tablet'),
(176, 'Piroxicam 20 mg', 'Tablet'),
(177, 'Plester 5 yardx2inch', 'Roll'),
(178, 'Plester 7,5 cm x 5 m', 'Buah'),
(179, 'Povidon Lodiada 10%-30 ml', 'Botol'),
(180, 'Povidon Lodiada 10%-300 ml', 'Botol'),
(181, 'Prednison Tablet 5 mg', 'Tablet'),
(182, 'Propiltiourasil Tablet 100 mg', 'Tablet'),
(183, 'Propanolol HCI Tablet 40 mg', 'Tablet'),
(184, 'Ranitidin 150 mg ', 'Tablet'),
(185, 'Ranitidin Inj', 'Ampul'),
(186, 'Reserpin Tablet 0,25 mg', 'Tablet'),
(187, 'Retinol (VIT A) Kapsul 100.000 IU', 'Kapsul'),
(188, 'Retinol (VIT A) Kapsul 200.000 IU', 'Kapsul'),
(189, 'Rifampisin Kapsul 300 mg', 'Kapsul'),
(190, 'Rifampisin Kapsul 450 mg', 'Kapsul'),
(191, 'Ringer Laktat Larutan Infus Steril', 'Botol'),
(192, 'Salbutamol Tablet 2 mg', 'Tablet'),
(193, 'Salbutamol Inhalasi/aerosol 100 mcg/dosis', 'Botol'),
(194, 'Salbutamol For Nebulizer 2,5 mg/2,5 ml Nacl', 'Ampul'),
(195, 'Salep 2-4 Kombinasi: as.asal 2%+Bel.4%', 'Pot'),
(196, 'Salisil Spiritus', 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama_awal` varchar(64) NOT NULL,
  `nama_akhir` varchar(64) NOT NULL,
  `level` enum('pendaftaran','super_admin','bp_umum','bp_gigi','imunisasi','kb','obat') NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama_awal`, `nama_akhir`, `level`, `email`) VALUES
('ai_rita', '827ccb0eea8a706c4c34a16891f84e7b', 'ai', 'rita', 'pendaftaran', 'ai_rita@gmail.com'),
('kusmiyati_', '827ccb0eea8a706c4c34a16891f84e7b', 'dini', 'kusmiyati', 'super_admin', 'dini_kusmiyati@yahoo.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 10:04 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_lap_jalanrusak`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelapor`
--

CREATE TABLE IF NOT EXISTS `pelapor` (
  `kd_pelapor` varchar(10) NOT NULL,
  `nm_pelapor` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp_pelapor` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelapor`
--

INSERT INTO `pelapor` (`kd_pelapor`, `nm_pelapor`, `alamat`, `tlp_pelapor`, `email`, `username`, `password`) VALUES
('P0001', 'Nofriandi', 'Pulau air parak laweh', '081267128891', 'nofriandi99@gmail.com', 'nofriandi', '123'),
('P0002', 'sansanes', 'gunuang panggilun', '08383928282', 'ihsan@gmail.com', 'sansanes1', '12345'),
('P0003', 'dayu', 'lubeg', '0834756834', 'dayu01@gmail.com', 'dayu', '1234'),
('P0004', 'dayu', 'lubeg', '0834756834', 'dayu01@gmail.com', 'dayu', '1234'),
('P0005', 'yoedi', 'banda kali', '0832632824', 'yoedi3@gmail.com', 'yoedi', '12345'),
('P0006', 'faradika', 'sawahan 103 A', '123456789', 'Faradika01', 'dika', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
  `kd_pengaduan` varchar(10) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `kd_pelapor` varchar(10) NOT NULL,
  `jdl_pengaduan` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`kd_pengaduan`, `tgl_pengaduan`, `kd_pelapor`, `jdl_pengaduan`, `keterangan`, `lokasi`, `foto`, `status`) VALUES
('P0001', '2020-06-23', 'P0001', 'Jalan rusak', 'Jalan rusak dan berlubang di Komplek Perupuk raya Tabing', 'Komplek Perupuk raya RT. 1 RW 4, Tabing', '230620071447_.jpeg', 'Baru'),
('P0002', '2020-07-22', 'P0002', 'jalan berlobang', 'jalan selalu di genangi air', 'gunung pangilun', '220720101322_.jpeg', 'Dipilih'),
('P0003', '2020-07-23', 'P0003', 'jalan berlobang', 'kalau hujan iar tergenang', 'kompleks belanti', '230720121121_.jpeg', 'Dipilih'),
('P0004', '2020-09-20', 'P0005', 'jalan tidak rata', 'ternganggu nya arus lalu lintas', 'banda kali', '200920105220_.jpeg', 'Dipilih'),
('P0005', '2020-09-21', 'P0006', 'Jalan Belom Berbeton', 'mengambat arus lalu lintas', 'ujung gurun', '210920044404_.jpeg', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `kd_petugas` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kd_petugas`, `nama`, `alamat`, `telpon`, `email`, `username`, `password`, `level`) VALUES
('P01', 'Ihsan Algani Sanes', 'Padang', '081267186012', 'ihsanalgani@gmail.com', 'ihsan', '123', 'Admin'),
('P02', 'Muhammad Yasin, S.Pd', 'Padang', '081267128812', 'myasin12@gmail.com', 'myasin123', '123', 'Kabid'),
('P03', 'bobi', 'kampung dalam', '08523739', 'bobi@gmail.com', 'bobi', '1234', 'Admin'),
('P04', 'Yeni Yuliza', 'Padang', '081271267127', 'yenniyuliza@gmail.com', 'yenniyuliza', '123', 'Kadis');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE IF NOT EXISTS `tindakan` (
  `kd_tindakan` varchar(10) NOT NULL,
  `kd_pengaduan` varchar(10) NOT NULL,
  `tgl_tindakan` date NOT NULL,
  `kd_petugas` varchar(10) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`kd_tindakan`, `kd_pengaduan`, `tgl_tindakan`, `kd_petugas`, `keterangan`) VALUES
('T0001', 'P0002', '2020-09-19', 'P01', 'sedang tahap pengerjaan'),
('T0001', 'P0003', '2020-09-16', 'P03', 'masih menuggu perintah atasan'),
('T0001', 'P0005', '2020-09-21', 'P03', 'masih proses');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

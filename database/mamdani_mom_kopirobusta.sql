-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2022 at 01:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamdani_mom_kopirobusta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_aturan`
--

CREATE TABLE `tb_aturan` (
  `id_aturan` int(11) NOT NULL,
  `no_aturan` int(11) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `operator` varchar(16) DEFAULT NULL,
  `kode_himpunan` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tb_himpunan`
--

CREATE TABLE `tb_himpunan` (
  `kode_himpunan` varchar(16) NOT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nama_himpunan` varchar(255) DEFAULT NULL,
  `penanda` varchar(255) DEFAULT NULL,
  `n1` double DEFAULT NULL,
  `n2` double DEFAULT NULL,
  `n3` double DEFAULT NULL,
  `n4` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_himpunan`
--

INSERT INTO `tb_himpunan` (`kode_himpunan`, `kode_kriteria`, `nama_himpunan`, `penanda`, `n1`, `n2`, `n3`, `n4`) VALUES
('C01-01', 'C01', 'Rendah', 'S2', 0, 0, 100, 200),
('C01-02', 'C01', 'Normal', 'S1', 100, 200, 600, 700),
('C01-03', 'C01', 'Sangat Tinggi', 'S3', 600, 700, 1000, 1200),
('C01-04', 'C01', 'Terlampau Tinggi', 'N', 1000, 1200, 2000, 3000),
('C02-01', 'C02', 'Terlampau Rendah', 'N', 0, 0, 15, 18),
('C02-02', 'C02', 'Sangat Rendah', 'S3', 15, 18, 19, 20),
('C02-03', 'C02', 'Normal', 'S1', 19, 20, 23, 24),
('C02-04', 'C02', 'Tinggi', 'S2', 23, 24, 27, 28),
('C02-05', 'C02', 'Sangat Tinggi', 'S3', 27, 28, 30, 32),
('C02-06', 'C02', 'Terlampau Tinggi', 'N', 30, 32, 40, 50),
('C03-01', 'C03', 'Terlampau Rendah', 'N', 0, 0, 1400, 1500),
('C03-02', 'C03', 'Sangat Rendah', 'S3', 1400, 1500, 1700, 1750),
('C03-03', 'C03', 'Rendah', 'S2', 1700, 1750, 1900, 2000),
('C03-04', 'C03', 'Normal', 'S1', 1900, 2000, 2800, 3000),
('C03-05', 'C03', 'Tinggi', 'S2', 2800, 3000, 3400, 3500),
('C03-06', 'C03', 'Sangat Tinggi', 'S3', 3400, 3500, 3900, 4000),
('C03-07', 'C03', 'Terlampau Tinggi', 'N', 3900, 4000, 4500, 5000),
('C04-01', 'C04', 'Sangat Rendah', 'S3', 0, 0, 4, 5),
('C04-02', 'C04', 'Rendah', 'S2', 4, 5, 5.2, 5.3),
('C04-03', 'C04', 'Normal', 'S1', 5.2, 5.3, 5.9, 6),
('C04-04', 'C04', 'Tinggi', 'S2', 5.9, 6, 6.4, 6.5),
('C04-05', 'C04', 'Sangat Tinggi', 'S3', 6.4, 6.5, 9, 10),
('C05-01', 'C05', 'Cukup Dangkal', 'N', 0, 0, 40, 50),
('C05-02', 'C05', 'Dangkal', 'S3', 40, 50, 70, 75),
('C05-03', 'C05', 'Agak Dalam', 'S2', 70, 75, 90, 100),
('C05-04', 'C05', 'Dalam', 'S1', 90, 100, 180, 200),
('C06-01', 'C06', 'Terlampau Rendah', 'N', 0, 0, 20, 30),
('C06-02', 'C06', 'Sangat Rendah', 'S3', 20, 30, 34, 35),
('C06-03', 'C06', 'Rendah', 'S2', 34, 35, 43, 45),
('C06-04', 'C06', 'Normal', 'S1', 43, 45, 70, 80),
('C06-05', 'C06', 'Tinggi', 'S2', 70, 80, 88, 90),
('C06-06', 'C06', 'sangat Tinggi', 'S3', 88, 90, 180, 200),
('C07-01', 'C07', 'Cukup Dangkal', 'N', 0, 0, 50, 75),
('C07-02', 'C07', 'Dangkal', 'S3', 50, 75, 100, 125),
('C07-03', 'C07', 'Agak Dalam', 'S2', 100, 125, 150, 175),
('C07-04', 'C07', 'Dalam', 'S1', 150, 175, 190, 200),
('C08-01', 'C08', 'Sangat Sesuai', 'S1', 0, 0, 6, 8),
('C08-02', 'C08', 'Sesuai', 'S2', 6, 8, 13, 15),
('C08-03', 'C08', 'Sesuai Marginal', 'S3', 13, 15, 25, 30),
('C08-04', 'C08', 'Tidak Sesuai', 'N', 25, 30, 40, 50),
('C09-01', 'C09', 'Sangat Sesuai', 'S1', 0, 0, 3, 5),
('C09-02', 'C09', 'Sesuai', 'S2', 3, 5, 10, 15),
('C09-03', 'C09', 'Sesuai Marginal', 'S3', 10, 15, 30, 40),
('C09-04', 'C09', 'Tidak Sesuai', 'N', 30, 40, 50, 100),
('C10-01', 'C10', 'Sangat Sesuai', 'S1', 0, 0, 3, 5),
('C10-02', 'C10', 'Sesuai', 'S2', 3, 5, 15, 20),
('C10-03', 'C10', 'Sesuai Marginal', 'S3', 15, 20, 23, 25),
('C10-04', 'C10', 'Tidak Sesuai', 'N', 23, 25, 75, 100),
('C11-01', 'C11', 'Tidak Sesuai (N)', 'N', 0, 0, 15, 25),
('C11-02', 'C11', 'Sesuai Marginal (S3)', 'S3', 15, 25, 40, 50),
('C11-03', 'C11', 'Sesuai (S2)', 'S2', 40, 50, 60, 70),
('C11-04', 'C11', 'Sangat Sesuai (S1)', 'S1', 60, 70, 90, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `batas_bawah` double DEFAULT NULL,
  `batas_atas` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `batas_bawah`, `batas_atas`) VALUES
('C01', 'Ketinggian', 0, 3000),
('C02', 'Suhu', 0, 50),
('C03', 'Curah Hujan', 0, 5000),
('C04', 'pH tanah', 0, 10),
('C05', 'Kedalaman Tanah', 0, 200),
('C06', 'Kelembaban', 0, 200),
('C07', 'Kedalaman Sulfidik', 0, 200),
('C08', 'Lereng', 0, 50),
('C09', 'Batuan Permukaan', 0, 100),
('C10', 'Singkapan Batuan', 0, 100),
('C11', 'Kesesuaian Lahan', 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif`
--

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`) USING BTREE;

--
-- Indexes for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD PRIMARY KEY (`id_aturan`) USING BTREE;

--
-- Indexes for table `tb_himpunan`
--
ALTER TABLE `tb_himpunan`
  ADD PRIMARY KEY (`kode_himpunan`) USING BTREE;

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`) USING BTREE;

--
-- Indexes for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD PRIMARY KEY (`ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=720;

--
-- AUTO_INCREMENT for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2022 at 12:32 AM
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
-- Database: `mamdani_mom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alternatif`
--

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alternatif`
--

INSERT INTO `tb_alternatif` (`kode_alternatif`, `nama_alternatif`, `total`, `rank`) VALUES
('A13', '8', NULL, NULL),
('A05', '5', NULL, NULL),
('A06', '6', NULL, NULL),
('A01', '1', NULL, NULL),
('A02', '2', NULL, NULL),
('A03', '3', NULL, NULL),
('A12', '7', NULL, NULL),
('A11', '4', NULL, NULL),
('A09', '9', NULL, NULL),
('A10', '10', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aturan`
--

INSERT INTO `tb_aturan` (`id_aturan`, `no_aturan`, `kode_kriteria`, `operator`, `kode_himpunan`) VALUES
(608, 1, 'C01', 'AND', 'C01-05'),
(609, 1, 'C02', 'AND', 'C02-03'),
(610, 1, 'C03', 'AND', 'C03-02'),
(611, 1, 'C04', 'AND', 'C04-01'),
(612, 2, 'C01', 'AND', 'C01-05'),
(613, 2, 'C02', 'AND', 'C02-03'),
(614, 2, 'C03', 'AND', 'C03-03'),
(615, 2, 'C04', 'AND', 'C04-01'),
(616, 3, 'C01', 'AND', 'C01-05'),
(617, 3, 'C02', 'AND', 'C02-03'),
(618, 3, 'C03', 'AND', 'C03-04'),
(619, 3, 'C04', 'AND', 'C04-01'),
(620, 4, 'C01', 'AND', 'C01-05'),
(621, 4, 'C02', 'AND', 'C02-04'),
(622, 4, 'C03', 'AND', 'C03-02'),
(623, 4, 'C04', 'AND', 'C04-01'),
(624, 5, 'C01', 'AND', 'C01-05'),
(625, 5, 'C02', 'AND', 'C02-04'),
(626, 5, 'C03', 'AND', 'C03-03'),
(627, 5, 'C04', 'AND', 'C04-01'),
(628, 6, 'C01', 'AND', 'C01-05'),
(629, 6, 'C02', 'AND', 'C02-04'),
(630, 6, 'C03', 'AND', 'C03-04'),
(631, 6, 'C04', 'AND', 'C04-01'),
(632, 7, 'C01', 'AND', 'C01-05'),
(633, 7, 'C02', 'AND', 'C02-05'),
(634, 7, 'C03', 'AND', 'C03-02'),
(635, 7, 'C04', 'AND', 'C04-01'),
(636, 8, 'C01', 'AND', 'C01-05'),
(637, 8, 'C02', 'AND', 'C02-05'),
(638, 8, 'C03', 'AND', 'C03-03'),
(639, 8, 'C04', 'AND', 'C04-01'),
(640, 9, 'C01', 'AND', 'C01-05'),
(641, 9, 'C02', 'AND', 'C02-05'),
(642, 9, 'C03', 'AND', 'C03-04'),
(643, 9, 'C04', 'AND', 'C04-01'),
(644, 10, 'C01', 'AND', 'C01-06'),
(645, 10, 'C02', 'AND', 'C02-03'),
(646, 10, 'C03', 'AND', 'C03-02'),
(647, 10, 'C04', 'AND', 'C04-01'),
(648, 11, 'C01', 'AND', 'C01-06'),
(649, 11, 'C02', 'AND', 'C02-03'),
(650, 11, 'C03', 'AND', 'C03-03'),
(651, 11, 'C04', 'AND', 'C04-01'),
(652, 12, 'C01', 'AND', 'C01-06'),
(653, 12, 'C02', 'AND', 'C02-03'),
(654, 12, 'C03', 'AND', 'C03-04'),
(655, 12, 'C04', 'AND', 'C04-01'),
(656, 13, 'C01', 'AND', 'C01-06'),
(657, 13, 'C02', 'AND', 'C02-04'),
(658, 13, 'C03', 'AND', 'C03-02'),
(659, 13, 'C04', 'AND', 'C04-01'),
(664, 15, 'C01', 'AND', 'C01-06'),
(665, 15, 'C02', 'AND', 'C02-04'),
(666, 15, 'C03', 'AND', 'C03-04'),
(667, 15, 'C04', 'AND', 'C04-01'),
(668, 16, 'C01', 'AND', 'C01-06'),
(669, 16, 'C02', 'AND', 'C02-05'),
(670, 16, 'C03', 'AND', 'C03-02'),
(671, 16, 'C04', 'AND', 'C04-01'),
(672, 17, 'C01', 'AND', 'C01-06'),
(673, 17, 'C02', 'AND', 'C02-05'),
(674, 17, 'C03', 'AND', 'C03-03'),
(675, 17, 'C04', 'AND', 'C04-01'),
(676, 18, 'C01', 'AND', 'C01-06'),
(677, 18, 'C02', 'AND', 'C02-05'),
(678, 18, 'C03', 'AND', 'C03-04'),
(679, 18, 'C04', 'AND', 'C04-01'),
(680, 19, 'C01', 'AND', 'C01-07'),
(681, 19, 'C02', 'AND', 'C02-03'),
(682, 19, 'C03', 'AND', 'C03-02'),
(683, 19, 'C04', 'AND', 'C04-01'),
(684, 20, 'C01', 'AND', 'C01-07'),
(685, 20, 'C02', 'AND', 'C02-03'),
(686, 20, 'C03', 'AND', 'C03-03'),
(687, 20, 'C04', 'AND', 'C04-01'),
(688, 21, 'C01', 'AND', 'C01-07'),
(689, 21, 'C02', 'AND', 'C02-03'),
(690, 21, 'C03', 'AND', 'C03-04'),
(691, 21, 'C04', 'AND', 'C04-01'),
(692, 22, 'C01', 'AND', 'C01-07'),
(693, 22, 'C02', 'AND', 'C02-04'),
(694, 22, 'C03', 'AND', 'C03-02'),
(695, 22, 'C04', 'AND', 'C04-01'),
(696, 23, 'C01', 'AND', 'C01-07'),
(697, 23, 'C02', 'AND', 'C02-04'),
(698, 23, 'C03', 'AND', 'C03-03'),
(699, 23, 'C04', 'AND', 'C04-01'),
(700, 24, 'C01', 'AND', 'C01-07'),
(701, 24, 'C02', 'AND', 'C02-04'),
(702, 24, 'C03', 'AND', 'C03-04'),
(703, 24, 'C04', 'AND', 'C04-01'),
(704, 25, 'C01', 'AND', 'C01-07'),
(705, 25, 'C02', 'AND', 'C02-05'),
(706, 25, 'C03', 'AND', 'C03-02'),
(707, 25, 'C04', 'AND', 'C04-01'),
(708, 26, 'C01', 'AND', 'C01-07'),
(709, 26, 'C02', 'AND', 'C02-05'),
(710, 26, 'C03', 'AND', 'C03-03'),
(711, 26, 'C04', 'AND', 'C04-01'),
(712, 27, 'C01', 'AND', 'C01-07'),
(713, 27, 'C02', 'AND', 'C02-05'),
(714, 27, 'C03', 'AND', 'C03-04'),
(715, 27, 'C04', 'AND', 'C04-01'),
(716, 28, 'C01', 'AND', 'C01-06'),
(717, 28, 'C02', 'AND', 'C02-04'),
(718, 28, 'C03', 'AND', 'C03-03'),
(719, 28, 'C04', 'AND', 'C04-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_himpunan`
--

CREATE TABLE `tb_himpunan` (
  `kode_himpunan` varchar(16) NOT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nama_himpunan` varchar(255) DEFAULT NULL,
  `n1` double DEFAULT NULL,
  `n2` double DEFAULT NULL,
  `n3` double DEFAULT NULL,
  `n4` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_himpunan`
--

INSERT INTO `tb_himpunan` (`kode_himpunan`, `kode_kriteria`, `nama_himpunan`, `n1`, `n2`, `n3`, `n4`) VALUES
('C01-05', 'C01', 'Rendah', 0, 15, 25, 28),
('C01-06', 'C01', 'Normal', 25, 28, 30, 33),
('C01-07', 'C01', 'Tinggi', 33, 40, 45, 50),
('C02-03', 'C02', 'Rendah', 0, 0, 1000, 1400),
('C02-04', 'C02', 'Normal', 1000, 1400, 1500, 2000),
('C02-05', 'C02', 'Tinggi', 1500, 2000, 2500, 3000),
('C03-02', 'C03', 'Rendah', 0, 0, 500, 650),
('C03-03', 'C03', 'Normal', 500, 650, 1000, 1500),
('C03-04', 'C03', 'Tinggi', 1000, 1500, 2500, 3000),
('C04-01', 'C04', 'Tidak Sesuai', 0, 30, 40, 50),
('C04-02', 'C04', 'Sesuai', 50, 60, 70, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `batas_bawah` double DEFAULT NULL,
  `batas_atas` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`kode_kriteria`, `nama_kriteria`, `batas_bawah`, `batas_atas`) VALUES
('C03', 'Ketinggian', 0, 3000),
('C02', 'Curah Hujan', 0, 3000),
('C01', 'Suhu', 0, 50),
('C04', 'Hasil', 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rel_alternatif`
--

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rel_alternatif`
--

INSERT INTO `tb_rel_alternatif` (`ID`, `kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
(238, 'A13', 'C04', 0),
(199, 'A05', 'C01', 20),
(200, 'A05', 'C02', 1700),
(237, 'A13', 'C03', 800),
(236, 'A13', 'C02', 1500),
(235, 'A13', 'C01', 24),
(194, 'A03', 'C04', 0),
(193, 'A03', 'C03', 1600),
(192, 'A03', 'C02', 1800),
(204, 'A06', 'C02', 1000),
(203, 'A06', 'C01', 35),
(202, 'A05', 'C04', 0),
(201, 'A05', 'C03', 800),
(188, 'A02', 'C02', 1600),
(187, 'A02', 'C01', 28),
(186, 'A01', 'C04', 0),
(183, 'A01', 'C01', 29),
(184, 'A01', 'C02', 1900),
(185, 'A01', 'C03', 2000),
(189, 'A02', 'C03', 900),
(190, 'A02', 'C04', 0),
(191, 'A03', 'C01', 31),
(205, 'A06', 'C03', 900),
(206, 'A06', 'C04', 0),
(229, 'A12', 'C03', 3000),
(228, 'A12', 'C02', 1400),
(227, 'A12', 'C01', 50),
(225, 'A11', 'C03', 1000),
(224, 'A11', 'C02', 800),
(223, 'A11', 'C01', 29),
(215, 'A09', 'C01', 22),
(216, 'A09', 'C02', 1700),
(217, 'A09', 'C03', 400),
(218, 'A09', 'C04', 0),
(219, 'A10', 'C01', 30),
(220, 'A10', 'C02', 1000),
(221, 'A10', 'C03', 1100),
(222, 'A10', 'C04', 0),
(226, 'A11', 'C04', 0),
(230, 'A12', 'C04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_alternatif`
--
ALTER TABLE `tb_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indexes for table `tb_aturan`
--
ALTER TABLE `tb_aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `tb_himpunan`
--
ALTER TABLE `tb_himpunan`
  ADD PRIMARY KEY (`kode_himpunan`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tb_rel_alternatif`
--
ALTER TABLE `tb_rel_alternatif`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

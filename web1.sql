-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 04:53 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `usename` varchar(25) NOT NULL,
  `password` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `kd_dosen` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kurikulum`
--

CREATE TABLE `tb_kurikulum` (
  `kd_kurikulum` varchar(10) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL,
  `kd_mk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(10) NOT NULL,
  `usename` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL,
  `referensi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_matakuliah`
--

CREATE TABLE `tb_matakuliah` (
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(30) NOT NULL,
  `sks` int(1) NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id` int(5) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `file` varchar(15) NOT NULL,
  `kd_mk` varchar(10) NOT NULL,
  `kd_prodi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `npm_mhs` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(5) NOT NULL,
  `nilai` int(3) NOT NULL,
  `npm_mhs` varchar(10) NOT NULL,
  `kd_mk` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `kd_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`usename`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`kd_dosen`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indexes for table `tb_kurikulum`
--
ALTER TABLE `tb_kurikulum`
  ADD PRIMARY KEY (`kd_kurikulum`),
  ADD KEY `kd_mk` (`kd_mk`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usename` (`usename`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indexes for table `tb_matakuliah`
--
ALTER TABLE `tb_matakuliah`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `nama_mk` (`nama_mk`),
  ADD KEY `kode_mk` (`kode_mk`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_mk` (`kd_mk`),
  ADD KEY `kd_prodi` (`kd_prodi`);

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`npm_mhs`),
  ADD KEY `npm_mhs` (`npm_mhs`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_mk` (`kd_mk`),
  ADD KEY `npm_mhs` (`npm_mhs`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD CONSTRAINT `tb_dosen_ibfk_1` FOREIGN KEY (`kd_dosen`) REFERENCES `tb_login` (`usename`),
  ADD CONSTRAINT `tb_dosen_ibfk_2` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`kd_prodi`);

--
-- Constraints for table `tb_kurikulum`
--
ALTER TABLE `tb_kurikulum`
  ADD CONSTRAINT `tb_kurikulum_ibfk_1` FOREIGN KEY (`kd_mk`) REFERENCES `tb_matakuliah` (`kode_mk`);

--
-- Constraints for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`kd_prodi`);

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`kd_mk`) REFERENCES `tb_matakuliah` (`kode_mk`),
  ADD CONSTRAINT `tb_materi_ibfk_2` FOREIGN KEY (`kd_prodi`) REFERENCES `tb_prodi` (`kd_prodi`);

--
-- Constraints for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD CONSTRAINT `tb_mhs_ibfk_1` FOREIGN KEY (`npm_mhs`) REFERENCES `tb_login` (`usename`);

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`npm_mhs`) REFERENCES `tb_mhs` (`npm_mhs`),
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`kd_mk`) REFERENCES `tb_matakuliah` (`kode_mk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

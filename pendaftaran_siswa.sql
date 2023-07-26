-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 07:04 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `kata_sandi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `kata_sandi`) VALUES
(1, 'nola', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `sekolah_asal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_siswa`
--

INSERT INTO `calon_siswa` (`id`, `nama`, `alamat`, `jenis_kelamin`, `agama`, `sekolah_asal`) VALUES
(1, 'Aurora', 'Pancoran Mas', 'perempuan', 'Islam', 'SMA'),
(2, 'Via', 'Sawangan', 'perempuan', 'Kristen', 'S1'),
(3, 'Diana', 'Parung', 'perempuan', 'Islam', 'D3'),
(4, 'Fulan', 'Cibinong', 'laki-laki', 'Islam', 'D4');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_ktp`
--

CREATE TABLE `identitas_ktp` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `goldar` varchar(5) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kode_pos` varchar(15) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL,
  `tgl_berlaku` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas_ktp`
--

INSERT INTO `identitas_ktp` (`id`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `goldar`, `alamat`, `provinsi`, `kota`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kode_pos`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `tgl_berlaku`) VALUES
(1, '1234567890123456', 'Aurora', 'Jakarta', '2001-08-17', 'perempuan', 'O', 'Panmas', 'Jawa Barat', 'Depok', '01', '23', 'Rangkapan Jaya', 'Pancoran Mas', '12345', 'Islam', 'Belum Kawin', 'Pelajar', 'WNI', 'Seumur Hidup'),
(2, '3286014704010007', 'Via', 'Depok', '2002-06-07', '', 'A', 'Puri Mas', 'Jawa Barat', 'Depok', '07', '10', 'Rangkapan Jaya Baru', 'Sawangan', '16430', 'Islam', 'Belum Kawin', 'Mahasiswa', 'WNI', 'Seumur Hidup');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identitas_ktp`
--
ALTER TABLE `identitas_ktp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `identitas_ktp`
--
ALTER TABLE `identitas_ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

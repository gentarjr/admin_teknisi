-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 07:01 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_teknisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_laporan`
--

CREATE TABLE `data_laporan` (
  `id` int(8) NOT NULL,
  `teknisi` varchar(255) NOT NULL,
  `nip` int(8) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `kode_perbaikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_laporan`
--

INSERT INTO `data_laporan` (`id`, `teknisi`, `nip`, `tanggal_kegiatan`, `nama_kegiatan`, `jam`, `kode_perbaikan`) VALUES
(3, 'AGENG', 14114487, '2018-10-29', 'DLL', '00:57', 'A3-INSTALASI'),
(39, 'GENTAR', 14587458, '2020-01-01', 'CASH', '16:11', 'A4-SETTINGS'),
(40, 'ANDRE', 14587459, '2020-01-08', 'MAINTENANCE', '17:35', 'A3-INSTALASI'),
(41, 'WIRA', 14141414, '2020-01-10', 'DLL', '16:15', 'A2-REJECT CARD'),
(42, 'MANCING', 14145854, '2020-01-20', 'DLL', '17:20', 'A2-REJECT CARD');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `id` int(8) NOT NULL,
  `nip` int(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengguna`
--

INSERT INTO `data_pengguna` (`id`, `nip`, `password`, `hak_akses`, `username`, `nama_lengkap`, `email`, `no_telp`, `divisi`) VALUES
(3, 14114483, '827ccb0eea8a706c4c34a16891f84e7b', 'ADMIN', 'GENTAR', 'GENTAR JR', 'GENTAR@GMAIL.COM', '02187878787', 'JARINGAN'),
(4, 14114484, '827ccb0eea8a706c4c34a16891f84e7b', 'USER', 'ANDRE', 'ANDRE SOETARDJO', 'andre@gmail.com', '02154545454', 'IT'),
(6, 12457896, '827ccb0eea8a706c4c34a16891f84e7b', 'ADMIN', 'AGENG', 'AGENG DWI M', 'AGENG@GMAIL.COM', '02136363636', 'JARINGAN');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_piket`
--

CREATE TABLE `jadwal_piket` (
  `id` int(8) NOT NULL,
  `teknisi` varchar(255) NOT NULL,
  `nip` int(8) NOT NULL,
  `jam` time NOT NULL,
  `shift` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_piket`
--

INSERT INTO `jadwal_piket` (`id`, `teknisi`, `nip`, `jam`, `shift`) VALUES
(3, 'BEJO 2', 14114485, '07:58:00', 'SIANG');

-- --------------------------------------------------------

--
-- Table structure for table `kinerja_teknisi`
--

CREATE TABLE `kinerja_teknisi` (
  `id` int(8) NOT NULL,
  `teknisi` varchar(255) NOT NULL,
  `nip` int(8) NOT NULL,
  `bulan` date NOT NULL,
  `predikat` varchar(255) NOT NULL,
  `waktu_mulai` varchar(255) NOT NULL,
  `waktu_selesai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kinerja_teknisi`
--

INSERT INTO `kinerja_teknisi` (`id`, `teknisi`, `nip`, `bulan`, `predikat`, `waktu_mulai`, `waktu_selesai`) VALUES
(28, 'gentar', 14114483, '2018-11-30', '63', '978382860', '978386640'),
(30, 'AGENG', 12457896, '2019-10-30', '60', '978310740', '978314340'),
(31, 'AGENG', 12457896, '2020-02-08', '2', '978307200', '978307320'),
(32, 'GENTAR', 14114483, '2018-11-30', '1', '978307260', '978307320');

-- --------------------------------------------------------

--
-- Table structure for table `kode_perbaikan`
--

CREATE TABLE `kode_perbaikan` (
  `id` int(8) NOT NULL,
  `kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_perbaikan`
--

INSERT INTO `kode_perbaikan` (`id`, `kegiatan`) VALUES
(2, 'A2-REJECT CARD'),
(3, 'A3-INSTALASI'),
(4, 'A4-SETTINGS'),
(5, 'A5-CARTRIDGE'),
(6, 'A1-FLM');

-- --------------------------------------------------------

--
-- Table structure for table `nama_kegiatan`
--

CREATE TABLE `nama_kegiatan` (
  `id` int(8) NOT NULL,
  `kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nama_kegiatan`
--

INSERT INTO `nama_kegiatan` (`id`, `kegiatan`) VALUES
(2, 'PERBAIKAN'),
(3, 'DLL'),
(4, 'CASH'),
(5, 'REJECT'),
(7, 'MAINTENANCE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_laporan`
--
ALTER TABLE `data_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `jadwal_piket`
--
ALTER TABLE `jadwal_piket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinerja_teknisi`
--
ALTER TABLE `kinerja_teknisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_perbaikan`
--
ALTER TABLE `kode_perbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nama_kegiatan`
--
ALTER TABLE `nama_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_laporan`
--
ALTER TABLE `data_laporan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal_piket`
--
ALTER TABLE `jadwal_piket`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kinerja_teknisi`
--
ALTER TABLE `kinerja_teknisi`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kode_perbaikan`
--
ALTER TABLE `kode_perbaikan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nama_kegiatan`
--
ALTER TABLE `nama_kegiatan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 08:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` char(90) NOT NULL,
  `password` char(90) NOT NULL,
  `nama` char(50) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `nama`, `level`) VALUES
(1, 'm.haviz', 'c73a38fcc9a0129d536ecde6be396e08', 'haviz', 'admin'),
(2, 'nico.naufal', '410ec15153a6dff0bed851467309bcbd', 'nico', 'admin'),
(3, 'rafly', '0cfeca41e1bf14cfae765b2edd2786b0', 'rafly', 'admin'),
(4, 'rahmah_kp', '8cdc83fd90096d80c152f09290b55d4e', 'rahmah', 'admin'),
(5, 'atta', '6175602e1163102318272b77a8e4be6d', 'atta', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jawaban`
--

CREATE TABLE `tbl_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `nik` char(90) NOT NULL,
  `benar` int(40) NOT NULL,
  `salah` int(40) NOT NULL,
  `kosong` int(40) NOT NULL,
  `nilai` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jawaban`
--

INSERT INTO `tbl_jawaban` (`id_jawaban`, `nik`, `benar`, `salah`, `kosong`, `nilai`) VALUES
(5, '17678889', 5, 5, 0, '50'),
(6, '111110988112000', 1, 9, 0, '10'),
(7, '111800766', 4, 6, 0, '40'),
(8, '3175012704090001', 4, 6, 0, '40'),
(9, '2147483647', 3, 7, 0, '30'),
(10, '456234', 1, 8, 1, '10'),
(11, '456234', 1, 8, 1, '10'),
(12, '456234', 1, 8, 1, '10'),
(13, '456234', 0, 0, 10, '0'),
(14, '456234', 0, 0, 10, '0'),
(15, '456234', 0, 0, 10, '0'),
(16, '456234', 0, 0, 10, '0'),
(17, '456234', 3, 7, 0, '30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id_register` int(11) NOT NULL,
  `nik` int(90) NOT NULL,
  `nama` char(90) NOT NULL,
  `tanggallahir` date NOT NULL,
  `usia` int(30) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` char(60) NOT NULL,
  `jk` enum('pria','wanita') NOT NULL,
  `status` enum('lajang','menikah') NOT NULL,
  `hasil_pemeriksaan` enum('negatif','positif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id_register`, `nik`, `nama`, `tanggallahir`, `usia`, `alamat`, `provinsi`, `jk`, `status`, `hasil_pemeriksaan`) VALUES
(10, 111800766, 'Alfa', '1999-06-15', 21, 'Purwokerto', 'Jawa Barat', 'pria', 'lajang', 'negatif'),
(12, 2147483647, 'Atha', '2001-06-01', 20, 'Jakarta', 'Dki Jakarta', 'pria', 'lajang', 'negatif'),
(13, 12235513, 'Rahmah Kusuma', '2001-03-12', 20, 'Jakarta\r\n', 'Dki Jakarta', 'wanita', 'lajang', 'negatif'),
(14, 456234, 'Muhammad Nico', '2000-05-14', 0, 'Jakarta', 'Dki Jakarta', 'pria', 'lajang', 'negatif');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` int(5) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL,
  `knc_jawaban` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `soal`, `a`, `b`, `c`, `d`, `knc_jawaban`, `gambar`, `tanggal`, `aktif`) VALUES
(9, 'Apa Nama Arti Nama Corona Dalam Bahasa Indonesia?', 'Mahkota ', 'Virus', 'Batuk', 'Infeksi', 'b', '', '0000-00-00', 'Y'),
(10, 'COVID-19 merupakan singkatan dari Coronavirus Diseases 2019 yang menyerang manusia muncul di negara ... pada awal  tahun 2019.', 'Cina', 'Italia', 'Amerika', 'Indonesia', 'a', '', '0000-00-00', 'Y'),
(11, 'COVID-19 bisa masuk melalui anggota-anggota tubuh di bawah ini, kecuali...', 'Mata', 'Hidung', 'Mulut', 'Telinga', 'd', '', '0000-00-00', 'Y'),
(12, 'Dibawah ini adalah media penyebaran virus Corona, kecuali....', 'Diam di rumah', 'Udara', 'Percikan batuk dan bersin', 'Benda-benda Padat', 'a', '', '0000-00-00', 'Y'),
(13, 'Berikut ini merupakan cara mencuci tangan yang paling baik, kecuali....', 'Sabun dan air bersih', 'Handsanitizer', 'Tisu Basah', 'Air kolam', 'a', '', '0000-00-00', 'Y'),
(14, 'Cara bersin yang baik dan beretika yaitu..', 'Menggunakan lengan', 'Menutup mulut', 'Semua jawaban benar', 'Menutup hidung', 'c', '', '0000-00-00', 'Y'),
(15, 'Berikut ini  termasuk gejala COVID-19, kecuali....', 'Cacar', 'Demam', 'Sakit Tenggorokan', 'Pilek', 'a', '', '0000-00-00', 'Y'),
(16, 'Peran serta masyarakat diperlukan untuk mencegah COVID-19 semakin menyebar dengan....', 'Berada di kerumunan', 'Tetap diam di rumah ', 'Tidak memakai masker', 'Keluar rumah\r\n', 'b', '', '0000-00-00', 'Y'),
(17, 'Suhu tubuh yang bisa diindikasikan terinfeksi COVID-19 yaitu...', '35 derajat Celcius', '36 derajat Celcius', '37 derajat Celcius', '34 derajat Celcius', 'c', '', '0000-00-00', 'Y'),
(18, 'Hal yang harus dihindari agar tidak terinfeksi COVID-19 adalah....', 'Mencuci tangan', 'Menjaga jarak', 'Memakai masker', 'Jangan sering menyentuh muka', 'd', '', '0000-00-00', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id_register`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

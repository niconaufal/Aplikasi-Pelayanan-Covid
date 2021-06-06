-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 03:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'fadil', 'user');

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
(7, '111800766', 4, 6, 0, '40');

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
(1, 17678889, 'andi', '2021-05-13', 0, 'Aceh', 'Aceh', 'pria', 'lajang', 'positif'),
(3, 1111, 'hafitNI@gmail.com', '2021-05-12', 0, 'Kalimantan Utara', 'Kalimantan Utara', 'pria', 'lajang', 'negatif'),
(4, 1117889900, 'Andto', '2000-02-08', 0, 'Pemalang', 'Jawa Tengah', 'pria', 'lajang', 'negatif'),
(5, 118890, 'hafitNI@gmail.com', '1999-04-30', 0, 'medan', 'Sumatera Utara', 'pria', 'lajang', 'negatif'),
(6, 1178899765, 'Agus', '1998-05-11', 0, 'Palembang', 'Sumatera Selatan', 'pria', 'lajang', 'negatif'),
(7, 7865111, 'reza', '1997-10-04', 0, 'Bengkulu', 'Bengkulu', 'pria', 'lajang', 'negatif'),
(9, 67888999, 'Nico', '2006-02-15', 0, '', 'Sumatera Selatan', 'pria', 'lajang', 'negatif'),
(10, 111800766, 'Alfa', '1999-06-15', 0, 'Purwokerto', 'Jawa Barat', 'pria', 'lajang', 'negatif'),
(11, 6678888, 'faa', '2021-06-23', 0, 'Langsa', 'Riau', 'pria', 'lajang', 'negatif');

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
(9, 'Apa Nama Arti Nama Corona Dalam Bahasa Indonesia', 'Mahkota ', 'Virus', 'Batuk', 'Infeksi', 'b', '', '0000-00-00', 'Y'),
(10, 'CPU Merupakan Singkatan dari Virus Corona (COVID-19) yang menyerang manusia muncul di negara ... pada awal  tahun 2020.', 'Cina', 'Italia', 'Amerika', 'Indonesia', 'c', '', '0000-00-00', 'Y'),
(11, ' COVID-19 bisa masuk melalui anggota-anggota tubuh di bawah ini, kecuali...', 'Mata', 'Hidung', 'Mulut', 'Telinga', 'c', '', '0000-00-00', 'Y'),
(12, 'Dibawah ini adalah media penyebaran virus Corona, kecuali....', 'Bersalaman/Sentuhan tangan', 'Udara', 'Percikan batuk dan bersin', 'Benda-benda Padat', 'a', '', '0000-00-00', 'Y'),
(13, 'Cuci tangan yang paling baik dilakukan dengan menggunakan sabun pada...', 'Air mengalir', 'Air dalam wadah', 'Air kolam', 'Air hangat', 'd', '', '0000-00-00', 'Y'),
(14, ' Cara bersin yang baik dan beretika yaitu....', 'jaga jarak', 'Tutup Hidung', 'pakai Masker', 'Bersin sembarangan', 'b', '', '0000-00-00', 'Y'),
(15, 'Berikut yang bukan termasuk alat output adalah...?', 'keyboard', 'speaker', 'monitor', 'printer', 'a', '', '0000-00-00', 'Y'),
(16, 'Peran serta masyarakat diperlukan untuk mencegah COVID-19 semakin menyebar dengan', 'Menjalankan pola hidup bersih', 'Tetap diam di rumah ', 'Banyak makan dan minum', 'Keluar rumah\r\n', 'c', '', '0000-00-00', 'Y'),
(17, 'Suhu tubuh yang bisa diindikasikan sedang terjangkit penyakit termasuk COVID-19 yaitu...', '35 0C', '36 0C', '37 0C', '38 0C', 'b', '', '0000-00-00', 'Y'),
(18, 'Virus corona (COVID-19) dibawa oleh hewan... dan menular kepada manusia', 'Burung', 'Itik', 'Kelelawar', 'Ayam', 'c', '', '0000-00-00', 'Y');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

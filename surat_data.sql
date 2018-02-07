-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 04:26 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara`
--

CREATE TABLE `berita_acara` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `pemberi` varchar(300) NOT NULL,
  `penerima` varchar(300) NOT NULL,
  `inisial` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jenis` enum('masuk','keluar','kpts','kuasa','kontrak','edaran','direksi','ba','mou','nd_direk','nd_dirut','nd_dirkeu') NOT NULL,
  `folder` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_surat`, `gambar`, `jenis`, `folder`) VALUES
(1, 1, '1-surat-keluar-0.jpg', 'keluar', '0'),
(2, 1, '1-surat-keluar-1.jpg', 'keluar', '0'),
(3, 2, '2-surat-keluar-0.jpg', 'keluar', '0'),
(4, 2, '2-surat-keluar-2.jpg', 'keluar', '0'),
(5, 2, '2-surat-keluar-3.jpg', 'keluar', '0'),
(6, 3, '3-surat-masuk-0.jpg', 'masuk', '0'),
(7, 4, '4-surat-masuk-0.jpg', 'masuk', '0'),
(8, 2, '2-surat-masuk-0.jpg', 'masuk', '0'),
(9, 2, '2-surat-masuk-2.jpg', 'masuk', '0'),
(10, 2, '2-surat-masuk-3.jpg', 'masuk', '0'),
(11, 2, '2-surat-masuk-4.jpg', 'masuk', '0'),
(12, 2, '2-surat-masuk-6.jpg', 'masuk', '0'),
(13, 2, '2-surat-masuk-7.jpg', 'masuk', '0'),
(14, 2, '2-surat-masuk-7.jpg', 'masuk', '0'),
(15, 2, '2-surat-masuk-9.jpg', 'masuk', '0'),
(16, 2, '2-surat-masuk-10.jpg', 'masuk', '0'),
(17, 2, '2-surat-masuk-11.jpg', 'masuk', '0'),
(18, 2, '2-surat-masuk-13.jpg', 'masuk', '0'),
(19, 2, '2-surat-masuk-14.jpg', 'masuk', '0'),
(20, 1, '1-surat-masuk-0.jpg', 'masuk', '0'),
(21, 1, '1-surat-masuk-1.jpg', 'masuk', '0'),
(22, 1, '1-surat-masuk-3.jpg', 'masuk', '0'),
(23, 7, '7-surat-masuk-0.jpg', 'masuk', '0'),
(24, 7, '7-surat-masuk-2.jpg', 'masuk', '0'),
(25, 7, '7-surat-masuk-3.jpg', 'masuk', '0'),
(26, 7, '7-surat-masuk-4.jpg', 'masuk', '0'),
(27, 7, '7-surat-masuk-5.jpg', 'masuk', '0'),
(28, 7, '7-surat-masuk-7.jpg', 'masuk', '0'),
(29, 8, '8-surat-masuk-0.jpg', 'masuk', '0'),
(30, 8, '8-surat-masuk-2.jpg', 'masuk', '0'),
(31, 8, '8-surat-masuk-3.jpg', 'masuk', '0'),
(32, 8, '8-surat-masuk-4.jpg', 'masuk', '0'),
(33, 8, '8-surat-masuk-5.jpg', 'masuk', '0'),
(34, 8, '8-surat-masuk-6.jpg', 'masuk', '0'),
(35, 9, '9-surat-masuk-0.jpg', 'masuk', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mou`
--

CREATE TABLE `mou` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `pemberi` varchar(300) NOT NULL,
  `penerima` varchar(300) NOT NULL,
  `inisial` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nd_dirkeu`
--

CREATE TABLE `nd_dirkeu` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `kepada` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nd_dirtek`
--

CREATE TABLE `nd_dirtek` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `kepada` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nd_dirut`
--

CREATE TABLE `nd_dirut` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `kepada` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_edaran`
--

CREATE TABLE `s_edaran` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `pemberi` varchar(300) NOT NULL,
  `kepada` varchar(300) NOT NULL,
  `inisial` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_keluar`
--

CREATE TABLE `s_keluar` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `kepada` varchar(300) NOT NULL,
  `tembusan` varchar(300) NOT NULL,
  `inisial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_keluar`
--

INSERT INTO `s_keluar` (`id_surat`, `no_surat`, `tanggal`, `perihal`, `kepada`, `tembusan`, `inisial`) VALUES
(1, '123', '2018-01-02', '123', '123', '123', '123'),
(2, '134', '2018-01-03', '142', '142', '142', '142');

-- --------------------------------------------------------

--
-- Table structure for table `s_kontrak`
--

CREATE TABLE `s_kontrak` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `pemberi` varchar(300) NOT NULL,
  `penerima` varchar(300) NOT NULL,
  `kepada` varchar(300) NOT NULL,
  `inisial` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_kpts`
--

CREATE TABLE `s_kpts` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `pemberi` varchar(300) NOT NULL,
  `penerima` varchar(300) NOT NULL,
  `kepada` varchar(300) NOT NULL,
  `inisial` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_kuasa`
--

CREATE TABLE `s_kuasa` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL,
  `pemberi` varchar(300) NOT NULL,
  `penerima` varchar(300) NOT NULL,
  `kepada` varchar(300) NOT NULL,
  `inisial` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_masuk`
--

CREATE TABLE `s_masuk` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` text NOT NULL,
  `pemberi` varchar(100) NOT NULL,
  `kepada` varchar(100) NOT NULL,
  `status_disposisi_1` enum('0','1','2','3') NOT NULL,
  `disdirut` varchar(300) NOT NULL,
  `status_disposisi_2` enum('0','1') NOT NULL,
  `disdirkeu` varchar(300) NOT NULL,
  `status_disposisi_3` enum('0','1') NOT NULL,
  `disdirtek` varchar(300) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_masuk`
--

INSERT INTO `s_masuk` (`id_surat`, `no_surat`, `tanggal_terima`, `tanggal_surat`, `perihal`, `pemberi`, `kepada`, `status_disposisi_1`, `disdirut`, `status_disposisi_2`, `disdirkeu`, `status_disposisi_3`, `disdirtek`, `status`) VALUES
(4, '11111', '2018-01-31', '2018-01-31', '111', '111', '111', '2', '2', '0', '', '0', '', '1'),
(5, '2222', '2018-02-22', '2018-02-23', '2222', '232', '222', '1', '1', '0', '', '0', '', '1'),
(6, '33333', '2018-02-01', '2018-02-07', '33333', '33333', '3333', '3', '3', '1', '333', '1', '333', '2'),
(7, '44444', '2018-02-10', '2018-02-21', '4444', '4444', '4444', '3', '555', '0', '', '1', '444', '1'),
(8, '123123', '2018-01-16', '2018-02-08', '2312', '3123', '123123', '0', '', '0', '', '0', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `s_perintah_direksi`
--

CREATE TABLE `s_perintah_direksi` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `perihal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `level` enum('sekertaris','umum','dirkeu','dirtek','dirut') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `level`) VALUES
(1, '123@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin', 'sekertaris'),
(2, 'dirkeu@gmail.com', '202cb962ac59075b964b07152d234b70', 'Direktur Keuangan', 'dirkeu'),
(3, 'dirut@gmail.com', '202cb962ac59075b964b07152d234b70', 'Direktur Utama', 'dirut'),
(4, 'dirtek@gmail.com', '202cb962ac59075b964b07152d234b70', 'Direktur Teknik', 'dirtek'),
(5, 'umum@gmail.com', '202cb962ac59075b964b07152d234b70', 'Umum', 'umum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `mou`
--
ALTER TABLE `mou`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `nd_dirkeu`
--
ALTER TABLE `nd_dirkeu`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `nd_dirtek`
--
ALTER TABLE `nd_dirtek`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `nd_dirut`
--
ALTER TABLE `nd_dirut`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `s_edaran`
--
ALTER TABLE `s_edaran`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `s_keluar`
--
ALTER TABLE `s_keluar`
  ADD PRIMARY KEY (`id_surat`),
  ADD UNIQUE KEY `no_surat` (`no_surat`);

--
-- Indexes for table `s_kontrak`
--
ALTER TABLE `s_kontrak`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `s_kpts`
--
ALTER TABLE `s_kpts`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `s_kuasa`
--
ALTER TABLE `s_kuasa`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `s_masuk`
--
ALTER TABLE `s_masuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `s_perintah_direksi`
--
ALTER TABLE `s_perintah_direksi`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `mou`
--
ALTER TABLE `mou`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `s_edaran`
--
ALTER TABLE `s_edaran`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `s_keluar`
--
ALTER TABLE `s_keluar`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `s_kontrak`
--
ALTER TABLE `s_kontrak`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `s_kpts`
--
ALTER TABLE `s_kpts`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `s_kuasa`
--
ALTER TABLE `s_kuasa`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `s_masuk`
--
ALTER TABLE `s_masuk`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

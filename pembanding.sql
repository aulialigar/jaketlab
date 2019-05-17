-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 12:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembanding`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_hakakses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `id_hakakses`) VALUES
(1607, 'fachryf', 'fachry07', 3),
(1608, 'aulialigar', 'aulia18', 2),
(1609, 'putrisrsh', 'putri16', 1),
(1611, 'admin', 'admin', 1),
(1612, 'as', 'as', 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga`) VALUES
(1, 'Jaket Lab Abu Abu', 0, 150000),
(2, 'Jaket Lab Hitam', 12, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` bigint(16) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `pass`, `nama_mhs`, `jenis_kelamin`, `no_telp`, `alamat`) VALUES
(1, 1, 'a', 'aaaa', '2', '089', 'jl raya'),
(188, 201810370311188, 'jalu188', 'Jalu Nusantoro', 'L', '082142738891', 'Jl. Karya Wiguna'),
(201, 201810370311201, 'tutus201', 'Bariyatus Diyah Nurlaili', 'P', '085853631078', 'Jl. Tirto Utomo'),
(206, 201810370311206, 'andika206', 'Andika Surya Listya Yudhana', 'L', '081216225880', 'Jl. Belakang RSSA'),
(210, 201810370311217, 'wiencantik', 'Wien Nurul Dewani', 'P', '08565181631', 'Jl. Tirto Utomo'),
(219, 201810370311219, 'piti219', 'Annisa Fitria Nurjannah', 'P', '081999939599', 'Jl. Tirto Utomo'),
(223, 201810370311223, 'riya223', 'Nuriya Mulyati', 'P', '082248576084', 'Jl. Tirto Utomo'),
(225, 201810370311225, 'hanif226', 'Hanif Varianto Warman', 'L', '082234572119', 'Perum. Bukit Cemara Tujuh'),
(230, 201810370311230, 'faldo230', 'Faldo Fajri Afrinanto', 'L', '082234694154', 'Jl. S. Supriadi '),
(231, 201810370311918, 'as', 'Aaaa', 'P', '08555555555555', 'Jl. Danau Ranau');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jml` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bukti` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `id_mahasiswa`, `id_barang`, `tgl`, `jml`, `total`, `bukti`, `keterangan`, `status`) VALUES
(111, 188, 1, '2019-05-08', 2, 300000, '', 'aaa', 'PROSES');

-- --------------------------------------------------------

--
-- Table structure for table `trans_temp`
--

CREATE TABLE `trans_temp` (
  `id_temp` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `trans_temp`
--
ALTER TABLE `trans_temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1613;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `trans_temp`
--
ALTER TABLE `trans_temp`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

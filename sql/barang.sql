-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2016 at 11:23 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) NOT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `spesifikasi` text,
  `satuan` varchar(255) NOT NULL,
  `gambar` text,
  `hargaPasar` double NOT NULL,
  `biayaKirim` double NOT NULL,
  `resitensi` double NOT NULL,
  `ppn` double NOT NULL,
  `hargashsb` double NOT NULL,
  `keterangan` text,
  `popularitas` int(11) DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL,
  `createdBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='5';

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `nama`, `merk`, `ukuran`, `tipe`, `spesifikasi`, `satuan`, `gambar`, `hargaPasar`, `biayaKirim`, `resitensi`, `ppn`, `hargashsb`, `keterangan`, `popularitas`, `createdAt`, `updateAt`, `createdBy`, `updateBy`) VALUES
(1, 1, 'Komputer', 'Acer', '12', 'AAA', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum, dolorem?', 'cm', 'img-01112016110430.png', 1, 1, 1, 1, 1, NULL, 0, '2016-11-01 04:04:31', NULL, 1, NULL),
(2, 2, 'Layar', 'Dell', '12', '123DES', '', 'cm', NULL, 1000, 1000, 1000, 10, 1000, NULL, 0, '2016-11-01 04:21:25', NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

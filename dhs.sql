-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Okt 2016 pada 12.24
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

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
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
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
  `keterangan` text NOT NULL,
  `popularitas` int(11) DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL,
  `createdBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `hargaSatuan` int(11) NOT NULL,
  `hargaPokok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='5';

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `kode_barang`, `nama`, `merk`, `ukuran`, `tipe`, `spesifikasi`, `satuan`, `gambar`, `hargaPasar`, `biayaKirim`, `resitensi`, `ppn`, `hargashsb`, `keterangan`, `popularitas`, `createdAt`, `updateAt`, `createdBy`, `updateBy`, `hargaSatuan`, `hargaPokok`) VALUES
(5, 1, '', 'Laptop', 'Macbook', '', 'PRO 2016', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 0, '2016-10-20 18:56:18', NULL, 1, NULL, 0, 0),
(7, 2, '', 'Microsoft Office', 'Office 2016', '', 'Office Tool', '', '', '', 0, 0, 0, 0, 0, '', 5, '2016-10-17 10:13:48', NULL, 1, NULL, 0, 0),
(8, 1, '05.18.01.03.02', 'Bhan perunggu diameter 80 cm', 'buah', '', 'PRO 2016', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 0, '0000-00-00 00:00:00', NULL, 1, NULL, 9, 9),
(9, 2, '05.18.01.03.02', 'Bhan perunggu diameter 85 cm', 'buah', '', 'PRO 2017', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 11, 11),
(10, 2, '05.18.01.03.02', 'Bhan perunggu diameter 90 cm', 'buah', '', 'PRO 2018', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 13, 13),
(11, 2, '05.18.01.03.02', 'Bhan perunggu diameter 100 cm', 'buah', '', 'PRO 2019', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 18, 18),
(12, 2, '05.18.01.03.02', 'Bhan perunggu diameter 105 cm', 'buah', '', 'PRO 2020', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 24, 24),
(13, 2, '05.18.01.03.02', 'Bahan kuningan diameter 80 cm', 'buah', '', 'PRO 2021', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 7, 7),
(14, 2, '05.18.01.03.02', 'Bahan kuningan diameter 90 cm', 'buah', '', 'PRO 2022', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 9, 9),
(15, 2, '05.18.01.03.02', 'Bahan kuningan diameter 100cm', 'buah', '', 'PRO 2023', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 12, 12),
(16, 2, '05.18.01.03.02', 'Bahan kuningan diameter 115cm', 'buah', '', 'PRO 2024', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 17, 17),
(17, 2, '05.18.01.03.02', 'Bahan besi diameter 90 cm', 'buah', '', 'PRO 2025', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 1),
(18, 2, '05.18.01.03.02', 'Bahan besi diameter 110 cm', 'buah', '', 'PRO 2026', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 1),
(19, 2, '05.18.01.03.02', 'Bahan besi diameter 105 cm', 'buah', '', 'PRO 2027', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 2, 2),
(20, 2, '05.18.01.03.02', '', '', '', 'PRO 2028', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(21, 2, '05.18.01.03.02', 'Batangan Nongko (Uk.Besar) Pnjng : 68 cm Diameter : 32 cm', 'buah', '', 'PRO 2029', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(22, 2, '05.18.01.03.02', 'Ketipung Nongko Panjang : 65 cm Diameter : 32 cm', 'buah', '', 'PRO 2030', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 703, 0),
(23, 2, '05.18.01.03.02', 'Ketipung Warna Panjang : 65 cm Diameter : 35 cm', 'buah', '', 'PRO 2031', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 937, 0),
(24, 2, '05.18.01.03.02', 'Bem Nongko Panjang : 75 cm Lebar : 25 cm tinggi : 29 cm', 'buah', '', 'PRO 2032', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(25, 2, '05.18.01.03.02', '', '', '', 'PRO 2033', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(26, 2, '05.18.01.03.02', 'Rebab Panjang : 70 cm', 'buah', '', 'PRO 2034', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 375, 0),
(27, 2, '05.18.01.03.02', 'Ancer Rebab Panjang : 30 cm ', 'buah', '', 'PRO 2035', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 520, 0),
(28, 2, '05.18.01.03.02', '', '', '', 'PRO 2036', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(29, 2, '05.18.01.03.02', 'Siter Barang Kotak Tutup Bolak-Balik Panjang : 35 cm Lbr : 25 cm ', 'buah', '', 'PRO 2037', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 500, 0),
(30, 2, '05.18.01.03.02', 'Siter Peking Ukir Samping Cat Panjang : 45 cm Lebar : 25 cm ', 'buah', '', 'PRO 2038', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 650, 0),
(31, 2, '05.18.01.03.02', 'Siter Kotak Barang Besar Panjang : 55 cm Lebar : 25 cm', 'buah', '', 'PRO 2039', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 375, 0),
(32, 2, '05.18.01.03.02', '', '', '', 'PRO 2040', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(33, 2, '05.18.01.03.02', 'Perunggu  ', 'bh (P/S)', '', 'PRO 2041', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 3, 0),
(34, 2, '05.18.01.03.02', 'Kuningan', 'bh (P/S)', '', 'PRO 2042', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 2, 0),
(35, 2, '05.18.01.03.02', 'Besi', 'bh (P/S)', '', 'PRO 2043', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 650, 0),
(36, 2, '05.18.01.03.02', '', '', '', 'PRO 2044', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(37, 2, '05.18.01.03.02', 'Perunggu  ', 'bh (P/S)', '', 'PRO 2045', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 3, 0),
(38, 2, '05.18.01.03.02', 'Kuningan', 'bh (P/S)', '', 'PRO 2046', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 2, 0),
(39, 2, '05.18.01.03.02', 'besi', 'bh (P/S)', '', 'PRO 2047', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 750, 0),
(40, 2, '05.18.01.03.02', '', '', '', 'PRO 2048', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(41, 2, '05.18.01.03.02', 'Perunggu  ', 'bh(S)w 8', '', 'PRO 2049', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 5, 0),
(42, 2, '05.18.01.03.02', 'Kuningan', 'bh(P)wi 7', '', 'PRO 2050', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 3, 0),
(43, 2, '05.18.01.03.02', 'Besi', '', '', 'PRO 2051', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(44, 2, '05.18.01.03.02', '', '', '', 'PRO 2052', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(45, 2, '05.18.01.03.02', 'Saron Demung Perunggu Super', 'bh(S)w 9', '', 'PRO 2053', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 9, 0),
(46, 2, '05.18.01.03.02', 'Saron Peking Perunggu Super', 'bh(S)w 9', '', 'PRO 2054', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 4, 0),
(47, 2, '05.18.01.03.02', 'Saron Ricik 7 Bilah Perunggu Super', '', '', 'PRO 2055', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 5, 0),
(48, 2, '05.18.01.03.02', '', '', '', 'PRO 2056', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(49, 2, '05.18.01.03.02', 'Bahan perunggu', 'bh(S)w 8', '', 'PRO 2057', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 2, 0),
(50, 2, '05.18.01.03.02', 'Bahan besi', 'bh(S)w 9', '', 'PRO 2058', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 650, 0),
(51, 2, '05.18.01.03.02', 'Bahan Kuningan', 'bh(P)wi 7', '', 'PRO 2059', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(52, 2, '05.18.01.03.02', '', '', '', 'PRO 2060', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(53, 2, '05.18.01.03.02', 'Perunggu  ', 'bh(S)w 8', '', 'PRO 2061', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 8, 0),
(54, 2, '05.18.01.03.02', 'Perunggu  ', 'bh(P)wi 7', '', 'PRO 2062', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 6, 0),
(55, 2, '05.18.01.03.02', '', '', '', 'PRO 2063', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(56, 2, '05.18.01.03.02', 'Gambang rancak', 'buah (S) ', '', 'PRO 2064', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 750, 0),
(57, 2, '05.18.01.03.02', 'Tempat gambang', 'buah (P) ', '', 'PRO 2065', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 2, 0),
(58, 2, '05.18.01.03.02', 'Gambang Lawasan', 'buah', '', 'PRO 2066', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(59, 2, '05.18.01.03.02', '', '', '', 'PRO 2067', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(60, 2, '05.18.01.03.02', 'Perunggu  ', 'buah (S) ', '', 'PRO 2068', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 3, 0),
(61, 2, '05.18.01.03.02', 'Kuningan', 'buah (P) ', '', 'PRO 2069', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(62, 2, '05.18.01.03.02', 'Besi', 'buah (PB) ', '', 'PRO 2070', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(63, 2, '05.18.01.03.02', 'Tempat Gender Barung', '', '', 'PRO 2071', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(64, 2, '05.18.01.03.02', '', '', '', 'PRO 2072', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(65, 2, '05.18.01.03.02', 'Perunggu  ', 'buah', '', 'PRO 2073', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 2, 0),
(66, 2, '05.18.01.03.02', 'Kuningan', 'buah', '', 'PRO 2074', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(67, 2, '05.18.01.03.02', 'Besi', 'buah', '', 'PRO 2075', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(68, 2, '05.18.01.03.02', 'Tempat Genderpenerus', '', '', 'PRO 2076', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(69, 2, '05.18.01.03.02', '', '', '', 'PRO 2077', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(70, 2, '05.18.01.03.02', 'Perunggu  ', 'buah', '', 'PRO 2078', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 950, 0),
(71, 2, '05.18.01.03.02', 'Kuningan', 'buah', '', 'PRO 2079', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 630, 0),
(72, 2, '05.18.01.03.02', 'Besi', 'buah', '', 'PRO 2080', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 150, 0),
(73, 2, '05.18.01.03.02', 'Tempat bonang', 'buah', '', 'PRO 2081', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(74, 2, '', '', '', '', 'PRO 2082', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(75, 2, '05.18.01.03.03', '', '', '', 'PRO 2083', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(76, 2, '05.18.01.03.03', '', '', '', 'PRO 2084', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(77, 2, '05.18.01.03.03', 'Super Quality Jumbo (13Pcs)', 'unit', '', 'PRO 2085', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 2, 0),
(78, 2, '05.18.01.03.03', 'Standar', 'unit', '', 'PRO 2086', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(79, 2, '05.18.01.03.03', '', '', '', 'PRO 2087', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(80, 2, '05.18.01.03.03', 'Hadroh Habib Syech Jepara', 'unit', '', 'PRO 2088', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 4, 0),
(81, 2, '05.18.01.03.03', 'Standar,  Kualitas Jepara, Kayu Mahoni   ', 'unit', '', 'PRO 2089', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(82, 2, '', '', '', '', 'PRO 2090', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(83, 2, '05.18.01.04', '', '', '', 'PRO 2091', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(84, 2, '05.18.01.04.02', '', '', '', 'PRO 2092', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(85, 2, '05.18.01.04.02', '', '', '', 'PRO 2093', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(86, 2, '05.18.01.04.02', 'Mikasa MV2200', 'buah', '', 'PRO 2094', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 439, 0),
(87, 2, '05.18.01.04.02', 'Mikasa MV2200G', 'buah', '', 'PRO 2095', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 439, 0),
(88, 2, '05.18.01.04.02', 'Molten V5M27', 'buah', '', 'PRO 2096', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 220, 0),
(89, 2, '05.18.01.04.02', ' Molten V5M35', 'buah', '', 'PRO 2097', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 270, 0),
(90, 2, '05.18.01.04.02', '', '', '', 'PRO 2098', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(91, 2, '05.18.01.04.02', 'Mikasa VLS300                                 BEACH VOLLEYBALL ', 'buah', '', 'PRO 2099', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 819, 0),
(92, 2, '05.18.01.04.02', 'Molten BV5000', 'buah', '', 'PRO 2100', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 580, 0),
(93, 2, '05.18.01.04.02', '', '', '', 'PRO 2101', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(94, 2, '05.18.01.04.02', 'PROTEAM ', 'buah', '', 'PRO 2102', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 165, 0),
(95, 2, '05.18.01.04.02', 'OEM SHEN SHEN ', 'buah', '', 'PRO 2103', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 200, 0),
(96, 2, '05.18.01.04.02', 'Mitzuda VN 285', 'buah', '', 'PRO 2104', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 575, 0),
(97, 2, '05.18.01.04.02', 'GTO', 'buah', '', 'PRO 2105', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 145, 0),
(98, 2, '05.18.01.04.03', '', '', '', 'PRO 2106', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(99, 2, '05.18.01.04.03', '', '', '', 'PRO 2107', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(100, 2, '05.18.01.04.03', 'DUNLOP Fort ALL Court 4', 'slop', '', 'PRO 2108', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 85, 0),
(101, 2, '05.18.01.04.03', 'YONEX TOUR 3', 'slop', '', 'PRO 2109', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 90, 0),
(102, 2, '05.18.01.04.03', '', '', '', 'PRO 2110', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(103, 2, '05.18.01.04.03', 'GTO TN50S Super', 'buah', '', 'PRO 2111', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 825, 0),
(104, 2, '', '', '', '', 'PRO 2112', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(105, 2, '05.18.01.04.05', '', '', '', 'PRO 2113', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(106, 2, '05.18.01.04.05', '', '', '', 'PRO 2114', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(107, 2, '05.18.01.04.05', 'MIKASA VOLARE II ', 'buah', '', 'PRO 2115', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 399, 0),
(108, 2, '05.18.01.04.05', 'MIKASA FOOTBALL FX5', 'buah', '', 'PRO 2116', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 469, 0),
(109, 2, '05.18.01.04.05', 'Molten F5R', 'buah', '', 'PRO 2117', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 110, 0),
(110, 2, '05.18.01.04.05', 'MOLTEN SOCCERBALL F5V1500', 'buah', '', 'PRO 2118', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 210, 0),
(111, 2, '05.18.01.04.05', '', '', '', 'PRO 2119', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(112, 2, '05.18.01.04.05', 'Bahan Polyester 138D                                       Standar FIFA/PSSI', 'buah', '', 'PRO 2120', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(113, 2, '05.18.01.04.06', '', '', '', 'PRO 2121', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(114, 2, '05.18.01.04.06', '', '', '', 'PRO 2122', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(115, 2, '05.18.01.04.06', 'Yonex Duora 10 LCW? ', 'buah', '', 'PRO 2123', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 2, 0),
(116, 2, '05.18.01.04.06', 'Yonex Basic Racquet GR-340', 'buah', '', 'PRO 2124', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 169, 0),
(117, 2, '05.18.01.04.06', 'Yonex Muscle Power 2', 'buah', '', 'PRO 2125', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 199, 0),
(118, 2, '05.18.01.04.06', 'Yonex ArcSaber 001', 'buah', '', 'PRO 2126', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 520, 0),
(119, 2, '05.18.01.04.06', 'Yonex Carbonex 6000 DF', 'buah', '', 'PRO 2127', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 249, 0),
(120, 2, '05.18.01.04.06', '', '', '', 'PRO 2128', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(121, 2, '05.18.01.04.06', 'Yonex Aerosensa 50 (AS-50) feather shuttlecocks', 'slop', '', 'PRO 2129', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 499, 0),
(122, 2, '05.18.01.04.06', 'Yonex Mavis 500 plastic shuttlecocks', 'slop', '', 'PRO 2130', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 220, 0),
(123, 2, '05.18.01.04.06', 'Yonex Mavis 10 plastic shuttlecocks', 'slop', '', 'PRO 2131', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 150, 0),
(124, 2, '05.18.01.04.06', '', '', '', 'PRO 2132', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(125, 2, '05.18.01.04.06', 'YONEX 152 C PRO', 'buah', '', 'PRO 2133', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 370, 0),
(126, 2, '05.18.01.04.06', ' YONEX 141 NB RP ', 'buah', '', 'PRO 2134', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 250, 0),
(127, 2, '05.18.01.04.07', '', '', '', 'PRO 2135', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(128, 2, '05.18.01.04.07', '', '', '', 'PRO 2136', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(129, 2, '05.18.01.04.07', '', '', '', 'PRO 2137', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(130, 2, '05.18.01.04.07', 'Mikasa GR-7', 'buah', '', 'PRO 2138', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 175, 0),
(131, 2, '05.18.01.04.07', 'Adidas All-Court Prep Ball', 'buah', '', 'PRO 2139', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 349, 0),
(132, 2, '05.18.01.04.07', 'Molten B7R-1500', 'buah', '', 'PRO 2140', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 200, 0),
(133, 2, '05.18.01.04.07', '', '', '', 'PRO 2141', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(134, 2, '05.18.01.04.07', 'Ring Basket Portable Hidrolik                                                       Tipe RB35', 'set', '', 'PRO 2142', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 20, 0),
(135, 2, '05.18.01.04.07', '', '', '', 'PRO 2143', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(136, 2, '05.18.01.04.07', '', '', '', 'PRO 2144', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(137, 2, '05.18.01.04.07', 'Marathon MT101 Berat: 160 gram    Bahan: Plastik Sintetik', 'buah', '', 'PRO 2145', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 140, 0),
(138, 2, '05.18.01.04.07', 'Marathon MT201 Berat: 300 gram      Bahan: Plastik Sintetik', 'buah', '', 'PRO 2146', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 150, 0),
(139, 2, '05.18.01.04.07', 'Marathon MT908 Berat: 180 gram   Bahan: Plastik Campuran Karet', 'buah', '', 'PRO 2147', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 190, 0),
(140, 2, '05.18.01.04.07', '', '', '', 'PRO 2148', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(141, 2, '05.18.01.04.07', 'OEM SHEN SHEN ', 'buah', '', 'PRO 2149', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 200, 0),
(142, 2, '05.18.01.04.07', 'Marathon', 'buah', '', 'PRO 2150', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 160, 0),
(143, 2, '', '', '', '', 'PRO 2151', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(144, 2, '05.18.01.05', '', '', '', 'PRO 2152', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(145, 2, '05.18.01.05.01', '', '', '', 'PRO 2153', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(146, 2, '05.18.01.05.01', 'Bahan Plastik Tinggi : 35 Cm', 'set', '', 'PRO 2154', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 110, 0),
(147, 2, '05.18.01.05.01', 'Bahan Plastik dan Marmer                    Tinggi : 40 Cm', 'set', '', 'PRO 2155', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 170, 0),
(148, 2, '05.18.01.05.01', 'Bahan Plastik Tinggi : 45 Cm', 'set', '', 'PRO 2156', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 220, 0),
(149, 2, '05.18.01.05.01', 'Bahan Plastik dan Marmer                    Tinggi : 48 Cm', 'set', '', 'PRO 2157', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 235, 0),
(150, 2, '05.18.01.05.01', 'Bahan Plastik dan Sparepart Marmer                                 Tinggi : 50 Cm', 'set', '', 'PRO 2158', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 220, 0),
(151, 2, '05.18.01.05.01', 'Kaki Empat                                       Bahan Plastik dan Marmer                    Tinggi : 85 Cm', 'buah', '', 'PRO 2159', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 410, 0),
(152, 2, '05.18.01.05.04', '', '', '', 'PRO 2160', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(153, 2, '05.18.01.05.04', '', '', '', 'PRO 2161', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(154, 2, '05.18.01.05.04', 'Bahan Fiberglass                                                    Tinggi 22 cm, panjang 14 cm dan tebal 1,5 cm', 'buah', '', 'PRO 2162', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 220, 0),
(155, 2, '05.18.01.05.04', 'Bahan Kayu                                                  Tinggi 23 cm, Panjang 12 cm & Tebal Kayu 1 cm, Tebal Kuningan 0,8 mm', 'buah', '', 'PRO 2163', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 200, 0),
(156, 2, '05.18.01.05.04', 'Bahan Akrilik                                                  Tingg 26 cm, Panjang 5 cm, Lebar 15 cm Tebal 1 cm', 'buah', '', 'PRO 2164', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 175, 0),
(157, 2, '05.18.01.05.04', '', '', '', 'PRO 2165', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(158, 2, '05.18.01.05.04', 'Bahan Marmer Spesial                                                   Tinggi 21 cm, Panjang 15 cm & Tebal Marmer 1 cm', 'buah', '', 'PRO 2166', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 80, 0),
(159, 2, '', '', '', '', 'PRO 2167', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(160, 2, '05.18.01.08', '', '', '', 'PRO 2168', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(161, 2, '05.18.01.08.08', '', '', '', 'PRO 2169', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(162, 2, '05.18.01.08.08', '', '', '', 'PRO 2170', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(163, 2, '05.18.01.08.08', 'Tokoh: KRESNA                       Ukuran +50 cm                                   Warna Putih/Hitam                                      Tipe A', 'buah', '', 'PRO 2171', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 390, 0),
(164, 2, '05.18.01.08.08', 'Tokoh: SRIKANDI                             Ukuran 20 X 50 cm                              Kualitas Prada', 'buah', '', 'PRO 2172', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(165, 2, '05.18.01.08.08', 'Tokoh: WERKUDARA Solo                Kualitas Super', 'buah', '', 'PRO 2173', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(166, 2, '05.18.01.08.08', 'Tokoh: GATOTKACA Solo               ', 'buah', '', 'PRO 2174', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 950, 0),
(167, 2, '05.18.01.08.08', 'Tokoh: KUMBOKARNO                       Ukuran +80 cm                                             Tipe A', 'buah', '', 'PRO 2175', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 690, 0),
(168, 2, '', '', '', '', 'PRO 2176', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(169, 2, '05.18.02', '', '', '', 'PRO 2177', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(170, 2, '05.18.02.01', '', '', '', 'PRO 2178', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(171, 2, '05.18.02.01.03', '', '', '', 'PRO 2179', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(172, 2, '05.18.02.01.03', 'Matras Gulat Super Deluxe', 'buah', '', 'PRO 2180', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(173, 2, '05.18.02.01.03', 'Matras Judo', 'buah', '', 'PRO 2181', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 950, 0),
(174, 2, '05.18.02.01.03', 'Matras Taekwondo, Silat & Karate', 'buah', '', 'PRO 2182', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 210, 0),
(175, 2, '05.18.02.01.03', 'Etrack Matras Senam                                   Rebondit 2m x 1m x 15cm', 'buah', '', 'PRO 2183', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 800, 0),
(176, 2, '05.18.02.01.03', 'Etrack Matras Senam                                   Rebondit 2m x 1m x 5cm', 'buah', '', 'PRO 2184', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 500, 0),
(177, 2, '', '', '', '', 'PRO 2185', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(178, 2, '05.18.02.04', '', '', '', 'PRO 2186', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(179, 2, '05.18.02.04.01', '', '', '', 'PRO 2187', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(180, 2, '05.18.02.04.01', 'International Russian Chess Set                        CATUR SAWO 03                           Size 54 x 54 cm ', 'set', '', 'PRO 2188', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 450, 0),
(181, 2, '05.18.02.04.01', 'WORLD CLASS CHESS : CATUR TERBAIK 01                                   Size 54 x 54 cm', 'set', '', 'PRO 2189', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 500, 0),
(182, 2, '05.18.02.04.01', 'Catur Standart Internasional                                   ALEXANDER ALEKHINE', 'set', '', 'PRO 2190', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 300, 0),
(183, 2, '05.18.02.04.01', 'Jam Catur                                            DGT 2010 TIMER   ', 'buah', '', 'PRO 2191', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 1, 0),
(184, 2, '05.18.02.04.03', '', '', '', 'PRO 2192', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(185, 2, '05.18.02.04.03', '', '', '', 'PRO 2193', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(186, 2, '05.18.02.04.03', 'Cakram                                            Proteam Woman Coklat                               Material Wooden Berat 1kg Diameter 180-182cm', 'buah', '', 'PRO 2194', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 150, 0),
(187, 2, '05.18.02.04.03', 'Cakram                                            Proteam Man Coklat                               Material Wooden Berat 1,5kg Diameter 200-202cm', 'buah', '', 'PRO 2195', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 170, 0),
(188, 2, '05.18.02.04.03', 'Lembing                                             Bahan Alumunium                    Berat 80gram                   Panjang 260-270cm                                                      Standar SNI', 'buah', '', 'PRO 2196', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 159, 0),
(189, 2, '05.18.02.04.03', 'Tolak Peluru                                                         Bahan Besi dilapisi karet pada bagian luar                                             Berat 3kg dan 4kg                                            Standar SNI', 'buah', '', 'PRO 2197', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 148, 0),
(190, 2, '05.18.02.04.03', '', '', '', 'PRO 2198', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(191, 2, '05.18.02.04.03', 'FOX Body Protector Titan', 'buah', '', 'PRO 2199', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 550, 0),
(192, 2, '05.18.02.04.03', 'ALPINESTARS Dekker Titan Polkadot ? Hitam', 'set', '', 'PRO 2200', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 225, 0),
(193, 2, '05.18.02.04.03', 'ALPINESTARS Dekker EN1621 ? Putih', 'set', '', 'PRO 2201', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 425, 0),
(194, 2, '05.18.02.04.03', 'Hugo Adidas Double Side', 'buah', '', 'PRO 2202', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 675, 0),
(195, 2, '05.18.02.04.03', 'Boxing Head Guard Black', 'buah', '', 'PRO 2203', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 650, 0),
(196, 2, '05.18.02.04.03', '', '', '', 'PRO 2204', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 0, 0),
(197, 2, '05.18.02.04.03', 'Papan Skor                                          Score Board Dhs F504                                                             Ukuran 30cm x 20cm x 19cm', 'buah', '', 'PRO 2205', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 250, 0),
(198, 2, '05.18.02.04.03', 'Stopwatch                                          CASIO Standard Digital [AE-2000W-1AVDF] ', 'buah', '', 'PRO 2206', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 537, 0),
(199, 2, '05.18.02.04.03', 'STOPWACTH SEWAN  ', 'buah', '', 'PRO 2207', '', '', '1.logo-ppm-new.png', 0, 0, 0, 0, 0, '', 5, '0000-00-00 00:00:00', NULL, 1, NULL, 200, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode_induk_kategori` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kode_kategori`, `nama`, `kode_induk_kategori`, `status`) VALUES
(1, '02', 'Golongan Peralatan dan Mesin', NULL, 1),
(2, '02.02', 'Alat-alat Besar', '02', 1),
(3, '02.03', 'Alat-alat Angkutan', '02', 1),
(4, '02.04', 'Alat-alat Bengkel, Tukang dan Alat Ukur', '02', 0),
(5, '02.05', 'Alat-alat Pertanian', '02', 1),
(6, '02.06', 'Alat-alat Kantor dan Rumah Tangga', '02', 1),
(7, '02.06.01', 'Alat Kantor', '02.06', 1),
(8, '02.06.02', 'Alat Rumah Tangga', '02.06', 1),
(9, '02.06.03', 'Komputer', '02.06', 1),
(10, '02.06.04', 'Meja dan Kursi Kerja / Rapat Pejabat', '02.06', 1),
(11, '02.07', 'Alat Studio dan Komunikasi', '02', 1),
(12, '02.08', 'Alat-alat Kedokteran', '02', 1),
(13, '02.09', 'Alat-alat Laboratorium', '02', 1),
(14, '03', 'Golongan Gedung dan Bangunan', NULL, 1),
(15, '04', 'Golongan Jalan, Irigasi dan Jaringan Air Bersih', NULL, 1),
(41, '05', 'Golongan Aset Tetap Lainnya', NULL, 1),
(42, '05.18', 'Barang Bercorak Kebudayaan', '05', 1),
(43, '05.18.01', 'Alat Kesenian', '05.18', 1),
(44, '05.18.02', 'Alat Olahraga Lainnya', '05.18', 1),
(45, '05.19', 'Hewan, Ternak dan Tanaman', '05', 1),
(46, '05.20', 'Test', NULL, 0),
(47, '02.03.01', 'Troli', '02.03', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(4) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `masa_aktif` datetime DEFAULT NULL,
  `penting` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` varchar(6) NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `updatedBy` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `masa_aktif`, `penting`, `status`, `createdAt`, `createdBy`, `updatedAt`, `updatedBy`) VALUES
(1, 'Update Data Rutin', 'Update data rutin akna dilaksanakan pada tanggal sekian hingga sekian. Diharap bagi setiap pegawai untuk mengupdate data terbaru sebelum batas waktu.', '2016-10-23 00:00:00', 1, 1, '0000-00-00 00:00:00', '0000-0', '0000-00-00 00:00:00', '0000-0'),
(5, 'Rapat Agenda', 'Rapat agenda harian akan dilaksanakan besok pagi hingga siang hari. Diharap membawa laporan masing-masing.', NULL, NULL, 0, '0000-00-00 00:00:00', '', NULL, NULL),
(8, 'Pengumuman', 'Isi Pengumuman', '2016-10-25 00:00:00', 1, 1, '2016-10-24 09:03:07', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `regulasi`
--

CREATE TABLE `regulasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text,
  `tgl_dikeluarkan` datetime DEFAULT CURRENT_TIMESTAMP,
  `dikeluarkan_oleh` varchar(255) DEFAULT NULL,
  `file` text,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `regulasi`
--

INSERT INTO `regulasi` (`id`, `judul`, `isi`, `tgl_dikeluarkan`, `dikeluarkan_oleh`, `file`, `status`) VALUES
(1, 'Tes 2', 'Tes Regulasi 2', '2016-10-22 00:00:00', 'Walikota', '10454355_4494625301350_1493667070732961879_o.jpg', 0),
(2, 'Pengumuman', 'Ini adalah testing', '2016-10-30 00:00:00', 'Mas Citra', 'license.txt', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'LNovQL3sncAHvhpbmHDBXe', 1268889823, 1477303705, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'rizkiherda@gmail.com', '$2y$08$rhJwtbO/Q6M26847s1dfFeJ77WcJbZqBue67L.4FOoaPtuVLixsfm', NULL, 'rizkiherda@gmail.com', NULL, 'o.gpY4GpP9WBnu-Zi1Dsc.09b3725c196d398db2', 1475723946, NULL, 1475722620, 1475722653, 1, 'Rizki', 'Herdatullah', 'MasCitra', '082234367866');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

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
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regulasi`
--
ALTER TABLE `regulasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `regulasi`
--
ALTER TABLE `regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

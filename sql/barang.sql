-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Nov 2016 pada 02.35
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
  `kode_kategori` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `ukuran` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `hargaPasar` double NOT NULL,
  `biayaKirim` double NOT NULL,
  `resistensi` double NOT NULL,
  `ppn` double NOT NULL,
  `hargashsb` double NOT NULL,
  `keterangan` text,
  `spesifikasi` text,
  `gambar` text,
  `tahun_anggaran` year(4) NOT NULL,
  `popularitas` int(11) DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL,
  `createdBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='5';

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_kategori`, `nama`, `merk`, `tipe`, `ukuran`, `satuan`, `hargaPasar`, `biayaKirim`, `resistensi`, `ppn`, `hargashsb`, `keterangan`, `spesifikasi`, `gambar`, `tahun_anggaran`, `popularitas`, `createdAt`, `updateAt`, `createdBy`, `updateBy`, `status`) VALUES
(3, '0206030102', 'PDA', 'Toth', '1352', '6', 'Inchi', 2500000, 22000, 20000, 254200, 2796200, 'Tidak Ada', '<p>Tidak Ada</p>', NULL, 2016, 9, '2016-11-19 01:33:56', '2016-11-11 00:34:13', 1, 1, 1),
(6, '02060301', 'Handphone', 'Xiaomi', 'Mi5', '5', 'Inchi', 2500000, 22000, 20000, 254200, 2796200, 'Tidak Ada', '<p>Tidak Ada</p>', 'img-20161111103021.jpg', 2016, 4, '2016-11-19 01:33:56', '2016-11-11 03:30:21', 1, 1, 1),
(7, '02060301', 'Handphone', 'Lenovo', 'Vibe', '6', 'Inchi', 2000000, 22000, 20000, 204200, 2246200, 'Tidak Ada', '<p>Tidak Ada</p>', 'img-20161112041138.png', 2016, 6, '2016-11-19 01:33:56', '2016-11-11 03:22:15', 1, 1, 1),
(8, '02060301', 'Laptop', 'Toshiba', '1594', '15', 'Inchi', 5000000, 40000, 50000, 509000, 5599000, 'Tidak Ada', '<p>Tidak Ada</p>', 'img-20161111102922.jpg', 2016, 3, '2016-11-19 01:33:56', '2016-11-11 03:29:22', 1, 1, 1),
(9, '02060206', 'Kulkas', 'LG', '2 pintu', '1.5', 'Meter', 3000000, 160000, 25000, 318500, 3503500, 'Tidak Ada', '<p>Tidak Ada</p>', 'img-20161112041138.jpg', 2016, 0, '2016-11-11 22:02:17', '2016-11-11 03:54:40', 1, 1, 1),
(13, '0206020603', 'Televisi', 'Samsung', 'Curve', '32', 'Inchi', 5400000, 100000, 50000, 555000, 6105000, 'Lazada', 'Layar Cekung', NULL, 2016, 0, '2016-11-11 22:13:03', NULL, 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`kode_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Nov 2016 pada 10.45
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
  `ukuran` varchar(255) NOT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `spesifikasi` text,
  `satuan` varchar(255) NOT NULL,
  `gambar` text,
  `hargaPasar` double NOT NULL,
  `biayaKirim` double NOT NULL,
  `resistensi` double NOT NULL,
  `ppn` double NOT NULL,
  `hargashsb` double NOT NULL,
  `keterangan` text,
  `popularitas` int(11) DEFAULT '0',
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateAt` timestamp NULL DEFAULT NULL,
  `createdBy` int(11) NOT NULL,
  `updateBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='5';

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
(1, '02', 'Peralatan dan Mesin', NULL, 1),
(2, '02.02', 'Alat-alat Besar', '02', 0),
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
(13, '02.09', 'Alat-alat Laboratorium', '02', 0),
(14, '03', 'Gedung dan Bangunan', NULL, 1),
(15, '04', 'Jalan, Irigasi dan Jaringan Air Bersih', NULL, 1),
(41, '05', 'Aset Tetap Lainnya', NULL, 1),
(42, '05.18', 'Barang Bercorak Kebudayaan', '05', 1),
(43, '05.18.01', 'Alat Kesenian', '05.18', 1),
(44, '05.18.02', 'Alat Olahraga Lainnya', '05.18', 1),
(45, '05.19', 'Hewan, Ternak dan Tanaman', '05', 1),
(47, '02.03.01', 'Troli', '02.03', 0),
(48, '02.10', 'Test', '02', 0),
(49, '06', 'Peralatan Kantor', NULL, 1),
(50, '07', 'Produk Gagal', NULL, 0);

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
(5, 'Rapat Agenda', 'Rapat agenda harian akan dilaksanakan besok pagi hingga siang hari. Diharap membawa laporan masing-masing.', NULL, NULL, 1, '0000-00-00 00:00:00', '', NULL, NULL);

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
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'LNovQL3sncAHvhpbmHDBXe', 1268889823, 1478078248, 1, 'Admin', 'istrator', 'ADMIN', '0'),
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
  ADD KEY `id_kategori` (`kode_kategori`);

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
  ADD UNIQUE KEY `kode_kategori` (`kode_kategori`),
  ADD KEY `kode_kategori_2` (`kode_kategori`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

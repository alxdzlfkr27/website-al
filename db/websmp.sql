-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Okt 2024 pada 05.53
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websmp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calonsiswa`
--

CREATE TABLE `calonsiswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(100) DEFAULT NULL,
  `nik` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `alamat_sekolah` varchar(100) DEFAULT NULL,
  `nama_orangtua` varchar(100) DEFAULT NULL,
  `rata_rata_nilai` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `nomor_telepon` varchar(100) DEFAULT NULL,
  `waktu_registrasi` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `waktu_approval` datetime DEFAULT NULL,
  `waktu_pengesahan` datetime DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `calonsiswa`
--

INSERT INTO `calonsiswa` (`id`, `nisn`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `asal_sekolah`, `alamat_sekolah`, `nama_orangtua`, `rata_rata_nilai`, `created_at`, `updated_at`, `created_by`, `updated_by`, `foto`, `nomor_telepon`, `waktu_registrasi`, `status`, `waktu_approval`, `waktu_pengesahan`, `periode_id`) VALUES
(13, '123', '1234', 'Iqbal', 'L', 'iqbal', '2024-01-01', 'sma 1', 'deket danauaaa', 'iqbal', 90, NULL, NULL, NULL, NULL, 'Screenshot 2024-08-27 at 06.38.07.png', '081292992929', NULL, 0, '2024-09-01 07:01:35', '2024-09-01 07:20:10', NULL),
(14, '7382828', '647282', 'muhammad alek', 'L', '35', '2024-09-18', 'smp salatiga', 'salatiga', 'al', 99, NULL, NULL, NULL, NULL, '', '073737', NULL, 2, '2024-09-02 07:56:33', '2024-09-02 08:52:27', NULL),
(15, '7382828', '4343', 'muhammad alek', 'L', '35', '2024-09-25', 'qq', 'sew', 'were', 98, NULL, NULL, NULL, NULL, '', '081254678637', NULL, 2, '2024-09-02 08:48:40', '2024-09-02 08:52:27', NULL),
(16, '323', '454', 'muhammad alek', 'L', 'salatiga', '2024-09-18', 'smp salatiga', 'salatiga', 'ppp', 99, NULL, NULL, NULL, NULL, '', '08737', NULL, 2, '2024-09-02 15:18:13', '2024-09-02 15:18:38', NULL),
(17, '323', '4343', 'muhammad alek', 'L', 'salatiga', '2024-09-21', 'smp salatiga', 'salatiga', 'al', 99, NULL, NULL, NULL, NULL, '', '073737', NULL, 1, '2024-09-03 09:40:55', NULL, NULL),
(18, '', '', '', 'L', '', '0000-00-00', '', '', '', 0, NULL, NULL, NULL, NULL, '', '', NULL, 1, '2024-09-04 10:21:04', NULL, NULL),
(19, '1213', '5363', 'ale', 'L', 'sal', '2024-09-11', 'smp salatiga', 'sal', 'maaa', 88, NULL, NULL, NULL, NULL, '', '3738', NULL, 9, '2024-09-07 07:22:58', NULL, NULL),
(20, '1234', '234', 'al', 'L', 'dgs', '2024-09-15', 'sala', 'smp sala', 'al', 89, NULL, NULL, NULL, NULL, '', '747', NULL, 0, NULL, NULL, NULL),
(21, '223', '344', 'ale', 'L', 'sala', '2024-09-26', 'sala', 'salatiga', 'al', 88, NULL, NULL, NULL, NULL, '', '677', NULL, 0, NULL, NULL, NULL),
(22, '123', '123', 'qq', 'L', 'salatiga', '2024-09-05', 'smp salatiga', 'salatiga', 'q', 89, NULL, NULL, NULL, NULL, '', '123', NULL, 0, NULL, NULL, NULL),
(23, '323', '32', 'dd', 'L', 'sala', '2024-09-17', 'smp', 'sala', 'sa', 90, NULL, NULL, NULL, NULL, '', '43', NULL, 0, NULL, NULL, NULL),
(24, '5353', '12', 'hdh', 'L', 'salatiga', '2024-09-06', 'smp salatiga', 'salatiga', 'bb', 90, NULL, NULL, NULL, NULL, '', '123', NULL, 0, NULL, NULL, NULL),
(25, '1234', '1234', 'ali', 'L', 'salatiga', '2024-09-26', 'smp salatiga', 'salatiga', 'ala', 90, NULL, NULL, NULL, NULL, '77.PNG', '8883', NULL, 2, '2024-09-02 08:48:49', '2024-09-02 08:52:27', NULL),
(26, '323', '344', 'al', 'L', 'salatiga', '2024-09-09', 'smp salatiga', 'smp sala', 'q', 99, NULL, NULL, NULL, NULL, '', '081254678637', NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nomor_telepon` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nomor_telepon`, `email`, `website`, `alamat`) VALUES
(2, '081254678637', 'smpissud1bancak@gmail.com', 'smpissud1bancak ', 'Jalan Sultan Agung nomor 172 Boto, Kecamatan Bancak , Kabupaten Semarang, Provinsi Jawa Tengah.'),
(3, '081254678637', 'smpissud1bancak@gmail.com', 'smpissud1bancak ', 'Jalan Sultan Agung nomor 172 Boto, Kecamatan Bancak , Kabupaten Semarang, Provinsi Jawa Tengah.'),
(4, '081254678637', 'smpissud1bancak@gmail.com', 'smpissud1bancak ', 'Jalan Sultan Agung nomor 172 Boto, Kecamatan Bancak , Kabupaten Semarang, Provinsi Jawa Tengah.'),
(5, '081254678637', 'smpissud1bancak@gmail.com', 'smpissud1bancak ', 'Jalan Sultan Agung nomor 172 Boto, Kecamatan Bancak , Kabupaten Semarang, Provinsi Jawa Tengah.'),
(6, '081254678637', 'smpissud1bancak@gmail.com', 'smpissud1bancak ', 'Jalan Sultan Agung nomor 172 Boto, Kecamatan Bancak , Kabupaten Semarang, Provinsi Jawa Tengah.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `pengumuman` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `pengumuman`, `created_at`, `created_by`, `updated_at`, `updated_by`, `judul`, `aktif`) VALUES
(2, 'periode 1 ', '2024-09-01 06:26:52', NULL, '2024-09-01 09:44:32', NULL, 'penerimaan siswa baru', 1),
(3, ' gelombang 2', '2024-09-22 14:45:55', NULL, NULL, NULL, 'penerimaan siswa baru', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode_pendaftaran`
--

CREATE TABLE `periode_pendaftaran` (
  `id` int(11) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `periode_pendaftaran`
--

INSERT INTO `periode_pendaftaran` (`id`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`, `created_at`, `updated_at`, `aktif`) VALUES
(3, '2024-08-01', '2024-09-02', 'Periode 1', '2024-09-01 17:04:09', '2024-09-03 01:39:23', 1),
(4, '2024-08-28', '2024-09-04', 'Periode 2', '2024-09-03 08:40:05', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama_role`) VALUES
(1, 'Siswa'),
(2, 'Admin'),
(3, 'Kepsek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `siswa_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, NULL),
(14, 'iqbal13', '615f07c3b6a79ef1a1aedbfb53e9d2c2', 1, 13),
(15, 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', 3, NULL),
(17, 'al', '97282b278e5d51866f8e57204e4820e5', 1, 15),
(22, 'aka', '6ac933301a3933c8a22ceebea7000326', 1, 19),
(23, 'al', 'c20ad4d76fe97759aa27a0c99bff6710', 1, 20),
(25, 'qq', '099b3b060154898840f0ebdfb46ec78f', 1, 22),
(26, 'dd', '1aabac6d068eef6a7bad3fdf50a05cc8', 1, 23),
(27, 'qeer', 'c20ad4d76fe97759aa27a0c99bff6710', 1, NULL),
(28, 'hdh', 'fc15bfd3bf22181ab4447a4acd393451', 1, 24),
(29, 'ali', '86318e52f5ed4801abe1d13d509443de', 1, 25),
(30, 'ali', '86318e52f5ed4801abe1d13d509443de', 1, 26);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calonsiswa`
--
ALTER TABLE `calonsiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periode_pendaftaran`
--
ALTER TABLE `periode_pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calonsiswa`
--
ALTER TABLE `calonsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `periode_pendaftaran`
--
ALTER TABLE `periode_pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Sep 2022 pada 15.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smp_ipkah`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `detail_guru`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_guru` (
`id` int(11)
,`nama_guru` varchar(125)
,`mata_pelajaran` varchar(125)
,`posisi` varchar(125)
,`NIP` int(255)
,`foto` varchar(255)
,`wali_kelas` varchar(125)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama_guru` varchar(125) NOT NULL,
  `id_mata_pelajaran` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `NIP` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `wali_kelas` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama_guru`, `id_mata_pelajaran`, `id_posisi`, `NIP`, `foto`, `wali_kelas`) VALUES
(1, 'jamal', 2, 3, 232323232, 'default.jpg', '-');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `join_posisi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `join_posisi` (
`id` int(11)
,`nama_guru` varchar(125)
,`id_mata_pelajaran` int(11)
,`posisi` varchar(125)
,`NIP` int(255)
,`foto` varchar(255)
,`wali_kelas` varchar(125)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `mata_pelajaran` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `mata_pelajaran`) VALUES
(2, 'PAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL,
  `posisi` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`id`, `posisi`) VALUES
(3, 'Kepala Sekolah'),
(4, 'Guru');

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_guru`
--
DROP TABLE IF EXISTS `detail_guru`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_guru`  AS   (select `join_posisi`.`id` AS `id`,`join_posisi`.`nama_guru` AS `nama_guru`,`mata_pelajaran`.`mata_pelajaran` AS `mata_pelajaran`,`join_posisi`.`posisi` AS `posisi`,`join_posisi`.`NIP` AS `NIP`,`join_posisi`.`foto` AS `foto`,`join_posisi`.`wali_kelas` AS `wali_kelas` from (`join_posisi` join `mata_pelajaran`) where `join_posisi`.`id_mata_pelajaran` = `mata_pelajaran`.`id`)  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `join_posisi`
--
DROP TABLE IF EXISTS `join_posisi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `join_posisi`  AS   (select `guru`.`id` AS `id`,`guru`.`nama_guru` AS `nama_guru`,`guru`.`id_mata_pelajaran` AS `id_mata_pelajaran`,`posisi`.`posisi` AS `posisi`,`guru`.`NIP` AS `NIP`,`guru`.`foto` AS `foto`,`guru`.`wali_kelas` AS `wali_kelas` from (`guru` join `posisi`) where `guru`.`id_posisi` = `posisi`.`id`)  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mata_pelajaran` (`id_mata_pelajaran`),
  ADD KEY `id_posisi` (`id_posisi`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mata_pelajaran`) REFERENCES `mata_pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_ibfk_2` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

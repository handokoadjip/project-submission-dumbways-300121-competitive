-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2021 pada 13.38
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2021_project_dumbways`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_tb`
--

CREATE TABLE `school_tb` (
  `id` int(11) NOT NULL,
  `NPSN` varchar(55) NOT NULL,
  `name_school` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `logo_school` varchar(128) NOT NULL,
  `school_level` varchar(128) NOT NULL,
  `status_school` enum('active','deactive') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `school_tb`
--

INSERT INTO `school_tb` (`id`, `NPSN`, `name_school`, `address`, `logo_school`, `school_level`, `status_school`, `user_id`) VALUES
(1, '11217021', 'tech it', 'serang, banten ', 'default.jpg', 'basic', 'active', 2),
(3, '11217021', 'dumbways', 'jl. elang iv, sawah lama, kec. ciputat', '60153982dbda5.png', 'basic', 'active', 3),
(5, '11217021', 'seracode', 'serang, banten ', 'default.jpg', 'basic', 'active', 2),
(8, '11217021', 'line developer', 'serang, banten ', 'default.jpg', 'basic', 'active', 3),
(10, '11217021', 'shine', 'serang, banten ', 'default.jpg', 'basic', 'active', 2),
(14, '123123', 'line developers', 'jakarta', '60154d4ac22cc.png', 'basic', 'deactive', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(2, 'Handoko Adji Pangestu', 'handokoadjipangestu@gmail.com', '$2y$10$Ib5t34fCP6Hrse10tidSn.ktKdVA.fnS2vYll/Lf.b4qYjeVBkjJe'),
(3, 'hans natadiredjass', 'hansnatadiredja@gmail.com', '$2y$10$nJ1tz4NZrGQAGSaBjPoQEOfXSUD..brMtF1gIcpbSO/DNL./jVjTi'),
(4, 'Dumbways', 'dumbways@gmail.com', '$2y$10$nJ1tz4NZrGQAGSaBjPoQEOfXSUD..brMtF1gIcpbSO/DNL./jVjTi'),
(5, 'han', 'hansdoskos@gmail.com', '$2y$10$efJR6EMB0DMZVXObWRuX.OQbuyhBNVn75FcEaIdbiAvzXXBcDgKPC');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `school_tb`
--
ALTER TABLE `school_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `school_tb`
--
ALTER TABLE `school_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `school_tb`
--
ALTER TABLE `school_tb`
  ADD CONSTRAINT `school_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Sep 2023 pada 03.13
-- Versi server: 5.6.38
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbyunme_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `posting_me`
--

CREATE TABLE `posting_me` (
  `idposts` int(11) NOT NULL,
  `tokenkey_id` varchar(128) NOT NULL,
  `status` text NOT NULL,
  `roles` varchar(128) NOT NULL,
  `rolessatu` varchar(128) NOT NULL,
  `dates` text NOT NULL,
  `datesdua` text NOT NULL,
  `tokenkey_status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `posting_me`
--

INSERT INTO `posting_me` (`idposts`, `tokenkey_id`, `status`, `roles`, `rolessatu`, `dates`, `datesdua`, `tokenkey_status`) VALUES
(1, '5dcf0407c325a9f0420a8d34d58200ab_posting_', 'SGVsb19yZXBsYWNlX1td', 'Publics', 'posting', '12:51 19 Sep 2023', '12:51 19 Sep 2023', '125116190923'),
(2, '5fabc484b9a046768e107e420450b56e_posting_', 'SGVsbG8gd29ybGQhX3JlcGxhY2VfWyI2NTBjMTMwNmJhMGI1LmFlMjlhMjA0ODFhYjM3YmUyMzkyOWY2ZDg4NjUxNmViIiwiNjUwYzEzMDZjODEyMC4zYjE2NmQ5NjhmNzYyYzNjNmRjMjVmZjNjNThjNDg2NSJd', 'Publics', 'posting', '16:55 21 Sep 2023', '16:55 21 Sep 2023', '165518210923'),
(3, '5fabc484b9a046768e107e420450b56e_posting_', 'SGFsb2FfcmVwbGFjZV8xX2Rpc3BsYXlfY29tbWVudHM=', 'Publics', 'comments', '16:57 21 Sep 2023', '16:57 21 Sep 2023', '165727210923');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabposts`
--

CREATE TABLE `tabposts` (
  `idtabs` int(11) NOT NULL,
  `idposts` varchar(128) NOT NULL,
  `tokenkey_id` varchar(128) NOT NULL,
  `roles` varchar(128) NOT NULL,
  `dates` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tabposts`
--

INSERT INTO `tabposts` (`idtabs`, `idposts`, `tokenkey_id`, `roles`, `dates`) VALUES
(2, '1', '5dcf0407c325a9f0420a8d34d58200ab', 'Loves', '13:48 20 Sep 2023'),
(3, '1', '5fabc484b9a046768e107e420450b56e', 'Loves', '15:21 21 Sep 2023'),
(4, '2', '5fabc484b9a046768e107e420450b56e', 'view-status', '16:55 21 Sep 2023'),
(5, '2', '5fabc484b9a046768e107e420450b56e', 'view-status', '16:57 21 Sep 2023'),
(6, '1', '5dcf0407c325a9f0420a8d34d58200ab', 'view-status', '16:57 21 Sep 2023'),
(7, '1', '5fabc484b9a046768e107e420450b56e', 'Comments', '16:57 21 Sep 2023'),
(8, '3', '5fabc484b9a046768e107e420450b56e', 'view-status', '16:57 21 Sep 2023'),
(9, '2', '5fabc484b9a046768e107e420450b56e', 'view-status', '16:58 21 Sep 2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_yu`
--

CREATE TABLE `users_yu` (
  `idusers` int(11) NOT NULL,
  `tokenkey` text NOT NULL,
  `nama_depan` varchar(128) NOT NULL,
  `nama_belakang` varchar(128) NOT NULL,
  `nama_pengguna` varchar(128) NOT NULL,
  `surel` varchar(128) NOT NULL,
  `no_telpon` varchar(128) NOT NULL,
  `j_kelamin` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `negara` varchar(128) NOT NULL,
  `bio` text NOT NULL,
  `pekerjaan` varchar(128) NOT NULL,
  `tanggal_lahir` text NOT NULL,
  `tanggal_update` text NOT NULL,
  `tanggal_buat` text NOT NULL,
  `centang` text NOT NULL,
  `roles` text NOT NULL,
  `roles_1` text NOT NULL,
  `foto_profile` text NOT NULL,
  `foto_sampul` text NOT NULL,
  `akses` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_yu`
--

INSERT INTO `users_yu` (`idusers`, `tokenkey`, `nama_depan`, `nama_belakang`, `nama_pengguna`, `surel`, `no_telpon`, `j_kelamin`, `alamat`, `negara`, `bio`, `pekerjaan`, `tanggal_lahir`, `tanggal_update`, `tanggal_buat`, `centang`, `roles`, `roles_1`, `foto_profile`, `foto_sampul`, `akses`) VALUES
(36, '7d0bc1a31865d89b20f79c5117fc6c93', 'Muhamad', 'Muhamad Ardiansyah', 'muhamda_', 'ardiansyahmoh221@gmail.com', '', '', '', 'Indonesia', '', '', '2023-09-19', '13:33:29 19 Sep 2023', '13:33:29 19 Sep 2023', '', '1', '2', 'default-jpg.jpg', 'sampul.jpg', '81dc9bdb52d04dc20036dbd8313ed055'),
(35, '4dabecfb684eab801e038fc3e3dfe76a', 'Muhamad ', 'Muhamad Ardiansyah ', 'Muham_0318393d', 'muhardiansyahcodes@gmail.com', '', '', '', 'Indonesia', '', '', '1998-09-19', '13:28:07 19 Sep 2023', '13:28:07 19 Sep 2023', '', '1', '2', 'default-jpg.jpg', 'sampul.jpg', '81dc9bdb52d04dc20036dbd8313ed055'),
(34, 'c3928627760eadb42f810cabc6d1f459', 'Muhamad ', 'Muhamad Ardiansyah', 'Muham_532db1e8', 'guidesnonem@gmail.com', '', '', '', 'Indonesia', '', '', '1998-09-19', '13:25:36 19 Sep 2023', '13:25:36 19 Sep 2023', '', '1', '2', 'default-jpg.jpg', 'sampul.jpg', '81dc9bdb52d04dc20036dbd8313ed055'),
(18, '5dcf0407c325a9f0420a8d34d58200ab', 'Ardi', 'Muhamad Ardiansyah', 'ardeov_', 'mochrappz@gmail.com', '085817555922', 'L', 'https://sukai.yunme.biz.id/bio', 'Bogor_CITY_Kp. Babakan Baru_ADDRESS_16640_ZIP_Indonesia', 'Hello, I\'m Programmer @ Solo (Backend) PHP & JavaScript :)', 'Founder_PERU_Yunme Platform', '1998-07-09', '14:00 28 Aug 2023', '14:00 28 Aug 2023', 'centang', '1', '1', 'ardeov__take_3edd6e4babc491c6c584fdf0fa6d11fb', 'cf9902d384075d914105536035ee747d', '25d55ad283aa400af464c76d713c07ad'),
(28, 'f2161e85d59849823eb0ecbec96e6733', 'Fariza', 'Farza Dintha R.', 'farzaya', 'restu@gmail.com', '', '', 'www.yunme.biz.id/p/farzaya', 'America', '', '', '1995-09-15', '10:04 15 Sep 2023', '10:04 15 Sep 2023', '', '1', '2', 'farza_1697235cdad_take_9c9e7189de5a3d1eca9bc5eeee1bbb40', 'a11b351a39d993479098c9f70ed894f5', '81dc9bdb52d04dc20036dbd8313ed055'),
(33, '5fabc484b9a046768e107e420450b56e', 'Muhamad ', 'Muhamad Ardiansyah', 'Muham_fa515efd', 'restuarrouf@gmail.com', '', '', '', 'Indonesia', '', '', '1998-09-19', '13:17:23 19 Sep 2023', '13:17:23 19 Sep 2023', '', '1', '2', 'default-jpg.jpg', 'sampul.jpg', '81dc9bdb52d04dc20036dbd8313ed055'),
(27, '6441ef18ca4d28dc0aaf73a8f0fbf685', 'Bayan', 'Siti Sarah', 'ardiov', 'bayan@gmail.com', '', 'P', '', 'Indonesia', '', '', '1997-09-04', '13:22 04 Sep 2023', '13:22 04 Sep 2023', '', '1', '2', 'bayan_8006c9cf024_take_e076494ffb204e61ad4bbe34a1fce707', '35b1bc3c7d55c6d29f5668aba55800d0', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `posting_me`
--
ALTER TABLE `posting_me`
  ADD PRIMARY KEY (`idposts`);

--
-- Indeks untuk tabel `tabposts`
--
ALTER TABLE `tabposts`
  ADD PRIMARY KEY (`idtabs`);

--
-- Indeks untuk tabel `users_yu`
--
ALTER TABLE `users_yu`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `posting_me`
--
ALTER TABLE `posting_me`
  MODIFY `idposts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabposts`
--
ALTER TABLE `tabposts`
  MODIFY `idtabs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users_yu`
--
ALTER TABLE `users_yu`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

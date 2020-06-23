-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2019 pada 19.32
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearningku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `foto`) VALUES
(1, 'adminku', 'adminku', 'adminku@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_user_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_user_artikel`, `judul_artikel`, `deskripsi`, `date`, `gambar`) VALUES
(4, 0, 'Apa perlunya pendidikan dibangun pertama dari keluarga???', 'Kenapa kita bisa mirip dengan orang tua kita? Lantas kenapa kita punya sedikit perbedaan fisik dan karakter dengan kakak-adik kandung kita? Bagaimana mekanisme biologis yang terjadi dibalik kemiripan orang tua dan anak? Coba perhatikan foto keluarga lo, bagaimana wajah dan penampilan kalian semua, semuanya agak mirip-mirip kan? Dari warna rambut, warna kulit, bentuk rahang, bentuk telinga, warna bola mata, dan lain-lain. Tapi coba deh lo perhatiin lebih detil lagi. Secara...', '2019-12-10 00:34:42', 'gambar_artikel/MENGAPA KITA BISA MIRIP DENGAN ORANG TUA KITA.jpg'),
(5, 0, 'BAGAIMANA MANUSIA BISA MELIHAT WARNA?', 'Warna itu sebetulnya tidak ada. Warna itu hanyalah persepsi visual dalam otak manusia saja. Lalu bagaimana manusia bisa melihat warna-warni yang berbeda? Ini penjelasan ilmiahnya. Pernah nggak sih lo pas lagi bengong ngeliatin langit, tiba-tiba muncul pertanyaan di dalam benak lo. Kenapa ya langit berwarna biru? Kenapa api berwarna merah? Kenapa daun berwarna hijau? Kenapa pelangi bisa memiliki 7 warna? Kenapa pemimpinnya Power Rangers selalu ranger merah? Kenapa gebetan gue...', '2018-12-17 07:18:08', 'gambar_artikel/BAGAIMANA MANUSIA BISA MELIHAT WARNA.jpg'),
(7, 0, 'KONFLIK SIPIL-MILITER AMERIKA SERIKAT DALAM PERANG KOREA', 'Artikel ini membahas tentang keterlibatan Jenderal MacArthur dan Presiden Truman selaku militer dan sipil Amerika Serikat dalam perang Korea. Halo sahabat-sahabat Zenius, ketemu lagi sama gue, Marcel. Di artikel kali ini, gue mau ngelanjutin sejarah konflik di daerah Asia Timur. Setelah sebelumnya membahas bagaimana Tiongkok menjadi negara komunis, di artikel ini gw mau membahas seputar perang Korea...', '2018-12-15 07:24:57', 'gambar_artikel/A.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bab`
--

CREATE TABLE `bab` (
  `id_bab` int(11) NOT NULL,
  `id_jenjang_bab` int(11) NOT NULL,
  `id_pelajaran_bab` int(11) NOT NULL,
  `id_dosen_bab` int(11) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bab`
--

INSERT INTO `bab` (`id_bab`, `id_jenjang_bab`, `id_pelajaran_bab`, `id_dosen_bab`, `deskripsi`, `video`, `dates`) VALUES
(10, 1, 1, 1, 'Bilangan dalam matematika', 'uploads/bilangan_cacah.pdf', '2019-12-02'),
(12, 1, 1, 2, 'Operasi Matematika', 'uploads/tambah_kurang.pdf', '2019-12-03'),
(21, 1, 1, 1, 'Bilangan Prima', 'uploads/LAPORAN PRAKTIKUM_.docx', '2019-12-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_dosen_jenjang` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `username`, `password`, `email`, `id_dosen_jenjang`, `foto`) VALUES
(1, 'dosen1', 'dosen1', 'dosen1@gmail.com', 1, NULL),
(2, 'dosen2', 'dosen2', 'dosen2@gmail.com', 2, NULL),
(3, 'dosen3', 'dosen3', 'dosen3@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_soal_jawaban` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `judul_jawaban` varchar(200) NOT NULL,
  `jawaban` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_soal_jawaban`, `deskripsi`, `judul_jawaban`, `jawaban`) VALUES
(2, 1, 'jawaban bilangan_cacah', 'jawaban_bilangan_Cacaahh', 'jawaban/jawaban_bilangan_cacah.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` int(11) NOT NULL,
  `nama_jenjang` varchar(100) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `url`) VALUES
(1, 'D3 IT', ''),
(2, 'D4 IT', ''),
(3, 'D3 ELIN', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel_komentar` int(11) NOT NULL,
  `id_user_komentar` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1541551701),
('m130524_201442_init', 1541551755);

-- --------------------------------------------------------

--
-- Struktur dari tabel `murid`
--

CREATE TABLE `murid` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_murid_jenjang` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `murid`
--

INSERT INTO `murid` (`id`, `username`, `password`, `email`, `id_murid_jenjang`, `foto`) VALUES
(9, 'cobalagi', 'cobalagi', 'cobalagi@gmail.com', 2, NULL),
(10, 'cobacoba', 'cobacoba', 'cobacoba@gmail.com', 3, NULL),
(11, 'murid1', 'murid1', 'murid1@gmail.com', 1, NULL),
(15, 'murid2', 'murid2', 'murid2@gmail.com', 2, ''),
(16, 'murid4', 'murid4', 'murid4@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `id_semester_pelajaran` int(11) NOT NULL,
  `nama_pelajaran` varchar(250) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `id_semester_pelajaran`, `nama_pelajaran`, `url`) VALUES
(1, 1, 'Matematika 1', ''),
(2, 1, 'Konsep Pemrograman', ''),
(3, 1, 'Bahasa Inggris', ''),
(4, 2, 'Pemrograman Web', ''),
(5, 2, 'Agama', ''),
(6, 2, 'Basis Data', ''),
(7, 2, 'Matematika Diskrit', ''),
(8, 3, 'Elektro Digital', ''),
(9, 3, 'Dasar Kelistrikan', ''),
(10, 3, 'PKN', ''),
(11, 4, 'Konsep Jaringan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `id_jenjang_semester` int(11) NOT NULL,
  `semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_semester`, `id_jenjang_semester`, `semester`) VALUES
(1, 1, '1'),
(2, 2, '1'),
(3, 3, '1'),
(4, 1, '2'),
(5, 2, '2'),
(6, 3, '2'),
(7, 1, '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `id_bab_soal` int(11) DEFAULT NULL,
  `deskripsi` text,
  `judul_soal` varchar(200) DEFAULT NULL,
  `soal` varchar(200) DEFAULT NULL,
  `id_dosen_soal` int(11) DEFAULT NULL,
  `waktu_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_bab_soal`, `deskripsi`, `judul_soal`, `soal`, `id_dosen_soal`, `waktu_upload`) VALUES
(1, 10, 'Soal yang menguji kepahaman anda mengenai Macam - macam bilangan, terutama bilangan cacah', 'Bilangan Cacah', 'soal/matematika 1_file_soal.pptx', 1, '2019-12-01'),
(2, 12, 'Terdapat banyak operasi dalam matematika. Sebagai contoh operasi dalam matematika yaitu perkalian dan pembagian. dalam soal tersebut mahasiswa akan dilatih banyak tentang perkalian dan pembagian', 'Operasi Perkalian dan Pembagian', 'soal/matematika 1_ujian_akhir.pptx', 1, '2019-12-02'),
(8, 21, 'weerw wewew', 'coba materi ', 'soal/T- Minggu 6 Enkapsulasi.pdf', 1, '2019-12-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(19, '', '', 'admin', 'ZEX0qOArYImhxn2sgeQDjynubu2bFel0', '$2y$13$VQ23qEUs56yEtf2ytWaw5udUKb9oqytHHxniTCJ5X3kmaIw.2QYMO', NULL, 'admin@gmail.com', 10, 10, 1543659986, 1543659986),
(20, '', '', 'satriyoaji', '3M36J9y2oyZv3atrxwd4kLaPt5lzTXhM', '$2y$13$3iuXcvH6/CWt0O5bSV7uMOky0QtDMkKBbnumze6eqHMEzb4QiYLd2', NULL, 'satriyoaji@gmail.com', 10, 10, 1573512311, 1573512311),
(27, '', '', 'ijaija', 'AAd43_uLi8pnp0GSyITeiqvhXJMLoElM', '$2y$13$vR7yUTTqz6HNoLbQT4YQiOM39eOPrjzLBoXRlZtknsgy5F1d9CZJi', NULL, 'ijaija@gmail.com', 10, 10, 1574053801, 1574053801),
(28, '', '', 'adminku', 'eKSRbAGregmmQVpF1yyrHvs4JeXYC99r', '$2y$13$pHDFhIP.4HXIp13fKjJ7YeLFFPDPPtY1WFCngQe35kJepLXKPMa7G', NULL, 'adminku@gmail.com', 10, 10, 1574053929, 1574053929),
(30, '', '', 'cobalagi', 'JaMQBY2SkV6qbn-hqokAJuJ21xHl4_rG', '$2y$13$NA61J5q2pT0z6GaxCwW8p.1P22TqcTxoyY25iYZTewbcCWoLIqMii', NULL, 'cobalagi@gmail.com', 10, 10, 1574130824, 1574130824),
(31, '', '', 'cobacoba', 'SzoqtcuTXF0aUQCH40Pl424iWturlmAa', '$2y$13$3ybOFDZxqJQJEfZj9PUmyeo2HvboJXs2GmJVZkZOK9yH48cGtg7Jy', NULL, 'cobacoba@gmail.com', 10, 10, 1574131060, 1574131060),
(32, '', '', 'murid1', 'PJq2swNoOXoeta5ZR-Zxf82dFRA2DTqP', '$2y$13$Sn.N1he1/pY9LqhhYZRdZOdbasmeAiImTZNNFQwLH29smAChtvP/i', NULL, 'murid1@gmail.com', 10, 10, 1574660779, 1574660779),
(38, '', '', 'murid2', 'azspBnpiCXK9en1QrQSwYU7u9ZFc7Frd', '$2y$13$OtSMkfI2/H5Lrt4QRFeO2Omfa4lWKxq0z2jxqnSzvB4u5diep6dse', NULL, 'murid2@gmail.com', 10, 10, 1575249661, 1575249661),
(40, '', '', 'dosen1', 'YtjWxGWXAE7SWC01ncLokfyLt35GOB1E', '$2y$13$MRn8wxIiYtJI9htvuzlg6esJrYIvSNU517TFLks4SxwLUYOz.5Obq', NULL, 'dosen1@gmail.com', 10, 10, 1575249981, 1575249981),
(47, '', '', 'dosen2', 'vJGdSl9ElCapDoeP9kW9Qn8Ku3y0IuQL', '$2y$13$Qx2AZZiaVwJNPyF3halj0Ojei0Z0HPnrrQev.wNg5mpLIO3v673iC', NULL, 'dosen2@gmail.com', 10, 10, 1575251812, 1575251812),
(48, '', '', 'dosen3', 'bNSTsL3zp-SQsgL4kYvg19k2ryQxSn_X', '$2y$13$f0mA48b22M6c27U0f8y7GOVtKQFdyOG073ClJ6NCUYWuFlFd5SnYK', NULL, 'dosen3@gmail.com', 10, 10, 1575938265, 1575938265),
(49, '', '', 'murid4', '05rLyJLYPchfkz6LqVzg63rdai-JHVF4', '$2y$13$RoSQuTIYRmCn/R4yi6PMW.N2/KqrYloCxjH.yIheHxiNbUAiPQjtu', NULL, 'murid4@gmail.com', 10, 10, 1575942783, 1575942783),
(50, '', '', 'murid5', 'ZGQlbzKhv49OYVhfGWiNZCvLgqbuoqoT', '$2y$13$1GiECuDl7efWtC.BQwY8eOgN2OBnGaKMwEKt7TQCBP8JZaCb4.qs2', NULL, 'murid5@gmail.com', 10, 10, 1575943554, 1575943554);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_user_artikel` (`id_user_artikel`);

--
-- Indeks untuk tabel `bab`
--
ALTER TABLE `bab`
  ADD PRIMARY KEY (`id_bab`),
  ADD KEY `id_jenjang_bab` (`id_jenjang_bab`),
  ADD KEY `id_pelajaran_bab` (`id_pelajaran_bab`),
  ADD KEY `bab_ibfk_4` (`id_dosen_bab`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenjang_ibfk_dosen` (`id_dosen_jenjang`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_soal_jawaban` (`id_soal_jawaban`);

--
-- Indeks untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_artikel_komentar` (`id_artikel_komentar`),
  ADD KEY `id_user_komentar` (`id_user_komentar`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenjang_fk_murid` (`id_murid_jenjang`);

--
-- Indeks untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`),
  ADD KEY `pelajaran_ibfk_semester` (`id_semester_pelajaran`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`),
  ADD KEY `semester_ibfk_jenjang` (`id_jenjang_semester`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_bab_soal` (`id_bab_soal`),
  ADD KEY `soal_ibfk_dosen` (`id_dosen_soal`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bab`
--
ALTER TABLE `bab`
  MODIFY `id_bab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenjang`
--
ALTER TABLE `jenjang`
  MODIFY `id_jenjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bab`
--
ALTER TABLE `bab`
  ADD CONSTRAINT `bab_ibfk_2` FOREIGN KEY (`id_jenjang_bab`) REFERENCES `jenjang` (`id_jenjang`),
  ADD CONSTRAINT `bab_ibfk_3` FOREIGN KEY (`id_pelajaran_bab`) REFERENCES `pelajaran` (`id_pelajaran`),
  ADD CONSTRAINT `bab_ibfk_4` FOREIGN KEY (`id_dosen_bab`) REFERENCES `dosen` (`id`);

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `jenjang_ibfk_dosen` FOREIGN KEY (`id_dosen_jenjang`) REFERENCES `jenjang` (`id_jenjang`);

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`id_soal_jawaban`) REFERENCES `soal` (`id_soal`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_artikel_komentar`) REFERENCES `artikel` (`id_artikel`);

--
-- Ketidakleluasaan untuk tabel `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `jenjang_fk_murid` FOREIGN KEY (`id_murid_jenjang`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD CONSTRAINT `pelajaran_ibfk_semester` FOREIGN KEY (`id_semester_pelajaran`) REFERENCES `semester` (`id_semester`);

--
-- Ketidakleluasaan untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_jenjang` FOREIGN KEY (`id_jenjang_semester`) REFERENCES `jenjang` (`id_jenjang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_bab_soal`) REFERENCES `bab` (`id_bab`),
  ADD CONSTRAINT `soal_ibfk_dosen` FOREIGN KEY (`id_dosen_soal`) REFERENCES `dosen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

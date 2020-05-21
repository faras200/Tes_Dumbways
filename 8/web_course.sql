-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mei 2020 pada 20.14
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_course`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `author`
--

CREATE TABLE `author` (
  `id_author` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `author`
--

INSERT INTO `author` (`id_author`, `name`) VALUES
(1, 'Joseph'),
(2, 'Jonathan'),
(3, 'Jotaro'),
(4, 'Dio'),
(5, 'Iggiy'),
(6, 'farras'),
(7, 'polnaref');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id_content` int(3) NOT NULL,
  `name` text NOT NULL,
  `video_link` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_course` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id_content`, `name`, `video_link`, `type`, `id_course`) VALUES
(1, 'Introduction PHP', 'link php', 'pemula', 1),
(2, 'Introcution JS', 'link js', 'pemula', 2),
(6, 'instalasi kebutuhan', 'video.com', 'pemula', 1),
(7, 'instalasi kebutuhan', 'video.com', 'expert', 3),
(9, 'code editor untuk html5 dan css3', 'video.com', 'pemula', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id_course` int(3) NOT NULL,
  `nama` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `id_author` int(3) NOT NULL,
  `duration` char(10) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`id_course`, `nama`, `thumbnail`, `id_author`, `duration`, `deskripsi`) VALUES
(1, 'PHP', '5ec6bac2ecb2a.jpg', 1, '10 menit', 'Course ini berisikan video tutorial dasar-dasar pemrograman PHP.'),
(2, 'Javascript', 'js.png', 5, '12 menit', 'Pas buat kamu yang pengen belajar tentang apa itu JavaScript.'),
(3, 'React JS', 'react.png', 3, '15 menit', 'Pas buat kamu yang baru mengenal & belajar ReactJS.'),
(8, 'html5 & css3', '5ec6ba2d717df.png', 7, '20 menit', 'Belajar HTML 5 dan CSS 3 cocok untuk pemula');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_content`),
  ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`),
  ADD KEY `id_author` (`id_author`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id_content` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);

--
-- Ketidakleluasaan untuk tabel `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

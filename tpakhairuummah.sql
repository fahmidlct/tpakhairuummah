-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2019 at 01:46 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpakhairuummah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `level` enum('super','user') NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'super', 'aktif'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'user', 'aktif'),
(3, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin2', 'super', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(32) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `nomor_hp` varchar(14) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nomor_hp`, `status`, `id_kelas`) VALUES
(1, 'nursanti', 'bantaeng', '1998-01-07', 'jl. alauddin 2 lr. 1', '085240493995', 'aktif', 1),
(2, 'nurul ilmi samad', 'sinjai', '1994-05-05', 'griya patri abdullah permai block c7 no. 3 samata', '085320256867', 'aktif', 2),
(3, 'suci yanti', 'balikpapan', '1995-12-22', 'komp. agraria blok p no 3, tidung', '085299666428', 'aktif', 3);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `foto`, `thumb`) VALUES
(29, 'kegiatan 1', '2087b5a64527ee711df1c54da23b080a.jpeg', '2087b5a64527ee711df1c54da23b080a_thumb.jpeg'),
(30, 'kegiatan 2', '4569e8da7d0612f61552785c0594d104.jpeg', '4569e8da7d0612f61552785c0594d104_thumb.jpeg'),
(31, 'kegiatan 3', 'a3518e085d1a24f3e872447d1fdc50d2.jpeg', 'a3518e085d1a24f3e872447d1fdc50d2_thumb.jpeg'),
(32, 'kegiatan 4', 'ce50908b1896b5931636a2202f52905d.jpeg', 'ce50908b1896b5931636a2202f52905d_thumb.jpeg'),
(33, 'kegiatan 5', '58a405e47691b477deb65ec114b2792a.jpeg', '58a405e47691b477deb65ec114b2792a_thumb.jpeg'),
(34, 'kegiatan 6', '1932204b7808e1ff7314757d9bd84ab9.jpeg', '1932204b7808e1ff7314757d9bd84ab9_thumb.jpeg'),
(35, 'kegiatan 7', '7d71bc5ccae62c88447ef7446f298556.jpeg', '7d71bc5ccae62c88447ef7446f298556_thumb.jpeg'),
(36, 'kegiatan 8', '5af76ec71d30bfca9711329878126c6d.jpeg', '5af76ec71d30bfca9711329878126c6d_thumb.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(2) NOT NULL,
  `nama_kelas` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'tahfidz'),
(2, 'iqra ikhwan'),
(3, 'iqra putri');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id_murid` int(11) NOT NULL,
  `nama_murid` varchar(32) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id_murid`, `nama_murid`, `id_kelas`) VALUES
(1, 'a. abd samad faqih', 1),
(2, 'a. muh. aswar aszagaf', 1),
(3, 'zahra rahmi aulia', 1),
(4, 'nabila ummu ruqaya', 1),
(5, 'al-humaira putri n', 1),
(6, 'nurul sakinah', 1),
(7, 'a. zahra sabrina', 1),
(8, 'dian hasnita', 1),
(9, 'naurah fatimah', 1),
(10, 'fitriani s', 1),
(11, 'zasa', 1),
(12, 'a. muh. tegar asrima al kahfi', 2),
(13, 'ahmad faqih', 2),
(14, 'al-ghomidi la maeta', 2),
(15, 'andika firmansyah', 2),
(16, 'anugrah putra ramadhan', 2),
(17, 'aris munandar', 2),
(18, 'aslam', 2),
(19, 'aswan anugrah', 2),
(20, 'ikram fajar saputra', 2),
(21, 'jayasmin jum', 2),
(22, 'm. radit aditia irwan syarif', 2),
(23, 'muh. alif fiqih', 2),
(24, 'muh. aldi r', 2),
(25, 'muh. alwi al-gifary', 2),
(26, 'muh. arham', 2),
(27, 'muh. darmawan', 2),
(28, 'muh. fajrin', 2),
(29, 'muh. fakih saputra', 2),
(30, 'muh. farhan', 2),
(31, 'muh. fatih abyan yura', 2),
(32, 'muh. imran aditia', 2),
(33, 'muh. ridwan', 2),
(34, 'muh. syahril ramadhan', 2),
(35, 'muhammad alfatah', 2),
(36, 'saiful bahri', 2),
(37, 'soltan nibras kallabe', 2),
(38, 'nur fitri ramadhani akis', 3),
(39, 'alkhansa nabila', 3),
(40, 'nur aisyah', 3),
(41, 'fazila aurelia', 3),
(42, 'nikeisha qanita', 3),
(43, 'queena afiyah a', 3),
(44, 'nurul handayani', 3),
(45, 'nur ahadriah azzahra', 3),
(46, 'iryana febrianti', 3),
(47, 'aini regina putri', 3),
(48, 'afifah nurul istiqomah', 3),
(49, 'athifah alikayani putri', 3),
(50, 'nur zaiwa salwa', 3),
(51, 'nurfatimah', 3),
(52, 'nur andina n', 3),
(53, 'nurfadillah n', 3),
(54, 'dwi ratu', 3),
(55, 'nur kirana', 3),
(56, 'sofia', 3),
(57, 'siti humairah', 3),
(58, 'siti nabila inayah p', 3),
(59, 'nurul', 3),
(60, 'dinda', 3),
(61, 'nur amelia', 3);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(1) NOT NULL,
  `judul_kata_pembuka` varchar(50) NOT NULL,
  `kata_pembuka` text NOT NULL,
  `nama_sekolah` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `penerima_donatur` varchar(30) NOT NULL,
  `nomor_kontak` varchar(20) NOT NULL,
  `no_rekening` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `judul_kata_pembuka`, `kata_pembuka`, `nama_sekolah`, `alamat`, `no_telepon`, `kode_pos`, `email`, `instagram`, `facebook`, `penerima_donatur`, `nomor_kontak`, `no_rekening`) VALUES
(1, 'SELAMAT DATANG', 'TPA KHAIRU UMMAH adalah lembaga pendidikan non profit yang menyediakan pendidikan bagi anak-anak yang membutuhkan. Berlokasi di Makassar, TPA Khairu Ummah memiliki tiga kelas untuk anak-anak berusia tiga sampai enam tahun dengan total 75 siswa.      ', 'TPA KHAIRU UMMAH', 'Jalan Mannuruki 2 No.86\r\nKelurahan Mangasa\r\nKecamatan Tamalate\r\nMakassar, 90221\r\nSulawesi Selatan\r\nIndonesia', '+00 151515', '90221', 'tpakhairuummah@gmail.com', 'https://instagram.com/tpakhairuummah', 'https://facebook.com/tpakhairuummah', 'Ibu Ita', '08114181001', 'BCA 1122334455, asdfsadf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id_murid`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id_murid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

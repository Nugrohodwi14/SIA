-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 12:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbnugroho05930`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `npp` varchar(16) NOT NULL,
  `namadosen` varchar(30) NOT NULL,
  `homebase` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `npp`, `namadosen`, `homebase`) VALUES
(3, ' 0686.11.1993.03', 'Sasono Wibowo, SE, M.Kom ', 'TID3'),
(4, '0686.11.1990.006', 'Sudaryanto, M.Kom', 'SIS1'),
(5, '0686.11.1991.011', ' Aris Nurhindarto, M.Kom', 'SIS1'),
(6, ' 0686.11.1992.02', 'Florentina Esti Nilawati', 'SIS1'),
(7, ' 0686.11.1994.04', 'Heru Pramono Hadi, SE., M.Ko', 'SIS1');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `idkultawar` int(11) NOT NULL,
  `idmatkul` char(10) NOT NULL,
  `npp` char(16) NOT NULL,
  `klp` char(10) NOT NULL,
  `harl` varchar(10) NOT NULL,
  `jamkul` varchar(13) NOT NULL,
  `ruang` char(6) NOT NULL,
  `kapasitas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kultawar`
--

CREATE TABLE `kultawar` (
  `idkultawar` int(11) NOT NULL,
  `idmatkul` char(10) NOT NULL,
  `npp` char(16) NOT NULL,
  `klp` char(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jamkul` char(11) NOT NULL,
  `ruang` char(6) NOT NULL,
  `kapasitas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kultawar`
--

INSERT INTO `kultawar` (`idkultawar`, `idmatkul`, `npp`, `klp`, `hari`, `jamkul`, `ruang`, `kapasitas`) VALUES
(1, 'A12.56107', '0686.11.1994.04', 'A12.6101', 'Kamis', '18.30-20.10', 'H.3.5', 49),
(2, 'A12.56107', '0686.11.1990.006', 'A12.6101', 'Minggu', '07.00-08.40', 'H.5.1', 49),
(3, 'A12.56101', '0686.11.1991.011', 'A12.6101', 'Minggu', '07.00-08.40', 'H.5.1', 9);

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `idmatkul` char(10) NOT NULL,
  `namamatkul` varchar(50) NOT NULL,
  `sks` int(2) NOT NULL,
  `jnsmatkul` char(3) NOT NULL,
  `smt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`idmatkul`, `namamatkul`, `sks`, `jnsmatkul`, `smt`) VALUES
('A12.56021', 'Algoritma dan Pemograman I ', 4, 'T/P', '2'),
('A12.56101', ' Matematika Diskrit ', 4, 'T', '1'),
('A12.56102', 'Pengantar Teknologi Informasi ', 4, 'T/P', '1'),
('A12.56107', 'Dasar Akuntansi', 3, 'T', '1'),
('A12.56203', 'Pendidikan Agama ', 2, 'T', '2'),
('A12.56204', 'Pemrograman Web I', 3, 'T', '3');

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(11) NOT NULL,
  `nim` char(14) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tanggallahir` date NOT NULL,
  `foto` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nim`, `nama`, `email`, `tanggallahir`, `foto`) VALUES
(28, 'A12.2016.02898', 'Samanta', 'sasmita@gmail.com', '1997-08-08', 'A12.2016.02898.jpg'),
(29, 'A12.2016.02900', 'Susi', 'susi@gmail.com', '1998-08-22', 'A12.2016.02900.jpg'),
(31, 'A12.2016.02902', 'Laila', 'laila@gmail.com', '1999-05-09', 'A12.2016.02902.jpg'),
(32, 'A12.2017.03000', 'Irfan', 'irfan@gmail.com', '1998-05-30', 'A12.2017.03000.jpg'),
(33, 'A12.2017.03045', 'Fitriaa', 'fitria@gmail.com', '1999-08-02', 'A12.2017.03045.jpg'),
(34, 'A12.2017.03170', 'Adi', 'adi@gmail.com', '2000-01-02', 'A12.2017.03170.jpg'),
(36, 'A12.2018.08900', 'Mikasa', 'mikasa@gmail.com', '2000-08-17', 'a12.2018.08900.jpg'),
(47, 'A2.2018.05930', 'Nugroho Dwi Yulianto', '112201805930@mhs.dinus.ac.id', '1999-07-14', 'A12.2018.05930.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id_krs` int(11) NOT NULL,
  `id_mhs` char(14) NOT NULL,
  `id_kultawar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_krs`
--

INSERT INTO `tbl_krs` (`id_krs`, `id_mhs`, `id_kultawar`) VALUES
(1, 'A12.2017.03045', 1),
(2, 'A12.2016.02902', 2),
(3, 'A12.2018.06082', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `npp` varchar(16) NOT NULL,
  `mhs` char(14) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `npp`, `mhs`, `nilai`) VALUES
(1, '3', '32', 55);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'mhs', '21232f297a57a5a743894a0e4a801fc3', 'mhs'),
(3, 'dsn', '21232f297a57a5a743894a0e4a801fc3', 'dsn'),
(4, 'tu', 'b6b4ce6df035dcfaa26f3bc32fb89e6a', 'tu'),
(5, 'llg', 'b8ae57911c26ed8313cd09a33f7f43f5', 'admin'),
(7, 'A12.2016.02898', 'f8057ac11cd7a20c6bf238c4bf239c1c', 'mhs');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`idkultawar`);

--
-- Indexes for table `kultawar`
--
ALTER TABLE `kultawar`
  ADD PRIMARY KEY (`idkultawar`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`idmatkul`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `idkultawar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kultawar`
--
ALTER TABLE `kultawar`
  MODIFY `idkultawar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

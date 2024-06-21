-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 04:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sentosa`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkutan`
--

CREATE TABLE `angkutan` (
  `id_angkutan` int(6) NOT NULL,
  `nama_angkutan` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_angkutan` enum('bongkar','muat') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_barang` enum('lokal','impor') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `angkutan`
--

INSERT INTO `angkutan` (`id_angkutan`, `nama_angkutan`, `jenis_angkutan`, `jenis_barang`) VALUES
(100001, 'YASA', 'bongkar', 'impor'),
(100002, 'MBT', 'bongkar', 'impor'),
(100003, 'TRISINDO', 'bongkar', 'impor'),
(110001, 'APLUS', 'bongkar', 'lokal'),
(110002, 'BATU HITAM LOGISTIK', 'bongkar', 'lokal'),
(200001, 'KS', 'muat', 'lokal'),
(200002, 'KME', 'muat', 'lokal'),
(200003, 'SDM', 'muat', 'lokal'),
(200004, 'TTB', 'muat', 'lokal');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(6) NOT NULL,
  `nama_barang` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_supplier` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_barang` enum('lokal','impor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `nama_supplier`, `jenis_barang`) VALUES
(101001, 'ETILINAS HD 5201 AA', 'PETRONAS CHEMICALS', 'impor'),
(101003, 'MARLEX 50100', 'CHEVRON PHILLIPS', 'impor'),
(101008, 'MARLEX 6007', 'CHEVRON PHILLIPS', 'impor'),
(101029, 'TITANVENE HD 6070 EA', 'LOTTE CHEMICALS INDONESIA', 'lokal'),
(101030, 'TITANVEN HD 5740 UA', 'LOTTE CHEMICALS INDONESIA', 'lokal'),
(101092, 'HF 0961', 'LOTTE CHEMICALS MALAYSIA', 'impor'),
(102005, 'PETLIN C 150 Y', 'PETRONAS CHEMICALS', 'impor'),
(102033, 'LDC 801 YY', 'LOTTE CHEMICALS MALAYSIA', 'impor');

-- --------------------------------------------------------

--
-- Table structure for table `bongkar`
--

CREATE TABLE `bongkar` (
  `id_bongkar` int(12) NOT NULL,
  `id_user` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `id_angkutan` int(6) NOT NULL,
  `no_kontainer` varchar(12) NOT NULL,
  `id_barang` int(6) NOT NULL,
  `jumlah_barang` int(7) NOT NULL,
  `kode_bongkar` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto_kontainer` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_segel` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_sj` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_barang1` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_barang2` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bongkar`
--

INSERT INTO `bongkar` (`id_bongkar`, `id_user`, `tanggal`, `id_angkutan`, `no_kontainer`, `id_barang`, `jumlah_barang`, `kode_bongkar`, `foto_kontainer`, `foto_segel`, `foto_sj`, `foto_barang1`, `foto_barang2`) VALUES
(1, 9001, '2023-10-21', 100001, 'TCLU 1111111', 101003, 16000, 'TSS 1231231', 'foto/1.png', 'foto/2.png', 'foto/3.png', 'foto/4.png', 'foto/5.png'),
(2, 9001, '2023-10-21', 100001, 'TCLU 1111112', 101003, 16000, '', 'foto/1.png', 'foto/2.png', 'foto/3.png', 'foto/4.png', 'foto/5.png'),
(3, 9001, '2023-10-21', 100001, 'TCLU 1111113', 101003, 16000, '', 'foto/0.png', 'foto/1.png', 'foto/3.png', 'foto/2.png', 'foto/3.png'),
(4, 9002, '2023-10-20', 110002, 'B 1111 A', 101029, 20000, '', 'foto/2.png', 'foto/4.png', 'foto/2.png', 'foto/1.png', 'foto/4.png'),
(5, 9002, '2023-10-20', 110002, 'B 1112 A', 101029, 20000, '', 'foto/1.png', 'foto/1.png', 'foto/4.png', 'foto/4.png', 'foto/2.png'),
(6, 9002, '2023-10-16', 110001, 'B 1113 A', 101030, 20000, '', 'foto/2.png', 'foto/1.png', 'foto/4.png', 'foto/2.png', 'foto/1.png'),
(7, 9002, '2023-10-12', 100001, 'TCLU 1111116', 101008, 16000, '', 'foto/1.png', 'foto/2.png', 'foto/3.png', 'foto/4.png', 'foto/5.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(6) NOT NULL,
  `nama_customer` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_customer` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email_customer` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`, `email_customer`) VALUES
(300001, 'ALFATAMA, CV - JAKARTA', 'KAPUK - JAKARTA', 'pinguinjkt@alfatama.com'),
(300002, 'ALFATAMA, CV - KARAWANG', 'KAWASAN SURYACIPTA - KARAWANG', 'pinguinkrw@alfatama.com'),
(300003, 'ALFATAMA, CV - SURABAYA', 'SUSANTI - SURABAYA', 'pinguinsby@alfatama.com'),
(300004, 'TIRTA - HONCHUAN', 'DELTA MAS - CIKARANG', 'honchuan@tirta.com'),
(300005, 'TIRTA JABABEKA', 'JABABEKA - CIKARANG', 'jababeka@tirta.com');

-- --------------------------------------------------------

--
-- Table structure for table `muat`
--

CREATE TABLE `muat` (
  `id_muat` int(12) NOT NULL,
  `id_user` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `id_angkutan` int(6) NOT NULL,
  `no_mobil` varchar(12) NOT NULL,
  `id_barang` int(6) NOT NULL,
  `jumlah_barang` int(7) NOT NULL,
  `id_customer` int(6) NOT NULL,
  `no_do` varchar(13) NOT NULL,
  `foto_mobil` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_bak` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_do` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_barang1` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_barang2` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `foto_barang3` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muat`
--

INSERT INTO `muat` (`id_muat`, `id_user`, `tanggal`, `id_angkutan`, `no_mobil`, `id_barang`, `jumlah_barang`, `id_customer`, `no_do`, `foto_mobil`, `foto_bak`, `foto_do`, `foto_barang1`, `foto_barang2`, `foto_barang3`) VALUES
(17, 9002, '2023-10-22', 200001, 'B 1234 A', 101001, 15000, 300001, 'BBD1111111', 'foto/0.png', 'foto/1.png', 'foto/2.png', 'foto/3.png', 'foto/4.png', 'foto/5.png'),
(18, 9002, '2023-10-22', 200001, 'B 1234 B', 101008, 120000, 300001, 'BBD1111112', 'foto/0.png', 'foto/1.png', 'foto/3.png', 'foto/4.png', 'foto/5.png', 'foto/3.png'),
(24, 9002, '2023-10-22', 200001, 'B 1234 A', 101030, 20000, 300003, 'Bbd1231231', 'foto/16979779634991761686772457662261.jpg', 'foto/16979779740933668448147129683379.jpg', 'foto/16979779836005405921432622889649.jpg', 'foto/16979779906306417858520199326801.jpg', 'foto/1697977998546500987967571203816.jpg', 'foto/16979780060486909943834085227699.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Admin','Checker') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `password`, `level`) VALUES
(9001, 'Hanif', 'hanif@gmail.com', '1', 'Admin'),
(9002, 'Heru', 'heru@gmail.com', '1', 'Checker'),
(9003, 'Dodi', 'dodi@gmail.com', '1', 'Admin'),
(9004, 'boyo', 'boyo@gmail.com', '1', 'Checker'),
(9005, 'wadi', 'wadi@gmail.com', '1', 'Checker'),
(9006, 'rafel', 'rafel@gmail.com', '1', 'Checker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkutan`
--
ALTER TABLE `angkutan`
  ADD PRIMARY KEY (`id_angkutan`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `bongkar`
--
ALTER TABLE `bongkar`
  ADD PRIMARY KEY (`id_bongkar`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_angkutan` (`id_angkutan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `muat`
--
ALTER TABLE `muat`
  ADD PRIMARY KEY (`id_muat`),
  ADD UNIQUE KEY `no_do` (`no_do`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_angkutan` (`id_angkutan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bongkar`
--
ALTER TABLE `bongkar`
  MODIFY `id_bongkar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `muat`
--
ALTER TABLE `muat`
  MODIFY `id_muat` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

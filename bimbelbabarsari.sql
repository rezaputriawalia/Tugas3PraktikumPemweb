-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2025 at 03:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbelbabarsari`
--

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `fasilitas` text NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `catatan` text NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `harga_cabang` int(11) NOT NULL,
  `total_fasilitas` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `biaya_admin` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tanggal_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `email`, `paket`, `fasilitas`, `lokasi`, `metode_pembayaran`, `catatan`, `harga_paket`, `harga_cabang`, `total_fasilitas`, `subtotal`, `pajak`, `biaya_admin`, `total_bayar`, `tanggal_daftar`) VALUES
(11, 'Reza Putri Awalia', 'rezaputri27@gmail.com', 'Paket Intensif SBMPTN', 'Modul Cetak Lengkap, Modul PDF, Video Rekaman Kelas', 'Yogyakarta', 'E-Wallet', 'ini catatan', 500000, 80000, 150000, 730000, 73000, 2000, 805000, '2025-11-05 21:32:17'),
(12, 'Safna Recyfa Naqiya', 'safnarecyfa@gmail.com', 'Paket Reguler', 'Modul PDF, Video Rekaman Kelas', 'Surabaya', 'Transfer Bank', 'coba catatan', 750000, 150000, 100000, 1000000, 100000, 3000, 1103000, '2025-11-05 21:35:24'),
(13, 'Cantika Zahra Putri Maharani', 'cantikazahra@gmail.com', 'Paket Supercamp SBMPTN', 'Modul PDF, Grup Diskusi Telegram', 'Makassar', 'Tunai', 'cobacoba', 1000000, 115000, 65000, 1180000, 118000, 0, 1298000, '2025-11-05 21:36:17'),
(14, 'Kurnia Ardiningrum', 'yaya@gmail.com', 'Paket Intensif SBMPTN', 'Modul PDF, Grup Diskusi Telegram', 'Jakarta Pusat', 'Transfer Bank', 'adafd', 500000, 100000, 65000, 165000, 66500, 3000, 734500, '2025-11-05 21:36:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

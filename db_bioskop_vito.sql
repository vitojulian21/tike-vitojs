-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 02:42 AM
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
-- Database: `db_bioskop_vito`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `name` varchar(150) NOT NULL,
  `password` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(4, 'eghanvidia@gmail.com', 'Manto', '$2y$10$TYwtEo23ZVKzoqK9bhpODO/qRAFJqAqF9dCGcJtfAF4QEg9IDC6yK', '2025-02-17 05:25:41'),
(5, 'vitojulian38@gmail.com', 'vito js', '$2y$10$oJKhNUmcA4C6oqbKzkj7uenVauXp2Nas6fCU5F4v3s93Sf9bT0x0i', '2025-02-20 00:48:33'),
(6, 'yuarichoirulkafikafi@gmail.com', 'kopi', '$2y$10$f12tbsTiPBTgKVyXx1P.k.vEdxQJOkLci9zOa5uLkCyczcQdXZ9c2', '2025-02-25 05:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `akun_mall`
--

CREATE TABLE `akun_mall` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama_mall` varchar(250) NOT NULL,
  `nik` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun_mall`
--

INSERT INTO `akun_mall` (`id`, `email`, `password`, `nama_mall`, `nik`) VALUES
(1, 'vitojulian38@gmail.com', '$2y$10$4eupihZ./.D5T5opgi4ir.Iqv57NZse3EVagfkg9bPT0XEqCsULii', 'metland', '12345'),
(3, 'yuarichoirulkafikafi@gmail.com', '$2y$10$V7hpXFcrAK.r7SoeDBYzN.yrJOwxBn5ld3gH.R7hKtCI5/EwPvbVO', 'staycation', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `poster` varchar(300) NOT NULL,
  `banner` varchar(300) NOT NULL,
  `trailer` varchar(300) NOT NULL,
  `nama_film` varchar(300) NOT NULL,
  `judul` longtext NOT NULL,
  `total_menit` varchar(300) NOT NULL,
  `usia` varchar(300) NOT NULL,
  `genre` varchar(300) NOT NULL,
  `dimensi` varchar(300) NOT NULL,
  `Producer` varchar(300) NOT NULL,
  `Director` varchar(300) NOT NULL,
  `Writer` varchar(300) NOT NULL,
  `Cast` varchar(300) NOT NULL,
  `Distributor` varchar(300) NOT NULL,
  `harga` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `poster`, `banner`, `trailer`, `nama_film`, `judul`, `total_menit`, `usia`, `genre`, `dimensi`, `Producer`, `Director`, `Writer`, `Cast`, `Distributor`, `harga`) VALUES
(8, 'uploads/poster/wibu.jpg', 'uploads/banner/aaaaa.jpeg', 'uploads/trailer/Official Trailer ONE PIECE FILM RED - Cinépolis Indonesia - Cinépolis Indonesia (720p, h264).mp4', 'one piece', 'mantap', '120', 'SU', '', '3D', 'cito', 'vito', 'jjgdg', 'jgdg', 'jggd', '50000'),
(10, 'uploads/poster/ye.jpg', 'uploads/banner/n.jpg', 'uploads/trailer/Godzilla King of the Monsters - Official Trailer 1 - Now Playing In Theaters - Warner Bros. Pictures (720p, h264).mp4', 'Godzilla', 'cjhceugf', '125', 'SU', 'Adventure', '3D', 'gdwgdhg', 'hvhej', 'hche', 'gudwgd', 'hvdhw', '60000'),
(12, 'uploads/poster/aw.jpg', 'uploads/banner/n.jpg', 'uploads/trailer/Official Trailer ONE PIECE FILM RED - Cinépolis Indonesia - Cinépolis Indonesia (720p, h264).mp4', 'spide', 'shfhwh', '125', '13', 'Animation', '2D', 'vito', 'vito', 'vito', 'vito', 'vuito', '20000'),
(13, 'uploads/poster/uuu.jpg', 'uploads/banner/ducati.jpg', 'uploads/trailer/KKN Di Desa Penari - Official Trailer  SEGERA di Bioskop - MD Pictures (360p, h264) (1).mp4', 'desa mantap', 'cececccb4bvjhb4vh4bjvb4bcvhj4b h', '130', 'SU', 'Action', '2D', 'r3bk', 'jbcjbc', 'j jc bj ', 'jbjbc', 'jcbjbjbec', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_film`
--

CREATE TABLE `jadwal_film` (
  `id` int(11) NOT NULL,
  `mall_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `studio` varchar(250) NOT NULL,
  `jam_tayang_1` time NOT NULL,
  `jam_tayang_2` time NOT NULL,
  `jam_tayang_3` time NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `tanggal_akhir_tayang` date NOT NULL,
  `total_menit` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_film`
--

INSERT INTO `jadwal_film` (`id`, `mall_id`, `film_id`, `studio`, `jam_tayang_1`, `jam_tayang_2`, `jam_tayang_3`, `tanggal_tayang`, `tanggal_akhir_tayang`, `total_menit`) VALUES
(1, 1, 8, 'Studio 1', '13:00:00', '15:01:00', '18:03:00', '2025-02-21', '2025-02-28', '120'),
(4, 1, 10, 'Studio 3', '15:04:00', '18:04:00', '18:04:00', '2025-02-20', '2025-02-26', '125'),
(5, 1, 12, 'Studio 3', '17:26:00', '19:26:00', '20:26:00', '2025-02-20', '2025-02-28', '125'),
(7, 1, 13, 'Studio 3', '10:05:00', '01:05:00', '14:06:00', '2025-02-25', '2025-03-08', '130');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `mall_name` varchar(250) NOT NULL,
  `seat_number` varchar(10) NOT NULL,
  `status` enum('available','occupied') NOT NULL,
  `film_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `mall_name`, `seat_number`, `status`, `film_name`) VALUES
(1, 'metland', 'A3', 'occupied', 'Godzilla'),
(2, 'metland', 'A5', 'occupied', 'Godzilla'),
(3, 'metland', 'A7', 'occupied', 'Godzilla'),
(4, 'metland', 'A6', 'occupied', 'Godzilla'),
(5, 'metland', 'D7', 'occupied', 'Godzilla'),
(6, 'metland', 'E5', 'occupied', 'Godzilla'),
(7, 'metland', 'D9', 'occupied', 'Godzilla'),
(8, 'metland', 'A9', 'occupied', 'Godzilla'),
(9, 'metland', 'A6', 'occupied', 'desa mantap'),
(10, 'metland', 'A5', 'occupied', 'one piece'),
(11, 'metland', 'A4', 'occupied', 'desa mantap'),
(12, 'metland', 'A4', 'occupied', 'Godzilla'),
(13, 'metland', 'B4', 'occupied', 'Godzilla'),
(14, 'metland', 'B5', 'occupied', 'desa mantap'),
(15, 'metland', 'B6', 'occupied', 'desa mantap'),
(16, 'metland', 'A7', 'occupied', 'desa mantap'),
(17, 'metland', 'A8', 'occupied', 'Godzilla'),
(18, 'metland', 'B1', 'occupied', 'Godzilla'),
(19, 'metland', 'B2', 'occupied', 'Godzilla'),
(20, 'metland', 'B5', 'occupied', 'Godzilla'),
(21, 'metland', 'B6', 'occupied', 'Godzilla'),
(22, 'metland', 'C5', 'occupied', 'Godzilla'),
(23, 'metland', 'A2', 'occupied', 'Godzilla'),
(24, 'metland', 'B7', 'occupied', 'Godzilla'),
(25, 'metland', 'C7', 'occupied', 'Godzilla'),
(26, 'metland', 'A8', 'occupied', 'one piece'),
(27, 'metland', 'A9', 'occupied', 'one piece'),
(28, 'metland', 'A10', 'occupied', 'one piece');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `order_id` varchar(55) NOT NULL,
  `status` varchar(20) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `username` varchar(250) NOT NULL,
  `seat_number` varchar(250) NOT NULL,
  `nama_film` varchar(231) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `status`, `payment_type`, `amount`, `transaction_time`, `username`, `seat_number`, `nama_film`) VALUES
(1, 'TIX-1740228021', 'settlement', 'qris', 60000, '2025-02-22 19:40:31', 'vitojulian38@gmail.com', 'A3', 'Godzilla'),
(2, 'TIX-1740228291', 'settlement', 'qris', 60000, '2025-02-22 19:44:51', 'vitojulian38@gmail.com', 'A5', 'Godzilla'),
(3, 'TIX-1740228530', 'settlement', 'qris', 60000, '2025-02-22 19:49:01', 'vitojulian38@gmail.com', 'A7', 'Godzilla'),
(4, 'TIX-1740361518', 'settlement', 'qris', 60000, '2025-02-24 08:45:24', 'vitojulian38@gmail.com', 'D9', 'Godzilla'),
(5, 'TIX-1740462353', 'settlement', 'qris', 100000, '2025-02-25 12:45:52', 'yuarichoirulkafikafi@gmail.com', 'A6', 'desa mantap'),
(6, 'TIX-1740462604', 'settlement', 'qris', 50000, '2025-02-25 12:50:06', 'vitojulian38@gmail.com', 'A5', 'one piece'),
(7, 'TIX-1740462812', 'settlement', 'qris', 120000, '2025-02-25 12:53:31', 'vitojulian38@gmail.com', 'A4,B4', 'Godzilla'),
(8, 'TIX-1740462924', 'settlement', 'qris', 200000, '2025-02-25 12:55:22', 'vitojulian38@gmail.com', 'B5,B6', 'desa mantap'),
(9, 'TIX-1740462998', 'settlement', 'qris', 100000, '2025-02-25 12:56:37', 'vitojulian38@gmail.com', 'A7', 'desa mantap'),
(10, 'TIX-1740463106', 'settlement', 'qris', 60000, '2025-02-25 12:58:25', 'vitojulian38@gmail.com', 'A8', 'Godzilla'),
(11, 'TIX-1740463350', 'settlement', 'qris', 120000, '2025-02-25 13:02:28', 'vitojulian38@gmail.com', 'B1,B2', 'Godzilla'),
(12, 'TIX-1740463485', 'settlement', 'qris', 120000, '2025-02-25 13:04:44', 'eghanvidia@gmail.com', 'B5,B6', 'Godzilla'),
(13, 'TIX-1740463682', 'settlement', 'qris', 60000, '2025-02-25 13:08:00', 'eghanvidia@gmail.com', 'C5', 'Godzilla'),
(14, 'TIX-1740463827', 'settlement', 'qris', 60000, '2025-02-25 13:10:26', 'eghanvidia@gmail.com', 'A2', 'Godzilla'),
(15, 'TIX-1740464026', 'settlement', 'qris', 120000, '2025-02-25 13:13:45', 'vitojulian38@gmail.com', 'B7,C7', 'Godzilla'),
(16, 'TIX-1740467360', 'settlement', 'qris', 150000, '2025-02-25 14:09:20', 'vitojulian38@gmail.com', 'A8,A9,A10', 'one piece');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(3, 'vitojulian38@gmail.com', 'vito juna', '$2y$10$No47gX2A11eGLCS2Pyt3CeGz4KhvvH4Cu4N6rHSsrSes5TTLisBnS', '2025-02-13 05:11:08'),
(5, 'eghanvidia@gmail.com', 'Bayu', '$2y$10$0xdY1mD8BMxO06bv6v2d5u2kH6MSOhy.N8dYq2eBg03oIgy9tqKky', '2025-02-25 06:04:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_mall`
--
ALTER TABLE `akun_mall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_film`
--
ALTER TABLE `jadwal_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `akun_mall`
--
ALTER TABLE `akun_mall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jadwal_film`
--
ALTER TABLE `jadwal_film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

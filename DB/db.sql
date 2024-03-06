-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 09:51 AM
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
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `id_product` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `date_exp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`id_product`, `nama_produk`, `harga`, `kategori`, `date_exp`) VALUES
(22, 'Paramex Sakit Kepala', 'Rp.13500', 'Obat Tablet', '2025-03-15'),
(23, 'OBH Combi Pilek dan Batuk Berdahak', 'Rp.27500', 'Obat Sirup', '2027-04-15'),
(25, 'Oskadon SP', 'Rp.5000', 'Obat Tablet', '2025-03-29'),
(26, 'Bodrex Flu dan Batuk 500g', 'Rp.45.500', 'Obat Tablet', '2025-03-08'),
(27, 'Betadin 500ml', 'Rp.70000', 'Pembersih Luka', '2026-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`) VALUES
(4, 'user1', 'user1@gmail.com', '$2y$10$L/3N/YGjnYGHXiG1kb5PFeJPfsgs23LynxkaVw5yFBfqdc49Tdu6C', 0),
(5, 'user2', 'user2@gmail.com', '$2y$10$4Hw/ghvIM/0409pPiDFzlu4//EIy5yUEyIyvhTm2t3WjYyjGj.cEe', 0),
(6, 'user3', 'user3@gmail.com', '$2y$10$XvRMHI8pfXDff/v9EIgEP.cEbWqo3u5FsRMqL8pu075R3WeL9jRLK', 0),
(7, 'admin', 'admin@gmail.com', '$2y$10$NtZuIkl25oT4qJl3BKQU6.9PW.gsX/A9wQOnZBHNIB/s/qSVW/LUS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 12:50 AM
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
  `harga` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `date_exp` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`id_product`, `nama_produk`, `harga`, `kategori`, `date_exp`, `foto_produk`) VALUES
(54, 'Aspilet', 24500, 'Obat Tablet', '2026-01-20', '65ec86a9acab1.png'),
(55, 'Bodrex', 15000, 'Obat Tablet', '2024-12-07', '65ec86dcc79fd.png'),
(56, 'Betadine', 14500, 'Pembersih Luka', '2025-03-09', '65ec870f46bd1.png'),
(57, 'Aspirin', 33500, 'Obat Tablet', '2026-02-04', '65ec873aafd27.png'),
(60, 'Panadol', 14000, 'Obat Tablet', '2024-03-10', '65ecfe5b10e0e.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) DEFAULT 0,
  `alamat` text NOT NULL,
  `mobile_phone` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `foto_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `role`, `alamat`, `mobile_phone`, `tanggal_lahir`, `foto_profile`) VALUES
(4, 'user1', 'user1@gmail.com', '$2y$10$L/3N/YGjnYGHXiG1kb5PFeJPfsgs23LynxkaVw5yFBfqdc49Tdu6C', 0, '', '', '', ''),
(5, 'user2', 'user2@gmail.com', '$2y$10$4Hw/ghvIM/0409pPiDFzlu4//EIy5yUEyIyvhTm2t3WjYyjGj.cEe', 0, '', '', '', ''),
(6, 'user3', 'user3@gmail.com', '$2y$10$XvRMHI8pfXDff/v9EIgEP.cEbWqo3u5FsRMqL8pu075R3WeL9jRLK', 0, '', '', '', ''),
(7, 'admin', 'admin@gmail.com', '$2y$10$NtZuIkl25oT4qJl3BKQU6.9PW.gsX/A9wQOnZBHNIB/s/qSVW/LUS', 1, '', '', '', ''),
(9, 'karyawan1', 'karyawan1@gmail.com', '$2y$10$S.hhnrI68XlZIQblAQn6PewqMi4FciaJ49A0i6vCOczKq9vMU/mi.', 2, 'blok.asus79', '000111222', '2014-03-25', '65ee470037f9d.png');

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
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

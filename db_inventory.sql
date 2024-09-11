-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 07:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventory`
--

CREATE TABLE `tb_inventory` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` varchar(25) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inventory`
--

INSERT INTO `tb_inventory` (`id`, `nama_barang`, `stock`, `harga`, `deskripsi`) VALUES
(1, 'Asus Zenbook 14 OLED', 14, '11.999.000', 'Laptop Asus'),
(2, 'Asus Zenbook DUO 2024', 16, '34.999.000', 'Laptop Asus'),
(3, 'Asus Zenbook S 13 OLED', 8, '25.999.000', 'Laptop Asus'),
(4, 'Asus Zenbook Pro 16X OLED', 4, '49.999.000', 'Laptop Asus'),
(5, 'Acer Aspire 5 Spin 14', 6, '11.999.000', 'Laptop Acer'),
(6, 'Acer Aspire 3 Spin 14', 6, '8.499.000', 'Laptop Acer'),
(7, 'Acer Aspire Slim 5', 7, '12.000.000', 'Laptop Acer'),
(8, 'Acer Predator Helios Neo 16', 5, '25.999.000', 'Laptop Acer'),
(9, 'Lenovo IDEA PAD Slim 3', 4, '6.299.000', 'Laptop Lenovo'),
(10, 'Lenovo IDEA PAD Slim 1', 6, '4.799.000', 'Laptop Lenovo'),
(11, 'Asus VivoBook 14', 3, '12.699.000', 'Laptop Asus'),
(12, 'MSI Modern 14 C7M', 6, '9.299.000', 'Laptop MSI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `stock_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_keluar`
--

INSERT INTO `tb_keluar` (`id_keluar`, `id`, `nama_barang`, `tanggal`, `stock_keluar`) VALUES
(7, 2, 'Asus Zenbook DUO 2024', '2024-05-26', 3),
(8, 1, 'Asus Zenbook 14 OLED', '2024-05-26', 2),
(9, 12, 'MSI Modern 14 C7M', '2024-05-26', 2),
(10, 7, 'Acer Aspire Slim 5', '2024-05-26', 1),
(11, 3, 'Asus Zenbook S 13 OLED', '2024-05-26', 2),
(12, 11, 'Asus VivoBook 14', '2024-05-26', 2),
(13, 12, 'MSI Modern 14 C7M', '2024-05-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_masuk`
--

CREATE TABLE `tb_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `stock_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_masuk`
--

INSERT INTO `tb_masuk` (`id_masuk`, `id`, `nama_barang`, `tanggal`, `stock_masuk`) VALUES
(21, 11, 'Asus VivoBook 14', '2024-05-26', 2),
(24, 12, 'MSI Modern 14 C7M', '2024-05-26', 6),
(25, 10, 'Lenovo IDEA PAD Slim 1', '2024-05-26', 4),
(27, 8, 'Acer Predator Helios Neo 16', '2024-05-26', 2),
(28, 7, 'Acer Aspire Slim 5', '2024-05-26', 5),
(29, 5, 'Acer Aspire 5 Spin 14', '2024-05-26', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Senn', 'SennAdminStock');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`id_keluar`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_inventory`
--
ALTER TABLE `tb_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD CONSTRAINT `tb_keluar_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tb_inventory` (`id`);

--
-- Constraints for table `tb_masuk`
--
ALTER TABLE `tb_masuk`
  ADD CONSTRAINT `tb_masuk_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tb_inventory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

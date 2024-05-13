-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2024 at 12:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoose`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'sandales'),
(4, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int(11) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `reference`, `designation`, `photo`, `price`, `name`, `quantity`, `category_id`) VALUES
(6, 'Consequatur amet d', 'Quibusdam culpa veni', 'Et necessitatibus of', '513.00', 'Shelby Delacruz', 134, 3),
(7, 'Ipsum labore nihil e', 'Enim possimus sit q', 'Nobis nulla et praes', '713.00', 'Malcolm Head', 523, 4),
(8, 'Esse exercitation r', 'Reprehenderit facere', 'Unde in in nihil acc', '36.00', 'Logan Patel', 882, 3),
(9, 'Placeat velit magni', 'Cillum pariatur Exc', 'Consectetur similiq', '542.00', 'Aurora Rios', 133, 4),
(10, 'Enim animi voluptat', 'Alias occaecat dolor', 'Iusto ut possimus m', '768.00', 'Neville Weiss', 294, 3),
(11, 'Eos sunt veritatis a', 'Minim fuga Est rep', 'Deserunt iusto sint ', '615.00', 'August Tyler', 733, 3),
(12, 'Omnis illum suscipi', 'Reprehenderit cillum', 'Odit suscipit possim', '49.00', 'Beverly Alford', 231, 3),
(13, 'Enim iste alias haru', 'Ullamco esse error e', 'Nam sint voluptatem', '393.00', 'Sade Stanley', 40, 4),
(14, 'Aspernatur asperiore', 'In animi vel impedi', 'Nihil est consequatu', '586.00', 'Julian Padilla', 469, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `is_admin`) VALUES
(1, 'zikuh', 'Pa$$w0rd!', 'xydixazi@mailinator.com', '2024-04-25 21:03:24', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

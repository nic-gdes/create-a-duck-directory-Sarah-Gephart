-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Mar 04, 2024 at 10:43 PM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 8.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ducks`
--

CREATE TABLE `ducks` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `favorite_foods` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bio` text COLLATE utf8mb4_general_ci NOT NULL,
  `img_source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'https://images.unsplash.com/photo-1598168373100-237b409b1b74?q=80&w=1329&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ducks`
--

INSERT INTO `ducks` (`id`, `name`, `favorite_foods`, `bio`, `img_source`, `created_at`) VALUES
(1, 'Dave the Duck', 'Strawberry Shortcake, Oranges, Key Lime Pie', 'Things about Dave.', './assets/images/DUCK_DAVE_FALL2022_Duck.jpg', '2024-02-05 22:32:11'),
(3, 'Gerald the Pekin', 'Cucumbers, Finger Sandwiches, Tea', 'Gerald spends his time in London practicing using his throwing stars.', './assets/images/Duck_Spring_2023_Bigger2.png', '2024-02-05 23:22:06'),
(4, 'Apricot the Bufflehead', 'Alfredo, Spaghetti, Lasagna', 'Things about Apricot.', './assets/images/DUCK_FALL_2023_01.png', '2024-02-05 23:22:06'),
(5, 'Herbert the Raven', 'Brownies, Chocolate Cupcakes, Anything Chocolate', 'He\'s a raven.', './assets/images/DUCK_FALL_2023_02.png', '2024-02-06 17:04:38'),
(6, 'Cute Duck', 'Carrots, Lettuce, Tomato', 'Stuff about Cute Duck.', './assets/images/cute_yellow_duck.jpg', '2024-02-12 23:31:02'),
(7, 'Sophisticated Duck (or Goose?)', 'Cucumbers, Finger Sandwiches, Tea', 'Stuff about Sophisticated Duck.', './assets/images/white_duck.jpg', '2024-02-12 23:31:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ducks`
--
ALTER TABLE `ducks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ducks`
--
ALTER TABLE `ducks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

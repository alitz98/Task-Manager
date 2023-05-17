-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2023 at 05:57 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `user_id`, `created_at`) VALUES
(21, 'aliiiii', 1, '2023-03-28 18:41:23'),
(58, 'mamad', 1, '2023-05-17 11:48:17'),
(59, 'mohsen', 1, '2023-05-17 12:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL,
  `user_id` int NOT NULL,
  `folder_id` int NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `user_id`, `folder_id`, `is_done`, `created_at`) VALUES
(2, 'title2', 1, 2, 1, '2023-03-29 12:30:27'),
(4, 'task4', 1, 2, 0, '2023-03-29 12:31:43'),
(11, 'efrfr', 1, 58, 1, '2023-05-17 15:02:47'),
(12, 'music', 1, 21, 1, '2023-05-17 15:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(256) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'ali', 'ali@yahoo.com', '1234', '2023-04-01 16:33:55'),
(3, 'alis', 'alis@yahoo.com', '5678', '2023-04-01 16:35:13'),
(4, 'hasan', 'hasan@yahoo.com', '789', '2023-04-01 16:36:35'),
(5, 'mamad', 'mam@yahoo.com', '9876543', '2023-04-01 16:37:43'),
(6, 'amir', 'amir@yahoo.com', '$2y$10$UwAcZxh1hwlwfgKY3PPr6.hffhducybotewHsUGOUZr6l64lqlOpW', '2023-04-01 22:48:14'),
(7, 'Alitehrani98', 'tzali24352@yahoo.com', '$2y$10$0Z3Ihb9am7b3lotHFJ1p1eTtcsOMEGU0He4dJVD4C0rYjeClGfDn.', '2023-05-17 17:43:08'),
(8, 'mohammad', 'm3@yahoo.com', '$2y$10$bPemWHPv0MMBjsoEKvkQbO0BA9JCTJyHwa6mjqNZwyWSqCcmPqjNC', '2023-05-17 18:19:13'),
(9, 'ali', 'ali3@yahoo.com', '$2y$10$AlQxSnm7WuC9s.HPhSY7PO9QKy52GwCWJWHszmrpNGeSh5q.GsEWe', '2023-05-17 18:36:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2022 at 09:17 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `fromUser` int NOT NULL,
  `toUser` int NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fromUser`, `toUser`, `message`, `time`) VALUES
(1, 2, 1, 'Hello Kashif', '2021-07-27 11:06:53'),
(2, 1, 2, 'Hello kashif', '2021-07-27 11:07:06'),
(3, 1, 2, 'Jack hal hani??', '2021-07-27 11:07:13'),
(4, 2, 1, 'Ma theak. Thy jack hal hani??', '2021-07-27 11:07:31'),
(5, 3, 3, 'Alaaaa', '2021-07-27 11:08:03'),
(6, 3, 3, 'jack hal hani?', '2021-07-27 11:08:36'),
(7, 2, 3, 'alaa', '2021-07-27 11:09:33'),
(8, 2, 3, 'jack thy nov??', '2021-07-27 11:10:24'),
(9, 3, 2, 'Jack ga naya', '2021-07-27 11:10:31'),
(10, 3, 2, 'lift aki nosh naa', '2021-07-27 11:10:46'),
(11, 4, 1, 'Hello', '2021-08-17 11:05:24'),
(12, 1, 4, 'Hello Noman', '2021-08-17 11:06:01'),
(13, 4, 1, 'Jack hal hani?', '2021-08-17 11:06:40'),
(14, 5, 2, 'Hello Farhan', '2021-09-13 12:25:43'),
(15, 2, 5, 'Hello Dear', '2021-09-13 12:26:34'),
(16, 5, 2, 'sdfsdf', '2021-09-13 12:26:47'),
(17, 7, 8, 'Hello Mujahid', '2022-03-28 16:15:46'),
(18, 8, 7, 'Hello', '2022-03-28 16:16:12'),
(19, 7, 8, 'asjkhdkas\n', '2022-03-28 16:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `user` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`) VALUES
(1, 'Kashif Zaman'),
(2, 'Farhan Faqir'),
(3, 'Karamat Ali'),
(4, 'Noman'),
(5, 'Ali Mairaj'),
(6, 'Noman'),
(7, 'Mudassir'),
(8, 'Mujahid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fromUser` (`fromUser`),
  ADD KEY `toUser` (`toUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`fromUser`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`toUser`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 10:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yapyak`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `mycontact` text NOT NULL,
  `contactwith` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `messagefrom` text NOT NULL,
  `messageto` text NOT NULL,
  `messageinfo` text NOT NULL,
  `messagetime` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `messagefrom`, `messageto`, `messageinfo`, `messagetime`) VALUES
(1, 'Online Bills', 'Ansley', 'hi', ''),
(2, 'Ansley', 'Online Bills', 'Hello Online Bills', ''),
(3, 'Online Bills', 'Ansley', 'How are you AY', ''),
(4, 'Ansley', 'Online Bills', 'I am good how are you?', ''),
(5, 'Ansley', 'Online Bills', 'I\'m coming home', ''),
(6, 'Online Bills', 'Ansley', 'Bruhhh....', ''),
(7, 'aa', 'Online Bills', 'This is aa', ''),
(8, 'Ansley', 'Online Bills', 'Ah! Very nice', ''),
(9, 'Ansley', 'Online Bills', 'Trry', ''),
(10, 'Online Bills', 'Ansley', 'guess it wokrs', ''),
(11, 'Online Bills', 'Ansley', 'How\'s it looking o\'er there?', ''),
(12, 'Ansley', 'Online Bills', 'Err thx good pal', ''),
(13, 'Online Bills', 'Ansley', 'k', ''),
(14, 'Ansley', 'Online Bills', 'ok', ''),
(16, 'Dre', 'Dre', 'yeey', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Online Bills', 'legit$online$billz'),
(2, 'Ansley', 'Younga'),
(5, 'aa', 'aa'),
(7, 'Dre', 'whatever');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 05:49 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AMIR', 'ALI', 'amirali@gmail.co', '1234', '', 1, '2022-02-12', '2022-02-13'),
(3, 'VIRAT', 'KOHLI', 'virat@gmail.com', '1234', '', 1, '2022-02-12', '0000-00-00'),
(5, 'ZAYN', 'MALIK', 'zayn@gmail.com', '1234', '', 1, '2022-02-12', '0000-00-00'),
(7, 'KARTIK', 'ARYAN', 'kartik@gmail.com', '1234', '', 1, '2022-02-12', '0000-00-00'),
(9, 'ALBERT', 'EINSTIEN', 'albert@gmail.com', '1234', '', 1, '2022-02-13', '0000-00-00'),
(10, 'TIM', 'SOUTHEE', 'tim@gmail.com', '1234', '', 1, '2022-02-14', '0000-00-00'),
(11, 'UMESH', 'YADAV', 'umesh@gmail.com', '1234', '', 1, '2022-02-14', '0000-00-00'),
(12, 'CHRIS', 'GAYLE', 'chris@gmail.com', '1234', '', 1, '2022-02-14', '0000-00-00'),
(14, 'BRIAN', 'LARA', 'brian@gmail.com', '1234', 'cat-watch-2.jpg', 1, '2022-02-14', '0000-00-00'),
(15, 'SHAHRUKH', 'KHAN', 'srk@gmail.com', '1234', 'man-31.jpg', 1, '2022-02-14', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

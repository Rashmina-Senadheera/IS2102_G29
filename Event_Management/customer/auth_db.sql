-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 02:22 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `text` varchar(255) NOT NULL,
  `rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `ammount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `email`, `account`, `date`, `ammount`) VALUES
(15, 'Daweendri ', 'daweendrihimasha98@gmail.com', '4567265', '2022-09-20', '5000'),
(16, 'ucsc', 'daweendrihimasha98@gmail.com', '4567265', '2022-12-15', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) DEFAULT NULL,
  `tel` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`, `pp`, `tel`) VALUES
(1, 'alex', 'test4@gmail.com', '$2y$10$E3R4ItygPgAAeW8qmwa.dOJNgEPGvFrZkR17N4VJkxp69p.7fuxAG', 'test4@gmail.com6384ddb147c270.08859478.jpeg', '122345'),
(2, 'sam', 'test@gmail.com', '$2y$10$lxf7PQu.S35WfLe.7xeuiuL2glShWaxHWwBqIBUpA2ACbtcypWKmq', 'test@gmail.com6384f8b8eac570.17289714.jpg', '76756782'),
(3, 'daweendri thilakarathne', 'dawee@gmail.com', '$2y$10$LJsgtu80Htj4SO660HYiJuiI6Dg.i6rAt4pY446X8lwkgZR.ZeVBC', 'dawee@gmail.com6388439cb3e1b2.05953977.jpg', '76756782'),
(5, 'sam jacob', 'sam@gmail.com', '$2y$10$Y5ekr.jrvs9a68Dz8PuOtuzAUiqphrvg.Bjyf6TyPpG.M8J4tSQ7a', 'sam@gmail.com63a02069e045c6.46317993.jpg', '0711234251');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

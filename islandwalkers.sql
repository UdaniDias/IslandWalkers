-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 05:22 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `islandwalkers`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `whereto` varchar(30) NOT NULL,
  `howmany` int(11) NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `username`, `email`, `whereto`, `howmany`, `arrivals`, `leaving`) VALUES
(1, 'Ayesha Dias', 'ayesha@gmail.com', 'Ella', 4, '2022-08-05', '2022-08-12'),
(6, 'Ayesha Dias', 'ayesha@gmail.com', 'test', 0, '2022-04-06', '2022-06-08'),
(7, '', 'pasiya@gmail.com', 'test', 5, '2022-08-20', '2022-08-27'),
(9, '', 'testnew@gmail.com', 'Galle', 5, '2022-08-13', '2022-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pid` int(15) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pid`, `pname`, `description`, `price`) VALUES
(1, 'Ella', 'Ella Has All The Best Parts Rolled Into One Enchanting A Mountain Town In Sri Lanka That Has Quickly Become A Must-Visit Destination. Read On For The Best Places To Visit In Ella And Where To Stay ! Ella In Sri Lanka Is Every Bit As Bewitching As The Name Suggests !', '70000'),
(2, 'Downsouth', 'The Down South Of Sri Lanka Is One Of The Best-Kept Secrets In The Asian Region. However, That Secret Is Quickly Revealed As More And More Travellers Gather To Sri Lanka To Its Stunning Beaches, Incredible Wildlife, Rich Culture, And Classical Heritage Landmarks!', '47000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(12, 'Ayesha Dias', 'ayesha@gmail.com', 'dias', 'user'),
(13, 'udiaz', 'ayeshadias92@gmail.com', 'd36a36c25ffe288126d40000c6c5714e', 'user'),
(14, 'udiaz', 'ayeshadiastestnew@gmail.com', 'diasupdated', 'user'),
(17, 'Udani Dias', 'udanimd@gmail.com', 'd36a36c25ffe288126d40000c6c5714e', 'admin'),
(19, 'test', 'testnew@gmail.com', 'test', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

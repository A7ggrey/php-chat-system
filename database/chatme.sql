-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 11:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatme`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(30) NOT NULL,
  `readerid` int(50) NOT NULL,
  `senderid` int(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `readerid`, `senderid`, `message`, `date`, `time`) VALUES
(1, 5, 2, 'Hello!', '15/05/2023', '10:25:48pm'),
(2, 5, 2, 'Hello!', '15/05/2023', '10:27:30pm'),
(3, 5, 2, 'Hi', '15/05/2023', '10:33:03pm'),
(4, 2, 5, 'Hello Aggrey. How Are You?', '15/05/2023', '10:35:23pm'),
(5, 3, 2, 'Hello!', '16/05/2023', '02:16:01am'),
(6, 3, 5, 'Hello', '16/05/2023', '02:49:16am'),
(7, 2, 2, 'Hello too...', '16/05/2023', '02:52:05am'),
(8, 3, 5, 'Hello', '16/05/2023', '03:27:31am'),
(9, 4, 2, 'Hello! Habari yako...', '16/05/2023', '03:34:18am'),
(10, 3, 2, 'Hi', '16/05/2023', '03:50:29am');

-- --------------------------------------------------------

--
-- Table structure for table `readmessages`
--

CREATE TABLE `readmessages` (
  `id` int(30) NOT NULL,
  `messageid` int(100) NOT NULL,
  `userid` int(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'aggrey@jrey.co.ke', '$2y$10$tz/8E0FwUPGk1Lnf3SgrA.AsnOFJ2oH18UKhL.9VfrfoCYeRVi5BC'),
(3, 'kiprop@jrey.co.ke', '$2y$10$mjJD2OlS05wKht910dqZVeNn9ucOXkajdzoUt9hA7gfV8126WSrxK'),
(4, 'aggreykiprop60@gmail.com', '$2y$10$IAsYLDbrby4IHHmOUuAfW.Wd7/Aq8rt2hyY/NRodOKsukMBl1unDC'),
(5, 'test456@developer.com', '$2y$10$Uxzwptf5yLBIzfy0EssvF..dMZ95QmEuJZeh/McuDVCa0bpF.Lmyq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `readmessages`
--
ALTER TABLE `readmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `readmessages`
--
ALTER TABLE `readmessages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

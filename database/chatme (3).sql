-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 08:49 PM
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
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_date` varchar(20) NOT NULL,
  `chat_time` varchar(20) NOT NULL,
  `current_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `user_id`, `chat_date`, `chat_time`, `current_user_id`) VALUES
(8, 2, '29/05/2023', '11:42:17am', 3),
(9, 4, '29/05/2023', '11:42:32am', 3),
(10, 5, '30/05/2023', '06:39:00pm', 3),
(11, 6, '30/05/2023', '06:42:01pm', 3);

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `follow_id` int(11) NOT NULL,
  `my_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `followed_date` varchar(20) NOT NULL,
  `followed_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`follow_id`, `my_id`, `follower_id`, `followed_date`, `followed_time`) VALUES
(1, 5, 3, '30/05/2023', '08:12:14pm'),
(2, 3, 3, '30/05/2023', '08:49:24pm'),
(3, 3, 5, '30/05/2023', '08:50:22pm'),
(4, 3, 6, '30/05/2023', '08:51:51pm'),
(5, 2, 3, '30/05/2023', '09:08:29pm'),
(6, 2, 6, '30/05/2023', '09:09:34pm'),
(7, 3, 4, '30/05/2023', '09:39:04pm'),
(8, 2, 5, '30/05/2023', '09:41:57pm');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(30) NOT NULL,
  `readerid` int(50) NOT NULL,
  `senderid` int(50) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `readerid`, `senderid`, `message`, `date`, `time`) VALUES
(49, 2, 3, 'Hello Friend!', '29/05/2023', '11:42:17am'),
(50, 4, 3, 'Hello Friend!', '29/05/2023', '11:42:32am'),
(51, 5, 3, 'Hello Friend!', '29/05/2023', '11:42:43am'),
(52, 6, 3, 'Hello Friend!', '29/05/2023', '11:53:51am'),
(53, 3, 4, 'Hello Friend. Long time...', '29/05/2023', '11:54:39am'),
(54, 3, 5, 'Hello Friend', '30/05/2023', '10:25:13am'),
(55, 5, 3, 'Long time!', '30/05/2023', '10:36:40am'),
(56, 3, 5, 'How are you?', '30/05/2023', '10:39:46am'),
(57, 3, 6, 'Hello too!', '30/05/2023', '10:47:53am'),
(58, 5, 3, 'Doing good!', '30/05/2023', '06:39:00pm'),
(59, 6, 3, 'Sasa...', '30/05/2023', '06:39:34pm'),
(60, 3, 6, 'Poa sana...', '30/05/2023', '06:42:01pm');

-- --------------------------------------------------------

--
-- Table structure for table `readmessages`
--

CREATE TABLE `readmessages` (
  `id` int(30) NOT NULL,
  `messageid` int(100) NOT NULL,
  `sender_id` int(50) NOT NULL,
  `reciever_id` int(20) NOT NULL,
  `status` int(3) NOT NULL,
  `send_date` varchar(50) NOT NULL,
  `send_time` varchar(50) NOT NULL,
  `read_date` varchar(20) NOT NULL,
  `read_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `readmessages`
--

INSERT INTO `readmessages` (`id`, `messageid`, `sender_id`, `reciever_id`, `status`, `send_date`, `send_time`, `read_date`, `read_time`) VALUES
(9, 49, 3, 2, 1, '29/05/2023', '11:42:17am', '29/05/2023', '06:08:29pm'),
(10, 50, 3, 4, 1, '29/05/2023', '11:42:32am', '30/05/2023', '09:39:00pm'),
(11, 51, 3, 5, 1, '29/05/2023', '11:42:43am', '30/05/2023', '09:04:27pm'),
(12, 52, 3, 6, 1, '29/05/2023', '11:53:51am', '30/05/2023', '08:52:18pm'),
(13, 53, 4, 3, 1, '29/05/2023', '11:54:39am', '30/05/2023', '09:44:47pm'),
(14, 54, 5, 3, 1, '30/05/2023', '10:25:13am', '30/05/2023', '09:44:47pm'),
(15, 55, 3, 5, 1, '30/05/2023', '10:36:40am', '30/05/2023', '09:04:27pm'),
(16, 56, 5, 3, 1, '30/05/2023', '10:39:46am', '30/05/2023', '09:44:47pm'),
(17, 57, 6, 3, 1, '30/05/2023', '10:47:53am', '30/05/2023', '09:44:47pm'),
(18, 58, 3, 5, 1, '30/05/2023', '06:39:00pm', '30/05/2023', '09:04:27pm'),
(19, 59, 3, 6, 1, '30/05/2023', '06:39:34pm', '30/05/2023', '08:52:18pm'),
(20, 60, 6, 3, 1, '30/05/2023', '06:42:01pm', '30/05/2023', '09:44:47pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `profile_photo` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verified` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `profile_photo`, `username`, `password`, `verified`) VALUES
(2, 'Aggrey James', 'a.png', 'aggrey@jrey.co.ke', '$2y$10$tz/8E0FwUPGk1Lnf3SgrA.AsnOFJ2oH18UKhL.9VfrfoCYeRVi5BC', 1),
(3, 'Aggrey Kiprop', 'IMG_3ltskk[1].jpg', 'kiprop@jrey.co.ke', '$2y$10$mjJD2OlS05wKht910dqZVeNn9ucOXkajdzoUt9hA7gfV8126WSrxK', 1),
(4, 'James Kiprop', 'a.png', 'aggreykiprop60@gmail.com', '$2y$10$IAsYLDbrby4IHHmOUuAfW.Wd7/Aq8rt2hyY/NRodOKsukMBl1unDC', 1),
(5, 'Test 456', 'a.png', 'test456@developer.com', '$2y$10$Uxzwptf5yLBIzfy0EssvF..dMZ95QmEuJZeh/McuDVCa0bpF.Lmyq', 1),
(6, 'Aggrey James Kiprop', 'a.png', 'aggreyjames92@gmail.com', '$2y$10$IAsYLDbrby4IHHmOUuAfW.Wd7/Aq8rt2hyY/NRodOKsukMBl1unDC', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`follow_id`);

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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `readmessages`
--
ALTER TABLE `readmessages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

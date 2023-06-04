-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 02:20 PM
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
(14, 2, '04/06/2023', '02:35:09pm', 8),
(15, 3, '04/06/2023', '03:19:08pm', 8),
(16, 4, '03/06/2023', '08:41:22pm', 8);

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
(2, 3, 3, '30/05/2023', '08:49:24pm'),
(3, 3, 5, '30/05/2023', '08:50:22pm'),
(4, 3, 6, '30/05/2023', '08:51:51pm'),
(5, 2, 3, '30/05/2023', '09:08:29pm'),
(6, 2, 6, '30/05/2023', '09:09:34pm'),
(7, 3, 4, '30/05/2023', '09:39:04pm'),
(8, 2, 5, '30/05/2023', '09:41:57pm'),
(17, 4, 3, '31/05/2023', '10:13:49pm'),
(18, 5, 3, '31/05/2023', '10:14:16pm'),
(23, 8, 8, '02/06/2023', '07:25:40pm'),
(24, 3, 8, '02/06/2023', '07:47:12pm'),
(25, 2, 8, '02/06/2023', '07:47:20pm');

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
(74, 2, 8, 'Hello', '03/06/2023', '08:40:37pm'),
(75, 3, 8, 'Hey!', '03/06/2023', '08:40:57pm'),
(76, 4, 8, 'Sasa', '03/06/2023', '08:41:22pm'),
(77, 8, 2, 'Hello', '03/06/2023', '09:01:38pm'),
(78, 2, 8, 'How are you?', '03/06/2023', '09:06:45pm'),
(79, 2, 8, 'How is home?', '03/06/2023', '09:06:54pm'),
(80, 2, 8, 'Hope all is well...', '03/06/2023', '09:16:23pm'),
(81, 2, 8, 'Wueeeeh! sasa ni blueticks!!!', '04/06/2023', '02:35:09pm'),
(82, 3, 8, 'Never online msee!', '04/06/2023', '02:38:48pm'),
(83, 3, 8, '2023-05-18 18:19:16 0 [Note] Starting MariaDB 10.4.28-MariaDB source revision c8f2e9a5c0ac5905f28b050b7df5a9ffd914b7e7 as process 6000 2023-05-18 18:19:16 0 [Note] InnoDB: Mutexes and rw_locks use Windows interlocked functions 2023-05-18 18:19:16 0 [Note] InnoDB: Uses event mutexes 2023-05-18 18:19:16 0 [Note] InnoDB: Compressed tables use zlib 1.2.12 2023-05-18 18:19:16 0 [Note] InnoDB: Number of pools: 1 2023-05-18 18:19:16 0 [Note] InnoDB: Using SSE2 crc32 instructions 2023-05-18 18:19:16 0 [Note] InnoDB: Initializing buffer pool, total size = 16M, instances = 1, chunk size = 16M 2023-05-18 18:19:16 0 [Note] InnoDB: Completed initialization of buffer pool 2023-05-18 18:19:16 0 [Note] InnoDB: Starting crash recovery from checkpoint LSN=300288 2023-05-18 18:19:17 0 [Note] InnoDB: 128 out of 128 rollback segments are active. 2023-05-18 18:19:17 0 [Note] InnoDB: Removed temporary tablespace data file: \"ibtmp1\" 2023-05-18 18:19:17 0 [Note] InnoDB: Creating shared tablespace for temporary tables 2023-05-18 18:19:17 0 [Note] InnoDB: Setting file \'C:\\xampp\\mysql\\data\\ibtmp1\' size to 12 MB. Physically writing the file full; Please wait ... 2023-05-18 18:19:17 0 [Note] InnoDB: File \'C:\\xampp\\mysql\\data\\ibtmp1\' size is now 12 MB. 2023-05-18 18:19:17 0 [Note] InnoDB: Waiting for purge to start 2023-05-18 18:19:17 0 [Note] InnoDB: 10.4.28 started; log sequence number 300297; transaction id 170 2023-05-18 18:19:17 0 [Note] InnoDB: Loading buffer pool(s) from C:\\xampp\\mysql\\data\\ib_buffer_pool 2023-05-18 18:19:17 0 [Note] Plugin \'FEEDBACK\' is disabled. 2023-05-18 18:19:17 0 [Note] Server socket created on IP: \'::\'. 2023-05-21 10:31:46 0 [Note] Starting MariaDB 10.4.28-MariaDB source revision c8f2e9a5c0ac5905f28b050b7df5a9ffd914b7e7 as process 1244 2023-05-21 10:31:46 0 [Note] InnoDB: Mutexes and rw_locks use Windows interlocked functions 2023-05-21 10:31:46 0 [Note] InnoDB: Uses event mutexes 2023-05-21 10:31:46 0 [Note] InnoDB: Compressed tables use zlib 1.2.12 2023-05-21 10:31:46 0 [Note] InnoDB: Number of pools: 1 2023-05-21 10:31:46 0 [Note] InnoDB: Using SSE2 crc32 instructions 2023-05-21 10:31:46 0 [Note] InnoDB: Initializing buffer pool, total size = 16M, instances = 1, chunk size = 16M 2023-05-21 10:31:46 0 [Note] InnoDB: Completed initialization of buffer pool 2023-05-21 10:31:47 0 [Note] InnoDB: Starting crash recovery from checkpoint LSN=300954 2023-05-21 10:31:51 0 [Note] InnoDB: 128 out of 128 rollback segments are active. 2023-05-21 10:31:51 0 [Note] InnoDB: Removed temporary tablespace data file: \"ibtmp1\" 2023-05-21 10:31:51 0 [Note] InnoDB: Creating shared tablespace for temporary tables 2023-05-21 10:31:51 0 [Note] InnoDB: Setting file \'C:\\xampp\\mysql\\data\\ibtmp1\' size to 12 MB. Physically writing the file full; Please wait ... 2023-05-21 10:31:51 0 [Note] InnoDB: File \'C:\\xampp\\mysql\\data\\ibtmp1\' size is now 12 MB. 2023-05-21 10:31:51 0 [Note] InnoDB: Waiting for purge to start 2023-05-21 10:31:51 0 [Note] InnoDB: 10.4.28 started; log sequence number 300963; transaction id 195 2023-05-21 10:31:51 0 [Note] InnoDB: Loading buffer pool(s) from C:\\xampp\\mysql\\data\\ib_buffer_pool 2023-05-21 10:31:51 0 [Note] Plugin \'FEEDBACK\' is disabled. 2023-05-21 10:31:52 0 [Note] Server socket created on IP: \'::\'. 2023-05-22 18:51:15 0 [Note] Starting MariaDB 10.4.28-MariaDB source revision c8f2e9a5c0ac5905f28b050b7df5a9ffd914b7e7 as process 7880 2023-05-22 18:51:16 0 [Note] InnoDB: Mutexes and rw_locks use Windows interlocked functions 2023-05-22 18:51:16 0 [Note] InnoDB: Uses event mutexes 2023-05-22 18:51:16 0 [Note] InnoDB: Compressed tables use zlib 1.2.12 2023-05-22 18:51:16 0 [Note] InnoDB: Number of pools: 1 2023-05-22 18:51:16 0 [Note] InnoDB: Using SSE2 crc32 instructions 2023-05-22 18:51:16 0 [Note] InnoDB: Initializing buffer pool, total size = 16M, instances = 1, chunk size = 16M 2023-05-22 18:51:16 0 [Note] InnoDB: Completed initialization of buffer pool 2023-05-22 18:51:16 0 [Note] InnoDB: Starting crash recovery from checkpoint LSN=5435696 2023-05-22 18:51:23 0 [Note] InnoDB: 128 out of 128 rollback segments are active. 2023-05-22 18:51:23 0 [Note] InnoDB: Removed temporary tablespace data file: \"ibtmp1\" 2023-05-22 18:51:23 0 [Note] InnoDB: Creating shared tablespace for temporary tables 2023-05-22 18:51:23 0 [Note] InnoDB: Setting file \'C:\\xampp\\mysql\\data\\ibtmp1\' size to 12 MB. Physically writing the file full; Please wait ... 2023-05-22 18:51:23 0 [Note] InnoDB: File \'C:\\xampp\\mysql\\data\\ibtmp1\' size is now 12 MB. 2023-05-22 18:51:23 0 [Note] InnoDB: Waiting for purge to start 2023-05-22 18:51:23 0 [Note] InnoDB: Waiting for purge to start 2023-05-22 18:51:23 0 [Note] InnoDB: Waiting for purge to start 2023-05-22 18:51:23 0 [Note] InnoDB: Waiting for purge to start 2023-05-22 18:51:23 0 [Note] InnoDB: Waiting for purge to start 2023-05-22 18:51:23 0 [Note] InnoDB: Waiting for purge to start 2023-05-22 18:51:23 0 [Note] InnoDB: 10.4.28 started; log sequence number 5435705; transaction id 1200 2023-05-22 18:51:23 0 [Note] InnoDB: Loading buffer pool(s) from C:\\xampp\\mysql\\data\\ib_buffer_pool 2023-05-22 18:51:23 0 [Note] Plugin \'FEEDBACK\' is disabled. 2023-05-22 18:51:24 0 [Note] InnoDB: Buffer pool(s) load completed at 230522 18:51:24 2023-05-22 18:51:26 0 [Note] Server socket created on IP: \'::\'. 2023-05-22 19:55:39 0 [Note] Starting MariaDB 10.4.28-MariaDB source revision c8f2e9a5c0ac5905f28b050b7df5a9ffd914b7e7 as process 4404 2023-05-22 19:55:39 0 [Note] InnoDB: Mutexes and rw_locks use Windows interlocked functions 2023-05-22 19:55:39 0 [Note] InnoDB: Uses event mutexes 2023-05-22 19:55:39 0 [Note] InnoDB: Compressed tables use zlib 1.2.12 2023-05-22 19:55:39 0 [Note] InnoDB: Number of pools: 1 2023-05-22 19:55:39 0 [Note] InnoDB: Using SSE2 crc32 instructions 2023-05-22 19:55:39 0 [Note] InnoDB: Initializing buffer pool, total size = 16M, instances = 1, chunk size = 16M 2023-05-22 19:55:39 0 [Note] InnoDB: Completed initialization of buffer pool 2023-05-22 19:55:40 0 [Note] InnoDB: Starting crash recovery from checkpoint LSN=5436750 2023-05-22 19:55:47 0 [Note] InnoDB: 128 out of 128 rollback segments are active. 2023-05-22 19:55:47 0 [Note] InnoDB: Removed temporary tablespace data file: \"ibtmp1\" 2023-05-22 19:55:47 0 [Note] InnoDB: Creating shared tablespace for temporary tables 2023-05-22 19:55:47 0 [Note] InnoDB: Setting file \'C:\\xampp\\mysql\\data\\ibtmp1\' size to 12 MB. Physically writing the file full; Please wait ... 2023-05-22 19:55:47 0 [Note] InnoDB: File \'C:\\xampp\\mysql\\data\\ibtmp1\' size is now 12 MB. 2023-05-22 19:55:47 0 [Note] InnoDB: Waiting for purge to start 2023-05-22 19:55:47 0 [Note] InnoDB: Waiting for purge to start 2023-05-22 19:55:47 0 [Note] InnoDB: Waiting for purge to start 2023-05-22 19:55:47 0 [Note] InnoDB: 10.4.28 started; log sequence number 5436759; transaction id 1228 2023-05-22 19:55:47 0 [Note] InnoDB: Loading buffer pool(s) from C:\\xampp\\mysql\\data\\ib_buffer_pool 2023-05-22 19:55:47 0 [Note] Plugin \'FEEDBACK\' is disabled. 2023-05-22 19:55:48 0 [Note] InnoDB: Buffer pool(s) load completed at 230522 19:55:48 2023-05-22 19:55:49 0 [Note] Server socket created on IP: \'::\'. 2023-05-25 21:20:40 0 [Note] Starting MariaDB 10.4.28-MariaDB source revision c8f2e9a5c0ac5905f28b050b7df5a9ffd914b7e7 as process 4680 2023-05-25 21:20:41 0 [Note] InnoDB: Mutexes and rw_locks use Windows interlocked functions 2023-05-25 21:20:41 0 [Note] InnoDB: Uses event mutexes 2023-05-25 21:20:41 0 [Note] InnoDB: Compressed tables use zlib 1.2.12 2023-05-25 21:20:41 0 [Note] InnoDB: Number of pools: 1 2023-05-25 21:20:41 0 [Note] InnoDB: Using SSE2 crc32 instructions 2023-05-25 21:20:41 0 [Note] InnoDB: Initializing buffer pool, total size = 16M, instances = 1, chunk size = 16M 2023-05-25 21:20:41 0 [Note] InnoDB: Completed initialization of buffer pool 2023-05-25 21:20:41 0 [Note] InnoDB: Starting crash recovery from checkpoint LSN=5491551 2023-05-25 21:20:48 0 [Note] InnoDB: 128 out of 128 rollback segments are active. 2023-05-25 21:20:48 0 [Note] InnoDB: Removed temporary tablespace data file: \"ibtmp1\" 2023-05-25 21:20:48 0 [Note] InnoDB: Creating shared tablespace for temporary tables 2023-05-25 21:20:48 0 [Note] InnoDB: Setting file \'C:\\xampp\\mysql\\data\\ibtmp1\' size to 12 MB. Physically writing the file full; Please wait ... 2023-05-25 21:20:48 0 [Note] InnoDB: File \'C:\\xampp\\mysql\\data\\ibtmp1\' size is now 12 MB. 2023-05-25 21:20:48 0 [Note] InnoDB: Waiting for purge to start 2023-05-25 21:20:48 0 [Note] InnoDB: Waiting for purge to start 2023-05-25 21:20:48 0 [Note] InnoDB: Waiting for purge to start 2023-05-25 21:20:49 0 [Note] InnoDB: Waiting for purge to start 2023-05-25 21:20:49 0 [Note] InnoDB: Waiting for purge to start 2023-05-25 21:20:49 0 [Note] InnoDB: Waiting for purge to start 2023-05-25 21:20:49 0 [Note] InnoDB: 10.4.28 started; log sequence number 5491560; transaction id 1451 2023-05-25 21:20:49 0 [Note] InnoDB: Loading buffer pool(s) from C:\\xampp\\mysql\\data\\ib_buffer_pool 2023-05-25 21:20:49 0 [Note] Plugin \'FEEDBACK\' is disabled. 2023-05-25 21:20:50 0 [Note] InnoDB: Buffer pool(s) load completed at 230525 21:20:50 2023-05-25 21:20:51 0 [Note] Server socket created on IP: \'::\'. 2023-05-30 21:48:33 0 [Note] Starting MariaDB 10.4.28-MariaDB source revision c8f2e9a5c0ac5905f28b050b7df5a9ffd914b7e7 as process 13400 2023-05-30 21:48:34 0 [Note] InnoDB: Mutexes and rw_locks use Windows interlocked functions 2023-05-30 21:48:34 0 [Note] InnoDB: Uses event mutexes 2023-05-30 21:48:34 0 [Note] InnoDB: Compressed tables use zlib 1.2.12 2023-05-30 21:48:34 0 [Note] InnoDB: Number of pools: 1 2023-05-30 21:48:34 0 [Note] InnoDB: Using SSE2 crc32 instructions 2023-05-30 21:48:34 0 [Note] InnoDB: Initializing buffer pool, total size = 16M, instances = 1, chunk size = 16M 2023-05-30 21:48:34 0 [Note] InnoDB: Completed initialization of buffer pool 2023-05-30 21:48:35 0 [Note] InnoDB: Starting crash recovery from checkpoint LSN=6711415 2023-05-30 21:48:38 0 [Note] InnoDB: 128 out of 128 r', '04/06/2023', '02:40:47pm'),
(84, 8, 3, 'Hello', '04/06/2023', '03:19:00pm'),
(85, 8, 3, 'How are you?', '04/06/2023', '03:19:08pm');

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
(34, 74, 8, 2, 1, '03/06/2023', '08:40:37pm', '04/06/2023', '02:33:12pm'),
(35, 75, 8, 3, 1, '03/06/2023', '08:40:57pm', '04/06/2023', '03:19:08pm'),
(36, 76, 8, 4, 0, '03/06/2023', '08:41:22pm', '', ''),
(37, 77, 2, 8, 1, '03/06/2023', '09:01:38pm', '04/06/2023', '02:35:10pm'),
(38, 78, 8, 2, 1, '03/06/2023', '09:06:45pm', '04/06/2023', '02:33:12pm'),
(39, 79, 8, 2, 1, '03/06/2023', '09:06:54pm', '04/06/2023', '02:33:12pm'),
(40, 80, 8, 2, 1, '03/06/2023', '09:16:23pm', '04/06/2023', '02:33:12pm'),
(41, 81, 8, 2, 0, '04/06/2023', '02:35:09pm', '', ''),
(42, 82, 8, 3, 1, '04/06/2023', '02:38:48pm', '04/06/2023', '03:19:08pm'),
(43, 83, 8, 3, 1, '04/06/2023', '02:40:47pm', '04/06/2023', '03:19:08pm'),
(44, 84, 3, 8, 0, '04/06/2023', '03:19:00pm', '', ''),
(45, 85, 3, 8, 0, '04/06/2023', '03:19:08pm', '', '');

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
(6, 'Aggrey James Kiprop', 'a.png', 'aggreyjames92@gmail.com', '$2y$10$IAsYLDbrby4IHHmOUuAfW.Wd7/Aq8rt2hyY/NRodOKsukMBl1unDC', 1),
(8, 'Aggrey', 'IMG_3ltskk[1].jpg', 'aggrey@gmail.com', '$2y$10$9jYcYv2ohNRgki/JONee.ehU6WKe/M7XIhEPZhw/gXhJm2MXKbBPu', 1);

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
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `readmessages`
--
ALTER TABLE `readmessages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

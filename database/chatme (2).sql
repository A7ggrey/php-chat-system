-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 07:03 AM
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
(2, 3, '23/05/2023', '09:21:35pm', 2),
(3, 4, '23/05/2023', '09:29:00pm', 2),
(5, 5, '23/05/2023', '10:03:38pm', 3),
(6, 2, '25/05/2023', '06:19:09am', 6);

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
(13, 3, 2, 'Hello Kiprop', '23/05/2023', '09:21:35pm'),
(15, 2, 3, 'Hello Aggrey. How are you?', '23/05/2023', '09:58:44pm'),
(16, 5, 3, 'Hello Test', '23/05/2023', '10:03:38pm'),
(17, 3, 5, 'Hello Kiprop.', '23/05/2023', '10:04:29pm'),
(18, 2, 3, 'Going good Kiprop. How are you?', '23/05/2023', '10:22:42pm'),
(19, 3, 2, 'Doing good!', '23/05/2023', '10:30:04pm'),
(20, 3, 2, 'How are you?', '23/05/2023', '10:30:16pm'),
(21, 2, 3, 'Doing fine too, Long time...', '23/05/2023', '10:46:42pm'),
(22, 3, 2, 'How are the kids?', '23/05/2023', '10:52:06pm'),
(23, 2, 3, 'Doing good. Missing their favorite uncle...', '23/05/2023', '10:53:34pm'),
(24, 2, 3, 'Will you come visit them, sometime?', '24/05/2023', '08:17:51pm'),
(25, 3, 2, 'Sure. Will be free next Sunday...', '24/05/2023', '10:21:16pm'),
(26, 2, 6, 'Hello Aggrey James', '25/05/2023', '06:19:09am'),
(27, 6, 2, 'Hello Name sake! How are you doing?', '25/05/2023', '06:25:32am'),
(28, 6, 2, 'Long time...', '25/05/2023', '06:25:42am'),
(29, 6, 2, 'How is home?', '25/05/2023', '06:25:59am'),
(30, 2, 3, 'Will be waiting bro', '26/05/2023', '08:18:49am'),
(31, 2, 3, 'Have a wonderful day!', '27/05/2023', '01:30:11am'),
(32, 3, 2, 'Same there Kiprop!', '27/05/2023', '02:29:09am'),
(33, 2, 3, 'Goodbye Friend.', '27/05/2023', '02:38:15am'),
(34, 2, 3, 'MICROSOFT SOFTWARE LICENSE TERMS MICROSOFT POWER BI REPORT BUILDER IF YOU LIVE IN (OR ARE A BUSINESS', '27/05/2023', '03:39:14am'),
(35, 2, 3, 'MICROSOFT SOFTWARE LICENSE TERMS MICROSOFT POWER BI REPORT BUILDER IF YOU LIVE IN (OR ARE A BUSINESS WITH A PRINCIPAL PLACE OF BUSINESS IN) THE UNITED STATES, PLEASE READ THE “BINDING ARBITRATION AND CLASS ACTION WAIVER” SECTION BELOW. IT AFFECTS HOW DISPUTES ARE RESOLVED. These license terms are an agreement between you and Microsoft Corporation (or one of its affiliates). They apply to the software named above and any Microsoft services or software updates (except to the extent such services or updates are accompanied by new or additional terms, in which case those different terms apply prospectively and do not alter your or Microsoft’s rights relating to pre-updated software or services). IF YOU COMPLY WITH THESE LICENSE TERMS, YOU HAVE THE RIGHTS BELOW. BY USING THE SOFTWARE, YOU ACCEPT THESE TERMS. 1.	INSTALLATION AND USE RIGHTS. a)	General. You may install and use any number of copies of the software. b)	Included Microsoft Programs. The software contains other Microsoft programs. Any content provided through Bing Maps, including geocodes, can only be used within the software through which the content is provided. Your use of Bing Maps is governed by the Bing Maps End User Terms of Use available at go.microsoft.com/?linkid=9710837 and the Bing Maps Privacy Statement available at go.microsoft.com/fwlink/?LinkID=248686. c)	Third Party Software. The software may include third party applications that are licensed to you under this agreement or under their own terms. License terms, notices, and acknowledgements, if any, for the third party applications may be accessible online at <http://aka.ms/thirdpartynotices> or in an accompanying notices file. Even if such applications are governed by other agreements, the disclaimer, limitations on, and exclusions of damages below also apply to the extent allowed by applicable law.', '27/05/2023', '03:40:18am'),
(36, 2, 3, 'Thanks for the guide. See you soon. Goodbye.', '27/05/2023', '04:08:30am'),
(37, 2, 3, 'Then', '27/05/2023', '04:34:36am'),
(38, 2, 3, 'At least!', '27/05/2023', '04:37:37am'),
(39, 2, 3, 'Good Morning', '29/05/2023', '07:29:52am'),
(40, 2, 3, 'Good Morning', '29/05/2023', '07:30:41am'),
(41, 2, 3, 'How are you doing?', '29/05/2023', '07:32:03am'),
(42, 2, 3, 'Just saying Hi!', '29/05/2023', '07:38:21am'),
(43, 5, 3, 'How are you?', '29/05/2023', '07:57:45am');

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
(1, 15, 3, 2, 0, '29/05/2023', '07:30:41am', '', ''),
(2, 15, 3, 2, 0, '29/05/2023', '07:32:03am', '', ''),
(3, 42, 3, 2, 0, '29/05/2023', '07:38:21am', '', ''),
(4, 43, 3, 5, 0, '29/05/2023', '07:57:45am', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `profile_photo` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `profile_photo`, `username`, `password`) VALUES
(2, 'Aggrey James', 'a.png', 'aggrey@jrey.co.ke', '$2y$10$tz/8E0FwUPGk1Lnf3SgrA.AsnOFJ2oH18UKhL.9VfrfoCYeRVi5BC'),
(3, 'Aggrey Kiprop', 'IMG_3ltskk[1].jpg', 'kiprop@jrey.co.ke', '$2y$10$mjJD2OlS05wKht910dqZVeNn9ucOXkajdzoUt9hA7gfV8126WSrxK'),
(4, 'James Kiprop', 'a.png', 'aggreykiprop60@gmail.com', '$2y$10$IAsYLDbrby4IHHmOUuAfW.Wd7/Aq8rt2hyY/NRodOKsukMBl1unDC'),
(5, 'Test 456', 'a.png', 'test456@developer.com', '$2y$10$Uxzwptf5yLBIzfy0EssvF..dMZ95QmEuJZeh/McuDVCa0bpF.Lmyq'),
(6, 'Aggrey James Kiprop', 'a.png', 'aggreyjames92@gmail.com', '$2y$10$FJnxTJuXjzmuhXAR9KG.X.3i2VmIUgdXoU101/wW243K46/bmnTdm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

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
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `readmessages`
--
ALTER TABLE `readmessages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

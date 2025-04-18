-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 11:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifeedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'AdminPrince', '7c6a180b36896a0a8c02787eeafb0e4c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classroomstbl`
--

CREATE TABLE `classroomstbl` (
  `classroomId` int(11) NOT NULL,
  `instructorId` bigint(20) DEFAULT NULL,
  `sectionId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroomstbl`
--

INSERT INTO `classroomstbl` (`classroomId`, `instructorId`, `sectionId`) VALUES
(1, 11111111111, 1),
(2, 11111111112, 1),
(3, 11111111113, 1),
(4, 11111111114, 1),
(5, 11111111115, 1),
(6, 11111111111, 2),
(7, 11111111112, 2),
(8, 11111111113, 2),
(9, 11111111114, 2),
(10, 11111111115, 2),
(11, 11111111111, 3),
(12, 11111111112, 3),
(13, 11111111113, 3),
(14, 11111111114, 3),
(15, 11111111115, 3),
(16, 11111111111, 4),
(17, 11111111112, 4),
(18, 11111111113, 4),
(19, 11111111114, 4),
(20, 11111111115, 4),
(21, 11111111111, 5),
(22, 11111111112, 5),
(23, 11111111113, 5),
(24, 11111111114, 5),
(25, 11111111115, 5),
(26, 11111111116, 6),
(27, 11111111117, 6),
(28, 11111111118, 6),
(29, 11111111119, 6),
(30, 11111111120, 6),
(31, 11111111116, 7),
(32, 11111111117, 7),
(33, 11111111118, 7),
(34, 11111111119, 7),
(35, 11111111120, 7),
(36, 11111111116, 8),
(37, 11111111117, 8),
(38, 11111111118, 8),
(39, 11111111119, 8),
(40, 11111111120, 8),
(41, 11111111116, 9),
(42, 11111111117, 9),
(43, 11111111118, 9),
(44, 11111111119, 9),
(45, 11111111120, 9),
(46, 11111111116, 10),
(47, 11111111117, 10),
(48, 11111111118, 10),
(49, 11111111119, 10),
(50, 11111111120, 10),
(51, 11111111121, 11),
(52, 11111111122, 11),
(53, 11111111123, 11),
(54, 11111111124, 11),
(55, 11111111125, 11);

-- --------------------------------------------------------

--
-- Table structure for table `instructorstbl`
--

CREATE TABLE `instructorstbl` (
  `id` int(11) NOT NULL,
  `instructorId` bigint(20) NOT NULL,
  `instructorEmail` varchar(255) NOT NULL,
  `instructorFullName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructorstbl`
--

INSERT INTO `instructorstbl` (`id`, `instructorId`, `instructorEmail`, `instructorFullName`, `password`) VALUES
(1, 11111111111, 'Instructor1@gmail.com', 'John Smith', '$2y$10$ERqmQNKJd9YecFEVA3Yxhe70XHg/i8TGEU4j2vabhdnpgW5KyzdHO'),
(2, 11111111112, 'Instructor2@gmail.com', 'Jane Doe', '$2y$10$0bIdnXJ.5NZHFP7eTZ0gdu4hPJ8RSsVik2Sd1l7tZgqo5Ce/widKq'),
(3, 11111111113, 'Instructor3@gmail.com', 'Michael Brown', '$2y$10$w16sXrTQN55wpGdKyRZXduT40rc0XZlT9MngzGork4LoYWCOCvVTa'),
(4, 11111111114, 'Instructor4@gmail.com', 'Emily Chen', '$2y$10$AMec9aCf1bQeVF7X7oiolOyNV5lwv91cEQICc74Pzu/DEI8OgNPJq'),
(5, 11111111115, 'Instructor5@gmail.com', 'David Lee', '$2y$10$vOdZ/pkmEGlX6xdksVH2DOpkM6CjTapJEF59KSH1b6U7gZI4xDX0C'),
(6, 11111111116, 'Instructor6@gmail.com', 'Sarah Taylor', '$2y$10$4QTuJzCG55xmNjABCp5QxeFTJ8./eltELyB1S1jKBXdt5jtxZnOne'),
(7, 11111111117, 'Instructor7@gmail.com', 'Kevin White', '$2y$10$zyozPwKAwIvkM0BUCxBk5ehSGcrOE6O5Mhyrct2rK9Uud5xyRdjRC'),
(8, 11111111118, 'Instructor8@gmail.com', 'Rebecca Hall', '$2y$10$3roHcHfBw64jPTTEy7FOA.zPASvv9Kau7tc5e.XtadnxAxET4v.8u'),
(9, 11111111119, 'Instructor9@gmail.com', 'James Martin', '$2y$10$JI77JMvE9fx0VxyBL.74s.oOfoDxh9p3Ex6JeIjp6o.lnxkwjbuvi'),
(10, 11111111120, 'Instructor10@gmail.com', 'Olivia Harris', '$2y$10$4r8NcBOIvEep.sMhLwJB2.VxipvDILVMu2SMmjp2TfZJu.K9C5/h2'),
(11, 11111111121, 'Instructor11@gmail.com', 'Ethan Clark', '$2y$10$1tgLi7R9VB2usXQrcJ24jux2YTDPpHj4PkfO8sl3OxkZrpiuFlW6G'),
(12, 11111111122, 'Instructor12@gmail.com', 'Natalie Wright', '$2y$10$QfBB4InPHQhyEZXvE6CN7.h3c8ccVKJbYhQ5R2K99DLrmzf.dKUSO'),
(13, 11111111123, 'Instructor13@gmail.com', 'Daniel Walker', '$2y$10$yMqq2pOrhRlPb8c4KfewBOMGLyGqO0.mAsUYb6T2up5Go7CR.Afe.'),
(14, 11111111124, 'Instructor14@gmail.com', 'Chloe Adams', '$2y$10$i6f1EnqPlN3jacdFY9B0HO21iZ8kpWykgcLS9W7U9HZ0eOI9rVMEG'),
(15, 11111111125, 'Instructor15@gmail.com', 'Liam Turner', '$2y$10$WnrL69/pIu9arWk0Sndf.u/A0nCDxyNOgqo6nAUPk0xSXtEpj7S2C');

-- --------------------------------------------------------

--
-- Table structure for table `sectiontbls`
--

CREATE TABLE `sectiontbls` (
  `sectionId` int(11) NOT NULL,
  `sectionName` varchar(100) NOT NULL,
  `sectionDescription` varchar(500) DEFAULT 'No description provided'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sectiontbls`
--

INSERT INTO `sectiontbls` (`sectionId`, `sectionName`, `sectionDescription`) VALUES
(1, 'ABM101A', 'Accountancy, Business, Management'),
(2, 'ABM201A', 'Accountancy, Business, Management'),
(3, 'CULART101A', 'Culinary Arts'),
(4, 'CULART201A', 'Culinary Arts'),
(5, 'HUMSS201A', 'Humanities and Social Sciences'),
(6, 'ICTE101A', 'Information and Communications Technology'),
(7, 'ICTE102A', 'Information and Communications Technology'),
(8, 'ICTE201A', 'Information and Communications Technology'),
(9, 'ICTE202P', 'Information and Communications Technology Practical'),
(10, 'TOPE101A', 'Technology and Engineering Principles'),
(11, 'TOPE201A', 'Technology and Engineering Principles');

-- --------------------------------------------------------

--
-- Table structure for table `studentratingstbl`
--

CREATE TABLE `studentratingstbl` (
  `id` int(11) NOT NULL,
  `instructorId` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL,
  `sectionId` int(11) DEFAULT NULL,
  `rating1` int(11) DEFAULT NULL,
  `rating2` int(11) DEFAULT NULL,
  `rating3` int(11) DEFAULT NULL,
  `rating4` int(11) DEFAULT NULL,
  `rating5` int(11) DEFAULT NULL,
  `rating6` int(11) DEFAULT NULL,
  `rating7` int(11) DEFAULT NULL,
  `rating8` int(11) DEFAULT NULL,
  `rating9` int(11) DEFAULT NULL,
  `rating10` int(11) DEFAULT NULL,
  `freeComment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentratingstbl`
--

INSERT INTO `studentratingstbl` (`id`, `instructorId`, `studentID`, `sectionId`, `rating1`, `rating2`, `rating3`, `rating4`, `rating5`, `rating6`, `rating7`, `rating8`, `rating9`, `rating10`, `freeComment`) VALUES
(1, 2147483647, 2147483647, 7, 2, 2, 2, 2, 2, 2, 2, 2, 3, 2, '12345ytu');

-- --------------------------------------------------------

--
-- Table structure for table `studentstbl`
--

CREATE TABLE `studentstbl` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `sectionId` int(11) DEFAULT NULL,
  `studentId` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `evalStatus` int(11) DEFAULT 0 CHECK (`evalStatus` in (0,1))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentstbl`
--

INSERT INTO `studentstbl` (`id`, `firstName`, `middleName`, `surname`, `sectionId`, `studentId`, `username`, `password`, `evalStatus`) VALUES
(4, 'NEW', 'USER', 'TESTER', 7, '12345098765', 'NEWUSERFORTESTING', 'c20ad4d76fe97759aa27a0c99bff6710', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `studentID` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `activity_name` varchar(255) DEFAULT NULL,
  `activity_date` datetime DEFAULT NULL,
  `activity_consequences` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `studentID`, `activity_name`, `activity_date`, `activity_consequences`) VALUES
(7, 2147483647, 'User Signup', '2025-04-03 23:14:19', 'New student account created'),
(8, 2147483647, 'User Signup', '2025-04-03 23:16:30', 'New student account created'),
(9, 2147483647, 'User Signup', '2025-04-03 23:54:09', 'New student account created'),
(10, 2147483647, 'User Signup', '2025-04-03 23:54:39', 'New student account created'),
(11, 2147483647, 'User Signup', '2025-04-03 23:56:57', 'New student account created'),
(12, 2147483647, 'User Signup', '2025-04-11 02:41:07', 'New student account created'),
(13, 2147483647, 'User Signup', '2025-04-11 02:55:30', 'New student account created'),
(14, 2000373452, 'Evaluated an Instructor', '2025-04-11 04:39:42', 'Successfully evaluated an instructor'),
(15, 2000373452, 'Evaluated an Instructor', '2025-04-11 04:40:05', 'Successfully evaluated an instructor'),
(16, 2000347201, 'Evaluated an Instructor', '2025-04-15 10:16:19', 'Successfully evaluated an instructor'),
(17, 2000347201, 'Evaluated an Instructor', '2025-04-15 10:16:55', 'Successfully evaluated an instructor'),
(18, 2000347201, 'Evaluated an Instructor', '2025-04-15 10:57:04', 'Successfully evaluated an instructor'),
(19, 2000347201, 'Evaluated an Instructor', '2025-04-16 00:30:37', 'Successfully evaluated an instructor'),
(20, 2147483647, 'User Signup', '2025-04-17 15:56:06', 'New student account created'),
(21, 2147483647, 'User Signup', '2025-04-17 16:15:02', 'New student account created'),
(22, 2147483647, 'User Signup', '2025-04-17 22:27:32', 'New student account created'),
(23, 2147483647, 'User Signup', '2025-04-17 22:34:52', 'New student account created'),
(24, 2147483647, 'User Signup', '2025-04-17 22:48:12', 'New student account created');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroomstbl`
--
ALTER TABLE `classroomstbl`
  ADD PRIMARY KEY (`classroomId`),
  ADD KEY `instructorId` (`instructorId`),
  ADD KEY `sectionId` (`sectionId`);

--
-- Indexes for table `instructorstbl`
--
ALTER TABLE `instructorstbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructorId` (`instructorId`),
  ADD UNIQUE KEY `instructorEmail` (`instructorEmail`);

--
-- Indexes for table `sectiontbls`
--
ALTER TABLE `sectiontbls`
  ADD PRIMARY KEY (`sectionId`),
  ADD UNIQUE KEY `sectionName` (`sectionName`);

--
-- Indexes for table `studentratingstbl`
--
ALTER TABLE `studentratingstbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentstbl`
--
ALTER TABLE `studentstbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectionId` (`sectionId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroomstbl`
--
ALTER TABLE `classroomstbl`
  MODIFY `classroomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `instructorstbl`
--
ALTER TABLE `instructorstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

--
-- AUTO_INCREMENT for table `sectiontbls`
--
ALTER TABLE `sectiontbls`
  MODIFY `sectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1233;

--
-- AUTO_INCREMENT for table `studentratingstbl`
--
ALTER TABLE `studentratingstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentstbl`
--
ALTER TABLE `studentstbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classroomstbl`
--
ALTER TABLE `classroomstbl`
  ADD CONSTRAINT `classroomstbl_ibfk_1` FOREIGN KEY (`instructorId`) REFERENCES `instructorstbl` (`instructorId`),
  ADD CONSTRAINT `classroomstbl_ibfk_2` FOREIGN KEY (`sectionId`) REFERENCES `sectiontbls` (`sectionId`);

--
-- Constraints for table `studentstbl`
--
ALTER TABLE `studentstbl`
  ADD CONSTRAINT `studentstbl_ibfk_1` FOREIGN KEY (`sectionId`) REFERENCES `sectiontbls` (`sectionId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

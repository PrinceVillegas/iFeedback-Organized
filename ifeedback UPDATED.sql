-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 04:04 AM
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
-- Table structure for table `instructorstbl`
--

CREATE TABLE `instructorstbl` (
  `instructorID` int(11) NOT NULL,
  `instructor_username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructorstbl`
--

INSERT INTO `instructorstbl` (`instructorID`, `instructor_username`, `password`, `department`) VALUES
(1, 'Instructor1', '7c6a180b36896a0a8c02787eeafb0e4c', 'Tourism and Management'),
(2, 'Instructor2', '6cb75f652a9b52798eb6cf2201057c73', 'IT'),
(3, 'Instructor3', '819b0643d6b89dc9b579fdfc9094f28e', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `ratingstbl`
--

CREATE TABLE `ratingstbl` (
  `ratingID` int(11) NOT NULL,
  `instructorID` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL,
  `studentSection` varchar(255) DEFAULT NULL,
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
(11, 'TOPE201A', 'Technology and Engineering Principles'),
(34, '16278490', 'Acdaihbjahbdha'),
(35, 'ghujikolp', 'dada');

-- --------------------------------------------------------

--
-- Table structure for table `studentstbl`
--

CREATE TABLE `studentstbl` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `studentID` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `contactNumber` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmPassword` varchar(50) NOT NULL,
  `evalStatus` tinyint(1) DEFAULT NULL CHECK (`evalStatus` in (1,0))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentstbl`
--

INSERT INTO `studentstbl` (`Id`, `firstName`, `middleName`, `surname`, `studentID`, `section`, `contactNumber`, `username`, `password`, `confirmPassword`, `evalStatus`) VALUES
(2, 'Prince Benedict', 'Roldan', 'Villegas', 1111111111, '', 2147483647, 'princeVillegas', 'c18f5b45e6af35d7375147b736ed59ea', '', 0),
(3, 'Jenna Marie', 'Cabrera', 'Serrano', 2000373452, '', 2147483647, 'jnnsrrn', '076dfd0fcc56b66c8dff69e4cc93a5a5', '', 0),
(4, 'Aneeza Amor', '', 'Castro', 2000345442, '', 2147483647, 'aneezacastro', '3e633949376f626cc014ee28594328b5', '', 0),
(5, 'Orlando ', 'Cantila', 'Agbisit', 11102000, '', 2147483647, 'MangJuan16', '41d3b43271700332b7aa8763e931869e', '', 0),
(6, 'Nhiel', 'Perez', 'Piza', 2000347201, '', 2147483647, 'Pizanhiel', '0e32e77262bbc4b4552eda6563cdd6ee', '', 0),
(7, 'Warren', '', 'Rosqueta', 2147483647, '', 45685, 'Loukram', '28720b97999095e4af1e3b8722bb0d65', '', 0),
(14, 'adrian joseph', 'de leon', 'pinca', 12096675, 'ICTE202P', 2147483647, 'adrian', '492a44ee4bda33551b0f1e49025d7d2a', '', 0),
(15, 'Marvielyn ', 'Saysay', 'Obsenares', 2000363986, 'ICTE202P', 921600000, 'mabganda', 'e96001fb758f90e12ca4184b08326887', '', 0),
(16, 'john', 'david', 'babia', 2000365802, 'ICTE202P', 2147483647, 'david', 'aeb192ed36774b3d8d684f33f8d29a20', '', 0),
(17, 'Jose', 'Santos', 'Santos', 2000376028, 'ICTE202P', 2147483647, 'toxin0', '202cb962ac59075b964b07152d234b70', '', 0),
(18, 'kenneth ', 'sd', 'velasco', 200346273, 'ICTE202P', 1313123, 'yoru', '202cb962ac59075b964b07152d234b70', '', 0),
(19, 'Jiamwayne', 'Arenas', 'Amor', 2000346372, 'ICTE202P', 2147483647, 'Darius', '76f229d1a5ed49b3973727c0f7cf0d70', '', 0),
(21, '12345', '23456', '23456', 123456, 'ABM101A', 13456, 'qwerty', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', 0),
(22, 'Rafael Louise', 'Del Rosario', 'Cortes', 2000354248, 'ICTE201P', 0, 'rafaelcortes', '8c01756eaf04318f1d558f56ff87481a', '', 0),
(23, 'Mherie', 'Vizarra', 'Tumbale', 2000536278, 'ICTE102A', 0, 'mherie', 'dd6770ad9050a69b4868c2d3e7f74bb9', '', 0),
(24, 'John Hero', 'Manungay', 'Reyes', 2000397725, 'ICTE102A', 0, 'Hewo', 'e10adc3949ba59abbe56e057f20f883e', '', 0),
(25, 'Princess Chelsea', 'Camba', 'San Miguel', 2000371653, 'TOPE201A', 0, 'eiomii', 'f6a5bbb23bfb319204763419586be91f', '', 0),
(26, 'Claire Anne', 'I.', 'Gonzales', 2000360599, 'TOPE201A', 0, 'kiana', '243922a33e2cd059ef61f5cf56eaee31', '', 0),
(27, 'Christine ', 'M.', 'Rico', 2000132456, 'TOPE201A', 0, 'rics', '57b2e7b82f57107242ee8b8c61710132', '', 0),
(28, 'Cheamil ', 'Xandrei', 'Frasco', 2000357413, 'TOPE201A', 0, 'Xeandre', 'd9a43a292aad8e4c12da531a4ddda860', '', 0),
(29, 'Precious ', 'Martizano', 'Luna', 2000348013, 'ABM201A', 0, 'lunaprecious08', 'a70f63ec62eaf1707c7ee9f8a3a5c88d', '', 0),
(30, 'Rish Joren', 'Bayungan', 'Ocampo', 2000378557, 'ABM201A', 0, 'rishocampo', '3646bb14c262f078f1ab21278724c1f7', '', 0),
(31, 'Jay', 'Managbanag', 'Halayahay', 2000354408, 'CULART201A', 0, 'jay', '637c5147d43b7a7a5a45eaccc8d062b3', '', 0),
(32, 'Jayb', 'Gannaban', 'Balboa', 2000354408, 'CULART201A', 0, 'BALBOA', '74ca47bc41700e0108b36358f27d9219', '', 0),
(33, 'Kian Joshua', 'Melgar', 'Rai', 2000369503, 'CULART201A', 0, 'raitkianjoshua', 'b94b4daae76d9621fa068b2de51e556a', '', 0),
(34, 'Benzel', 'Secuya', 'Gracilla', 363963, 'HUMSS201A', 0, 'benzel', '74d3627ca59d0cc5ca8ce84a2341e67d', '', 0),
(35, 'Matt Raven', 'Castidades', 'Mangali', 328962, 'HUMSS201A', 0, 'Matt ', '101a6ec9f938885df0a44f20458d2eb4', '', 0),
(36, 'Albert', '', 'Gravito', 1234567891, 'ICTE102A', 0, 'Albert', '202cb962ac59075b964b07152d234b70', '', 0),
(43, '', '', '', 0, '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0),
(44, 'Testing1', 'lang', 'langpo', 2147483647, 'ICTE201P', 0, 'TESTINGtesting', 'ab816fdfdc7e70fa7b0404bdedf73852', '', 0),
(45, '', '', '', 0, '', 0, '', '', '', 0),
(46, 'gt', 'qewfre', 'wqefrt', 2147483647, '', 0, '5432', '$2y$10$Cloi3ppN5TEcEGKRnKusM.5r3SRHz.7iTQdcJaGJzLB', '', NULL),
(47, 'uyhgtf', 'ikjuhyg', 'iujyt', 2147483647, '', 0, 'diakdjhadjkadkajhdha', '$2y$10$kLN1tVf9xFrkoF5hMYMdu.MQFBu4764BmBtkvsJ7gTE', '', NULL),
(48, 'i7ju6hy5gt', '87u6y5t', NULL, 2147483647, '2', 0, 'lokijuh', '$2y$10$mhm3ikAWfMBWwKa11ceRP.oVhYMbQf76jDMhlYd/hM0', '', 0),
(49, '342t53h', 'awdfesgbdg', 'afesgfdgnf', 2147483647, '4', 0, 'oikujynhtbgfvdcs', '$2y$10$0LSiNKWBENX1Dftp/x0ku.AlVn6.cvednZ2eqZzE9XN', '', 0),
(50, 'fwes', 'wefdsc', 'wefds', 2147483647, 'ghujikolp', 0, 'ferbdgf', '$2y$10$tBa31QSQ/W8UxQDaWwzycOlc5THQa2If7cZIoID9rBK', '', 0);

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
(11, 2147483647, 'User Signup', '2025-04-03 23:56:57', 'New student account created');

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
-- Indexes for table `instructorstbl`
--
ALTER TABLE `instructorstbl`
  ADD PRIMARY KEY (`instructorID`);

--
-- Indexes for table `ratingstbl`
--
ALTER TABLE `ratingstbl`
  ADD PRIMARY KEY (`ratingID`),
  ADD KEY `instructorID` (`instructorID`);

--
-- Indexes for table `sectiontbls`
--
ALTER TABLE `sectiontbls`
  ADD PRIMARY KEY (`sectionId`),
  ADD UNIQUE KEY `sectionName` (`sectionName`);

--
-- Indexes for table `studentstbl`
--
ALTER TABLE `studentstbl`
  ADD PRIMARY KEY (`Id`);

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
-- AUTO_INCREMENT for table `ratingstbl`
--
ALTER TABLE `ratingstbl`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sectiontbls`
--
ALTER TABLE `sectiontbls`
  MODIFY `sectionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `studentstbl`
--
ALTER TABLE `studentstbl`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratingstbl`
--
ALTER TABLE `ratingstbl`
  ADD CONSTRAINT `ratingstbl_ibfk_1` FOREIGN KEY (`instructorID`) REFERENCES `instructorstbl` (`instructorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

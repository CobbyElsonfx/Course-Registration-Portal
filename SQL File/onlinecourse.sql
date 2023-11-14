-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 12:52 PM
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
-- Database: `onlinecourse`
--
CREATE DATABASE IF NOT EXISTS `onlinecourse` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `onlinecourse`;

-- --------------------------------------------------------

--
-- Table structure for table `accountsoffice`
--

CREATE TABLE `accountsoffice` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accountsoffice`
--

INSERT INTO `accountsoffice` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'account', 'f925916e2754e5e03f75dd58a5733251', '2022-01-31 16:21:18', '2022-01-31 16:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2022-01-31 16:21:18', '2023-11-07 19:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `courseCode` varchar(255) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `courseUnit` varchar(255) DEFAULT NULL,
  `noofSeats` int(11) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCode`, `courseName`, `courseUnit`, `noofSeats`, `creationDate`, `updationDate`, `department_id`) VALUES
(1, 'PHP01', 'PHP', '5', 10, '2022-02-10 17:23:28', NULL, NULL),
(2, 'C001', 'C++', '12', 25, '2022-02-11 00:52:46', '11-02-2022 06:23:06 AM', NULL),
(3, 'JB4', 'Physics', '3', 24, '2023-11-05 15:25:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courseenrolls`
--

CREATE TABLE `courseenrolls` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `programme` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `enrollDate` timestamp NULL DEFAULT current_timestamp(),
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courseenrolls`
--

INSERT INTO `courseenrolls` (`id`, `studentRegno`, `pincode`, `session`, `programme`, `level`, `semester`, `course`, `enrollDate`, `department_id`) VALUES
(1, '10806121', '822894', 1, '0', 2, 3, 1, '2022-02-11 00:59:33', NULL),
(2, '10806121', '822894', 1, 'Science', 1, 2, 2, '2022-02-11 01:01:07', NULL),
(3, '10806121', '822894', 1, '1', 2, 2, 1, '2023-11-05 13:00:43', NULL),
(4, '10806121', '822894', 3, 'Science', 2, 3, 1, '2023-11-05 15:24:00', NULL),
(5, '10806121', '822894', 3, 'Science', 2, 3, 2, '2023-11-05 15:24:00', NULL),
(6, '10806121', '822894', 3, 'Science', 2, 3, 1, '2023-11-05 15:25:14', NULL),
(7, '10806121', '822894', 3, 'Science', 2, 3, 2, '2023-11-05 15:25:14', NULL),
(11, '200045681', '538956', 3, 'Science', 2, 3, 2, '2023-11-06 15:00:19', NULL),
(12, '200045681', '538956', 3, 'Science', 2, 3, 3, '2023-11-06 15:00:20', NULL),
(13, '200045681', '538956', 3, 'Science', 2, 3, 1, '2023-11-06 15:01:11', NULL),
(14, '200045681', '538956', 3, 'Science', 2, 3, 2, '2023-11-06 15:01:11', NULL),
(15, '200045681', '538956', 3, 'Science', 2, 3, 3, '2023-11-06 15:01:11', NULL),
(16, '200045681', '538956', 3, 'Maths/Science', 1, 2, 1, '2023-11-08 17:36:23', NULL),
(18, 'ABC123', NULL, 2023, 'Maths', 1, 1, 101, '2023-11-12 17:15:42', NULL),
(19, 'DEF456', NULL, 2023, 'ICT', 2, 1, 201, '2023-11-12 17:15:42', NULL),
(20, 'GHI789', NULL, 2023, 'Physics', 3, 1, 301, '2023-11-12 17:15:42', NULL),
(21, 'JKL012', NULL, 2023, 'Chemistry', 1, 2, 102, '2023-11-12 17:15:42', NULL),
(22, 'MNO345', NULL, 2023, 'Biology', 2, 2, 202, '2023-11-12 17:15:42', NULL),
(23, 'PQR678', NULL, 2023, 'Computer Science', 3, 2, 302, '2023-11-12 17:15:42', NULL),
(24, 'STU901', NULL, 2023, 'English Literature', 1, 3, 103, '2023-11-12 17:15:42', NULL),
(25, 'VWX234', NULL, 2023, 'History', 2, 3, 203, '2023-11-12 17:15:42', NULL),
(26, 'YZA567', NULL, 2023, 'Economics', 3, 3, 303, '2023-11-12 17:15:42', NULL),
(27, 'BCD890', NULL, 2023, 'Psychology', 1, 4, 104, '2023-11-12 17:15:42', NULL),
(28, '20001234', NULL, 3, '2', 2, 5, 2, '2023-11-12 21:35:22', NULL),
(29, '20001234', NULL, 4, '', 3, 2, 1, '2023-11-13 16:49:54', NULL),
(30, '20001234', NULL, 4, '', 3, 2, 2, '2023-11-13 16:49:54', NULL),
(31, '20001234', NULL, 4, '', 3, 2, 3, '2023-11-13 16:49:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`, `creationDate`) VALUES
(4, 'Science/ICT', '2023-11-05 15:27:24'),
(5, 'Mathematics/Science', '2023-11-05 15:27:39'),
(6, 'Primary Education', '2023-11-05 15:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `creationDate`) VALUES
(1, '100', '2022-02-11 00:59:02'),
(2, '200', '2022-02-11 00:59:02'),
(3, '300', '2022-02-11 00:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `newstitle` varchar(255) DEFAULT NULL,
  `newsDescription` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `newstitle`, `newsDescription`, `postingDate`) VALUES
(3, 'New Course Started C#', 'This is sample text for testing.', '2022-02-11 00:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `program`, `category`) VALUES
(1, 'Maths/Science', 'JHS Education'),
(2, 'Science/ICT', 'JHS Education'),
(3, 'Maths/ICT', 'JHS Education'),
(4, 'Technical', 'JHS Education'),
(5, 'Home Economics', 'JHS Education'),
(6, 'Visual arts', 'JHS Education'),
(7, 'Early Grade', 'PRIMARY EDUCATION'),
(8, 'Upper Primary', 'PRIMARY EDUCATION');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `creationDate`, `updationDate`) VALUES
(1, '1', '2022-02-10 17:22:49', NULL),
(2, '2', '2022-02-10 17:22:55', NULL),
(3, '3', '2022-02-11 00:51:43', NULL),
(5, 'First Semester', '2023-11-05 13:02:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `creationDate`) VALUES
(3, '2024', '2023-11-05 15:23:22'),
(4, '2035', '2023-11-06 16:28:43'),
(5, '2035', '2023-11-06 16:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentRegno` varchar(255) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `programme` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `creationdate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `cleared` tinyint(1) DEFAULT 0,
  `level` int(11) DEFAULT NULL CHECK (`level` in (100,200,300,400))
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentRegno`, `studentPhoto`, `password`, `surname`, `firstname`, `programme`, `pincode`, `session`, `department`, `semester`, `creationdate`, `updationDate`, `cleared`, `level`) VALUES
('20001234', NULL, '9cd7c4591a45ff927c8fc7cc1e6dd0f0', 'Cobby', 'Jones', 'Maths/ICT', '870069', NULL, NULL, NULL, '2023-11-12 15:32:43', NULL, 0, 200),
('200043840', NULL, '07811dc6c422334ce36a09ff5cd6fe71', 'Adusei ', 'Bright', '2', '808520', NULL, NULL, NULL, '2023-11-14 02:05:09', NULL, 1, 300),
('200045598', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'Ebenezer ', 'Adu', '3', '732781', NULL, NULL, NULL, '2023-11-14 02:09:59', NULL, 1, 400);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `studentRegno`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, '10806121', 0x3a3a3100000000000000000000000000, '2022-02-11 00:55:07', NULL, 1),
(2, '10806121', 0x3a3a3100000000000000000000000000, '2022-02-11 00:57:00', NULL, 1),
(3, '10806121', 0x3a3a3100000000000000000000000000, '2022-02-11 00:57:22', '11-02-2022 06:31:26 AM', 1),
(4, '10806121', 0x3a3a3100000000000000000000000000, '2023-11-05 12:44:46', '05-11-2023 06:15:16 PM', 1),
(5, '10806121', 0x3a3a3100000000000000000000000000, '2023-11-05 12:59:23', NULL, 1),
(6, '1234', 0x3a3a3100000000000000000000000000, '2023-11-05 13:03:37', NULL, 1),
(7, '10806121', 0x3a3a3100000000000000000000000000, '2023-11-05 15:08:13', NULL, 1),
(8, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-05 15:32:28', NULL, 1),
(9, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-06 14:07:29', '06-11-2023 07:55:17 PM', 1),
(10, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-06 14:29:41', '06-11-2023 08:02:35 PM', 1),
(11, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-06 14:32:55', '06-11-2023 08:05:24 PM', 1),
(12, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-06 14:35:41', '06-11-2023 08:35:51 PM', 1),
(13, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-06 15:56:57', '06-11-2023 09:30:31 PM', 1),
(14, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-06 16:16:17', '06-11-2023 09:46:29 PM', 1),
(15, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-06 16:41:08', '06-11-2023 10:12:02 PM', 1),
(16, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-07 11:40:49', '07-11-2023 05:23:58 PM', 1),
(17, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-07 13:12:32', '07-11-2023 07:00:00 PM', 1),
(18, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-08 16:46:30', '08-11-2023 10:17:35 PM', 1),
(19, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-08 16:49:28', '08-11-2023 10:24:12 PM', 1),
(20, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-08 17:14:56', '08-11-2023 10:50:16 PM', 1),
(21, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-08 17:20:58', '09-11-2023 01:18:43 AM', 1),
(22, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-09 01:38:15', '09-11-2023 07:50:59 AM', 1),
(23, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-11 20:06:07', NULL, 1),
(24, '200045681', 0x3a3a3100000000000000000000000000, '2023-11-11 20:11:52', '12-11-2023 01:42:19 AM', 1),
(25, '200044641', 0x3a3a3100000000000000000000000000, '2023-11-12 12:01:48', '12-11-2023 05:34:04 PM', 1),
(26, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 15:33:48', '12-11-2023 09:07:35 PM', 1),
(27, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 15:41:49', NULL, 1),
(28, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 15:41:50', '12-11-2023 09:12:37 PM', 1),
(29, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 15:44:48', '12-11-2023 09:15:08 PM', 1),
(30, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 16:20:05', NULL, 1),
(31, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 17:04:48', '12-11-2023 10:35:12 PM', 1),
(32, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 17:05:35', '13-11-2023 12:24:06 AM', 1),
(33, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 20:15:46', '13-11-2023 02:01:09 AM', 1),
(34, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 20:40:32', NULL, 1),
(35, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 20:54:55', '13-11-2023 02:55:50 AM', 1),
(36, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 21:26:49', '13-11-2023 03:46:11 AM', 1),
(37, '200045682', 0x3a3a3100000000000000000000000000, '2023-11-12 22:30:30', '13-11-2023 04:06:29 AM', 1),
(38, '200045682', 0x3a3a3100000000000000000000000000, '2023-11-12 22:43:14', NULL, 1),
(39, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 23:25:06', NULL, 1),
(40, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 23:25:54', NULL, 1),
(41, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-12 23:26:25', NULL, 1),
(42, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-13 13:00:04', '13-11-2023 06:35:59 PM', 1),
(43, '20001234', 0x3a3a3100000000000000000000000000, '2023-11-13 16:47:54', NULL, 1),
(44, '200043840', 0x3a3a3100000000000000000000000000, '2023-11-14 02:11:36', NULL, 1),
(45, '200045598', 0x3a3a3100000000000000000000000000, '2023-11-14 02:14:10', NULL, 1),
(46, '200045598', 0x3a3a3100000000000000000000000000, '2023-11-14 02:23:47', '14-11-2023 07:53:52 AM', 1),
(47, '200045598', 0x3a3a3100000000000000000000000000, '2023-11-14 02:24:12', '14-11-2023 07:56:31 AM', 1),
(48, '200045598', 0x3a3a3100000000000000000000000000, '2023-11-14 02:34:37', '14-11-2023 08:04:39 AM', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountsoffice`
--
ALTER TABLE `accountsoffice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_course_department` (`department_id`);

--
-- Indexes for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_courseenrolls_department` (`department_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountsoffice`
--
ALTER TABLE `accountsoffice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_course_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

--
-- Constraints for table `courseenrolls`
--
ALTER TABLE `courseenrolls`
  ADD CONSTRAINT `FK_courseenrolls_department` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"onlinecourse\",\"table\":\"students\"},{\"db\":\"onlinecourse\",\"table\":\"level\"},{\"db\":\"onlinecourse\",\"table\":\"courseenrolls\"},{\"db\":\"onlinecourse\",\"table\":\"programme\"},{\"db\":\"onlinecourse\",\"table\":\"program_category\"},{\"db\":\"onlinecourse\",\"table\":\"department\"},{\"db\":\"onlinecourse\",\"table\":\"admin\"},{\"db\":\"onlinecourse\",\"table\":\"accountsoffice\"},{\"db\":\"onlinecourseregistration\",\"table\":\"students\"},{\"db\":\"onlinecourseregistration\",\"table\":\"admin\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'onlinecourse', 'courseenrolls', '{\"sorted_col\":\"`courseenrolls`.`programme` DESC\"}', '2023-11-12 17:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-11-14 11:51:43', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":178}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

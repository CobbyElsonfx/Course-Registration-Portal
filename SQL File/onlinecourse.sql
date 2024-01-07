-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 02:08 AM
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
  `semester_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `isCore` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `courseCode`, `courseName`, `courseUnit`, `noofSeats`, `creationDate`, `updationDate`, `semester_id`, `programme_id`, `level_id`, `isCore`) VALUES
(1, 'PHP01', 'PHP', '5', 10, '2022-02-10 17:23:28', NULL, NULL, NULL, NULL, 0),
(2, 'C001', 'C++', '12', 25, '2022-02-11 00:52:46', '11-02-2022 06:23:06 AM', NULL, NULL, NULL, 0),
(3, 'JB4', 'Physics', '3', 24, '2023-11-05 15:25:03', NULL, NULL, NULL, NULL, 0),
(8, 'JB76', 'Chem', '5', 0, '2023-11-28 10:37:21', NULL, NULL, 1, 4, 0),
(9, 'JB76', 'Chem', '5', 0, '2023-11-28 10:47:02', NULL, NULL, 1, 4, 0),
(10, 'jb5', 'Tech', '5', 0, '2023-11-28 11:26:12', NULL, NULL, 4, 4, 0),
(11, 'jb5', 'Tech', '5', 0, '2023-11-28 11:36:30', NULL, NULL, 4, 4, 0),
(18, 'AAA', 'AAAAA', '5', 0, '2023-12-03 01:59:46', NULL, NULL, 0, 2, 1),
(19, 'AAA', 'AAAAA', '5', 0, '2023-12-03 02:01:18', NULL, NULL, 0, 2, 1),
(20, 'JB4', 'Added now', '4', 0, '2023-12-04 13:23:54', NULL, NULL, 2, 3, 0),
(27, 'JB4', 'Elson', '4', 0, '2023-12-10 13:52:18', NULL, NULL, 6, 3, 0),
(28, 'JB4', 'Elson', '4', 0, '2023-12-10 13:53:37', NULL, NULL, 6, 3, 0),
(29, 'JB4', 'Elson', '4', NULL, '2023-12-10 13:55:00', NULL, NULL, 6, 3, 0),
(30, 'JB33', 'Pedagogy 1', '3', NULL, '2023-12-22 11:15:35', NULL, NULL, 0, 1, 1),
(31, 'CB3', 'Communication Skils', '3', NULL, '2023-12-22 14:05:36', NULL, NULL, 0, 1, 1),
(32, 'LTE3', 'Mathematics', '3', NULL, '2023-12-22 16:01:59', NULL, NULL, 0, 1, 1),
(36, 'BB', 'Chem', '3', NULL, '2024-01-05 12:29:20', NULL, 1, 1, 2, 0),
(37, 'CC', 'Bio ', '3', NULL, '2024-01-05 12:30:26', NULL, 1, 0, 4, 1);

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
  `programme_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courseenrolls`
--

INSERT INTO `courseenrolls` (`id`, `studentRegno`, `pincode`, `session`, `programme`, `level`, `semester`, `course`, `enrollDate`, `programme_id`) VALUES
(0, '2000045681', NULL, 0, 'Science/ICT', 200, 0, 18, '2024-01-02 18:31:04', NULL);

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
-- Table structure for table `graduation`
--

CREATE TABLE `graduation` (
  `graduationID` int(11) NOT NULL,
  `studentRegno` varchar(20) DEFAULT NULL,
  `graduationDate` date DEFAULT NULL,
  `additionalInfo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `graduation`
--

INSERT INTO `graduation` (`graduationID`, `studentRegno`, `graduationDate`, `additionalInfo`) VALUES
(1, '', '2024-01-16', 'Graduated from Level 400');

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
(3, '300', '2022-02-11 00:59:09'),
(4, '400', '2023-11-26 23:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

CREATE TABLE `programme` (
  `id` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `creationDate` date DEFAULT NULL,
  `total_students` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`id`, `program`, `category`, `creationDate`, `total_students`) VALUES
(1, 'Maths/Science', 'JHS Education', NULL, 0),
(2, 'Science/ICT', 'JHS Education', NULL, 20),
(3, 'Maths/ICT', 'JHS Education', NULL, 0),
(4, 'Technical', 'JHS Education', NULL, 0),
(5, 'Home Economics', 'JHS Education', NULL, 0),
(6, 'Visual arts', 'JHS Education', NULL, 0),
(7, 'Early Grade', 'PRIMARY EDUCATION', NULL, 100),
(8, 'Upper Primary', 'PRIMARY EDUCATION', NULL, 0),
(10, 'ICT', 'JHS Education', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `studentRegno` varchar(255) NOT NULL,
  `courseCode` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `grade` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`, `creationDate`, `updationDate`, `programme_id`, `level_id`) VALUES
(1, 'First Semester', '2022-02-10 17:22:49', NULL, NULL, NULL),
(2, 'Second Semester', '2022-02-10 17:22:55', NULL, NULL, NULL);

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
(0, 'wera', '2023-12-26 13:41:36'),
(4, '2035', '2023-11-06 16:28:43'),
(5, '2035', '2023-11-06 16:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentRegno` varchar(20) NOT NULL,
  `studentPhoto` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `otherName` varchar(255) DEFAULT NULL,
  `programme` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `currentSemester` varchar(255) DEFAULT NULL,
  `creationdate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `cleared` tinyint(1) DEFAULT 0,
  `level` int(5) DEFAULT NULL,
  `email` varchar(255) DEFAULT 'noemail@example.com',
  `contactNumber` int(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `enrollmentDate` date DEFAULT NULL,
  `promotionCount` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentRegno`, `studentPhoto`, `password`, `surname`, `firstname`, `otherName`, `programme`, `pincode`, `session`, `semester`, `currentSemester`, `creationdate`, `updationDate`, `cleared`, `level`, `email`, `contactNumber`, `dob`, `enrollmentDate`, `promotionCount`) VALUES
('', NULL, '4190d0148ad6a3115b1c8be6b2fe1cba', '', '', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, '', 0, '0000-00-00', '2023-01-01', 0),
('1910019', NULL, '728d6fc4fb8d05ac7915d7cd119d91d1', 'ADDAE', 'ROBERT', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 300, 'addaerobert1910019@gmail.com', 243706968, '0000-00-00', '2023-01-01', 3),
('1910027', NULL, NULL, 'OBENG', 'MICHAEL', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'obengmichael1910027@gmail.com', 242431404, '0000-00-00', '2023-01-01', 3),
('1910038', NULL, NULL, 'ASANTE ', 'MICHAEL ', 'JADEN', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'asantemichael1910038@gmail.com', 247277899, '0000-00-00', '2023-01-01', 1),
('1910060', '', NULL, 'APPIAH ', 'VICTOR ', 'John', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'appiahvictor1910060@gmail.com', 548472723, '0000-00-00', '2023-01-01', 6),
('1910066', NULL, NULL, 'ASIEDU ', 'ENOCK ', 'TAWIAH', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'asieduenock1910066@gmail.com', 548495137, '0000-00-00', '2023-01-01', 1),
('1922893', NULL, NULL, 'BOAHENE', 'PATRICK', ' TANNOR', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'boahenepatrick1922893@gmail.com', 552162340, '2035-03-09', '2023-01-01', 1),
('1931125', NULL, NULL, 'ODUM', 'THOMAS ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 200, 'odumthomas1931125@gmail.com', 553832065, '0000-00-00', '2023-01-01', 1),
('2000045681', NULL, '9cd7c4591a45ff927c8fc7cc1e6dd0f0', 'ANDOH', 'FRANCIS', 'Kwabena', '2', '809946', NULL, NULL, NULL, '2023-12-21 23:24:34', NULL, 1, 200, 'andohfrancis9187@gmail.com', 558119187, NULL, '2023-01-01', 1),
('200042825', NULL, NULL, 'CUDJOE ', 'VIVIAN ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:23', NULL, 0, 200, 'cudjoevivian200042825@gmail.com', 541482541, '0000-00-00', '2023-01-01', 1),
('200042837', NULL, NULL, 'AMANKWAA ', 'SAMUEL ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 200, 'amankwaasamuel200042837@gmail.com', 546748655, '0000-00-00', '2023-01-01', 1),
('200042844', NULL, NULL, 'AWUKU ', 'FRANCIS ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'awukufrancis200042844@gmail.com', 241891733, '0000-00-00', '2023-01-01', 1),
('200042852', NULL, NULL, 'MANU ', 'PRINCE ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'manuprince200042852@gmail.com', 543575452, '0000-00-00', '2023-01-01', 1),
('200042854', NULL, NULL, 'APPIAH ', 'FRANK  ', 'BOAMAH', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 200, 'appiahfrank200042854@gmail.com', 555306899, '0000-00-00', '2023-01-01', 1),
('200042855', NULL, NULL, 'NYANTAKYI ', 'SAMPSON ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'nyantakyisampson200042855@gmail.com', 556958242, '0000-00-00', '2023-01-01', 1),
('200042864', NULL, NULL, 'MANU ', 'FRANCIS ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 200, 'manufrancis200042864@gmail.com', 541712686, '0000-00-00', '2023-01-01', 1),
('200042876', NULL, NULL, 'MENSAH ', 'LILLY ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'mensahlilly200042876@gmail.com', 553831637, '0000-00-00', '2023-01-01', 1),
('200042886', NULL, NULL, 'NYAME ', 'ANTHONY ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'nyameanthony200042886@gmail.com', 546099696, '0000-00-00', '2023-01-01', 1),
('200042902', NULL, NULL, 'NKRUMAH ', 'EVANS ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'nkrumahevans200042902@gmail.com', 559825681, '0000-00-00', '2023-01-01', 1),
('200042904', NULL, NULL, 'ANSAH ', 'SAMUEL ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 200, 'ansahsamuel200042904@gmail.com', 544486611, '0000-00-00', '2023-01-01', 1),
('200042906', NULL, NULL, 'BOATENG ', 'SAMUEL ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 200, 'boatengsamuel200042906@gmail.com', 540678350, '0000-00-00', '2023-01-01', 1),
('200042907', NULL, NULL, 'YEBOAH ', 'KWABENA ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 200, 'yeboahkwabena200042907@gmail.com', 551574290, '0000-00-00', '2023-01-01', 1),
('200042910', NULL, NULL, 'AMPOFOWAA ', 'MABEL ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'ampofowaamabel200042910@gmail.com', 549027561, '0000-00-00', '2023-01-01', 1),
('200042913', NULL, NULL, 'BRUCE', 'HANNAH', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:23', NULL, 0, 200, 'brucehannah200042913@gmail.com', 556119102, '0000-00-00', '2023-01-01', 1),
('200042921', NULL, NULL, 'SARPONMAA ', 'RITA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'sarponmaarita200042921@gmail.com', 553182244, '0000-00-00', '2023-01-01', 1),
('200042922', NULL, NULL, 'BOADIWAA ', 'MAVIS ', 'AMA ', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'boadiwaamavis200042922@gmail.com', 549834340, '0000-00-00', '2023-01-01', 1),
('200042925', NULL, NULL, 'GYIMAH ', 'EMMANUEL ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'gyimahemmanuel200042925@gmail.com', 549368956, '0000-00-00', '2023-01-01', 1),
('200042930', NULL, NULL, 'FOSU ', 'DORCAS ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 200, 'fosudorcas200042930@gmail.com', 540294403, '0000-00-00', '2023-01-01', 1),
('200042937', NULL, NULL, 'MENSAH ', 'RICHMOND ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'mensahrichmond200042937@gmail.com', 558146715, '0000-00-00', '2023-01-01', 1),
('200042949', NULL, NULL, 'OPOKU ', 'GRACE ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 200, 'opokugrace200042949@gmail.com', 542781228, '0000-00-00', '2023-01-01', 1),
('200042954', NULL, NULL, 'AFFUKAAH ', 'PETIENCE ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 200, 'affukaahpetience200042954@gmail.com', 552680237, '0000-00-00', '2023-01-01', 1),
('200042970', NULL, NULL, 'ADJEI ', 'JONES ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 200, 'adjeijones200042970@gmail.com', 544854489, '0000-00-00', '2023-01-01', 1),
('200042971', NULL, NULL, 'ARTHUR ', 'FRANK ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 200, 'arthurfrank200042971@gmail.com', 554805972, '0000-00-00', '2023-01-01', 1),
('200042975', NULL, NULL, 'SARPONG ', 'MATILDA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'sarpongmatilda200042975@gmail.com', 540524845, '0000-00-00', '2023-01-01', 1),
('200042978', NULL, NULL, 'OPARE ', 'SAMUEL ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 200, 'oparesamuel200042978@gmail.com', 549226727, '0000-00-00', '2023-01-01', 1),
('200042981', NULL, NULL, 'DUODU-KUMI ', 'SANDRA ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'duodu-kumisandra200042981@gmail.com', 248631771, '0000-00-00', '2023-01-01', 1),
('200043001', NULL, NULL, 'BABA ', 'ABDUL ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'babaabdul200043001@gmail.com', 243378730, '0000-00-00', '2023-01-01', 1),
('200043014', NULL, NULL, 'NTAADU ', 'NICHOLAS ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'ntaadunicholas200043014@gmail.com', 545127787, '0000-00-00', '2023-01-01', 1),
('200043021', NULL, NULL, 'MBEH ', 'MARY ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'mbehmary200043021@gmail.com', 555341741, '0000-00-00', '2023-01-01', 1),
('200043030', NULL, NULL, 'ISSIFU ', 'BARIKISU ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'issifubarikisu200043030@gmail.com', 553459685, '0000-00-00', '2023-01-01', 1),
('200043031', NULL, NULL, 'TWUMASI ', 'SANDRA ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 200, 'twumasisandra200043031@gmail.com', 553505240, '0000-00-00', '2023-01-01', 1),
('200043033', NULL, NULL, 'YEBOAH', 'VERONICA', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 200, 'yeboahveronica200043033@gmail.com ', 556509761, '0000-00-00', '2023-01-01', 1),
('200043053', NULL, NULL, 'AMPONSAH ', 'DORIS ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'amponsahdoris200043053@gmail.com', 550775749, '0000-00-00', '2023-01-01', 1),
('200043088', NULL, NULL, 'ASAMOAH ', 'PATRICIA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 200, 'asamoahpatricia200043088@gmail.com', 558878353, '0000-00-00', '2023-01-01', 1),
('200043103', NULL, NULL, 'MAHMOUD ', 'YUSSIF ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'mahmoudyussif200043103@gmail.com', 542666809, '0000-00-00', '2023-01-01', 1),
('200043111', NULL, NULL, 'ASARE BAFFOUR', 'GEORGE ', 'ERNEST', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 200, 'asarebaffourgeorge200043111@gmail.com', 555878216, '0000-00-00', '2023-01-01', 1),
('200043112', NULL, NULL, 'ASAMPONG ', 'GIDEON ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 200, 'asamponggideon200043112@gmail.com', 240793174, '0000-00-00', '2023-01-01', 1),
('200043113', NULL, NULL, 'OFORI ', 'CASTRO ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 200, 'oforicastro200043113@gmail.com', 245073744, '0000-00-00', '2023-01-01', 1),
('200043116', NULL, NULL, 'FUACHIE ', 'LYDIA ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 200, 'fuachielydia200043116@gmail.com', 557322586, '0000-00-00', '2023-01-01', 1),
('200043119', NULL, NULL, 'OKOM', 'RITA', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 200, 'okomrita200043119@gmail.com', 540621144, '0000-00-00', '2023-01-01', 1),
('200043123', NULL, NULL, 'AGBEMENU ', 'BENJAMIN ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 200, 'agbemenubenjamin200043123@gmail.com', 549538368, '0000-00-00', '2023-01-01', 1),
('200043126', NULL, NULL, 'Kwarteng ', 'ELVIS', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'kwartengelvis200043126@gmail.com', 544207998, '0000-00-00', '2023-01-01', 1),
('200043127', NULL, NULL, 'AIDOO ', 'ENOCH ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 200, ' aidooenoch200043127@gmail.com', 547444893, '0000-00-00', '2023-01-01', 1),
('200043140', NULL, NULL, 'ANTWI ', 'BERNICE ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 200, 'antwibernice200043140@gmail.com', 241588936, '0000-00-00', '2023-01-01', 1),
('200043145', NULL, NULL, 'KWARTENG ', 'BISMARK', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'kwartengbismark200043145@gmail.com', 557256775, '0000-00-00', '2023-01-01', 1),
('200043154', NULL, NULL, 'AYAMAH ', 'ANTHONY ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'ayamahanthony200043154@gmail.com', 546503740, '0000-00-00', '2023-01-01', 1),
('200043163', NULL, NULL, 'AMPONSAH ', 'ABRAHAM ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'amponsahabraham200043163@gmail.com', 245586988, '0000-00-00', '2023-01-01', 1),
('200043169', NULL, NULL, 'NKRUMAH ', 'GABRIEL ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 200, 'nkrumahgabriel200043169@gmail.com', 241133901, '0000-00-00', '2023-01-01', 1),
('200043171', NULL, NULL, 'MAWULI ', 'KENNETH ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'mawulikenneth200043171@gmail.com', 551103128, '0000-00-00', '2023-01-01', 1),
('200043183', NULL, NULL, 'APUSIGA ', 'WISDOM ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 200, 'apusigawisdom200043183@gmail.com', 544536624, '0000-00-00', '2023-01-01', 1),
('200043199', NULL, NULL, 'AMEDIOLE ', 'FELICIA  ', 'NELSON', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 200, 'amediolefelicia200043199@gmail.com', 549019855, '0000-00-00', '2023-01-01', 1),
('200043201', NULL, NULL, 'BOATENG ', 'MISSPA ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'boatengmisspa200043201@gmail.com', 507128957, '0000-00-00', '2023-01-01', 1),
('200043211', NULL, NULL, 'ARTHUR ', 'ISAAC ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 200, 'arthurisaac200043211@gmail.com', 553670285, '0000-00-00', '2023-01-01', 1),
('200043219', NULL, NULL, 'ASARE', 'GABRIEL ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 200, 'asaregabriel200043219@gmail.com', 558024893, '0000-00-00', '2023-01-01', 1),
('200043231', NULL, NULL, 'KYERAA ', 'ANGELINA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'kyeraaangelina200043231@gmail.com', 505683079, '0000-00-00', '2023-01-01', 1),
('200043243', NULL, NULL, 'BASANYIN ', 'KODUA ', 'OSBORN ', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'basanyinkodua200043243@gmail.com', 542628132, '0000-00-00', '2023-01-01', 1),
('200043258', NULL, NULL, 'MENSAH ', 'KENNETH ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'mensahkenneth200043258@gmail.com', 242542415, '0000-00-00', '2023-01-01', 1),
('200043264', NULL, NULL, 'ACKAAH ', 'CHARLES  ', 'TAWIAH', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 200, 'ackaahcharles200043264@gmail.com', 545932493, '0000-00-00', '2023-01-01', 1),
('200043267', NULL, NULL, 'SERWAA', 'TURKSON', 'DEBORA', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'serwaaturkson200043267@gmail.com', 507602598, '0000-00-00', '2023-01-01', 1),
('200043284', NULL, NULL, 'SEKYERE ', 'THERESAH ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 200, 'sekyeretheresah200043284@gmail.com', 241307600, '0000-00-00', '2023-01-01', 1),
('200043286', NULL, NULL, 'GYAPONG', 'FRANCIS', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 200, 'gyapongfrancis200043286@gmail.com', 549591135, '0000-00-00', '2023-01-01', 1),
('200043299', NULL, NULL, 'AMPONSAH ', 'EMMANUEL ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 200, 'amponsahemmanuel200043299@gmail.com', 245119902, '0000-00-00', '2023-01-01', 1),
('200043301', NULL, NULL, 'BOSOMPIM ', 'JONAS ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:23', NULL, 0, 200, 'bosompimjonas200043301@gmail.com', 248348797, '2035-10-04', '2023-01-01', 1),
('200043302', NULL, NULL, 'OKYERE', 'SELINA', 'NONE', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 200, 'okyereselina200043302@gmail.com', 244845782, '2036-07-05', '2023-01-01', 1),
('200043308', NULL, NULL, 'TEKYI ', 'STEPHEN ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'tekyistephen200043308@gmail.com', 240915056, '0000-00-00', '2023-01-01', 1),
('200043312', NULL, NULL, 'ADUHENE', 'JOSHUA', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 200, 'aduhenejoshua200043312@gmail.com', 540362292, '0000-00-00', '2023-01-01', 1),
('200043315', NULL, NULL, 'NKRUMAH ', 'VERONICA ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'nkrumahveronica200043315@gmail.com', 248311486, '0000-00-00', '2023-01-01', 1),
('200043316', NULL, NULL, 'AWUAH ', 'EBENEZER ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'awuahebenezer200043316@gmail.com ', 246344311, '0000-00-00', '2023-01-01', 1),
('200043318', NULL, NULL, 'SOMIAH ', 'RICHARD ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'somiahrichard200043318@gmail.com', 558366256, '0000-00-00', '2023-01-01', 1),
('200043323', NULL, NULL, 'BADU ', 'SAMUEL ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'badusamuel200043323@gmail.com', 543231201, '0000-00-00', '2023-01-01', 1),
('200043329', NULL, NULL, 'OPOKU', 'FELIX', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 200, 'opokufelix200043329@gmail.com', 548882178, '0000-00-00', '2023-01-01', 1),
('200043334', NULL, NULL, 'TANDOH ', 'JOHNSON ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'tandohjohnson200043334@gmail.com', 557519211, '0000-00-00', '2023-01-01', 1),
('200043344', NULL, NULL, 'GYAMFI ', 'RAYMOND ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 200, 'gyamfiraymond200043344@gmail.com', 201071772, '0000-00-00', '2023-01-01', 1),
('200043349', NULL, NULL, 'OBENG ', 'ABIGAIL ', 'NTIM ', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 200, 'obengabigail200043349@gmail.com', 546969330, '0000-00-00', '2023-01-01', 1),
('200043350', NULL, NULL, 'OSEI ', 'COLLINS ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 200, 'oseicollins200043350@gmail.com', 241278867, '0000-00-00', '2023-01-01', 1),
('200043354', NULL, NULL, 'OPOKU ', 'GORDEN ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 200, 'opokugorden200043354@gmail.com', 246352543, '0000-00-00', '2023-01-01', 1),
('200043363', NULL, NULL, 'AGYEI', 'SANDRA', 'KYERAA', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 200, 'agyeisandra200043363@gmail.com', 558494034, '0000-00-00', '2023-01-01', 1),
('200043372', NULL, NULL, 'TAMAKLOE', 'RICHARD', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'tamakloerichard200043372@gmail.com', 249127721, '0000-00-00', '2023-01-01', 1),
('200043376', NULL, NULL, 'ANARFI', 'ANASTASIA', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 200, 'anarfianastasia200043376@gmail.com', 553873360, '0000-00-00', '2023-01-01', 1),
('200043382', NULL, NULL, 'SERWAA ', 'MARY ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 200, 'serwaamary200043382@gmail.com', 557127955, '0000-00-00', '2023-01-01', 1),
('200043386', NULL, NULL, 'FUACHIE ', 'MICHAEL ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 200, 'fuachiemichael200043386@gmail.com', 551103632, '0000-00-00', '2023-01-01', 1),
('200043398', NULL, NULL, 'TWENEWAA ', 'RITA BOSEA ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 200, 'twenewaaritabosea200043398@gmail.com', 545213452, '0000-00-00', '2023-01-01', 1),
('200043414', NULL, NULL, 'BAAFI ', 'JAMES ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'baafijames200043414@gmail.com', 555066537, '0000-00-00', '2023-01-01', 1),
('200043415', NULL, NULL, 'KYERE ', 'EMMANUEL ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'kyereemmanuel200043415@gmail.com ', 544822292, '0000-00-00', '2023-01-01', 1),
('200043416', NULL, NULL, 'MENSAH ', 'FAUSTINA ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'mensahfaustina200043416@gmail.com', 557726801, '0000-00-00', '2023-01-01', 1),
('200043443', NULL, NULL, 'BOAKYE', 'SETH', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'boakyeseth200043443@gmail.com', 558879003, '0000-00-00', '2023-01-01', 1),
('200043461', NULL, NULL, 'AGYENKWAH ', 'MABEL ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 200, 'agyenkwahmabel200043461@gmail.com', 552098508, '0000-00-00', '2023-01-01', 1),
('200043462', NULL, NULL, 'OPOKU ', 'APPAU', 'ERNEST', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 200, 'opokuappau200043462@gmail.com', 556074643, '0000-00-00', '2023-01-01', 1),
('200043463', NULL, NULL, 'NYAME ', 'JOYCE ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 200, 'nyamejoyce200043463@gmail.com', 553943849, '0000-00-00', '2023-01-01', 1),
('200043470', NULL, NULL, 'AYENSU ', 'DERRICK ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'ayensuderrick200043470@gmail.com', 502025776, '0000-00-00', '2023-01-01', 1),
('200043483', NULL, NULL, 'TAWIAH ', 'JOHNSON ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'tawiahjohnson200043483@gmail.com', 545207934, '0000-00-00', '2023-01-01', 1),
('200043484', NULL, NULL, 'DONKOR ', 'ABIGAIL ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 200, 'donkorabigail200043484@gmail.com', 540486301, '0000-00-00', '2023-01-01', 1),
('200043499', NULL, NULL, 'KONADU ', 'FREDERICK ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'konadufrederick200043499@gmail.com', 540728277, '0000-00-00', '2023-01-01', 1),
('200043537', NULL, NULL, 'KYEI ', 'DERICK', 'BAFFOUR', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'kyeiderick200043537@gmail.com', 544173848, '0000-00-00', '2023-01-01', 1),
('200043539', NULL, NULL, 'OSEI ', 'BOAKYE ', 'JOSEPH ', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'oseiboakye200043539@gmail.com', 549251988, '0000-00-00', '2023-01-01', 1),
('200043550', NULL, NULL, 'KOOMSON ', 'CHARLOTTE ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'koomsoncharlotte200043550@gmail.com', 546479386, '0000-00-00', '2023-01-01', 1),
('200043562', NULL, NULL, 'ALI ', 'ABUGBILLA ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 200, 'aliabugbilla200043562@gmail.com', 549533136, '0000-00-00', '2023-01-01', 1),
('200043569', NULL, NULL, 'BAFFOUR-KYEI ', 'CYDORF ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 200, 'baffour-kyeicydorf200043569@gmail.com', 558898662, '0000-00-00', '2023-01-01', 1),
('200043584', NULL, NULL, 'FRIMPONG ', 'GRIPHTEN ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 200, 'frimponggriphten200043584@gmail.com', 241262378, '0000-00-00', '2023-01-01', 1),
('200043588', NULL, NULL, 'APPIAH ', 'ANDREWS KWAKU ', ' KANKAM', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 200, 'appiahandrewskwaku200043588@gmail.com', 240533839, '0000-00-00', '2023-01-01', 1),
('200043592', NULL, NULL, 'AINOO-NYARKO', 'PETER', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 200, 'ainoo-nyarkopeter200043592@gmail.com', 247094178, '0000-00-00', '2023-01-01', 1),
('200043600', NULL, NULL, 'AMPONSAH ', 'CALISTER ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 200, 'amponsahcalister200043600@gmail.com', 247958675, '0000-00-00', '2023-01-01', 1),
('200043622', NULL, NULL, 'OBENG ', 'GIDEON ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 200, 'obenggideon200043622@gmail.com', 542863770, '0000-00-00', '2023-01-01', 1),
('200043623', NULL, NULL, 'DENNIS ', 'ADDISON ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 200, 'dennisaddison200043623@gmail.com', 543619731, '0000-00-00', '2023-01-01', 1),
('200043624', NULL, NULL, 'KWARTENG ', 'WILLIAM ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 200, 'kwartengwilliam200043624@gmail.com', 243041000, '0000-00-00', '2023-01-01', 1),
('200043626', NULL, NULL, 'OTI ', 'GODFRED ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 200, 'otigodfred200043626@gmail.com', 553837131, '0000-00-00', '2023-01-01', 1),
('200043627', NULL, NULL, 'OFOSU ', 'GLORIA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 200, 'ofosugloria200043627@gmail.com', 277740485, '0000-00-00', '2023-01-01', 1),
('200043633', NULL, NULL, 'NKRUMAH ', 'FLORENCE ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 200, 'nkrumahflorence200043633@gmail.com', 247077374, '0000-00-00', '2023-01-01', 0),
('200043635', NULL, NULL, 'KYINI ', 'ALBERTA ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'kyinialberta200043635@gmail.com', 240587230, '0000-00-00', '2023-01-01', 0),
('200043643', NULL, NULL, 'NKETIAH ', 'LISTOWEL ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nketiahlistowel200043643@gmail.com', 540307577, '0000-00-00', '2023-01-01', 0),
('200043652', NULL, NULL, 'OTOO', 'BRIDGET', 'SERWAA', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'otoobridget200043652@gmail.com', 243119800, '0000-00-00', '2023-01-01', 0),
('200043663', NULL, NULL, 'YEBOAA ', 'GLORIA ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'yeboaagloria200043663@gmail.com', 548474497, '0000-00-00', '2023-01-01', 0),
('200043669', NULL, NULL, 'AMOAH', 'EMELIA', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'amoahemelia200043669@gmail.com', 551566227, '0000-00-00', '2023-01-01', 0),
('200043680', NULL, NULL, 'BOTAH ', 'LINDA  ', 'OSAAH', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:23', NULL, 0, 100, 'botahlinda200043680@gmail.com', 545878369, '0000-00-00', '2023-01-01', 0),
('200043684', NULL, NULL, 'AKORLI ', 'ATSU ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'akorliatsu200043684@gmail.com', 240767336, '0000-00-00', '2023-01-01', 0),
('200043711', NULL, NULL, 'KASSAH ', 'GIDEON SAYIRE ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'kassahgideonsayire200043711@gmail.com', 543936684, '0000-00-00', '2023-01-01', 0),
('200043724', NULL, NULL, 'ADDAE', 'BRIGHT', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'addaebright200043724@gmail.com', 546569243, '0000-00-00', '2023-01-01', 0),
('200043739', NULL, NULL, 'ACQUAH ', 'JOYCE ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'acquahjoyce200043739@gmail.com', 556149577, '0000-00-00', '2023-01-01', 0),
('200043751', NULL, NULL, 'ABAGYINA ', 'COLLINS ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'abagyinacollins200043751@gmail.com', 544911989, '0000-00-00', '2023-01-01', 0),
('200043753', NULL, NULL, 'COBBINAH', 'ISAAC', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:23', NULL, 0, 100, 'cobbinahisaac200043753@gmail.com', 545913882, '0000-00-00', '2023-01-01', 0),
('200043755', NULL, NULL, 'KARTENG ', 'SYLVESTER ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'kartengsylvester200043755@gmail.com ', 551639346, '0000-00-00', '2023-01-01', 0),
('200043760', NULL, NULL, 'ABUBAKAR', 'MUBARIK', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'abubakarmubarik200043760@gmail.com', 543280509, '0000-00-00', '2023-01-01', 0),
('200043761', NULL, NULL, 'ADDY ', 'EMMANUEL ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'addyemmanuel200043761@gmail.com', 550858571, '0000-00-00', '2023-01-01', 0),
('200043771', NULL, NULL, 'SIE ', 'FELIX KOFI ', 'AFRAM ', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'siefelixkofi200043771@gmail.com', 557557383, '0000-00-00', '2023-01-01', 0),
('200043776', NULL, NULL, 'ANTWI ', 'NAOMI ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 100, 'antwinaomi200043776@gmail.com', 554834937, '0000-00-00', '2023-01-01', 0),
('200043783', NULL, NULL, 'Armah', 'Elizabeth', 'Bosco', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 100, 'armahelizabeth200043783@gmail.com', 554210404, '0000-00-00', '2023-01-01', 0),
('200043784', NULL, NULL, 'NKRUMAH ', 'JACOB ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nkrumahjacob200043784@gmail.com', 558388064, '0000-00-00', '2023-01-01', 0),
('200043785', NULL, NULL, 'YEBOAH ', 'VICTORIA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'yeboahvictoria200043785@gmail.com', 204060108, '0000-00-00', '2023-01-01', 0),
('200043788', NULL, NULL, 'AHORSI ', 'BRIGHT ', 'NKRUMAH ', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'ahorsibright200043788@gmail.com', 543215115, '0000-00-00', '2023-01-01', 0),
('200043789', NULL, NULL, 'YEBOAH ', 'PRINCE ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'yeboahprince200043789@gmail.com', 555688402, '0000-00-00', '2023-01-01', 0),
('200043790', NULL, NULL, 'MENSAH ', 'RICHARD ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'mensahrichard200043790@gmail.com', 545230858, '0000-00-00', '2023-01-01', 0),
('200043791', NULL, NULL, 'NKUAH ', 'NANA ', ' KWAKU', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nkuahnana200043791@gmail.com', 540206683, '0000-00-00', '2023-01-01', 0),
('200043792', NULL, NULL, 'BADU ', 'HAYFORD ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'baduhayford200043792@gmail.com', 541455638, '0000-00-00', '2023-01-01', 0),
('200043793', NULL, NULL, 'BREFO ', 'COLLINS ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:23', NULL, 0, 100, 'brefocollins200043793@gmail.com', 558389862, '0000-00-00', '2023-01-01', 0),
('200043794', NULL, NULL, 'ATEGAH ', 'WISDOM ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'ategahwisdom200043794@gmail.com', 541167378, '0000-00-00', '2023-01-01', 0),
('200043795', NULL, NULL, 'ADUSEI ', 'EMMANUEL  ', 'PEPRAH', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'aduseiemmanuel200043795@gmail.com', 551646879, '0000-00-00', '2023-01-01', 0),
('200043796', NULL, NULL, 'AFADZI ', 'PATRICK ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'afadzipatrick200043796@gmail.com', 555521156, '0000-00-00', '2023-01-01', 0),
('200043797', NULL, NULL, 'KWARTENG ', 'GEORGE ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'kwartenggeorge200043797@gmail.com', 545232001, '0000-00-00', '2023-01-01', 0),
('200043798', NULL, NULL, 'BADU ', 'COLLINS ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 100, 'baducollins200043798@gmail.com', 543339371, '0000-00-00', '2023-01-01', 0),
('200043799', NULL, NULL, 'AMPONSAH ', 'OBED ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 100, 'amponsahobed200043799@gmail.com', 553980691, '0000-00-00', '2023-01-01', 0),
('200043801', NULL, NULL, 'AMEYAW ', 'FOSTER ', 'YEBOAH ', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'ameyawfoster200043801@gmail.com', 540893862, '0000-00-00', '2023-01-01', 0),
('200043802', NULL, NULL, 'OSEI ', 'AMANKWAA ', 'OSCAR ', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'oseiamankwaa200043802@gmail.com', 247304948, '0000-00-00', '2023-01-01', 0),
('200043803', NULL, NULL, 'TAWIAH ', 'PRINCE ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'tawiahprince200043803@gmail.com', 543435834, '0000-00-00', '2023-01-01', 0),
('200043804', NULL, NULL, 'FRIMPONG ', 'EMMANUEL ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'frimpongemmanuel200043804@gmail.com', 553652008, '0000-00-00', '2023-01-01', 0),
('200043805', NULL, NULL, 'ADU ', 'BISMARK ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'adubismark200043805@gmail.com', 247638067, '0000-00-00', '2023-01-01', 0),
('200043806', NULL, NULL, 'GYEBI', 'CHRISTIAN ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'gyebichristian200043806@gmail.com', 543280529, '0000-00-00', '2023-01-01', 0),
('200043807', NULL, NULL, 'YEBOAH ', 'EMMANUEL ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'yeboahemmanuel200043807@gmail.com', 245221630, '0000-00-00', '2023-01-01', 0),
('200043808', NULL, NULL, 'ASARE ', 'ALBERT ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asarealbert200043808@gmail.com', 249452790, '0000-00-00', '2023-01-01', 0),
('200043809', NULL, NULL, 'ANTWI ', 'DERRICK ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'antwiderrick200043809@gmail.com', 541926479, '0000-00-00', '2023-01-01', 0),
('200043810', NULL, NULL, 'ARMAH ', 'FRIMPONG  ', 'JUSTICE', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 100, 'armahfrimpong200043810@gmail.com', 242294950, '0000-00-00', '2023-01-01', 0),
('200043813', NULL, NULL, 'OWUSU ', 'WONDERFUL ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'owusuwonderful200043813@gmail.com', 544206859, '0000-00-00', '2023-01-01', 0),
('200043814', NULL, NULL, 'KONAMAH', 'ELLEN', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'konamahellen200043814@gmail.com', 545121942, '0000-00-00', '2023-01-01', 0),
('200043815', NULL, NULL, 'BOAMPONG ', 'NANA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'boampongnana200043815@gmail.com', 248292333, '0000-00-00', '2023-01-01', 0),
('200043816', NULL, NULL, 'AGYEMANG ', 'HAPPY ', 'YEBOAH ', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'agyemanghappy200043816@gmail.com', 540403822, '0000-00-00', '2023-01-01', 0),
('200043817', NULL, NULL, 'ACHEAMPONG ', 'ELVIS ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'acheampongelvis200043817@gmail.com', 548753452, '0000-00-00', '2023-01-01', 0),
('200043818', NULL, NULL, 'ENNIN ', 'STELLA ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'enninstella200043818@gmail.com', 559116190, '0000-00-00', '2023-01-01', 0),
('200043820', NULL, NULL, 'OKYERE ', 'FRANK ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 100, 'okyerefrank200043820@gmail.com', 553832981, '0000-00-00', '2023-01-01', 0),
('200043821', NULL, NULL, 'TULASI', 'JOSHUA', 'MBAWINI', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'tulasijoshua200043821@gmail.com', 559802618, '0000-00-00', '2023-01-01', 0),
('200043822', NULL, NULL, 'MENSAH ', 'THOMAS ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 100, 'mensahthomas200043822@gmail.com', 244051109, '0000-00-00', '2023-01-01', 0),
('200043823', NULL, NULL, 'AMPONSAH ', 'SOLOMON ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'amponsahsolomon200043823@gmail.com', 543645992, '0000-00-00', '2023-01-01', 0),
('200043824', NULL, NULL, 'NKOAH ', 'ISAAC ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 100, 'nkoahisaac200043824@gmail.com', 553190819, '0000-00-00', '2023-01-01', 0),
('200043825', NULL, NULL, 'TUFFOUR ', 'ENOCK ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'tuffourenock200043825@gmail.com', 553833565, '0000-00-00', '2023-01-01', 0),
('200043826', NULL, NULL, 'OSEI ', 'BRIGHT ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'oseibright200043826@gmail.com', 541613561, '0000-00-00', '2023-01-01', 0),
('200043827', NULL, NULL, 'ARTHUR ', 'COSMOS ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'arthurcosmos200043827@gmail.com', 552136602, '0000-00-00', '2023-01-01', 0),
('200043828', NULL, NULL, 'GIDEON ', 'DON-GAGLA ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'gideondon-gagla200043828@gmail.com', 547243144, '0000-00-00', '2023-01-01', 0),
('200043829', NULL, NULL, 'ESHUN ', 'VICTORIA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'eshunvictoria200043829@gmail.com', 549398906, '0000-00-00', '2023-01-01', 0),
('200043830', NULL, NULL, 'OPPONG', 'JOHN', 'BAAH', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'oppongjohn200043830@gmail.com', 559350598, '2036-10-02', '2023-01-01', 0),
('200043831', NULL, NULL, 'ABETTEH ', 'BERNARD ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'abettehbernard200043831@gmail.com', 558337420, '0000-00-00', '2023-01-01', 0),
('200043832', NULL, NULL, 'KONADU ', 'MENSAH  ', 'JOSUAH', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'konadumensah200043832@gmail.com', 559351005, '0000-00-00', '2023-01-01', 0),
('200043833', NULL, NULL, 'GYASI ANNOR', 'ISAAC', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'gyasiannorisaac200043833@gmail.com', 248028161, '0000-00-00', '2023-01-01', 0),
('200043834', NULL, NULL, 'OBENG ', 'EDWARD ', 'MENSAH ', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 100, 'obengedward200043834@gmail.com', 557505419, '0000-00-00', '2023-01-01', 0),
('200043835', NULL, NULL, 'AGYEMANG ', 'VINCENT ', 'QUASI ', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'agyemangvincent200043835@gmail.com', 240649353, '0000-00-00', '2023-01-01', 0),
('200043841', NULL, NULL, 'ADDISAH ', 'ISAAC ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'addisaisaac200043841@gmail.com ', 540516753, '0000-00-00', '2023-01-01', 0),
('200043845', NULL, NULL, 'EWAYI ', 'ERIC ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'ewayieric200043845@gmail.com', 249616717, '0000-00-00', '2023-01-01', 0),
('200043862', NULL, NULL, 'ANTWI ', 'JOSEPH ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'antwijoseph200043862@gmail.com', 545573551, '0000-00-00', '2023-01-01', 0),
('200043863', NULL, NULL, 'AMOAH ', 'ROCKSON ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'amoahrockson200043863@gmail.com', 553892119, '0000-00-00', '2023-01-01', 0),
('200043903', NULL, NULL, 'SACKEY ', 'MARY ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'sackeymary200043903@gmail.com', 555998424, '0000-00-00', '2023-01-01', 0),
('200043927', NULL, NULL, 'ACHEAMPONG ', 'EVANS  ', 'OTUO', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'acheampongevans200043927@gmail.com', 553408581, '0000-00-00', '2023-01-01', 0),
('200043928', NULL, NULL, 'ATEWENE ', 'JOSEPH ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 100, 'atewenejoseph200043928@gmail.com', 554505792, '0000-00-00', '2023-01-01', 0),
('200043943', NULL, NULL, 'APPAU ', 'EMMANUEL ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'appauemmanuel200043943@gmail.com', 550458577, '0000-00-00', '2023-01-01', 0),
('200043945', NULL, NULL, 'AKWASI ', 'RABBI ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'akwasirabbi200043945@gmail.com', 542361753, '0000-00-00', '2023-01-01', 0),
('200043948', NULL, NULL, 'ASAMBO', 'MARY', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asambomary200043948@gmail.com', 558801550, '0000-00-00', '2023-01-01', 0),
('200043950', NULL, NULL, 'ADUBRA ', 'JESSICA ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'adubrajessica200043950@gmail.com', 556203733, '0000-00-00', '2023-01-01', 0),
('200043956', NULL, NULL, 'ADUAFFUL ', 'CHARLOTTE ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'aduaffulcharlotte200043956@gmail.com', 541990058, '0000-00-00', '2023-01-01', 0),
('200043957', NULL, NULL, 'BENNEH ', 'BRIGHT ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'bennehbright200043957@gmail.com', 245884773, '0000-00-00', '2023-01-01', 0),
('200043958', NULL, NULL, 'ADDAE ', 'ERIC ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'addaeeric200043958@gmail.com', 559998938, '0000-00-00', '2023-01-01', 0),
('200043962', NULL, NULL, 'AGYEI ', 'FRANK ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'agyeifrank200043962@gmail.com', 553934531, '0000-00-00', '2023-01-01', 0),
('200043969', NULL, NULL, 'ASIEDU ', 'NICHOLAS ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asiedunicholas200043969@gmail.com', 245923645, '0000-00-00', '2023-01-01', 0),
('200043980', NULL, NULL, 'TURKSON ', 'MARY EDNA  ', 'AFIA ANOKYEWAAH', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'turksonmaryedna200043980@gmail.com', 241367632, '0000-00-00', '2023-01-01', 0),
('200044003', NULL, NULL, 'AGYEKUM ', 'GLORIA ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'agyekumgloria200044003@gmail.com', 548132320, '0000-00-00', '2023-01-01', 0),
('200044006', NULL, NULL, 'GYAN ', 'ELIZABETH ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'gyanelizabeth200044006@gmail.com', 240366712, '0000-00-00', '2023-01-01', 0),
('200044011', NULL, NULL, 'ARTHUR ', 'AARON ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'arthuraaron200044011@gmail.com', 247516800, '0000-00-00', '2023-01-01', 0),
('200044012', NULL, NULL, 'NSOWAH ', 'HAGAR ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nsowahhagar200044012@gmail.com', 545758122, '0000-00-00', '2023-01-01', 0),
('200044013', NULL, NULL, 'AWUAH ', 'ROSEMARY  ', 'NYAMEKYE', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'awuahrosemary200044013@gmail.com', 552652764, '0000-00-00', '2023-01-01', 0),
('200044031', NULL, NULL, 'AYAMBUN ', 'ALBERT ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'ayambunalbert200044031@gmail.com', 275352398, '0000-00-00', '2023-01-01', 0),
('200044036', NULL, NULL, 'ASORIGIYA ', 'AMOS ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asorigiyaamos200044036@gmail.com', 557121777, '0000-00-00', '2023-01-01', 0),
('200044044', NULL, NULL, 'OBENG ', 'JOSEPH ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 100, 'obengjoseph200044044@gmail.com', 551174101, '0000-00-00', '2023-01-01', 0),
('200044067', NULL, NULL, 'ABOAGYE ', 'SIMON ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'aboagyesimon200044067@gmail.com', 548910492, '0000-00-00', '2023-01-01', 0),
('200044068', NULL, NULL, 'OPOKU', 'MARTINS', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 100, 'opokumartins200044068@gmail.com', 561863718, '0000-00-00', '2023-01-01', 0),
('200044071', NULL, NULL, 'OWUSU ', 'CECILIA ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'owusucecilia200044071@gmail.com', 544202030, '0000-00-00', '2023-01-01', 0),
('200044073', NULL, NULL, 'ADDAE ', 'MABEL ', 'GYAMFI ', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'addaemabel200044073@gmail.com', 241995010, '0000-00-00', '2023-01-01', 0),
('200044079', NULL, NULL, 'AFFUM ', 'CASANDRA ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'affumcasandra200044079@gmail.com', 243634815, '0000-00-00', '2023-01-01', 0),
('200044082', NULL, NULL, 'FORIWAA ', 'AUGUSTINA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'foriwaaaugustina200044082@gmail.com', 246544314, '0000-00-00', '2023-01-01', 0),
('200044092', NULL, NULL, 'OPOKU ', 'PATRICK ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 100, 'opokupatrick200044092@gmail.com', 559267699, '0000-00-00', '2023-01-01', 0),
('200044097', NULL, NULL, 'ADDISON ', 'MARY ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'addisonmary200044097@gmail.com', 242480631, '0000-00-00', '2023-01-01', 0),
('200044106', NULL, NULL, 'NTAADU ', 'ISAAC ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'ntaaduisaac200044106@gmail.com', 249632948, '0000-00-00', '2023-01-01', 0),
('200044123', NULL, NULL, 'ADOMAKO ', 'HELINA ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'adomakohelina200044123@gmail.com', 552717583, '0000-00-00', '2023-01-01', 0),
('200044129', NULL, NULL, 'AHWOI ', 'NAOMI ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'ahwoinaomi200044129@gmail.com', 546142274, '0000-00-00', '2023-01-01', 0),
('200044144', NULL, NULL, 'ASARE', 'ROCKSON', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asarerockson200044144@gmail.com', 553208697, '0000-00-00', '2023-01-01', 0),
('200044164', NULL, NULL, 'OWUSU-ANSAH', 'CINDERELLA', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'owusu-ansahcinderella200044164@gmail.com', 249296275, '0000-00-00', '2023-01-01', 0),
('200044174', NULL, NULL, 'AVO ', 'SYLVESTER ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'avosylvester200044174@gmail.com', 270613688, '0000-00-00', '2023-01-01', 0),
('200044181', NULL, NULL, 'DOMFEH  ', 'ERIC', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'domfeheric200044181@gmail.com', 554837349, '0000-00-00', '2023-01-01', 0),
('200044204', NULL, NULL, 'BONSU ', 'RICHARD  ', 'KWAME', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'bonsurichard200044204@gmail.com', 547046968, '0000-00-00', '2023-01-01', 0),
('200044227', NULL, NULL, 'GYAM ', 'HANNAH ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'gyamhannah200044227@gmail.com', 249993576, '0000-00-00', '2023-01-01', 0),
('200044228', NULL, NULL, 'ANTWI ', 'SAMUEL ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'antwisamuel200044228@gmail.com', 559809710, '0000-00-00', '2023-01-01', 0),
('200044238', NULL, NULL, 'OPPONG ', 'NICHOLAS ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'oppongnicholas200044238@gmail.com', 541462644, '0000-00-00', '2023-01-01', 0),
('200044239', NULL, NULL, 'DOSU ', 'PHILOMINA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'dosuphilomina200044239@gmail.com', 242094115, '0000-00-00', '2023-01-01', 0),
('200044241', NULL, NULL, 'ANTWI ', ' GODFRED', 'BADU', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'antwigodfred200044241@gmail.com', 556277912, '0000-00-00', '2023-01-01', 0),
('200044245', NULL, NULL, 'NUERTEY-ODONKOR ', 'COLLINS ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nuerteyodonkorcollins200044245@gmail.com', 553672713, '0000-00-00', '2023-01-01', 0),
('200044252', NULL, NULL, 'ATAA ', 'BOAMAH  ', 'OKYERE', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'ataaboamah200044252@gmail.com', 559156289, '0000-00-00', '2023-01-01', 0),
('200044258', NULL, NULL, 'ATIEMO ', 'PRINCE ', 'BOATENG ', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'atiemoprince200044258@gmail.com', 544837092, '0000-00-00', '2023-01-01', 0),
('200044276', NULL, NULL, 'WIREDUWAA ', 'AFIA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'wireduwaaafia200044276@gmail.com ', 554400471, '0000-00-00', '2023-01-01', 0),
('200044316', NULL, NULL, 'AYINSONGYA ', 'PRECIOUS ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'ayinsongyaprecious200044316@gmail.com', 549981416, '0000-00-00', '2023-01-01', 0),
('200044321', NULL, NULL, 'DEWUAH ', 'JOYCE ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'dewuahjoyce200044321@gmail.com', 552662751, '0000-00-00', '2023-01-01', 0),
('200044339', NULL, NULL, 'BADU ', 'EDNA ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'baduedna200044339@gmail.com', 548884136, '0000-00-00', '2023-01-01', 0),
('200044350', NULL, NULL, 'GARIBAH ', 'JOSEPH ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'garibahjoseph200044350@gmail.com', 240028468, '0000-00-00', '2023-01-01', 0),
('200044360', NULL, NULL, 'OPPONG ', 'CHARLOTTE ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'oppongcharlotte200044360@gmail.com', 558201878, '0000-00-00', '2023-01-01', 0),
('200044370', NULL, NULL, 'ADDAE', 'JACOB', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'addaejacob200044370@gmail.com', 553832691, '0000-00-00', '2023-01-01', 0),
('200044374', NULL, NULL, 'NYAMEKYE ', 'PRISCILLA ', 'ESI ', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nyamekyepriscilla200044374@gmail.com', 559089028, '0000-00-00', '2023-01-01', 0),
('200044392', NULL, NULL, 'SAKYI ', 'MILLICENT ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'sakyimillicent200044392@gmail.com', 548572472, '0000-00-00', '2023-01-01', 0),
('200044395', NULL, NULL, 'NYAME ', 'ISAAC ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nyameisaac200044395@gmail.com', 249658250, '0000-00-00', '2023-01-01', 0),
('200044396', NULL, NULL, 'OKYERE KUFFOUR', 'DAVID  ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 100, 'okyerekuffourdavid200044396@gmail.com', 549957939, '0000-00-00', '2023-01-01', 0),
('200044398', NULL, NULL, 'FUAKYE ', 'ALBERT ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'fuakyealbert200044398@gmail.com', 540656086, '0000-00-00', '2023-01-01', 0),
('200044405', NULL, NULL, 'AMPIAH ', 'REBECCA ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'ampiahrebecca200044405@gmail.com', 205271290, '0000-00-00', '2023-01-01', 0),
('200044406', NULL, NULL, 'HAGAN ', 'ANTHONY ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'hagananthony200044406@gmail.com', 245257257, '0000-00-00', '2023-01-01', 0),
('200044414', NULL, NULL, 'AFRAM', 'FRANCIS', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'aframfrancis200044414@gmail.com', 241373847, '0000-00-00', '2023-01-01', 0),
('200044416', NULL, NULL, 'NIMAKO ', 'CHARLOTTE ', 'OWUSU ', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nimakocharlotte200044416@gmail.com ', 555604298, '0000-00-00', '2023-01-01', 0),
('200044450', NULL, NULL, 'ADU ', 'EMMANUEL ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'aduemmanuel200044450@gmail.com', 542283941, '0000-00-00', '2023-01-01', 0),
('200044451', NULL, NULL, 'QUAICOE ', 'SHADRACK ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'quaicoeshadrack200044451@gmail.com', 540667879, '0000-00-00', '2023-01-01', 0),
('200044470', NULL, NULL, 'OPPONG ', 'GRACE ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'opponggrace200044470@gmail.com', 243749005, '0000-00-00', '2023-01-01', 0),
('200044493', NULL, NULL, 'AYITEY ', 'FRANCIS ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'ayiteyfrancis200044493@gmail.com', 543046994, '0000-00-00', '2023-01-01', 0),
('200044509', NULL, NULL, 'ASIEYIE ', 'EMMANUEL ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asieyieemmanuel200044509@gmail.com', 242804923, '0000-00-00', '2023-01-01', 0),
('200044514', NULL, NULL, 'OWUSU ', 'DANIEL  ', 'ASANTE', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'owusudaniel200044514@gmail.com', 557742363, '0000-00-00', '2023-01-01', 0);
INSERT INTO `students` (`studentRegno`, `studentPhoto`, `password`, `surname`, `firstname`, `otherName`, `programme`, `pincode`, `session`, `semester`, `currentSemester`, `creationdate`, `updationDate`, `cleared`, `level`, `email`, `contactNumber`, `dob`, `enrollmentDate`, `promotionCount`) VALUES
('200044530', NULL, NULL, 'TWUMWAA ', 'LYDIA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'twumwaalydia200044530@gmail.com', 506241762, '0000-00-00', '2023-01-01', 0),
('200044548', NULL, NULL, 'SAMBO ', 'YAKUBU ', 'YAO ', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'samboyakubu200044548@gmail.com', 552308289, '0000-00-00', '2023-01-01', 0),
('200044549', NULL, NULL, 'NINSIN ', 'BRIGHT ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'ninsinbright200044549@gmail.com', 243462177, '0000-00-00', '2023-01-01', 0),
('200044571', NULL, NULL, 'MENSAH ', 'KINGDOM ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 100, 'mensahkingdom200044571@gmail.com', 559688788, '0000-00-00', '2023-01-01', 0),
('200044579', NULL, NULL, 'OBENG ', 'SANDRA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 100, 'obengsandra200044579@gmail.com', 554793152, '0000-00-00', '2023-01-01', 0),
('200044589', NULL, NULL, 'SARKODIE ', 'BRIGHT ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'sarkodiebright200044589@gmail.com', 241627709, '0000-00-00', '2023-01-01', 0),
('200044596', NULL, NULL, 'ASARE ', 'JUSTICE  ', 'CUDJOE', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asarejustice200044596@gmail.com', 245525219, '0000-00-00', '2023-01-01', 0),
('200044605', NULL, NULL, 'OWUSU ', 'SAVIOUR ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'owususaviour200044605@gmail.com', 559905478, '0000-00-00', '2023-01-01', 0),
('200044609', NULL, NULL, 'BOADI ', 'VICTORIA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'boadivictoria200044609@gmail.com', 559266726, '0000-00-00', '2023-01-01', 0),
('200044611', NULL, NULL, 'TAFOWAA ', 'MAVIS ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'tafowaamavis200044611@gmail.com', 557072197, '0000-00-00', '2023-01-01', 0),
('200044614', NULL, NULL, 'SASU ', 'LYDIA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'sasulydia200044614@gmail.com', 248256456, '0000-00-00', '2023-01-01', 0),
('200044634', NULL, NULL, 'ADJEI ', 'DANIEL ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'adjeidaniel200044634@gmail.com', 554281689, '0000-00-00', '2023-01-01', 0),
('200044635', NULL, NULL, 'ACHEAMPONG ', 'SEBE  ', 'AKWASI', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'acheampongsebe200044635@gmail.com', 506875873, '2035-04-03', '2023-01-01', 0),
('200044641', NULL, NULL, 'ANANE ', 'JOYCE ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'ananejoyce200044641@gmail.com', 551311096, '0000-00-00', '2023-01-01', 0),
('200044663', NULL, NULL, 'ISSAH', 'FUSENATU', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'issahfusenatu200044663@gmail.com', 553897828, '0000-00-00', '2023-01-01', 0),
('200044680', NULL, NULL, 'POKU ', 'PRECIOUS ', 'AMPOFOWAA ', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'pokuprecious200044680@gmail.com', 554605002, '0000-00-00', '2023-01-01', 0),
('200044682', NULL, NULL, 'KORANG ', 'EMMANUEL ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'korangemmanuel200044682@gmail.com', 546130887, '0000-00-00', '2023-01-01', 0),
('200044691', NULL, NULL, 'YEBOAH', 'MICHAEL', 'KWAKU', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'yeboahmichael200044691@gmail.com', 554224208, '0000-00-00', '2023-01-01', 0),
('200044696', NULL, NULL, 'NYAME ', 'BELINDA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nyamebelinda200044696@gmail.com', 240230845, '0000-00-00', '2023-01-01', 0),
('200044704', NULL, NULL, 'OWUSUAH ', 'ABIGAIL ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'owusuahabigail200044704@gmail.com', 556351888, '0000-00-00', '2023-01-01', 0),
('200044718', NULL, NULL, 'WINI ', 'WINPANG ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'winiwinpang200044718@gmail.com', 548475955, '0000-00-00', '2023-01-01', 0),
('200044721', NULL, NULL, 'AMOFA ', 'EBENEZER ', 'AGYEMANG ', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'amofaebenezer200044721@gmail.com', 559635246, '0000-00-00', '2023-01-01', 0),
('200044724', NULL, NULL, 'YEBOAH ', 'LINDA YAA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'yeboahlindayaa200044724@gmail.com', 240715602, '0000-00-00', '2023-01-01', 0),
('200044726', NULL, NULL, 'MANU ', 'CHARLOTTE ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'manucharlotte200044726@gmail.com', 245641417, '0000-00-00', '2023-01-01', 0),
('200044735', NULL, NULL, 'QUARTSON ', 'DERICK ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'quartsonderick200044735@gmail.com', 242349643, '0000-00-00', '2023-01-01', 0),
('200044737', NULL, NULL, 'AWARAJAH ', 'FESTUS ', 'BILLSSON ', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'awarajahfestus200044737@gmail.com', 247147607, '0000-00-00', '2023-01-01', 0),
('200044745', NULL, NULL, 'OWOO', 'THEOPHILUS', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'owootheophilus200044745@gmail.com ', 559563440, '0000-00-00', '2023-01-01', 0),
('200044766', NULL, NULL, 'GYAMAH ', 'SAMUEL ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'gyamahsamuel200044766@gmail.com', 249130653, '0000-00-00', '2023-01-01', 0),
('200044779', NULL, NULL, 'ARTHUR ', 'OBED ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'arthurobed200044779@gmail.com', 544999934, '0000-00-00', '2023-01-01', 0),
('200044821', NULL, NULL, 'ACKAAH ', 'ABRAHAM ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'ackaahabraham200044821@gmail.com', 548265794, '0000-00-00', '2023-01-01', 0),
('200044822', NULL, NULL, 'CONDUAH ', 'SAMUEL ', 'KWESI ', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:23', NULL, 0, 100, 'conduahsamuel200044822@gmail.com', 247909125, '0000-00-00', '2023-01-01', 0),
('200044850', NULL, NULL, 'SOMUAH ', 'SAMUEL  ', 'ARMAH', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'somuahsamuel200044850@gmail.com', 546889442, '0000-00-00', '2023-01-01', 0),
('200044866', NULL, NULL, 'OBENG ', 'JOSHUA ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 100, 'obengjoshua200044866@gmail.com', 240201936, '0000-00-00', '2023-01-01', 0),
('200044868', NULL, NULL, 'BOAMAH ', 'HABAKUK ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'boamahhabakuk200044868@gmail.com', 541323305, '0000-00-00', '2023-01-01', 0),
('200044871', NULL, NULL, 'MENSAH ', 'ESTHER ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'mensahesther200044871@gmail.com', 546060728, '0000-00-00', '2023-01-01', 0),
('200044893', NULL, NULL, 'FORDJOUR ', 'DAVID ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'fordjourdavid200044893@gmail.com', 543345861, '0000-00-00', '2023-01-01', 0),
('200044896', NULL, NULL, 'ANTWI ', 'ANDREWS ', 'KYEI ', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'antwiandrews200044896@gmail.com', 554232295, '0000-00-00', '2023-01-01', 0),
('200044900', NULL, NULL, 'OWUSU ', 'MERCY ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'owusumercy200044900@gmail.com', 556619786, '0000-00-00', '2023-01-01', 0),
('200044927', NULL, NULL, 'NKUAH ', 'ISAIAH ', 'OKUMDOM ', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nkuahisaiah200044927@gmail.com', 545736640, '0000-00-00', '2023-01-01', 0),
('200044942', NULL, NULL, 'ASARE ', 'FRANK ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asarefrank200044942@gmail.com', 244912102, '0000-00-00', '2023-01-01', 0),
('200044950', NULL, NULL, 'AMOAKO-MENSAH ', 'ELIZABETH ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'amoako-mensahelizabeth200044950@gmail.com', 243767766, '0000-00-00', '2023-01-01', 0),
('200044968', NULL, NULL, 'ADDY ', 'NKUAH  ', 'RICHARDSON', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'addynkuah200044968@gmail.com', 555353230, '0000-00-00', '2023-01-01', 0),
('200044977', NULL, NULL, 'OPOKU ', 'NORRITA ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 100, 'opokunorrita200044977@gmail.com', 552252655, '0000-00-00', '2023-01-01', 0),
('200044979', NULL, NULL, 'BAIDOO ', 'PATIENCE ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'baidoopatience200044979@gmail.com', 558130544, '0000-00-00', '2023-01-01', 0),
('200044990', NULL, NULL, 'GYENING ', 'PRISCILLA ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'gyeningpriscilla200044990@gmail.com', 554035130, '0000-00-00', '2023-01-01', 0),
('200045000', NULL, NULL, 'DANSO', 'TANO YAW', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:23', NULL, 0, 100, 'dansotanoyaw200045000@gmail.com', 240377837, '0000-00-00', '2023-01-01', 0),
('200045031', NULL, NULL, 'GYABENG ', 'STELLA ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'gyabengstella200045031@gmail.com', 249640044, '0000-00-00', '2023-01-01', 0),
('200045036', NULL, NULL, 'AMOAKO ', 'ERIC ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'amoakoeric200045036@gmail.com', 549395251, '0000-00-00', '2023-01-01', 0),
('200045041', NULL, NULL, 'ANTHONY', 'KWARTENG', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'anthonykwarteng200045041@gmail.com', 556736516, '0000-00-00', '2023-01-01', 0),
('200045051', NULL, NULL, 'ATAKORA ', 'WUSAH ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'atakorawusah200045051@gmail.com', 245892850, '0000-00-00', '2023-01-01', 0),
('200045053', NULL, NULL, 'DARKO ', 'COLLINS ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'darkocollins200045053@gmail.com', 246340211, '0000-00-00', '2023-01-01', 0),
('200045055', NULL, NULL, 'TANO ', 'CECILIA ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'tanocecilia200045055@gmail.com', 242365549, '0000-00-00', '2023-01-01', 0),
('200045061', NULL, NULL, 'KWAO ', 'FRANCIS ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'kwaofrancis200045061@gmail.com', 556054583, '0000-00-00', '2023-01-01', 0),
('200045062', NULL, NULL, 'AFRAM ', 'EMMANUEL ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'aframemmanuel200045062@gmail.com', 550490056, '0000-00-00', '2023-01-01', 0),
('200045065', NULL, NULL, 'SEIDU ', 'OSMAN ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'seiduosman200045065@gmail.com', 248162137, '0000-00-00', '2023-01-01', 0),
('200045068', NULL, NULL, 'IDDRISU ', 'ABDUL- RAHMAN ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'iddrisuabdul-rahman200045068@gmail.com', 245909113, '0000-00-00', '2023-01-01', 0),
('200045080', NULL, NULL, 'AMAADI ', 'ANDREWS ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'amaadiandrews200045080@gmail.com', 245012370, '0000-00-00', '2023-01-01', 0),
('200045081', NULL, NULL, 'KUMI ', 'YEBOAH  ', 'ABISHUAL', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'kumiyeboah200045081@gmail.com', 541813031, '0000-00-00', '2023-01-01', 0),
('200045094', NULL, NULL, 'ASANTE ', 'EDMOND ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asanteedmond200045094@gmail.com', 542942634, '0000-00-00', '2023-01-01', 0),
('200045101', NULL, NULL, 'ENNING', 'OPHELIA ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'enningophelia200045101@gmail.com', 554296868, '0000-00-00', '2023-01-01', 0),
('200045116', NULL, NULL, 'SARFO ', 'ELTON ', 'AGYEMANG ', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'sarfoelton200045116@gmail.com', 559890186, '0000-00-00', '2023-01-01', 0),
('200045123', NULL, NULL, 'AMONOO ', 'AMA ', 'WIBA ', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'amonooama200045123@gmail.com', 245410318, '0000-00-00', '2023-01-01', 0),
('200045146', NULL, NULL, 'BAIDOO ', 'SANDRA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'baidoosandra200045146@gmail.com', 245493319, '0000-00-00', '2023-01-01', 0),
('200045149', NULL, NULL, 'ABAKAH ', 'STEPHEN ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'abakahstephen200045149@gmail.com', 544120186, '0000-00-00', '2023-01-01', 0),
('200045154', NULL, NULL, 'DARMANG ', 'ALBERTA ', 'AMA ', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'darmangalberta200045154@gmail.com', 548381278, '0000-00-00', '2023-01-01', 0),
('200045169', NULL, NULL, 'AGYAPONG ', 'KINGSLEY ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'agyapongkingsley200045169@gmail.com', 543501276, '0000-00-00', '2023-01-01', 0),
('200045182', NULL, NULL, 'ACKAH ', 'FELIX  ', 'ANTWI', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'ackahfelix200045182@gmail.com', 547941597, '0000-00-00', '2023-01-01', 0),
('200045193', NULL, NULL, 'DUAH ', 'CASTOWELL ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'duahcastowel200045193@gmail.com', 240755649, '0000-00-00', '2023-01-01', 0),
('200045211', NULL, NULL, 'GYAN ', 'ISAAC ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'gyanisaac200045211@gmail.com', 550018952, '0000-00-00', '2023-01-01', 0),
('200045212', NULL, NULL, 'ASARE ', 'THEOPHILUS ', 'BENNIE ', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asaretheophilus200045212@gmail.com', 559630617, '0000-00-00', '2023-01-01', 0),
('200045214', NULL, NULL, 'AHLIDZA ', 'GLADYS ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'ahlidzagladys200045214@gmail.com', 249441351, '0000-00-00', '2023-01-01', 0),
('200045227', NULL, NULL, 'TWUMASI ', 'AGNES ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'twumasiagnes200045227@gmail.com', 240032864, '0000-00-00', '2023-01-01', 0),
('200045231', NULL, NULL, 'ASANTE ', 'FELIX  ', 'BAFFOUR', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'asantefelix200045231@gmail.com', 547628046, '0000-00-00', '2023-01-01', 0),
('200045239', NULL, NULL, 'ASIEDU ', 'GIDEON ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asiedugideon200045239@gmail.com', 555439375, '0000-00-00', '2023-01-01', 0),
('200045246', NULL, NULL, 'OSEI ', 'HANNAH ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 100, 'oseihannah200045246@gmail.com ', 241018224, '0000-00-00', '2023-01-01', 0),
('200045264', NULL, NULL, 'BONNAA ', 'DEBORAH ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'bonnaadeborah200045264@gmail.com', 553820007, '0000-00-00', '2023-01-01', 0),
('200045268', NULL, NULL, 'WILSON ', 'ABRAHAM ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'wilsonabraham200045268@gmail.com', 546504554, '0000-00-00', '2023-01-01', 0),
('200045270', NULL, NULL, 'YEBOAH ', 'HAGAR  ', 'AMANKWAAH', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'yeboahhagar200045270@gmail.com', 551087434, '0000-00-00', '2023-01-01', 0),
('200045291', NULL, NULL, 'NSIAH ', 'KWAKU ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nsiahkwaku200045291@gmail.com', 277607983, '0000-00-00', '2023-01-01', 0),
('200045300', NULL, NULL, 'AYIWA ', 'JANET ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'ayiwajanet200045300@gmail.com', 246981192, '0000-00-00', '2023-01-01', 0),
('200045303', NULL, NULL, 'GYEKYE ', 'AGYEIWAH', ' FREDA ', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'gyekyeagyeiwah200045303@gmail.com', 541006066, '0000-00-00', '2023-01-01', 0),
('200045306', NULL, NULL, 'ASANTE ', 'FRANCIS ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asantefrancis200045306@gmail.com', 552527640, '0000-00-00', '2023-01-01', 0),
('200045307', NULL, NULL, 'OTENG ', 'VIDA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'otengvida200045307@gmail.com', 559691999, '0000-00-00', '2023-01-01', 0),
('200045309', NULL, NULL, 'OWUSUAA ACHIAA  ', 'ABIGAIL', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'owusuaaachiaaabigail200045309@gmail.com', 204273504, '0000-00-00', '2023-01-01', 0),
('200045312', NULL, NULL, 'AMANFO ', 'MARTIN ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'amanfomartin200045312@gmail.com', 545843910, '0000-00-00', '2023-01-01', 0),
('200045318', NULL, NULL, 'BONSU ', 'BARBARA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'bonsubarbara200045318@gmail.com', 544538907, '0000-00-00', '2023-01-01', 0),
('200045319', NULL, NULL, 'NKUAH', 'ERIC', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nkuaheric200045319@gmail.com', 541280009, '0000-00-00', '2023-01-01', 0),
('200045320', NULL, NULL, 'BOTCHWEY ', 'GIFTY ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'botchweygifty200045320@gmail.com', 546785963, '0000-00-00', '2023-01-01', 0),
('200045322', NULL, NULL, 'NSIAH', 'FRANCIS', 'KWASI ', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nsiahfrancis200045322@gmail.com', 593671663, '0000-00-00', '2023-01-01', 0),
('200045332', NULL, NULL, 'TWENEBOAH ', 'PADMORE ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'tweneboahpadmore200045332@gmail.com', 557138914, '0000-00-00', '2023-01-01', 0),
('200045336', NULL, NULL, 'COFFIE ', 'PRINCE ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:23', NULL, 0, 100, 'coffieprince200045336@gmail.com', 553480257, '0000-00-00', '2023-01-01', 0),
('200045353', NULL, NULL, 'MENSAH ', 'ALEXANDER ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 100, 'mensahalexander200045353@gmail.com', 244536392, '0000-00-00', '2023-01-01', 0),
('200045355', NULL, NULL, 'EMMU ', 'FELICIA ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'emmufelicia200045355@gmail.com', 550216912, '0000-00-00', '2023-01-01', 0),
('200045368', NULL, NULL, 'KABORE ', 'OSCAR ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'kaboreoscar200045368@gmail.com', 249109718, '0000-00-00', '2023-01-01', 0),
('200045401', NULL, NULL, 'AGYAPONG ', 'GLORIA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'agyaponggloria200045401@gmail.com', 551569650, '0000-00-00', '2023-01-01', 0),
('200045405', NULL, NULL, 'AMPONG ', 'LINDA ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'amponglinda200045405@gmail.com', 540510276, '0000-00-00', '2023-01-01', 0),
('200045415', NULL, NULL, 'SAKYIWAA ', 'LOUISA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'sakyiwaalouisa200045415@gmail.com', 246428723, '0000-00-00', '2023-01-01', 0),
('200045422', NULL, NULL, 'NSIAH ', 'GABRIEL ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:32', NULL, 0, 100, 'nsiahgabriel200045422@gmail.com', 557659009, '0000-00-00', '2023-01-01', 0),
('200045429', NULL, NULL, 'ASARE ', 'AGNES ', 'KONADU ', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asareagnes200045429@gmail.com', 546298005, '0000-00-00', '2023-01-01', 0),
('200045437', NULL, NULL, 'BAIDOO ', 'SARAH ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'baidoosarah200045437@gmail.com', 206488015, '0000-00-00', '2023-01-01', 0),
('200045438', NULL, NULL, 'EDWARDS ', 'FIELD ', ' KOJO', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'edwardsfield200045438@gmail.com', 205243090, '0000-00-00', '2023-01-01', 0),
('200045441', NULL, NULL, 'HAWAWU ', 'SADICK ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'hawawusadick200045441@gmail.com ', 550489111, '0000-00-00', '2023-01-01', 0),
('200045450', NULL, NULL, 'VIADALO ', 'JOSE MARIA ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'viadalojosemaria200045450@gmail.com', 553830286, '0000-00-00', '2023-01-01', 0),
('200045459', NULL, NULL, 'OFORI ', 'ESTRA ', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 100, 'oforiestra200045459@gmail.com', 556400565, '0000-00-00', '2023-01-01', 0),
('200045462', NULL, NULL, 'AMPONSAH ', 'MILDRED ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'amponsahmildred200045462@gmail.com', 558389658, '0000-00-00', '2023-01-01', 0),
('200045464', NULL, NULL, 'ADU ', 'SHARON  ', 'ROSE', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'adusharon200045464@gmail.com', 546374430, '0000-00-00', '2023-01-01', 0),
('200045490', NULL, NULL, 'SANKYE ', 'BABORN  ', 'JOB', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'sankyebaborn200045490@gmail.com', 507267951, '0000-00-00', '2023-01-01', 0),
('200045497', NULL, NULL, 'ATOBRAH ', 'PRINCE ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 100, 'atobrahprince200045497@gmail.com', 558240220, '0000-00-00', '2023-01-01', 0),
('200045522', NULL, NULL, 'ASANFUL ', 'SOLOMON ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asanfulsolomon200045522@gmail.com', 240208496, '0000-00-00', '2023-01-01', 0),
('200045534', NULL, NULL, 'AMANING ', 'ESTHER ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'amaningesther200045534@gmail.com', 545397604, '0000-00-00', '2023-01-01', 0),
('200045552', NULL, NULL, 'BAIDOO ', 'HAGAR  ', 'CHANCE', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'baidoohagar200045552@gmail.com', 555065124, '0000-00-00', '2023-01-01', 0),
('200045554', NULL, NULL, 'ABAIDOO ', 'JOYCELINE ', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:17', NULL, 0, 100, 'abaidoojoyceline200045554@gmail.com', 243025747, '0000-00-00', '2023-01-01', 0),
('200045564', NULL, NULL, 'OWUSU ', 'FELIX ', '', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'owusufelix200045564@gmail.com', 555724491, '0000-00-00', '2023-01-01', 0),
('200045577', NULL, NULL, 'ACHEAMPONG ', 'DOREEN ', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'acheampongdoreen200045577@gmail.com', 242755346, '0000-00-00', '2023-01-01', 0),
('200045589', NULL, NULL, 'FOSUAA ', 'PORTIA ', '', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:24', NULL, 0, 100, 'fosuaaportia200045589@gmail.com', 547407849, '2036-10-01', '2023-01-01', 0),
('200045598', NULL, NULL, 'ADU ', 'EBENEZER ', 'BAAH ', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'aduebenezer200045598@gmail.com', 554024046, '0000-00-00', '2023-01-01', 0),
('200045599', NULL, NULL, 'AFFUM', 'ISHMAEL', 'LARBI', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'affumishmael200045599@gmail.com', 542631294, '0000-00-00', '2023-01-01', 0),
('200045618', NULL, NULL, 'AGYEMANG ', 'FAUSTINA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'agyemangfaustina200045618@gmail.com', 246059893, '0000-00-00', '2023-01-01', 0),
('200045624', NULL, NULL, 'TUFFOUR ', 'BRIGHT ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'tuffourbright200045624@gmail.com', 542562782, '0000-00-00', '2023-01-01', 0),
('200045632', NULL, NULL, 'KONADU ', 'LINDA ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'konadulinda200045632@gmail.com', 547694513, '0000-00-00', '2023-01-01', 0),
('200045635', NULL, NULL, 'ADJEI', 'KWABENA ANANE', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:18', NULL, 0, 100, 'adjeikwabenaanane200045635@gmail.com', 241802444, '0000-00-00', '2023-01-01', 0),
('200045650', NULL, NULL, 'AKOTO ', 'REBECCA ', 'OSEI ', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:30', NULL, 0, 100, 'akotorebecca200045650@gmail.com', 247484456, '0000-00-00', '2023-01-01', 0),
('200045656', NULL, NULL, 'ACQUAH ', 'CHARLOTTE ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:29', NULL, 0, 100, 'acquahcharlotte200045656@gmail.com', 240444989, '0000-00-00', '2023-01-01', 0),
('200045664', NULL, NULL, 'FOSUHENE ', 'HELINA  ', 'ADU', '2', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 100, 'fosuhenehelina200045664@gmail.com', 557409169, '0000-00-00', '2023-01-01', 0),
('200045672', NULL, NULL, 'DUKU ', 'ELIZABETH ', '', '5', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'dukuelizabeth200045672@gmail.com', 556832452, '0000-00-00', '2023-01-01', 0),
('200045673', NULL, NULL, 'TETTEH', 'ABRAHAM', '', '3', NULL, NULL, NULL, NULL, '2023-12-17 22:16:33', NULL, 0, 100, 'tettehabraham200045673@gmail.com', 557016409, '0000-00-00', '2023-01-01', 0),
('200045687', NULL, NULL, 'ANSAH ', 'EBENEZER ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'ansahebenezer200045687@gmail.com', 551964131, '0000-00-00', '2023-01-01', 0),
('200045695', NULL, NULL, 'QUAYSIE', 'PRINCE', '', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:28', NULL, 0, 100, 'quaysieprince200045695@gmail.com', 558389583, '0000-00-00', '2023-01-01', 0),
('200045696', NULL, NULL, 'AWINABA ', 'MODESTER ', 'AYABIL ', '8', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'awinabamodester200045696@gmail.com ', 248175072, '0000-00-00', '2023-01-01', 0),
('200045703', NULL, NULL, 'AMEAH ', 'JEFFERSON ', 'ADJEI ', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'ameahjefferson200045703@gmail.com', 556221911, '0000-00-00', '2023-01-01', 0),
('200045704', NULL, NULL, 'OBENG-BOATEMAA', 'JULIET', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:27', NULL, 0, 100, 'obeng-boatemaajuliet200045704@gmail.com', 558204258, '0000-00-00', '2023-01-01', 0),
('200045707', NULL, NULL, 'IDDRISS ', 'ABDUL  ', 'RAZAK', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'iddrissabdul200045707@gmail.com', 549392424, '0000-00-00', '2023-01-01', 0),
('200045721', NULL, NULL, 'AMOAH-DARKWAH ', 'KWAME ', 'BOAMPONG ', '6', NULL, NULL, NULL, NULL, '2023-12-17 22:16:19', NULL, 0, 100, 'amoah-darkwahkwame200045721@gmail.com', 542658995, '0000-00-00', '2023-01-01', 0),
('200045735', NULL, NULL, 'BOATENG ', 'RICKY  ', 'SERWAA', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:16', NULL, 0, 100, 'boatengricky200045735@gmail.com', 246775136, '0000-00-00', '2023-01-01', 0),
('200045748', NULL, NULL, 'ENNIN ', 'BERNICE ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:31', NULL, 0, 100, 'enninbernice200045748@gmail.com', 542201349, '0000-00-00', '2023-01-01', 0),
('200045756', NULL, NULL, 'ARMAH ', 'AGNES ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:20', NULL, 0, 100, 'armahagnes200045756@gmail.com', 241355015, '0000-00-00', '2023-01-01', 0),
('200045759', NULL, NULL, 'KORNOR ', 'JOSEPH ', '', '7', NULL, NULL, NULL, NULL, '2023-12-17 22:16:25', NULL, 0, 100, 'kornorjoseph200045759@gmail.com', 240324663, '0000-00-00', '2023-01-01', 0),
('200046057', NULL, NULL, 'ASANTE ', 'CONSTANCE ', '', '1', NULL, NULL, NULL, NULL, '2023-12-17 22:16:21', NULL, 0, 100, 'asanteconstance200046057@gmail.com', 559902583, '0000-00-00', '2023-01-01', 0),
('Wace/JHS/ 18/0131', NULL, NULL, 'Baafi', 'Joshua', 'Agyei', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:22', NULL, 0, 100, 'baafijoshuawace/jhs/ 18/0131@gmail.com', 247997184, '0000-00-00', '2023-01-01', 0),
('WACE/JHS/18/0270', NULL, NULL, 'NKRUMAH', 'LYDIA', '', '4', NULL, NULL, NULL, NULL, '2023-12-17 22:16:26', NULL, 0, 100, 'nkrumahlydiawace/jhs/18/0270@gmail.com', 554971060, '0000-00-00', '2023-01-01', 0);

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
(48, '200045598', 0x3a3a3100000000000000000000000000, '2023-11-14 02:34:37', '14-11-2023 08:04:39 AM', 1),
(49, '200043840', 0x3a3a3100000000000000000000000000, '2023-11-20 17:19:51', NULL, 1),
(97, '200043840', 0x3a3a3100000000000000000000000000, '2023-11-21 02:49:48', NULL, 1),
(98, '200043840', 0x3a3a3100000000000000000000000000, '2023-11-21 12:35:20', '21-11-2023 06:11:16 PM', 1),
(99, '200043840', 0x3a3a3100000000000000000000000000, '2023-11-26 11:13:36', NULL, 1),
(100, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-03 02:18:27', '04-12-2023 09:03:21 PM', 1),
(101, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-06 08:26:23', '06-12-2023 06:43:24 PM', 1),
(102, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-06 13:28:18', '06-12-2023 07:11:49 PM', 1),
(103, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-06 13:44:22', '07-12-2023 12:32:54 AM', 1),
(104, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-06 19:33:11', '07-12-2023 01:51:30 AM', 1),
(105, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-06 20:21:34', '07-12-2023 01:57:16 AM', 1),
(106, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-07 09:58:58', '07-12-2023 03:37:54 PM', 1),
(107, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-08 12:37:38', NULL, 1),
(108, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-08 15:35:54', '08-12-2023 09:08:43 PM', 1),
(109, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-08 22:42:47', '09-12-2023 04:17:40 AM', 1),
(110, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-08 23:21:39', NULL, 1),
(111, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-08 23:26:04', '09-12-2023 06:20:52 AM', 1),
(112, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-09 22:27:06', '10-12-2023 09:17:59 AM', 1),
(113, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-10 04:26:11', '10-12-2023 03:27:21 PM', 1),
(114, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-10 09:59:28', '10-12-2023 03:48:09 PM', 1),
(115, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-10 10:18:36', '10-12-2023 05:09:09 PM', 1),
(116, '200045681', 0x3a3a3100000000000000000000000000, '2023-12-10 13:33:03', NULL, 1),
(117, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-11 02:02:13', '12-12-2023 01:02:51 AM', 1),
(118, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-11 19:36:10', '12-12-2023 03:38:47 AM', 1),
(119, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-12 17:22:00', '12-12-2023 10:53:25 PM', 1),
(120, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-12 18:07:22', NULL, 1),
(121, '200043840', 0x3a3a3100000000000000000000000000, '2023-12-12 18:08:44', '12-12-2023 11:38:52 PM', 1),
(122, '2000045681', 0x3a3a3100000000000000000000000000, '2023-12-22 00:15:57', NULL, 1),
(123, '2000045681', 0x3a3a3100000000000000000000000000, '2023-12-22 13:24:49', '23-12-2023 07:32:54 AM', 1),
(124, '2000045681', 0x3a3a3100000000000000000000000000, '2023-12-23 02:03:08', '23-12-2023 07:33:23 AM', 1),
(125, '2000045681', 0x3a3a3100000000000000000000000000, '2023-12-23 02:13:31', '23-12-2023 08:02:37 AM', 1),
(126, '2000045681', 0x3a3a3100000000000000000000000000, '2023-12-23 02:33:02', NULL, 1),
(127, '2000045681', 0x3a3a3100000000000000000000000000, '2023-12-25 09:28:00', '27-12-2023 09:41:22 PM', 1),
(128, '2000045681', 0x3a3a3100000000000000000000000000, '2024-01-05 12:45:19', '30-12-2023 04:55:16 PM', 1),
(129, '2000045681', 0x3a3a3100000000000000000000000000, '2024-01-02 18:29:32', '03-01-2024 12:01:20 AM', 1),
(130, '2000045681', 0x3a3a3100000000000000000000000000, '2024-01-03 11:23:47', NULL, 1);

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
  ADD KEY `FK_course_department` (`programme_id`),
  ADD KEY `FK_course_semester` (`semester_id`),
  ADD KEY `FK_course_level` (`level_id`),
  ADD KEY `idx_courseCode` (`courseCode`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graduation`
--
ALTER TABLE `graduation`
  ADD PRIMARY KEY (`graduationID`),
  ADD KEY `studentRegno` (`studentRegno`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_programme_id` (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_result` (`studentRegno`,`courseCode`,`level`,`semester`),
  ADD KEY `courseCode` (`courseCode`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_semester_level` (`level_id`),
  ADD KEY `FK_semester_programme` (`programme_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `studentRegno` (`studentRegno`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `graduation`
--
ALTER TABLE `graduation`
  MODIFY `graduationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programme`
--
ALTER TABLE `programme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_course_level` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `FK_course_semester` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`);

--
-- Constraints for table `graduation`
--
ALTER TABLE `graduation`
  ADD CONSTRAINT `graduation_ibfk_1` FOREIGN KEY (`studentRegno`) REFERENCES `students` (`studentRegno`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`studentRegno`) REFERENCES `students` (`studentRegno`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `FK_semester_level` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`),
  ADD CONSTRAINT `FK_semester_programme` FOREIGN KEY (`programme_id`) REFERENCES `programme` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

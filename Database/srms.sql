-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 08:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`userid`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `name` varchar(30) NOT NULL,
  `id` int(3) NOT NULL,
  `course1` text NOT NULL,
  `course2` text NOT NULL,
  `course3` text NOT NULL,
  `course4` text NOT NULL,
  `course5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`name`, `id`, `course1`, `course2`, `course3`, `course4`, `course5`) VALUES
('Anatomy', 103, '', '', '', '', ''),
('Biochemistry', 104, '', '', '', '', ''),
('Computer Science', 101, 'Introduction to programming', 'Algebra', 'Artificial Intelligence', 'Database Laboratory', 'Calculus'),
('geography', 110, '', '', '', '', ''),
('Medicine', 102, '', '', '', '', ''),
('Microbiology', 109, '', '', '', '', ''),
('Nursing', 105, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(234) NOT NULL,
  `class` varchar(234) NOT NULL,
  `rno` int(234) NOT NULL,
  `course1` varchar(234) NOT NULL,
  `course2` varchar(234) NOT NULL,
  `course3` varchar(234) NOT NULL,
  `course4` varchar(234) NOT NULL,
  `course5` varchar(234) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `class`, `rno`, `course1`, `course2`, `course3`, `course4`, `course5`) VALUES
(0, 'Computer science', 101, '', '', '', '', ''),
(0, 'Computer science', 101, 'csc', 'csc4', 'csc5', 'csc6', 'csc7'),
(0, 'Computer science', 101, 'csc', 'csc4', 'csc5', 'csc6', 'csc7'),
(0, 'Computer science', 101, 'csc', 'csc4', 'csc5', 'csc6', 'csc7'),
(0, 'Medicine', 102, 'Biochemistry', 'Physiology', 'Dental Hygiene', 'Maternal Health', 'Pharmacology');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class` varchar(30) NOT NULL,
  `p1` int(3) NOT NULL,
  `p2` int(3) NOT NULL,
  `p3` int(3) NOT NULL,
  `p4` int(3) NOT NULL,
  `p5` int(3) NOT NULL,
  `marks` int(3) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`name`, `rno`, `class`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES
('chukwuemeka', 101, 'Computer Science', 12, 12, 12, 0, 0, 36, 7.2),
('chukwuemeka', 101, 'Computer Science', 12, 12, 0, 0, 0, 24, 4.8),
('chukwuemeka', 101, 'Computer Science', 12, 13, 14, 0, 0, 39, 7.8),
('chukwuemeka', 101, 'Computer Science', 75, 23, 45, 43, 66, 252, 50.4),
('chukwuemeka', 101, 'Computer Science', 75, 23, 45, 43, 66, 252, 50.4),
('Azuh Bernard', 1019, 'Computer Science', 43, 23, 77, 54, 34, 231, 46.2),
('Ada Okoh', 102, 'Medicine', 85, 45, 43, 67, 89, 329, 65.8);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES
('Azuh Bernard', 1019, 'Computer Science'),
('chukwuemeka', 101, 'Computer Science'),
('Ada Okoh', 102, 'Medicine');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD KEY `class` (`class`),
  ADD KEY `name` (`name`,`rno`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`name`,`rno`),
  ADD KEY `class_name` (`class_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`class`) REFERENCES `class` (`name`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`name`,`rno`) REFERENCES `students` (`name`, `rno`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `class` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

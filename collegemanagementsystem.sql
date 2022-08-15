-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 10:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegemanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic`
--

CREATE TABLE `academic` (
  `serial` int(10) NOT NULL,
  `year` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` time NOT NULL,
  `subject` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`serial`, `year`, `section`, `day`, `time`, `subject`) VALUES
(1, 'First Year', 'A', 'Sunday', '08:00:00', 'Math'),
(2, 'First Year', 'A', 'Physics', '09:30:00', 'Physics'),
(3, 'First Year', 'A', 'Sunday', '01:00:00', 'Chemistry'),
(4, 'First Year', 'A', 'Biology', '00:00:00', 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) NOT NULL,
  `cname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `cname`, `year`, `code`) VALUES
(1, 'physics 1st paper', '1st ', 3003),
(2, 'physics 1st paper', '1st', 3003),
(3, 'physics 1st paper', '1st', 3003);

-- --------------------------------------------------------

--
-- Table structure for table `c_1`
--

CREATE TABLE `c_1` (
  `serial` int(10) NOT NULL,
  `total course` int(255) NOT NULL,
  `active course` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_1`
--

INSERT INTO `c_1` (`serial`, `total course`, `active course`) VALUES
(1, 120, 120);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `user_type`) VALUES
(1, 'admin', 'pass', 1),
(2, 'user', 'pass', 3),
(3, 'teacher', 'pass', 2),
(4, 'admin1', 'pass', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `contact`, `address`, `f_name`, `year`, `month`, `amount`, `date`, `username`) VALUES
(1, 'Tusher', 1679092831, 'Gulshan', 'Mohsin Ali', '1st year', 'January', '15000', '2020-01-06', 'Josim');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `serial` int(11) NOT NULL,
  `section name` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limt` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`serial`, `section name`, `year`, `limt`) VALUES
(1, 'A', '1st ', 40),
(2, 'B', '2nd', 40),
(3, 'C', '2nd', 50);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Id` int(10) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `f_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_year` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id`, `name`, `dob`, `contact`, `gender`, `address`, `f_name`, `m_name`, `c_year`, `username`, `password`) VALUES
(1, 'Tusher', '2020-02-20', '01679092831', 'male', 'Shantinagar', 'Fathers Name', 'Mothers Name', '2nd', 'Tusher@1212', 'pass'),
(2, 'Test', '2020-06-11', '01679092831', 'male', 'Shantinagar', 'Fathers Name', 'Mothers Name', '2nd', 'Tusher@1212', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `s_1`
--

CREATE TABLE `s_1` (
  `serial` int(10) NOT NULL,
  `total student` int(255) NOT NULL,
  `active student` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s_1`
--

INSERT INTO `s_1` (`serial`, `total student`, `active student`) VALUES
(1, 120, 120);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `dob`, `contact`, `email`, `gender`, `address`, `dept`, `username`, `password`) VALUES
(1, 'Ismail', '0000-00-00', 1521560123, 'ismail123@gmail.com', 'Male', 'uttara', 'Science', 'Josim', 'josim123456');

-- --------------------------------------------------------

--
-- Table structure for table `t_1`
--

CREATE TABLE `t_1` (
  `serial` int(10) NOT NULL,
  `total teacher` int(255) NOT NULL,
  `active teacher` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_1`
--

INSERT INTO `t_1` (`serial`, `total teacher`, `active teacher`) VALUES
(1, 120, 120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic`
--
ALTER TABLE `academic`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_1`
--
ALTER TABLE `c_1`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `s_1`
--
ALTER TABLE `s_1`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_1`
--
ALTER TABLE `t_1`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic`
--
ALTER TABLE `academic`
  MODIFY `serial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `c_1`
--
ALTER TABLE `c_1`
  MODIFY `serial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `s_1`
--
ALTER TABLE `s_1`
  MODIFY `serial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_1`
--
ALTER TABLE `t_1`
  MODIFY `serial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

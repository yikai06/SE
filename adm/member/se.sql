-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 07:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'TAN YI KAI', '1211201274@student.mmu.edu.my', 'Abc12345()');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `member` varchar(125) NOT NULL,
  `trainer` varchar(125) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `create_time` datetime NOT NULL,
  `status` enum('ACTIVE','HIDE') NOT NULL,
  `image` varchar(125) NOT NULL,
  `duration` varchar(125) NOT NULL,
  `detail` longtext NOT NULL,
  `day` varchar(125) NOT NULL,
  `trash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `create_time`, `status`, `image`, `duration`, `detail`, `day`, `trash`) VALUES
(1, 'test', '2024-02-06 10:02:52', 'ACTIVE', '1707184964-mmexport1624370458427.jpg', '45 min', 'testing', '{day:monday,\r\nsort:1,\r\ntime:11.00am,\r\ntrash:0,\r\nday:tuesday,\r\nsort:2,\r\ntime:11.00am,\r\ntrash:0}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coursemanager`
--

CREATE TABLE `coursemanager` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coursemanager`
--

INSERT INTO `coursemanager` (`id`, `name`, `email`, `password`) VALUES
(1, 'TAN YI KAI', '1211201274@student.mmu.edu.my', 'Abc12345()');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `fullname` varchar(125) NOT NULL,
  `lastname` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `phone` varchar(125) NOT NULL,
  `plan` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `attendance` varchar(125) NOT NULL,
  `task` varchar(255) NOT NULL,
  `age` int(125) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `trainer` varchar(125) NOT NULL,
  `class` varchar(125) NOT NULL,
  `create_time` datetime NOT NULL,
  `trash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `fullname`, `lastname`, `email`, `password`, `phone`, `plan`, `payment`, `attendance`, `task`, `age`, `gender`, `trainer`, `class`, `create_time`, `trash`) VALUES
(14, 'test', 't', 'tt2', 'yktan651@gmail.com', '202cb962ac59075b964b07152d234b70', '0123445467', 2, 29, '', '', 12, 'male', '', '', '2024-02-06 09:56:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `payment_method` varchar(125) NOT NULL,
  `price` varchar(125) NOT NULL,
  `plan` int(11) NOT NULL,
  `paid_time` datetime NOT NULL,
  `due` datetime DEFAULT NULL,
  `paid_trainer` datetime DEFAULT NULL,
  `trash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `member`, `payment_method`, `price`, `plan`, `paid_time`, `due`, `paid_trainer`, `trash`) VALUES
(29, 14, 'Online Trasfer', '', 2, '2024-02-05 21:17:26', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `price` varchar(125) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `status` enum('ACTIVE','HIDE') NOT NULL,
  `trash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `name`, `price`, `create_time`, `status`, `trash`) VALUES
(1, 'normal', '255', '2024-02-05 10:41:36', 'ACTIVE', 0),
(2, 'platinum', '300', '2024-02-06 10:41:28', 'ACTIVE', 0),
(3, 'test', '11.11', '2024-02-06 10:47:07', 'ACTIVE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `email` varchar(125) NOT NULL,
  `status` varchar(125) NOT NULL,
  `trash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `email`, `status`, `trash`) VALUES
(1, 'yktan651@gmail.com', 'member', 1),
(3, '12@gmail.com', 'trainer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `image` varchar(125) NOT NULL,
  `create_time` datetime NOT NULL,
  `status` enum('ACTIVE','HIDE') NOT NULL,
  `trash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `image`, `create_time`, `status`, `trash`) VALUES
(1, 'tess', '1707185403-mmexport1624370458427.jpg', '2024-02-06 10:20:30', 'HIDE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `day` varchar(125) NOT NULL,
  `from` varchar(125) NOT NULL,
  `to` varchar(125) NOT NULL,
  `member` varchar(125) NOT NULL,
  `trainer` varchar(125) NOT NULL,
  `detail` varchar(125) NOT NULL,
  `trash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `firstname` varchar(125) NOT NULL,
  `lastname` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `phone` int(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `age` int(125) NOT NULL,
  `ic` varchar(125) NOT NULL,
  `info` longtext NOT NULL,
  `image` varchar(125) NOT NULL,
  `create_time` datetime NOT NULL,
  `member` varchar(125) NOT NULL,
  `trash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `username`, `firstname`, `lastname`, `email`, `phone`, `password`, `age`, `ic`, `info`, `image`, `create_time`, `member`, `trash`) VALUES
(1, 'test', 'yk', 'yk', '12@gmail.com', 123445467, '202cb962ac59075b964b07152d234b70', 12, '123456789', 'testing', '1707184506-', '2024-02-06 09:55:06', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursemanager`
--
ALTER TABLE `coursemanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursemanager`
--
ALTER TABLE `coursemanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

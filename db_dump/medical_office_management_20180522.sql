-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2018 at 01:01 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_office_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `illness_historys`
--

CREATE TABLE `illness_historys` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `datetime_come_in` datetime NOT NULL,
  `datetime_go_out` datetime NOT NULL,
  `illness_name` varchar(255) NOT NULL,
  `medicine` varchar(255) NOT NULL,
  `is_sent_message` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `illness_historys`
--

INSERT INTO `illness_historys` (`id`, `student_id`, `nurse_id`, `datetime_come_in`, `datetime_go_out`, `illness_name`, `medicine`, `is_sent_message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-05-22 00:00:00', '2018-05-23 00:00:00', 'ท้องเสีย', 'ยา', 1, '2017-09-20 00:00:00', '2017-09-20 00:00:00'),
(2, 1, 1, '2018-05-22 00:00:00', '2018-05-23 08:00:00', 'ท้องเสีย', '', 0, '2018-05-22 10:00:00', '0000-00-00 00:00:00'),
(3, 2, 1, '2018-05-22 07:00:00', '2018-05-22 15:27:00', 'ท้องเสีย', '', 0, '2017-09-20 14:47:06', '2017-09-20 14:47:06'),
(10, 1, 1, '2018-05-22 10:00:00', '2018-05-22 13:16:00', 'ท้องเสีย', '', 0, '2017-09-15 00:00:00', '2017-09-20 19:17:58'),
(11, 1, 1, '2018-05-22 09:00:00', '2018-05-22 19:00:00', 'ท้องเสีย', '', 0, '2017-09-20 00:00:00', '2017-09-20 19:22:09'),
(12, 1, 1, '2018-05-22 10:00:00', '2018-05-22 19:00:00', 'ท้องเสีย', '', 0, '2017-09-07 00:00:00', '2017-09-21 17:32:54'),
(14, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, '2018-05-22 15:09:08', '2018-05-22 15:09:08'),
(15, 2, 1, '2017-04-21 10:00:00', '2018-05-22 11:00:00', 'headeick', 'medicine', 0, '2018-05-22 15:22:28', '2018-05-22 15:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `login_key` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `login_key`, `password`, `first_name`, `last_name`) VALUES
(1, 'admin', 'admin', 'nurse', 'lname');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `login_key` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `student_number` varchar(100) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `blood_type` varchar(100) NOT NULL,
  `weight` decimal(10,0) NOT NULL,
  `height` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stident Management Table';

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `login_key`, `password`, `first_name`, `last_name`, `class_name`, `student_number`, `sex`, `birthday`, `blood_type`, `weight`, `height`) VALUES
(1, '', '', 'สพล', 'เจริญสมบัติ', '5/5', '6', 0, '2012-05-22', 'A', '170', '60'),
(2, '', '', 'ชุติกาญจน์', 'รัตนประสิทธิ์', '5/5', '13', 1, '2012-05-22', 'B', '160', '50');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`) VALUES
(1, 'Keisuke', 'Minami'),
(2, 'Mingkhwan', 'Rakying');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `illness_historys`
--
ALTER TABLE `illness_historys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `illness_historys`
--
ALTER TABLE `illness_historys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

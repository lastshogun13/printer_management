-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2018 at 09:15 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `printer_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `print_historys`
--

CREATE TABLE `print_historys` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `room_name` varchar(11) NOT NULL,
  `page_count` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `print_historys`
--

INSERT INTO `print_historys` (`id`, `student_id`, `first_name`, `last_name`, `room_name`, `page_count`, `is_paid`, `created_at`, `updated_at`) VALUES
(1, 1000, 'keisuke', 'minami', 'comA', 10, 0, '2017-09-20 00:00:00', '2017-09-20 00:00:00'),
(2, 1000, 'keisuke', 'minami', 'comB', 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1001, 'aaa', 'bbb', '1011', 50, 0, '2017-09-20 14:47:06', '2017-09-20 14:47:06'),
(10, 1023, 'kkkk', 'mmmm', 'com A', 8, 0, '2017-09-15 00:00:00', '2017-09-20 19:17:58'),
(11, 1023, 'kkkk', 'mmmm', 'com A', 10, 0, '2017-09-20 00:00:00', '2017-09-20 19:22:09'),
(12, 1011, 'kkk', 'mmm', 'com A', 1, 0, '2017-09-07 00:00:00', '2017-09-21 17:32:54');

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
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Stident Management Table';

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `login_key`, `password`, `first_name`, `last_name`, `class_name`) VALUES
(1000, 'root', 'aaaaaaaa', 'keisuke', 'minami', '4/1'),
(1001, 'aaa', 'bbb', 'aaa', 'bbb', '4/4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `print_historys`
--
ALTER TABLE `print_historys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `print_historys`
--
ALTER TABLE `print_historys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

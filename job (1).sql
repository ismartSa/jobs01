-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2019 at 06:38 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `logo` text NOT NULL,
  `addr` text NOT NULL,
  `job_name` varchar(200) NOT NULL,
  `job_repo` varchar(50) NOT NULL,
  `edu_requir` varchar(70) NOT NULL,
  `emp_status` varchar(30) NOT NULL,
  `other_benifits` varchar(50) NOT NULL,
  `descr` text NOT NULL,
  `deadline` text NOT NULL,
  `type` varchar(90) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_name`, `logo`, `addr`, `job_name`, `job_repo`, `edu_requir`, `emp_status`, `other_benifits`, `descr`, `deadline`, `type`, `time`) VALUES
(1, 'Softwix', '', 'Jeddah , .....', 'web Developer', 'dsd', 'Dbloma', 'assasa', 'asasaddsdas', 'dfasfdsafdsfdsfadsf', '2019/5/15', 'Information Technology', '2019-04-28 10:09:37'),
(2, 'Softwix2', '', 'Jeddah , .....', 'Business Administration ', 'dsd', 'Dbloma', 'assasa', 'asasaddsdas', 'dfasfdsafdsfdsfadsf', '2019/5/15', 'Business Administration', '2019-04-28 10:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `job_id`, `user_id`) VALUES
(8, 1, '1'),
(9, 1, '1'),
(10, 1, '1'),
(11, 1, '1'),
(12, 1, '1'),
(13, 1, '1'),
(14, 1, '1'),
(15, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_number` int(11) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `skills` text NOT NULL,
  `edu_level` varchar(50) NOT NULL,
  `birth` text NOT NULL,
  `addr` text NOT NULL,
  `tel` varchar(50) NOT NULL,
  `descr` text NOT NULL,
  `is_completed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `id_number`, `pass`, `job_name`, `skills`, `edu_level`, `birth`, `addr`, `tel`, `descr`, `is_completed`) VALUES
(1, 'Mohamed ALi', 'moa88922@gmail.com', 123, '123', 'Developer', 'sa', 'BC', '2019-04-28', 'sa', '0928802253', 'w', 1),
(7, 'Mohamed ALi', 'rembatalnor@hotmail.com', 123, '123', '', '', '', '', '', '', '', 0),
(8, 'Mohamed ALi', 'm@m.com', 12, '123', '', '', '', '', '', '', '', 0),
(9, 'Mohamed ALi', '1@gmail.com', 1, '1', '', '', '', '', '', '', '', 0),
(10, '', '', 0, '1', '', '', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

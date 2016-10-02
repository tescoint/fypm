-- phpMyAdmin SQL Dump
-- version 4.6.3deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2016 at 07:38 AM
-- Server version: 5.6.30-1
-- PHP Version: 5.6.17-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `student_matric` varchar(200) NOT NULL,
  `student_department` varchar(200) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `lecturer_username` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `year` varchar(200) NOT NULL,
  `session` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `student_name`, `student_matric`, `student_department`, `topic`, `lecturer_username`, `status`, `year`, `session`) VALUES
(1, 'Ola Taiwo', '20130204001', 'Computer And Information Sciences', 'My name is LaX', 'adedeji', 0, '2016-05-15  17:57:31', '2015/2016'),
(2, 'Oshodi Olakunbi', '20130204134', 'Health Education', 'Why I am with Amiota', 'adedeji', 0, '2016-05-15  18:26:12', '2016/2017'),
(3, 'Oladipupo Odutayo', '20130204105', 'Computer And Information Sciences', 'Design and Implementation of A CBT SYSTEM for Computer Science Courses', 'adedeji', 0, '2016-05-16  15:39:17', '2015/2016');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `department`, `status`, `phone_no`, `username`, `password`) VALUES
(1, 'Adedeji', 'Computer And Information Sciences', 1, 0, 'adedeji', 'adedeji');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `topic` (`topic`),
  ADD KEY `lecturer_id` (`lecturer_username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 04:14 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ldds`
--
CREATE DATABASE IF NOT EXISTS `ldds` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ldds`;

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

DROP TABLE IF EXISTS `committee`;
CREATE TABLE `committee` (
  `student_id` varchar(10) NOT NULL,
  `position` varchar(20) NOT NULL,
  `image_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `committee`:
--   `student_id`
--       `member` -> `student_id`
--

--
-- Truncate table before insert `committee`
--

TRUNCATE TABLE `committee`;
-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `venue` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `person_in_charge` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `event`:
--   `person_in_charge`
--       `member` -> `student_id`
--

--
-- Truncate table before insert `event`
--

TRUNCATE TABLE `event`;
--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `date`, `start_time`, `end_time`, `venue`, `capacity`, `deadline`, `person_in_charge`) VALUES
(4, 'Annual Meeting', 'This is just a normal annual meeting', '2021-12-31', '12:00:00', '14:00:00', 'Main Foyer', 100, '2021-11-11', '20PMD00679');

-- --------------------------------------------------------

--
-- Table structure for table `event_registration`
--

DROP TABLE IF EXISTS `event_registration`;
CREATE TABLE `event_registration` (
  `registration_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `event_registration`:
--   `student_id`
--       `member` -> `student_id`
--   `event_id`
--       `event` -> `id`
--

--
-- Truncate table before insert `event_registration`
--

TRUNCATE TABLE `event_registration`;
-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `name` varchar(30) NOT NULL,
  `img_path` varchar(30) DEFAULT 'default.png',
  `student_id` varchar(10) NOT NULL,
  `password` varchar(65) NOT NULL,
  `ic_no` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(12) NOT NULL,
  `faculty` varchar(5) NOT NULL,
  `course_code` varchar(3) NOT NULL,
  `permission_level` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `member`:
--

--
-- Truncate table before insert `member`
--

TRUNCATE TABLE `member`;
--
-- Dumping data for table `member`
--

INSERT INTO `member` (`name`, `img_path`, `student_id`, `password`, `ic_no`, `email`, `phone_no`, `faculty`, `course_code`, `permission_level`) VALUES
('Neoh Yi Zhen', 'default.png', '20PMD00001', '718d328c3a90caf7fe508a6a679e8aa74f2ebf80d30a5b227ef457d92c88af44', '010101-01-0101', 'neohyz@gmail.com', '0176666777', 'FOCS', 'DFT', 0),
('Tan Kai Deng', 'default.png', '20PMD00002', 'ac8ce7b28dfb17800988a8ff9d14ed269dcc74bc9c7bda2b006037c8da6122b1', '020710-01-0101', 'kaideng@gmail.com', '0199797997', 'FOCS', 'DFT', 0),
('Tan Kin Loke', '20PMD00679.png', '20PMD00679', 'cc51a5bf62531dc53de0553ca28e7ddfdf8e27e0b1c329a39715490d024a13a3', '010101-01-0101', 'kinloketan@gmail.com', '0166682798', 'FOCS', 'DFT', 1),
('Bryan Lai Wei Ming', 'default.png', '20PMD02338', 'ac8ce7b28dfb17800988a8ff9d14ed269dcc74bc9c7bda2b006037c8da6122b1', '020820-07-0101', 'bryanlai@gmail.com', '0167777666', 'FOCS', 'DFT', 0),
('Chiam Jin Qin', 'default.png', '20PMD02755', 'ac8ce7b28dfb17800988a8ff9d14ed269dcc74bc9c7bda2b006037c8da6122b1', '020228-03-0101', 'chiamjq-pm20@student.tarc.edu.my', '013-3131322', 'FOCS', 'DFT', 1),
('Tan Yan Hao', 'default.png', '20PMD11111', 'ac8ce7b28dfb17800988a8ff9d14ed269dcc74bc9c7bda2b006037c8da6122b1', '010101-01-0101', 'yanhao@gmail.com', '0122345689', 'FOCS', 'DFT', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_in_charge` (`person_in_charge`) USING BTREE;

--
-- Indexes for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `event_id` (`event_id`,`student_id`) USING BTREE,
  ADD KEY `student_id` (`student_id`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_registration`
--
ALTER TABLE `event_registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `member` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`person_in_charge`) REFERENCES `member` (`student_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `event_registration`
--
ALTER TABLE `event_registration`
  ADD CONSTRAINT `event_registration_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `member` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_registration_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

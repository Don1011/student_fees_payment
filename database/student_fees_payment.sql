-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 03:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_fees_payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `all_students`
--

CREATE TABLE `all_students` (
  `id` int(255) NOT NULL,
  `student_fullname` varchar(30) NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `student_guardian` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `passport` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_students`
--

INSERT INTO `all_students` (`id`, `student_fullname`, `student_email`, `student_guardian`, `class`, `passport`) VALUES
(1, 'John Doe', 'johndoe@gmail.com', 'Mark Doe', 'JSS 3', './passports/ins1.jpg\r\n'),
(2, 'Kevin Doe', 'kevindoe@gmail.com', 'Mark Doe', 'JSS 3', './passports/ins2.jpg'),
(3, 'Mike Doe', 'mikedoe@gmail.com', 'Mark Doe', 'JSS 3', './passports/ins3.jpg'),
(5, 'Lewis Capali', 'lewiscapaldi@gmail.com', 'Aaron Capaldi', 'SS 1', './passports/c2.jpg'),
(6, 'Shanel Wu', 'johnwu@email.com', 'Michael Zen Wu', 'SS 1', './passports/c45e8113b423aee4.40637838.jpg'),
(7, 'Raul Ricardo', 'raulricardo@email.com', 'Alonso Ricardo', 'SS 1', './passports/c55e811494919c58.86055291.jpg'),
(8, 'Mary Addler', 'maryaddler@gmail.com', 'Gaius Addler', 'SS 1', './passports/c65e821b611fe253.06745611.jpg'),
(9, 'Edna Roman', 'thomasroman@gmail.com', 'Sheperd Roman', 'SS 3', './passports/Samantha5e9f009fdcefb8.63979923.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fee_type`
--

CREATE TABLE `fee_type` (
  `id` int(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `deadline_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_type`
--

INSERT INTO `fee_type` (`id`, `title`, `amount`, `start_date`, `deadline_date`) VALUES
(1, 'School Fees', '20,000', '01-01-2020', '01-09-2020'),
(4, 'Extra Lessons Fee', '7000', '2020-01-01', '2020-09-01'),
(7, 'School Bus Payment', '4000', '2020-03-01', '2020-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `fee_type_id` int(255) NOT NULL,
  `fee_title` varchar(100) NOT NULL,
  `fee_amount` int(255) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `fee_type_id`, `fee_title`, `fee_amount`, `date`) VALUES
(1, 1, 1, 'school_fees', 20000, '27-03-2020'),
(2, 1, 2, 'bus_payment', 5000, '27-03-2020'),
(7, 5, 1, 'School Fees', 20, '2020-03-30'),
(8, 7, 6, 'School Bus Payment', 4995, '2020-03-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_students`
--
ALTER TABLE `all_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_type`
--
ALTER TABLE `fee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `all_students`
--
ALTER TABLE `all_students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `fee_type`
--
ALTER TABLE `fee_type`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

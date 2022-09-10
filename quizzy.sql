-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 09:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(512) NOT NULL,
  `question` text NOT NULL,
  `question_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=normal, 2=true/false\r\n',
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `option_d` text NOT NULL,
  `option_e` text DEFAULT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `category`, `image`, `question`, `question_type`, `option_a`, `option_b`, `option_c`, `option_d`, `option_e`, `answer`) VALUES
(1, '8', '', 'Who is the first President of India?', 2, 'a', 'b', 'c', 'd', 'e', 'a'),
(6, '8', '', 'Who is ?', 2, 'a', 'b', 'c', 'd', 'e', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` int(255) NOT NULL,
  `ques_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `time`, `ques_id`) VALUES
(1, 'Quiz 1', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `token`, `status`, `timestamp`) VALUES
(11, 'Lakshit', 'lrsbudhsingh@gmail.com', '$2y$10$U5/kzXz.HdjJe70j0LC8ZuxnxdJ7F.zbIisW34YTtNtL91Duti1Pi', '2386981f1a44b8d3f89246df1eb97c', 'active', '2022-07-20 03:17:41'),
(12, 'Reeya', 'reeyabundela@gmail.com', '$2y$10$Q9HF6QSm1TksfdR77lsX3OdiecDNAMFnaX45aLnunTYbM31sndYDe', '782a1bd2ca7d2f38c896d4f6dccc43', 'inactive', '2022-07-20 04:00:23'),
(13, 'Reeya', 'reeyabundela99@gmail.com', '$2y$10$o.gcCUdumTOuCcSbdoBeLe3Gtf7eSCJFIu1ZkGTk2GRmGiF.3GN2S', 'cbe999ddb712ee1ed60be03a270eab', 'active', '2022-07-20 04:27:11'),
(14, 'Lakshit', 'rajputlakshit0@gmail.com', '$2y$10$KpMNoFdR3..jwkkjFmMfee0XS0IgTvA52GIpX95OuQwnTfTTY9ax.', 'e8eec01c796d1f488f7646abce7bcc', 'inactive', '2022-07-20 06:10:05'),
(15, 'Jatin', 'jatinrajput1710@gmail.com', '$2y$10$Sh7GBVcbfciQAbJ7uQ4a1e6KemkYSaZoktepW1QL.iqjgmbM6dpJW', 'f83437002c180c7d93f75472b12a0f', 'inactive', '2022-07-20 06:11:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

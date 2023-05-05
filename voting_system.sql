-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2019 at 06:55 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(6, 'admin', 'admin', 'Super Admin'),
(9, 'admin2', 'admin2', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name_of_candidate` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `party` varchar(100) NOT NULL,
  `votes_count` int(11) NOT NULL DEFAULT '0',
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name_of_candidate`, `position`, `party`, `votes_count`, `image`) VALUES
(13, 'Excellency Buhari', 'President', 'APC', 0, ''),
(14, 'Sir Yakubu', 'President', 'PDP', 1, ''),
(28, 'Mr. Emmanuel', 'President', 'DCT', 1, ''),
(40, 'Adeyemi Samson', 'Governor', 'PDP', 0, ''),
(41, 'Emmanuel Peter', 'Governor', 'APC', 0, ''),
(42, 'Oluwaseun', 'Governor', 'DCT', 2, ''),
(43, 'Mr. Samson', 'National Assembly', 'PDP', 0, ''),
(44, 'Mr. Peter', 'National Assembly', 'APC', 0, ''),
(45, 'Mr. Giggs', 'National Assembly', 'DCT', 1, ''),
(46, 'Mr. Rachel', 'State Assembly', 'DCT', 0, ''),
(47, 'Mr. Tina', 'State Assembly', 'APC', 1, ''),
(48, 'Mrs. Nina', 'State Assembly', 'PDP', 0, ''),
(49, 'Mr. Jacob', 'President', 'APC', 0, 'Capture.JPG'),
(50, 'Mr. Ebube', 'Governor', 'DCT', 2, 'Capture2.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `governor`
--

CREATE TABLE `governor` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `governor`
--

INSERT INTO `governor` (`id`, `voter_id`) VALUES
(6, 5),
(5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `national_assembly`
--

CREATE TABLE `national_assembly` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `national_assembly`
--

INSERT INTO `national_assembly` (`id`, `voter_id`) VALUES
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(11) NOT NULL,
  `party` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `party`) VALUES
(1, 'PDP'),
(6, 'APC'),
(7, 'DCT');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`) VALUES
(1, 'President'),
(5, 'Governor'),
(8, 'National Assembly'),
(9, 'State Assembly');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `president`
--

CREATE TABLE `president` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `president`
--

INSERT INTO `president` (`id`, `voter_id`) VALUES
(57, 5),
(56, 6);

-- --------------------------------------------------------

--
-- Table structure for table `startvote`
--

CREATE TABLE `startvote` (
  `id` int(11) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `startvote`
--

INSERT INTO `startvote` (`id`, `start_time`, `end_time`) VALUES
(1, '2019-06-05', '2019-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `state_assembly`
--

CREATE TABLE `state_assembly` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_assembly`
--

INSERT INTO `state_assembly` (`id`, `voter_id`) VALUES
(3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `date_reg` datetime NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `fullname`, `username`, `password`, `email`, `location`, `gender`, `status`, `image`, `date_reg`, `last_login`) VALUES
(5, 'Emmanuel', 'Emmanuel', '0bc2dbb1c74b904b66ce6f7467e86b30ae3694e5', 'Emmanuel@yahoo.com', 'Anambra State', 'Male', 'Accredited', 'Capture2.JPG', '2019-05-18 20:25:37', '2019-06-07 17:43:27'),
(6, 'femi', 'femi', '48b4a13709511e0c079bfb9d90441510f51b097e', 'femi@yahoo.com', 'anambra state', 'Male', 'UnAccredited', 'Capture.JPG', '2019-05-21 14:30:39', '2019-06-07 17:43:27'),
(7, 'tolu', 'tolu', '2c45fe08cb1574511551735ab97fa69722f58ba5', 'tolu@yahoo.com', 'tolu', 'Male', 'Accredited', '', '2019-05-21 14:50:29', '2019-06-07 17:43:27'),
(8, 'john', 'john', 'a51dda7c7ff50b61eaea0444371f4a6a9301e501', 'john@yahoo.com', 'john', 'Male', 'Accredited', '', '2019-05-21 14:51:06', '2019-06-07 17:43:27'),
(9, 'samuel', 'samuel', 'c16aab9fe3288df0fb8fc1d24990a300b6b8f299', 'samuel@yahoo.com', 'samuel', 'Female', 'Accredited', '', '2019-05-21 14:51:48', '2019-06-07 17:43:27'),
(11, 'KEMI', 'KEMI', '281a9b6ecb17f322d2f29da278ca36e3db1a9afb', 'kemi@yahoo.com', 'KEMI', 'Male', 'Accredited', 'Capture.JPG', '2019-05-23 13:22:55', '2019-06-07 17:43:27'),
(15, 'yemi', 'yemi', '3dc22350433bfb2df6254b327038aaaf508b5d1b', 'yemi@yahoo.com', 'yemi', 'Male', 'Accredited', 'Capture.JPG', '2019-05-23 14:38:05', '2019-06-07 17:43:27'),
(16, 'ajala', 'ajala', 'c2ace628f5ad1f0b2e9a62f6ce3556a46d21c72b', 'ajala@yahoo.com', 'ajala', 'Male', 'Accredited', 'Capture2.JPG', '2019-05-23 14:40:29', '2019-06-07 17:43:27'),
(17, 'peter', 'peter', '4b8373d016f277527198385ba72fda0feb5da015', 'peter@yahoo.com', 'peter', 'Male', 'Accredited', 'Capture2.JPG', '2019-05-23 14:46:07', '2019-06-07 17:43:27');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voter_id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governor`
--
ALTER TABLE `governor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voter_id` (`voter_id`);

--
-- Indexes for table `national_assembly`
--
ALTER TABLE `national_assembly`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voter_id` (`voter_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `president`
--
ALTER TABLE `president`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voter_id` (`voter_id`);

--
-- Indexes for table `startvote`
--
ALTER TABLE `startvote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_assembly`
--
ALTER TABLE `state_assembly`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voter_id` (`voter_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voter_id` (`voter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `governor`
--
ALTER TABLE `governor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `national_assembly`
--
ALTER TABLE `national_assembly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `president`
--
ALTER TABLE `president`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `startvote`
--
ALTER TABLE `startvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `state_assembly`
--
ALTER TABLE `state_assembly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

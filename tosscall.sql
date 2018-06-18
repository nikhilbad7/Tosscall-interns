-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 09:38 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tosscall`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `state_id`, `status`) VALUES
(1, 'Rangat', 1, 1),
(2, 'Vijayawada', 2, 1),
(3, 'Itanagar', 3, 1),
(4, 'Guwahati', 4, 1),
(5, 'Patna', 5, 1),
(6, 'Raipur', 6, 1),
(7, 'Malala', 8, 1),
(8, 'Faridabad', 9, 1),
(9, 'Naroli', 10, 1),
(10, 'Panaji', 11, 1),
(11, 'Surat', 12, 1),
(12, 'Shimla', 13, 1),
(13, 'Chandigarh', 14, 1),
(14, 'Jammu', 15, 1),
(15, 'Ranchi', 16, 1),
(16, 'Kochi', 17, 1),
(17, 'Bengaluru', 18, 1),
(18, 'Minicoy', 19, 1),
(19, 'Shillong', 20, 1),
(20, 'Mumbai', 21, 1),
(21, '', 22, 1),
(22, 'Bhopal', 23, 1),
(23, 'Kiolasib', 24, 1),
(24, 'Kohima', 25, 1),
(25, 'Cuttack', 26, 1),
(26, 'Amritsar', 27, 1),
(27, 'Yanam', 28, 1),
(28, 'Jaipur', 29, 1),
(29, 'Gangtok', 30, 1),
(30, 'Chennai', 31, 1),
(31, 'Udaipur', 32, 1),
(32, 'Dehradun', 33, 1),
(33, 'Varanasi', 34, 1),
(34, 'Kolkata', 35, 1),
(35, 'Hyderabad', 36, 1),
(36, 'Chandigarh', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `eventtype_id` int(11) NOT NULL,
  `favour` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `city_id` int(11) NOT NULL,
  `init_user_id` int(11) NOT NULL,
  `acce_user_id` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `liker_user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `status`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS', 1),
(2, 'ANDHRA PRADESH', 1),
(3, 'ARUNACHAL PRADESH', 1),
(4, 'ASSAM', 1),
(5, 'BIHAR', 1),
(6, 'CHATTISGARH', 1),
(7, 'CHANDIGARH', 1),
(8, 'DAMAN AND DIU', 1),
(9, 'DELHI', 1),
(10, 'DADRA AND NAGAR HAVELI', 1),
(11, 'GOA', 1),
(12, 'GUJARAT', 1),
(13, 'HIMACHAL PRADESH', 1),
(14, 'HARYANA', 1),
(15, 'JAMMU AND KASHMIR', 1),
(16, 'JHARKHAND', 1),
(17, 'KERALA', 1),
(18, 'KARNATAKA', 1),
(19, 'LAKSHADWEEP', 1),
(20, 'MEGHALAYA', 1),
(21, 'MAHARASHTRA', 1),
(22, 'MANIPUR', 1),
(23, 'MADHYA PRADESH', 1),
(24, 'MIZORAM', 1),
(25, 'NAGALAND', 1),
(26, 'ORISSA', 1),
(27, 'PUNJAB', 1),
(28, 'PONDICHERRY', 1),
(29, 'RAJASTHAN', 1),
(30, 'SIKKIM', 1),
(31, 'TAMIL NADU', 1),
(32, 'TRIPURA', 1),
(33, 'UTTARAKHAND', 1),
(34, 'UTTAR PRADESH', 1),
(35, 'WEST BENGAL', 1),
(36, 'TELANGANA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `name` varchar(30) NOT NULL,
  `city_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_fk` (`state_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_fk` (`topic_id`),
  ADD KEY `event_fk` (`city_id`),
  ADD KEY `init_fk` (`init_user_id`),
  ADD KEY `acce_fk` (`acce_user_id`),
  ADD KEY `eventtype_fk` (`eventtype_id`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_fk` (`message_id`),
  ADD KEY `liker_user_fk` (`liker_user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `event_fk1` (`event_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk1` (`user_id`),
  ADD KEY `event_fk2` (`event_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`),
  ADD KEY `city_fk` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `state_fk` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `acce_fk` FOREIGN KEY (`acce_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_fk` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `eventtype_fk` FOREIGN KEY (`eventtype_id`) REFERENCES `eventtype` (`id`),
  ADD CONSTRAINT `init_fk` FOREIGN KEY (`init_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `topic_fk` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `liker_user_fk` FOREIGN KEY (`liker_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_fk` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `event_fk1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `event_fk2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `user_fk1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `city_fk` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 10:54 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tosscall_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `state`, `status`) VALUES
(1, 'Vijayawada', 'Andhra Pradesh', 1),
(2, 'Itanagar', 'Arunachal Pradesh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name1` varchar(255) NOT NULL,
  `name2` varchar(255) NOT NULL,
  `eventtype` varchar(255) NOT NULL,
  `favour` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `init_user` varchar(255) NOT NULL,
  `acce_user` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `city` varchar(255) NOT NULL,
  `mergedatetime` datetime NOT NULL,
  `timeout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name1`, `name2`, `eventtype`, `favour`, `date`, `time`, `init_user`, `acce_user`, `status`, `city`, `mergedatetime`, `timeout`) VALUES
(5, 'Srk', 'Salman', 'Bollywood', 'Srk', '2018-06-26', '00:40:30', 'admin', 'nikhil', 4, 'Itanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'cricket', 'football', 'Sports', 'cricket', '2018-06-30', '14:00:00', 'nikhil', NULL, 0, 'Vijayawada', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'tom cruise', 'jack sparrow', 'Hollywood', 'jack sparrow', '2018-06-27', '13:59:00', 'anshul', NULL, 0, 'Itanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'sanju', 'race3', 'Bollywood', 'sanju', '2018-06-30', '03:59:00', 'nikhil', NULL, 0, 'Itanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'amitabh', 'rishi', 'Bollywood', 'rishi', '2018-06-30', '13:00:00', 'nikhil', NULL, 0, 'Itanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'sanju', 'race3', 'Bollywood', 'race3', '2018-06-30', '15:59:00', 'anshul', NULL, 0, 'Itanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'amir', 'akshay', 'Bollywood', 'akshay', '2018-06-30', '01:00:00', 'anshul', NULL, 0, 'Itanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'munni', 'sheela', 'Bollywood', 'sheela', '2018-06-30', '13:00:00', 'anshul', NULL, 0, 'Itanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Srk', 'Salman', 'Bollywood', 'Salman', '2018-06-30', '01:00:00', 'nikhil', NULL, 0, 'Itanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'dhoni', 'sachin', 'Sports', 'dhoni', '2018-06-30', '01:00:00', 'nikhil', NULL, 0, 'Itanagar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'a', 'b', 'Bollywood', 'b', '2018-07-05', '13:00:00', 'nikhil', NULL, 1, 'Itanagar', '2018-07-05 13:00:00', '0000-00-00 00:00:00'),
(16, 'c', 'd', 'Bollywood', 'd', '2018-07-03', '13:00:00', 'nikhil', NULL, 0, 'Itanagar', '2018-07-03 13:00:00', '0000-00-00 00:00:00'),
(17, 'cong', 'bjp', 'Politics', 'bjp', '2018-06-30', '14:00:00', 'nikhil', NULL, 0, 'Itanagar', '2018-06-30 14:00:00', '2018-06-30 14:30:00'),
(18, 'ab', 'cd', 'Hollywood', 'cd', '2018-07-01', '22:01:00', 'anshul', NULL, 0, 'Itanagar', '2018-07-01 22:01:00', '2018-07-01 22:31:00'),
(19, 'cc', 'dd', 'Bollywood', 'dd', '2018-06-30', '14:00:00', 'anshul', NULL, 0, 'Itanagar', '2018-06-30 14:00:00', '2018-06-30 14:30:00'),
(20, 'aaaa', 'xcgd', 'Politics', 'xcgd', '2018-06-30', '14:00:00', 'anshul', NULL, 0, 'Itanagar', '2018-06-30 14:00:00', '2018-06-30 14:30:00'),
(21, 'eqkh', 'qk', 'Hollywood', 'qk', '2018-07-06', '13:00:00', 'anshul', NULL, 1, 'Itanagar', '2018-07-06 13:00:00', '2018-07-06 13:30:00'),
(22, 'cw', 'qkj', 'Sports', 'qkj', '2018-07-06', '01:00:00', 'anshul', NULL, 1, 'Itanagar', '2018-07-06 01:00:00', '2018-07-06 01:30:00'),
(23, 'ekh', 'dfvk', 'Sports', 'dfvk', '2018-07-06', '03:00:00', 'anshul', NULL, 1, 'Itanagar', '2018-07-06 03:00:00', '2018-07-06 03:30:00'),
(24, 'erhj', 'erhddf', 'Hollywood', 'erhddf', '2018-07-07', '01:00:00', 'anshul', NULL, 1, 'Itanagar', '2018-07-07 01:00:00', '2018-07-07 01:30:00'),
(25, 'iu', 'hdf', 'Hollywood', 'hdf', '2018-07-07', '13:57:00', 'anshul', NULL, 1, 'Itanagar', '2018-07-07 13:57:00', '2018-07-07 14:27:00'),
(26, 'kfv', 'yitf4i', 'Bollywood', 'yitf4i', '2018-07-09', '01:00:00', 'anshul', NULL, 1, 'Itanagar', '2018-07-09 01:00:00', '2018-07-09 01:30:00'),
(27, 's', 'g', 'Hollywood', 'g', '2018-07-10', '13:00:00', 'nikhil', NULL, 1, 'Itanagar', '2018-07-10 13:00:00', '2018-07-10 13:30:00'),
(28, 'ssg', 'sj', 'Hollywood', 'sj', '2018-07-10', '15:00:00', 'nikhil', NULL, 1, 'Itanagar', '2018-07-10 15:00:00', '2018-07-10 15:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`id`, `name`, `status`) VALUES
(1, 'Politics', 1),
(2, 'Bollywood', 1),
(3, 'Hollywood', 1),
(4, 'Sports', 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `liker_user` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `live`
--

CREATE TABLE `live` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin'),
('anshul', 'anshul'),
('nikhil', 'nikhil'),
('poonam', 'poonam');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `message` text NOT NULL,
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
  `user` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `status`) VALUES
(1, 'Andhra Pradesh', 1),
(2, 'Arunachal Pradesh', 1),
(3, 'Assam', 1),
(4, 'Bihar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `name1` varchar(255) NOT NULL,
  `name2` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `name1`, `name2`, `status`) VALUES
(1, 'Srk', 'Salman', 1),
(2, 'cricket', 'football', 1),
(3, 'tom cruise', 'jack sparrow', 1),
(4, '', '', 1),
(5, 'sanju', 'race3', 1),
(6, 'amitabh', 'rishi', 1),
(7, 'sanju', 'race3', 1),
(8, 'amir', 'akshay', 1),
(9, 'munni', 'sheela', 1),
(10, 'Srk', 'Salman', 1),
(11, 'dhoni', 'sachin', 1),
(12, 'a', 'b', 1),
(13, 'c', 'd', 1),
(14, 'a', 'x', 1),
(15, 'cong', 'bjp', 1),
(16, 'cong', 'bjp', 1),
(17, 'ab', 'cd', 1),
(18, 'cc', 'dd', 1),
(19, 'aaaa', 'xcgd', 1),
(20, 'mkj', 'vsm', 1),
(21, 'nmc', 'canm', 1),
(22, 'c', 'adsbm', 1),
(23, 'j', 'wflj', 1),
(24, 'rjlkw', 'rgkj', 1),
(25, 'rjlkw', 'rgkj', 1),
(26, 'rjlkw', 'rgkj', 1),
(27, 'rjlkw', 'rgkj', 1),
(28, 'rjlkw', 'rgkj', 1),
(29, ',md', 'asckh', 1),
(30, ',md', 'asckh', 1),
(31, ',md', 'asckh', 1),
(32, ',md', 'asckh', 1),
(33, 'grkj', 'qfejl', 1),
(34, 'v,n', 'fw,m', 1),
(35, '', '', 1),
(36, 'saq', 'sqm', 1),
(37, 'sfh', 'bsmd', 1),
(38, 'eqkh', 'qk', 1),
(39, 'cw', 'qkj', 1),
(40, 'ekh', 'dfvk', 1),
(41, 'erhj', 'erhddf', 1),
(42, 'iu', 'hdf', 1),
(43, 'kfv', 'yitf4i', 1),
(44, 'kchd', 'rgb', 1),
(45, 'kchd', 'rgb', 1),
(46, 'rwg', '5tg', 1),
(48, 's', 'g', 1),
(51, 'ssg', 'sj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2016 at 09:44 PM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `g_name` varchar(100) NOT NULL,
  `g_description` text NOT NULL,
  `g_category` varchar(50) NOT NULL,
  `g_logo` text,
  `created_date` datetime NOT NULL,
  `g_creater_id` varchar(50) DEFAULT NULL,
  `group_color` varchar(9) DEFAULT '34495e'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `g_name`, `g_description`, `g_category`, `g_logo`, `created_date`, `g_creater_id`, `group_color`) VALUES
  (1, 'ISACA Group', 'First university isaca group.', 'social', NULL, '2016-09-01 00:00:00', 'emalsha', '34495e');

-- --------------------------------------------------------

--
-- Table structure for table `group_post`
--

CREATE TABLE `group_post` (
  `post_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `added_user_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `added_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_post`
--

INSERT INTO `group_post` (`post_id`, `group_id`, `added_user_id`, `post_content`, `added_time`) VALUES
  (1, 1, 5, 'hello hello hello', '2016-09-02 16:44:12'),
  (2, 1, 5, 'testin testin testin', '2016-09-02 16:46:36'),
  (3, 1, 5, 'testin testin testin', '2016-09-02 16:48:56'),
  (4, 1, 5, 'testin testin testin', '2016-09-02 16:49:14'),
  (5, 1, 5, 'testin testin testin', '2016-09-02 16:51:29'),
  (6, 1, 5, 'testin testin testin', '2016-09-02 17:10:45'),
  (7, 1, 5, 'This is my firrst sample post to group', '2016-09-02 21:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `pro_pic` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `password`, `username`, `firstname`, `lastname`, `pro_pic`, `type`) VALUES
  (2, 'sulo@gmail.com', '$2y$10$FDi.GZCim26l0AC3BSnwrejJlrIQsA0kkKeaT7vKNRIKqAHrwcPWi', NULL, 'sulochana', NULL, NULL, NULL),
  (5, 'remalsha@gmail.com', '$2y$10$hmgPBf93htMWzDRbvQKPCOzNxJLuklkA7EBfPix4ovDr4eItxbruu', NULL, 'Emalsha', 'Rasad', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_post`
--
ALTER TABLE `group_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `added_user_id` (`added_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_post`
--
ALTER TABLE `group_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_post`
--
ALTER TABLE `group_post`
  ADD CONSTRAINT `group_post_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_post_ibfk_2` FOREIGN KEY (`added_user_id`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
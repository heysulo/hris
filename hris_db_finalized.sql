-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2016 at 07:43 AM
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
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `field_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `color` varchar(9) NOT NULL,
  `privacy` varchar(20) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `twitter_id` text,
  `twitter_access_token` varchar(255) DEFAULT NULL,
  `twitter_access_token_secret` varchar(255) DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `name`, `description`, `category`, `logo`, `color`, `privacy`, `creator`, `created_date`, `twitter_id`, `twitter_access_token`, `twitter_access_token_secret`, `active`) VALUES
(1, 'Gavel Club', 'University of Colombo gavelers club..', 'Social', 'login.png', '#9a1a1a', 'public', 5, '2016-09-08 04:17:25', NULL, NULL, NULL, 1),
(2, 'AIESEC', 'English society', 'Educational', 'profile.png', '#3f58ea', 'Public', 5, '2016-09-08 04:36:37', NULL, NULL, NULL, 1),
(3, 'AIESEC', 'English society', 'Educational', 'profile.png', '#3f58ea', 'Public', 5, '2016-09-08 04:37:14', NULL, NULL, NULL, 1),
(4, 'AIESEC', 'English society', 'Educational', 'profile.png', '#3f58ea', 'Public', 5, '2016-09-08 04:37:49', NULL, NULL, NULL, 1),
(5, 'AIESEC', 'English society', 'Educational', 'profile.png', '#3f58ea', 'Public', 5, '2016-09-08 04:40:09', NULL, NULL, NULL, 1),
(6, 'AIESEC', 'English society', 'Educational', 'profile.png', '#3f58ea', 'Public', 5, '2016-09-08 04:41:16', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'Member',
  `group_admin_panel_access` int(11) NOT NULL DEFAULT '5',
  `group_member_add_power` int(11) NOT NULL DEFAULT '5',
  `group_member_remove_power` int(11) NOT NULL DEFAULT '5',
  `group_member_upgrade_power` int(11) NOT NULL DEFAULT '5',
  `group_modify_power` int(11) NOT NULL DEFAULT '5',
  `group_delete_power` int(11) NOT NULL DEFAULT '5',
  `group_notice_post_power` int(11) NOT NULL DEFAULT '5',
  `group_notice_delete_power` int(11) NOT NULL DEFAULT '5',
  `group_notice_pin_power` int(11) NOT NULL DEFAULT '5',
  `group_email_power` int(11) NOT NULL DEFAULT '5',
  `group_tweet_power` int(11) NOT NULL DEFAULT '5',
  `description` text,
  `join_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_member`
--

INSERT INTO `group_member` (`group_id`, `member_id`, `role`, `group_admin_panel_access`, `group_member_add_power`, `group_member_remove_power`, `group_member_upgrade_power`, `group_modify_power`, `group_delete_power`, `group_notice_post_power`, `group_notice_delete_power`, `group_notice_pin_power`, `group_email_power`, `group_tweet_power`, `description`, `join_date`) VALUES
(2, 5, 'Administrator', 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 'Created this group in this system.', '2016-09-08 04:40:09'),
(2, 5, 'Administrator', 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 'Created this group in this system.', '2016-09-08 04:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `group_post`
--

CREATE TABLE `group_post` (
  `post_id` int(20) NOT NULL,
  `group_id` int(20) NOT NULL,
  `added_user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `added_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_post`
--

INSERT INTO `group_post` (`post_id`, `group_id`, `added_user_id`, `content`, `added_time`) VALUES
(1, 2, 5, 'Next monthly meet-up will held tomorrow.', '2016-09-08 05:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `group_role`
--

CREATE TABLE `group_role` (
  `role_id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `language` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(64) NOT NULL DEFAULT '',
  `middle_name` varchar(64) DEFAULT '',
  `last_name` varchar(64) NOT NULL DEFAULT '',
  `category` varchar(50) NOT NULL,
  `academic_year` year(4) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `joined_date` datetime NOT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `handler` int(11) DEFAULT NULL,
  `availability_status` varchar(300) NOT NULL DEFAULT 'Not set',
  `availability_text` varchar(300) NOT NULL DEFAULT 'Not set',
  `current_city` varchar(32) DEFAULT NULL,
  `home_town` varchar(64) DEFAULT NULL,
  `religion` varchar(32) DEFAULT NULL,
  `about` text,
  `profile_picture` varchar(255) DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `force_password_reset` int(11) NOT NULL DEFAULT '0',
  `password_reset_code` int(11) DEFAULT '0',
  `password_reset_block` varchar(32) CHARACTER SET ascii DEFAULT '1900-01-01 00:00:00',
  `password_reset_attempts` int(11) DEFAULT NULL,
  `reset_code_enabled` int(11) NOT NULL DEFAULT '0',
  `code_gen_date` varchar(32) NOT NULL DEFAULT '2001-03-10 17:16:18',
  `profile_completed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `username`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `category`, `academic_year`, `date_of_birth`, `course`, `joined_date`, `gender`, `handler`, `availability_status`, `availability_text`, `current_city`, `home_town`, `religion`, `about`, `profile_picture`, `last_login`, `force_password_reset`, `password_reset_code`, `password_reset_block`, `password_reset_attempts`, `reset_code_enabled`, `code_gen_date`, `profile_completed`) VALUES
(5, 'emalsha2361', 'remalsha@gmail.com', '$2y$10$pElhXXOZ5kns/jsW1sZytOsrRRsXNDsb/cZUTqlfQCIFbie5z5tPC', 'Emalsha', 'Not set', 'Rasad', 'Student', 2015, NULL, NULL, '2016-09-08 02:37:34', 'Male', NULL, 'Not set', 'Not set', NULL, NULL, NULL, NULL, '216571.jpg', '2016-09-08 02:37:34', 0, 0, '1900-01-01 00:00:00', NULL, 0, '2001-03-10 17:16:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_info`
--

CREATE TABLE `member_info` (
  `member_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `field` text NOT NULL,
  `value` varchar(64) NOT NULL,
  `system_vision_power_needed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skill_id` int(11) NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_role`
--

CREATE TABLE `system_role` (
  `system_role_id` int(11) NOT NULL,
  `system_admin_panel_access` int(11) NOT NULL,
  `system_member_add_power` int(11) NOT NULL,
  `system_member_suspend_power` int(11) NOT NULL,
  `system_member_suspend_power_needed` int(11) NOT NULL,
  `system_member_delete_power` int(11) NOT NULL,
  `system_member_delete_power_needed` int(11) NOT NULL,
  `system_meeting_request_power` int(11) NOT NULL,
  `system_meeting_request_power_needed` int(11) NOT NULL,
  `system_group_create_power` int(11) NOT NULL,
  `system_vision_power` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'sulo@gmail.com', '1234', 'sulo', 'Sulochana', 'Kodituwakku', NULL, 'admin'),
(2, '', '', NULL, NULL, NULL, NULL, NULL),
(3, 'sulochana.456@gmail.com', '$2y$10$9e8gA1knKgfomiu4mdLwVeHfLDhrV.5m8ri9O8rjBWIS0RWFSjVGK', NULL, 'Sulochana', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_post`
--
ALTER TABLE `group_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `system_role`
--
ALTER TABLE `system_role`
  ADD PRIMARY KEY (`system_role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `group_post`
--
ALTER TABLE `group_post`
  MODIFY `post_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `system_role`
--
ALTER TABLE `system_role`
  MODIFY `system_role_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
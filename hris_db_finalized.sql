-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2016 at 07:33 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

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
  `name` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `color` text NOT NULL,
  `privacy` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `twitter_id` text NOT NULL,
  `twitter_access_token` varchar(255) NOT NULL,
  `twitter_access_token_secret` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_member`
--

CREATE TABLE `group_member` (
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `group_admin_panel_access` int(11) NOT NULL,
  `group_member_add_power` int(11) NOT NULL,
  `group_member_remove_power` int(11) NOT NULL,
  `group_member_upgrade_power` int(11) NOT NULL,
  `group_modify_power` int(11) NOT NULL,
  `group_delete_power` int(11) NOT NULL,
  `group_notice_post_power` int(11) NOT NULL,
  `group_notice_delete_power` int(11) NOT NULL,
  `group_notice_pin_power` int(11) NOT NULL,
  `group_email_power` int(11) NOT NULL,
  `group_tweet_power` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `join_date` varchar(255) NOT NULL,
  `added_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `username` varchar(15) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(64) NOT NULL DEFAULT '',
  `middle_name` varchar(64) DEFAULT '',
  `last_name` varchar(64) NOT NULL DEFAULT '',
  `category` int(11) NOT NULL,
  `academic_year` varchar(10) NOT NULL,
  `date_of_birth` varchar(32) NOT NULL,
  `course` int(11) NOT NULL,
  `joined_date` varchar(32) NOT NULL,
  `gender` text NOT NULL,
  `handler` int(11) NOT NULL,
  `availability_status` int(11) NOT NULL,
  `availability_text` varchar(32) NOT NULL,
  `last_seen` varchar(32) NOT NULL,
  `current_city` varchar(32) NOT NULL,
  `home_town` varchar(32) NOT NULL,
  `religion` varchar(32) NOT NULL,
  `about` varchar(2048) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `last_login` date NOT NULL,
  `force_password_reset` int(11) NOT NULL DEFAULT '0',
  `password_reset_code` int(11) DEFAULT '0',
  `password_reset_block` varchar(32) CHARACTER SET ascii DEFAULT '1900-01-01 00:00:00',
  `password_reset_attempts` int(11) DEFAULT NULL,
  `reset_code_enabled` int(11) NOT NULL DEFAULT '0',
  `code_gen_date` varchar(32) NOT NULL DEFAULT '2001-03-10 17:16:18',
  `profile_completed` int(11) DEFAULT NULL,
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

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `username`, `email`, `password`, `first_name`, `middle_name`, `last_name`, `category`, `academic_year`, `date_of_birth`, `course`, `joined_date`, `gender`, `handler`, `availability_status`, `availability_text`, `last_seen`, `current_city`, `home_town`, `religion`, `about`, `profile_picture`, `last_login`, `force_password_reset`, `password_reset_code`, `password_reset_block`, `password_reset_attempts`, `reset_code_enabled`, `code_gen_date`, `profile_completed`, `system_admin_panel_access`, `system_member_add_power`, `system_member_suspend_power`, `system_member_suspend_power_needed`, `system_member_delete_power`, `system_member_delete_power_needed`, `system_meeting_request_power`, `system_meeting_request_power_needed`, `system_group_create_power`, `system_vision_power`) VALUES
(1, 'sulochana', 'sulochana.456@live.com', '$2y$10$fNvudU8Wlg4xrdeZV8LFSeBiW716.oPYwAV4XTvThl5rE.3/ZeNCC', 'Sulochana', 'imsofukindunwit', 'Kodituwakku', 0, '', '', 0, '', '', 0, 0, '', '', '', '', '', '', '', '0000-00-00', 0, 69516211, '2016-09-01 12:23:09', 3, 0, '2016-09-05 13:10:25', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

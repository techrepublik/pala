-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2015 at 01:18 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('34c0926f3958fd9f9e5b2aeabed1e0fb', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:38.0) Gecko/20100101 Firefox/38.1.0 Waterfox/38.1.0', 1440758385, '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '::1', 'root', '2015-08-27 21:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `my_reservations`
--

CREATE TABLE IF NOT EXISTS `my_reservations` (
  `id` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `middle_name` varchar(35) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `total_amount` double NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `unique_id` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: active, 1:confirmed, 2: cancelled, 3: ongoing, 4: finished, 5: deactivated'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `my_reservations`
--

INSERT INTO `my_reservations` (`id`, `check_in`, `check_out`, `last_name`, `first_name`, `middle_name`, `email`, `contact_no`, `total_amount`, `date_added`, `date_updated`, `unique_id`, `status`) VALUES
(1, '2015-08-28 00:00:00', '2015-08-29 00:00:00', 'de la Cruz', 'Juan', 'Pedro', 'jdc@test.com', '123456789', 17500, '2015-08-28 14:32:14', '2015-08-28 06:47:03', 'H98jJo1cAT', 0),
(2, '2015-09-02 20:15:00', '2015-09-24 20:15:00', 'Doe', 'John', 'Wayne', 'jdoe@test.com', '23456123', 15000, '2015-08-28 15:18:55', '2015-08-28 07:18:55', 'FOLhvcWvxj', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_db`
--

CREATE TABLE IF NOT EXISTS `rooms_db` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `status` smallint(6) DEFAULT '0' COMMENT '0: available, 1: reserved, 2: occupied, 3: maintenance',
  `custom_rate` double DEFAULT '0',
  `description` longtext,
  `adnl_info` varchar(125) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms_db`
--

INSERT INTO `rooms_db` (`id`, `number`, `type_id`, `status`, `custom_rate`, `description`, `adnl_info`) VALUES
(1, 1, 1, 1, 0, '', ''),
(2, 2, 1, 1, 0, NULL, ''),
(3, 3, 1, 1, 0, NULL, ''),
(4, 4, 2, 1, 0, '', ''),
(5, 5, 2, 0, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `room_reservations`
--

CREATE TABLE IF NOT EXISTS `room_reservations` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_reservations`
--

INSERT INTO `room_reservations` (`id`, `reservation_id`, `room_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 2),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room_types_db`
--

CREATE TABLE IF NOT EXISTS `room_types_db` (
  `id` int(11) NOT NULL,
  `type_name` varchar(50) DEFAULT NULL,
  `max_occ` int(11) DEFAULT '0',
  `rate` double DEFAULT '0',
  `info` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_types_db`
--

INSERT INTO `room_types_db` (`id`, `type_name`, `max_occ`, `rate`, `info`) VALUES
(1, 'Single Room', 1, 7500, ''),
(2, 'Double Room', 2, 10000, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `is_admin`) VALUES
(1, 'jph_admin', '$2a$08$uFSA2KF4nkN.zBZyDcZ9uey0OzWwhHflF77kNKR2xJWYfWZcDLjxS', 'admin@email.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '::1', '0000-00-00 00:00:00', '2015-08-27 23:30:24', '2015-08-27 21:30:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_reservations`
--
ALTER TABLE `my_reservations`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_id` (`unique_id`);

--
-- Indexes for table `rooms_db`
--
ALTER TABLE `rooms_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_reservations`
--
ALTER TABLE `room_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types_db`
--
ALTER TABLE `room_types_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_autologin`
--
ALTER TABLE `user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `my_reservations`
--
ALTER TABLE `my_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rooms_db`
--
ALTER TABLE `rooms_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `room_reservations`
--
ALTER TABLE `room_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room_types_db`
--
ALTER TABLE `room_types_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

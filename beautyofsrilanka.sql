-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2016 at 02:51 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `beautyofsrilanka`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(100) NOT NULL,
  `setting_description` varchar(300) NOT NULL,
  `setting_type` enum('c','r','d','t') NOT NULL COMMENT 'c - check box,r - radio button,d - dropdown,t - text',
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_name`, `setting_description`, `setting_type`, `added_date`) VALUES
(1, 'User Login Options', 'We can define user wise login types', 'd', '2015-01-10 10:19:32'),
(2, 'Dashboard Widgets', 'This is the setting to change the BeautyOfSriLanka system dashboard widgets.', 'd', '2015-01-10 16:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE IF NOT EXISTS `share` (
  `graph_id` int(11) NOT NULL AUTO_INCREMENT,
  `graph_type` varchar(100) NOT NULL,
  PRIMARY KEY (`graph_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `statisctics_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `post_data` text NOT NULL,
  `ip` varchar(300) DEFAULT NULL,
  `browser` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`statisctics_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`statisctics_id`, `user_id`, `action`, `date`, `uri`, `post_data`, `ip`, `browser`) VALUES
(1, 0, 'index', 1458743623, 'login/login_controller/index', '', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.87 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `system_code` int(11) NOT NULL AUTO_INCREMENT,
  `system` varchar(100) NOT NULL,
  `dashboard_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`system_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `is_online` enum('Y','N') DEFAULT 'N' COMMENT 'Online =Y,Offline=N',
  `del_ind` enum('1','0','2') NOT NULL COMMENT '0-deactivate,1 -active, 2-pending(Inserted User record from mail server)',
  `added_by` int(11) DEFAULT NULL,
  `added_date` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_email`, `is_online`, `del_ind`, `added_by`, `added_date`, `updated_by`, `updated_date`) VALUES
(1, 'Rachini', 'c4961b067d274050e43e26beb9d7d19c', 'rachini94perera@gmail.com', 'Y', '1', NULL, '2015-02-11 18:30:00', NULL, NULL),
(2, 'Dilhara', 'c4961b067d274050e43e26beb9d7d19c', 'dilhara @gmail.com', 'Y', '1', NULL, '2015-02-11 18:30:00', NULL, NULL),
(3, 'Allan', 'c4961b067d274050e43e26beb9d7d19c', 'allan@gmail.com', 'Y', '1', NULL, '2015-02-11 18:30:00', NULL, NULL),
(4, 'Dilupa', 'c4961b067d274050e43e26beb9d7d19c', 'dila.june@ymail.com', 'N', '1', NULL, '2015-02-11 18:30:00', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

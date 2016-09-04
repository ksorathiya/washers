-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2016 at 10:44 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wow_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bucket`
--

CREATE TABLE IF NOT EXISTS `tbl_bucket` (
  `b_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `o_id` bigint(20) unsigned NOT NULL COMMENT 'fk from tbl order',
  `scc_id` bigint(20) unsigned NOT NULL COMMENT 'fk from tbl sub category',
  `cl_quant` int(11) NOT NULL,
  `cl_cost` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) unsigned NOT NULL COMMENT 'FK from user tbl',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isActive` enum('active','notactive') NOT NULL,
  `isDelete` enum('deleted','notdeleted') NOT NULL,
  PRIMARY KEY (`b_id`),
  KEY `o_id` (`o_id`,`scc_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--
DROP TABLE `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `c_name` varchar(30) NOT NULL,
  `created_by` int(20) unsigned DEFAULT NULL,-- COMMENT 'Foreign Key from tbl_user', FOREIGN KEY (created_by) REFERENCES tbl_user (u_id), 
  `created_date` date DEFAULT NULL,
  `updated_by` int(20) unsigned DEFAULT NULL,-- COMMENT 'Foreign Key from tbl_user', FOREIGN KEY (updated_by) REFERENCES tbl_user (u_id),
  `updated_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `isDelete` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`c_name`) VALUES
('Shirt Laundry'),
('Dry Cleaning Service'),
('Suede and Leather'),
('Ironing Service'),
('Household Dry Cleaning'),
('Repair and Alteration')
;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `o_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` bigint(20) unsigned NOT NULL COMMENT 'fk from tbl user',
  `v_id` bigint(20) unsigned NOT NULL COMMENT 'fk from tbl user',
  `d_id` bigint(20) unsigned NOT NULL COMMENT 'fk from tbl user',
  `s_id` varchar(255) NOT NULL COMMENT 'FK from status tbl',
  `p_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `transac_id` varchar(255) NOT NULL,
  `v_amount` int(11) NOT NULL,
  `d_amount` int(11) NOT NULL,
  `created_by` bigint(20) unsigned NOT NULL COMMENT 'FK from tbl user',
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) unsigned NOT NULL COMMENT 'FK from user tbl',
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isActive` enum('active','notactive') NOT NULL,
  `isDelete` enum('deleted','notdeleted') NOT NULL,
  PRIMARY KEY (`o_id`),
  KEY `c_id` (`c_id`,`v_id`,`d_id`),
  KEY `s_id` (`s_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scategory`
--
DROP TABLE `tbl_clothes`;
CREATE TABLE IF NOT EXISTS `tbl_clothes` (
  `cl_id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cl_name` varchar(30) NOT NULL, 
  `c_id` int(10) unsigned NOT NULL, FOREIGN KEY (c_id) REFERENCES tbl_category(c_id),
  `created_by` int(20) unsigned DEFAULT NULL,-- COMMENT 'Foreign Key from tbl_user', FOREIGN KEY (created_by) REFERENCES tbl_user (u_id), 
  `created_date` date DEFAULT NULL,
  `updated_by` int(20) unsigned DEFAULT NULL,-- COMMENT 'Foreign Key from tbl_user', FOREIGN KEY (updated_by) REFERENCES tbl_user (u_id),
  `updated_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `isDelete` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16;

--
-- Dumping data for table `tbl_scategory`
--

INSERT INTO `tbl_clothes` (`cl_name`, `c_id`) VALUES
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11),
('TEST',11);
('Men''s Two Piece Suit', 7),
('Shirts', 7),
('Trouser', 7),
('Suit Jacket', 7),
('Skirt', 7),
('Dress', 7),
('Coats', 7),
('Jumper/Cardigan', 7),
('Blouse/Top', 7),
('Denim Jeans', 7),
('Dressing Gown', 7),
('Wedding Dress', 7),
('Scarf', 7),
('Overcoat', 7),
('Tie', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE IF NOT EXISTS `tbl_status` (
  `s_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--
DROP TABLE `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `u_id` int(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `u_type` enum('customer','admin','vendor','driver') NOT NULL,
  `u_name` varchar(25) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL UNIQUE KEY,
  `phone` int(20) NOT NULL UNIQUE KEY,
  `address` varchar(100) NOT NULL,
  `city` varchar(25) DEFAULT NULL,
  `state` varchar(25) DEFAULT NULL,
  `zipcode` varchar(25) DEFAULT NULL,
  `about_me` varchar(200) NOT NULL,
  `isApproved` tinyint(1) DEFAULT '0',
  `company_name` varchar(25) DEFAULT NULL,
  `company_logo` varchar(30) DEFAULT NULL,
  `created_by` int(20) unsigned DEFAULT NULL,-- COMMENT 'Foreign Key from tbl_user', FOREIGN KEY (created_by) REFERENCES tbl_user (u_id), 
  `created_date` date DEFAULT NULL,
  `updated_by` int(20) unsigned DEFAULT NULL,-- COMMENT 'Foreign Key from tbl_user', FOREIGN KEY (updated_by) REFERENCES tbl_user (u_id),
  `updated_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `isDelete` tinyint(1) DEFAULT '0'
-- PRIMARY KEY (`u_id`),
-- UNIQUE KEY `u_name` (`u_name`,`email`,`phone`),
-- KEY `created_by` (`created_by`,`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_type`, `u_name`, `password`, `email`, `phone`, `address`, `city`, `state`, `zipcode`, `about_me`, `isApproved`, `company_name`, `company_logo`, `created_by`, `created_date`, `updated_by`, `updated_date`, `isActive`, `isDelete`) VALUES
(2, 'customer', 'test', sha1('customer'), 'customer@example.com', 21474836, 'test address', NULL, NULL, NULL, 'test about me', '1', 'test company', 'kk.png', '2', NULL, NULL, NULL, '1', '0')

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `tbl_category_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_category_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_scategory`
--
ALTER TABLE `tbl_scategory`
  ADD CONSTRAINT `tbl_scategory_ibfk_1` FOREIGN KEY (`parentCategory_id`) REFERENCES `tbl_category` (`cc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_scategory_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_scategory_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

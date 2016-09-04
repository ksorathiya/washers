-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 11:18 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_aboutus`
--

CREATE TABLE IF NOT EXISTS `tbl_aboutus` (
  `au_id` int(11) NOT NULL AUTO_INCREMENT,
  `au_text` text NOT NULL,
  `au_image` varchar(255) NOT NULL,
  PRIMARY KEY (`au_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`au_id`, `au_text`, `au_image`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa.\r\n				Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui\r\n				Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus scelerisque augue, ac posuere libero urna eget neque. Cras ipsum. Vestibulum pretium, lectus nec venenatis volutpat, purus lectus ultrices risus, a condimentum risus mi et quam. Pellentesque auctor fringilla neque. Duis eu massa ut lorem iaculis vestibulum. Maecenas facilisis elit sed justo. Quisque volutpat malesuada velit.\r\n			', 'images/aboutus_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_name` varchar(30) NOT NULL,
  `c_image` varchar(30) NOT NULL,
  `created_by` int(20) unsigned DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` int(20) unsigned DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `isDelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`c_id`, `c_name`, `c_image`, `created_by`, `created_date`, `updated_by`, `updated_date`, `isActive`, `isDelete`) VALUES
(6, 'Shirt Laundry', 'shirt.png', NULL, NULL, NULL, NULL, 1, 0),
(7, 'Dry Cleaning Service', 'dry_clean_icon.png', NULL, NULL, NULL, NULL, 1, 0),
(8, 'Suede and Leather', 'suede.png', NULL, NULL, NULL, NULL, 1, 0),
(9, 'Ironing Service', 'ironing_icon.png', NULL, NULL, NULL, NULL, 1, 0),
(10, 'Household Dry Cleaning', 'household_icon.png', NULL, NULL, NULL, NULL, 1, 0),
(11, 'Repair and Alteration', 'icon2.png', NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clothes`
--

CREATE TABLE IF NOT EXISTS `tbl_clothes` (
  `cl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(30) NOT NULL,
  `c_id` int(10) unsigned NOT NULL,
  `created_by` int(20) unsigned DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` int(20) unsigned DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `isDelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cl_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `tbl_clothes`
--

INSERT INTO `tbl_clothes` (`cl_id`, `cl_name`, `c_id`, `created_by`, `created_date`, `updated_by`, `updated_date`, `isActive`, `isDelete`) VALUES
(16, 'Men''s Two Piece Suit', 7, NULL, NULL, NULL, NULL, 1, 0),
(17, 'Shirts', 7, NULL, NULL, NULL, NULL, 1, 0),
(18, 'Trouser', 7, NULL, NULL, NULL, NULL, 1, 0),
(19, 'Suit Jacket', 7, NULL, NULL, NULL, NULL, 1, 0),
(20, 'Skirt', 7, NULL, NULL, NULL, NULL, 1, 0),
(21, 'Dress', 7, NULL, NULL, NULL, NULL, 1, 0),
(22, 'Coats', 7, NULL, NULL, NULL, NULL, 1, 0),
(23, 'Jumper/Cardigan', 7, NULL, NULL, NULL, NULL, 1, 0),
(24, 'Blouse/Top', 7, NULL, NULL, NULL, NULL, 1, 0),
(25, 'Denim Jeans', 7, NULL, NULL, NULL, NULL, 1, 0),
(26, 'Dressing Gown', 7, NULL, NULL, NULL, NULL, 1, 0),
(27, 'Wedding Dress', 7, NULL, NULL, NULL, NULL, 1, 0),
(28, 'Scarf', 7, NULL, NULL, NULL, NULL, 1, 0),
(29, 'Overcoat', 7, NULL, NULL, NULL, NULL, 1, 0),
(30, 'Tie', 7, NULL, NULL, NULL, NULL, 1, 0),
(31, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(32, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(33, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(34, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(35, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(36, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(37, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(38, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(39, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(40, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(41, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(42, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(43, 'TEST', 6, NULL, NULL, NULL, NULL, 1, 0),
(44, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(45, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(46, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(47, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(48, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(49, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(50, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(51, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(52, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(53, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(54, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(55, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(56, 'TEST', 8, NULL, NULL, NULL, NULL, 1, 0),
(57, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(58, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(59, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(60, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(61, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(62, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(63, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(64, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(65, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(66, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(67, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(68, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(69, 'TEST', 9, NULL, NULL, NULL, NULL, 1, 0),
(70, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(71, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(72, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(73, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(74, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(75, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(76, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(77, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(78, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(79, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(80, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(81, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(82, 'TEST', 10, NULL, NULL, NULL, NULL, 1, 0),
(83, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(84, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(85, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(86, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(87, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(88, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(89, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(90, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(91, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(92, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(93, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(94, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(95, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE IF NOT EXISTS `tbl_contactus` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(110) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`co_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_contactus`
--

INSERT INTO `tbl_contactus` (`co_id`, `name`, `phone`, `email`, `message`) VALUES
(1, 'test', 0, 'test@example.com', 'test'),
(2, 'test', 0, 'test@example.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs`
--

CREATE TABLE IF NOT EXISTS `tbl_faqs` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_ques` text NOT NULL,
  `f_ans` text,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_faqs`
--

INSERT INTO `tbl_faqs` (`f_id`, `f_ques`, `f_ans`) VALUES
(1, 'Question 1', 'Answer 1'),
(2, 'Question 2', 'Answer 2'),
(3, 'Question 3', 'Answer 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home`
--

CREATE TABLE IF NOT EXISTS `tbl_home` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_text` text NOT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_home`
--

INSERT INTO `tbl_home` (`h_id`, `h_text`) VALUES
(1, ' Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus scelerisque augue, ac posuere libero urna eget neque. Cras ipsum. Vestibulum pretium, lectus nec venenatis volutpat, purus lectus ultrices risus, a condimentum risus mi et quam. Pellentesque auctor fringilla neque. Duis eu massa ut lorem iaculis vestibulum. Maecenas facilisis elit sed justo. Quisque volutpat malesuada velit.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui. Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus scelerisque augue, ac posuere libero urna eget neque. Cras ipsum. Vestibulum pretium, lectus nec venenatis volutpat, purus lectus ultrices risus, a condimentum risus mi et quam.\r\n\r\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa. Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui. Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus scelerisque augue, ac posuere libero urna eget neque. Cras ipsum. Vestibulum pretium, lectus nec venenatis volutpat, purus lectus ultrices risus, a condimentum risus mi et quam. Pellentesque auctor fringilla neque. Duis eu massa ut lorem iaculis vestibulum. Maecenas facilisis elit sed justo. Quisque volutpat malesuada velit. ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_onlinelaundry`
--

CREATE TABLE IF NOT EXISTS `tbl_onlinelaundry` (
  `ol_id` int(11) NOT NULL AUTO_INCREMENT,
  `ol_name` varchar(255) DEFAULT NULL,
  `ol_office` int(11) DEFAULT NULL,
  `ol_email` varchar(110) DEFAULT NULL,
  `ol_logo` varchar(255) DEFAULT NULL,
  `ol_banner` varchar(255) DEFAULT NULL,
  `ol_address` text,
  `ol_cell` int(10) DEFAULT NULL,
  `ol_privacypolicy` text,
  PRIMARY KEY (`ol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_onlinelaundry`
--

INSERT INTO `tbl_onlinelaundry` (`ol_id`, `ol_name`, `ol_office`, `ol_email`, `ol_logo`, `ol_banner`, `ol_address`, `ol_cell`, `ol_privacypolicy`) VALUES
(1, 'washers', 2012344521, 'info@iClean.co.uk', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, MD 2115', 2012344521, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE IF NOT EXISTS `tbl_subscription` (
  `su_id` int(11) NOT NULL AUTO_INCREMENT,
  `su_email` varchar(110) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`su_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`su_id`, `su_email`, `isActive`) VALUES
(1, 'test@example.com', 1),
(2, 'broom@examole.con', 1),
(3, '', 1),
(4, 'broo44m@examole.con', 1),
(5, 'maulik121@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(25) NOT NULL,
  `t_link` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`t_id`, `t_name`, `t_link`, `isActive`) VALUES
(1, 'Lorem', '#', 1),
(2, 'ipsum', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `u_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `u_type` enum('customer','admin','vendor','driver') NOT NULL,
  `u_name` varchar(25) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(25) DEFAULT NULL,
  `state` varchar(25) DEFAULT NULL,
  `zipcode` varchar(25) DEFAULT NULL,
  `about_me` varchar(200) NOT NULL,
  `isApproved` tinyint(1) DEFAULT '0',
  `company_name` varchar(25) DEFAULT NULL,
  `company_logo` varchar(30) DEFAULT NULL,
  `created_by` int(20) unsigned DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` int(20) unsigned DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `isDelete` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_type`, `u_name`, `password`, `email`, `phone`, `address`, `city`, `state`, `zipcode`, `about_me`, `isApproved`, `company_name`, `company_logo`, `created_by`, `created_date`, `updated_by`, `updated_date`, `isActive`, `isDelete`) VALUES
(6, 'customer', 'customer', '91ec1f9324753048c0096d036a694f86', 'customer@example.com', '0', 'test', NULL, NULL, NULL, 'test', 0, 'kollege', NULL, NULL, NULL, NULL, NULL, 1, 0),
(20, 'customer', 'hjfdsd', 'dc468c70fb574ebd07287b38d0d0676d', 'kk', '0', 'kk', NULL, NULL, NULL, 'kk', 0, 'kk', NULL, NULL, NULL, NULL, NULL, 1, 0),
(22, 'customer', 'hjfdsd', 'dc468c70fb574ebd07287b38d0d0676d', 'kkk', '2147483647', 'kk', NULL, NULL, NULL, 'kk', 0, 'kk', NULL, NULL, NULL, NULL, NULL, 1, 0),
(23, 'customer', 'customet', 'dc468c70fb574ebd07287b38d0d0676d', 'cust1', '8866788696', 'test', NULL, NULL, NULL, 'test', 0, 'kollege', NULL, NULL, NULL, NULL, NULL, 1, 0),
(24, 'customer', 'customer', '81dc9bdb52d04dc20036dbd8313ed055', 'customer@domain.com', '9944556644', 'customer', NULL, NULL, NULL, 'customer', 0, 'customer', NULL, NULL, NULL, NULL, NULL, 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  ADD CONSTRAINT `tbl_clothes_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `tbl_category` (`c_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

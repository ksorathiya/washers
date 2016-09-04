-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2016 at 08:34 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

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
  `au_id` int(11) NOT NULL,
  `au_text` text NOT NULL,
  `au_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_aboutus`
--

INSERT INTO `tbl_aboutus` (`au_id`, `au_text`, `au_image`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet. Curabitur adipiscing luctus massa.\n				Integer ut purus ac augue commodo commodo. Nunc nec mi eu justo tempor consectetuer. Etiam vitae nisl. In dignissim lacus ut ante. Cras elit lectus, bibendum a, adipiscing vitae, commodo et, dui\n				Ut tincidunt tortor. Donec nonummy, enim in lacinia pulvinar, velit tellus scelerisque augue, ac posuere libero urna eget neque. Cras ipsum. Vestibulum pretium, lectus nec venenatis volutpat, purus lectus ultrices risus, a condimentum risus mi et quam. Pellentesque auctor fringilla neque. Duis eu massa ut lorem iaculis vestibulum. Maecenas facilisis elit sed justo. Quisque volutpat malesuada velit.\n			', 'images/aboutus_image.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bucket`
--

CREATE TABLE IF NOT EXISTS `tbl_bucket` (
  `b_id` int(10) unsigned NOT NULL,
  `cl_id` int(10) unsigned NOT NULL,
  `qty` int(5) unsigned NOT NULL,
  `ub_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `c_id` int(10) unsigned NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_image` varchar(30) NOT NULL,
  `created_by` int(20) unsigned DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` int(20) unsigned DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `isDelete` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
  `cl_id` int(10) unsigned NOT NULL,
  `cl_name` varchar(30) NOT NULL,
  `c_id` int(10) unsigned NOT NULL,
  `created_by` int(20) unsigned DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` int(20) unsigned DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `isDelete` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

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
(95, 'TEST', 11, NULL, NULL, NULL, NULL, 1, 0),
(96, 'Single Shirt', 6, NULL, NULL, NULL, NULL, 1, 0),
(97, '3 Shirts Offer', 6, NULL, NULL, NULL, NULL, 1, 0),
(98, '5 Shirts Offer', 6, NULL, NULL, NULL, NULL, 1, 0),
(99, '10+ Shirts', 6, NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs`
--

CREATE TABLE IF NOT EXISTS `tbl_faqs` (
  `f_id` int(11) NOT NULL,
  `f_ques` text NOT NULL,
  `f_ans` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
  `h_id` int(11) NOT NULL,
  `h_text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `ol_id` int(11) NOT NULL,
  `ol_name` varchar(255) DEFAULT NULL,
  `ol_office` int(11) DEFAULT NULL,
  `ol_email` varchar(110) DEFAULT NULL,
  `ol_logo` varchar(255) DEFAULT NULL,
  `ol_banner` varchar(255) DEFAULT NULL,
  `ol_address` text,
  `ol_cell` int(10) DEFAULT NULL,
  `ol_privacypolicy` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_onlinelaundry`
--

INSERT INTO `tbl_onlinelaundry` (`ol_id`, `ol_name`, `ol_office`, `ol_email`, `ol_logo`, `ol_banner`, `ol_address`, `ol_cell`, `ol_privacypolicy`) VALUES
(1, 'washers', 2012344521, 'info@iClean.co.uk', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, MD 2115', 2012344521, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam nibh. Nunc varius facilisis eros. Sed erat. In in velit quis arcu ornare laoreet.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `o_id` int(20) unsigned NOT NULL,
  `cu_id` int(20) unsigned NOT NULL,
  `ve_id` int(20) unsigned NOT NULL,
  `dr_id` int(11) DEFAULT NULL,
  `c_id` varchar(50) NOT NULL,
  `clothes` varchar(255) NOT NULL,
  `quantities` varchar(255) NOT NULL,
  `transac_id` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`o_id`, `cu_id`, `ve_id`, `dr_id`, `c_id`, `clothes`, `quantities`, `transac_id`, `amount`, `date_time`) VALUES
(12, 6, 27, 33, '8', '44,45,46,47', '4,2,1,1', '6EY77254SW149581G', 57, '2016-04-06 16:56:07'),
(13, 29, 27, 28, '7', '16,17,18', '1,2,3', '24Y15034UA593161T', 33, '2016-04-09 13:17:00'),
(14, 29, 27, 28, '6', '96,97,99', '2,1,3', '2AK3006502786113V', 132, '2016-04-09 13:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prices`
--

CREATE TABLE IF NOT EXISTS `tbl_prices` (
  `p_id` int(10) unsigned NOT NULL,
  `cl_id` int(10) unsigned NOT NULL,
  `price` int(5) DEFAULT NULL,
  `u_id` int(20) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prices`
--

INSERT INTO `tbl_prices` (`p_id`, `cl_id`, `price`, `u_id`) VALUES
(1, 96, 45, 25),
(2, 97, 454, 25),
(3, 98, 544, 25),
(4, 99, 54, 25),
(5, 16, 54, 25),
(6, 17, 54, 25),
(7, 18, 45, 25),
(8, 19, 45, 25),
(9, 20, 45, 25),
(10, 21, 45, 25),
(11, 22, 454, 25),
(12, 23, 54, 25),
(13, 24, 54, 25),
(14, 25, 54, 25),
(15, 26, 54, 25),
(16, 27, 54, 25),
(17, 28, 54, 25),
(18, 29, 54, 25),
(19, 30, 64, 25),
(20, 44, 545, 25),
(21, 45, 46, 25),
(22, 46, 545, 25),
(23, 47, 45, 25),
(24, 48, 45, 25),
(25, 49, 45, 25),
(26, 50, 45, 25),
(27, 51, 45, 25),
(28, 52, 45, 25),
(29, 53, 45, 25),
(30, 54, 45, 25),
(31, 55, 465, 25),
(32, 56, 45, 25),
(33, 57, 45, 25),
(34, 58, 45, 25),
(35, 59, 454, 25),
(36, 60, 1, 25),
(37, 61, 3212, 25),
(38, 62, 1, 25),
(39, 63, 8, 25),
(40, 64, 8, 25),
(41, 65, 13, 25),
(42, 67, 78, 25),
(43, 69, 31, 25),
(44, 71, 871, 25),
(45, 72, 21, 25),
(46, 73, 7, 25),
(47, 74, 54, 25),
(48, 75, 321, 25),
(49, 76, 8, 25),
(50, 78, 132, 25),
(51, 80, 78, 25),
(52, 81, 4, 25),
(53, 82, 21, 25),
(54, 83, 4, 25),
(55, 84, 8, 25),
(56, 86, 21, 25),
(57, 87, 4, 25),
(58, 88, 545, 25),
(59, 89, 1, 25),
(60, 90, 21, 25),
(61, 91, 545, 25),
(62, 92, 41, 25),
(63, 93, 2, 25),
(64, 94, 154, 25),
(65, 95, 5, 25),
(66, 96, 446, 26),
(67, 97, 654, 26),
(68, 98, 46, 26),
(69, 99, 254, 26),
(70, 16, 54, 26),
(71, 17, 4, 26),
(72, 18, 46, 26),
(73, 19, 46, 26),
(74, 20, 4, 26),
(75, 21, 1, 26),
(76, 22, 12, 26),
(77, 23, 12, 26),
(78, 24, 9, 26),
(79, 25, 1, 26),
(80, 26, 9, 26),
(81, 27, 2, 26),
(82, 28, 4, 26),
(83, 29, 89, 26),
(84, 30, 5, 26),
(85, 44, 26, 26),
(86, 45, 8, 26),
(87, 46, 2, 26),
(88, 47, 6, 26),
(89, 48, 23, 26),
(90, 49, 8, 26),
(91, 50, 2, 26),
(92, 51, 2, 26),
(93, 52, 8, 26),
(94, 53, 3, 26),
(95, 54, 2, 26),
(96, 55, 889, 26),
(97, 56, 3, 26),
(98, 57, 5, 26),
(99, 58, 8, 26),
(100, 59, 6, 26),
(101, 60, 2, 26),
(102, 61, 8, 26),
(103, 62, 93, 26),
(104, 63, 5, 26),
(105, 64, 8, 26),
(106, 65, 5, 26),
(107, 66, 2, 26),
(108, 67, 89, 26),
(109, 68, 6, 26),
(110, 69, 5, 26),
(111, 70, 6, 26),
(112, 71, 4, 26),
(113, 72, 6, 26),
(114, 73, 1, 26),
(115, 74, 55, 26),
(116, 75, 2, 26),
(117, 76, 1, 26),
(118, 77, 5, 26),
(119, 78, 2, 26),
(120, 79, 5, 26),
(121, 80, 5, 26),
(122, 81, 12, 26),
(123, 82, 5, 26),
(124, 83, 2, 26),
(125, 84, 5, 26),
(126, 85, 2, 26),
(127, 86, 28, 26),
(128, 87, 8, 26),
(129, 88, 2, 26),
(130, 89, 528, 26),
(131, 90, 5, 26),
(132, 91, 2, 26),
(133, 92, 8, 26),
(134, 93, 8, 26),
(135, 94, 28, 26),
(136, 95, 8, 26),
(137, 96, 12, 27),
(138, 97, 12, 27),
(139, 98, 1, 27),
(140, 99, 32, 27),
(141, 16, 12, 27),
(142, 17, 3, 27),
(143, 18, 5, 27),
(144, 19, 1, 27),
(145, 20, 6, 27),
(146, 21, 14, 27),
(147, 22, 4, 27),
(148, 23, 7, 27),
(149, 24, 5, 27),
(150, 25, 6, 27),
(151, 26, 9, 27),
(152, 27, 5, 27),
(153, 28, 1, 27),
(154, 29, 2, 27),
(155, 30, 3, 27),
(156, 44, 6, 27),
(157, 45, 9, 27),
(158, 46, 8, 27),
(159, 47, 7, 27),
(160, 48, 4, 27),
(161, 49, 5, 27),
(162, 50, 6, 27),
(163, 51, 1, 27),
(164, 52, 5, 27),
(165, 53, 2, 27),
(166, 54, 3, 27),
(167, 55, 6, 27),
(168, 56, 32, 27),
(169, 57, 2, 27),
(170, 58, 5, 27),
(171, 59, 4, 27),
(172, 60, 7, 27),
(173, 61, 5, 27),
(174, 62, 2, 27),
(175, 63, 1, 27),
(176, 64, 4, 27),
(177, 65, 1, 27),
(178, 66, 1, 27),
(179, 67, 1, 27),
(180, 68, 1, 27),
(181, 69, 1, 27),
(182, 70, 1, 27),
(183, 71, 1, 27),
(184, 72, 1, 27),
(185, 73, 1, 27),
(186, 74, 1, 27),
(187, 75, 1, 27),
(188, 76, 1, 27),
(189, 77, 1, 27),
(190, 78, 11, 27),
(191, 79, 1, 27),
(192, 80, 1, 27),
(193, 81, 1, 27),
(194, 82, 1, 27),
(195, 83, 1, 27),
(196, 84, 1, 27),
(197, 85, 1, 27),
(198, 86, 11, 27),
(199, 87, 1, 27),
(200, 88, 1, 27),
(201, 89, 1, 27),
(202, 90, 1, 27),
(203, 91, 1, 27),
(204, 92, 1, 27),
(205, 93, 1, 27),
(206, 94, 1, 27),
(207, 95, 1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE IF NOT EXISTS `tbl_subscription` (
  `su_id` int(11) NOT NULL,
  `su_email` varchar(110) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`su_id`, `su_email`, `isActive`) VALUES
(1, 'test@example.com', 1),
(2, 'broom@examole.con', 1),
(3, '', 1),
(4, 'broo44m@examole.con', 1),
(5, 'maulik121@gmail.com', 1),
(6, 'sorathiyakartik@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE IF NOT EXISTS `tbl_tags` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(25) NOT NULL,
  `t_link` varchar(255) NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
  `u_id` int(20) unsigned NOT NULL,
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
  `isDelete` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_type`, `u_name`, `password`, `email`, `phone`, `address`, `city`, `state`, `zipcode`, `about_me`, `isApproved`, `company_name`, `company_logo`, `created_by`, `created_date`, `updated_by`, `updated_date`, `isActive`, `isDelete`) VALUES
(6, 'customer', 'customer', '91ec1f9324753048c0096d036a694f86', 'customer@example.com', '1234567890', 'test', NULL, NULL, NULL, 'test', 0, 'kollege', NULL, NULL, NULL, NULL, NULL, 1, 0),
(27, 'vendor', 'vendor', '7c3613dba5171cb6027c67835dd3b9d4', 'vendor@example.com', '123456789', 'test', NULL, NULL, NULL, 'test', 0, 'XYZ', '1459169638IMG_0542.JPG', NULL, NULL, NULL, NULL, 1, 0),
(28, 'driver', 'driver', 'e2d45d57c7e2941b65c6ccd64af4223e', 'driver@example.com', '123456789', 'test', NULL, NULL, NULL, 'test', 0, 'PQRS', '1459169915IMG_2321.JPG', NULL, NULL, NULL, NULL, 1, 0),
(29, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', '', '', NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(30, 'admin', 'shubham', 'c7941a7d8afa77569071a3ebe2855eb7', 'shubham@gmail.com', '9033737919', 'jkjk				Address', NULL, NULL, NULL, 'kjkj				Something about you...', 0, 'jksjd', NULL, NULL, NULL, NULL, NULL, 1, 0),
(31, 'admin', 'kjhg', '2ed45186c72f9319dc64338cdf16ab76', 'lkjhgf', '8755', 'kjhg', NULL, NULL, NULL, 'lkjhg', 0, 'kk', NULL, NULL, NULL, NULL, NULL, 1, 0),
(33, 'driver', 'driver1', '7c3613dba5171cb6027c67835dd3b9d4', 'vendor1@example.com', '1234567890', 'test', NULL, NULL, NULL, 'test', 0, 'XYZ', '1459169638IMG_0542.JPG', NULL, NULL, NULL, NULL, 1, 0),
(34, 'driver', 'driver2', '7c3613dba5171cb6027c67835dd3b9d4', 'vendor2@example.com', '123456', 'test', NULL, NULL, NULL, 'test', 0, 'XYZ', '1459169638IMG_0542.JPG', NULL, NULL, NULL, NULL, 1, 0),
(35, 'admin', 'kartik', '2ed45186c72f9319dc64338cdf16ab76', 'kartik@example.com', '12', 'jhjh', NULL, NULL, NULL, 'kjjh', 0, 'shdj', NULL, NULL, NULL, NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_bucket`
--

CREATE TABLE IF NOT EXISTS `tbl_user_bucket` (
  `ub_id` int(10) unsigned NOT NULL,
  `u_id` int(20) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_bucket`
--

INSERT INTO `tbl_user_bucket` (`ub_id`, `u_id`) VALUES
(11, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  ADD PRIMARY KEY (`au_id`);

--
-- Indexes for table `tbl_bucket`
--
ALTER TABLE `tbl_bucket`
  ADD PRIMARY KEY (`b_id`), ADD KEY `ub_id` (`ub_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  ADD PRIMARY KEY (`cl_id`), ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `tbl_onlinelaundry`
--
ALTER TABLE `tbl_onlinelaundry`
  ADD PRIMARY KEY (`ol_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`o_id`), ADD KEY `cu_id` (`cu_id`), ADD KEY `ve_id` (`ve_id`);

--
-- Indexes for table `tbl_prices`
--
ALTER TABLE `tbl_prices`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`su_id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_user_bucket`
--
ALTER TABLE `tbl_user_bucket`
  ADD PRIMARY KEY (`ub_id`), ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aboutus`
--
ALTER TABLE `tbl_aboutus`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_bucket`
--
ALTER TABLE `tbl_bucket`
  MODIFY `b_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `c_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  MODIFY `cl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_onlinelaundry`
--
ALTER TABLE `tbl_onlinelaundry`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `o_id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_prices`
--
ALTER TABLE `tbl_prices`
  MODIFY `p_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=208;
--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_user_bucket`
--
ALTER TABLE `tbl_user_bucket`
  MODIFY `ub_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bucket`
--
ALTER TABLE `tbl_bucket`
ADD CONSTRAINT `tbl_bucket_ibfk_1` FOREIGN KEY (`ub_id`) REFERENCES `tbl_user_bucket` (`ub_id`);

--
-- Constraints for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
ADD CONSTRAINT `tbl_clothes_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `tbl_category` (`c_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`cu_id`) REFERENCES `tbl_user` (`u_id`),
ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`ve_id`) REFERENCES `tbl_user` (`u_id`);

--
-- Constraints for table `tbl_user_bucket`
--
ALTER TABLE `tbl_user_bucket`
ADD CONSTRAINT `tbl_user_bucket_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_user` (`u_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

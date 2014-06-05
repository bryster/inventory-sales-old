-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2010 at 11:20 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `sad`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `ct_id` int(4) NOT NULL auto_increment,
  `prod_id` int(4) NOT NULL,
  `userid` int(4) NOT NULL,
  `ct_qty` int(4) NOT NULL,
  `cust_id` int(6) NOT NULL,
  PRIMARY KEY  (`ct_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=351 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`ct_id`, `prod_id`, `userid`, `ct_qty`, `cust_id`) VALUES
(13, 2, 7, 1, 0),
(325, 10, 6, 0, 0),
(342, 24, 6, 1, 0),
(343, 12, 6, 1, 0),
(346, 14, 6, 1, 0),
(350, 2, 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(4) NOT NULL auto_increment,
  `cat_name` varchar(20) NOT NULL,
  `cat_desc` varchar(800) NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_desc`) VALUES
(1, 'Milkfish', 'Fresh Whole Milkfish'),
(2, 'Bangus', 'Boneless Bangus'),
(3, 'tinapa', 'mga delata');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `cust_id` int(4) NOT NULL auto_increment,
  `cust_fname` varchar(30) default NULL,
  `cust_lname` varchar(30) default NULL,
  `cust_email` varchar(64) NOT NULL,
  `cus_user` varchar(30) default NULL,
  `cus_pass` varchar(200) default NULL,
  `cust_address` varchar(200) NOT NULL,
  `cust_city` varchar(20) default NULL,
  `cust_type` smallint(2) NOT NULL,
  `cust_contact` varchar(15) default NULL,
  `cust_acontact` int(15) default NULL,
  `cust_question` int(2) default NULL,
  `cust_answer` varchar(40) default NULL,
  `note` varchar(900) default NULL,
  PRIMARY KEY  (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_fname`, `cust_lname`, `cust_email`, `cus_user`, `cus_pass`, `cust_address`, `cust_city`, `cust_type`, `cust_contact`, `cust_acontact`, `cust_question`, `cust_answer`, `note`) VALUES
(1, 'James', 'Bond', 'sephrylle@gmail.com', 'agent007', '=EWbGRnWY1UP', 'kalye 12, kanto kilid, wakwak subdivision', 'Davao', 1, '09292513714', 0, 8, 'pokwang', 'c agent 007'),
(2, 'Floyd', 'Mayweather', 'gayweather@gmail.com', 'Money', '=oVb4ZXZXFVP', 'orlando', 'florida', 1, '09192451278', 0, 0, '', ''),
(3, 'Bruce', 'Wayne', '', 'batman', 'batman', '', 'Gotham', 1, '12345612345', 0, 0, '', ''),
(5, 'Nico', 'Robin', '', 'nicorob', 'nicorob', '', 'Davao', 1, '09129338441', 0, 0, '', ''),
(6, 'Dejuan', 'Blair', '', 'asd', 'asd', 'matina', 'adada', 1, '23423423423', 0, 4, 'Johan', ''),
(7, 'raychu', 'pikachu', '', 'ash', 'ash', '9th floor, HSBC Building ', 'Tagum', 1, '01230931231', 0, 0, '', 'note check'),
(8, 'Lebron', 'James', 'lbj23@yahoo.com', 'lbj23', 'kingjames', 'cleveland ohio', 'davao', 0, '09292987123', 0, 2, 'mama', ''),
(9, 'Kobe', 'Bryant', '', 'Bryant', 'Bryant', 'Los Angeles', 'California', 1, '09292987123', 0, NULL, NULL, 'work na jd ka?'),
(10, 'Eric', 'Emberda', '', 'Emberda', 'Emberda', 'UIC', 'Father Selga', 1, '2309402', 230934204, NULL, NULL, 'hehehhe'),
(11, 'Carmelo', 'Anthony', '', 'ca15', 'carmelo', 'denver colorado', 'nuggets', 0, '12345678901', 0, 9, 'billups', NULL),
(12, 'Urahara', 'Kisuke', 'brylle.cambronero@gmail.com', 'bankai', 'khlSoF2RGlXWR1TP', 'Urahara Labs, Soul Society', 'kakura', 0, '09292513714', 0, 10, 'soul society', NULL),
(13, 'J-Dawn Barbra', 'Cambronero', 'dawnski12@yahoo.com', 'Awnra', '==QTEtWeNpWV65karRjT6lVP', 'Blk 12, L5, P4, Tamarind Ave; Woodridge Park, Ma-a', 'Davao', 0, '+639225369876', 2147483647, 12, 'december 4', NULL),
(14, 'Ben', 'Ten', 'ben10@gmail.com', 'Ben10', 'Z1mV1R2RWVXTUFUP', 'Space Galaxy', 'Davao', 0, '+639272451571', 0, 11, 'max', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cust_logs`
--

CREATE TABLE IF NOT EXISTS `tbl_cust_logs` (
  `c_log_id` int(6) NOT NULL auto_increment,
  `log_type` int(2) NOT NULL,
  `log_date` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP,
  `cust_id` int(5) NOT NULL,
  PRIMARY KEY  (`c_log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_cust_logs`
--

INSERT INTO `tbl_cust_logs` (`c_log_id`, `log_type`, `log_date`, `cust_id`) VALUES
(1, 1, '2009-12-11 23:41:25', 1),
(2, 1, '2009-12-12 06:48:44', 6),
(3, 1, '2009-12-12 06:49:41', 6),
(4, 1, '2009-12-12 06:51:01', 1),
(5, 1, '2009-12-12 06:52:53', 1),
(6, 1, '2009-12-12 06:56:17', 1),
(7, 1, '2009-12-12 06:59:01', 1),
(8, 1, '2009-12-12 07:01:05', 1),
(9, 1, '2009-12-12 07:02:18', 1),
(10, 1, '2009-12-12 08:46:19', 1),
(11, 1, '2009-12-12 10:01:52', 1),
(12, 1, '2009-12-12 13:22:38', 12),
(13, 1, '2009-12-12 14:34:56', 12),
(14, 1, '2009-12-13 09:33:10', 12),
(15, 1, '2009-12-13 10:03:56', 12),
(16, 1, '2009-12-13 10:04:20', 12),
(17, 1, '2009-12-13 10:05:15', 12),
(18, 1, '2009-12-13 22:01:10', 12),
(19, 1, '2009-12-15 09:34:40', 12),
(20, 1, '2009-12-16 14:40:28', 12),
(21, 1, '2009-12-16 19:56:06', 12),
(22, 1, '2009-12-16 21:25:10', 12),
(23, 1, '2009-12-17 17:08:11', 12),
(24, 1, '2009-12-18 09:17:36', 12),
(25, 1, '2009-12-18 09:32:09', 12),
(26, 1, '2009-12-18 14:38:56', 12),
(27, 1, '2009-12-28 10:53:41', 13),
(28, 1, '2009-12-28 11:01:30', 13),
(29, 1, '2009-12-28 11:17:04', 14),
(30, 1, '2010-01-04 20:35:24', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE IF NOT EXISTS `tbl_logs` (
  `log_id` int(4) NOT NULL auto_increment,
  `log_type` tinyint(2) NOT NULL,
  `log_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `userid` int(4) NOT NULL,
  PRIMARY KEY  (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `log_type`, `log_date`, `userid`) VALUES
(1, 1, '2009-09-08 22:17:13', 6),
(2, 1, '2009-09-08 22:17:17', 6),
(3, 1, '2009-09-09 06:51:20', 6),
(4, 2, '2009-09-09 06:51:22', 6),
(5, 1, '2009-09-09 07:05:26', 6),
(6, 2, '2009-09-10 21:26:59', 6),
(7, 1, '2009-09-10 21:27:30', 7),
(8, 2, '2009-09-10 21:27:34', 7),
(9, 1, '2009-09-10 21:27:49', 11),
(10, 2, '2009-09-10 21:27:52', 11),
(11, 1, '2009-09-10 21:34:31', 6),
(12, 1, '2009-09-14 10:35:32', 6),
(13, 2, '2009-09-14 23:19:49', 6),
(14, 1, '2009-09-15 07:05:19', 7),
(15, 2, '2009-09-16 22:17:00', 7),
(16, 1, '2009-09-16 22:17:06', 7),
(17, 2, '2009-09-16 22:18:55', 7),
(18, 1, '2009-09-16 22:19:00', 6),
(19, 1, '2009-09-17 14:32:02', 6),
(20, 1, '2009-09-17 14:42:57', 6),
(21, 1, '2009-09-20 21:41:44', 6),
(22, 1, '2009-09-21 17:42:46', 6),
(23, 1, '2009-09-22 07:29:46', 6),
(24, 1, '2009-09-22 20:07:31', 6),
(25, 1, '2009-09-24 05:22:55', 6),
(26, 1, '2009-09-25 07:20:10', 6),
(27, 2, '2009-09-26 14:38:23', 6),
(28, 1, '2009-09-26 14:38:29', 7),
(29, 2, '2009-09-26 14:38:42', 7),
(30, 1, '2009-09-26 14:38:52', 7),
(31, 2, '2009-09-26 14:38:58', 7),
(32, 1, '2009-09-26 14:39:03', 6),
(33, 1, '2009-09-29 19:38:47', 6),
(34, 1, '2009-09-30 08:49:35', 6),
(35, 1, '2009-09-30 09:33:43', 6),
(36, 1, '2009-10-01 14:41:19', 6),
(37, 1, '2009-10-01 21:57:37', 6),
(38, 1, '2009-10-01 21:57:37', 6),
(39, 1, '2009-10-03 08:20:00', 6),
(40, 1, '2009-10-04 20:09:04', 6),
(41, 2, '2009-10-05 08:51:03', 6),
(42, 1, '2009-10-05 08:51:07', 7),
(43, 1, '2009-10-10 08:50:53', 6),
(44, 1, '2009-10-16 08:56:59', 6),
(45, 1, '2009-10-19 15:45:31', 6),
(46, 2, '2009-10-19 16:52:28', 6),
(47, 1, '2009-10-19 16:52:46', 6),
(48, 1, '2009-10-21 08:39:42', 6),
(49, 1, '2009-10-25 20:35:01', 6),
(50, 1, '2009-10-25 20:37:10', 6),
(51, 1, '2009-10-25 20:40:01', 6),
(52, 1, '2009-10-25 20:49:20', 6),
(53, 1, '2009-10-28 14:26:40', 6),
(54, 1, '2009-10-28 14:29:46', 6),
(55, 1, '2009-10-31 08:25:13', 6),
(56, 1, '2009-10-31 09:58:58', 6),
(57, 1, '2009-10-31 09:58:59', 6),
(58, 1, '2009-10-31 11:21:06', 6),
(59, 1, '2009-10-31 11:24:46', 6),
(60, 1, '2009-10-31 11:26:30', 6),
(61, 1, '2009-11-01 11:39:08', 6),
(62, 1, '2009-11-01 20:59:45', 6),
(63, 1, '2009-11-02 16:46:26', 6),
(64, 1, '2009-11-08 15:11:47', 6),
(65, 1, '2009-11-13 18:21:24', 6),
(66, 1, '2009-11-15 17:39:15', 6),
(67, 1, '2009-11-16 20:47:26', 6),
(68, 1, '2009-11-17 07:21:58', 6),
(69, 1, '2009-11-17 08:44:36', 6),
(70, 1, '2009-11-18 16:47:37', 6),
(71, 1, '2009-11-18 21:54:23', 6),
(72, 1, '2009-11-20 07:07:13', 6),
(73, 2, '2009-11-20 08:57:21', 6),
(74, 1, '2009-11-20 08:57:31', 6),
(75, 1, '2009-11-22 16:20:26', 6),
(76, 1, '2009-11-23 08:02:06', 6),
(77, 1, '2009-11-23 08:02:06', 6),
(78, 2, '2009-11-23 08:02:19', 6),
(79, 1, '2009-11-23 08:02:23', 7),
(80, 1, '2009-11-23 17:07:13', 6),
(81, 2, '2009-11-23 19:19:25', 6),
(82, 1, '2009-11-23 19:19:59', 6),
(83, 2, '2009-11-23 20:00:06', 6),
(84, 1, '2009-11-23 20:01:36', 6),
(85, 1, '2009-11-24 20:18:40', 6),
(86, 1, '2009-11-27 09:10:48', 6),
(87, 1, '2009-11-28 07:42:08', 6),
(88, 1, '2009-12-01 23:48:17', 6),
(89, 1, '2009-12-02 08:00:51', 6),
(90, 1, '2009-12-05 10:53:21', 6),
(91, 1, '2009-12-08 16:40:26', 1),
(92, 1, '2009-12-08 17:04:17', 1),
(93, 1, '2009-12-08 19:10:56', 1),
(94, 2, '2009-12-12 06:44:04', 1),
(95, 1, '2009-12-12 06:44:18', 6),
(96, 2, '2009-12-12 06:58:30', 1),
(97, 2, '2009-12-12 07:00:51', 1),
(98, 2, '2009-12-12 07:02:09', 1),
(99, 2, '2009-12-12 07:15:41', 1),
(100, 2, '2009-12-12 09:56:50', 1),
(101, 1, '2009-12-12 10:05:19', 6),
(102, 2, '2009-12-12 13:16:06', 1),
(103, 2, '2009-12-12 14:28:56', 12),
(104, 1, '2009-12-12 20:48:38', 6),
(105, 2, '2009-12-13 10:03:25', 12),
(106, 2, '2009-12-13 10:03:59', 12),
(107, 2, '2009-12-13 10:04:57', 12),
(108, 1, '2009-12-13 11:06:11', 6),
(109, 2, '2009-12-13 21:43:03', 12),
(110, 1, '2009-12-15 12:57:51', 6),
(111, 1, '2009-12-16 16:11:11', 6),
(112, 2, '2009-12-16 18:19:48', 12),
(113, 2, '2009-12-16 21:23:55', 12),
(114, 1, '2009-12-16 21:45:20', 6),
(115, 1, '2009-12-17 17:35:59', 6),
(116, 1, '2009-12-17 20:16:23', 6),
(117, 1, '2009-12-18 09:23:23', 6),
(118, 2, '2009-12-18 09:31:35', 12),
(119, 1, '2009-12-18 14:42:04', 6),
(120, 1, '2009-12-22 16:24:20', 6),
(121, 1, '2009-12-28 10:46:32', 6),
(122, 2, '2009-12-28 11:00:03', 6),
(123, 1, '2009-12-28 11:00:11', 6),
(124, 2, '2009-12-28 11:12:40', 13),
(125, 1, '2009-12-28 11:14:58', 6),
(126, 1, '2010-01-04 09:36:58', 6),
(127, 1, '2010-01-04 11:31:59', 6),
(128, 2, '2010-01-04 20:35:35', 12),
(129, 1, '2010-01-04 20:39:36', 6),
(130, 1, '2010-01-07 13:31:24', 6),
(131, 1, '2010-01-07 13:38:55', 6),
(132, 1, '2010-01-07 14:12:16', 6),
(133, 1, '2010-01-08 01:50:49', 6),
(134, 1, '2010-01-08 19:20:02', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `o_id` int(6) NOT NULL auto_increment,
  `o_status` smallint(2) NOT NULL,
  `o_memo` varchar(260) NOT NULL,
  `o_lastupdate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `o_total` int(7) NOT NULL,
  `userid` int(4) NOT NULL,
  `cust_id` int(5) NOT NULL,
  PRIMARY KEY  (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`o_id`, `o_status`, `o_memo`, `o_lastupdate`, `o_total`, `userid`, `cust_id`) VALUES
(12, 2, '', '2009-10-05 08:12:09', 1342, 6, 2),
(14, 1, '', '2009-11-01 11:46:21', 3701, 6, 3),
(15, 3, '', '2009-10-19 16:54:55', 1706, 6, 3),
(16, 3, '', '2009-10-26 22:47:00', 240, 6, 5),
(18, 4, '', '2009-10-31 14:27:19', 335, 6, 7),
(19, 2, '', '2009-10-31 14:27:55', 2388, 6, 3),
(20, 4, '', '2009-11-01 11:42:07', 355, 6, 2),
(21, 5, '', '2009-11-15 17:46:17', 5091, 6, 1),
(22, 4, '', '2009-11-25 21:18:13', 800, 6, 8),
(23, 4, '', '2009-11-27 00:16:17', 20954, 6, 2),
(24, 1, '', '2009-11-26 10:06:04', 155, 6, 9),
(25, 1, '', '2009-11-26 10:16:28', 1703, 6, 9),
(26, 1, '', '2009-11-27 09:14:57', 2468, 6, 10),
(28, 2, '', '2009-12-17 20:23:22', 775, 0, 12),
(29, 2, '', '2009-12-18 09:20:13', 450, 0, 12),
(30, 4, '', '2009-12-22 20:24:31', 900, 6, 12),
(31, 2, '', '2009-12-28 10:57:12', 80, 0, 13),
(33, 2, '', '2009-12-28 11:47:46', 1234, 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE IF NOT EXISTS `tbl_order_item` (
  `o_id` int(4) NOT NULL,
  `prod_id` int(4) NOT NULL,
  `od_qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`o_id`, `prod_id`, `od_qty`) VALUES
(12, 10, 61),
(14, 1, 1),
(14, 9, 5),
(14, 10, 61),
(15, 9, 5),
(0, 12, 1),
(12, 18, 3),
(12, 11, 1),
(16, 18, 1),
(16, 23, 1),
(18, 15, 1),
(18, 3, 2),
(18, 18, 1),
(19, 18, 2),
(19, 1, 1),
(19, 9, 5),
(19, 11, 1),
(19, 10, 61),
(20, 3, 2),
(20, 18, 2),
(21, 3, 2),
(22, 10, 61),
(14, 14, 2),
(23, 3, 2),
(23, 4, 5),
(23, 8, 6),
(25, 5, 1),
(25, 6, 3),
(25, 7, 5),
(26, 3, 2),
(6, 3, 2),
(6, 11, 1),
(6, 14, 1),
(6, 3, 2),
(6, 10, 61),
(6, 3, 2),
(6, 11, 1),
(6, 14, 1),
(6, 3, 2),
(19, 3, 2),
(19, 6, 3),
(12, 3, 2),
(24, 3, 1),
(24, 2, 1),
(30, 2, 5),
(31, 2, 5),
(32, 2, 5),
(29, 14, 5),
(29, 11, 3),
(30, 9, 9),
(31, 8, 1),
(32, 10, 5),
(33, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `prod_id` int(4) NOT NULL auto_increment,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_price` int(4) NOT NULL,
  `quantity_on_hand` int(5) NOT NULL,
  `unit` int(2) NOT NULL,
  `date_added` date NOT NULL,
  `prod_state` tinyint(1) NOT NULL,
  `userid` int(4) NOT NULL,
  PRIMARY KEY  (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `quantity_on_hand`, `unit`, `date_added`, `prod_state`, `userid`) VALUES
(2, 'Deboned', 'This is a deboned. ', 155, 0, 0, '2009-10-23', 1, 1),
(3, 'Bansot', 'description of item bansot  ', 1234, 89, 0, '2009-10-23', 0, 1),
(4, 'Head and Tail', 'description of the product item 05 ', 1256, 102, 0, '2009-10-23', 1, 6),
(5, 'Deboned Non-Marinated', 'desc of deboned non-marinated ', 189, 22, 0, '2009-10-23', 1, 6),
(6, 'Deboned Marinated', 'this is a good item ', 532, 47, 0, '2009-10-23', 1, 6),
(7, 'Smoked Bangus', 'Product B is a  ', 90, 33, 0, '2009-10-23', 1, 6),
(8, 'Teriyaki', 'teriyaki. watta watta', 80, 1, 0, '2009-10-23', 0, 6),
(9, 'Hot and Spicy Bangus', 'this ', 100, 38, 0, '2009-10-23', 0, 6),
(10, 'Belly Bangus (Non-marinated', 'this is a test product  ', 100, 52, 0, '2009-10-26', 1, 6),
(11, 'Belly Bangus Marinated', 'product D is a test product ', 150, 11, 0, '2009-10-23', 1, 6),
(12, 'Relleno Bangus', 'sample description for item 0023 ', 150, 0, 0, '2009-10-26', 0, 6),
(14, 'Daing', 'This is item 01 ', 61, 229, 0, '2009-10-23', 1, 6),
(24, 'Whole Milkfish', 'This is item 02 ', 150, 0, 0, '2009-10-23', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE IF NOT EXISTS `tbl_product_image` (
  `prod_id` int(4) NOT NULL,
  `image` longblob NOT NULL,
  `image_size` varchar(25) NOT NULL,
  `image_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_image`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_record`
--

CREATE TABLE IF NOT EXISTS `tbl_record` (
  `record_id` int(6) NOT NULL auto_increment,
  `last_update` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `prod_id` int(4) NOT NULL,
  `userid` int(4) NOT NULL,
  `quantity` int(4) NOT NULL,
  `rec_type` smallint(2) NOT NULL,
  `remarks` text NOT NULL,
  `o_id` int(6) default NULL,
  PRIMARY KEY  (`record_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `tbl_record`
--

INSERT INTO `tbl_record` (`record_id`, `last_update`, `prod_id`, `userid`, `quantity`, `rec_type`, `remarks`, `o_id`) VALUES
(17, '2009-09-14 22:49:24', 1, 6, 50, 1, '', NULL),
(18, '2009-09-14 22:49:24', 1, 6, 50, 1, '', NULL),
(19, '2009-09-14 22:49:24', 1, 6, 50, 1, '', NULL),
(20, '2009-09-14 22:49:24', 1, 6, 900, 1, '', NULL),
(21, '2009-09-14 22:49:24', 1, 6, 50, 1, '', NULL),
(22, '2009-09-14 22:50:49', 8, 6, 50, 1, '', NULL),
(23, '2009-09-14 22:51:21', 8, 6, 12, 1, '', NULL),
(24, '2009-09-15 07:15:09', 21, 7, 500, 1, '', NULL),
(25, '2009-09-15 07:34:16', 1, 7, 5, 1, '', NULL),
(26, '2009-09-15 08:01:19', 3, 7, 50, 1, '', NULL),
(27, '2009-09-15 08:05:00', 9, 7, 46, 1, '', NULL),
(28, '2009-09-15 08:07:26', 3, 7, 8, 2, 'work na pls', NULL),
(29, '2009-09-17 01:03:01', 3, 6, 6, 1, '', NULL),
(30, '2009-09-17 01:03:26', 3, 6, 5, 2, '', NULL),
(31, '2009-09-17 10:44:06', 11, 6, 70, 1, '', NULL),
(32, '2009-09-17 14:32:45', 9, 6, 13, 1, '', NULL),
(33, '2009-09-22 20:25:54', 24, 6, 10, 1, '', NULL),
(34, '2009-09-24 06:17:02', 1, 6, 10, 1, '', NULL),
(35, '2009-09-24 06:17:09', 3, 6, 50, 1, '', NULL),
(36, '2009-09-24 06:17:17', 9, 6, 6, 1, '', NULL),
(37, '2009-09-24 06:17:31', 2, 6, 50, 1, '', NULL),
(38, '2009-09-24 06:17:39', 10, 6, 67, 1, '', NULL),
(39, '2009-09-24 06:17:49', 8, 6, 8, 1, '', NULL),
(40, '2009-09-24 06:17:59', 8, 6, 5, 1, '', NULL),
(41, '2009-09-24 06:18:10', 20, 6, 60, 1, '', NULL),
(42, '2009-09-24 06:18:20', 15, 6, 90, 1, '', NULL),
(43, '2009-09-24 06:18:42', 24, 6, 62, 1, '', NULL),
(44, '2009-09-24 06:18:50', 17, 6, 90, 1, '', NULL),
(45, '2009-09-24 06:18:58', 18, 6, 80, 1, '', NULL),
(46, '2009-09-24 06:19:23', 13, 6, 90, 1, '', NULL),
(47, '2009-09-24 06:20:42', 23, 6, 80, 1, '', NULL),
(48, '2009-10-19 16:53:57', 1, 6, 90, 1, '', NULL),
(49, '2009-11-14 09:49:45', 1, 6, 900, 1, '', NULL),
(50, '2009-11-14 09:52:55', 1, 6, 5, 1, '', NULL),
(51, '2009-11-14 09:59:23', 1, 6, 9, 1, 'unta ok na ni.', NULL),
(52, '2009-11-14 17:37:01', 1, 6, 559, 2, '', NULL),
(53, '2009-11-14 21:55:02', 27, 6, 50, 1, '', NULL),
(54, '2009-11-14 22:02:59', 28, 6, 1000, 1, '', NULL),
(55, '2009-11-18 09:20:38', 24, 6, 50, 1, '', NULL),
(56, '2009-11-26 10:47:14', 14, 6, 296, 2, '', NULL),
(57, '2009-11-26 11:03:39', 2, 6, 30, 2, '', NULL),
(58, '2009-11-26 11:30:31', 14, 6, 50, 1, '', NULL),
(59, '2009-11-26 11:30:42', 14, 6, 30, 2, '', NULL),
(60, '2009-11-26 11:31:04', 14, 6, 24, 1, '', NULL),
(61, '2009-11-26 11:34:53', 24, 6, 60, 2, '', NULL),
(62, '2009-11-26 11:35:33', 12, 6, 30, 1, '', NULL),
(63, '2009-11-26 11:35:46', 12, 6, 20, 2, '', NULL),
(64, '2009-11-26 11:36:23', 4, 6, 200, 1, '', NULL),
(65, '2009-11-26 11:36:34', 4, 6, 100, 2, '', NULL),
(66, '2009-11-26 11:37:03', 6, 6, 98, 1, '', NULL),
(67, '2009-11-26 11:37:15', 6, 6, 50, 2, '', NULL),
(68, '2009-11-26 11:38:08', 5, 6, 50, 1, '', NULL),
(69, '2009-11-26 11:38:24', 5, 6, 30, 2, '', NULL),
(70, '2009-11-26 12:07:17', 7, 6, 50, 1, '', NULL),
(71, '2009-11-26 12:07:25', 7, 6, 20, 2, '', NULL),
(72, '2009-11-26 12:07:47', 8, 6, 60, 1, '', NULL),
(73, '2009-11-26 12:07:54', 8, 6, 20, 2, '', NULL),
(74, '2009-11-26 12:08:36', 9, 6, 50, 1, '', NULL),
(75, '2009-11-26 12:08:43', 9, 6, 20, 2, '', NULL),
(76, '2009-11-26 12:09:01', 10, 6, 10, 2, '', NULL),
(77, '2009-11-26 12:09:20', 11, 6, 30, 1, '', NULL),
(78, '2009-11-26 12:09:27', 11, 6, 20, 2, '', NULL),
(79, '2009-11-26 12:34:42', 14, 6, 500, 1, '', NULL),
(80, '2009-11-27 09:14:57', 3, 6, 2, 2, '', NULL),
(82, '2009-12-01 20:56:22', 9, 6, 5, 2, '', 14),
(83, '2009-12-01 20:56:22', 10, 6, 61, 2, '', 14),
(84, '2009-12-01 20:56:22', 14, 6, 2, 2, '', 14),
(85, '2009-12-01 21:36:35', 3, 6, 1, 3, '', 24),
(86, '2009-12-01 21:36:35', 2, 6, 1, 3, '', 24),
(87, '2009-12-17 20:15:38', 0, 0, 0, 2, '', NULL),
(88, '2009-12-17 22:31:44', 0, 0, 0, 2, '', NULL),
(89, '2009-12-17 22:34:29', 0, 0, 0, 2, '', NULL),
(90, '2009-12-18 09:20:13', 0, 0, 0, 2, '', NULL),
(91, '2009-12-18 09:20:13', 0, 0, 0, 2, '', NULL),
(92, '2009-12-18 14:41:23', 0, 0, 0, 2, '', NULL),
(93, '2009-12-18 14:42:21', 2, 6, 5, 3, '', 30),
(94, '2009-12-18 14:42:21', 9, 6, 9, 3, '', 30),
(95, '2009-12-28 10:57:12', 0, 0, 0, 2, '', NULL),
(96, '2009-12-28 11:17:57', 0, 0, 0, 2, '', NULL),
(97, '2009-12-28 11:47:46', 0, 0, 0, 2, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userid` int(4) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `userlevel` tinyint(1) unsigned NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `alt_contact` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  PRIMARY KEY  (`userid`),
  KEY `username` (`username`,`firstname`,`lastname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userid`, `username`, `password`, `userlevel`, `firstname`, `lastname`, `contact`, `alt_contact`, `address`, `city`) VALUES
(6, 'admin', 'admin123', 2, 'Brylle', 'Cambronero', '92314142', 2147483647, 'blk 12 lot 5 ph 4 tamarind ave woodridge', 'Davao'),
(7, 'nks', 'niko', 2, 'Niko', 'Labadan', '94324', 92914444, 'Father selga street, bankerohan davao ci', 'Davao'),
(11, 'jamescooper', 'james', 2, 'James', 'Cooper', '09292513234', 0, '4th Street., Lot 6 ', 'Manila'),
(12, 'josephcambronero', 'joseph', 2, 'Joseph', 'Cambronero', '09243344521', 0, 'blk 12 lot 5 ph 4 tamarind ave', 'Bacolod'),
(13, 'dwade3', 'dwade', 0, 'Dwayne', 'Wade', '09292654321', 0, 'miami, heat', 'florida');

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2015 at 10:21 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `okmobile_advertisement`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
`id` int(10) unsigned NOT NULL,
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `segment_id` int(11) NOT NULL,
  `subsegment_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `thana_id` int(11) NOT NULL,
  `ad_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ad_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_price` text COLLATE utf8_unicode_ci NOT NULL,
  `ad_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ad_publish` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `ad_id`, `user_id`, `catagory_id`, `segment_id`, `subsegment_id`, `district_id`, `thana_id`, `ad_title`, `ad_description`, `product_price`, `ad_image`, `ad_publish`, `created_at`, `updated_at`) VALUES
(1, 10167, 2, 1, 1, 1, 1, 1, 'Applie iPad for sell', 'Applie iPad for sell', '20000', 'assets/images/ads/2015-01-27-20:08:50-blue_jeans.jpg', 0, '2015-01-27 14:08:50', '2015-01-27 14:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE IF NOT EXISTS `catagories` (
`id` int(10) unsigned NOT NULL,
  `catagory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagory_name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2015-01-27 13:12:11', '2015-01-27 13:12:11'),
(2, 'Household Chores', '2015-01-27 13:12:41', '2015-01-27 13:12:41'),
(3, 'Computer', '2015-01-27 13:12:57', '2015-01-27 13:12:57'),
(4, 'Car', '2015-01-27 13:13:01', '2015-01-27 13:13:01'),
(5, 'Real Estate', '2015-01-27 13:13:13', '2015-01-27 13:13:13'),
(6, 'Book', '2015-01-27 13:14:16', '2015-01-27 13:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`id` int(10) unsigned NOT NULL,
  `district_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka City (ঢাকা শহর)', '2015-01-27 13:44:12', '2015-01-27 13:44:12'),
(2, 'Khulna', '2015-01-27 13:44:16', '2015-01-27 13:44:16'),
(3, 'Barisal', '2015-01-27 13:44:20', '2015-01-27 13:44:20'),
(4, 'Rajshahi', '2015-01-27 13:44:24', '2015-01-27 13:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_01_20_163610_create_users', 1),
('2015_01_20_224516_create_catagories', 1),
('2015_01_21_180903_create_segments', 1),
('2015_01_21_195438_create_subsegments', 1),
('2015_01_22_192132_create_districts', 1),
('2015_01_22_194912_create_thanas', 1),
('2015_01_23_222412_create_ads', 1);

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE IF NOT EXISTS `segments` (
`id` int(10) unsigned NOT NULL,
  `segment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`id`, `segment_name`, `catagory_id`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 1, '2015-01-27 13:14:39', '2015-01-27 13:14:39'),
(2, 'Weighing mechine', 1, '2015-01-27 13:41:20', '2015-01-27 13:41:20'),
(3, 'Laptop', 3, '2015-01-27 13:41:30', '2015-01-27 13:41:30'),
(4, 'Desktop', 3, '2015-01-27 13:41:34', '2015-01-27 13:41:34'),
(5, 'Mystery', 6, '2015-01-27 13:41:50', '2015-01-27 13:41:50'),
(6, 'Horror', 6, '2015-01-27 13:41:55', '2015-01-27 13:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `subsegments`
--

CREATE TABLE IF NOT EXISTS `subsegments` (
`id` int(10) unsigned NOT NULL,
  `subsegment_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `catagory_id` int(11) NOT NULL,
  `segment_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subsegments`
--

INSERT INTO `subsegments` (`id`, `subsegment_name`, `catagory_id`, `segment_id`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', 1, 1, '2015-01-27 13:39:37', '2015-01-27 13:39:37'),
(2, 'iPad', 1, 1, '2015-01-27 13:40:32', '2015-01-27 13:40:32'),
(3, 'iPhone', 1, 1, '2015-01-27 13:40:38', '2015-01-27 13:40:38'),
(4, 'Others', 1, 1, '2015-01-27 13:40:47', '2015-01-27 13:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE IF NOT EXISTS `thanas` (
`id` int(10) unsigned NOT NULL,
  `thana_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `thana_name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Mirpur', 1, '2015-01-27 13:44:41', '2015-01-27 13:44:41'),
(2, 'Banani', 1, '2015-01-27 13:44:46', '2015-01-27 13:44:46'),
(3, 'Uttara', 1, '2015-01-27 13:44:51', '2015-01-27 13:44:51'),
(4, 'Rupnagar', 1, '2015-01-27 13:44:58', '2015-01-27 13:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` text COLLATE utf8_unicode_ci NOT NULL,
  `user_thana` int(11) NOT NULL,
  `user_district` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `mobile`, `profession`, `date_of_birth`, `user_thana`, `user_district`, `address`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@okmobileltd.com', '', '', '', 0, 0, '', '$2y$10$xbZOwvwYvfj5JtBVzxpAoeg3v7GrW0vrIMx8dQEvD9q5.c0/EReSu', 'SPjwUIx7IQ9KrzgihpF6Byh2tPRrUvYG9MMV1GtVFl8gSaxw2Ee43FDoBgmG', 1, '2015-01-27 13:11:35', '2015-01-27 13:56:35'),
(2, 'Hasibur Rahman Omi', 'hasibomi@hasibomi.com', '01950023258', 'Web Developer', '20/9/1993', 1, 1, 'Bangladesh', '$2y$10$ohhVbn/8NLZz8flHBk3bCebBE7ip2KpLvrKqE7woovvb2JLNJ0nEC', 'EQsi2woduLT6NIE4DGhH6czpzHCiTTwZhT1nSRJjWax3GTCOXxDjLuHCJb5W', 0, '2015-01-27 13:55:13', '2015-01-27 14:48:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `segments`
--
ALTER TABLE `segments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsegments`
--
ALTER TABLE `subsegments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subsegments`
--
ALTER TABLE `subsegments`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

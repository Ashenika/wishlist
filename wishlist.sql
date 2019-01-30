-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 06:33 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wishlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `added_products`
--

CREATE TABLE `added_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_title` varchar(50) DEFAULT NULL,
  `sub_total` double(18,2) DEFAULT NULL,
  `total` double(18,2) DEFAULT NULL,
  `price` double(18,2) DEFAULT NULL,
  `created_wishlist_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `added_products`
--

INSERT INTO `added_products` (`id`, `product_id`, `product_title`, `sub_total`, `total`, `price`, `created_wishlist_id`, `user_id`, `quantity`, `created_at`) VALUES
(14, 2, NULL, 0.00, 0.00, NULL, 6, 6, 3, '2019-01-29 18:01:16'),
(16, 6, NULL, NULL, 0.00, NULL, 6, 6, 1, '2019-01-29 18:01:41'),
(17, 1, NULL, NULL, 0.00, NULL, 6, 6, 1, '2019-01-29 18:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `auth_user`
--

CREATE TABLE `auth_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `logins_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_user`
--

INSERT INTO `auth_user` (`id`, `username`, `password`, `logins_id`, `user_id`, `created_at`) VALUES
(3, 'ashenikaperera@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 3, '2019-01-23 04:32:25'),
(4, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, 4, '2019-01-23 18:23:54'),
(6, 'asheni', 'e10adc3949ba59abbe56e057f20f883e', NULL, 6, '2019-01-29 18:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category_created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `category_created_at`, `updated_at`) VALUES
(1, 'Valentine', '2019-01-20 12:31:55', '2019-01-20 12:31:57'),
(2, 'Christmas', '2019-01-20 12:33:51', '2019-01-20 12:33:52'),
(3, 'Birthday', '2019-01-20 12:34:06', '2019-01-20 12:34:07'),
(4, 'Special Days', '2019-01-20 12:34:32', '2019-01-20 12:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(50) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(11) NOT NULL,
  `user_data_text` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `created_wishlists`
--

CREATE TABLE `created_wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `wishlist_id` int(11) DEFAULT NULL,
  `created_wishlist_name` varchar(50) DEFAULT NULL,
  `wishlist_desc` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `session_id`, `name`, `timestamp`) VALUES
(19, '2be006q4q5k0cfhuv7acdeja1gs4lonl', 'super.admin', NULL),
(20, 's7f9f60f8je3fp1gcjf50bn7j6qf7mm0', 'super.admin', NULL),
(21, '82cvvec37qjh2oqb0sar1mpgkip5o85o', 'super.admin', NULL),
(22, '2pndg2l6bp3doeadm98kaffmjr30qnq0', 'super.admin', NULL),
(23, '2pndg2l6bp3doeadm98kaffmjr30qnq0', 'super.admin', NULL),
(24, 'fbr1440coivavjvmmpfk90qo3vg0k7ua', 'super.admin', NULL),
(25, '3n664rchs333h55dlmsr9nlfok6ipqu2', 'super.admin', NULL),
(26, 'af3l5kss73lotmgk4e2ib2ri9gc98k61', 'super.admin', NULL),
(27, 'utq4868dktm66e6usj44hrh5dklmero8', 'super.admin', NULL),
(28, 'od7h7a1a2ejt81ef2k9qa80nqclgat8c', 'super.admin', NULL),
(29, 'h1464rodsm8k2ie3pha4qg8qa39vd3e2', 'super.admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` longtext,
  `price` decimal(18,2) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `stock_quantity` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `title`, `description`, `price`, `category_id`, `stock_quantity`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '90876hk', 'Heart Shaped Pendant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '36.02', 1, 50, 1, '2019-01-20 12:31:27', '2019-01-20 12:31:29', NULL),
(2, '324563', 'Red Mug', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '56.50', 3, 20, 2, '2019-01-20 12:35:58', '2019-01-20 12:36:01', NULL),
(3, '4367458', 'Red and Sliver Hand Band', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '23.50', 4, 40, 3, '2019-01-20 12:36:54', '2019-01-20 12:36:56', NULL),
(4, '3256568', 'Black Bag', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '45.80', 3, 40, 1, '2019-01-20 12:37:46', '2019-01-20 12:37:48', NULL),
(5, '36548989', 'Brown Belt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '70.50', 4, 50, 2, '2019-01-20 12:38:27', '2019-01-20 12:38:28', NULL),
(6, '43676864', 'Kitchen Gift pack ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '45.30', 2, 50, 3, '2019-01-28 10:40:17', '2019-01-28 10:40:21', NULL),
(7, '542872452', 'White Jewellery Set', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '28.00', 1, 20, 1, '2019-01-28 10:41:58', '2019-01-28 10:42:01', NULL),
(8, '78676969', 'Face mask pack', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '108.50', 3, 40, 2, '2019-01-28 10:43:31', '2019-01-28 10:43:34', NULL),
(9, '5641369626', 'Spa Gift Pack', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '104.10', 4, 20, 3, '2019-01-28 10:44:51', '2019-01-28 10:44:54', NULL),
(10, '35465488', 'Chocolates', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pharetra eget lorem u', '80.40', 1, 30, 1, '2019-01-28 10:48:46', '2019-01-28 10:48:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `file_path` text,
  `file_ext` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `file_path`, `file_ext`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/product1.jpg', 'jpg', '2019-01-20 18:08:16', '2019-01-20 18:08:17'),
(2, 2, 'images/product2.jpg', 'jpg', '2019-01-20 18:09:27', '2019-01-20 18:09:28'),
(3, 3, 'images/product3.jpg', 'jpg', '2019-01-20 18:09:52', '2019-01-20 18:09:53'),
(4, 4, 'images/product4.jpg', 'jpg', '2019-01-20 18:10:05', '2019-01-20 18:10:06'),
(5, 5, 'images/product5.jpg', 'jpg', '2019-01-20 18:10:20', '2019-01-20 18:10:21'),
(6, 6, 'images/product6.jpg', 'jpg', '2019-01-28 10:45:38', '2019-01-28 10:45:39'),
(7, 7, 'images/product7.jpg', 'jpg', '2019-01-28 10:45:55', '2019-01-28 10:45:56'),
(8, 8, 'images/product8.jpg', 'jpg', '2019-01-28 10:46:22', '2019-01-28 10:46:23'),
(9, 9, 'images/product9.jpg', 'jpg', '2019-01-28 10:46:37', '2019-01-28 10:46:38'),
(10, 10, 'images/product10.jpg', 'jpg', '2019-01-28 10:48:03', '2019-01-28 10:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `timestamp`, `created_at`) VALUES
(3, 'Asheni Perera', 'ashenikaperera@gmail.com', NULL, '2019-01-23 04:32:25'),
(4, 'asheni', 'ash7perera@gmail.com', NULL, '2019-01-23 18:23:54'),
(6, 'Asheni Perera', 'ash7perera@gmail.com', NULL, '2019-01-29 18:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `wishlist_name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `session_id`, `wishlist_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'My Wishlist', 'wishlist desc', '2019-01-23 04:28:51', NULL),
(2, 2, 3, 'wishlist2', 'wishlist desc2', '2019-01-23 04:30:16', NULL),
(3, 3, 0, 'wishlist3', 'wishlist desc3', '2019-01-23 04:32:25', NULL),
(4, 4, 0, 'wishlist3', 'wishlist desc2', '2019-01-23 18:23:54', NULL),
(5, 5, 0, 'My Wishlist', 'My own Wishlist for special occasions', '2019-01-29 17:31:39', NULL),
(6, 6, 0, 'My Wishlist', 'My wishlist desc', '2019-01-29 18:00:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `added_products`
--
ALTER TABLE `added_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_user`
--
ALTER TABLE `auth_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity` (`last_activity`);

--
-- Indexes for table `created_wishlists`
--
ALTER TABLE `created_wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `added_products`
--
ALTER TABLE `added_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `auth_user`
--
ALTER TABLE `auth_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `created_wishlists`
--
ALTER TABLE `created_wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

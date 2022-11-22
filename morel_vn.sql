-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2022 at 08:15 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `morel_vn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`, `name`) VALUES
(1, 'admin', '51b5058a9c60a33da0c9fcbc5fecbdfd', 0, 'Thanh NC'),
(2, 'lasertechvn', '8f92f83d446e801ba11fc0e2fa161c4e', 0, 'lasertechvn');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product`
--

CREATE TABLE `catalog_product` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_desc` varchar(500) NOT NULL,
  `social_image_link` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `image_link` text NOT NULL,
  `social_image_link` text NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `catalog_id` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_desc` varchar(500) NOT NULL,
  `image_link` text NOT NULL,
  `image_list` text NOT NULL,
  `social_image_link` text NOT NULL,
  `price_and_option` text NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE `site_info` (
  `id` int(11) NOT NULL,
  `site_title` text COLLATE utf8_unicode_ci NOT NULL,
  `site_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `site_key` text COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_2` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8_unicode_ci NOT NULL,
  `insta` text COLLATE utf8_unicode_ci NOT NULL,
  `gplus` text COLLATE utf8_unicode_ci NOT NULL,
  `messenger` text COLLATE utf8_unicode_ci NOT NULL,
  `zalo` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`id`, `site_title`, `site_desc`, `site_key`, `address`, `email`, `phone`, `phone_2`, `facebook`, `youtube`, `insta`, `gplus`, `messenger`, `zalo`) VALUES
(1, 'Bonbaby - ChuyĂªn cung cáº¥p Bá»‰m Quáº§n, TĂ£ DĂ¡n vĂ  cĂ¡c váº­t dung cho máº¹ vĂ  bĂ©', 'Bonbaby.vn lĂ  thÆ°Æ¡ng hiá»‡u cá»§a cĂ´ng ty TNHH Äáº§u tÆ° thÆ°Æ¡ng máº¡i vĂ  XNK Tráº§n Gia. LĂ  Ä‘Æ¡n vá»‹ cung cáº¥p cĂ¡c sáº£n pháº©m cao cáº¥p Ä‘á»™c quyá»n táº¡i Viá»‡t Nam  cĂ¡c sáº£n pháº©m : tĂ£ bá»‰m Bonbaby , bÄƒng vá»‡ sinh Dr Bond Lady, nÆ°á»›c máº¯m tráº» em Kapok, vĂ  cĂ¡c sáº£n pháº©m cá»§a Bonbaby. ', 'Bonbaby, bá»‰m bonbaby, bá»‰m, tĂ£ bá»‰m, tĂ£, bÄƒng vá»‡ sinh dr bond lady, dr bond lady, bÄƒng vá»‡ sinh, bÄƒng vá»‡ sinh cao cáº¥p, bá»‰m cao cáº¥p', 'Phá»‘ Má»›i Thanh HoĂ i, Thanh KhÆ°Æ¡ng, Thuáº­n ThĂ nh, Báº¯c Ninh', 'bondiapers@gmail.com', ' 0353.30.4994', ' 0969.591.539', 'https://www.facebook.com/Bonbaby.vn/', 'https://www.youtube.com/channel/UCSfnDCKLeK24f06y28lUoLA', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `catalog_product`
--
ALTER TABLE `catalog_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `type` (`type`);
ALTER TABLE `news` ADD FULLTEXT KEY `name` (`name`,`meta_desc`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_order` (`sort_order`),
  ADD KEY `catalog_id` (`catalog_id`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`,`meta_desc`,`meta_key`);

--
-- Indexes for table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catalog_product`
--
ALTER TABLE `catalog_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

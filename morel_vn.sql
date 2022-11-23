-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2022 lúc 05:14 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `morel_vn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`, `name`) VALUES
(1, 'admin', '51b5058a9c60a33da0c9fcbc5fecbdfd', 0, 'Thanh NC'),
(2, 'lasertechvn', '8f92f83d446e801ba11fc0e2fa161c4e', 0, 'lasertechvn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog_product`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('o9596af6nvk0g7pf4dbnrifsop4pdikd', '::1', 1669219335, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393231393333353b),
('rqp4ii1kpkod36f7pj6u6gm5dkmg9lhj', '::1', 1669219640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393231393634303b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b),
('f3pp4glt1nvnjvrnj80tf9kjk431k9go', '::1', 1669219957, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393231393935373b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b),
('hiejmn4mfk03mhnsi1fl6qhdk5uc85eo', '::1', 1669220035, 0x5f5f63695f6c6173745f726567656e65726174657c693a313636393231393935373b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a33383a224368e1bb896e682073e1bbad612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d6c6f67696e7c623a313b);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_info`
--

CREATE TABLE `site_info` (
  `id` int(11) NOT NULL,
  `site_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_key` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `phone_2` text NOT NULL,
  `facebook` text NOT NULL,
  `youtube` text NOT NULL,
  `insta` text NOT NULL,
  `gplus` text NOT NULL,
  `messenger` text NOT NULL,
  `zalo` text NOT NULL,
  `social_image_link` text NOT NULL,
  `scripts_total_site` text NOT NULL,
  `script_verified_site_in_body` text NOT NULL,
  `scripts_conversation` text NOT NULL,
  `google_map` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `site_info`
--

INSERT INTO `site_info` (`id`, `site_title`, `meta_desc`, `meta_key`, `address`, `email`, `phone`, `phone_2`, `facebook`, `youtube`, `insta`, `gplus`, `messenger`, `zalo`, `social_image_link`, `scripts_total_site`, `script_verified_site_in_body`, `scripts_conversation`, `google_map`) VALUES
(1, 'Morel Việt Nam', 'Bonbaby.vn lĂ  thÆ°Æ¡ng hiá»‡u cá»§a cĂ´ng ty TNHH Äáº§u tÆ° thÆ°Æ¡ng máº¡i vĂ  XNK Tráº§n Gia. LĂ  Ä‘Æ¡n vá»‹ cung cáº¥p cĂ¡c sáº£n pháº©m cao cáº¥p Ä‘á»™c quyá»n táº¡i Viá»‡t Nam  cĂ¡c sáº£n pháº©m : tĂ£ bá»‰m Bonbaby , bÄƒng vá»‡ sinh Dr Bond Lady, nÆ°á»›c máº¯m tráº» em Kapok, vĂ  cĂ¡c sáº£n pháº©m cá»§a Bonbaby. ', 'Bonbaby, bá»‰m bonbaby, bá»‰m, tĂ£ bá»‰m, tĂ£, bÄƒng vá»‡ sinh dr bond lady, dr bond lady, bÄƒng vá»‡ sinh, bÄƒng vá»‡ sinh cao cáº¥p, bá»‰m cao cáº¥p', 'Phá»‘ Má»›i Thanh HoĂ i, Thanh KhÆ°Æ¡ng, Thuáº­n ThĂ nh, Báº¯c Ninh', 'bondiapers@gmail.com', ' 0353.30.4994', ' 0969.591.539', 'https://www.facebook.com/Bonbaby.vn/', 'https://www.youtube.com/channel/UCSfnDCKLeK24f06y28lUoLA', '', '', '', '', '', '', '', '', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `catalog_product`
--
ALTER TABLE `catalog_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Chỉ mục cho bảng `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `type` (`type`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `type` (`type`);
ALTER TABLE `news` ADD FULLTEXT KEY `name` (`name`,`meta_desc`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `sort_order` (`sort_order`),
  ADD KEY `catalog_id` (`catalog_id`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`,`meta_desc`,`meta_key`);

--
-- Chỉ mục cho bảng `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `catalog_product`
--
ALTER TABLE `catalog_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

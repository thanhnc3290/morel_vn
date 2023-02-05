-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 05, 2023 lúc 03:51 PM
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
  `google_map` text NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `relate_title_1` varchar(255) NOT NULL,
  `relate_title_2` varchar(255) NOT NULL,
  `relate_product_list` text NOT NULL,
  `relate_banner_image` text NOT NULL,
  `relate_banner_link` text NOT NULL,
  `relate_banner_link_2` text NOT NULL,
  `relate_banner_link_3` text NOT NULL,
  `relate_banner_link_4` text NOT NULL,
  `relate_banner_link_5` text NOT NULL,
  `relate_banner_image_2` text NOT NULL,
  `relate_banner_image_3` text NOT NULL,
  `relate_banner_image_4` text NOT NULL,
  `relate_banner_image_5` text NOT NULL,
  `relate_banner_image_mobile` text NOT NULL,
  `relate_banner_image_2_mobile` text NOT NULL,
  `relate_banner_image_3_mobile` text NOT NULL,
  `relate_banner_image_4_mobile` text NOT NULL,
  `tech_title_1` varchar(255) NOT NULL,
  `tech_title_2` varchar(255) NOT NULL,
  `tech_title_3` varchar(255) NOT NULL,
  `tech_title_4` varchar(255) NOT NULL,
  `tech_desc_1` varchar(255) NOT NULL,
  `tech_desc_2` varchar(255) NOT NULL,
  `tech_desc_3` varchar(255) NOT NULL,
  `tech_desc_4` varchar(255) NOT NULL,
  `currency_vnd` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `site_info`
--

INSERT INTO `site_info` (`id`, `site_title`, `meta_desc`, `meta_key`, `address`, `email`, `phone`, `phone_2`, `facebook`, `youtube`, `insta`, `gplus`, `messenger`, `zalo`, `social_image_link`, `scripts_total_site`, `script_verified_site_in_body`, `scripts_conversation`, `google_map`, `video_title`, `video_id`, `relate_title_1`, `relate_title_2`, `relate_product_list`, `relate_banner_image`, `relate_banner_link`, `relate_banner_link_2`, `relate_banner_link_3`, `relate_banner_link_4`, `relate_banner_link_5`, `relate_banner_image_2`, `relate_banner_image_3`, `relate_banner_image_4`, `relate_banner_image_5`, `relate_banner_image_mobile`, `relate_banner_image_2_mobile`, `relate_banner_image_3_mobile`, `relate_banner_image_4_mobile`, `tech_title_1`, `tech_title_2`, `tech_title_3`, `tech_title_4`, `tech_desc_1`, `tech_desc_2`, `tech_desc_3`, `tech_desc_4`, `currency_vnd`) VALUES
(1, 'Morel Việt Nam', 'á', 'tedFeaghp_8', '29 ấu triệu', 'bondiapers@gmail.com', ' 0353.30.4994', ' 0969.591.539', 'https://www.facebook.com/Bonbaby.vn/', 'https://www.youtube.com/channel/UCSfnDCKLeK24f06y28lUoLA', '', '', '', '', '', '', '', '', '', 'Câu Chuyện của Morel', 'tedFeaghp_8', 'Giải Phóng Âm Nhạc', 'KHÁM PHÁ SẢN PHẨM CỦA CHÚNG TÔI', '[\"2\",\"1\"]', 'san-pham-tieu-bieu1.jpg', '#', '#', '#', '#', '', 'san-pham-tieu-bieu-2.jpg', 'san-pham-tieu-bieu-3.jpg', 'san-pham-tieu-bieu-41.jpg', '', 'banner_1_mobile.jpg', 'san-pham-tieu-bieu-21.jpg', 'banner_3_mobile.jpg', '', 'Chất lượng cao', 'Công nghệ tiên tiến', 'Âm thanh hoàn hảo', 'Chế Tạo thủ công', 'Thiết kế nội bộ, R&D và sản xuất tất cả dưới một mái nhà cho phép chúng tôi cung cấp chất lượng cao cấp chưa từng có.', 'Vật liệu tiên tiến, kinh nghiệm kỹ thuật rộng lớn và bí quyết giới thiệu những bước đột phá trong thiết kế để xác định các tiêu chuẩn mới', 'Chỉ cần lắng nghe và đắm chìm trong âm thanh phong phú, tự nhiên, biến các bản ghi âm thành các buổi biểu diễn “trực tiếp”', 'Để tạo ra chiếc loa hoàn hảo cần có sự tiếp xúc của con người. Tinh chỉnh vô tận và thử nghiệm nghiêm ngặt của chúng tôi đảm bảo các tiêu chuẩn cao nhất', 25000);

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

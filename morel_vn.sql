-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 14, 2023 lúc 12:54 PM
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
(1, 'admin', '51b5058a9c60a33da0c9fcbc5fecbdfd', 0, 'Thanh NC');

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
  `social_image_link` text NOT NULL,
  `redirect_link` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog_product`
--

INSERT INTO `catalog_product` (`id`, `status`, `parent_id`, `sort_order`, `name`, `alias`, `meta_key`, `meta_desc`, `social_image_link`, `redirect_link`) VALUES
(1, 0, 0, 1, 'Car Audio', 'car-audio', 'morel, Car Audio morel, âm thanh xe hơi morel', 'Nổi tiếng về độ chính xác và khả năng tái tạo âm thanh sống động. Morel đáp ứng mọi nhu cầu về âm thanh xe hơi với các công nghệ độc đáo giúp khắc phục những hạn chế về âm thanh của môi trường ô tô. Tận hưởng sự phấn khích của âm nhạc “sống” ngay cả khi bạn đang ngồi sau tay lái.', 'social-1.jpg', ''),
(2, 0, 1, 1, 'Resolution', 'resolution', 'Resolution, morel giải pháp âm thanh', 'Được thiết kế để tái tạo âm nhạc theo tiêu chuẩn chính xác nhất', 'thumb6.jpg', ''),
(4, 0, 1, 2, 'Reference', 'reference', 'Reference, morel Reference', 'Được thành lập vào năm 1975, Morel là nhà sản xuất loa cao cấp sản xuất thủ công các loa từng đoạt giải thưởng và trình điều khiển thô trong nhà cho thị trường âm thanh gia đình và xe hơi, hãy UNLEASH THE MUSIC với chúng tôi.', 'thumb8.jpg', ''),
(5, 0, 4, 2, 'Elate', 'elate', 'Elate, morel Elate', 'Được thành lập vào năm 1975, Morel là nhà sản xuất loa cao cấp sản xuất thủ công các loa từng đoạt giải thưởng và trình điều khiển thô trong nhà cho thị trường âm thanh gia đình và xe hơi, hãy UNLEASH THE MUSIC với chúng tôi.', '', ''),
(6, 0, 4, 3, 'Hybrid', 'hybrid', 'Hybrid, Morel Hybrid', 'Được thành lập vào năm 1975, Morel là nhà sản xuất loa cao cấp sản xuất thủ công các loa từng đoạt giải thưởng và trình điều khiển thô trong nhà cho thị trường âm thanh gia đình và xe hơi, hãy UNLEASH THE MUSIC với chúng tôi.', '', ''),
(7, 0, 2, 1, 'Supremo', 'supremo', 'supremo', 'supremo', 'thumb11.jpg', '#'),
(8, 0, 2, 2, '38 LE', '38-le', '38 LE', '38 LE', 'thumb12.jpg', '#'),
(9, 0, 2, 3, 'Ultimo Titanium Subwoofer', 'ultimo-titanium-subwoofer', 'Ultimo Titanium Subwoofer', 'Ultimo Titanium Subwoofer', 'thumb13.jpg', '#'),
(10, 0, 4, 1, 'MPS Limited Amplifiers', 'mps-limited-amplifiers', 'MPS Limited Amplifiers', 'MPS Limited Amplifiers', 'thumb14.jpg', '#'),
(11, 0, 4, 4, 'Virtus', 'virtus', 'Virtus, Morel Virtus', 'Virtus', 'thumb15.jpg', ''),
(12, 0, 4, 5, 'Ultimo Ti SC subwoofer', 'ultimo-ti-sc-subwoofer', 'Ultimo Ti SC subwoofer, morel Ultimo Ti SC subwoofer', 'Ultimo Ti SC subwoofer', 'thumb16.jpg', ''),
(13, 0, 1, 3, 'Performence', 'performence', 'Performence, morel Performence', 'Tất cả các ưu điểm và âm thanh của Morel trong các gói giá cả phải chăng', 'thumb17.jpg', ''),
(14, 0, 13, 1, 'MPS Amplifiers', 'mps-amplifiers', 'MPS Amplifiers, MPS Amplifiers morel', 'MPS Amplifiers', 'thumb18.jpg', '#'),
(15, 0, 13, 2, 'Tempo Ultra 2-way MKII', 'tempo-ultra-2-way-mkii', 'Tempo Ultra 2-way MKII, morel Tempo Ultra 2-way MKII', 'Tempo Ultra 2-way MKII', 'thumb19.jpg', ''),
(16, 0, 13, 3, 'Tempo Ultra 2-way', 'tempo-ultra-2-way', 'Tempo Ultra 2-way, morel Tempo Ultra 2-way', 'Tempo Ultra 2-way', '', '#'),
(17, 0, 13, 4, 'Tempo Ultra Integra', 'tempo-ultra-integra', 'Tempo Ultra Integra, morel Tempo Ultra Integra', 'Tempo Ultra Integra', 'thumb21.jpg', '#'),
(18, 0, 13, 5, 'Tempo 2-way', 'tempo-2-way', 'Tempo 2-way, Tempo 2-way morel', 'Tempo 2-way', 'thumb22.jpg', '#'),
(19, 0, 13, 6, 'Maximo Ultra MKII', 'maximo-ultra-mkii', 'Maximo Ultra MKII, morel Maximo Ultra MKII', 'Maximo Ultra MKII', 'thumb23.jpg', '#'),
(20, 0, 13, 7, 'Maximo Ultra Coax MKII', 'maximo-ultra-coax-mkii', 'Maximo Ultra Coax MKII, Maximo Ultra Coax MKII morel', 'Maximo Ultra Coax MKII', 'thumb24.jpg', '#'),
(21, 0, 13, 8, 'Maximo Ultra 602HE MKII', 'maximo-ultra-602he-mkii', 'Maximo Ultra 602HE MKII, morel Maximo Ultra 602HE MKII', 'Maximo Ultra 602HE MKII', 'thumb25.jpg', '#'),
(22, 0, 13, 9, 'Maximus 602 V2', 'maximus-602-v2', 'Maximus 602 V2,  Maximus 602 V2 morel', 'Maximus 602 V2', 'thumb26.jpg', '#'),
(23, 0, 13, 10, 'CCWR254', 'ccwr254', 'CCWR254, CCWR254 morel', 'CCWR254', 'thumb27.jpg', '#'),
(24, 0, 13, 11, 'Primo subwoofer', 'primo-subwoofer', 'Primo subwoofer, Primo subwoofer morel', 'Primo subwoofer', 'thumb28.jpg', '#'),
(25, 0, 1, 4, 'Integration', 'integration', 'Integration, morel Integration', 'Integration', 'thumb29.jpg', ''),
(26, 0, 25, 1, 'BMW', 'bmw', 'BMW', 'BMW', 'thumb30.jpg', ''),
(27, 0, 1, 9, 'Acudamp', 'acudamp', 'Acudamp', 'Acudamp', 'thumb31.jpg', ''),
(28, 0, 27, 1, 'Acudamp MAT 221.10', 'acudamp-mat-221-10', 'Acudamp MAT 221.10', 'Acudamp MAT 221.10', 'thumb32.jpg', '#'),
(29, 0, 27, 2, 'Acudamp MAT 227.8', 'acudamp-mat-227-8', 'Acudamp MAT 227.8', 'Acudamp MAT 227.8', 'thumb33.jpg', '#'),
(30, 0, 27, 3, 'Acudamp MAT 345.5', 'acudamp-mat-345-5', 'Acudamp MAT 345.5', 'Acudamp MAT 345.5', '', '#'),
(31, 0, 27, 4, 'Acudamp MAT SPK6', 'acudamp-mat-spk6', 'Acudamp MAT SPK6', 'Acudamp MAT SPK6', 'thumb35.jpg', '#'),
(32, 0, 0, 2, 'LIFESTYLE', 'lifestyle', 'LIFESTYLE', 'LIFESTYLE', 'thumb36.jpg', ''),
(33, 0, 32, 1, 'Högtalare', 'hogtalare', 'Högtalare', 'Högtalare', 'thumb37.jpg', '#'),
(34, 0, 32, 2, 'Nomadic Audio Speakase II', 'nomadic-audio-speakase-ii', 'Nomadic Audio Speakase II', 'Nomadic Audio Speakase II', 'thumb38.jpg', '#'),
(35, 0, 0, 3, 'Hifi Stereo', 'hifi-stereo', 'Hifi Stereo', 'Hifi Stereo', 'thumb39.jpg', ''),
(36, 0, 35, 1, 'Fat Lady', 'fat-lady', 'Fat Lady', 'Fat Lady', 'thumb40.jpg', '#'),
(37, 0, 35, 2, 'Sopran', 'sopran', 'Sopran', 'Sopran', 'thumb41.jpg', '#'),
(38, 0, 35, 3, 'Octave Limited Edition', 'octave-limited-edition', 'Octave Limited Edition', 'Octave Limited Edition', 'thumb42.jpg', '#'),
(39, 0, 35, 4, 'Octave Signature Bookshelf', 'octave-signature-bookshelf', 'Octave Signature Bookshelf', 'Octave Signature Bookshelf', 'thumb44.jpg', '#'),
(40, 0, 0, 4, 'Home Theater', 'home-theater', 'Home Theater', 'Home Theater', 'thumb45.jpg', ''),
(41, 0, 40, 1, 'SoundSpot', 'soundspot', 'SoundSpot', 'SoundSpot', 'thumb46.jpg', ''),
(43, 0, 0, 5, 'Custom Integration', 'custom-integration', 'Custom Integration', 'Custom Integration', 'thumb48.jpg', ''),
(44, 0, 43, 1, 'SoundWall', 'soundwall', 'SoundWall', 'SoundWall', 'thumb49.jpg', ''),
(45, 0, 43, 2, 'Breez Products', 'breez-products', 'Breez Products', 'Breez Products', 'thumb50.jpg', ''),
(46, 0, 0, 6, 'Raw Drivers', 'raw-drivers', 'Raw Drivers', 'Raw Drivers', 'thumb51.jpg', ''),
(47, 0, 46, 1, 'Slim', 'slim', 'Slim', 'Slim', 'thumb52.jpg', ''),
(48, 0, 46, 2, 'Integra', 'integra', 'Integra', 'Integra', 'thumb53.jpg', ''),
(49, 0, 46, 3, 'Titanium Former', 'titanium-former', 'Titanium Former', 'Titanium Former', 'thumb54.jpg', ''),
(50, 0, 46, 4, 'Supreme', 'supreme', 'Supreme', 'Supreme', 'thumb55.jpg', ''),
(51, 0, 46, 5, 'Elite', 'elite', 'Elite', 'Elite', 'thumb56.jpg', ''),
(52, 0, 46, 6, 'Classic Advanced', 'classic-advanced', 'Classic Advanced', 'Classic Advanced', 'thumb57.jpg', ''),
(53, 0, 46, 7, 'Classic', 'classic', 'Classic', 'Classic', 'thumb58.jpg', ''),
(54, 0, 46, 8, 'Ultimate Subwoofer', 'ultimate-subwoofer', 'Ultimate Subwoofer', 'Ultimate Subwoofer', 'thumb59.jpg', '');

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
('rbab6et4pks6kk8b1ehn5cisir5ksf0b', '::1', 1676359357, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363335393335373b),
('8p1klcfntf3d4k69jb8b3n4l84cjappm', '::1', 1676359946, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363335393934363b),
('7buhps9pvgdduksr5o8ak9irg2f209lo', '::1', 1676360491, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336303439313b),
('a007nd9igvi16m8gnjv824h4o0pah6h3', '::1', 1676360835, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336303833353b),
('tdorjps86as0pepdn8ehnpsrq9574mqr', '::1', 1676361298, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336313239383b),
('k177gu82dmtq6j7a5q6n2mjh05o4m6uc', '::1', 1676361754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336313735343b),
('0eantvrjbjkucm3th27tirlctb69vt1t', '::1', 1676362299, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336323239393b),
('skq0oi5ftdu7u02g3bkjp7rnkskma0u7', '::1', 1676362635, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336323633353b),
('2oeohq931iub5m289416hgtb0u01caf0', '::1', 1676363272, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336333237323b),
('773sqjsmb73qkgjbhpa84dj2urvihi2d', '::1', 1676363622, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336333632323b),
('g1dtii6hagc3tic4m3pm7kjj620g8sc6', '::1', 1676363931, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336333933313b),
('tt7cuaog3p03f311f4mcv6964bso4abe', '::1', 1676364500, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336343530303b),
('nkhhs1jnmmbn9ggj70bf7724a6ijm12i', '::1', 1676364884, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336343838343b),
('qq08a28fgu1d2c4t8un9hlm6i7fa5us9', '::1', 1676365234, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336353233343b),
('bq5v0n988r6kmmoi2qvtqk0f9kmej316', '::1', 1676365542, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336353534323b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b),
('37vqs14b6rd80fgj0b500pke2ktdtue2', '::1', 1676365858, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336353835383b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('gbiqhofba44grf65r3l00fep6f98ncru', '::1', 1676366168, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336363136383b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('um3rh67fhqacpie874u0kvr356749lol', '::1', 1676366509, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336363530393b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('nges41vsrenhmbjhkvugvrkvtlhqj2ub', '::1', 1676366810, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336363831303b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('p4cn6aopoh6p9ji4uu2ip17a9s4tpk1o', '::1', 1676367208, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336373230383b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('6lftvj0724ftlcb9ci0cqeefiqp32smf', '::1', 1676367554, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336373535343b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('n196kh721d3tjmtpoc4r884lhqibsd4p', '::1', 1676368172, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336383137323b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('t2d8918d50402vbo2q75hsrgdat2mn7n', '::1', 1676368608, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336383630383b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('bn0uoanlp6nkjiqpbpom84penp660ppq', '::1', 1676368940, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336383934303b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('m0d0hmnutur31pdlmgd0d5nkp8qe1t5m', '::1', 1676369368, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336393336383b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('7j61hl5o4i9h4qf1njscsngn340h94nu', '::1', 1676369698, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363336393639383b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('k99g0m8n9h49cl2v5p7esn9ku1sc1sdr', '::1', 1676370006, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337303030363b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('7bc7ureijj1pceqsd6rl1juapt4u3aq2', '::1', 1676370312, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337303331323b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('s5tjchrefc63cd9e16pibh4lp2b5pa08', '::1', 1676370777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337303737373b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('120kq652fuhp4p6bpnofa2h1cqj55tv2', '::1', 1676371584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337313538343b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('0nj9k7mm3she0tb2a06abdej3gnr1og0', '::1', 1676371885, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337313838353b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('gdu3tldr89mqhkeplmqlpl99e07t1vih', '::1', 1676372243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337323234333b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('17h8m373t5r4gek2oe83f01frb1924n2', '::1', 1676372566, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337323536363b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('b2mni8qu5vf48jtie9b86o4p1asu7mvv', '::1', 1676372925, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337323932353b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('vufllbplqmt85kds94hlibeevsah46ta', '::1', 1676373249, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337333234393b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('o5j0h3t0dvuc4531lc9614iv6dujegv6', '::1', 1676373555, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337333535353b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('8mvee5bjnhfqh6tctgt8kvk8untcqku7', '::1', 1676373875, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337333837353b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('02eji3ju2rlqadfqnvnnqicaf1n3pk35', '::1', 1676374205, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337343230353b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('i8klkj6au61a3s97ekiqs687b05g8hhj', '::1', 1676375023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337353032333b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('h8p2gi894grivtvf65nm6mte22ffb8jq', '::1', 1676374575, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337343536313b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('op6oim1fhaqkcl30la3b6dbfga4ocv6b', '::1', 1676375345, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337353334353b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('bqnrnatmo57gk2co961j7ukpidub550e', '::1', 1676375593, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637363337353334353b6c6f67696e7c623a313b757365725f6e616d657c733a353a2261646d696e223b69647c733a313a2231223b67726f75705f69647c4e3b6e616d657c733a383a225468616e68204e43223b6d6573736167657c733a32393a2258c3b3612064e1bbaf206c69e1bb8775207468c3a06e682063c3b46e67223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d);

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
  `sort_order` int(3) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `image_link` text NOT NULL,
  `social_image_link` text NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `status`, `sort_order`, `name`, `alias`, `meta_key`, `meta_desc`, `image_link`, `social_image_link`, `content`) VALUES
(1, 0, 0, 'Nâng cấp loa Elate!', 'nang-cap-loa-elate-', 'Nâng cấp loa Elate!', 'Loa 2 chiều Elate của Morel được nâng cấp bởi Unique Car Sound & Security.\r\n\r\n', 'blog-12.jpg', 'blog-13.jpg', '<p>Loa 2 chiều Elate của Morel được n&acirc;ng cấp bởi Unique Car Sound &amp; Security.</p>\r\n\r\n<p>Họ đ&atilde; thay thế hệ thống Bose / B&amp;O bằng bộ c&ocirc;ng suất cao, &acirc;m nhạc v&agrave; năng động của Morel&#39;s Elate.</p>\r\n\r\n<p>Họ tuy&ecirc;n bố &quot;Độ r&otilde; r&agrave;ng v&agrave; độ s&acirc;u tuyệt vời.&quot;</p>\r\n\r\n<p>Cảm ơn Unique Car Sound &amp; Security đ&atilde; chia sẻ!</p>\r\n'),
(4, 0, 0, 'Giải thưởng SoundWall™ Top Picks Of The Year của Sound & Vision', 'giai-thuong-soundwall-top-picks-of-the-year-cua-sound-vision', 'Giải,thưởng,SoundWall™,Top,Picks,Of,The,Year,của,Sound,&,Vision', 'Tìm hiểu về loa âm tường SoundWall™ của Morel nhận được Giải thưởng Lựa chọn hàng đầu được yêu thích nhất của Ban biên tập bởi tạp chí Sound & Vision năm 2017. ', 'blog-SoundWall™_Top_Picks_Of_The_Year1.png', 'blog-SoundWall™_Top_Picks_Of_The_Year1.png', '<p>Loa âm tường SoundWall™ của Morel vừa nhận được Giải thưởng Lựa chọn hàng đầu được yêu thích nhất của năm của Ban biên tập của tạp chí Sound & Vision.</p><p>Darryl Wilkinson đã đánh giá hệ thống mô-đun soundbar trong tường SoundWall™ LCR4 SW và loa bán vô hình SoundWall™ Surface . </p><p>“Với SoundWall LCR4 SW và SoundWall Surface SH17C, Morel đã tạo ra một loạt loa có thể sử dụng ở nhiều cấu hình và vị trí khác nhau. Hơn nữa, chúng không phô trương và dễ lắp đặt một cách đáng xấu hổ, đồng thời chúng cho âm thanh tuyệt vời, đặc biệt là SH17C, sản phẩm đã thực sự chiếm ưu thế và trở thành—hiện tại—loa âm tường yêu thích mới của tôi.\'</p><h2>Bản án của ông:</h2><p>“Nếu bạn thích sự đơn giản và ghét nhìn thấy loa, nhưng lại yêu cầu hiệu suất cao cho âm nhạc và phim ảnh, những SoundWalls này có thể là thứ bạn đang chờ đợi.\'</p><p></p><p>Đọc đánh giá đầy đủ</p><figure class=\"is-layout-flex wp-block-gallery-1 wp-block-gallery has-nested-images columns-1 is-cropped\"><figure class=\"wp-block-image size-large\"><img decoding=\"async\" width=\"650\" height=\"898\" data-id=\"2164\"  src=\"https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year1.png\" alt=\"\" class=\"wp-image-2164\" srcset=\"https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year1.png 650w,   https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year1-170x235.png 170w,   https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year1-400x553.png 400w,   https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year1-217x300.png 217w\" sizes=\"(max-width: 650px) 100vw, 650px\" /></figure><figure class=\"wp-block-image size-large\"><img decoding=\"async\" loading=\"lazy\" width=\"650\" height=\"253\" data-id=\"2162\"  src=\"https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year2.png\" alt=\"\" class=\"wp-image-2162\" srcset=\"https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year2.png 650w,   https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year2-170x66.png 170w,   https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year2-400x156.png 400w,   https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year2-300x117.png 300w\" sizes=\"(max-width: 650px) 100vw, 650px\" /></figure><figure class=\"wp-block-image size-large\"><img decoding=\"async\" loading=\"lazy\" width=\"650\" height=\"460\" data-id=\"2163\"  src=\"https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year3.jpg\" alt=\"\" class=\"wp-image-2163\" srcset=\"https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year3.jpg 650w,   https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year3-170x120.jpg 170w,   https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year3-400x283.jpg 400w,   https://www.morelhifi.com/wp-content/uploads/2019/10/blog-SoundWall™_Top_Picks_Of_The_Year3-300x212.jpg 300w\" sizes=\"(max-width: 650px) 100vw, 650px\" /></figure></figure><p>SoundWall™ LCR4 SW  và SoundWall™ Surface</p>'),
(5, 0, 0, 'Giải thưởng SoundWall™ Top Picks Of The Year của Sound & Vision', 'giai-thuong-soundwall-top-picks-of-the-year-cua-sound-vision', 'Giải,thưởng,SoundWall™,Top,Picks,Of,The,Year,của,Sound,&,Vision', 'Tìm hiểu về loa âm tường SoundWall™ của Morel nhận được Giải thưởng Lựa chọn hàng đầu được yêu thích nhất của Ban biên tập bởi tạp chí Sound & Vision năm 2017. ', 'blog-SoundWall™_Top_Picks_Of_The_Year1.png', 'blog-SoundWall™_Top_Picks_Of_The_Year1.png', '<p>Loa âm tường SoundWall™ của Morel vừa nhận được Giải thưởng Lựa chọn hàng đầu được yêu thích nhất của năm của Ban biên tập của tạp chí Sound & Vision.</p><p>Darryl Wilkinson đã đánh giá hệ thống mô-đun soundbar trong tường SoundWall™ LCR4 SW và loa bán vô hình SoundWall™ Surface . </p><p>“Với SoundWall LCR4 SW và SoundWall Surface SH17C, Morel đã tạo ra một loạt loa có thể sử dụng ở nhiều cấu hình và vị trí khác nhau. Hơn nữa, chúng không phô trương và dễ lắp đặt một cách đáng xấu hổ, đồng thời chúng cho âm thanh tuyệt vời, đặc biệt là SH17C, sản phẩm đã thực sự chiếm ưu thế và trở thành—hiện tại—loa âm tường yêu thích mới của tôi.\'</p><h2>Bản án của ông:</h2><p>“Nếu bạn thích sự đơn giản và ghét nhìn thấy loa, nhưng lại yêu cầu hiệu suất cao cho âm nhạc và phim ảnh, những SoundWalls này có thể là thứ bạn đang chờ đợi.\'</p><p></p><p>Đọc đánh giá đầy đủ</p><figure class=\"is-layout-flex wp-block-gallery-1 wp-block-gallery has-nested-images columns-1 is-cropped\"><figure class=\"wp-block-image size-large\"><img src=\'../upload/news/blog-SoundWall™_Top_Picks_Of_The_Year1.png\' style=\'width:100%;\' /></figure><figure class=\"wp-block-image size-large\"><img src=\'../upload/news/blog-SoundWall™_Top_Picks_Of_The_Year2.png\' style=\'width:100%;\' /></figure><figure class=\"wp-block-image size-large\"><img src=\'../upload/news/blog-SoundWall™_Top_Picks_Of_The_Year3.jpg\' style=\'width:100%;\' /></figure></figure><p>SoundWall™ LCR4 SW  và SoundWall™ Surface</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `catalog_id` int(11) NOT NULL DEFAULT 0,
  `layout_type` tinyint(1) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_desc` varchar(500) NOT NULL,
  `image_link` text NOT NULL,
  `image_list` text NOT NULL,
  `social_image_link` text NOT NULL,
  `price_and_option` text NOT NULL,
  `content` text NOT NULL,
  `option_name_1` varchar(255) NOT NULL,
  `option_name_2` varchar(255) NOT NULL,
  `option_name_3` varchar(255) NOT NULL,
  `option_name_4` varchar(255) NOT NULL,
  `option_price_1` int(11) NOT NULL,
  `option_price_2` int(11) NOT NULL,
  `option_price_3` int(11) NOT NULL,
  `option_price_4` int(11) NOT NULL,
  `technology_id` text NOT NULL,
  `technology_html` text NOT NULL,
  `specification` text NOT NULL,
  `documentary` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `status`, `catalog_id`, `layout_type`, `sort_order`, `name`, `alias`, `meta_key`, `meta_desc`, `image_link`, `image_list`, `social_image_link`, `price_and_option`, `content`, `option_name_1`, `option_name_2`, `option_name_3`, `option_name_4`, `option_price_1`, `option_price_2`, `option_price_3`, `option_price_4`, `technology_id`, `technology_html`, `specification`, `documentary`) VALUES
(1, 0, 2, 0, 0, 'SUPREMO', 'supremo', 'SUPREMO', 'SUPREMO', '1.jpg', '[\"51.jpg\",\"221.jpg\"]', 'Supremo-Hero-shot.jpg', '', '<p>Chế tạo loa để tr&igrave;nh diễn với độ chi tiết sống động như thật đ&ograve;i hỏi sự s&aacute;ng tạo v&agrave; kiến thức rộng. Morel đ&atilde; ho&agrave;n thiện nghề thủ c&ocirc;ng n&agrave;y trong 45 năm v&agrave; c&aacute;c th&agrave;nh phần v&agrave; hệ thống h&agrave;ng đầu của Supremo đưa độ ph&acirc;n giải cao l&ecirc;n mức chưa từng c&oacute; trong thế giới &ocirc; t&ocirc;. C&ocirc;ng thức n&agrave;y dựa tr&ecirc;n một thiết kế kh&ocirc;ng thỏa hiệp bằng c&aacute;ch sử dụng c&ocirc;ng nghệ tốt nhất của Morel. Loa trầm kết hợp nam ch&acirc;m neodymium mạnh mẽ với cấu tr&uacute;c li&ecirc;n kết động cơ EVC của Morel, cuộn d&acirc;y &acirc;m thanh bằng nh&ocirc;m Hexatech đường k&iacute;nh 3 inch, sợi carbon độc quyền v&agrave; n&oacute;n b&aacute;nh sandwich Rohacell. C&aacute;c chi tiết tần số cao đến từ loa tweeter Supremo Piccolo tuyệt đẹp, được ca ngợi tr&ecirc;n to&agrave;n thế giới v&igrave; phản hồi chi tiết v&agrave; mở v&ocirc; song. Ngay cả những người đam m&ecirc; &acirc;m thanh s&agrave;nh điệu nhất cũng sẽ thấy m&igrave;nh bị quyến rũ bởi Supremo.</p>\r\n', '6&quot; 2-way', '6&quot; 2-way Active', '', '', 4799, 5499, 0, 0, '[\"6\",\"5\",\"4\",\"3\",\"2\",\"1\"]', '', '<table>\r\n	<thead>\r\n		<tr>\r\n			<th>Model</th>\r\n			<th>Size &amp; Configuration</th>\r\n			<th>Power</th>\r\n			<th>Sensitivity</th>\r\n			<th>Frequency Response</th>\r\n			<th>Crossover</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Supremo 602</td>\r\n			<td>6&frac12;&quot; 2-way</td>\r\n			<td>140 / 600</td>\r\n			<td>89</td>\r\n			<td>40-25000</td>\r\n			<td>MXR Supremo</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '[\"Morel-car-audio-catalogue-web1.pdf\",\"Supmreo-specsifications.pdf\",\"Supremo-manual-manual.pdf\"]'),
(2, 0, 40, 2, 0, 'SOLAN SUBWOOFER', 'solan-subwoofer', 'SOLAN SUBWOOFER', 'SOLAN SUBWOOFER', 'product-2-16.jpg', '[\"product-2-23.jpg\"]', 'product-2-17.jpg', '', '<p>Loa si&ecirc;u trầm chủ động Solan c&oacute; c&aacute;c thuộc t&iacute;nh thiết kế giống như tất cả c&aacute;c d&ograve;ng Solan, với v&aacute;ch ngăn ph&iacute;a trước ho&agrave;n thiện bằng piano b&oacute;ng lo&aacute;ng v&agrave; giống như tất cả c&aacute;c sản phẩm của Solan, loa n&agrave;y sử dụng th&ugrave;ng loa c&oacute; lỗ th&ocirc;ng hơi kh&ocirc;ng giảm &acirc;m được ph&eacute;p rung theo c&aacute;ch được kiểm so&aacute;t chặt chẽ để n&oacute; hoạt động ổn định. đồng bộ với đầu ra của bộ truyền động. Được trang bị bộ phận &acirc;m trầm 10&rdquo; được điều khiển bởi bộ khuếch đại c&ocirc;ng suất cao 100W để l&agrave;m phong ph&uacute; c&aacute;c &acirc;m trầm, n&oacute; mang lại khả năng t&iacute;ch hợp &acirc;m thanh liền mạch cho d&ograve;ng Solan.</p>\r\n', '', '', '', '', 0, 0, 0, 0, 'null', '', '<table border=\"0\" class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>Construction</th>\r\n			<th>MDF Vinyl cabinet, coated paint glossy piano finish front baffle</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Dimensions (W x H x D)</td>\r\n			<td>14 &frac12;&quot; x 14&rdquo; x 13&frac14;&quot; (366mm x 360mm X 330mm)</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Drive Units</td>\r\n			<td>One 10&quot; (254mm) woofer</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Frequency Response</td>\r\n			<td>35-160Hz</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Amplifier</td>\r\n			<td>100W, continuous power, all formats compatible with automatic on/off switch, level, crossover, and phase controls.</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Inputs</td>\r\n			<td>Line-level RCA phono jacks high-level bindingpost terminals</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Voltage</td>\r\n			<td>115-230 VAC 50/60Hz with main supply voltage selector</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Finish</td>\r\n			<td>White Pine, Black Ash, Dark wood</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Net Weight</td>\r\n			<td>13.5KG</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '[\"Morel-home-audio-catalogue-2019-low-res3.pdf\",\"Solan-speakers-manual3.pdf\"]'),
(6, 0, 1, 0, 0, ' Elate Carbon 3-Way', '-elate-carbon-3-way', ',Elate,Carbon,3-Way', 'Hệ thống 3 chiều của Elate Carbon được thiết kế dành cho những người muốn có hiệu suất cao nhất nhưng đang tìm kiếm một loa tweeter kín đáo.. ', 'Elate-Carbon-family-1200x1200-1-1024x1024.webp', '[\"Elate-Carbon-family-1024x683.jpg\",\"Elate-Carbon-93-1024x683.jpg\",\"Elate-Carbon-63A-1024x683.jpg\",\"Elate-Carbon-63-1024x683.jpg\",\"Elate-Carbon-53A-1024x683.jpg\",\"Elate-Carbon-53-1024x683.jpg\",\"Elate-Carbon-family-1200x1200-1-300x300.webp\",\"Elate-Carbon-family-300x200.jpg\",\"Elate-Carbon-93-300x200.jpg\",\"Elate-Carbon-63A-300x200.jpg\",\"Elate-Carbon-63-300x200.jpg\",\"Elate-Carbon-53A-300x200.jpg\",\"Elate-Carbon-53-300x200.jpg\",\"Elate-MW9-3D-with-grille-300x300.jpg\",\"MMS-3D-300x300.jpg\",\"MT450-3D-300x300.jpg\",\"MXR380C-300x254.jpg\",\"Elate-Carbon-Pro-Beuty.jpg\"]', 'Elate-Carbon-Pro-Beuty.jpg', '', 'Elate Carbon chia sẻ hầu hết các thành phần cao cấp của nó với các anh chị em Pro của nó, nhưng có cách tiếp cận hợp lý hơn một chútCác hệ thống 2 chiều và 3 chiều này được thiết kế cho những người muốn có hiệu suất cao nhất nhưng đang tìm kiếm một loa tweeter kín đáoThiết kế nhỏ gọn của loa tweeter MT450 cho phép người dùng tùy chọn đặt loa ở hầu hết các vị trí của nhà máy hoặc vào các khu vực hạn chế về không gian bằng cách sử dụng các giá đỡ được cung cấpNó có thể có kích thước nhỏ nhưng vòm lụa phủ Acuflex của MT450, thiết kế khoang mở và động cơ nam châm neodymium kép mang lại cho nó chi tiết đáng kinh ngạc và đáp ứng tần số phẳng, mượt mà.<br />\n<br />\nDải trung nhỏ này sử dụng công nghệ tốt nhất của Morel, bao gồm động cơ EVC, cuộn dây âm thanh đường kính 2,1\' công suất cao và sợi carbon/hình nón Rohacell có độ ẩm cao, cho phép nó phát ở tần số thấp hơn và kiểm soát tốt hơn hầu hết các loa 4,5\'Nó cũng xử lý một số sức mạnh nghiêm trọngCác thuộc tính này cải thiện đáng kể hiệu suất hệ thống đồng thời cho phép chúng phù hợp với hầu hết các vị trí tầm trung của nhà máy.<br />\n<br />\nCho dù sử dụng hệ thống 5,25\', 6,5\' hay 9 inch, mỗi loa trầm đều có động cơ EVC được tối ưu hóa của Klipple với cuộn dây âm thanh đường kính lớn 3 inch và nón bánh sandwich bằng sợi carbon/Rohacell để có độ méo cực thấp và mức xử lý công suất cao.<br />\n<br />\n', '53 5&quot; 3-way', '93A 9&quot; 3-way Active', '', '', 2599, 3328, 0, 0, '', '<div class=\"tech-col\"><div class=\"tech-item term-1\"><div class=\"tech-item-in\" style=\"background-image:url(\'../upload/product/CAR-2300X2000-1024x879.jpg\');\"><div class=\"overlay\"></div><footer class=\"entry-footer\"><h3 class=\"entry-title\"> C.A.R filter</h3>Kháng âm có kiểm soát – C.A.R. </footer></div></div><div class=\"tech-item term-2\"><div class=\"tech-item-in\" style=\"background-image:url( https://www.morelhifi.com/wp-content/uploads/2020/08/Hybrid-double-magnet-2600x2000-1-1024x788.jpg);\"><div class=\"overlay\"></div><footer class=\"entry-footer\"><h3 class=\"entry-title\"> DMM motor</h3>Hệ thống truyền động kép của Morel tạo ra nhiều năng lượng từ trường hơn so với một nam châm đơn có kích thước tương tự, giúp tăng hiệu quả và dải động. </footer></div></div></div><div class=\"tech-col\"><div class=\"tech-item term-3\"><div class=\"tech-item-in\" style=\"background-image:url(\'../upload/product/EVC-gold-cup-2600X2000-1024x770.jpg\');\"><div class=\"overlay\"></div><footer class=\"entry-footer\"><h3 class=\"entry-title\"> EVC motor</h3>Loa Morel với công nghệ EVC™ sử dụng cuộn dây âm thanh lớn hơn tới ba lần so với cuộn dây được sử dụng trong loa thông thường, cho phép cải thiện khả năng tản nhiệt, xử lý công suất và tuyến tính. </footer></div></div></div><div class=\"tech-col\"><div class=\"tech-row\"><div class=\"tech-col\"><div class=\"tech-item term-4\"><div class=\"tech-item-in\" style=\"background-image:url(\'../upload/product/Acuflex-black-back-1024x1024.jpg\');\"><div class=\"overlay\"></div><footer class=\"entry-footer\"><h3 class=\"entry-title\"> Handcrafted Acuflex soft dome</h3>Một hợp chất giảm chấn được thiết kế đặc biệt được áp dụng thủ công cho các vòm mềm, tăng thêm độ cứng và giảm chấn, giúp cải thiện đáng kể độ trong trẻo và dải tần của loa tweeter/dải trung. </footer></div></div></div><div class=\"tech-col\"><div class=\"tech-item term-5\"><div class=\"tech-item-in\" style=\"background-image:url( https://www.morelhifi.com/wp-content/uploads/2020/08/Lotus-2600x2000-1-1024x788.jpg);\"><div class=\"overlay\"></div><footer class=\"entry-footer\"><h3 class=\"entry-title\"> Lotus Grille</h3>Lấy cảm hứng từ hoa Sen, được thiết kế để cung cấp giải pháp âm thanh trong suốt nhằm bảo vệ loa đồng thời mang đến yếu tố thiết kế đẹp mắt. </footer></div></div></div></div><div class=\"tech-row\"><div class=\"tech-item term-6\"><div class=\"tech-item-in\" style=\"background-image:url( https://www.morelhifi.com/wp-content/uploads/2020/08/Hexatech-aluminiumA-2600x2000-4-1024x788.jpg);\"><div class=\"overlay\"></div><footer class=\"entry-footer\"><h3 class=\"entry-title\"> Titanium Voice coil former</h3>Suốt chỉ titan (thân VC) được biết đến với độ cứng cao, trọng lượng nhẹ, đặc tính truyền nhiệt và dẫn điện. </footer></div></div></div></div><div class=\"tech-col\"><div class=\"tech-item term-4\"><div class=\"tech-item-in\" style=\"background-image:url(\'../upload/product/Acuflex-black-back-1024x1024.jpg\');\"><div class=\"overlay\"></div><footer class=\"entry-footer\"><h3 class=\"entry-title\"> Handcrafted Acuflex soft dome</h3>Một hợp chất giảm chấn được thiết kế đặc biệt được áp dụng thủ công cho các vòm mềm, tăng thêm độ cứng và giảm chấn, giúp cải thiện đáng kể độ trong trẻo và dải tần của loa tweeter/dải trung. </footer></div></div></div><div class=\"tech-col\"><div class=\"tech-item term-5\"><div class=\"tech-item-in\" style=\"background-image:url(\'../upload/product/Lotus-2600x2000-1-1024x788.jpg\');\"><div class=\"overlay\"></div><footer class=\"entry-footer\"><h3 class=\"entry-title\"> Lotus Grille</h3>Lấy cảm hứng từ hoa Sen, được thiết kế để cung cấp giải pháp âm thanh trong suốt nhằm bảo vệ loa đồng thời mang đến yếu tố thiết kế đẹp mắt. </footer></div></div></div>', '<div class=\"table-responsive\"><table><thead><th> MODEL</th><th> Size &amp; <br>Configuration</th><th> Power Handling (Wrms) / Peak <br>Power (W)</th><th> Sensitivity(2.83V/1M) <br>(dB)</th><th> Frequency Response<br> (Hz)</th><th> Crossover</th></thead><tbody><tr><td> Elate Carbon 53</td><td> 5¼” 3-way</td><td> 160 / 1000</td><td> 85</td><td> 40-25000</td><td> MXT380C</td></tr><tr><td> Elate Carbon 53A</td><td> 5¼” 3-way</td><td> 160 / 1000</td><td> 85</td><td> 40-25000</td><td></td></tr><tr><td> Elate Carbon 63</td><td> 6½ 3-way</td><td> 180 / 1000</td><td> 87</td><td> 30-25000</td><td> MXT380C</td></tr><tr><td> Elate Carbon 63A</td><td> 6½ 3-way</td><td> 180 / 1000</td><td> 87</td><td> 30-25000</td><td></td></tr><tr><td> Elate Carbon 93</td><td> 8¾ 3-way</td><td> 200 / 1000</td><td> 89</td><td> 25-25000</td><td> MXT380C</td></tr><tr><td> Elate Carbon 93A</td><td> 8¾ 3-way</td><td> 200 / 1000</td><td> 89</td><td> 25-25000</td><td></td></tr></tbody></table></div>', '[\"Morel-car-audio-catalogue-web1.pdf\",\"Elate-carbon-NEW-manual-V2-for-web.pdf\"]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_technology`
--

CREATE TABLE `product_technology` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image_link` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_technology`
--

INSERT INTO `product_technology` (`id`, `name`, `content`, `status`, `image_link`) VALUES
(1, 'C.A.R FILTER', '<p>Kh&aacute;ng &acirc;m c&oacute; kiểm so&aacute;t &ndash; C.A.R. Filter&trade; cải thiện tải &acirc;m thanh bằng c&aacute;ch kiểm so&aacute;t luồng kh&ocirc;ng kh&iacute; b&ecirc;n trong tr&igrave;nh điều khiển, m&ocirc; phỏng hiệu ứng của th&ugrave;ng loa đồng thời cải thiện khả năng xử l&yacute; c&ocirc;ng suất th&ecirc;m 30%. Điều n&agrave;y cung cấp khả năng kiểm so&aacute;t tốt hơn đối với chuyển động h&igrave;nh n&oacute;n để cải thiện độ động của &acirc;m trầm.</p>\r\n', 0, 'cong-nghe-1.jpg'),
(2, 'CARBON FIBER CONE', '<p>Bắt nguồn từ c&aacute;c tr&igrave;nh điều khiển của hệ thống loa fat lady từng đoạt giải thưởng của ch&uacute;ng t&ocirc;i, thiết kế h&igrave;nh n&oacute;n n&agrave;y bao gồm hai lớp vỏ bằng sợi carbon b&ecirc;n ngo&agrave;i kẹp một lớp Rohacell, một loại bọt c&oacute; độ bền cao, nhẹ như l&ocirc;ng vũ. Sự kết hợp n&agrave;y tạo th&agrave;nh một h&igrave;nh n&oacute;n nhẹ, mạnh mẽ v&agrave; được l&agrave;m ẩm ph&ugrave; hợp để t&aacute;i tạo &acirc;m thanh kh&ocirc;ng bị đổi m&agrave;u một c&aacute;ch tự nhi&ecirc;n.</p>\r\n', 0, 'cong-nghe-2.jpg'),
(3, 'DMM MOTOR', '<p>Hệ thống truyền động k&eacute;p của Morel tạo ra nhiều năng lượng từ trường hơn so với một nam ch&acirc;m đơn c&oacute; k&iacute;ch thước tương tự, gi&uacute;p tăng hiệu quả v&agrave; dải động. Vị tr&iacute; của nam ch&acirc;m thứ cấp được cố định ph&iacute;a tr&ecirc;n tấm tr&ecirc;n c&ugrave;ng của m&ocirc;-tơ l&agrave; ch&igrave;a kh&oacute;a để kiểm so&aacute;t từ th&ocirc;ng đi lạc, do đ&oacute; tạo ra từ trường tập trung hơn đồng thời g&oacute;p phần tạo n&ecirc;n đặc t&iacute;nh &ldquo;được che chắn&rdquo; cho loa của ch&uacute;ng t&ocirc;i.</p>\r\n', 0, 'cong-nghe-3.jpg'),
(4, 'EVC MOTOR', '<p>Loa Morel với c&ocirc;ng nghệ EVC&trade; sử dụng cuộn d&acirc;y &acirc;m thanh lớn hơn tới ba lần so với cuộn d&acirc;y được sử dụng trong loa th&ocirc;ng thường, cho ph&eacute;p cải thiện khả năng tản nhiệt, xử l&yacute; c&ocirc;ng suất v&agrave; tuyến t&iacute;nh. Thiết kế EVC&trade; di chuyển hệ thống m&ocirc;-tơ từ t&iacute;nh v&agrave;o b&ecirc;n trong cuộn d&acirc;y &acirc;m thanh, loại bỏ từ th&ocirc;ng đi lạc bằng c&aacute;ch hướng tất cả năng lượng từ t&iacute;nh đến cuộn d&acirc;y &acirc;m thanh một c&aacute;ch hiệu quả. Kiến tr&uacute;c EVC hiệu quả hơn 90% so với thiết kế th&ocirc;ng thường, được bảo vệ bằng từ t&iacute;nh v&agrave; rất nhỏ gọn.</p>\r\n', 0, 'cong-nghe-4.jpg'),
(5, 'HANDCRAFTED ACUFLEX SOFT DOME', '<p>Một hợp chất giảm chấn được thiết kế đặc biệt được &aacute;p dụng thủ c&ocirc;ng cho c&aacute;c v&ograve;m mềm, tăng th&ecirc;m độ cứng v&agrave; giảm chấn, gi&uacute;p cải thiện đ&aacute;ng kể độ trong trẻo v&agrave; dải tần của loa tweeter/dải trung. M&agrave;ng chắn Acuflex&trade; thể hiện khả năng ngắt ngắt c&oacute; kiểm so&aacute;t (uốn cong ch&iacute;nh x&aacute;c), nghĩa l&agrave; mỗi chế độ ngắt được chống lại bởi một chế độ kh&aacute;c theo hướng ngược lại, cho ph&eacute;p đ&aacute;p ứng tần số mượt m&agrave;.</p>\r\n', 0, 'cong-nghe-5.jpg'),
(6, 'LOTUS GRILLE', '<p>Lấy cảm hứng từ hoa Sen, được thiết kế để cung cấp giải ph&aacute;p &acirc;m thanh trong suốt nhằm bảo vệ loa đồng thời mang đến yếu tố thiết kế đẹp mắt. Hoa văn cụ thể giảm thiểu hiệu ứng &ldquo;c&ograve;i&rdquo; c&oacute; trong lưới tản nhiệt truyền thống.</p>\r\n\r\n<p>Lưới tản nhiệt Lotus l&agrave; một thiết kế đ&atilde; đăng k&yacute; bảo vệ t&agrave;i sản tr&iacute; tuệ của Morel.</p>\r\n', 0, 'cong-nghe-6.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `meta_desc` varchar(500) NOT NULL,
  `meta_key` varchar(500) NOT NULL,
  `image_link` text NOT NULL,
  `image_list` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort_order` int(3) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `project`
--

INSERT INTO `project` (`id`, `name`, `alias`, `meta_desc`, `meta_key`, `image_link`, `image_list`, `status`, `sort_order`, `content`) VALUES
(1, 'QUAN HỆ HỢP TÁC THƯƠNG HIỆU MOREL & TUSHEK VÀ SPIGEL', 'quan-he-hop-tac-thuong-hieu-morel--tushek-va-spigel', 'Siêu xe Tushek TS600 mới sử dụng âm thanh độ trung thực cao độc quyền được thiết kế đặc biệt của Morel.', 'QUAN HỆ HỢP TÁC THƯƠNG HIỆU MOREL & TUSHEK VÀ SPIGEL', 'project-1.jpg', '[\"project-2.jpg\",\"project-3.jpg\",\"project-4.jpg\"]', 0, 0, '<p>Si&ecirc;u xe Tushek TS600 mới sử dụng &acirc;m thanh độ trung thực cao độc quyền được thiết kế đặc biệt của Morel.</p>\r\n\r\n<p>DỰ &Aacute;N</p>\r\n\r\n<p>Tận dụng kiến thức s&acirc;u rộng về &acirc;m học v&agrave; c&ocirc;ng nghệ đổi mới của thương hiệu, nh&agrave; sản xuất loa cao cấp nổi tiếng, Morel, đ&atilde; hợp t&aacute;c với Tushek&amp;Spigel Supercars GmbH để ph&aacute;t triển hệ thống &acirc;m thanh độ trung thực cao độc quyền cho si&ecirc;u xe Tushek TS600 sản xuất giới hạn mới.</p>\r\n\r\n<p>&ldquo;Ch&uacute;ng t&ocirc;i nghĩ rằng Morel l&agrave; người xuất sắc trong ph&acirc;n kh&uacute;c của m&igrave;nh với khả năng nhạy cảm đặc biệt để đ&oacute;n nhận những th&aacute;ch thức mới với tư c&aacute;ch l&agrave; nh&agrave; đồng s&aacute;ng tạo của c&ugrave;ng một dự &aacute;n, chia sẻ tầm nh&igrave;n của ch&uacute;ng t&ocirc;i về &#39;Vẻ đẹp của tốc độ&#39; Jacob Carl Spigel.</p>\r\n\r\n<p>MOREL V&Agrave; TUSHEK &amp; SPIGEL</p>\r\n\r\n<p>một nh&agrave; sản xuất si&ecirc;u xe thể thao của &Aacute;o, đ&atilde; được ca ngợi v&igrave; thiết kế hiện đại v&agrave; tham vọng t&iacute;ch hợp một số kỹ thuật v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến nhất v&agrave;o si&ecirc;u xe sợi carbon, trọng lượng nhẹ mới của c&ocirc;ng ty, Tushek TS600. Niềm đam m&ecirc; chung về sự xuất sắc v&agrave; tay nghề thủ c&ocirc;ng l&agrave; động lực chung để cả hai c&ocirc;ng ty tạo ra trải nghiệm l&aacute;i xe đặc biệt.</p>\r\n\r\n<p>TUSHEK TS600</p>\r\n\r\n<p>Tushek T600 sẽ c&oacute; thể chạy tr&ecirc;n 350 km/h mất 0-100 trong 2,9 gi&acirc;y. Si&ecirc;u xe đầu ti&ecirc;n được thiết kế theo cảm x&uacute;c, trong đ&oacute; c&aacute;c m&agrave;n tr&igrave;nh diễn l&agrave; b&iacute; quyết hợp nhất v&agrave; gi&aacute; trị gia tăng của dự &aacute;n n&agrave;y. Với động cơ V8 c&oacute; c&ocirc;ng suất 680 m&atilde; lực v&agrave; m&ocirc;-men xoắn 580 Nm, TS600 được ph&aacute;t triển với trọng lượng nhẹ nhờ c&aacute;c th&agrave;nh phần bằng sợi carbon, titan v&agrave; gốm cho ph&eacute;p trọng lượng chỉ khoảng 1.100 kg. Kh&ocirc;ng c&oacute; sự thỏa hiệp, n&oacute; sẽ l&agrave; si&ecirc;u xe th&iacute;ch ứng với đường trường v&agrave; đường đua d&agrave;nh ri&ecirc;ng cho những kh&aacute;ch h&agrave;ng độc quyền với số lượng sản xuất rất hạn chế.</p>\r\n\r\n<p>38 PHI&Ecirc;N BẢN GIỚI HẠN HIỆU SUẤT &Acirc;M THANH KH&Ocirc;NG BAO GIỜ C&Oacute;</p>\r\n\r\n<p>Hơn 40 năm sản xuất loa, c&ocirc;ng nghệ đầu d&ograve; ti&ecirc;n tiến v&agrave; niềm đam m&ecirc; &acirc;m nhạc đ&atilde; th&uacute;c đẩy Morel x&acirc;y dựng hệ thống Phi&ecirc;n bản giới hạn 38 cải tiến được sử dụng trong TS600. Hệ thống &acirc;m thanh mới sử dụng c&ocirc;ng nghệ loa h&igrave;nh n&oacute;n bằng sợi carbon mới nhất của Morel kết hợp với cuộn d&acirc;y bằng giọng n&oacute;i bằng titan để đảm bảo hiệu suất tối đa với c&aacute;c vật liệu nhẹ nhất c&oacute; thể. Được l&agrave;m thủ c&ocirc;ng v&agrave; t&ugrave;y chỉnh cho TS600 mới, hệ thống &acirc;m thanh n&agrave;y hứa hẹn sẽ t&aacute;i tạo cảm gi&aacute;c hồi hộp của nhạc sống.</p>\r\n'),
(2, 'HỢP TÁC Ô TÔ MOREL & MAZZANTI', 'hop-tac-o-to-morel--mazzanti', 'Siêu xe Evantra & siêu xe Evantra Millecavalli nhận hệ thống âm thanh thiết kế riêng của Morel', 'HỢP TÁC Ô TÔ MOREL & MAZZANTI', 'project-11.jpg', '[\"project-21.jpg\",\"project-31.jpg\",\"project-41.jpg\",\"project-5.jpg\"]', 0, 0, '<p>Si&ecirc;u xe Evantra &amp; si&ecirc;u xe Evantra Millecavalli nhận hệ thống &acirc;m thanh thiết kế ri&ecirc;ng của Morel.</p>\r\n\r\n<p>MAZZANTI &amp; MOREL THỦ C&Ocirc;NG Ở TỐC ĐỘ TỐT NHẤT CỦA N&Oacute;</p>\r\n\r\n<p>Tận dụng b&iacute; quyết &acirc;m thanh s&acirc;u rộng v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến của m&igrave;nh, nh&agrave; sản xuất loa cao cấp nổi tiếng, Morel, tự h&agrave;o c&ocirc;ng bố mối quan hệ hợp t&aacute;c đặc biệt với Mazzanti Automobili &ndash; nh&agrave; sản xuất Si&ecirc;u xe &ldquo;may đo&rdquo; thủ c&ocirc;ng của &Yacute;.</p>\r\n\r\n<p>Hai doanh nghiệp kỳ cựu thuộc sở hữu của một gia đ&igrave;nh chia sẻ một triết l&yacute; chung v&agrave; được th&uacute;c đẩy bởi niềm đam m&ecirc; mang lại hiệu suất cao v&agrave; sự đổi mới ti&ecirc;n tiến. Nir Paz, gi&aacute;m đốc b&aacute;n h&agrave;ng v&agrave; tiếp thị của Morel cho biết: &ldquo;Việc hợp t&aacute;c với Mazzanti Automobili l&agrave; một lựa chọn tự nhi&ecirc;n, &ldquo;Cả hai c&ocirc;ng ty đều t&iacute;ch hợp kỹ thuật v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến c&ugrave;ng với sự chăm ch&uacute;t tỉ mỉ đến từng chi tiết m&agrave; chỉ c&oacute; thể c&oacute; được với tay nghề thủ c&ocirc;ng&rdquo;.</p>\r\n\r\n<p>Luca Mazzanti, người s&aacute;ng lập v&agrave; chủ sở hữu của Mazzanti Automobili nhận x&eacute;t: &ldquo;Kinh nghiệm v&agrave; chuy&ecirc;n m&ocirc;n của Morel đại diện cho sự xuất sắc được c&ocirc;ng nhận tr&ecirc;n to&agrave;n cầu. tr&ecirc;n to&agrave;n thế giới. Nhờ sự tinh tế của Morel trong c&aacute;c hệ thống &Acirc;m thanh, đồ trang sức của t&ocirc;i thậm ch&iacute; sẽ trở n&ecirc;n độc quyền hơn, mang lại cảm gi&aacute;c th&iacute;ch th&uacute; với &acirc;m thanh kh&ocirc;ng g&igrave; s&aacute;nh bằng&rdquo;.</p>\r\n\r\n<p>HỆ THỐNG &Acirc;M THANH ĐƯỢC THIẾT KẾ D&Agrave;NH CHO XE HƠI ĐƯỢC THIẾT KẾ</p>\r\n\r\n<p>Cả Si&ecirc;u xe Evantra v&agrave; Si&ecirc;u xe Evantra Millecavalli sẽ c&oacute; hệ thống &acirc;m thanh được thiết kế ri&ecirc;ng, Morel sẽ t&ugrave;y chỉnh theo mong muốn của kh&aacute;ch h&agrave;ng Mazzanti. Với thiết kế nội bộ, R&amp;D v&agrave; sản xuất, Morel c&oacute; thể ph&aacute;t triển c&aacute;c loa c&oacute; hiệu suất cao nhất trong một m&ocirc;i trường &acirc;m thanh cụ thể. Điều n&agrave;y cho ph&eacute;p Morel &ldquo;điều chỉnh&rdquo; thiết kế hệ thống &acirc;m thanh cho kh&aacute;ch h&agrave;ng của m&igrave;nh m&agrave; kh&ocirc;ng gặp trở ngại n&agrave;o, ngay cả tr&ecirc;n c&aacute;c phương tiện sản xuất hạn chế như Evantra v&agrave; Evantra Millecavalli. Tương tự như vậy, triết l&yacute; của Mazzanti Automobili tập trung v&agrave;o việc cung cấp th&ecirc;m điểm nhấn đ&oacute;, &ldquo;điều chỉnh&rdquo; từng si&ecirc;u xe hoặc si&ecirc;u xe theo y&ecirc;u cầu của kh&aacute;ch h&agrave;ng nhưng vẫn giữ được n&eacute;t đặc trưng của &Yacute; đồng nghĩa với chất lượng, chi tiết v&agrave; thiết kế năng động. Sức mạnh tổng hợp giữa hai c&ocirc;ng ty tạo ra một trải nghiệm l&aacute;i xe độc đ&aacute;o được thiết kế để chạm đến t&acirc;m hồn của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&Ocirc; T&Ocirc; MAZZANTI EVANTRA MILLECAVALLI</p>\r\n\r\n<p>Cơ kh&iacute; cực đoan v&agrave; tinh tế kết hợp với những đường n&eacute;t nổi bật kh&ocirc;ng thể nhầm lẫn của &Yacute;. Mazzanti Automobili Evantra Millecavalli truyền tải một chiếc &ocirc; t&ocirc; hợp ph&aacute;p tr&ecirc;n đường phố với tất cả c&aacute;c yếu tố của một chiếc xe đua thuần t&uacute;y.</p>\r\n\r\n<p>Được x&acirc;y dựng phần lớn bằng sợi carbon, Evantra Millecavalli chỉ nặng 1.300kg (2.860lbs), nhưng tự h&agrave;o c&oacute; động cơ V8 7.2L bi-turbo cho c&ocirc;ng suất đ&aacute;ng kinh ngạc 1.000 m&atilde; lực v&agrave; m&ocirc;-men xoắn 1210 Nm (892 lb-ft) tại 6500 v&ograve;ng/ph&uacute;t, biến si&ecirc;u xe &Yacute; n&agrave;y th&agrave;nh phương tiện hợp ph&aacute;p tr&ecirc;n đường mạnh mẽ nhất từng được chế tạo ở &Yacute;.</p>\r\n\r\n<p>Hệ thống &acirc;m thanh xe hơi Morel trong Evantra v&agrave; Evantra Millecavalli sẽ sử dụng c&aacute;c c&ocirc;ng nghệ ti&ecirc;n tiến của Morel, cho ph&eacute;p t&iacute;ch hợp dễ d&agrave;ng v&agrave; tạo ra &acirc;m thanh đặc trưng với độ trung thực cao kh&ocirc;ng thể nhầm lẫn của Morel. Được l&agrave;m thủ c&ocirc;ng v&agrave; t&ugrave;y chỉnh cho Evantra v&agrave; Evantra Millecavalli, hệ thống &acirc;m thanh mới hứa hẹn sẽ thu h&uacute;t sự phấn kh&iacute;ch của &acirc;m nhạc tr&ecirc;n đường.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(3, 'HỢP TÁC Ô TÔ MOREL & PAGANI', 'hop-tac-o-to-morel--pagani', 'Hệ thống âm thanh độ trung thực cao bằng sợi carbon được thiết kế độc quyền của Morel cho Zonda & Huayra của Pagani', 'HỢP TÁC Ô TÔ MOREL & PAGANI', 'project-12.jpg', '[\"project-22.jpg\",\"project-32.jpg\",\"project-42.jpg\",\"project-51.jpg\"]', 0, 0, '<p>Hệ thống &acirc;m thanh độ trung thực cao bằng sợi carbon được thiết kế độc quyền của Morel cho Zonda &amp; Huayra của Pagani.</p>\r\n\r\n<p>NGHỆ THUẬT &amp; KHOA HỌC</p>\r\n\r\n<p>Pagani &ocirc; t&ocirc; S.p.A. l&agrave; một nh&agrave; sản xuất si&ecirc;u xe &Yacute; được th&agrave;nh lập v&agrave;o năm 1991 bởi Huracio Pagani. Triết l&yacute; của họ bắt nguồn từ kh&aacute;i niệm Phục hưng do Leonardo da Vinci thể hiện đ&atilde; tuy&ecirc;n bố: &ldquo;Nghệ thuật v&agrave; Khoa học l&agrave; những ng&agrave;nh phải song h&agrave;nh c&ugrave;ng nhau&rdquo; dẫn đường cho họ. C&aacute;ch tiếp cận tương tự của c&ocirc;ng ty đối với thiết kế xuất sắc v&agrave; c&ocirc;ng nghệ ti&ecirc;n tiến sử dụng c&aacute;c vật liệu h&agrave;ng đầu đ&atilde; dẫn đến một sự hợp t&aacute;c tuyệt vời. Tận dụng b&iacute; quyết của Morel trong kỹ thuật loa v&agrave; tay nghề thủ c&ocirc;ng để mang đến m&agrave;n tr&igrave;nh diễn &acirc;m nhạc quyến rũ ph&ugrave; hợp với trải nghiệm l&aacute;i xe hồi hộp v&agrave; tr&agrave;n đầy sinh lực của Pagani.</p>\r\n\r\n<p>HỆ THỐNG &Acirc;M THANH ĐƯỢC THIẾT KẾ ĐỘC Đ&Aacute;O</p>\r\n\r\n<p>Morel đ&atilde; thiết kế v&agrave; ph&aacute;t triển c&aacute;c hệ thống &acirc;m thanh độc đ&aacute;o, c&ugrave;ng với Pagani, kết hợp c&ocirc;ng nghệ loa cải tiến mới nhất của h&atilde;ng v&agrave; c&aacute;c vật liệu ti&ecirc;n tiến, chẳng hạn như vật liệu tổng hợp sợi carbon v&agrave; titan, để mang lại hiệu suất &acirc;m thanh cực kỳ ch&iacute;nh x&aacute;c v&agrave; ch&acirc;n thực.</p>\r\n'),
(4, 'HỢP TÁC Ô TÔ MOREL & GEELY', 'hop-tac-o-to-morel--geely', 'Morel và Geely Automobile hợp tác phát triển hệ thống âm thanh cao cấp.', 'HỢP TÁC Ô TÔ MOREL & GEELY', 'project-13.jpg', '[]', 0, 0, '<p>Morel v&agrave; Geely Automobile hợp t&aacute;c ph&aacute;t triển hệ thống &acirc;m thanh cao cấp.</p>\r\n\r\n<p>TRẢI NGHIỆM &Acirc;M THANH TỐT NHẤT TẠI BOYUE</p>\r\n\r\n<p>Với mong muốn mang đến cho kh&aacute;ch h&agrave;ng trải nghiệm &acirc;m thanh vượt trội tr&ecirc;n BOYUE mới, Geely đ&atilde; t&igrave;m đến nh&agrave; sản xuất loa sang trọng c&oacute; độ trung thực cao nổi tiếng Morel. Niềm đam m&ecirc; đổi mới v&agrave; t&igrave;nh y&ecirc;u &acirc;m nhạc đ&atilde; tạo n&ecirc;n sự hợp t&aacute;c v&ocirc; c&ugrave;ng đặc biệt giữa Geely v&agrave; Morel. Nhiệm vụ rất r&otilde; r&agrave;ng l&agrave; tạo ra một sức mạnh tổng hợp sẽ nắm bắt được điều kỳ diệu trong &acirc;m thanh v&agrave; mang lại trải nghiệm l&aacute;i xe ở một cấp độ mới.</p>\r\n\r\n<p>1 LIN JIE, VP TẬP ĐO&Agrave;N GEELY AUTO, TỔNG GI&Aacute;M ĐỐC C&Ocirc;NG TY B&Aacute;N H&Agrave;NG</p>\r\n\r\n<p>&ldquo;Chiếc SUV Bo Yue được thiết kế để mang đến t&iacute;nh thẩm mỹ, c&ocirc;ng nghệ v&agrave; khả năng kết nối cho những kh&aacute;ch h&agrave;ng trẻ tuổi của ch&uacute;ng t&ocirc;i. Morel được biết đến với &acirc;m thanh c&oacute; độ trung thực cao v&agrave; sự hợp t&aacute;c với Morel sẽ tăng cường khả năng của ch&uacute;ng t&ocirc;i trong việc cung cấp một hệ thống &acirc;m thanh tốt hơn v&agrave; mang lại trải nghiệm l&aacute;i xe h&agrave;i l&ograve;ng hơn nhiều&rdquo;.</p>\r\n\r\n<p>HI-FI L&Agrave; MỘT PHẦN CỦA DNA CỦA MOREL</p>\r\n\r\n<p>Hệ thống &acirc;m thanh &ocirc; t&ocirc; l&agrave; chuy&ecirc;n m&ocirc;n của Morel. Điều khiển tổng cộng t&aacute;m loa, bộ khuếch đại DSP ti&ecirc;n tiến t&aacute;m k&ecirc;nh với c&ocirc;ng suất 720 Watts l&agrave; xương sống của hệ thống BOYUE. Sự ch&uacute; &yacute; cẩn thận đến từng chi tiết v&agrave; c&aacute;c th&agrave;nh phần chất lượng cao được sử dụng để thiết kế hệ thống &acirc;m thanh hứa hẹn mang đến trải nghiệm &acirc;m thanh hấp dẫn, năng động v&agrave; tuyệt vời về mặt cảm x&uacute;c m&agrave; Morel nổi tiếng.</p>\r\n'),
(5, 'ĐỐI TÁC CÔNG TY THUYỀN GỖ MOREL & STNCcraft', 'doi-tac-cong-ty-thuyen-go-morel--stnccraft', 'Loa Integra hàng hải được thiết kế đặc biệt dành cho thuyền Deluxe Sport Lowboy dài 300 foot.', 'ĐỐI TÁC CÔNG TY THUYỀN GỖ MOREL & STNCcraft', 'project-14.jpg', '[\"project-23.jpg\",\"project-33.jpg\",\"project-43.jpg\",\"project-52.jpg\"]', 0, 0, '<p>Loa Integra h&agrave;ng hải được thiết kế đặc biệt d&agrave;nh cho thuyền Deluxe Sport Lowboy d&agrave;i 300 foot.</p>\r\n\r\n<p>DỰ &Aacute;N</p>\r\n\r\n<p>Hai c&ocirc;ng ty thuộc sở hữu gia đ&igrave;nh kỳ cựu n&agrave;y chia sẻ rất nhiều điều giữa họ. Cả hai đều ch&uacute; trọng đến từng chi tiết, chất lượng cao v&agrave; thiết kế s&aacute;ng tạo, giữ nguy&ecirc;n phương thức sản xuất truyền thống &ndash; thủ c&ocirc;ng ở dạng chất lượng cao nhất.</p>\r\n\r\n<p>THUYỀN GỖ THỦ C&Ocirc;NG &amp; TH&Ecirc;U</p>\r\n\r\n<p>C&ocirc;ng ty Thuyền gỗ StanCraft l&agrave; một doanh nghiệp của Mỹ được th&agrave;nh lập v&agrave;o năm 1933 v&agrave; hiện đang được điều h&agrave;nh bởi thế hệ thứ ba của gia đ&igrave;nh n&agrave;y, Robb v&agrave; Amy Bloem. Chuy&ecirc;n đ&oacute;ng thuyền gỗ thiết kế thủ c&ocirc;ng bằng gỗ gụ Ch&acirc;u Phi v&agrave; chạy bằng động cơ phun nhi&ecirc;n liệu từ 300 m&atilde; lực đến 1075 m&atilde; lực. Mỗi chiếc thuyền l&agrave; một loại duy nhất, để ph&ugrave; hợp với y&ecirc;u cầu của chủ sở hữu. Thiết kế nội bộ, R&amp;D, kiến thức v&agrave; kinh nghiệm s&acirc;u rộng trong sản xuất cũng như tr&igrave;nh điều khiển v&agrave; loa cho ph&eacute;p tạo ra một hệ thống loa Integra định hướng h&agrave;ng hải được t&ugrave;y chỉnh thủ c&ocirc;ng, đặc biệt ph&ugrave; hợp với những chiếc thuyền thủ c&ocirc;ng Deluxe Sport Lowboy.</p>\r\n\r\n<p>STANCRAFT DELUXE THỂ THAO THẤP</p>\r\n\r\n<p>Thiết kế StanCraft phổ biến v&agrave; linh hoạt nhất, được giới thiệu lần đầu ti&ecirc;n v&agrave;o năm 2004 v&agrave; kể từ đ&oacute; n&oacute; trở th&agrave;nh một chiếc thuyền được y&ecirc;u th&iacute;ch. Được chế tạo theo nhiều chiều d&agrave;i, sắp xếp chỗ ngồi v&agrave; thậm ch&iacute; c&oacute; một số mui cứng. Chiếc thuyền n&agrave;y c&oacute; thể được t&ugrave;y chỉnh theo nhiều c&aacute;ch nhưng vẫn giữ được những đường n&eacute;t thanh lịch, phần cứng cổ điển v&agrave; thiết kế hiện đại.</p>\r\n\r\n<p>LOA INTEGRA H&Agrave;NG HẢI MOREL T&Ugrave;Y CHỈNH</p>\r\n\r\n<p>Morel đ&atilde; thiết kế đặc biệt một loa Integra h&agrave;ng hải để hoạt động cực kỳ tốt trong buồng &acirc;m thanh vốn c&oacute; vấn đề của con t&agrave;u. Loa Integra bao gồm cả loa trầm v&agrave; loa tweeter c&oacute; chung một khung gầm, được căn chỉnh đồng t&acirc;m với n&oacute;n loa trầm. Sự kết hợp c&ocirc;ng nghệ độc đ&aacute;o của cuộn d&acirc;y &acirc;m thanh lớn, cấu h&igrave;nh loa trầm tweeter được căn chỉnh theo thời gian v&agrave; cấu tr&uacute;c li&ecirc;n kết ph&acirc;n tần ti&ecirc;n tiến cho ph&eacute;p tạo ra hiệu suất &acirc;m thanh c&oacute; độ trung thực cao đặc biệt đ&aacute;ng nhớ.<br />\r\nĐược tạo ra để kh&aacute;ch h&agrave;ng tận hưởng trọn vẹn.</p>\r\n');

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
  ADD KEY `sort_order` (`sort_order`),
  ADD KEY `redirect_link` (`redirect_link`(333));

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
  ADD KEY `type` (`sort_order`);
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
-- Chỉ mục cho bảng `product_technology`
--
ALTER TABLE `product_technology`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product_technology`
--
ALTER TABLE `product_technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

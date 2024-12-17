-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2024 at 03:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `vhc_banner`
--

CREATE TABLE `vhc_banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_banner`
--

INSERT INTO `vhc_banner` (`id`, `name`, `image`, `link`, `position`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Slider2', '20231017162150.jpg', '#', 'slideshow', NULL, 1, 1, '2023-10-17 09:15:58', '2023-10-28 05:38:33', 1),
(5, 'Vũ Hoàng Chính', '20231028124915.png', 'xZxz', 'slideshow', 'xzxzx', 1, 1, '2023-10-28 05:49:15', '2023-10-31 05:28:56', 1),
(6, 'Đổi tên', '20231028125104.png', '#', 'slideshow', 'dsadcxzcxcx', 1, 1, '2023-10-28 05:51:04', '2023-10-31 05:27:48', 1),
(7, 'sadsdsadsad', '20231030033908.png', 'sdsasadsa', '0', 'dsadsaddsad', 1, 1, '2023-10-29 20:39:08', '2023-10-31 05:27:38', 1),
(8, 'sadsad', 'hitu.png', 'ádasd', 'ádsad', NULL, 1, NULL, NULL, NULL, 1),
(9, 'sadsad', 'hitu.png', 'ádasd', 'ádsad', NULL, 1, NULL, NULL, NULL, 1),
(10, 'sadsad', 'hitu.png', 'ádasd', 'ádsad', NULL, 1, NULL, NULL, NULL, 1),
(11, 'sadsad', 'hitu.png', 'ádasd', 'ádsad', 'ádasdsad', 1, NULL, NULL, NULL, 1),
(12, 'sadsad', 'hitu.png', 'ádasd', 'ádsad', 'ádasdsad', 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_brand`
--

CREATE TABLE `vhc_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_brand`
--

INSERT INTO `vhc_brand` (`id`, `name`, `slug`, `image`, `sort_order`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Việt Namxzcxc', 'viet-namxcxc', '', 0, 'Mô tả SEO', '2020-07-03 02:06:19', '2023-12-28 04:10:13', 1, 1, 1),
(2, 'Hàn Quốc', 'han-quoc', '', 0, 'Mô tả SEO', '2020-07-03 02:06:19', '2023-12-28 04:07:23', 1, 1, 2),
(3, 'Thái Lan', 'thai-lan', '', 0, 'Mô tả SEO', '2020-07-03 02:06:19', '2022-11-19 00:54:36', 1, 1, 1),
(4, 'Nhật Bản', 'nhat-ban', '', 0, 'Mô tả SEO', '2020-07-03 02:06:19', '2022-11-19 00:54:44', 1, 1, 1),
(5, 'Quảng Châu', 'quang-chau', '', 0, 'Mô tả SEO', '2020-07-03 02:06:19', '2023-10-29 00:24:50', 1, 1, 2),
(6, 'zsdsad', 'ádsadsa', NULL, 0, 'dsadas', '2023-10-27 03:57:12', '2023-10-29 00:27:49', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_category`
--

CREATE TABLE `vhc_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_category`
--

INSERT INTO `vhc_category` (`id`, `name`, `slug`, `image`, `parent_id`, `sort_order`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Đồ nam', 'do-nam', 'Team3.e4cabd1.png', 0, 0, 'Đồ nam', '2022-11-22 11:17:31', '2023-10-17 09:35:23', 1, 1, 1),
(2, 'Đồ nữ', 'do-nu', 'Team3.e4cabd1.png', 0, 0, 'Đồ nữ', '2022-11-22 11:18:00', '2023-10-17 09:35:35', 1, 1, 1),
(3, 'Áo thun nam', 'ao-thun-nam', 'Team3.e4cabd1.png', 1, 0, 'Áo thun nam', '2022-11-22 11:18:27', '2022-11-22 11:18:27', 1, 0, 1),
(4, 'Lợi đep', 'ao-so-mi-nam', 'Team3.e4cabd1.png', 1, 0, 'Áo sơ mi nam', '2022-11-22 11:18:53', '2022-11-22 11:18:53', 1, 0, 1),
(5, 'Quần short nam', 'quan-short-nam', 'Team3.e4cabd1.png', 1, 0, 'Quần short nam', '2022-11-22 11:19:32', '2022-11-22 11:19:32', 1, 0, 1),
(6, 'Quần dài nam', 'quan-dai-nam', 'Team3.e4cabd1.png', 1, 0, 'Quần dài nam', '2022-11-22 11:19:57', '2022-11-22 11:19:57', 1, 0, 1),
(7, 'Áo thun nữ', 'ao-thun-nu', 'Team3.e4cabd1.png', 2, 0, 'Áo thun nữ', '2022-11-22 11:21:27', '2022-11-22 11:21:27', 1, 0, 1),
(8, 'Áo sơ mi nữ', 'ao-so-mi-nu', 'Team3.e4cabd1.png', 2, 0, 'Áo sơ mi nữ', '2022-11-22 11:21:43', '2022-11-22 11:21:43', 1, 0, 1),
(9, 'Áo kiểu', 'ao-kieu', 'Team3.e4cabd1.png', 2, 0, 'Áo kiểu', '2022-11-22 11:22:00', '2022-11-22 11:22:00', 1, 0, 1),
(10, 'Quần short nữ', 'quan-short-nu', 'Team3.e4cabd1.png', 2, 0, 'Quần short nữ', '2022-11-22 11:22:14', '2022-11-22 11:22:14', 1, 0, 1),
(11, 'Quần dài nữ', 'quan-dai-nu', 'Team3.e4cabd1.png', 2, 0, 'Quần dài nữ', '2022-11-22 11:22:48', '2023-10-17 21:56:13', 1, 1, 1),
(12, 'Chân váy', 'chan-vay', 'Team3.e4cabd1.png', 2, 0, 'Chân váy', '2022-11-22 11:23:07', '2023-10-17 21:56:07', 1, 1, 1),
(13, 'Ho Diên Lợi 23333', 'ho-dien-loi-23333', 'Team3.e4cabd1.png', 8, 1, 'fsdfsfdf', '2023-03-02 18:35:22', '2023-03-16 17:50:02', 1, 1, 0),
(14, 'sdfdsfds', 'sdfdsfds', 'Team3.e4cabd1.png', 0, 0, 'áds', '2023-03-02 18:57:32', '2023-03-16 17:50:00', 1, 1, 0),
(15, 'dfsdf', 'dfsdf', 'Team3.e4cabd1.png', 0, 0, 'sdfdsfd', '2023-03-02 19:01:21', '2023-03-16 17:49:59', 1, 1, 0),
(16, 'zxcxc', 'zxcxc', 'Team3.e4cabd1.png', 0, 0, 'cxzc', '2023-03-02 20:42:01', '2023-03-16 17:49:58', 1, 1, 0),
(17, 'xfsdf', 'xfsdf', 'Team3.e4cabd1.png', 0, 0, 'fdsfds', '2023-03-02 20:44:50', '2023-03-16 17:49:56', 1, 1, 0),
(18, 'Giày nam 2023', 'giay-nam-2023', 'Team3.e4cabd1.png', 0, 0, 'xzcxzc', '2023-03-02 21:06:58', '2023-03-16 17:49:52', 1, 1, 0),
(19, 'sấdsa', 'sadsa', 'Team3.e4cabd1.png', 11, 1, 'dsadsad', '2023-03-16 17:59:57', '2023-10-17 09:41:14', 1, 1, 0),
(20, 'Đồ  trẻ em', 'do-tre-em', 'Team3.e4cabd1.png', 0, 0, NULL, '2023-10-17 09:36:18', '2023-10-29 01:40:50', 1, 1, 0),
(21, 'Thời trang thể thao', 'thoi-trang-the-thao', 'Team3.e4cabd1.png', 0, 0, NULL, '2023-10-17 09:41:55', '2023-10-29 01:15:51', 1, 1, 2),
(23, 'zxcxzxzcxzcxzcx', 'cxzc', 'Team3.e4cabd1.png', 0, 0, 'xzcxzc', '2023-10-29 01:37:13', '2023-10-29 01:46:18', 1, 1, 2),
(24, 'sadsds', 'sadsds', 'Team3.e4cabd1.png', 1, 1, 'sadsds', '2024-02-27 17:00:00', NULL, 1, NULL, 1),
(25, 'sadsds', 'sadsds', 'Team3.e4cabd1.png', 1, 1, 'sadsds', '2024-02-28 12:38:18', NULL, 1, NULL, 1),
(26, 'sadsds', 'sadsds', 'Team3.e4cabd1.png', 1, 1, 'sadsds', '2024-02-28 12:49:05', NULL, 1, NULL, 1),
(27, 'sadsds', 'sadsds', 'Team3.e4cabd1.png', 1, 1, 'sadsds', '2024-02-28 12:49:49', NULL, 1, NULL, 1),
(28, 'ho dien lợi', 'ho-dien-loi', 'Team3.e4cabd1.png', 1, 1, 'ho dien lợi', '2024-02-28 12:51:05', NULL, 1, NULL, 1),
(29, 'sadasd', 'sadasd', 'Team3.e4cabd1.png', 1, 1, 'sadasd', '2024-02-28 15:10:01', NULL, 1, NULL, 1),
(30, 'ádas', 'adas', 'Team3.e4cabd1.png', 1, 1, 'ádas', '2024-02-28 16:45:27', NULL, 1, NULL, 1),
(31, 'Loi 2024', 'loi-2024', 'Team3.e4cabd1.png', 1, 1, 'Loi 2024', '2024-02-28 16:45:39', NULL, 1, NULL, 1),
(32, 'sadsa', 'sadsa', 'Team4.9a108e5.png', 1, 1, 'sadsa', '2024-02-29 02:46:10', NULL, 1, NULL, 1),
(33, 'dsadsasadsd', 'dsadsasadsd', 'Team1.ef9f2df.png', 1, 1, 'dsadsasadsd', '2024-02-29 03:19:23', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_contact`
--

CREATE TABLE `vhc_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `replay_id` int(10) UNSIGNED DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_contact`
--

INSERT INTO `vhc_contact` (`id`, `user_id`, `name`, `email`, `phone`, `title`, `content`, `replay_id`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(1, NULL, 'Vũ Hoàng Chính', 'vuhoangchinh222@gmail.com', '0987654321', 'Ho hoi', 'Ho hoi', 0, '2023-10-17 00:44:40', '2023-10-30 03:44:12', 1, 1),
(2, NULL, 'Vũ Hoàng Chính', 'vuhoangchinh222@gmail.com', '0987654321', 'áds', 'sadasd', 0, '2023-10-17 00:47:31', '2023-10-16 18:33:17', 1, 1),
(3, NULL, 'Vũ Hoàng Chính', 'vuhoangchinh222@gmail.com', '090999', 'sad', 'sds', 0, '2023-10-17 00:52:48', '2023-10-16 17:52:48', NULL, 2),
(4, NULL, 'Vũ Hoàng Chính', 'vuhoangchinh222@gmail.com', '090999', 'sad', 'sadsads', 3, '2023-10-17 01:24:59', '2023-10-16 18:27:27', 1, 1),
(5, NULL, 'Vũ Hoàng Chính', 'vuhoangchinh222@gmail.com', '090999', 'sad', 'Noi dung tra lời', 4, '2023-10-17 01:27:27', '2023-10-16 18:27:27', NULL, 2),
(6, NULL, 'Vũ Hoàng Chính', 'vuhoangchinh222@gmail.com', '0987654321', 'áds', 'sadsadsd', 2, '2023-10-17 01:33:17', '2023-10-16 18:33:17', NULL, 2),
(7, NULL, 'Vũ Hoàng Chính', 'vuhoangchinh222@gmail.com', '0987654321', 'Ho hoi', 'ádasd', 1, '2023-10-30 10:25:55', '2023-10-30 03:25:55', NULL, 2),
(8, NULL, 'Vũ Hoàng Chính', 'vuhoangchinh222@gmail.com', '0987654321', 'Ho hoi', 'sadsadsadsd', 1, '2023-10-30 10:26:22', '2023-10-30 03:26:22', NULL, 2),
(9, NULL, 'Vũ Hoàng Chính', 'vuhoangchinh222@gmail.com', '0987654321', 'Ho hoi', 'Tào lao', 1, '2023-10-30 10:44:12', '2023-10-30 03:44:12', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_menu`
--

CREATE TABLE `vhc_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `sort_order` int(10) UNSIGNED DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT 0,
  `type` varchar(100) NOT NULL,
  `position` varchar(255) NOT NULL,
  `table_id` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_menu`
--

INSERT INTO `vhc_menu` (`id`, `name`, `link`, `sort_order`, `parent_id`, `type`, `position`, `table_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Trang chủ', 'http://localhost/CDTT/laravel/public/', 1, 0, 'custom', 'mainmenu', 0, '2022-11-22 12:36:05', '2023-11-02 18:40:19', 1, 1, 0),
(2, 'Giới thiệu', 'trang-don/gioi-thieu', 2, 0, 'page', 'mainmenu', 39, '2022-11-22 13:13:46', '2023-10-18 01:31:44', 1, 1, 0),
(3, 'Đầm', 'danh-muc/dam', 9, 14, 'category', 'mainmenu', 13, '2022-11-22 13:14:09', '2023-11-02 18:40:36', 1, 1, 0),
(4, 'Chân váy', 'danh-muc/chan-vay', 8, 14, 'category', 'mainmenu', 12, '2022-11-22 13:14:09', '2023-11-02 18:40:45', 1, 1, 0),
(5, 'Quần dài nữ', 'danh-muc/quan-dai-nu', 7, 14, 'category', 'mainmenu', 11, '2022-11-22 13:14:09', '2023-11-02 18:40:53', 1, 1, 0),
(6, 'Quần short nữ', 'danh-muc/quan-short-nu', 6, 14, 'category', 'mainmenu', 10, '2022-11-22 13:14:09', '2023-11-02 18:41:01', 1, 1, 0),
(7, 'Áo kiểu', 'danh-muc/ao-kieu', 5, 14, 'category', 'mainmenu', 9, '2022-11-22 13:14:09', '2023-11-02 18:41:12', 1, 1, 0),
(8, 'Áo sơ mi nữ', 'danh-muc/ao-so-mi-nu', 4, 14, 'category', 'mainmenu', 8, '2022-11-22 13:14:09', '2023-11-02 18:41:44', 1, 1, 0),
(9, 'Áo thun nữ', 'danh-muc/ao-thun-nu', 3, 14, 'category', 'mainmenu', 7, '2022-11-22 13:14:09', '2023-11-02 18:42:32', 1, 1, 0),
(10, 'Quần dài nam', 'danh-muc/quan-dai-nam', 13, 15, 'category', 'mainmenu', 6, '2022-11-22 13:14:09', '2023-11-02 18:42:40', 1, 1, 0),
(11, 'Quần short nam', 'danh-muc/quan-short-nam', 12, 15, 'category', 'mainmenu', 5, '2022-11-22 13:14:09', '2023-11-02 18:43:09', 1, 1, 0),
(12, 'Áo sơ mi nam', 'danh-muc/cat=ao-so-mi-nam', 11, 15, 'category', 'mainmenu', 4, '2022-11-22 13:14:09', '2023-11-02 18:43:15', 1, 1, 0),
(13, 'Áo thun nam', 'danh-muc/ao-thun-nam', 10, 15, 'category', 'mainmenu', 3, '2022-11-22 13:14:09', '2023-11-02 18:43:21', 1, 1, 0),
(14, 'Đồ nữ', 'danh-muc/do-nu', 4, 0, 'category', 'mainmenu', 2, '2022-11-22 13:14:09', '2023-11-02 18:44:07', 1, 1, 0),
(15, 'Đồ nam', 'danh-muc/do-nam', 3, 0, 'category', 'mainmenu', 1, '2022-11-22 13:14:09', '2023-11-02 18:44:10', 1, 1, 0),
(16, 'Giới thiệu', 'trang-don/gioi-thieu', 1, 0, 'page', 'footermenu', 39, '2022-11-22 13:55:36', '2023-11-02 18:44:12', 1, 1, 0),
(17, 'Chính Sách Hoàn Tiền', 'trang-don/chinh-sach-hoan-tien', 1, 0, 'page', 'footermenu', 38, '2022-11-22 13:55:36', '2023-11-02 18:44:13', 1, 1, 0),
(18, 'Chính sách bảo hành', 'trang-don/chinh-sach-bao-hanh', 1, 0, 'page', 'footermenu', 37, '2022-11-22 13:55:36', '2023-11-02 18:44:15', 1, 1, 0),
(19, 'Chính sách đổi hàng', 'trang-don/chinh-sach-doi-hang', 1, 0, 'page', 'footermenu', 36, '2022-11-22 13:55:36', '2023-11-02 18:44:17', 1, 1, 0),
(33, 'Đồ nam', 'danh-muc/do-nam', 1, 0, 'category', 'mainmenu', 1, '2023-10-17 04:07:08', '2023-11-02 18:44:24', 1, 1, 0),
(34, 'Tin tức', 'chu-de/tin-tuc', 1, 0, 'topic', 'mainmenu', 5, '2023-10-17 22:26:44', '2023-11-02 18:45:10', 1, 1, 0),
(35, 'Dịch vụ', 'chu-de/dich-vu', 1, 0, 'topic', 'mainmenu', 6, '2023-10-17 22:26:44', '2023-11-02 18:44:22', 1, 1, 0),
(36, 'Trang mới', 'trang-don/sadsad', 1, 0, 'page', 'mainmenu', 6, '2023-10-18 01:33:54', '2023-11-02 18:44:23', 1, 1, 0),
(37, 'Áo thun nam', 'danh-muc/ao-thun-nam', 1, 0, 'category', 'mainmenu', 3, '2023-10-27 04:04:07', '2023-11-02 18:45:15', 1, 1, 0),
(38, 'Quần short nam', 'danh-muc/quan-short-nam', 1, 0, 'category', 'mainmenu', 5, '2023-10-27 04:04:07', '2023-11-02 18:44:24', 1, 1, 0),
(39, 'Áo sơ mi nữ', 'danh-muc/ao-so-mi-nu', 1, 0, 'category', 'mainmenu', 8, '2023-10-27 04:04:07', '2023-11-02 18:45:20', 1, 1, 0),
(40, 'Quần dài nữ', 'danh-muc/quan-dai-nu', 1, 0, 'category', 'mainmenu', 11, '2023-10-27 04:04:07', '2023-11-02 18:45:24', 1, 1, 0),
(41, 'Áo thun nam', 'danh-muc/ao-thun-nam', 1, 0, 'category', 'mainmenu', 3, '2023-11-02 17:49:27', '2023-11-02 18:45:28', 1, 1, 0),
(42, 'Quần dài nam', 'danh-muc/quan-dai-nam', 1, 0, 'category', 'mainmenu', 6, '2023-11-02 17:49:27', '2023-11-02 17:49:27', 1, NULL, 2),
(43, 'Quần short nữ', 'danh-muc/quan-short-nu', 1, 0, 'category', 'mainmenu', 10, '2023-11-02 17:49:27', '2023-11-02 17:49:27', 1, NULL, 2),
(44, 'Quần dài nam', 'danh-muc/quan-dai-nam', 1, 0, 'category', 'mainmenu', 6, '2023-11-02 18:19:24', '2023-11-02 18:19:24', 1, NULL, 2),
(45, 'Áo sơ mi nữ', 'danh-muc/ao-so-mi-nu', 1, 0, 'category', 'mainmenu', 8, '2023-11-02 18:19:24', '2023-11-02 18:19:24', 1, NULL, 2),
(46, 'Quần dài nữ', 'danh-muc/quan-dai-nu', 1, 0, 'category', 'mainmenu', 11, '2023-11-02 18:19:24', '2023-11-02 18:19:24', 1, NULL, 2),
(47, 'Quần dài nam', 'danh-muc/quan-dai-nam', 1, 0, 'category', 'mainmenu', 6, '2023-11-02 18:19:46', '2023-11-02 18:19:46', 1, NULL, 2),
(48, 'Áo sơ mi nữ', 'danh-muc/ao-so-mi-nu', 1, 0, 'category', 'mainmenu', 8, '2023-11-02 18:19:46', '2023-11-02 18:19:46', 1, NULL, 2),
(49, 'Chân váy', 'danh-muc/chan-vay', 1, 0, 'category', 'mainmenu', 12, '2023-11-02 18:19:46', '2023-11-02 18:19:46', 1, NULL, 2),
(50, 'Hàn Quốc', 'thuong-hieu/han-quoc', 1, 0, 'brand', 'mainmenu', 2, '2023-11-02 18:30:50', '2023-11-02 18:30:50', 1, NULL, 2),
(51, 'Thái Lan', 'thuong-hieu/thai-lan', 1, 0, 'brand', 'mainmenu', 3, '2023-11-02 18:30:50', '2023-11-02 18:30:50', 1, NULL, 2),
(52, 'Tin tức', 'chu-de/tin-tuc', 1, 0, 'topic', 'mainmenu', 3, '2023-11-02 18:35:23', '2023-11-02 18:44:02', 1, 1, 0),
(53, 'Dịch vụ', 'chu-de/dich-vu', 1, 0, 'topic', 'mainmenu', 4, '2023-11-02 18:35:23', '2023-11-02 18:43:58', 1, 1, 0),
(54, 'sads', 'trang-don/dsad', 1, 0, 'page', 'mainmenu', 3, '2023-11-02 18:35:40', '2023-11-02 18:43:56', 1, 1, 0),
(55, 'ádsadcvcv', 'trang-don/sad', 1, 0, 'page', 'mainmenu', 4, '2023-11-02 18:35:40', '2023-11-02 18:43:53', 1, 1, 0),
(56, 'Trang mới', 'trang-don/sadsad', 1, 0, 'page', 'mainmenu', 6, '2023-11-02 18:35:40', '2023-11-02 18:43:51', 1, 1, 0),
(57, 'sdsad', 'sad', 1, 0, 'custom', 'mainmenu', 0, '2023-11-02 18:39:42', '2023-11-02 18:43:48', 1, 1, 0),
(58, 'Đồ nam', 'danh-muc/do-nam', 1, 0, 'category', 'mainmenu', 1, '2024-01-05 20:40:49', '2024-01-05 20:40:49', 1, NULL, 2),
(59, 'Đồ nữ', 'danh-muc/do-nu', 1, 0, 'category', 'mainmenu', 2, '2024-01-05 20:40:49', '2024-01-05 20:40:49', 1, NULL, 2),
(60, 'Quần short nữ', 'danh-muc/quan-short-nu', 1, 0, 'category', 'mainmenu', 10, '2024-01-06 03:38:31', '2024-01-06 03:38:31', 1, NULL, 2),
(61, 'Quần dài nữ', 'danh-muc/quan-dai-nu', 1, 0, 'category', 'mainmenu', 11, '2024-01-06 03:38:32', '2024-01-06 03:38:32', 1, NULL, 2),
(62, 'Hàn Quốc', 'thuong-hieu/han-quoc', 1, 0, 'brand', 'mainmenu', 2, '2024-01-06 03:38:43', '2024-01-06 03:38:43', 1, NULL, 2),
(63, 'Thái Lan', 'thuong-hieu/thai-lan', 1, 0, 'brand', 'mainmenu', 3, '2024-01-06 03:38:43', '2024-01-06 03:38:43', 1, NULL, 2),
(64, 'Tin tức', 'chu-de/tin-tuc', 1, 0, 'topic', 'mainmenu', 3, '2024-01-06 03:38:50', '2024-01-06 03:38:50', 1, NULL, 2),
(65, 'Dịch vụ', 'chu-de/dich-vu', 1, 0, 'topic', 'mainmenu', 4, '2024-01-06 03:38:50', '2024-01-06 03:38:50', 1, NULL, 2),
(66, 'Giới thiệu', 'trang-don/gioi-thieu', 1, 0, 'page', 'mainmenu', 6, '2024-01-06 03:38:56', '2024-01-06 03:38:56', 1, NULL, 2),
(67, 'xzcxc', 'trang-don/xzcx', 1, 0, 'page', 'mainmenu', 8, '2024-01-06 03:38:56', '2024-01-06 03:38:56', 1, NULL, 2),
(68, 'gfhjk', 'hjkl', 1, 0, 'custom', 'mainmenu', 0, '2024-01-06 03:39:06', '2024-01-06 03:39:06', 1, NULL, 2),
(69, 'Quần dài nam', 'danh-muc/quan-dai-nam', 1, 0, 'category', 'footermenu', 6, '2024-01-07 23:24:15', '2024-01-07 23:24:15', 1, NULL, 2),
(70, 'Áo thun nữ', 'danh-muc/ao-thun-nu', 1, 0, 'category', 'footermenu', 7, '2024-01-07 23:24:15', '2024-01-07 23:24:15', 1, NULL, 2),
(71, 'Áo sơ mi nữ', 'danh-muc/ao-so-mi-nu', 1, 0, 'category', 'footermenu', 8, '2024-01-07 23:24:15', '2024-01-07 23:24:15', 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_order`
--

CREATE TABLE `vhc_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `delivery_name` varchar(255) NOT NULL,
  `delivery_gender` varchar(255) NOT NULL,
  `delivery_email` varchar(255) NOT NULL,
  `delivery_phone` varchar(255) NOT NULL,
  `delivery_address` varchar(1000) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `type` varchar(50) DEFAULT 'online',
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_order`
--

INSERT INTO `vhc_order` (`id`, `user_id`, `delivery_name`, `delivery_gender`, `delivery_email`, `delivery_phone`, `delivery_address`, `note`, `created_at`, `type`, `updated_at`, `updated_by`, `status`) VALUES
(1, 3, 'Vũ Hoàng Chính', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2023-10-15 00:29:31', 'shop', '2023-10-15 08:18:31', 1, 6),
(2, 3, 'Vũ Hoàng Chính', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2023-10-15 01:25:01', 'shop', '2023-10-15 01:25:01', NULL, 1),
(3, 3, 'Vũ Hoàng Chính', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2023-10-15 01:34:55', 'shop', '2023-10-15 01:34:55', NULL, 1),
(4, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2023-10-15 08:50:28', 'shop', '2023-10-15 08:50:28', NULL, 1),
(5, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2023-10-15 08:51:23', 'shop', '2023-10-15 08:51:23', NULL, 1),
(6, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2023-10-17 03:25:34', 'shop', '2023-10-17 03:25:34', NULL, 1),
(7, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2023-10-19 04:50:08', 'shop', '2023-10-19 04:50:08', NULL, 1),
(8, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-06 02:35:36', 'shop', '2024-01-06 02:35:36', NULL, 1),
(9, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-06 02:36:54', 'shop', '2024-01-06 02:36:54', NULL, 1),
(10, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-06 02:36:58', 'shop', '2024-01-06 02:36:58', NULL, 1),
(11, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-06 02:36:59', 'shop', '2024-01-06 02:36:59', NULL, 1),
(12, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-06 02:37:00', 'shop', '2024-01-06 02:37:00', NULL, 1),
(13, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-06 02:37:00', 'shop', '2024-01-06 02:37:00', NULL, 1),
(14, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-06 02:37:01', 'shop', '2024-01-06 02:37:01', NULL, 1),
(15, 5, 'Vũ Hoàng Chính', '1', 'vuhoangchinh222@gmail.com', '0987654321', 'Hồ Chí Minh', 'Mua tại quầy', '2024-01-06 02:37:10', 'shop', '2024-01-06 02:37:10', NULL, 1),
(16, 5, 'Vũ Hoàng Chính', '1', 'vuhoangchinh222@gmail.com', '0987654321', 'Hồ Chí Minh', 'Mua tại quầy', '2024-01-06 02:37:19', 'shop', '2024-01-06 02:37:19', NULL, 1),
(17, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-06 03:27:50', 'shop', '2024-01-06 03:27:50', NULL, 1),
(18, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-06 03:30:28', 'shop', '2024-01-06 03:30:28', NULL, 1),
(19, 5, 'Vũ Hoàng Chính', '1', 'vuhoangchinh222@gmail.com', '0987654321', 'Hồ Chí Minh', 'Mua tại quầy', '2024-01-07 23:09:03', 'shop', '2024-01-07 23:09:03', NULL, 1),
(20, 4, 'Vũ Hoàng Chính', '1', 'vuhoangchinh1@gmail.com', '0987654321', 'Hồ Chí Minh', 'Mua tại quầy', '2024-01-07 23:36:16', 'shop', '2024-01-07 23:36:16', NULL, 1),
(21, 4, 'Vũ Hoàng Chính', '1', 'vuhoangchinh1@gmail.com', '0987654321', 'Hồ Chí Minh', 'Mua tại quầy', '2024-01-07 23:37:58', 'shop', '2024-01-07 23:37:58', NULL, 1),
(22, 4, 'Vũ Hoàng Chính', '1', 'vuhoangchinh1@gmail.com', '0987654321', 'Hồ Chí Minh', 'Mua tại quầy', '2024-01-07 23:38:43', 'shop', '2024-01-07 23:38:43', NULL, 1),
(23, 3, 'Khách hàng', '1', 'vuhoangchinh222@gmail.com', '090999', 'BinhDUong', 'Mua tại quầy', '2024-01-07 23:40:33', 'shop', '2024-01-07 23:40:33', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_orderdetail`
--

CREATE TABLE `vhc_orderdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `discount` double NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_orderdetail`
--

INSERT INTO `vhc_orderdetail` (`id`, `order_id`, `product_id`, `price`, `qty`, `discount`, `amount`) VALUES
(1, 1, 1, 10000, 5, 0, 50000),
(2, 1, 2, 10000, 3, 0, 30000),
(3, 1, 3, 10000, 1, 0, 10000),
(4, 2, 1, 10000, 5, 0, 50000),
(5, 2, 2, 10000, 3, 0, 30000),
(6, 2, 3, 10000, 1, 0, 10000),
(7, 3, 1, 10000, 3, 0, 30000),
(8, 3, 2, 10000, 3, 0, 30000),
(9, 4, 1, 10000, 4, 0, 40000),
(10, 4, 2, 10000, 3, 0, 30000),
(11, 4, 3, 10000, 2, 0, 20000),
(12, 4, 4, 10000, 5, 0, 50000),
(13, 5, 1, 10000, 2, 0, 20000),
(14, 5, 2, 10000, 2, 0, 20000),
(15, 6, 1, 378000, 9, 0, 3402000),
(16, 6, 2, 378000, 4, 0, 1512000),
(17, 6, 3, 378000, 5, 0, 1890000),
(18, 7, 1, 378000, 8, 0, 3024000),
(19, 7, 2, 378000, 9, 0, 3402000),
(20, 9, 1005, 2132132, 3, 0, 6396396),
(21, 9, 1002, 234343, 5, 0, 1171715),
(22, 9, 1000, 10000, 4, 0, 40000),
(23, 10, 1005, 2132132, 3, 0, 6396396),
(24, 10, 1002, 234343, 5, 0, 1171715),
(25, 10, 1000, 10000, 4, 0, 40000),
(26, 11, 1005, 2132132, 3, 0, 6396396),
(27, 11, 1002, 234343, 5, 0, 1171715),
(28, 11, 1000, 10000, 4, 0, 40000),
(29, 12, 1005, 2132132, 3, 0, 6396396),
(30, 12, 1002, 234343, 5, 0, 1171715),
(31, 12, 1000, 10000, 4, 0, 40000),
(32, 13, 1005, 2132132, 3, 0, 6396396),
(33, 13, 1002, 234343, 5, 0, 1171715),
(34, 13, 1000, 10000, 4, 0, 40000),
(35, 14, 1005, 2132132, 3, 0, 6396396),
(36, 14, 1002, 234343, 5, 0, 1171715),
(37, 14, 1000, 10000, 4, 0, 40000),
(38, 15, 1005, 2132132, 3, 0, 6396396),
(39, 15, 1002, 234343, 5, 0, 1171715),
(40, 15, 1000, 10000, 4, 0, 40000),
(41, 16, 1005, 2132132, 3, 0, 6396396),
(42, 16, 1002, 234343, 5, 0, 1171715),
(43, 16, 1000, 10000, 4, 0, 40000),
(44, 17, 1005, 2132132, 3, 0, 6396396),
(45, 17, 1002, 234343, 3, 0, 703029),
(46, 17, 1000, 10000, 4, 0, 40000),
(47, 17, 34, 10000, 5, 0, 50000),
(48, 17, 29, 10000, 6, 0, 60000),
(49, 17, 24, 10000, 7, 0, 70000),
(50, 18, 1005, 2132132, 3, 0, 6396396),
(51, 18, 1002, 234343, 3, 0, 703029),
(52, 18, 1000, 10000, 4, 0, 40000),
(53, 18, 34, 10000, 5, 0, 50000),
(54, 18, 29, 10000, 6, 0, 60000),
(55, 18, 24, 10000, 7, 0, 70000),
(56, 19, 1005, 2132132, 5, 0, 10660660),
(57, 19, 1002, 234343, 77, 0, 18044411),
(58, 19, 36, 10000, 88, 0, 880000),
(59, 20, 1000, 10000, 1, 0, 10000),
(60, 20, 1002, 234343, 2, 0, 468686),
(61, 20, 1005, 2132132, 3, 0, 6396396),
(62, 21, 1000, 10000, 1, 0, 10000),
(63, 21, 1002, 234343, 2, 0, 468686),
(64, 21, 1005, 2132132, 3, 0, 6396396),
(65, 22, 1000, 10000, 1, 0, 10000),
(66, 22, 1002, 234343, 2, 0, 468686),
(67, 22, 1005, 2132132, 3, 0, 6396396),
(68, 23, 1005, 2132132, 3, 0, 6396396),
(69, 23, 1002, 234343, 4, 0, 937372),
(70, 23, 1000, 10000, 5, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_post`
--

CREATE TABLE `vhc_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `detail` text NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` enum('post','page') NOT NULL DEFAULT 'post',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_post`
--

INSERT INTO `vhc_post` (`id`, `topic_id`, `title`, `slug`, `detail`, `description`, `image`, `type`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, NULL, 'dsdffd', 'fdfd', 'fdfsdf', 'sadsad', 'fdfd.png', 'post', '2023-10-11 02:25:13', '2023-10-11 02:25:13', 1, NULL, 2),
(2, NULL, 'dsdffd', 'fdfd', 'fdfsdf', 'sadsad', 'fdfd.png', 'post', '2023-10-11 02:25:25', '2023-10-11 02:25:25', 1, NULL, 2),
(3, NULL, 'sads', 'dsad', 'sdsadsd', 'sadsad', 'dsad.png', 'post', '2023-10-11 02:25:41', '2023-10-11 02:25:41', 1, NULL, 2),
(4, 3, 'Tên mới', 'sad', 'sadsdsadsadsd', NULL, 'sad.png', 'post', '2023-10-11 02:27:28', '2023-11-02 19:29:08', 1, NULL, 2),
(5, 3, 'sadsad', 'sdsad', 'sadsd', 'sadsad', 'sdsad.png', 'post', '2023-10-11 04:11:53', '2023-10-11 04:11:53', 1, NULL, 2),
(6, NULL, 'Giới thiệu', 'gioi-thieu', 'Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\n\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\n\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.\r\nTo change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device. Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar.\r\nClick Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them. To change the way a picture fits in your document, click it and a button for layout options appears next to it. When you work on a table, click where you want to add a row or a column, and then click the plus sign. Reading is easier, too, in the new Reading view. You can collapse parts of the document and focus on the text you want. If you need to stop reading before you reach the end, Word remembers where you left off - even on another device.\r\nVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. To make your document look professionally produced, Word provides header, footer, cover page, and text box designs that complement each other. For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the elements you want from the different galleries. Themes and styles also help keep your document coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics change to match your new theme. When you apply styles, your headings change to match the new theme. Save time in Word with new buttons that show up where you need them.', NULL, 'sadsad.png', 'page', '2023-10-16 04:13:20', '2023-11-02 19:03:53', 1, 1, 2),
(7, 3, 'zxZ', 'sadsad', 'zxZx', 'zXZxzx', 'sadsad.png', 'post', '2023-10-16 04:46:54', '2023-10-16 04:46:54', 1, NULL, 2),
(8, 3, 'xzcxc', 'xzcx', 'zcxzc', 'xzcx', 'xzcx.png', 'post', '2023-10-16 04:49:14', '2023-10-16 04:49:14', 1, NULL, 1),
(9, 3, 'xzcxzc', 'xzcxz', 'cxzc', 'xzc', 'xzcxz.png', 'post', '2023-10-16 05:42:29', '2023-10-16 05:42:29', 1, NULL, 1),
(10, NULL, 'sadsds', 'sad', 'sdsds', NULL, '20231103014939.png', 'page', '2023-11-02 18:49:39', '2023-11-02 18:57:34', 1, 1, 2),
(11, NULL, 'Zxz', 'zx', 'zxzxzx', NULL, NULL, 'page', '2023-11-02 18:52:53', '2023-11-02 18:53:28', 1, 1, 2),
(12, NULL, 'sadsa', 'sd', 'sadsd', NULL, NULL, 'page', '2023-11-02 18:59:06', '2023-11-02 19:01:39', 1, 1, 2),
(13, NULL, 'dsasa', 'dsad', 'sadsad', NULL, '20231103020041.png', 'page', '2023-11-02 19:00:41', '2023-11-02 19:00:49', 1, 1, 2),
(14, NULL, 'sd', 'sd', 'sadsads', NULL, '20231103020549.png', 'page', '2023-11-02 19:05:49', '2023-11-02 19:05:49', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_product`
--

CREATE TABLE `vhc_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `detail` text NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(1000) NOT NULL,
  `price` double NOT NULL,
  `pricesale` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_product`
--

INSERT INTO `vhc_product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `detail`, `description`, `image`, `price`, `pricesale`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 3, 1, 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC LỚN MÀU', 'ao-len-nam-totoday-ao-len-soc-lon-mau', '<p>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN SỌC LỚN M&Agrave;U</p>\r\n', 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC LỚN MÀU', 'ao-len-nam-totoday-ao-len-soc-lon-mau.jpg', 378000, 0, '2022-11-22 11:40:37', '2022-11-22 11:40:37', 1, 1, 1),
(2, 3, 1, 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC PHỐI MÀU', 'ao-len-nam-totoday-ao-len-soc-phoi-mau', '<h1>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN SỌC PHỐI M&Agrave;U</h1>\r\n', 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC PHỐI MÀU', 'ao-len-nam-totoday-ao-len-soc-phoi-mau.jpg', 378000, 0, '2022-11-22 11:42:49', '2022-11-22 11:42:49', 1, 1, 1),
(3, 3, 1, 'ÁO LEN NAM - TOTODAY - ÁO LEN TRAFFIC', 'ao-len-nam-totoday-ao-len-traffic', '<h1>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN TRAFFIC</h1>\r\n', 'ÁO LEN NAM - TOTODAY - ÁO LEN TRAFFIC', 'ao-len-nam-totoday-ao-len-traffic.jpg', 378000, 0, '2022-11-22 11:48:35', '2022-11-22 11:48:35', 1, 1, 1),
(4, 3, 1, 'ÁO LEN NAM - TOTODAY - ÁO LEN NHIỀU MÀU', 'ao-len-nam-totoday-ao-len-nhieu-mau', '<h1>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN NHIỀU M&Agrave;U</h1>\r\n', 'ÁO LEN NAM - TOTODAY - ÁO LEN NHIỀU MÀU', 'ao-len-nam-totoday-ao-len-nhieu-mau.jpg', 10000, 0, '2022-11-22 11:49:40', '2022-11-22 11:49:40', 1, 1, 1),
(5, 4, 1, 'ÁO SƠ MI NAM - TOTODAY - THE BASIC', 'ao-so-mi-nam-totoday-the-basic', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - THE BASIC</h1>\r\n', 'ÁO SƠ MI NAM - TOTODAY - THE BASIC', 'ao-so-mi-nam-totoday-the-basic.jpg', 10000, 0, '2022-11-22 12:11:51', '2022-11-22 12:15:16', 1, 1, 1),
(6, 4, 1, 'ÁO SƠ MI NAM - TOTODAY - COOL SHIRT', 'ao-so-mi-nam-totoday-cool-shirt', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - THE BASIC</h1>\r\n', 'ÁO SƠ MI NAM - TOTODAY - COOL SHIRT', 'ao-so-mi-nam-totoday-cool-shirt.jpg', 10000, 0, '2022-11-22 12:11:51', '2022-11-22 12:14:52', 1, 1, 1),
(7, 4, 1, 'ÁO SƠ MI NAM - TOTODAY - SIMPLE SHIRT', 'ao-so-mi-nam-totoday-simple-shirt', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - SIMPLE SHIRT</h1>\r\n', 'ÁO SƠ MI NAM - TOTODAY - SIMPLE SHIRT', 'ao-so-mi-nam-totoday-simple-shirt.jpg', 10000, 0, '2022-11-22 12:16:17', '2022-11-22 12:16:17', 1, 1, 1),
(8, 4, 1, 'ÁO SƠ MI NAM - TOTODAY - FORMAT', 'ao-so-mi-nam-totoday-format', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - FORMAT</h1>\r\n', 'ÁO SƠ MI NAM - TOTODAY - FORMAT', 'ao-so-mi-nam-totoday-format.jpg', 10000, 0, '2022-11-22 12:16:51', '2022-11-22 12:16:51', 1, 1, 1),
(9, 5, 1, 'SHORTS JEAN NAM - TOTODAY - 11203', 'shorts-jean-nam-totoday-11203', '<h1>SHORTS JEAN NAM - TOTODAY - 11203</h1>\r\n', 'SHORTS JEAN NAM - TOTODAY - 11203', 'shorts-jean-nam-totoday-11203.jpg', 10000, 0, '2022-11-22 12:17:53', '2022-11-22 12:17:53', 1, 1, 1),
(10, 5, 1, 'SHORTS JEAN NAM - TOTODAY - 11202', 'shorts-jean-nam-totoday-11202', '<h1>SHORTS JEAN NAM - TOTODAY - 11202</h1>\r\n', 'SHORTS JEAN NAM - TOTODAY - 11202', 'shorts-jean-nam-totoday-11202.jpg', 10000, 0, '2022-11-22 12:19:09', '2022-11-22 12:19:09', 1, 1, 1),
(11, 5, 1, 'SHORTS JEAN NAM - TOTODAY - 11201', 'shorts-jean-nam-totoday-11201', '<h1>SHORTS JEAN NAM - TOTODAY - 11201</h1>\r\n', 'SHORTS JEAN NAM - TOTODAY - 11201', 'shorts-jean-nam-totoday-11201.jpg', 10000, 0, '2022-11-22 12:19:43', '2022-11-22 12:19:43', 1, 1, 1),
(12, 5, 1, 'SHORTS THUN NAM - TOTODAY - FREEDOM TOTODAY', 'shorts-thun-nam-totoday-freedom-totoday', '<h1>SHORTS THUN NAM - TOTODAY - FREEDOM TOTODAY</h1>\r\n', 'SHORTS THUN NAM - TOTODAY - FREEDOM TOTODAY', 'shorts-thun-nam-totoday-freedom-totoday.jpg', 10000, 0, '2022-11-22 12:20:53', '2022-11-22 12:20:53', 1, 1, 1),
(13, 6, 1, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10206', 'quan-jean-nam-slimfit-totoday-10206', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10206</h1>\r\n', 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10206', 'quan-jean-nam-slimfit-totoday-10206.jpg', 10000, 0, '2022-11-22 12:21:58', '2022-11-22 12:21:58', 1, 1, 1),
(14, 6, 1, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10205', 'quan-jean-nam-slimfit-totoday-10205', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10205</h1>\r\n', 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10205', 'quan-jean-nam-slimfit-totoday-10205.jpg', 10000, 0, '2022-11-22 12:22:27', '2022-11-22 12:22:27', 1, 1, 1),
(15, 6, 1, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10204', 'quan-jean-nam-slimfit-totoday-10204', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10204</h1>\r\n', 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10204', 'quan-jean-nam-slimfit-totoday-10204.jpg', 10000, 0, '2022-11-22 12:22:56', '2022-11-22 12:22:56', 1, 1, 1),
(16, 6, 1, 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10203', 'quan-jean-nam-slimfit-totoday-10203', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10203</h1>\r\n', 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10203', 'quan-jean-nam-slimfit-totoday-10203.jpg', 10000, 0, '2022-11-22 12:23:18', '2022-11-22 12:23:18', 1, 1, 1),
(17, 7, 1, 'ÁO THUN W2ATN09203FOSHT', 'ao-thun-w2atn09203fosht', '<h1>&Aacute;O THUN W2ATN09203FOSHT</h1>\r\n', 'ÁO THUN W2ATN09203FOSHT', 'ao-thun-w2atn09203fosht.jpg', 10000, 0, '2022-11-22 12:24:58', '2022-11-22 12:24:58', 1, 1, 1),
(18, 7, 1, 'ÁO THUN W2ATN09201FOSHT', 'ao-thun-w2atn09201fosht', '<h1>&Aacute;O THUN W2ATN09201FOSHT</h1>\r\n', 'ÁO THUN W2ATN09201FOSHT', 'ao-thun-w2atn09201fosht.jpg', 10000, 0, '2022-11-22 12:26:02', '2022-11-22 12:26:02', 1, 1, 1),
(19, 7, 1, 'ÁO THUN W2ATN08213BOSHT', 'ao-thun-w2atn08213bosht', '<h1>&Aacute;O THUN W2ATN08213BOSHT</h1>\r\n', 'ÁO THUN W2ATN08213BOSHT', 'ao-thun-w2atn08213bosht.jpg', 10000, 0, '2022-11-22 12:26:25', '2022-11-22 12:26:25', 1, 1, 1),
(20, 7, 1, 'ÁO THUN W2ATN08210BOSBA', 'ao-thun-w2atn08210bosba', '<h1>&Aacute;O THUN W2ATN08210BOSBA</h1>\r\n', 'ÁO THUN W2ATN08210BOSBA', 'ao-thun-w2atn08210bosba.jpg', 10000, 0, '2022-11-22 12:26:44', '2022-11-22 12:26:44', 1, 1, 1),
(21, 8, 1, 'ÁO SƠMI W2SMD05204BOSTR', 'ao-somi-w2smd05204bostr', '<h1>&Aacute;O SƠMI W2SMD05204BOSTR</h1>\r\n', 'ÁO SƠMI W2SMD05204BOSTR', 'ao-somi-w2smd05204bostr.jpg', 10000, 0, '2022-11-22 12:29:53', '2022-11-22 12:29:53', 1, 1, 1),
(22, 8, 1, 'ÁO SƠMI W2SMN05201BOSTR', 'ao-somi-w2smn05201bostr', '<h1>&Aacute;O SƠMI W2SMN05201BOSTR</h1>\r\n', 'ÁO SƠMI W2SMN05201BOSTR', 'ao-somi-w2smn05201bostr.jpg', 10000, 0, '2022-11-22 12:30:23', '2022-11-22 12:30:23', 1, 1, 1),
(23, 8, 1, 'ÁO SƠMI W2SMD05203BOSTR', 'ao-somi-w2smd05203bostr', '<h1>&Aacute;O SƠMI W2SMD05203BOSTR</h1>\r\n', 'ÁO SƠMI W2SMD05203BOSTR', 'ao-somi-w2smd05203bostr.jpg', 10000, 0, '2022-11-22 12:30:45', '2022-11-22 12:30:45', 1, 1, 1),
(24, 8, 1, 'SET SƠMI W2SET05201FOSCR', 'set-somi-w2set05201foscr', '<h1>SET SƠMI W2SET05201FOSCR</h1>\r\n', 'SET SƠMI W2SET05201FOSCR', 'set-somi-w2set05201foscr.jpg', 10000, 0, '2022-11-22 12:31:09', '2022-11-22 12:31:09', 1, 1, 1),
(25, 10, 1, 'SHORTS JEAN NỮ WASH - TOTODAY - 10205', 'shorts-jean-nu-wash-totoday-10205', '<h1>SHORTS JEAN NỮ WASH - TOTODAY - 10205</h1>\r\n', 'SHORTS JEAN NỮ WASH - TOTODAY - 10205', 'shorts-jean-nu-wash-totoday-10205.jpg', 10000, 0, '2022-11-22 12:34:00', '2022-11-22 12:34:00', 1, 1, 1),
(26, 10, 1, 'SHORTS JEAN NỮ - TOTODAY - 10205', 'shorts-jean-nu-totoday-10205', '<h1>SHORTS JEAN NỮ - TOTODAY - 10205</h1>\r\n', 'SHORTS JEAN NỮ - TOTODAY - 10205', 'shorts-jean-nu-totoday-10205.jpg', 10000, 0, '2022-11-22 12:34:21', '2022-11-22 12:34:21', 1, 1, 1),
(27, 10, 1, 'SHORTS JEAN NỮ - TOTODAY - 10203', 'shorts-jean-nu-totoday-10203', '<h1>SHORTS JEAN NỮ - TOTODAY - 10203</h1>\r\n', 'SHORTS JEAN NỮ - TOTODAY - 10203', 'shorts-jean-nu-totoday-10203.jpg', 10000, 0, '2022-11-22 12:34:52', '2022-11-22 12:34:52', 1, 1, 1),
(28, 10, 1, 'SHORTS JEAN NỮ RÁCH - TOTODAY - 10202', 'shorts-jean-nu-rach-totoday-10202', '<h1>SHORTS JEAN NỮ R&Aacute;CH - TOTODAY - 10202</h1>\r\n', 'SHORTS JEAN NỮ RÁCH - TOTODAY - 10202', 'shorts-jean-nu-rach-totoday-10202.jpg', 10000, 0, '2022-11-22 12:35:13', '2022-11-22 12:35:13', 1, 1, 1),
(29, 11, 1, 'QUẦN JEAN W2QJN05203FBGTR', 'quan-jean-w2qjn05203fbgtr', '<h1>QUẦN JEAN W2QJN05203FBGTR</h1>\r\n', 'QUẦN JEAN W2QJN05203FBGTR', 'quan-jean-w2qjn05203fbgtr.jpg', 10000, 0, '2022-11-22 12:38:14', '2022-11-22 12:38:15', 1, 1, 1),
(30, 11, 1, 'QUẦN JEAN W2QJN05202FBGTR', 'quan-jean-w2qjn05202fbgtr', '<h1>QUẦN JEAN W2QJN05202FBGTR</h1>\r\n', 'QUẦN JEAN W2QJN05202FBGTR', 'quan-jean-w2qjn05202fbgtr.jpg', 10000, 0, '2022-11-22 12:38:39', '2022-11-22 12:38:39', 1, 1, 1),
(31, 11, 1, 'QUẦN JEAN W2QJN05201FBGTR', 'quan-jean-w2qjn05201fbgtr', '<h1>QUẦN JEAN W2QJN05201FBGTR</h1>\r\n', 'QUẦN JEAN W2QJN05201FBGTR', 'quan-jean-w2qjn05201fbgtr.jpg', 10000, 0, '2022-11-22 12:38:59', '2022-11-22 12:38:59', 1, 1, 1),
(32, 11, 1, 'QUẦN JEAN W2QJN04208FBGTR', 'quan-jean-w2qjn04208fbgtr', '<h1>QUẦN JEAN W2QJN04208FBGTR</h1>\r\n', 'QUẦN JEAN W2QJN04208FBGTR', 'quan-jean-w2qjn04208fbgtr.jpg', 10000, 0, '2022-11-22 12:39:47', '2022-11-22 12:39:48', 1, 1, 1),
(33, 12, 1, 'CHÂN VÁY JEAN NỮ - TOTODAY - 10201', 'chan-vay-jean-nu-totoday-10201', '<h1>CH&Acirc;N V&Aacute;Y JEAN NỮ - TOTODAY - 10201</h1>\r\n', 'CHÂN VÁY JEAN NỮ - TOTODAY - 10201', 'chan-vay-jean-nu-totoday-10201.jpg', 10000, 0, '2022-11-22 12:41:15', '2022-11-22 12:41:15', 1, 1, 1),
(34, 12, 1, 'CHÂN VÁY W2CNV06203FOSXL', 'chan-vay-w2cnv06203fosxl', '<h1>CH&Acirc;N V&Aacute;Y W2CNV06203FOSXL</h1>\r\n', 'CHÂN VÁY W2CNV06203FOSXL', 'chan-vay-w2cnv06203fosxl.jpg', 10000, 0, '2022-11-22 12:41:36', '2022-11-22 12:41:36', 1, 1, 1),
(35, 12, 1, 'CHÂN VÁY W2CNV06202FOSXL', 'chan-vay-w2cnv06202fosxl', '<h1>CH&Acirc;N V&Aacute;Y W2CNV06202FOSXL</h1>\r\n', 'CHÂN VÁY W2CNV06202FOSXL', 'chan-vay-w2cnv06202fosxl.jpg', 10000, 0, '2022-11-22 12:41:58', '2022-11-22 12:41:58', 1, 1, 1),
(36, 12, 1, 'CHÂN VÁY W2CNV06201FOSCR', 'chan-vay-w2cnv06201foscr', '<h1>CH&Acirc;N V&Aacute;Y W2CNV06201FOSCR</h1>\r\n', 'CHÂN VÁY W2CNV06201FOSCR', 'chan-vay-w2cnv06201foscr.jpg', 10000, 0, '2022-11-22 12:42:21', '2022-11-22 12:42:21', 1, 1, 1),
(1000, 8, 2, 'sadsacxzcxzcx', 'dsads', 'sadsadcx', NULL, '20231030082650.jpg', 10000, 0, '2023-10-26 20:15:51', '2023-10-30 01:26:50', 1, 1, 1),
(1001, 10, 2, 'fdsf', 'dfsd', 'fdsfdsf', NULL, '20231030081445.jpg', 34234, 0, '2023-10-30 01:14:45', '2023-10-30 01:14:45', 1, NULL, 0),
(1002, 11, 2, 'Ten moi', 'sadsd', 'sadassad', NULL, '20231030081541.jpg', 234343, 0, '2023-10-30 01:15:41', '2023-10-30 01:32:45', 1, 1, 1),
(1003, 9, 2, 'zxx', 'zxx', 'Zxzxzxz', NULL, '20231103020925.png', 21312, 0, '2023-11-02 19:09:25', '2023-11-02 19:09:25', 1, NULL, 0),
(1004, 8, 3, 'xcxzcxc', 'xcxzcxc', 'xzcxc', NULL, '20231103023119.png', 232132, 0, '2023-11-02 19:31:19', '2023-11-02 19:31:19', 1, NULL, 0),
(1005, 11, 3, 'Loi', 'loi', 'xzccx', NULL, '20231103023243.png', 2132132, 0, '2023-11-02 19:32:43', '2023-11-02 19:34:46', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_topic`
--

CREATE TABLE `vhc_topic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_topic`
--

INSERT INTO `vhc_topic` (`id`, `name`, `slug`, `sort_order`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(3, 'Tin tức', 'tin-tuc', 0, 'Mô tả tin tức', '2023-10-16 05:30:30', '2023-10-16 05:33:26', 1, NULL, 1),
(4, 'Dịch vụ', 'dich-vu', 0, 'Chủ đề dịch vụ', '2023-10-16 05:30:48', '2023-10-16 05:33:38', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vhc_user`
--

CREATE TABLE `vhc_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roles` enum('admin','customer') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vhc_user`
--

INSERT INTO `vhc_user` (`id`, `name`, `username`, `password`, `gender`, `phone`, `email`, `roles`, `image`, `address`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Vũ Hoàng Chính', 'admin', '$2y$10$0P0YqcR5euwqb2muHoeUXOnIBxRJDLcAJ5BRe28RpgqEPFH1tBK5u', '1', '098777', 'admin@gmail.com', 'admin', NULL, NULL, NULL, NULL, '2023-10-29 07:24:10', 1, 1, 1),
(3, 'Khách hàng', 'khachhang', '$2y$10$46Al6Lw0BCmUDTCEyrQkL.9XTK8OhWQNE4x3/M6vsWuvqeA2GZZ2a', '1', '090999', 'vuhoangchinh222@gmail.com', 'customer', NULL, 'BinhDUong', NULL, '2023-10-14 04:56:06', '2023-10-29 08:54:49', 1, 1, 2),
(4, 'Vũ Hoàng Chính', 'khach1', '$2y$10$AgC5OIcxdzFi0.NERqcLuenfQRLaXp9kkyAn4jIjpFarMT9atd1h6', '1', '0987654321', 'vuhoangchinh1@gmail.com', 'customer', NULL, 'Hồ Chí Minh', NULL, '2023-10-17 10:01:45', '2023-10-17 10:01:45', 1, NULL, 1),
(5, 'Vũ Hoàng Chính', 'khach3', '$2y$10$2dFQ3JBNHJ28hEz2U36uPO6Ows4KQ0G5Wzuwj4i.nwhrScTUOPcV2', '1', '0987654321', 'vuhoangchinh222@gmail.com', 'customer', NULL, 'Hồ Chí Minh', NULL, '2023-10-17 10:04:20', '2023-10-17 10:04:20', 1, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vhc_banner`
--
ALTER TABLE `vhc_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_brand`
--
ALTER TABLE `vhc_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_category`
--
ALTER TABLE `vhc_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_contact`
--
ALTER TABLE `vhc_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_menu`
--
ALTER TABLE `vhc_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_order`
--
ALTER TABLE `vhc_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_orderdetail`
--
ALTER TABLE `vhc_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_post`
--
ALTER TABLE `vhc_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_product`
--
ALTER TABLE `vhc_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_topic`
--
ALTER TABLE `vhc_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vhc_user`
--
ALTER TABLE `vhc_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vhc_banner`
--
ALTER TABLE `vhc_banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vhc_brand`
--
ALTER TABLE `vhc_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vhc_category`
--
ALTER TABLE `vhc_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `vhc_contact`
--
ALTER TABLE `vhc_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vhc_menu`
--
ALTER TABLE `vhc_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `vhc_order`
--
ALTER TABLE `vhc_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `vhc_orderdetail`
--
ALTER TABLE `vhc_orderdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `vhc_post`
--
ALTER TABLE `vhc_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vhc_product`
--
ALTER TABLE `vhc_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `vhc_topic`
--
ALTER TABLE `vhc_topic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vhc_user`
--
ALTER TABLE `vhc_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

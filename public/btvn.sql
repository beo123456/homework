-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 07, 2021 lúc 10:03 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btvn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'Nam', 'Nam', 0, NULL, NULL),
(2, 'Áo Nam', 'ao-nam', 1, NULL, NULL),
(3, 'Quần Nam', 'quan-nam', 1, NULL, NULL),
(5, 'Nữ', 'Nu', 0, NULL, NULL),
(6, 'Áo Nữ', 'ao-nu', 5, NULL, NULL),
(7, 'Quần Nữ', 'quan-nu', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2021_05_22_075447_create_category_table', 1),
(12, '2021_05_22_142026_create_product_table', 1),
(13, '2021_05_22_143826_create_users_table', 1),
(14, '2021_05_22_143854_create_order_table', 1),
(15, '2021_05_22_143912_create_product_order_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `full` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `full`, `address`, `email`, `phone`, `total`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Đạt', 'Bắc Cạn', 'vandat@gmail.com', '03658879942', '110000', 1, NULL, '2021-06-01 03:38:51'),
(2, 'Nguyễn Tùng Lâm', 'Bắc Ninh', 'tunglam@gmail.com', '03564478214', '110000', 1, NULL, '2021-06-02 03:39:21'),
(3, 'Võ Văn Minh', 'Ninh Bình', 'vanminh@gmail.com', '03214789547', '110000', 1, NULL, '2021-07-05 02:55:11'),
(4, 'Nguyễn thế Kiên', 'Lạng Sơn', 'thekien@gmail.com', '03525246673', '110000', 1, NULL, '2021-07-07 01:12:10'),
(5, 'Trần Đại Công', 'Văn Giang', 'daicong@gmail.com', '0354879500', '110000', 1, NULL, '2021-06-07 03:21:00'),
(35, 'Ngọc Lâm', 'TP HN', 'chip@gmail.com', '0355747529', '70000', 1, '2021-06-16 09:38:59', '2021-06-16 09:39:30'),
(36, 'hoàng dũng122', 'TP HN', 'test@gmail.com', '0397508608', '600000', 1, '2021-07-04 02:32:26', '2021-07-07 07:56:56'),
(37, 'Ngọc Lâm', 'TP HN', 'chip@gmail.com', '03557475291', '800000', 2, '2021-07-07 07:53:28', '2021-07-07 07:53:28'),
(38, 'Ngọc Lâm', 'TP HN', 'chip@gmail.com', '03557475291', '0', 2, '2021-07-07 07:53:28', '2021-07-07 07:53:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,0) NOT NULL DEFAULT 0,
  `featured` tinyint(3) UNSIGNED NOT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `describe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `slug`, `price`, `featured`, `state`, `info`, `describe`, `img`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'SP01', 'Áo Nữ Sơ Mi Chấm Bi', 'ao-nu-so-mi-cham-bi', '50000', 1, 1, NULL, NULL, 'Ao_nu_so_mi_cham_bi.jpg', 6, NULL, NULL),
(2, 'SP02', 'Áo Nữ Phối Viền', 'ao-nu-phoi-vien', '60000', 1, 0, NULL, NULL, 'ao-nu-phoi-vien.jpg', 6, NULL, NULL),
(3, 'SP03', 'Áo Sơ Mi Có Cổ Đúc', 'ao-so-mi-co-co-duc', '70000', 0, 1, NULL, NULL, 'ao-nu-so-mi-co-co-duc.jpg', 6, NULL, NULL),
(4, 'SP04', 'Áo sơ mi caro xám Xanh', 'ao-so-mi-caro-xam-xanh', '80000', 0, 1, NULL, NULL, 'ao-so-mi-ca-ro-xam-xanh-asm1228-10199.jpg', 2, NULL, NULL),
(5, 'SP05', 'Áo Sơ Mi Hoạ Tiết Đen', 'ao-so-mi-hoa-tiet-den', '90000', 0, 1, NULL, NULL, 'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg', 2, NULL, NULL),
(6, 'SP06', 'Áo Sơ Mi Trắng Kem', 'ao-so-mi-trang-kem', '100000', 1, 1, NULL, NULL, 'ao-so-mi-trang-kem-asm836-8193.jpg', 2, NULL, NULL),
(7, 'SP07', 'Quần kaki Đỏ Nam', 'quan-kaki-do-nam', '110000', 1, 1, NULL, NULL, 'quan-kaki-do-man-qk162-8273.jpg', 3, NULL, NULL),
(8, 'SP08', 'Quần kaki Xám', 'quan-kaki-xam', '1200000', 1, 1, NULL, NULL, 'quan-kaki-xam-chuot-dam-qk171-9770.jpg', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_order`
--

CREATE TABLE `product_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,0) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_order`
--

INSERT INTO `product_order` (`id`, `code`, `name`, `price`, `quantity`, `img`, `order_id`) VALUES
(1, 'SP01', 'Áo Nữ Sơ Mi Chấm Bi', '50000', 1, 'Ao_nu_so_mi_cham_bi.jpg', 1),
(2, 'SP02', 'Áo Nữ Phối Viền', '60000', 1, 'ao-nu-phoi-vien.jpg', 1),
(3, 'SP01', 'Áo Nữ Sơ Mi Chấm Bi', '50000', 1, 'Ao_nu_so_mi_cham_bi.jpg', 2),
(4, 'SP02', 'Áo Nữ Phối Viền', '60000', 1, 'ao-nu-phoi-vien.jpg', 2),
(5, 'SP01', 'Áo Nữ Sơ Mi Chấm Bi', '50000', 1, 'Ao_nu_so_mi_cham_bi.jpg', 3),
(6, 'SP02', 'Áo Nữ Phối Viền', '60000', 1, 'ao-nu-phoi-vien.jpg', 3),
(7, 'SP01', 'Áo Nữ Sơ Mi Chấm Bi', '50000', 1, 'Ao_nu_so_mi_cham_bi.jpg', 4),
(8, 'SP02', 'Áo Nữ Phối Viền', '60000', 1, 'ao-nu-phoi-vien.jpg', 4),
(9, 'SP01', 'Áo Nữ Sơ Mi Chấm Bi', '50000', 1, 'Ao_nu_so_mi_cham_bi.jpg', 5),
(54, 'SP03', 'Áo Sơ Mi Có Cổ Đúc', '70000', 1, 'ao-nu-so-mi-co-co-duc.jpg', 35),
(55, 'SP06', 'Áo Sơ Mi Trắng Kem', '100000', 6, 'ao-so-mi-trang-kem-asm836-8193.jpg', 36),
(56, 'SP02', 'Áo Nữ Phối Viền', '60000', 5, 'ao-nu-phoi-vien.jpg', 37),
(57, 'SP06', 'Áo Sơ Mi Trắng Kem', '100000', 5, 'ao-so-mi-trang-kem-asm836-8193.jpg', 37);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full`, `address`, `phone`, `level`, `remember_token`) VALUES
(1, 'admin@gmail.com', '$2y$10$p7YdLOftmhhcJHOT3vv/xeINA1N1SYfgn.2yvARUIaeoserm7uQne', 'admin', 'HN', '0356653301', 1, NULL),
(2, 'dung@gmail.com', '$2y$10$wW.P0RYa1WzLGPRleQCMbOOOjDOwUJoYQ0DvbYNGliBp6T2fOqMde', 'hoang dung', 'Bắc giang', '0356654487', 2, NULL),
(3, 'hoangdinhmanhdung98@gmail.com', '$2y$10$INIoTyJa4Rc/fTXGL8F/IOYnVZKXwk2uLskEuxKb2wvsOz.Sf8qSO', 'Dũng', 'TP HN', '0355747529', 1, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name_unique` (`name`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code_unique` (`code`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_order_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

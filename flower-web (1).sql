-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 29, 2022 lúc 03:39 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `flower-web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `cart_qty` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flowercolor`
--

CREATE TABLE `flowercolor` (
  `flowercolor_id` bigint UNSIGNED NOT NULL,
  `flowercolor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flowertype`
--

CREATE TABLE `flowertype` (
  `flowertype_id` bigint UNSIGNED NOT NULL,
  `flowertype_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `flowertype`
--

INSERT INTO `flowertype` (`flowertype_id`, `flowertype_name`, `created_at`, `updated_at`) VALUES
(1, 'Roses', NULL, NULL),
(2, 'Sunflowers', NULL, NULL),
(3, 'Gerberas', NULL, NULL),
(4, 'Orchids', NULL, NULL),
(5, 'Carnations', NULL, NULL),
(6, 'Lisianthus', NULL, NULL),
(7, 'Lilis', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `occasions`
--

CREATE TABLE `occasions` (
  `occasion_id` bigint UNSIGNED NOT NULL,
  `occasion_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `occasions`
--

INSERT INTO `occasions` (`occasion_id`, `occasion_name`, `created_at`, `updated_at`) VALUES
(1, 'Birthday flowers', '2022-11-25 10:07:22', '2022-11-25 10:07:22'),
(2, 'Grand opening flowers', '2022-11-25 10:07:22', '2022-11-25 10:07:22'),
(3, 'Congratulation flowers', '2022-11-25 10:45:19', '2022-11-25 10:45:19'),
(4, 'Loves', '2022-11-25 10:45:19', '2022-11-25 10:45:19'),
(5, 'Obliging', '2022-11-25 10:45:20', '2022-11-25 10:45:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderitems`
--

CREATE TABLE `orderitems` (
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `total_qty` int NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `Reci_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Reci_phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Reci_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Reci_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_products` int NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `place_on` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `p_transaction_id` bigint NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `p_vnp_response_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`p_transaction_id`, `user_id`, `amount`, `p_vnp_response_code`, `code_bank`, `created_at`, `updated_at`) VALUES
(13915244, 2, '130000000', '00', 'NCB', '2022-12-26 06:27:21', '2022-12-26 06:27:21'),
(13917227, 1, '120000000', '00', 'NCB', '2022-12-28 02:20:57', '2022-12-28 02:20:57'),
(13917252, 1, '60000000', '00', 'NCB', '2022-12-28 02:26:21', '2022-12-28 02:26:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` bigint UNSIGNED NOT NULL,
  `occasion_id` bigint UNSIGNED DEFAULT NULL,
  `flowertype_id` bigint UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `product_design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `occasion_id`, `flowertype_id`, `product_name`, `product_img`, `product_price`, `product_design`, `product_status`) VALUES
(107, 1, 1, 'Tình đầu thơ ngây', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/13262_tinh-dau-tho-ngay.jpg', '250000', 'Bó', 0),
(108, 1, 1, 'Romance 3', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/12490_romance.jpg', '450000', '', 0),
(109, 1, 1, 'Chuyện yêu', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/13376_chuyen-yeu.jpg', '600000', 'Bó', 0),
(110, 1, 1, 'Chuyện của nắng', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/12490_romance.jpg', '750000', 'Bó', 0),
(111, 1, 1, 'Người thương', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/13372_nguoi-thuong.jpg', '350000', 'Bó', 0),
(112, 1, 1, 'All of love', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/8524_all-of-love.jpg', '400000', 'Bó', 0),
(113, 1, 1, 'Only rose premium 3', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/13277_only-rose-premium.jpg', '720000', 'Bó', 0),
(114, 1, 1, 'Gửi ngàn lời yêu', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/13116_gui-ngan-loi-yeu.jpg', '550000', 'Giỏ', 0),
(115, 1, 1, 'You are beautiful', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/10708_you-are-beautiful.jpg', '900000', 'Giỏ', 0),
(116, 1, 1, 'Cutie bear and rose 2', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/13267_cutie-bear-and-rose.jpg', '1200000', 'Giỏ', 0),
(117, 1, NULL, 'The greatest thing', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/13293_the-greatest-thing.jpg', '450000', 'Bó', 0),
(118, 1, NULL, 'Sound of love', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/11610_sound-of-love.jpg', '350000', 'Giỏ', 0),
(119, 1, NULL, 'Đồng hành', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/13192_dong-hanh.jpg', '650000', 'Giỏ', 0),
(120, 1, NULL, 'My Juliet', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/12578_my-juliet.jpg', '1200000', 'Giỏ', 0),
(121, 1, NULL, 'Pink Box', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/8290_pink-box.jpg', '800000', 'Giỏ', 0),
(122, 1, NULL, 'Trong xanh', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-sinh-nhat/13221_trong-xanh.jpg', '1000000', 'Giỏ', 0),
(123, NULL, 1, 'Điều Mong Ước', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/6024_dieu-mong-uoc.jpg', '900000', 'Bình', 0),
(124, NULL, 1, 'Faithful Promise', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/10906_faithful-promise.jpg', '1000000', 'Bình', 0),
(125, NULL, 1, 'Blooming', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/11693_blooming.jpg', '1500000', 'Bình', 0),
(126, NULL, 1, 'Tím thương', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/11568_tim-thuong.jpg', '1700000', 'Bình', 0),
(127, 2, 1, 'Red and pink', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/11561_red-and-pink.jpg', '1700000', 'Bình', 0),
(128, 2, 1, 'Yêu xa', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/3199_yeu-xa.jpg', '250000', 'Bó', 0),
(129, 2, 1, 'Tình Yêu Màu Nắng', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/8819_tinh-yeu-mau-nang.jpg', '850000', 'Bình', 0),
(130, 2, 1, 'Ao ước', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/11614_ao-uoc.jpg', '400000', 'Bình', 0),
(131, 2, 1, 'Hy Vọng', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/5129_hy-vong.jpg', '650000', 'Bình', 0),
(132, 2, 1, 'Tiếp bước', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/11567_tiep-buoc.jpg', '2500000', 'Bình', 0),
(133, 2, 1, 'Bright sky', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/8042_bright-sky.jpg', '780000', 'Bình', 0),
(134, 2, 1, 'Red box', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/8289_red-box.jpg', '1600000', 'Bình', 0),
(135, 2, 1, 'Green Dream', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/4924_green-dream.jpg', '600000', 'Bình', 0),
(136, 2, 1, 'An lành', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/11569_an-lanh.jpg', '1400000', 'Bình', 0),
(137, 2, 1, 'Chúc mừng thành công', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/11563_chuc-mung-thanh-cong.jpg', '1800000', 'Bình', 0),
(138, 2, 1, 'Ngày may mắn', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-hong/11577_ngay-may-man.jpg', '1650000', 'Bình', 0),
(139, 2, NULL, 'Song hành 2', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/12889_song-hanh.jpg', '700000', 'Bình', 0),
(140, 2, NULL, 'Party', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/13223_party.jpg', '950000', 'Giỏ', 0),
(141, 2, 2, 'Thăng hoa', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/4611_thang-hoa.jpg', '1000000', 'Bình', 0),
(142, 2, 2, 'Sun flower', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/8040_sun-flower.jpg', '600000', 'Bó', 0),
(143, 2, 2, 'Sum họp', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/4520_sum-hop.jpg', '600000', 'Bó', 0),
(144, 2, 2, 'Rising', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/12479_rising.jpg', '1100000', 'Bó', 0),
(145, 2, 2, 'Trường Tồn Mãi Mãi', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/5859_truong-ton-mai-mai.jpg', '3300000', 'Lãnh', 0),
(146, 2, 2, 'Thành Đạt', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/5263_thanh-dat.jpg', '1200000', 'Lãnh', 0),
(147, 2, 2, 'Success Flowers ', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/5136_success-flowers.jpg', '1320000', 'Lãnh', 0),
(148, 2, 2, 'Nỗ lực tiến bước', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/11570_no-luc-tien-buoc.jpg', '4500000', 'Lãnh', 0),
(149, 2, 2, 'Khởi Đầu Hoàn Hảo', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/5098_khoi-dau-hoan-hao.jpg', '3300000', 'Lãnh', 0),
(150, 2, 2, 'Khai Trương Lộc Phát', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/5403_khai-truong-loc-phat.jpg', '2000000', 'Lãnh', 0),
(151, 2, 3, 'Mãi yêu', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/11612_mai-yeu.jpg', '450000', 'Giỏ', 0),
(152, 2, 3, 'Good Luck 3', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/4047_good-luck.jpg', '700000', 'Lãnh', 0),
(153, 2, 3, 'Hưng Thịnh 4', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/3967_hung-thinh.jpg', '1000000', 'Lãnh', 0),
(154, 2, 3, 'Good Luck 1', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/3965_good-luck.jpg', '800000', 'Lãnh', 0),
(155, 2, 3, 'Congratulations 2', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/7246_congratulations.jpg', '1000000', 'Lãnh', 0),
(156, 2, 3, 'Phát lộc', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/4369_phat-loc.jpg', '1300000', 'Lãnh', 0),
(157, 2, 3, 'Khai Trương Hồng Phát', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/8795_khai-truong-hong-phat.jpg', '1100000', 'Lãnh', 0),
(158, 2, 3, 'Phồn Vinh', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/5525_phon-vinh.jpg', '1900000', 'Lãnh', 0),
(159, 2, 3, 'Khởi đầu thuận lợi', 'https://hoayeuthuong.com/hinh-hoa-tuoi/hoa-khai-truong/11571_khoi-dau-thuan-loi.jpg', '4000000', 'Lãnh', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token_expire` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `email_verified_at`, `token`, `password`, `google_id`, `role`, `remember_token`, `created_at`, `updated_at`, `token_expire`) VALUES
(1, 'quang', 'lozzradio123@gmail.com', '0977719969', '26B Mai Văn Vinh phường Tân Quy Q.7', NULL, NULL, '$2y$10$KuIIlusWOZqBkepDZm5HQuTinWd3j57Jx1UN/6ivtLcIwEE8IU4r2', NULL, 1, NULL, '2022-11-25 06:31:44', '2022-12-25 08:38:06', NULL),
(2, 'quang', 'quang1@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$r2njOazbhy50AhjbsEfOJ.8oWmBHIDureuqd8vvHXofINKD0gDIM6', NULL, 0, NULL, '2022-12-26 05:33:17', '2022-12-26 05:33:17', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`product_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`,`product_id`) USING BTREE;

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `flowercolor`
--
ALTER TABLE `flowercolor`
  ADD PRIMARY KEY (`flowercolor_id`);

--
-- Chỉ mục cho bảng `flowertype`
--
ALTER TABLE `flowertype`
  ADD PRIMARY KEY (`flowertype_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `occasions`
--
ALTER TABLE `occasions`
  ADD PRIMARY KEY (`occasion_id`);

--
-- Chỉ mục cho bảng `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_id`,`product_id`) USING BTREE,
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`p_transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `flowertype_id` (`flowertype_id`),
  ADD KEY `occasion_id` (`occasion_id`);

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
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `flowercolor`
--
ALTER TABLE `flowercolor`
  MODIFY `flowercolor_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `flowertype`
--
ALTER TABLE `flowertype`
  MODIFY `flowertype_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `occasions`
--
ALTER TABLE `occasions`
  MODIFY `occasion_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `order_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`flowertype_id`) REFERENCES `flowertype` (`flowertype_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`occasion_id`) REFERENCES `occasions` (`occasion_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 01:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dineout_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `is_payed` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `is_payed`, `created_at`, `updated_at`) VALUES
(1, 3, 0, '2025-01-13 08:18:56', '2025-01-13 08:18:56'),
(2, 4, 1, '2025-01-13 08:21:44', '2025-01-13 08:32:00'),
(3, 4, 1, '2025-01-13 08:42:05', '2025-01-13 08:42:14'),
(4, 4, 1, '2025-01-13 08:43:34', '2025-01-13 08:43:43'),
(5, 2, 1, '2025-01-13 09:29:11', '2025-01-13 09:29:19'),
(7, 9, 1, '2025-01-14 13:46:40', '2025-01-14 13:47:16'),
(8, 9, 0, '2025-01-14 13:48:13', '2025-01-14 13:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `restaurant_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(1, 'فست فود', '2', '2025-01-13 07:50:24', '2025-01-13 07:50:24'),
(2, 'سنتی', '2', '2025-01-13 07:50:43', '2025-01-13 07:50:43'),
(3, 'دریایی', '3', '2025-01-13 08:15:44', '2025-01-13 08:15:44'),
(5, 'test', '8', '2025-01-14 13:42:57', '2025-01-14 13:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `factors`
--

CREATE TABLE `factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL,
  `totalPrice` double NOT NULL,
  `address` text NOT NULL,
  `orderDescribtion` text DEFAULT NULL,
  `admin_status` varchar(255) NOT NULL DEFAULT 'در حال آماده سازی',
  `basket_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `factors`
--

INSERT INTO `factors` (`id`, `name`, `phoneNumber`, `totalPrice`, `address`, `orderDescribtion`, `admin_status`, `basket_id`, `restaurant_name`, `created_at`, `updated_at`) VALUES
(1, 'مشتری شماره 1', '09179991234', 85000, 'شیراز شهرک اندیشه', 'گرم سرو بشه با روغن کم', 'در حال آماده سازی', 2, 'رستوران تهران', '2025-01-13 08:32:00', '2025-01-13 08:32:00'),
(2, 'مشتری شماره 1', '09179991234', 85000, 'شیراز شهرک اندیشه', NULL, 'در حال آماده سازی', 3, 'رستوران تهران', '2025-01-13 08:42:14', '2025-01-13 08:42:14'),
(3, 'مشتری شماره 1', '09179991234', 22000, 'شیراز شهرک اندیشه', NULL, 'در حال آماده سازی', 4, 'پدیده شاندیز', '2025-01-13 08:43:43', '2025-01-13 08:43:43'),
(4, 'مدیر رستوران پدیده شاندیز', '09179992898', 135000, 'ادرس رستوران', NULL, 'در حال آماده سازی', 5, 'رستوران تهران', '2025-01-13 09:29:19', '2025-01-13 09:29:19'),
(5, 'user', '09171234123', 5555, 'test', NULL, 'در حال آماده سازی', 7, 'restaurant name', '2025-01-14 13:47:16', '2025-01-14 13:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `entity` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `restaurant_id` varchar(255) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `image`, `status`, `entity`, `description`, `price`, `restaurant_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'هات داگ ویژه', '1736767325-download (1).jfif', '1', '12', 'هات داگ ویژه - 90 درصد گوشت- پنیر پیتزا - قارچ', 22000, '1', 'فست فود', '2025-01-13 07:52:05', '2025-01-13 07:52:05'),
(2, 'برنج شمالی', '1736768731-download (2).jfif', '1', '13', 'برنج شمالی اصل', 85000, '2', 'سنتی', '2025-01-13 08:15:31', '2025-01-13 08:15:31'),
(3, 'ماهی کبابی', '1736768801-download (3).jfif', '1', '7', 'ماهی کبابی به همراه برنج ایرانی اص و دور چین', 135000, '2', 'دریایی', '2025-01-13 08:16:41', '2025-01-13 08:16:41'),
(6, 'editdtesting food', '1736874834-download.png', '1', '512', 'description', 5555, '5', 'test', '2025-01-14 13:43:54', '2025-01-14 13:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_11_23_223757_add_phone_and_address_to_users_table', 1),
(7, '2024_11_29_001036_create_restaurants_table', 1),
(8, '2024_11_29_205423_create_food_table', 1),
(9, '2024_11_30_110922_create_categories_table', 1),
(10, '2024_12_05_122825_create_baskets_table', 1),
(11, '2024_12_05_123046_create_products_baskets_table', 1),
(12, '2024_12_05_220540_create_factors_table', 1),
(13, '2024_12_13_011300_create_new_addresses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_addresses`
--

CREATE TABLE `new_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_addresses`
--

INSERT INTO `new_addresses` (`id`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'ادرس رستوران', '2', '2025-01-13 07:49:44', '2025-01-13 07:49:44'),
(4, 'ادرس دوم', '7', '2025-01-14 11:15:16', '2025-01-14 11:15:16'),
(6, 'new address', '8', '2025-01-14 13:45:14', '2025-01-14 13:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_baskets`
--

CREATE TABLE `products_baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foods_id` bigint(20) UNSIGNED DEFAULT NULL,
  `basket_id` bigint(20) UNSIGNED NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_baskets`
--

INSERT INTO `products_baskets` (`id`, `foods_id`, `basket_id`, `count`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, '2025-01-13 08:20:23', '2025-01-13 08:20:23'),
(3, 3, 1, 1, '2025-01-13 08:20:28', '2025-01-13 08:20:28'),
(11, 2, 2, 1, '2025-01-13 08:31:37', '2025-01-13 08:31:37'),
(12, 2, 3, 1, '2025-01-13 08:42:05', '2025-01-13 08:42:05'),
(13, 1, 4, 1, '2025-01-13 08:43:34', '2025-01-13 08:43:34'),
(14, 3, 5, 1, '2025-01-13 09:29:11', '2025-01-13 09:29:11'),
(16, 6, 7, 1, '2025-01-14 13:46:40', '2025-01-14 13:46:40'),
(17, 1, 8, 1, '2025-01-14 13:48:13', '2025-01-14 13:48:13'),
(18, 2, 8, 1, '2025-01-14 13:49:03', '2025-01-14 13:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `master_id` varchar(255) NOT NULL,
  `restaurant_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `master_id`, `restaurant_address`, `created_at`, `updated_at`) VALUES
(1, 'پدیده شاندیز', '2', 'مشهد بلوار امام رضای 2', '2025-01-13 07:48:00', '2025-01-13 07:49:11'),
(2, 'رستوران تهران', '3', 'تهران شهرک غرب', '2025-01-13 08:13:14', '2025-01-13 08:13:14'),
(3, 'restaurant test', '6', 'address of restaurant', '2025-01-14 11:07:39', '2025-01-14 11:07:39'),
(5, 'restaurant name', '8', 'restaurant address', '2025-01-14 13:42:26', '2025-01-14 13:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `RoleAdmin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `phone`, `RoleAdmin`) VALUES
(1, 'shayan', 'moradis742@gmail.com', NULL, '$2y$10$NxsLuQkqF56IpJ0nLdhmdOeax/NW3Or17lo.zRGm25BJW.7d57al2', NULL, '2025-01-13 07:11:08', '2025-01-13 07:11:08', 'shiraz', '09179992797', 'admin'),
(2, 'مدیر رستوران پدیده شاندیز', 'padide@gmail.com', NULL, '$2y$10$/MVHozODH9KF59HB13sesO9wFmRmiqh4Ds8D6wuCFEcEnaaEXtyam', NULL, '2025-01-13 07:47:16', '2025-01-13 07:47:16', 'مشهد', '09179992898', 'master'),
(3, 'مدیر شماره دو', 'master@gmail.com', NULL, '$2y$10$7SBUy96qcnjmN3341Iyhfe/NykgnRtKb9EExuU9sZg1v9Aq1tPGFa', NULL, '2025-01-13 08:07:50', '2025-01-13 08:07:50', 'tehran', '09179992999', 'master'),
(4, 'مشتری شماره 1', 'moradis@gmail.com', NULL, '$2y$10$Z8q.dOmIFeeSJIcw.EiIqu.tOrTmr8pQ17ow/7JY4Egm2sZa4guNW', NULL, '2025-01-13 08:21:28', '2025-01-13 08:21:28', 'شیراز شهرک اندیشه', '09179991234', NULL),
(5, 'مشتری شماره 2', 'client@gmail.com', NULL, '$2y$10$VpVW3xPUrstc7f3F1gsJFOrwg89wZFZAzP8AFV8sQ/K2M8rdpedHS', NULL, '2025-01-13 08:35:47', '2025-01-13 08:35:47', 'fars lar', '09174321', NULL),
(8, 'editedmaster test', 'testing@gmail.com', NULL, '$2y$10$1S4rimclsZzHN0TpSTOtNOFlC/BDQg3fFcp44rV2S0Gcinbo.d2UC', NULL, '2025-01-14 13:41:50', '2025-01-14 13:44:57', 'editedtesting address', '09177092930', 'master'),
(9, 'user', 'user@gmail.com', NULL, '$2y$10$mm/tFkVx/cmBF8RE0BWCcepBqOUqO6XxPrXWZG/iMKeL/edOlj0Si', NULL, '2025-01-14 13:46:04', '2025-01-14 13:46:04', 'test', '09171234123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baskets_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factors`
--
ALTER TABLE `factors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factors_basket_id_foreign` (`basket_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_addresses`
--
ALTER TABLE `new_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products_baskets`
--
ALTER TABLE `products_baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_baskets_foods_id_foreign` (`foods_id`),
  ADD KEY `products_baskets_basket_id_foreign` (`basket_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `factors`
--
ALTER TABLE `factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `new_addresses`
--
ALTER TABLE `new_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_baskets`
--
ALTER TABLE `products_baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `baskets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `factors`
--
ALTER TABLE `factors`
  ADD CONSTRAINT `factors_basket_id_foreign` FOREIGN KEY (`basket_id`) REFERENCES `baskets` (`id`);

--
-- Constraints for table `products_baskets`
--
ALTER TABLE `products_baskets`
  ADD CONSTRAINT `products_baskets_basket_id_foreign` FOREIGN KEY (`basket_id`) REFERENCES `baskets` (`id`),
  ADD CONSTRAINT `products_baskets_foods_id_foreign` FOREIGN KEY (`foods_id`) REFERENCES `food` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

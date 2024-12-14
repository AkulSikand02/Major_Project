-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2023 at 03:21 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `machine`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

DROP TABLE IF EXISTS `machines`;
CREATE TABLE IF NOT EXISTS `machines` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'electronics', '2023-10-07 02:49:49', '2023-10-07 02:49:49'),
(2, 'medicnes', '2023-10-07 02:49:55', '2023-10-07 02:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `machine_slots`
--

DROP TABLE IF EXISTS `machine_slots`;
CREATE TABLE IF NOT EXISTS `machine_slots` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `machine_slots_machine_id_foreign` (`machine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_slots`
--

INSERT INTO `machine_slots` (`id`, `title`, `machine_id`, `created_at`, `updated_at`) VALUES
(1, 'laptop', 1, '2023-10-07 02:50:16', '2023-10-07 02:50:16'),
(2, 'phones', 1, '2023-10-07 02:50:23', '2023-10-07 02:50:23'),
(3, 'tablets', 2, '2023-10-07 02:50:38', '2023-10-07 02:50:38'),
(4, 'capsules', 2, '2023-10-07 02:50:46', '2023-10-07 02:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `machine_slot_items`
--

DROP TABLE IF EXISTS `machine_slot_items`;
CREATE TABLE IF NOT EXISTS `machine_slot_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_slot_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `machine_slot_items_machine_slot_id_foreign` (`machine_slot_id`),
  KEY `machine_slot_items_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_slot_items`
--

INSERT INTO `machine_slot_items` (`id`, `title`, `price`, `image`, `quantity`, `machine_slot_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Blanditiis aut expli', '245', 'item_images/works-3480187_1920.jpg', '1', 1, 1, '2023-10-07 04:15:16', '2023-10-29 07:39:15'),
(2, 'Ex saepe sit quo id', '684', 'item_images/works-3480187_1920.jpg', '886', 1, 1, '2023-10-07 04:15:30', '2023-10-29 07:39:15'),
(3, 'Ut in alias culpa ni', '41', 'item_images/handyman-3094035_1280.jpg', '348', 2, 1, '2023-10-07 04:18:03', '2023-10-07 04:18:03'),
(4, 'In distinctio Lauda', '610', 'item_images/industrial-construction-company.jpg', '117', 1, 2, '2023-10-07 04:50:46', '2023-10-29 07:39:15'),
(5, 'Enim voluptatem dolo', '437', 'item_images/download.jpeg', '255', 3, 1, '2023-10-08 02:05:33', '2023-10-08 02:05:33'),
(6, 'Exercitation sit omn', '543', 'item_images/download (1).jpeg', '291', 4, 1, '2023-10-08 02:06:05', '2023-10-08 02:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `machine_users`
--

DROP TABLE IF EXISTS `machine_users`;
CREATE TABLE IF NOT EXISTS `machine_users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `machine_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `machine_users_machine_id_foreign` (`machine_id`),
  KEY `machine_users_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machine_users`
--

INSERT INTO `machine_users` (`id`, `machine_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 1, 3, '2023-10-08 02:21:39', '2023-10-08 02:21:39'),
(7, 1, 2, '2023-10-08 02:21:39', '2023-10-08 02:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_06_043738_create_machines_table', 1),
(6, '2023_10_06_043927_create_machnine_slots_table', 1),
(7, '2023_10_06_044132_create_machnine_slot_items_table', 1),
(8, '2023_10_06_172449_create_promotions_table', 1),
(9, '2023_10_07_071537_create_machine_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_on_machine` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `image`, `description`, `display_on_machine`, `created_at`, `updated_at`) VALUES
(10, 'Sed deleniti quae si edited', 'promotions/new.jpg', 'Ratione quod assumen', 1, '2023-10-08 01:31:16', '2023-10-08 02:22:15'),
(12, 'Adipisci velit volup', 'promotions/third.jpg', 'Perspiciatis recusa', 1, '2023-10-08 01:37:27', '2023-10-08 01:37:27'),
(11, 'Aut nemo eiusmod sit', 'promotions/second.jpg', 'Autem omnis est qua', 1, '2023-10-08 01:37:14', '2023-10-08 01:37:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$MFRgQY/gPyJ1xAHLLb51V.4Bu9DlG3iSYTXan/RgCiNr0HMJlE8/W', NULL, '1', '2023-10-07 02:48:31', '2023-10-07 02:48:31'),
(2, 'Hall Wise', 'seller@seller.com', NULL, '$2y$10$MFRgQY/gPyJ1xAHLLb51V.4Bu9DlG3iSYTXan/RgCiNr0HMJlE8/W', NULL, '2', '2023-10-07 02:57:05', '2023-10-07 02:57:05'),
(3, 'Gabriel Dickson', 'culiwuwa@mailinator.com', NULL, '$2y$10$l0IWj4UMJZ9RhisnJWg23.BnrpbvRHdSUwnCuDGi62mjUjnnUVu9q', NULL, '2', '2023-10-07 02:57:12', '2023-10-07 02:57:12'),
(4, 'Kellie Quinn', 'vularada@mailinator.com', NULL, '$2y$10$yl3O4n68Luiml0ygNkvFUuTmoYQPx9GnsJaxET5n7vJ71X5Fn4Lna', NULL, '2', '2023-10-08 02:21:29', '2023-10-08 02:21:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

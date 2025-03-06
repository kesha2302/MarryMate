-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 04:41 AM
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
-- Database: `marrymate`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpackage`
--

CREATE TABLE `adminpackage` (
  `ap_id` bigint(20) UNSIGNED NOT NULL,
  `service_ids` varchar(255) DEFAULT NULL,
  `package_ids` varchar(255) DEFAULT NULL,
  `package_name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `totalcost` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminpackage`
--

INSERT INTO `adminpackage` (`ap_id`, `service_ids`, `package_ids`, `package_name`, `description`, `totalcost`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '5', '1', 'Testing Package', 'testing', 15000, '2025-02-25 05:06:07', '2025-02-27 05:11:57', NULL),
(2, '5,4', '', 'Engagemet Package', 'This is engagement package', 15000, '2025-02-27 01:14:43', '2025-02-28 03:54:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `em_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event_dates` varchar(255) NOT NULL,
  `totalprice` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_manager`
--

CREATE TABLE `event_manager` (
  `em_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `AadharCard` varchar(255) NOT NULL,
  `PanCard` varchar(255) NOT NULL,
  `other_document` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_manager`
--

INSERT INTO `event_manager` (`em_id`, `user_id`, `business_type`, `business_name`, `description`, `AadharCard`, `PanCard`, `other_document`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, '', 'Kinjal Decors', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas rerum earum sunt sed hic ab. Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', '1739772459AC.pdf', '1739772459PC.pdf', '1739772459OTH.pdf', '0', '2025-02-17 00:37:39', '2025-02-17 00:37:39');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_14_040318_create_user_table_table', 2),
(5, '2025_02_14_040447_create_vendors_table', 2),
(6, '2025_02_14_040504_create_event_manager_table', 2),
(7, '2025_02_14_040522_create_services_table', 2),
(8, '2025_02_14_040612_create_pre_packages_table', 2),
(9, '2025_02_14_040640_create_bookings_table', 2),
(10, '2025_02_14_040653_create_payments_table', 2),
(11, '2025_02_14_051619_create_reviews_table', 2),
(12, '2025_02_19_044707_add_deleted_at_to_services_table', 3),
(13, '2025_02_20_051407_add_business_type_to_vendors_table', 4),
(14, '2025_02_20_051449_add_business_type_to_event_manager_table', 4),
(15, '2025_02_20_051715_add_business_type_to_vendors_table', 5),
(16, '2025_02_21_034944_add_status_to_services_table', 6),
(17, '2025_02_21_040025_add_status_to_pre_packages_table', 6),
(18, '2025_02_21_062618_add_deleted_at_to_pre_packages_table', 7),
(19, '2025_02_25_051529_create_adminpackage_table', 8),
(20, '2025_02_27_100759_add_deleted_at_to_adminpackage', 9);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_packages`
--

CREATE TABLE `pre_packages` (
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `em_id` bigint(20) UNSIGNED DEFAULT NULL,
  `package_name` varchar(255) NOT NULL,
  `service_types` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `images` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_packages`
--

INSERT INTO `pre_packages` (`package_id`, `vendor_id`, `em_id`, `package_name`, `service_types`, `description`, `price`, `images`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, 'Full Wedding catering', 'Catering available for Sangeet, Haldi and Wedding', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', 5000, '1740122596img1.jpg,1740122596img2.jpg,1740122596img3.jpg', '1', '2025-02-21 01:53:16', '2025-02-21 01:53:42', NULL),
(2, 3, NULL, 'Full Wedding Package', 'Makeup and Hairstyle for Haldi, Sangeet and Marriage', 'Lorem ipsum dolor sit amet consecttas rerum earum sunt sed hic ab. Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', 20000, '1740718105img1.jpeg,1740718105img2.jpg,1740718105img3.jpg', '1', '2025-02-27 23:18:25', '2025-02-27 23:18:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `em_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` bigint(20) NOT NULL,
  `images` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `vendor_id`, `service_type`, `description`, `price`, `images`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Wedding Decoration', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas rerum earum sunt sed hic ab. Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', 15000, '1739947953img1.jpg,1739947953img2.jpg,1739947953img3.jpg,1739947953img4.jpg', '0', '2025-02-19 01:22:33', '2025-02-21 00:02:14', NULL),
(2, 2, 'Dinner Catering', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas rerum earum sunt sed hic ab. Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', 20000, '1740033047img1.jpg,1740033047img2.jpg', '1', '2025-02-20 01:00:47', '2025-02-20 01:00:47', NULL),
(3, 2, 'Lunch Catering', 'Wedding Luch Catering maximum people 100', 10000, '1740048497img1.jpg,1740048717img1.jpg', '1', '2025-02-20 01:11:53', '2025-02-21 00:20:31', NULL),
(4, 3, 'Bridal Makeup', 'Wedding Calander hoop with names and date', 5000, '1740380722img1.jpg', '1', '2025-02-24 01:35:22', '2025-02-24 01:35:22', NULL),
(5, 2, 'Engagement Catering', 'Lorem ipsum dolor sit amet us vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', 10000, '1740380872img1.jpg,1740380872img2.jpg', '1', '2025-02-24 01:37:52', '2025-02-24 01:37:52', NULL),
(6, 3, 'Engagement Makeup and Hairstyle', 'Lorem ipsum dolor sit ametnt sed hiantium nulla corvelit necessitatibus, obcaecati tempora reprehenderit itaque.', 8000, '1740717605img1.jpeg,1740717605img2.jpg', '1', '2025-02-27 23:10:05', '2025-02-27 23:10:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('c3hEAa1MwHpLyqs81xHGNkwSL71FClzZ0BiNwsYr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFlmSXZzYXZoaUN4UzZnazFIeW03WHJ2WWd2YXd3OU5PNHVhSkIyRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9DdXN0b21QYWNrYWdlZm9ybSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741146784),
('QIh9yvPSHXnmwZVEZays3geXH7CD4bLo6bA5kQn9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHIzdHNKeERhTlFXc1o4ZFU1TUhhNk5nODRyblYyUW0wM0lIMms0MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9DdXN0b21QYWNrYWdlZm9ybSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741170830),
('VyD3SXxV5t65JVV2HzOZKEYJQMP8BhHIWgYjhH46', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGtlejgyaUtIMHdSeXFEZEdDZm5BUWhvTXVuMGJwQU1XUmF2VUk4MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9DdXN0b21QYWNrYWdlZm9ybSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741170965),
('ZENxW1xwZnlgF17Lewel93fTZux01aQvLgJHgoZT', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWlFWVhURnJjQmRXYjY0T3pRVFZ4ZmlaTndUZldPeXlsNGN4ZXlLNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9DdXN0b21QYWNrYWdlZm9ybSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741163559);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` bigint(20) NOT NULL,
  `address` varchar(600) DEFAULT NULL,
  `role_as` enum('C','V','EM') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `name`, `email`, `password`, `contact`, `address`, `role_as`, `created_at`, `updated_at`) VALUES
(5, 'Kinjal Shah', '89kinjalshah@gmail.com', NULL, 987654321, NULL, 'EM', '2025-02-17 00:37:39', '2025-02-17 00:37:39'),
(6, 'Kirti M Sharma', 'keshapatel2302@gmail.com', NULL, 987654321, NULL, 'V', '2025-02-17 00:43:34', '2025-02-21 00:02:14'),
(7, 'Kesha Patel', 'keshapatel6542@gmail.com', '$2y$12$39BYVYB5liWJuYWMlfTUte5NJsjBXCfmXIE/BiN6dOHTc0TNXVl8a', 987654321, '10 Raj park', 'C', '2025-02-18 00:24:53', '2025-02-18 00:24:53'),
(8, 'Gayatri Patel', 'keshapatel4523@gmail.com', '$2y$12$w2k5hddPQ0vEdBMNcRoGoOXQyX.0KEIbDh17EtsItFP6YY./U3qWC', 987542343, NULL, 'V', '2025-02-20 00:23:02', '2025-02-20 00:31:17'),
(9, 'Anjali Patel', 'anjali123@gmail.com', '$2y$12$CWK5iWz7Bbrey6l1nv7gQ.alZ6xS0WdG7S/eRTZ/l2hjCVm/ETmMi', 987654321, NULL, 'V', '2025-02-24 01:30:16', '2025-02-24 01:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `AadharCard` varchar(255) NOT NULL,
  `PanCard` varchar(255) NOT NULL,
  `other_document` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `user_id`, `business_type`, `business_name`, `description`, `AadharCard`, `PanCard`, `other_document`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Decorator', 'Kirti Wedding Decors', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas rerum earum sunt sed hic ab. Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', '1739772814AC.pdf', '1739772814PC.pdf', '1739772814OTH.pdf', '0', '2025-02-17 00:43:34', '2025-02-21 00:02:14'),
(2, 8, 'Catering', 'Gayatri Caterers', 'Hic temporibus vitae soluta. Laudantium nulla corporis amet nostrum velit necessitatibus, obcaecati tempora reprehenderit itaque.', '1740030782AC.pdf', '1740030782PC.pdf', '1740030782OTH.pdf', '1', '2025-02-20 00:23:02', '2025-02-20 00:31:17'),
(3, 9, 'Saloon', 'Anjali Saloon', 'Wedding Calander hoop with names and date', '1740380416AC.pdf', '1740380416PC.pdf', '1740380416OTH.pdf', '1', '2025-02-24 01:30:16', '2025-02-24 01:31:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminpackage`
--
ALTER TABLE `adminpackage`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_vendor_id_foreign` (`vendor_id`),
  ADD KEY `bookings_em_id_foreign` (`em_id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`),
  ADD KEY `bookings_package_id_foreign` (`package_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `event_manager`
--
ALTER TABLE `event_manager`
  ADD PRIMARY KEY (`em_id`),
  ADD KEY `event_manager_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `pre_packages`
--
ALTER TABLE `pre_packages`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `pre_packages_vendor_id_foreign` (`vendor_id`),
  ADD KEY `pre_packages_em_id_foreign` (`em_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_vendor_id_foreign` (`vendor_id`),
  ADD KEY `reviews_em_id_foreign` (`em_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `services_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `vendors_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminpackage`
--
ALTER TABLE `adminpackage`
  MODIFY `ap_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_manager`
--
ALTER TABLE `event_manager`
  MODIFY `em_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pre_packages`
--
ALTER TABLE `pre_packages`
  MODIFY `package_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_em_id_foreign` FOREIGN KEY (`em_id`) REFERENCES `event_manager` (`em_id`),
  ADD CONSTRAINT `bookings_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `pre_packages` (`package_id`),
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`),
  ADD CONSTRAINT `bookings_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Constraints for table `event_manager`
--
ALTER TABLE `event_manager`
  ADD CONSTRAINT `event_manager_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`),
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);

--
-- Constraints for table `pre_packages`
--
ALTER TABLE `pre_packages`
  ADD CONSTRAINT `pre_packages_em_id_foreign` FOREIGN KEY (`em_id`) REFERENCES `event_manager` (`em_id`),
  ADD CONSTRAINT `pre_packages_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_em_id_foreign` FOREIGN KEY (`em_id`) REFERENCES `event_manager` (`em_id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`),
  ADD CONSTRAINT `reviews_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

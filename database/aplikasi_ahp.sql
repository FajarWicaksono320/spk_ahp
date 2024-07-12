-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 08:57 AM
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
-- Database: `aplikasi_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `tourism_object_id` bigint(20) UNSIGNED NOT NULL,
  `alternative_value` decimal(10,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `criteria_id`, `tourism_object_id`, `alternative_value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4.0, '2024-06-26 12:07:56', '2024-06-26 12:07:56'),
(2, 2, 1, 3.0, '2024-06-26 12:07:56', '2024-06-26 12:07:56'),
(3, 3, 1, 2.0, '2024-06-26 12:07:56', '2024-06-26 12:07:56'),
(4, 4, 1, 5.0, '2024-06-26 12:07:56', '2024-06-26 12:07:56'),
(5, 5, 1, 1.0, '2024-06-26 12:07:56', '2024-06-26 12:07:56'),
(6, 1, 2, 5.0, '2024-06-26 12:08:36', '2024-06-26 12:08:36'),
(7, 2, 2, 4.0, '2024-06-26 12:08:36', '2024-06-26 12:08:36'),
(8, 3, 2, 3.0, '2024-06-26 12:08:36', '2024-06-26 12:08:36'),
(9, 4, 2, 4.0, '2024-06-26 12:08:36', '2024-06-26 12:08:36'),
(10, 5, 2, 2.0, '2024-06-26 12:08:36', '2024-06-26 12:08:36'),
(11, 1, 3, 3.0, '2024-06-26 12:09:09', '2024-06-26 12:09:09'),
(12, 2, 3, 5.0, '2024-06-26 12:09:09', '2024-06-26 12:09:09'),
(13, 3, 3, 4.0, '2024-06-26 12:09:09', '2024-06-26 12:09:09'),
(14, 4, 3, 3.0, '2024-06-26 12:09:09', '2024-06-26 12:09:09'),
(15, 5, 3, 3.0, '2024-06-26 12:09:09', '2024-06-26 12:09:09'),
(16, 1, 4, 2.0, '2024-06-26 12:09:45', '2024-06-26 12:09:45'),
(17, 2, 4, 2.0, '2024-06-26 12:09:45', '2024-06-26 12:09:45'),
(18, 3, 4, 5.0, '2024-06-26 12:09:45', '2024-06-26 12:09:45'),
(19, 4, 4, 2.0, '2024-06-26 12:09:45', '2024-06-26 12:09:45'),
(20, 5, 4, 4.0, '2024-06-26 12:09:45', '2024-06-26 12:09:45'),
(21, 1, 5, 1.0, '2024-06-26 12:10:23', '2024-06-26 12:10:23'),
(22, 2, 5, 1.0, '2024-06-26 12:10:23', '2024-06-26 12:10:23'),
(23, 3, 5, 1.0, '2024-06-26 12:10:23', '2024-06-26 12:10:23'),
(24, 4, 5, 1.0, '2024-06-26 12:10:23', '2024-06-26 12:10:23'),
(25, 5, 5, 5.0, '2024-06-26 12:10:23', '2024-06-26 12:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `attribute`, `created_at`, `updated_at`) VALUES
(1, 'Profit Pertahun', 'BENEFIT', '2024-06-26 11:27:39', '2024-06-26 11:27:39'),
(2, 'Laba Bersih', 'BENEFIT', '2024-06-26 11:28:04', '2024-06-26 11:28:04'),
(3, 'Modal Awal', 'COST', '2024-06-26 11:28:31', '2024-06-26 11:28:31'),
(4, 'Jumlah Karyawan', 'BENEFIT', '2024-06-26 11:29:02', '2024-06-26 11:29:02'),
(5, 'Riwayat Bantuan', 'COST', '2024-06-26 11:29:29', '2024-06-26 11:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `criteria_analyses`
--

CREATE TABLE `criteria_analyses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteria_analyses`
--

INSERT INTO `criteria_analyses` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-06-26 12:11:13', '2024-06-26 12:11:13');

-- --------------------------------------------------------

--
-- Table structure for table `criteria_analysis_details`
--

CREATE TABLE `criteria_analysis_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_analysis_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id_first` bigint(20) UNSIGNED NOT NULL,
  `criteria_id_second` bigint(20) UNSIGNED NOT NULL,
  `comparison_value` decimal(10,9) NOT NULL DEFAULT 1.000000000,
  `comparison_result` decimal(10,9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criteria_analysis_details`
--

INSERT INTO `criteria_analysis_details` (`id`, `criteria_analysis_id`, `criteria_id_first`, `criteria_id_second`, `comparison_value`, `comparison_result`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1.000000000, 1.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(2, 1, 1, 2, 3.000000000, 3.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(3, 1, 1, 3, 5.000000000, 5.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(4, 1, 1, 4, 7.000000000, 7.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(5, 1, 1, 5, 9.000000000, 9.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(6, 1, 2, 1, 1.000000000, 0.333333333, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(7, 1, 2, 2, 1.000000000, 1.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(8, 1, 2, 3, 3.000000000, 3.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(9, 1, 2, 4, 5.000000000, 5.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(10, 1, 2, 5, 7.000000000, 7.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(11, 1, 3, 1, 1.000000000, 0.200000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(12, 1, 3, 2, 1.000000000, 0.333333333, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(13, 1, 3, 3, 1.000000000, 1.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(14, 1, 3, 4, 3.000000000, 3.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(15, 1, 3, 5, 5.000000000, 5.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(16, 1, 4, 1, 1.000000000, 0.142857143, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(17, 1, 4, 2, 1.000000000, 0.200000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(18, 1, 4, 3, 1.000000000, 0.333333333, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(19, 1, 4, 4, 1.000000000, 1.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(20, 1, 4, 5, 3.000000000, 3.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(21, 1, 5, 1, 1.000000000, 0.111111111, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(22, 1, 5, 2, 1.000000000, 0.142857143, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(23, 1, 5, 3, 1.000000000, 0.200000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(24, 1, 5, 4, 1.000000000, 0.333333333, '2024-06-26 12:11:13', '2024-06-26 12:14:10'),
(25, 1, 5, 5, 1.000000000, 1.000000000, '2024-06-26 12:11:13', '2024-06-26 12:14:10');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_03_22_080106_create_tourism_objects_table', 1),
(4, '2022_03_22_080154_create_criterias_table', 1),
(5, '2022_03_22_080517_create_criteria_analyses_table', 1),
(6, '2022_03_22_080613_create_criteria_analysis_details', 1),
(7, '2022_03_22_080924_create_preventive_values_table', 1),
(8, '2022_03_22_081038_create_alternatives_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `preventive_values`
--

CREATE TABLE `preventive_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_analysis_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `value` decimal(10,9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `preventive_values`
--

INSERT INTO `preventive_values` (`id`, `criteria_analysis_id`, `criteria_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0.502819495, '2024-06-26 12:14:10', '2024-06-26 12:14:10'),
(2, 1, 2, 0.260231587, '2024-06-26 12:14:10', '2024-06-26 12:14:10'),
(3, 1, 3, 0.134350440, '2024-06-26 12:14:10', '2024-06-26 12:14:10'),
(4, 1, 4, 0.067777666, '2024-06-26 12:14:10', '2024-06-26 12:14:10'),
(5, 1, 5, 0.034820809, '2024-06-26 12:14:10', '2024-06-26 12:14:10');

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
('58jiUAJ7MULaE0dD2vuGTr1fAEmqhtcREqOB8ZaN', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHVKbTNkUlk1bDFWOThMV25KUXhpQWk1QkVFV1U4RWVsUm5DcnJSSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719491392),
('m0V80Qxmf7bGA23NzHhGll2TpYnoWoj6wW4m4txk', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZWZ2RnJXYzY2cVdWajZaSjYxZ0cyRUU0V05MV0xYMlE1dlZSVlh1cyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hbHRlcm5hdGlmIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1718172565),
('NKafN5ghAEDseGVkiSss9DqMa7hm0yYLaS4JtuRs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU0FKWk9yeHY1MDZOeXdSaTBGb3pQaVZLcG5sb3RaNThSZTJrVDZkaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdXRoL2dvb2dsZSI7fXM6NToic3RhdGUiO3M6NDA6Ikt6RHlDRlNWZmNLb25wUFpnNTltSzVIQ1UxaVRuWE82dUFnQktXTGUiO30=', 1719496840),
('wSvBOPdIrnm7Dkg3TZXAjWu3SGDC1l0F5Coof3pD', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic25mc0R0RTZ6aDJYYWxMYTdqU2kyMDFjZXFpcHNPVFBXRGtVQmpMcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5pbGFpYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1718195361),
('Z2ISFRoYhNxcY3CwwmZub22XM78REV94J1MWvXMg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFJ4QzdPNFhZZmpBbXNYR3FLTkRIOFFOOTRMaHVVWHdBM0MwUkc4dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1719496814);

-- --------------------------------------------------------

--
-- Table structure for table `tourism_objects`
--

CREATE TABLE `tourism_objects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourism_objects`
--

INSERT INTO `tourism_objects` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Vira Furniture', 'Tegal', '2024-06-26 12:04:29', '2024-06-26 12:04:29'),
(2, 'Usaha Jaya', 'Adiwerna', '2024-06-26 12:04:48', '2024-06-26 12:06:11'),
(3, 'Toko Usman', 'Kramat', '2024-06-26 12:05:14', '2024-06-26 12:05:14'),
(4, 'Kripik Silvia', 'Slawi', '2024-06-26 12:05:51', '2024-06-26 12:05:51'),
(5, 'Adit Laundry', 'Procot', '2024-06-26 12:06:52', '2024-06-26 12:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'USER',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(2, 'Fajar Wicaksono', 'jarrrr', 'fajarajah320@gmail.com', '$2y$10$Jx7iYq.u8IVRTJA2OjC4cO6lthqUHGzEk9juSVEXGosb/cPnQBFKO', 'SUPERADMIN', '2024-06-25 14:35:43', '2024-06-25 14:35:43'),
(3, 'pengguna', 'pengguna', 'pengguna@gmail.com', '$2y$10$PPyAOVwZa7RWxmdu4I6xR.aR8/DJID.oGmaJzB/NoFWU8zfnCx8k6', 'USER', '2024-06-26 09:17:20', '2024-06-26 09:17:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_criteria_id_foreign` (`criteria_id`),
  ADD KEY `alternatives_tourism_object_id_foreign` (`tourism_object_id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `criterias_name_unique` (`name`);

--
-- Indexes for table `criteria_analyses`
--
ALTER TABLE `criteria_analyses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria_analyses_user_id_foreign` (`user_id`);

--
-- Indexes for table `criteria_analysis_details`
--
ALTER TABLE `criteria_analysis_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria_analysis_details_criteria_analysis_id_foreign` (`criteria_analysis_id`),
  ADD KEY `criteria_analysis_details_criteria_id_first_foreign` (`criteria_id_first`),
  ADD KEY `criteria_analysis_details_criteria_id_second_foreign` (`criteria_id_second`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preventive_values`
--
ALTER TABLE `preventive_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preventive_values_criteria_analysis_id_foreign` (`criteria_analysis_id`),
  ADD KEY `preventive_values_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tourism_objects`
--
ALTER TABLE `tourism_objects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tourism_objects_name_unique` (`name`),
  ADD UNIQUE KEY `tourism_objects_address_unique` (`address`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `criteria_analyses`
--
ALTER TABLE `criteria_analyses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `criteria_analysis_details`
--
ALTER TABLE `criteria_analysis_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `preventive_values`
--
ALTER TABLE `preventive_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tourism_objects`
--
ALTER TABLE `tourism_objects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternatives_tourism_object_id_foreign` FOREIGN KEY (`tourism_object_id`) REFERENCES `tourism_objects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `criteria_analyses`
--
ALTER TABLE `criteria_analyses`
  ADD CONSTRAINT `criteria_analyses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `criteria_analysis_details`
--
ALTER TABLE `criteria_analysis_details`
  ADD CONSTRAINT `criteria_analysis_details_criteria_analysis_id_foreign` FOREIGN KEY (`criteria_analysis_id`) REFERENCES `criteria_analyses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `criteria_analysis_details_criteria_id_first_foreign` FOREIGN KEY (`criteria_id_first`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `criteria_analysis_details_criteria_id_second_foreign` FOREIGN KEY (`criteria_id_second`) REFERENCES `criterias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `preventive_values`
--
ALTER TABLE `preventive_values`
  ADD CONSTRAINT `preventive_values_criteria_analysis_id_foreign` FOREIGN KEY (`criteria_analysis_id`) REFERENCES `criteria_analyses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preventive_values_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

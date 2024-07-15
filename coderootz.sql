-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2024 at 03:17 PM
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
-- Database: `coderootz`
--

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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `route`, `created_at`, `updated_at`) VALUES
(1, 'User Management', 'user_management', NULL, NULL),
(2, 'Role Management', 'role_management', NULL, NULL),
(3, 'Menu 3', 'dashboard', NULL, NULL),
(4, 'Menu 4', 'dashboard', NULL, NULL),
(5, 'Menu 5', 'dashboard', NULL, NULL),
(6, 'Menu 6', 'dashboard', NULL, NULL),
(7, 'Menu 7 ', 'dashboard', NULL, NULL);

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
(4, '2024_07_12_204829_add_role_to_users_table', 2),
(5, '2024_07_13_070252_create_roles_table', 3),
(6, '2024_07_13_071546_create_menus_table', 4),
(7, '2024_07_13_071706_create_role_menu_table', 5);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `menus` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`menus`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `menus`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '[\"1\",\"2\",\"3\",\"4\",\"5\"]', NULL, NULL),
(2, 'user', 'Regular User', '[\"1\",\"2\"]', NULL, NULL),
(3, 'Superadmin', NULL, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"]', '2024-07-13 03:20:15', '2024-07-13 03:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_menu`
--

CREATE TABLE `role_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('KcyFBTIt0qz3wTk0ryoP6W1e9y9boQKAE5AFo4sn', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6ImpXcXJncDhscWhWdm1rUElEcDVkV3E3b1hzUHpYOGFobHl1YzBRSW0iO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yb2xlX21hbmFnZW1lbnQiO319', 1720962575);

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
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `role_id`) VALUES
(1, 'amulya', 'amulya1@gmail.com', NULL, '$2y$12$ebXJFA58u3mp00xBu4m/lu3G4vri0E0c392GqZVUPPzPPJ5KFyC9u', NULL, '2024-07-12 14:56:53', '2024-07-13 05:43:30', 'user', 3),
(2, 'Gourav', '1@gmail.com', NULL, '$2y$12$5xD7Qtng7NdafIsC2j4qCedzbww/XIwhlbH4rvvrLyvFyfsna17gu', NULL, '2024-07-12 14:58:12', '2024-07-12 14:58:12', 'user', 1),
(3, 'Mrs. Ressie Hegmann PhD', 'lavon32@example.com', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'y6aZ6boKEK', '2024-07-13 01:53:47', '2024-07-13 05:39:44', 'user', 2),
(4, 'Margie Towne', 'randi.kunde@example.com', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'WG8GoLskXe', '2024-07-13 01:53:47', '2024-07-13 10:57:48', 'user', 1),
(5, 'Mr. Armand Volkman', 'kariane47@example.net', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'AX63NRFXJG', '2024-07-13 01:53:47', '2024-07-14 05:31:08', 'user', 5),
(6, 'Shanon Shields DVM', 'langosh.claire@example.org', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'DrcGQpwHDu', '2024-07-13 01:53:47', '2024-07-13 10:58:59', 'user', 2),
(7, 'Nicolette Langworth', 'houston.tromp@example.net', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'LfFREbnF3j', '2024-07-13 01:53:47', '2024-07-13 01:53:47', 'user', 1),
(8, 'Friedrich Schowalter', 'uschaden@example.net', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'OiwXozO8Ze', '2024-07-13 01:53:47', '2024-07-13 01:53:47', 'user', 1),
(9, 'Felicita Haley', 'pziemann@example.net', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'IKne889YoL', '2024-07-13 01:53:47', '2024-07-13 01:53:47', 'user', 1),
(10, 'Elouise Welch', 'champlin.randi@example.com', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'rl9u79lHZL', '2024-07-13 01:53:47', '2024-07-13 01:53:47', 'user', 1),
(11, 'Felipa Gislason', 'makayla17@example.com', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'CubTaZ5E4D', '2024-07-13 01:53:47', '2024-07-13 01:53:47', 'user', 1),
(12, 'Maurice Zboncak', 'jadams@example.org', '2024-07-13 01:53:47', '$2y$12$LHRdw8vAMQs/bYPdFveC4edakX5YgDY0Ro7FhKTTjY/FnH6U/V.lO', 'rsimWm2Qye', '2024-07-13 01:53:47', '2024-07-13 01:53:47', 'user', 1),
(13, 'Vansh', 'vansh1@gmail.com', NULL, '$2y$12$I5rRfrz1CewjNPARdxKs9ugglNGZaAjF.tuMbsNdMvGn68JYVMGQO', NULL, '2024-07-14 05:35:44', '2024-07-14 06:32:14', 'user', 3);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_menu_role_id_foreign` (`role_id`),
  ADD KEY `role_menu_menu_id_foreign` (`menu_id`);

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
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD CONSTRAINT `role_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_menu_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

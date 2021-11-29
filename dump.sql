-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2021 at 12:13 PM
-- Server version: 8.0.26-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_projektas`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` bigint UNSIGNED NOT NULL,
  `length` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `reserved` tinyint(1) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `length`, `date`, `user_id`, `reserved`, `type`, `active`) VALUES
(1, 120, '2021-12-01 00:00:00', 2, 1, NULL, 0),
(2, 60, '2021-11-02 00:00:00', 2, 1, NULL, 0),
(3, 56, '2021-12-03 22:54:40', 2, 1, NULL, 0),
(4, 70, '2021-11-16 22:58:17', 3, 0, NULL, 0),
(5, 99, '2022-01-01 00:00:00', 2, 1, NULL, 0),
(7, 70, '2021-11-03 21:26:56', 2, 1, NULL, 0),
(12, 120, '2021-11-27 00:00:00', 3, 1, NULL, 0),
(29, 100, '2021-11-01 00:00:00', 2, 1, NULL, 0),
(36, 120, '2021-11-30 00:00:00', 2, 1, NULL, 0),
(37, 120, '2021-11-28 00:00:00', 2, 1, NULL, 0),
(40, 120, '2021-11-22 00:00:00', 2, 1, NULL, 0),
(41, 1200, '2021-11-29 00:00:00', 2, 1, NULL, 0),
(42, 100, '2021-11-25 00:00:00', 2, 1, NULL, 0),
(43, 100, '2021-11-29 00:00:00', 2, 1, NULL, 0),
(44, 100, '2021-11-18 00:00:00', 2, 1, NULL, 0),
(45, 100, '2021-11-17 00:00:00', 2, 1, NULL, 0),
(46, 100, '2021-11-19 00:00:00', 2, 1, NULL, 0),
(47, 120, '2021-11-30 00:00:00', 2, 1, NULL, 0),
(48, 120, '2021-12-01 00:00:00', 2, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_date` timestamp NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `consultation_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `content`, `creation_date`, `user_id`, `consultation_id`) VALUES
(47, 'Labas', '2021-11-28 14:18:28', 1, 40),
(48, 'Sveiki', '2021-11-28 14:18:33', 2, 40),
(49, 'Labas', '2021-11-28 14:20:38', 1, 41),
(50, 'Sveiki', '2021-11-28 14:20:45', 2, 41),
(51, 'labas', '2021-11-28 20:29:57', 2, 48),
(52, 'sveiki', '2021-11-28 20:30:02', 1, 48);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_22_182727_create_consultations_table', 1),
(6, '2021_11_22_182728_create_reservations_table', 1),
(7, '2021_11_22_182807_create_messages_table', 1),
(8, '0000_00_00_000000_create_websockets_statistics_entries_table', 2),
(9, '2021_11_23_171309_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int NOT NULL,
  `credit_amount` int DEFAULT NULL,
  `accepted` tinyint(1) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `credit_amount`, `accepted`, `user_id`) VALUES
(1, 5, 1, 1),
(2, 10, 1, 2),
(3, 20, 1, 1),
(4, 100, 1, 1),
(5, 111, 1, 1),
(6, 500, 1, 1),
(8, 120, 1, 1),
(9, 100, 0, 2),
(10, 100, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint UNSIGNED NOT NULL,
  `reservation_date` timestamp NOT NULL,
  `problem_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `consultation_id` bigint UNSIGNED NOT NULL,
  `active` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `reservation_date`, `problem_description`, `user_id`, `consultation_id`, `active`) VALUES
(7, '2021-11-22 19:24:43', 'fgfdsghhgd', 1, 4, 0),
(10, '2021-11-27 16:42:01', 'fdgdfgsdg', 1, 12, 0),
(11, '2021-11-27 16:45:34', 'dfasf', 1, 1, 0),
(12, '2021-11-27 16:46:03', 'fgdssdfg', 1, 2, 0),
(13, '2021-11-27 16:46:09', 'fgsdfg', 1, 3, 0),
(14, '2021-11-27 16:46:34', 'gfdgd', 1, 5, 0),
(16, '2021-11-27 16:48:53', 'gfsdgfdsg', 1, 7, 0),
(17, '2021-11-28 07:16:23', 'neina paskambint mamai', 1, 29, 0),
(18, '2021-11-28 07:55:27', 'neina paskambint mamai', 1, 36, 0),
(19, '2021-11-28 08:48:29', NULL, 1, 37, 0),
(21, '2021-11-28 14:18:13', 'neina paskambint mamai', 1, 40, 0),
(22, '2021-11-28 14:20:29', 'neina paskambint mamai', 1, 41, 0),
(23, '2021-11-28 14:29:58', 'neina paskambint mamai', 1, 42, 0),
(24, '2021-11-28 14:32:16', 'fgfdsghhgd', 1, 43, 0),
(25, '2021-11-28 14:34:37', 'fgfdsghhgd', 1, 44, 0),
(26, '2021-11-28 14:34:59', 'fgfdsghhgd', 1, 45, 0),
(27, '2021-11-28 14:35:29', 'neina paskambint mamai', 1, 46, 0),
(28, '2021-11-28 20:25:03', 'fgfdsghhgd', 1, 47, 0),
(29, '2021-11-28 20:29:50', 'fgfdsghhgd', 1, 48, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `credits` int DEFAULT '0',
  `stars` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `birth_date`, `phone`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`, `credits`, `stars`) VALUES
(1, 'Arnas Bagočius', NULL, NULL, NULL, 'arnas.bagocius@gmail.com', NULL, '$2y$10$9K2YX9J5DJzbTLen7jUeEeMN1vhdi7TwylS6YrvkRmsRrLxXrPp8q', NULL, NULL, '2021-11-22 16:44:51', '2021-11-28 20:30:05', 8059, 0),
(2, 'Jonas Jonaitis', NULL, NULL, NULL, 'jonas.jonaitis@gmail.com', NULL, '$2y$10$EVGH9lUc5LYu4OfqBoR/FO2x6VzJ77NsuIUrKIWuB2D50pylJ7zGy', 'consultant', NULL, '2021-11-22 16:47:17', '2021-11-28 07:55:07', 10, 2),
(3, 'Petras Petraitis', NULL, NULL, NULL, 'petras.petraitis@gmail.com', NULL, '$2y$10$Jp4p9S0uQJ.C.Ducg33pXur0rbdR9uqi4YNYuuURCqVeYoBF7udNu', 'consultant', NULL, '2021-11-22 18:28:32', '2021-11-27 11:28:24', 0, 0),
(4, 'Arnas Bagočius2', NULL, NULL, NULL, 'abagocius0@gmail.com', NULL, '$2y$10$bTv.fDvWnsYB/jFuGXO3K.phrmBcyqJzWOJ63.2kRRaVNURcK59cm', 'admin', NULL, '2021-11-22 19:25:15', '2021-11-22 19:25:15', 0, 0),
(8, 'test', NULL, NULL, NULL, 'test@gmail.com', NULL, '$2y$10$vgxmXx.JYzVyQx1I/X2aZuoLF1DrjG2UPE6OLGrsdFl3nHX4wCX9e', NULL, NULL, '2021-11-28 11:55:26', '2021-11-28 11:55:26', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int NOT NULL,
  `websocket_message_count` int NOT NULL,
  `api_message_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultations_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_consultation_id_foreign` (`consultation_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_consultation_id_foreign` (`consultation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `consultations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_consultation_id_foreign` FOREIGN KEY (`consultation_id`) REFERENCES `consultations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_consultation_id_foreign` FOREIGN KEY (`consultation_id`) REFERENCES `consultations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

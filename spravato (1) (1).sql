-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2025 at 05:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spravato`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(9, '0001_01_01_000000_create_users_table', 1),
(10, '0001_01_01_000001_create_cache_table', 1),
(11, '0001_01_01_000002_create_jobs_table', 1),
(12, '2025_05_05_213526_create_permission_tables', 2),
(13, '2025_05_06_171556_create_providers_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 14),
(2, 'App\\Models\\User', 15),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'roles-view', 'web', '2025-05-06 21:32:30', '2025-05-06 21:32:30'),
(2, 'roles-create', 'web', '2025-05-06 21:33:05', '2025-05-06 21:33:05'),
(3, 'roles-edit', 'web', '2025-05-06 21:33:05', '2025-05-06 21:33:05'),
(4, 'roles-delete', 'web', '2025-05-06 21:33:05', '2025-05-06 21:33:05'),
(5, 'users-view', 'web', '2025-05-06 21:32:30', '2025-05-06 21:32:30'),
(6, 'users-create', 'web', '2025-05-06 21:33:05', '2025-05-06 21:33:05'),
(7, 'users-edit', 'web', '2025-05-06 21:33:05', '2025-05-06 21:33:05'),
(8, 'users-delete', 'web', '2025-05-06 21:33:05', '2025-05-06 21:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `establish_since` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','hold','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'hold',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `user_id`, `name`, `establish_since`, `logo`, `certificate`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 'Rudyard Guzman', 'Odio et voluptatem', 'uploads/providers/logos/1746552629_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746552629_cf11e83a4e46a2c96adbf3496545e654.jpg', 'Nostrum laboris quis', 'hold', '2025-05-06 12:30:29', '2025-05-06 12:30:29'),
(3, 15, 'Ethan Potter', 'Mollit fugiat autem', 'uploads/providers/logos/1746660552_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746660552_cf11e83a4e46a2c96adbf3496545e654.jpg', 'Voluptatem velit ea', 'hold', '2025-05-07 18:29:12', '2025-05-07 18:29:12'),
(4, 16, 'Knox Lawrence', 'Aut ex amet dolorum', 'uploads/providers/logos/1746660637_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746660637_cf11e83a4e46a2c96adbf3496545e654.jpg', 'Ea voluptate delenit', 'hold', '2025-05-07 18:30:37', '2025-05-07 18:30:37'),
(5, 17, 'Isadora Mejia', 'Delectus fugit dol', 'uploads/providers/logos/1746660700_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746660700_cf11e83a4e46a2c96adbf3496545e654.jpg', 'Cupidatat vidasdtae inve', 'hold', '2025-05-07 18:31:40', '2025-05-07 18:31:40'),
(6, 18, 'Hadassah Delacruz', 'Vel irure animi fac', 'uploads/providers/logos/1746661146_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746661146_cf11e83a4e46a2c96adbf3496545e654.jpg', 'Aperiam temporibus i', 'hold', '2025-05-07 18:39:06', '2025-05-07 18:39:06'),
(7, 19, 'Dustin Lambert', 'Illum maiores minim', 'uploads/providers/logos/1746661209_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746661209_cf11e83a4e46a2c96adbf3496545e654.jpg', 'Veniam voluptatem i', 'hold', '2025-05-07 18:40:09', '2025-05-07 18:40:09'),
(8, 20, 'Rhoda Noble', 'Sed qui autem laboru', 'uploads/providers/logos/1746661373_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746661373_cf11e83a4e46a2c96adbf3496545e654.jpg', 'Tenetur asperiores i', 'hold', '2025-05-07 18:42:54', '2025-05-07 18:42:54'),
(9, 21, 'Virginia Woodard', 'Sapiente anim sed co', 'uploads/providers/logos/1746661444_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746661444_cf11e83a4e46a2c96adbf3496545e654.jpg', 'Molestiae delectus', 'active', '2025-05-07 18:44:04', '2025-05-07 18:44:04'),
(10, 22, 'Hasad Hewitt', 'Mollit ut in rem pra', 'uploads/providers/logos/1746661914_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746661914_cf11e83a4e46a2c96adbf3496545e654.jpg', 'In ipsam sit duis u', 'inactive', '2025-05-07 18:51:54', '2025-05-07 18:51:54'),
(11, 23, 'Charles Boyle', 'In sunt neque quasi', 'uploads/providers/logos/1746661984_cf11e83a4e46a2c96adbf3496545e654.jpg', 'uploads/providers/certificates/1746661984_cf11e83a4e46a2c96adbf3496545e654.jpg', 'Quibusdam ab velit', 'active', '2025-05-07 18:53:04', '2025-05-07 18:53:04'),
(12, 24, 'Elmo Fletcher', 'Repellendus Omnis o', 'uploads/providers/logos/1746722079_hand.jpg', 'uploads/providers/certificates/1746722079_invoice_INV-0001 (5).pdf', 'Laboris qui optio p', 'inactive', '2025-05-08 11:34:39', '2025-05-08 11:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-05-05 21:46:30', '2025-05-05 21:46:30'),
(2, 'provider', 'web', '2025-05-05 21:46:30', '2025-05-05 21:46:30'),
(3, 'user', 'web', '2025-05-05 21:46:30', '2025-05-05 21:46:30'),
(7, 'Chirs Vehicle Store', 'web', '2025-05-06 18:50:51', '2025-05-06 18:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(1, 7),
(2, 7),
(3, 7),
(4, 7),
(5, 7),
(6, 7),
(7, 7),
(8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('z1Lw975flSCSEzEVAEIYXgg59qPwlxXdhmfTZ5ER', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTTBZc21FeEVsZFZkdXNlajl3ZW13bU0xdDgwQkVxSWF6Rnl1N0hnNiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zcHJhdmF0by9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1748021431);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin','provider') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `role`, `image`, `cover_image`, `phone`, `gender`, `country`, `state`, `city`, `zip`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MR', 'Admin', 'admin@gmail.com', '2025-05-05 21:24:19', '$2y$12$ACSzv2iJOu3HW71PAXeh0ejeC107zOY3SN1dtJVME6INuQ5SfXzre', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Developer', 'Coder51', 'developercoder51@gmail.com', '2025-05-05 21:24:19', '$2y$12$AY26ang5K8l5jXdcSZTVcug9XL7/Kh/bmsaTjucMJ8ojyDxMGv.pa', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4S1se8aBbdxsBNyyif0AkdCJVJMS0jor4Y0g6MlerH2yEOgAjWhRjiJcnAcd', NULL, '2025-05-06 13:38:58'),
(3, 'Felix', 'Howe', 'gyhusetix@mailinator.com', NULL, '$2y$12$xxiBwZWljwEihTmNq471Q.qQiN67Eytq/jlN5/USPc2bnI2DuygH6', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-05 17:04:18', '2025-05-05 17:04:18'),
(4, 'Ferris', 'Hunter', 'wamycito@mailinator.com', NULL, '$2y$12$e3Q0eJfk.VyL/NMrPmkZyex9rS1gdLId.P/nel7iGBqGhawlQSosm', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-05 17:16:57', '2025-05-05 17:16:57'),
(5, 'Lewis', 'Benson', 'daruhum@mailinator.com', NULL, '$2y$12$Hb7kyF1wcAhNheVG6mrZWe2wIxyIV.wCnWnBBXTbaWlB2WBCpuLhu', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-05 17:20:55', '2025-05-05 17:20:55'),
(6, 'Tamekah', 'Duncan', 'dapybef@mailinator.com', NULL, '$2y$12$/Zeg.k.8Kty8bkfhCXsOFuUP7LHcDasE1ahvwUI.9hoptt4M/no4W', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-05 17:35:52', '2025-05-05 17:35:52'),
(7, 'Evelyn', 'Swanson', 'fahanafyj@mailinator.com', NULL, '$2y$12$.nbp4F2KU.cObQOgs2x7wOmW5sbIYXbxQbRZBV1PR1Uo3Gmkf2X8e', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 11:30:14', '2025-05-06 11:30:14'),
(8, 'Eric', 'Dickerson', 'ziwazy@mailinator.com', NULL, '$2y$12$nlRxjcsuP1SoCISpxeeIQ.d7jcUgggedQ7HgWSqBrWuLT5RNIDg7y', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 11:35:18', '2025-05-06 11:35:18'),
(9, 'Seth', 'Davenport', 'lofape@mailinator.com', NULL, '$2y$12$IC1W/zlmg0XODGF2pAc7QOUyA9vz4q/Lf5GeJRiFjwMPMQDElClme', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 12:14:15', '2025-05-06 12:14:15'),
(10, 'Hilel', 'Schwartz', 'fasudaq@mailinator.com', NULL, '$2y$12$eFNdPosLD/Cnb9SzA0gpMOez91MVmNAtK2oWfG4rpuHuNIoScaLRu', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 12:26:06', '2025-05-06 12:26:06'),
(11, 'Tanner', 'Mcfarland', 'vypifeke@mailinator.com', NULL, '$2y$12$KXattCPNbm2F7PK2vH0pLeMf5nBQ9MPjJ0JIuGJYKPXWiZlDAcWZy', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 12:26:26', '2025-05-06 12:26:26'),
(12, 'Leslie', 'Sanders', 'losi@gmail.com', NULL, '$2y$12$74z8CaZlOlZYgiKeKxliG.D1nEl8Tv7BkNkNjmtgdMCyaA1StrBP2', 'user', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 12:27:09', '2025-05-06 12:27:09'),
(13, 'Alec', 'Holt', 'ziqal@mailinator.com', NULL, '$2y$12$Fha8gGiotdUmEsH2chyLJuzbKS/50u.HzPOh5o.0eYN5TgH.wB3y6', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-06 12:30:29', '2025-05-06 12:30:29'),
(15, 'Jameson', 'Russo', 'cucaqako@mailinator.com', NULL, '$2y$12$ETjoAVzvu3z.S/x33ZLeaeYFE5jl0FCg1uQuXZL3vEhdZOfJp1o5S', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 18:29:12', '2025-05-07 18:29:12'),
(16, 'Blossom', 'Conrad', 'voqe@mailinator.com', NULL, '$2y$12$p5iXB9FT3GjzmVPc3J6/fOy9s98EDjodDuLdIFDS0seXCABBrAEr2', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 18:30:37', '2025-05-07 18:30:37'),
(17, 'Irma', 'Mcfarland', 'kulamiqi@mailinator.com', NULL, '$2y$12$eJrho4QJvpOYPSQH2yOKB.g.vMgVz2ijSCv8H8ct1cKuyJHwkCUfa', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 18:31:40', '2025-05-07 18:31:40'),
(18, 'Avye', 'Duran', 'tiviwop@mailinator.com', NULL, '$2y$12$VtPRpmftuxC6Tp0RdrPbRO6fXnok05ySAS9LsZbakmGYeAh4ZIsvG', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 18:39:06', '2025-05-07 18:39:06'),
(19, 'Ariel', 'Acosta', 'dewus@mailinator.com', NULL, '$2y$12$Y1NO7Km5GMW6SFi3sVsmn.5uXAkzOm7MXisu/SJreJNUSc2zFdk.C', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 18:40:09', '2025-05-07 18:40:09'),
(20, 'Whilemina', 'Buchanan', 'xywevah@mailinator.com', NULL, '$2y$12$YrPmQxWmgU5/t6EY8oEqluIskR3YMMMk5QG.kJliMbuSgFaunLaxa', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 18:42:53', '2025-05-07 18:42:53'),
(21, 'Akeem', 'Clemons', 'camy@mailinator.com', NULL, '$2y$12$0Iu1EJp2nm1EyIdKlMhuu.JmWeZ5M8cdtoILfl1Z4mrzGi8EKAhle', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 18:44:04', '2025-05-07 18:44:04'),
(22, 'Merritt', 'Bush', 'tymo@mailinator.com', NULL, '$2y$12$mbH38BrhQmV66pLFnOUl5uf62bSzh9yt.4M4DnwhFm8guE5x2fziG', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 18:51:54', '2025-05-07 18:51:54'),
(23, 'Clio', 'Moore', 'wywyko@mailinator.com', NULL, '$2y$12$dsg1cE8W3AvlXTKlk7sejeQ5ORsBvRAkRgmyvjIg1rr1GJ.NYJXYK', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-07 18:53:04', '2025-05-07 18:53:04'),
(24, 'Kameko', 'Pollard', 'nigahy@mailinator.com', NULL, '$2y$12$hwANfMByyXpTD5M6ppjhreCEEq35/U.8DsbZtLNKOhTQCNFBm4QDm', 'provider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-08 11:34:39', '2025-05-08 11:34:39');

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `providers_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

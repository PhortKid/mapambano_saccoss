-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 04:53 PM
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
-- Database: `saccos`
--

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `opening_debit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `opening_credit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `monthly_debit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `monthly_credit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `jonal_debit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `jonal_credit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total_debit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total_credit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `title`, `opening_debit`, `opening_credit`, `monthly_debit`, `monthly_credit`, `jonal_debit`, `jonal_credit`, `total_debit`, `total_credit`, `created_at`, `updated_at`) VALUES
(2, 'FEDHA TASLIMU', 500.00, 700.00, 500.00, 700.00, 500.00, 700.00, 1500.00, 2100.00, '2024-12-30 23:55:31', '2024-12-30 23:55:31');

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
-- Table structure for table `deposite`
--

CREATE TABLE `deposite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `paid_in` decimal(8,2) NOT NULL,
  `withdraw` decimal(8,2) DEFAULT NULL,
  `balance` decimal(10,2) GENERATED ALWAYS AS (`paid_in` - `withdraw`) VIRTUAL,
  `date` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposite`
--

INSERT INTO `deposite` (`id`, `user_id`, `paid_in`, `withdraw`, `date`, `created_at`, `updated_at`) VALUES
(2, 5, 50000.00, 2500.00, '2024-11-20', '2024-11-21 01:24:01', '2024-11-21 02:28:26'),
(4, 6, 50000.00, 0.00, '2024-12-02', '2024-12-03 01:36:44', '2024-12-03 01:36:44'),
(5, 6, 0.00, 50000.00, '2024-12-02', '2024-12-03 01:55:08', '2024-12-03 01:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_description` varchar(255) NOT NULL,
  `credit` decimal(10,2) DEFAULT NULL,
  `debit` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) GENERATED ALWAYS AS (`debit` - `credit`) VIRTUAL,
  `date` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `expense_description`, `credit`, `debit`, `date`, `created_at`, `updated_at`) VALUES
(2, 'dd', 10.00, 55.00, '2024-11-20', '2024-11-21 02:08:17', '2024-11-21 03:23:09'),
(3, 'kalamu', 0.00, 5000.00, '2024-11-20', '2024-11-21 02:41:37', '2024-11-21 03:25:26'),
(4, 'FEDHA BENKI', 57933038.91, 58419485.10, '2024-11-20', '2024-11-21 13:42:11', '2024-11-21 13:42:11'),
(5, 'MWAJIRI MDAI', 500.00, 0.00, '2024-12-02', '2024-12-03 01:23:17', '2024-12-03 01:23:17');

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
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tobe_paid` decimal(10,2) NOT NULL,
  `date` varchar(255) NOT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) GENERATED ALWAYS AS (`tobe_paid` - `paid`) VIRTUAL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `user_id`, `tobe_paid`, `date`, `paid`, `created_at`, `updated_at`) VALUES
(1, 2, 40000.00, '2024-11-21', 40000.00, '2024-11-21 16:59:42', '2024-12-03 02:28:54'),
(4, 4, 1000.00, '2024-12-02', 0.00, '2024-12-03 02:43:37', '2024-12-03 02:43:37'),
(5, 5, 500000.00, '2024-12-02', 1000000.00, '2024-12-03 02:44:35', '2024-12-03 02:44:48');

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
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `rate` int(200) DEFAULT NULL,
  `date` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `amount`, `balance`, `rate`, `date`, `created_at`, `updated_at`) VALUES
(20, 5, 1000000.00, 500000.00, NULL, '2024-12-02', '2024-12-03 02:57:24', '2024-12-03 02:57:49');

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
(4, '2024_11_10_115330_create_hisa_table', 2),
(7, '2024_11_11_190204_create_savings_table', 3),
(10, '2024_11_11_191333_create_deposite_table', 4),
(11, '2024_11_12_210923_create_loans_table', 5),
(12, '2024_11_18_193450_create_loans_table', 6),
(13, '2024_11_18_193553_create_transactions_table', 6),
(16, '2024_11_20_172040_create_expense_table', 7),
(18, '2024_11_21_191941_create_interest_table', 8),
(20, '2024_12_27_090411_create_balances_table', 9);

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
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `paid_in` decimal(10,2) NOT NULL,
  `withdraw` decimal(10,2) DEFAULT NULL,
  `balance` decimal(10,2) GENERATED ALWAYS AS (`paid_in` - `withdraw`) VIRTUAL,
  `date` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `user_id`, `paid_in`, `withdraw`, `date`, `created_at`, `updated_at`) VALUES
(4, 5, 50000.00, 0.00, '2024-09-01', '2024-11-21 02:58:49', '2024-11-21 02:59:28'),
(6, 5, 10000.00, 0.00, '2024-11-19', '2024-11-21 03:35:07', '2024-11-21 03:35:07'),
(7, 5, 400000.00, 0.00, '2024-11-21', '2024-11-21 14:56:10', '2024-11-21 14:56:10'),
(8, 5, 1000000.00, 0.00, '2024-11-10', '2024-11-21 15:06:09', '2024-11-21 15:06:09');

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
('2z78Tin4XjE3TzofH1yklMulVZYfAvjNMRaIdEPH', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMTZOd3RxbDdaOU94cjRPcE9ybmRkZHk2WE82T1NSZ1NoSlB6amUzYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1735903686),
('EV4aKjO8X0yuLC7kh7VhAOaux4F4SwoCl3q7nQni', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGRMRkNTdDh0MXM0TXdCMVJxRHV5dkM3ZEZTWGo3SU1rUDE0QnRCYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735548422),
('G7KnDWgofyliBEyM0I9pBYJdWWE75oFyWGvkjnWp', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVzk3ajF2ZkF0WURCWldFRXo3eFFEVXFXdmRqV0xHZHdjV0wzYVdtcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWxhbmNlc19yZXBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1735745870),
('KTXKB3Zkx7zYSoNY7hwE8DuzDlKbe7yj7tdgtS67', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiS2pJdWk2YU1jaEtZcWhqVHNTVEkzRHBjWXdBSjN6SUxrY21IMkdXaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWxhbmNlc19yZXBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1735575079),
('m43wKtZR5ZJUnoMrHXonTosDQ51wJnc4kgK4g78T', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiekI1azJHeFNINzI4aDBvZ1lPZ1BlOWVzZFQ1ZVhVS0lOTHpGQmxkNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWxhbmNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1735734775),
('Q0XpGOCC5Ri9IT4EOXmnLazcT6dFVYjWC9WbGBLJ', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR0VLQ01hNTVic2NPYllRdUxrZ3lPQkdNUnJBM3pZOUpMR3FGeXJNdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2Fuc19tYW5hZ2VtZW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1735552626),
('ugHko75IOfhpziHUx9Dn8LpnDekrW3lrfTEFKWIA', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUXBicTBnd2tHN2cxTm5UMTlWQmR5eWpTYjRBSFlhV3RWaExOMnVpTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2Vyc19iYWxhbmNlX3JlcG9ydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1735564235);

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `properties_number` varchar(255) DEFAULT NULL,
  `paid_in` decimal(8,2) NOT NULL,
  `withdraw` decimal(8,2) DEFAULT NULL,
  `balance` decimal(10,2) GENERATED ALWAYS AS (`paid_in` - `withdraw`) VIRTUAL,
  `date` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `user_id`, `properties_number`, `paid_in`, `withdraw`, `date`, `created_at`, `updated_at`) VALUES
(4, 5, '123', 50000.00, 0.00, '', '2024-11-21 00:26:23', '2024-11-21 00:26:23'),
(5, 5, '12', 0.00, 25000.00, '', '2024-11-21 00:26:56', '2024-11-21 00:26:56'),
(6, 5, NULL, 500000.00, 0.00, '', '2024-11-21 01:05:48', '2024-11-21 01:05:48'),
(7, 5, '1', 0.00, 10000.00, '2024-11-20', '2024-11-21 01:32:44', '2024-11-21 02:21:23'),
(8, 2, '80', 9000.00, 0.00, '2024-11-21', '2024-11-21 16:35:31', '2024-11-21 16:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loans_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `loans_id`, `amount`, `fee`, `created_at`, `updated_at`) VALUES
(4, 20, 500000.00, 50000.00, '2024-12-03 02:57:49', '2024-12-03 02:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `phone_number`, `role`, `gender`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'mary', 'ni', 'sanga', '0787753939', 'applicant', 'male', 'kesayir688@nastyx.com', NULL, '$2y$12$i2PYnMHwsrZyGVnMEwp0seWTc8/vZ1WT.XYoaZ/9TAwUGGjMhq2Ca', NULL, '2024-11-10 09:43:02', '2024-11-10 09:43:02'),
(3, 'SKOLASTIKA', 'SKOLASTIKA', 'SKOLASTIKA', '0787753938', 'applicant', 'male', 'skolastica@gmail.com', NULL, '$2y$12$KcGph6exfDEJmTmsnCitY.NzgagVYf.MVyyhJl/ok/Y/gINLPM4v6', NULL, '2024-11-12 02:31:52', '2024-11-12 02:31:52'),
(4, 'phort', 'chrispin', 'rwekiti', '0787753939', 'Applicantt', 'male', 'middlephort@gmail.com', NULL, '$2y$12$aB0dyyacMA8VpnFwFeBUQuKr72jj3JT6A25Epn3Z3GQoqGqrXHnC.', NULL, '2024-11-20 04:35:52', '2024-12-30 17:26:25'),
(5, 'Patrick', 'Anchen', 'Mwekibindu', '0758013192', 'Applicant', 'male', 'patrickmwekibindu@gmail.com', NULL, '$2y$12$7zj22GoaEdvkmGuF7Yt4wOnIfzWprhNZYRO4/QPh1evSbVZpScX7i', 'iP6G7Uk5VL2MYFVGceNLTHGvnNEV94H10pG5xbSAX7N9qrWjsCyBbS724woS', '2024-11-18 23:16:48', '2024-11-19 23:56:25'),
(6, 'Paulo', 'Anchen', 'Melikiori', '0754744231', 'secretary', 'male', 'pauloanchen@gmail.com', NULL, '$2y$12$bA.57LBizsI0vRxq/CZA/OQO7yb3cyMtb5sbRFsDitVVBjxyXJoJW', NULL, '2024-12-03 01:19:46', '2024-12-03 01:21:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `deposite`
--
ALTER TABLE `deposite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposite_user_id_foreign` (`user_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interest_user_id_foreign` (`user_id`);

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
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_user_id_foreign` (`user_id`);

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
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `savings_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shares_user_id_foreign` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_loan_id_foreign` (`loans_id`);

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
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deposite`
--
ALTER TABLE `deposite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deposite`
--
ALTER TABLE `deposite`
  ADD CONSTRAINT `deposite_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `interest_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `savings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shares`
--
ALTER TABLE `shares`
  ADD CONSTRAINT `shares_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_loan_id_foreign` FOREIGN KEY (`loans_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

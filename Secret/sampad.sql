-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 07:42 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampad`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `shabak` text COLLATE utf8mb4_unicode_ci,
  `lended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `created_at`, `updated_at`, `name`, `author`, `subject`, `shabak`, `lended`) VALUES
(6, '2020-04-03 02:24:07', '2020-06-15 09:41:26', 'بیشعوری', 'خاویر کرمنت', 'اجتماعی', '36-ش-997', 1),
(7, '2020-04-03 02:29:33', '2020-06-10 13:54:41', 'فردوسی خوانی', 'فردوسی', 'شاهنامه', '25-ش-582', 0),
(8, '2020-04-08 13:29:17', '2020-06-10 13:55:03', 'مدار منطقی1', 'موریس مانو', 'علمی', '36-987ش', 0),
(9, '2020-04-08 13:29:56', '2020-06-10 13:54:54', 'مدار منطقی2', 'موریسن مانو', 'علمی', '36-654ش', 0),
(10, '2020-04-08 13:30:25', '2020-04-24 05:08:58', 'شبکه های کامپیوتری', 'الفی', 'علمی', '25-471ش', 1),
(11, '2020-04-08 13:30:53', '2020-04-24 04:38:50', 'مبانی داده کاوی', 'هایزن', 'علمی', '14-ش588', 1),
(12, '2020-04-08 13:31:28', '2020-04-17 02:41:48', 'ساختمان داده ها', 'CLRS', 'درسی', '214-89ش', 1),
(13, '2020-04-08 13:31:58', '2020-04-28 14:44:24', 'طراحی الگوریتم', 'CLRS', 'درسی', '14-ش544', 1),
(19, '2020-04-28 16:49:12', '2020-04-28 16:49:12', 'کتاب', 'من', 'همین', '85646یریس', 1),
(20, '2020-05-20 19:31:54', '2020-07-04 11:25:59', 'دیوان حافظ', 'حافظ', 'شعری و ادبی', 'ی_589_659', 1),
(21, '2020-05-20 19:32:55', '2020-06-28 15:25:01', 'سیگنال و سیستم', 'حسن پور', 'درسی علوم مهندسی کامپیوتری و برقی', 'ش_658-589', 1),
(36, '2020-05-30 03:52:20', '2020-07-04 12:04:31', 'نهج البلاغه', 'امام علی', 'دینی', '5-66-992', 1),
(38, '2020-07-04 11:51:47', '2020-07-04 11:51:47', 'گاستان', 'سعدی', 'ادبی', '25-سس-888', 1),
(39, '2020-07-04 11:54:55', '2020-07-04 11:54:55', 'پیلار', 'کوییلو', 'ادبی', '25-44-88', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lendings`
--

CREATE TABLE `lendings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `lending_date` date NOT NULL,
  `return_date` date NOT NULL,
  `ban_status` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lendings`
--

INSERT INTO `lendings` (`id`, `created_at`, `updated_at`, `book_id`, `user_id`, `lending_date`, `return_date`, `ban_status`) VALUES
(19, '2020-04-17 02:30:06', '2020-04-24 04:38:50', 11, 2, '1399-01-29', '1399-02-01', 2),
(22, '2020-04-23 13:12:21', '2020-04-24 05:09:15', 6, 4, '1399-02-04', '1399-02-18', 2),
(23, '2020-04-23 13:12:40', '2020-04-24 05:09:07', 13, 4, '1399-02-04', '1399-02-18', 2),
(24, '2020-04-24 02:57:05', '2020-04-24 05:08:57', 10, 2, '1399-02-05', '1399-02-19', 2),
(28, '2020-04-24 05:16:58', '2020-04-24 05:28:31', 7, 4, '1399-02-05', '1399-02-19', 2),
(29, '2020-04-28 14:43:30', '2020-04-28 14:44:24', 13, 2, '1399-02-23', '1399-02-09', 2),
(30, '2020-05-26 01:59:32', '2020-06-10 12:35:03', 6, 8, '1399-03-06', '1399-03-20', 2),
(31, '2020-06-10 12:34:35', '2020-06-10 12:35:11', 6, 8, '1399-03-21', '1399-03-24', 2),
(32, '2020-06-10 13:53:10', '2020-06-10 13:53:10', 36, 8, '1399-03-21', '1399-03-21', 0),
(33, '2020-06-10 13:53:20', '2020-06-10 13:53:46', 6, 8, '1399-03-21', '1399-03-21', 1),
(34, '2020-06-10 13:53:36', '2020-06-29 00:44:59', 20, 8, '1399-03-21', '1399-03-22', 2),
(36, '2020-06-10 13:54:41', '2020-06-10 13:54:41', 7, 8, '1399-03-21', '1399-03-21', 0),
(37, '2020-06-10 13:54:54', '2020-06-28 12:17:30', 9, 8, '1399-03-21', '1399-03-21', 1),
(38, '2020-06-10 13:55:03', '2020-06-10 13:55:03', 8, 8, '1399-03-21', '1399-03-21', 0),
(39, '2020-07-04 11:16:16', '2020-07-04 11:25:59', 20, 2, '1399-04-14', '1399-04-28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_02_092314_create_books_table', 1),
(5, '2020_03_02_094147_create_lendings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `father_job` text COLLATE utf8mb4_unicode_ci,
  `mobile_number` bigint(20) NOT NULL,
  `father_mobile_number` bigint(20) DEFAULT NULL,
  `registery_date` date NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `grade` smallint(6) NOT NULL,
  `ban_status` tinyint(1) NOT NULL,
  `banded_times` smallint(6) NOT NULL DEFAULT '0',
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `first_name`, `last_name`, `father_name`, `address`, `father_job`, `mobile_number`, `father_mobile_number`, `registery_date`, `expiration_date`, `grade`, `ban_status`, `banded_times`, `user_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'vahid_77', 'vahid@gmail.com', NULL, '$2y$10$c7REV23SyCnryHfEqKYWDu1SkR254Lc2oXY.F.zDR1db2hpHqRnk6', 'وحید', 'باغانی', 'محمد', 'سبزوار', 'کارمند', 9365558888, 9151115599, '2020-03-29', NULL, 2, 1, 0, 'user', NULL, '2020-03-29 12:17:18', '2020-03-29 12:17:18'),
(4, 'alibina', 'bina@gmail.com', NULL, '$2y$10$9rBrqNloLdt1N.xUX5n2fuBxsk4AzH1ZYsEF8ROPXAzeSLYNLKfMu', 'علی', 'بینا', 'محمد', 'مشهد', 'کارمند', 9158899666, 9158877441, '2020-04-23', NULL, 3, 1, 0, 'user', NULL, '2020-04-23 13:11:48', '2020-04-23 13:11:48'),
(5, 'hosein_77', 'hosein_77@gmail.com', NULL, '$2y$10$geecz62X1FPiNdTRMvd05.C8WEXIfBd6v7wnSrEpTlWMbGj6aPeRi', 'حسین', 'علیرضایی', 'محمد', 'مشهد', 'مهندس', 9195884064, 9127540701, '2020-04-23', NULL, 1, 1, 0, 'admin', NULL, '2020-04-23 15:41:45', '2020-04-23 15:41:45'),
(8, 'ali', 'qasemi4245qq@gmail.com', NULL, '$2y$10$sF0X7UlUm8u62QHSFPPl4.G0hsrHsvP1uHxF9pKZZoms8Zt9JERLa', 'علی', 'قاسمی', 'علی اکبر', 'قم', 'بازنشسته', 9195884064, 9127540701, '2020-04-25', NULL, 1, 1, 0, 'superAdmin', NULL, '2020-04-25 17:39:25', '2020-04-25 17:39:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lendings`
--
ALTER TABLE `lendings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lendings_book_id_foreign` (`book_id`),
  ADD KEY `lendings_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lendings`
--
ALTER TABLE `lendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lendings`
--
ALTER TABLE `lendings`
  ADD CONSTRAINT `lendings_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lendings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

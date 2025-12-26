-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2025 at 02:02 PM
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
-- Database: `admin-panel`
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

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_dashboard.metrics', 'a:9:{s:7:\"courses\";i:0;s:8:\"students\";i:3;s:8:\"contacts\";i:0;s:4:\"news\";i:2;s:5:\"calls\";i:4;s:6:\"visits\";i:1;s:11:\"today_calls\";i:2;s:16:\"interested_calls\";i:3;s:13:\"avg_gpa_calls\";d:83.76;}', 1755202921);

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
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gpa` decimal(5,2) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `referral_source` varchar(255) DEFAULT NULL,
  `interested_majors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`interested_majors`)),
  `is_interested` tinyint(1) NOT NULL DEFAULT 1,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`id`, `phone`, `name`, `gpa`, `branch`, `referral_source`, `interested_majors`, `is_interested`, `employee_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, '0782057224', 'Rama', 90.00, 'علمي', 'تواصل', '[\"\\u0627\\u0644\\u0630\\u0643\\u0627\\u0621 \\u0627\\u0644\\u0627\\u0635\\u0637\\u0646\\u0627\\u0639\\u064a\"]', 1, 74, 'مهتم', '2025-08-11 16:48:49', '2025-08-11 16:48:49'),
(2, '0796512376', 'Mohammad', 91.00, 'علمي', 'صديق', '[\"\\u062a\\u0633\\u0648\\u064a\\u0642\"]', 0, 75, 'مهتم', '2025-08-11 16:49:54', '2025-08-11 16:49:54'),
(3, '0796346090', 'Mohammad Emad', 66.05, 'علمي', 'صديق', '[\"\\u0647\\u0646\\u062f\\u0633\\u0629\"]', 1, 76, 'بيب', '2025-08-14 08:32:04', '2025-08-14 08:32:04'),
(4, '0796346090', 'Rajeh', 88.00, 'علمي', 'صديق', '[\"\\u0647\\u0646\\u062f\\u0633\\u0629\"]', 1, 76, 'dknsnkl', '2025-08-14 09:06:32', '2025-08-14 09:06:32'),
(5, '0782057224', 'ds', 80.00, 'f', 'f', '[\"D\"]', 1, 74, 'FV', '2025-08-16 08:23:42', '2025-08-16 08:23:42');

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
(4, '2025_04_07_213759_create_personal_access_tokens_table', 1),
(5, '2025_04_08_163111_create_permission_tables', 1),
(6, '2025_04_10_201549_create_pages_table', 2),
(7, '2025_04_11_154535_create_news_table', 3),
(8, '2025_04_18_224245_add_instructor_id_to_users_table', 4),
(9, '2025_08_10_202821_create_roles_table', 5),
(10, '2025_08_10_210236_permissions_tables', 6),
(11, '2025_08_10_210704_role_permissions_table', 6),
(12, '2025_08_10_215912_uploads_tables', 7),
(13, '2025_08_11_191552_create_calls_table', 8),
(14, '2025_08_14_135736_create_visits_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `sections` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sections`)),
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `slug`, `sections`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'دعوة اجتماع الهيئة العامة', NULL, 'general-meeting', '[{\"type\":\"heading\",\"content\":\"\\ud83d\\udce2 \\u062f\\u0639\\u0648\\u0629 \\u0644\\u062d\\u0636\\u0648\\u0631 \\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0627\\u0644\\u0647\\u064a\\u0626\\u0629 \\u0627\\u0644\\u0639\\u0627\\u0645\\u0629\"},{\"type\":\"paragraph\",\"content\":\"\\u062a\\u062d\\u064a\\u0629 \\u0637\\u064a\\u0628\\u0629\\u060c \\u062a\\u062f\\u0639\\u0648\\u0643\\u0645 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629 \\u0644\\u062d\\u0636\\u0648\\u0631 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0627\\u0644\\u0633\\u0646\\u0648\\u064a ...\"},{\"type\":\"list\",\"items\":[\"\\u062a\\u0644\\u0627\\u0648\\u0629 \\u0648\\u0642\\u0627\\u0626\\u0639 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0627\\u0644\\u0633\\u0627\\u0628\\u0642\",\"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a\\u0629\",\"\\u0627\\u0646\\u062a\\u062e\\u0627\\u0628 \\u0645\\u062f\\u0642\\u0642\\u064a \\u0627\\u0644\\u062d\\u0633\\u0627\\u0628\\u0627\\u062a\"]},{\"type\":\"zoom_instructions\"},{\"type\":\"proxy_form\"}]', '2025-04-11 13:10:58', '2025-04-11 13:10:58', '2025-04-11 13:10:58'),
(10, 'شركة تطوير العقارات م.ع.م', NULL, 'news1', '[{\"type\":\"heading\",\"content\":\"\\u062f\\u0639\\u0648\\u0629 \\u0644\\u062d\\u0636\\u0648\\u0631 \\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0627\\u0644\\u0647\\u064a\\u0626\\u0629 \\u0627\\u0644\\u0639\\u0627\\u0645\\u0629 \\u0627\\u0644\\u0639\\u0627\\u062f\\u064a\"},{\"type\":\"paragraph\",\"content\":\"\\u062a\\u062d\\u064a\\u0629 \\u0637\\u064a\\u0628\\u0629 \\u0648\\u0628\\u0639\\u062f\\u060c\"},{\"type\":\"paragraph\",\"content\":\"\\u064a\\u0633\\u0631 \\u0645\\u062c\\u0644\\u0633 \\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u0629 \\u062f\\u0639\\u0648\\u062a\\u0643\\u0645 \\u0644\\u062d\\u0636\\u0648\\u0631 \\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0627\\u0644\\u0647\\u064a\\u0626\\u0629 \\u0627\\u0644\\u0639\\u0627\\u0645\\u0629 \\u0627\\u0644\\u0639\\u0627\\u062f\\u064a \\u0627\\u0644\\u0630\\u064a \\u0633\\u064a\\u0639\\u0642\\u062f \\u0641\\u064a \\u062a\\u0645\\u0627\\u0645 \\u0627\\u0644\\u0633\\u0627\\u0639\\u0629 \\u0627\\u0644\\u0648\\u0627\\u062d\\u062f\\u0629 \\u0645\\u0646 \\u0638\\u0647\\u0631 \\u064a\\u0648\\u0645 \\u0627\\u0644\\u0623\\u062d\\u062f \\u0627\\u0644\\u0645\\u0648\\u0627\\u0641\\u0642 13\\/04\\/2025 \\u0648\\u0630\\u0644\\u0643 \\u0639\\u0628\\u0631 \\u062a\\u0637\\u0628\\u064a\\u0642 Zoom \\u062d\\u0633\\u0628 \\u0627\\u0644\\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u0627\\u0644\\u0645\\u0646\\u0634\\u0648\\u0631\\u0629 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0644\\u0644\\u0634\\u0631\\u0643\\u0629 www.redv.com.jo\\u060c \\u0648\\u0627\\u0644\\u0630\\u064a \\u064a\\u0648\\u0641\\u0631 \\u0648\\u0633\\u064a\\u0644\\u0629 \\u0627\\u062a\\u0635\\u0627\\u0644 \\u0645\\u0631\\u0626\\u064a \\u0648\\u0645\\u0633\\u0645\\u0648\\u0639 \\u0644\\u0644\\u0645\\u0633\\u0627\\u0647\\u0645\\u064a\\u0646\\u060c \\u0644\\u0644\\u0646\\u0638\\u0631 \\u0641\\u064a \\u0627\\u0644\\u0623\\u0645\\u0648\\u0631 \\u0627\\u0644\\u062a\\u0627\\u0644\\u064a\\u0629 \\u0648\\u0627\\u062a\\u062e\\u0627\\u0630 \\u0627\\u0644\\u0642\\u0631\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u0645\\u0646\\u0627\\u0633\\u0628\\u0629 \\u0628\\u0634\\u0623\\u0646\\u0647\\u0627:\"},{\"type\":\"list\",\"items\":[\"1)\\t\\u062a\\u0644\\u0627\\u0648\\u0629 \\u0648\\u0642\\u0627\\u0626\\u0639 \\u0645\\u062d\\u0636\\u0631 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0627\\u0644\\u0639\\u0627\\u062f\\u064a \\u0627\\u0644\\u0633\\u0627\\u0628\\u0642 \\u0644\\u0644\\u0647\\u064a\\u0626\\u0629 \\u0627\\u0644\\u0639\\u0627\\u0645\\u0629 \\u0648\\u0625\\u0642\\u0631\\u0627\\u0631\\u0647.\",\"2)\\t\\u0627\\u0644\\u062a\\u0635\\u0648\\u064a\\u062a \\u0639\\u0644\\u0649 \\u062a\\u0642\\u0631\\u064a\\u0631 \\u0645\\u062c\\u0644\\u0633 \\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u0629 \\u0639\\u0646 \\u0623\\u0639\\u0645\\u0627\\u0644 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629 \\u0644\\u0639\\u0627\\u0645 2024 \\u0648\\u0627\\u0644\\u062e\\u0637\\u0629 \\u0627\\u0644\\u0645\\u0633\\u062a\\u0642\\u0628\\u0644\\u064a\\u0629 \\u0644\\u0639\\u0627\\u0645 2025 \\u0648\\u0627\\u0644\\u0645\\u0635\\u0627\\u062f\\u0642\\u0629 \\u0639\\u0644\\u064a\\u0647\\u0645\\u0627.\",\"3)\\t\\u0627\\u0644\\u062a\\u0635\\u0648\\u064a\\u062a \\u0639\\u0644\\u0649 \\u062a\\u0642\\u0631\\u064a\\u0631 \\u0645\\u062f\\u0642\\u0642\\u064a \\u062d\\u0633\\u0627\\u0628\\u0627\\u062a \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629 \\u0639\\u0646 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0648\\u062d\\u062f\\u0629 \\u0644\\u0639\\u0627\\u0645 2024.\",\"4)\\t\\u0627\\u0644\\u062a\\u0635\\u0648\\u064a\\u062a \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0645\\u064a\\u0632\\u0627\\u0646\\u064a\\u0629 \\u0627\\u0644\\u0633\\u0646\\u0648\\u064a\\u0629 \\u0648\\u062d\\u0633\\u0627\\u0628 \\u0627\\u0644\\u0623\\u0631\\u0628\\u0627\\u062d \\u0648\\u0627\\u0644\\u062e\\u0633\\u0627\\u0626\\u0631 \\u0643\\u0645\\u0627 \\u0641\\u064a 31\\/12\\/2024.\",\"5)\\t\\u0627\\u0646\\u062a\\u062e\\u0627\\u0628 \\u0645\\u062f\\u0642\\u0642\\u064a \\u062d\\u0633\\u0627\\u0628\\u0627\\u062a \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629 \\u0644\\u0644\\u0633\\u0646\\u0629 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a\\u0629 2025 \\u0648\\u062a\\u062d\\u062f\\u064a\\u062f \\u0623\\u062a\\u0639\\u0627\\u0628\\u0647\\u0645 \\u0623\\u0648 \\u062a\\u0641\\u0648\\u064a\\u0636 \\u0645\\u062c\\u0644\\u0633 \\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u0629 \\u0628\\u062a\\u062d\\u062f\\u064a\\u062f\\u0647\\u0627.\",\"6)\\t\\u0625\\u0628\\u0631\\u0627\\u0621 \\u0630\\u0645\\u0629 \\u0623\\u0639\\u0636\\u0627\\u0621 \\u0645\\u062c\\u0644\\u0633 \\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u0629 \\u0639\\u0646 \\u0627\\u0644\\u0633\\u0646\\u0629 \\u0627\\u0644\\u0645\\u0627\\u0644\\u064a\\u0629 \\u0627\\u0644\\u0645\\u0646\\u062a\\u0647\\u064a\\u0629 \\u0641\\u064a 31\\/12\\/2024.\"]},{\"type\":\"paragraph\",\"content\":\"\\u064a\\u0631\\u062c\\u0649 \\u062d\\u0636\\u0648\\u0631\\u0643\\u0645 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u062a\\u0637\\u0628\\u064a\\u0642 Zoom, \\u062d\\u064a\\u062b \\u0623\\u0646 \\u0631\\u0642\\u0645 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0647\\u0648 2768635153 \\u0648\\u0631\\u0627\\u0628\\u0637 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0647\\u0648 https:\\/\\/zoom.us\\/j\\/2768635153 \\u0623\\u0648 \\u062a\\u0648\\u0643\\u064a\\u0644 \\u0645\\u0633\\u0627\\u0647\\u0645 \\u0622\\u062e\\u0631 \\u0639\\u0646\\u0643\\u0645 \\u0648\\u0630\\u0644\\u0643 \\u0628\\u062a\\u0639\\u0628\\u0626\\u0629 \\u0627\\u0644\\u0642\\u0633\\u064a\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0641\\u0642\\u0629 \\u0648\\u062a\\u0648\\u0642\\u064a\\u0639\\u0647\\u0627 \\u0639\\u0644\\u0649 \\u0623\\u0646 \\u062a\\u0631\\u0633\\u0644 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0623\\u062f\\u0646\\u0627\\u0647 \\u0642\\u0628\\u0644 \\u0627\\u0644\\u062a\\u0627\\u0631\\u064a\\u062e \\u0627\\u0644\\u0645\\u062d\\u062f\\u062f \\u0644\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0627\\u0644\\u0645\\u0630\\u0643\\u0648\\u0631 \\u0623\\u0639\\u0644\\u0627\\u0647\\u060c \\u0643\\u0645\\u0627 \\u0633\\u064a\\u062a\\u0645 \\u062a\\u0632\\u0648\\u064a\\u062f \\u0627\\u0644\\u0645\\u0633\\u0627\\u0647\\u0645 \\u0627\\u0644\\u0631\\u0627\\u063a\\u0628 \\u0628\\u0627\\u0644\\u062d\\u0636\\u0648\\u0631 \\u0628\\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631 \\u0628\\u0639\\u062f \\u0623\\u0646 \\u064a\\u0642\\u0648\\u0645 \\u0628\\u0625\\u0631\\u0633\\u0627\\u0644 \\u0635\\u0648\\u0631\\u0629 \\u0639\\u0646 \\u0625\\u062b\\u0628\\u0627\\u062a \\u0634\\u062e\\u0635\\u064a\\u0629 \\u0644\\u0647 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a: meeting@redv.com.jo\"},{\"type\":\"paragraph\",\"content\":\"\\u0639\\u0644\\u0645\\u0627 \\u0628\\u0623\\u0646\\u0647 \\u064a\\u062d\\u0642 \\u0644\\u0643\\u0644 \\u0645\\u0633\\u0627\\u0647\\u0645 \\u0637\\u0631\\u062d \\u0627\\u0644\\u0623\\u0633\\u0626\\u0644\\u0629 \\u0648\\u0627\\u0644\\u0627\\u0633\\u062a\\u0641\\u0633\\u0627\\u0631\\u0627\\u062a \\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\\u0627\\u064b \\u0642\\u0628\\u0644 \\u0627\\u0644\\u0645\\u0648\\u0639\\u062f \\u0627\\u0644\\u0645\\u062d\\u062f\\u062f \\u0644\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0627\\u0644\\u0645\\u0634\\u0627\\u0631 \\u0625\\u0644\\u064a\\u0647 \\u0623\\u0639\\u0644\\u0627\\u0647 \\u0644\\u064a\\u0635\\u0627\\u0631 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0631\\u062f \\u0639\\u0644\\u064a\\u0647\\u0627 \\u0648\\u0630\\u0644\\u0643 \\u0639\\u0645\\u0644\\u0627\\u064b \\u0628\\u0627\\u0644\\u062a\\u0639\\u0644\\u064a\\u0645\\u0627\\u062a \\u0627\\u0644\\u0635\\u0627\\u062f\\u0631\\u0629 \\u0639\\u0646 \\u0645\\u0639\\u0627\\u0644\\u064a \\u0648\\u0632\\u064a\\u0631 \\u0627\\u0644\\u0635\\u0646\\u0627\\u0639\\u0629 \\u0648\\u0627\\u0644\\u062a\\u062c\\u0627\\u0631\\u0629 \\u0648\\u0627\\u0644\\u062a\\u0645\\u0648\\u064a\\u0646\\u060c \\u0648\\u0628\\u0623\\u0646 \\u0627\\u0644\\u0645\\u0633\\u0627\\u0647\\u0645 \\u0627\\u0644\\u0630\\u064a \\u064a\\u062d\\u0645\\u0644 \\u0623\\u0633\\u0647\\u0645\\u0627 \\u0644\\u0627 \\u062a\\u0642\\u0644 \\u0639\\u0646 10% \\u0645\\u0646 \\u0627\\u0644\\u0623\\u0633\\u0647\\u0645 \\u0627\\u0644\\u0645\\u0645\\u062b\\u0644\\u0629 \\u0628\\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u064a\\u062d\\u0642 \\u0644\\u0647 \\u0637\\u0631\\u062d \\u0627\\u0644\\u0623\\u0633\\u0626\\u0644\\u0629 \\u0648\\u0627\\u0644\\u0627\\u0633\\u062a\\u0641\\u0633\\u0627\\u0631\\u0627\\u062a \\u062e\\u0644\\u0627\\u0644 \\u0627\\u0644\\u0627\\u062c\\u062a\\u0645\\u0627\\u0639 \\u0633\\u0646\\u062f\\u0627\\u064b \\u0644\\u0644\\u062a\\u0639\\u0644\\u064a\\u0645\\u0627\\u062a \\u0627\\u0644\\u0645\\u0634\\u0627\\u0631 \\u0625\\u0644\\u064a\\u0647\\u0627 \\u0623\\u0639\\u0644\\u0627\\u0647.\"},{\"type\":\"heading\",\"content\":\"\\u0648\\u062a\\u0641\\u0636\\u0644\\u0648\\u0627 \\u0628\\u0642\\u0628\\u0648\\u0644 \\u0641\\u0627\\u0626\\u0642 \\u0627\\u0644\\u0627\\u062d\\u062a\\u0631\\u0627\\u0645\\u060c\"},{\"type\":\"heading\",\"content\":\"\\u062f. \\u0623\\u0633\\u0627\\u0645\\u0629 \\u0631\\u0633\\u062a\\u0645 \\u0645\\u0627\\u0636\\u064a\\n\\u0631\\u0626\\u064a\\u0633 \\u0645\\u062c\\u0644\\u0633 \\u0627\\u0644\\u0625\\u062f\\u0627\\u0631\\u0629\"},{\"type\":\"heading\",\"content\":\"\\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \\u0627\\u0644\\u0627\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a: www.redv.com.jo\"},{\"type\":\"proxy_form\"}]', '2025-04-12 10:31:25', '2025-04-12 10:31:25', '2025-04-12 10:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `content`, `created_at`, `updated_at`) VALUES
(3, 'REDV', 'REDV', 'REDV is one of the leading public shareholding companies in the real estate development industry in Jordan. In addition, registered at the Ministry of Industry and Trade under No. (287) dated June 24, 1995.\n\nThe company started its work in the Jordanian capital market with (4) million Jordanian dinars. Its capital rose in 2007 to (100) million Jordanian dinars and the company has become one of the largest companies working in the real estate development industry in Jordan.\n\nFor the last few years, it has been building the infrastructure necessary to compete in the local and regional market, which has been witnessing solid growth in various sectors, especially in property and real estate. IWAN Housing merged with REDV as a subsidiary creating enduring strategies utilizing the development and construction expertise it is renowned for.', '2025-04-10 20:17:00', '2025-04-10 20:17:00'),
(4, 'Broadening', 'Broadening the foundation', 'To achieve the aspirations of the company REDV has expanded its foundation, by the newly acquired ownership of IWAN Housing to represent the arm of housing and engineering consulting to REDV.\nThe company started its work in the Jordanian capital market with (4) million Jordanian dinars. Its capital rose in 2007 to (100) million Jordanian dinars and the company has become one of the largest companies working in the real estate development industry in Jordan.\n\nFor the last few years, it has been building the infrastructure necessary to compete in the local and regional market, which has been witnessing solid growth in various sectors, especially in property and real estate. IWAN Housing merged with REDV as a subsidiary creating enduring strategies utilizing the development and construction expertise it is renowned for.', '2025-04-10 20:21:38', '2025-04-10 20:21:38'),
(5, 'Mission', 'Mission', 'REDV\'s mission is to create and construct premier, excellent developments that are as diverse in their purposes and aims as they are in their locations. To be a leader in the market, REDV will create enduring strategies utilizing the development and construction expertise of IWAN as well as through its heightened financial management capabilities. REDV will, as a result, add value to the economies of its developments, and contribute to their continued growth as well as improving the prosperity of local communities.The company started its work in the Jordanian capital market with (4) million Jordanian dinars. Its capital rose in 2007 to (100) million Jordanian dinars and the company has become one of the largest companies working in the real estate development industry in Jordan.\n\nFor the last few years, it has been building the infrastructure necessary to compete in the local and regional market, which has been witnessing solid growth in various sectors, especially in property and real estate. IWAN Housing merged with REDV as a subsidiary creating enduring strategies utilizing the development and construction expertise it is renowned for.', '2025-04-10 20:29:09', '2025-04-10 20:29:09'),
(6, 'Vision', 'Vision', 'REDV has a clear vision. Through its expertise in the vibrant Jordanian real estate market, it will become a major catalyst for its continued growth and expansion. REDV seeks to become one of the leading developers not only in Jordan, but also in the region. This will happen by integrating a diverse collection of developments that have intrinsic value not only in their aims and in goals to shareholders, but to their surrounding communities as well.\nFor the last few years, it has been building the infrastructure necessary to compete in the local and regional market, which has been witnessing solid growth in various sectors, especially in property and real estate. IWAN Housing merged with REDV as a subsidiary creating enduring strategies utilizing the development and construction expertise it is renowned for.', '2025-04-10 20:34:04', '2025-04-10 20:34:04'),
(7, 'IWAN', 'IWAN', 'Iwan has achieved a prestigious position in the field of housing projects, offering projects in various locations according to the highest standards. In addition to its commitment to high taste and distinctive appearance, it is committed to achieving engineering specifications and codes that meet citizens\' capabilities and essential needs.For the last few years, it has been building the infrastructure necessary to compete in the local and regional market, which has been witnessing solid growth in various sectors, especially in property and real estate. IWAN Housing merged with REDV as a subsidiary creating enduring strategies utilizing the development and construction expertise it is renowned for.', '2025-04-10 20:36:32', '2025-04-10 20:36:32');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin-login', 'Login as admin', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(2, 'admin-login.submit', 'Submit admin login form', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(3, 'admin.logout', 'Logout admin', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(4, 'dashboard', 'Access admin dashboard', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(5, 'setting', 'Access settings page', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(6, 'roles.index', 'View list of roles', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(7, 'roles.create', 'Create new role form', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(8, 'roles.store', 'Store new role', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(9, 'roles.edit', 'Edit existing role form', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(10, 'roles.update', 'Update existing role', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(11, 'roles.destroy', 'Delete role', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(12, 'users.list', 'View list of users', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(13, 'users.add', 'Create new user form', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(14, 'users.store', 'Store new user', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(15, 'users.edit', 'Edit existing user form', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(16, 'users.update', 'Update existing user', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(17, 'news.list', 'View list of news', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(18, 'news.edit', 'Edit news', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(19, 'news.add', 'Add news', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(20, 'courses.list', 'View list of courses', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(21, 'courses.edit', 'Edit course', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(22, 'courses.add', 'Add course', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(23, 'contact.list', 'View contact list', '2025-08-10 18:10:58', '2025-08-14 12:22:40'),
(24, 'uploads.index', 'View upload page', '2025-08-10 19:03:36', '2025-08-14 12:22:40'),
(25, 'uploads.store', 'Upload Excel/CSV file', '2025-08-10 19:03:36', '2025-08-14 12:22:40'),
(26, 'uploads.template', 'Download Excel/CSV template', '2025-08-10 19:03:36', '2025-08-14 12:22:40'),
(50, 'uploads.distribution', 'View number distribution', '2025-08-10 20:09:06', '2025-08-14 12:22:40'),
(77, 'calls.index', 'View list of calls', '2025-08-11 16:40:03', '2025-08-14 12:22:40'),
(78, 'calls.create', 'Create new call form', '2025-08-11 16:40:03', '2025-08-14 12:22:40'),
(79, 'calls.store', 'Store new call', '2025-08-11 16:40:03', '2025-08-14 12:22:40'),
(80, 'calls.edit', 'Edit existing call form', '2025-08-11 16:40:03', '2025-08-14 12:22:40'),
(81, 'calls.update', 'Update existing call', '2025-08-11 16:40:03', '2025-08-14 12:22:40'),
(82, 'visits.index', 'View list of visits', '2025-08-14 11:07:47', '2025-08-14 12:22:40'),
(83, 'visits.create', 'Create new visit form', '2025-08-14 11:07:47', '2025-08-14 12:22:40'),
(84, 'visits.store', 'Store new visit', '2025-08-14 11:07:47', '2025-08-14 12:22:40'),
(85, 'visits.edit', 'Edit existing visit form', '2025-08-14 11:07:47', '2025-08-14 12:22:40'),
(86, 'visits.update', 'Update existing visit', '2025-08-14 11:07:47', '2025-08-14 12:22:40'),
(119, 'visits.report', 'View visits report', '2025-08-14 12:16:49', '2025-08-14 12:22:40'),
(120, 'visits.report.export', 'Export visits CSV', '2025-08-14 12:16:49', '2025-08-14 12:22:40'),
(158, 'calls.report', 'View calls report', '2025-08-14 12:22:40', '2025-08-14 12:22:40'),
(159, 'calls.report.export', 'Export calls CSV', '2025-08-14 12:22:40', '2025-08-14 12:22:40');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(11, 'App\\Models\\User', 1, 'auth_token', '6372457464b4cbf239e40c63c0a1a3ec2f8f42d0b4dd539ad762e28bd2e30de2', '[\"*\"]', '2025-04-10 18:04:20', NULL, '2025-04-10 18:03:31', '2025-04-10 18:04:20'),
(12, 'App\\Models\\User', 4, 'auth_token', 'b885829068d2c63c44168e89d859c3933e7ebdd2476689d8a6c48bc201706aad', '[\"*\"]', '2025-04-10 20:36:32', NULL, '2025-04-10 18:18:19', '2025-04-10 20:36:32'),
(13, 'App\\Models\\User', 1, 'auth_token', '80c404a621dbd2a41318a904d0823f9acc8dd635dc83027583b9fcf6a9baf1d5', '[\"*\"]', NULL, NULL, '2025-04-11 11:07:48', '2025-04-11 11:07:48'),
(16, 'App\\Models\\User', 5, 'auth_token', '538d9122932baf33e53832f8b188ed73cc8e63cd6475294414fc8279e0b87324', '[\"*\"]', '2025-04-11 13:10:58', NULL, '2025-04-11 13:06:12', '2025-04-11 13:10:58'),
(17, 'App\\Models\\User', 1, 'auth_token', 'e2fc5a290edcca98c1fbf3c55a7e312531fac7abc137057ac117a7cbb2ce373d', '[\"*\"]', '2025-04-11 18:41:22', NULL, '2025-04-11 17:13:22', '2025-04-11 18:41:22'),
(18, 'App\\Models\\User', 1, 'auth_token', 'a681101b69343aa50bdf2b830ff312237351a8c296c84fe7dce933c4b4ff1da4', '[\"*\"]', '2025-04-18 14:44:10', NULL, '2025-04-18 14:43:41', '2025-04-18 14:44:10'),
(22, 'App\\Models\\User', 30, 'auth_token', '352966027a3bbbca774e85ca68fc5de9a0bfbcff7bdf8e7eb9786ff131c1087b', '[\"*\"]', '2025-04-18 20:42:06', NULL, '2025-04-18 19:56:21', '2025-04-18 20:42:06'),
(23, 'App\\Models\\User', 30, 'auth_token', 'ce7d0e702e90e28e391fb03afa3d070c076fa6f3fca654bce2171c71c615d236', '[\"*\"]', '2025-04-18 20:28:13', NULL, '2025-04-18 20:09:35', '2025-04-18 20:28:13'),
(24, 'App\\Models\\User', 30, 'auth_token', '6261f7f112c44980976ee47ccd1af22098214100a91cd72be21b8e4f7ef511c5', '[\"*\"]', '2025-04-18 20:28:50', NULL, '2025-04-18 20:28:48', '2025-04-18 20:28:50'),
(26, 'App\\Models\\User', 30, 'auth_token', '73b081ff697b9a9102989d98d32649f6e3b39ce8cde2c632750c8f4e3d350150', '[\"*\"]', '2025-04-18 20:49:13', NULL, '2025-04-18 20:43:07', '2025-04-18 20:49:13'),
(27, 'App\\Models\\User', 30, 'auth_token', '5e38039f4e0883ee2f01b3ef1cbe5a99d93cc06188465c14d8886a54af55787e', '[\"*\"]', '2025-04-23 19:01:44', NULL, '2025-04-18 21:01:32', '2025-04-23 19:01:44'),
(30, 'App\\Models\\User', 30, 'auth_token', 'f1b87bc95e6572841e084bdbc9d93cde24db8c858c75f003fd33a08a4945696b', '[\"*\"]', '2025-04-23 19:34:11', NULL, '2025-04-23 13:49:27', '2025-04-23 19:34:11'),
(41, 'App\\Models\\User', 74, 'auth_token', 'f6092a6c18236f644af76506496f6077e70908e6115ca6621a365619d4541029', '[\"*\"]', '2025-05-29 09:27:08', NULL, '2025-05-29 09:27:03', '2025-05-29 09:27:08'),
(44, 'App\\Models\\User', 74, 'auth_token', '589b1d88d35810a234191e2bf0a5729ea34f3ac529e3ec282b854f759082e581', '[\"*\"]', '2025-05-29 15:59:07', NULL, '2025-05-29 13:26:07', '2025-05-29 15:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'admin', '2025-08-10 18:27:17', '2025-08-10 18:27:17'),
(7, 'manger', '2025-08-10 19:58:22', '2025-08-10 19:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_id`) VALUES
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(6, 15),
(6, 16),
(6, 17),
(6, 18),
(6, 19),
(6, 20),
(6, 21),
(6, 22),
(6, 23),
(6, 24),
(6, 25),
(6, 26),
(6, 50),
(6, 77),
(6, 78),
(6, 79),
(6, 80),
(6, 81),
(6, 82),
(6, 83),
(6, 84),
(6, 85),
(6, 86),
(6, 119),
(6, 120),
(6, 158),
(6, 159),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 24),
(7, 25),
(7, 26),
(7, 77),
(7, 78),
(7, 79),
(7, 80),
(7, 81);

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
('0nfesXPNFiMW6pQlta2DThZM6iAXqiYttJsgpWm3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekU4ZnpQVkZscElPdkY2TmhtaVZtQ1ZXQmZTVlkyTkZPMWxBN01DQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9leGFtLXRpbWVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1748544591),
('6Ni2tyUzGpBL6EAi9ZH0zBG3pIXBrzpSahiqSrTn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGw2R3o2elFYZjJ0Z3lmd2RvWUZ1YkI4N1U5ZnZIYlg2cENjcTR5OCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9leGFtLXRpbWVzP3NlYXJjaD0mc2VtZXN0ZXI9MjAyNDIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748549981),
('QX5RfsFGKHakfisSTkauChGG1cjZKCDXoZpO67eO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmdGeWNOc252U051d0JuSGxTNEVaRzNOWWs2Q3Vpd21mMmtKTmxJViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9leGFtLXRpbWVzL3N0dWRlbnRzP2NvdXJzZV9ubz03NyZzZWN0aW9uPTEmc2VtZXN0ZXI9MjAyNDIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1748543234);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `stored_name` varchar(255) NOT NULL,
  `mime` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `uploaded_by` bigint(20) UNSIGNED DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `original_name`, `stored_name`, `mime`, `size`, `uploaded_by`, `path`, `created_at`, `updated_at`) VALUES
(1, 'customer_template.csv', '83ec0d9d-09e6-442b-81da-d3586001cd44.csv', 'text/csv', 173, 74, 'uploads/83ec0d9d-09e6-442b-81da-d3586001cd44.csv', '2025-08-10 19:06:05', '2025-08-10 19:06:05'),
(2, 'كشف ارقام الطلاب.xlsx', 'e95e3add-7b05-4a97-a5cf-88a126bd1a3e.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 6266131, 74, 'uploads/e95e3add-7b05-4a97-a5cf-88a126bd1a3e.xlsx', '2025-08-11 07:15:22', '2025-08-11 07:15:22'),
(3, 'كشف ارقام الطلاب.csv', '6b5444b6-39a3-4928-bdac-2845bd4d42c7.csv', 'text/csv', 8358386, 74, 'uploads/6b5444b6-39a3-4928-bdac-2845bd4d42c7.csv', '2025-08-11 07:30:18', '2025-08-11 07:30:18'),
(4, 'كشف ارقام الطلاب.xlsx', '7976094c-eaef-49e9-9c2f-ef1312430b38.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 6266131, 74, 'uploads/7976094c-eaef-49e9-9c2f-ef1312430b38.xlsx', '2025-08-11 07:32:39', '2025-08-11 07:32:39'),
(5, 'كشف ارقام الطلاب.xlsx', '53d90b97-5325-469e-9e33-bec271683ed1.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 6266131, 74, 'uploads/53d90b97-5325-469e-9e33-bec271683ed1.xlsx', '2025-08-11 07:46:39', '2025-08-11 07:46:39'),
(6, 'كشف ارقام الطلاب.csv', '79326639-7ef4-4983-a507-dae2dea11e1f.csv', 'text/csv', 8358386, 74, 'uploads/79326639-7ef4-4983-a507-dae2dea11e1f.csv', '2025-08-11 07:46:49', '2025-08-11 07:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `instructor_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `instructor_id`) VALUES
(74, 6, 'admin', 'admin@gmail.com', NULL, '$2y$12$oKz0l0zdZrEkzuUlZi1.auEsrxthv66IJs3Ik50Xg.ah6dah2KUqa', NULL, '2025-05-26 16:22:12', '2025-05-26 16:22:12', NULL),
(75, 7, 'manger', 'manger@gmail.com', NULL, '$2y$12$HZ0HO9.KDzglEmT/SQzZAOj7R6Jz1dE5LMuBD/FRrqqgjfAr8.q3W', NULL, '2025-08-10 19:50:03', '2025-08-12 09:00:41', NULL),
(76, 6, 'راما', 'ramafararjeh200325@gmail.com', NULL, '$2y$12$HstEIQGk9sp5MmQdnHjVEuV9NjjGeOiaoq/9SLlZ9uqgpEy3QFxJu', NULL, '2025-08-14 08:10:38', '2025-08-14 08:51:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gpa` decimal(5,2) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `referral_source` varchar(255) DEFAULT NULL,
  `interested_majors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`interested_majors`)),
  `is_interested` tinyint(1) NOT NULL DEFAULT 1,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `phone`, `name`, `gpa`, `branch`, `referral_source`, `interested_majors`, `is_interested`, `employee_id`, `notes`, `created_at`, `updated_at`) VALUES
(1, '0782057224', 'Rama', 88.00, 'علمي', 'صديق', '[\"\\u062a\\u0633\\u0648\\u064a\\u0642\"]', 1, 74, 'تانت', '2025-08-14 11:17:54', '2025-08-14 11:17:54');

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
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calls_employee_id_is_interested_index` (`employee_id`,`is_interested`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

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
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uploads_stored_name_unique` (`stored_name`),
  ADD KEY `uploads_uploaded_by_foreign` (`uploaded_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_instructor_id_unique` (`instructor_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_employee_id_is_interested_index` (`employee_id`,`is_interested`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calls`
--
ALTER TABLE `calls`
  ADD CONSTRAINT `calls_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

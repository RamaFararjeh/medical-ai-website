-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2025 at 01:24 PM
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
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paragraph` text NOT NULL,
  `points` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`points`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `paragraph`, `points`, `created_at`, `updated_at`) VALUES
(1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '[\"Medical And Surgical Services\",\"Outpatient Services\",\"Medicine & instrument\",\"Instant Operation & Appointment\",\"Comprehensive Inpatient Services\"]', '2025-11-05 16:14:22', '2025-12-02 14:52:18');

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
('medical_cache_admin.dashboard.stats.v2', 'a:8:{s:7:\"doctors\";i:10;s:5:\"users\";i:6;s:5:\"about\";i:1;s:6:\"values\";i:1;s:7:\"mission\";i:1;s:4:\"work\";i:1;s:7:\"process\";i:1;s:11:\"contactInfo\";i:1;}', 1766619920);

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
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(190) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `address`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Amman, Jordan marka', 'medical@support.com', '0790001112', '2025-11-05 18:18:16', '2025-12-02 15:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(190) NOT NULL,
  `subject` varchar(190) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Rama Rajeh Alfararjeh', 'ramafararjeh200325@gmail.com', 'Hi', 'ksdnc xzaklsdnclkm;', '2025-11-12 11:49:14', '2025-11-12 11:49:14'),
(2, 'mohammad emad', 'mohammadrajha12345@gmail.com', 'dsn', 'dsknklnlk', '2025-11-12 11:52:28', '2025-11-12 11:52:28'),
(4, 'Rama Rajeh Alfararjeh', 'ramafararjeh200325@gmail.com', 'jfbsdkj', 'kfdnkxcv ,.', '2025-12-02 15:04:34', '2025-12-02 15:04:34'),
(5, 'silina', 'silina@gmile.com', 'khbjln', 'bkjln;m;', '2025-12-08 09:22:03', '2025-12-08 09:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `severity` int(11) DEFAULT NULL,
  `risk` varchar(255) DEFAULT NULL,
  `top_disease` varchar(255) DEFAULT NULL,
  `top_probability` double DEFAULT NULL,
  `predictions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`predictions`)),
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`id`, `user_id`, `age`, `gender`, `duration`, `severity`, `risk`, `top_disease`, `top_probability`, `predictions`, `notes`, `created_at`, `updated_at`) VALUES
(1, 74, 20, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-03 09:38:01', '2025-12-03 09:38:01'),
(3, 74, 22, 'female', 0, 5, 'low', 'neurosis', 0.01939585484703, '[{\"disease\":\"neurosis\",\"probability\":0.019395854847030315,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"iridocyclitis\",\"probability\":0.017923783453256913,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"preeclampsia\",\"probability\":0.013313215764225892,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tooth disorder\",\"probability\":0.013133863455452883,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"jaw disorder\",\"probability\":0.012756229065667498,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-03 10:36:52', '2025-12-03 10:36:52'),
(4, 74, 30, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-03 11:46:09', '2025-12-03 11:46:09'),
(5, 74, 30, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-03 11:47:15', '2025-12-03 11:47:15'),
(6, 74, 30, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-03 11:48:02', '2025-12-03 11:48:02'),
(7, 74, 50, 'male', 0, 5, 'high', 'hiatal hernia', 0.96208492899369, '[{\"disease\":\"hiatal hernia\",\"probability\":0.9620849289936915,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"esophagitis\",\"probability\":0.012763218912243236,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"stricture of the esophagus\",\"probability\":0.011077439409607207,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"gastroesophageal reflux disease (gerd)\",\"probability\":0.003025324993625813,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"abscess of the pharynx\",\"probability\":0.0009471403779162039,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-03 11:52:25', '2025-12-03 11:52:25'),
(8, 74, 50, 'male', 0, 5, 'high', 'hiatal hernia', 0.96208492899369, '[{\"disease\":\"hiatal hernia\",\"probability\":0.9620849289936915,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"esophagitis\",\"probability\":0.012763218912243236,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"stricture of the esophagus\",\"probability\":0.011077439409607207,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"gastroesophageal reflux disease (gerd)\",\"probability\":0.003025324993625813,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"abscess of the pharynx\",\"probability\":0.0009471403779162039,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-03 11:58:27', '2025-12-03 11:58:27'),
(9, 74, 22, 'female', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-08 09:24:40', '2025-12-08 09:24:40'),
(10, NULL, 22, 'female', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 09:23:44', '2025-12-15 09:23:44'),
(11, NULL, 22, 'female', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 09:58:58', '2025-12-15 09:58:58'),
(12, NULL, 22, 'female', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 10:28:24', '2025-12-15 10:28:24'),
(13, NULL, 22, 'female', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 10:29:30', '2025-12-15 10:29:30'),
(14, NULL, 20, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 10:30:07', '2025-12-15 10:30:07'),
(15, NULL, 20, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 10:41:31', '2025-12-15 10:41:31'),
(16, NULL, 20, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 10:41:56', '2025-12-15 10:41:56'),
(17, NULL, 20, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 10:46:28', '2025-12-15 10:46:28'),
(18, NULL, 20, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 10:47:01', '2025-12-15 10:47:01'),
(19, NULL, 50, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 17:47:07', '2025-12-15 17:47:07'),
(20, NULL, 50, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 17:51:21', '2025-12-15 17:51:21'),
(21, NULL, 80, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 17:52:03', '2025-12-15 17:52:03'),
(22, NULL, 80, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 17:52:30', '2025-12-15 17:52:30'),
(23, NULL, 80, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 17:55:10', '2025-12-15 17:55:10'),
(24, NULL, 25, 'male', 0, 5, 'moderate', 'seasonal allergies (hay fever)', 0.51608918056865, '[{\"disease\":\"seasonal allergies (hay fever)\",\"probability\":0.5160891805686484,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"tracheitis\",\"probability\":0.13884573135090814,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"conjunctivitis due to allergy\",\"probability\":0.0247462826714534,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"oral mucosal lesion\",\"probability\":0.018647875147573538,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"impetigo\",\"probability\":0.01849785563892382,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 17:55:46', '2025-12-15 17:55:46'),
(25, NULL, 30, 'male', 0, 5, 'high', 'hiatal hernia', 0.96208492899369, '[{\"disease\":\"hiatal hernia\",\"probability\":0.9620849289936915,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"esophagitis\",\"probability\":0.012763218912243236,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"stricture of the esophagus\",\"probability\":0.011077439409607207,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"gastroesophageal reflux disease (gerd)\",\"probability\":0.003025324993625813,\"home_care\":null,\"when_to_see_doctor\":null},{\"disease\":\"abscess of the pharynx\",\"probability\":0.0009471403779162039,\"home_care\":null,\"when_to_see_doctor\":null}]', '', '2025-12-15 17:59:44', '2025-12-15 17:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis_symptoms`
--

CREATE TABLE `diagnosis_symptoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diagnosis_id` bigint(20) UNSIGNED NOT NULL,
  `symptom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosis_symptoms`
--

INSERT INTO `diagnosis_symptoms` (`id`, `diagnosis_id`, `symptom`, `created_at`, `updated_at`) VALUES
(1, 1, 'sore throat', '2025-12-03 09:38:01', '2025-12-03 09:38:01'),
(2, 1, 'cough', '2025-12-03 09:38:01', '2025-12-03 09:38:01'),
(3, 1, 'sneezing', '2025-12-03 09:38:01', '2025-12-03 09:38:01'),
(4, 1, 'sore in nose', '2025-12-03 09:38:01', '2025-12-03 09:38:01'),
(6, 3, 'headache', '2025-12-03 10:36:52', '2025-12-03 10:36:52'),
(7, 4, 'sore throat', '2025-12-03 11:46:09', '2025-12-03 11:46:09'),
(8, 4, 'cough', '2025-12-03 11:46:09', '2025-12-03 11:46:09'),
(9, 4, 'sneezing', '2025-12-03 11:46:09', '2025-12-03 11:46:09'),
(10, 4, 'sore in nose', '2025-12-03 11:46:09', '2025-12-03 11:46:09'),
(11, 5, 'sore throat', '2025-12-03 11:47:15', '2025-12-03 11:47:15'),
(12, 5, 'cough', '2025-12-03 11:47:15', '2025-12-03 11:47:15'),
(13, 5, 'sneezing', '2025-12-03 11:47:15', '2025-12-03 11:47:15'),
(14, 5, 'sore in nose', '2025-12-03 11:47:15', '2025-12-03 11:47:15'),
(15, 6, 'sore throat', '2025-12-03 11:48:02', '2025-12-03 11:48:02'),
(16, 6, 'cough', '2025-12-03 11:48:02', '2025-12-03 11:48:02'),
(17, 6, 'sneezing', '2025-12-03 11:48:02', '2025-12-03 11:48:02'),
(18, 6, 'sore in nose', '2025-12-03 11:48:02', '2025-12-03 11:48:02'),
(19, 7, 'sharp chest pain', '2025-12-03 11:52:25', '2025-12-03 11:52:25'),
(20, 7, 'difficulty in swallowing', '2025-12-03 11:52:25', '2025-12-03 11:52:25'),
(21, 7, 'regurgitation', '2025-12-03 11:52:25', '2025-12-03 11:52:25'),
(22, 7, 'heartburn', '2025-12-03 11:52:25', '2025-12-03 11:52:25'),
(23, 8, 'sharp chest pain', '2025-12-03 11:58:27', '2025-12-03 11:58:27'),
(24, 8, 'difficulty in swallowing', '2025-12-03 11:58:27', '2025-12-03 11:58:27'),
(25, 8, 'regurgitation', '2025-12-03 11:58:27', '2025-12-03 11:58:27'),
(26, 8, 'heartburn', '2025-12-03 11:58:27', '2025-12-03 11:58:27'),
(27, 9, 'sore throat', '2025-12-08 09:24:40', '2025-12-08 09:24:40'),
(28, 9, 'cough', '2025-12-08 09:24:40', '2025-12-08 09:24:40'),
(29, 9, 'sneezing', '2025-12-08 09:24:40', '2025-12-08 09:24:40'),
(30, 9, 'sore in nose', '2025-12-08 09:24:40', '2025-12-08 09:24:40'),
(31, 10, 'sore throat', '2025-12-15 09:23:44', '2025-12-15 09:23:44'),
(32, 10, 'cough', '2025-12-15 09:23:44', '2025-12-15 09:23:44'),
(33, 10, 'sneezing', '2025-12-15 09:23:44', '2025-12-15 09:23:44'),
(34, 10, 'sore in nose', '2025-12-15 09:23:44', '2025-12-15 09:23:44'),
(35, 11, 'sore throat', '2025-12-15 09:58:58', '2025-12-15 09:58:58'),
(36, 11, 'cough', '2025-12-15 09:58:58', '2025-12-15 09:58:58'),
(37, 11, 'sneezing', '2025-12-15 09:58:58', '2025-12-15 09:58:58'),
(38, 11, 'sore in nose', '2025-12-15 09:58:58', '2025-12-15 09:58:58'),
(39, 12, 'sore throat', '2025-12-15 10:28:24', '2025-12-15 10:28:24'),
(40, 12, 'cough', '2025-12-15 10:28:24', '2025-12-15 10:28:24'),
(41, 12, 'sneezing', '2025-12-15 10:28:24', '2025-12-15 10:28:24'),
(42, 12, 'sore in nose', '2025-12-15 10:28:24', '2025-12-15 10:28:24'),
(43, 13, 'sore throat', '2025-12-15 10:29:30', '2025-12-15 10:29:30'),
(44, 13, 'cough', '2025-12-15 10:29:30', '2025-12-15 10:29:30'),
(45, 13, 'sneezing', '2025-12-15 10:29:30', '2025-12-15 10:29:30'),
(46, 13, 'sore in nose', '2025-12-15 10:29:30', '2025-12-15 10:29:30'),
(47, 14, 'sore throat', '2025-12-15 10:30:07', '2025-12-15 10:30:07'),
(48, 14, 'cough', '2025-12-15 10:30:07', '2025-12-15 10:30:07'),
(49, 14, 'sneezing', '2025-12-15 10:30:07', '2025-12-15 10:30:07'),
(50, 14, 'sore in nose', '2025-12-15 10:30:07', '2025-12-15 10:30:07'),
(51, 15, 'sore throat', '2025-12-15 10:41:31', '2025-12-15 10:41:31'),
(52, 15, 'cough', '2025-12-15 10:41:31', '2025-12-15 10:41:31'),
(53, 15, 'sneezing', '2025-12-15 10:41:31', '2025-12-15 10:41:31'),
(54, 15, 'sore in nose', '2025-12-15 10:41:31', '2025-12-15 10:41:31'),
(55, 16, 'sore throat', '2025-12-15 10:41:56', '2025-12-15 10:41:56'),
(56, 16, 'cough', '2025-12-15 10:41:56', '2025-12-15 10:41:56'),
(57, 16, 'sneezing', '2025-12-15 10:41:56', '2025-12-15 10:41:56'),
(58, 16, 'sore in nose', '2025-12-15 10:41:56', '2025-12-15 10:41:56'),
(59, 17, 'sore throat', '2025-12-15 10:46:28', '2025-12-15 10:46:28'),
(60, 17, 'cough', '2025-12-15 10:46:28', '2025-12-15 10:46:28'),
(61, 17, 'sneezing', '2025-12-15 10:46:28', '2025-12-15 10:46:28'),
(62, 17, 'sore in nose', '2025-12-15 10:46:28', '2025-12-15 10:46:28'),
(63, 18, 'sore throat', '2025-12-15 10:47:01', '2025-12-15 10:47:01'),
(64, 18, 'cough', '2025-12-15 10:47:01', '2025-12-15 10:47:01'),
(65, 18, 'sneezing', '2025-12-15 10:47:01', '2025-12-15 10:47:01'),
(66, 18, 'sore in nose', '2025-12-15 10:47:01', '2025-12-15 10:47:01'),
(67, 19, 'sore throat', '2025-12-15 17:47:07', '2025-12-15 17:47:07'),
(68, 19, 'cough', '2025-12-15 17:47:07', '2025-12-15 17:47:07'),
(69, 19, 'sneezing', '2025-12-15 17:47:07', '2025-12-15 17:47:07'),
(70, 19, 'sore in nose', '2025-12-15 17:47:07', '2025-12-15 17:47:07'),
(71, 20, 'sore throat', '2025-12-15 17:51:21', '2025-12-15 17:51:21'),
(72, 20, 'cough', '2025-12-15 17:51:21', '2025-12-15 17:51:21'),
(73, 20, 'sneezing', '2025-12-15 17:51:21', '2025-12-15 17:51:21'),
(74, 20, 'sore in nose', '2025-12-15 17:51:21', '2025-12-15 17:51:21'),
(75, 21, 'sore throat', '2025-12-15 17:52:03', '2025-12-15 17:52:03'),
(76, 21, 'cough', '2025-12-15 17:52:03', '2025-12-15 17:52:03'),
(77, 21, 'sneezing', '2025-12-15 17:52:03', '2025-12-15 17:52:03'),
(78, 21, 'sore in nose', '2025-12-15 17:52:03', '2025-12-15 17:52:03'),
(79, 22, 'sore throat', '2025-12-15 17:52:30', '2025-12-15 17:52:30'),
(80, 22, 'cough', '2025-12-15 17:52:30', '2025-12-15 17:52:30'),
(81, 22, 'sneezing', '2025-12-15 17:52:30', '2025-12-15 17:52:30'),
(82, 22, 'sore in nose', '2025-12-15 17:52:30', '2025-12-15 17:52:30'),
(83, 23, 'sore throat', '2025-12-15 17:55:10', '2025-12-15 17:55:10'),
(84, 23, 'cough', '2025-12-15 17:55:10', '2025-12-15 17:55:10'),
(85, 23, 'sneezing', '2025-12-15 17:55:10', '2025-12-15 17:55:10'),
(86, 23, 'sore in nose', '2025-12-15 17:55:10', '2025-12-15 17:55:10'),
(87, 24, 'sore throat', '2025-12-15 17:55:46', '2025-12-15 17:55:46'),
(88, 24, 'cough', '2025-12-15 17:55:46', '2025-12-15 17:55:46'),
(89, 24, 'sneezing', '2025-12-15 17:55:46', '2025-12-15 17:55:46'),
(90, 24, 'sore in nose', '2025-12-15 17:55:46', '2025-12-15 17:55:46'),
(91, 25, 'sharp chest pain', '2025-12-15 17:59:44', '2025-12-15 17:59:44'),
(92, 25, 'difficulty in swallowing', '2025-12-15 17:59:44', '2025-12-15 17:59:44'),
(93, 25, 'regurgitation', '2025-12-15 17:59:44', '2025-12-15 17:59:44'),
(94, 25, 'heartburn', '2025-12-15 17:59:44', '2025-12-15 17:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(190) NOT NULL,
  `specialty` varchar(190) DEFAULT NULL,
  `age` tinyint(3) UNSIGNED DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `email` varchar(190) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `years_experience` tinyint(3) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `specialty`, `age`, `gender`, `email`, `phone`, `years_experience`, `photo`, `bio`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'Dr. Ahmad Al-Majali', 'Internal Medicine', 45, 'male', 'ahmad.internal@medical.com', '+962 79 123 4567', 18, 'uploads/doctors/yyWJ2NlaUexsxchpuaAv1XdSLAADrBydImvBUa87.png', 'Internist focusing on chronic diseases like diabetes, hypertension and infectious illnesses.', 1, '2025-12-03 12:10:37', '2025-12-03 12:10:37'),
(6, 'Dr. Sara Al-Hassan', 'Gastroenterology', 42, 'female', 'sara.gastro@medical.com', '+962 78 234 5678', 15, 'uploads/doctors/MI8rtXGA5q7k1qUAuzLSO4viCk76oZc7qxZx516s.jpg', 'Gastroenterologist with special interest in GERD, hiatal hernia and inflammatory bowel disease.', 1, '2025-12-03 12:12:08', '2025-12-03 12:12:08'),
(7, 'Dr. Khaled Al-Rawashdeh', 'Pulmonology', 48, 'male', 'khaled.pulmo@medical.com', '+962 77 345 6789', 20, 'uploads/doctors/pL6Iq2lDKFhEU1bRaHioBMOOPKWBUYqcsSTFUxJT.png', 'Pulmonologist treating asthma, COPD, bronchitis and complex respiratory cases.', 1, '2025-12-03 12:13:18', '2025-12-03 12:13:18'),
(8, 'Dr. Rawan Abu Zaid', 'Psychiatry', 39, 'female', 'rawan.psy@medical.com', '+962 79 456 7890', 12, 'uploads/doctors/EPxhYrFC2qgNAM8DWYXhIZUB7ROZxQwVw7gFoijI.jpg', 'Psychiatrist focusing on anxiety, depression, panic disorder and stress-related conditions.', 1, '2025-12-03 12:14:32', '2025-12-03 12:14:32'),
(9, 'Dr. Lina Al-Qudah', 'Allergy & Immunology', 37, 'female', 'lina.allergy@medical.com', '+962 78 567 8901', 10, 'uploads/doctors/WKpBfJvTULQoiXJszZKFkQyVPgH5tsyp6Mws96PT.jpg', 'Allergist–immunologist treating hay fever, food and drug allergies, and chronic urticaria.', 1, '2025-12-03 12:16:10', '2025-12-03 12:16:10'),
(10, 'Dr. Yazan Al-Hindi', 'Dermatology', 41, 'male', 'yazan.derma@medical.com', '+962 77 678 9012', 14, 'uploads/doctors/bStVO6aVwqUpCF16PdWZTPfVEg3k9MgNj6PrNbcD.png', 'Dermatologist experienced in dermatitis, acne, psoriasis and hair loss problems.', 1, '2025-12-03 14:40:53', '2025-12-03 14:40:53'),
(11, 'Dr. Hiba Al-Kilani', 'Otolaryngology (ENT)', 44, 'female', 'hiba.ent@medical.com', '+962 79 789 0123', 17, 'uploads/doctors/xtXlLTYTPasHopY7P0M2qzgMD2Gcj0DDiW8D2ph1.jpg', 'ENT specialist for sinusitis, pharyngitis, ear infections and voice problems.', 1, '2025-12-03 14:42:19', '2025-12-03 14:42:19'),
(12, 'Dr. Mohammad Al-Tarawneh', 'General Surgery', 50, 'male', 'mohammad.surgery@medical.com', '+962 78 890 1234', 25, 'uploads/doctors/wDbwfxIxLWJIrYTMM88PbEVkFgoQnqM1bEymBfJ7.png', 'General surgeon performing hernia repair, gallbladder, appendix and abdominal surgeries.', 1, '2025-12-03 14:43:29', '2025-12-03 14:43:29'),
(13, 'Dr. Basel Al-Salman', 'Cardiology', 47, 'male', 'basel.cardio@medical.com', '+962 77 901 2345', 19, 'uploads/doctors/lzq7fhTaDaMmxWbXBgiO8uXNd2kTLpmM2QB8wWWQ.png', 'Cardiologist managing angina, arrhythmia, heart failure and preventive cardiology.', 1, '2025-12-03 14:44:33', '2025-12-03 14:44:33'),
(14, 'Dr. Dana Al-Haddad', 'Vascular Surgery', 46, 'female', 'dana.vascular@medical.com', '+962 79 012 3456', 18, 'uploads/doctors/SlKSJlAtC43emf1ADdC1mgeSXB6CItcNwSfCqeGD.jpg', 'Vascular surgeon treating varicose veins, peripheral artery disease and aortic aneurysms.', 1, '2025-12-03 14:45:43', '2025-12-16 15:38:42');

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
(14, '2025_08_14_135736_create_visits_table', 9),
(15, '2025_11_05_185027_create_about_table', 10),
(16, '2025_11_05_193409_create_values_table', 11),
(17, '2025_11_05_194819_create_mission_table', 12),
(18, '2025_11_05_200828_create_work_table', 13),
(19, '2025_11_05_210312_create_contact_info_table', 14),
(20, '2025_11_08_112720_create_process_table', 15),
(21, '2025_11_08_132335_create_doctors_table', 16),
(22, '2025_11_12_144255_create_contact_messages_table', 17),
(23, '2025_12_03_122929_create_diagnoses_table', 18),
(24, '2025_12_03_123301_create_diagnosis_symptoms_table', 19),
(25, '2025_12_20_112122_create_patients_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paragraph` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`id`, `paragraph`, `created_at`, `updated_at`) VALUES
(1, 'Deliver accessible health insights for everyone. We collaborate with medical experts to validate our content and continuously improve model performance.', '2025-11-05 17:00:14', '2025-12-02 14:54:51');

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `last_login_at`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Rama Rajeh Alfararjeh', 'rama@gmail.com', '0782057224', '$2y$12$L9qzy8RdRCnF13kMlqxz1OriK5cVtHXl5Suil5xddw4dDGcZAlYw6', NULL, '2025-12-20 13:33:21', 0, '2025-12-20 12:52:29', '2025-12-20 13:33:31'),
(2, 'silina', 'silna@gmail.com', '0785524654', '$2y$12$u428wV5ugqAjDFhv7bXLu.rcNotSL2I3iTICZLaBeHmGCxF0TOuMG', NULL, '2025-12-20 13:34:42', 1, '2025-12-20 13:34:11', '2025-12-20 13:34:42');

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
(1, 'admin-login', 'Login as admin', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(2, 'admin-login.submit', 'Submit admin login form', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(3, 'admin.logout', 'Logout admin', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(4, 'dashboard', 'Access admin dashboard', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(5, 'setting', 'Access settings page', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(6, 'roles.index', 'View list of roles', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(7, 'roles.create', 'Create new role form', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(8, 'roles.store', 'Store new role', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(9, 'roles.edit', 'Edit existing role form', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(10, 'roles.update', 'Update existing role', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(11, 'roles.destroy', 'Delete role', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(12, 'users.list', 'View list of users', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(13, 'users.add', 'Create new user form', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(14, 'users.store', 'Store new user', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(15, 'users.edit', 'Edit existing user form', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
(16, 'users.update', 'Update existing user', '2025-08-10 18:10:58', '2025-12-20 13:13:39'),
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
(159, 'calls.report.export', 'Export calls CSV', '2025-08-14 12:22:40', '2025-08-14 12:22:40'),
(199, 'about.index', 'View list of about items', '2025-11-05 16:08:22', '2025-12-20 13:13:39'),
(200, 'about.create', 'Create new about item form', '2025-11-05 16:08:22', '2025-12-20 13:13:39'),
(201, 'about.store', 'Store new about item', '2025-11-05 16:08:22', '2025-12-20 13:13:39'),
(202, 'about.edit', 'Edit existing about item form', '2025-11-05 16:08:22', '2025-12-20 13:13:39'),
(203, 'about.update', 'Update existing about item', '2025-11-05 16:08:22', '2025-12-20 13:13:39'),
(204, 'about.destroy', 'Delete about item', '2025-11-05 16:08:22', '2025-12-20 13:13:39'),
(221, 'value.index', 'View list of values', '2025-11-05 16:42:20', '2025-12-20 13:13:39'),
(222, 'value.create', 'Create new value form', '2025-11-05 16:42:20', '2025-12-20 13:13:39'),
(223, 'value.store', 'Store new value', '2025-11-05 16:42:20', '2025-12-20 13:13:39'),
(224, 'value.edit', 'Edit existing value form', '2025-11-05 16:42:20', '2025-12-20 13:13:39'),
(225, 'value.update', 'Update existing value', '2025-11-05 16:42:20', '2025-12-20 13:13:39'),
(226, 'value.destroy', 'Delete value', '2025-11-05 16:42:20', '2025-12-20 13:13:39'),
(249, 'mission.index', 'View mission list', '2025-11-05 16:59:49', '2025-12-20 13:13:39'),
(250, 'mission.create', 'Create mission form', '2025-11-05 16:59:49', '2025-12-20 13:13:39'),
(251, 'mission.store', 'Store mission', '2025-11-05 16:59:49', '2025-12-20 13:13:39'),
(252, 'mission.edit', 'Edit mission form', '2025-11-05 16:59:49', '2025-12-20 13:13:39'),
(253, 'mission.update', 'Update mission', '2025-11-05 16:59:49', '2025-12-20 13:13:39'),
(254, 'mission.destroy', 'Delete mission', '2025-11-05 16:59:49', '2025-12-20 13:13:39'),
(283, 'work.index', 'View list of work', '2025-11-05 17:14:42', '2025-12-20 13:13:39'),
(284, 'work.create', 'Create new work form', '2025-11-05 17:14:42', '2025-12-20 13:13:39'),
(285, 'work.store', 'Store new work', '2025-11-05 17:14:42', '2025-12-20 13:13:39'),
(286, 'work.edit', 'Edit work form', '2025-11-05 17:14:42', '2025-12-20 13:13:39'),
(287, 'work.update', 'Update work', '2025-11-05 17:14:42', '2025-12-20 13:13:39'),
(288, 'work.destroy', 'Delete work', '2025-11-05 17:14:42', '2025-12-20 13:13:39'),
(323, 'contact.index', 'View contact info list', '2025-11-05 18:15:30', '2025-12-20 13:13:39'),
(324, 'contact.create', 'Create contact info form', '2025-11-05 18:15:30', '2025-12-20 13:13:39'),
(325, 'contact.store', 'Store contact info', '2025-11-05 18:15:30', '2025-12-20 13:13:39'),
(326, 'contact.edit', 'Edit contact info form', '2025-11-05 18:15:30', '2025-12-20 13:13:39'),
(327, 'contact.update', 'Update contact info', '2025-11-05 18:15:30', '2025-12-20 13:13:39'),
(328, 'contact.destroy', 'Delete contact info', '2025-11-05 18:15:30', '2025-12-20 13:13:39'),
(369, 'process.index', 'View list of process', '2025-11-08 08:32:44', '2025-12-20 13:13:39'),
(370, 'process.create', 'Create process form', '2025-11-08 08:32:44', '2025-12-20 13:13:39'),
(371, 'process.store', 'Store process', '2025-11-08 08:32:44', '2025-12-20 13:13:39'),
(372, 'process.edit', 'Edit process form', '2025-11-08 08:32:44', '2025-12-20 13:13:39'),
(373, 'process.update', 'Update process', '2025-11-08 08:32:44', '2025-12-20 13:13:39'),
(374, 'process.destroy', 'Delete process', '2025-11-08 08:32:44', '2025-12-20 13:13:39'),
(421, 'doctors.index', 'View list of doctors', '2025-11-08 10:26:41', '2025-12-20 13:13:39'),
(422, 'doctors.create', 'Create new doctor form', '2025-11-08 10:26:41', '2025-12-20 13:13:39'),
(423, 'doctors.store', 'Store doctor', '2025-11-08 10:26:41', '2025-12-20 13:13:39'),
(424, 'doctors.edit', 'Edit doctor form', '2025-11-08 10:26:41', '2025-12-20 13:13:39'),
(425, 'doctors.update', 'Update doctor', '2025-11-08 10:26:41', '2025-12-20 13:13:39'),
(426, 'doctors.destroy', 'Delete doctor', '2025-11-08 10:26:41', '2025-12-20 13:13:39'),
(427, 'contact-messages.index', 'View contact messages list', '2025-12-03 08:33:01', '2025-12-20 13:13:39'),
(428, 'contact-messages.show', 'View single contact message', '2025-12-03 08:33:01', '2025-12-20 13:13:39'),
(429, 'contact-messages.destroy', 'Delete contact message', '2025-12-03 08:33:01', '2025-12-20 13:13:39'),
(488, 'diagnosis-logs.index', 'View AI diagnosis logs', '2025-12-03 09:49:46', '2025-12-20 13:13:39'),
(489, 'diagnosis-logs.show', 'View single diagnosis log', '2025-12-03 09:49:46', '2025-12-20 13:13:39'),
(490, 'diagnosis-logs.export', 'Export diagnosis logs', '2025-12-03 09:49:46', '2025-12-20 13:13:39'),
(491, 'diagnosis-reports.index', 'View diagnosis analytics dashboard', '2025-12-03 09:49:46', '2025-12-20 13:13:39'),
(492, 'patients.index', 'View list of patients', '2025-12-20 13:13:39', '2025-12-20 13:13:39'),
(493, 'patients.show', 'View patient details', '2025-12-20 13:13:39', '2025-12-20 13:13:39'),
(494, 'patients.create', 'Create new patient form', '2025-12-20 13:13:39', '2025-12-20 13:13:39'),
(495, 'patients.store', 'Store new patient', '2025-12-20 13:13:39', '2025-12-20 13:13:39'),
(496, 'patients.edit', 'Edit patient form', '2025-12-20 13:13:39', '2025-12-20 13:13:39'),
(497, 'patients.update', 'Update patient', '2025-12-20 13:13:39', '2025-12-20 13:13:39'),
(498, 'patients.destroy', 'Delete patient', '2025-12-20 13:13:39', '2025-12-20 13:13:39');

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
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `items`, `created_at`, `updated_at`) VALUES
(1, '[{\"title\":\"Start\",\"description\":\"Open the checker and accept the notice.\"},{\"title\":\"Profile\",\"description\":\"Enter age & gender to tailor suggestions.\"},{\"title\":\"Symptoms\",\"description\":\"Select your current symptoms from the list.\"},{\"title\":\"AI Analysis\",\"description\":\"Model processes patterns & risk factors.\"},{\"title\":\"Result\",\"description\":\"Get likely conditions & next actions.\"}]', '2025-11-08 09:36:08', '2025-11-12 09:11:48');

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
(8, 'Doctors', '2025-12-16 14:13:10', '2025-12-16 14:13:10');

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
(6, 199),
(6, 200),
(6, 201),
(6, 202),
(6, 203),
(6, 204),
(6, 221),
(6, 222),
(6, 223),
(6, 224),
(6, 225),
(6, 226),
(6, 249),
(6, 250),
(6, 251),
(6, 252),
(6, 253),
(6, 254),
(6, 283),
(6, 284),
(6, 285),
(6, 286),
(6, 287),
(6, 288),
(6, 323),
(6, 324),
(6, 325),
(6, 326),
(6, 327),
(6, 328),
(6, 369),
(6, 370),
(6, 371),
(6, 372),
(6, 373),
(6, 374),
(6, 421),
(6, 422),
(6, 423),
(6, 424),
(6, 425),
(6, 426),
(6, 427),
(6, 428),
(6, 429),
(6, 488),
(6, 489),
(6, 490),
(6, 491),
(6, 492),
(6, 493),
(6, 494),
(6, 495),
(6, 496),
(6, 497),
(6, 498),
(8, 4),
(8, 421),
(8, 422),
(8, 423),
(8, 424),
(8, 425),
(8, 426);

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
('2fwRYBiscwb7QanQQTnBh8YtQuGehmDMo6Yx6aZX', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDVvT056MlNwZGI2bk9FZ3p0T3BBSDF5RndIU0FlaGFPS1ptc1FnbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly9sb2NhbGhvc3QvbWVkaWNhbC9tZWRpYS9jc3Mvc3R5bGUuY3NzP3Y9MTc2NjI2MDg0NyI7fX0=', 1766260848),
('8MZos2kVyY7m9K7r4c8qKwRyn4ZECAyHXIzBJKaf', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT211TWpXRjl2QnNaU25WQ0xsb0NTNDVtcks5Q3YyYUN0UUQ5S3VlMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3QvYm9va3Nob3BfdjYvbG9naW4tYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766513617),
('GorhMPVLcdmtI2guBlFkyH7WAKCi2K53XMhTvotf', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzZ4TWRQUlBhMHcwSlRsbWZoeHZhTEdMYldsMDJQQXd0VFJ5RzNmTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9sb2NhbGhvc3QvbWVkaWNhbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766435567),
('je7Ig8FxNAS8cXUuqqi30zL6ODfkpWM8wj0dd2gf', 74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ3p5M2RlRkdGOEJ6VzUyUVdCbUs1NkRzZE5FWW9CVjhlUEJ5STgyQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3QvbWVkaWNhbC9wYW5lbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc0O30=', 1766619320),
('JiwY3jB2KdqiRqynLtjcv1kXAuRqTA9R2zldKfm8', 74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZmJXTG9OOUxWdG91VGFLUTJaWDNrVnhPaldRT280Z2FWTTNjeFBObyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3QvbWVkaWNhbC9hZG1pbi9wYXRpZW50cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc0O3M6NTQ6ImxvZ2luX3BhdGllbnRfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1766248485),
('NTmkyjxAI2OQrq3moB1TGlAJU5rvENJQmvvHW5jI', 74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibDNUZzdMR0x4Zm1DYVlmSEZpTnRCNFVJT290NEk4NmRDY0tRRTVIQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sb2NhbGhvc3QvbWVkaWNhbC9hZG1pbi9kb2N0b3JzLzUvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc0O30=', 1766424462),
('z0L4gJDgQjfpe3tsTxWb3vffEaTq2TS9k1KaBIri', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnUwVjdXSkt3bXFxWE1wT2hjRGJEQjAwa1RWMzlwc3lvdWxqRWlncCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9sb2NhbGhvc3QvbWVkaWNhbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766513618);

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
(75, NULL, 'manger', 'manger@gmail.com', NULL, '$2y$12$HZ0HO9.KDzglEmT/SQzZAOj7R6Jz1dE5LMuBD/FRrqqgjfAr8.q3W', NULL, '2025-08-10 19:50:03', '2025-08-12 09:00:41', NULL),
(76, 6, 'راما', 'ramafararjeh200325@gmail.com', NULL, '$2y$12$HstEIQGk9sp5MmQdnHjVEuV9NjjGeOiaoq/9SLlZ9uqgpEy3QFxJu', NULL, '2025-08-14 08:10:38', '2025-08-14 08:51:18', NULL),
(77, NULL, 'test', 'test@gmail.com', NULL, '$2y$12$ctSSBZChQVy8IF3xnU6fKueavMRMEsGGCJSBYFM/jwXKk5ixO4kJe', NULL, '2025-12-02 14:49:04', '2025-12-02 14:49:04', NULL),
(78, 8, 'dr.rama', 'rama@gmail.com', NULL, '$2y$12$hQS1aluizaAc6Kxsqy0uKuYn/TPxuL9CvKt.Lome4rS0hd/sOqMfW', NULL, '2025-12-16 14:15:43', '2025-12-16 14:15:43', NULL),
(79, 8, 'Dr. Dana Al-Haddad', 'dana.vascular@medical.com', NULL, '$2y$12$EJNzRMVnpR6gwCg8Le.zPuVAj0RutLea8FNUETd0jAQT05PBJx496', NULL, '2025-12-16 14:55:35', '2025-12-16 14:55:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `values`
--

CREATE TABLE `values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `values`
--

INSERT INTO `values` (`id`, `items`, `created_at`, `updated_at`) VALUES
(1, '[{\"point\":\"Trust\",\"description\":\"Transparency in how results are generated.\"},{\"point\":\"Accessibility\",\"description\":\"Simple language and mobile-first design.\"},{\"point\":\"Impact\",\"description\":\"Early guidance that helps users take the right next step.\"}]', '2025-11-05 16:45:38', '2025-12-02 14:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`items`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `items`, `created_at`, `updated_at`) VALUES
(1, '[{\"point\":\"Privacy First\",\"description\":\"We avoid storing personal identifiers and follow security best practices.\"},{\"point\":\"Clinically Reviewed\",\"description\":\"Guidance reviewed by licensed physicians and updated regularly.\"},{\"point\":\"Responsible AI\",\"description\":\"Models are trained on curated datasets and evaluated for bias & accuracy.\"}]', '2025-11-05 17:15:55', '2025-11-05 17:15:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
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
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_info_email_index` (`email`),
  ADD KEY `contact_info_phone_index` (`phone`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis_symptoms`
--
ALTER TABLE `diagnosis_symptoms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosis_symptoms_diagnosis_id_foreign` (`diagnosis_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_name_specialty_index` (`name`,`specialty`),
  ADD KEY `doctors_email_index` (`email`),
  ADD KEY `doctors_phone_index` (`phone`);

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
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

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
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_instructor_id_unique` (`instructor_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `values`
--
ALTER TABLE `values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `diagnosis_symptoms`
--
ALTER TABLE `diagnosis_symptoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `values`
--
ALTER TABLE `values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosis_symptoms`
--
ALTER TABLE `diagnosis_symptoms`
  ADD CONSTRAINT `diagnosis_symptoms_diagnosis_id_foreign` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnoses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

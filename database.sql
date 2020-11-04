-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2020 at 03:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountants`
--

CREATE TABLE `accountants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `sbalance` int(11) NOT NULL,
  `ebalance` int(11) DEFAULT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountants`
--

INSERT INTO `accountants` (`id`, `user_id`, `start`, `end`, `sbalance`, `ebalance`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '2020-11-04', '2020-11-04', 100, 100, 0, '0', '2020-11-04 07:41:12', '2020-11-04 07:41:19'),
(2, 3, '2020-11-04', NULL, 100, NULL, 100, '1', '2020-11-04 07:41:19', '2020-11-04 07:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'default', 'updated', 'App\\Borrow', 100, 'App\\User', 1, '{\"attributes\":{\"amount\":547897,\"description\":\"This description update for checking activities log changes and the amount also\"},\"old\":{\"amount\":12000,\"description\":\"this is the description\"}}', '2020-11-03 12:24:25', '2020-11-03 12:24:25'),
(2, 'default', 'deleted', 'App\\Borrow', 100, 'App\\User', 1, '{\"attributes\":{\"id\":100,\"user_id\":2,\"accountant_id\":2,\"entry_id\":1,\"amount\":547897,\"description\":\"This description update for checking activities log changes and the amount also\",\"deleted_at\":\"2020-11-03T19:18:30.000000Z\"}}', '2020-11-03 13:18:30', '2020-11-03 13:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE `agreements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `tent_id` int(11) NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance` int(11) NOT NULL,
  `yearly_percent` int(11) NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agreements`
--

INSERT INTO `agreements` (`id`, `user_id`, `property_id`, `tent_id`, `duration`, `status`, `name`, `advance`, `yearly_percent`, `attachment`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '6m', 1, 'Shop', 333, 10, 'agreement/og7c1ovlF8EnnslrCJ6eZ9yO9rCpuKiFKZTVVGMC.png', NULL, '2020-11-03 18:00:00', '2020-11-04 07:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `accountant_id` int(11) NOT NULL,
  `entry_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `user_id`, `accountant_id`, `entry_id`, `amount`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(100, 2, 2, 1, 547897, 'This description update for checking activities log changes and the amount also', '2020-11-03 13:18:30', '2020-11-02 18:00:00', '2020-11-03 13:18:30'),
(101, 2, 2, 1, 120047, 'asd', NULL, '2020-11-02 18:00:00', '2020-11-03 13:35:08'),
(102, 2, 2, 1, 1000, 'jkbh', NULL, '2020-11-02 18:00:00', '2020-11-03 13:36:50'),
(103, 2, 2, 1, 5000, 'kjiok', NULL, '2020-11-02 18:00:00', '2020-11-03 13:46:32'),
(104, 2, 2, 1, 500, 'df', NULL, '2020-11-02 18:00:00', '2020-11-03 13:49:35'),
(105, 2, 2, 1, 5454, 'dfg', NULL, '2020-11-02 18:00:00', '2020-11-03 13:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'loan',
  `amount` int(11) NOT NULL,
  `return_amount` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `entry` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_returns`
--

CREATE TABLE `loan_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `loancounter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'return',
  `amount` int(11) NOT NULL,
  `remain` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_24_160525_create_loans_table', 1),
(5, '2020_09_25_055803_create_properties_table', 1),
(6, '2020_09_25_055954_create_tents_table', 1),
(7, '2020_09_25_060052_create_agreements_table', 1),
(8, '2020_09_25_181053_create_types_table', 1),
(9, '2020_09_28_164711_create_payments_table', 1),
(10, '2020_10_06_094204_create_borrows_table', 1),
(11, '2020_10_15_131639_create_permission_tables', 1),
(12, '2020_10_16_171000_create_settings_table', 1),
(13, '2020_10_18_074008_create_expenses_table', 1),
(14, '2020_10_20_182046_create_wellparts_table', 1),
(15, '2020_10_21_164010_create_loan_returns_table', 1),
(16, '2020_10_21_171420_create_payment_returns_table', 1),
(17, '2020_10_31_144225_create_accountants_table', 1),
(18, '2020_11_02_155322_create_activity_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 2),
(3, 'App\\User', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agreement_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'payment',
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) DEFAULT NULL,
  `month` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`month`)),
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `tnxid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `agreement_id`, `user_id`, `type`, `state`, `year`, `month`, `method`, `amount`, `tnxid`, `gst`, `bank`, `account`, `branch`, `cheque`, `attachment`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(100, 1, 1, 'rent', 'payment', 2015, '[\"9\",\"10\"]', 'bank', 1000, '5fa2b3bc7a801', NULL, 'NCB', 500, 'Balid', '45458465', 'cheque/ztW9SyS7DuLfhjOJHNfrF21HwAZn6EScxXPcX7tU.png', NULL, NULL, '2020-11-04 07:59:24', '2020-11-04 07:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `payment_returns`
--

CREATE TABLE `payment_returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'return',
  `amount` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'property manage', 'web', '2020-11-03 10:36:17', '2020-11-03 10:36:17'),
(2, 'property view', 'web', '2020-11-03 10:36:17', '2020-11-03 10:36:17'),
(3, 'tent manage', 'web', '2020-11-03 10:36:17', '2020-11-03 10:36:17'),
(4, 'tent view', 'web', '2020-11-03 10:36:17', '2020-11-03 10:36:17'),
(5, 'agreement manage', 'web', '2020-11-03 10:36:17', '2020-11-03 10:36:17'),
(6, 'agreement view', 'web', '2020-11-03 10:36:17', '2020-11-03 10:36:17'),
(7, 'borrow manage', 'web', '2020-11-03 10:36:17', '2020-11-03 10:36:17'),
(8, 'borrow view', 'web', '2020-11-03 10:36:18', '2020-11-03 10:36:18'),
(9, 'wellpart manage', 'web', '2020-11-03 10:36:18', '2020-11-03 10:36:18'),
(10, 'wellpart view', 'web', '2020-11-03 10:36:18', '2020-11-03 10:36:18'),
(11, 'expense manage', 'web', '2020-11-03 10:36:18', '2020-11-03 10:36:18'),
(12, 'expense view', 'web', '2020-11-03 10:36:18', '2020-11-03 10:36:18'),
(13, 'loan manage', 'web', '2020-11-03 10:36:18', '2020-11-03 10:36:18'),
(14, 'loan view', 'web', '2020-11-03 10:36:18', '2020-11-03 10:36:18'),
(15, 'user manage', 'web', '2020-11-03 10:36:18', '2020-11-03 10:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `type_id`, `name`, `rate`, `district`, `street`, `city`, `country`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super', 1000, 'Dhaka', 'Ashulia', 'dhaka', 'Bangladesh', NULL, '2020-11-03 18:00:00', '2020-11-04 07:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2020-11-03 10:36:19', '2020-11-03 10:36:19'),
(2, 'admin', 'web', '2020-11-03 10:36:19', '2020-11-03 10:36:19'),
(3, 'super-admin', 'web', '2020-11-03 10:36:19', '2020-11-03 10:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin Panel',
  `whatsnew` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `whatsnew`, `created_at`, `updated_at`) VALUES
(1, 'Admin Panel', 0, '2020-11-03 10:36:22', '2020-11-03 14:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tents`
--

CREATE TABLE `tents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnica` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g1_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g1_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g1_cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g1_cnica` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g1_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g1_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g1_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g1_contact1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g1_contact2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g1_contact3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_cnic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_cnica` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_contact1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_contact2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g2_contact3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tents`
--

INSERT INTO `tents` (`id`, `fname`, `lname`, `cnic`, `cnica`, `address`, `city`, `country`, `contact1`, `contact2`, `contact3`, `g1_fname`, `g1_lname`, `g1_cnic`, `g1_cnica`, `g1_address`, `g1_city`, `g1_country`, `g1_contact1`, `g1_contact2`, `g1_contact3`, `g2_fname`, `g2_lname`, `g2_cnic`, `g2_cnica`, `g2_address`, `g2_city`, `g2_country`, `g2_contact1`, `g2_contact2`, `g2_contact3`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Khan', '1234567891234', NULL, 'Ashulia', 'dhaka', 'Bangladesh', '111', NULL, NULL, 'Super', 'Emon', '54445', NULL, 'Ashulia', 'dhaka', 'Bangladesh', '111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04 07:44:12', '2020-11-04 07:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Shop', 'property', NULL, '2020-11-04 07:43:31', '2020-11-04 07:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wallet` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `wallet`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Super Admin', 'admin@mail.com', '2020-11-04 13:31:34', '$2y$10$uYzg.fnInPtgWPGh23/3QuQ3FXvPWWJ8BMAjwiGgb6eGyh4NanKs2', NULL, '2020-11-03 10:36:21', '2020-11-04 07:29:49'),
(2, 0, 'Simple User', 'user@mail.com', '2020-11-04 13:06:52', '$2y$10$iOyotz29txA7GXvVKJmXfOWZX1IbUXhb8GgA41mW7TkgZ2oWqD0O.', NULL, '2020-11-03 10:36:22', '2020-11-03 10:36:22'),
(3, 0, 'Emon', 'bdemon00@gmail.com', '2020-11-04 07:33:46', '$2y$10$WSScIWn10SquJ1Sh4NGEjuoL.O/mhJXAhA7BxOF8mWeaflIVSHrwW', NULL, '2020-11-04 04:14:35', '2020-11-04 07:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `wellparts`
--

CREATE TABLE `wellparts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `entry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountants`
--
ALTER TABLE `accountants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_returns`
--
ALTER TABLE `loan_returns`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_returns`
--
ALTER TABLE `payment_returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tents`
--
ALTER TABLE `tents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wellparts`
--
ALTER TABLE `wellparts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountants`
--
ALTER TABLE `accountants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agreements`
--
ALTER TABLE `agreements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_returns`
--
ALTER TABLE `loan_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `payment_returns`
--
ALTER TABLE `payment_returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tents`
--
ALTER TABLE `tents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wellparts`
--
ALTER TABLE `wellparts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

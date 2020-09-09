-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 11:07 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarttailors`
--

-- --------------------------------------------------------

--
-- Table structure for table `cloth_categorys`
--

CREATE TABLE `cloth_categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cloth_categorys`
--

INSERT INTO `cloth_categorys` (`id`, `name`, `sex`, `img`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 'Kurta For Male', 'Male', '1597033792_.jpeg', 1, '2020-05-03 21:25:31', '2020-08-10 11:29:52'),
(8, 'Kurta For Female', 'Male', '1597033710_.jpeg', 1, '2020-05-03 21:44:11', '2020-08-10 11:28:30'),
(9, 'Trouser For Female', 'Male', '1597033767_.jpeg', 1, '2020-05-03 21:45:43', '2020-08-10 11:29:27'),
(10, 'Trouser For Male', 'Male', '1597033732_.jpeg', 1, '2020-06-10 08:57:56', '2020-08-10 11:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `custumer_measurements`
--

CREATE TABLE `custumer_measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custumer_id` int(11) NOT NULL,
  `measurement_part_id` int(11) NOT NULL,
  `measurement_category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `measurement` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custumer_measurements`
--

INSERT INTO `custumer_measurements` (`id`, `custumer_id`, `measurement_part_id`, `measurement_category_id`, `created_by`, `measurement`, `created_at`, `updated_at`) VALUES
(17, 19, 1, 2, 19, '40', NULL, '2020-04-28 01:18:57'),
(18, 19, 2, 2, 19, '60', NULL, '2020-04-28 01:18:57'),
(19, 32, 4, 6, 32, '10', NULL, NULL),
(20, 32, 5, 6, 32, '8', NULL, NULL),
(21, 32, 6, 6, 32, '32', NULL, NULL),
(22, 32, 7, 6, 32, '32', NULL, NULL),
(23, 32, 8, 6, 32, '6', NULL, NULL),
(24, 32, 9, 6, 32, '36', NULL, NULL),
(25, 32, 10, 6, 32, '32', NULL, NULL),
(26, 32, 11, 6, 32, '32', NULL, NULL),
(27, 32, 12, 6, 32, '15', NULL, NULL),
(28, 32, 13, 6, 32, '10', NULL, NULL),
(29, 32, 14, 6, 32, '10', NULL, NULL),
(30, 32, 15, 6, 32, '12', NULL, NULL),
(31, 32, 16, 6, 32, '10', NULL, NULL),
(32, 32, 17, 6, 32, '10', NULL, NULL),
(33, 32, 32, 6, 32, '10', NULL, NULL);

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `t_id` int(10) UNSIGNED NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `t_id`, `img`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, '1588943565_.jpeg', NULL, '2020-05-08 17:12:45', '2020-05-08 17:12:45'),
(2, 33, '1591510162_.png', NULL, '2020-06-07 10:09:22', '2020-06-07 10:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `name`, `category`, `created_by`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Length_1', '6', '1', 'Add overall kurta length from top to bottom.', '2020-05-03 21:27:21', NULL),
(5, 'Shoulder_2', '6', '1', 'Add the distance between two shoulders.', '2020-05-03 21:29:04', NULL),
(6, 'Waist Length_3', '6', '1', 'Add length from neck to waist.', '2020-05-03 21:30:48', NULL),
(7, 'Hip Length_4', '6', '1', 'Add length from neck to hip measuring from back.', '2020-05-03 21:31:38', NULL),
(8, 'Sleeve Length_5', '6', '1', 'Add Sleeve length.', '2020-05-03 21:32:33', NULL),
(9, 'Chest Round_6', '6', '1', 'Add chest round length.', '2020-05-03 21:32:58', NULL),
(10, 'Waist Round_7', '6', '1', 'Add Waist round length.', '2020-05-03 21:33:20', NULL),
(11, 'Hip Round_8', '6', '1', 'Add Hip Round Length.', '2020-05-03 21:33:52', NULL),
(12, 'Bicep Round_9', '6', '1', 'Add Bicep Round Width.', '2020-05-03 21:34:34', NULL),
(13, 'Elbow Round_10', '6', '1', 'Add Elbow round width.', '2020-05-03 21:35:07', NULL),
(14, 'Wrist Round_11', '6', '1', 'Add Wrist round width.', '2020-05-03 21:35:35', NULL),
(15, 'Collar_12', '6', '1', 'Add Collar width', '2020-05-03 21:36:17', NULL),
(16, 'Armhole_13', '6', '1', 'Add Armhole round width measuring from shoulder edge.', '2020-05-03 21:37:01', NULL),
(17, 'Bottom_14', '6', '1', 'Add Bottom Width.', '2020-05-03 21:37:21', NULL),
(18, 'Bottom Length_1', '7', '1', 'Add Bottom length from waist to ankle.', '2020-05-03 21:39:01', NULL),
(19, 'Knee Length_2', '7', '1', 'Add length from waist to knee.', '2020-05-03 21:39:38', NULL),
(20, 'Bottom Waist Round_3', '7', '1', 'add bottom waist round length.', '2020-05-03 21:40:03', NULL),
(21, 'Bottom Hip Round_4', '7', '1', 'Add bottom hip round width.', '2020-05-03 21:41:03', NULL),
(22, 'Thigh Round_5', '7', '1', 'Add Thigh round width.', '2020-05-03 21:41:30', NULL),
(23, 'Knee Round_6', '7', '1', 'Add knee round width.', '2020-05-03 21:42:01', NULL),
(24, 'Calf Round_7', '7', '1', 'Add Calf Round Width.', '2020-05-03 21:42:30', NULL),
(25, 'Bottom Hem/Ankle_8', '7', '1', 'Add bottom hem round width.', '2020-05-03 21:43:00', NULL),
(26, 'Bottom Length_1', '9', '1', 'Add Bottom length from waist to ankle.', '2020-05-03 21:46:55', NULL),
(27, 'Knee Length_2', '9', '1', 'Add knee length from waist to knee.', '2020-05-03 21:47:19', NULL),
(28, 'Bottom Waist Round_3', '9', '1', 'Add Bottom waist round width.', '2020-05-03 21:48:02', NULL),
(29, 'Bottom Hip Round_4', '9', '1', 'Add Bottom Hip Round Width.', '2020-05-03 21:48:25', NULL),
(30, 'Thigh Round_5', '9', '1', 'Add thigh Round Width.', '2020-05-03 21:48:53', NULL),
(31, 'Knee Round_6', '9', '1', 'Add Knee Round Width.', '2020-05-03 21:49:25', NULL),
(32, 'Calf Round_7', '6', '1', 'Yes', '2020-05-03 21:49:45', '2020-06-04 09:16:21'),
(33, 'Bottom Hem/Ankle_8', '9', '1', 'Add Bottom Hem/ ankle width.', '2020-05-03 21:50:19', NULL),
(34, 'Length_1', '8', '1', 'Add overall kurti length from neck to bottom.', '2020-05-03 21:51:18', NULL),
(35, 'Shoulder_2', '8', '1', 'Add distance between two shoulders. measuring from shoulder edges.', '2020-05-03 21:52:22', NULL),
(36, 'Waist Length_3', '8', '1', 'Add waist length from neck to waist.', '2020-05-03 21:52:56', '2020-05-03 21:54:15'),
(37, 'Hip Length_4', '8', '1', 'Add length from neck to hip measuring back.', '2020-05-03 21:54:53', NULL),
(38, 'Sleeve Length_5', '8', '1', 'Add Sleeves length.', '2020-05-03 21:55:17', NULL),
(39, 'Chest Round_6', '8', '1', 'Add Chest round width.', '2020-05-03 21:55:39', NULL),
(40, 'Waist Round_7', '8', '1', 'Add Waist round width.', '2020-05-03 21:56:03', NULL),
(41, 'Hip Round_8', '8', '1', 'Add hip Round width.', '2020-05-03 21:56:26', NULL),
(42, 'Bicep Round_9', '8', '1', 'Add Bicep Round Width.', '2020-05-03 21:56:49', NULL),
(43, 'Elbow Round_10', '8', '1', 'Add Elbow Round Width.', '2020-05-03 21:57:16', NULL),
(44, 'Wrist Round_11', '8', '1', 'Add Wrist round Width.', '2020-05-03 21:57:46', NULL),
(45, 'Collar_12', '8', '1', 'Add Collar round length.', '2020-05-03 21:58:08', NULL),
(46, 'Armhole_13', '8', '1', 'Add Armhole round length measuring from shoulder edge.', '2020-05-03 21:58:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `is_read` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `is_read`, `text`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 1, 'Suscipit qui illum dolor qui sit eum quia ut.', '2020-04-27 18:13:27', '2020-04-27 18:13:27'),
(2, 15, 8, 1, 'Velit consectetur ut molestiae impedit ut corrupti saepe.', '2020-04-27 18:13:27', '2020-04-27 18:13:27'),
(3, 12, 14, 1, 'Unde vitae laudantium et magni.', '2020-04-27 18:13:27', '2020-04-27 18:13:27'),
(4, 5, 11, 1, 'Officia tempora aut natus natus consequatur.', '2020-04-27 18:13:27', '2020-04-27 18:13:27'),
(5, 11, 12, 1, 'Vel id reiciendis sunt corporis facere laborum aut.', '2020-04-27 18:13:27', '2020-04-27 18:13:27'),
(6, 14, 9, 1, 'Architecto rerum sit soluta sit aut necessitatibus quo.', '2020-04-27 18:13:27', '2020-04-27 18:13:27'),
(7, 9, 8, 1, 'Voluptates nihil voluptas quae.', '2020-04-27 18:13:27', '2020-04-27 18:13:27'),
(8, 5, 9, 1, 'Est alias sit illum consectetur non.', '2020-04-27 18:13:27', '2020-04-27 18:13:27'),
(9, 15, 8, 1, 'Cupiditate nostrum commodi et velit sequi.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(10, 11, 12, 1, 'Facilis quod ipsa magnam.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(11, 14, 10, 1, 'Fuga repudiandae facere doloremque est impedit ut voluptatum.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(12, 6, 12, 1, 'Qui facere cupiditate sapiente odit mollitia est porro.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(13, 11, 7, 1, 'Harum aperiam voluptatem harum accusamus ad.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(14, 3, 15, 1, 'Aliquam eaque aut amet est sint dolores error sapiente.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(15, 6, 7, 1, 'Architecto ratione voluptatum magni qui velit adipisci.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(16, 11, 6, 1, 'Eaque qui velit temporibus rerum voluptate.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(17, 6, 15, 1, 'Harum voluptatem perferendis expedita minima aliquam praesentium et.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(18, 3, 8, 1, 'Ipsam ipsum provident voluptatem numquam quis vel harum veniam.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(19, 11, 5, 1, 'Impedit quod et laudantium optio consequuntur laboriosam sit.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(20, 14, 12, 1, 'Voluptatem aut hic rem ex architecto quam in.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(21, 9, 10, 1, 'Iusto quia asperiores aut molestiae qui et.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(22, 10, 15, 1, 'Eaque consequatur occaecati cupiditate rerum velit officia.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(23, 8, 12, 1, 'Saepe eaque iure tempora qui dicta.', '2020-04-27 18:13:37', '2020-04-27 18:13:37'),
(24, 2, 1, 1, 'Ipsam aliquid voluptate minus autem iste quasi molestias.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(25, 12, 6, 1, 'Rerum sed consequuntur earum consequatur.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(26, 8, 11, 1, 'Explicabo similique hic facilis occaecati alias.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(27, 4, 7, 1, 'Dolorum quia molestiae repudiandae et voluptate.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(28, 14, 5, 1, 'Rerum iusto qui quis molestiae et libero.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(29, 11, 5, 1, 'Incidunt velit repudiandae consequatur sint ratione atque qui aut.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(30, 10, 4, 1, 'Perferendis illo accusantium sit necessitatibus atque quia.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(31, 1, 15, 1, 'Dolor aut numquam quia nisi dolorem.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(32, 3, 1, 1, 'Esse accusantium deserunt a omnis voluptas voluptas ut.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(33, 2, 13, 1, 'Quod laborum amet quia pariatur dignissimos.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(34, 7, 3, 1, 'Aut mollitia cupiditate inventore eaque mollitia eligendi dolorem.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(35, 13, 5, 1, 'Consequatur sed exercitationem eum.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(36, 11, 12, 1, 'Impedit non vero aspernatur.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(37, 12, 15, 1, 'A corporis sed iure nostrum.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(38, 7, 13, 1, 'Dolor laboriosam dolor aut distinctio sit earum qui et.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(39, 13, 12, 1, 'Laudantium doloremque qui velit.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(40, 12, 10, 1, 'Error rerum corrupti doloribus voluptas assumenda ut ipsa.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(41, 15, 8, 1, 'Similique optio quas incidunt sed qui dolorum facere.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(42, 14, 7, 1, 'Explicabo maiores iusto aut maiores.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(43, 12, 4, 1, 'Dolorem suscipit dignissimos tempore fuga voluptas non qui voluptas.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(44, 10, 6, 1, 'Enim animi sapiente voluptatem aut tempore.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(45, 15, 5, 1, 'Ab et sint dolorum consequatur est non.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(46, 15, 1, 1, 'Sunt consequatur voluptas non beatae saepe.', '2020-04-27 18:13:38', '2020-04-27 18:13:38'),
(47, 3, 7, 1, 'Praesentium commodi possimus blanditiis ab exercitationem consequatur.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(48, 1, 3, 1, 'Ut sint beatae quo dolores et.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(49, 7, 11, 1, 'Nostrum repudiandae vero libero.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(50, 5, 3, 1, 'Minima placeat et molestiae ut eum rerum est.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(51, 11, 5, 1, 'Nihil expedita eos ratione aut voluptatem eveniet.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(52, 5, 6, 1, 'Possimus hic dicta eos velit ea.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(53, 4, 15, 1, 'Commodi sit ut repellendus.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(54, 15, 5, 1, 'Sunt odit et repellendus neque culpa.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(55, 5, 13, 1, 'Tenetur adipisci velit sint dolorum ut.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(56, 14, 11, 1, 'Et porro incidunt delectus velit eum nisi.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(57, 3, 11, 1, 'Culpa at assumenda et ut autem alias facere.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(58, 14, 2, 1, 'Ea odio enim voluptates voluptas.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(59, 15, 11, 1, 'Labore tempore ut sequi qui vel deserunt.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(60, 6, 9, 1, 'Non quasi repellendus quia sed earum nulla harum.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(61, 14, 3, 1, 'Officia atque quis dolorem eum.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(62, 14, 5, 1, 'Vero possimus ut facilis voluptates at eum.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(63, 12, 10, 1, 'Et consequatur sunt maxime modi quia omnis voluptas id.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(64, 7, 13, 1, 'Dolor nostrum corrupti fugit eveniet id aspernatur.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(65, 3, 8, 1, 'Quaerat nobis dolor praesentium delectus.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(66, 11, 14, 1, 'Omnis omnis qui praesentium officia aliquam ut sunt.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(67, 2, 9, 1, 'Provident ullam vitae omnis fugiat corrupti accusantium.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(68, 3, 6, 1, 'Eligendi est omnis odit assumenda pariatur iure sint.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(69, 2, 11, 1, 'In quia et asperiores eius molestias deleniti nemo ipsum.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(70, 1, 6, 1, 'Nobis quis blanditiis corporis maxime quos cumque ducimus.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(71, 2, 5, 1, 'Quia facilis aspernatur quasi consequatur.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(72, 3, 6, 1, 'Culpa in harum ullam autem sint officiis dolore tempore.', '2020-04-27 18:13:39', '2020-04-27 18:13:39'),
(73, 3, 8, 1, 'Consequatur eius voluptas iure id repudiandae.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(74, 14, 13, 1, 'Earum optio vitae animi porro omnis quia saepe.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(75, 3, 13, 1, 'Exercitationem nostrum voluptas magni sint.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(76, 2, 9, 1, 'Delectus excepturi repellendus vel ea molestiae qui commodi.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(77, 8, 15, 1, 'In voluptas quas ex aliquam in.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(78, 13, 14, 1, 'Quos similique et nobis quasi.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(79, 7, 8, 1, 'Nulla fuga vero dicta sequi quia.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(80, 8, 9, 1, 'Quo rem nemo doloremque eveniet aut voluptates.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(81, 10, 5, 1, 'Minus doloribus totam expedita debitis tempore.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(82, 3, 11, 1, 'Iusto quaerat qui sunt illum maxime non id accusamus.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(83, 1, 8, 1, 'Quod sit quis facilis minus.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(84, 11, 5, 1, 'Exercitationem harum numquam voluptas maiores impedit totam aut.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(85, 8, 10, 1, 'Porro minus voluptatem eius praesentium aperiam beatae suscipit.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(86, 14, 1, 1, 'Qui error doloremque exercitationem recusandae veritatis.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(87, 4, 1, 1, 'Vitae omnis rerum voluptatum qui tenetur dolores voluptas.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(88, 6, 10, 1, 'Saepe sit accusantium corporis nulla nihil.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(89, 5, 13, 1, 'Beatae repellat ea soluta.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(90, 3, 14, 1, 'Quis maxime neque harum voluptatum aut.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(91, 9, 8, 1, 'Rem omnis dolore itaque exercitationem totam labore.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(92, 2, 13, 1, 'Eos vero officiis ut sit aut.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(93, 2, 3, 1, 'Harum minus unde vel quod.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(94, 9, 11, 1, 'Fugit sunt fuga enim deserunt sit qui numquam.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(95, 10, 3, 1, 'Dolorum omnis molestiae quia quis sit consequuntur maiores.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(96, 1, 10, 1, 'Et necessitatibus ab impedit eius tenetur.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(97, 9, 12, 1, 'Officia sint facere quibusdam sit debitis esse quo.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(98, 7, 15, 1, 'Ea sunt rerum unde autem modi ab ut.', '2020-04-27 18:13:40', '2020-04-27 18:13:40'),
(99, 26, 1, 0, 'hello', '2020-05-12 13:21:47', '2020-05-12 13:21:47'),
(100, 32, 1, 0, 'hy', '2020-06-04 08:32:53', '2020-06-04 08:32:53'),
(101, 32, 34, 1, 'Hello .This is my order', '2020-06-08 11:47:04', '2020-06-10 08:16:58'),
(102, 34, 32, 1, 'Ok', '2020-06-08 11:48:28', '2020-06-13 08:08:09'),
(103, 34, 32, 1, 'hy', '2020-06-10 08:13:12', '2020-06-13 08:08:09'),
(104, 34, 32, 1, 'how are you??', '2020-06-10 08:13:45', '2020-06-13 08:08:09'),
(105, 32, 34, 1, 'g sir', '2020-06-10 08:16:26', '2020-06-10 08:16:58'),
(106, 28, 30, 1, 'lk', '2020-08-07 01:04:07', '2020-08-10 14:11:24'),
(107, 28, 31, 0, 'hy', '2020-08-07 01:04:17', '2020-08-07 01:04:17'),
(108, 28, 30, 1, 'hyy', '2020-08-09 14:42:13', '2020-08-10 14:11:24'),
(109, 30, 28, 1, 'how are you?', '2020-08-09 14:42:24', '2020-08-10 14:11:24'),
(110, 28, 30, 1, 'hy you', '2020-08-09 14:59:59', '2020-08-10 14:11:24'),
(111, 28, 30, 1, 'what are you doing', '2020-08-09 15:00:13', '2020-08-10 14:11:24'),
(112, 30, 28, 1, 'hellow', '2020-08-09 21:15:42', '2020-08-10 14:11:24'),
(113, 30, 28, 1, 'hy', '2020-08-09 22:52:21', '2020-08-10 14:11:24'),
(114, 28, 30, 1, 'hellow\\', '2020-08-10 13:59:50', '2020-08-10 14:11:24'),
(115, 30, 28, 1, 'is my cloth is ready??', '2020-08-10 14:00:14', '2020-08-10 14:11:24'),
(116, 28, 30, 1, 'hy', '2020-08-10 14:11:07', '2020-08-10 14:11:24'),
(117, 30, 28, 1, 'hellow', '2020-08-10 14:11:24', '2020-08-10 14:11:24');

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
(4, '2020_04_12_152602_create_messages_table', 1),
(5, '2020_04_22_143213_create_galleries_table', 1),
(6, '2020_04_24_060552_create_measurements_table', 1),
(7, '2020_04_24_063200_cloth_type_measurement', 1),
(8, '2020_04_27_110145_create_custumer_measurements_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tailor_id` int(11) NOT NULL,
  `custumer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_received` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_method` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tailor_id`, `custumer_id`, `categories`, `note`, `total_payment`, `payment_received`, `invoice_no`, `o_status`, `delivery_date`, `created_at`, `updated_at`, `payment_method`, `delivery_method`) VALUES
(1, 54, '55', '10 | 6', NULL, '0', NULL, 'SM000001', 'Assigned', '2020-12-09', '2020-08-10 12:09:33', '2020-08-10 12:09:33', 'Cash On Delivery', 'On Home'),
(2, 30, '28', '8', NULL, '500', '500', 'SM000002', 'Ready', '2020-08-12', '2020-08-10 13:56:36', '2020-08-10 13:58:25', 'Cash On Delivery', 'On Shop');

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
-- Table structure for table `pricings`
--

CREATE TABLE `pricings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tailor_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricings`
--

INSERT INTO `pricings` (`id`, `tailor_id`, `category_id`, `price`, `created_at`, `updated_at`) VALUES
(23, 30, 7, NULL, '2020-06-02 00:23:38', NULL),
(24, 31, 6, NULL, '2020-06-03 17:55:00', NULL),
(25, 31, 8, NULL, '2020-06-03 17:55:00', NULL),
(26, 31, 9, NULL, '2020-06-03 17:55:00', NULL),
(27, 33, 6, NULL, '2020-06-06 11:58:36', NULL),
(28, 33, 8, NULL, '2020-06-06 11:58:36', NULL),
(29, 33, 9, NULL, '2020-06-06 11:58:36', NULL),
(30, 34, 6, NULL, '2020-06-07 10:17:35', NULL),
(31, 34, 8, NULL, '2020-06-07 10:17:35', NULL),
(32, 34, 9, NULL, '2020-06-07 10:17:35', NULL),
(34, 30, 8, '500', '2020-08-07 23:51:04', '2020-08-10 13:47:23'),
(35, 30, 9, '200', '2020-08-07 23:51:04', '2020-08-10 13:47:23'),
(36, 30, 10, '200', '2020-08-07 23:51:04', '2020-08-10 13:47:23'),
(37, 35, 8, '600', '2020-08-10 11:25:23', '2020-08-10 11:26:15'),
(38, 35, 10, '200', '2020-08-10 11:25:23', '2020-08-10 11:26:15'),
(39, 54, 6, NULL, '2020-08-10 11:59:26', NULL),
(40, 54, 8, NULL, '2020-08-10 11:59:26', NULL),
(41, 54, 9, NULL, '2020-08-10 11:59:27', NULL),
(42, 54, 10, NULL, '2020-08-10 11:59:27', NULL),
(43, 56, 6, NULL, '2020-08-10 12:13:18', NULL),
(44, 56, 8, NULL, '2020-08-10 12:13:18', NULL),
(45, 56, 9, NULL, '2020-08-10 12:13:18', NULL),
(46, 56, 10, NULL, '2020-08-10 12:13:18', NULL),
(47, 57, 6, NULL, '2020-08-10 12:16:41', NULL),
(48, 57, 8, NULL, '2020-08-10 12:16:41', NULL),
(49, 57, 9, NULL, '2020-08-10 12:16:41', NULL),
(50, 57, 10, NULL, '2020-08-10 12:16:41', NULL),
(51, 58, 6, NULL, '2020-08-10 12:20:42', NULL),
(52, 58, 8, NULL, '2020-08-10 12:20:42', NULL),
(53, 58, 9, NULL, '2020-08-10 12:20:42', NULL),
(54, 58, 10, NULL, '2020-08-10 12:20:42', NULL),
(55, 59, 6, NULL, '2020-08-10 12:28:09', NULL),
(56, 59, 8, NULL, '2020-08-10 12:28:09', NULL),
(57, 59, 9, NULL, '2020-08-10 12:28:09', NULL),
(58, 59, 10, NULL, '2020-08-10 12:28:09', NULL);

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
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rates` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `f_name`, `l_name`, `img`, `phone_number`, `cnic`, `gender`, `date_of_birth`, `city`, `address`, `country`, `lat`, `lng`, `status`, `rating`, `description`, `remember_token`, `created_at`, `updated_at`, `rates`, `type`, `availability`, `delivery`) VALUES
(1, 'Mubasher Fiaz', 'mubasherfiaz05@gmail.com', '2020-04-28 01:07:51', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', NULL, NULL, '	\r\nimg1.png', NULL, NULL, NULL, NULL, 'Islamabad', NULL, NULL, NULL, NULL, NULL, NULL, '<p>Edge Bottom Kurta</p>', 'fMNn0O2KrS1S8e9OTcGpIxcPkGKPDgnNRfGCwsj3oXXmMWWe7Vz8ULIA8BCc', '2020-04-28 01:07:51', '2020-05-09 00:13:46', NULL, NULL, NULL, NULL),
(28, 'test', 'user@test.com', NULL, '$2y$10$IVqW4qRPhHL/QrtTumxR1OMY5GDTzGj5rRN0cagtqDQm4/UDJ439i', 'custumer', NULL, NULL, '	\r\nimg1.png', '03499211549', NULL, 'male', NULL, 'Islamabad', NULL, 'PK', 33.721500, 73.043297, 1, 4, NULL, NULL, '2020-06-02 07:18:12', '2020-08-09 17:12:18', NULL, NULL, NULL, NULL),
(30, 'test', 'tailor@test.com', NULL, '$2y$10$9B9X5/nw5trlK/tPyTpDJuZDmT8zLNrRk5svMD5bp72kSTDA0UzA6', 'tailor', NULL, NULL, 'img1.png', '03499722943', '3740239721229', NULL, '08/09/2020', 'Islamabad', 'Rawalpindi', 'PK', 33.799900, 73.043999, 1, 3, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-06-02 07:23:38', '2020-08-09 20:57:30', 'all', 'all', 'all', 'both'),
(31, 'CareGrowGroom', 'attique@gmail.com', NULL, '$2y$10$sI5528sf1AZSy7smMuGr6ehmcPwjPx/Tskct9G0JI9UT/z.4d/Qpq', 'tailor', NULL, NULL, '	\r\nimg1.png', '03128682393', '3720389792901', 'male', NULL, 'Rawalpindi', 'street#1 sector h#13 Islamabad', 'PK', 33.597301, 73.047897, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-06-04 00:55:00', '2020-06-04 00:55:00', 'all', 'all', 'all', 'both'),
(32, 'UsamaBinHafeez', 'usamabinhafeez19@gmail.com', NULL, '$2y$10$lD9zascPxhRu7B21Rf72..Irgv.dFSj5dkt9/w1Kv.1w5Atn/NPeG', 'custumer', NULL, NULL, '	\r\nimg1.png', '03495831838', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-06-04 15:31:43', '2020-06-04 15:31:43', NULL, NULL, NULL, NULL),
(33, 'Trending Designs', 'ali@gmail.com', NULL, '$2y$10$LBMQB8cEGwXrrsCrnCaLQO9OV/a7jB3LnshBYanN6YTc8KE5KtTXC', 'tailor', NULL, NULL, 'img1.png', '03452657650', '3720367563404', 'male', NULL, 'Rawalpindi', 'Shop# 12 second Floor Malikabad Mall Second floor Rawalpindi', 'PK', 33.597301, 73.047897, 1, 2, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-06-06 18:58:36', '2020-08-09 17:43:25', 'all', 'all', 'all', 'both'),
(34, 'Pehchan', 'usamabinhafeez18@gmail.com', NULL, '$2y$10$U.24lzd9hlCyV8eny0ctbO0QrFEzO16N.AWtF2uyCYlb7d5Bgr.WW', 'tailor', NULL, NULL, 'img1.png', '03485403876', '3740475555555', 'male', NULL, 'Rawalpindi', 'Islamabad', 'PK', 33.597301, 73.047897, 1, 3, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-06-07 17:17:35', '2020-08-09 17:43:11', 'all', 'all', 'all', 'both'),
(35, 'Moeen Tailors', 'moeenkhan@gmail.com', NULL, '$2y$10$ZsAQXwp0SrbjA9M61JzCU.7BjMJ6LYYyLVl5LgOAyneilJKDj74YC', 'tailor', NULL, NULL, '1597033522_.jpeg', '03499744214', '374023924993', NULL, '08/09/2020', 'Rawalpindi', 'H8 islamabad', 'PK', 33.682598, 73.064903, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 11:25:23', '2020-08-10 11:38:18', 'all', 'all', 'all', 'both'),
(36, 'SayyamAhmed', 'sayyamahmed@gmail.com', NULL, '$2y$10$vSaSSYqphFIL.NApGXArruHnPqIYV83YhAyOu/cfi6K8I5m8GgO4W', 'custumer', NULL, NULL, '1597034118_.jpeg', '034997332883', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 11:35:20', '2020-08-10 11:35:20', NULL, NULL, NULL, NULL),
(37, 'Everfour Tailoring', 'Abbas00@gmail.com', NULL, '$2y$10$eU9yinlDLVGDjvwvbXKzi./pXUD3TkzLAXr0jpCsQfDTT3bCL24Bu', 'tailor', NULL, NULL, 'img1.png', '03329876534', '3720276535076', 'male', NULL, 'Rawalpindi', 'Gulshan Abad near Stadium Shamsabad', 'PK', 33.597301, 73.047897, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 00:30:30', '2020-08-10 00:30:30', 'all', 'all', 'all', 'both'),
(38, 'Usman143', 'usmanawan4@gmail.com', NULL, '$2y$10$GkSgqi0QwlEqz5GErYJKIubYlH/KfvVyMUrMVQosjzAHzEo8J9pU6', 'custumer', NULL, NULL, '1596980112_.jpeg', '03406784560', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 00:35:13', '2020-08-10 00:35:13', NULL, NULL, NULL, NULL),
(39, 'MohsinHayat', 'mohsinhayat@gmail.com', NULL, '$2y$10$UVNLnFjR3sJ3Gf4nNPK5qONS8ustcP7UiUIPNUNxoJPx0uCA3ab8G', 'custumer', NULL, NULL, '1596980396_.jpeg', '03165323455', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 00:39:56', '2020-08-10 00:39:56', NULL, NULL, NULL, NULL),
(40, 'Rony’s Measure', 'irfan435@gmail.com', NULL, '$2y$10$8q60qQs0f6A/geQnLIdWrO/SUAjiiPe6SEmy/OpJZaaQpcvnKt/pe', 'tailor', NULL, NULL, '1596980563_.jpeg', '03126576546', '3710499875025', 'male', NULL, 'Rawalpindi', 'Street 4 near Maryam Hall Shamsabad', 'PK', 39.597301, 83.047897, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 00:42:44', '2020-08-10 00:42:44', 'all', 'all', 'all', 'both'),
(41, 'Just Sewing', 'abduljunaid@gmail.com', NULL, '$2y$10$9dvsSOF..FVUah.PvnCEaO5eI9czP/lIa.7EYeICZ9/o6ai8ZMhTu', 'tailor', NULL, NULL, '1596980967_.jpeg', '03135413001', '3740418206540', 'male', NULL, 'Rawalpindi', 'Lora Stop Street 6 Near Usman hall Faizabad', 'PK', 23.597301, 63.047897, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 00:49:28', '2020-08-10 00:49:28', 'all', 'all', 'all', 'both'),
(42, 'Hasnain Abbas', 'Haniabbas@gmail.com', NULL, '$2y$10$ZiIXKa9ZZ2uJXeiZT3ISHuxrp6KMAXBLmFzrDKP0BUqWytC59zOKe', 'custumer', NULL, NULL, '1596981298_.jpeg', '03005432657', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 00:54:58', '2020-08-10 00:54:58', NULL, NULL, NULL, NULL),
(43, 'Manan Mustafiz', 'Manimalik@gmail.com', NULL, '$2y$10$ATtcKZ../tq8VhvXWmvPsO01w6ePd7jVojVlkO2F5/VEI9PXPusxi', 'custumer', NULL, NULL, '1596984589_.jpeg', '03334576876', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 01:49:50', '2020-08-10 01:49:50', NULL, NULL, NULL, NULL),
(44, 'Haider Shah', 'Haidershah32@gmail.com', NULL, '$2y$10$SB0yPLv2ILQs2B1xLUHp4.5QMswB7jB3WVcD4S6NWMtAZViNuI14G', 'custumer', NULL, NULL, '1596985199_.jpeg', '03112345678', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 01:59:59', '2020-08-10 01:59:59', NULL, NULL, NULL, NULL),
(45, 'Arman', 'Armanhadi123@gmail.com', NULL, '$2y$10$jfRVy32IqmzuCH0KiReNsO/duN.umrrp9ZTVB3jIxe8eyLeAr8FNu', 'custumer', NULL, NULL, '1596985726_.jpeg', '03456457654', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 02:08:47', '2020-08-10 02:08:47', NULL, NULL, NULL, NULL),
(46, 'Asad', 'Aliinfo54@gmail.com', NULL, '$2y$10$wrfD1ydJYzCjl6vLduuqruE7OuLNKgDKrlWmLxi6.CGWQbNfyc0Dq', 'custumer', NULL, NULL, '1596985785_.jpeg', '03456754646', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 02:09:45', '2020-08-10 02:09:45', NULL, NULL, NULL, NULL),
(47, 'Zeeshan', 'zeshan24778@gmail.com', NULL, '$2y$10$CS0Z2XarsEIP7XV8yBbMGuKO1yhLyhLjQS6ii7p5wqeS8kPqsl8Q.', 'custumer', NULL, NULL, '1596986461_.jpeg', '03145423455', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 02:21:01', '2020-08-10 02:21:01', NULL, NULL, NULL, NULL),
(48, 'Mustafa', 'mustafa45@gmail.com', NULL, '$2y$10$IfuuUNFMugPTYY3u5LWso.5MRuOi2vrvl.UwGQQP5p77HApHJekAS', 'custumer', NULL, NULL, '1596986518_.jpeg', '03145676543', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 02:21:58', '2020-08-10 02:21:58', NULL, NULL, NULL, NULL),
(49, 'Sayam', 'Sayam65@gmail.com', NULL, '$2y$10$hHRTamcTbXoITha52rFgYOh/gIBWeILUA5X0D/LZ6m9wNoobcyz.K', 'custumer', NULL, NULL, '1596986852_.jpeg', '03407654267', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 02:27:32', '2020-08-10 02:27:32', NULL, NULL, NULL, NULL),
(50, 'Basit', 'Basit54@gmail.com', NULL, '$2y$10$ScfaTI3Or0ZgM1qzHqzMcO42NiKP5/m166jLRH5qtJENa5Lc3EGHm', 'custumer', NULL, NULL, '1596987021_.jpeg', '03309876543', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 02:30:21', '2020-08-10 02:30:21', NULL, NULL, NULL, NULL),
(51, 'Faizan54', 'Fazi87@gmail.com', NULL, '$2y$10$ZzNFZxg39XAkZ30QgVbW9u2.3P3Cv2tQlqsTsCz26BVNYsbiqEYQ6', 'custumer', NULL, NULL, '1596987084_.jpeg', '03314575242', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 63.597301, 23.047897, 1, 1, NULL, NULL, '2020-08-10 02:31:24', '2020-08-10 02:31:24', NULL, NULL, NULL, NULL),
(52, 'Pervaz', 'pervazak3@gmail.com', NULL, '$2y$10$1mCwe8udikb4OzBJJ19tLu/pT/WBwffD0/buyQke0sYM3T0bDSMYS', 'tailor', NULL, NULL, '1596987321_.jpeg', '03456754234', '37407-7548702', 'male', NULL, 'Rawalpindi', 'Alfa Shahid Road Near GoriTown Rawalpindi', 'PK', 37.897301, 76.047897, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 02:35:21', '2020-08-10 02:35:21', 'all', 'all', 'all', 'both'),
(53, 'Gouri Garments', 'Hamza01@gmail.com', NULL, '$2y$10$Ma1V0toXcCivU9azScqwEe4bktdKqF1M0SbLsEqW2RF9n5DMtorlS', 'tailor', NULL, NULL, 'img1.png', '03406785970', '3720389762801', NULL, '08/10/2020', 'Rawalpindi', 'Gouri Town Main Markaz Phase 4 Islamabad', 'PK', 33.619099, 73.135696, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 04:24:36', '2020-08-10 04:41:02', 'all', 'all', 'all', 'both'),
(54, 'Stiching Square', 'Mirsab01@gmail.com', NULL, '$2y$10$jkgkH.P7N5vIa4GessDOJOC.1lYDAxiWVCq1MEgPw.Biaek01s13C', 'tailor', NULL, NULL, 'img1.png', '34567893679', '3786908796783', NULL, '08/09/2020', 'Rawalpindi', 'Shop #27 Rehmanabad Mall Rawalpindi', 'PK', 33.907001, 73.394302, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 11:59:26', '2020-08-10 14:21:35', 'l_p', 'g_t', 'all', 'both'),
(55, 'Shan', 'shan24778@gmail.com', NULL, '$2y$10$Gi.UidCuas2.gCa7H1GCIu/9yi6JcxNwAC9IS9vPkEUOABytt0ISy', 'custumer', NULL, NULL, 'img1.png', '56748973789', NULL, 'male', NULL, 'Rawalpindi', NULL, 'PK', 33.597301, 73.047897, 1, 1, NULL, NULL, '2020-08-10 12:07:17', '2020-08-10 12:07:17', NULL, NULL, NULL, NULL),
(56, 'Faiz Clothing', 'faiz01@gmail.com', NULL, '$2y$10$5Zv1WJqhAeMEtTG3roqhiumL7UWDYWpwa4wFUObv88ekstN4ZTed.', 'tailor', NULL, NULL, 'img1.png', '89746889387', NULL, NULL, '08/09/2020', 'Rawalpindi', 'G-11 Markaz Islamabad', 'PK', 33.771500, 72.751099, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 12:13:18', '2020-08-10 14:22:21', 'all', 'all', 'p_t', 'h_d'),
(57, 'The Tailor Shop', 'Talha01@gmail.com', NULL, '$2y$10$GvZE/nReb5YourWznEmLI.JwUsJ5axa83AD5MJpTngF9sdjYoj9CW', 'tailor', NULL, NULL, 'img1.png', '78690876538', NULL, NULL, '08/09/2020', 'Islamabad', 'I-8 Markaz', 'PK', 33.661701, 73.056801, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 12:16:41', '2020-08-10 12:18:05', 'all', 'all', 'all', 'both'),
(58, 'J. Tailors', 'junaid01@gmail.com', NULL, '$2y$10$sqUMQVSfQg0M9ntD.iZ8iuce.zFPZWhKqerLgX3RFOrG4UK32pjnm', 'tailor', NULL, NULL, 'img1.png', '78987647893', '7875987847383', NULL, '08/09/2020', 'Rawalpindi', 'Main Bazar Taxila', 'PK', 33.746300, 72.839699, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 12:20:42', '2020-08-10 12:22:08', 'all', 'all', 'all', 'both'),
(59, 'Sinwan Tailors', 'sinwan01@gmail.com', NULL, '$2y$10$2f..BQ0tzqqGttomPu446efPUwlfy0nIHubtyhbJVSdl9if37ZL32', 'tailor', NULL, NULL, 'img1.png', '875678949087', NULL, NULL, '08/09/2020', 'Rawalpindi', 'gujjar khan', 'PK', 33.261600, 73.305801, 1, 1, 'We provide best stitching services in your city, Contact us we provide 24/7 online service.', NULL, '2020-08-10 12:28:09', '2020-08-10 12:29:02', 'all', 'all', 'all', 'both');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cloth_categorys`
--
ALTER TABLE `cloth_categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custumer_measurements`
--
ALTER TABLE `custumer_measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pricings`
--
ALTER TABLE `pricings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cloth_categorys`
--
ALTER TABLE `cloth_categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `custumer_measurements`
--
ALTER TABLE `custumer_measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pricings`
--
ALTER TABLE `pricings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2025 at 11:16 AM
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
-- Database: `zoilo`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `event` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `event`, `created_at`, `updated_at`) VALUES
(1, 'Category', 'Category has been deleted', 'App\\Models\\Category', 13, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Mobile Phones\",\"code\":\"MOB\",\"description\":\"Smartphones and accessories\",\"image_url\":\"url_to_image_13.jpg\",\"status\":\"active\",\"sort_order\":13,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', 'ed6d9eef-aee1-444b-acf7-3df002f3478d', 'deleted', '2024-10-21 01:23:27', '2024-10-21 01:23:27'),
(2, 'Category', 'Category has been deleted', 'App\\Models\\Category', 3, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Home & Kitchen\",\"code\":\"HMK\",\"description\":\"Essentials for home and kitchen\",\"image_url\":\"url_to_image_3.jpg\",\"status\":\"active\",\"sort_order\":3,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '387c7c39-949b-4ab7-a47f-be0c50f19699', 'deleted', '2024-10-21 01:23:54', '2024-10-21 01:23:54'),
(3, 'Category', 'Category has been deleted', 'App\\Models\\Category', 5, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Health & Beauty\",\"code\":\"HBE\",\"description\":\"Health and beauty products\",\"image_url\":\"url_to_image_5.jpg\",\"status\":\"active\",\"sort_order\":5,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '37d80d3c-8a5a-41bc-a6e4-f95dccfc3f77', 'deleted', '2024-10-21 01:28:41', '2024-10-21 01:28:41'),
(4, 'Category', 'Category has been deleted', 'App\\Models\\Category', 8, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Furniture\",\"code\":\"FUR\",\"description\":\"Furniture for home and office\",\"image_url\":\"url_to_image_8.jpg\",\"status\":\"active\",\"sort_order\":8,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '6a1c95de-0299-489d-bebd-43658040f14f', 'deleted', '2024-10-21 01:29:42', '2024-10-21 01:29:42'),
(5, 'Category', 'Category has been deleted', 'App\\Models\\Category', 12, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Fashion Accessories\",\"code\":\"ACC\",\"description\":\"Jewelry, bags, and other accessories\",\"image_url\":\"url_to_image_12.jpg\",\"status\":\"active\",\"sort_order\":12,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '0d07c8f0-7684-4f4f-a01c-236c5af2542d', 'deleted', '2024-10-21 01:30:33', '2024-10-21 01:30:33'),
(6, 'SubCategory', 'SubCategory has been deleted', 'App\\Models\\SubCategory', 1, 'App\\Models\\User', 1, '{\"old\":{\"category_id\":16,\"name\":\"hyy\",\"code\":\"231\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":null,\"updated_by\":null,\"deleted_by\":null}}', 'ff816461-8363-4c8a-819a-b03a410baff4', 'deleted', '2024-10-21 01:48:43', '2024-10-21 01:48:43'),
(7, 'Category', 'Category has been deleted', 'App\\Models\\Category', 2, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Fashion\",\"code\":\"FAS\",\"description\":\"Latest fashion trends and clothing\",\"image_url\":\"url_to_image_2.jpg\",\"status\":\"active\",\"sort_order\":2,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', 'a0810d8a-2bec-4fe2-bca1-0078b227f573', 'deleted', '2024-10-21 01:49:01', '2024-10-21 01:49:01'),
(8, 'Category', 'Category has been deleted', 'App\\Models\\Category', 1, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Electronics\",\"code\":\"ELC\",\"description\":\"All kinds of electronic items\",\"image_url\":\"url_to_image_1.jpg\",\"status\":\"active\",\"sort_order\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', 'b6f907a8-ef78-49e1-9a63-246a1210f948', 'deleted', '2024-10-21 01:54:50', '2024-10-21 01:54:50'),
(9, 'SubCategory', 'SubCategory has been deleted', 'App\\Models\\SubCategory', 1, 'App\\Models\\User', 1, '{\"old\":{\"category_id\":16,\"name\":\"hyy\",\"code\":\"231\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":null,\"updated_by\":null,\"deleted_by\":null}}', '3a147810-e519-453e-aae8-3b49b5aa1739', 'deleted', '2024-10-21 01:55:50', '2024-10-21 01:55:50'),
(10, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_by\":1},\"old\":{\"updated_by\":null}}', '0ec77a52-aece-4c5b-bb6f-081459961d74', 'updated', '2024-10-21 01:57:09', '2024-10-21 01:57:09'),
(11, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"status\":\"inactive\"},\"old\":{\"status\":\"active\"}}', '08996e32-3367-4821-940c-0e795a9e4366', 'updated', '2024-10-21 02:01:56', '2024-10-21 02:01:56'),
(12, 'Category', 'Category has been deleted', 'App\\Models\\Category', 15, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Computers & Laptops\",\"code\":\"COM\",\"description\":\"Computers, laptops, and accessories\",\"image_url\":\"url_to_image_15.jpg\",\"status\":\"active\",\"sort_order\":15,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', 'fd541e6d-f78d-401a-bde2-7f8c3837c06d', 'deleted', '2024-10-21 03:38:15', '2024-10-21 03:38:15'),
(13, 'Category', 'Category has been created', 'App\\Models\\Category', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"New Category Name\",\"code\":\"myx91wzd0a\",\"description\":\"Category description\",\"image_url\":null,\"status\":\"inactive\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '4bdaac1e-a6d1-4748-a2d8-cd61d1621098', 'created', '2024-10-21 09:26:03', '2024-10-21 09:26:03'),
(14, 'Category', 'Category has been updated', 'App\\Models\\Category', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"New Category Name update\",\"description\":\"Category description update\",\"status\":\"active\"},\"old\":{\"name\":\"Electronics\",\"description\":\"All kinds of electronic items\",\"status\":\"inactive\"}}', 'f58e0d34-7130-4fe7-b116-55bd2dfacf60', 'updated', '2024-10-21 09:28:31', '2024-10-21 09:28:31'),
(15, 'Category', 'Category has been deleted', 'App\\Models\\Category', 1, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"New Category Name update\",\"code\":\"ELC\",\"description\":\"Category description update\",\"image_url\":\"url_to_image_1.jpg\",\"status\":\"active\",\"sort_order\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '7556c24e-20ff-4ce8-a814-d638aff01191', 'deleted', '2024-10-21 09:29:22', '2024-10-21 09:29:22'),
(16, 'Category', 'Category has been created', 'App\\Models\\Category', 18, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"New Category Name\",\"code\":\"6gyrroggus\",\"description\":\"Category description\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'daa8d02d-e7e9-4717-bf5f-5216d67b0617', 'created', '2024-10-21 23:29:50', '2024-10-21 23:29:50'),
(17, 'Category', 'Category has been created', 'App\\Models\\Category', 19, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"New Category Name\",\"code\":\"0hgfnuwpxw\",\"description\":\"Category description\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '5dea59a3-d5b1-41cd-aeab-53b5441da780', 'created', '2024-10-21 23:30:19', '2024-10-21 23:30:19'),
(18, 'Category', 'Category has been created', 'App\\Models\\Category', 20, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"admin\",\"code\":\"lvkwkz5350\",\"description\":\"newww\",\"image_url\":null,\"status\":\"inactive\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '6b900522-6800-4b3a-aa4e-99780c34634d', 'created', '2024-10-21 23:34:19', '2024-10-21 23:34:19'),
(19, 'Category', 'Category has been created', 'App\\Models\\Category', 21, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"admin\",\"code\":\"t7ldedh4x3\",\"description\":\"hyyyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '929b213c-0079-4dce-b2c9-f462480e0017', 'created', '2024-10-21 23:36:19', '2024-10-21 23:36:19'),
(20, 'Category', 'Category has been deleted', 'App\\Models\\Category', 21, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"admin\",\"code\":\"t7ldedh4x3\",\"description\":\"hyyyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'c3872eb2-64c4-41ed-813f-f24ab14c2154', 'deleted', '2024-10-21 23:40:59', '2024-10-21 23:40:59'),
(21, 'Category', 'Category has been deleted', 'App\\Models\\Category', 14, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Services\",\"code\":\"SER\",\"description\":\"Various services offered\",\"image_url\":\"url_to_image_14.jpg\",\"status\":\"active\",\"sort_order\":14,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '3369556d-023d-49f9-a05e-b4f5b61b0aca', 'deleted', '2024-10-21 23:42:00', '2024-10-21 23:42:00'),
(22, 'Category', 'Category has been deleted', 'App\\Models\\Category', 1, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"New Category Name update\",\"code\":\"ELC\",\"description\":\"Category description update\",\"image_url\":\"url_to_image_1.jpg\",\"status\":\"active\",\"sort_order\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '8f5ad405-c8fd-4795-94fb-057245b80a1c', 'deleted', '2024-10-21 23:42:46', '2024-10-21 23:42:46'),
(23, 'Category', 'Category has been deleted', 'App\\Models\\Category', 19, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"New Category Name\",\"code\":\"0hgfnuwpxw\",\"description\":\"Category description\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'a3ada034-f0e7-45e3-8cd2-862d15f58389', 'deleted', '2024-10-21 23:43:43', '2024-10-21 23:43:43'),
(24, 'Category', 'Category has been deleted', 'App\\Models\\Category', 13, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Mobile Phones\",\"code\":\"MOB\",\"description\":\"Smartphones and accessories\",\"image_url\":\"url_to_image_13.jpg\",\"status\":\"active\",\"sort_order\":13,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', 'dd86b182-fa87-40a9-9d5e-ec688cd2c72a', 'deleted', '2024-10-21 23:45:34', '2024-10-21 23:45:34'),
(25, 'Category', 'Category has been deleted', 'App\\Models\\Category', 3, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Home & Kitchen\",\"code\":\"HMK\",\"description\":\"Essentials for home and kitchen\",\"image_url\":\"url_to_image_3.jpg\",\"status\":\"active\",\"sort_order\":3,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '668d329b-44c4-4692-ab53-59294b6adfab', 'deleted', '2024-10-21 23:45:39', '2024-10-21 23:45:39'),
(26, 'Category', 'Category has been deleted', 'App\\Models\\Category', 1, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"New Category Name update\",\"code\":\"ELC\",\"description\":\"Category description update\",\"image_url\":\"url_to_image_1.jpg\",\"status\":\"active\",\"sort_order\":1,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '97d3ac7f-2f00-4b8e-afa0-4d9d2a5e902e', 'deleted', '2024-10-21 23:46:38', '2024-10-21 23:46:38'),
(27, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":16,\"name\":\"subcategory\",\"code\":\"ln10hd5mvj\",\"description\":\"Sub Category description\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '641b3f3e-84bc-4bd0-89d6-d0ed64aed31e', 'created', '2024-10-22 00:41:10', '2024-10-22 00:41:10'),
(28, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"hello\",\"code\":\"itbkcta9hb\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'add32b9c-03dc-449f-81a8-770119af59f5', 'created', '2024-10-22 00:43:57', '2024-10-22 00:43:57'),
(29, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Hamza\",\"description\":\"shaikh\"},\"old\":{\"name\":\"Tyer\",\"description\":\"Theek Tyer\"}}', '09c7c1ee-e741-4bad-a50e-656c7e8dbb66', 'updated', '2024-10-22 01:03:41', '2024-10-22 01:03:41'),
(30, 'SubCategory', 'SubCategory has been deleted', 'App\\Models\\SubCategory', 3, 'App\\Models\\User', 1, '{\"old\":{\"category_id\":2,\"name\":\"hello\",\"code\":\"itbkcta9hb\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'c6eb8d38-6359-441d-9eff-be387ea4ce2a', 'deleted', '2024-10-22 01:10:22', '2024-10-22 01:10:22'),
(31, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"sub\",\"updated_by\":1},\"old\":{\"name\":\"subcategory\",\"updated_by\":null}}', '3915a4df-4e3e-4f70-ae2d-71fd3d0266ee', 'updated', '2024-10-22 01:11:58', '2024-10-22 01:11:58'),
(32, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"status\":\"inactive\"},\"old\":{\"status\":\"active\"}}', 'd32e5d67-4337-415a-b1e3-d8a21d0bf692', 'updated', '2024-10-22 01:13:31', '2024-10-22 01:13:31'),
(33, 'SubCategory', 'SubCategory has been deleted', 'App\\Models\\SubCategory', 2, 'App\\Models\\User', 1, '{\"old\":{\"category_id\":16,\"name\":\"sub\",\"code\":\"ln10hd5mvj\",\"description\":\"Sub Category description\",\"image_url\":null,\"status\":\"inactive\",\"sort_order\":0,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '8fe65230-c1d7-42f5-9ce8-1c969ad8a9fb', 'deleted', '2024-10-22 01:13:39', '2024-10-22 01:13:39'),
(34, 'Country', 'Country has been created', 'App\\Models\\Country', 213, 'App\\Models\\User', 1, '{\"attributes\":{\"code\":\"dxi1mhmno0\",\"name\":\"Hamza\",\"iso_alpha_3\":\"AHS\",\"numeric_code\":2321,\"currency_code\":\"23\",\"currency_name\":\"hdfhdf\",\"phone_code\":\"97\",\"region\":\"dfhdfh\",\"status\":\"active\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '3e1084b3-9517-4a74-b4ad-9fb43234b644', 'created', '2024-10-22 01:58:41', '2024-10-22 01:58:41'),
(35, 'Country', 'Country has been updated', 'App\\Models\\Country', 213, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Hamza Khan Pathan\",\"iso_alpha_3\":\"AH\",\"numeric_code\":2321233,\"currency_code\":\"23nvbcnvcxn\",\"currency_name\":\"hdfhdf3efsbdfbdxfngfngfn\",\"region\":\"dfhdfhcn\",\"updated_by\":1},\"old\":{\"name\":\"Hamza\",\"iso_alpha_3\":\"AHS\",\"numeric_code\":2321,\"currency_code\":\"23\",\"currency_name\":\"hdfhdf\",\"region\":\"dfhdfh\",\"updated_by\":null}}', '1f482dc5-27bb-47da-bff7-b013f47d40d1', 'updated', '2024-10-22 03:34:45', '2024-10-22 03:34:45'),
(36, 'Country', 'Country has been deleted', 'App\\Models\\Country', 213, 'App\\Models\\User', 1, '{\"old\":{\"code\":\"dxi1mhmno0\",\"name\":\"Hamza Khan Pathan\",\"iso_alpha_3\":\"AH\",\"numeric_code\":2321233,\"currency_code\":\"23nvbcnvcxn\",\"currency_name\":\"hdfhdf3efsbdfbdxfngfngfn\",\"phone_code\":\"97\",\"region\":\"dfhdfhcn\",\"status\":\"active\",\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', 'd0fb363b-204f-42cc-8ab6-bd343ca2566c', 'deleted', '2024-10-22 03:40:14', '2024-10-22 03:40:14'),
(37, 'State', 'State has been created', 'App\\Models\\State', 37, 'App\\Models\\User', 1, '{\"attributes\":{\"country_id\":1,\"name\":\"admin\",\"status\":\"inactive\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '83e281b4-fede-405a-a90d-4430b6ddb237', 'created', '2024-10-22 04:22:21', '2024-10-22 04:22:21'),
(38, 'State', 'State has been updated', 'App\\Models\\State', 37, 'App\\Models\\User', 1, '{\"attributes\":{\"country_id\":2,\"name\":\"admin 12435\",\"updated_by\":1},\"old\":{\"country_id\":1,\"name\":\"admin\",\"updated_by\":null}}', 'd2ddbcde-216c-477e-b470-4dd57deb2f17', 'updated', '2024-10-22 04:25:15', '2024-10-22 04:25:15'),
(39, 'State', 'State has been deleted', 'App\\Models\\State', 37, 'App\\Models\\User', 1, '{\"old\":{\"country_id\":2,\"name\":\"admin 12435\",\"status\":\"inactive\",\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '4e3d6582-704f-4fdd-83f0-80a4df8135ca', 'deleted', '2024-10-22 04:29:14', '2024-10-22 04:29:14'),
(40, 'State', 'State has been created', 'App\\Models\\State', 38, 'App\\Models\\User', 1, '{\"attributes\":{\"country_id\":1,\"name\":\"new\",\"status\":\"inactive\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '0ea0ef72-5157-4c32-ac9e-77a11ae990b3', 'created', '2024-10-22 05:37:26', '2024-10-22 05:37:26'),
(41, 'State', 'State has been deleted', 'App\\Models\\State', 38, 'App\\Models\\User', 1, '{\"old\":{\"country_id\":1,\"name\":\"new\",\"status\":\"inactive\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'c0a63235-dccc-437f-9f01-7620d387efcc', 'deleted', '2024-10-22 05:37:43', '2024-10-22 05:37:43'),
(42, 'City', 'City has been created', 'App\\Models\\City', 68, 'App\\Models\\User', 1, '{\"attributes\":{\"country_id\":76,\"state_id\":19,\"latitude\":\"123.0000000\",\"longitude\":\"23.0000000\",\"timezone\":null,\"status\":\"active\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'b7c49643-dafa-49f0-b302-06ae99adf427', 'created', '2024-10-22 05:57:02', '2024-10-22 05:57:02'),
(43, 'City', 'City has been deleted', 'App\\Models\\City', 68, 'App\\Models\\User', 1, '{\"old\":{\"country_id\":76,\"state_id\":19,\"latitude\":\"123.0000000\",\"longitude\":\"23.0000000\",\"timezone\":null,\"status\":\"active\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'b40c205d-8735-42a6-b09d-aca1ac27853a', 'deleted', '2024-10-22 06:22:01', '2024-10-22 06:22:01'),
(44, 'Brand', 'Brand has been created', 'App\\Models\\Brand', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Hamza\",\"code\":\"1xrv9ra9vj\",\"description\":\"hyy\",\"image_url\":\"G:\\\\xampp\\\\tmp\\\\phpD59F.tmp\",\"status\":\"inactive\",\"sort_order\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '646d04bf-5f13-4144-92dd-760760490e18', 'created', '2024-10-22 07:56:34', '2024-10-22 07:56:34'),
(45, 'Brand', 'Brand has been created', 'App\\Models\\Brand', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"hyy\",\"code\":\"3flrvizm2p\",\"description\":\"dsgg\",\"image_url\":\"assets\\/images\\/brand\\/1729603957_6717a97516f54.jpg\",\"status\":\"active\",\"sort_order\":2,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '21bcfc8e-c240-4969-85a5-33cc2b2fa7c2', 'created', '2024-10-22 08:02:37', '2024-10-22 08:02:37'),
(46, 'Brand', 'Brand has been created', 'App\\Models\\Brand', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"hamza\",\"code\":\"hamza\",\"description\":\"hyyhh\",\"image_url\":\"assets\\/images\\/brand\\/1729658536_67187ea85a2e4.jpg\",\"status\":\"active\",\"sort_order\":2,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '6a9b985b-1be6-49e7-89ab-f17446a9eb94', 'created', '2024-10-22 23:12:17', '2024-10-22 23:12:17'),
(47, 'Brand', 'Brand has been created', 'App\\Models\\Brand', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"hamza\",\"code\":\"hamza-1\",\"description\":\"hyyhh\",\"image_url\":null,\"status\":\"inactive\",\"sort_order\":4,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '5f783073-36b8-4e6b-84c5-e70533cae458', 'created', '2024-10-22 23:13:13', '2024-10-22 23:13:13'),
(48, 'Brand', 'Brand has been created', 'App\\Models\\Brand', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"hamza\",\"code\":\"hamza-2\",\"description\":\"fghn\",\"image_url\":\"images\\/brand\\/1729658799_67187fafe4794.jpg\",\"status\":\"inactive\",\"sort_order\":4,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '0ee71ef1-4593-401c-b568-53791da387a2', 'created', '2024-10-22 23:16:39', '2024-10-22 23:16:39'),
(49, 'Brand', 'Brand has been updated', 'App\\Models\\Brand', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"description\":\"fhhyhh\",\"updated_by\":1},\"old\":{\"description\":\"fghn\",\"updated_by\":null}}', 'd2b8667b-1c42-4b9a-b7a7-619f9c8d14ee', 'updated', '2024-10-22 23:23:36', '2024-10-22 23:23:36'),
(50, 'Brand', 'Brand has been deleted', 'App\\Models\\Brand', 5, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"hamza\",\"code\":\"hamza-2\",\"description\":\"fhhyhh\",\"image_url\":\"images\\/brand\\/1729658799_67187fafe4794.jpg\",\"status\":\"inactive\",\"sort_order\":4,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', 'ccb44096-27ba-40b8-92cb-4be0e64164cc', 'deleted', '2024-10-22 23:28:29', '2024-10-22 23:28:29'),
(51, 'Brand', 'Brand has been created', 'App\\Models\\Brand', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Hamza\",\"code\":\"hamza\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":2,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '419598c7-d88a-4217-a51b-bc86876be2dc', 'created', '2024-10-22 23:46:44', '2024-10-22 23:46:44'),
(52, 'Brand', 'Brand has been updated', 'App\\Models\\Brand', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Hamza khan\",\"updated_by\":1},\"old\":{\"name\":\"Hamza\",\"updated_by\":null}}', '17bacbb7-ab58-43f6-877d-1128576f3aed', 'updated', '2024-10-22 23:51:48', '2024-10-22 23:51:48'),
(53, 'Brand', 'Brand has been updated', 'App\\Models\\Brand', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Hamza king\",\"status\":\"inactive\"},\"old\":{\"name\":\"Hamza khan\",\"status\":\"active\"}}', '4d75d209-e04a-4249-a340-e13a07621645', 'updated', '2024-10-22 23:53:36', '2024-10-22 23:53:36'),
(54, 'Brand', 'Brand has been created', 'App\\Models\\Brand', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"testing\",\"code\":\"testing\",\"description\":\"testng\",\"image_url\":\"images\\/brand\\/1729661389_671889cd1ce02.jpg\",\"status\":\"active\",\"sort_order\":2,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'ed7d94b0-06cb-49ee-be5a-28178a34bf32', 'created', '2024-10-22 23:59:49', '2024-10-22 23:59:49'),
(55, 'Brand', 'Brand has been deleted', 'App\\Models\\Brand', 1, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Hamza king\",\"code\":\"hamza\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"inactive\",\"sort_order\":2,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '77546627-b6ec-4a2f-8a68-8d088787f566', 'deleted', '2024-10-23 00:03:29', '2024-10-23 00:03:29'),
(56, 'Brand', 'Brand has been updated', 'App\\Models\\Brand', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_by\":1},\"old\":{\"updated_by\":null}}', 'ce2d577b-b24b-437d-9ce3-c9491f11aa85', 'updated', '2024-10-23 00:15:08', '2024-10-23 00:15:08'),
(57, 'Brand', 'Brand has been updated', 'App\\Models\\Brand', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"description\":\"tes\"},\"old\":{\"description\":\"testng\"}}', '3304e164-638b-4185-8f59-8a436d77b586', 'updated', '2024-10-23 00:16:41', '2024-10-23 00:16:41'),
(58, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"Hy Test New Question\",\"question_type\":\"mcq\",\"options\":\"[\\\"hq1\\\",\\\"hq2\\\",\\\"hq3\\\"]\",\"status\":\"inactive\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '6151c7cb-0dec-4861-bdaa-fddc7e3bbcf4', 'created', '2024-10-23 05:04:55', '2024-10-23 05:04:55'),
(59, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":3,\"question_text\":\"hyy test 2\",\"question_type\":\"text\",\"options\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'aa58bf79-95b4-4acf-b6ce-bf7c066fb76a', 'created', '2024-10-23 05:20:31', '2024-10-23 05:20:31'),
(60, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"hyy\",\"question_type\":\"video\",\"options\":null,\"status\":\"inactive\",\"sort_order\":3,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '49dfbf63-1c26-46ad-85c1-6b988e5a36f6', 'created', '2024-10-23 05:21:30', '2024-10-23 05:21:30'),
(61, 'InquiryQuestion', 'InquiryQuestion has been updated', 'App\\Models\\InquiryQuestion', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"options\":\"[\\\"hq111\\\",\\\"hq222\\\"]\",\"updated_by\":1},\"old\":{\"options\":\"[\\\"hq1\\\",\\\"hq2\\\",\\\"hq3\\\"]\",\"updated_by\":null}}', '9e9ef229-e7bf-49d1-9d50-f7a37d9c5033', 'updated', '2024-10-23 05:26:58', '2024-10-23 05:26:58'),
(62, 'InquiryQuestion', 'InquiryQuestion has been deleted', 'App\\Models\\InquiryQuestion', 1, 'App\\Models\\User', 1, '{\"old\":{\"subcategory_id\":1,\"question_text\":\"Hy Test New Question\",\"question_type\":\"mcq\",\"options\":\"[\\\"hq111\\\",\\\"hq222\\\"]\",\"status\":\"inactive\",\"sort_order\":0,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '632d53ac-f9e2-4394-9649-36ac59a07d04', 'deleted', '2024-10-23 05:31:17', '2024-10-23 05:31:17'),
(63, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"test Inquiry Question Create\",\"question_type\":\"brand\",\"options\":null,\"status\":\"inactive\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'b13374b2-1bad-4653-af09-3098b364aaec', 'created', '2024-10-23 05:41:20', '2024-10-23 05:41:20'),
(64, 'InquiryQuestion', 'InquiryQuestion has been updated', 'App\\Models\\InquiryQuestion', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":3,\"question_text\":\"hello test update\",\"question_type\":\"text\",\"status\":\"active\",\"updated_by\":1},\"old\":{\"subcategory_id\":1,\"question_text\":\"test Inquiry Question Create\",\"question_type\":\"brand\",\"status\":\"inactive\",\"updated_by\":null}}', '7fcd01f5-1239-453c-bf37-43ca030822f0', 'updated', '2024-10-23 05:53:30', '2024-10-23 05:53:30'),
(65, 'InquiryQuestion', 'InquiryQuestion has been deleted', 'App\\Models\\InquiryQuestion', 3, 'App\\Models\\User', 1, '{\"old\":{\"subcategory_id\":1,\"question_text\":\"hyy\",\"question_type\":\"video\",\"options\":null,\"status\":\"inactive\",\"sort_order\":3,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'b2a5f9f3-c686-498e-8658-c59c88555a82', 'deleted', '2024-10-23 05:56:44', '2024-10-23 05:56:44'),
(66, 'Category', 'Category has been created', 'App\\Models\\Category', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"New Category Name\",\"code\":\"new-category-name\",\"description\":\"Category description\",\"image_url\":null,\"status\":\"inactive\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '6a897642-cf44-4fcf-b4e6-69313943d69c', 'created', '2024-10-28 07:43:06', '2024-10-28 07:43:06'),
(67, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Hamza123\"},\"old\":{\"name\":\"Hamza\"}}', '09482e02-6fdf-4826-a28c-5f36266dfcbf', 'updated', '2024-10-28 07:49:09', '2024-10-28 07:49:09'),
(68, 'Category', 'Category has been deleted', 'App\\Models\\Category', 20, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"admin\",\"code\":\"lvkwkz5350\",\"description\":\"newww\",\"image_url\":null,\"status\":\"inactive\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '3af00db8-f718-4a21-98a9-86e662351c68', 'deleted', '2024-10-28 08:13:49', '2024-10-28 08:13:49'),
(69, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":3,\"question_text\":\"Mcq Question 1\",\"question_type\":\"mcq\",\"options\":\"[\\\"Option 1\\\",\\\"option 2\\\",\\\"Option 3\\\"]\",\"status\":\"active\",\"sort_order\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'f8130eed-d1d4-49d3-9e08-2f6c3a309337', 'created', '2024-10-28 08:23:08', '2024-10-28 08:23:08'),
(70, 'InquiryQuestion', 'InquiryQuestion has been deleted', 'App\\Models\\InquiryQuestion', 2, 'App\\Models\\User', 1, '{\"old\":{\"subcategory_id\":3,\"question_text\":\"hyy test 2\",\"question_type\":\"text\",\"options\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'a2ffb8e5-dab8-474d-aa11-9718e9b4fd9f', 'deleted', '2024-10-28 08:25:21', '2024-10-28 08:25:21'),
(71, 'InquiryQuestion', 'InquiryQuestion has been deleted', 'App\\Models\\InquiryQuestion', 4, 'App\\Models\\User', 1, '{\"old\":{\"subcategory_id\":3,\"question_text\":\"hello test update\",\"question_type\":\"text\",\"options\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":1,\"deleted_by\":null}}', '911ee0cb-63e2-4695-a921-06c89d01f23d', 'deleted', '2024-10-28 08:25:24', '2024-10-28 08:25:24'),
(72, 'InquiryQuestion', 'InquiryQuestion has been deleted', 'App\\Models\\InquiryQuestion', 5, 'App\\Models\\User', 1, '{\"old\":{\"subcategory_id\":3,\"question_text\":\"Mcq Question 1\",\"question_type\":\"mcq\",\"options\":\"[\\\"Option 1\\\",\\\"option 2\\\",\\\"Option 3\\\"]\",\"status\":\"active\",\"sort_order\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '1feadba1-b887-499c-92c0-5609b252efb9', 'deleted', '2024-10-28 08:26:17', '2024-10-28 08:26:17'),
(73, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"Upload Images\",\"question_type\":\"image\",\"options\":null,\"status\":\"active\",\"sort_order\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'f1c476e2-9a6a-4642-afea-47b59e801e4c', 'created', '2024-10-28 08:26:41', '2024-10-28 08:26:41'),
(74, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"Number of items\",\"question_type\":\"numeric\",\"options\":null,\"status\":\"active\",\"sort_order\":2,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '66ead605-b83c-493e-8189-2afcc2edbc3e', 'created', '2024-10-28 08:27:16', '2024-10-28 08:27:16'),
(75, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"Ton\",\"question_type\":\"select\",\"options\":\"[\\\"0.5 Ton\\\",\\\"1 Ton\\\",\\\"1.5 Ton\\\",\\\"2 Ton\\\"]\",\"status\":\"active\",\"sort_order\":3,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'f9a5d0b7-b2a3-4f7a-8952-3aefaf901d09', 'created', '2024-10-28 08:28:10', '2024-10-28 08:28:10'),
(76, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"Brand\",\"question_type\":\"brand\",\"options\":null,\"status\":\"active\",\"sort_order\":4,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '71d844c7-be5c-4a94-98b5-8e8faaccae45', 'created', '2024-10-28 08:28:39', '2024-10-28 08:28:39'),
(77, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 10, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"Color\",\"question_type\":\"select\",\"options\":\"[\\\"White\\\",\\\"Red\\\"]\",\"status\":\"active\",\"sort_order\":5,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '676afd03-f7e7-4288-9248-7b3bcfacaad9', 'created', '2024-10-28 08:29:16', '2024-10-28 08:29:16'),
(78, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 11, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"Is product working?\",\"question_type\":\"mcq\",\"options\":\"[\\\"Yes\\\",\\\"No\\\"]\",\"status\":\"active\",\"sort_order\":6,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '4d35c3a0-a8aa-4577-9c39-17a1ab88cb62', 'created', '2024-10-28 08:29:50', '2024-10-28 08:29:50'),
(79, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 12, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":1,\"question_text\":\"Additional Notes\",\"question_type\":\"text\",\"options\":null,\"status\":\"active\",\"sort_order\":7,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '1a2f34bc-65b9-4ccd-bf4b-297849ee2de4', 'created', '2024-10-28 08:30:22', '2024-10-28 08:30:22'),
(80, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Ranger\"},\"old\":{\"name\":\"Hamza123\"}}', 'f9fa83cb-0573-4c97-8472-7a483b61787e', 'updated', '2024-10-29 00:48:20', '2024-10-29 00:48:20'),
(81, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":3,\"name\":\"Mikser Masin\",\"updated_by\":1},\"old\":{\"category_id\":2,\"name\":\"hello\",\"updated_by\":null}}', '7904784c-1118-4163-94fc-3f190efba741', 'updated', '2024-10-29 00:48:58', '2024-10-29 00:48:58'),
(82, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":15,\"name\":\"LG Computer\",\"status\":\"active\"},\"old\":{\"category_id\":16,\"name\":\"sub\",\"status\":\"inactive\"}}', '0a3142e8-9129-4ae4-af90-e79510b05b2f', 'updated', '2024-10-29 00:49:49', '2024-10-29 00:49:49'),
(83, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'b4e91e9d-5db9-4371-b043-b8223de1f880', 'created', '2024-10-29 01:05:29', '2024-10-29 01:05:29'),
(84, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt-1\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'baaa5951-29f9-443e-b67f-1f042d7b8043', 'created', '2024-10-29 01:05:29', '2024-10-29 01:05:29'),
(85, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt-2\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'd98b13b9-3e82-4105-8032-798112429d14', 'created', '2024-10-29 01:05:30', '2024-10-29 01:05:30'),
(86, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt-3\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'b308bbf8-c590-4380-8efc-0edc506fc922', 'created', '2024-10-29 01:05:30', '2024-10-29 01:05:30'),
(87, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt-4\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '7893a70c-715e-4c5b-964b-87f6147243ee', 'created', '2024-10-29 01:05:30', '2024-10-29 01:05:30'),
(88, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt-5\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '9aaabdbd-d645-42a2-a6d3-890114bbb2c4', 'created', '2024-10-29 01:05:30', '2024-10-29 01:05:30'),
(89, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 10, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt-6\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '81d5180a-8d81-44cd-8017-7e1d05199483', 'created', '2024-10-29 01:05:30', '2024-10-29 01:05:30'),
(90, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 11, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt-7\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '52ea6154-9b9d-4adc-9c7c-6842104630f4', 'created', '2024-10-29 01:05:31', '2024-10-29 01:05:31'),
(91, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 12, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt-8\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'eac0f9b8-db7f-443e-9443-09f829514386', 'created', '2024-10-29 01:05:31', '2024-10-29 01:05:31'),
(92, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 13, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"T Shirt\",\"code\":\"t-shirt\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '6f533fd9-c821-4c35-ade0-c35c1cfc2703', 'created', '2024-10-29 01:08:03', '2024-10-29 01:08:03'),
(93, 'Category', 'Category has been created', 'App\\Models\\Category', 23, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Electronics\",\"code\":\"electronics\",\"description\":\"Electronics\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'e2f161bc-4c87-4cda-a04f-1c902849c933', 'created', '2024-10-29 01:10:42', '2024-10-29 01:10:42'),
(94, 'Category', 'Category has been created', 'App\\Models\\Category', 24, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Electronics\",\"code\":\"electronics-1\",\"description\":\"Electronics\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '07ccb8ea-10af-4dfd-9ec9-b01bff3d4dd4', 'created', '2024-10-29 01:10:43', '2024-10-29 01:10:43'),
(95, 'Category', 'Category has been created', 'App\\Models\\Category', 25, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Electronics\",\"code\":\"electronics-2\",\"description\":\"Electronics\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '26d5cd55-1c1a-4808-a10e-793bfae20097', 'created', '2024-10-29 01:10:44', '2024-10-29 01:10:44'),
(96, 'Category', 'Category has been created', 'App\\Models\\Category', 26, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Anwar Deafah Hotel\",\"code\":\"anwar-deafah-hotel\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'c027fa1c-40d6-421b-ae8a-7f4106a9e564', 'created', '2024-10-29 01:11:30', '2024-10-29 01:11:30'),
(97, 'Country', 'Country has been created', 'App\\Models\\Country', 214, 'App\\Models\\User', 1, '{\"attributes\":{\"code\":\"hamza\",\"name\":\"Hamza\",\"iso_alpha_3\":\"AH\",\"numeric_code\":22,\"currency_code\":\"23nvbcnvcxn\",\"currency_name\":\"fbdxfbd\",\"phone_code\":\"fsfvs\",\"region\":\"DSZfvv\",\"status\":\"active\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '544d5710-7b98-4a0e-a776-69ec3e69261d', 'created', '2024-10-29 01:15:09', '2024-10-29 01:15:09'),
(98, 'Country', 'Country has been deleted', 'App\\Models\\Country', 214, 'App\\Models\\User', 1, '{\"old\":{\"code\":\"hamza\",\"name\":\"Hamza\",\"iso_alpha_3\":\"AH\",\"numeric_code\":22,\"currency_code\":\"23nvbcnvcxn\",\"currency_name\":\"fbdxfbd\",\"phone_code\":\"fsfvs\",\"region\":\"DSZfvv\",\"status\":\"active\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '9aba9d5e-1153-4a7f-9cf6-3dbe257902b4', 'deleted', '2024-10-29 01:15:22', '2024-10-29 01:15:22'),
(99, 'State', 'State has been created', 'App\\Models\\State', 39, 'App\\Models\\User', 1, '{\"attributes\":{\"country_id\":2,\"name\":\"admin\",\"status\":\"inactive\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '1d93721b-eb84-45db-bc77-2c0a930903c9', 'created', '2024-10-29 01:35:23', '2024-10-29 01:35:23'),
(100, 'City', 'City has been created', 'App\\Models\\City', 69, 'App\\Models\\User', 1, '{\"attributes\":{\"country_id\":76,\"state_id\":29,\"latitude\":\"123.0000000\",\"longitude\":\"23.0000000\",\"timezone\":null,\"status\":\"active\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '5c36ca9e-b74e-483e-9742-bd157a5c424a', 'created', '2024-10-29 01:43:14', '2024-10-29 01:43:14'),
(101, 'State', 'State has been created', 'App\\Models\\State', 40, 'App\\Models\\User', 1, '{\"attributes\":{\"country_id\":76,\"name\":\"admin\",\"status\":\"inactive\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '5da93b13-b0b4-44ab-a8a5-cfa3005f33ae', 'created', '2024-10-29 01:45:38', '2024-10-29 01:45:38'),
(102, 'Brand', 'Brand has been updated', 'App\\Models\\Brand', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"LG\"},\"old\":{\"name\":\"Hamza king\"}}', '1696b42c-6eda-4eab-92af-ddb698c0bdb6', 'updated', '2024-10-29 03:54:46', '2024-10-29 03:54:46'),
(103, 'Brand', 'Brand has been updated', 'App\\Models\\Brand', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Sony\"},\"old\":{\"name\":\"testing\"}}', '8310cb12-f6d4-45ee-a32d-8fdaf8d7dafa', 'updated', '2024-10-29 03:55:03', '2024-10-29 03:55:03'),
(104, 'Brand', 'Brand has been updated', 'App\\Models\\Brand', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"description\":\"LG Product Only\",\"status\":\"active\"},\"old\":{\"description\":\"hyy\",\"status\":\"inactive\"}}', '43df849a-794a-4a38-a62d-82c80906b8a4', 'updated', '2024-10-29 03:55:24', '2024-10-29 03:55:24'),
(105, 'Brand', 'Brand has been updated', 'App\\Models\\Brand', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"description\":\"Sony Product\"},\"old\":{\"description\":\"tes\"}}', 'fa0774be-fcd8-4466-824a-6778042deb88', 'updated', '2024-10-29 03:55:45', '2024-10-29 03:55:45'),
(106, 'Brand', 'Brand has been created', 'App\\Models\\Brand', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"admin\",\"code\":\"admin\",\"description\":\"hyy\",\"image_url\":\"images\\/brand\\/1730194207_6720ab1f2dc24.png\",\"status\":\"active\",\"sort_order\":3,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '0cad2a0a-e74a-4f06-9101-4132854ee05f', 'created', '2024-10-29 04:00:07', '2024-10-29 04:00:07'),
(107, 'Brand', 'Brand has been deleted', 'App\\Models\\Brand', 3, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"admin\",\"code\":\"admin\",\"description\":\"hyy\",\"image_url\":\"images\\/brand\\/1730194207_6720ab1f2dc24.png\",\"status\":\"active\",\"sort_order\":3,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '241b9834-fa86-47a8-a4ea-387ae978c6c2', 'deleted', '2024-10-29 04:00:18', '2024-10-29 04:00:18'),
(108, 'Category', 'Category has been created', 'App\\Models\\Category', 27, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Electronic\",\"code\":\"electronic\",\"description\":\"Electronic\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'f35d4269-07d2-49ae-b04b-ccc611c66441', 'created', '2024-10-29 04:11:46', '2024-10-29 04:11:46'),
(109, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 14, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":27,\"name\":\"TV\",\"code\":\"tv\",\"description\":\"Electronics Tv\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'ed365209-5c3b-4c9e-b507-d8ee33bb6a1a', 'created', '2024-10-29 04:12:53', '2024-10-29 04:12:53'),
(110, 'InquiryQuestion', 'InquiryQuestion has been updated', 'App\\Models\\InquiryQuestion', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":13,\"updated_by\":1},\"old\":{\"subcategory_id\":1,\"updated_by\":null}}', 'ae6ad998-be9f-44e8-b747-ef2b529d351c', 'updated', '2024-10-29 05:43:28', '2024-10-29 05:43:28'),
(111, 'Category', 'Category has been created', 'App\\Models\\Category', 28, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"new\",\"code\":\"new\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '1171dc03-d05c-4cbb-ab11-dac14461ec2a', 'created', '2024-10-30 01:05:47', '2024-10-30 01:05:47'),
(112, 'Category', 'Category has been deleted', 'App\\Models\\Category', 28, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"new\",\"code\":\"new\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '6e6ff948-5c45-4fbc-ab3b-e8b60a79a69b', 'deleted', '2024-10-30 01:09:56', '2024-10-30 01:09:56'),
(113, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 15, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":2,\"name\":\"Bronz\",\"code\":\"bronz\",\"description\":\"hyy\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'c56989e5-16c2-48b4-8e6e-e0987e26c2db', 'created', '2024-11-11 00:55:19', '2024-11-11 00:55:19'),
(114, 'Category', 'Category has been updated', 'App\\Models\\Category', 27, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Electronics\",\"description\":\"Electronics\",\"updated_by\":1},\"old\":{\"name\":\"Electronic\",\"description\":\"Electronic\",\"updated_by\":null}}', 'bcc1ecf0-937f-4c98-b340-ef2d58a12d76', 'updated', '2024-11-11 05:54:40', '2024-11-11 05:54:40'),
(115, 'Category', 'Category has been created', 'App\\Models\\Category', 29, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Appliances\",\"code\":\"appliances\",\"description\":\"New\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'd92473af-9554-4383-80b5-8585745097bf', 'created', '2024-11-11 05:55:21', '2024-11-11 05:55:21'),
(116, 'SubCategory', 'SubCategory has been created', 'App\\Models\\SubCategory', 16, 'App\\Models\\User', 1, '{\"attributes\":{\"category_id\":27,\"name\":\"Fridge\",\"code\":\"fridge\",\"description\":\"New Sub Category\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '45ef1614-cf8a-4027-9d82-cf18066b9351', 'created', '2024-11-11 05:56:34', '2024-11-11 05:56:34'),
(117, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 16, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Fridge1\",\"updated_by\":1},\"old\":{\"name\":\"Fridge\",\"updated_by\":null}}', '573c8b35-59d0-4a1b-a2e4-1e1a1e26d4c9', 'updated', '2024-11-11 05:56:50', '2024-11-11 05:56:50'),
(118, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 13, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":13,\"question_text\":\"demo\",\"question_type\":\"mcq\",\"options\":\"[\\\"Mcq 1\\\",\\\"Mcq 2\\\",\\\"Mcq v3\\\"]\",\"status\":\"inactive\",\"sort_order\":2,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '5b26f327-779e-4aa5-b05f-926413c969f0', 'created', '2024-11-11 06:00:12', '2024-11-11 06:00:12'),
(119, 'InquiryQuestion', 'InquiryQuestion has been updated', 'App\\Models\\InquiryQuestion', 13, 'App\\Models\\User', 1, '{\"attributes\":{\"status\":\"active\",\"updated_by\":1},\"old\":{\"status\":\"inactive\",\"updated_by\":null}}', 'd6824103-a72a-41dd-a3e9-3424c3aae044', 'updated', '2024-11-11 06:00:28', '2024-11-11 06:00:28'),
(120, 'Category', 'Category has been created', 'App\\Models\\Category', 30, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Demo\",\"code\":\"demo\",\"description\":\"Test\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '2def5615-d818-4357-9088-870c4fe480c9', 'created', '2024-11-11 07:00:41', '2024-11-11 07:00:41'),
(121, 'Category', 'Category has been deleted', 'App\\Models\\Category', 30, 'App\\Models\\User', 1, '{\"old\":{\"name\":\"Demo\",\"code\":\"demo\",\"description\":\"Test\",\"image_url\":null,\"status\":\"active\",\"sort_order\":0,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', 'acd34ed0-6f7a-4d3a-85eb-cab2b1c74ea8', 'deleted', '2024-11-11 07:00:53', '2024-11-11 07:00:53'),
(122, 'InquiryQuestion', 'InquiryQuestion has been created', 'App\\Models\\InquiryQuestion', 14, 'App\\Models\\User', 1, '{\"attributes\":{\"subcategory_id\":3,\"question_text\":\"hyy\",\"question_type\":\"mcq\",\"options\":\"[\\\"Demo 1\\\",\\\"Demo 2\\\",\\\"Demo3\\\",\\\"Demo 4\\\"]\",\"status\":\"active\",\"sort_order\":1,\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '84012bb6-b549-402f-a9e4-bc99d9666d74', 'created', '2024-11-11 07:05:55', '2024-11-11 07:05:55'),
(123, 'SubCategory', 'SubCategory has been updated', 'App\\Models\\SubCategory', 13, 'App\\Models\\User', 1, '{\"attributes\":{\"updated_by\":1},\"old\":{\"updated_by\":null}}', 'cd54bb39-f083-4895-9ebf-e0684dad1eac', 'updated', '2024-11-11 07:14:47', '2024-11-11 07:14:47');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `event`, `created_at`, `updated_at`) VALUES
(124, 'City', 'City has been deleted', 'App\\Models\\City', 69, 'App\\Models\\User', 1, '{\"old\":{\"country_id\":76,\"state_id\":29,\"latitude\":\"123.0000000\",\"longitude\":\"23.0000000\",\"timezone\":null,\"status\":\"active\",\"created_by\":1,\"updated_by\":null,\"deleted_by\":null}}', '7c9b9b8e-1770-408f-af64-ae697667717f', 'deleted', '2024-11-11 07:18:41', '2024-11-11 07:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `code`, `description`, `image_url`, `status`, `sort_order`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'LG', 'hamza', 'LG Product Only', NULL, 'active', 2, '2024-10-22 23:46:44', '2024-10-29 03:59:04', NULL, 1, 1),
(2, 'Sony', 'testing', 'Sony Product', 'images/brand/1729661389_671889cd1ce02.jpg', 'active', 2, '2024-10-22 23:59:49', '2024-10-29 03:59:04', NULL, 1, 1),
(3, 'admin', 'admin', 'hyy', 'images/brand/1730194207_6720ab1f2dc24.png', 'active', 3, '2024-10-29 04:00:07', '2024-10-29 04:00:18', '2024-10-29 04:00:18', 1, NULL);

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
('otp_9016946486', 'i:123456;', 1735624379),
('otp_send_9016946486', 'i:1;', 1735624139),
('otp_send_9016946486:timer', 'i:1735624139;', 1735624139);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `code`, `description`, `image_url`, `status`, `sort_order`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'New Category Name update', 'ELC', 'Category description update', 'url_to_image_1.jpg', 'active', 1, '2024-10-21 06:44:16', '2024-10-21 23:46:38', '2024-10-29 06:34:01', 1, 1),
(2, 'Fashion', 'FAS', 'Latest fashion trends and clothing', 'url_to_image_2.jpg', 'active', 2, '2024-10-21 06:44:16', '2024-10-21 01:49:01', NULL, 1, 1),
(3, 'Home & Kitchen', 'HMK', 'Essentials for home and kitchen', 'url_to_image_3.jpg', 'active', 3, '2024-10-21 06:44:16', '2024-10-21 23:45:39', NULL, 1, 1),
(4, 'Books', 'BKS', 'Books from various genres', 'url_to_image_4.jpg', 'active', 4, '2024-10-21 06:44:16', '2024-10-29 01:39:31', NULL, 1, 1),
(5, 'Health & Beauty', 'HBE', 'Health and beauty products', 'url_to_image_5.jpg', 'active', 5, '2024-10-21 06:44:16', '2024-10-21 01:28:41', NULL, 1, 1),
(6, 'Vehicles', 'VEH', 'Cars, bikes, and other vehicles', 'url_to_image_6.jpg', 'active', 6, '2024-10-21 06:44:16', '2024-10-21 01:14:42', NULL, 1, 1),
(7, 'Real Estate', 'REA', 'Buy, sell, or rent properties', 'url_to_image_7.jpg', 'active', 7, '2024-10-21 06:44:16', '2024-10-21 01:21:09', NULL, 1, 1),
(8, 'Furniture', 'FUR', 'Furniture for home and office', 'url_to_image_8.jpg', 'active', 8, '2024-10-21 06:44:16', '2024-10-21 01:29:42', NULL, 1, 1),
(9, 'Sports Equipment', 'SPO', 'Sporting goods and fitness equipment', 'url_to_image_9.jpg', 'active', 9, '2024-10-21 06:44:16', '2024-10-21 01:16:03', NULL, 1, 1),
(10, 'Toys', 'TOY', 'Toys and games for children', 'url_to_image_10.jpg', 'active', 10, '2024-10-21 06:44:16', '2024-10-21 01:15:15', NULL, 1, 1),
(11, 'Pets', 'PET', 'Pet supplies and animals for sale', 'url_to_image_11.jpg', 'active', 11, '2024-10-21 06:44:16', '2024-10-21 01:22:01', NULL, 1, 1),
(12, 'Fashion Accessories', 'ACC', 'Jewelry, bags, and other accessories', 'url_to_image_12.jpg', 'active', 12, '2024-10-21 06:44:16', '2024-10-21 01:30:33', NULL, 1, 1),
(13, 'Mobile Phones', 'MOB', 'Smartphones and accessories', 'url_to_image_13.jpg', 'active', 13, '2024-10-21 06:44:16', '2024-10-21 23:45:34', NULL, 1, 1),
(14, 'Services', 'SER', 'Various services offered', 'url_to_image_14.jpg', 'active', 14, '2024-10-21 06:44:16', '2024-10-21 23:42:00', NULL, 1, 1),
(15, 'Computers & Laptops', 'COM', 'Computers, laptops, and accessories', 'url_to_image_15.jpg', 'active', 15, '2024-10-21 06:44:16', '2024-10-21 03:38:14', NULL, 1, 1),
(16, 'Bicycles', 'BIC', 'Bicycles and cycling accessories', 'url_to_image_16.jpg', 'active', 16, '2024-10-21 06:44:16', '2024-10-21 06:44:16', NULL, 1, 1),
(19, 'New Category Name', '0hgfnuwpxw', 'Category description', NULL, 'active', 0, '2024-10-21 23:30:19', '2024-10-21 23:43:43', '2024-10-29 06:34:10', 1, NULL),
(20, 'admin', 'lvkwkz5350', 'newww', NULL, 'inactive', 0, '2024-10-21 23:34:19', '2024-10-29 00:44:43', '2024-10-29 00:44:43', 1, NULL),
(21, 'admin', 't7ldedh4x3', 'hyyyy', NULL, 'active', 0, '2024-10-21 23:36:19', '2024-10-29 00:44:43', '2024-10-29 00:44:43', 1, NULL),
(22, 'New Category Name', 'new-category-name', 'Category description', NULL, 'inactive', 0, '2024-10-28 07:43:05', '2024-10-28 07:43:05', '2024-10-29 06:34:16', 1, NULL),
(23, 'Electronics', 'electronics', 'Electronics', NULL, 'active', 0, '2024-10-29 01:10:42', '2024-10-29 01:10:58', '2024-10-29 01:10:58', 1, NULL),
(24, 'Electronics', 'electronics-1', 'Electronics', NULL, 'active', 0, '2024-10-29 01:10:43', '2024-10-29 01:10:58', '2024-10-29 01:10:58', 1, NULL),
(25, 'Electronics', 'electronics-2', 'Electronics', NULL, 'active', 0, '2024-10-29 01:10:44', '2024-10-29 01:10:58', '2024-10-29 01:10:58', 1, NULL),
(26, 'Anwar Deafah Hotel', 'anwar-deafah-hotel', 'hyy', NULL, 'active', 0, '2024-10-29 01:11:30', '2024-10-29 01:11:39', '2024-10-29 01:11:39', 1, NULL),
(27, 'Electronics', 'electronic', 'Electronics', NULL, 'active', 0, '2024-10-29 04:11:46', '2024-11-11 05:54:40', NULL, 1, 1),
(28, 'new', 'new', 'hyy', NULL, 'active', 0, '2024-10-30 01:05:46', '2024-10-30 01:09:56', '2024-10-30 01:09:56', 1, NULL),
(29, 'Appliances', 'appliances', 'New', NULL, 'active', 0, '2024-11-11 05:55:21', '2024-11-11 05:55:44', '2024-11-11 05:55:44', 1, NULL),
(30, 'Demo', 'demo', 'Test', NULL, 'active', 0, '2024-11-11 07:00:40', '2024-11-11 07:00:53', '2024-11-11 07:00:53', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `state_id`, `name`, `latitude`, `longitude`, `timezone`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 76, 1, 'Amaravati', 16.5062000, 80.6480000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(2, 76, 1, 'Visakhapatnam', 17.6868000, 83.2185000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(3, 76, 1, 'Vijayawada', 16.2962000, 80.4365000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(4, 76, 2, 'Itanagar', 28.2180000, 94.7278000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(5, 76, 2, 'Naharlagun', 27.0844000, 93.6141000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(6, 76, 3, 'Dispur', 26.1445000, 91.7362000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(7, 76, 3, 'Guwahati', 26.1389000, 91.5868000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(8, 76, 4, 'Patna', 25.0968000, 85.3131000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(9, 76, 4, 'Gaya', 25.6140000, 85.1604000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(10, 76, 5, 'Raipur', 21.2782000, 81.6564000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(11, 76, 5, 'Durg', 21.3130000, 81.8255000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(12, 76, 6, 'Panaji', 15.5525000, 73.7925000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(13, 76, 6, 'Margao', 15.5528000, 73.7543000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(14, 76, 7, 'Gandhinagar', 23.0225000, 72.5714000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(15, 76, 7, 'Surat', 22.3039000, 70.8022000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(16, 76, 7, 'Ahmedabad', 23.1790000, 72.6370000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(17, 76, 7, 'Vadodara', 22.7022000, 72.5712000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(18, 76, 7, 'Rajkot', 23.0045000, 72.4707000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(19, 76, 7, 'Bhavnagar', 22.4545000, 70.4643000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(20, 76, 7, 'Jamnagar', 21.1760000, 72.6302000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(21, 76, 7, 'Anand', 22.3584000, 73.2180000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(22, 76, 7, 'Bharuch', 22.7395000, 73.4625000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(23, 76, 7, 'Vapi', 21.6476000, 70.1015000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(24, 76, 7, 'Nadiad', 20.4670000, 72.8340000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(25, 76, 7, 'Dahod', 22.1357000, 73.7256000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(26, 76, 7, 'Surendranagar', 22.4309000, 73.1034000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(27, 76, 7, 'Godhra', 21.0169000, 72.6832000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(28, 76, 7, 'Mahesana', 21.6376000, 73.6140000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(29, 76, 7, 'Kutch', 22.8456000, 72.5299000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(30, 76, 7, 'Palanpur', 22.0635000, 73.7649000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(31, 76, 7, 'Navsari', 22.7240000, 73.1624000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(32, 76, 7, 'Bharuch', 21.8863000, 72.8635000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(33, 76, 7, 'Bilimora', 22.3648000, 73.4904000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(34, 76, 7, 'Himmatnagar', 21.9827000, 73.9194000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(35, 76, 7, 'Khambhalida', 22.3139000, 73.0962000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(36, 76, 7, 'Umargam', 20.8440000, 73.1823000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(37, 76, 7, 'Dediapada', 22.0815000, 72.5875000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(38, 76, 7, 'Dhoraji', 20.7943000, 72.6390000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(39, 76, 7, 'Mandvi', 22.5320000, 73.0400000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(40, 76, 7, 'Junagadh', 20.9546000, 72.7800000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(41, 76, 7, 'Valsad', 20.9736000, 73.1893000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(42, 76, 8, 'Chandigarh', 28.4595000, 77.0266000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(43, 76, 8, 'Gurugram', 28.4600000, 76.8350000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(44, 76, 9, 'Shimla', 31.1048000, 77.1734000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(45, 76, 9, 'Dharamshala', 32.2207000, 76.3404000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(46, 76, 10, 'Ranchi', 23.3441000, 85.3094000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(47, 76, 11, 'Bengaluru', 12.9716000, 77.5946000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(48, 76, 12, 'Thiruvananthapuram', 8.5241000, 76.9366000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(49, 76, 12, 'Kochi', 9.9816000, 76.2673000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(50, 76, 13, 'Bhopal', 23.2599000, 77.4126000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(51, 76, 13, 'Indore', 22.7196000, 75.8577000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(52, 76, 14, 'Mumbai', 19.0760000, 72.8777000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(53, 76, 14, 'Pune', 18.5204000, 73.8567000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(54, 76, 15, 'Imphal', 24.8170000, 93.9368000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(55, 76, 16, 'Shillong', 25.5788000, 91.8932000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(56, 76, 17, 'Aizawl', 23.1645000, 92.9376000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(57, 76, 18, 'Kohima', 25.6751000, 94.1025000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(58, 76, 19, 'Bhubaneswar', 20.2961000, 85.8245000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(59, 76, 20, 'Chandigarh', 30.7333000, 76.7794000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(60, 76, 21, 'Jaipur', 26.9124000, 75.7873000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(61, 76, 22, 'Gangtok', 27.3343000, 88.6139000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(62, 76, 23, 'Chennai', 13.0827000, 80.2707000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(63, 76, 24, 'Hyderabad', 17.3850000, 78.4867000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(64, 76, 25, 'Agartala', 23.8358000, 91.2754000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(65, 76, 26, 'Lucknow', 26.8467000, 80.9462000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(66, 76, 27, 'Dehradun', 30.3165000, 78.0322000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(67, 76, 28, 'Kolkata', 22.5726000, 88.3639000, 'Asia/Kolkata', 'active', NULL, NULL, NULL, 1, 1),
(68, 76, 19, 'Hamza', 123.0000000, 23.0000000, NULL, 'active', '2024-10-22 05:57:02', '2024-10-22 06:22:01', '2024-10-22 06:22:01', 1, NULL),
(69, 76, 29, 'admin', 123.0000000, 23.0000000, NULL, 'active', '2024-10-29 01:43:14', '2024-11-11 07:18:41', '2024-11-11 07:18:41', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `iso_alpha_3` varchar(3) DEFAULT NULL,
  `numeric_code` int(11) DEFAULT NULL,
  `currency_code` varchar(25) DEFAULT NULL,
  `currency_name` varchar(55) DEFAULT NULL,
  `phone_code` varchar(5) DEFAULT NULL,
  `region` varchar(55) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `iso_alpha_3`, `numeric_code`, `currency_code`, `currency_name`, `phone_code`, `region`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 'AF', 'Afghanistan', 'AFG', 4, 'AFN', 'Afghan Afghani', '+93', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-29 01:35:39', NULL, 1, 1),
(2, 'AL', 'Albania', 'ALB', 8, 'ALL', 'Albanian Lek', '+355', 'Europe', 'active', '2024-10-28 05:52:16', '2024-10-29 01:34:33', NULL, 1, 1),
(3, 'DZ', 'Algeria', 'DZA', 12, 'DZD', 'Algerian Dinar', '+213', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(4, 'AD', 'Andorra', 'AND', 20, 'EUR', 'Euro', '+376', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(5, 'AO', 'Angola', 'AGO', 24, 'AOA', 'Angolan Kwanza', '+244', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(6, 'AG', 'Antigua and Barbuda', 'ATG', 28, 'XCD', 'East Caribbean Dollar', '+1268', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(7, 'AR', 'Argentina', 'ARG', 32, 'ARS', 'Argentine Peso', '+54', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(8, 'AM', 'Armenia', 'ARM', 51, 'AMD', 'Armenian Dram', '+374', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(9, 'AU', 'Australia', 'AUS', 36, 'AUD', 'Australian Dollar', '+61', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(10, 'AT', 'Austria', 'AUT', 40, 'EUR', 'Euro', '+43', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-29 01:25:32', NULL, 1, 1),
(11, 'AZ', 'Azerbaijan', 'AZE', 31, 'AZN', 'Azerbaijani Manat', '+994', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(12, 'BS', 'Bahamas', 'BHS', 44, 'BSD', 'Bahamian Dollar', '+1242', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(13, 'BH', 'Bahrain', 'BHR', 48, 'BHD', 'Bahraini Dinar', '+973', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(14, 'BD', 'Bangladesh', 'BGD', 50, 'BDT', 'Bangladeshi Taka', '+880', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(15, 'BB', 'Barbados', 'BRB', 52, 'BBD', 'Barbadian Dollar', '+1246', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(16, 'BY', 'Belarus', 'BLR', 112, 'BYN', 'Belarusian Ruble', '+375', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(17, 'BE', 'Belgium', 'BEL', 56, 'EUR', 'Euro', '+32', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(18, 'BZ', 'Belize', 'BLZ', 84, 'BZD', 'Belize Dollar', '+501', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(19, 'BJ', 'Benin', 'BEN', 204, 'XOF', 'West African CFA Franc', '+229', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(20, 'BT', 'Bhutan', 'BTN', 64, 'BTN', 'Bhutanese Ngultrum', '+975', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(21, 'BO', 'Bolivia', 'BOL', 68, 'BOB', 'Bolivian Boliviano', '+591', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(22, 'BA', 'Bosnia and Herzegovina', 'BIH', 70, 'BAM', 'Bosnia-Herzegovina Convertible Mark', '+387', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(23, 'BW', 'Botswana', 'BWA', 72, 'BWP', 'Botswana Pula', '+267', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(24, 'BR', 'Brazil', 'BRA', 76, 'BRL', 'Brazilian Real', '+55', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(25, 'BN', 'Brunei Darussalam', 'BRN', 96, 'BND', 'Brunei Dollar', '+673', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(26, 'BG', 'Bulgaria', 'BGR', 100, 'BGN', 'Bulgarian Lev', '+359', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(27, 'BF', 'Burkina Faso', 'BFA', 854, 'XOF', 'West African CFA Franc', '+226', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(28, 'BI', 'Burundi', 'BDI', 108, 'BIF', 'Burundian Franc', '+257', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(29, 'CV', 'Cabo Verde', 'CPV', 132, 'CVE', 'Cape Verdean Escudo', '+238', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(30, 'KH', 'Cambodia', 'KHM', 116, 'KHR', 'Cambodian Riel', '+855', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(31, 'CM', 'Cameroon', 'CMR', 120, 'XAF', 'Central African CFA Franc', '+237', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(32, 'CA', 'Canada', 'CAN', 124, 'CAD', 'Canadian Dollar', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(33, 'CF', 'Central African Republic', 'CAF', 140, 'XAF', 'Central African CFA Franc', '+236', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(34, 'TD', 'Chad', 'TCD', 148, 'XAF', 'Central African CFA Franc', '+235', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(35, 'CL', 'Chile', 'CHL', 152, 'CLP', 'Chilean Peso', '+56', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(36, 'CN', 'China', 'CHN', 156, 'CNY', 'Chinese Yuan', '+86', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(37, 'CO', 'Colombia', 'COL', 170, 'COP', 'Colombian Peso', '+57', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(38, 'KM', 'Comoros', 'COM', 174, 'KMF', 'Comorian Franc', '+269', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(39, 'CD', 'Congo (Democratic Republic of the)', 'COD', 180, 'CDF', 'Congolese Franc', '+243', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(40, 'CG', 'Congo (Republic of the)', 'COG', 178, 'XAF', 'Central African CFA Franc', '+242', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(41, 'CR', 'Costa Rica', 'CRI', 188, 'CRC', 'Costa Rican Colón', '+506', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(42, 'HR', 'Croatia', 'HRV', 191, 'HRK', 'Croatian Kuna', '+385', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(43, 'CU', 'Cuba', 'CUB', 192, 'CUP', 'Cuban Peso', '+53', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(44, 'CY', 'Cyprus', 'CYP', 196, 'EUR', 'Euro', '+357', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(45, 'CZ', 'Czech Republic', 'CZE', 203, 'CZK', 'Czech Koruna', '+420', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(46, 'DK', 'Denmark', 'DNK', 208, 'DKK', 'Danish Krone', '+45', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(47, 'DJ', 'Djibouti', 'DJI', 262, 'DJF', 'Djiboutian Franc', '+253', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(48, 'DM', 'Dominica', 'DMA', 212, 'XCD', 'East Caribbean Dollar', '+1767', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(49, 'DO', 'Dominican Republic', 'DOM', 214, 'DOP', 'Dominican Peso', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(50, 'EC', 'Ecuador', 'ECU', 218, 'USD', 'United States Dollar', '+593', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(51, 'EG', 'Egypt', 'EGY', 818, 'EGP', 'Egyptian Pound', '+20', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(52, 'SV', 'El Salvador', 'SLV', 222, 'USD', 'United States Dollar', '+503', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(53, 'GQ', 'Equatorial Guinea', 'GNQ', 226, 'XAF', 'Central African CFA Franc', '+240', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(54, 'ER', 'Eritrea', 'ERI', 232, 'ERN', 'Nakfa', '+291', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(55, 'EE', 'Estonia', 'EST', 233, 'EUR', 'Euro', '+372', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(56, 'SW', 'Eswatini', 'SWZ', 748, 'SZL', 'Lilangeni', '+268', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(57, 'ET', 'Ethiopia', 'ETH', 231, 'ETB', 'Ethiopian Birr', '+251', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(58, 'FJ', 'Fiji', 'FJI', 242, 'FJD', 'Fijian Dollar', '+679', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(59, 'FI', 'Finland', 'FIN', 246, 'EUR', 'Euro', '+358', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(60, 'FR', 'France', 'FRA', 250, 'EUR', 'Euro', '+33', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(61, 'GA', 'Gabon', 'GAB', 266, 'XAF', 'Central African CFA Franc', '+241', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(62, 'GM', 'Gambia', 'GMB', 270, 'GMD', 'Gambian Dalasi', '+220', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(63, 'GE', 'Georgia', 'GEO', 268, 'GEL', 'Georgian Lari', '+995', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(64, 'DE', 'Germany', 'DEU', 276, 'EUR', 'Euro', '+49', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(65, 'GH', 'Ghana', 'GHA', 288, 'GHS', 'Ghanaian Cedi', '+233', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(66, 'GR', 'Greece', 'GRC', 300, 'EUR', 'Euro', '+30', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(67, 'GD', 'Grenada', 'GRD', 308, 'XCD', 'East Caribbean Dollar', '+1473', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(68, 'GT', 'Guatemala', 'GTM', 320, 'GTQ', 'Guatemalan Quetzal', '+502', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(69, 'GN', 'Guinea', 'GIN', 324, 'GNF', 'Guinean Franc', '+224', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(70, 'GW', 'Guinea-Bissau', 'GNB', 624, 'XOF', 'West African CFA Franc', '+245', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(71, 'GY', 'Guyana', 'GUY', 328, 'GYD', 'Guyanese Dollar', '+592', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(72, 'HT', 'Haiti', 'HTI', 332, 'HTG', 'Haitian Gourde', '+509', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(73, 'HN', 'Honduras', 'HND', 340, 'HNL', 'Honduran Lempira', '+504', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(74, 'HU', 'Hungary', 'HUN', 348, 'HUF', 'Hungarian Forint', '+36', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(75, 'IS', 'Iceland', 'ISL', 352, 'ISK', 'Icelandic Króna', '+354', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(76, 'IN', 'India', 'IND', 356, 'INR', 'Indian Rupee', '+91', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(77, 'ID', 'Indonesia', 'IDN', 360, 'IDR', 'Indonesian Rupiah', '+62', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(78, 'IR', 'Iran', 'IRN', 364, 'IRR', 'Iranian Rial', '+98', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(79, 'IQ', 'Iraq', 'IRQ', 368, 'IQD', 'Iraqi Dinar', '+964', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(80, 'IE', 'Ireland', 'IRL', 372, 'EUR', 'Euro', '+353', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(81, 'IL', 'Israel', 'ISR', 376, 'ILS', 'Israeli New Shekel', '+972', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(82, 'IT', 'Italy', 'ITA', 380, 'EUR', 'Euro', '+39', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(83, 'JM', 'Jamaica', 'JAM', 388, 'JMD', 'Jamaican Dollar', '+1876', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(84, 'JP', 'Japan', 'JPN', 392, 'JPY', 'Japanese Yen', '+81', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(85, 'JO', 'Jordan', 'JOR', 400, 'JOD', 'Jordanian Dinar', '+962', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(86, 'KZ', 'Kazakhstan', 'KAZ', 398, 'KZT', 'Kazakhstani Tenge', '+7', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(87, 'KE', 'Kenya', 'KEN', 404, 'KES', 'Kenyan Shilling', '+254', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(88, 'KI', 'Kiribati', 'KIR', 296, 'AUD', 'Australian Dollar', '+686', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(89, 'KP', 'North Korea', 'PRK', 408, 'KPW', 'North Korean Won', '+850', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(90, 'KR', 'South Korea', 'KOR', 410, 'KRW', 'South Korean Won', '+82', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(91, 'KW', 'Kuwait', 'KWT', 414, 'KWD', 'Kuwaiti Dinar', '+965', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(92, 'KG', 'Kyrgyzstan', 'KGZ', 417, 'KGS', 'Kyrgyzstani Som', '+996', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(93, 'LA', 'Laos', 'LAO', 418, 'LAK', 'Lao Kip', '+856', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(94, 'LV', 'Latvia', 'LVA', 428, 'EUR', 'Euro', '+371', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(95, 'LB', 'Lebanon', 'LBN', 422, 'LBP', 'Lebanese Pound', '+961', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(96, 'LS', 'Lesotho', 'LSO', 426, 'LSL', 'Lesotho Loti', '+266', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(97, 'LR', 'Liberia', 'LBR', 430, 'LRD', 'Liberian Dollar', '+231', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(98, 'LY', 'Libya', 'LBY', 434, 'LYD', 'Libyan Dinar', '+218', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(99, 'LI', 'Liechtenstein', 'LIE', 438, 'CHF', 'Swiss Franc', '+423', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(100, 'LT', 'Lithuania', 'LTU', 440, 'EUR', 'Euro', '+370', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(101, 'LU', 'Luxembourg', 'LUX', 442, 'EUR', 'Euro', '+352', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(102, 'MG', 'Madagascar', 'MDG', 450, 'MGA', 'Malagasy Ariary', '+261', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(103, 'MW', 'Malawi', 'MWI', 454, 'MWK', 'Malawian Kwacha', '+265', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(104, 'MY', 'Malaysia', 'MYS', 458, 'MYR', 'Malaysian Ringgit', '+60', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(105, 'MV', 'Maldives', 'MDV', 462, 'MVR', 'Maldivian Rufiyaa', '+960', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(106, 'ML', 'Mali', 'MLI', 466, 'XOF', 'West African CFA Franc', '+223', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(107, 'MT', 'Malta', 'MLT', 470, 'EUR', 'Euro', '+356', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(108, 'MH', 'Marshall Islands', 'MHL', 584, 'USD', 'United States Dollar', '+692', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(109, 'MQ', 'Martinique', 'MTQ', 474, 'EUR', 'Euro', '+596', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(110, 'MR', 'Mauritania', 'MRT', 478, 'MRU', 'Mauritanian Ouguiya', '+222', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(111, 'MU', 'Mauritius', 'MUS', 480, 'MUR', 'Mauritian Rupee', '+230', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(112, 'YT', 'Mayotte', 'MYT', 175, 'EUR', 'Euro', '+262', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(113, 'MX', 'Mexico', 'MEX', 484, 'MXN', 'Mexican Peso', '+52', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(114, 'FM', 'Micronesia', 'FSM', 583, 'USD', 'United States Dollar', '+691', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(115, 'MD', 'Moldova', 'MDA', 498, 'MDL', 'Moldovan Leu', '+373', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(116, 'MC', 'Monaco', 'MCO', 492, 'EUR', 'Euro', '+377', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(117, 'MN', 'Mongolia', 'MNG', 496, 'MNT', 'Mongolian Tögrög', '+976', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(118, 'ME', 'Montenegro', 'MNE', 499, 'EUR', 'Euro', '+382', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(119, 'MA', 'Morocco', 'MAR', 504, 'MAD', 'Moroccan Dirham', '+212', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(120, 'MZ', 'Mozambique', 'MOZ', 508, 'MZN', 'Mozambican Metical', '+258', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(121, 'MM', 'Myanmar', 'MMR', 104, 'MMK', 'Burmese Kyat', '+95', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(122, 'NA', 'Namibia', 'NAM', 516, 'NAD', 'Namibian Dollar', '+264', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(123, 'NR', 'Nauru', 'NRU', 520, 'AUD', 'Australian Dollar', '+674', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(124, 'NP', 'Nepal', 'NPL', 524, 'NPR', 'Nepalese Rupee', '+977', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(125, 'NL', 'Netherlands', 'NLD', 528, 'EUR', 'Euro', '+31', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(126, 'NZ', 'New Zealand', 'NZL', 554, 'NZD', 'New Zealand Dollar', '+64', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(127, 'NI', 'Nicaragua', 'NIC', 558, 'NIO', 'Nicaraguan Córdoba', '+505', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(128, 'NE', 'Niger', 'NER', 562, 'XOF', 'West African CFA Franc', '+227', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(129, 'NG', 'Nigeria', 'NGA', 566, 'NGN', 'Nigerian Naira', '+234', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(130, 'NU', 'Niue', 'NIU', 570, 'NZD', 'New Zealand Dollar', '+683', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(131, 'NF', 'Norfolk Island', 'NFK', 574, 'AUD', 'Australian Dollar', '+672', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(132, 'MP', 'Northern Mariana Islands', 'MNP', 580, 'USD', 'United States Dollar', '+1', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(133, 'NO', 'Norway', 'NOR', 578, 'NOK', 'Norwegian Krone', '+47', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(134, 'OM', 'Oman', 'OMN', 512, 'OMR', 'Omani Rial', '+968', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(135, 'PK', 'Pakistan', 'PAK', 586, 'PKR', 'Pakistani Rupee', '+92', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(136, 'PW', 'Palau', 'PLW', 585, 'USD', 'United States Dollar', '+680', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(137, 'PS', 'Palestine', 'PSE', 275, 'ILS', 'Israeli New Sheqel', '+970', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(138, 'PA', 'Panama', 'PAN', 591, 'PAB', 'Panamanian Balboa', '+507', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(139, 'PG', 'Papua New Guinea', 'PNG', 598, 'PGK', 'Papua New Guinean Kina', '+675', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(140, 'PY', 'Paraguay', 'PRY', 600, 'PYG', 'Paraguayan Guarani', '+595', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(141, 'PE', 'Peru', 'PER', 604, 'PEN', 'Peruvian Sol', '+51', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(142, 'PH', 'Philippines', 'PHL', 608, 'PHP', 'Philippine Peso', '+63', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(143, 'PN', 'Pitcairn', 'PCN', 612, 'NZD', 'New Zealand Dollar', '+64', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(144, 'PL', 'Poland', 'POL', 616, 'PLN', 'Polish Zloty', '+48', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(145, 'PT', 'Portugal', 'PRT', 620, 'EUR', 'Euro', '+351', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(146, 'PR', 'Puerto Rico', 'PRI', 630, 'USD', 'United States Dollar', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(147, 'QA', 'Qatar', 'QAT', 634, 'QAR', 'Qatari Rial', '+974', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(148, 'RE', 'Réunion', 'REU', 638, 'EUR', 'Euro', '+262', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(149, 'RO', 'Romania', 'ROU', 642, 'RON', 'Romanian Leu', '+40', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(150, 'RU', 'Russia', 'RUS', 643, 'RUB', 'Russian Ruble', '+7', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(151, 'RW', 'Rwanda', 'RWA', 646, 'RWF', 'Rwandan Franc', '+250', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(152, 'BL', 'Saint Barthélemy', 'BLM', 652, 'EUR', 'Euro', '+590', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(153, 'KN', 'Saint Kitts and Nevis', 'KNA', 659, 'XCD', 'East Caribbean Dollar', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(154, 'LC', 'Saint Lucia', 'LCA', 662, 'XCD', 'East Caribbean Dollar', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(155, 'MF', 'Saint Martin', 'MAF', 663, 'EUR', 'Euro', '+590', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(156, 'SX', 'Sint Maarten', 'SXM', 534, 'ANG', 'Netherlands Antillean Guilder', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(157, 'PM', 'Saint Pierre and Miquelon', 'SPM', 666, 'EUR', 'Euro', '+508', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(158, 'VC', 'Saint Vincent and the Grenadines', 'VCT', 670, 'XCD', 'East Caribbean Dollar', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(159, 'WS', 'Samoa', 'WSM', 882, 'WST', 'Samoan Tala', '+685', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(160, 'SM', 'San Marino', 'SMR', 674, 'EUR', 'Euro', '+378', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(161, 'ST', 'São Tomé and Príncipe', 'STP', 678, 'STN', 'São Tomé and Príncipe Dobra', '+239', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(162, 'SA', 'Saudi Arabia', 'SAU', 682, 'SAR', 'Saudi Riyal', '+966', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(163, 'SN', 'Senegal', 'SEN', 686, 'XOF', 'West African CFA Franc', '+221', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(164, 'RS', 'Serbia', 'SRB', 688, 'RSD', 'Serbian Dinar', '+381', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(165, 'SC', 'Seychelles', 'SYC', 690, 'SCR', 'Seychellois Rupee', '+248', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(166, 'SL', 'Sierra Leone', 'SLE', 694, 'SLL', 'Sierra Leonean Leone', '+232', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(167, 'SG', 'Singapore', 'SGP', 702, 'SGD', 'Singapore Dollar', '+65', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(168, 'SK', 'Slovakia', 'SVK', 703, 'EUR', 'Euro', '+421', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(169, 'SI', 'Slovenia', 'SVN', 705, 'EUR', 'Euro', '+386', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(170, 'SB', 'Solomon Islands', 'SLB', 90, 'AUD', 'Australian Dollar', '+677', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(171, 'SO', 'Somalia', 'SOM', 706, 'SOS', 'Somali Shilling', '+252', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(172, 'ZA', 'South Africa', 'ZAF', 710, 'ZAR', 'South African Rand', '+27', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(173, 'GS', 'South Georgia and the South Sandwich Islands', 'SGS', 239, 'GBP', 'British Pound Sterling', '+44', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(174, 'SS', 'South Sudan', 'SSD', 728, 'SSP', 'South Sudanese Pound', '+211', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(175, 'ES', 'Spain', 'ESP', 724, 'EUR', 'Euro', '+34', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(176, 'LK', 'Sri Lanka', 'LKA', 144, 'LKR', 'Sri Lankan Rupee', '+94', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(177, 'SD', 'Sudan', 'SDN', 729, 'SDG', 'Sudanese Pound', '+249', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(178, 'SR', 'Suriname', 'SUR', 740, 'SRD', 'Surinamese Dollar', '+597', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(179, 'SJ', 'Svalbard and Jan Mayen', 'SJM', 744, 'NOK', 'Norwegian Krone', '+47', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(180, 'SZ', 'Eswatini', 'SWZ', 748, 'SWL', 'Swazi Lilangeni', '+268', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(181, 'SE', 'Sweden', 'SWE', 752, 'SEK', 'Swedish Krona', '+46', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(182, 'CH', 'Switzerland', 'CHE', 756, 'CHF', 'Swiss Franc', '+41', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(183, 'SY', 'Syria', 'SYR', 760, 'SYP', 'Syrian Pound', '+963', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(184, 'TW', 'Taiwan', 'TWN', 158, 'TWD', 'New Taiwan Dollar', '+886', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(185, 'TJ', 'Tajikistan', 'TJK', 762, 'TJS', 'Tajikistani Somoni', '+992', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(186, 'TZ', 'Tanzania', 'TZA', 834, 'TZS', 'Tanzanian Shilling', '+255', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(187, 'TH', 'Thailand', 'THA', 764, 'THB', 'Thai Baht', '+66', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(188, 'TL', 'Timor-Leste', 'TLS', 626, 'USD', 'United States Dollar', '+670', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(189, 'TG', 'Togo', 'TGO', 768, 'XOF', 'West African CFA Franc', '+228', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(190, 'TK', 'Tokelau', 'TKL', 772, 'NZD', 'New Zealand Dollar', '+690', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(191, 'TO', 'Tonga', 'TON', 776, 'AUD', 'Australian Dollar', '+676', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(192, 'TT', 'Trinidad and Tobago', 'TTO', 780, 'TTD', 'Trinidad and Tobago Dollar', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(193, 'TN', 'Tunisia', 'TUN', 788, 'TND', 'Tunisian Dinar', '+216', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(194, 'TR', 'Turkey', 'TUR', 792, 'TRY', 'Turkish Lira', '+90', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(195, 'TM', 'Turkmenistan', 'TKM', 795, 'TMT', 'Turkmenistani Manat', '+993', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(196, 'TC', 'Turks and Caicos Islands', 'TCA', 796, 'USD', 'United States Dollar', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(197, 'TV', 'Tuvalu', 'TUV', 798, 'AUD', 'Australian Dollar', '+688', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(198, 'UG', 'Uganda', 'UGA', 800, 'UGX', 'Ugandan Shilling', '+256', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(199, 'UA', 'Ukraine', 'UKR', 804, 'UAH', 'Ukrainian Hryvnia', '+380', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(200, 'AE', 'United Arab Emirates', 'ARE', 784, 'AED', 'United Arab Emirates Dirham', '+971', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(201, 'GB', 'United Kingdom', 'GBR', 826, 'GBP', 'British Pound Sterling', '+44', 'Europe', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(202, 'US', 'United States', 'USA', 840, 'USD', 'United States Dollar', '+1', 'North America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(203, 'UY', 'Uruguay', 'URY', 858, 'UYU', 'Uruguayan Peso', '+598', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(204, 'UZ', 'Uzbekistan', 'UZB', 860, 'UZS', 'Uzbekistani Som', '+998', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(205, 'VU', 'Vanuatu', 'VUT', 548, 'AUD', 'Australian Dollar', '+678', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(206, 'VE', 'Venezuela', 'VEN', 862, 'VES', 'Venezuelan Bolívar', '+58', 'South America', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(207, 'VN', 'Vietnam', 'VNM', 704, 'VND', 'Vietnamese Dong', '+84', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(208, 'WF', 'Wallis and Futuna', 'WLF', 876, 'XPF', 'CFP Franc', '+681', 'Oceania', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(209, 'EH', 'Western Sahara', 'ESH', 732, 'MAD', 'Moroccan Dirham', '+212', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(210, 'YE', 'Yemen', 'YEM', 887, 'YER', 'Yemeni Rial', '+967', 'Asia', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(211, 'ZM', 'Zambia', 'ZMB', 894, 'ZMW', 'Zambian Kwacha', '+260', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(212, 'ZW', 'Zimbabwe', 'ZWE', 895, 'ZWL', 'Zimbabwean Dollar', '+263', 'Africa', 'active', '2024-10-21 05:52:16', '2024-10-21 05:52:16', NULL, 1, 1),
(213, 'dxi1mhmno0', 'Hamza Khan Pathan', 'AH', 2321233, '23nvbcnvcxn', 'hdfhdf3efsbdfbdxfngfngfn', '97', 'dfhdfhcn', 'active', '2024-10-22 01:58:41', '2024-10-22 03:40:14', '2024-10-22 03:40:14', 1, 1),
(214, 'hamza', 'Hamza', 'AH', 22, '23nvbcnvcxn', 'fbdxfbd', 'fsfvs', 'DSZfvv', 'active', '2024-10-29 01:15:09', '2024-10-29 01:15:22', '2024-10-29 01:15:22', 1, NULL);

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
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Awaiting Response from Vendor','Awaiting Response from Zolio','In Process','Awaiting Customer Confirmation','Pickup Scheduled','Completed','Cancelled','Closed') NOT NULL,
  `zolio_status` enum('Pending','In Process','Completed','Cancelled','Closed') DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `cgst` decimal(10,2) DEFAULT NULL,
  `sgst` decimal(10,2) DEFAULT NULL,
  `igst` decimal(10,2) DEFAULT NULL,
  `cgst_per` decimal(5,2) DEFAULT NULL,
  `sgst_per` decimal(5,2) DEFAULT NULL,
  `igst_per` decimal(5,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `payment_type` enum('voucher','exchange','Cash') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `user_id`, `category_id`, `sub_category_id`, `status`, `zolio_status`, `amount`, `cgst`, `sgst`, `igst`, `cgst_per`, `sgst_per`, `igst_per`, `sub_total`, `grand_total`, `barcode`, `payment_type`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 16, 1, 'Awaiting Response from Vendor', 'Pending', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_assigned`
--

CREATE TABLE `inquiry_assigned` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Pending','In Process','Completed','Cancelled','Closed') NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry_assigned`
--

INSERT INTO `inquiry_assigned` (`id`, `inquiry_id`, `user_id`, `status`, `amount`, `description`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 'Pending', 0.00, NULL, '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL),
(2, 1, 3, 'Pending', 0.00, NULL, '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_follow_up`
--

CREATE TABLE `inquiry_follow_up` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_assigned_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Pending','In Process','Completed','Cancelled') NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry_follow_up`
--

INSERT INTO `inquiry_follow_up` (`id`, `inquiry_id`, `inquiry_assigned_id`, `status`, `comment`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 'In Process', 'hyy2', '2024-11-21 00:11:03', '2024-11-21 00:13:39', '2024-11-21 00:13:39', 1, 1),
(2, 1, 1, 'In Process', '123', '2024-11-21 00:16:30', '2024-11-21 00:16:57', '2024-11-21 00:16:57', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_pickup`
--

CREATE TABLE `inquiry_pickup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_assigned_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_date` timestamp NULL DEFAULT NULL,
  `status` enum('Pending','In Process','Completed','Cancelled') NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry_pickup`
--

INSERT INTO `inquiry_pickup` (`id`, `user_id`, `inquiry_assigned_id`, `schedule_date`, `status`, `amount`, `description`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, '2024-11-27 18:30:00', 'Completed', 2323.00, 'hyyzxgxf', '2024-11-06 02:08:25', '2024-11-06 05:17:26', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_questions`
--

CREATE TABLE `inquiry_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text NOT NULL,
  `question_type` enum('mcq','brand','text','image','video','document','long_text','select','numeric') NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry_questions`
--

INSERT INTO `inquiry_questions` (`id`, `subcategory_id`, `question_text`, `question_type`, `options`, `status`, `sort_order`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'Hy Test New Question', 'mcq', '\"[\\\"hq111\\\",\\\"hq222\\\"]\"', 'active', 0, '2024-10-23 05:04:54', '2024-10-23 05:31:17', '2024-10-23 05:31:17', 1, 1),
(2, 3, 'hyy test 2', 'text', NULL, 'active', 0, '2024-10-23 05:20:31', '2024-10-28 08:25:21', '2024-10-28 08:25:21', 1, NULL),
(3, 1, 'hyy', 'video', NULL, 'inactive', 3, '2024-10-23 05:21:30', '2024-10-23 05:56:44', '2024-10-23 05:56:44', 1, NULL),
(4, 3, 'hello test update', 'text', NULL, 'active', 0, '2024-10-23 05:41:20', '2024-10-28 08:25:24', '2024-10-28 08:25:24', 1, 1),
(5, 3, 'Mcq Question 1', 'mcq', '\"[\\\"Option 1\\\",\\\"option 2\\\",\\\"Option 3\\\"]\"', 'active', 1, '2024-10-28 08:23:08', '2024-10-28 08:26:17', '2024-10-28 08:26:17', 1, NULL),
(6, 1, 'Upload Images', 'image', NULL, 'active', 7, '2024-10-28 08:26:41', '2024-10-28 08:26:41', NULL, 1, NULL),
(7, 1, 'Number of items', 'numeric', NULL, 'active', 2, '2024-10-28 08:27:16', '2024-10-28 08:27:16', NULL, 1, NULL),
(8, 1, 'Ton', 'select', '\"[\\\"0.5 Ton\\\",\\\"1 Ton\\\",\\\"1.5 Ton\\\",\\\"2 Ton\\\"]\"', 'active', 3, '2024-10-28 08:28:10', '2024-10-28 08:28:10', NULL, 1, NULL),
(9, 13, 'Brand', 'brand', NULL, 'active', 4, '2024-10-28 08:28:39', '2024-10-29 05:43:28', NULL, 1, 1),
(10, 1, 'Color', 'select', '\"[\\\"White\\\",\\\"Red\\\"]\"', 'active', 5, '2024-10-28 08:29:16', '2024-10-28 08:29:16', NULL, 1, NULL),
(11, 1, 'Is product working?', 'mcq', '\"[\\\"Yes\\\",\\\"No\\\"]\"', 'active', 6, '2024-10-28 08:29:50', '2024-10-28 08:29:50', NULL, 1, NULL),
(12, 1, 'Additional Notes', 'text', NULL, 'active', 1, '2024-10-28 08:30:22', '2024-10-28 08:30:22', NULL, 1, NULL),
(13, 13, 'demo', 'mcq', '\"[\\\"Mcq 1\\\",\\\"Mcq 2\\\",\\\"Mcq v3\\\"]\"', 'active', 2, '2024-11-11 06:00:12', '2024-11-11 06:00:28', NULL, 1, 1),
(14, 3, 'hyy', 'mcq', '\"[\\\"Demo 1\\\",\\\"Demo 2\\\",\\\"Demo3\\\",\\\"Demo 4\\\"]\"', 'active', 1, '2024-11-11 07:05:55', '2024-11-11 07:06:11', '2024-11-11 07:06:11', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_question_answers`
--

CREATE TABLE `inquiry_question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer_text` text DEFAULT NULL,
  `question_type` enum('mcq','brand','text','image','video','document','long_text','select','numeric') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry_question_answers`
--

INSERT INTO `inquiry_question_answers` (`id`, `inquiry_id`, `question_id`, `answer_text`, `question_type`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 7, '1', 'numeric', '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL),
(2, 1, 8, '0.5 Ton', 'select', '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL),
(3, 1, 9, 'LG', 'brand', '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL),
(4, 1, 10, 'White', 'select', '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL),
(5, 1, 11, 'Yes', 'mcq', '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL),
(6, 1, 12, 'A1 Condition Product', 'text', '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL),
(7, 1, 6, 'images/inquiry_answers/1730272018_umrah.png', 'image', '2024-10-30 01:36:58', '2024-10-30 01:36:58', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_valuation`
--

CREATE TABLE `inquiry_valuation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_assigned_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_date` timestamp NULL DEFAULT NULL,
  `status` enum('Pending','In Process','Completed','Cancelled') NOT NULL,
  `valuation_offer` enum('exchange','voucher','cash') NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiry_valuation`
--

INSERT INTO `inquiry_valuation` (`id`, `user_id`, `inquiry_assigned_id`, `schedule_date`, `status`, `valuation_offer`, `amount`, `description`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 3, 1, '2024-11-21 18:30:00', 'In Process', 'cash', 23223.00, 'dfdszdsz', '2024-11-06 04:16:10', '2024-11-06 04:57:52', NULL, 1, 1);

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

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"a90dff39-718a-4d5a-8cf7-6eba12ac18b5\",\"displayName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"command\":\"O:36:\\\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\\\":1:{s:14:\\\"\\u0000*\\u0000selectedIds\\\";a:2:{i:0;i:16;i:1;i:4;}}\"}}', 0, NULL, 1730181335, 1730181335),
(2, 'default', '{\"uuid\":\"434c4028-78da-451d-ad7e-31ca155f862a\",\"displayName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"command\":\"O:36:\\\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\\\":1:{s:14:\\\"\\u0000*\\u0000selectedIds\\\";a:1:{i:0;i:16;}}\"}}', 0, NULL, 1730181363, 1730181363),
(3, 'default', '{\"uuid\":\"277f2103-d9a0-409c-b743-8d153cebf889\",\"displayName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"command\":\"O:36:\\\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\\\":1:{s:14:\\\"\\u0000*\\u0000selectedIds\\\";a:3:{i:0;i:20;i:1;i:21;i:2;i:16;}}\"}}', 0, NULL, 1730181629, 1730181629),
(4, 'default', '{\"uuid\":\"96343ed3-ccff-4a4a-b6bd-0a5f2018b921\",\"displayName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"command\":\"O:36:\\\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\\\":1:{s:14:\\\"\\u0000*\\u0000selectedIds\\\";a:2:{i:0;i:20;i:1;i:21;}}\"}}', 0, NULL, 1730181643, 1730181643),
(5, 'default', '{\"uuid\":\"d970fc40-b6a4-4af1-ba02-bcc3caf20a64\",\"displayName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"command\":\"O:36:\\\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\\\":1:{s:10:\\\"\\u0000*\\u0000payload\\\";a:4:{s:6:\\\"_token\\\";s:40:\\\"0JQpAcpDlLG63KFOAMmkLb7z8Ul6xXP0FuE36i9Y\\\";s:6:\\\"submit\\\";s:6:\\\"delete\\\";s:23:\\\"common_datatable_length\\\";s:2:\\\"10\\\";s:10:\\\"Checkboxes\\\";a:3:{i:20;s:2:\\\"20\\\";i:21;s:2:\\\"21\\\";i:16;s:2:\\\"16\\\";}}}\"}}', 0, NULL, 1730181716, 1730181716),
(6, 'default', '{\"uuid\":\"39138c60-8a7e-4700-913a-59e42889c58b\",\"displayName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"command\":\"O:36:\\\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\\\":1:{s:10:\\\"\\u0000*\\u0000payload\\\";a:4:{s:6:\\\"_token\\\";s:40:\\\"0JQpAcpDlLG63KFOAMmkLb7z8Ul6xXP0FuE36i9Y\\\";s:6:\\\"submit\\\";s:6:\\\"delete\\\";s:23:\\\"common_datatable_length\\\";s:2:\\\"10\\\";s:10:\\\"Checkboxes\\\";a:3:{i:20;s:2:\\\"20\\\";i:21;s:2:\\\"21\\\";i:16;s:2:\\\"16\\\";}}}\"}}', 0, NULL, 1730181764, 1730181764),
(7, 'default', '{\"uuid\":\"e0f38765-6037-4b00-9a1d-24e10488c17f\",\"displayName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"command\":\"O:36:\\\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\\\":1:{s:14:\\\"\\u0000*\\u0000selectedIds\\\";a:3:{i:0;i:20;i:1;i:21;i:2;i:16;}}\"}}', 0, NULL, 1730181868, 1730181868),
(8, 'default', '{\"uuid\":\"bdbf177b-0273-4d7e-837c-f8bd487cb0cf\",\"displayName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"command\":\"O:36:\\\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\\\":1:{s:14:\\\"\\u0000*\\u0000selectedIds\\\";a:3:{i:0;i:20;i:1;i:21;i:2;i:16;}}\"}}', 0, NULL, 1730181965, 1730181965),
(9, 'default', '{\"uuid\":\"8bfc2bc0-8040-469e-9992-6c74db2ab56d\",\"displayName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\",\"command\":\"O:36:\\\"App\\\\Jobs\\\\Category\\\\DeleteManyCategory\\\":1:{s:10:\\\"\\u0000*\\u0000payload\\\";a:4:{s:6:\\\"_token\\\";s:40:\\\"0JQpAcpDlLG63KFOAMmkLb7z8Ul6xXP0FuE36i9Y\\\";s:6:\\\"submit\\\";s:6:\\\"delete\\\";s:23:\\\"common_datatable_length\\\";s:2:\\\"10\\\";s:10:\\\"Checkboxes\\\";a:3:{i:20;s:2:\\\"20\\\";i:21;s:2:\\\"21\\\";i:16;s:2:\\\"16\\\";}}}\"}}', 0, NULL, 1730182091, 1730182091);

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
(4, '2024_10_08_052117_add_status_to_users_table', 1),
(5, '2024_10_09_064807_create_permission_tables', 1),
(6, '2024_10_09_065327_add_fields_to_users_table', 1),
(7, '2024_10_10_114249_add_group_name_to_permissions_table', 1),
(8, '2024_10_15_062315_add_deleted_at_to_users_table', 1),
(9, '2024_10_20_094609_create_countries_table', 1),
(10, '2024_10_20_095233_create_states_table', 1),
(11, '2024_10_20_095506_create_cities_table', 1),
(12, '2024_10_20_095714_create_categories_table', 1),
(13, '2024_10_20_095921_create_sub_categories_table', 1),
(14, '2024_10_20_100144_create_brands_table', 1),
(15, '2024_10_20_100402_create_inquiry_questions_table', 1),
(16, '2024_10_20_100624_create_social_logins_table', 1),
(17, '2024_10_20_100910_create_notifications_table', 1),
(18, '2024_10_20_101119_create_inquiries_table', 1),
(19, '2024_10_20_101403_create_inquiry_question_answers_table', 1),
(20, '2024_10_20_101730_create_inquiry_assigned_table', 1),
(21, '2024_10_20_102105_create_inquiry_follow_up_table', 1),
(22, '2024_10_20_102340_create_inquiry_valuation_table', 1),
(23, '2024_10_20_102606_create_inquiry_pickup_table', 1),
(24, '2024_10_20_103203_create_vouchers_table', 1),
(25, '2024_10_20_103539_create_products_table', 1),
(26, '2024_10_20_103823_create_product_questions_table', 1),
(27, '2024_10_20_104033_create_product_question_answers_table', 1),
(28, '2024_10_21_062950_add_city_name_to_cities_table', 2),
(29, '2024_10_21_065035_create_activity_log_table', 3),
(30, '2024_10_21_065258_add_event_to_activity_log_table', 4),
(31, '2024_10_21_144316_create_personal_access_tokens_table', 5),
(32, '2024_11_12_055839_add_google_id_to_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_method` enum('EMAIL','SMS','IN_APP','PUSH') NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `group_name` varchar(255) DEFAULT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `group_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view users', NULL, 'web', '2024-10-20 23:51:16', '2024-10-20 23:51:16'),
(2, 'create users', NULL, 'web', '2024-10-20 23:51:16', '2024-10-20 23:51:16'),
(3, 'edit users', NULL, 'web', '2024-10-20 23:51:16', '2024-10-20 23:51:16'),
(4, 'delete users', NULL, 'web', '2024-10-20 23:51:16', '2024-10-20 23:51:16');

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
(1, 'App\\Models\\User', 1, 'auth_token', '4b12d8434a41497a3fec4228c9466c4ec7736360a36d26ea0f07818ce56213b9', '[\"*\"]', '2024-11-04 06:17:00', NULL, '2024-10-21 09:13:27', '2024-11-04 06:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `stock_quantity` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `tags` varchar(255) DEFAULT NULL,
  `voucher_discount` decimal(10,2) DEFAULT NULL,
  `exchange_discount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `user_id`, `name`, `code`, `description`, `price`, `discount`, `stock_quantity`, `status`, `is_featured`, `tags`, `voucher_discount`, `exchange_discount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 27, 14, 1, 1, 'LG 32 Inch TV', 'testing', 'Full HD and Smart TV', 12000.00, NULL, 12, 'active', 0, NULL, NULL, NULL, '2024-10-25 05:35:34', '2024-10-29 04:14:12', NULL),
(2, 27, 14, 2, 1, 'Sony TV 42 Inch', 'test-api', 'Ultra HD and Clear 4K', 45000.00, NULL, 23, 'active', 0, '#update', NULL, NULL, '2024-10-25 06:16:04', '2024-10-29 04:15:16', NULL),
(3, 27, 14, 1, 3, 'Admin', 'admin', 'hello', 2344.00, NULL, 12, 'active', 1, NULL, NULL, NULL, '2024-10-29 04:23:26', '2024-10-29 04:24:56', '2024-10-29 04:24:56'),
(8, 27, NULL, NULL, 1, 'LG TV', 'lg-tv', 'Smart TV', 12000.00, NULL, 2, 'active', 0, NULL, NULL, NULL, '2024-11-04 06:15:45', '2024-11-04 06:15:45', NULL),
(9, 27, 14, NULL, 1, 'LG TV', 'lg-tv-1', 'Smart TV', 12000.00, NULL, 2, 'active', 0, NULL, NULL, NULL, '2024-11-04 06:17:00', '2024-11-11 06:02:08', '2024-11-11 06:02:08'),
(10, 27, 14, 1, 1, 'Demo 1', 'demo-1', 'Demo test', 12000.00, 12.00, 23, 'active', 1, '#new', 10.00, 12.00, '2024-11-11 06:01:55', '2024-11-11 06:01:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_questions`
--

CREATE TABLE `product_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text NOT NULL,
  `question_type` enum('mcq','brand','text','image','video','document','long_text','select','numeric') NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `status` enum('active','inactive') NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_questions`
--

INSERT INTO `product_questions` (`id`, `subcategory_id`, `question_text`, `question_type`, `options`, `status`, `sort_order`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 14, 'Uplode Image', 'image', '\"[\\\"234\\\",\\\"223\\\",\\\"113\\\"]\"', 'active', 1, '2024-10-25 07:09:46', '2024-10-29 05:33:47', NULL, 1, 1),
(2, 14, 'Ton', 'select', '\"[\\\"0.5\\\",\\\"1.0\\\",\\\"1.5\\\",\\\"2.5\\\"]\"', 'active', 2, '2024-11-04 05:31:31', '2024-11-04 05:31:31', NULL, 1, NULL),
(3, 14, 'Brand', 'select', '\"[\\\"LG\\\",\\\"Panasonic\\\",\\\"Sony\\\",\\\"MI\\\"]\"', 'active', 3, '2024-11-04 05:32:40', '2024-11-04 05:32:40', NULL, 1, NULL),
(4, 14, 'Color', 'select', '\"[\\\"Black\\\",\\\"White\\\"]\"', 'active', 4, '2024-11-04 05:33:38', '2024-11-04 05:33:38', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_question_answers`
--

CREATE TABLE `product_question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer_text` text NOT NULL,
  `question_type` enum('mcq','brand','text','image','video','document','long_text','select','numeric') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_question_answers`
--

INSERT INTO `product_question_answers` (`id`, `product_id`, `question_id`, `answer_text`, `question_type`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 'Testing Product Question Answer Api', 'brand', '2024-10-27 23:56:40', '2024-10-27 23:56:40', NULL, 1, NULL),
(2, 1, 1, 'Testing Product Question Answer Api', 'brand', '2024-10-27 23:57:11', '2024-10-27 23:57:11', NULL, 1, NULL),
(3, 8, 2, '0.5', 'select', '2024-11-04 06:15:45', '2024-11-04 06:15:45', NULL, 1, NULL),
(4, 8, 3, 'LG', 'select', '2024-11-04 06:15:45', '2024-11-04 06:15:45', NULL, 1, NULL),
(5, 8, 4, 'Black', 'select', '2024-11-04 06:15:45', '2024-11-04 06:15:45', NULL, 1, NULL),
(6, 8, 1, 'assets/images/product_answers/1730720745_demo.png', 'image', '2024-11-04 06:15:45', '2024-11-04 06:15:45', NULL, 1, NULL),
(7, 9, 2, '0.5', 'select', '2024-11-04 06:17:00', '2024-11-04 06:17:00', NULL, 1, NULL),
(8, 9, 3, 'LG', 'select', '2024-11-04 06:17:00', '2024-11-04 06:17:00', NULL, 1, NULL),
(9, 9, 4, 'Black', 'select', '2024-11-04 06:17:01', '2024-11-04 06:17:01', NULL, 1, NULL),
(10, 9, 1, 'assets/images/product_answers/1730720821_demo.png', 'image', '2024-11-04 06:17:01', '2024-11-04 06:17:01', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-10-20 23:51:16', '2024-10-20 23:51:16'),
(2, 'Customer', 'web', '2024-10-20 23:51:16', '2024-10-20 23:51:16'),
(3, 'Logistic', 'web', '2024-10-20 23:51:16', '2024-10-20 23:51:16'),
(4, 'Product Specialist', 'web', '2024-10-20 23:51:16', '2024-10-20 23:51:16'),
(6, 'Vendor', 'web', '2024-11-11 06:10:45', '2024-11-11 06:10:45');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `social_logins`
--

CREATE TABLE `social_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` enum('GOOGLE','FACEBOOK') NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `refresh_token` varchar(255) DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_logins`
--

INSERT INTO `social_logins` (`id`, `user_id`, `provider`, `provider_user_id`, `access_token`, `refresh_token`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 6, 'GOOGLE', '100564727764438342557', 'ya29.a0AeDClZAsFahgUqFeVaUcFxitIV_yO4vSW9vbjiK943N5qYoafk7wVqvOd57z5U_x09ba2a4vtr9SymawL8b5YTlp4FlDz6SZchBlvZ7vPwuzSorSWRLXaOGXM5kyH89shqoLC6YHOqPwXUcIFGsWaELm5bSpEAP1KAaCgYKAQgSARMSFQHGX2MidHMpIgtCqo72nfHnFgklmA0169', NULL, '2024-11-12 06:24:47', '2024-11-12 04:20:47', '2024-11-12 05:24:48'),
(2, 7, 'FACEBOOK', '3437998209839910', 'EAA4MXPwwJgcBOzTMT8ujgdOxs3flRpz7sNPsDQW0B3H6HrD0jkRIHKOxOpGHCsmYkQmsFPwgnwsZAmAHfh81Grb8H6nZA7cfj4nUOseUkYNkJUFHZCYpRZC0rTktMxwQR0K8prZAweAcSQ1UUYdtjh5hU53auKYBPLucDZCBN9s62bHhb5AZCxY6VLnswJyGUrvkmF9iMFMO51vEmS5wCrCGCJL0BBVYsJ2IgMiEZApOQbUAsYX8Yap3', NULL, '2025-01-11 05:21:39', '2024-11-12 05:22:33', '2024-11-12 05:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 76, 'Andhra Pradesh', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(2, 76, 'Arunachal Pradesh', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(3, 76, 'Assam', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(4, 76, 'Bihar', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(5, 76, 'Chhattisgarh', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(6, 76, 'Goa', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(7, 76, 'Gujarat', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(8, 76, 'Haryana', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(9, 76, 'Himachal Pradesh', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(10, 76, 'Jharkhand', 'active', '2024-10-21 05:55:22', '2024-10-29 01:40:14', '2024-10-29 01:40:14', 1, 1),
(11, 76, 'Karnataka', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(12, 76, 'Kerala', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(13, 76, 'Madhya Pradesh', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(14, 76, 'Maharashtra', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(15, 76, 'Manipur', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(16, 76, 'Meghalaya', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(17, 76, 'Mizoram', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(18, 76, 'Nagaland', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(19, 76, 'Odisha', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(20, 76, 'Punjab', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(21, 76, 'Rajasthan', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(22, 76, 'Sikkim', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(23, 76, 'Tamil Nadu', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(24, 76, 'Telangana', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(25, 76, 'Tripura', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(26, 76, 'Uttar Pradesh', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(27, 76, 'Uttarakhand', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(28, 76, 'West Bengal', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(29, 76, 'Andaman and Nicobar Islands', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(30, 76, 'Chandigarh', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(31, 76, 'Dadra and Nagar Haveli and Daman and Diu', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(32, 76, 'Lakshadweep', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(33, 76, 'Delhi', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(34, 76, 'Puducherry', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(35, 76, 'Ladakh', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(36, 76, 'Jammu and Kashmir', 'active', '2024-10-21 05:55:22', '2024-10-21 05:55:22', NULL, 1, 1),
(37, 2, 'admin 12435', 'inactive', '2024-10-22 04:22:21', '2024-10-22 04:29:14', '2024-10-22 04:29:14', 1, 1),
(38, 1, 'new', 'inactive', '2024-10-22 05:37:26', '2024-10-22 05:37:43', '2024-10-22 05:37:43', 1, NULL),
(39, 2, 'admin', 'inactive', '2024-10-29 01:35:23', '2024-10-29 01:46:23', '2024-10-29 01:46:23', 1, NULL),
(40, 76, 'admin', 'inactive', '2024-10-29 01:45:38', '2024-10-29 01:45:48', '2024-10-29 01:45:48', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `code`, `description`, `image_url`, `status`, `sort_order`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`) VALUES
(1, 16, 'Ranger', '231', 'shaikh', NULL, 'active', 0, NULL, '2024-10-29 00:48:20', NULL, NULL, 1),
(2, 15, 'LG Computer', 'ln10hd5mvj', 'Sub Category description', NULL, 'active', 0, '2024-10-22 00:41:09', '2024-10-29 00:49:49', NULL, 1, 1),
(3, 3, 'Mikser Masin', 'itbkcta9hb', 'hyy', NULL, 'active', 0, '2024-10-22 00:43:57', '2024-10-29 00:48:58', NULL, 1, 1),
(13, 2, 'T Shirt', 't-shirt', 'hyy', NULL, 'active', 0, '2024-10-29 01:08:03', '2024-11-11 07:14:47', NULL, 1, 1),
(14, 27, 'TV', 'tv', 'Electronics Tv', NULL, 'active', 0, '2024-10-29 04:12:53', '2024-10-29 04:12:53', NULL, 1, NULL),
(15, 2, 'Bronz', 'bronz', 'hyy', NULL, 'active', 0, '2024-11-11 00:55:17', '2024-11-11 00:56:58', '2024-11-11 00:56:58', 1, NULL),
(16, 27, 'Fridge1', 'fridge', 'New Sub Category', NULL, 'active', 0, '2024-11-11 05:56:34', '2024-11-11 05:57:01', '2024-11-11 05:57:01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_nopad_ci NOT NULL DEFAULT 'active',
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `state_id` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_valid` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `role_id`, `dob`, `gender`, `profile_picture`, `state_id`, `city_id`, `deleted_at`, `mobile_number`, `otp`, `otp_valid`) VALUES
(1, 'Super Admin', 'admin@zolio.com', NULL, '$2y$12$941B698yPj812zvr2nnWz.OMXr8eI8yGuJ13n9ysoYlgzGwBE12EG', 'XE82sgyav5JdqAGLp0POpbuKIiST4WLt5kvjbtzcruR0JmPsgXeUUZcOnFW0', '2024-10-20 23:51:17', '2024-10-21 03:48:09', 'active', 1, '2002-02-18', 'male', 'images/user/1729492590_zoilo-high-resolution-logo-transparent (1).png', '7', '16', NULL, '9016946486', '123456', NULL),
(3, 'Hamza', 'hamza@gmail.com', NULL, '$2y$12$h6m30kIh5tda5dhVpNOB3.L2vfhT5Kbf2SPeOJteK.7eSWt32prKy', NULL, '2024-10-28 23:35:11', '2024-11-12 05:30:01', 'active', 4, '2002-02-18', 'male', 'images/user/1730178310_fegma.png', '3', '6', NULL, NULL, NULL, NULL),
(4, 'admin', 'bhavik@bcreative.in', NULL, '$2y$12$Xmc8Ui0/Gm8rH113Wk7.HuTkQycb/hFklMZOySk92tTHsi0CONpgK', NULL, '2024-10-29 01:09:38', '2024-10-29 01:09:48', 'active', 1, '2002-02-18', 'male', 'images/user/1730183978_fegma.png', '1', '2', '2024-10-29 01:09:48', NULL, NULL, NULL),
(5, 'Admin', 'admin3@gmail.com', NULL, '$2y$12$iSRohKRY1TGUGNvl1TB0oeITHm7DhZA4dlmCGHCNLg.r67l4tp7my', NULL, '2024-11-11 05:52:51', '2024-11-11 05:53:27', 'active', 1, '2002-02-18', 'male', 'images/user/1731324171_demo.png', '4', '8', '2024-11-11 05:53:27', NULL, NULL, NULL),
(6, 'MCA_1_B_45_Hamza', 'shaikh.mo.hamza18@gmail.com', NULL, '$2y$12$4OAHpg9VIIM2Ev0PfWASVee.IzWUq9gkqvJNMc5bE8c24/xjcrTeW', NULL, '2024-11-12 04:20:47', '2024-11-12 05:25:26', 'active', 3, '2002-02-18', 'male', 'images/user/1731408926_demo.png', '7', '17', NULL, NULL, NULL, NULL),
(7, 'Siraj Admani', 'hr@crazyboxstudio.com', NULL, '$2y$12$KP1Bv6SDQ2EKL4MyGTXJMODLI0QCzUDzFu1K9XlJ.D4N/lgRZJ3W.', NULL, '2024-11-12 05:22:33', '2024-11-12 05:33:55', 'active', 6, '2002-02-18', 'male', 'images/user/1731409435_copy.png', '6', '12', NULL, NULL, NULL, NULL),
(8, 'yahya', 'yahya@gmail.com', NULL, '$2y$12$941B698yPj812zvr2nnWz.OMXr8eI8yGuJ13n9ysoYlgzGwBE12EG', NULL, '2024-12-20 05:09:52', '2024-12-20 05:09:52', 'active', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_id` bigint(20) UNSIGNED DEFAULT NULL,
  `inquiry_assigned_id` bigint(20) UNSIGNED DEFAULT NULL,
  `inquiry_pickup_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `discount_type` enum('PERCENTAGE','FIXED') NOT NULL,
  `min_order_amount` decimal(10,2) DEFAULT NULL,
  `max_discount_amount` decimal(10,2) DEFAULT NULL,
  `valid_from` timestamp NULL DEFAULT NULL,
  `valid_until` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive','redeemed','expired') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_code_unique` (`code`),
  ADD KEY `brands_created_by_foreign` (`created_by`),
  ADD KEY `brands_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_code_unique` (`code`),
  ADD KEY `categories_created_by_foreign` (`created_by`),
  ADD KEY `categories_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`),
  ADD KEY `cities_state_id_foreign` (`state_id`),
  ADD KEY `cities_created_by_foreign` (`created_by`),
  ADD KEY `cities_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `countries_code_unique` (`code`),
  ADD KEY `countries_created_by_foreign` (`created_by`),
  ADD KEY `countries_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiries_user_id_foreign` (`user_id`),
  ADD KEY `inquiries_category_id_foreign` (`category_id`),
  ADD KEY `inquiries_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `inquiries_created_by_foreign` (`created_by`),
  ADD KEY `inquiries_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `inquiry_assigned`
--
ALTER TABLE `inquiry_assigned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiry_assigned_inquiry_id_foreign` (`inquiry_id`),
  ADD KEY `inquiry_assigned_user_id_foreign` (`user_id`),
  ADD KEY `inquiry_assigned_created_by_foreign` (`created_by`),
  ADD KEY `inquiry_assigned_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `inquiry_follow_up`
--
ALTER TABLE `inquiry_follow_up`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiry_follow_up_inquiry_id_foreign` (`inquiry_id`),
  ADD KEY `inquiry_follow_up_inquiry_assigned_id_foreign` (`inquiry_assigned_id`),
  ADD KEY `inquiry_follow_up_created_by_foreign` (`created_by`),
  ADD KEY `inquiry_follow_up_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `inquiry_pickup`
--
ALTER TABLE `inquiry_pickup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiry_pickup_user_id_foreign` (`user_id`),
  ADD KEY `inquiry_pickup_inquiry_assigned_id_foreign` (`inquiry_assigned_id`),
  ADD KEY `inquiry_pickup_created_by_foreign` (`created_by`),
  ADD KEY `inquiry_pickup_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `inquiry_questions`
--
ALTER TABLE `inquiry_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiry_questions_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `inquiry_questions_created_by_foreign` (`created_by`),
  ADD KEY `inquiry_questions_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `inquiry_question_answers`
--
ALTER TABLE `inquiry_question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiry_question_answers_inquiry_id_foreign` (`inquiry_id`),
  ADD KEY `inquiry_question_answers_question_id_foreign` (`question_id`),
  ADD KEY `inquiry_question_answers_created_by_foreign` (`created_by`),
  ADD KEY `inquiry_question_answers_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `inquiry_valuation`
--
ALTER TABLE `inquiry_valuation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquiry_valuation_user_id_foreign` (`user_id`),
  ADD KEY `inquiry_valuation_inquiry_assigned_id_foreign` (`inquiry_assigned_id`),
  ADD KEY `inquiry_valuation_created_by_foreign` (`created_by`),
  ADD KEY `inquiry_valuation_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_from_user_id_foreign` (`from_user_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `product_questions`
--
ALTER TABLE `product_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_questions_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `product_question_answers`
--
ALTER TABLE `product_question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_question_answers_product_id_foreign` (`product_id`),
  ADD KEY `product_question_answers_question_id_foreign` (`question_id`);

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
-- Indexes for table `social_logins`
--
ALTER TABLE `social_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_logins_user_id_foreign` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`),
  ADD KEY `states_created_by_foreign` (`created_by`),
  ADD KEY `states_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_code_unique` (`code`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_categories_created_by_foreign` (`created_by`),
  ADD KEY `sub_categories_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`),
  ADD KEY `vouchers_inquiry_id_foreign` (`inquiry_id`),
  ADD KEY `vouchers_inquiry_assigned_id_foreign` (`inquiry_assigned_id`),
  ADD KEY `vouchers_inquiry_pickup_id_foreign` (`inquiry_pickup_id`),
  ADD KEY `vouchers_created_by_foreign` (`created_by`),
  ADD KEY `vouchers_updated_by_foreign` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiry_assigned`
--
ALTER TABLE `inquiry_assigned`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiry_follow_up`
--
ALTER TABLE `inquiry_follow_up`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inquiry_pickup`
--
ALTER TABLE `inquiry_pickup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiry_questions`
--
ALTER TABLE `inquiry_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inquiry_question_answers`
--
ALTER TABLE `inquiry_question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inquiry_valuation`
--
ALTER TABLE `inquiry_valuation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_questions`
--
ALTER TABLE `product_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_question_answers`
--
ALTER TABLE `product_question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_logins`
--
ALTER TABLE `social_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `brands_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cities_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cities_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `countries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiries_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inquiry_assigned`
--
ALTER TABLE `inquiry_assigned`
  ADD CONSTRAINT `inquiry_assigned_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiry_assigned_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiry_assigned_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiry_assigned_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inquiry_follow_up`
--
ALTER TABLE `inquiry_follow_up`
  ADD CONSTRAINT `inquiry_follow_up_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiry_follow_up_inquiry_assigned_id_foreign` FOREIGN KEY (`inquiry_assigned_id`) REFERENCES `inquiry_assigned` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiry_follow_up_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiry_follow_up_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inquiry_pickup`
--
ALTER TABLE `inquiry_pickup`
  ADD CONSTRAINT `inquiry_pickup_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiry_pickup_inquiry_assigned_id_foreign` FOREIGN KEY (`inquiry_assigned_id`) REFERENCES `inquiry_assigned` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiry_pickup_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiry_pickup_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inquiry_questions`
--
ALTER TABLE `inquiry_questions`
  ADD CONSTRAINT `inquiry_questions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiry_questions_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiry_questions_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inquiry_question_answers`
--
ALTER TABLE `inquiry_question_answers`
  ADD CONSTRAINT `inquiry_question_answers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiry_question_answers_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiry_question_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `inquiry_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiry_question_answers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `inquiry_valuation`
--
ALTER TABLE `inquiry_valuation`
  ADD CONSTRAINT `inquiry_valuation_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiry_valuation_inquiry_assigned_id_foreign` FOREIGN KEY (`inquiry_assigned_id`) REFERENCES `inquiry_assigned` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquiry_valuation_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `inquiry_valuation_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_from_user_id_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_questions`
--
ALTER TABLE `product_questions`
  ADD CONSTRAINT `product_questions_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_question_answers`
--
ALTER TABLE `product_question_answers`
  ADD CONSTRAINT `product_question_answers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_question_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `product_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_logins`
--
ALTER TABLE `social_logins`
  ADD CONSTRAINT `social_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `states_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `states_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sub_categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vouchers_inquiry_assigned_id_foreign` FOREIGN KEY (`inquiry_assigned_id`) REFERENCES `inquiry_assigned` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vouchers_inquiry_id_foreign` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vouchers_inquiry_pickup_id_foreign` FOREIGN KEY (`inquiry_pickup_id`) REFERENCES `inquiry_pickup` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `vouchers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

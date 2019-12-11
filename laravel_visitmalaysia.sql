-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2019 at 04:19 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_visitmalaysia`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`, `image`, `tag_icon`) VALUES
(1, NULL, 1, 'What’s On', 'whats-on', '2019-10-11 06:45:44', '2019-10-14 09:40:23', 'categories\\October2019\\xBlLWyw9ylcuGiBUyKtB.jpg', 'categories\\October2019\\LfNCSx20xdPEh1tuRmu8.png'),
(2, NULL, 1, 'Kids & Families', 'kids-and-families', '2019-10-11 06:45:44', '2019-10-14 09:41:07', 'categories\\October2019\\Xd4VvpvBZsqmSRFtSdsg.jpg', 'categories\\October2019\\ntidFyFhf404IwYpCQDC.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 1, 1, 1, 1, 1, '{}', 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 0, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '{}', 2),
(31, 5, 'category_id', 'text', 'Category', 0, 0, 1, 1, 1, 0, '{}', 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 0, 0, 1, 1, 1, 1, '{}', 8),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '{}', 9),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}},{\"name\":\"tile\",\"crop\":{\"width\":\"240\",\"height\":\"240\"}}]}', 10),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 11),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 12),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 13),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 14),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 15),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 16),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, '{}', 17),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, '{}', 18),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, '{}', 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 0, 0, 1, 1, 1, 1, '{}', 4),
(48, 6, 'body', 'text_area', 'Body', 0, 0, 1, 1, 1, 1, '{}', 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, '{}', 12),
(56, 4, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{}', 8),
(57, 4, 'tag_icon', 'image', 'Tag Icon', 0, 1, 1, 1, 1, 1, '{}', 9),
(58, 5, 'title_small', 'text', 'Title Small', 0, 0, 1, 1, 1, 1, '{}', 5),
(59, 5, 'tagline_title', 'text', 'Tagline Title', 0, 0, 1, 1, 1, 1, '{}', 6),
(60, 5, 'tagline_link', 'text', 'Tagline Link', 0, 0, 1, 1, 1, 1, '{}', 7),
(61, 8, 'id', 'number', 'Id', 1, 1, 1, 1, 1, 1, '{}', 1),
(62, 8, 'type', 'text', 'Type', 0, 1, 1, 1, 1, 1, '{}', 2),
(63, 8, 'title', 'text', 'Title', 0, 1, 1, 1, 1, 1, '{}', 3),
(64, 8, 'body', 'rich_text_box', 'Body', 0, 1, 1, 1, 1, 1, '{}', 4),
(65, 8, 'style', 'text_area', 'Style', 0, 1, 1, 1, 1, 1, '{}', 5),
(66, 8, 'slug', 'text', 'Slug', 0, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:sections,slug\"}}', 6),
(67, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(68, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2019-10-11 06:45:29', '2019-10-11 06:45:29'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-10-11 06:45:29', '2019-10-11 06:45:29'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-10-11 06:45:29', '2019-10-11 06:45:29'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-10-11 06:45:42', '2019-10-15 05:23:08'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-10-11 06:45:44', '2019-10-14 10:00:25'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-10-11 06:45:47', '2019-11-27 07:12:19'),
(8, 'sections', 'sections', 'Section', 'Sections', NULL, 'App\\Section', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-10-16 07:06:03', '2019-10-16 07:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-10-11 06:45:31', '2019-10-11 06:45:31'),
(2, 'topbar_left', '2019-10-11 09:38:06', '2019-10-11 09:38:26'),
(3, 'main', '2019-10-11 10:01:41', '2019-10-11 10:01:41'),
(4, 'footer_1', '2019-12-02 05:13:30', '2019-12-02 05:15:15'),
(5, 'copyright_menu', '2019-12-02 05:47:32', '2019-12-02 05:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2019-10-11 06:45:31', '2019-10-11 06:45:31', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 4, '2019-10-11 06:45:31', '2019-10-16 07:06:28', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2019-10-11 06:45:31', '2019-10-11 06:45:31', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2019-10-11 06:45:31', '2019-10-11 06:45:31', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2019-10-11 06:45:31', '2019-10-16 07:06:34', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2019-10-11 06:45:32', '2019-10-16 07:06:29', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2019-10-11 06:45:32', '2019-10-16 07:06:29', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2019-10-11 06:45:32', '2019-10-16 07:06:29', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2019-10-11 06:45:32', '2019-10-16 07:06:29', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 10, '2019-10-11 06:45:32', '2019-10-16 07:06:35', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2019-10-11 06:45:43', '2019-10-16 07:06:34', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 5, '2019-10-11 06:45:46', '2019-10-16 07:06:28', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 6, '2019-10-11 06:45:48', '2019-10-16 07:06:28', 'voyager.pages.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2019-10-11 06:45:51', '2019-10-16 07:06:29', 'voyager.hooks', NULL),
(15, 2, 'Visit Malaysia', '/', '_self', NULL, '#000000', NULL, 15, '2019-10-11 09:39:19', '2019-10-11 09:46:00', NULL, ''),
(16, 2, 'Business In Malaysia', '#', '_self', NULL, '#000000', NULL, 16, '2019-10-11 09:42:26', '2019-10-11 09:42:26', NULL, ''),
(17, 3, 'Home', '/', '_self', NULL, '#000000', NULL, 17, '2019-10-11 10:01:56', '2019-10-11 10:01:56', NULL, ''),
(18, 1, 'Sections', '', '_self', NULL, NULL, NULL, 7, '2019-10-16 07:06:04', '2019-10-16 07:06:34', 'voyager.sections.index', NULL),
(19, 4, 'A Story Takes Flight', '#', '_self', NULL, '#000000', NULL, 18, '2019-12-02 05:14:11', '2019-12-02 05:14:11', NULL, ''),
(20, 4, 'What\'s on', '#', '_self', NULL, '#000000', NULL, 19, '2019-12-02 05:14:28', '2019-12-02 05:14:28', NULL, ''),
(21, 4, 'Family Holidays', '#', '_self', NULL, '#000000', NULL, 20, '2019-12-02 05:14:52', '2019-12-02 05:14:52', NULL, ''),
(22, 5, 'Contact Us', '#', '_self', NULL, '#000000', NULL, 21, '2019-12-02 05:47:48', '2019-12-02 05:47:48', NULL, ''),
(23, 5, 'Sitemap', '#', '_self', NULL, '#000000', NULL, 22, '2019-12-02 05:47:59', '2019-12-02 05:47:59', NULL, ''),
(24, 5, 'Privacy Policy', '#', '_self', NULL, '#000000', NULL, 23, '2019-12-02 05:48:13', '2019-12-02 05:48:13', NULL, ''),
(25, 5, 'Terms of Use', '#', '_self', NULL, '#000000', NULL, 24, '2019-12-02 05:48:30', '2019-12-02 05:48:30', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2016_01_01_000000_create_pages_table', 2),
(25, '2016_01_01_000000_create_posts_table', 2),
(26, '2016_02_15_204651_create_categories_table', 2),
(27, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<div class=\"row\">\r\n            <div class=\"col-sm-12 ui-resizable\" data-type=\"container-content\"><div data-type=\"component-text\">\r\n<div class=\"page-header\">\r\n<h1 style=\"margin-bottom: 30px; font-size: 50px;\"><b class=\"text-uppercase\">Cras justo odio</b> <small>Donec id elit non mi</small></h1>\r\n\r\n<p class=\"lead\"><em>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</em></p>\r\n</div>\r\n</div>\r\n</div>\r\n        </div><div class=\"row\">\r\n        <div class=\"col-sm-3 ui-resizable\" data-type=\"container-content\"><div data-type=\"component-text\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro labore architecto fuga tempore omnis aliquid, rerum numquam deleniti ipsam earum velit aliquam deserunt, molestiae officiis mollitia accusantium suscipit fugiat esse magnam eaque cumque, iste corrupti magni? Illo dicta saepe, maiores fugit aliquid consequuntur aut, rem ex iusto dolorem molestias obcaecati eveniet vel voluptatibus recusandae illum, voluptatem! Odit est possimus nesciunt.</p>\r\n</div>\r\n</div>\r\n        <div class=\"col-sm-3 ui-resizable\" data-type=\"container-content\"><div data-type=\"component-text\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro labore architecto fuga tempore omnis aliquid, rerum numquam deleniti ipsam earum velit aliquam deserunt, molestiae officiis mollitia accusantium suscipit fugiat esse magnam eaque cumque, iste corrupti magni? Illo dicta saepe, maiores fugit aliquid consequuntur aut, rem ex iusto dolorem molestias obcaecati eveniet vel voluptatibus recusandae illum, voluptatem! Odit est possimus nesciunt.</p>\r\n</div>\r\n</div>\r\n        <div class=\"col-sm-3 ui-resizable\" data-type=\"container-content\"><div data-type=\"component-text\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro labore architecto fuga tempore omnis aliquid, rerum numquam deleniti ipsam earum velit aliquam deserunt, molestiae officiis mollitia accusantium suscipit fugiat esse magnam eaque cumque, iste corrupti magni? Illo dicta saepe, maiores fugit aliquid consequuntur aut, rem ex iusto dolorem molestias obcaecati eveniet vel voluptatibus recusandae illum, voluptatem! Odit est possimus nesciunt.</p>\r\n</div>\r\n</div>\r\n        <div class=\"col-sm-3 ui-resizable\" data-type=\"container-content\"><div data-type=\"component-text\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro labore architecto fuga tempore omnis aliquid, rerum numquam deleniti ipsam earum velit aliquam deserunt, molestiae officiis mollitia accusantium suscipit fugiat esse magnam eaque cumque, iste corrupti magni? Illo dicta saepe, maiores fugit aliquid consequuntur aut, rem ex iusto dolorem molestias obcaecati eveniet vel voluptatibus recusandae illum, voluptatem! Odit est possimus nesciunt.</p>\r\n</div>\r\n</div>\r\n    </div>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2019-10-11 06:45:48', '2019-11-28 20:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-10-11 06:45:32', '2019-10-11 06:45:32'),
(2, 'browse_bread', NULL, '2019-10-11 06:45:32', '2019-10-11 06:45:32'),
(3, 'browse_database', NULL, '2019-10-11 06:45:32', '2019-10-11 06:45:32'),
(4, 'browse_media', NULL, '2019-10-11 06:45:32', '2019-10-11 06:45:32'),
(5, 'browse_compass', NULL, '2019-10-11 06:45:32', '2019-10-11 06:45:32'),
(6, 'browse_menus', 'menus', '2019-10-11 06:45:32', '2019-10-11 06:45:32'),
(7, 'read_menus', 'menus', '2019-10-11 06:45:32', '2019-10-11 06:45:32'),
(8, 'edit_menus', 'menus', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(9, 'add_menus', 'menus', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(10, 'delete_menus', 'menus', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(11, 'browse_roles', 'roles', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(12, 'read_roles', 'roles', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(13, 'edit_roles', 'roles', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(14, 'add_roles', 'roles', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(15, 'delete_roles', 'roles', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(16, 'browse_users', 'users', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(17, 'read_users', 'users', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(18, 'edit_users', 'users', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(19, 'add_users', 'users', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(20, 'delete_users', 'users', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(21, 'browse_settings', 'settings', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(22, 'read_settings', 'settings', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(23, 'edit_settings', 'settings', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(24, 'add_settings', 'settings', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(25, 'delete_settings', 'settings', '2019-10-11 06:45:33', '2019-10-11 06:45:33'),
(26, 'browse_categories', 'categories', '2019-10-11 06:45:43', '2019-10-11 06:45:43'),
(27, 'read_categories', 'categories', '2019-10-11 06:45:43', '2019-10-11 06:45:43'),
(28, 'edit_categories', 'categories', '2019-10-11 06:45:43', '2019-10-11 06:45:43'),
(29, 'add_categories', 'categories', '2019-10-11 06:45:43', '2019-10-11 06:45:43'),
(30, 'delete_categories', 'categories', '2019-10-11 06:45:43', '2019-10-11 06:45:43'),
(31, 'browse_posts', 'posts', '2019-10-11 06:45:46', '2019-10-11 06:45:46'),
(32, 'read_posts', 'posts', '2019-10-11 06:45:46', '2019-10-11 06:45:46'),
(33, 'edit_posts', 'posts', '2019-10-11 06:45:46', '2019-10-11 06:45:46'),
(34, 'add_posts', 'posts', '2019-10-11 06:45:46', '2019-10-11 06:45:46'),
(35, 'delete_posts', 'posts', '2019-10-11 06:45:46', '2019-10-11 06:45:46'),
(36, 'browse_pages', 'pages', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(37, 'read_pages', 'pages', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(38, 'edit_pages', 'pages', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(39, 'add_pages', 'pages', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(40, 'delete_pages', 'pages', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(41, 'browse_hooks', NULL, '2019-10-11 06:45:51', '2019-10-11 06:45:51'),
(42, 'browse_sections', 'sections', '2019-10-16 07:06:04', '2019-10-16 07:06:04'),
(43, 'read_sections', 'sections', '2019-10-16 07:06:04', '2019-10-16 07:06:04'),
(44, 'edit_sections', 'sections', '2019-10-16 07:06:04', '2019-10-16 07:06:04'),
(45, 'add_sections', 'sections', '2019-10-16 07:06:04', '2019-10-16 07:06:04'),
(46, 'delete_sections', 'sections', '2019-10-16 07:06:04', '2019-10-16 07:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `title_small`, `tagline_title`, `tagline_link`) VALUES
(5, 1, 1, 'What’s on this October', NULL, 'There are more things to do than hours in a day as Dubai ramps into peak event season this October. The city shifts gears from summer R&R to sports frenzy with the Dubai Fitness Challenge, and that’s just the start. From award-winning performances at Dubai Opera to celebrity sightings, here are the top events in Dubai this October.', '<p>There are more things to do than hours in a day as Dubai ramps into peak event season this October. The city shifts gears from summer R&amp;R to sports frenzy with the Dubai Fitness Challenge, and that&rsquo;s just the start. From award-winning performances at Dubai Opera to celebrity sightings, here are the top events in Dubai this October.</p>', 'posts\\October2019\\mw038qtfhg9jYUbLYh8c.jpg', 'what-s-on-this-october', NULL, NULL, 'PUBLISHED', 0, '2019-10-14 09:55:06', '2019-10-15 06:18:16', 'High-action entertainment awaits', NULL, NULL),
(6, 1, 1, 'New in town', NULL, 'Dubai continues to surprise and amaze with a stream of new attractions and world-class developments that are fast becoming part of the city’s must-visit list. If you’re an adventure seeker eager to ride the longest urban zipline in the world, a fashion aficionado or a lover of the performance arts, Dubai has something new to offer. Browse our list of the latest attractions in Dubai.', '<p>Dubai continues to surprise and amaze with a stream of new attractions and world-class developments that are fast becoming part of the city&rsquo;s must-visit list. If you&rsquo;re an adventure seeker eager to ride the longest urban zipline in the world, a fashion aficionado or a lover of the performance arts, Dubai has something new to offer. Browse our list of the latest attractions in Dubai.</p>', 'posts\\October2019\\tMR5rPgQqnOZTclmhk0w.jpg', 'new-in-town', NULL, NULL, 'PUBLISHED', 0, '2019-10-14 10:00:36', '2019-10-14 10:00:36', 'Explore the city\'s latest launches on your holiday', 'Best Experiences in Dubai', '#'),
(7, 1, 1, 'Best Dubai locations for your next Instagram shot', NULL, 'With its heady mix of futuristic and traditional cityscapes, Dubai is a photographer’s dream. It’s also perfect for fashionistas with an eye for an unusual backdrop. Shop the latest looks, head to these stylish spots and snap a photo to share with your followers and friends. It’s time to get ready for your close-up.', '<p>With its heady mix of futuristic and traditional cityscapes, Dubai is a photographer&rsquo;s dream. It&rsquo;s also perfect for fashionistas with an eye for an unusual backdrop. Shop the latest looks, head to these stylish spots and snap a photo to share with your followers and friends. It&rsquo;s time to get ready for your close-up.</p>\r\n<p>[category_grid]Hello world[/category_grid]</p>\r\n<p>&nbsp;</p>', 'posts\\October2019\\TooO2nYFgMY6SOxyP1qe.jpg', 'best-dubai-locations-for-your-next-instagram-shot', NULL, NULL, 'PUBLISHED', 0, '2019-10-14 10:02:41', '2019-10-16 06:31:56', 'Turn your Instagram feed into a fashion statement', NULL, NULL),
(8, 1, 2, 'A Guide To The Top Rides and Attractions in Dubai', NULL, 'A Guide To The Top Rides and Attractions in Dubai', '<p>A Guide To The Top Rides and Attractions in Dubai</p>', 'posts\\October2019\\PLnkjM0Kmg9rNqgEnmeF.jpg', 'a-guide-to-the-top-rides-and-attractions-in-dubai', NULL, NULL, 'PUBLISHED', 0, '2019-10-16 10:16:21', '2019-10-16 10:16:21', 'Thrills and spills', 'Entertainment & The Arts', '#');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-10-11 06:45:32', '2019-10-11 06:45:32'),
(2, 'user', 'Normal User', '2019-10-11 06:45:32', '2019-10-11 06:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci,
  `style` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Visit Malaysia', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Official Malaysia Tourism and Visitor information guide', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', 'settings\\October2019\\eCotBZ1tzFl3j9iA5fnj.jpg', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Visit Malaysia', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Official Malaysia Tourism and Visitor information guide', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', 'settings\\October2019\\jBxiBxu7J9DMCbdIwvNp.jpg', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(11, 'site.social_twitter', 'Twitter Link', '#', NULL, 'text', 6, 'Site'),
(12, 'site.social_facebook', 'Facebook Link', '#', NULL, 'text', 7, 'Site'),
(13, 'site.social_instagram', 'Instagram Link', '#', NULL, 'text', 8, 'Site'),
(14, 'site.social_youtube', 'Youtube Link', '#', NULL, 'text', 9, 'Site'),
(15, 'site.social_trip_advisor', 'Trip Advisor', '#', NULL, 'text', 10, 'Site'),
(16, 'site.social_pinterest', 'Pinterest Link', '#', NULL, 'text', 11, 'Site'),
(17, 'site.footer_logo', 'Footer Logo', 'settings\\December2019\\2GF49eWFleyqhfP7igSK.jpg', NULL, 'image', 12, 'Site'),
(18, 'site.copyright_text', 'Copyright Text', '<p>Copyright © 2019. This site is maintained by Malaysia Corporation of Tourism &amp; Commerce Marketing.</p><p>Site last updated [30/11/2019]</p>', NULL, 'text', 13, 'Site');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-10-11 06:45:48', '2019-10-11 06:45:48'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-10-11 06:45:49', '2019-10-11 06:45:49'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2019-10-11 06:45:50', '2019-10-11 06:45:50'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2019-10-11 06:45:50', '2019-10-11 06:45:50'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-10-11 06:45:50', '2019-10-11 06:45:50'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-10-11 06:45:50', '2019-10-11 06:45:50'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-10-11 06:45:50', '2019-10-11 06:45:50'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-10-11 06:45:50', '2019-10-11 06:45:50'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-10-11 06:45:50', '2019-10-11 06:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Master', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$f6MIZKQsrfGoRxe09uUd7uJAgsO07DJXmy03ppwa.RsYAds9AJJt6', '7Hn60ximHni9vM32X49xTnCSmVAFXadYfUjBbyKxFneaWrHXlPy3dPNaIhkr', '{\"locale\":\"en\"}', '2019-10-11 06:45:44', '2019-10-14 06:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

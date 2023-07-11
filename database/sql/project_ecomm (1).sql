-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `attribute_sets`;
CREATE TABLE `attribute_sets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `attribute_sets` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1,	'color',	'color',	'2023-01-22 05:45:25',	'2023-01-22 05:45:25'),
(2,	'size',	'size',	'2023-01-22 05:47:25',	'2023-01-22 05:47:25'),
(3,	'model',	'model',	'2023-06-11 07:02:39',	'2023-06-11 07:02:39');

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_set_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `attributes` (`id`, `name`, `slug`, `attribute_set_id`, `created_at`, `updated_at`) VALUES
(1,	'red',	'red',	1,	'2023-01-22 05:46:53',	'2023-01-22 05:46:53'),
(2,	'green',	'green',	1,	'2023-01-22 05:46:53',	'2023-01-22 05:46:53'),
(3,	'yellow',	'yellow',	1,	'2023-01-22 05:46:53',	'2023-01-22 05:46:53'),
(4,	'M',	'm',	2,	'2023-01-22 05:47:50',	'2023-01-22 05:47:50'),
(5,	'XXL',	'xxl',	2,	'2023-01-22 05:47:50',	'2023-01-22 05:47:50'),
(6,	'L',	'l',	2,	'2023-01-22 05:47:51',	'2023-01-22 05:47:51'),
(7,	'first',	'first',	3,	'2023-06-11 07:02:58',	'2023-06-11 07:02:58'),
(8,	'second',	'second',	3,	'2023-06-11 07:02:58',	'2023-06-11 07:02:58');

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','deactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1,	'nike',	'nike',	'active',	'uploads/brands/SYm3SZf3CTov3KZbvugeIjLQauRLlpRdrnF9Qjqw.jpg',	'2023-01-15 08:28:03',	'2023-07-04 06:26:31'),
(2,	'Baxter Mckenzie',	'baxter-mckenzie',	'active',	'uploads/brands/zGAmZoy4ZSMX23r2Fm3GSOhEjUFJWAHMr1pp1yLv.png',	'2023-01-22 05:42:27',	'2023-01-22 05:42:27');

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int DEFAULT '0',
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_varient_id` int NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `ip`, `product_varient_id`, `qty`, `created_at`, `updated_at`) VALUES
(30,	1,	1,	NULL,	0,	1,	'2023-07-11 06:12:11',	'2023-07-11 06:12:11');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `section_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `name`, `slug`, `image`, `icon`, `discount`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1,	0,	1,	'men',	'men',	'uploads/categories/M9jCrJkDo5Djb15inMxAkozHPc4jcpKgEbln5sAR.jpg',	'uploads/categories/d3dJWfzDXfJa74OZT2S0sSxDe80rNMiuYJvb0ENB.jpg',	NULL,	NULL,	NULL,	NULL,	NULL,	'active',	'2023-01-15 08:19:24',	'2023-04-30 02:47:28'),
(2,	1,	1,	'shirts',	'shirts',	'uploads/categories/SBYGDzP6gU9RMBnoUf1yWF8DjsS5Jmi3efBO4fD3.jpg',	'uploads/categories/OkAN08lUT8QUsKx3L97AiRFIaB2lfc3iPowkQsZz.jpg',	NULL,	NULL,	NULL,	NULL,	NULL,	'active',	'2023-01-15 08:19:47',	'2023-06-20 11:34:07');

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `compares`;
CREATE TABLE `compares` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `coupon_option` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` enum('active','deactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `categories`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1,	'manual',	'COP12',	'[\"1\",\"2\"]',	'[\"1\"]',	'single_time',	'percentage',	50.00,	'2023-01-15',	'active',	'2023-01-15 08:34:58',	'2023-01-15 08:35:23'),
(2,	'manual',	'19-Sep-2004',	'[\"1\"]',	'[\"1\"]',	'single_time',	'percentage',	55.00,	'1995-08-13',	'active',	'2023-01-22 05:51:19',	'2023-01-22 05:51:19');

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate_def` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','deactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `currencies` (`id`, `name`, `symbol`, `image`, `exchange_rate`, `exchange_rate_def`, `status`, `created_at`, `updated_at`) VALUES
(1,	'INR',	'Rs.',	'',	'1',	'1',	'active',	NULL,	NULL),
(2,	'USD',	'$',	'',	'76.38',	'0.013',	'active',	NULL,	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `media`;
CREATE TABLE `media` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2022_10_31_171542_create_sections_table',	1),
(6,	'2022_11_02_145037_create_categories_table',	1),
(7,	'2022_11_05_164045_create_brands_table',	1),
(8,	'2022_11_05_170104_create_products_table',	1),
(9,	'2022_11_08_044240_create_attribute_sets_table',	1),
(10,	'2022_11_08_050243_create_attributes_table',	1),
(11,	'2022_12_02_144111_create_media_table',	1),
(12,	'2022_12_02_153920_create_product_images_table',	1),
(13,	'2022_12_02_155241_create_product_varients_table',	1),
(14,	'2022_12_02_173014_create_product_varient_images_table',	1),
(15,	'2022_12_02_181628_create_taxes_table',	1),
(16,	'2022_12_03_144453_create_settings_table',	1),
(17,	'2022_12_03_145451_create_countries_table',	1),
(18,	'2022_12_03_145502_create_states_table',	1),
(19,	'2022_12_03_145510_create_cities_table',	1),
(20,	'2022_12_04_160934_create_product_taxes_table',	1),
(21,	'2022_12_04_164136_create_product_discounts_table',	1),
(22,	'2022_12_05_171659_create_admins_table',	1),
(23,	'2022_12_07_162545_create_coupons_table',	1),
(24,	'2023_01_30_150507_create_sliders_table',	2),
(25,	'2023_02_05_042924_create_currencies_table',	3),
(26,	'2023_03_27_134151_create_carts_table',	4),
(27,	'2023_03_31_142602_create_wishlists_table',	5),
(28,	'2023_03_31_142720_create_compares_table',	5),
(29,	'2023_04_11_151820_create_permission_tables',	6);

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1,	'App\\Models\\User',	1),
(2,	'App\\Models\\User',	9);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'category_add',	'web',	'2023-04-23 05:55:29',	'2023-04-23 05:55:29'),
(2,	'category_edit',	'web',	'2023-04-23 05:55:29',	'2023-04-23 05:55:29'),
(3,	'category_delete',	'web',	'2023-04-23 05:55:29',	'2023-04-23 05:55:29'),
(4,	'category_show',	'web',	'2023-04-23 05:55:29',	'2023-04-23 05:55:29'),
(9,	'brand_add',	'web',	NULL,	NULL),
(10,	'brand_edit',	'web',	NULL,	NULL),
(11,	'brand_delete',	'web',	NULL,	NULL),
(12,	'brand_show',	'web',	NULL,	NULL),
(13,	'coupon_add',	'web',	NULL,	NULL),
(14,	'coupon_edit',	'web',	NULL,	NULL),
(15,	'coupon_delete',	'web',	NULL,	NULL),
(16,	'coupon_show',	'web',	NULL,	NULL),
(17,	'product_add',	'web',	NULL,	NULL),
(18,	'product_edit',	'web',	NULL,	NULL),
(19,	'product_delete',	'web',	NULL,	NULL),
(20,	'product_show',	'web',	NULL,	NULL),
(21,	'product_attribute_add',	'web',	NULL,	NULL),
(22,	'product_attribute_edit',	'web',	NULL,	NULL),
(23,	'product_attribute_delete',	'web',	NULL,	NULL),
(24,	'product_attribute_show',	'web',	NULL,	NULL),
(25,	'tax_add',	'web',	NULL,	NULL),
(26,	'tax_edit',	'web',	NULL,	NULL),
(27,	'tax_delete',	'web',	NULL,	NULL),
(28,	'tax_show',	'web',	NULL,	NULL),
(29,	'user_add',	'web',	NULL,	NULL),
(30,	'user_edit',	'web',	NULL,	NULL),
(31,	'user_delete',	'web',	NULL,	NULL),
(32,	'user_show',	'web',	NULL,	NULL),
(33,	'slider_add',	'web',	NULL,	NULL),
(34,	'slider_edit',	'web',	NULL,	NULL),
(35,	'slider_delete',	'web',	NULL,	NULL),
(36,	'slider_show',	'web',	NULL,	NULL),
(38,	'country_add',	'web',	NULL,	NULL),
(39,	'country_edit',	'web',	NULL,	NULL),
(40,	'country_delete',	'web',	NULL,	NULL),
(41,	'country_show',	'web',	NULL,	NULL),
(42,	'state_add',	'web',	NULL,	NULL),
(43,	'state_edit',	'web',	NULL,	NULL),
(44,	'state_delete',	'web',	NULL,	NULL),
(45,	'state_show',	'web',	NULL,	NULL),
(46,	'city_add',	'web',	NULL,	NULL),
(47,	'city_edit',	'web',	NULL,	NULL),
(48,	'city_delete',	'web',	NULL,	NULL),
(49,	'city_show',	'web',	NULL,	NULL),
(51,	'role_add',	'web',	'2023-04-23 08:03:05',	'2023-04-23 08:03:05'),
(52,	'role_edit',	'web',	'2023-04-23 08:13:55',	'2023-04-23 08:13:55'),
(53,	'role_delete',	'web',	'2023-04-28 14:22:02',	'2023-04-28 14:22:02'),
(54,	'role_show',	'web',	'2023-04-28 14:22:02',	'2023-04-28 14:22:02'),
(55,	'permission_add',	'web',	'2023-04-28 14:22:02',	'2023-04-28 14:22:02'),
(56,	'permission_edit',	'web',	'2023-04-28 14:22:02',	'2023-04-28 14:22:02'),
(57,	'permission_delete',	'web',	'2023-04-28 14:22:02',	'2023-04-28 14:22:02'),
(58,	'permission_show',	'web',	'2023-04-28 14:22:02',	'2023-04-28 14:22:02'),
(59,	'setting',	'web',	'2023-04-28 14:22:02',	'2023-04-28 14:22:02'),
(60,	'dashboard',	'web',	'2023-04-28 14:22:02',	'2023-04-28 14:22:02'),
(61,	'section_add',	'web',	'2023-04-23 05:55:29',	'2023-04-23 05:55:29'),
(62,	'section_edit',	'web',	'2023-04-23 05:55:29',	'2023-04-23 05:55:29'),
(63,	'section_delete',	'web',	'2023-04-23 05:55:29',	'2023-04-23 05:55:29'),
(64,	'section_show',	'web',	'2023-04-23 05:55:29',	'2023-04-23 05:55:29');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_discounts`;
CREATE TABLE `product_discounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category` enum('permanent','time_bound') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  `type` enum('flat','percent') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `start_dttm` datetime NOT NULL,
  `end_dttm` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_discounts` (`id`, `category`, `value`, `type`, `product_id`, `start_dttm`, `end_dttm`, `created_at`, `updated_at`) VALUES
(1,	'time_bound',	0,	'flat',	1,	'2023-03-20 13:08:37',	'2023-03-28 16:07:42',	NULL,	NULL),
(2,	'time_bound',	0,	'flat',	2,	'2023-03-20 13:08:37',	'2023-03-28 16:07:42',	NULL,	NULL);

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `main` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_images` (`id`, `name`, `product_id`, `main`, `created_at`, `updated_at`) VALUES
(2,	'uploads/products/ERDdK0yTad39M21FA4XNCwZvHAx7YfRlksKI5hqS.jpg',	2,	0,	'2023-02-14 08:37:25',	'2023-02-14 08:37:25'),
(3,	'uploads/products/kNRPhVGFYBtlentiz0xRp8hHFTD59hcB0VXT8sUD.jpg',	1,	1,	'2023-07-04 05:51:31',	'2023-07-04 05:51:31');

DROP TABLE IF EXISTS `product_taxes`;
CREATE TABLE `product_taxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tax_id` int NOT NULL,
  `value` int NOT NULL,
  `type` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_varient_images`;
CREATE TABLE `product_varient_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `product_varient_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_varients`;
CREATE TABLE `product_varients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `mrp` double NOT NULL,
  `qty` int NOT NULL,
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `product_id` int NOT NULL,
  `display` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `product_varients_chk_1` CHECK (json_valid(`attribute_id`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_varients` (`id`, `price`, `mrp`, `qty`, `sku`, `attribute_id`, `product_id`, `display`, `created_at`, `updated_at`) VALUES
(1,	400,	450,	10,	'PRO1',	'[\"1\",\"4\"]',	1,	0,	'2023-02-14 08:37:25',	'2023-02-14 08:37:25'),
(2,	300,	360,	10,	'PRO1',	'[\"1\",\"5\"]',	1,	0,	'2023-02-14 08:37:25',	'2023-02-14 08:37:25'),
(3,	300,	350,	10,	'PRO1',	'[\"3\",\"4\"]',	1,	1,	'2023-02-14 08:37:25',	'2023-02-14 08:37:25'),
(4,	300,	340,	10,	'PRO1',	'[\"2\",\"5\"]',	1,	0,	'2023-02-14 08:37:25',	'2023-02-14 08:37:25'),
(5,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 05:51:31',	'2023-07-04 05:51:31'),
(6,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 05:51:31',	'2023-07-04 05:51:31'),
(7,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 05:51:31',	'2023-07-04 05:51:31'),
(8,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 05:51:31',	'2023-07-04 05:51:31'),
(9,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 06:42:22',	'2023-07-04 06:42:22'),
(10,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 06:42:22',	'2023-07-04 06:42:22'),
(11,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 06:42:22',	'2023-07-04 06:42:22'),
(12,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 06:42:22',	'2023-07-04 06:42:22'),
(13,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 06:42:22',	'2023-07-04 06:42:22'),
(14,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 06:42:22',	'2023-07-04 06:42:22'),
(15,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 06:42:22',	'2023-07-04 06:42:22'),
(16,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-04 06:42:22',	'2023-07-04 06:42:22'),
(17,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(18,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(19,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(20,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(21,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(22,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(23,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(24,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(25,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(26,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(27,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(28,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(29,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(30,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(31,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(32,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-10 06:14:09',	'2023-07-10 06:14:09'),
(33,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(34,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(35,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(36,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(37,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(38,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(39,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(40,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(41,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(42,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(43,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(44,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(45,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(46,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(47,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(48,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(49,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(50,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(51,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(52,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(53,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(54,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(55,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(56,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(57,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(58,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(59,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(60,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(61,	400,	450,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(62,	300,	360,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(63,	300,	350,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10'),
(64,	300,	340,	10,	'PRO1',	'[]',	1,	0,	'2023-07-11 02:00:10',	'2023-07-11 02:00:10');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `section_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` int DEFAULT '0',
  `model` int DEFAULT '0',
  `short_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `long_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `technical_specification` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `uses` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `warranty` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `action` int DEFAULT '0',
  `is_refundable` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `is_promo` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `is_featured` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `is_discount` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `is_trending` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `is_shipping` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `terms` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `reward_point` int DEFAULT '0',
  `reward_expiry` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_purchase_qty` int NOT NULL DEFAULT '0',
  `pdf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` int NOT NULL DEFAULT '0',
  `qty_warning` int NOT NULL DEFAULT '0',
  `stock_visibility_state` int NOT NULL DEFAULT '0',
  `cod` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `estimate_shipping_day` int DEFAULT '0',
  `external_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `external_link_btn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `video_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` int NOT NULL DEFAULT '0',
  `role` int DEFAULT '0',
  `unit_price` int NOT NULL DEFAULT '0',
  `unit_mrp` int NOT NULL DEFAULT '0',
  `deal` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `label` enum('sale','new') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `current_stock` int DEFAULT '0',
  `todays_deal` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `sku` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_type` enum('free','flat_rate') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_shipping_cost` double DEFAULT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `category_id`, `section_id`, `name`, `slug`, `brand`, `model`, `short_desc`, `long_desc`, `keywords`, `technical_specification`, `uses`, `warranty`, `action`, `is_refundable`, `is_promo`, `is_featured`, `is_discount`, `is_trending`, `is_shipping`, `terms`, `reward_point`, `reward_expiry`, `barcode`, `max_purchase_qty`, `pdf`, `shipping`, `qty_warning`, `stock_visibility_state`, `cod`, `estimate_shipping_day`, `external_link`, `external_link_btn`, `unit`, `video_link`, `added_by`, `role`, `unit_price`, `unit_mrp`, `deal`, `label`, `current_stock`, `todays_deal`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `sku`, `created_at`, `updated_at`, `shipping_type`, `flat_shipping_cost`, `qty`) VALUES
(1,	2,	1,	'unisex shirt',	'unisex-shirt',	NULL,	0,	'Molestiae voluptate',	'<p>Sunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit ad</p>',	'Libero pariatur Id',	'<p>Sunt ipsum velit ad</p>',	'Sunt ipsum velit ad',	'<p>Sunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit adSunt ipsum velit ad</p>',	0,	'yes',	'yes',	'yes',	'yes',	'yes',	'yes',	NULL,	NULL,	NULL,	NULL,	2,	NULL,	0,	0,	0,	'yes',	NULL,	NULL,	NULL,	'pc',	NULL,	1,	NULL,	300,	350,	NULL,	'new',	NULL,	'no',	'Iure est autem rerum',	'Alias quos Nam in la',	NULL,	'active',	'pro1',	'2023-02-14 08:37:25',	'2023-07-04 05:51:31',	'free',	0,	50),
(2,	2,	1,	'unisex shirt',	'unisex-shirt',	NULL,	0,	'Molestiae voluptate',	NULL,	'Libero pariatur Id',	NULL,	'Sunt ipsum velit ad',	NULL,	0,	'yes',	'yes',	'yes',	'yes',	'yes',	'yes',	NULL,	NULL,	NULL,	'1234567890',	2,	NULL,	0,	0,	0,	'yes',	NULL,	NULL,	NULL,	'pc',	NULL,	1,	NULL,	300,	350,	'no',	'new',	NULL,	'no',	'Iure est autem rerum',	'Alias quos Nam in la',	NULL,	'active',	'pro1',	'2023-02-14 08:37:25',	'2023-02-14 08:37:25',	'free',	0,	10);

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1,	1),
(2,	1),
(3,	1),
(4,	1),
(9,	1),
(10,	1),
(11,	1),
(12,	1),
(13,	1),
(14,	1),
(15,	1),
(16,	1),
(17,	1),
(18,	1),
(19,	1),
(20,	1),
(21,	1),
(22,	1),
(23,	1),
(24,	1),
(25,	1),
(26,	1),
(27,	1),
(28,	1),
(29,	1),
(30,	1),
(31,	1),
(32,	1),
(33,	1),
(34,	1),
(35,	1),
(36,	1),
(38,	1),
(39,	1),
(40,	1),
(41,	1),
(42,	1),
(43,	1),
(44,	1),
(45,	1),
(46,	1),
(47,	1),
(48,	1),
(49,	1),
(51,	1),
(52,	1),
(53,	1),
(54,	1),
(55,	1),
(56,	1),
(57,	1),
(58,	1),
(59,	1),
(60,	1),
(61,	1),
(62,	1),
(63,	1),
(64,	1),
(1,	2),
(2,	2),
(3,	2),
(4,	2),
(9,	2),
(10,	2),
(11,	2),
(12,	2),
(13,	2),
(14,	2),
(15,	2),
(16,	2),
(17,	2),
(18,	2),
(19,	2),
(20,	2),
(21,	2),
(22,	2),
(23,	2),
(24,	2);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1,	'admin',	'web',	'2023-04-23 07:58:59',	'2023-04-23 07:58:59'),
(2,	'vendor',	'web',	'2023-04-23 08:12:32',	'2023-04-23 08:12:32');

DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sections` (`id`, `name`, `slug`, `status`, `image`, `icon`, `created_at`, `updated_at`) VALUES
(1,	'fashion',	'fashion',	'active',	'uploads/sections/HMmSR6O9nRyTtCFTs0r7gsxs0X6nDGmE2h8uwtJI.jpg',	'uploads/sections/EswXGb1KNWrg3h0Y82dJdoyAcf44O51Jcku8WT5A.jpg',	'2023-01-14 07:36:19',	'2023-04-30 11:56:30'),
(2,	'technology',	'technology',	'active',	'uploads/sections/8LfAZayddsTsYCpmX1d2nHSjSvkPGafcYcFzkDks.jpg',	'uploads/sections/XkmQTs44Kd5w1a0ceO65jwudL61mZ8mIoLD9nqcp.jpg',	'2023-01-14 07:39:06',	'2023-02-04 23:29:14');

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1,	'system_title',	'Quo sequi accusamus',	NULL,	'2023-02-12 08:56:13'),
(2,	'system_logo',	'uploads/others/mYcld9rxtXMfL95p7LNiWXEw3KJMzsTCadjhN2uA.png',	NULL,	'2023-02-12 08:56:14'),
(3,	'system_icon',	'uploads/others/GwMF0gJWrnVDkCDig96Rm8DJhojrgbFRes3jQhsX.png',	NULL,	'2023-02-12 08:56:14'),
(4,	'meta_title',	'Ullamco eum temporib',	NULL,	'2023-02-12 08:56:13'),
(5,	'meta_description',	'Ducimus expedita ut',	NULL,	'2023-02-12 08:56:13'),
(6,	'meta_keywords',	'Ipsum autem nulla ne',	NULL,	'2023-02-12 08:56:13'),
(8,	'shipping_type',	'flat_rate',	NULL,	'2023-02-12 08:56:13'),
(9,	'flat_rate_shipping_cost',	'50',	NULL,	'2023-02-12 08:56:13'),
(10,	'mobile_no',	'986543210',	NULL,	NULL),
(11,	'email',	'test@gmail.com',	NULL,	NULL),
(12,	'address',	'test',	NULL,	NULL),
(13,	'tag_line',	'test',	NULL,	NULL),
(14,	'store_status',	'on',	NULL,	NULL),
(15,	'add_to_cart_status',	'on',	NULL,	NULL),
(16,	'description',	'test',	NULL,	NULL),
(17,	'newsletter_content',	'test',	NULL,	NULL),
(18,	'facebook',	'test',	NULL,	NULL),
(19,	'instagram',	'test',	NULL,	NULL),
(20,	'whatsapp',	'test',	NULL,	NULL),
(21,	'twitter',	'test',	NULL,	NULL),
(22,	'linkedin',	'test',	NULL,	NULL),
(23,	'meta_keyword',	NULL,	NULL,	NULL),
(24,	'store_product_shipping',	'no',	NULL,	NULL);

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','deactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `description`, `image`, `btn_text`, `btn_link`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Boat Headphone Sets',	'Sale Offer',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',	'uploads/sliders/EPdvQDKTgeBbwoR7RARo1yu5vtPXcKRSBebyoYLi.jpg',	'Order Now',	'http://127.0.0.1:8000/',	'active',	'2023-01-31 08:03:58',	'2023-02-12 09:11:55'),
(2,	'Boat Headphone Sets',	'Sale Offer',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do',	'uploads/sliders/nnW25NIXO6vFdsrJnHEyTqBNQkBFEDUB77XbUFH0.jpg',	'Order Now',	'http://127.0.0.1:8000/',	'active',	'2023-01-31 08:04:31',	'2023-02-12 09:00:40');

DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `taxes`;
CREATE TABLE `taxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','deactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `taxes` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1,	'GST18',	'gst18',	'active',	'2023-01-22 05:56:15',	'2023-01-22 05:57:06');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','deactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `mobile_number`, `status`, `profile`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'admin1',	'admin',	'admin@gmail.com',	NULL,	'$2a$04$lKbJw/dfAWXObEOUehWxi.3ChaDFYklT./NMTOIcwdWtn7zQWJc56',	'07985985985',	'active',	'uploads/user/MxkfTRI0B311c3L82wipdEYR12vvmMwgRKxTnqZe.png',	'dWHoX6zlmpWGR6tAGuuMf8fkMR1i9ID19buQpAokhWXkw3cot2bbrqeLj4KA',	'2023-01-15 08:32:39',	'2023-07-11 02:58:08',	NULL),
(9,	'vendor',	'vendor',	'vendor@gmail.com',	NULL,	'$2y$10$NX5pIaFpigLdVS.eyazERO1PuS3BYmlXaRNdt73CRy4OoCDdVMpn.',	NULL,	'active',	'',	NULL,	'2023-04-27 10:13:31',	'2023-04-28 09:02:59',	NULL),
(10,	'test',	'test',	'user@gmail.com',	NULL,	'$2y$10$NX5pIaFpigLdVS.eyazERO1PuS3BYmlXaRNdt73CRy4OoCDdVMpn.',	NULL,	'active',	'',	NULL,	'2023-04-27 11:37:48',	'2023-04-28 09:06:31',	NULL);

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2023-07-11 12:15:18

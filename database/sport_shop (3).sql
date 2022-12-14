-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 15 2022 г., 11:44
-- Версия сервера: 5.7.33
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sport_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) NOT NULL,
  `time_cart` datetime DEFAULT CURRENT_TIMESTAMP,
  `info_cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(12) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Ігрові види спорту'),
(2, 'Товари для зимового спорту'),
(3, 'Ролики, скейти, самокати'),
(4, 'Водний спорт та відпочинок'),
(5, 'Фітнес, йога і гімнастика'),
(6, 'Єдиноборства'),
(7, 'Туризм'),
(8, 'Важка атлетика'),
(9, 'Ігри'),
(10, 'Спортивні комплекси');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(12) NOT NULL AUTO_INCREMENT,
  `user_id` int(12) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_rating` int(12) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(12) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_status` tinyint(1) DEFAULT NULL,
  `order_city` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_street` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` int(12) NOT NULL,
  `order_comment` text COLLATE utf8mb4_unicode_ci,
  KEY `payment_method` (`payment_method`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('danilo.savchenko96@gmail.com', '$2y$10$VIiRMAiIzxtcISS/3xoIh.HcGJfwRqCnTDqbnPizvZREPHLM1ZDOC', '2022-09-14 09:03:01');

-- --------------------------------------------------------

--
-- Структура таблицы `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
  `method_id` int(12) NOT NULL AUTO_INCREMENT,
  `method_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(12) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_count` int(12) NOT NULL,
  `product_price` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `product_character` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_id` int(12) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `subcategory_id` int(12) NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(12) NOT NULL,
  PRIMARY KEY (`subcategory_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, 'Футбол', 1),
(2, 'Баскетбол', 1),
(3, 'Волейбол', 1),
(4, 'Гандбол', 1),
(5, 'Великий теніс', 1),
(6, 'Настільний теніс', 1),
(7, 'Бадмінтон', 1),
(8, 'Більярд', 1),
(9, 'Бейсбол', 1),
(10, 'Аксесуари для ігрових видів спорту', 1),
(11, 'Ковзани', 2),
(12, 'Лижі', 2),
(13, 'Лижне взуття', 2),
(14, 'Хокей', 2),
(15, 'Санки', 2),
(16, 'Гірськолижне спорядження', 2),
(17, 'Самокати', 3),
(18, 'Ролики', 3),
(19, 'Скейтборди', 3),
(20, 'Захист', 3),
(21, 'Гіроскутери', 3),
(22, 'Дайвінг', 4),
(23, 'Окуляри для плавання', 4),
(24, 'Шапочки для плавання', 4),
(25, 'Ласти', 4),
(26, 'Аксесуари для плавання', 4),
(27, 'Одяг для плавання', 4),
(28, 'М’ячі для фітнесу', 5),
(29, 'Коврики', 5),
(30, 'Обручі', 5),
(31, 'Палки', 5),
(32, 'Скакалки', 5),
(33, 'Гантелі', 5),
(34, 'Товари для схуднення', 5),
(35, 'Батути', 5),
(36, 'Аксесуари', 5),
(37, 'Тренувальні снаряди', 6),
(38, 'Кімоно', 6),
(39, 'Захист для єдиноборства', 6),
(40, 'Перчатки для єдиноборства', 6),
(41, 'Шоломи', 6),
(42, 'Палатки', 7),
(43, 'Спальні мішки', 7),
(44, 'Рюкзаки', 7),
(45, 'Тенти', 7),
(46, 'Посуд', 7),
(47, 'Компаси', 7),
(48, 'Казани', 7),
(49, 'Ножі', 7),
(50, 'Аксесуари для туризму', 7),
(51, 'Гантелі', 8),
(52, 'Гирі', 8),
(53, 'Еспандери', 8),
(54, 'Гумові петлі', 8),
(55, 'Перчатки', 8),
(56, 'Тренажери', 8),
(57, 'Супорти', 8),
(58, 'Шейкери', 8),
(59, 'Аксесуари', 8),
(60, 'Настільні ігри', 9),
(61, 'Активні ігри', 9),
(62, 'Турніки', 10),
(63, 'Шведські стінки', 10),
(64, 'Дитячі ігрові комплекси', 10),
(65, 'Гімнастичні мати', 10),
(66, 'Додаткове обладнання', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `profile_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'danylo', 'danilo.savchenko96@gmail.com', '2022-09-21 08:36:14', '$2y$10$IQOVR2nGMxI2Z1fTnHXx/edzLwLucnTmAFUoZZEZEUzD5pqKTNici', 'danylo\r\n', NULL, '6mI0pKOcBQDS7a02KBFeMdtTmy5eUb92TEmEijwQ68RLJC1OJ6qjMXulbn5F', '2022-09-10 06:36:49', '2022-09-14 05:35:55'),
(6, 'test12345', 'test1@1234', '2022-09-12 10:07:37', '$2y$10$oIFQnuTfWGyhc30YT0LBWOSEUm1lWHkLdwfkpmx.exdsUZsKY7eza', 'test1', '202209141207папич-arthas.gif', 'xhP1QxUZhGIHlwgt6GATHCQRqhMNSFg6ZhU3KVKDbVAHIaGT3y2whEzZz27I', '2022-09-12 10:07:08', '2022-09-15 05:40:43'),
(7, 'beta', 'beta@123', '2022-09-14 05:37:27', '$2y$10$nn3/drB0K265etZc8Qr.buvxoCMNB/VpknqnA8QpPtRI9CU5dC7Xy', 'beta', NULL, 'DNRu41WjRdCffcd1vIOTWeuC5DrSPzPKKB2KDnfVImggx4V29m2Ig0W4FAU0', '2022-09-14 05:37:18', '2022-09-14 05:38:02');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`payment_method`) REFERENCES `payment_method` (`method_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `carts` (`cart_id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`);

--
-- Ограничения внешнего ключа таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

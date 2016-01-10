-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Gen 10, 2016 alle 14:47
-- Versione del server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laracms`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_template` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abstract` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `pub` tinyint(4) DEFAULT '1',
  `top_menu` tinyint(4) DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `articles`
--

INSERT INTO `articles` (`id`, `domain`, `id_parent`, `id_template`, `title`, `subtitle`, `intro`, `abstract`, `description`, `slug`, `doc`, `image`, `banner`, `link`, `sort`, `pub`, `top_menu`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '', 0, 0, 'Home', NULL, NULL, NULL, 'Home', 'home', '', '', '', '', 100, 1, 1, 0, '0000-00-00 00:00:00', '2016-01-09 15:59:37'),
(2, '', 1, 0, '', NULL, NULL, NULL, '', 'about', '', '', '', '', 200, 1, 1, 0, '2015-12-20 19:16:48', '2016-01-10 08:35:28'),
(3, '', 1, 0, '', NULL, NULL, NULL, '', 'news', '', '', '', '', 500, 1, 1, 0, '2015-12-24 18:15:46', '2015-12-29 13:26:24'),
(12, '', 1, 0, '', NULL, NULL, NULL, '', 'work', '', '', '', '', 400, 1, 1, 0, '2015-12-28 13:37:47', '2015-12-29 13:26:25'),
(13, '', 1, 0, '', NULL, NULL, NULL, '', 'service', '', '', '', '', 300, 1, 1, 0, '2015-12-28 13:38:11', '2015-12-29 13:26:26'),
(19, '', 0, 0, '', NULL, NULL, NULL, '', 'contact', '', '', '', '', 600, 1, 1, 0, '2015-12-28 15:19:49', '2016-01-03 21:42:16'),
(20, '', 13, 0, '', NULL, NULL, NULL, '', 'product-design', '', '16202_fiocco.png', '', '', 310, 1, 0, 0, '2015-12-29 13:25:40', '2015-12-29 15:26:38'),
(21, '', 13, 0, '', NULL, NULL, NULL, '', 'branding', '', '48204_fiocco.png', '', '', 320, 1, 0, 0, '2015-12-29 13:29:14', '2015-12-29 15:28:14'),
(22, '', 13, 0, '', NULL, NULL, NULL, '', 'design-management', '', '51635_fiocco.png', '', '', 330, 1, 0, 0, '2015-12-29 13:30:16', '2015-12-29 15:28:45'),
(23, '', 13, 0, '', NULL, NULL, NULL, '', 'exhibit-and-environment', '', '57617_fiocco.png', '', '', 340, 1, 0, 0, '2015-12-29 13:32:13', '2015-12-29 15:29:09'),
(24, '', 13, 0, '', NULL, NULL, NULL, '', 'start-up-creative-coaching', '', '34342_fiocco.png', '', '', 350, 1, 0, 0, '2015-12-29 13:34:36', '2016-01-03 21:43:43'),
(25, '', 12, 0, '', NULL, NULL, NULL, '', 'product', '', '', '', '', 410, 1, 0, 0, '2015-12-30 19:11:41', '2015-12-30 19:14:48'),
(26, '', 12, 0, '', NULL, NULL, NULL, '', 'identity', '', '', '', '', 420, 1, 0, 0, '2015-12-30 19:13:40', '2015-12-30 19:14:57'),
(27, '', 12, 0, '', NULL, NULL, NULL, '', 'research', '', '', '', '', 430, 1, 0, 0, '2015-12-30 19:14:16', '2015-12-30 19:14:50'),
(28, '', 25, 0, '', NULL, NULL, NULL, '', 'armour-climbing-helmet', '', '34971-armour.jpg', '', '', 412, 1, 0, 0, '2015-12-30 19:59:34', '2016-01-09 15:47:59'),
(29, '', 26, 0, '', NULL, NULL, NULL, '', 'manifattura-visual-identity', '', '57785-progetti-manifattura.jpg', '', '', 0, 0, 0, 0, '2015-12-31 16:42:16', '2016-01-09 15:48:29'),
(30, '', 25, 0, '', NULL, NULL, NULL, '', 'pebble-ceramic-collection', '', '71443_CR3.jpg', '', '', 0, 1, 0, 0, '2015-12-31 16:52:32', '2015-12-31 16:52:42'),
(31, '', 27, 0, '', NULL, NULL, NULL, '', 'semi-precious-stone-workshop-tajikistan', '', '61886_progetti_tj13.jpg', '', '', 0, 1, 0, 0, '2015-12-31 16:55:11', '2015-12-31 16:55:11');

-- --------------------------------------------------------

--
-- Struttura della tabella `article_tag`
--

DROP TABLE IF EXISTS `article_tag`;
CREATE TABLE IF NOT EXISTS `article_tag` (
  `article_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `article_translations`
--

DROP TABLE IF EXISTS `article_translations`;
CREATE TABLE IF NOT EXISTS `article_translations` (
  `id` int(10) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `article_translations`
--

INSERT INTO `article_translations` (`id`, `article_id`, `locale`, `title`, `subtitle`, `intro`, `description`, `abstract`, `seo_title`, `seo_description`, `seo_keywords`, `created_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Home', '', NULL, '<p>Home intro text</p>', '', 'LaraCms - Simple Laravel 5 CMS', 'Simple Multilanguages Laravel  5x CMS developed using Twitter bootstrap  3x', 'laravel 5, cms , miltilanguages, boostrap', 0, 0, '2015-12-20 18:56:43', '2016-01-09 15:53:27'),
(2, 1, 'it', 'Home', '', NULL, '', '', 'LaraCms - Simple Laravel 5 CMS', 'Simple Multilanguages Laravel  5x CMS developed using Twitter bootstrap  3x', 'laravel 5, cms , miltilanguages, boostrap', 0, 0, '2015-12-20 18:56:43', '2016-01-09 15:53:27'),
(3, 2, 'en', 'About us', '', NULL, '<p>We are a design studio based in Milan devoted to create impact and value. Since 2001 we take care of all the creative aspects for a client list of individuals, brands, institutions and NGOs.<br /> We design everything from businesses to brands to products, from books to bowls to boxes. And a lot more beyond. Our multi-disciplinary experience and expertise covers both brand and product design disciplines so we can help you from initial concept to ultimate expression.&nbsp;<br /> As designers we always build from the roots up. Our process is clear and simple: understand and define a clear vision for the project; explore the visual and conceptual roots of the idea; translate these roots into an authentic social and cultural experience.<br /> We embrace and provoke new ways of thinking and doing in order to help you navigate through rapidly changing competitive environments, applying maximum creativity together with strategy to make each project a success.<br /> Besides studio projects, CREOLO enjoys giving lectures and holding workshops at art &amp; design academies here and there around the globe</p>', '<p>We offer services in:&nbsp;<br /> - trend analysis and researches for new scenarios and concepts'' development;&nbsp;<br /> - product and industrial design;&nbsp;<br /> - workshop for product, process and service innovation and training for capacity building;&nbsp;<br /> - strategic design and total branding projects;&nbsp;<br /> - design management and design consulting for new&nbsp;creative industries&nbsp;and&nbsp;start-ups;&nbsp;<br /> - marketing strategies and integrated communication plans;&nbsp;<br /> - art-direction and graphics BTL&nbsp;(corporate identity, catalogues, pubblications);&nbsp;<br /> - adv campaigns and photo shooting services;&nbsp;<br /> - web-design;&nbsp;<br /> - web and&nbsp;social marketing;&nbsp;<br /> - retail design, info-graphics and tools for retail communication;&nbsp;<br /> - packaging, labelling and commercial illustrations/graphics;&nbsp;<br /> - promotional installations and fair booth design;&nbsp;<br /> - conception, coordination, management of events and exhibitions.</p>', '', '', '', 0, 0, '2015-12-20 19:16:48', '2016-01-08 18:01:25'),
(4, 2, 'it', 'Chi siamo', '', NULL, '<p>We are a design studio based in Milan devoted to create impact and value. Since 2001 we take care of all the creative aspects for a client list of individuals, brands, institutions and NGOs.<br /> We design everything from businesses to brands to products, from books to bowls to boxes. And a lot more beyond. Our multi-disciplinary experience and expertise covers both brand and product design disciplines so we can help you from initial concept to ultimate expression.&nbsp;<br /> As designers we always build from the roots up. Our process is clear and simple: understand and define a clear vision for the project; explore the visual and conceptual roots of the idea; translate these roots into an authentic social and cultural experience.<br /> We embrace and provoke new ways of thinking and doing in order to help you navigate through rapidly changing competitive environments, applying maximum creativity together with strategy to make each project a success.<br /> Besides studio projects, CREOLO enjoys giving lectures and holding workshops at art &amp; design academies here and there around the globe</p>', '', '', '', '', 0, 0, '2015-12-20 19:16:48', '2016-01-08 18:01:25'),
(5, 3, 'en', 'News', NULL, NULL, '<p>News page</p>', '', '', '', '', 0, 0, '2015-12-24 18:15:46', '2015-12-30 11:17:58'),
(6, 3, 'it', 'News', NULL, NULL, '', '', '', '', '', 0, 0, '2015-12-24 18:15:46', '2015-12-30 12:41:37'),
(20, 12, 'en', 'Projects', '', NULL, '<p>Our projects</p>', '', '', '', '', 0, 0, '2015-12-28 13:37:47', '2016-01-09 16:27:36'),
(21, 12, 'it', 'Progetti', '', NULL, '<p>I nostri lavori</p>', '', '', '', '', 0, 0, '2015-12-28 13:37:47', '2016-01-09 16:27:36'),
(22, 13, 'en', 'Service', NULL, NULL, '<p>We develop made-to-measure innovative design solutions to boost what you have in mind.</p>', '', '', '', '', 0, 0, '2015-12-28 13:38:11', '2015-12-30 19:32:44'),
(23, 13, 'it', 'Servizi', NULL, NULL, '<p>We develop made-to-measure innovative design solutions to boost what you have in mind.</p>', '', '', '', '', 0, 0, '2015-12-28 13:38:11', '2015-12-30 19:32:44'),
(34, 19, 'en', 'Contact', '', NULL, '<p>Contacts&nbsp;</p>', '', 'Seo title', 'desc', 'seo key', 0, 0, '2015-12-28 15:19:49', '2016-01-03 18:17:45'),
(35, 19, 'it', 'Contatti', '', NULL, '', '', '', '', '', 0, 0, '2015-12-28 15:19:49', '2016-01-03 18:17:45'),
(36, 20, 'en', 'Product design', '', NULL, '<p>Product design</p>', '', '', '', '', 0, 0, '2015-12-29 13:25:40', '2016-01-03 20:03:55'),
(37, 20, 'it', 'Product design', '', NULL, '', '', '', '', '', 0, 0, '2015-12-29 13:25:40', '2016-01-03 20:03:55'),
(38, 21, 'en', 'Branding', NULL, NULL, '<p>Branding</p>', '', '', '', '', 0, 0, '2015-12-29 13:29:14', '2015-12-29 13:29:14'),
(39, 21, 'it', 'Branding', NULL, NULL, '', '', '', '', '', 0, 0, '2015-12-29 13:29:14', '2015-12-29 13:29:14'),
(40, 22, 'en', 'Design management', NULL, NULL, '<p>Design management</p>', '', '', '', '', 0, 0, '2015-12-29 13:30:16', '2015-12-29 13:30:17'),
(41, 22, 'it', 'Design management', NULL, NULL, '', '', '', '', '', 0, 0, '2015-12-29 13:30:17', '2015-12-29 13:30:17'),
(42, 23, 'en', 'Exhibit and Environment', NULL, NULL, '<p>Exhibit and Environment</p>', '', '', '', '', 0, 0, '2015-12-29 13:32:13', '2015-12-29 13:32:13'),
(43, 23, 'it', '', NULL, NULL, '', '', '', '', '', 0, 0, '2015-12-29 13:32:13', '2015-12-29 13:32:13'),
(44, 24, 'en', 'Start-up creative coaching', '', NULL, '<p>Start-up creative coaching</p>', '', '', '', '', 0, 0, '2015-12-29 13:34:36', '2016-01-03 21:43:16'),
(45, 24, 'it', 'Start-up creative coaching', '', NULL, '', '', '', '', '', 0, 0, '2015-12-29 13:34:37', '2016-01-03 21:43:16'),
(46, 25, 'en', 'PRODUCT', NULL, NULL, '<p>PRODUCT description</p>', '', '', '', '', 0, 0, '2015-12-30 19:11:41', '2015-12-30 19:11:41'),
(47, 25, 'it', 'Prodotti', NULL, NULL, '', '', '', '', '', 0, 0, '2015-12-30 19:11:41', '2015-12-30 19:11:41'),
(48, 26, 'en', 'Identity', NULL, NULL, '<p>identity</p>', '', '', '', '', 0, 0, '2015-12-30 19:13:40', '2015-12-30 19:13:41'),
(49, 26, 'it', 'Identity', NULL, NULL, '', '', '', '', '', 0, 0, '2015-12-30 19:13:41', '2015-12-30 19:13:41'),
(50, 27, 'en', 'Research', NULL, NULL, '<p>research</p>', '', '', '', '', 0, 0, '2015-12-30 19:14:16', '2015-12-30 19:14:16'),
(51, 27, 'it', 'research', NULL, NULL, '', '', '', '', '', 0, 0, '2015-12-30 19:14:16', '2015-12-30 19:14:16'),
(52, 28, 'en', 'Armour climbing helmet', '', NULL, '<p>Design and engineering of a line of climbing helmets for Camp technical adventure equipment.</p>\r\n<p><br /> <em>Cliente / client:</em> <strong>Camp</strong><br /> <em>Anno / year:</em> <strong>2007</strong><br /> <em>Luogo / place:</em> <strong>Premana / Italy</strong></p>', '', '', '', '', 0, 0, '2015-12-30 19:59:34', '2016-01-09 15:47:59'),
(53, 28, 'it', '', '', NULL, '', '', '', '', '', 0, 0, '2015-12-30 19:59:34', '2016-01-09 15:47:59'),
(54, 29, 'en', 'Manifattura visual identity', '', NULL, '<p>Conception, art-direction and coordination of the event that has organized various sale-exhibitions of craft and design within the Serra Lorenzini in Milan.</p>\r\n<p><br /> <em>Cliente / client:</em> <strong>Serra Lorenzini</strong><br /> <em>Anno / year:</em> <strong>2010-12</strong><br /> <em>Luogo / place:</em> <strong>Milano / Italy</strong></p>', '', '', '', '', 0, 0, '2015-12-31 16:42:16', '2016-01-08 19:18:22'),
(55, 29, 'it', 'Manifattura visual identity', '', NULL, '<p>Conception, art-direction and coordination of the event that has organized various sale-exhibitions of craft and design within the Serra Lorenzini in Milan.</p>\r\n<p><br /> <em>Cliente / client:</em> <strong>Serra Lorenzini</strong><br /> <em>Anno / year:</em> <strong>2010-12</strong><br /> <em>Luogo / place:</em> <strong>Milano / Italy</strong></p>', '', '', '', '', 0, 0, '2015-12-31 16:42:16', '2016-01-08 19:18:23'),
(56, 30, 'en', 'Pebble ceramic collection', NULL, NULL, '<p>In the same way that the weather shapes pebbles to create unusual shapes and luminous waves.&nbsp;A bright collection of vases and bowls, with oval holes that create contrasts of light and shade to enhance the shapes and warm reflections of our precious possessions.<br /> The deepness of space married to fleeting functionality.</p>\r\n<p><br /> <em>Cliente / client:</em>&nbsp;<strong>Crestani Ceramiche</strong><br /> <em>Anno / year:</em>&nbsp;<strong>2012</strong><br /> <em>Luogo / place:</em>&nbsp;<strong>Marostica / Italy</strong></p>', '', '', '', '', 0, 0, '2015-12-31 16:52:32', '2015-12-31 16:52:32'),
(57, 30, 'it', 'Pebble ceramic collection', NULL, NULL, '<p>Pebble ceramic collection</p>', '', '', '', '', 0, 0, '2015-12-31 16:52:32', '2015-12-31 16:52:32'),
(58, 31, 'en', 'Semi-precious stone workshop - Tajikistan', NULL, NULL, '<p>Project of international cooperation in the Pamirs, sponsored by GIZ and coordinated by CESVI for the development of a local entrepreneurial activity related to the processing and marketing of jewelery in semi-precious stones.</p>\r\n<p><br /> <em>Cliente / client:</em> <strong>GIZ</strong><br /> <em>Anno / year:</em> <strong>2013-14</strong><br /> <em>Luogo / place:</em> <strong>Pamir / Tajikistan</strong></p>', '', '', '', '', 0, 0, '2015-12-31 16:55:11', '2015-12-31 16:55:11'),
(59, 31, 'it', 'Semi-precious stone workshop - Tajikistan', NULL, NULL, '<p>Project of international cooperation in the Pamirs, sponsored by GIZ and coordinated by CESVI for the development of a local entrepreneurial activity related to the processing and marketing of jewelery in semi-precious stones.</p>\r\n<p><br /> <em>Cliente / client:</em> <strong>GIZ</strong><br /> <em>Anno / year:</em> <strong>2013-14</strong><br /> <em>Luogo / place:</em> <strong>Pamir / Tajikistan</strong></p>', '', '', '', '', 0, 0, '2015-12-31 16:55:11', '2015-12-31 16:55:11');

-- --------------------------------------------------------

--
-- Struttura della tabella `hpsliders`
--

DROP TABLE IF EXISTS `hpsliders`;
CREATE TABLE IF NOT EXISTS `hpsliders` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `hpsliders`
--

INSERT INTO `hpsliders` (`id`, `title`, `description`, `icon`, `image`, `link`, `slug`, `sort`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'DESIGN WITH A VIEW', 'We are a design studio devoted to create impact and value', NULL, '79928_header1.jpg', '', 'design-with-a-view', 10, 1, 0, '2016-01-05 16:38:00', '2016-01-05 15:38:00'),
(4, 'DESIGN FORWARDERS', 'Maximum creativity together with strategy to make each project a success', NULL, '24655_header2.jpg', '', 'design-forwarders', 20, 1, 0, '2015-12-29 09:39:14', '2015-12-29 08:39:14'),
(5, 'QUIET & POWERFUL', 'Design to embrace and provoke new ways of thinking and doing', NULL, '78781_header3.jpg', '', 'quiet-powerful', 30, 1, 0, '2015-12-29 10:15:18', '2015-12-29 09:15:18'),
(11, 'WE DESIGN EVERYTHING', 'Maximum creativity together with strategy to make each project a success', NULL, '45952_header4.jpg', '', 'we-design-everything', 40, 1, 0, '2015-12-29 10:15:20', '2015-12-29 09:15:20');

-- --------------------------------------------------------

--
-- Struttura della tabella `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) unsigned NOT NULL,
  `media_category_id` int(10) unsigned NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `collection_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_ext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `disk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(10) unsigned NOT NULL,
  `manipulations` text COLLATE utf8_unicode_ci NOT NULL,
  `pub` tinyint(4) DEFAULT '1',
  `sort` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `media_translations`
--

DROP TABLE IF EXISTS `media_translations`;
CREATE TABLE IF NOT EXISTS `media_translations` (
  `id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_08_23_104442_create_products_table', 1),
('2015_08_23_123427_add_paid_to_products', 1),
('2015_08_27_133226_create_articles_table', 1),
('2015_08_28_101039_add_media_to_articles_table', 1),
('2015_08_29_151840_entrust_setup_tables', 1),
('2015_08_29_173518_add_is_active_to_users_table', 1),
('2015_12_06_191101_create_object_translation_table', 1),
('2015_12_07_161911_article_translations', 1),
('2015_12_20_135234_add_password_real_to_users_table', 1),
('2015_12_23_205357_create_socials_table', 2),
('2015_12_26_180448_create_hpsliders', 3),
('2015_12_28_173515_add_subtitle_intro_abstract_to_article_table', 4),
('2015_12_28_173917_add_subtitle_abstract_to_article_translations_table', 4),
('2016_01_03_185806_add_subtitle_intro_to_article_translations', 5),
('2016_01_03_190819_create_news_table', 6),
('2016_01_03_190932_create_news_translations_table', 7),
('2016_01_03_191050_create_media_table', 8),
('2016_01_03_191145_create_media_translations_table', 9),
('2016_01_09_213704_create_tags_table', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abstract` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `pub` tinyint(4) DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `news`
--

INSERT INTO `news` (`id`, `domain`, `date`, `title`, `description`, `subtitle`, `intro`, `abstract`, `slug`, `doc`, `image`, `banner`, `link`, `sort`, `pub`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '', '2015-12-20', '', '', NULL, NULL, '', 'best-wisth', '', '12676-bf2016.jpg', '', '', 0, 1, 0, '2016-01-10 13:24:45', '2016-01-10 12:24:45'),
(15, '', '2016-01-06', '', '', NULL, NULL, '', 'we-are-the-new-italian-design', '', '84391-the-new-italian-design.jpg', '', '', 0, 1, 0, '2016-01-10 13:24:31', '2016-01-10 12:24:31'),
(17, '', '2015-11-09', '', '', NULL, NULL, '', 'design-for-business-competitiveness', '', '39488-villa-la-magia-ville-medicee-650x435.jpg', '', '', 0, 1, 0, '2016-01-10 13:27:47', '2016-01-10 12:27:47');

-- --------------------------------------------------------

--
-- Struttura della tabella `news_tag`
--

DROP TABLE IF EXISTS `news_tag`;
CREATE TABLE IF NOT EXISTS `news_tag` (
  `news_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `news_tag`
--

INSERT INTO `news_tag` (`news_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2016-01-10 13:22:16', '0000-00-00 00:00:00'),
(1, 1, '2016-01-10 13:23:27', '0000-00-00 00:00:00'),
(15, 2, '2016-01-10 13:24:31', '0000-00-00 00:00:00'),
(1, 3, '2016-01-10 13:24:45', '0000-00-00 00:00:00'),
(17, 2, '2016-01-10 13:27:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `news_translations`
--

DROP TABLE IF EXISTS `news_translations`;
CREATE TABLE IF NOT EXISTS `news_translations` (
  `id` int(10) unsigned NOT NULL,
  `news_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `abstract` text COLLATE utf8_unicode_ci,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `news_translations`
--

INSERT INTO `news_translations` (`id`, `news_id`, `locale`, `title`, `description`, `abstract`, `subtitle`, `intro`, `seo_title`, `seo_description`, `seo_keywords`, `created_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'best wisth', '<p>We wish you all a creative and inspiring new year!...</p>', NULL, NULL, NULL, '', '', '', 0, 0, '2016-01-10 09:28:41', '2016-01-10 08:28:41'),
(2, 1, 'it', 'News in italiano', '', NULL, NULL, NULL, '', '', '', 0, 0, '2016-01-10 09:44:18', '2016-01-10 08:44:18'),
(29, 15, 'en', 'WE ARE THE NEW ITALIAN DESIGN', '<p>On the occasion of Gwangju Design Biennale 2015, we are with Triennale Design Museum presenting&nbsp;an upgraded and updated edition of The New Italian Design from October 15th until November 13th 201...</p>', NULL, NULL, NULL, '', '', '', 0, 0, '2016-01-06 23:29:25', '2016-01-06 22:29:25'),
(30, 15, 'it', '', '', NULL, NULL, NULL, '', '', '', 0, 0, '2016-01-06 22:29:25', '2016-01-06 22:29:25'),
(33, 17, 'en', 'DESIGN FOR BUSINESS COMPETITIVENESS', '<p>Edoardo Perri is guest-lecturer @ &ldquo;DESIGN FOR COMPETITIVENESS&rdquo;, Toscany. The meeting aims to present case studies of companies who have walked the path of a design-driven innovation in all its forms, from product to communication - through the story of the protagonists.</p>', NULL, NULL, NULL, '', '', '', 0, 0, '2016-01-09 20:56:17', '2016-01-09 19:56:17'),
(34, 17, 'it', 'DESIGN FOR BUSINESS COMPETITIVENESS', '<p>Edoardo Perri is guest-lecturer @ &ldquo;DESIGN FOR COMPETITIVENESS&rdquo;, Toscany. The meeting aims to present case studies of companies who have walked the path of a design-driven innovation in all its forms, from product to communication - through the story of the protagonists.</p>', NULL, NULL, NULL, '', '', '', 0, 0, '2016-01-09 19:56:17', '2016-01-09 19:56:17');

-- --------------------------------------------------------

--
-- Struttura della tabella `object_translation`
--

DROP TABLE IF EXISTS `object_translation`;
CREATE TABLE IF NOT EXISTS `object_translation` (
  `id` int(10) unsigned NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `short_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'su', 'super user', 'can do all', '2015-12-20 18:23:32', '2015-12-20 18:23:32'),
(2, 'admin', 'admin', 'admi  user', '2015-12-20 18:26:36', '2015-12-20 18:26:36'),
(3, 'user', 'user', 'user role', '2015-12-20 18:50:58', '2015-12-20 18:50:58'),
(7, 'Guest', 'guest', 'guest user', '2015-12-28 13:37:23', '2015-12-28 13:37:23');

-- --------------------------------------------------------

--
-- Struttura della tabella `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(3, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `socials`
--

DROP TABLE IF EXISTS `socials`;
CREATE TABLE IF NOT EXISTS `socials` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `socials`
--

INSERT INTO `socials` (`id`, `title`, `description`, `icon`, `image`, `link`, `sort`, `is_active`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'facebook', '', 'fa-facebook', '', 'https://www.facebook.com/', 10, 1, 0, '2016-01-09 17:42:23', '2016-01-09 16:42:23'),
(2, 'Twitter', '', 'fa-twitter', '', 'https://twitter.com/?lang=it', 20, 1, 0, '2015-12-23 20:25:38', '2015-12-23 20:25:38'),
(3, 'Linkedin', '', 'fa-linkedin', '', 'https://www.linkedin.com/in/marcoax', 30, 1, 0, '2015-12-30 18:32:16', '2015-12-30 17:32:16'),
(4, 'Github', '', 'fa-github', '', 'https://github.com/marcoax', 0, 1, 0, '2015-12-23 21:57:46', '2015-12-23 20:57:46');

-- --------------------------------------------------------

--
-- Struttura della tabella `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `update_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, '', 'research', 0, 0, '2016-01-10 09:40:24', '2016-01-10 08:40:24'),
(2, '', 'project', 0, 0, '2016-01-10 08:40:41', '2016-01-10 08:40:41'),
(3, '', 'creolo', 0, 0, '2016-01-10 12:24:19', '2016-01-10 12:24:19');

-- --------------------------------------------------------

--
-- Struttura della tabella `tag_translations`
--

DROP TABLE IF EXISTS `tag_translations`;
CREATE TABLE IF NOT EXISTS `tag_translations` (
  `id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `tag_id`, `locale`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Research', '2016-01-10 09:40:24', '2016-01-10 08:40:24'),
(2, 2, 'en', 'Project', '2016-01-10 09:41:02', '2016-01-10 08:41:02'),
(3, 2, 'it', 'progetti', '2016-01-10 08:45:17', '2016-01-10 08:45:17'),
(4, 3, 'en', 'Creolo', '2016-01-10 13:25:02', '2016-01-10 12:25:02'),
(5, 3, 'it', 'Creolo', '2016-01-10 13:25:02', '2016-01-10 12:25:02');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `real_password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `real_password`, `remember_token`, `created_at`, `updated_at`, `is_active`) VALUES
(3, 'admin', 'admin@laraCms.com', '$2y$10$ootHGgnOTgD29c6t9NBxtuV2UGKmxPxz5Lh8KcltcKVE8XrciGv16', 'password', 'T3UWyct1gy9I2nvKUra6e9avhNMaVP8YCpTBAfbBApqCYfYnIuay8enQjOui', '0000-00-00 00:00:00', '2016-01-10 12:17:55', 1),
(4, 'user', 'user@laraCms.con', '$2y$10$rF3o3nJz.v8GLKAMSmxTGuHLq0kAM5lPFI.cXVzh2NYTsIRrxHyhe', 'userpwd', NULL, '2015-12-20 18:57:51', '2016-01-02 12:07:28', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_translations`
--
ALTER TABLE `article_translations`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `article_translations_article_id_locale_unique` (`article_id`,`locale`), ADD KEY `article_translations_locale_index` (`locale`);

--
-- Indexes for table `hpsliders`
--
ALTER TABLE `hpsliders`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `hpsliders_slug_unique` (`slug`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`), ADD KEY `media_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `media_translations`
--
ALTER TABLE `media_translations`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `media_translations_media_id_locale_unique` (`media_id`,`locale`), ADD KEY `media_translations_locale_index` (`locale`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_tag`
--
ALTER TABLE `news_tag`
  ADD KEY `news_tag_news_id_index` (`news_id`), ADD KEY `news_tag_tag_id_index` (`tag_id`);

--
-- Indexes for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `news_translations_news_id_locale_unique` (`news_id`,`locale`), ADD KEY `news_translations_locale_index` (`locale`);

--
-- Indexes for table `object_translation`
--
ALTER TABLE `object_translation`
  ADD PRIMARY KEY (`id`), ADD KEY `object_translation_locale_index` (`locale`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`), ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tag_translations_tag_id_locale_unique` (`tag_id`,`locale`), ADD KEY `tag_translations_locale_index` (`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `article_translations`
--
ALTER TABLE `article_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `hpsliders`
--
ALTER TABLE `hpsliders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media_translations`
--
ALTER TABLE `media_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `news_translations`
--
ALTER TABLE `news_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `object_translation`
--
ALTER TABLE `object_translation`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `article_translations`
--
ALTER TABLE `article_translations`
ADD CONSTRAINT `article_translations_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `media_translations`
--
ALTER TABLE `media_translations`
ADD CONSTRAINT `media_translations_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `news_tag`
--
ALTER TABLE `news_tag`
ADD CONSTRAINT `news_tag_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `news_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `news_translations`
--
ALTER TABLE `news_translations`
ADD CONSTRAINT `news_translations_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `permission_role`
--
ALTER TABLE `permission_role`
ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `role_user`
--
ALTER TABLE `role_user`
ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `tag_translations`
--
ALTER TABLE `tag_translations`
ADD CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

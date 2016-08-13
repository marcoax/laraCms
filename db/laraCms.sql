-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Ago 13, 2016 alle 12:22
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
-- Struttura della tabella `adminusers`
--

CREATE TABLE IF NOT EXISTS `adminusers` (
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
-- Dump dei dati per la tabella `adminusers`
--

INSERT INTO `adminusers` (`id`, `name`, `email`, `password`, `real_password`, `remember_token`, `created_at`, `updated_at`, `is_active`) VALUES
(3, 'angelo marco asperti', 'marcoasperti@gmail.com', '$2y$10$Lj7llsqfe9WtBRxEmM7cNujjd41.WxsjIXn.KGuWfMDe4JgWRpx7i', 'laracms', 'rMP2zJrXxoVd5sMbg3PaKlOL2CfL5ro6jylfEwGlBbdDqQXsDf5phtC2onHG', '0000-00-00 00:00:00', '2016-08-13 08:16:58', 1),
(4, 'admin', 'adminlaracms@gmail.com', '$2y$10$Kh66XRjamn.WMmb3KxO/nuyHJ9zo776xOQpK/JIxJxpXYM.2qojL2', 'laraadmin', 'kHVNkswUF1Q2txXYcFIhP4GkZELnX8s55aOYreW0Txnk0QsOa2KVIkkvlJdo', '2015-12-20 18:57:51', '2016-08-13 08:17:59', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `articles`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `articles`
--

INSERT INTO `articles` (`id`, `domain`, `id_parent`, `id_template`, `title`, `subtitle`, `intro`, `abstract`, `description`, `slug`, `doc`, `image`, `banner`, `link`, `sort`, `pub`, `top_menu`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '', 1, 0, 'Home', NULL, NULL, NULL, 'Home', 'home', '', '65532-azienda.jpg', '', '', 120, 1, 1, 0, '0000-00-00 00:00:00', '2016-08-12 13:36:38'),
(2, '', 1, 0, '', NULL, NULL, NULL, '', 'about', '', '', '', '', 200, 1, 1, 0, '2015-12-20 19:16:48', '2016-01-10 08:35:28'),
(3, '', 1, 0, '', NULL, NULL, NULL, '', 'news', '', '', '', '', 500, 1, 1, 0, '2015-12-24 18:15:46', '2015-12-29 13:26:24'),
(12, '', 1, 0, '', NULL, NULL, NULL, '', 'work', '', '', '', '', 400, 1, 1, 0, '2015-12-28 13:37:47', '2015-12-29 13:26:25'),
(13, '', 1, 0, '', NULL, NULL, NULL, '', 'service', '', '', '', '', 300, 1, 1, 0, '2015-12-28 13:38:11', '2015-12-29 13:26:26'),
(19, '', 1, 0, '', NULL, NULL, NULL, '', 'contact', '', '', '', '', 600, 1, 1, 0, '2015-12-28 15:19:49', '2016-01-23 16:19:45'),
(20, '', 13, 0, '', NULL, NULL, NULL, '', 'product-design', '', '16202_fiocco.png', '', '', 310, 1, 0, 0, '2015-12-29 13:25:40', '2015-12-29 15:26:38'),
(21, '', 13, 0, '', NULL, NULL, NULL, '', 'branding', '', '48204_fiocco.png', '', '', 320, 1, 0, 0, '2015-12-29 13:29:14', '2015-12-29 15:28:14'),
(22, '', 13, 0, '', NULL, NULL, NULL, '', 'design-management', '', '51635_fiocco.png', '', '', 330, 1, 0, 0, '2015-12-29 13:30:16', '2015-12-29 15:28:45'),
(23, '', 13, 0, '', NULL, NULL, NULL, '', 'exhibit-and-environment', '', '57617_fiocco.png', '', '', 340, 1, 0, 0, '2015-12-29 13:32:13', '2015-12-29 15:29:09'),
(24, '', 13, 0, '', NULL, NULL, NULL, '', 'start-up-creative-coaching', '', '34342_fiocco.png', '', '', 350, 1, 0, 0, '2015-12-29 13:34:36', '2016-01-03 21:43:43'),
(25, '', 12, 0, '', NULL, NULL, NULL, '', 'product', '', '', '', '', 410, 1, 0, 0, '2015-12-30 19:11:41', '2015-12-30 19:14:48'),
(26, '', 12, 0, '', NULL, NULL, NULL, '', 'identity', '', '', '', '', 420, 1, 0, 0, '2015-12-30 19:13:40', '2015-12-30 19:14:57'),
(27, '', 12, 0, '', NULL, NULL, NULL, '', 'research', '', '', '', '', 430, 1, 0, 0, '2015-12-30 19:14:16', '2015-12-30 19:14:50'),
(28, '', 25, 0, '', NULL, NULL, NULL, '', 'armour-climbing-helmet', '', '34971-armour.jpg', '', '', 412, 1, 0, 0, '2015-12-30 19:59:34', '2016-01-09 15:47:59'),
(29, '', 26, 0, '', NULL, NULL, NULL, '', 'manifattura-visual-identity', '', '57785-progetti-manifattura.jpg', '', '', 10, 0, 0, 0, '2015-12-31 16:42:16', '2016-04-27 16:42:06'),
(30, '', 25, 0, '', NULL, NULL, NULL, '', 'pebble-ceramic-collection', '', '71443_CR3.jpg', '', '', 10, 1, 0, 0, '2015-12-31 16:52:32', '2016-04-27 16:42:10'),
(31, '', 27, 0, '', NULL, NULL, NULL, '', 'semi-precious-stone-workshop-tajikistan', '', '61886_progetti_tj13.jpg', '', '', 10, 1, 0, 0, '2015-12-31 16:55:11', '2016-04-27 16:42:13'),
(32, '', 1, 0, '', NULL, NULL, NULL, '', 'login', '', '', '', '', 100000, 1, 0, 0, '2016-08-12 15:27:13', '2016-08-12 15:29:17');

-- --------------------------------------------------------

--
-- Struttura della tabella `article_tag`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `article_translations`
--

INSERT INTO `article_translations` (`id`, `article_id`, `locale`, `title`, `subtitle`, `intro`, `description`, `abstract`, `seo_title`, `seo_description`, `seo_keywords`, `created_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Home', '', NULL, '<p>Home intro text</p>', '', 'seo for home', '', '', 0, 0, '2015-12-20 18:56:43', '2016-07-02 11:39:34'),
(2, 1, 'it', 'Home', '', NULL, '', '', '', '', '', 0, 0, '2015-12-20 18:56:43', '2016-01-22 18:57:51'),
(3, 2, 'en', 'About us', '', NULL, '<p>We are a design studio based in Milan devoted to create impact and value. Since 2001 we take care of all the creative aspects for a client list of individuals, brands, institutions and NGOs.<br /> We design everything from businesses to brands to products, from books to bowls to boxes. And a lot more beyond. Our multi-disciplinary experience and expertise covers both brand and product design disciplines so we can help you from initial concept to ultimate expression.&nbsp;<br /> As designers we always build from the roots up. Our process is clear and simple: understand and define a clear vision for the project; explore the visual and conceptual roots of the idea; translate these roots into an authentic social and cultural experience.<br /> We embrace and provoke new ways of thinking and doing in order to help you navigate through rapidly changing competitive environments, applying maximum creativity together with strategy to make each project a success.<br /> Besides studio projects, CREOLO enjoys giving lectures and holding workshops at art &amp; design academies here and there around the globe</p>', '<p>We offer services in:&nbsp;<br /> - trend analysis and researches for new scenarios and concepts'' development;&nbsp;<br /> - product and industrial design;&nbsp;<br /> - workshop for product, process and service innovation and training for capacity building;&nbsp;<br /> - strategic design and total branding projects;&nbsp;<br /> - design management and design consulting for new&nbsp;creative industries&nbsp;and&nbsp;start-ups;&nbsp;<br /> - marketing strategies and integrated communication plans;&nbsp;<br /> - art-direction and graphics BTL&nbsp;(corporate identity, catalogues, pubblications);&nbsp;<br /> - adv campaigns and photo shooting services;&nbsp;<br /> - web-design;&nbsp;<br /> - web and&nbsp;social marketing;&nbsp;<br /> - retail design, info-graphics and tools for retail communication;&nbsp;<br /> - packaging, labelling and commercial illustrations/graphics;&nbsp;<br /> - promotional installations and fair booth design;&nbsp;<br /> - conception, coordination, management of events and exhibitions.</p>', '', '', '', 0, 0, '2015-12-20 19:16:48', '2016-01-08 18:01:25'),
(4, 2, 'it', 'Chi siamo', '', NULL, '<p>We are a design studio based in Milan devoted to create impact and value. Since 2001 we take care of all the creative aspects for a client list of individuals, brands, institutions and NGOs.<br /> We design everything from businesses to brands to products, from books to bowls to boxes. And a lot more beyond. Our multi-disciplinary experience and expertise covers both brand and product design disciplines so we can help you from initial concept to ultimate expression.&nbsp;<br /> As designers we always build from the roots up. Our process is clear and simple: understand and define a clear vision for the project; explore the visual and conceptual roots of the idea; translate these roots into an authentic social and cultural experience.<br /> We embrace and provoke new ways of thinking and doing in order to help you navigate through rapidly changing competitive environments, applying maximum creativity together with strategy to make each project a success.<br /> Besides studio projects, CREOLO enjoys giving lectures and holding workshops at art &amp; design academies here and there around the globe</p>', '', '', '', '', 0, 0, '2015-12-20 19:16:48', '2016-01-08 18:01:25'),
(5, 3, 'en', 'News', '', NULL, '<p>News page</p>', '', '', '', '', 0, 0, '2015-12-24 18:15:46', '2016-07-03 10:16:37'),
(6, 3, 'it', 'News', '', NULL, '', '', '', '', '', 0, 0, '2015-12-24 18:15:46', '2016-07-03 10:16:37'),
(20, 12, 'en', 'Projects', '', NULL, '<p>Our projects</p>', '', '', '', '', 0, 0, '2015-12-28 13:37:47', '2016-01-09 16:27:36'),
(21, 12, 'it', 'Progetti', '', NULL, '<p>I nostri lavori</p>', '', '', '', '', 0, 0, '2015-12-28 13:37:47', '2016-01-09 16:27:36'),
(22, 13, 'en', 'Service', NULL, NULL, '<p>We develop made-to-measure innovative design solutions to boost what you have in mind.</p>', '', '', '', '', 0, 0, '2015-12-28 13:38:11', '2015-12-30 19:32:44'),
(23, 13, 'it', 'Servizi', NULL, NULL, '<p>We develop made-to-measure innovative design solutions to boost what you have in mind.</p>', '', '', '', '', 0, 0, '2015-12-28 13:38:11', '2015-12-30 19:32:44'),
(34, 19, 'en', 'Contact', '', NULL, '<p>Contact</p>', '', 'Seo title per  contatc page', 'desc seo desc contact', 'seo key', 0, 0, '2015-12-28 15:19:49', '2016-07-02 10:37:29'),
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
(59, 31, 'it', 'Semi-precious stone workshop - Tajikistan', NULL, NULL, '<p>Project of international cooperation in the Pamirs, sponsored by GIZ and coordinated by CESVI for the development of a local entrepreneurial activity related to the processing and marketing of jewelery in semi-precious stones.</p>\r\n<p><br /> <em>Cliente / client:</em> <strong>GIZ</strong><br /> <em>Anno / year:</em> <strong>2013-14</strong><br /> <em>Luogo / place:</em> <strong>Pamir / Tajikistan</strong></p>', '', '', '', '', 0, 0, '2015-12-31 16:55:11', '2015-12-31 16:55:11'),
(60, 32, 'en', 'Login', '', NULL, '<p>text</p>', '', '', '', '', 0, 0, '2016-08-12 15:27:13', '2016-08-12 15:27:14'),
(61, 32, 'it', 'Login', '', NULL, '', '', '', '', '', 0, 0, '2016-08-12 15:27:14', '2016-08-12 15:27:32');

-- --------------------------------------------------------

--
-- Struttura della tabella `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `replay` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `contacts`
--

INSERT INTO `contacts` (`id`, `subject`, `message`, `name`, `surname`, `email`, `replay`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '12345678', '123456789', 'angelo marco asperti', 'asperti', 'marcoasperti@gmail.com', '', 1, 0, '2016-08-07 11:05:48', '2016-08-07 09:05:48'),
(2, 'a', 'a', 'a', 'a', 'marcoasperti@gmail.com', NULL, 1, 0, '2016-04-27 18:42:21', '2016-04-27 16:42:21'),
(3, 'a', 'a', 'angelo marco asperti', 'asperti', 'marcoasperti@gmail.com', NULL, 1, 0, '2016-04-27 18:42:23', '2016-04-27 16:42:23'),
(4, 'ss', 'sss', 'angelo marco asperti', 'asperti', 'marcoasperti@gmail.com', NULL, NULL, 0, '2016-02-14 12:22:25', '2016-02-14 12:22:25'),
(5, 'aa', 'aa', 'aa', 'aa', 'marco.a@gfstudio.com', NULL, NULL, 0, '2016-07-07 03:29:34', '2016-07-07 03:29:34'),
(6, '', 'aa', '', 'aa', 'marco.a@gfstudio.com', NULL, NULL, 0, '2016-07-07 03:29:49', '2016-07-07 03:29:49'),
(7, 'a', 'aa', 'a', 'aa', 'marco.a@gfstudio.com', NULL, NULL, 0, '2016-07-07 03:33:20', '2016-07-07 03:33:20');

-- --------------------------------------------------------

--
-- Struttura della tabella `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `id_continent` int(11) DEFAULT NULL,
  `eu` tinyint(1) DEFAULT NULL,
  `vat` decimal(4,1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `countries`
--

INSERT INTO `countries` (`id`, `name`, `country_code`, `id_continent`, `eu`, `vat`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Andorra', 'AD', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(2, 'United Arab Emirates', 'AE', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(3, 'Afghanistan', 'AF', NULL, 0, '0.0', 1, NULL, NULL, '2016-08-08 22:00:00', '2016-08-09 11:32:36'),
(4, 'Antigua And Barbuda', 'AG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(5, 'Anguilla', 'AI', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(6, 'Albania', 'AL', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(7, 'Armenia', 'AM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(8, 'Angola', 'AO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(9, 'Antarctica', 'AQ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(10, 'Argentina', 'AR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(11, 'American Samoa', 'AS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(12, 'Austria', 'AT', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(13, 'Australia', 'AU', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(14, 'Aruba', 'AW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(15, 'Aland Islands', 'AX', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(16, 'Azerbaijan', 'AZ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(17, 'Bosnia And Herzegovina', 'BA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(18, 'Barbados', 'BB', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(19, 'Bangladesh', 'BD', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(20, 'Belgium', 'BE', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(21, 'Burkina Faso', 'BF', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(22, 'Bulgaria', 'BG', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(23, 'Bahrain', 'BH', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(24, 'Burundi', 'BI', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(25, 'Benin', 'BJ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(26, 'Saint Barthelemy', 'BL', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(27, 'Bermuda', 'BM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(28, 'Brunei', 'BN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(29, 'Bolivia', 'BO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(30, 'Bonaire, Saint Eustatius And Saba ', 'BQ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(31, 'Brazil', 'BR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(32, 'Bahamas', 'BS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(33, 'Bhutan', 'BT', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(34, 'Bouvet Island', 'BV', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(35, 'Botswana', 'BW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(36, 'Belarus', 'BY', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(37, 'Belize', 'BZ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(38, 'Canada', 'CA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(39, 'Cocos Islands', 'CC', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(40, 'Democratic Republic Of The Congo', 'CD', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(41, 'Central African Republic', 'CF', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(42, 'Republic Of The Congo', 'CG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(43, 'Switzerland', 'CH', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(44, 'Ivory Coast', 'CI', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(45, 'Cook Islands', 'CK', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(46, 'Chile', 'CL', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(47, 'Cameroon', 'CM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(48, 'China', 'CN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(49, 'Colombia', 'CO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(50, 'Costa Rica', 'CR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(51, 'Cuba', 'CU', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(52, 'Cape Verde', 'CV', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(53, 'Curacao', 'CW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(54, 'Christmas Island', 'CX', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(55, 'Cyprus', 'CY', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(56, 'Czech Republic', 'CZ', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(57, 'Germany', 'DE', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(58, 'Djibouti', 'DJ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(59, 'Denmark', 'DK', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(60, 'Dominica', 'DM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(61, 'Dominican Republic', 'DO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(62, 'Algeria', 'DZ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(63, 'Ecuador', 'EC', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(64, 'Estonia', 'EE', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(65, 'Egypt', 'EG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(66, 'Western Sahara', 'EH', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(67, 'Eritrea', 'ER', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(68, 'Spain', 'ES', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(69, 'Ethiopia', 'ET', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(70, 'Finland', 'FI', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(71, 'Fiji', 'FJ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(72, 'Falkland Islands', 'FK', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(73, 'Micronesia', 'FM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(74, 'Faroe Islands', 'FO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(75, 'France', 'FR', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(76, 'Gabon', 'GA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(77, 'United Kingdom', 'GB', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(78, 'Grenada', 'GD', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(79, 'Georgia', 'GE', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(80, 'French Guiana', 'GF', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(81, 'Guernsey', 'GG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(82, 'Ghana', 'GH', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(83, 'Gibraltar', 'GI', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(84, 'Greenland', 'GL', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(85, 'Gambia', 'GM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(86, 'Guinea', 'GN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(87, 'Guadeloupe', 'GP', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(88, 'Equatorial Guinea', 'GQ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(89, 'Greece', 'GR', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(90, 'South Georgia And The South Sandwich Islands', 'GS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(91, 'Guatemala', 'GT', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(92, 'Guam', 'GU', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(93, 'Guinea-Bissau', 'GW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(94, 'Guyana', 'GY', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(95, 'Hong Kong', 'HK', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(96, 'Honduras', 'HN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(97, 'Croatia', 'HR', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(98, 'Haiti', 'HT', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(99, 'Hungary', 'HU', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(100, 'Indonesia', 'ID', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(101, 'Ireland', 'IE', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(102, 'Israel', 'IL', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(103, 'Isle Of Man', 'IM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(104, 'India', 'IN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(105, 'British Indian Ocean Territory', 'IO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(106, 'Iraq', 'IQ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(107, 'Iran', 'IR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(108, 'Iceland', 'IS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(109, 'Italy', 'IT', 0, 1, '22.0', 1, 0, 1, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(110, 'Jersey', 'JE', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(111, 'Jamaica', 'JM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(112, 'Jordan', 'JO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(113, 'Japan', 'JP', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(114, 'Kenya', 'KE', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(115, 'Kyrgyzstan', 'KG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(116, 'Cambodia', 'KH', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(117, 'Kiribati', 'KI', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(118, 'Comoros', 'KM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(119, 'Saint Kitts And Nevis', 'KN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(120, 'North Korea', 'KP', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(121, 'South Korea', 'KR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(122, 'Kuwait', 'KW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(123, 'Cayman Islands', 'KY', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(124, 'Kazakhstan', 'KZ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(125, 'Laos', 'LA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(126, 'Lebanon', 'LB', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(127, 'Saint Lucia', 'LC', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(128, 'Liechtenstein', 'LI', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(129, 'Sri Lanka', 'LK', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(130, 'Liberia', 'LR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(131, 'Lesotho', 'LS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(132, 'Lithuania', 'LT', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(133, 'Luxembourg', 'LU', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(134, 'Latvia', 'LV', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(135, 'Libya', 'LY', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(136, 'Morocco', 'MA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(137, 'Monaco', 'MC', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(138, 'Moldova', 'MD', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(139, 'Montenegro', 'ME', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(140, 'Saint Martin', 'MF', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(141, 'Madagascar', 'MG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(142, 'Marshall Islands', 'MH', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(143, 'Macedonia', 'MK', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(144, 'Mali', 'ML', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(145, 'Myanmar', 'MM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(146, 'Mongolia', 'MN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(147, 'Macao', 'MO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(148, 'Northern Mariana Islands', 'MP', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(149, 'Martinique', 'MQ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(150, 'Mauritania', 'MR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(151, 'Montserrat', 'MS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(152, 'Malta', 'MT', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(153, 'Mauritius', 'MU', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(154, 'Maldives', 'MV', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(155, 'Malawi', 'MW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(156, 'Mexico', 'MX', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(157, 'Malaysia', 'MY', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(158, 'Mozambique', 'MZ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(159, 'Namibia', 'NA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(160, 'New Caledonia', 'NC', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(161, 'Niger', 'NE', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(162, 'Norfolk Island', 'NF', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(163, 'Nigeria', 'NG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(164, 'Nicaragua', 'NI', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(165, 'Netherlands', 'NL', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(166, 'Norway', 'NO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(167, 'Nepal', 'NP', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(168, 'Nauru', 'NR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(169, 'Niue', 'NU', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(170, 'New Zealand', 'NZ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(171, 'Oman', 'OM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(172, 'Panama', 'PA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(173, 'Peru', 'PE', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(174, 'French Polynesia', 'PF', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(175, 'Papua New Guinea', 'PG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(176, 'Philippines', 'PH', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(177, 'Pakistan', 'PK', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(178, 'Poland', 'PL', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(179, 'Saint Pierre And Miquelon', 'PM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(180, 'Puerto Rico', 'PR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(181, 'Palestinian Territory', 'PS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(182, 'Portugal', 'PT', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(183, 'Palau', 'PW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(184, 'Paraguay', 'PY', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(185, 'Qatar', 'QA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(186, 'Reunion', 'RE', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(187, 'Romania', 'RO', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(188, 'Serbia', 'RS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(189, 'Russia', 'RU', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(190, 'Rwanda', 'RW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(191, 'Saudi Arabia', 'SA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(192, 'Solomon Islands', 'SB', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(193, 'Seychelles', 'SC', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(194, 'Sudan', 'SD', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(195, 'Sweden', 'SE', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(196, 'Singapore', 'SG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(197, 'Saint Helena', 'SH', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(198, 'Slovenia', 'SI', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(199, 'Svalbard And Jan Mayen', 'SJ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(200, 'Slovakia', 'SK', 0, 1, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(201, 'Sierra Leone', 'SL', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(202, 'San Marino', 'SM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(203, 'Senegal', 'SN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(204, 'Somalia', 'SO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(205, 'Suriname', 'SR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(206, 'South Sudan', 'SS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(207, 'Sao Tome And Principe', 'ST', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(208, 'El Salvador', 'SV', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(209, 'Sint Maarten', 'SX', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(210, 'Syria', 'SY', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(211, 'Swaziland', 'SZ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(212, 'Turks And Caicos Islands', 'TC', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(213, 'Chad', 'TD', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(214, 'French Southern Territories', 'TF', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(215, 'Togo', 'TG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(216, 'Thailand', 'TH', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(217, 'Tajikistan', 'TJ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(218, 'Tokelau', 'TK', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(219, 'East Timor', 'TL', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(220, 'Turkmenistan', 'TM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(221, 'Tunisia', 'TN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(222, 'Tonga', 'TO', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(223, 'Turkey', 'TR', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(224, 'Trinidad And Tobago', 'TT', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(225, 'Tuvalu', 'TV', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(226, 'Taiwan', 'TW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(227, 'Tanzania', 'TZ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(228, 'Ukraine', 'UA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(229, 'Uganda', 'UG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(230, 'United States Minor Outlying Islands', 'UM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(231, 'United States', 'US', 0, 0, '0.0', 1, 0, 1, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(232, 'Uruguay', 'UY', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(233, 'Uzbekistan', 'UZ', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(234, 'Saint Vincent And The Grenadines', 'VC', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(235, 'Venezuela', 'VE', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(236, 'British Virgin Islands', 'VG', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(237, 'U.S. Virgin Islands', 'VI', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(238, 'Vietnam', 'VN', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(239, 'Vanuatu', 'VU', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(240, 'Wallis And Futuna', 'WF', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(241, 'Samoa', 'WS', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(242, 'Kosovo', 'XK', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(243, 'Yemen', 'YE', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(244, 'Mayotte', 'YT', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(245, 'South Africa', 'ZA', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(246, 'Zambia', 'ZM', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00'),
(247, 'Zimbabwe', 'ZW', 0, 0, '0.0', 1, 0, 0, '2016-08-08 22:00:00', '2016-08-08 22:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `pub` tinyint(4) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `domains`
--

INSERT INTO `domains` (`id`, `title`, `value`, `domain`, `sort`, `pub`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '', '', 'imagetype', 10, 1, 0, NULL, '2016-06-23 05:36:42', '2016-06-28 05:58:39'),
(2, '', '', 'imagetype', 20, 1, 0, NULL, '2016-06-23 05:38:24', '2016-06-28 05:59:19'),
(21, '', 'template_sottopagine', 'template', 30, 1, 0, NULL, '2016-06-28 11:18:04', '2016-06-30 02:47:51');

-- --------------------------------------------------------

--
-- Struttura della tabella `domain_translations`
--

CREATE TABLE IF NOT EXISTS `domain_translations` (
  `id` int(10) unsigned NOT NULL,
  `domain_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `update_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `domain_translations`
--

INSERT INTO `domain_translations` (`id`, `domain_id`, `locale`, `title`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'it', 'Top Header Slider', 0, '2016-06-23 05:36:42', '2016-06-28 05:58:39'),
(2, 1, 'en', 'Top Header Slider', 0, '2016-06-23 05:36:42', '2016-06-28 05:58:39'),
(7, 2, 'it', 'Bottom Slider Image', 0, '2016-06-23 05:38:24', '2016-06-28 05:59:19'),
(8, 2, 'en', 'Bottom Slider Image', 0, '2016-06-23 05:38:24', '2016-08-12 12:06:53'),
(121, 21, 'it', 'Template con sottopagine', 0, '2016-06-28 11:18:04', '2016-07-04 05:38:10'),
(122, 21, 'en', '', 0, '2016-06-28 11:18:04', '2016-06-28 11:18:04');

-- --------------------------------------------------------

--
-- Struttura della tabella `hpsliders`
--

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
(4, 'DESIGN FORWARDERS', 'Maximum creativity together with strategy to make each project a success', NULL, '24655_header2.jpg', '', 'design-forwarders', 20, 1, 0, '2016-04-27 18:44:32', '2016-04-27 16:44:32'),
(5, 'QUIET & POWERFUL', 'Design to embrace and provoke new ways of thinking and doing', NULL, '78781_header3.jpg', '', 'quiet-powerful', 30, 1, 0, '2015-12-29 10:15:18', '2015-12-29 09:15:18'),
(11, 'WE DESIGN EVERYTHING', 'Maximum creativity together with strategy to make each project a success', NULL, '45952_header4.jpg', '', 'we-design-everything', 40, 1, 0, '2015-12-29 10:15:20', '2015-12-29 09:15:20');

-- --------------------------------------------------------

--
-- Struttura della tabella `media`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `media`
--

INSERT INTO `media` (`id`, `media_category_id`, `model_id`, `model_type`, `collection_name`, `name`, `description`, `file_name`, `file_ext`, `disk`, `size`, `manipulations`, `pub`, `sort`, `created_at`, `updated_at`) VALUES
(2, 0, 1, 'App\\Article', 'images', '', '', '20171-download-1.jpg', 'jpg', 'images', 4566, '', 1, NULL, '2016-08-12 15:41:02', '2016-08-12 13:41:02'),
(4, 0, 15, 'App\\News', 'images', '', '', '14230-casa-in-tronchi-tecnica-blockbau-val-bedretto-005.JPG', 'JPG', 'images', 362328, '', 1, NULL, '2016-08-12 14:07:26', '2016-08-12 12:07:26'),
(5, 0, 15, 'App\\News', 'images', '', '', '53434-casa-in-tronchi-tecnica-blockbau-val-bedretto-001.JPG', 'JPG', 'images', 479210, '', 1, NULL, '2016-07-31 06:05:09', '2016-07-31 06:05:09'),
(6, 0, 15, 'App\\News', 'images', '', '', '89076-casa-in-tronchi-tecnica-blockbau-val-bedretto-002.JPG', 'JPG', 'images', 541356, '', 1, NULL, '2016-07-31 06:05:10', '2016-07-31 06:05:10'),
(7, 0, 15, 'App\\News', 'images', '', '', '27753-casa-in-tronchi-tecnica-blockbau-val-bedretto-006.JPG', 'JPG', 'images', 248876, '', 1, NULL, '2016-07-31 06:05:10', '2016-07-31 06:05:10'),
(8, 0, 15, 'App\\News', 'images', '', '', '96568-casa-in-tronchi-tecnica-blockbau-val-bedretto-004.JPG', 'JPG', 'images', 289768, '', 1, NULL, '2016-07-31 06:05:10', '2016-07-31 06:05:10'),
(9, 0, 15, 'App\\News', 'images', '', '', '18890-casa-in-tronchi-tecnica-blockbau-val-bedretto-003.JPG', 'JPG', 'images', 402617, '', 1, NULL, '2016-07-31 06:05:10', '2016-07-31 06:05:10'),
(10, 0, 17, 'App\\News', 'images', '', '', '77265-immagine3321312.png', 'png', 'images', 97616, '', 1, NULL, '2016-07-31 06:27:34', '2016-07-31 06:27:34'),
(14, 0, 17, 'App\\News', 'images', '', '', 'Senza-titolo-1.png', 'png', 'images', 6332, '', 1, NULL, '2016-07-31 06:42:30', '2016-07-31 06:42:30'),
(21, 0, 17, 'App\\News', 'docs', '', '', 'ContabileF24.pdf', 'pdf', 'docs', 1239692, '', 1, NULL, '2016-07-31 06:52:09', '2016-07-31 06:52:09'),
(22, 0, 17, 'App\\News', 'docs', '', '', '34396-contabilef24.pdf', 'pdf', 'docs', 1239692, '', 1, NULL, '2016-07-31 06:52:16', '2016-07-31 06:52:16'),
(23, 0, 20, 'App\\Article', 'images', '', '', 'azienda.jpg', 'jpg', 'images', 70552, '', 1, NULL, '2016-08-12 13:34:53', '2016-08-12 13:34:53'),
(24, 0, 20, 'App\\Article', 'images', '', '', '71522-azienda.jpg', 'jpg', 'images', 70552, '', 1, NULL, '2016-08-12 13:35:12', '2016-08-12 13:35:12'),
(25, 0, 1, 'App\\Article', 'images', '', '', 'servizi.jpg', 'jpg', 'images', 214774, '', 1, NULL, '2016-08-12 13:35:39', '2016-08-12 13:35:39'),
(26, 0, 1, 'App\\Article', 'docs', '', '', 'notify.min.js', 'js', 'docs', 13641, '', 1, NULL, '2016-08-12 13:37:34', '2016-08-12 13:37:34'),
(27, 0, 1, 'App\\Article', 'images', '', '', 'agrodolce.jpg', 'jpg', 'images', 31721, '', 1, NULL, '2016-08-12 15:41:55', '2016-08-12 13:41:55'),
(28, 0, 1, 'App\\Article', 'images', '', '', '64154-agrodolce.jpg', 'jpg', 'images', 31721, '', 1, NULL, '2016-08-12 13:45:32', '2016-08-12 13:45:32'),
(29, 0, 1, 'App\\News', 'images', '', '', '76326-azienda.jpg', 'jpg', 'images', 70552, '', 1, NULL, '2016-08-12 15:52:06', '2016-08-12 13:52:06');

-- --------------------------------------------------------

--
-- Struttura della tabella `media_translations`
--

CREATE TABLE IF NOT EXISTS `media_translations` (
  `id` int(10) unsigned NOT NULL,
  `media_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `media_translations`
--

INSERT INTO `media_translations` (`id`, `media_id`, `locale`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'en', 'tile', '', '2016-08-12 15:40:57', '2016-08-12 13:40:57'),
(4, 4, 'en', '14230-casa-in-tronchi-tecnica-blockbau-val-bedretto-005.JPG', '', '2016-07-31 06:05:09', '2016-07-31 06:05:09'),
(5, 5, 'en', '53434-casa-in-tronchi-tecnica-blockbau-val-bedretto-001.JPG', '', '2016-07-31 06:05:09', '2016-07-31 06:05:09'),
(6, 6, 'en', '89076-casa-in-tronchi-tecnica-blockbau-val-bedretto-002.JPG', '', '2016-07-31 06:05:10', '2016-07-31 06:05:10'),
(7, 7, 'en', '27753-casa-in-tronchi-tecnica-blockbau-val-bedretto-006.JPG', '', '2016-07-31 06:05:10', '2016-07-31 06:05:10'),
(8, 8, 'en', '96568-casa-in-tronchi-tecnica-blockbau-val-bedretto-004.JPG', '', '2016-07-31 06:05:10', '2016-07-31 06:05:10'),
(9, 9, 'en', '18890-casa-in-tronchi-tecnica-blockbau-val-bedretto-003.JPG', '', '2016-07-31 06:05:10', '2016-07-31 06:05:10'),
(10, 10, 'en', '77265-immagine3321312.png', '', '2016-07-31 06:27:34', '2016-07-31 06:27:34'),
(14, 14, 'en', 'Senza-titolo-1.png', '', '2016-07-31 06:42:30', '2016-07-31 06:42:30'),
(21, 21, 'en', 'ContabileF24.pdf', '', '2016-07-31 06:52:09', '2016-07-31 06:52:09'),
(22, 22, 'en', '34396-contabilef24.pdf', '', '2016-07-31 06:52:16', '2016-07-31 06:52:16'),
(23, 4, 'it', '', '', '2016-08-12 12:07:26', '2016-08-12 12:07:26'),
(24, 23, 'en', 'azienda.jpg', '', '2016-08-12 13:34:53', '2016-08-12 13:34:53'),
(25, 24, 'en', '71522-azienda.jpg', '', '2016-08-12 13:35:12', '2016-08-12 13:35:12'),
(26, 25, 'en', 'servizi.jpg', '', '2016-08-12 13:35:39', '2016-08-12 13:35:39'),
(27, 26, 'en', 'notify.min.js', '', '2016-08-12 13:37:34', '2016-08-12 13:37:34'),
(28, 27, 'en', 'agrodolce.jpg', '', '2016-08-12 13:40:01', '2016-08-12 13:40:01'),
(29, 2, 'it', 'titlr', '', '2016-08-12 13:40:58', '2016-08-12 13:40:58'),
(30, 27, 'it', '', '', '2016-08-12 13:41:55', '2016-08-12 13:41:55'),
(31, 28, 'en', '64154-agrodolce.jpg', '', '2016-08-12 13:45:32', '2016-08-12 13:45:32'),
(32, 29, 'en', 'titolo', '', '2016-08-12 15:52:06', '2016-08-12 13:52:06'),
(33, 29, 'it', 'title', '', '2016-08-12 13:52:06', '2016-08-12 13:52:06');

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

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
('2016_01_09_213704_create_tags_table', 10),
('2016_01_23_141830_create_contact_table', 11),
('2016_01_23_141830_create_contacts_table', 12),
('2016_01_27_195512_create_adminusers_table', 12),
('2016_07_31_090641_create_role_adminuser_table', 13),
('2016_08_09_125134_create_countries_table', 14),
('2016_08_09_135031_create_settings_table', 14),
('2016_08_12_133839_create_domians_table', 15),
('2016_08_12_134137_create_domains_table', 16),
('2016_08_12_134748_create_domain_table', 17);

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

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
(1, '', '2015-12-20', '', '', NULL, NULL, '', 'best-wisth', '', '12676-bf2016.jpg', '', '', 0, 0, 0, '2016-08-12 15:59:05', '2016-08-12 13:59:05'),
(15, '', '2016-01-06', '', '', NULL, NULL, '', 'we-are-the-new-italian-design', '', '84391-the-new-italian-design.jpg', '', '', 0, 1, 0, '2016-08-12 17:04:21', '2016-08-12 15:04:21'),
(17, '', '2015-11-09', '', '', NULL, NULL, '', 'design-for-business-competitiveness', '', '93625-senza-titolo-1.png', '', '', 0, 1, 0, '2016-07-31 08:41:42', '2016-07-31 06:41:42');

-- --------------------------------------------------------

--
-- Struttura della tabella `news_tag`
--

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
(1, 1, '2016-01-10 13:23:27', '0000-00-00 00:00:00'),
(15, 2, '2016-01-10 13:24:31', '0000-00-00 00:00:00'),
(1, 3, '2016-01-10 13:24:45', '0000-00-00 00:00:00'),
(17, 2, '2016-01-10 13:27:47', '0000-00-00 00:00:00'),
(15, 4, '2016-08-12 17:04:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `news_translations`
--

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
(29, 15, 'en', 'WE ARE THE NEW ITALIAN DESIGN', '<p>On the occasion of Gwangju Design Biennale 2015, we are with Triennale Design Museum presenting&nbsp;an upgraded and updated edition of The New Italian Design from October 15th until November 13th 201...</p>', NULL, NULL, NULL, 'ffsfdsf', 'ffsdfsfdsfds', 'sdfdsfds', 0, 0, '2016-07-02 13:13:59', '2016-07-02 11:13:59'),
(30, 15, 'it', '', '', NULL, NULL, NULL, '', '', '', 0, 0, '2016-01-06 22:29:25', '2016-01-06 22:29:25'),
(33, 17, 'en', 'DESIGN FOR BUSINESS COMPETITIVENESS', '<p>Edoardo Perri is guest-lecturer @ &ldquo;DESIGN FOR COMPETITIVENESS&rdquo;, Toscany. The meeting aims to present case studies of companies who have walked the path of a design-driven innovation in all its forms, from product to communication - through the story of the protagonists.</p>', NULL, NULL, NULL, '', 'Edoardo Perri', '', 0, 0, '2016-07-02 13:45:23', '2016-07-02 11:45:23'),
(34, 17, 'it', 'DESIGN FOR BUSINESS COMPETITIVENESS', '<p>Edoardo Perri is guest-lecturer @ &ldquo;DESIGN FOR COMPETITIVENESS&rdquo;, Toscany. The meeting aims to present case studies of companies who have walked the path of a design-driven innovation in all its forms, from product to communication - through the story of the protagonists.</p>', NULL, NULL, NULL, '', '', '', 0, 0, '2016-01-09 19:56:17', '2016-01-09 19:56:17');

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('marcoasperti@gmail.com', '8eec4d6ec69e9a6f68a53a0cbe05cdd9363af8d8c266456c1f6ffd9070978304', '2016-08-13 07:52:25'),
('userslaracms@gmail.com', '75edb811ba593a2724deb5ced59eee6cfcaac0978a9300f96a2777b5fbdb8dc4', '2016-08-13 08:02:19');

-- --------------------------------------------------------

--
-- Struttura della tabella `permissions`
--

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

CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

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
-- Struttura della tabella `role_adminuser`
--

CREATE TABLE IF NOT EXISTS `role_adminuser` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `role_adminuser`
--

INSERT INTO `role_adminuser` (`user_id`, `role_id`) VALUES
(3, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(5, 1),
(4, 2),
(4, 3),
(5, 3),
(4, 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `description`, `domain`, `created_at`, `updated_at`) VALUES
(1, 'GA_UA_CODE', 'UA-1', 'Google  analitycs  code', 'GA', '2016-08-12 11:18:33', '2016-08-12 11:18:33');

-- --------------------------------------------------------

--
-- Struttura della tabella `socials`
--

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
(1, 'facebook', '', 'fa-facebook', '', 'https://www.facebook.com/', 10, 1, 0, '2016-04-27 18:44:58', '2016-04-27 16:44:58'),
(2, 'Twitter', '', 'fa-twitter', '', 'https://twitter.com/?lang=it', 20, 1, 0, '2015-12-23 20:25:38', '2015-12-23 20:25:38'),
(3, 'Linkedin', '', 'fa-linkedin', '', 'https://www.linkedin.com/in/marcoax', 30, 1, 0, '2015-12-30 18:32:16', '2015-12-30 17:32:16'),
(4, 'Github', '', 'fa-github', '', 'https://github.com/marcoax', 0, 1, 0, '2015-12-23 21:57:46', '2015-12-23 20:57:46');

-- --------------------------------------------------------

--
-- Struttura della tabella `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `update_by` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, '', 'research', 0, 0, '2016-01-10 09:40:24', '2016-01-10 08:40:24'),
(2, '', 'project', 0, 0, '2016-01-10 08:40:41', '2016-01-10 08:40:41'),
(3, '', 'creolo', 0, 0, '2016-01-10 12:24:19', '2016-01-10 12:24:19'),
(4, '', 'sex', 0, 0, '2016-04-27 16:45:52', '2016-04-27 16:45:52');

-- --------------------------------------------------------

--
-- Struttura della tabella `tag_translations`
--

CREATE TABLE IF NOT EXISTS `tag_translations` (
  `id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `tag_id`, `locale`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Research', '2016-01-10 09:40:24', '2016-01-10 08:40:24'),
(2, 2, 'en', 'Project', '2016-01-10 09:41:02', '2016-01-10 08:41:02'),
(3, 2, 'it', 'progetti', '2016-01-10 08:45:17', '2016-01-10 08:45:17'),
(4, 3, 'en', 'Creolo', '2016-01-10 13:25:02', '2016-01-10 12:25:02'),
(5, 3, 'it', 'Creolo', '2016-01-10 13:25:02', '2016-01-10 12:25:02'),
(6, 4, 'en', 'sex', '2016-04-27 16:45:52', '2016-04-27 16:45:52'),
(7, 4, 'it', 'sex', '2016-04-27 16:45:52', '2016-04-27 16:45:52');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `real_password`, `remember_token`, `created_at`, `updated_at`, `is_active`) VALUES
(4, 'guest', 'guest@laraCms.com', '$2y$10$pAaDDP9X4hOJLOz0qxr1Ae/GTSbhNQSsd3yqVpvm4392eeavaq586', 'laracms', 'wFcX4LOGC9AhAxgNKItmGtJCwYvKlnv68No3xupJ4C5K2yE3ATVygr2XydyU', '2015-12-20 18:57:51', '2016-08-13 07:56:49', 1),
(5, 'user', 'userslaracms@gmail.com', '$2y$10$tWaDIGmGph0CPGoV9us5d.2QDHgQ6bZeCLiMQObnFui4AY/SRaQK2', 'laracms', 'MGQudVZ3iYRtza1sidH88Atw4Z8RaRzr8MbGIAgp5Vmf1KKG9V8uNiSdyntx', '2016-01-23 17:52:48', '2016-08-13 08:02:31', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`), ADD KEY `title` (`title`);

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
-- Indexes for table `role_adminuser`
--
ALTER TABLE `role_adminuser`
  ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `role_adminuser_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `settings_key_unique` (`key`), ADD KEY `settings_id_index` (`id`);

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
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `article_translations`
--
ALTER TABLE `article_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `hpsliders`
--
ALTER TABLE `hpsliders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `media_translations`
--
ALTER TABLE `media_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
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
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
-- Limiti per la tabella `role_adminuser`
--
ALTER TABLE `role_adminuser`
ADD CONSTRAINT `role_adminuser_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `role_adminuser_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `adminusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

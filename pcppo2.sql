-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 24, 2025 at 11:58 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcppo2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bairros`
--

DROP TABLE IF EXISTS `bairros`;
CREATE TABLE IF NOT EXISTS `bairros` (
  `id_bairro` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_bairro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_distrito` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bairro`),
  KEY `bairros_id_distrito_foreign` (`id_distrito`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bairros`
--

INSERT INTO `bairros` (`id_bairro`, `nome_bairro`, `id_distrito`, `created_at`, `updated_at`) VALUES
(1, 'Mafalala', 1, '2025-05-02 16:53:50', '2025-05-04 16:32:26'),
(2, 'Polana Caniço', 1, '2025-05-02 16:53:58', '2025-05-02 16:53:58'),
(3, 'Maxaqueni', 1, '2025-05-02 16:56:51', '2025-05-02 16:56:51'),
(4, 'Mahotas', 2, '2025-05-21 13:35:27', '2025-05-21 13:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultas_publicas`
--

DROP TABLE IF EXISTS `consultas_publicas`;
CREATE TABLE IF NOT EXISTS `consultas_publicas` (
  `id_consulta` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `genero` enum('masculino','feminino','outro') COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_bi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bairro` bigint UNSIGNED NOT NULL,
  `id_plano` bigint UNSIGNED NOT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci,
  `ficheiro_upload` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_consulta`),
  UNIQUE KEY `consultas_publicas_numero_bi_unique` (`numero_bi`),
  KEY `consultas_publicas_id_bairro_foreign` (`id_bairro`),
  KEY `consultas_publicas_id_plano_foreign` (`id_plano`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultas_publicas`
--

INSERT INTO `consultas_publicas` (`id_consulta`, `nome_completo`, `data_nascimento`, `genero`, `numero_bi`, `email`, `id_bairro`, `id_plano`, `comentario`, `ficheiro_upload`, `created_at`, `updated_at`) VALUES
(7, 'carlos', '2003-07-15', 'masculino', '32432432432qa', 'carlos.capitine222@outlook.com', 2, 5, 'jjhh', 'uploads/consultas/TH64MvL4QJOOviElpXU0fYa2hWdfL3vSSGhlkFna.docx', '2025-05-15 15:35:04', '2025-05-15 15:35:04'),
(8, 'carlos', '2004-02-15', 'masculino', '3243243q', 'carlos.capitine5@outlook.com', 2, 5, 'kkkjjjj', 'uploads/consultas/tDE7H52qMSwkJcNrIQZvjUGpzvp1y72STWn98mSl.docx', '2025-05-15 15:40:24', '2025-05-15 15:40:24'),
(9, 'carlosjj', '2000-01-17', 'masculino', '32432433', 'carlos.capitine55@outlook.com', 2, 5, 'sdfsfsdfkkkkkkkjj', 'uploads/consultas/3ZDlLd6njTW3SkPeLKDkSXKo1IDiGQYbqGyXFr1w.png', '2025-05-17 12:09:16', '2025-05-17 12:09:16'),
(10, 'HEITON TEMBE', '2004-06-21', 'masculino', '32432432E', 'carlos2@example.com', 2, 5, 'YYYYYY', 'uploads/consultas/2dxHvPS7IRlk3vE8p7EM781hOvgMv3YmkUcI2Sik.pdf', '2025-05-21 13:25:23', '2025-05-21 13:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `contribuicoes`
--

DROP TABLE IF EXISTS `contribuicoes`;
CREATE TABLE IF NOT EXISTS `contribuicoes` (
  `id_contribuicao` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_contribuicao` enum('sugestao','reclamacao','pedido_esclarecimento') COLLATE utf8mb4_unicode_ci NOT NULL,
  `assunto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensagem` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_plano` bigint UNSIGNED DEFAULT NULL,
  `nome_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto_telefonico` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anexo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_contribuicao`),
  KEY `contribuicoes_id_plano_foreign` (`id_plano`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contribuicoes`
--

INSERT INTO `contribuicoes` (`id_contribuicao`, `tipo_contribuicao`, `assunto`, `mensagem`, `id_plano`, `nome_completo`, `email`, `contacto_telefonico`, `anexo`, `created_at`, `updated_at`) VALUES
(1, 'sugestao', 'fdsfdsfsd', 'sdfdsfdsf', 6, 'Carlos Mutemba', 'capitine2000@gmail.com', '842976341', 'uploads/contribuicoes/XCaNHhPObBUxGAqMNvqb9eBEn6a7aVqQZF5IwH8Y.docx', '2025-04-22 14:24:28', '2025-04-22 14:24:28'),
(2, 'sugestao', 'Parcelamento .......', 'sdfsfdsfdsfdsfdsfdsf', 6, 'Carlos Mutemba', 'carlos2@example.com', '87123335', 'uploads/contribuicoes/7LFw9A87EnxgOQhgzcfnrD22WwwFaU7EL96mqCZq.docx', '2025-05-15 16:25:41', '2025-05-15 16:25:41'),
(3, 'reclamacao', 'Parcelamento .......', 'sdfsfdsfdsfdsfdsfdsf', 6, 'Carlos Mutemba', 'carlos2@example.com', '87123335', 'uploads/contribuicoes/CGPqCwwE9WGigNQDK8exJxrg5ti2yjXJDEyh6N9A.docx', '2025-05-15 16:26:46', '2025-05-15 16:26:46'),
(4, 'pedido_esclarecimento', 'gfgfdgdfgfdg', 'dgdsgdsfdsfdsfdsfdsfdsfdsdf', 5, 'Carlos Capitine', 'capitine2000@gmail.com', '87123335', 'uploads/contribuicoes/g8p2xs3Ui2m13lMxzAVsBswsA8EKahHZBxjNc5D0.jpg', '2025-05-17 12:10:31', '2025-05-17 12:10:31'),
(5, 'pedido_esclarecimento', 'gfgfdgdfgfdg', 'ftteste', 7, 'Carlos Capitine', 'capitine2000@gmail.com', '87123335', 'uploads/contribuicoes/F2CsihRpiYj0bT5VOcTSECG4zuhu1qoXlBatrOgs.docx', '2025-05-21 13:18:25', '2025-05-21 13:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `distritos`
--

DROP TABLE IF EXISTS `distritos`;
CREATE TABLE IF NOT EXISTS `distritos` (
  `id_distrito` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_distrito` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_distrito`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distritos`
--

INSERT INTO `distritos` (`id_distrito`, `nome_distrito`, `created_at`, `updated_at`) VALUES
(1, 'KaMaxakene', '2025-04-12 10:49:33', '2025-04-12 10:49:33'),
(2, 'KaMavota', '2025-04-12 10:49:33', '2025-04-12 10:49:33'),
(3, 'KaTembe22', '2025-05-21 13:34:31', '2025-05-21 13:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `documentacao_planos`
--

DROP TABLE IF EXISTS `documentacao_planos`;
CREATE TABLE IF NOT EXISTS `documentacao_planos` (
  `documentoplano_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_documento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`documentoplano_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documentacao_planos`
--

INSERT INTO `documentacao_planos` (`documentoplano_id`, `nome_documento`, `created_at`, `updated_at`) VALUES
(1, 'Minuta do Plano (PDF, DOC)', '2025-04-18 14:37:22', '2025-04-18 14:37:22'),
(2, 'Mapas Geoespaciais (SIG, KML, GeoJSON)', '2025-04-18 14:37:22', '2025-04-18 14:37:22'),
(3, 'Relatório Técnico Preliminar', '2025-04-18 14:37:22', '2025-04-18 14:37:22'),
(4, 'Estudos de Impacto Ambiental e Social', '2025-04-18 14:37:22', '2025-04-18 14:37:22'),
(7, 'Imagens Ilustrativas', '2025-04-18 15:05:45', '2025-04-18 15:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `id_documento` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `documentoplano_id` bigint UNSIGNED NOT NULL,
  `id_plano` bigint UNSIGNED NOT NULL,
  `nome_documento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_documento`),
  UNIQUE KEY `unique_documento_combination` (`id_documento`,`documentoplano_id`,`id_plano`),
  KEY `documentos_documentoplano_id_foreign` (`documentoplano_id`),
  KEY `documentos_id_plano_foreign` (`id_plano`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`id_documento`, `documentoplano_id`, `id_plano`, `nome_documento`, `path`, `created_at`, `updated_at`) VALUES
(5, 1, 5, 'Minuta do Plano', 'uploads/documentos/RjET3lFEieLIRLPj5O3l9SNsAYss7rmeBlm5MicL.docx', '2025-04-19 12:28:26', '2025-04-19 12:28:26'),
(6, 2, 5, 'Mapas Geoespaciais', 'uploads/documentos/Bd3tAtK4QLJurUYoHFI3kbITftydnLJFsv2QMVzn.docx', '2025-04-19 12:28:26', '2025-04-19 12:28:26'),
(7, 3, 5, 'Relatório Técnico Preliminar', 'uploads/documentos/MkG1T0qFb2hhKHcdY0KoKGBi9o6A8WDM97UI0LWn.docx', '2025-04-19 12:28:26', '2025-04-19 12:28:26'),
(8, 4, 5, 'Estudos de Impacto Ambiental e Social', 'uploads/documentos/z4ReK7xi0mA7mnoug0hhXQ2gJFOEP6TlDOH58xtE.docx', '2025-04-19 12:28:26', '2025-04-19 12:28:26'),
(9, 1, 6, 'Minuta do Plano', 'uploads/documentos/kQfLWdclSOCKphHYNAR8KsWEJ5kWQheEKDRFkLLr.docx', '2025-04-19 12:41:57', '2025-04-19 12:41:57'),
(10, 2, 6, 'Mapas Geoespaciais', 'uploads/documentos/Wl8XHB6Yob33rlPSLN35dDXtHD2QOiXsfrBPLkEH.docx', '2025-04-19 12:41:57', '2025-04-19 12:41:57'),
(11, 3, 6, 'Relatório Técnico Preliminar', 'uploads/documentos/glULByucWqx6Y7QJE02OO9Ty3yGUBk5wCcItvyBp.docx', '2025-04-19 12:41:57', '2025-04-19 12:41:57'),
(12, 4, 6, 'Estudos de Impacto Ambiental e Social', 'uploads/documentos/sEhKcNAL02s5vBH4m2JxD3qOgo5AmKFH9PxabCMH.docx', '2025-04-19 12:41:57', '2025-04-19 12:41:57'),
(13, 1, 12, 'Minuta do Plano', 'uploads/documentos/jV3Nv3EKHpHixzinmBVZF3wHv21UqNXlmIP8W2yR.pdf', '2025-05-17 13:54:28', '2025-05-17 13:54:28'),
(14, 2, 12, 'Mapas Geoespaciais', 'uploads/documentos/UPaRiUY9QGLSV1lR5eAqlQFQFfGR2q4M52JYQQ20.pdf', '2025-05-17 13:54:28', '2025-05-17 13:54:28'),
(15, 3, 12, 'Relatório Técnico Preliminar', 'uploads/documentos/HOXHb44JyzTFqXF1YsBF6TQz4vaefE367Yw4LPF1.pdf', '2025-05-17 13:54:28', '2025-05-17 13:54:28'),
(16, 4, 12, 'Estudos de Impacto Ambiental e Social', 'uploads/documentos/ralmV9HuPkw75LE5zoMfBLg3gwWCB7Bfun0FNHa1.pdf', '2025-05-17 13:54:28', '2025-05-17 13:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `eventos_participacao_publica`
--

DROP TABLE IF EXISTS `eventos_participacao_publica`;
CREATE TABLE IF NOT EXISTS `eventos_participacao_publica` (
  `id_evento` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_evento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_hora` datetime NOT NULL,
  `local` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_evento` enum('audiencia_publica','reuniao_comunitaria','sessao_tecnica','outro') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_plano` bigint UNSIGNED DEFAULT NULL,
  `organizador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_inscricao` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anexo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `eventos_participacao_publica_id_plano_foreign` (`id_plano`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eventos_participacao_publica`
--

INSERT INTO `eventos_participacao_publica` (`id_evento`, `nome_evento`, `descricao`, `data_hora`, `local`, `tipo_evento`, `id_plano`, `organizador`, `contacto`, `link_inscricao`, `anexo`, `created_at`, `updated_at`) VALUES
(1, 'cvfdfgdgd', 'dxcdfd', '2025-04-22 20:53:00', 'Maputo', 'audiencia_publica', NULL, 'fdsfdfsdfdsfs', 'sfds', 'http://www.up.ac.mz', 'uploads/eventos/JdCaD6ExseSHe8bGcb4Qyp2U5lAZngtthk0LRdIL.docx', '2025-04-22 16:54:42', '2025-04-22 16:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_12_102345_create_distritos_table', 1),
(5, '2025_04_12_102501_create_tipo_planos_table', 1),
(6, '2025_04_12_103109_create_planos_table', 1),
(7, '2025_04_12_104014_create_documentacao_planos_table', 1),
(8, '2025_04_12_104512_create_documentos_table', 2),
(9, '2025_04_12_111739_create_bairros_table', 3),
(10, '2025_04_13_142117_add_id_tipo_plano_to_planos_table', 4),
(11, '2025_04_13_162428_rename_objectivo_do_plano_to_objectivos_in_planos_table', 5),
(12, '2025_04_13_163318_modify_objectivos_nullable_in_planos_table', 6),
(13, '2025_04_18_190704_add_data_elaboracao_to_planos_table', 7),
(14, '2025_04_22_152342_add_tipo_plano_programa_projeto_to_planos_table', 8),
(15, '2025_04_22_154712_create_contribuicoes_table', 9),
(16, '2025_04_22_162839_create_propostas_comunitarias_table', 10),
(17, '2025_04_22_162840_create_eventos_participacao_publica_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `planos`
--

DROP TABLE IF EXISTS `planos`;
CREATE TABLE IF NOT EXISTS `planos` (
  `id_plano` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_distrito` bigint UNSIGNED DEFAULT NULL,
  `id_tipo_plano` bigint UNSIGNED DEFAULT NULL,
  `nome_plano` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_inicio` date NOT NULL,
  `data_elaboracao` date DEFAULT NULL,
  `data_fim` date NOT NULL,
  `area_abrangida` double NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `densidade_habitantes` double NOT NULL,
  `descricao_plano` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `objectivos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_plano_programa_projeto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_plano`),
  KEY `planos_id_tipo_plano_foreign` (`id_tipo_plano`),
  KEY `planos_id_distrito_foreign` (`id_distrito`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `planos`
--

INSERT INTO `planos` (`id_plano`, `id_distrito`, `id_tipo_plano`, `nome_plano`, `data_inicio`, `data_elaboracao`, `data_fim`, `area_abrangida`, `latitude`, `longitude`, `densidade_habitantes`, `descricao_plano`, `created_at`, `updated_at`, `objectivos`, `tipo_plano_programa_projeto`) VALUES
(5, 2, 3, 'Plano de aaaa', '2025-04-19', NULL, '2025-07-19', 5543.98, 9, 85, 7000, 'hgghghg', '2025-04-19 12:28:26', '2025-05-21 13:31:48', 'dsfsdfds', 'plano'),
(6, 1, 4, 'Plano de de Restrutucação', '2025-04-19', NULL, '2025-11-07', 5543.98, 9, 88, 7000, 'sdfsdfsdfsd', '2025-04-19 12:41:57', '2025-05-17 13:13:20', 'bhbghbhb', 'plano'),
(7, 1, 3, 'Projecto de Construção de Edifícios', '2025-06-26', NULL, '2026-03-14', 0.5, 56, 90, 1000, 'hjhghghghgh', '2025-05-17 13:25:47', '2025-05-17 13:43:37', 'ss', NULL),
(11, NULL, 1, 'Projecto de Construção de Edifícios', '2025-07-12', NULL, '2026-07-03', 0.5, 56, 90, 1000, 'jjhhhhh', '2025-05-17 13:52:25', '2025-05-17 13:52:25', NULL, NULL),
(12, 1, 1, 'Projecto de Construção de Edifícios', '2025-07-12', NULL, '2026-07-03', 0.5, 56, 90, 1000, 'jjhhhhh', '2025-05-17 13:54:28', '2025-05-18 11:37:21', 'yyyyyy', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `propostas_comunitarias`
--

DROP TABLE IF EXISTS `propostas_comunitarias`;
CREATE TABLE IF NOT EXISTS `propostas_comunitarias` (
  `id_proposta` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_proponente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bairro` bigint UNSIGNED NOT NULL,
  `descricao_proposta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_intervencao` enum('infraestrutura','espaco_publico','equipamento_social','uso_do_solo','outro') COLLATE utf8mb4_unicode_ci NOT NULL,
  `localizacao` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documento_apoio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_proposta`),
  KEY `propostas_comunitarias_id_bairro_foreign` (`id_bairro`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `propostas_comunitarias`
--

INSERT INTO `propostas_comunitarias` (`id_proposta`, `nome_proponente`, `contacto`, `id_bairro`, `descricao_proposta`, `tipo_intervencao`, `localizacao`, `documento_apoio`, `created_at`, `updated_at`) VALUES
(1, 'carlos', 'carlos.capitine@outlook.com', 2, 'dfsfsfs', 'espaco_publico', 'Mafalala', NULL, '2025-05-15 16:55:39', '2025-05-15 16:55:39'),
(2, 'carlos', 'carlos.capitine2@outlook.com', 2, 'ddsfdsf', 'equipamento_social', 'Mafalala', 'C:\\wamp64\\tmp\\php4885.tmp', '2025-05-15 17:04:24', '2025-05-15 17:04:24'),
(3, 'carlos', 'carlos.capitine2@outlook.com', 3, 'dfdsfdsfdsfsds', 'equipamento_social', 'Mafalaladfsfdsf', 'C:\\wamp64\\tmp\\phpAE8.tmp', '2025-05-17 12:11:19', '2025-05-17 12:11:19'),
(4, 'HEITON TEMBE', 'carlos2@example.com', 1, 'iguohjbgjhb', 'infraestrutura', 'Mafalala', 'C:\\wamp64\\tmp\\php3206.tmp', '2025-05-21 13:23:05', '2025-05-21 13:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('zuJO0KdAxU83oIhmB8C79qAc0SwevrR9wwxwReIl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicE1UNkJHTWNWRFMwVkFqbFYxSjNBcWtGaldlNjNiQXBlZGtJVElVWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747842080),
('0sCtQJPweUzqT21dH2yrhCQMydLzOJbZgbx0uFHg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2w1bHptUWdRenNWVnBQamNQdDZMNmFNbVRSSFhhTXN3SjEyektMMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb25zdWx0YXNfcHVibGljYXMvcmVnL2pxdWVyeS0zLjcuMC5qcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1748085134),
('fR4dnGOFDi1AyzAXRPoLz9SQitjo9XEYtwaTEdUX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzlSSkJ6eHVLU2hHQWZENjlDWEpBSWR4a1ZoNFRiOURiOUppaHUwTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb25zdWx0YXNfcHVibGljYXMvcmVnL2pxdWVyeS0zLjcuMC5qcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1747576303),
('zOuOh6rjoogfuax7pIc32QePUZc79y3KRYL7TNBD', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTkFidktGelpnNTdVMWRYdkdpN2g3T0ZLbjVZSjlpcml5SmVMSGJ3WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wbGFuby9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1747675601);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_planos`
--

DROP TABLE IF EXISTS `tipo_planos`;
CREATE TABLE IF NOT EXISTS `tipo_planos` (
  `id_tipo_plano` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_tipo_plano` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_tipo_plano` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_plano`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipo_planos`
--

INSERT INTO `tipo_planos` (`id_tipo_plano`, `nome_tipo_plano`, `descripcion_tipo_plano`, `created_at`, `updated_at`) VALUES
(1, 'Planos de Estrutura Urbana', 'Planos que definem a estrutura urbana de uma área.', '2025-04-13 12:19:02', '2025-04-13 12:19:02'),
(2, 'Planos Gerais de Urbanização', 'Planos que abrangem a urbanização geral de uma região.', '2025-04-13 12:19:02', '2025-04-13 12:19:02'),
(3, 'Planos Parciais de Urbanização', 'Planos que tratam da urbanização de áreas específicas.', '2025-04-13 12:19:02', '2025-04-13 12:19:02'),
(4, 'Planos de Pormenor ', 'Planos de Pormenor.', '2025-04-13 12:19:02', '2025-04-13 12:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test Us', 'test@example.com', '2025-05-04 13:47:03', '$2y$12$6fAfA43UA4a1mh8WbXh27OTPKhofTeNpP8AD6D7q4srtqOuJ64Evm', '3rZJVxdZHA', '2025-05-04 13:47:04', '2025-05-04 13:47:04'),
(2, 'Test Us', 'carlos2@example.com', '2025-05-14 16:00:49', '$2y$12$4OMZPlEdPErH/YgV/hOeRu0Lmj16/dNL0tmR1hiVuwY6uT63/NPf6', 'gpDiFLahDW6tQOZOsYKLJuZ0Dyr4Y1TN2gdXAbfr57cbcMkNEQx35VCEqRIx', '2025-05-14 16:00:49', '2025-05-14 16:00:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

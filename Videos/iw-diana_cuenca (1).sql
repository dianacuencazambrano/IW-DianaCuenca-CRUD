-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 30-12-2022 a las 06:03:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `iw-diana_cuenca`
--
CREATE DATABASE IF NOT EXISTS `iw-diana_cuenca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iw-diana_cuenca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classrooms`
--

CREATE TABLE `classrooms` (
  `id_class` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `identifier_class` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_class` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `classrooms`
--

INSERT INTO `classrooms` (`id_class`, `id_status`, `identifier_class`, `level_class`, `description_class`, `created_at`, `updated_at`) VALUES
(1, 1, '2A', 'Subnivel inicial', 'Aula de clase subnivel inicial 2A', '2022-11-13 17:45:34', '2022-11-13 17:45:34'),
(2, 1, '2B', 'Subnivel inicial', 'Aula de clase subnivel inicial 2B', '2022-11-13 17:47:19', '2022-11-13 17:47:19'),
(3, 1, 'EE', 'Administration', 'Solo administradores', '2022-11-14 00:22:03', '2022-11-14 00:22:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_11_13_000000_create_statuses_table', 1),
(2, '2013_11_13_000001_create_roles_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_11_13_041400_create_classrooms_table', 1),
(8, '2022_11_13_041435_create_teachers_table', 1),
(9, '2022_11_13_041447_create_students_table', 1),
(10, '2022_11_13_041603_create_skills_table', 1),
(11, '2022_11_13_041708_create_reinforcements_table', 1),
(12, '2022_11_13_041740_create_qualifications_table', 1),
(13, '2022_11_13_052837_create_skill__qual__studs_table', 1),
(14, '2022_11_13_052901_create_skill__rein__studs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qualifications`
--

CREATE TABLE `qualifications` (
  `id_qual` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `scale_qual` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meaning_qual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_qual` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `qualifications`
--

INSERT INTO `qualifications` (`id_qual`, `id_status`, `scale_qual`, `meaning_qual`, `description_qual`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 'Adquirido', 'Cuando una destreza (skill) ha sido adquirida', '2022-11-13 17:48:18', '2022-11-13 17:48:18'),
(2, 1, 'EP', 'En Proceso', 'Cuando una destreza (skill) aún no ha sido adquirida', '2022-11-13 17:48:18', '2022-11-13 17:48:18'),
(3, 1, 'NE', 'No Evaluado', 'Cuando una destreza (skill) no ha sido evaluada', '2022-11-13 17:49:06', '2022-11-13 17:49:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reinforcements`
--

CREATE TABLE `reinforcements` (
  `id_rein` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `id_skill` bigint(20) UNSIGNED DEFAULT NULL,
  `title_rein` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_rein` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reinforcements`
--

INSERT INTO `reinforcements` (`id_rein`, `id_status`, `id_skill`, `title_rein`, `description_rein`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Skill Hello reinforcement', 'Description Skill Hello reinforcement', '2022-12-07 05:09:31', '2022-12-14 09:50:50'),
(2, 1, 2, 'Skill Hi reinforcement', 'Description Skill Hi reinforcement', '2022-12-07 05:25:35', '2022-12-07 05:25:35'),
(3, 1, 3, 'Skill 1 reinforcement', 'Description Skill Skill 1 reinforcement', '2022-12-07 05:26:08', '2022-12-07 05:26:08'),
(4, 1, 1, 'Skill Hello reinforcement 2', 'Description Skill Hello reinforcement 2', '2022-12-07 05:26:49', '2022-12-07 05:26:49'),
(5, 1, 2, 'Skill Hi reinforcement 2', 'Description Skill Hi reinforcement 2', '2022-12-07 05:27:22', '2022-12-07 05:27:22'),
(6, 1, 3, 'Skill 1 reinforcement 2', 'Description Skill 1 reinforcement 2', '2022-12-07 05:27:45', '2022-12-07 05:27:45'),
(7, 1, 1, 'Skill 1', 'Description Skill 1', '2022-12-14 09:38:35', '2022-12-14 09:38:35'),
(8, 1, 2, 'Rein 3', 'Rein 3 skill hi', '2022-12-14 09:49:47', '2022-12-14 09:50:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `name_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_role` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_role`, `id_status`, `name_role`, `description_role`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'Super admin', '2022-11-13 17:42:37', '2022-11-13 17:42:37'),
(2, 1, 'Teacher', 'Teacher in general', '2022-11-13 17:43:25', '2022-11-13 17:43:25'),
(3, 1, 'Student', 'Students in general', '2022-11-13 17:44:16', '2022-11-13 17:44:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skills`
--

CREATE TABLE `skills` (
  `id_skill` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `title_skill` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_skill` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `skills`
--

INSERT INTO `skills` (`id_skill`, `id_status`, `title_skill`, `description_skill`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hello', 'New Skill 111', '2022-11-14 08:48:40', '2022-11-14 10:15:42'),
(2, 1, 'Hi', 'skill', '2022-11-14 10:15:36', '2022-11-14 10:15:49'),
(3, 1, 'Skill 1', '555555', '2022-11-18 09:52:18', '2022-11-18 09:52:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skill_qual_studs`
--

CREATE TABLE `skill_qual_studs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_skill` bigint(20) UNSIGNED NOT NULL,
  `id_qual` bigint(20) UNSIGNED NOT NULL DEFAULT 3,
  `id_stud` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `skill_qual_studs`
--

INSERT INTO `skill_qual_studs` (`id`, `id_skill`, `id_qual`, `id_stud`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-11-14 05:56:51', '2022-11-14 05:56:51'),
(2, 2, 2, 1, '2022-11-14 05:57:06', '2022-11-14 05:57:06'),
(3, 1, 2, 2, '2022-11-14 05:57:06', '2022-11-14 05:57:06'),
(4, 3, 2, 1, '2022-12-07 04:57:50', '2022-12-07 04:57:50'),
(5, 2, 1, 2, '2022-12-07 04:58:28', '2022-12-07 04:58:28'),
(6, 3, 3, 2, '2022-12-07 04:58:41', '2022-12-07 04:58:41'),
(7, 1, 2, 3, '2022-12-07 04:59:03', '2022-12-30 08:53:06'),
(8, 2, 3, 3, NULL, NULL),
(9, 3, 3, 3, NULL, NULL),
(10, 1, 1, 4, '2022-12-07 05:00:33', '2022-12-07 05:00:33'),
(11, 2, 3, 4, '2022-12-07 05:00:33', '2022-12-07 05:00:33'),
(12, 3, 3, 4, '2022-12-07 05:00:58', '2022-12-07 05:00:58'),
(13, 1, 3, 5, '2022-12-07 05:00:58', '2022-12-07 05:00:58'),
(14, 2, 3, 5, '2022-12-07 05:01:16', '2022-12-07 05:01:16'),
(15, 3, 3, 5, '2022-12-07 05:01:16', '2022-12-07 05:01:16'),
(16, 1, 3, 7, '2022-12-08 05:56:00', '2022-12-30 09:47:37'),
(17, 2, 2, 7, '2022-12-08 05:56:00', '2022-12-30 09:47:42'),
(18, 3, 3, 7, '2022-12-08 05:56:00', '2022-12-08 05:56:00'),
(19, 1, 3, 6, '2022-12-08 01:00:41', '2022-12-08 01:00:41'),
(20, 2, 2, 6, '2022-12-08 01:00:41', '2022-12-08 01:00:41'),
(21, 3, 2, 6, '2022-12-08 01:01:19', '2022-12-08 01:01:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skill_rein_studs`
--

CREATE TABLE `skill_rein_studs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_skill` bigint(20) UNSIGNED NOT NULL,
  `id_rein` bigint(20) UNSIGNED NOT NULL,
  `id_stud` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `skill_rein_studs`
--

INSERT INTO `skill_rein_studs` (`id`, `id_skill`, `id_rein`, `id_stud`, `created_at`, `updated_at`) VALUES
(369, 2, 2, 1, '2022-12-30 09:47:10', '2022-12-30 09:47:10'),
(370, 3, 3, 1, '2022-12-30 09:47:10', '2022-12-30 09:47:10'),
(371, 2, 5, 2, '2022-12-30 09:47:10', '2022-12-30 09:47:10'),
(372, 2, 8, 3, '2022-12-30 09:47:10', '2022-12-30 09:47:10'),
(373, 1, 1, 6, '2022-12-30 09:47:10', '2022-12-30 09:47:10'),
(374, 3, 3, 6, '2022-12-30 09:47:10', '2022-12-30 09:47:10'),
(375, 3, 3, 7, '2022-12-30 09:47:10', '2022-12-30 09:47:10'),
(376, 2, 8, 1, '2022-12-30 09:47:44', '2022-12-30 09:47:44'),
(377, 2, 8, 1, '2022-12-30 09:47:44', '2022-12-30 09:47:44'),
(378, 2, 2, 2, '2022-12-30 09:47:44', '2022-12-30 09:47:44'),
(379, 1, 1, 3, '2022-12-30 09:47:44', '2022-12-30 09:47:44'),
(380, 3, 3, 6, '2022-12-30 09:47:44', '2022-12-30 09:47:44'),
(381, 3, 3, 6, '2022-12-30 09:47:44', '2022-12-30 09:47:44'),
(382, 2, 8, 7, '2022-12-30 09:47:44', '2022-12-30 09:47:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id_status` bigint(20) UNSIGNED NOT NULL,
  `name_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `name_status`, `description_status`, `created_at`, `updated_at`) VALUES
(1, 'Active', 'When the data is active and is used in general', '2022-11-13 17:39:11', '2022-11-13 17:39:12'),
(2, 'Inactive', 'When the data is inactive and isn\'t used in general', '2022-11-13 17:41:57', '2022-11-13 17:41:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id_stud` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_class` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id_stud`, `id_user`, `id_class`, `created_at`, `updated_at`) VALUES
(1, 5, 2, '2022-11-14 06:48:18', '2022-11-14 06:48:18'),
(2, 6, 2, '2022-11-14 07:55:14', '2022-11-14 07:55:14'),
(3, 7, 2, '2022-11-14 07:57:44', '2022-11-14 07:57:44'),
(4, 11, 2, '2022-11-14 09:58:55', '2022-11-14 09:58:55'),
(5, 14, 2, '2022-11-18 09:54:57', '2022-11-18 09:54:57'),
(6, 15, 2, '2022-12-08 05:13:15', '2022-12-08 05:13:15'),
(7, 16, 2, '2022-12-08 05:56:00', '2022-12-08 05:56:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id_teach` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_class` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id_teach`, `id_user`, `id_class`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2022-11-14 00:53:01', '2022-11-14 00:53:01'),
(2, 8, 2, '2022-11-14 08:00:52', '2022-11-14 08:00:52'),
(3, 10, 2, '2022-11-14 09:56:47', '2022-11-14 09:56:47'),
(4, 12, 2, '2022-11-18 09:41:58', '2022-11-18 09:41:58'),
(5, 13, 2, '2022-11-18 09:50:26', '2022-11-18 09:50:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `id_status` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `identification` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `id_status`, `name`, `lastname`, `birthday`, `identification`, `phoneNumber`, `homeAddress`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Diana', 'Cuenca', '2001-07-18', '1799999999', '0999999999', 'Carcelén', 'dcuenca@gmail.com', '$2a$12$16iSLHU7t2GXmz/9mT0FwujzzTidPyolFY73ctmzyOqBxKvcdSDqq', NULL, '5GhC0Gb9MaxSQ3KByKyV7e8qM8GTO5PxYIyQdi5uX3w5022khxixbevDubYd', '2022-11-13 18:00:41', '2022-11-18 09:44:16'),
(2, 2, 1, 'Nicole', 'Mendoza', '2001-04-11', '1715862400', '0999372879', 'Quito', 'nmendoza@gmail.com', '$2y$10$GmK6tN3OKLT6jzc6wDL0a.LeaagDBatZivKOQIPMl1ZFVu4J2H9J6', NULL, 'zBDDLu9urTkixdrE5VhBQqULqaXcqS02zKqhfslT2itwAOdd3KSI0a1r2KEP', '2022-11-14 03:13:16', '2022-11-14 03:13:16'),
(5, 1, 1, 'José', 'Moreta', '2022-11-01', '3365214200', '0999355555', 'La Florida', 'jmoreta@gmail.com', '$2y$10$g9U1ZhsCRXoO0ztxslfFsuYnlfmslytj0rORdYeV2B1OYlDNtdhLm', NULL, NULL, '2022-11-14 06:48:18', '2022-11-14 06:48:18'),
(6, 3, 1, 'Ilda', 'Gomez', '2022-11-01', '3365214100', '0999372881', 'Cotocollao', 'igomez@gmail.com', '$2y$10$uxH1A9YXd4J5LJa4oSgD3u2GBJaMhQTjl3SAUDr2hwc1bIex9/T.O', NULL, NULL, '2022-11-14 07:55:14', '2022-11-14 07:55:14'),
(7, 3, 1, 'Luis', 'Nume', '2022-11-01', '1715862400', '0999372879', 'Arl', 'lnume@gmail.com', '$2y$10$gWQ9Rgd.GXAvpZdYkw8hvu2ha30zUttyOW7281mBEJlYh4xRn5FSK', NULL, NULL, '2022-11-14 07:57:44', '2022-11-14 07:57:44'),
(8, 2, 1, 'Limon', 'Ulpiano', '2022-11-01', '11121477', '0999355555', 'ggf', 'lulpiano@gmail.com', '$2y$10$z07yDstoFx7lfQ9F687Vq.n0WJ4Warnq3jz35sUpRZ6qSlEGqOK.y', NULL, NULL, '2022-11-14 08:00:52', '2022-11-14 08:00:52'),
(9, 1, 1, 'Diana', '2', '2022-11-02', '17158624', '0999372880', 'sss', 'd2@mail.com', '$2y$10$y74tqChNdCM6wp1HNGLr3ef08R6LurieX2q5yZ2N4TL.gOU61E8Hy', NULL, NULL, '2022-11-14 08:10:42', '2022-11-14 08:10:42'),
(10, 2, 1, 'Juliana', 'Mendez', '2022-11-01', '1112147700', '0999355555', 'La luz', 'jmendez@gmail.com', '$2y$10$BZKXljm3eYmL4QbNd9vwwOulEOB5MIK4iCpInYSBpeEFC48CdNOsi', NULL, NULL, '2022-11-14 09:56:47', '2022-11-14 09:56:47'),
(11, 3, 1, 'Nicole', 'Moreta', '2022-11-01', '1234567890', '0999372881', 'lalala', 'nmoreta@gmail.com', '$2y$10$8BjkVCLtz0VFKr3oPwWihOd9F9xIL.YXYKLDc895BgyydScb/ZrlW', NULL, NULL, '2022-11-14 09:58:55', '2022-11-14 09:58:55'),
(12, 2, 1, 'Fabricio', 'Ruiz', '2011-02-10', '1234895222', '0999999999', 'Calacali', 'fruiz@mail.com', '$2y$10$JXpCvYy7TwxQ0jaMCTYBQOotLQAwl69IfQ2AoMS4rrwgblnRz9hD.', NULL, NULL, '2022-11-18 09:41:58', '2022-11-18 09:41:58'),
(13, 2, 1, 'Sara', 'Jimenez', '2022-11-01', '1555555555', '0666666666', 'Calali', 'sjimenez@mail.com', '$2y$10$JXYqRx7yumQMAb/.MKo.3OXQKlQxx9ra6j0Q86ODY8AfGVux.0PcO', NULL, NULL, '2022-11-18 09:50:26', '2022-11-18 09:50:44'),
(14, 3, 1, 'Limon', 'Con sal', '2022-11-05', '1899877777', '0999999999', 'La luz', 'lconsal@mail.com', '$2a$12$16iSLHU7t2GXmz/9mT0FwujzzTidPyolFY73ctmzyOqBxKvcdSDqq', NULL, 'Gjj4cphVenu1L6HQpmMQoZ2KcQH9zOuPrOblOEmbyUuj5tUE82OMjk2QSn7B', '2022-11-18 09:54:57', '2022-11-18 09:54:57'),
(15, 3, 1, 'Alain', 'Ruales', '2001-10-05', '1714445698', '0999372881', 'La Amenia', 'aruales@mail.com', '$2a$12$16iSLHU7t2GXmz/9mT0FwujzzTidPyolFY73ctmzyOqBxKvcdSDqq', NULL, 'Ew8DyBsvMlRXpcDbzSOc78DCRYQ34Y4uKoweWbBTz4VY69nmg77xH4A1cz2o', '2022-12-08 05:13:15', '2022-12-08 05:13:15'),
(16, 3, 1, 'Nicole', 'Gomez', '2022-11-28', '33652141', '0999372870', 'dadadad', 'ngomez@mail.com', '$2y$10$jW.csPOhOHoSY1OBGaZ3zenfGK2ebSVJArmnEfIkiJpQGQqJ8bF0W', NULL, '1TNCbQiRW2oSWH6Y6Vd77GvMfOt6BBbzLfAhFj9y6zgJKZF9RZ3c4VTHGrJ3', '2022-12-08 05:56:00', '2022-12-08 05:56:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `classrooms_id_status_foreign` (`id_status`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id_qual`),
  ADD KEY `qualifications_id_status_foreign` (`id_status`);

--
-- Indices de la tabla `reinforcements`
--
ALTER TABLE `reinforcements`
  ADD PRIMARY KEY (`id_rein`),
  ADD KEY `reinforcements_id_status_foreign` (`id_status`),
  ADD KEY `reinforcements_id_skill_foreign` (`id_skill`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `roles_id_status_foreign` (`id_status`);

--
-- Indices de la tabla `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_skill`),
  ADD KEY `skills_id_status_foreign` (`id_status`);

--
-- Indices de la tabla `skill_qual_studs`
--
ALTER TABLE `skill_qual_studs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_qual_studs_id_skill_foreign` (`id_skill`),
  ADD KEY `skill_qual_studs_id_qual_foreign` (`id_qual`),
  ADD KEY `skill_qual_studs_id_stud_foreign` (`id_stud`);

--
-- Indices de la tabla `skill_rein_studs`
--
ALTER TABLE `skill_rein_studs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_rein_studs_id_skill_foreign` (`id_skill`),
  ADD KEY `skill_rein_studs_id_rein_foreign` (`id_rein`),
  ADD KEY `skill_rein_studs_id_stud_foreign` (`id_stud`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_stud`),
  ADD KEY `students_id_user_foreign` (`id_user`),
  ADD KEY `students_id_class_foreign` (`id_class`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id_teach`),
  ADD KEY `teachers_id_user_foreign` (`id_user`),
  ADD KEY `teachers_id_class_foreign` (`id_class`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_role_foreign` (`id_role`),
  ADD KEY `users_id_status_foreign` (`id_status`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id_class` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id_qual` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reinforcements`
--
ALTER TABLE `reinforcements`
  MODIFY `id_rein` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `skills`
--
ALTER TABLE `skills`
  MODIFY `id_skill` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `skill_qual_studs`
--
ALTER TABLE `skill_qual_studs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `skill_rein_studs`
--
ALTER TABLE `skill_rein_studs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id_status` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id_stud` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id_teach` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE;

--
-- Filtros para la tabla `qualifications`
--
ALTER TABLE `qualifications`
  ADD CONSTRAINT `qualifications_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reinforcements`
--
ALTER TABLE `reinforcements`
  ADD CONSTRAINT `reinforcements_id_skill_foreign` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`) ON DELETE CASCADE,
  ADD CONSTRAINT `reinforcements_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE;

--
-- Filtros para la tabla `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE;

--
-- Filtros para la tabla `skill_qual_studs`
--
ALTER TABLE `skill_qual_studs`
  ADD CONSTRAINT `skill_qual_studs_id_qual_foreign` FOREIGN KEY (`id_qual`) REFERENCES `qualifications` (`id_qual`) ON DELETE CASCADE,
  ADD CONSTRAINT `skill_qual_studs_id_skill_foreign` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`) ON DELETE CASCADE,
  ADD CONSTRAINT `skill_qual_studs_id_stud_foreign` FOREIGN KEY (`id_stud`) REFERENCES `students` (`id_stud`) ON DELETE CASCADE;

--
-- Filtros para la tabla `skill_rein_studs`
--
ALTER TABLE `skill_rein_studs`
  ADD CONSTRAINT `skill_rein_studs_id_rein_foreign` FOREIGN KEY (`id_rein`) REFERENCES `reinforcements` (`id_rein`) ON DELETE CASCADE,
  ADD CONSTRAINT `skill_rein_studs_id_skill_foreign` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`) ON DELETE CASCADE,
  ADD CONSTRAINT `skill_rein_studs_id_stud_foreign` FOREIGN KEY (`id_stud`) REFERENCES `students` (`id_stud`) ON DELETE CASCADE;

--
-- Filtros para la tabla `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_id_class_foreign` FOREIGN KEY (`id_class`) REFERENCES `classrooms` (`id_class`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_id_class_foreign` FOREIGN KEY (`id_class`) REFERENCES `classrooms` (`id_class`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

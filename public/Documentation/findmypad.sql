-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table urban.failed_jobs : ~0 rows (environ)

-- Listage des données de la table urban.migrations : ~0 rows (environ)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_02_11_001022_add_role_to_users_table', 1),
	(6, '2024_02_12_112756_create_user_status_table', 1),
	(7, '2024_02_13_080002_add_location_to_users_table', 1),
	(8, '2024_02_14_081554_add_profile_fields_to_users_table', 1),
	(9, '2024_02_20_181136_add_assignment_to_users_table', 1),
	(10, '2024_02_22_083902_create_notifications_table', 1),
	(11, '2024_02_22_111459_create_services_table', 1),
	(12, '2024_03_01_103249_update_services_table', 1);

-- Listage des données de la table urban.notifications : ~24 rows (environ)
INSERT INTO `notifications` (`id`, `agent_id`, `user_id`, `message`, `service_type`, `read`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Bob', 'livreur', 1, '2024-03-04 07:17:42', '2024-03-04 07:18:10'),
	(2, 1, 2, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Bob', 'livreur', 1, '2024-03-04 07:26:08', '2024-03-04 07:26:29'),
	(3, 1, 2, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Bob', 'livreur', 1, '2024-03-04 09:56:53', '2024-03-04 09:58:26'),
	(4, 1, 2, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Bob', 'transporteur', 1, '2024-03-04 09:58:53', '2024-03-04 09:59:06'),
	(5, 1, 2, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Bob', 'transporteur', 1, '2024-03-04 11:00:25', '2024-03-04 11:00:45'),
	(6, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'livreur', 1, '2024-03-06 13:43:56', '2024-03-06 13:44:18'),
	(7, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:46:02', '2024-03-06 13:46:34'),
	(8, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:50:41', '2024-03-06 13:51:00'),
	(9, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:10', '2024-03-06 13:55:29'),
	(10, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:12', '2024-03-06 13:55:21'),
	(11, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:14', '2024-03-06 13:55:13'),
	(12, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:16', '2024-03-06 13:54:59'),
	(13, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:17', '2024-03-06 13:54:32'),
	(14, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:19', '2024-03-06 13:54:06'),
	(15, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:21', '2024-03-06 13:53:58'),
	(16, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:24', '2024-03-06 13:53:47'),
	(17, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:27', '2024-03-06 13:53:38'),
	(18, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:29', '2024-03-06 13:53:21'),
	(19, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:31', '2024-03-06 13:52:55'),
	(20, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:33', '2024-03-06 13:52:48'),
	(21, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:35', '2024-03-06 13:52:39'),
	(22, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:37', '2024-03-06 13:52:31'),
	(23, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:39', '2024-03-06 13:52:23'),
	(24, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:51:40', '2024-03-06 13:52:15'),
	(25, 1, 3, 'Vous avez reçu une nouvelle demande de service de la part de l\'utilisateur Christ', 'transporteur', 1, '2024-03-06 13:55:39', '2024-03-06 13:56:16');

-- Listage des données de la table urban.password_reset_tokens : ~0 rows (environ)

-- Listage des données de la table urban.personal_access_tokens : ~0 rows (environ)

-- Listage des données de la table urban.services : ~22 rows (environ)
INSERT INTO `services` (`id`, `payer`, `transaction`, `description`, `prix`, `created_at`, `updated_at`, `notification_id`) VALUES
	(1, 1, '96418032', 'azertyui', 125634.00, '2024-03-04 07:18:10', '2024-03-04 07:18:35', 1),
	(2, 1, '96418370', 'werty', 1235.00, '2024-03-04 07:26:28', '2024-03-04 07:40:14', 2),
	(4, 1, '96420567', 'qxdf', 884848.00, '2024-03-05 09:58:26', '2024-03-04 10:41:20', 3),
	(5, 1, '96420571', NULL, 484.00, '2024-03-05 09:59:06', '2024-03-04 10:41:36', 4),
	(6, 1, '96421261', NULL, 3000.00, '2024-03-04 11:00:45', '2024-03-04 11:18:11', 5),
	(7, 1, '96465163', 'aqwxszedcvfr\'', 5000.00, '2024-03-06 13:44:18', '2024-03-06 13:45:07', 6),
	(9, 0, NULL, NULL, 5000.00, '2024-03-06 13:51:00', '2024-03-06 13:51:00', 8),
	(10, 0, NULL, NULL, 5000.00, '2024-03-06 13:52:15', '2024-03-06 13:52:15', 24),
	(11, 0, NULL, NULL, 5000.00, '2024-03-06 13:52:22', '2024-03-06 13:52:22', 23),
	(12, 0, NULL, NULL, 5000.00, '2024-03-06 13:52:31', '2024-03-06 13:52:31', 22),
	(13, 0, NULL, NULL, 5000.00, '2024-03-06 13:52:39', '2024-03-06 13:52:39', 21),
	(14, 0, NULL, NULL, 5000.00, '2024-03-06 13:52:47', '2024-03-06 13:52:47', 20),
	(15, 0, NULL, NULL, 5000.00, '2024-03-06 13:52:55', '2024-03-06 13:52:55', 19),
	(16, 0, NULL, NULL, 5000.00, '2024-03-06 13:53:21', '2024-03-06 13:53:21', 18),
	(17, 0, NULL, NULL, 5000.00, '2024-03-06 13:53:38', '2024-03-06 13:53:38', 17),
	(18, 0, NULL, NULL, 5000.00, '2024-03-06 13:53:47', '2024-03-06 13:53:47', 16),
	(19, 0, NULL, NULL, 5000.00, '2024-03-06 13:53:58', '2024-03-06 13:53:58', 15),
	(20, 0, NULL, NULL, 5000.00, '2024-03-06 13:54:06', '2024-03-06 13:54:06', 14),
	(21, 0, NULL, NULL, 5000.00, '2024-03-06 13:54:32', '2024-03-06 13:54:32', 13),
	(22, 0, NULL, NULL, 5000.00, '2024-03-06 13:54:59', '2024-03-06 13:54:59', 12),
	(23, 0, NULL, NULL, 5000.00, '2024-03-06 13:55:13', '2024-03-06 13:55:13', 11),
	(24, 0, NULL, NULL, 5000.00, '2024-03-06 13:55:21', '2024-03-06 13:55:21', 10),
	(25, 0, NULL, NULL, 5000.00, '2024-03-06 13:55:29', '2024-03-06 13:55:29', 9),
	(26, 0, NULL, NULL, 5000.00, '2024-03-06 13:56:16', '2024-03-06 13:56:16', 25);

-- Listage des données de la table urban.users : ~3 rows (environ)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `latitude`, `longitude`, `role`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `whatsapp_link`, `national_id`, `photo`, `assignment`) VALUES
	(1, 'Steven KOULO', 'stvehart@gmail.com', NULL, '$2y$12$iVnxJU.11BAnDJ973rP3UuPFx0wTjWBfpWIwlx5xw91lVA2YkIHoe', 0.00000000, 0.00000000, 'agent', NULL, '2024-03-04 07:15:37', '2024-03-04 07:16:28', '+22955508870', 'https://wa.link/ziowy9', '12345678900', 'photos/nnUAR2VMsGmvKmidzoucVdGetH7bXAAMIJirXKRZ.png', 'les_deux'),
	(2, 'Bob', 'expediteur@mail.com', NULL, '$2y$12$ob.uno3lWHeLtSDaVRy9s.CBucmnqh0mdHxoSAukYl/4ChGw7.VBy', 0.00000000, 0.00000000, 'expediteur', NULL, '2024-03-04 07:17:17', '2024-03-04 07:17:17', NULL, NULL, NULL, NULL, NULL),
	(3, 'Christ', 'azsdfv@mail.com', NULL, '$2y$12$G3u2b2.fgtPGaMpzH4bMEeQvmR706MLgWUy./1o0eg7moIHlhKL1S', 0.00000000, 0.00000000, 'expediteur', NULL, '2024-03-06 13:43:25', '2024-03-06 13:43:25', NULL, NULL, NULL, NULL, NULL);

-- Listage des données de la table urban.user_statuses : ~0 rows (environ)
INSERT INTO `user_statuses` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'available', '2024-03-04 07:15:37', '2024-03-06 13:55:59');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

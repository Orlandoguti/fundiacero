-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla fundiacero.articulos
CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria` int(10) unsigned NOT NULL,
  `idunidad` int(10) unsigned NOT NULL,
  `idtiempo` int(10) unsigned DEFAULT '0',
  `idestado` int(10) unsigned NOT NULL,
  `codigo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `tiempo` int(11) DEFAULT '0',
  `descripcion` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT 'Sin Marca',
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `imagen` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'producto.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articulos_idcategoria_foreign` (`idcategoria`),
  KEY `articulos_idunidad_foreign` (`idunidad`),
  KEY `articulos_idtiempo_foreign` (`idtiempo`),
  KEY `articulos_idestado_foreign` (`idestado`),
  CONSTRAINT `articulos_idcategoria_foreign` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `articulos_idestado_foreign` FOREIGN KEY (`idestado`) REFERENCES `estados` (`id`),
  CONSTRAINT `articulos_idtiempo_foreign` FOREIGN KEY (`idtiempo`) REFERENCES `tiempos` (`id`),
  CONSTRAINT `articulos_idunidad_foreign` FOREIGN KEY (`idunidad`) REFERENCES `unidads` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.articulos: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encargado` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.categorias: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `encargado`, `condicion`, `created_at`, `updated_at`) VALUES
	(1, 'Almacen General', 'no hay', 'Orlando Gutierrez', 1, NULL, NULL),
	(2, 'Electricidad', 'no hay', 'Orlando Gutierrez', 1, '2018-09-07 22:43:35', '2018-09-07 22:43:35'),
	(3, 'Chatarra', 'no hay', 'Orlando Gutierrez', 1, '2018-09-07 22:43:55', '2018-09-07 22:43:55'),
	(4, 'Fundicion y Colada continua', 'no hay', 'Orlando Gutierrez', 1, '2018-09-10 18:23:16', '2021-04-23 07:26:20'),
	(5, 'Laminacion en Caliente', 'no hay', 'Orlando Gutierrez', 1, '2018-09-10 18:23:50', '2021-04-23 07:21:25'),
	(6, 'Laminacion en Frio', 'no hay', 'Orlando Gutierrez', 1, '2021-04-23 07:26:47', '2021-04-23 07:26:47'),
	(7, 'Mantenimiento', 'no hay', 'Orlando Gutierrez', 1, '2021-04-29 17:39:55', '2021-04-29 17:39:55'),
	(8, 'Oficina', 'No Hay', 'Orlando Gutierrez', 1, '2021-05-04 13:11:31', '2021-05-04 13:11:31'),
	(9, 'Torneria', 'No hay', 'Orlando Gutierrez', 1, '2021-05-04 13:11:53', '2021-05-04 13:11:53');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.detalle_ingresos
CREATE TABLE IF NOT EXISTS `detalle_ingresos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idingreso` int(10) unsigned NOT NULL,
  `idarticulo` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_ingresos_idingreso_foreign` (`idingreso`),
  KEY `detalle_ingresos_idarticulo_foreign` (`idarticulo`),
  CONSTRAINT `detalle_ingresos_idarticulo_foreign` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`id`),
  CONSTRAINT `detalle_ingresos_idingreso_foreign` FOREIGN KEY (`idingreso`) REFERENCES `ingresos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.detalle_ingresos: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ingresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_ingresos` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.detalle_pedidos
CREATE TABLE IF NOT EXISTS `detalle_pedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idpedido` int(10) unsigned NOT NULL,
  `idunidad` int(10) unsigned DEFAULT '2',
  `cantidad` int(11) NOT NULL,
  `medida` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `detallep` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT 'Sin Detalles',
  `producto` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `fecha_hora` datetime NOT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `detalle_pedidos_idpedido_foreign` (`idpedido`),
  KEY `detalle_pedidos_idarticulo_foreign` (`idunidad`),
  CONSTRAINT `detalle_pedidos_idpedido_foreign` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_pedidos_idunidad_foreign` FOREIGN KEY (`idunidad`) REFERENCES `unidads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.detalle_pedidos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.detalle_ventas
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idventa` int(10) unsigned NOT NULL,
  `idarticulo` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_ventas_idventa_foreign` (`idventa`),
  KEY `detalle_ventas_idarticulo_foreign` (`idarticulo`),
  CONSTRAINT `detalle_ventas_idarticulo_foreign` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`id`),
  CONSTRAINT `detalle_ventas_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.detalle_ventas: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla fundiacero.estados: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` (`id`, `nombre`, `condicion`, `created_at`, `updated_at`) VALUES
	(1, 'Buen Estado', 1, '2021-04-06 19:58:30', '2021-04-06 19:58:31'),
	(2, 'Mal Estado', 1, '2018-09-07 22:43:35', '2018-09-07 22:43:35');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.ingresos
CREATE TABLE IF NOT EXISTS `ingresos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria` int(10) unsigned NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `detalle` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '''No Hay Detalle''',
  `tipo_comprobante` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '''No Hay Detalle''',
  `serie_comprobante` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT '''No Hay Detalle''',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_hora` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `ingresos_idusuario_foreign` (`idusuario`),
  KEY `ingresos_idcategoria_foreign` (`idcategoria`),
  CONSTRAINT `ingresos_idcategoria_foreign` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `ingresos_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.ingresos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ingresos` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.migrations: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_100000_create_password_resets_table', 1),
	(2, '2018_02_20_171225_create_categorias_table', 1),
	(3, '2018_02_22_235257_create_articulos_table', 1),
	(4, '2018_02_27_143638_create_personas_table', 1),
	(5, '2018_03_06_024616_create_proveedores_table', 1),
	(6, '2018_03_13_133425_create_roles_table', 1),
	(7, '2018_03_14_000000_create_users_table', 1),
	(8, '2018_09_07_150703_create_ingresos_table', 1),
	(9, '2018_09_07_150819_create_detalle_ingresos_table', 1),
	(10, '2018_09_09_033145_create_ventas_table', 2),
	(11, '2018_09_09_033241_create_detalle_ventas_table', 2),
	(12, '2018_09_09_214633_create_notifications_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.notifications: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('1709a365-d5c6-42c4-8aaa-982ca04117cb', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-05-04 15:44:49', '2021-05-04 15:36:50', '2021-05-04 15:44:49'),
	('22ac99f8-02b0-45fe-8d57-8ff65d32a428', 'App\\Notifications\\NotifyAdmin', 2, 'App\\User', '{"datos":{"ventas":{"numero":1,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-05-04 13:29:30', '2021-05-04 10:22:49', '2021-05-04 13:29:30'),
	('54658418-230e-45ac-b87a-de5a6cc0938a', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-05-04 08:56:11', '2021-05-04 08:53:37', '2021-05-04 08:56:11'),
	('5a26acd8-06c5-45aa-a4b4-8933b6f030dc', 'App\\Notifications\\NotifyAdmin', 3, 'App\\User', '{"datos":{"ventas":{"numero":1,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-05-04 13:34:11', '2021-05-04 10:22:49', '2021-05-04 13:34:11'),
	('65bc7a67-67c3-4c9b-8bbd-9695fede05ed', 'App\\Notifications\\NotifyAdmin', 2, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":2,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-30 15:49:57', '2021-04-30 09:04:38', '2021-04-30 15:49:57'),
	('66cc2213-26b6-41ce-a0f3-9298f839d093', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":2,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-30 09:08:36', '2021-04-30 09:04:41', '2021-04-30 09:08:36'),
	('7faa9aa4-8a00-4372-be4d-eeae7fe57ebc', 'App\\Notifications\\NotifyAdmin', 2, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-05-04 13:29:30', '2021-05-04 08:53:37', '2021-05-04 13:29:30'),
	('844a9ce8-c70c-4067-98ff-d728520beb30', 'App\\Notifications\\NotifyAdmin', 2, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":3,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-30 15:49:57', '2021-04-30 09:05:27', '2021-04-30 15:49:57'),
	('8beacee5-ba03-4eaa-96d9-35f6356908c8', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-30 08:57:30', '2021-04-30 08:55:25', '2021-04-30 08:57:30'),
	('8c3634ad-c8a3-45ee-84df-bbf6b12f6c60', 'App\\Notifications\\NotifyAdmin', 2, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-30 15:49:58', '2021-04-29 22:03:28', '2021-04-30 15:49:58'),
	('a48b5195-a84c-4c2f-8445-6fa8a93545ff', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":1,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-05-04 10:25:51', '2021-05-04 10:22:50', '2021-05-04 10:25:51'),
	('a856eac4-0d6f-4803-959e-e203c1f4a5d1', 'App\\Notifications\\NotifyAdmin', 2, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-30 15:49:57', '2021-04-30 08:55:24', '2021-04-30 15:49:57'),
	('c62d85c2-315f-417d-a713-a5fc83d8513c', 'App\\Notifications\\NotifyAdmin', 3, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', NULL, '2021-05-04 15:36:49', '2021-05-04 15:36:49'),
	('cbdf4c79-b26e-407e-bb7e-f9304d3774ce', 'App\\Notifications\\NotifyAdmin', 2, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', NULL, '2021-05-04 15:36:50', '2021-05-04 15:36:50'),
	('e200115e-a63c-471b-8d2a-70e23b72c519', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":3,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-30 09:08:36', '2021-04-30 09:05:29', '2021-04-30 09:08:36'),
	('e5014939-f166-4eec-a294-d18fdd989ce8', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-29 22:08:02', '2021-04-29 22:03:28', '2021-04-29 22:08:02'),
	('efdea83a-4715-498a-9542-6351004914bf', 'App\\Notifications\\NotifyAdmin', 2, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-30 15:49:57', '2021-04-30 10:31:24', '2021-04-30 15:49:57'),
	('f56eb298-bb63-4d1a-835b-0b6cec59ca33', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-04-30 10:31:57', '2021-04-30 10:31:27', '2021-04-30 10:31:57'),
	('fcc09531-770c-47d9-9e39-80acc10a858d', 'App\\Notifications\\NotifyAdmin', 3, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"},"pedidos":{"numero":0,"msj":"Pedidos"}}}', '2021-05-04 13:34:11', '2021-05-04 08:53:35', '2021-05-04 13:34:11');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria` int(10) unsigned NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `solicitante` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie_comprobante` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_hora` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `pedidos_idcategoria_foreign` (`idcategoria`),
  KEY `pedidos_idusuario_foreign` (`idusuario`),
  CONSTRAINT `pedidos_idcategoria_foreign` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `pedidos_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.pedidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_documento` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personas_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.personas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` (`id`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'Orlando Marvin Gutierrez Hidalgo', 'CEDULA', '13116407', 'Zona: Pedro Domingo Murillo', '69849349', 'orlandoguti698@gmail.com', NULL, '2021-05-04 10:39:11');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(10) unsigned NOT NULL,
  `contacto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `proveedores_id_foreign` (`id`),
  CONSTRAINT `proveedores_id_foreign` FOREIGN KEY (`id`) REFERENCES `personas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.proveedores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.roles: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `condicion`) VALUES
	(1, 'Administrador', 'Administradores de área', 1),
	(2, 'Almacenero', 'Vendedor área venta', 1),
	(3, 'Administrador de Area', 'Encargado de su Area', 1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.tiempos
CREATE TABLE IF NOT EXISTS `tiempos` (
  `id` int(10) unsigned NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla fundiacero.tiempos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tiempos` DISABLE KEYS */;
INSERT INTO `tiempos` (`id`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
	(0, 'No Hay Garantia', 'No hay Garantia', 0, '2021-04-09 14:37:52', '2021-04-09 14:37:53'),
	(1, 'Dias', 'Dias de Garantia', 1, '2021-04-06 19:58:30', '2021-04-06 19:58:31'),
	(2, 'Meses', 'Meses de Garantia', 1, '2018-09-07 22:43:35', '2018-09-07 22:43:35'),
	(3, 'Años', 'Años de Garantia', 1, '2018-09-07 22:43:55', '2018-09-07 22:43:55');
/*!40000 ALTER TABLE `tiempos` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.unidads
CREATE TABLE IF NOT EXISTS `unidads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.unidads: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `unidads` DISABLE KEYS */;
INSERT INTO `unidads` (`id`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
	(1, 'Kg', 'Kilogramos', 1, NULL, NULL),
	(2, 'Pza', 'Producto por Unidad', 1, '2018-09-07 22:43:35', '2018-09-07 22:43:35'),
	(3, 'Tonelada', 'Producto por Toneladas', 1, '2018-09-07 22:43:55', '2018-09-07 22:43:55'),
	(4, 'Litros', 'Producto por Litro', 1, '2018-09-10 18:23:16', '2018-09-10 18:23:16'),
	(5, 'Metros', 'Productos por Metros', 1, '2018-09-10 18:23:50', '2018-09-10 18:23:50'),
	(6, 'm3', 'Metros Cubicos', 1, NULL, NULL),
	(7, 'Par', 'Producto por Pares', 1, NULL, NULL);
/*!40000 ALTER TABLE `unidads` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombreuser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `idrol` int(10) unsigned NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'producto.png',
  `rolnombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `users_usuario_unique` (`usuario`),
  KEY `users_id_foreign` (`id`),
  KEY `users_idrol_foreign` (`idrol`),
  CONSTRAINT `users_id_foreign` FOREIGN KEY (`id`) REFERENCES `personas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_idrol_foreign` FOREIGN KEY (`idrol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `usuario`, `password`, `nombreuser`, `condicion`, `idrol`, `imagen`, `rolnombre`, `remember_token`) VALUES
	(1, 'Orlando', '$2y$10$TeoHtPy4f0E9hgD9.uD7.eZtqb/7rQKTMv/meDyuy6VJIp4tNK2YG', 'Orlando Marvin Gutierrez Hidalgo', 1, 1, 'avatar.png', 'Administrador', 'F1S0pPFGvlMFxGVzr68rUm1zeQ7RPzc0WsXeuIui3EHk31BbpDatAa7cxh4V');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcategoria` int(10) unsigned NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `serie_comprobante` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_hora` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_idusuario_foreign` (`idusuario`),
  KEY `ventas_idcategoria_foreign` (`idcategoria`),
  CONSTRAINT `ventas_idcategoria_foreign` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `ventas_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

-- Volcando estructura para disparador fundiacero.tr_udpStockIngresoAnular
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `tr_udpStockIngresoAnular` AFTER UPDATE ON `ingresos` FOR EACH ROW BEGIN
 UPDATE articulos a
 JOIN detalle_ingresos di
 ON di.idarticulo = a.id
 AND di.idingreso = new.id
 SET a.stock = a.stock - di.cantidad;
 
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador fundiacero.tr_updStockIngreso
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `tr_updStockIngreso` AFTER INSERT ON `detalle_ingresos` FOR EACH ROW BEGIN
 UPDATE articulos SET stock = stock + NEW.cantidad 
 WHERE articulos.id = NEW.idarticulo;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador fundiacero.tr_updStockVenta
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `detalle_ventas` FOR EACH ROW BEGIN
 UPDATE articulos SET stock = stock - NEW.cantidad
 WHERE articulos.id = NEW.idarticulo;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador fundiacero.tr_updStockVentaAnular
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `tr_updStockVentaAnular` AFTER UPDATE ON `ventas` FOR EACH ROW BEGIN
 UPDATE articulos a
   JOIN detalle_ventas dv
   ON dv.idarticulo = a.id
   AND dv.idventa = NEW.id
   SET a.stock = a.stock+dv.cantidad;
   
  END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

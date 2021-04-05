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
  `codigo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `imagen` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articulos_nombre_unique` (`nombre`),
  KEY `articulos_idcategoria_foreign` (`idcategoria`),
  KEY `articulos_idunidad_foreign` (`idunidad`),
  CONSTRAINT `articulos_idcategoria_foreign` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`),
  CONSTRAINT `articulos_idunidad_foreign` FOREIGN KEY (`idunidad`) REFERENCES `unidads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.articulos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` (`id`, `idcategoria`, `idunidad`, `codigo`, `nombre`, `precio_venta`, `stock`, `descripcion`, `condicion`, `imagen`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '00245', 'loguitech', 20.00, 25, 'teclado model km90', 1, '1', NULL, NULL),
	(2, 3, 2, 'MN-P78', 'placa asus', 250.00, 25, 'placas standar', 1, '1', '2018-09-07 22:44:29', '2018-09-07 22:44:29'),
	(3, 2, 3, 'CMYK-45-10', 'GL Monitor de 4k', 1500.00, 25, 'monitor de alta resolucion', 1, '1', '2018-09-07 22:45:13', '2018-09-07 22:45:13'),
	(4, 5, 5, 'funahp', 'Funda laptop Hp', 120.00, 12, 'funda para hp 15plg', 1, NULL, '2021-04-01 09:54:02', '2021-04-01 09:54:30'),
	(5, 4, 2, 'Laptop HP 05', 'Laptop HP CORE I3', 1600.00, 250, 'Laptop Hp corei3 Ram de 4 gb', 1, NULL, '2021-04-01 13:23:55', '2021-04-01 13:23:55'),
	(6, 1, 5, 'Teclado 01', 'Teclado Gamer', 120.00, 120, 'Teclado color azul', 1, NULL, '2021-04-01 13:41:45', '2021-04-01 13:41:45'),
	(7, 2, 2, 'Monitor 32 plg LG', 'Monitor 32plg LG', 2600.00, 10, '32 PLG LG', 1, NULL, '2021-04-01 14:25:44', '2021-04-01 14:25:44'),
	(8, 4, 4, 'laptops', 'Fundas', 120.00, 10, 'Funda', 1, NULL, '2021-04-01 16:30:52', '2021-04-01 16:30:52');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.categorias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `encargado`, `condicion`, `created_at`, `updated_at`) VALUES
	(1, 'Teclados', 'teclados gamers', 'Cristian Condori', 1, NULL, NULL),
	(2, 'Monitores', 'todos tipo de monitores', 'Cristian Condori', 1, '2018-09-07 22:43:35', '2018-09-07 22:43:35'),
	(3, 'MotherBoards', 'placas madre gamers', 'Cristian Condori', 1, '2018-09-07 22:43:55', '2018-09-07 22:43:55'),
	(4, 'Fundas', 'Area de frio y caliente', 'Cristian Condori', 1, '2018-09-10 18:23:16', '2021-04-05 07:38:48'),
	(5, 'Laptops', 'Area de Laminacion', 'Cristian Condori', 1, '2018-09-10 18:23:50', '2021-04-05 07:39:46');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.detalle_ingresos
CREATE TABLE IF NOT EXISTS `detalle_ingresos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idingreso` int(10) unsigned NOT NULL,
  `idarticulo` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_ingresos_idingreso_foreign` (`idingreso`),
  KEY `detalle_ingresos_idarticulo_foreign` (`idarticulo`),
  CONSTRAINT `detalle_ingresos_idarticulo_foreign` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`id`),
  CONSTRAINT `detalle_ingresos_idingreso_foreign` FOREIGN KEY (`idingreso`) REFERENCES `ingresos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.detalle_ingresos: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ingresos` DISABLE KEYS */;
INSERT INTO `detalle_ingresos` (`id`, `idingreso`, `idarticulo`, `cantidad`, `precio`) VALUES
	(5, 4, 2, 100, 220.00),
	(6, 4, 1, 100, 20.00),
	(7, 5, 2, 50, 10.00),
	(8, 5, 1, 20, 20.00),
	(9, 6, 1, 50, 50.00),
	(10, 6, 2, 10, 250.00),
	(11, 6, 3, 5, 1250.00),
	(12, 7, 3, 1, 1500.00),
	(13, 8, 1, 10, 20.00),
	(14, 9, 3, 1, 1250.00),
	(15, 10, 3, 20, 2500.00),
	(16, 10, 2, 20, 2500.00),
	(17, 10, 1, 20, 2500.00);
/*!40000 ALTER TABLE `detalle_ingresos` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.detalle_ventas
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idventa` int(10) unsigned NOT NULL,
  `idarticulo` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_ventas_idventa_foreign` (`idventa`),
  KEY `detalle_ventas_idarticulo_foreign` (`idarticulo`),
  CONSTRAINT `detalle_ventas_idarticulo_foreign` FOREIGN KEY (`idarticulo`) REFERENCES `articulos` (`id`),
  CONSTRAINT `detalle_ventas_idventa_foreign` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.detalle_ventas: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` (`id`, `idventa`, `idarticulo`, `cantidad`, `precio`, `descuento`) VALUES
	(1, 1, 1, 10, 25.00, 0.00),
	(2, 2, 2, 1, 250.00, 0.00),
	(3, 2, 3, 1, 1500.00, 0.00),
	(4, 2, 1, 1, 20.00, 0.00),
	(5, 3, 1, 50, 20.00, 0.00),
	(6, 4, 1, 1, 20.00, 1.00),
	(7, 4, 2, 1, 250.00, 5.00),
	(8, 4, 3, 1, 1500.00, 20.00),
	(9, 5, 3, 2, 1500.00, 0.00),
	(10, 6, 3, 1, 1500.00, 0.00),
	(11, 7, 3, 2, 1500.00, 0.00),
	(12, 8, 3, 1, 1500.00, 0.00),
	(13, 9, 3, 1, 1500.00, 0.00),
	(14, 10, 3, 495, 1500.00, 1.00),
	(15, 10, 2, 495, 250.00, 1.00),
	(16, 10, 1, 495, 20.00, 1.00);
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.ingresos
CREATE TABLE IF NOT EXISTS `ingresos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproveedor` int(10) unsigned NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `tipo_comprobante` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie_comprobante` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_comprobante` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ingresos_idproveedor_foreign` (`idproveedor`),
  KEY `ingresos_idusuario_foreign` (`idusuario`),
  CONSTRAINT `ingresos_idproveedor_foreign` FOREIGN KEY (`idproveedor`) REFERENCES `proveedores` (`id`),
  CONSTRAINT `ingresos_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.ingresos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `ingresos` DISABLE KEYS */;
INSERT INTO `ingresos` (`id`, `idproveedor`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total`, `estado`, `created_at`, `updated_at`) VALUES
	(4, 7, 1, 'BOLETA', '0001', '00004', '2018-06-01 00:00:00', 0.18, 24000.00, 'Anulado', '2018-09-09 02:57:17', '2018-09-09 03:07:39'),
	(5, 3, 1, 'BOLETA', '0001', '00005', '2018-05-02 00:00:00', 0.18, 900.00, 'Anulado', '2018-09-09 03:23:08', '2018-09-09 03:23:26'),
	(6, 3, 1, 'BOLETA', '0001', '00006', '2018-07-04 00:00:00', 0.18, 11250.00, 'Registrado', '2018-09-09 23:12:41', '2018-09-09 23:12:41'),
	(7, 7, 1, 'BOLETA', '0001', '00005', '2018-09-10 00:00:00', 0.18, 1500.00, 'Registrado', '2018-09-09 23:46:47', '2018-09-09 23:46:47'),
	(8, 3, 1, 'BOLETA', '0001', '00006', '2018-09-09 00:00:00', 0.18, 200.00, 'Registrado', '2018-09-10 00:27:00', '2018-09-10 00:27:00'),
	(9, 7, 1, 'BOLETA', '0001', '00008', '2018-09-10 00:00:00', 0.18, 1250.00, 'Registrado', '2018-09-10 01:38:17', '2018-09-10 01:38:17'),
	(10, 3, 1, 'FACTURA', '011', '011', '2021-03-31 00:00:00', 0.18, 150000.00, 'Registrado', '2021-03-31 21:03:24', '2021-03-31 21:03:24');
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

-- Volcando datos para la tabla fundiacero.notifications: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
	('01ddeb26-cb7a-480a-a70c-8d46e59dd134', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 01:38:17', '2018-09-10 01:38:17'),
	('0ba42478-52c8-4c9d-a711-3d03d773c44f', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"}}}', '2021-04-01 09:33:12', '2021-03-31 21:01:22', '2021-04-01 09:33:12'),
	('114c73d8-5476-46d2-87e0-03e6677a15bf', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"}}}', NULL, '2021-03-31 21:01:23', '2021-03-31 21:01:23'),
	('12ee1930-fe16-4cfd-b2f8-79263702eea2', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":5,"msj":"Ingresos"}}}', NULL, '2018-09-10 00:27:01', '2018-09-10 00:27:01'),
	('18976400-e90c-4d79-a38b-a4fcb436edcc', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 01:38:17', '2018-09-10 01:38:17'),
	('250ff7aa-710e-4d8a-90a5-99ab17fdbbd1', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":5,"msj":"Ingresos"}}}', '2018-09-10 01:45:36', '2018-09-10 00:27:01', '2018-09-10 01:45:36'),
	('2f25b2d2-a00d-4b80-bd33-f131b8459584', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":4,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 18:04:12', '2018-09-10 18:04:12'),
	('3d9eaa7c-3a19-4759-93e9-9f3a5d3b6d49', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":4,"msj":"Ventas"},"ingresos":{"numero":5,"msj":"Ingresos"}}}', '2018-09-10 01:23:09', '2018-09-10 00:56:57', '2018-09-10 01:23:09'),
	('3ee696e5-119e-4fbb-b5d8-72933c3dc7e9', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":1,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', '2021-03-31 20:59:52', '2018-09-10 01:46:11', '2021-03-31 20:59:52'),
	('470c8032-ef72-4efd-a17b-5663f6a040a7', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":4,"msj":"Ingresos"}}}', '2018-09-10 01:23:09', '2018-09-09 23:46:47', '2018-09-10 01:23:09'),
	('4cd4dccf-82c1-4abb-a40b-61943fe08938', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":4,"msj":"Ventas"},"ingresos":{"numero":5,"msj":"Ingresos"}}}', '2018-09-10 01:45:36', '2018-09-10 00:56:57', '2018-09-10 01:45:36'),
	('5343a69b-6e42-4958-9fc4-cabf5f7d9581', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":0,"msj":"Ingresos"}}}', NULL, '2021-03-31 21:01:23', '2021-03-31 21:01:23'),
	('684458fa-75ec-4a51-b06e-4c1dbd965273', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":4,"msj":"Ventas"},"ingresos":{"numero":5,"msj":"Ingresos"}}}', NULL, '2018-09-10 00:56:57', '2018-09-10 00:56:57'),
	('6ba62dfd-d568-43e0-a549-dd9fde0771f3', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":2,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 17:40:15', '2018-09-10 17:40:15'),
	('8576a7a5-54e7-42ae-adaa-ac0a5e167420', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":3,"msj":"Ingresos"}}}', '2018-09-10 01:45:36', '2018-09-09 23:12:41', '2018-09-10 01:45:36'),
	('87329b11-c738-4687-b85f-2243e386c9e8', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":1,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', '2021-04-01 09:33:12', '2021-03-31 21:03:24', '2021-04-01 09:33:12'),
	('873a7350-0270-45ca-9749-65722c670804', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":0,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', '2021-03-31 20:59:52', '2018-09-10 01:38:17', '2021-03-31 20:59:52'),
	('8ca22592-976f-46cd-9e76-156e4d741ec0', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":4,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 18:04:12', '2018-09-10 18:04:12'),
	('8ff5f5ae-e4f0-4ab9-8d79-417aa9193c7b', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":2,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', '2021-03-31 20:59:52', '2018-09-10 17:40:14', '2021-03-31 20:59:52'),
	('90518822-036c-47de-9ddf-fe113fee9d1c', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":3,"msj":"Ingresos"}}}', '2018-09-10 01:23:09', '2018-09-09 23:12:41', '2018-09-10 01:23:09'),
	('9dadb61b-8165-43d9-91ba-58bbd205f1cc', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 17:59:05', '2018-09-10 17:59:05'),
	('a0c4696b-16c8-4178-8f77-ab2d8c93245d', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":1,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 01:46:11', '2018-09-10 01:46:11'),
	('a3b0afd2-99be-40f8-83ba-f70d4af58f48', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":5,"msj":"Ingresos"}}}', '2018-09-10 01:23:09', '2018-09-10 00:27:01', '2018-09-10 01:23:09'),
	('a7e8a01f-f5ee-4104-9188-5c6695dbbb4a', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', '2021-03-31 20:59:52', '2018-09-10 17:59:04', '2021-03-31 20:59:52'),
	('ae106c99-8990-4f72-a2f5-09274e201b43', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":1,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 01:46:11', '2018-09-10 01:46:11'),
	('b3304c5c-e163-482a-a26b-84c5692b3cf8', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":2,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 17:40:15', '2018-09-10 17:40:15'),
	('bd302132-1aba-417b-a12c-81bb09be6bba', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":1,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2021-03-31 21:03:25', '2021-03-31 21:03:25'),
	('c0f36d6b-9120-4837-b83d-f380851c87f4', 'App\\Notifications\\NotifyAdmin', 1, 'App\\User', '{"datos":{"ventas":{"numero":4,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', '2021-03-31 20:59:52', '2018-09-10 18:04:11', '2021-03-31 20:59:52'),
	('d2d26885-a007-4202-9d5a-fb7cf440e9d4', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2018-09-10 17:59:05', '2018-09-10 17:59:05'),
	('e3308d17-d631-49b6-b4f8-c02aa4226466', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":4,"msj":"Ingresos"}}}', NULL, '2018-09-09 23:46:47', '2018-09-09 23:46:47'),
	('e8673ed8-6ab6-4651-9d9b-1d7e08741e43', 'App\\Notifications\\NotifyAdmin', 6, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":4,"msj":"Ingresos"}}}', '2018-09-10 01:45:36', '2018-09-09 23:46:47', '2018-09-10 01:45:36'),
	('f0eed6a3-b7a4-4f0c-962c-f208aaabb142', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":3,"msj":"Ventas"},"ingresos":{"numero":3,"msj":"Ingresos"}}}', NULL, '2018-09-09 23:12:41', '2018-09-09 23:12:41'),
	('f4df5bff-ffd2-4704-95e8-c65e7bb7d60c', 'App\\Notifications\\NotifyAdmin', 5, 'App\\User', '{"datos":{"ventas":{"numero":1,"msj":"Ventas"},"ingresos":{"numero":1,"msj":"Ingresos"}}}', NULL, '2021-03-31 21:03:25', '2021-03-31 21:03:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.personas: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` (`id`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'angel', 'DNI', '72154871', 'calle los naranjos 852', '54328730', 'angeltotocayo_257@hotmail.com', NULL, NULL),
	(2, 'juan carlos', 'DNI', '54215485', 'Av. simon bolivar 410', '54328730', 'juan@gmail.com', NULL, NULL),
	(3, 'ELECTRONICS S.A.C.', 'RUC', '10585621457', 'Calle los jirasoles 20', '458521', 'electronics@hotmail.com', NULL, NULL),
	(4, 'Daniel', 'DNI', '45852541', 'Calle los tombos 63', '05478541', 'daniel@gmail.com', '2018-09-07 17:17:24', '2018-09-07 17:17:24'),
	(5, 'Jose', 'DNI', '30225415', 'Calle Perales 221', '556699', 'jose@gmail.com', '2018-09-07 17:19:08', '2018-09-07 17:19:08'),
	(6, 'Maximo', 'DNI', '30662512', 'Av la marina 120', '221155', 'maximo@gmail.com', '2018-09-07 17:20:16', '2018-09-07 17:20:16'),
	(7, 'ITD tecnology', 'RUC', '20548452584', 'Calle Octavio Muñoz Najar 215', '354896', 'itd@gmail.com', '2018-09-07 19:20:08', '2018-09-07 19:20:08');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(10) unsigned NOT NULL,
  `contacto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `proveedores_id_foreign` (`id`),
  CONSTRAINT `proveedores_id_foreign` FOREIGN KEY (`id`) REFERENCES `personas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.proveedores: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` (`id`, `contacto`, `telefono_contacto`) VALUES
	(3, 'Martin quiñones', '584721'),
	(7, 'Daniela Chamuco', '452512');
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
	(2, 'Vendedor', 'Vendedor área venta', 1),
	(3, 'Almacenero', 'Almacenero área compras', 1);
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

-- Volcando datos para la tabla fundiacero.tiempos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tiempos` DISABLE KEYS */;
INSERT INTO `tiempos` (`id`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
	(1, 'Kg', 'Kilogramos', 1, NULL, NULL),
	(2, 'Unidad', 'Producto por Unidad', 1, '2018-09-07 22:43:35', '2018-09-07 22:43:35'),
	(3, 'Tonelada', 'Producto por Toneladas', 1, '2018-09-07 22:43:55', '2018-09-07 22:43:55'),
	(4, 'Litros', 'Producto por Litro', 1, '2018-09-10 18:23:16', '2018-09-10 18:23:16'),
	(5, 'Metros', 'Productos por Metros', 1, '2018-09-10 18:23:50', '2018-09-10 18:23:50');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.unidads: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `unidads` DISABLE KEYS */;
INSERT INTO `unidads` (`id`, `nombre`, `descripcion`, `condicion`, `created_at`, `updated_at`) VALUES
	(1, 'Kg', 'Kilogramos', 1, NULL, NULL),
	(2, 'Unidad', 'Producto por Unidad', 1, '2018-09-07 22:43:35', '2018-09-07 22:43:35'),
	(3, 'Tonelada', 'Producto por Toneladas', 1, '2018-09-07 22:43:55', '2018-09-07 22:43:55'),
	(4, 'Litros', 'Producto por Litro', 1, '2018-09-10 18:23:16', '2018-09-10 18:23:16'),
	(5, 'Metros', 'Productos por Metros', 1, '2018-09-10 18:23:50', '2018-09-10 18:23:50');
/*!40000 ALTER TABLE `unidads` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `usuario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` tinyint(1) NOT NULL DEFAULT '1',
  `idrol` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  UNIQUE KEY `users_usuario_unique` (`usuario`),
  KEY `users_id_foreign` (`id`),
  KEY `users_idrol_foreign` (`idrol`),
  CONSTRAINT `users_id_foreign` FOREIGN KEY (`id`) REFERENCES `personas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_idrol_foreign` FOREIGN KEY (`idrol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.users: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `usuario`, `password`, `condicion`, `idrol`, `remember_token`) VALUES
	(1, 'admin', '$2y$12$fQVExSFUFZCNs.9xClllau9VAWQGMJZq7KNTQ14DgpO2djOIiEeVi', 1, 1, 'S44WfzsmRxAF6U4TNKcTN5g5Ws96VzVtwPro5uLIAhlJt4ZRJWB0elWm5OWs'),
	(5, 'jose', '$2y$10$/NCWJJ9aD60bi.KG/Nu4seGwesgiisIKb1k6eVHyM7mldYTyNfm8u', 1, 3, ''),
	(6, 'maxi', '$2y$10$Doyn0rEKDWS76NiZHxzjIu53u7VL5MDbGndautuyKv8iBygVDq1De', 1, 2, 'JaMiM71ZZDQiqPhOgqMNAZN6nn2TA2hqwOySO0LNaJidezJBD64caBVnL4qo');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Volcando estructura para tabla fundiacero.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcliente` int(10) unsigned NOT NULL,
  `idusuario` int(10) unsigned NOT NULL,
  `tipo_comprobante` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie_comprobante` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_comprobante` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_idcliente_foreign` (`idcliente`),
  KEY `ventas_idusuario_foreign` (`idusuario`),
  CONSTRAINT `ventas_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `personas` (`id`),
  CONSTRAINT `ventas_idusuario_foreign` FOREIGN KEY (`idusuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fundiacero.ventas: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`id`, `idcliente`, `idusuario`, `tipo_comprobante`, `serie_comprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `total`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 4, 1, 'BOLETA', '001', '0001', '2018-05-01 00:00:00', 18.00, 100.00, 'Anulado', NULL, '2018-09-09 19:35:19'),
	(2, 6, 1, 'BOLETA', '0001', '00002', '2018-06-05 00:00:00', 0.18, 1770.00, 'Anulado', '2018-09-09 19:05:01', '2018-09-09 19:41:05'),
	(3, 6, 1, 'BOLETA', '0001', '0003', '2018-05-07 00:00:00', 0.18, 1000.00, 'Registrado', '2018-09-09 19:19:37', '2018-09-09 19:19:37'),
	(4, 4, 1, 'BOLETA', '0001', '00005', '2018-09-09 00:00:00', 0.18, 1744.00, 'Registrado', '2018-09-09 19:37:59', '2018-09-09 19:37:59'),
	(5, 7, 6, 'BOLETA', '0001', '0007', '2018-09-09 00:00:00', 0.18, 3000.00, 'Registrado', '2018-09-10 00:56:57', '2018-09-10 00:56:57'),
	(6, 4, 6, 'BOLETA', '0001', '00009', '2018-09-10 00:00:00', 0.18, 1500.00, 'Registrado', '2018-09-10 01:46:11', '2018-09-10 01:46:11'),
	(7, 6, 1, 'BOLETA', '0001', '00009', '2018-09-10 00:00:00', 0.18, 3000.00, 'Registrado', '2018-09-10 17:40:13', '2018-09-10 17:40:13'),
	(8, 3, 1, 'BOLETA', '0001', '0010', '2018-09-10 00:00:00', 0.18, 1500.00, 'Registrado', '2018-09-10 17:59:04', '2018-09-10 17:59:04'),
	(9, 7, 1, 'BOLETA', '0001', '00011', '2018-09-10 00:00:00', 0.18, 1500.00, 'Registrado', '2018-09-10 18:04:11', '2018-09-10 18:04:11'),
	(10, 1, 1, 'FACTURA', '001', '001', '2021-03-31 00:00:00', 0.18, 876147.00, 'Registrado', '2021-03-31 21:01:22', '2021-03-31 21:01:22');
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

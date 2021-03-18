-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.6-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela shop.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela shop.brands: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` (`id`, `name`) VALUES
	(1, 'Nike'),
	(2, 'Mizuno');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

-- Copiando estrutura para tabela shop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela shop.categories: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `code`) VALUES
	(1, 'Sapatos', 'sapatos'),
	(2, 'Tenis', 'Tenis'),
	(3, 'Vestuario', 'Vestuario');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Copiando estrutura para tabela shop.coupons
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `value` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `coupon_type` (`coupon_type`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela shop.coupons: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` (`id`, `coupon_type`, `name`, `value`) VALUES
	(1, 1, 'ASDF', 10.00),
	(2, 2, 'ABC', 1.99);
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;

-- Copiando estrutura para tabela shop.coupons_relationed
CREATE TABLE IF NOT EXISTS `coupons_relationed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `category_id` (`category_id`) USING BTREE,
  KEY `brand_id` (`brand_id`),
  KEY `coupon_id` (`coupon_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela shop.coupons_relationed: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `coupons_relationed` DISABLE KEYS */;
INSERT INTO `coupons_relationed` (`id`, `coupon_id`, `category_id`, `brand_id`) VALUES
	(24, 1, 1, NULL),
	(25, 1, NULL, 1),
	(26, 2, 2, NULL),
	(27, 2, NULL, 1);
/*!40000 ALTER TABLE `coupons_relationed` ENABLE KEYS */;

-- Copiando estrutura para tabela shop.coupons_types
CREATE TABLE IF NOT EXISTS `coupons_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela shop.coupons_types: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `coupons_types` DISABLE KEYS */;
INSERT INTO `coupons_types` (`id`, `name`) VALUES
	(1, 'Fixed'),
	(2, 'Percent');
/*!40000 ALTER TABLE `coupons_types` ENABLE KEYS */;

-- Copiando estrutura para tabela shop.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT current_timestamp(),
  `type` varchar(50) DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `row` text DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela shop.logs: ~29 rows (aproximadamente)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` (`id`, `datetime`, `type`, `local`, `row`, `login`, `ip`) VALUES
	(1, '2021-03-18 07:58:08', 'login', 'users', 'admin', 'admin', '::1'),
	(2, '2021-03-18 07:58:30', 'store', 'categories', 'Sapatos - sapatos', 'admin', '::1'),
	(3, '2021-03-18 07:58:36', 'store', 'categories', 'Tenis - Tenis', 'admin', '::1'),
	(4, '2021-03-18 07:58:42', 'store', 'categories', 'Vestuario - Vestuario', 'admin', '::1'),
	(5, '2021-03-18 07:58:57', 'store', 'products_categories', '4 - 1', 'admin', '::1'),
	(6, '2021-03-18 07:58:57', 'update', 'products', 'Tênis Sneakers 43N - SKU01 -  - 0 - 459.99 - tenis-sneakers-43n.png', 'admin', '::1'),
	(7, '2021-03-18 07:59:04', 'store', 'products_categories', '4 - 1', 'admin', '::1'),
	(8, '2021-03-18 07:59:04', 'store', 'products_categories', '4 - 3', 'admin', '::1'),
	(9, '2021-03-18 07:59:04', 'update', 'products', 'Tênis Sneakers 43N - SKU01 -  - 0 - 459.99 - tenis-sneakers-43n.png', 'admin', '::1'),
	(10, '2021-03-18 08:09:43', 'store', 'brands', 'Nike', 'admin', '::1'),
	(11, '2021-03-18 08:10:37', 'store', 'brands', 'Nike', 'admin', '::1'),
	(12, '2021-03-18 08:10:43', 'store', 'brands', 'Mizuno', 'admin', '::1'),
	(13, '2021-03-18 08:13:26', 'update', 'brands', 'Nike1', 'admin', '::1'),
	(14, '2021-03-18 08:13:40', 'update', 'brands', 'Nike', 'admin', '::1'),
	(15, '2021-03-18 08:15:22', 'store', 'brands', 'teste', 'admin', '::1'),
	(16, '2021-03-18 08:15:24', 'delete', 'brands', '3', 'admin', '::1'),
	(17, '2021-03-18 10:18:31', 'store', 'products', '4 - teste', 'admin', '::1'),
	(18, '2021-03-18 11:28:48', 'store', 'products_categories', '4 - 2', 'admin', '::1'),
	(19, '2021-03-18 11:28:48', 'update', 'products', 'teste1 -  -  -  -  - ', 'admin', '::1'),
	(20, '2021-03-18 11:32:14', 'update', 'coupons', 'teste1', 'admin', '::1'),
	(21, '2021-03-18 11:32:22', 'update', 'coupons', 'teste1', 'admin', '::1'),
	(22, '2021-03-18 11:33:09', 'update', 'coupons', 'teste1', 'admin', '::1'),
	(23, '2021-03-18 11:33:32', 'update', 'coupons', 'teste1', 'admin', '::1'),
	(24, '2021-03-18 11:33:36', 'update', 'coupons', 'teste1', 'admin', '::1'),
	(25, '2021-03-18 11:33:46', 'update', 'coupons', 'teste1', 'admin', '::1'),
	(26, '2021-03-18 11:33:53', 'update', 'coupons', 'teste1', 'admin', '::1'),
	(27, '2021-03-18 11:35:05', 'update', 'coupons', 'teste1', 'admin', '::1'),
	(28, '2021-03-18 11:35:10', 'delete', 'coupons', '4', 'admin', '::1'),
	(29, '2021-03-18 18:03:13', 'login', 'users', 'admin', 'admin', '::1'),
	(30, '2021-03-18 18:29:59', 'login', 'users', 'admin', 'admin', '::1'),
	(31, '2021-03-18 18:42:26', 'store', 'products_categories', '4 - 2', 'admin', '::1'),
	(32, '2021-03-18 18:42:26', 'update', 'products', 'teste1 - 1234 -  - 5 - 1.99 - ', 'admin', '::1'),
	(33, '2021-03-18 18:42:45', 'update', 'coupons', 'ASDF', 'admin', '::1'),
	(34, '2021-03-18 18:44:47', 'update', 'coupons', 'ASDF', 'admin', '::1'),
	(35, '2021-03-18 18:55:24', 'update', 'coupons', 'ABC', 'admin', '::1');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Copiando estrutura para tabela shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `sku` varchar(30) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `qty` int(11) DEFAULT 0,
  `price` decimal(10,2) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela shop.products: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `brand_id`, `name`, `sku`, `description`, `qty`, `price`, `img`) VALUES
	(1, 0, 'Tênis Runner Bolt', NULL, NULL, 9, 459.99, 'tenis-runner-bolt.png'),
	(2, 0, 'Tênis Basket Light', NULL, NULL, 1, 459.99, 'tenis-basket-light.png'),
	(3, 0, 'Tênis 2D Shoes', NULL, NULL, 2, 459.99, 'tenis-2d-shoes.png'),
	(4, 1, 'teste1', '1234', '', 5, 1.99, '');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Copiando estrutura para tabela shop.products_categories
CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela shop.products_categories: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `products_categories` DISABLE KEYS */;
INSERT INTO `products_categories` (`id`, `product_id`, `category_id`) VALUES
	(5, 4, 2),
	(6, 4, 1);
/*!40000 ALTER TABLE `products_categories` ENABLE KEYS */;

-- Copiando estrutura para tabela shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela shop.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`) VALUES
	(1, 'admin', '$2y$10$s5hNOpGkJSqzpflgDA1E/ei8mM2kRGOfc7vJvYLoReyFhCsrp/F8C');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

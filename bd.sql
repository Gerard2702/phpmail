-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para davivienda
CREATE DATABASE IF NOT EXISTS `davivienda` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `davivienda`;

-- Volcando estructura para tabla davivienda.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `birth_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla davivienda.users: ~12 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `birth_date`) VALUES
	(1, 'Gerardo Adolfo Orellana Perez', 'gerard.gt2015@gmail.com', '1994-08-10'),
	(2, 'Karoline T. Beason', 'gerard.gt2009@gmail.com', '1990-08-10'),
	(3, 'Judith M. Harrison', 'gerard.gt2015@gmail.com', '1990-01-20'),
	(4, 'Donald B. Cook', 'gerard.gt2015@gmail.com', '1995-02-14'),
	(5, 'Jack T. Ogle', 'gerard.gt2015@gmail.com', '1985-03-10'),
	(6, 'Kermit S. Lee', 'gerard.gt2015@gmail.com', '1994-01-20'),
	(7, 'Robert A. Osborne', 'gerard.gt2015@gmail.com', '1987-08-25'),
	(8, 'Angela S. Hamilton', 'gerard.gt2015@gmail.com', '1984-08-09'),
	(9, 'Kathleen Z. Wolfe', 'gerard.gt2015@gmail.com', '1999-02-10'),
	(10, 'Gregory C. Shearer', 'gerard.gt2015@gmail.com', '1993-04-29'),
	(11, 'Leonard J. Garman', 'gerard.gt2015@gmail.com', '1982-10-11'),
	(12, 'Devon J. Bricker', 'gerard.gt2015@gmail.com', '1984-12-31');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

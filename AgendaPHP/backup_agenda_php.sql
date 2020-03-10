-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla agenda.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `empresa` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci,
  `email` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `foto` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla agenda.contactos: ~6 rows (aproximadamente)
DELETE FROM `contactos`;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` (`id`, `nombre`, `apellido`, `empresa`, `email`, `telefono`, `fecha_nacimiento`, `foto`) VALUES
	(1, 'Allan', 'Sanchez', 'OMG', 'asanchez@gmail.com', '(506) 1234-4321', '1995-09-26', 'views/img/perfil/perfil781.png'),
	(5, 'Allan Edrey', 'Sanchez Rixtun', 'Sin Trabajo', 'asanchez@gmail.com', '(502) 5557-8494', '1995-09-25', 'views/img/photo.jpg'),
	(7, 'Allan Edrey', 'Sanchez Rixtun', 'Sin Trabajo', 'asanchez@gmail.com', '(502) 5557-8494', '1995-09-25', 'views/img/photo.jpg'),
	(8, 'Nancy', 'Ramirez', 'TV', 'ramirez@gmail.com', '(123) 4122-1444', '2018-07-17', 'views/img/perfil/perfil732.jpg'),
	(9, 'Ana luisda', 'Reyes', 'MUNI', 'anastacia@gmail.com', '(111) 1111-1111', '2018-07-11', 'views/img/perfil/perfil767.png');
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

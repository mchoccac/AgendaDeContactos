
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `crudcine` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crudcine`;


DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `codevento` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ciudad` varchar(15) CHARACTER SET utf8 NOT NULL DEFAULT 'Málaga',
  `fecpeli` date NOT NULL,
  `codpelicula` int(11) DEFAULT NULL,
  PRIMARY KEY (`codevento`),
  KEY `codpelicula` (`codpelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;


INSERT INTO `evento` (`codevento`, `lugar`, `ciudad`, `fecpeli`, `codpelicula`) VALUES
(17, 'Vialia', 'Málaga', '2019-03-31', 17),
(18, 'Rosaleda', 'Málaga', '2019-03-28', 15),
(19, 'Vialia', 'Málaga', '2019-03-25', 18),
(20, 'Eroski', 'Málaga', '2019-03-24', 17),
(21, 'Misericordia', 'Málaga', '2019-07-28', 16);


DROP TABLE IF EXISTS `peliula`;
CREATE TABLE IF NOT EXISTS `peliula` (
  `codpeli` int(11) NOT NULL AUTO_INCREMENT,
  `nompeli` varchar(40) NOT NULL,
  `despeli` text CHARACTER SET utf8,
  PRIMARY KEY (`codpeli`),
  UNIQUE KEY `nompeli` (`nompeli`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;


INSERT INTO `peliula` (`codpeli`, `nompeli`, `despeli`) VALUES
(15, 'Shrek', 'Ogro que salva a princesa'),
(16, 'Spiderman', 'Superhéroe mitad araña'),
(17, 'Torrente 1', 'El brazo tonto de la ley'),
(18, 'Titanic', 'Historia amorosa en un barco');

ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`codpelicula`) REFERENCES `peliula` (`codpeli`) ON DELETE CASCADE ON UPDATE CASCADE;

USE `phpmyadmin`;


COMMIT;

-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projeto_reservas
CREATE DATABASE IF NOT EXISTS `projeto_reservas` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `projeto_reservas`;

-- Copiando estrutura para tabela projeto_reservas.carro
CREATE TABLE IF NOT EXISTS `carro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_carro` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto_reservas.carro: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
INSERT INTO `carro` (`id`, `nome_carro`) VALUES
	(1, 'Fiat'),
	(2, 'Wolksvagem'),
	(3, 'Palio');
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_reservas.reserva
CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_carro` int(11) DEFAULT NULL,
  `data_ini` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `pessoa` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_carro` (`id_carro`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto_reservas.reserva: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` (`id`, `id_carro`, `data_ini`, `data_fim`, `pessoa`) VALUES
	(1, 2, '2020-03-11', '2020-03-21', 'Brendon'),
	(5, 3, '2020-03-11', '2020-03-15', 'Lucas'),
	(12, 1, '2020-03-11', '2020-03-21', 'a');
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

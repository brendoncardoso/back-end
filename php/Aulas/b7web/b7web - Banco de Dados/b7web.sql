-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para b7web
CREATE DATABASE IF NOT EXISTS `b7web` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `b7web`;

-- Copiando estrutura para tabela b7web.faixas
CREATE TABLE IF NOT EXISTS `faixas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela b7web.faixas: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `faixas` DISABLE KEYS */;
INSERT INTO `faixas` (`id`, `titulo`) VALUES
	(1, '0 - 1000'),
	(2, '1001 a 5000'),
	(3, '5001 - 30000');
/*!40000 ALTER TABLE `faixas` ENABLE KEYS */;

-- Copiando estrutura para tabela b7web.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `data_nascimento` date NOT NULL,
  `contagem` int(11) NOT NULL,
  `faixa_salarial` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela b7web.usuarios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_nascimento`, `contagem`, `faixa_salarial`) VALUES
	(7, 'Brendon', 'brendon2@brendon.com', '1234', '1999-12-06', 3, 3),
	(8, 'Yago', 'yago@yago.com', '1234', '2019-06-10', 1, 1),
	(9, 'Pedro', 'pedro@pedro.com', '1234', '1998-05-25', 2, 2),
	(10, 'Yasmin', 'yasmin@yasmin.com', '1234', '1994-04-30', 4, 1),
	(11, 'fantasma', 'fantasma@fantasma.com', '1234', '2000-01-22', 0, 0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

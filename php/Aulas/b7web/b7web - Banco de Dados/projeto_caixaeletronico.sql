-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.38-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para projeto_caixaeletronico
CREATE DATABASE IF NOT EXISTS `projeto_caixaeletronico` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `projeto_caixaeletronico`;

-- Copiando estrutura para tabela projeto_caixaeletronico.contas
CREATE TABLE IF NOT EXISTS `contas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agencia` int(11) NOT NULL,
  `conta` int(11) NOT NULL,
  `senha` int(32) NOT NULL,
  `saldo` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela projeto_caixaeletronico.contas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
INSERT INTO `contas` (`id`, `titular`, `agencia`, `conta`, `senha`, `saldo`) VALUES
	(1, 'Brendon', 1234, 1, 9981, 1000),
	(2, 'Igor', 2222, 2, 612, 2000);
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto_caixaeletronico.historico
CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_conta` int(10) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `valor` float NOT NULL,
  `data_operacao` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela projeto_caixaeletronico.historico: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
INSERT INTO `historico` (`id`, `id_conta`, `tipo`, `valor`, `data_operacao`) VALUES
	(1, 1, 1, 1000, '2019-06-13 00:00:00'),
	(2, 1, 2, 2000, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

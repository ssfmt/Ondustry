-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.4.19-MariaDB - mariadb.org binary distribution
-- SO do servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para ondustrydb
CREATE DATABASE IF NOT EXISTS `ondustrydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ondustrydb`;

-- A despejar estrutura para tabela ondustrydb.bidsoportunidade
CREATE TABLE IF NOT EXISTS `bidsoportunidade` (
  `idBid` int(11) NOT NULL AUTO_INCREMENT,
  `estado` int(11) DEFAULT NULL,
  `prestador` int(11) DEFAULT NULL,
  `capacidade` varchar(200) DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `orcamento` double DEFAULT NULL,
  `descricao` longtext DEFAULT NULL,
  `oportunidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBid`),
  KEY `FK_bidsoportunidade_estadobids` (`estado`),
  KEY `FK_bidsoportunidade_utilizador` (`prestador`),
  KEY `FK_bidsoportunidade_oportunidade` (`oportunidade`),
  CONSTRAINT `FK_bidsoportunidade_estadobids` FOREIGN KEY (`estado`) REFERENCES `estadobids` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_bidsoportunidade_oportunidade` FOREIGN KEY (`oportunidade`) REFERENCES `oportunidade` (`idOportunidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_bidsoportunidade_utilizador` FOREIGN KEY (`prestador`) REFERENCES `utilizador` (`idUtilizador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- A despejar dados para tabela ondustrydb.bidsoportunidade: ~3 rows (aproximadamente)
DELETE FROM `bidsoportunidade`;
/*!40000 ALTER TABLE `bidsoportunidade` DISABLE KEYS */;
INSERT INTO `bidsoportunidade` (`idBid`, `estado`, `prestador`, `capacidade`, `prazo`, `orcamento`, `descricao`, `oportunidade`) VALUES
	(5, 2, 2, '123', '2022-01-04', 345.3463, 'Descrição de uma bid', 1),
	(6, 1, 2, '4324', '2024-11-04', 5235, 'Descrição de outra bid', 1),
	(7, 3, 2, '3434141', '2022-01-20', 41414, 'Uma descrição', 1);
/*!40000 ALTER TABLE `bidsoportunidade` ENABLE KEYS */;

-- A despejar estrutura para tabela ondustrydb.distrito
CREATE TABLE IF NOT EXISTS `distrito` (
  `codDistrito` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codDistrito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- A despejar dados para tabela ondustrydb.distrito: ~17 rows (aproximadamente)
DELETE FROM `distrito`;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
INSERT INTO `distrito` (`codDistrito`, `descricao`) VALUES
	(1, 'Aveiro'),
	(2, 'Beja'),
	(3, 'Braga'),
	(4, 'Bragança'),
	(5, 'Castelo Branco'),
	(6, 'Coimbra'),
	(7, 'Évora'),
	(8, 'Faro'),
	(9, 'Guarda'),
	(10, 'Leiria'),
	(11, 'Lisboa'),
	(12, 'Portalegre'),
	(13, 'Porto'),
	(14, 'Santarém'),
	(15, 'Setúbal'),
	(16, 'Viana do Castelo'),
	(17, 'Vila Real'),
	(18, 'Viseu');
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;

-- A despejar estrutura para tabela ondustrydb.estadobids
CREATE TABLE IF NOT EXISTS `estadobids` (
  `idEstado` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- A despejar dados para tabela ondustrydb.estadobids: ~2 rows (aproximadamente)
DELETE FROM `estadobids`;
/*!40000 ALTER TABLE `estadobids` DISABLE KEYS */;
INSERT INTO `estadobids` (`idEstado`, `descricao`) VALUES
	(1, 'Aberta'),
	(2, 'Aceite'),
	(3, 'Recusada');
/*!40000 ALTER TABLE `estadobids` ENABLE KEYS */;

-- A despejar estrutura para tabela ondustrydb.estadooportunidade
CREATE TABLE IF NOT EXISTS `estadooportunidade` (
  `idEstadoOportunidade` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEstadoOportunidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- A despejar dados para tabela ondustrydb.estadooportunidade: ~2 rows (aproximadamente)
DELETE FROM `estadooportunidade`;
/*!40000 ALTER TABLE `estadooportunidade` DISABLE KEYS */;
INSERT INTO `estadooportunidade` (`idEstadoOportunidade`, `descricao`) VALUES
	(1, 'Ativa'),
	(2, 'Atribuída'),
	(3, 'Concluída');
/*!40000 ALTER TABLE `estadooportunidade` ENABLE KEYS */;

-- A despejar estrutura para tabela ondustrydb.oportunidade
CREATE TABLE IF NOT EXISTS `oportunidade` (
  `idOportunidade` int(11) NOT NULL AUTO_INCREMENT,
  `marca` int(11) DEFAULT NULL,
  `setor` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `orcamento` decimal(20,6) DEFAULT NULL,
  `descricao` longtext DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOportunidade`),
  KEY `FK_oportunidade_utilizador` (`marca`),
  KEY `FK_oportunidade_setor` (`setor`),
  KEY `FK_oportunidade_tipooportunidade` (`tipo`),
  KEY `FK_oportunidade_estadooportunidade` (`estado`),
  CONSTRAINT `FK_oportunidade_estadooportunidade` FOREIGN KEY (`estado`) REFERENCES `estadooportunidade` (`idEstadoOportunidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_oportunidade_setor` FOREIGN KEY (`setor`) REFERENCES `setor` (`codSetor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_oportunidade_tipooportunidade` FOREIGN KEY (`tipo`) REFERENCES `tipooportunidade` (`idTipoOportunidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_oportunidade_utilizador` FOREIGN KEY (`marca`) REFERENCES `utilizador` (`idUtilizador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- A despejar dados para tabela ondustrydb.oportunidade: ~2 rows (aproximadamente)
DELETE FROM `oportunidade`;
/*!40000 ALTER TABLE `oportunidade` DISABLE KEYS */;
INSERT INTO `oportunidade` (`idOportunidade`, `marca`, `setor`, `tipo`, `quantidade`, `prazo`, `orcamento`, `descricao`, `estado`) VALUES
	(1, 1, 5, 1, 325235, '2022-01-02', 3.000000, 'Descrição de uma oportunidade', 2),
	(4, 1, 5, 1, 23, '2022-01-04', 3214.000000, 'Descrição de outra oportunidade', 1);
/*!40000 ALTER TABLE `oportunidade` ENABLE KEYS */;

-- A despejar estrutura para tabela ondustrydb.setor
CREATE TABLE IF NOT EXISTS `setor` (
  `codSetor` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codSetor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- A despejar dados para tabela ondustrydb.setor: ~14 rows (aproximadamente)
DELETE FROM `setor`;
/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
INSERT INTO `setor` (`codSetor`, `descricao`) VALUES
	(1, 'Têxtil'),
	(2, 'Vestuário'),
	(3, 'Calçado'),
	(4, 'Base Florestal'),
	(5, 'Alimentar'),
	(6, 'Bebidas'),
	(7, 'Química'),
	(8, 'Couro'),
	(9, 'Borracha'),
	(10, 'Plástico'),
	(11, 'Aço'),
	(12, 'Materiais Elétricos e Eletrónicos'),
	(13, 'Mobiliário'),
	(14, 'Materiais de Construção'),
	(15, 'Cultural e Criativo');
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;

-- A despejar estrutura para tabela ondustrydb.tipooportunidade
CREATE TABLE IF NOT EXISTS `tipooportunidade` (
  `idTipoOportunidade` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idTipoOportunidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- A despejar dados para tabela ondustrydb.tipooportunidade: ~0 rows (aproximadamente)
DELETE FROM `tipooportunidade`;
/*!40000 ALTER TABLE `tipooportunidade` DISABLE KEYS */;
INSERT INTO `tipooportunidade` (`idTipoOportunidade`, `descricao`) VALUES
	(1, 'bebidas');
/*!40000 ALTER TABLE `tipooportunidade` ENABLE KEYS */;

-- A despejar estrutura para tabela ondustrydb.tipoutilizador
CREATE TABLE IF NOT EXISTS `tipoutilizador` (
  `codTipoUtilizador` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codTipoUtilizador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- A despejar dados para tabela ondustrydb.tipoutilizador: ~2 rows (aproximadamente)
DELETE FROM `tipoutilizador`;
/*!40000 ALTER TABLE `tipoutilizador` DISABLE KEYS */;
INSERT INTO `tipoutilizador` (`codTipoUtilizador`, `descricao`) VALUES
	(1, 'marca'),
	(2, 'prestadorServicos');
/*!40000 ALTER TABLE `tipoutilizador` ENABLE KEYS */;

-- A despejar estrutura para tabela ondustrydb.utilizador
CREATE TABLE IF NOT EXISTS `utilizador` (
  `idUtilizador` int(11) NOT NULL AUTO_INCREMENT,
  `tipoUtilizador` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `setor` int(11) DEFAULT NULL,
  `morada` varchar(200) DEFAULT NULL,
  `localidade` varchar(100) DEFAULT NULL,
  `codPostal` varchar(8) DEFAULT NULL,
  `distrito` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUtilizador`),
  KEY `tipoUtilizador` (`tipoUtilizador`),
  KEY `setor` (`setor`),
  KEY `distrito` (`distrito`),
  CONSTRAINT `distrito_ibdf_3` FOREIGN KEY (`distrito`) REFERENCES `distrito` (`codDistrito`),
  CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`tipoUtilizador`) REFERENCES `tipoutilizador` (`codTipoUtilizador`),
  CONSTRAINT `utilizador_ibfk_2` FOREIGN KEY (`setor`) REFERENCES `setor` (`codSetor`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- A despejar dados para tabela ondustrydb.utilizador: ~2 rows (aproximadamente)
DELETE FROM `utilizador`;
/*!40000 ALTER TABLE `utilizador` DISABLE KEYS */;
INSERT INTO `utilizador` (`idUtilizador`, `tipoUtilizador`, `email`, `PASSWORD`, `nome`, `nif`, `setor`, `morada`, `localidade`, `codPostal`, `distrito`) VALUES
	(1, 1, 'user@user.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Marca', 123456789, 5, 'Rua da Quinta nº24 ', 'Oeiras', '1234-123', 11),
	(2, 2, 'ps@user.com', '32250170a0dca92d53ec9624f336ca24', 'Manuel Produtor', 124567893, 5, 'Avenida da Fábrica nº3', 'Loures', '2356-435', 11);
/*!40000 ALTER TABLE `utilizador` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: 18-Dez-2019 às 17:07
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alarme`
--

DROP TABLE IF EXISTS `alarme`;
CREATE TABLE IF NOT EXISTS `alarme` (
  `idAlarme` int(11) NOT NULL AUTO_INCREMENT,
  `Hora` date NOT NULL,
  `Quantidade` double NOT NULL,
  `Medicamento_idMedicamento` int(11) NOT NULL,
  `Pessoa_idPessoa` int(11) NOT NULL,
  PRIMARY KEY (`idAlarme`) USING BTREE,
  KEY `fk_Alarme_Medicamento1` (`Medicamento_idMedicamento`),
  KEY `fk_IdPessoa` (`Pessoa_idPessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('guest', '4', 1576064717),
('medico', '3', 1576064717),
('secretaria', '2', 1576064717),
('utente', '1', 1576064717),
('utente', '3', 1576064733);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('createPost', 2, 'Create a post', NULL, NULL, 1576064717, 1576064717),
('deletePost', 2, 'Delete a post', NULL, NULL, 1576064717, 1576064717),
('guest', 1, NULL, NULL, NULL, 1576064717, 1576064717),
('medico', 1, NULL, NULL, NULL, 1576064717, 1576064717),
('secretaria', 1, NULL, NULL, NULL, 1576064717, 1576064717),
('updateOwnPost', 2, 'Update own post', NULL, NULL, 1576064717, 1576064717),
('updatePost', 2, 'Update a post', NULL, NULL, 1576064717, 1576064717),
('utente', 1, NULL, NULL, NULL, 1576064717, 1576064717),
('viewPost', 2, 'View a post', NULL, NULL, 1576064717, 1576064717);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('utente', 'createPost'),
('medico', 'secretaria'),
('utente', 'updateOwnPost'),
('secretaria', 'updatePost'),
('secretaria', 'utente'),
('utente', 'viewPost');

-- --------------------------------------------------------

--
-- Estrutura da tabela `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `idConsulta` int(11) NOT NULL AUTO_INCREMENT,
  `DataConsulta` date NOT NULL,
  `hora` time NOT NULL,
  `TipoConsulta` varchar(45) NOT NULL,
  `Descricao` varchar(45) DEFAULT NULL,
  `Estado` tinyint(2) NOT NULL DEFAULT '0',
  `idMedico` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  PRIMARY KEY (`idConsulta`),
  KEY `fk_Pessoa_Medico` (`idMedico`),
  KEY `fk_Pessoa_Funcionario` (`idFuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`idConsulta`, `DataConsulta`, `hora`, `TipoConsulta`, `Descricao`, `Estado`, `idMedico`, `idFuncionario`) VALUES
(4, '1999-04-05', '23:00:00', 'jhjjk', 'descricao', 0, 5, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fichatecnica`
--

DROP TABLE IF EXISTS `fichatecnica`;
CREATE TABLE IF NOT EXISTS `fichatecnica` (
  `idFichaClinica` int(11) NOT NULL AUTO_INCREMENT,
  `Ficheiro` varchar(45) DEFAULT NULL,
  `Observacoes` varchar(45) DEFAULT NULL,
  `Consulta_idConsulta` int(11) NOT NULL,
  PRIMARY KEY (`idFichaClinica`),
  KEY `fk_Consulta_idConsulta` (`Consulta_idConsulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcacao_consulta`
--

DROP TABLE IF EXISTS `marcacao_consulta`;
CREATE TABLE IF NOT EXISTS `marcacao_consulta` (
  `idMarcacao_Consulta` int(11) NOT NULL AUTO_INCREMENT,
  `Pessoa_idPessoa` int(11) NOT NULL,
  `Consulta_idConsulta` int(11) DEFAULT NULL,
  `Estado` tinyint(2) NOT NULL DEFAULT '0',
  `Descricao` varchar(150) NOT NULL,
  `Urgente` tinyint(2) NOT NULL,
  PRIMARY KEY (`idMarcacao_Consulta`,`Pessoa_idPessoa`) USING BTREE,
  UNIQUE KEY `Consulta_idConsulta` (`Consulta_idConsulta`),
  KEY `fk_Pessoa_Utente` (`Pessoa_idPessoa`),
  KEY `fk_Consulta_Consulta` (`Consulta_idConsulta`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marcacao_consulta`
--

INSERT INTO `marcacao_consulta` (`idMarcacao_Consulta`, `Pessoa_idPessoa`, `Consulta_idConsulta`, `Estado`, `Descricao`, `Urgente`) VALUES
(1, 1, 4, 0, 'quero uma consulta', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
CREATE TABLE IF NOT EXISTS `medicamento` (
  `idMedicamento` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idMedicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1573666546),
('m130524_201442_init', 1573666549),
('m190124_110200_add_verification_token_column_to_user_table', 1573666549),
('m191113_182207_user', 1573669376),
('m191029_101340_init_rbac_author', 1576064717);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE IF NOT EXISTS `pessoa` (
  `idPessoa` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Morada` varchar(45) NOT NULL,
  `NumUtenteSaude` int(9) NOT NULL,
  `NumIDCivil` int(9) NOT NULL,
  `TipoUtilizador` enum('Medico','Utente','Funcionario') NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idPessoa`),
  KEY `fk_User_idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `Nome`, `DataNascimento`, `Morada`, `NumUtenteSaude`, `NumIDCivil`, `TipoUtilizador`, `idUser`) VALUES
(1, 'mica', '1999-06-04', 'adsjkkjda', 111111111, 123123123, 'Utente', 1),
(2, 'mica', '1999-06-04', 'adsjkkjda', 111111111, 123123123, 'Utente', 1),
(3, 'mica', '1999-06-04', 'wsma', 111111111, 111111111, 'Utente', 1),
(4, 'func', '1980-03-03', 'hsjsk', 888888888, 888888888, 'Funcionario', 1),
(5, 'medico', '1990-04-04', 'ewjdj', 898999999, 999999999, 'Medico', 1),
(6, 'func', '1990-04-03', 'sadasd', 555555555, 555555555, 'Funcionario', 2),
(7, 'mica', '2019-11-27', 'jdfkj', 234444444, 444444444, 'Utente', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

DROP TABLE IF EXISTS `receita`;
CREATE TABLE IF NOT EXISTS `receita` (
  `idReceita` int(11) NOT NULL AUTO_INCREMENT,
  `DataReceita` date NOT NULL,
  `Prescricao` varchar(100) NOT NULL,
  `Consulta_idConsulta` int(11) NOT NULL,
  PRIMARY KEY (`idReceita`),
  KEY `fk_idConsulta` (`Consulta_idConsulta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita_has_medicamento`
--

DROP TABLE IF EXISTS `receita_has_medicamento`;
CREATE TABLE IF NOT EXISTS `receita_has_medicamento` (
  `Receita_idReceita` int(11) NOT NULL,
  `Medicamento_idMedicamento` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Dosagem_Diario` double NOT NULL,
  PRIMARY KEY (`Receita_idReceita`,`Medicamento_idMedicamento`),
  KEY `fk_Medicamento_Medicamento` (`Medicamento_idMedicamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', '6Ko_kKxxbJ1d3Vm09QwyvQAm8h9Hjo02', '$2y$13$GCIMK096OOYoqqncn.fzpePI7PVTwL/bgbXzfTAhz9NvEQdDkhP0y', NULL, 'admin@hotmail.com', 10, 1574955316, 1574955316, 'l_1E-sBdZeP0KNmYUmLDR2jxm4dGfikK_1574955316'),
(2, 'func', 'Ps9km9VRfV58reL-_Bd9Ni0ApdMjUKVt', '$2y$13$4ZCdONE2.K5RXe3NtHGsGeos0mu5d7VpjSGhL8FNK1ZoedriT.3QC', NULL, 'func@pt.pt', 10, 1575304244, 1575304244, 'p7evZ3fs4KABLuenLOuppAA0pqsMT761_1575304244'),
(3, 'mica', 'kTpY-wC59L7JvSz9OuDHtg3t-vMU60fN', '$2y$13$Af18xVDmS3mIATr.fUbZg.u/HHnXzQVbgS0IrucGcpDYVL2Zc5F9W', NULL, 'micaelamartins12@hotmail.com', 10, 1576064733, 1576064733, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_Pessoa_Funcionario` FOREIGN KEY (`idFuncionario`) REFERENCES `pessoa` (`idPessoa`),
  ADD CONSTRAINT `fk_Pessoa_Medico` FOREIGN KEY (`idMedico`) REFERENCES `pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `fichatecnica`
--
ALTER TABLE `fichatecnica`
  ADD CONSTRAINT `fk_Consulta_idConsulta` FOREIGN KEY (`Consulta_idConsulta`) REFERENCES `consulta` (`idConsulta`);

--
-- Limitadores para a tabela `marcacao_consulta`
--
ALTER TABLE `marcacao_consulta`
  ADD CONSTRAINT `fk_Consulta_Consulta` FOREIGN KEY (`Consulta_idConsulta`) REFERENCES `consulta` (`idConsulta`),
  ADD CONSTRAINT `fk_Pessoa_Utente` FOREIGN KEY (`Pessoa_idPessoa`) REFERENCES `pessoa` (`idPessoa`);

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `fk_User_idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Limitadores para a tabela `receita`
--
ALTER TABLE `receita`
  ADD CONSTRAINT `fk_idConsulta` FOREIGN KEY (`Consulta_idConsulta`) REFERENCES `consulta` (`idConsulta`);

--
-- Limitadores para a tabela `receita_has_medicamento`
--
ALTER TABLE `receita_has_medicamento`
  ADD CONSTRAINT `fk_Medicamento_Medicamento` FOREIGN KEY (`Medicamento_idMedicamento`) REFERENCES `medicamento` (`idMedicamento`),
  ADD CONSTRAINT `fk_Receita_Receita` FOREIGN KEY (`Receita_idReceita`) REFERENCES `receita` (`idReceita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

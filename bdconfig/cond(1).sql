-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 26-Nov-2014 às 20:14
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `cond`
--
CREATE DATABASE IF NOT EXISTS `cond` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cond`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apartamento`
--

CREATE TABLE IF NOT EXISTS `apartamento` (
  `idapartamento` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `apCondominioId` int(11) NOT NULL,
  PRIMARY KEY (`idapartamento`),
  KEY `fk_Apartamento_Condominio1_idx` (`apCondominioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `apartamento`
--

INSERT INTO `apartamento` (`idapartamento`, `numero`, `apCondominioId`) VALUES
(1, 102, 1),
(2, 102, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('8d4c2fc5067c4ef2d46bde7224a724cd', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1; rv:33.0) Gecko/20100101 Firefox/33.0', 1417029023, 'a:4:{s:12:"is_logued_in";b:1;s:10:"id_usuario";s:2:"18";s:6:"perfil";s:13:"administrador";s:4:"nome";s:5:"admin";}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominio`
--

CREATE TABLE IF NOT EXISTS `condominio` (
  `condominioId` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`condominioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `condominio`
--

INSERT INTO `condominio` (`condominioId`, `nome`) VALUES
(1, 'Visual');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contaspagar`
--

CREATE TABLE IF NOT EXISTS `contaspagar` (
  `idConstasPagar` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `valorQtd` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `PagarcondominioId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConstasPagar`),
  KEY `fk_contaspagar_Condominio1_idx` (`PagarcondominioId`),
  KEY `nome` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contasreceber`
--

CREATE TABLE IF NOT EXISTS `contasreceber` (
  `idContasReceber` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `valorQtd` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `RecebercondominioId` int(11) DEFAULT NULL,
  `ReceberapartamentoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`idContasReceber`),
  KEY `fk_ContasReceber_Condominio1_idx` (`RecebercondominioId`),
  KEY `fk_ContasReceber_Apartamento1_idx` (`ReceberapartamentoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `contasreceber`
--

INSERT INTO `contasreceber` (`idContasReceber`, `nome`, `valor`, `valorQtd`, `total`, `RecebercondominioId`, `ReceberapartamentoId`) VALUES
(2, 'Agua', '1', '1', '55,00', 1, 1),
(3, 'Flores', '40', '2', '80,00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `apartamento` int(11) DEFAULT NULL,

  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `idApartamento` int(11) NOT NULL,
  `perfil` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_Apartamento1_idx` (`idApartamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `apartamento`, `email`, `senha`, `idApartamento`, `perfil`) VALUES
(8, 'andree12', 5454554, NULL, 'ze@gmail.com', '', 0, 'visualizador'),
(16, 'joa', 47885858, NULL,  'carlos@gmail.com', '4545454', 1, 'visualizador'),
(17, 'felipe23', 3251, NULL,  'pelp@gmail.com', '010101', 1, 'visualizador'),
(18, 'admin', 2147483647,  NULL, NULL, '12345', 0, 'administrador');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `apartamento`
--
ALTER TABLE `apartamento`
  ADD CONSTRAINT `fk_Apartamento_Condominio1` FOREIGN KEY (`apCondominioId`) REFERENCES `condominio` (`condominioId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contaspagar`
--
ALTER TABLE `contaspagar`
  ADD CONSTRAINT `fk_contaspagar_Condominio1` FOREIGN KEY (`PagarcondominioId`) REFERENCES `condominio` (`condominioId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contasreceber`
--
ALTER TABLE `contasreceber`
  ADD CONSTRAINT `fk_ContasReceber_Apartamento1` FOREIGN KEY (`ReceberapartamentoId`) REFERENCES `apartamento` (`idapartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ContasReceber_Condominio1` FOREIGN KEY (`RecebercondominioId`) REFERENCES `condominio` (`condominioId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

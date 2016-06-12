-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 09, 2016 as 10:19 
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bd_estacionamento`
--

CREATE DATABASE `bd_estacionamento` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_estacionamento`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(6) NOT NULL,
  `nome_cliente` varchar(45) DEFAULT NULL,
  `rg_cliente` varchar(9) DEFAULT NULL,
  `fk_veiculo_cliente` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_veiculo_cliente_idx` (`fk_veiculo_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE IF NOT EXISTS `precos` (
  `basehora_preco` int(11) DEFAULT NULL,
  `tempohora_preco` int(11) DEFAULT NULL,
  `taxaextra_preco` int(11) DEFAULT NULL,
  `desconto_preco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `precos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `id_registro` int(6) NOT NULL,
  `dia_registro` varchar(10) DEFAULT NULL,
  `entrada_registro` datetime DEFAULT NULL,
  `saida_registro` datetime DEFAULT NULL,
  `valorpago_registro` varchar(5) DEFAULT NULL,
  `fk_registro_cliente` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `fk_registro_cliente_idx` (`fk_registro_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `registros`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `user` (`user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE IF NOT EXISTS `vagas` (
  `id_vaga` int(3) NOT NULL,
  `status_vaga` varchar(10) DEFAULT NULL,
  `fk_veiculo_vaga` int(6) DEFAULT NULL,
  PRIMARY KEY (`id_vaga`),
  KEY `fk_veiculo_vaga_idx` (`fk_veiculo_vaga`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vagas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE IF NOT EXISTS `veiculos` (
  `id_veiculo` int(6) NOT NULL,
  `tipo_veiculo` varchar(20) DEFAULT NULL,
  `ano_veiculo` varchar(4) DEFAULT NULL,
  `placa_veiculo` varchar(8) DEFAULT NULL,
  `modelo_veiculo` varchar(30) DEFAULT NULL,
  `cor_veiculo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_veiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculos`
--


--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_veiculo_cliente` FOREIGN KEY (`fk_veiculo_cliente`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_registro_cliente` FOREIGN KEY (`fk_registro_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_veiculo_vaga` FOREIGN KEY (`fk_veiculo_vaga`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

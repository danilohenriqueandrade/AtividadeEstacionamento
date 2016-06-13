-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2016 às 02:32
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `bd_estacionamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP DATABASE bd_estacionamento;

CREATE DATABASE bd_estacionamento;

USE bd_estacionamento;

CREATE TABLE `clientes` (
  `id_cliente` int(6) NOT NULL,
  `nome_cliente` varchar(45) DEFAULT NULL,
  `rg_cliente` varchar(9) DEFAULT NULL,
  `fk_veiculo_cliente` int(6) DEFAULT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE `precos` (
  `basehora_preco` int(11) DEFAULT NULL,
  `tempohora_preco` int(11) DEFAULT NULL,
  `taxaextra_preco` int(11) DEFAULT NULL,
  `desconto_preco` int(11) DEFAULT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE `registros` (
  `id_registro` int(6) NOT NULL,
  `dia_registro` varchar(10) DEFAULT NULL,
  `entrada_registro` datetime DEFAULT NULL,
  `saida_registro` datetime DEFAULT NULL,
  `valorpago_registro` varchar(5) DEFAULT NULL,
  `fk_registro_cliente` int(6) DEFAULT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nivel_acesso` enum('0','1','2') DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user`, `password`, `nivel_acesso`) VALUES
(1, 'admin', 'admin', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id_vaga` int(3) NOT NULL,
  `status_vaga` varchar(10) DEFAULT NULL,
  `fk_veiculo_vaga` int(6) DEFAULT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id_veiculo` int(6) NOT NULL,
  `tipo_veiculo` varchar(20) DEFAULT NULL,
  `ano_veiculo` varchar(4) DEFAULT NULL,
  `placa_veiculo` varchar(8) DEFAULT NULL,
  `modelo_veiculo` varchar(30) DEFAULT NULL,
  `cor_veiculo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_veiculo_cliente_idx` (`fk_veiculo_cliente`);

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `fk_registro_cliente_idx` (`fk_registro_cliente`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `vagas`
--
ALTER TABLE `vagas`
  ADD PRIMARY KEY (`id_vaga`),
  ADD KEY `fk_veiculo_vaga_idx` (`fk_veiculo_vaga`);

--
-- Indexes for table `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id_veiculo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_veiculo_cliente` FOREIGN KEY (`fk_veiculo_cliente`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_registro_cliente` FOREIGN KEY (`fk_registro_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_veiculo_vaga` FOREIGN KEY (`fk_veiculo_vaga`) REFERENCES `veiculos` (`id_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

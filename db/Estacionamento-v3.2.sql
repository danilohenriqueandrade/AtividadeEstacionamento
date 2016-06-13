-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2016 às 12:20
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_estacionamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(6) NOT NULL,
  `nome_cliente` varchar(45) DEFAULT NULL,
  `rg_cliente` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `rg_cliente`) VALUES
(1, 'Danilo Henrique de Melo Martins Andrade', '535750341');

-- --------------------------------------------------------

--
-- Estrutura da tabela `precos`
--

CREATE TABLE `precos` (
  `basehora_preco` int(11) DEFAULT NULL,
  `tempohora_preco` int(11) DEFAULT NULL,
  `taxaextra_preco` int(11) DEFAULT NULL,
  `desconto_preco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registros`
--

CREATE TABLE `registros` (
  `id_registro` int(6) NOT NULL,
  `entrada_registro` timestamp NULL DEFAULT NULL,
  `saida_registro` timestamp NULL DEFAULT NULL,
  `fk_registro_cliente` int(6) DEFAULT NULL,
  `fk_registro_veiculo` int(11) DEFAULT NULL,
  `fk_registro_vaga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', 'admin', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE `vagas` (
  `id_vaga` int(3) NOT NULL,
  `status_vaga` varchar(10) DEFAULT NULL,
  `fk_veiculo_vaga` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`id_vaga`, `status_vaga`, `fk_veiculo_vaga`) VALUES
(1, 'DISPONIVEL', NULL),
(2, 'DISPONIVEL', NULL),
(3, 'DISPONIVEL', NULL),
(4, 'DISPONIVEL', NULL),
(5, 'DISPONIVEL', NULL),
(6, 'DISPONIVEL', NULL),
(7, 'DISPONIVEL', NULL),
(8, 'DISPONIVEL', NULL),
(9, 'DISPONIVEL', NULL),
(10, 'DISPONIVEL', NULL),
(11, 'DISPONIVEL', NULL),
(12, 'DISPONIVEL', NULL),
(13, 'DISPONIVEL', NULL),
(14, 'DISPONIVEL', NULL),
(15, 'DISPONIVEL', NULL),
(16, 'DISPONIVEL', NULL),
(17, 'DISPONIVEL', NULL),
(18, 'DISPONIVEL', NULL),
(19, 'DISPONIVEL', NULL),
(20, 'DISPONIVEL', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id_veiculo` int(6) NOT NULL,
  `tipo_veiculo` varchar(20) DEFAULT NULL,
  `ano_veiculo` int(4) DEFAULT NULL,
  `placa_veiculo` varchar(8) DEFAULT NULL,
  `modelo_veiculo` varchar(30) DEFAULT NULL,
  `cor_veiculo` varchar(15) DEFAULT NULL,
  `fk_cliente_veiculo` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id_veiculo`, `tipo_veiculo`, `ano_veiculo`, `placa_veiculo`, `modelo_veiculo`, `cor_veiculo`, `fk_cliente_veiculo`) VALUES
(1, 'Carro', 2016, 'FCK9999', 'Ferrari 599XX', 'Vermelha', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `rg_cliente` (`rg_cliente`);

--
-- Indexes for table `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `fk_registro_cliente_idx` (`fk_registro_cliente`),
  ADD KEY `fk_registro_veiculo` (`fk_registro_veiculo`),
  ADD KEY `fk_registro_vaga` (`fk_registro_vaga`);

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
  ADD UNIQUE KEY `fk_veiculo_vaga` (`fk_veiculo_vaga`),
  ADD KEY `fk_veiculo_vaga_idx` (`fk_veiculo_vaga`);

--
-- Indexes for table `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD KEY `fk_cliente_veiculo_idx` (`fk_cliente_veiculo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `registros`
--
ALTER TABLE `registros`
  MODIFY `id_registro` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vagas`
--
ALTER TABLE `vagas`
  MODIFY `id_vaga` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id_veiculo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_registro_cliente` FOREIGN KEY (`fk_registro_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `fk_registro_vaga` FOREIGN KEY (`fk_registro_vaga`) REFERENCES `vagas` (`id_vaga`),
  ADD CONSTRAINT `fk_registro_veiculo` FOREIGN KEY (`fk_registro_veiculo`) REFERENCES `veiculos` (`id_veiculo`);

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_veiculo_vaga` FOREIGN KEY (`fk_veiculo_vaga`) REFERENCES `veiculos` (`id_veiculo`);

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `fk_cliente_veiculo` FOREIGN KEY (`fk_cliente_veiculo`) REFERENCES `clientes` (`id_cliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

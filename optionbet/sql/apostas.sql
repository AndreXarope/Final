-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2023 às 14:55
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `apostas`
--
DROP DATABASE IF EXISTS apostas;

CREATE DATABASE apostas;

USE apostas;
-- --------------------------------------------------------

--
-- Estrutura da tabela `apostas`
--

CREATE TABLE `apostas` (
  `IDAposta` int(11) NOT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  `IDJogo` int(11) DEFAULT NULL,
  `ValorAposta` decimal(10,2) NOT NULL,
  `DataAposta` timestamp NOT NULL DEFAULT current_timestamp(),
  `ResultadoAposta` enum('Vitoria','Derrota','Empate','Pendente') DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `IDJogo` int(11) NOT NULL,
  `TimeCasa` varchar(50) NOT NULL,
  `TimeVisitante` varchar(50) NOT NULL,
  `DataJogo` datetime NOT NULL,
  `ResultadoFinal` varchar(20) DEFAULT NULL,
  `OddsCasa` decimal(4,2) DEFAULT NULL,
  `OddsEmpate` decimal(4,2) DEFAULT NULL,
  `OddsVisitante` decimal(4,2) DEFAULT NULL,
  imagem varchar(255) null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `suportecliente`
--

CREATE TABLE `suportecliente` (
  `IDSuporte` int(11) NOT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  `Mensagem` text NOT NULL,
  `Resolvido` tinyint(1) DEFAULT 0,
  `DataSuporte` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacoes`
--

CREATE TABLE `transacoes` (
  `IDTransacao` int(11) NOT NULL,
  `IDUsuario` int(11) DEFAULT NULL,
  `TipoTransacao` enum('Deposito','Saque','Aposta') DEFAULT NULL,
  `ValorTransacao` decimal(10,2) NOT NULL,
  `DataTransacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUsuario` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Saldo` decimal(10,2) DEFAULT 0.00,
  `DataCadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `apostas`
--
ALTER TABLE `apostas`
  ADD PRIMARY KEY (`IDAposta`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`IDJogo`);

--
-- Índices para tabela `suportecliente`
--
ALTER TABLE `suportecliente`
  ADD PRIMARY KEY (`IDSuporte`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Índices para tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD PRIMARY KEY (`IDTransacao`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `apostas`
--
ALTER TABLE `apostas`
  MODIFY `IDAposta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `IDJogo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `suportecliente`
--
ALTER TABLE `suportecliente`
  MODIFY `IDSuporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transacoes`
--
ALTER TABLE `transacoes`
  MODIFY `IDTransacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `apostas`
--
ALTER TABLE `apostas`
  ADD CONSTRAINT `apostas_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios` (`IDUsuario`);

--
-- Limitadores para a tabela `suportecliente`
--
ALTER TABLE `suportecliente`
  ADD CONSTRAINT `suportecliente_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios` (`IDUsuario`);

--
-- Limitadores para a tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD CONSTRAINT `transacoes_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios` (`IDUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

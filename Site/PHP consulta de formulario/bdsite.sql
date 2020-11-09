-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2020 às 03:42
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdsite`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bdsite`
--

CREATE TABLE `bdsite` (
  `idContato` int(11) NOT NULL,
  `nomeContato` varchar(50) NOT NULL,
  `emailContato` varchar(50) NOT NULL,
  `assuntoContato` varchar(50) NOT NULL,
  `mensagemContato` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bdsite`
--

INSERT INTO `bdsite` (`idContato`, `nomeContato`, `emailContato`, `assuntoContato`, `mensagemContato`) VALUES
(61, 'Gleison', 'ddasd@gmail.com', 'TEST', 'era uma vez vivida, vez'),
(62, 'Rock', 'dkas@hotmail.com', 'DAFUQ', 'ja era'),
(63, 'Patricia', 'patricia@jobhome.com', 'TRABALhO', 'PROMOVIDO ;-;');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bdsite`
--
ALTER TABLE `bdsite`
  ADD PRIMARY KEY (`idContato`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bdsite`
--
ALTER TABLE `bdsite`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Dez-2020 às 04:43
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `helpme`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `idesp` int(11) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `dia` date NOT NULL,
  `horario` time NOT NULL,
  `ob` varchar(255) DEFAULT NULL,
  `idusuario` int(11) NOT NULL,
  `stats` varchar(20) NOT NULL,
  `contato` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_especialidade`
--

CREATE TABLE `lista_especialidade` (
  `especialidade` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `valor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista_especialidade`
--

INSERT INTO `lista_especialidade` (`especialidade`, `id`, `valor`) VALUES
('Consulta com psicólogo', 0, '60'),
('Depressão', 1, '40'),
('Ansiedade', 2, '50'),
('Diagnóstico', 3, '25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_horarios`
--

CREATE TABLE `lista_horarios` (
  `horario` time NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista_horarios`
--

INSERT INTO `lista_horarios` (`horario`, `id`) VALUES
('08:00:00', 2),
('09:00:00', 3),
('10:00:00', 4),
('11:00:00', 5),
('12:00:00', 6),
('13:00:00', 7),
('14:00:00', 8),
('15:00:00', 9),
('16:00:00', 10),
('17:00:00', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`idesp`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Índices para tabela `lista_especialidade`
--
ALTER TABLE `lista_especialidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lista_horarios`
--
ALTER TABLE `lista_horarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `idesp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- AUTO_INCREMENT de tabela `lista_especialidade`
--
ALTER TABLE `lista_especialidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `lista_horarios`
--
ALTER TABLE `lista_horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

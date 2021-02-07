-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Dez-2020 às 13:12
-- Versão do servidor: 10.4.16-MariaDB
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mvcpadrao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(45) DEFAULT NULL,
  `expiracao_token` datetime DEFAULT NULL,
  `tipo_administrador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `foto`, `telefone`, `email`, `usuario`, `senha`, `status`, `cadastro`, `token`, `expiracao_token`, `tipo_administrador_id`) VALUES
(1, 'David', NULL, '998131151', 'natan_seabra@hotmail.com', 'Admin', '123', 1, '2020-09-01 21:23:37', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `auditoria`
--

CREATE TABLE `auditoria` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `administrador` int(11) DEFAULT NULL,
  `tabela` varchar(50) DEFAULT NULL,
  `campos` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `data` datetime NOT NULL,
  `ip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `auditoria`
--

INSERT INTO `auditoria` (`id`, `tipo`, `administrador`, `tabela`, `campos`, `descricao`, `data`, `ip`) VALUES
(6, 5, NULL, 'administrador', NULL, 'O Administrador David acessou o sistema! 1', '2020-12-19 09:10:46', '::1'),
(7, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2020-12-19 09:18:11', '::1'),
(8, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2020-12-19 10:41:14', '::1'),
(9, 5, 1, 'administrador', NULL, 'O Administrador David acessou o sistema!', '2020-12-28 10:58:45', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissao`
--

CREATE TABLE `permissao` (
  `id` int(11) NOT NULL,
  `permissao` varchar(50) NOT NULL,
  `nivel` int(5) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissao`
--

INSERT INTO `permissao` (`id`, `permissao`, `nivel`, `status`) VALUES
(1, 'Gerenciar Tipo de Administrador', 1, 1),
(2, 'Gerenciar Administradores', 2, 1),
(3, 'Auditoria', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_administrador`
--

CREATE TABLE `tipo_administrador` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_administrador`
--

INSERT INTO `tipo_administrador` (`id`, `tipo`, `status`) VALUES
(1, 'Administrador', 1),
(2, 'usuario', 1),
(3, 'logistica', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_permissao`
--

CREATE TABLE `tipo_permissao` (
  `tipo_administrador_id` int(11) NOT NULL,
  `permissao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_permissao`
--

INSERT INTO `tipo_permissao` (`tipo_administrador_id`, `permissao_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`,`tipo_administrador_id`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD KEY `fk_administrador_tipo_administrador1_idx` (`tipo_administrador_id`);

--
-- Índices para tabela `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auditoria_administrador_idx` (`administrador`);

--
-- Índices para tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_administrador`
--
ALTER TABLE `tipo_administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_permissao`
--
ALTER TABLE `tipo_permissao`
  ADD PRIMARY KEY (`tipo_administrador_id`,`permissao_id`),
  ADD KEY `fk_tipo_administrador_has_permissao_permissao1_idx` (`permissao_id`),
  ADD KEY `fk_tipo_administrador_has_permissao_tipo_administrador1_idx` (`tipo_administrador_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tipo_administrador`
--
ALTER TABLE `tipo_administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_administrador_tipo_administrador1` FOREIGN KEY (`tipo_administrador_id`) REFERENCES `tipo_administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `fk_auditoria_administrador` FOREIGN KEY (`administrador`) REFERENCES `administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tipo_permissao`
--
ALTER TABLE `tipo_permissao`
  ADD CONSTRAINT `fk_tipo_administrador_has_permissao_permissao1` FOREIGN KEY (`permissao_id`) REFERENCES `permissao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_administrador_has_permissao_tipo_administrador1` FOREIGN KEY (`tipo_administrador_id`) REFERENCES `tipo_administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

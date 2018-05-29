-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 29/05/2018 às 07:29
-- Versão do servidor: 10.1.26-MariaDB-0+deb9u1
-- Versão do PHP: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fr_dev`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblCargo`
--

CREATE TABLE `tblCargo` (
  `tblCargo_id` int(11) NOT NULL,
  `tblCargo_descricao` varchar(45) DEFAULT NULL,
  `tblCargo_usuario` int(11) NOT NULL,
  `tblCargo_versao` int(11) NOT NULL DEFAULT '1',
  `tblCargo_dataCadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tblCargo_dataAlteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tblCargo`
--

INSERT INTO `tblCargo` (`tblCargo_id`, `tblCargo_descricao`, `tblCargo_usuario`, `tblCargo_versao`, `tblCargo_dataCadastro`, `tblCargo_dataAlteracao`) VALUES
(1, 'Programador', 1, 1, '2018-05-14 18:25:49', '2018-05-14 21:28:08'),
(2, 'Motorista', 1, 1, '2018-05-14 18:25:49', '2018-05-14 21:28:11'),
(3, 'diretor de TI', 1, 1, '2018-05-16 15:31:53', '2018-05-16 18:31:53'),
(4, 'diretor Comercial', 1, 1, '2018-05-16 15:31:53', '2018-05-16 18:32:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblDepartamento`
--

CREATE TABLE `tblDepartamento` (
  `tblDepartamento_id` int(11) NOT NULL,
  `tblDepartamento_descricao` varchar(45) DEFAULT NULL,
  `tblDepartamento_versao` int(11) NOT NULL DEFAULT '1',
  `tblDepartamento_dataCadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tblDepartamento_dataAlteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tblDepartamento`
--

INSERT INTO `tblDepartamento` (`tblDepartamento_id`, `tblDepartamento_descricao`, `tblDepartamento_versao`, `tblDepartamento_dataCadastro`, `tblDepartamento_dataAlteracao`) VALUES
(1, 'vendas', 1, '2018-05-01 21:01:12', '2018-05-02 03:01:12'),
(2, 'Informática', 1, '2018-05-01 21:01:12', '2018-05-02 03:01:12'),
(3, 'adm', 1, '2018-05-01 21:01:19', '2018-05-02 03:01:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblUsuario`
--

CREATE TABLE `tblUsuario` (
  `tblUsuario_id` int(11) NOT NULL,
  `tblUsuario_nome` varchar(30) DEFAULT NULL,
  `tblUsuario_email` varchar(50) DEFAULT NULL,
  `tblUsuario_telefone` varchar(55) NOT NULL,
  `tblUsuario_senha` varchar(10) DEFAULT NULL,
  `tblUsuario_salario` float(10,2) DEFAULT NULL,
  `tblUsuario_cargo` varchar(30) DEFAULT NULL,
  `tblUsuario_foto` longblob,
  `tblUsuario_idGerente_tblUsuario` int(11) DEFAULT NULL,
  `tblUsuario_IdCargo_tblCargo` int(11) DEFAULT NULL,
  `tblUsuario_observacoes` text,
  `tblUsuario_sexo` varchar(10) DEFAULT NULL,
  `tblUsuario_dias` varchar(51) DEFAULT NULL,
  `tblUsuario_raca` varchar(15) DEFAULT NULL,
  `tblUsuario_versao` int(11) NOT NULL DEFAULT '1',
  `tblUsuario_dataCadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tblUsuario_usuarioCadastro` int(11) NOT NULL,
  `tblUsuario_dataAlteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tblUsuario_usuarioAlteracao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblUsuario_has_tblDepartamento`
--

CREATE TABLE `tblUsuario_has_tblDepartamento` (
  `id` int(11) NOT NULL,
  `tblUsuario_tblUsuario_id` int(11) NOT NULL,
  `tblDepartamento_tblDepartamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Índices de tabela `tblCargo`
--
ALTER TABLE `tblCargo`
  ADD PRIMARY KEY (`tblCargo_id`);

--
-- Índices de tabela `tblDepartamento`
--
ALTER TABLE `tblDepartamento`
  ADD PRIMARY KEY (`tblDepartamento_id`),
  ADD KEY `tblDepartamento_id` (`tblDepartamento_id`);

--
-- Índices de tabela `tblUsuario`
--
ALTER TABLE `tblUsuario`
  ADD PRIMARY KEY (`tblUsuario_id`),
  ADD KEY `tblUsuario_id` (`tblUsuario_id`);

--
-- Índices de tabela `tblUsuario_has_tblDepartamento`
--
ALTER TABLE `tblUsuario_has_tblDepartamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de tabela `tblCargo`
--
ALTER TABLE `tblCargo`
  MODIFY `tblCargo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `tblDepartamento`
--
ALTER TABLE `tblDepartamento`
  MODIFY `tblDepartamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `tblUsuario`
--
ALTER TABLE `tblUsuario`
  MODIFY `tblUsuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `tblUsuario_has_tblDepartamento`
--
ALTER TABLE `tblUsuario_has_tblDepartamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

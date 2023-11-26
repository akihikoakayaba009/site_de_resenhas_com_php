-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/11/2023 às 14:52
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `site_de_opiniao_de_filmes`
--

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `5yteyry`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `5yteyry` (
`id` bigint(20)
,`nome` varchar(50)
,`email` varchar(50)
,`senha` varchar(15)
,`informacoes_Perfil` varchar(255)
,`criado_em` timestamp
,`atulizado_em` timestamp
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `diretores`
--

CREATE TABLE `diretores` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atulizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `diretores`
--

INSERT INTO `diretores` (`id`, `nome`, `criado_em`, `atulizado_em`) VALUES
(1, 'ator', '2023-11-18 18:44:54', '2023-11-18 18:44:54'),
(2, 'diretor', '2023-11-18 18:45:27', '2023-11-18 18:45:27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `elenco`
--

CREATE TABLE `elenco` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atulizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `elenco`
--

INSERT INTO `elenco` (`id`, `nome`, `criado_em`, `atulizado_em`) VALUES
(1, 'elenco', '2023-11-18 18:45:43', '2023-11-18 18:45:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `Resumo_do_filme` varchar(255) NOT NULL,
  `ano_de_lancamento` year(4) DEFAULT NULL,
  `Quando_vi_o_filme` date NOT NULL,
  `id_genero` bigint(20) NOT NULL,
  `visto_ou_nao` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `Resumo_do_filme`, `ano_de_lancamento`, `Quando_vi_o_filme`, `id_genero`, `visto_ou_nao`) VALUES
(1, 'rtgeereg', 'regergeg', '2023', '2023-11-24', 1, 'y'),
(2, 'dsfsdf', 'dfdsfs', '2023', '2023-11-22', 1, '0'),
(3, ' filme que eu vi', 'ghfhgfh', '2023', '2023-11-15', 1, 'não visto'),
(4, 'qualquer nome', 'qualquedr resumo', NULL, '2023-11-09', 1, 'visto'),
(5, 'retertret', 'rtetretretret', '2023', '2023-11-15', 1, 'visto'),
(6, 'hgjkjghj', 'ghjghjhgj', '2023', '2023-11-29', 1, 'vistofddsf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `genero`
--

CREATE TABLE `genero` (
  `id` bigint(20) NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atulizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `genero`
--

INSERT INTO `genero` (`id`, `Genero`, `criado_em`, `atulizado_em`) VALUES
(1, 'romance', '2023-11-18 18:45:55', '2023-11-18 18:45:55'),
(2, 'Ação', '2023-11-26 13:46:11', '2023-11-26 13:46:11'),
(3, 'Comédia', '2023-11-26 13:46:11', '2023-11-26 13:46:11'),
(4, 'Drama', '2023-11-26 13:46:11', '2023-11-26 13:46:11'),
(5, 'Ficção Científica', '2023-11-26 13:46:11', '2023-11-26 13:46:11'),
(6, 'Romance', '2023-11-26 13:46:11', '2023-11-26 13:46:11'),
(7, 'Terror', '2023-11-26 13:46:11', '2023-11-26 13:46:11'),
(8, 'Animação', '2023-11-26 13:46:11', '2023-11-26 13:46:11'),
(9, 'Fantasia', '2023-11-26 13:46:11', '2023-11-26 13:46:11'),
(10, 'Documentário', '2023-11-26 13:46:11', '2023-11-26 13:46:11'),
(11, 'Aventura', '2023-11-26 13:46:11', '2023-11-26 13:46:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `resenhas`
--

CREATE TABLE `resenhas` (
  `id` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_filme` bigint(20) NOT NULL,
  `classificacao` int(11) NOT NULL,
  `texto_resenha` text DEFAULT NULL,
  `data_resenha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo_de_usuario` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `informacoes_Perfil` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atulizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `tipo_de_usuario`, `email`, `senha`, `informacoes_Perfil`, `criado_em`, `atulizado_em`) VALUES
(40, 'gftfg', 'diretor', 'dhbwsfdkyujgdastu@gmail.com', '123', 'nhgnhgng', '2023-11-19 14:48:20', '2023-11-19 14:48:20'),
(41, 'marcos', 'usuario', 'a@gmail.com', '123', 'algo legal sobre usuario', '2023-11-21 23:35:53', '2023-11-21 23:35:53'),
(43, 'marcos', 'ator', 'b@gmail.com', '123', 'tertertert', '2023-11-21 23:44:20', '2023-11-21 23:44:20');

-- --------------------------------------------------------

--
-- Estrutura para view `5yteyry`
--
DROP TABLE IF EXISTS `5yteyry`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `5yteyry`  AS SELECT `usuarios`.`id` AS `id`, `usuarios`.`nome` AS `nome`, `usuarios`.`email` AS `email`, `usuarios`.`senha` AS `senha`, `usuarios`.`informacoes_Perfil` AS `informacoes_Perfil`, `usuarios`.`criado_em` AS `criado_em`, `usuarios`.`atulizado_em` AS `atulizado_em` FROM `usuarios` ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `diretores`
--
ALTER TABLE `diretores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `elenco`
--
ALTER TABLE `elenco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `diretores`
--
ALTER TABLE `diretores`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `elenco`
--
ALTER TABLE `elenco`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

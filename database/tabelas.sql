
CREATE TABLE `diretores` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atulizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `elenco`
--

CREATE TABLE `elenco` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atulizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` bigint(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `ano_de_lancamento` year(4) NOT NULL,
  `id_diretor` bigint(20) NOT NULL,
  `id_elenco` bigint(20) NOT NULL,
  `id_genero` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id` bigint(20) NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atulizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resenhas`
--

CREATE TABLE `resenhas` (
  `id` bigint(20) NOT NULL,
  `id_usuario` bigint(20) NOT NULL,
  `id_filme` bigint(20) NOT NULL,
  `classificacao` int(11) NOT NULL,
  `texto_resenha` text DEFAULT NULL,
  `data_resenha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `informacoes_Perfil` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atulizado_em` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-
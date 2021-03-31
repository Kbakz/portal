-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Mar-2021 às 01:43
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `portal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.categoria`
--

CREATE TABLE `tb_admin.categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.categoria`
--

INSERT INTO `tb_admin.categoria` (`id`, `nome`, `slug`) VALUES
(1, 'Esporte ', 'esporte-'),
(3, 'Saúde', 'saude'),
(6, 'Automóveis', 'automoveis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.noticias`
--

CREATE TABLE `tb_admin.noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `autor` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.noticias`
--

INSERT INTO `tb_admin.noticias` (`id`, `categoria_id`, `titulo`, `conteudo`, `imagem`, `data`, `autor`, `slug`) VALUES
(1, 1, 'Notícia Esporte', 'conteudo atualizado', '60633e27b3a43.jpg', '2021-03-30', 'Kevin Freire', 'noticia-esporte'),
(2, 3, 'Notícia saúde', 'conteudo noticia saúde', '60634c7ecd461.jpg', '2021-03-30', 'Kevin Freire', 'noticia-saude'),
(3, 6, 'Tesla ', 'o carro mais foda', '60634dfc38605.png', '2021-03-30', 'freire', 'tesla-');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `usuario`, `senha`, `img`, `nome`, `cargo`) VALUES
(11, 'admin', 'admin', '6062511bcdd74.png', 'Kevin Freire', 0),
(15, 'Gustavo', 'senha', '60620bb1a8c0b.jpg', 'Gustavo Silva', 1),
(16, 'kevin freire', 'senha', '60620c0f0a39e.jpg', 'freire', 2),
(17, 'editor', 'senha', '60620c8c15f60.jpg', 'Algum nome', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `data`) VALUES
(2, '::1', '2021-03-28'),
(3, '::1', '2021-03-28');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin.categoria`
--
ALTER TABLE `tb_admin.categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.noticias`
--
ALTER TABLE `tb_admin.noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.categoria`
--
ALTER TABLE `tb_admin.categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_admin.noticias`
--
ALTER TABLE `tb_admin.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

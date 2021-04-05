-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Abr-2021 às 17:13
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
-- Estrutura da tabela `tb_admin.apoiadores`
--

CREATE TABLE `tb_admin.apoiadores` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.apoiadores`
--

INSERT INTO `tb_admin.apoiadores` (`id`, `imagem`, `nome`, `link`) VALUES
(2, '6066357932028.png', 'Americanas', 'americana.com'),
(7, '606635e33901a.png', 'Casas bahia', 'casasbahia.com');

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
(11, 'Aviação', 'aviacao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.classificados`
--

CREATE TABLE `tb_admin.classificados` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `horario_abrir` varchar(255) NOT NULL,
  `horario_fechar` varchar(255) NOT NULL,
  `dias` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.classificados`
--

INSERT INTO `tb_admin.classificados` (`id`, `img`, `nome`, `horario_abrir`, `horario_fechar`, `dias`, `telefone`, `link`) VALUES
(12, '6066344ca8b17.jpg', 'Americanas', '08:00', '22:00', 'Segunda a sexta', '(11) 99999-9999', 'americanas.com'),
(13, '6066345c09766.png', 'Casas bahia', '08:00', '20:00', 'Segunda a sabado', '(11) 99999-9999', 'casasbahia.com'),
(15, '60663481472d0.png', 'Magalu', '08:00', '20:00', 'Segunda a sexta', '(11) 99999-9999', 'magalu.com'),
(16, '60663470ea668.jpg', 'Lojas cem', '10:00', '22:00', 'Segunda a sabado', '(11) 99999-9999', 'lojacem.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.noticias`
--

CREATE TABLE `tb_admin.noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `lide` text NOT NULL,
  `conteudo` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `fonte` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `autor` varchar(255) NOT NULL,
  `destaque` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin.noticias`
--

INSERT INTO `tb_admin.noticias` (`id`, `categoria_id`, `titulo`, `lide`, `conteudo`, `imagem`, `fonte`, `data`, `autor`, `destaque`, `slug`) VALUES
(19, 11, 'Avião', ' dond  doan daos dasod wqo da dasodas j doas doajn oas doa asod o~saf aso daso askk dxasjk qwasj da', '<h1>H1 teste de html</h1>\r\n<h2>H2 teste</h2>\r\n<h3>H3 mais um teste</h3>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: left; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Cras tempor volutpat semper. Nulla tincidunt, ex scelerisque egestas vulputate, justo sapien feugiat diam, at placerat massa mi ac metus. Nunc ex nisl, laoreet at mauris eget, iaculis mollis nibh. Curabitur sed tempus magna. Vestibulum lacinia, urna in posuere gravida, dolor ante ullamcorper felis, et euismod neque leo et ligula. Nullam porta lacinia turpis, sed mollis diam volut</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.</p>\r\n<p>Cras tempor volutpat semper. Nulla tincidunt, ex scelerisque egestas vulputate, justo sapien feugiat diam, at placerat massa mi ac metus. Nunc ex nisl, laoreet at mauris eget, iaculis mollis nibh. Curabitur sed tempus magna. Vestibulum lacinia, urna in posuere gravida, dolor ante ullamcorper felis, et euismod neque leo et ligula. Nullam porta lacinia turpis, sed mollis diam volut</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><img src=\"https://computerworld.com.br/wp-content/uploads/2018/08/avi%C3%A3o-decolando.jpg\" alt=\"Roubo de avi&atilde;o alerta para vulnerabilidade no sistema de companhias a&eacute;reas  | Computerworld\" width=\"279\" height=\"210\" /></p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Cras tempor volutpat semper. Nulla tincidunt, ex scelerisque egestas vulputate, justo sapien feugiat diam, at placerat massa mi ac metus. Nunc ex nisl, laoreet at mauris eget, iaculis mollis nibh. Curabitur sed tempus magna. Vestibulum lacinia, urna in posuere gravida, dolor ante ullamcorper felis, et euismod neque leo et ligula. Nullam porta lacinia turpis, sed mollis diam volut</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Cras tempor volutpat semper. Nulla tincidunt, ex scelerisque egestas vulputate, justo sapien feugiat diam, at placerat massa mi ac metus. Nunc ex nisl, laoreet at mauris eget, iaculis mollis nibh. Curabitur sed tempus magna. Vestibulum lacinia, urna in posuere gravida, dolor ante ullamcorper felis, et euismod neque leo et ligula. Nullam porta lacinia turpis, sed mollis diam volut</p>', '6066386385f9e.jpeg', 'Google', '2021-04-01', 'Kevin Freire', 'true', 'aviao');

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

--
-- Extraindo dados da tabela `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(51, '::1', '2021-04-04 11:51:39', '6069d27b2c3bb');

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
(11, 'admin', 'admin', '60661cfda5411.png', 'Kevin Freire', 0);

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
(3, '::1', '2021-03-28'),
(4, '::1', '2021-03-31'),
(5, '127.0.0.1', '2021-03-31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `id` int(11) NOT NULL,
  `img_sobre` varchar(255) NOT NULL,
  `texto_sobre` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `social_1` varchar(255) NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `social_2` varchar(255) NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `social_3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_site.config`
--

INSERT INTO `tb_site.config` (`id`, `img_sobre`, `texto_sobre`, `icone1`, `social_1`, `icone2`, `social_2`, `icone3`, `social_3`) VALUES
(1, '60663639addfd.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.', 'fab fa-facebook-f', 'facebook.com', 'fab fa-twitter', 'https://twitter.com', 'fab fa-instagram', 'instagram.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin.apoiadores`
--
ALTER TABLE `tb_admin.apoiadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.categoria`
--
ALTER TABLE `tb_admin.categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.classificados`
--
ALTER TABLE `tb_admin.classificados`
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
-- Índices para tabela `tb_site.config`
--
ALTER TABLE `tb_site.config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.apoiadores`
--
ALTER TABLE `tb_admin.apoiadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_admin.categoria`
--
ALTER TABLE `tb_admin.categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_admin.classificados`
--
ALTER TABLE `tb_admin.classificados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_admin.noticias`
--
ALTER TABLE `tb_admin.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_site.config`
--
ALTER TABLE `tb_site.config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

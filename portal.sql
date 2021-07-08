-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jul-2021 às 02:49
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

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
(11, 'Aviação', 'aviacao'),
(13, 'Carros', 'carros'),
(14, 'Motocicletas', 'motocicletas');

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
(19, 11, 'Avião', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum sagittis malesuada. In aliquet tincidunt purus, sit amet viverra lorem malesuada quis. Fusce rhoncus mi a quam ullamcorper, sit amet tempus ipsum ultricies. In porta, nisi eget facilisis consectetur, odio sapien lacinia sem, at hendrerit velit libero in quam. Vivamus dictum lacus id justo scelerisque, at fermentum ante efficitur. Phasellus rutrum bibendum neque, ac convallis tellus. Fusce sit amet euismod odio, nec consectetur nisl. Maecenas sit amet lorem tellus. Praesent viverra, odio ', '<h1>H1 teste de html</h1>\r\n<h2>H2 teste</h2>\r\n<h3>H3 mais um teste</h3>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: left; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Cras tempor volutpat semper. Nulla tincidunt, ex scelerisque egestas vulputate, justo sapien feugiat diam, at placerat massa mi ac metus. Nunc ex nisl, laoreet at mauris eget, iaculis mollis nibh. Curabitur sed tempus magna. Vestibulum lacinia, urna in posuere gravida, dolor ante ullamcorper felis, et euismod neque leo et ligula. Nullam porta lacinia turpis, sed mollis diam volut</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.</p>\r\n<p>Cras tempor volutpat semper. Nulla tincidunt, ex scelerisque egestas vulputate, justo sapien feugiat diam, at placerat massa mi ac metus. Nunc ex nisl, laoreet at mauris eget, iaculis mollis nibh. Curabitur sed tempus magna. Vestibulum lacinia, urna in posuere gravida, dolor ante ullamcorper felis, et euismod neque leo et ligula. Nullam porta lacinia turpis, sed mollis diam volut</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\"><img src=\"https://computerworld.com.br/wp-content/uploads/2018/08/avi%C3%A3o-decolando.jpg\" alt=\"Roubo de avi&atilde;o alerta para vulnerabilidade no sistema de companhias a&eacute;reas  | Computerworld\" width=\"279\" height=\"210\" /></p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Cras tempor volutpat semper. Nulla tincidunt, ex scelerisque egestas vulputate, justo sapien feugiat diam, at placerat massa mi ac metus. Nunc ex nisl, laoreet at mauris eget, iaculis mollis nibh. Curabitur sed tempus magna. Vestibulum lacinia, urna in posuere gravida, dolor ante ullamcorper felis, et euismod neque leo et ligula. Nullam porta lacinia turpis, sed mollis diam volut</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">&nbsp;</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Cras tempor volutpat semper. Nulla tincidunt, ex scelerisque egestas vulputate, justo sapien feugiat diam, at placerat massa mi ac metus. Nunc ex nisl, laoreet at mauris eget, iaculis mollis nibh. Curabitur sed tempus magna. Vestibulum lacinia, urna in posuere gravida, dolor ante ullamcorper felis, et euismod neque leo et ligula. Nullam porta lacinia turpis, sed mollis diam volut</p>', '6066386385f9e.jpeg', 'Google', '2021-04-01', 'Kevin Freire', 'true', 'aviao'),
(29, 13, 'Carro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum sagittis malesuada. In aliquet tincidunt purus, sit amet viverra lorem malesuada quis. Fusce rhoncus mi a quam ullamcorper, sit amet tempus ipsum ultricies. In porta, nisi eget facilisis consectetur, odio sapien lacinia sem, at hendrerit velit libero in quam. Vivamus dictum lacus id justo scelerisque, at fermentum ante efficitur. Phasellus rutrum bibendum neque, ac convallis tellus. ', '<hr style=\"margin: 0px; padding: 0px; clear: both; border-top: 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0)); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: center; background-color: #ffffff;\" />\r\n<div id=\"Content\" style=\"margin: 0px; padding: 0px; position: relative; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: center; background-color: #ffffff;\">\r\n<div id=\"bannerL\" style=\"margin: 0px 0px 0px -160px; padding: 0px; position: sticky; top: 20px; width: 160px; height: 10px; float: left; text-align: right;\"></div>\r\n<div id=\"bannerR\" style=\"margin: 0px -160px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 160px; height: 10px; float: right; text-align: left;\"></div>\r\n<div class=\"boxed\" style=\"margin: 10px 28.7969px; padding: 0px; clear: both;\">\r\n<div id=\"lipsum\" style=\"margin: 0px; padding: 0px; text-align: justify;\">\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum sagittis malesuada. In aliquet tincidunt purus, sit amet viverra lorem malesuada quis. Fusce rhoncus mi a quam ullamcorper, sit amet tempus ipsum ultricies. In porta, nisi eget facilisis consectetur, odio sapien lacinia sem, at hendrerit velit libero in quam. Vivamus dictum lacus id justo scelerisque, at fermentum ante efficitur. Phasellus rutrum bibendum neque, ac convallis tellus. Fusce sit amet euismod odio, nec consectetur nisl. Maecenas sit amet lorem tellus. Praesent viverra, odio eget egestas vehicula, quam nunc tempor tortor, in pulvinar quam sapien quis urna. Aenean vitae scelerisque magna. Quisque posuere, ligula vel placerat mollis, nisl eros imperdiet sapien, at ultricies nibh turpis nec ligula.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Integer sed fringilla velit. Nullam feugiat semper ligula quis ultricies. In hac habitasse platea dictumst. Nullam tincidunt tempus erat, vitae molestie libero fringilla id. Nullam facilisis ut velit vel commodo. Morbi diam tellus, ultrices vel malesuada dapibus, consectetur quis enim. Fusce consequat finibus mattis. Suspendisse turpis leo, dictum eget nisl non, cursus mattis elit. Nam tincidunt maximus dignissim. Fusce pharetra, lorem ut sagittis imperdiet, ligula sapien rhoncus felis, vitae auctor purus arcu et risus. Nam gravida, nulla quis volutpat hendrerit, erat nisl accumsan ligula, vitae gravida neque nibh ac magna. In pharetra fringilla mauris. Proin vitae lacus in nisl dapibus tincidunt at eget lacus. Donec scelerisque diam sed lorem faucibus, id hendrerit erat maximus. Nunc efficitur orci ac metus fringilla, a hendrerit sem imperdiet.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Maecenas non purus risus. Proin nec dolor semper turpis tristique egestas. Proin aliquet odio sed imperdiet rutrum. Cras rhoncus enim turpis, sed finibus tellus consectetur ac. Ut tempor lobortis turpis, eu blandit neque placerat eget. Fusce sed odio nec dui condimentum tempus. Pellentesque at orci lacus. Sed sit amet enim quis lorem commodo vulputate. Quisque dignissim sem vel nulla efficitur lobortis. Aenean fermentum vitae justo sed facilisis. Mauris nec orci sagittis, efficitur tortor id, varius ex. Ut euismod lacus et leo congue dapibus. Mauris malesuada scelerisque dignissim. Fusce quis convallis sem. Aenean sed leo arcu</p>\r\n</div>\r\n</div>\r\n</div>', '60e645c57f31c.jpg', 'google', '2021-07-07', 'Kevin Freire', 'false', 'carro'),
(30, 14, 'Moto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum sagittis malesuada. In aliquet tincidunt purus, sit amet viverra lorem malesuada quis. Fusce rhoncus mi a quam ullamcorper, sit amet tempus ipsum ultricies. In porta, nisi eget facilisis consectetur, odio sapien lacinia sem, at hendrerit velit libero in quam. Vivamus dictum lacus id justo scelerisque, at fermentum ante efficitur. Phasellus rutrum bibendum neque, ac convallis ', '<hr style=\"margin: 0px; padding: 0px; clear: both; border-top: 0px; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: initial; border-image: initial; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0)); font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: center; background-color: #ffffff;\" />\r\n<div id=\"Content\" style=\"margin: 0px; padding: 0px; position: relative; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: center; background-color: #ffffff;\">\r\n<div id=\"bannerL\" style=\"margin: 0px 0px 0px -160px; padding: 0px; position: sticky; top: 20px; width: 160px; height: 10px; float: left; text-align: right;\"></div>\r\n<div id=\"bannerR\" style=\"margin: 0px -160px 0px 0px; padding: 0px; position: sticky; top: 20px; width: 160px; height: 10px; float: right; text-align: left;\"></div>\r\n<div class=\"boxed\" style=\"margin: 10px 28.7969px; padding: 0px; clear: both;\">\r\n<div id=\"lipsum\" style=\"margin: 0px; padding: 0px; text-align: justify;\">\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut bibendum sagittis malesuada. In aliquet tincidunt purus, sit amet viverra lorem malesuada quis. Fusce rhoncus mi a quam ullamcorper, sit amet tempus ipsum ultricies. In porta, nisi eget facilisis consectetur, odio sapien lacinia sem, at hendrerit velit libero in quam. Vivamus dictum lacus id justo scelerisque, at fermentum ante efficitur. Phasellus rutrum bibendum neque, ac convallis tellus. Fusce sit amet euismod odio, nec consectetur nisl. Maecenas sit amet lorem tellus. Praesent viverra, odio eget egestas vehicula, quam nunc tempor tortor, in pulvinar quam sapien quis urna. Aenean vitae scelerisque magna. Quisque posuere, ligula vel placerat mollis, nisl eros imperdiet sapien, at ultricies nibh turpis nec ligula.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Integer sed fringilla velit. Nullam feugiat semper ligula quis ultricies. In hac habitasse platea dictumst. Nullam tincidunt tempus erat, vitae molestie libero fringilla id. Nullam facilisis ut velit vel commodo. Morbi diam tellus, ultrices vel malesuada dapibus, consectetur quis enim. Fusce consequat finibus mattis. Suspendisse turpis leo, dictum eget nisl non, cursus mattis elit. Nam tincidunt maximus dignissim. Fusce pharetra, lorem ut sagittis imperdiet, ligula sapien rhoncus felis, vitae auctor purus arcu et risus. Nam gravida, nulla quis volutpat hendrerit, erat nisl accumsan ligula, vitae gravida neque nibh ac magna. In pharetra fringilla mauris. Proin vitae lacus in nisl dapibus tincidunt at eget lacus. Donec scelerisque diam sed lorem faucibus, id hendrerit erat maximus. Nunc efficitur orci ac metus fringilla, a hendrerit sem imperdiet.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px;\">Maecenas non purus risus. Proin nec dolor semper turpis tristique egestas. Proin aliquet odio sed imperdiet rutrum. Cras rhoncus enim turpis, sed finibus tellus consectetur ac. Ut tempor lobortis turpis, eu blandit neque placerat eget. Fusce sed odio nec dui condimentum tempus. Pellentesque at orci lacus. Sed sit amet enim quis lorem commodo vulputate. Quisque dignissim sem vel nulla efficitur lobortis. Aenean fermentum vitae justo sed facilisis. Mauris nec orci sagittis, efficitur tortor id, varius ex. Ut euismod lacus et leo congue dapibus. Mauris malesuada scelerisque dignissim. Fusce quis convallis sem. Aenean sed leo arcu</p>\r\n</div>\r\n</div>\r\n</div>', '60e6460bb25aa.jpg', 'google', '2021-07-07', 'Kevin Freire', 'false', 'moto');

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
(78, '::1', '2021-07-07 21:33:33', '60e646200ddcf');

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
(11, 'admin', 'admin', '606e06027560c.png', 'Kevin Freire', 0),
(21, 'Carlos', '123', '60e648b03ae07.png', 'Carlos', 2),
(22, 'Lucas', '123', '60e648c06db2f.png', 'Lucas', 3),
(23, 'Gustavo', '123', '60e648e541edd.png', 'Guga', 1);

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
(5, '127.0.0.1', '2021-03-31'),
(6, '::1', '2021-04-11'),
(7, '::1', '2021-04-13'),
(8, '::1', '2021-04-19'),
(9, '::1', '2021-04-23'),
(10, '::1', '2021-04-28'),
(11, '::1', '2021-05-12'),
(12, '::1', '2021-05-12'),
(13, '::1', '2021-05-12'),
(14, '127.0.0.1', '2021-05-12'),
(15, '127.0.0.1', '2021-05-12'),
(16, '127.0.0.1', '2021-05-12'),
(17, '127.0.0.1', '2021-05-13'),
(18, '::1', '2021-06-08'),
(19, '::1', '2021-06-21'),
(20, '::1', '2021-06-27'),
(21, '::1', '2021-07-07');

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
(1, '606e0600013c8.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce cursus velit ligula, eget egestas massa consectetur ut. Sed quis neque felis. Phasellus at rhoncus libero, eu lobortis est. Suspendisse malesuada mi sit amet leo tincidunt, quis euismod diam rhoncus. Sed vehicula tincidunt rutrum. Nam commodo maximus augue vel sagittis. Vestibulum viverra consequat augue sed vehicula. Suspendisse quam augue, faucibus eget imperdiet congue, aliquet eget dui. Duis suscipit odio orci. Aenean at fringilla lectus. Aenean nibh neque, ultricies ac libero eu, luctus condimentum augue. Maecenas et vehicula turpis.', 'fab fa-facebook-f', 'facebook.com', 'fab fa-twitter', 'https://twitter.com', 'fab fa-instagram', 'instagram.com');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_admin.classificados`
--
ALTER TABLE `tb_admin.classificados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_admin.noticias`
--
ALTER TABLE `tb_admin.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_site.config`
--
ALTER TABLE `tb_site.config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

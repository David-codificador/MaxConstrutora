-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Fev-2021 às 13:11
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `maxconstrutora`
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
(1, 'David Natan ', '060221103321611.png', '(62) 9 9813-1151', 'natan_seabra@hotmail.com', 'Admin', '123', 1, '2020-09-01 21:23:37', NULL, NULL, 1),
(7, 'David', NULL, '(62) 99112-1222', 'natan_seabra@hotmail.com', 'admin2', '123456', 0, '2021-01-22 19:49:03', NULL, NULL, 1),
(8, 'teste', NULL, '(33) 23222-2222', 'natan_seabra@hotmail.com', 'daadasdad', '1212212', 0, '2021-01-23 10:33:10', NULL, NULL, 3),
(9, 'dadsdddaaaaaaa', NULL, '(62) 99112-1222', 'natan_seabra@hotmail.com', 'dasdassaaaaaa', 'dasdadadad', 0, '2021-01-23 10:33:55', NULL, NULL, 2),
(10, 'Daviddaddsadad', NULL, '(62) 99112-1222', 'natan_seabra@hotmail.com', 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 0, '2021-01-23 10:34:12', NULL, NULL, 3),
(12, 'teste', NULL, '(62) 99112-1222', 'natan_seabra@hotmail.com', 'admin4', '123456', 0, '2021-01-25 20:08:20', NULL, NULL, 3),
(13, 'LIny Kassia de Oliveira', NULL, '(62) 9 9866-0935', 'liny@hotmail.com', 'Liny', '123456', 0, '2021-01-26 23:11:26', NULL, NULL, 1),
(14, 'teste', NULL, '(62) 99112-1222', 'liny@hotmail.com', 'hhhhhhhhhhhhh', '11111111111', 0, '2021-02-04 21:51:57', NULL, NULL, 9);

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
(1, 3, 1, 'Contato', '-', 'O  David Natan , efetuou a exclusão de um contato teste', '2021-01-31 11:12:45', '::1'),
(2, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-01-31 18:57:39', '::1'),
(3, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-01 21:38:01', '::1'),
(63, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-09 09:33:33', '::1'),
(64, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-09 09:33:40', '::1'),
(65, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-09 09:35:48', '::1'),
(66, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-10 20:35:37', '::1'),
(67, 1, 1, 'Contato', 'campo Nome: David<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dasdada<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-10 21:08:05', '::1'),
(68, 1, 1, 'Contato', 'campo Nome: David<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dadsadas<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-10 21:09:44', '::1'),
(69, 1, 1, 'Contato', 'campo Nome: David<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dasdad<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-10 21:11:06', '::1'),
(70, 1, 1, 'Contato', 'campo Nome: wqds<br>campo Telefone: ww<br>campo Email: nanta@gmail.com<br>campo Assunto: sdads<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-10 21:13:34', '::1'),
(71, 1, 1, 'Contato', 'campo Nome: dada<br>campo Telefone: dadsa<br>campo Email: nanta@gmail.com<br>campo Assunto: dadsas<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-10 21:18:51', '::1'),
(72, 1, 1, 'Contato', 'campo Nome: David<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: asdaasd<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-10 21:20:49', '::1'),
(73, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-10 21:21:57', '::1'),
(74, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-11 19:35:02', '::1'),
(75, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-11 19:35:37', '::1'),
(76, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 10:29:03', '::1'),
(77, 1, 1, 'Contato', 'campo Nome: David<br>campo Telefone: dasd<br>campo Email: dsdad<br>campo Assunto: dasd<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 10:31:32', '::1'),
(78, 1, 1, 'Contato', 'campo Nome: David<br>campo Telefone: dasssssss<br>campo Email: nanta@gmail.com<br>campo Assunto: dasdsad<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 10:35:40', '::1'),
(79, 1, 1, 'Contato', 'campo Nome: valdivino<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dsdsd<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 10:36:34', '::1'),
(80, 1, 1, 'Contato', 'campo Nome: valdivino<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dsdsd<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 10:36:37', '::1'),
(81, 1, 1, 'Contato', 'campo Nome: valdivino<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dsdsd<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 10:36:54', '::1'),
(82, 3, 1, 'Contato', 'campo Status: Excluido', 'O  David Natan , efetuou a exclusão do contato\"wqds\".', '2021-02-12 10:37:05', '::1'),
(83, 1, 1, 'Contato', 'campo Nome: Cassio de souza<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dasdsad<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 10:38:25', '::1'),
(84, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 10:42:06', '::1'),
(85, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 10:56:07', '::1'),
(86, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 10:57:45', '::1'),
(87, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 10:58:02', '::1'),
(88, 1, NULL, 'Contato', 'campo Nome: asdfs<br>campo Telefone: dfssfd<br>campo Email: d@gamsdl.com<br>campo Assunto: sadfasdfasd<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 13:49:00', '::1'),
(89, 1, NULL, 'Contato', 'campo Nome: fdasfsf<br>campo Telefone: asdfsd<br>campo Email: nanta@gmail.com<br>campo Assunto: afsdfs<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 13:49:48', '::1'),
(90, 1, NULL, 'Contato', 'campo Nome: fdasfsf<br>campo Telefone: asdfsd<br>campo Email: nanta@gmail.com<br>campo Assunto: afsdfs<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 13:49:55', '::1'),
(91, 1, NULL, 'Contato', 'campo Nome: fdasfsf<br>campo Telefone: asdfsd<br>campo Email: nanta@gmail.com<br>campo Assunto: afsdfs<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 13:51:39', '::1'),
(92, 1, NULL, 'Contato', 'campo Nome: David<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: David Natan Seabra<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 14:03:08', '::1'),
(93, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 14:04:19', '::1'),
(94, 1, 1, 'Contato', 'campo Nome: Kelly<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.comd<br>campo Assunto: dads<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 14:04:44', '::1'),
(95, 1, 1, 'Contato', 'campo Nome: David<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dsada<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 14:09:16', '::1'),
(96, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 14:09:58', '::1'),
(97, 1, NULL, 'Contato', 'campo Nome: David<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dasd<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 14:10:42', '::1'),
(98, 1, NULL, 'Contato', 'campo Nome: David<br>campo Telefone: 2281821212<br>campo Email: nanta@gmail.com<br>campo Assunto: dsda<br>campo Status: 2<br>', 'O Internauta efetuou o cadastro de um novo Contato', '2021-02-12 14:13:05', '::1'),
(99, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 18:46:08', '::1'),
(100, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 19:01:57', '::1'),
(101, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 19:06:28', '::1'),
(102, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 19:21:07', '::1'),
(103, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 19:23:04', '::1'),
(104, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 19:28:06', '::1'),
(105, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 19:29:28', '::1'),
(106, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 19:48:30', '::1'),
(107, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 19:53:08', '::1'),
(108, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 20:02:19', '::1'),
(109, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 20:06:43', '::1'),
(110, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 20:13:35', '::1'),
(111, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 20:14:21', '::1'),
(112, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 20:25:38', '::1'),
(113, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 20:28:12', '::1'),
(114, 1, 1, 'Banner', 'campo Título: Banner 1<br>campo Sub Título: Construção, Rede Pluvial e Obras Geraisda<br>campo Link: hdasdd<br>campo Titulo do Link: dadsda<br>campo Status: 1<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banners/12_02_2021_08_46_13_138.png\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um novo banner(a).', '2021-02-12 20:46:13', '::1'),
(115, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 20:56:23', '::1'),
(116, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 20:56:29', '::1'),
(117, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 21:01:29', '::1'),
(118, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 21:01:53', '::1'),
(119, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 21:04:19', '::1'),
(120, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 21:10:46', '::1'),
(121, 1, 1, 'Banner', 'campo Título: Banner 1<br>campo Sub Título: Construção, Rede Pluvial e Obras Gerais<br>campo Link: hdasdd<br>campo Titulo do Link: dadsda<br>campo Status: 1<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banners/12_02_2021_09_13_56_116.png\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um novo banner(a).', '2021-02-12 21:13:57', '::1'),
(122, 1, 1, 'Banner', 'campo Título: Banner 1<br>campo Sub Título: Construção, Rede Pluvial e Obras Geraisda<br>campo Link: hdasddx<br>campo Titulo do Link: dadsda<br>campo Status: 1<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banners/12_02_2021_09_21_22_128.png\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um novo banner(a).', '2021-02-12 21:21:22', '::1'),
(123, 4, 1, 'Banner', '-', 'O  David Natan , efetuou a exclusão de um banner(a): ', '2021-02-12 21:24:01', '::1'),
(124, 3, 1, 'Banner', '-', 'O  David Natan , efetuou a exclusão de um banner(a): ', '2021-02-12 21:28:18', '::1'),
(125, 1, 1, 'Banner', 'campo Título: Banner 1<br>campo Sub Título: Construção, Rede Pluvial e Obras Gerais<br>campo Link: hdasdd<br>campo Titulo do Link: dadsda<br>campo Status: 1<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banners/12_02_2021_09_28_27_205.png\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um novo banner(a).', '2021-02-12 21:28:28', '::1'),
(126, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 21:33:30', '::1'),
(127, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-12 21:35:33', '::1'),
(128, 1, 1, 'Banner', 'campo Título: Banner 2<br>campo Sub Título: Construção, Rede Pluvial e Obras Gerais<br>campo Link: hdasdd<br>campo Titulo do Link: dadsda<br>campo Status: 1<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banners/12_02_2021_10_11_41_135.jpeg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um novo banner(a).', '2021-02-12 22:11:42', '::1'),
(129, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-12 22:16:42', '::1'),
(130, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 20:25:19', '::1'),
(131, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 20:35:05', '::1'),
(132, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 20:36:40', '::1'),
(133, 1, 1, 'Banner', 'campo Contador Banner: 02<br>campo Título: Banner 3<br>campo Sub Título: Cheque Mate<br>campo Link: hdasdd<br>campo Titulo do Link: David<br>campo Status: 1<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banners/14_02_2021_08_41_12_188.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um novo banner(a).', '2021-02-14 20:41:13', '::1'),
(134, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 20:46:55', '::1'),
(135, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 20:51:12', '::1'),
(136, 3, 1, 'Banner', '-', 'O  David Natan , efetuou a exclusão de um banner(a): ', '2021-02-14 20:54:56', '::1'),
(137, 1, 1, 'Banner', 'campo Contador Banner: 03<br>campo Título: Banner 3<br>campo Sub Título: Cheque Mate<br>campo Link: hdasdd<br>campo Titulo do Link: David<br>campo Status: 1<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banners/14_02_2021_08_56_47_144.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um novo banner(a).', '2021-02-14 20:56:47', '::1'),
(138, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 21:02:10', '::1'),
(139, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 21:02:41', '::1'),
(140, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 21:11:28', '::1'),
(141, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 21:13:46', '::1'),
(142, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 21:21:57', '::1'),
(143, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 21:22:39', '::1'),
(144, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 21:31:33', '::1'),
(145, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 21:32:44', '::1'),
(146, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 22:17:32', '::1'),
(147, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 22:17:44', '::1'),
(148, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 22:18:14', '::1'),
(149, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 22:19:42', '::1'),
(150, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 22:26:50', '::1'),
(151, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 22:27:38', '::1'),
(152, 2, 1, 'Banner', 'campo Status editado de: \"1\" para \"on\"<br>campo Titulo do Link editado de: \"dadsda\" para \"sa\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:47:57', '::1'),
(153, 2, 1, 'Banner', 'campo Status editado de: \"0\" para \"on\"<br>campo Título editado de: \"Banner 1\" para \"Construção \"<br>campo Sub Título editado de: \"Construção, Rede Pluvial e Obras Gerais\" para \"Construir com uma equipe preparada! é construir com a MaxxConstrutora\"<br>campo Link editado de: \"hdasdd\" para \"-\"<br>campo Titulo do Link editado de: \"sa\" para \"Continue a Jornada\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:52:22', '::1'),
(154, 2, 1, 'Banner', 'campo Status editado de: \"0\" para \"on\"<br>campo Link editado de: \"-\" para \"s\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:53:13', '::1'),
(155, 2, 1, 'Banner', 'campo Link editado de: \"s\" para \"ssa\"<br>campo Status editado de: \"0\" para \"on\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:54:10', '::1'),
(156, 2, 1, 'Banner', 'campo Link editado de: \"ssa\" para \"sa\"<br>campo Status editado de: \"0\" para \"1\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:55:17', '::1'),
(157, 2, 1, 'Banner', 'campo Sub Título editado de: \"Construir com uma equipe preparada! é construir com a MaxxConstrutora\" para \"Construir com uma equipe preparada!\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:55:53', '::1'),
(158, 2, 1, 'Banner', 'campo Status editado de: \"1\" para \"on\"<br>campo Link editado de: \"sa\" para \"a\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:58:06', '::1'),
(159, 2, 1, 'Banner', 'campo Status editado de: \"0\" para \"1\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:58:28', '::1'),
(160, 2, 1, 'Banner', 'campo Status editado de: \"1\" para \"2\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:58:35', '::1'),
(161, 2, 1, 'Banner', 'campo Status editado de: \"2\" para \"1\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-14 22:58:43', '::1'),
(162, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 23:05:20', '::1'),
(163, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-14 23:07:40', '::1'),
(164, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-14 23:12:46', '::1'),
(165, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 18:59:39', '::1'),
(166, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banner/12_02_2021_09_28_27_205.png\" /><br>para:<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banner/15_02_2021_07_04_50_145.jpg\" /><br>', 'O  David Natan , efetuou a edição da imagem do banner(a) ', '2021-02-15 19:04:50', '::1'),
(167, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banner/15_02_2021_07_04_50_145.jpg\" /><br>para:<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banner/15_02_2021_07_05_07_141.png\" /><br>', 'O  David Natan , efetuou a edição da imagem do banner(a) ', '2021-02-15 19:05:07', '::1'),
(168, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-15 19:10:07', '::1'),
(169, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 19:29:28', '::1'),
(170, 2, 1, 'Banner', 'campo imagem editado de:<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banner/15_02_2021_07_05_07_141.png\" /><br>para:<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/banner/15_02_2021_07_30_31_172.png\" /><br>', 'O  David Natan , efetuou a edição da imagem do banner(a) ', '2021-02-15 19:30:32', '::1'),
(171, 2, 1, 'Banner', 'campo Título editado de: \"Banner 2\" para \"Rede Pluvial\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-15 19:31:46', '::1'),
(172, 2, 1, 'Banner', 'campo Título editado de: \"Banner 3\" para \"Meio Fio\"<br>campo Link editado de: \"hdasdd\" para \"*\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-15 19:32:59', '::1'),
(173, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-15 19:38:00', '::1'),
(174, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 21:00:53', '::1'),
(175, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-15 21:15:50', '::1'),
(176, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 21:37:52', '::1'),
(177, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-15 21:42:55', '::1'),
(178, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 21:43:37', '::1'),
(179, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-15 21:48:39', '::1'),
(180, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 21:54:17', '::1'),
(181, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-15 22:18:41', '::1'),
(182, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 22:19:28', '::1'),
(183, 1, 1, 'Obras', 'campo Título: Banner 1dasda<br>campo Sub Título: Cheque Mate<br>campo Categoria: Construção civil<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/15_02_2021_10_20_30_994.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova foto na obras.', '2021-02-15 22:20:31', '::1'),
(184, 1, 1, 'Obras', 'campo Título: Banner 1<br>campo Sub Título: Cheque Mate<br>campo Categoria: Sarjeta<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/15_02_2021_10_20_58_482.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova foto na obras.', '2021-02-15 22:20:58', '::1'),
(185, 1, 1, 'Obras', 'campo Título: Banner 1<br>campo Sub Título: dasd<br>campo Categoria: Rede Esgoto<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/15_02_2021_10_21_49_499.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova foto na obras.', '2021-02-15 22:21:49', '::1'),
(186, 1, 1, 'Obras', 'campo Título: Banner 1<br>campo Sub Título: dsad<br>campo Categoria: Meio Fio<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/15_02_2021_10_22_25_525.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova foto na obras.', '2021-02-15 22:22:25', '::1'),
(187, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-15 22:25:18', '::1'),
(188, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 22:26:05', '::1'),
(189, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-15 22:27:25', '::1'),
(190, 5, NULL, 'administrador', NULL, 'O   saiu do sistema!', '2021-02-15 22:31:05', '::1'),
(191, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 22:32:44', '::1'),
(192, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-15 22:36:01', '::1'),
(193, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-15 22:36:50', '::1'),
(194, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 09:13:27', '::1'),
(195, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 09:14:54', '::1'),
(196, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 09:24:12', '::1'),
(197, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 09:29:19', '::1'),
(198, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 10:13:04', '::1'),
(199, 1, 1, 'Obras', 'campo Título: Obra Nova Gloria<br>campo Sub Título: Rua das Dores<br>campo Categoria: Meio Fio<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_10_14_06_517.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 10:14:06', '::1'),
(200, 1, 1, 'Obras', 'campo Título: Banner 1<br>campo Sub Título: dsad<br>campo Categoria: Meio Fio<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_10_28_42_186.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 10:28:42', '::1'),
(201, 3, 1, 'Obras', '-', 'O  David Natan , efetuou a exclusão de uma imagem da obra: Meio Fio', '2021-02-16 10:29:00', '::1'),
(202, 1, 1, 'Obras', 'campo Título: Banner 1<br>campo Sub Título: Cheque Mate<br>campo Categoria: Construção civil<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_10_30_05_562.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 10:30:05', '::1'),
(203, 3, 1, 'Obras', '-', 'O  David Natan , efetuou a exclusão de uma imagem da obra: Construção civil', '2021-02-16 10:30:12', '::1'),
(204, 1, 1, 'Obras', 'campo Título: Banner 1<br>campo Sub Título: Cheque Mate<br>campo Categoria: Construção civil<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_10_31_22_904.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 10:31:22', '::1'),
(205, 3, 1, 'Obras', '-', 'O  David Natan , efetuou a exclusão de uma imagem da obra: Construção civil', '2021-02-16 10:31:26', '::1'),
(206, 1, 1, 'Obras', 'campo Título: Banner 2<br>campo Sub Título: dsad<br>campo Categoria: Construção civil<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_10_33_25_607.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 10:33:25', '::1'),
(207, 3, 1, 'Obras', '-', 'O  David Natan , efetuou a exclusão de uma imagem da obra: Construção civil', '2021-02-16 10:33:29', '::1'),
(208, 1, 1, 'Obras', 'campo Título: Banner 1<br>campo Sub Título: dsad<br>campo Categoria: Meio Fio<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_10_34_40_763.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 10:34:40', '::1'),
(209, 1, 1, 'Obras', 'campo Título: Banner 2<br>campo Sub Título: dsad<br>campo Categoria: Rede Pluvial<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_10_34_50_446.jpg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 10:34:50', '::1'),
(210, 3, 1, 'Obras', '-', 'O  David Natan , efetuou a exclusão de uma imagem da obra: Meio Fio', '2021-02-16 10:34:54', '::1'),
(211, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 10:43:30', '::1'),
(212, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 11:12:15', '::1'),
(213, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 11:17:19', '::1'),
(214, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 11:20:33', '::1'),
(215, 3, 1, 'Obras', '-', 'O  David Natan , efetuou a exclusão de uma imagem da obra: Rede Pluvial', '2021-02-16 11:20:48', '::1'),
(216, 1, 1, 'Obras', 'campo Categoria: Meio Fio<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_11_24_52_815.jpeg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 11:24:52', '::1'),
(217, 1, 1, 'Obras', 'campo Categoria: Rede Pluvial<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_11_25_19_518.jpeg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 11:25:20', '::1'),
(218, 1, 1, 'Obras', 'campo Categoria: Sarjeta<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_11_28_46_595.jpeg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 11:28:46', '::1'),
(219, 1, 1, 'Obras', 'campo Categoria: Rede Esgoto<br><img src=\"http://localhost/MaxConstrutora//public/imagemSite/obras/16_02_2021_11_36_11_420.jpeg\" style=\"width: 100%\">', 'O  David Natan , efetuou o cadastro de um nova obra.', '2021-02-16 11:36:11', '::1'),
(220, 2, 1, 'Banner', 'campo Sub Título editado de: \"Construir com uma equipe preparada!\" para \"Teste 1\"<br>', 'O  David Natan , efetuou a edição das informações de um(a) banner(a).', '2021-02-16 11:40:25', '::1'),
(221, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 11:45:54', '::1'),
(222, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 11:55:40', '::1'),
(223, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 11:58:38', '::1'),
(224, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 11:59:23', '::1'),
(225, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 12:30:33', '::1'),
(226, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 12:36:47', '::1'),
(227, 2, 1, 'Obras', 'campo Categoria editado de: \"Rede Esgoto\" para \"Rede Pluvial\"<br>', 'O  David Natan , efetuou a edição das informações de uma Obra.', '2021-02-16 12:36:55', '::1'),
(228, 2, 1, 'Obras', 'campo Título editado de: \"\" para \"Banner 1\"<br>', 'O  David Natan , efetuou a edição das informações de uma Obra.', '2021-02-16 12:40:58', '::1'),
(229, 2, 1, 'Obras', 'campo Sub Título editado de: \"\" para \"dsad\"<br>', 'O  David Natan , efetuou a edição das informações de uma Obra.', '2021-02-16 12:41:04', '::1'),
(230, 2, 1, 'Obras', 'campo Título editado de: \"Banner 1\" para \"\"<br>campo Sub Título editado de: \"dsad\" para \"\"<br>', 'O  David Natan , efetuou a edição das informações de uma Obra.', '2021-02-16 12:41:12', '::1'),
(231, 3, 1, 'Obras', '-', 'O  David Natan , efetuou a exclusão de uma imagem da obra: Sarjeta', '2021-02-16 12:42:57', '::1'),
(232, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 12:48:01', '::1'),
(233, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 12:52:52', '::1'),
(234, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 12:58:06', '::1'),
(235, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 13:11:19', '::1'),
(236, 2, 1, 'Obras', 'campo Título editado de: \"\" para \"Banner 1\"<br>campo Sub Título editado de: \"\" para \"dsad\"<br>', 'O  David Natan , efetuou a edição das informações de uma Obra.', '2021-02-16 13:11:30', '::1'),
(237, 2, 1, 'Obras', 'campo Título editado de: \"Banner 1\" para \"\"<br>campo Sub Título editado de: \"dsad\" para \"\"<br>', 'O  David Natan , efetuou a edição das informações de uma Obra.', '2021-02-16 13:11:44', '::1'),
(238, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 13:16:44', '::1'),
(239, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-16 13:44:42', '::1'),
(240, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-16 13:49:42', '::1'),
(241, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-17 11:09:47', '::1'),
(242, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-17 11:14:45', '::1'),
(243, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-17 11:19:45', '::1'),
(244, 1, 1, NULL, 'campo Nome Serviço: Meio Fio<br>campo Título: Rede Pluvial<br>campo Texto: <p>dsadada</p>\r\n<br>', 'O  David Natan , efetuou o cadastro de um novo Servico', '2021-02-17 11:27:52', '::1'),
(245, 1, 1, NULL, 'campo Nome Serviço: Meio Fio<br>campo Título: Banner 3<br>campo Texto: <p>dsada</p>\r\n<br>', 'O  David Natan , efetuou o cadastro de um novo Servico', '2021-02-17 11:28:11', '::1'),
(246, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-17 11:33:11', '::1'),
(247, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-17 11:34:32', '::1'),
(248, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-17 11:42:17', '::1'),
(249, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-17 11:45:51', '::1'),
(250, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-17 11:53:51', '::1'),
(251, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-17 13:38:38', '::1'),
(252, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-17 14:30:34', '::1'),
(253, 5, 1, 'administrador', NULL, 'O Administrador  saiu do sistema!', '2021-02-17 14:36:47', '::1'),
(254, 5, 1, 'administrador', NULL, 'O Administrador David Natan  acessou o sistema!', '2021-02-17 18:35:48', '::1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `sub_titulo` varchar(100) DEFAULT NULL,
  `link` text NOT NULL,
  `titulo_link` varchar(45) NOT NULL,
  `status` int(1) NOT NULL,
  `administrador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `imagem`, `titulo`, `sub_titulo`, `link`, `titulo_link`, `status`, `administrador_id`) VALUES
(3, '15_02_2021_07_30_31_172.png', 'Construção ', 'Teste 1', 'a', 'Continue a Jornada', 1, 1),
(4, '12_02_2021_10_11_41_135.jpeg', 'Rede Pluvial', 'Construção, Rede Pluvial e Obras Gerais', 'hdasdd', 'dadsda', 1, 1),
(7, '14_02_2021_08_56_47_144.jpg', 'Meio Fio', 'Cheque Mate', '*', 'David', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `assunto` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `obras`
--

CREATE TABLE `obras` (
  `id` int(11) NOT NULL,
  `imagem` varchar(45) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `sub_titulo` varchar(45) DEFAULT NULL,
  `categoria` varchar(50) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `administrador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `obras`
--

INSERT INTO `obras` (`id`, `imagem`, `titulo`, `sub_titulo`, `categoria`, `data_cadastro`, `administrador_id`) VALUES
(8, '16_02_2021_11_24_52_815.jpeg', NULL, NULL, '2', '2021-02-16 11:24:52', 1),
(9, '16_02_2021_11_25_19_518.jpeg', NULL, NULL, '4', '2021-02-16 11:25:19', 1),
(11, '16_02_2021_11_36_11_420.jpeg', NULL, NULL, '4', '2021-02-16 11:36:11', 1);

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
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `tipo_servico` varchar(45) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `administrador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `tipo_servico`, `titulo`, `texto`, `administrador_id`) VALUES
(0, 'Meio Fio', 'Banner 3', '<p>dsada</p>\r\n', 1),
(1, 'teste', 'Rede Pluvial', '<p>dsadada</p>\r\n', 1);

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
(2, 'usuario', 0),
(3, 'logistica', 1),
(5, 'teste', 0),
(6, 'tesasa', 0),
(9, 'aaaaa', 1),
(10, 'David', 0);

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
(3, 2),
(6, 3),
(9, 3),
(10, 1);

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
-- Índices para tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrador_id` (`administrador_id`) USING BTREE;

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obras_administrador_idx` (`administrador_id`);

--
-- Índices para tabela `permissao`
--
ALTER TABLE `permissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_administrador_id_idx` (`administrador_id`);

--
-- Índices para tabela `tipo_administrador`
--
ALTER TABLE `tipo_administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_UNIQUE` (`tipo`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `permissao`
--
ALTER TABLE `permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipo_administrador`
--
ALTER TABLE `tipo_administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Limitadores para a tabela `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `administrador_id` FOREIGN KEY (`administrador_id`) REFERENCES `tipo_administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `fk_obras_administrador` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `fk_administrador_id` FOREIGN KEY (`administrador_id`) REFERENCES `administrador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

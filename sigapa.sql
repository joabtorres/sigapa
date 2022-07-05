-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Tempo de geração: 05-Jul-2022 às 18:41
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29
=======
-- Tempo de geração: 16-Abr-2022 às 16:43
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sigapa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado`
--

CREATE TABLE `associado` (
  `cod` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `apelido` varchar(20) DEFAULT NULL,
  `nome_completo` varchar(255) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `rg` varchar(40) DEFAULT NULL,
  `car` varchar(50) NOT NULL,
  `dap` varchar(50) NOT NULL,
  `estado_civil` varchar(20) DEFAULT NULL,
  `nacionalidade` varchar(20) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_inscricao` date DEFAULT NULL,
  `pai` varchar(255) DEFAULT NULL,
  `mae` varchar(255) DEFAULT NULL,
  `conjugue` varchar(255) DEFAULT NULL,
  `filhos` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `associado`
--

<<<<<<< HEAD
INSERT INTO `associado` (`cod`, `tipo`, `status`, `apelido`, `nome_completo`, `cpf`, `rg`, `estado_civil`, `nacionalidade`, `genero`, `data_nascimento`, `data_inscricao`, `pai`, `mae`, `conjugue`, `filhos`, `imagem`) VALUES
(1, 'Permissionário', 1, 'João', 'João da Silva Gomes', '111.111.111-11', '15245415 PC/PA', 'Solteiro', 'Brasileiro', 'Masculino', '2022-07-05', '2022-07-06', 'Jose da Silva', 'Maria Gomes', '', '', 'uploads/cooperados/d08ab83c9ffd3a22b1c088ca1336515a.jpg');
=======
INSERT INTO `associado` (`cod`, `tipo`, `status`, `apelido`, `nome_completo`, `cpf`, `rg`, `car`, `dap`, `estado_civil`, `nacionalidade`, `genero`, `data_nascimento`, `data_inscricao`, `pai`, `mae`, `conjugue`, `filhos`, `imagem`) VALUES
(1, 'Permissionário', 1, 'João', 'João Garcia Gomes', '111.111.111-11', '684444 PC/PA', '0', '0', 'Solteiro', 'Brasileiro', 'Masculino', '1995-11-11', '2010-03-05', 'JOSE GOMES', 'LUCIA RODRIGUES', 'LETICIA COSTA', 'LUCAS COSTA GOMES', 'uploads/cooperados/db0956e35c4ff7c5768498d5af0a7a76.jpg'),
(2, 'Permissionário', 0, 'sadsad', 'asdasd', '222.222.222-22', '222222222', '0', '0', 'asdsadas', 'BRASILEIRO', 'Masculino', '1111-11-11', '2022-03-04', 'asdasdsa', 'asdsadsa', 'sadsadsaasd', 'dasdsadas', 'uploads/cooperados/753954d013bebdf6d9fd6063e8605a4e.jpg'),
(3, 'Participativo', 1, '11', '111111111111111111', '333.333.333-33', '111111111', '0', '0', '11111', 'BRASILEIRO', 'Masculino', '0000-00-00', '0000-00-00', '', '', '', '', ''),
(4, 'Permissionário', 1, 'JOAB', 'sadsad', '222.222.222-22', '222222', '22222222222', '222222222', 'casado', 'BRASILEIRO', 'Masculino', '0000-00-00', '0000-00-00', 'adsadas', 'dsadas', 'dsadasdas', 'das', 'uploads/cooperados/2a27fa6978ced746ccee5327e9147b90.jpg'),
(5, 'Permissionário', 1, '12321', 'asdsad', '222.222.222-22', '11111', '111111111111111111', '222222222', '333333', 'BRASILEIRO', 'Masculino', '0000-00-00', '0000-00-00', '3asdsadas', '12', '211', '212', 'uploads/cooperados/5e0fd0b9bf5d6f50beb5b17523f15650.jpg');
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado_carteira`
--

CREATE TABLE `associado_carteira` (
  `cod` int(11) NOT NULL,
  `associado_cod` int(11) NOT NULL,
  `data_inicial` date DEFAULT NULL,
  `data_validade` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `associado_carteira`
--

INSERT INTO `associado_carteira` (`cod`, `associado_cod`, `data_inicial`, `data_validade`) VALUES
<<<<<<< HEAD
(5, 1, '2022-07-21', '2022-07-21');
=======
(2, 1, '2022-03-03', '2023-03-01'),
(3, 2, '2022-03-04', '2023-03-01'),
(4, 3, '0000-00-00', '0000-00-00'),
(5, 4, '0000-00-00', '0000-00-00'),
(6, 5, '0000-00-00', '0000-00-00');
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado_contato`
--

CREATE TABLE `associado_contato` (
  `cod_contato` int(11) NOT NULL,
  `associado_cod` int(11) NOT NULL,
  `celular_1` varchar(20) DEFAULT NULL,
  `celular_2` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `associado_contato`
--

INSERT INTO `associado_contato` (`cod_contato`, `associado_cod`, `celular_1`, `celular_2`, `email`) VALUES
<<<<<<< HEAD
(6, 1, '(91) 92224-4454', '', '');
=======
(3, 1, '(93) 02414-4444', '(93) 22222-2222', ''),
(4, 2, '', '', ''),
(5, 3, '', '', ''),
(6, 4, '(93) 99204-1711', '', 'joabtorres@gmail.com'),
(7, 5, '(22) 22222-2222', '', '');
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado_endereco`
--

CREATE TABLE `associado_endereco` (
  `cod_endereco` int(11) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cep` varchar(12) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `associado_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `associado_endereco`
--

INSERT INTO `associado_endereco` (`cod_endereco`, `logradouro`, `numero`, `bairro`, `complemento`, `cidade`, `estado`, `cep`, `latitude`, `longitude`, `associado_cod`) VALUES
(3, 'Rodovia BR 316 KM 54', '111', 'Zona Rural', 'Ramal do Itaqui, Km 17, próximo a Vila Trindade (Ramal São João)', 'Castanhal', 'PA', '68180-390', '-1.414163586036588', '-48.02088100363464', 1),
(4, '', '', '', '', 'Itaituba', 'PA', '', 'PA', 'PA', 2),
(5, '', '', '', '', 'Castanhal', 'PA', '', '-1.2992685319561943', '-47.950124329821776', 3),
<<<<<<< HEAD
(6, 'Rodovia BR 316 KM 54, Ramal do Itaqui, Km 17, próximo a Vila Trindade (Ramal São João), Zona Rural –', 's/n', '', 'Lote 1, Quadra 22', 'Castanhal', 'PA', '', '-1.3855941779451242', '-48.0023503977417', 1);
=======
(6, 'rapz', '5524', 'nova olinda', 'proximo ao mix', 'Castanhal', 'PA', '68180 390', '-1.2950434529057329', '-47.96123749796143', 4),
(7, 'asdasdas', 'asdasd', 'asdasdas', 'dasd', 'Castanhalsadsa', 'PA', 'asdsad', '-1.3020797618172304', '-47.96261078897705', 5);
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado_historico`
--

CREATE TABLE `associado_historico` (
  `cod_historico` int(11) NOT NULL,
  `associado_cod` int(11) NOT NULL,
  `descricao_historico` text DEFAULT NULL,
  `data_historico` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado_mensalidade`
--

CREATE TABLE `associado_mensalidade` (
  `cod_mensalidade` int(11) NOT NULL,
  `associado_cod` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `janeiro` double UNSIGNED DEFAULT NULL,
  `fevereiro` double UNSIGNED DEFAULT NULL,
  `marco` double UNSIGNED DEFAULT NULL,
  `abril` double UNSIGNED DEFAULT NULL,
  `maio` double UNSIGNED DEFAULT NULL,
  `junho` double UNSIGNED DEFAULT NULL,
  `julho` double UNSIGNED DEFAULT NULL,
  `agosto` double UNSIGNED DEFAULT NULL,
  `setembro` double UNSIGNED DEFAULT NULL,
  `outubro` double UNSIGNED DEFAULT NULL,
  `novembro` double UNSIGNED DEFAULT NULL,
  `dezembro` double UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `associado_producao`
--

CREATE TABLE `associado_producao` (
  `cod_produto` int(11) NOT NULL,
  `associado_cod` int(11) NOT NULL,
  `producao_cod` int(11) NOT NULL,
  `area` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `producao`
--

CREATE TABLE `producao` (
  `cod` int(10) UNSIGNED NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `producao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `producao`
--

INSERT INTO `producao` (`cod`, `categoria`, `producao`) VALUES
(1, 'Agricultura', 'Abacaxi'),
(2, 'Agricultura', 'Açaí'),
(4, 'Agricultura', 'Algodão'),
(5, 'Agricultura', 'Algodão herbáceo'),
(6, 'Agricultura', 'Amendoim'),
(7, 'Agricultura', 'Amora'),
(8, 'Agricultura', 'Arroz'),
(9, 'Agricultura', 'Aveia'),
(10, 'Agricultura', 'Aveia branca'),
(11, 'Agricultura', 'Azeitona'),
(12, 'Agricultura', 'Azevém'),
(13, 'Agricultura', 'Banana'),
(14, 'Agricultura', 'Borracha'),
(15, 'Agricultura', 'Brachiaria'),
(16, 'Agricultura', 'Cacau'),
(17, 'Agricultura', 'Café'),
(18, 'Agricultura', 'Cana-de-açúcar'),
(19, 'Agricultura', 'Capim Elefante'),
(20, 'Agricultura', 'Capim-sudão'),
(21, 'Agricultura', 'Caqui'),
(22, 'Agricultura', 'Castanha-de-caju (cultivo)'),
(23, 'Agricultura', 'Centeio'),
(24, 'Agricultura', 'Cevada'),
(25, 'Agricultura', 'Chá-da-Índia'),
(26, 'Agricultura', 'Coco-da-baía'),
(27, 'Agricultura', 'Cornichão'),
(28, 'Agricultura', 'Cupuaçu'),
(29, 'Agricultura', 'Dendê'),
(30, 'Agricultura', 'Erva-mate (cultivo)'),
(31, 'Agricultura', 'Ervilha em grão'),
(32, 'Agricultura', 'Feijão Guandu'),
(33, 'Agricultura', 'Feijão-caupi (vigna)'),
(34, 'Agricultura', 'Figo'),
(35, 'Agricultura', 'Fumo'),
(36, 'Agricultura', 'Gergelim'),
(37, 'Agricultura', 'Girassol'),
(38, 'Agricultura', 'Girassol (em grão)'),
(39, 'Agricultura', 'Goiaba'),
(40, 'Agricultura', 'Grão-de-bico'),
(41, 'Agricultura', 'Guaraná'),
(42, 'Agricultura', 'Juta'),
(43, 'Agricultura', 'Laranja'),
(44, 'Agricultura', 'Lima ácida'),
(45, 'Agricultura', 'Limão'),
(46, 'Agricultura', 'Linho (semente)'),
(47, 'Agricultura', 'Maçã'),
(48, 'Agricultura', 'Malva'),
(49, 'Agricultura', 'Mamão'),
(50, 'Agricultura', 'Mamona'),
(51, 'Agricultura', 'Mandioca'),
(52, 'Agricultura', 'Mandioquinha-salsa'),
(53, 'Agricultura', 'Manga'),
(54, 'Agricultura', 'Maracujá'),
(55, 'Agricultura', 'Marmelo'),
(56, 'Agricultura', 'Melancia'),
(57, 'Agricultura', 'Melão'),
(58, 'Agricultura', 'Milheto'),
(59, 'Agricultura', 'Milho em grão'),
(60, 'Agricultura', 'Noz'),
(61, 'Agricultura', 'Palma de óleo'),
(62, 'Agricultura', 'Palmito (cultivo)'),
(63, 'Agricultura', 'Panicum maximum'),
(64, 'Agricultura', 'Pera'),
(65, 'Agricultura', 'Pêssego'),
(66, 'Agricultura', 'Pimenta-do-reino'),
(67, 'Agricultura', 'Sisal (fibra)'),
(68, 'Agricultura', 'Sorgo'),
(69, 'Agricultura', 'Tangerina'),
(70, 'Agricultura', 'Tangor'),
(71, 'Agricultura', 'Trevo'),
(72, 'Agricultura', 'Trigo'),
(73, 'Agricultura', 'Triticale'),
(74, 'Agricultura', 'Urucum (cultivo)'),
(75, 'Agricultura', 'Uva'),
(76, 'Apicultura', 'Abelhas (Mel, Própolis, Geleia Real, Pólen, e etc)'),
(77, 'Hortaliça', 'Abacate'),
(78, 'Hortaliça', 'Abóbora'),
(79, 'Hortaliça', 'Abobrinha'),
(80, 'Hortaliça', 'Acelga'),
(81, 'Hortaliça', 'Agrião'),
(82, 'Hortaliça', 'Aipo (ou salsão)'),
(83, 'Hortaliça', 'Alcachofra'),
(84, 'Hortaliça', 'Alface'),
(85, 'Hortaliça', 'Alfafa'),
(86, 'Hortaliça', 'Alho'),
(87, 'Hortaliça', 'Almeirão'),
(88, 'Hortaliça', 'Aspargo'),
(89, 'Hortaliça', 'Azuki'),
(90, 'Hortaliça', 'Batata'),
(91, 'Hortaliça', 'Batata-doce'),
(92, 'Hortaliça', 'Berinjela'),
(93, 'Hortaliça', 'Bertalha'),
(94, 'Hortaliça', 'Beterraba'),
(95, 'Hortaliça', 'Brócolis'),
(96, 'Hortaliça', 'Brotos de feijão'),
(97, 'Hortaliça', 'Cebola'),
(98, 'Hortaliça', 'Cenoura'),
(99, 'Hortaliça', 'Chicória'),
(100, 'Hortaliça', 'Chuchu'),
(101, 'Hortaliça', 'Couve'),
(102, 'Hortaliça', 'Endívia'),
(103, 'Hortaliça', 'Escorcioneira'),
(104, 'Hortaliça', 'Espinafre'),
(105, 'Hortaliça', 'Fava'),
(106, 'Hortaliça', 'Feijão'),
(107, 'Hortaliça', 'Fruta-pão'),
(108, 'Hortaliça', 'Funcho'),
(109, 'Hortaliça', 'Gengibre'),
(110, 'Hortaliça', 'Guandu'),
(111, 'Hortaliça', 'Inhame'),
(112, 'Hortaliça', 'Jalapeño'),
(113, 'Hortaliça', 'Jícama'),
(114, 'Hortaliça', 'Jiló'),
(115, 'Hortaliça', 'Lentilha'),
(116, 'Hortaliça', 'Malagueta'),
(117, 'Hortaliça', 'Mandioca ou aipim'),
(118, 'Hortaliça', 'Mandioquinha ou batata-baroa'),
(119, 'Hortaliça', 'Maxixe'),
(120, 'Hortaliça', 'Milho'),
(121, 'Hortaliça', 'Nabo'),
(122, 'Hortaliça', 'Ora-pro-nóbis'),
(123, 'Hortaliça', 'Páprica'),
(124, 'Hortaliça', 'Pepino'),
(125, 'Hortaliça', 'Pimentão'),
(126, 'Hortaliça', 'Pimenta-verde e Pimenta-vermelha'),
(127, 'Hortaliça', 'Quiabo'),
(128, 'Hortaliça', 'Rabanete'),
(129, 'Hortaliça', 'Rábano'),
(130, 'Hortaliça', 'Repolho'),
(131, 'Hortaliça', 'Rúcula'),
(132, 'Hortaliça', 'Rutabaga'),
(133, 'Hortaliça', 'Soja'),
(134, 'Hortaliça', 'Taioba '),
(135, 'Hortaliça', 'Taro'),
(136, 'Hortaliça', 'Tomate'),
(137, 'Hortaliça', 'Vagem'),
(138, 'Pecuária', 'Bovinos (Bois e Vacas)'),
(139, 'Pecuária', 'Bubalinos (Búfalos)'),
(140, 'Pecuária', 'Caprinos (Bodes e Cabras)'),
(141, 'Pecuária', 'Codornas'),
(142, 'Pecuária', 'Equinos (Cavalos)'),
(143, 'Pecuária', 'Galináceos (Galinhas, Perus, Patos, Faisões e etc)'),
(144, 'Pecuária', 'Ovinos (Ovelhas e Carneiros)'),
(145, 'Pecuária', 'Suínos (Porcos)'),
(146, 'Piscicultura', 'Peixes (Tambaqui, Pirapitinga, Tilápia e etc)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reuniao`
--

CREATE TABLE `reuniao` (
  `cod` int(10) UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `anexo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_cooperativa`
--

CREATE TABLE `sig_cooperativa` (
  `cod` int(11) NOT NULL,
  `nome_siglas` varchar(20) DEFAULT NULL,
  `nome_completo` varchar(255) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cep` varchar(11) DEFAULT NULL,
  `telefone` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `url_site` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_cooperativa`
--

INSERT INTO `sig_cooperativa` (`cod`, `nome_siglas`, `nome_completo`, `cnpj`, `endereco`, `cep`, `telefone`, `email`, `url_site`) VALUES
(1, 'APARAA', 'Associação dos Pequenos Agricultores Rurais do Assentamento 15 de Agosto', '10.765.135/0001-00', 'Rodovia BR 316 KM 54, Ramal do Itaqui, Km 17, próximo a Vila Trindade (Ramal São João), Zona Rural – Castanhal – PA', 'CEP: 68.745', '(93) 3518-0254', 'aparaa.castanhal@gmail.com', 'www.aparaa.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_despesa`
--

CREATE TABLE `sig_despesa` (
  `cod` int(11) NOT NULL,
  `cod_cooperativa` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` double UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_investimento`
--

CREATE TABLE `sig_investimento` (
  `cod` int(11) NOT NULL,
  `cod_cooperativa` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` double UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_lucro`
--

CREATE TABLE `sig_lucro` (
  `cod` int(11) NOT NULL,
  `cod_cooperativa` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` double UNSIGNED NOT NULL,
  `data` date DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sig_usuario`
--

CREATE TABLE `sig_usuario` (
  `cod_usuario` int(11) NOT NULL,
  `cod_cooperativa` int(11) NOT NULL,
  `nome_usuario` varchar(20) NOT NULL,
  `sobrenome_usuario` varchar(100) NOT NULL,
  `usuario_usuario` varchar(30) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_usuario` varchar(32) NOT NULL,
  `cargo_usuario` varchar(45) NOT NULL,
  `genero_usuario` varchar(10) DEFAULT NULL,
  `nivel_acesso_usuario` int(1) UNSIGNED NOT NULL,
  `status_usuario` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `imagem_usuario` varchar(255) DEFAULT NULL,
  `data_cadastro_usuario` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sig_usuario`
--

INSERT INTO `sig_usuario` (`cod_usuario`, `cod_cooperativa`, `nome_usuario`, `sobrenome_usuario`, `usuario_usuario`, `email_usuario`, `senha_usuario`, `cargo_usuario`, `genero_usuario`, `nivel_acesso_usuario`, `status_usuario`, `imagem_usuario`, `data_cadastro_usuario`) VALUES
<<<<<<< HEAD
(1, 1, 'Joab', 'Torres Alencar', 'joab.alencar', 'joabtorres1508@gmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 'Administrador', 'M', 4, 1, 'uploads/usuarios/314b1f091305587cf5bebcf42702cd8c.jpg', '2022-07-05');
=======
(6, 1, 'Usuário', 'Admin', 'admin', 'bugados01@gmail.com', 'c996d7b593437305e45bf727fc545b4a', 'Administrador', 'M', 4, 1, 'uploads/usuarios/user_masculino.png', '2018-04-05'),
(7, 1, 'Joab', 'Torres', 'joab.alencar', 'joabtorres1508@gmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 'Adminsitrador', 'M', 3, 1, 'uploads/usuarios/28560b3bc12814e80a399460a94723f2.jpg', '2019-04-11'),
(8, 1, 'Joao', 'S. Matos', 'joao.matos', 'joaomatos@gmail.com', '47cafbff7d1c4463bbe7ba972a2b56e3', 'Sócio', 'M', 1, 1, 'uploads/usuarios/user_masculino.png', '2022-03-23');

--
-- Acionadores `sig_usuario`
--
DELIMITER $$
CREATE TRIGGER `tg_remove_usuario` BEFORE DELETE ON `sig_usuario` FOR EACH ROW BEGIN
DELETE FROM sig_cooperado_historico WHERE cod_usuario = OLD.cod_usuario;
END
$$
DELIMITER ;
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `associado`
--
ALTER TABLE `associado`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `associado_carteira`
--
ALTER TABLE `associado_carteira`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `associado_contato`
--
ALTER TABLE `associado_contato`
  ADD PRIMARY KEY (`cod_contato`);

--
-- Índices para tabela `associado_endereco`
--
ALTER TABLE `associado_endereco`
  ADD PRIMARY KEY (`cod_endereco`);

--
-- Índices para tabela `associado_historico`
--
ALTER TABLE `associado_historico`
  ADD PRIMARY KEY (`cod_historico`);

--
-- Índices para tabela `associado_mensalidade`
--
ALTER TABLE `associado_mensalidade`
  ADD PRIMARY KEY (`cod_mensalidade`);

--
-- Índices para tabela `associado_producao`
--
ALTER TABLE `associado_producao`
  ADD PRIMARY KEY (`cod_produto`);

--
-- Índices para tabela `producao`
--
ALTER TABLE `producao`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `reuniao`
--
ALTER TABLE `reuniao`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `sig_cooperativa`
--
ALTER TABLE `sig_cooperativa`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `sig_despesa`
--
ALTER TABLE `sig_despesa`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `sig_investimento`
--
ALTER TABLE `sig_investimento`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `sig_lucro`
--
ALTER TABLE `sig_lucro`
  ADD PRIMARY KEY (`cod`);

--
-- Índices para tabela `sig_usuario`
--
ALTER TABLE `sig_usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD UNIQUE KEY `usuario_usuario_UNIQUE` (`usuario_usuario`),
  ADD UNIQUE KEY `email_usuario_UNIQUE` (`email_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `associado`
--
ALTER TABLE `associado`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `associado_carteira`
--
ALTER TABLE `associado_carteira`
<<<<<<< HEAD
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759

--
-- AUTO_INCREMENT de tabela `associado_contato`
--
ALTER TABLE `associado_contato`
<<<<<<< HEAD
  MODIFY `cod_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
=======
  MODIFY `cod_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759

--
-- AUTO_INCREMENT de tabela `associado_endereco`
--
ALTER TABLE `associado_endereco`
<<<<<<< HEAD
  MODIFY `cod_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
=======
  MODIFY `cod_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759

--
-- AUTO_INCREMENT de tabela `associado_historico`
--
ALTER TABLE `associado_historico`
  MODIFY `cod_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `associado_mensalidade`
--
ALTER TABLE `associado_mensalidade`
  MODIFY `cod_mensalidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `associado_producao`
--
ALTER TABLE `associado_producao`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `producao`
--
ALTER TABLE `producao`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de tabela `reuniao`
--
ALTER TABLE `reuniao`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `sig_cooperativa`
--
ALTER TABLE `sig_cooperativa`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sig_despesa`
--
ALTER TABLE `sig_despesa`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sig_investimento`
--
ALTER TABLE `sig_investimento`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sig_lucro`
--
ALTER TABLE `sig_lucro`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `sig_usuario`
--
ALTER TABLE `sig_usuario`
<<<<<<< HEAD
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
=======
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
>>>>>>> 21c203baf71fe19a182082207e1b7b8d754f4759
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

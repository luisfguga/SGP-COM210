-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 24-Maio-2019 às 16:50
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chokoart`
--
CREATE DATABASE IF NOT EXISTS `chokoart` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `chokoart`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carrinhos`
--

DROP TABLE IF EXISTS `tb_carrinhos`;
CREATE TABLE IF NOT EXISTS `tb_carrinhos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_usuarios_id` int(10) UNSIGNED DEFAULT NULL,
  `sessionid` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `codigo_pedido` varchar(145) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `gateway_pagto` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'BOLETO FACIL',
  `forma_pagto` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `total_parcelas` tinyint(2) UNSIGNED DEFAULT NULL,
  `valor_parcela` decimal(9,2) UNSIGNED DEFAULT NULL,
  `cep_frete` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `modalidade_frete` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `valor_frete` decimal(9,2) UNSIGNED DEFAULT NULL,
  `prazo_frete` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `valor_total` decimal(9,2) UNSIGNED DEFAULT '0.00',
  `estagio_atual` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'ABERTO',
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `data_confirmacao_pagto` datetime DEFAULT NULL,
  `data_conclusao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_pedidos_tb_usuarios1_idx` (`tb_usuarios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_carrinhos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carrinhos_itens`
--

DROP TABLE IF EXISTS `tb_carrinhos_itens`;
CREATE TABLE IF NOT EXISTS `tb_carrinhos_itens` (
  `tb_carrinhos_id` bigint(20) UNSIGNED NOT NULL,
  `tb_produtos_id` int(10) UNSIGNED NOT NULL,
  `qtde` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `valor_unitario` decimal(9,2) UNSIGNED NOT NULL DEFAULT '0.00',
  KEY `fk_tb_pedidos_has_tb_produtos_tb_produtos1_idx` (`tb_produtos_id`),
  KEY `fk_tb_carrinhos_itens_tb_carrinhos1_idx` (`tb_carrinhos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_carrinhos_itens`
--

--
-- Acionadores `tb_carrinhos_itens`
--
DROP TRIGGER IF EXISTS `tb_carrinhos_itens_AFTER_INSERT`;
DELIMITER $$
CREATE TRIGGER `tb_carrinhos_itens_AFTER_INSERT` AFTER INSERT ON `tb_carrinhos_itens` FOR EACH ROW BEGIN
	UPDATE tb_carrinhos SET valor_total = (valor_total + (NEW.qtde*NEW.valor_unitario)) WHERE id = NEW.tb_carrinhos_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categorias`
--

DROP TABLE IF EXISTS `tb_categorias`;
CREATE TABLE IF NOT EXISTS `tb_categorias` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(145) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `destaque` char(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'N',
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_categorias`
--

INSERT INTO `tb_categorias` (`id`, `titulo`, `destaque`, `data_cadastro`) VALUES
(1, 'Diversificado', 'N', '2019-04-16 07:54:49'),
(2, 'Bombons', 'S', '2019-05-03 08:40:35'),
(3, 'Cestas', 'S', '2019-05-03 08:47:04'),
(4, 'Embalagens Especiais', 'S', '2019-05-03 08:53:12'),
(5, 'Licores', 'S', '2019-05-03 08:53:35'),
(6, 'Truffas', 'S', '2019-05-03 09:16:44'),
(7, 'Chocolate Submarino', 'S', '2019-05-03 09:17:10'),
(8, 'Páscoa', 'S', '2019-05-03 09:18:57'),
(9, 'Dia das Mães', 'S', '2019-05-03 09:19:19'),
(10, 'Dia dos Namorados', 'S', '2019-05-03 09:19:36'),
(11, 'Dia dos Pais', NULL, '2019-05-03 09:19:48'),
(12, 'Dia do Professor', NULL, '2019-05-03 09:20:09'),
(13, 'Natal', NULL, '2019-05-03 09:20:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_destaques`
--

DROP TABLE IF EXISTS `tb_destaques`;
CREATE TABLE IF NOT EXISTS `tb_destaques` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `texto_superior` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `texto_superior_secundario` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `texto_inferior` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `texto_inferior_secundario` varchar(165) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `url_destino` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `inicio_exibicao` date DEFAULT NULL,
  `fim_exibicao` date DEFAULT NULL,
  `principal` tinyint(1) UNSIGNED DEFAULT '0',
  `secundario` tinyint(1) UNSIGNED DEFAULT '0',
  `status` char(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '1',
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_destaques`
--

INSERT INTO `tb_destaques` (`id`, `titulo`, `texto_superior`, `texto_superior_secundario`, `texto_inferior`, `texto_inferior_secundario`, `url_destino`, `inicio_exibicao`, `fim_exibicao`, `principal`, `secundario`, `status`, `data_cadastro`) VALUES
(5, 'Destaque 01 -EDITADO', 'DESCONTO 30%', 'DIA DAS MÃES', 'O mais saboroso chocolate', 'O mais saboroso chocolate para você agradecer e encantar quem é importante de verdade.', './produto-1', '2019-04-01', '2019-04-24', 1, 1, '1', '2019-04-25 08:10:39'),
(6, 'Destaque 02', 'PÁSCOA', 'SUA PÁSCOA', 'Celebre com o melhor!', 'Aproveite o mais saboroso chocolate para celebrar as delícias da vida', './produto-2', '2019-04-25', '2019-06-30', 1, 1, '1', '2019-04-25 08:43:10'),
(7, 'Dia das Mães 02', 'Teste', 'testes', 'Texto que servirá para um', 'Texto que servirá para anunciar o produto com uma chamada inteligente.', './produto-3', '2019-04-25', '2019-06-30', NULL, 1, '1', '2019-04-25 09:19:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedores`
--

DROP TABLE IF EXISTS `tb_fornecedores`;
CREATE TABLE IF NOT EXISTS `tb_fornecedores` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nome_fantasia` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cnpj` varchar(19) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `inscricao_estadual` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `inscricao_municipal` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cep` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bairro` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cidade` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `estado` char(2) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `endereco` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `complemento` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `numero` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `contato` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `telefone` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `celular` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `observacoes` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_fornecedores`
--

INSERT INTO `tb_fornecedores` (`id`, `razao_social`, `nome_fantasia`, `cnpj`, `inscricao_estadual`, `inscricao_municipal`, `cep`, `bairro`, `cidade`, `estado`, `endereco`, `complemento`, `numero`, `contato`, `telefone`, `celular`, `email`, `observacoes`) VALUES
(1, 'ADAIR JOSE ROSSATTO COMMODO 295982808096', 'AJRC SOLUÇÕES', '24.926.851/0001-28', 'ISENTO', '357159852', '12.500-000', 'Bom Jardim II', 'GUARATINGUETÁ', 'SP', 'Algum endereço nome de rua, 123', '', '497', 'ADAIR', '', '(12) 99139-7482', 'henrique@chokoart.com.br', 'TEXTO TESTE DE OBSERVAÇÕES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lista_desejos`
--

DROP TABLE IF EXISTS `tb_lista_desejos`;
CREATE TABLE IF NOT EXISTS `tb_lista_desejos` (
  `tb_usuarios_id` int(10) UNSIGNED NOT NULL,
  `produtos_ids` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`tb_usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_lista_desejos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE IF NOT EXISTS `tb_login` (
  `id` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_login`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

DROP TABLE IF EXISTS `tb_produtos`;
CREATE TABLE IF NOT EXISTS `tb_produtos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tb_fornecedores_id` int(10) UNSIGNED NOT NULL,
  `tb_usuarios_id` int(10) UNSIGNED NOT NULL,
  `tb_categorias_id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `qtde_atual` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `qtde_ideal` tinyint(4) UNSIGNED NOT NULL DEFAULT '0',
  `peso` decimal(5,2) UNSIGNED NOT NULL DEFAULT '13.50',
  `unidade_medida` enum('Kg','g') NOT NULL DEFAULT 'g',
  `preco_custo` decimal(7,2) UNSIGNED NOT NULL,
  `preco_venda` decimal(7,2) UNSIGNED NOT NULL,
  `observacoes` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `descritivo` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`,`tb_fornecedores_id`,`tb_usuarios_id`,`tb_categorias_id`),
  KEY `fk_tb_produtos_tb_fornecedores_idx` (`tb_fornecedores_id`),
  KEY `fk_tb_produtos_tb_usuarios1_idx` (`tb_usuarios_id`),
  KEY `fk_tb_produtos_tb_categorias1_idx` (`tb_categorias_id`),
  KEY `idx_tbs_usuarios_categorias_fornecedores` (`tb_categorias_id`,`tb_fornecedores_id`,`tb_usuarios_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `tb_fornecedores_id`, `tb_usuarios_id`, `tb_categorias_id`, `titulo`, `qtde_atual`, `qtde_ideal`, `peso`, `unidade_medida`, `preco_custo`, `preco_venda`, `observacoes`, `descritivo`, `data_cadastro`, `status`) VALUES
(1, 1, 1, 1, 'PRODUTO 01', 200, 5, '13.50', 'g', '5.55', '15.00', 'TEXTO OBSERVAÇÕES', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. \r\n\r\nAll the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2019-04-17 11:15:52', 'A'),
(2, 1, 1, 6, 'TRUFINHA LACREME', 197, 5, '13.50', 'g', '2.50', '10.00', '', 'Um gosto inesperado: você fecha os olhos de tão bom. LaCreme é um chocolate que derrete na boca. Aqui, uma delicada trufinha com nosso delicioso chocolate branco, com +Leite, que te fará esquecer o mundo ao seu redor e querer comer mais e mais.\r\n\r\nIngredientes: Recheio trufa branca (chocolate branco, creme vegetal, extrato de conhaque, extrato de malte, umectante glicerina, álcool de cereais, enzima invertase e conservante sorbato de potássio) e chocolate branco (açúcar, manteiga de cacau, leite integral em pó, soro de leite em pó, creme de leite em pó, extrato de malte, emulsificantes lecitina de soja e ésteres de ácido ricinoleico interesterificados com poliglicerol e aromatizante).\r\n\r\nALÉRGICOS: CONTÉM LEITE DE VACA E DERIVADOS DE LEITE DE VACA, CEVADA E SOJA. PODE CONTER: OVOS E DERIVADOS, AMENDOIM, AMÊNDOA, AVELÃ, \r\nCASTANHA-DE-CAJU, CASTANHA-DO-BRASIL, NOZES, PISTACHE E DERIVADOS DE TRIGO. &#34;', '2019-04-29 14:19:32', 'A'),
(3, 1, 1, 2, 'TABLETE RECHEADO PETIT GATEAU', 200, 5, '100.00', 'g', '2.00', '5.00', '', 'Um gosto inesperado: você fecha os olhos de tão bom. LaCreme é um chocolate que derrete na boca. Aqui, uma experiência inesquecível para os amantes do chocolate branco, que fará você se deliciar a cada mordida, a cada pedaço.\r\n\r\nIngredientes: açúcar, manteiga de cacau, leite integral em pó, soro de leite em pó, creme de leite em pó, extrato de malte, emulsificantes lecitina de soja e ésteres de ácido ricinoleico interesterificados com poliglicerol e aromatizante.', '2019-04-29 14:43:38', 'A'),
(4, 1, 1, 1, 'PRECIOSIDADES SORTIDO', 10, 5, '250.00', 'g', '25.00', '35.00', '', 'Um dos nossos maiores clássicos, a caixa Preciosidades vem com deliciosos bombons de chocolate ao leite recheados com trufa tradicional. Um presente especial para transformar o dia de quem você mais gosta.\r\n\r\nIngredientes: chocolate ao leite (açúcar, leite integral em pó, manteiga de cacau, massa de cacau, creme de leite em pó, emulsificantes lecitina de soja e ésteres de ácido ricinoleico interesterificados com poliglicerol e aromatizante) e recheio trufa de chocolate ao leite (chocolate ao leite, creme culinário, extrato de conhaque, enzima invertase e conservante sorbato de potássio).\r\n\r\nALÉRGICOS: CONTÉM LEITE DE VACA E DERIVADOS DE SOJA E DE LEITE DE VACA. PODE CONTER: OVO, AMENDOIM, AMÊNDOA, AVELÃ, CASTANHA-DE-CAJU, CASTANHA-DO-BRASIL, NOZES, PISTACHE E DERIVADOS DE TRIGO.	\r\nESTE PRODUTO PODE TER EFEITO LAXATIVO. CONSUMIR PREFERENCIALMENTE SOB ORIENTAÇÃO MÉDICA OU NUTRICIONAL. CONTÉM OS AÇÚCARES NATURALMENTE PRESENTES NAS MATÉRIAS-PRIMAS UTILIZADAS EM SUA FORMULAÇÃO.\r\n\r\nBombons de chocolate ao leite com recheio de trufa de chocolate ao leite.\r\nPorção de 25g (2 unidades)\r\nQtde por porção\r\nValor Energético	125Kcal = 525Kj\r\nCarboidratos	11g\r\nProteínas	1,5g\r\nGorduras totais	8,1g\r\nGorduras saturadas	4,7g\r\nGorduras trans	0,2g\r\nFibra alimentar	0g\r\nSódio	20mg', '2019-04-29 17:18:18', 'A'),
(5, 1, 1, 6, 'BENDITO CACAO', 200, 10, '13.50', 'g', '15.00', '5.00', '', 'Ingredientes:\r\nTrufa de chocolate amargo recheada com trufa tradicional:\r\nChocolate meio amargo (açúcar, massa de cacau, manteiga de cacau, emulsificante lecitina de soja e aromatizante), chocolate amargo e recheio trufa tradicional (chocolate ao leite (açúcar, leite integral em pó, manteiga de cacau, massa de cacau, creme de leite em pó, emulsificantes lecitina de soja e ésteres de ácido ricinoleico interesterificados com poliglicerol e aromatizante), creme vegetal, extrato de conhaque, umectante glicerina, enzima invertase e conservante sorbato de potássio). \r\n\r\nTrufa de chocolate amargo sabor laranja:\r\nChocolate amargo (massa de cacau, açúcar, manteiga de cacau, cacau em pó, emulsificante lecitina de soja e aromatizante), recheio de trufa sabor laranja (chocolate meio amargo, creme vegetal, açúcar invertido, extrato de conhaque, álcool de cereais, umectante glicerina bidestilada, conservantes sorbitol e sorbato de potássio e aromatizante) cobertura de chocolate amargo, açúcar cristal e corantes artificiais amarelo tartrazina e vermelho 40. \r\n\r\nTrufa de chocolate amargo sabor caramelo com sal:\r\nChocolate meio amargo (açúcar, massa de cacau, manteiga de cacau, emulsificante lecitina de soja e aromatizante), recheio de trufa sabor caramelo (chocolate branco, creme vegetal, chocolate ao leite, extrato de conhaque, umectante glicerina, sal, extrato de malte, álcool de cereais, conservante sorbato de potássio, enzima invertase e aromatizante), chocolate amargo, chocolate ao leite e chocolate branco.\r\n\r\nAlérgicos:\r\nContém leite de vaca, aveia e derivados de cevada, soja e de leite de vaca. Pode conter: ovos e derivados, amendoim, amêndoa, avelã, castanha-de-caju, castanha-do-brasil, nozes, pistache e derivados de trigo.\r\n\r\nbombom, bombons\r\n\r\n \r\nInformação nutricional:\r\nPorção de 25g (02 unidades)\r\n(*) % Valores Diários de referência com base em uma dieta de 2.000kcal ou 8.400kJ. Seus valores diários podem ser maiores ou menores dependendo de suas necessidades energéticas. (**) VD não estabelecido.', '2019-05-03 15:58:16', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(90) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `data_nascto` date DEFAULT NULL,
  `sexo` char(1) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `cpf` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `cep` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `estado` char(2) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `cidade` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `bairro` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `complemento` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `numero` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `telefone` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `celular` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `funcionario` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `cliente` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `data_admissao` date DEFAULT NULL,
  `inicio_ferias` date DEFAULT NULL,
  `termino_ferias` date DEFAULT NULL,
  `salario` decimal(7,2) UNSIGNED DEFAULT '0.00',
  `tipo_pagto` varchar(45) DEFAULT NULL,
  `banco` varchar(145) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `agencia_bancaria` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `num_conta_bancaria` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `impostos` decimal(7,2) UNSIGNED DEFAULT '0.00',
  `vale_transporte` decimal(7,2) UNSIGNED DEFAULT '0.00',
  `observacoes` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `data_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nome`, `login`, `email`, `senha`, `status`, `data_nascto`, `sexo`, `cpf`, `cep`, `estado`, `cidade`, `bairro`, `endereco`, `complemento`, `numero`, `telefone`, `celular`, `admin`, `funcionario`, `cliente`, `data_admissao`, `inicio_ferias`, `termino_ferias`, `salario`, `tipo_pagto`, `banco`, `agencia_bancaria`, `num_conta_bancaria`, `impostos`, `vale_transporte`, `observacoes`, `data_cadastro`) VALUES
(1, 'Henrique Rezende', 'henrique', 'henrique@chokoart.com.br', '$2y$10$xK3yf981EI2nBfvsw8JEJOC6e88wKh52SkXmBX1qeKZ3GqE9UAjlO', 'A', '2000-11-11', 'M', '123456789', '12.509-010', 'SP', 'Cachoeira Paulista', 'Bairro', 'Algum endereço nome de rua', '', '123', '12991397482', '', 1, 1, 1, '2019-04-08', '2020-04-08', '2020-05-08', '6500.00', 'ESPECIE', 'SANTANDER', '1235', '0102345', '120.00', '90.00', '', NULL),
(2, 'Adair José Rossatto Commodo', 'ajrc', 'faleconosco@ajrc.com.br', '$2y$10$dmqeeeKcNOfLe4SxT5PVd.th8C895ZjGonM2sY6Hgr3RjrC4m7Bo6', 'A', '1980-05-16', 'M', 'Commodo', '12508010', 'SP', 'Guaratinguetá', 'Bom Jardim II', 'Estrada Presidente Tancredo Neves, 497', '', '497', '12991397482', '(12) 99139-7482', 1, 1, 1, '1111-11-11', '2222-02-22', '2223-02-22', '6500.00', 'DEPOSITO', 'SANTANDER', '1235', '0101005478', '0.00', '0.00', '', NULL),
(3, 'Ajrc Fake', 'ajrcfake', 'ajrcfake@gmail.com', '$2y$10$Im6BKmG5cYyD284XlAKcQO3T.G8C3GIsqitu1xRe1XVLI/64DeV.m', 'A', '1980-05-16', 'M', '89133630038', '50.010-010', 'PE', 'Recife', 'Santo Antônio', 'Rua Siqueira Campos', '', '123', '', '(12) 99139-7482', 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-21 07:51:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_listar_itens_carrinho`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_listar_itens_carrinho`;
CREATE TABLE IF NOT EXISTS `vw_listar_itens_carrinho` (
`carrinho_id` bigint(20) unsigned
,`produto_id` int(10) unsigned
,`produto_titulo` varchar(255)
,`produto_peso` decimal(5,2) unsigned
,`produto_unidade_medida` varchar(2)
,`estoque` int(4) unsigned
,`qtde_item` int(10) unsigned
,`preco_item` decimal(9,2) unsigned
,`tb_usuarios_id` int(10) unsigned
,`sessionid` varchar(255)
,`forma_pagto` varchar(45)
,`cep_frete` varchar(10)
,`modalidade_frete` varchar(10)
,`valor_frete` decimal(9,2) unsigned
,`valor_total` decimal(9,2) unsigned
,`estagio_atual` varchar(45)
,`data_cadastro` datetime
,`data_conclusao` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_produtos`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_produtos`;
CREATE TABLE IF NOT EXISTS `vw_produtos` (
`id` int(10) unsigned
,`categoria_id` int(10) unsigned
,`titulo` varchar(255)
,`qtde_atual` tinyint(4) unsigned
,`qtde_ideal` tinyint(4) unsigned
,`peso` decimal(5,2) unsigned
,`unidade_medida` enum('Kg','g')
,`preco_custo` decimal(7,2) unsigned
,`preco_venda` decimal(7,2) unsigned
,`observacoes` varchar(255)
,`descritivo` longtext
,`data_cadastro` datetime
,`status` char(1)
,`categoria` varchar(145)
,`fornecedor` varchar(200)
,`cadastrante` varchar(255)
,`lucro` decimal(8,2) unsigned
,`situacao` varchar(12)
,`custo_estoque` decimal(11,2) unsigned
,`lucro_estoque` decimal(12,2) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_total_produtos_por_categoria`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vw_total_produtos_por_categoria`;
CREATE TABLE IF NOT EXISTS `vw_total_produtos_por_categoria` (
`tb_categorias_id` int(10) unsigned
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_listar_itens_carrinho`
--
DROP TABLE IF EXISTS `vw_listar_itens_carrinho`;

CREATE VIEW `vw_listar_itens_carrinho`  AS  select `ci`.`tb_carrinhos_id` AS `carrinho_id`,`ci`.`tb_produtos_id` AS `produto_id`,(select `tb_produtos`.`titulo` from `tb_produtos` where (`tb_produtos`.`id` = `ci`.`tb_produtos_id`)) AS `produto_titulo`,(select `tb_produtos`.`peso` from `tb_produtos` where (`tb_produtos`.`id` = `ci`.`tb_produtos_id`)) AS `produto_peso`,(select `tb_produtos`.`unidade_medida` from `tb_produtos` where (`tb_produtos`.`id` = `ci`.`tb_produtos_id`)) AS `produto_unidade_medida`,(select `tb_produtos`.`qtde_atual` from `tb_produtos` where (`tb_produtos`.`id` = `ci`.`tb_produtos_id`)) AS `estoque`,`ci`.`qtde` AS `qtde_item`,`ci`.`valor_unitario` AS `preco_item`,`c`.`tb_usuarios_id` AS `tb_usuarios_id`,`c`.`sessionid` AS `sessionid`,`c`.`forma_pagto` AS `forma_pagto`,`c`.`cep_frete` AS `cep_frete`,`c`.`modalidade_frete` AS `modalidade_frete`,`c`.`valor_frete` AS `valor_frete`,`c`.`valor_total` AS `valor_total`,`c`.`estagio_atual` AS `estagio_atual`,`c`.`data_cadastro` AS `data_cadastro`,`c`.`data_conclusao` AS `data_conclusao` from (`tb_carrinhos_itens` `ci` left join `tb_carrinhos` `c` on((`ci`.`tb_carrinhos_id` = `c`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_produtos`
--
DROP TABLE IF EXISTS `vw_produtos`;

CREATE VIEW `vw_produtos`  AS  select `p`.`id` AS `id`,`p`.`tb_categorias_id` AS `categoria_id`,`p`.`titulo` AS `titulo`,`p`.`qtde_atual` AS `qtde_atual`,`p`.`qtde_ideal` AS `qtde_ideal`,`p`.`peso` AS `peso`,`p`.`unidade_medida` AS `unidade_medida`,`p`.`preco_custo` AS `preco_custo`,`p`.`preco_venda` AS `preco_venda`,`p`.`observacoes` AS `observacoes`,`p`.`descritivo` AS `descritivo`,`p`.`data_cadastro` AS `data_cadastro`,`p`.`status` AS `status`,(select `tb_categorias`.`titulo` from `tb_categorias` where (`tb_categorias`.`id` = `p`.`tb_categorias_id`)) AS `categoria`,(select `tb_fornecedores`.`nome_fantasia` from `tb_fornecedores` where (`tb_fornecedores`.`id` = `p`.`tb_fornecedores_id`)) AS `fornecedor`,(select `tb_usuarios`.`nome` from `tb_usuarios` where (`tb_usuarios`.`id` = `p`.`tb_usuarios_id`)) AS `cadastrante`,(select (`p`.`preco_venda` - `p`.`preco_custo`)) AS `lucro`,(select if((`p`.`qtde_atual` > `p`.`qtde_ideal`),'SUFICIENTE','INSUFICIENTE')) AS `situacao`,(select (`p`.`qtde_atual` * `p`.`preco_custo`)) AS `custo_estoque`,(select (`p`.`qtde_atual` * (`p`.`preco_venda` - `p`.`preco_custo`))) AS `lucro_estoque` from `tb_produtos` `p` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_total_produtos_por_categoria`
--
DROP TABLE IF EXISTS `vw_total_produtos_por_categoria`;

CREATE VIEW `vw_total_produtos_por_categoria`  AS  select `tb_produtos`.`tb_categorias_id` AS `tb_categorias_id`,count(`tb_produtos`.`id`) AS `total` from `tb_produtos` group by `tb_produtos`.`tb_categorias_id` ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_carrinhos`
--
ALTER TABLE `tb_carrinhos`
  ADD CONSTRAINT `fk_tb_pedidos_tb_usuarios1` FOREIGN KEY (`tb_usuarios_id`) REFERENCES `tb_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_carrinhos_itens`
--
ALTER TABLE `tb_carrinhos_itens`
  ADD CONSTRAINT `fk_tb_carrinhos_itens_tb_carrinhos1` FOREIGN KEY (`tb_carrinhos_id`) REFERENCES `tb_carrinhos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_pedidos_has_tb_produtos_tb_produtos1` FOREIGN KEY (`tb_produtos_id`) REFERENCES `tb_produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_lista_desejos`
--
ALTER TABLE `tb_lista_desejos`
  ADD CONSTRAINT `fk_tb_lista_desejos_tb_usuarios1` FOREIGN KEY (`tb_usuarios_id`) REFERENCES `tb_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD CONSTRAINT `fk_tb_produtos_tb_categorias1` FOREIGN KEY (`tb_categorias_id`) REFERENCES `tb_categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_produtos_tb_fornecedores` FOREIGN KEY (`tb_fornecedores_id`) REFERENCES `tb_fornecedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_produtos_tb_usuarios1` FOREIGN KEY (`tb_usuarios_id`) REFERENCES `tb_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

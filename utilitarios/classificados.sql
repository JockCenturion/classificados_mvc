-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Jan-2019 às 16:05
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
-- Database: `classificados`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valor` float DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `id_categoria`, `titulo`, `descricao`, `valor`, `estado`) VALUES
(5, 1, 2, 'Os Axiomas de Zurique - Os Conselhos Dos Banqueiros SuÃ­Ã§os Para Orientar Seus Investimentos', 'O sistema bancÃ¡rio suÃ­Ã§o Ã© um dos mais ricos do mundo. MilionÃ¡rios de todos os continentes aplicam no paÃ­s nÃ£o sÃ³ pelo anonimato oferecido por suas instituiÃ§Ãµes financeiras. Investidores que sabem como poucos ganhar dinheiro por meio de mÃ©todos e princÃ­pios que funcionam em qualquer lugar, sob quaisquer condiÃ§Ãµes econÃ´micas. Max Gunther revela os segredos de um grupo exclusivo de homens que, depois da Segunda Guerra Mundial, resolveu ganhar dinheiro investindo em vÃ¡rias frentes, de aÃ§Ãµes a imÃ³veis, de commodities a moedas estrangeiras. Ganharam muito e transformaram a SuÃ­Ã§a em um dos paÃ­ses mais abastados. Neste livro, o autor apresenta as regras e princÃ­pios infalÃ­veis que esses banqueiros estabeleceram para diminuir riscos e aumentar lucros. Essas regras preciosas estÃ£o divididas em 12 Axiomas principais e 16 secundÃ¡rios, que devem ser seguidos em busca de especulaÃ§Ãµes de sucesso. ', 55.6, 1),
(6, 1, 2, 'Fundamentos de matemÃ¡tica elementar', 'Ã‰ um livro de matemÃ¡tica novo', 150, 2),
(7, 1, 2, 'livro de historia 8 ano', 'Livro de histÃ³ria de segunda mÃ£o', 125.35, 1),
(8, 1, 2, 'livro de portugues 8 ano', 'Livro de portuguÃªs razoavelmente bom.', 136.29, 0),
(9, 1, 2, 'livro de geografia 8 ano', 'Livro de geografia do 8 ano ', 140.25, 2),
(10, 1, 2, 'Livro de fÃ­sica', 'Livro bem conservado', 32, 2),
(13, 1, 2, 'HARDWARE NA PRÃTICA, 4Âª EDIÃ‡ÃƒO', 'Domine seu micro, e nÃ£o seja dominado por ele! Este livro traz todas as informaÃ§Ãµes para que o usuÃ¡rio seja capaz de montar e configurar sozinho seu micro, alÃ©m de fazer pequenos reparos. Conhecendo todas as peÃ§as o leitor pode, alÃ©m de montar seu micro, fazer instalaÃ§Ãµes de memÃ³rias, processadores, discos rÃ­gidos, placas de expansÃ£o, configurar jumpers, usar o CMOS Setup, atualizaÃ§Ã£o de drivers e diversas configuraÃ§Ãµes, obter maior desempenho e funcionalidade. Se vocÃª jÃ¡ tem um micro pronto, aprenda a melhorÃ¡-lo atravÃ©s de upgrades. Com linguagem simples, objetiva, didÃ¡tica e precisa, o livro Ã© indicado para usuÃ¡rios finais e tambÃ©m para estudantes e tÃ©cnicos de informÃ¡tica.', 329.98, 2),
(15, 1, 1, 'MemÃ³rias PÃ³stumas de BrÃ¡s Cubas', 'MemÃ³rias PÃ³stumas de BrÃ¡s Cubas Ã© um romance escrito por Machado de Assis, desenvolvido em princÃ­pio como folhetim, de marÃ§o a dezembro de 1881, na Revista Brasileira, para, no ano seguinte, ser publicado como livro, pela entÃ£o Tipografia Nacional.', 55.99, 2),
(16, 1, 1, 'A Marca de uma LÃ¡grima', 'Ã‰ uma livre adaptaÃ§Ã£o da obra Cyrano de Bergerac, de Edmond Rostand. O livro fala da vida de Isabel apÃ³s ir numa festa de aniversario de seu primo Cristiano e se apaixonar por ele, apesar de ele gostar de sua amiga Rosana. O livro trata de como Isabel lida com isso e como ela ajuda os dois lados desse amor escrevendo poemas para trocarem entre si, mesmo contra sua vontade.Cristiano descobre que Isabel escrevia as cartas por Rosana', 35.99, 2),
(17, 3, 1, 'Alice no PaÃ­s das Maravilhas', 'As Aventuras de Alice no PaÃ­s das Maravilhas, frequentemente abreviado para Alice no PaÃ­s das Maravilhas Ã© a obra infantil mais conhecida de Charles Lutwidge Dodgson, publicada a 4 de julho de 1865 sob o pseudÃ´nimo de Lewis Carroll. Ã‰ uma das obras mais cÃ©lebres do gÃªnero literÃ¡rio nonsense.', 76.99, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios_imagens`
--

DROP TABLE IF EXISTS `anuncios_imagens`;
CREATE TABLE IF NOT EXISTS `anuncios_imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anuncios` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios_imagens`
--

INSERT INTO `anuncios_imagens` (`id`, `id_anuncios`, `url`) VALUES
(79, 13, '119204a151b0ca9cfeb52db3e51e5857.jpg'),
(77, 17, '0c82f76ae4326d91f0e9b0f8131e18ce.jpg'),
(78, 17, 'a083de2af92683bdb1b91a9665726734.jpg'),
(71, 15, '1715b65e6612d5b59b37f8c32b120f2d.jpg'),
(69, 16, '4e74dbaba96ecaaa218bff891b5d1556.jpg'),
(65, 16, '6a748bc5c222da5c37d53e87f9510c87.jpg'),
(72, 15, 'c80783d0c38670935534b984f8f8cd6e.jpg'),
(67, 16, '17cf2993ebdd368cc516dd78d83c098b.jpg'),
(73, 15, '5e7d3e9a30a5750dd964b23074ae411f.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Literatura'),
(2, 'Técnicos Profissionalizantes'),
(3, 'Moda'),
(4, 'Periódicos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favoritos`
--

DROP TABLE IF EXISTS `favoritos`;
CREATE TABLE IF NOT EXISTS `favoritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_anuncio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `favoritos`
--

INSERT INTO `favoritos` (`id`, `id_anuncio`, `id_usuario`) VALUES
(9, 17, 1),
(10, 15, 3),
(11, 13, 3),
(6, 16, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `telefone` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(1, 'Jock', 'jock9613@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '(98) 3231-4545'),
(2, 'Pedro', 'pedro96@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '(98) 3237-1358'),
(3, 'user', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '(99) 9999-9999'),
(4, 'user2', 'user2@gmail.com', '202cb962ac59075b964b07152d234b70', ''),
(5, 'user3', 'user3@mail.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
(6, 'user4', 'user4@mail.com', '202cb962ac59075b964b07152d234b70', ''),
(7, 'user5', 'user5@mail.com', '202cb962ac59075b964b07152d234b70', ''),
(8, 'user6', 'user6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
(9, 'user20', 'user20@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '(99) 9999-9999');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 02-Jul-2021 às 23:32
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id17172656_teste_backend`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE `news` (
  `titulo` varchar(200) NOT NULL,
  `data` date DEFAULT NULL,
  `resumo` varchar(300) DEFAULT NULL,
  `conteudo` varchar(400) DEFAULT NULL,
  `destaque` bit(3) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`titulo`, `data`, `resumo`, `conteudo`, `destaque`, `imagem`) VALUES
('Asfalto cede, abre cratera enorme em importante via da cidade e choca moradores.', '2017-03-10', 'Asfalto cedeu durante a madrugada e impediu completamente o fluxo de trânsito na região. Moradores ficaram perplexos com o estrago: \"Eu to passada, chocada... Meu Deus... Jesus... To vendo pela primeira vez\".', NULL, b'001', './imagens/passada.jpg'),
('Caetano estaciona carro no Leblon nesta quinta-feira', '2011-03-10', 'Caetano é flagrado estacionando seu carro em plena tarde desta quinta-feira num estacionamento, no Leblon, no Rio de Janeiro. \"É verdade, sim, eu vi ele estacionando\" afirma pedreste que estava presente na hora que Caetano estacionou seu carro no Leblon.', NULL, b'001', './imagens/caetano.jpg'),
('Inverno rigoroso de 24° assusta moradores de Niterói: \"Não esperávamos  um clima tão adverso\", diz moradora.', '2021-06-09', 'Onda de frio atinge o estado do Rio de Janeiro nesta quarta-feira. Termômetros em todo estado registraram mínima de 23° e moradores se queixam: \"Muito frio mesmo\"', NULL, b'001', './imagens/niteroi.jpg'),
('news 10', '1973-02-10', 'resumo 10', 'conteudo 10', NULL, NULL),
('news 11', '2000-03-18', 'resumo 11', 'conteudo 11', NULL, NULL),
('news 12', '1996-12-02', 'resumo 12', 'conteudo 12', NULL, NULL),
('news 13', '1991-06-30', 'resumo 13', 'conteudo 13', NULL, NULL),
('news 14', '2001-12-31', 'resumo 14', 'conteudo 14', NULL, NULL),
('news 15', '2014-10-26', 'resumo 15', 'conteudo 15', NULL, NULL),
('news 16', '2011-06-06', 'resumo 16', 'conteudo 16', NULL, NULL),
('news 17', '1980-01-11', 'resumo 17', 'conteudo 17', NULL, NULL),
('news 18', '1993-05-22', 'resumo 18', 'conteudo 18', NULL, NULL),
('news 19', '1974-06-29', 'resumo 19', 'conteudo 19', NULL, NULL),
('news 20', '1974-10-19', 'resumo 20', 'conteudo 20', NULL, NULL),
('news 21', '2007-06-13', 'resumo 21', 'conteudo 21', NULL, NULL),
('news 22', '1982-05-18', 'resumo 22', 'conteudo 22', NULL, NULL),
('news 3', '1974-11-26', 'resumo 3', 'conteudo 3', NULL, NULL),
('news 4', '1976-06-19', 'resumo 4', 'conteudo 4', NULL, NULL),
('news 5', '2007-07-17', 'resumo 5', 'conteudo 5', NULL, NULL),
('news 6', '1985-11-30', 'resumo 6', 'conteudo 6', NULL, NULL),
('news 7', '2015-03-14', 'resumo 7', 'conteudo 7', NULL, NULL),
('news 8', '1988-06-27', 'resumo 8', 'conteudo 8', NULL, NULL),
('news 9', '1973-06-07', 'resumo 9', 'conteudo 9', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `email` varchar(100) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `end` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `senha` varchar(100) NOT NULL,
  `admin` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`email`, `nome`, `cpf`, `end`, `cidade`, `uf`, `senha`, `admin`) VALUES
('admin', NULL, NULL, NULL, NULL, NULL, '12345', b'1'),
('alice@gmail.com', 'Alice', '11111111111', 'White Queen\'s Castle', 'Wonderland', 'XX', 'blablabla', NULL),
('bugabuga@gmail.com', 'bugabuga', '11111111111', 'bugabuga', 'bugabuga', 'rj', 'buga', NULL),
('gaga@gmail.com', 'Gaga', '11111111111', 'Gaga', 'Gaga', 'Ga', 'gaga', NULL),
('nathan@gmail.com', 'nathan', '65432155555', 'blebleble', 'digdigjoy', 'xx', 'blablabla', b'0'),
('xororo@gmail.com', 'xitaozinho xororo', '11111111111', 'beto carreiro world', 'floripa', 'SC', '123456', NULL),
('xspb@gmail.com', 'Xuxa Meneghel', '22222222222', 'Nave da Shusha', 'Projac', 'SC', 'xxxxxx', b'0'),
('xxx10@gmail.com', 'blablabla', '74085892560', 'blebleble', 'bliblibli', 'RJ', 'xxx10@gmail.com', NULL),
('xxx11@gmail.com', 'blablabla', '67781432479', 'blebleble', 'bliblibli', 'RJ', 'xxx11@gmail.com', NULL),
('xxx12@gmail.com', 'blablabla', '27445731348', 'blebleble', 'bliblibli', 'RJ', 'xxx12@gmail.com', NULL),
('xxx13@gmail.com', 'blablabla', '48191807667', 'blebleble', 'bliblibli', 'RJ', 'xxx13@gmail.com', NULL),
('xxx14@gmail.com', 'blablabla', '52576297636', 'blebleble', 'bliblibli', 'RJ', 'xxx14@gmail.com', NULL),
('xxx15@gmail.com', 'blablabla', '79154413619', 'blebleble', 'bliblibli', 'RJ', 'xxx15@gmail.com', NULL),
('xxx16@gmail.com', 'blablabla', '13044623407', 'blebleble', 'bliblibli', 'RJ', 'xxx16@gmail.com', NULL),
('xxx17@gmail.com', 'blablabla', '90936093684', 'blebleble', 'bliblibli', 'RJ', 'xxx17@gmail.com', NULL),
('xxx18@gmail.com', 'blablabla', '29395847047', 'blebleble', 'bliblibli', 'RJ', 'xxx18@gmail.com', NULL),
('xxx19@gmail.com', 'blablabla', '65898156340', 'blebleble', 'bliblibli', 'RJ', 'xxx19@gmail.com', NULL),
('xxx20@gmail.com', 'blablabla', '47626658237', 'blebleble', 'bliblibli', 'RJ', 'xxx20@gmail.com', NULL),
('xxx21@gmail.com', 'blablabla', '48694833680', 'blebleble', 'bliblibli', 'RJ', 'xxx21@gmail.com', NULL),
('xxx22@gmail.com', 'blablabla', '16340879442', 'blebleble', 'bliblibli', 'RJ', 'xxx22@gmail.com', NULL),
('xxx23@gmail.com', 'blablabla', '27003407272', 'blebleble', 'bliblibli', 'RJ', 'xxx23@gmail.com', NULL),
('xxx24@gmail.com', 'blablabla', '36256646077', 'blebleble', 'bliblibli', 'RJ', 'xxx24@gmail.com', NULL),
('xxx5@gmail.com', 'blablabla', '21427865502', 'blebleble', 'bliblibli', 'RJ', 'xxx5@gmail.com', NULL),
('xxx6@gmail.com', 'blablabla', '96840288699', 'blebleble', 'bliblibli', 'RJ', 'xxx6@gmail.com', NULL),
('xxx7@gmail.com', 'blablabla', '18416594368', 'blebleble', 'bliblibli', 'RJ', 'xxx7@gmail.com', NULL),
('xxx8@gmail.com', 'blablabla', '40198128918', 'blebleble', 'bliblibli', 'RJ', 'xxx8@gmail.com', NULL),
('xxx9@gmail.com', 'blablabla', '65936555587', 'blebleble', 'bliblibli', 'RJ', 'xxx9@gmail.com', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`titulo`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

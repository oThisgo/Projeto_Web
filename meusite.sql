-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2023 às 14:49
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meusite`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `userID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`userID`, `nome`, `usuario`, `email`, `senha`, `imagem`, `data`) VALUES
(4, 'Vitor Balde', 'vitor_balde', 'vitorbalde@gmail.com', 'ec67558b8573e2c5fc2f3d10bc2b3840d8850721', '04-12-2023_01-43-30_Raccoon_in_Central_Park_(35264).jpg', '2023-12-03'),
(5, 'Henry Santos', 'henry_santos', 'henry@gmail.com', 'f2322817ca162253c324f0ed84c9c105ba15c1f2', '04-12-2023_01-47-39_raccoon-grass_3x4.png', '2023-12-03'),
(6, 'Thiago Schiedeck Dias', 'oThisgo', 'thiago@gmail.com', '156702288e53e328ed79c58b10e4a64f7341e3a8', '04-12-2023_01-38-23_vlcsnap_2023_12_01_10h37m31s394.0.jpg', '2023-12-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamentos`
--

CREATE TABLE `departamentos` (
  `DepartamentoID` int(11) NOT NULL,
  `departamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `departamentos`
--

INSERT INTO `departamentos` (`DepartamentoID`, `departamento`) VALUES
(1, 'PC'),
(2, 'CONSOLE'),
(3, 'MONSTER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `ProdutoID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `imagem2` varchar(255) NOT NULL,
  `imagem3` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `secao` varchar(255) NOT NULL,
  `departamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`ProdutoID`, `nome`, `preco`, `imagem`, `imagem2`, `imagem3`, `descricao`, `secao`, `departamento`) VALUES
(1, 'Egernético Monster Java Programação', 1583.25, 'monsterjava.jpg', 'monsterjava2.jpg', 'monsterjava3.jpg', 'COFFEE DONE THE MONSTER WAY: No foam, extra hot, half-caf, no-whip, soy latte. Enough of the coffee house BS already. It’s time to get out of the line and step up to what’s next. Coffee done the Monster way, wide open, with a take no prisoners attitude and the experience and know-how to back it up KILLER FLAVOR: Mean Bean Java Monster premium coffee and cream, brewed up with a killer Vanilla Bean flavor, supercharged with the Monster energy blend and 188mg of caffeine per can. Monster Java Mean Bean, Coffee + Energy Drink, 15 Fl Oz.', 'OFERTAS', 'MONSTER'),
(2, 'Console de videogame Sony Playstation 5', 4999.99, 'ps5.jpg', 'ps52.jpg', 'ps53.jpg', 'Play Has No Limits Jogar Não Tem Limites PlayStation5 O console PS5 oferece novas possibilidades de jogabilidade que você nunca imaginou. Reproduza jogos para PS5 e PS4 em Blu-ray Disc. Além disso, você também pode baixar jogos digitais para PS5 e PS4 pela PlayStation Store. Experimente o carregamento extremamente rápido do SSD de ultra-velocidade, uma imersão mais profunda com suporte à resposta tátil, gatilhos adaptáveis e áudio 3D. Além de uma geração totalmente nova de jogos incríveis PlayStation.\r\n\r\nNa velocidade da luz Aproveite o carregamento extremamente rápido com o SSD de altíssima velocidade, uma imersão mais profunda com suporte a feedback tátil, gatilhos adaptáveis e áudio em 3D*, além de uma geração inédita de jogos incríveis para PlayStation. *Áudio 3D via alto-falantes integrados da TV ou fones de ouvido estéreo analógicos/USB. Configuração necessária.\r\nJogos deslumbrantes Maravilhe-se com os gráficos incríveis e experimente os recursos do novo PS5. Imersão de tirar o fôlego Descubra uma experiência de jogos ainda mais profunda com a ajuda da resposta tátil, dos gatilhos adaptáveis e da tecnologia de áudio 3D.\r\n\r\nExplore ambientes realistas com o Ray tracing. O Ray tracing traz novos níveis de realismo com sombras naturais e reflexos no suporte a jogos do PS5. Veja cores vibrantes. Com uma TV HDR, os jogos compatíveis do PS5 exibem uma incrível variedade de cores.\r\n\r\nMovimente-se pelos mundos dos jogos com um realismo incrível. Jogabilidade com taxa de quadros uniforme e fluída de até 120 fps em jogos compatíveis, com suporte para saída de 120 Hz em telas 4K. Experimente gráficos 4K nítidos. Com jogos compatíveis do PS5, cada pequeno detalhe ganha vida em uma TV 4K. Jogue mais de 4 mil jogos do PS4 em seu console PS5. Viva a nostalgia de jogar seus títulos favoritos do PS4 e do PS VR com a Retrocompatibilidade.', 'LANÇAMENTOS', 'CONSOLE'),
(3, 'PC Gamer INTEL I5-10400F, RTX 3050 8GB, SSD 480GB', 3744.98, 'pcpichau.jpg', 'pcpichau2.jpg', 'pcpichau3.jpg', 'Processador\r\n1 x Processador Intel Core i5-10400F, 6-Core, 12-Threads, 2.9Ghz (4.3Ghz Turbo), Cache 12MB, LGA1200, BX8070110400F\r\nPlaca mãe\r\n1 x Placa Mae Asus Prime H510M-E DDR4 LGA1200 Intel H510, PRIME H510M-E\r\nMemória\r\n2 x Memoria Team Group T-Force Vulcan Pichau, 8GB (1x8), DDR4, 3200MHz, C16, Branca RTB, TLPBD48G3200HC16F01\r\nArmazenamento\r\n1 x SSD Pichau Kepler S2, 512GB, Sata III 6GB/s, Leitura 530 MB/s, Gravacao 480 MB/s, PCH-KPLSATAS2-512\r\nPlaca de vídeo\r\n1 x Placa de Video MSI GeForce RTX 3050 Aero ITX OC, 8GB, GDDR6, 128-bit, 912-V809-4041\r\nFonte\r\n1 x Fonte Mancer Thunder 600W, 80 Plus Bronze, MCR-THR600-BL01-OEM\r\nGabinete\r\n1 x Gabinete Gamer Pichau Apus RGB, Mid-Tower, Lateral de Vidro Temperado, Com 3 Fans, Preto, PG-APS-RGB01\r\nCabo HDMI\r\n1 x Cabo HDMI Pichau 1.8m, 5001-1A\r\nCabo de força\r\n1 x Cabo de Força TGT Pichau 1.2m, 3 Pinos, Vermelho, PG-PWC-RD01-TGT', 'PC GAMER', 'PC'),
(4, 'Gift Card Cartão Presente PSN - PS3, PS4 & PS5', 100, 'giftcard.jpg', 'giftcard2.jpg', 'giftcard3.jpg', 'Os PlayStation® Network Cards permitem que qualquer pessoa desfrute da enorme variedade de conteúdos PS3, PS4, PS Vita e PSP disponíveis para download na PlayStation® Store.\r\n\r\nOs PlayStation® Network Cards são a forma mais rápido e fácil para todos adicionarem crédito à sua carteira na PlayStation® Network, uma vez que os fundos estejam na sua carteira PlayStation® Network, você poderá comprar o que quiser - sejam jogos completos, packs de expansão (add-ons), assinar ou renovar a sua Playstation Plus ou até mesmo comprar items para personalizar sua conta na PSN.', 'GIFT CARDS', 'GIFT CARD');

-- --------------------------------------------------------

--
-- Estrutura da tabela `secoes`
--

CREATE TABLE `secoes` (
  `SecaoID` int(11) NOT NULL,
  `secao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `secoes`
--

INSERT INTO `secoes` (`SecaoID`, `secao`) VALUES
(1, 'OFERTAS'),
(3, 'LANÇAMENTOS'),
(4, 'PC GAMER'),
(5, 'GIFT CARDS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `userID` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`userID`, `nome`, `email`, `imagem`, `usuario`, `senha`, `data`) VALUES
(6, 'William Tavares de Moura', 'will@gmail.com', '04-12-2023_01-44-47_download.png', 'will01', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-12-03'),
(7, 'Danilo Gentili', 'thenoite@gmail.com', '04-12-2023_01-50-02_2019_Presidente_Jair_Bolsonaro_no_Programa_The_Noite_do_SBT_-_47968955187_(cropped).png', 'danilo.php', '8d6fad0d56647ad476016c092311f9fe663a40ff', '2023-12-04');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`userID`);

--
-- Índices para tabela `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`DepartamentoID`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`ProdutoID`);

--
-- Índices para tabela `secoes`
--
ALTER TABLE `secoes`
  ADD PRIMARY KEY (`SecaoID`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `DepartamentoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `ProdutoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `secoes`
--
ALTER TABLE `secoes`
  MODIFY `SecaoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

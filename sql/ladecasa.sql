-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Dez-2016 às 16:11
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ladecasa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `boleto`
--

CREATE TABLE `boleto` (
  `id` int(20) NOT NULL,
  `vencimento` date NOT NULL,
  `status` int(20) NOT NULL,
  `id_user` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `boleto`
--

INSERT INTO `boleto` (`id`, `vencimento`, `status`, `id_user`) VALUES
(15, '2017-01-01', 1, 1),
(16, '2017-01-01', 1, 1),
(17, '2017-01-01', 1, 1),
(18, '2017-01-01', 1, 1),
(19, '2017-01-01', 1, 1),
(20, '2017-01-01', 1, 1),
(21, '2017-01-01', 1, 1),
(22, '2017-01-01', 1, 130),
(23, '2017-01-01', 1, 130),
(24, '2017-01-01', 1, 130),
(25, '2017-01-01', 1, 1),
(26, '2017-01-01', 1, 1),
(27, '2017-01-01', 1, 1),
(28, '2017-01-02', 1, 1),
(29, '2017-01-02', 1, 1),
(30, '2017-01-02', 1, 1),
(31, '2017-01-02', 1, 1),
(32, '2017-01-02', 1, 1),
(33, '2017-01-02', 1, 1),
(34, '2017-01-02', 1, 1),
(35, '2017-01-02', 1, 1),
(36, '2017-01-02', 1, 129),
(37, '2017-01-03', 1, 130);

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `id` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_produto` int(20) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `favorito`
--

INSERT INTO `favorito` (`id`, `id_user`, `id_produto`, `data`) VALUES
(11, 1, 21, '2016-12-28'),
(12, 1, 9, '2016-12-28'),
(15, 1, 11, '2016-12-28'),
(17, 1, 3, '2016-12-28'),
(18, 1, 2, '2016-12-28'),
(19, 130, 2, '2016-12-28'),
(20, 130, 15, '2016-12-28'),
(21, 130, 21, '2016-12-28'),
(22, 130, 9, '2016-12-28'),
(23, 130, 11, '2016-12-28'),
(24, 130, 24, '2016-12-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `detalhes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`id`, `nome`, `imagem`, `detalhes`) VALUES
(12, 'Brigadeiro', 'a17e4872d7458c9241bf78c13745146a.jpg', 'fdg'),
(26, 'hhhhhh', 'e4802d98df2e3f0d8c7a262cba42f12b.jpg', 'fgdfg'),
(28, 'fjhjh', 'ec37024cceb5b925081af6c8499049e5.jpg', 'jhjhj'),
(30, 'jkhjkhjkh', 'f6110edfc9a2b31d42bebd496112ac3d.jpg', 'klkçkl'),
(31, 'asdasd', '66da1c91dfa48a98133ef0a8a7829087.jpg', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `nome`) VALUES
(1, 'Sem Limites'),
(2, 'Fit (Baixas calorias)'),
(3, 'Sem Glúten ou Lactose'),
(4, 'Veggie'),
(8, 'tevez');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo`
--

CREATE TABLE `periodo` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `periodo`
--

INSERT INTO `periodo` (`id`, `nome`) VALUES
(1, 'Manhã '),
(2, 'Tarde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano`
--

CREATE TABLE `plano` (
  `id` int(20) NOT NULL,
  `nome_plano` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `plano`
--

INSERT INTO `plano` (`id`, `nome_plano`) VALUES
(1, 'Quinzenal'),
(2, 'Mensal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `id_tipo` int(20) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `detalhes` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `id_tipo`, `imagem`, `detalhes`) VALUES
(2, 'Sanduba', 1, '5bdcc4c9c4e979adf66060c165009fc5.jpg', 'Um detalhe aqui'),
(3, 'Wraps', 1, '297eab015b4fcde894b4ded0f3471c3e.jpg', 'Wraps são muito bons'),
(6, 'Bisnaguinhas', 1, 'ec657673163499bcaf77347177eaa9b5.jpg', 'Bisnaguinhas são sempre uma ótima opção'),
(7, 'Bolo de chocolate', 2, '4bdcacedff8356d954351deafd58d756.jpg', 'Bolo é um dos doces mais pedidos, você também precisa experimentar essa maravilha!'),
(8, 'Gelatina', 2, '3d6d0bb1a0fe486c3a40619e95c8ecbc.jpg', 'Gelatina yeeee'),
(9, 'Brigadeiro', 2, '6a64e85cea646ee94fd27f8c6e24e031.jpg', 'O famoso brigadeiro chegoooou!'),
(10, 'Abacate', 3, 'de171a7b62fe8a85decccdaecd24d9db.jpg', 'Abacate'),
(11, 'Banana', 3, '4b1e5ce37d56ef74ed0f0dfb3f60d2e2.jpg', 'Banana'),
(13, 'Aveia', 4, '494655e2865a466135b111ba34a8133c.jpg', 'Super saudável e super gostosa!'),
(15, 'Sanduiche Integral', 1, '6be7d84b8346a2aec7b4dfdbf57fe601.jpg', 'Sanduiche integral é mara'),
(16, 'Bolacha Integral', 1, 'b7ec69e74eb46c9a3c7d2888bcbed819.jpg', 'Bolachaaaa!'),
(17, 'Palitos de picles', 1, 'd35fef246c01bfc85da5005d64d622cc.jpg', 'dsada'),
(18, 'Grao', 1, '4466c7cbf48a627afd01a332d2eecc00.jpg', 'dsas'),
(19, 'Cenoura', 1, 'e0d166cec8e9abb9481992679ee6f121.jpg', 'asd'),
(21, 'Beirute', 1, '813bf6e12aa81696e8517d1f64d87088.jpg', 'fff'),
(22, 'Rocambole', 2, '1c5d8e93fb0485c28a769e59b9ee8b8f.jpg', 'rwrwer'),
(23, 'Granola', 4, '2bd9082c752e5c4bcc793d176ba057ea.jpg', 'Granola lolaaaaaa'),
(24, 'Pão de  Leo', 1, '6bb435d7a5d86261759fcc2659747a27.jpg', 'leooo'),
(25, 'Eu na google', 8, '1b2e32e6b9330aeb92bf5dd8808a8f80.jpg', 'sdfsdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_menu`
--

CREATE TABLE `produto_menu` (
  `id` int(20) NOT NULL,
  `id_menu` int(20) NOT NULL,
  `id_produto` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto_menu`
--

INSERT INTO `produto_menu` (`id`, `id_menu`, `id_produto`) VALUES
(1, 2, 1),
(2, 4, 1),
(3, 1, 2),
(4, 2, 2),
(5, 1, 3),
(6, 3, 3),
(7, 0, 4),
(8, 3, 5),
(9, 4, 5),
(10, 1, 6),
(11, 1, 7),
(12, 1, 8),
(13, 2, 8),
(14, 1, 9),
(15, 1, 10),
(16, 2, 10),
(17, 3, 10),
(18, 4, 10),
(19, 1, 11),
(20, 2, 11),
(21, 3, 11),
(22, 4, 11),
(23, 1, 12),
(24, 2, 12),
(25, 4, 12),
(26, 1, 13),
(27, 2, 13),
(28, 3, 13),
(29, 4, 13),
(30, 3, 14),
(31, 4, 14),
(32, 1, 2),
(33, 1, 2),
(34, 1, 2),
(35, 4, 4),
(36, 1, 15),
(37, 2, 15),
(38, 2, 16),
(39, 4, 16),
(40, 3, 17),
(41, 3, 18),
(42, 4, 18),
(43, 4, 19),
(44, 2, 20),
(45, 4, 20),
(46, 1, 21),
(47, 4, 21),
(48, 2, 22),
(49, 4, 22),
(50, 1, 23),
(51, 2, 23),
(52, 3, 23),
(53, 4, 23),
(54, 1, 24),
(55, 7, 24),
(56, 1, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Salgado'),
(2, 'Doce'),
(3, 'Fruta'),
(4, 'Variado'),
(9, 'hagatanga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `nascimento` date NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `ramal` varchar(100) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `numero` int(50) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `nivel` int(2) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `id_menu` int(20) NOT NULL,
  `id_plano` int(20) NOT NULL,
  `id_periodo` int(20) NOT NULL,
  `pagamento` int(20) NOT NULL,
  `boleto` int(20) NOT NULL,
  `pagseguro` int(20) NOT NULL,
  `data_pagamento` date NOT NULL,
  `forma_pagamento` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `sobrenome`, `nascimento`, `telefone`, `ramal`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `empresa`, `cpf`, `nivel`, `imagem`, `email`, `senha`, `id_menu`, `id_plano`, `id_periodo`, `pagamento`, `boleto`, `pagseguro`, `data_pagamento`, `forma_pagamento`) VALUES
(1, 'Junior', 'Lisboa', '1999-10-06', '11961930881', '48123497', 'Campo Limpo Paulista', 'Vila Constança (Botujuru)', 'Rua Bauru', 268, '', 'Aiphin', '46971555805', 3, '0db378e6aafbddd036173adfad41ecd4.jpg', 'juniorlisboadev@hotmail.com', 'babuinolegal', 1, 1, 2, 1, 0, 0, '2016-12-28', 0),
(128, 'Matheus', 'Arruda', '1999-12-23', '2342234224452', '1211311212', 'Campo Limpo Paulista', 'Vila Constança (Botujuru)', 'Rua Bauru', 312, '', 'Coca Cola', '344.422.442-22', 0, '7327b01549690b58970f173670a61295.jpg', 'matheus@gmail.com', 'matheus', 2, 2, 2, 0, 0, 0, '0000-00-00', 0),
(129, 'Karine', 'Brandão', '2001-03-09', '11953001905', '3445224434', 'Varzea Paulista', 'Jardim Maria de Fátima', 'Rua Aleatória', 432, '', 'Kaju', '332.212.234-34', 0, '37e7d0f0ee84329610742c656135fb0c.jpg', 'karine@email.com', 'karine', 0, 1, 2, 0, 1, 0, '0000-00-00', 0),
(130, 'Tevez', 'Lopes', '1998-12-12', '3323232342', '2224244222', 'São Paulo', 'Vila Olímpia', 'Rua Casa do Ator', 432, '8Âº Andar, sala 850', 'Consul Brás', '224.442.114-43', 0, 'perfil.jpg', 'tevez@gmail.com', 'tevez', 1, 2, 2, 1, 0, 0, '2016-12-29', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto_menu`
--
ALTER TABLE `produto_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boleto`
--
ALTER TABLE `boleto`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `favorito`
--
ALTER TABLE `favorito`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `plano`
--
ALTER TABLE `plano`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `produto_menu`
--
ALTER TABLE `produto_menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

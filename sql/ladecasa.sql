-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jan-2017 às 19:05
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usr199940028922`
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
(19, 130, 2, '2016-12-28'),
(20, 130, 15, '2016-12-28'),
(21, 130, 21, '2016-12-28'),
(22, 130, 9, '2016-12-28'),
(23, 130, 11, '2016-12-28'),
(24, 130, 24, '2016-12-29'),
(45, 1, 3, '2017-01-09'),
(46, 1, 21, '2017-01-09'),
(47, 1, 8, '2017-01-09'),
(48, 1, 9, '2017-01-09'),
(49, 1, 10, '2017-01-09'),
(50, 1, 11, '2017-01-09'),
(51, 1, 23, '2017-01-09');

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
(28, 'fjhjh', 'ec37024cceb5b925081af6c8499049e5.jpg', 'jhjhj'),
(30, 'jkhjkhjkh', 'f6110edfc9a2b31d42bebd496112ac3d.jpg', 'klkçkl'),
(31, 'asdasd', '66da1c91dfa48a98133ef0a8a7829087.jpg', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `diario` int(10) NOT NULL,
  `quinzenal` int(10) NOT NULL,
  `mensal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `nome`, `diario`, `quinzenal`, `mensal`) VALUES
(1, 'Sem Limites', 13, 129, 271),
(2, 'Fit (Baixas calorias)', 14, 139, 292),
(3, 'Sem Glúten ou Lactose', 15, 149, 313),
(4, 'Veggie', 16, 159, 334);

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
(4, 'Variado');

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
  `pagseguro` int(20) NOT NULL,
  `data_pagamento` date NOT NULL,
  `forma_pagamento` int(20) NOT NULL,
  `tipo_embalagem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `sobrenome`, `nascimento`, `telefone`, `ramal`, `cidade`, `bairro`, `rua`, `numero`, `complemento`, `empresa`, `cpf`, `nivel`, `imagem`, `email`, `senha`, `id_menu`, `id_plano`, `id_periodo`, `pagamento`, `pagseguro`, `data_pagamento`, `forma_pagamento`, `tipo_embalagem`) VALUES
(1, 'Junior', 'Lisboa', '1999-10-19', '11961930881', '48123497', 'Campo Limpo Paulista', 'Vila Constança (Botujuru)', 'Rua Bauru', 268, '', 'Aiphin', '46971555805', 3, '0db378e6aafbddd036173adfad41ecd4.jpg', 'juniorlisboadev@hotmail.com', 'babuinolegal', 4, 1, 2, 0, 0, '0000-00-00', 0, 1),
(128, 'Matheus', 'Arruda', '1999-12-23', '2342234224452', '1211311212', 'Campo Limpo Paulista', 'Vila Constança (Botujuru)', 'Rua Bauru', 312, '', 'Coca Cola', '344.422.442-22', 0, '7327b01549690b58970f173670a61295.jpg', 'matheus@gmail.com', 'matheus', 2, 2, 2, 0, 0, '0000-00-00', 0, 0);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `produto_menu`
--
ALTER TABLE `produto_menu`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

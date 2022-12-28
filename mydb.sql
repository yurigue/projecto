-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Dez-2022 às 23:47
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `ID_area` int(11) NOT NULL,
  `Area` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`ID_area`, `Area`) VALUES
(1, 'Nenhuma'),
(2, 'Contabilidade'),
(3, 'Gestão'),
(4, 'Informática');

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatura`
--

CREATE TABLE `candidatura` (
  `ID_candidatura` int(11) NOT NULL,
  `Data` date DEFAULT current_timestamp(),
  `Mensagem` varchar(305) DEFAULT NULL,
  `Utilizador_ID_utilizador` int(11) DEFAULT NULL,
  `Estado_candidatura_ID_estado` int(11) DEFAULT 3,
  `Oferta_ID_oferta` int(11) DEFAULT NULL,
  `visto` tinyint(1) DEFAULT 0,
  `visitado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `candidatura`
--

INSERT INTO `candidatura` (`ID_candidatura`, `Data`, `Mensagem`, `Utilizador_ID_utilizador`, `Estado_candidatura_ID_estado`, `Oferta_ID_oferta`, `visto`, `visitado`) VALUES
(1, '2022-08-08', 'Estudante de Mestrado em Informática, adquirindo conhecimentos na conceção, desenvolvimento de sistemas e aplicações informáticas.', 2, 1, 1, 1, 0),
(2, '2022-08-09', 'hhgsggshjdkkd', 2, 2, 2, 0, 0),
(5, '2022-08-15', 'nnn', 4, 1, 1, 1, 0),
(6, '2022-08-18', 'hoje hoje', 4, 1, 2, 0, 0),
(11, '2022-08-23', 'klllllll', 10, 1, 2, 0, 0),
(12, '2022-08-30', 'Sou formado em x com nota y a tempo z', 11, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `Nif` int(9) NOT NULL,
  `Nome` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Morada` varchar(45) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `ID_empresa` int(11) NOT NULL,
  `Imagem` varchar(45) DEFAULT NULL,
  `Area_ID_area` int(11) DEFAULT 1,
  `Local_ID_local` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`Nif`, `Nome`, `Password`, `Morada`, `Telefone`, `Email`, `ID_empresa`, `Imagem`, `Area_ID_area`, `Local_ID_local`) VALUES
(123456789, 'Redit', '$2y$10$E4H6q8ekZzqUR4ANQhjMHuWhY1ZeE4N.eZDBx6kMEKg7Wm8c7yZ0a', 'Rua do brasil', '987645698', 'redit@gmail.com', 1, 'transferir.png', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_candidatura`
--

CREATE TABLE `estado_candidatura` (
  `ID_estado` int(11) NOT NULL,
  `Estado_Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estado_candidatura`
--

INSERT INTO `estado_candidatura` (`ID_estado`, `Estado_Estado`) VALUES
(1, 'Aceite'),
(2, 'Não aceite'),
(3, 'Não definida'),
(4, 'Visto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_oferta`
--

CREATE TABLE `estado_oferta` (
  `ID_estado` int(11) NOT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estado_oferta`
--

INSERT INTO `estado_oferta` (`ID_estado`, `Estado`) VALUES
(1, 'Aberta'),
(2, 'Fechada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `habilitacao`
--

CREATE TABLE `habilitacao` (
  `ID_habilitacao` int(11) NOT NULL,
  `Habilitacao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `habilitacao`
--

INSERT INTO `habilitacao` (`ID_habilitacao`, `Habilitacao`) VALUES
(1, 'HABILITAÇÃO NÃO DEFINIDA'),
(2, '9.º ANO DE ESCOLARIDADE'),
(3, '11.º ANOS DE ESCOLARIDADE'),
(4, '12.º ANOS DE ESCOLARIDADE'),
(5, 'CURSO TECNICO/PROFISSIONAL'),
(6, 'LICENCIATURA'),
(7, 'PÓS-GRADUAÇÃO'),
(8, 'MESTRADO'),
(9, 'DOUTORAMENTO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `ID_local` int(11) NOT NULL,
  `Local` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`ID_local`, `Local`) VALUES
(1, 'Nenhuma'),
(2, 'Santana'),
(3, 'Conde'),
(4, 'Santo Amaro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oferta`
--

CREATE TABLE `oferta` (
  `ID_oferta` int(11) NOT NULL,
  `Titulo` varchar(255) DEFAULT NULL,
  `Descricao` varchar(255) DEFAULT NULL,
  `Vagas` int(11) DEFAULT NULL,
  `Categoria_Salarial` varchar(45) DEFAULT NULL,
  `Data_Criacao` date DEFAULT NULL,
  `Tipo_oferta_ID_tipo` int(11) DEFAULT NULL,
  `Estado_oferta_ID_estado` int(11) DEFAULT 1,
  `Area_ID_area` int(11) DEFAULT NULL,
  `Local_ID_local` int(11) DEFAULT NULL,
  `Regime_ID_regime` int(11) DEFAULT NULL,
  `Data_fim` date DEFAULT NULL,
  `Empresa_ID_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `oferta`
--

INSERT INTO `oferta` (`ID_oferta`, `Titulo`, `Descricao`, `Vagas`, `Categoria_Salarial`, `Data_Criacao`, `Tipo_oferta_ID_tipo`, `Estado_oferta_ID_estado`, `Area_ID_area`, `Local_ID_local`, `Regime_ID_regime`, `Data_fim`, `Empresa_ID_empresa`) VALUES
(1, 'Junior Developer (Graduate)', 'Professional fluency in English – a must A real desire to start a Tech related career Degree educated', 10, '2000', '2022-08-08', 1, 1, 1, 1, 1, '2022-09-08', 1),
(2, 'Test Automation Engineer', 'A nossa missão é a excelência no mundo DevOps e Test Automation, A entrega acelerada de valor e a qualidade na entrega de produtos', 2, '3000', '2022-08-08', 2, 1, 1, 2, 2, '2022-09-10', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regime`
--

CREATE TABLE `regime` (
  `ID_regime` int(11) NOT NULL,
  `Regime` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `regime`
--

INSERT INTO `regime` (`ID_regime`, `Regime`) VALUES
(1, 'Full-time'),
(2, 'Part-time');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_oferta`
--

CREATE TABLE `tipo_oferta` (
  `ID_tipo` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_oferta`
--

INSERT INTO `tipo_oferta` (`ID_tipo`, `Tipo`) VALUES
(1, 'Emprego'),
(2, 'Estagio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_utilizador`
--

CREATE TABLE `tipo_utilizador` (
  `ID_tipo` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_utilizador`
--

INSERT INTO `tipo_utilizador` (`ID_tipo`, `Tipo`) VALUES
(1, 'admin'),
(2, 'candidato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `ID_utilizador` int(11) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Morada` varchar(50) DEFAULT NULL,
  `Bi` varchar(45) DEFAULT NULL,
  `Nif` int(15) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `Codigo_Postal` varchar(15) DEFAULT NULL,
  `Localidade` varchar(45) DEFAULT NULL,
  `Imagem` varchar(222) DEFAULT NULL,
  `CV` varchar(255) DEFAULT NULL,
  `Tipo_utilizador_ID_tipo` int(11) NOT NULL DEFAULT 2,
  `Habilitacao_ID_habilitacao` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`ID_utilizador`, `Nome`, `Password`, `Morada`, `Bi`, `Nif`, `Telefone`, `Email`, `Username`, `Codigo_Postal`, `Localidade`, `Imagem`, `CV`, `Tipo_utilizador_ID_tipo`, `Habilitacao_ID_habilitacao`) VALUES
(1, 'Agora Santos', '$2y$10$/.rG8uzp4m9Wlx/NcWhhPOu2YPSNmw9uBGt4wcASgnNkflmeCp5ge', 'Rua de bandeira', '', 342345678, '908765439', 'Agora@gmail.com', 'adm', '6400-564', 'Guadalupe', 'image.jpg', NULL, 1, 1),
(2, 'Toninho Tornado', '$2y$10$oGAbR8qq4YXkSE7FPF64P.qnpgBpa20KIUUWAkC1vqDDs7GtaD7Cm', 'Rua de administrador', '', 345678099, '+239987654364', 'yuri@gmail.com', 'cand', '3330-765', 'braga', 'image1.jpg', 'YuriGué_CV1.pdf', 2, 6),
(4, 'Agora Santos', '$2y$10$NGGZZZVQy/aMZK5zBp0jPuW33xWMwnKgwe6oAxh5YNuCta2yePeAy', 'Rua de bandeira', NULL, 342345678, '908765439', 'Agora@gmail.com', 'agora', '6400-564', 'Guadalupe', '2019-03-18 19.13.12-2.jpg', 'cvfddf.pdf', 2, 7),
(10, 'Nira Boas Esperança', '$2y$10$3Udx71vP8G8z4g6xWYeXQOQNqt.rwKMD1NYeO/OJ/6J84Arca95eu', 'Maiawa', NULL, 123456, '', 'niraeug@gmail.com', 'Nira', '5400-987', 'Guadalupe', 'image1.jpg', NULL, 2, 1),
(11, 'Yúri Dos Ramos Gué', '$2y$10$7G.Nn1WHxNjJjQhEr8PeaOLTZWl5HYmtDoZEbJ5.oVibzZi7YVisG', 'Rua do Brasil - numero 23 , 4º frente', '88776544', 12343256, '936304041', 'yurigue2104@gmail.com', 'cle1', '5300-098', 'Guadalupe', 'cardi-b.jpg', 'documento_unico_cobranca.pdf', 2, 4),
(12, 'Cleyde boas Esperança', '$2y$10$n/OhVQWkiCfHrjUBSjA4femZ3aN6uL3CvE/u8J2Zo.1CXOPzKUu36', 'Pontobo', '90675643', 32224567, '55244266773', 'cleydeboasesperanc@hotmail.com', 'cle2', '5433-769', 'Guadalupe', 'foto1.jpg', NULL, 1, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`ID_area`),
  ADD UNIQUE KEY `ID_area_UNIQUE` (`ID_area`);

--
-- Índices para tabela `candidatura`
--
ALTER TABLE `candidatura`
  ADD PRIMARY KEY (`ID_candidatura`),
  ADD UNIQUE KEY `ID_candidatura_UNIQUE` (`ID_candidatura`),
  ADD KEY `fk_Candidatura_Utilizador1_idx` (`Utilizador_ID_utilizador`),
  ADD KEY `fk_Candidatura_Estado_candidatura1_idx` (`Estado_candidatura_ID_estado`),
  ADD KEY `fk_Candidatura_Oferta1_idx` (`Oferta_ID_oferta`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID_empresa`),
  ADD UNIQUE KEY `Nif_UNIQUE` (`Nif`),
  ADD UNIQUE KEY `ID_empresa_UNIQUE` (`ID_empresa`),
  ADD KEY `fk_Empresa_Area1_idx` (`Area_ID_area`),
  ADD KEY `fk_Empresa_Local1_idx` (`Local_ID_local`);

--
-- Índices para tabela `estado_candidatura`
--
ALTER TABLE `estado_candidatura`
  ADD PRIMARY KEY (`ID_estado`);

--
-- Índices para tabela `estado_oferta`
--
ALTER TABLE `estado_oferta`
  ADD PRIMARY KEY (`ID_estado`);

--
-- Índices para tabela `habilitacao`
--
ALTER TABLE `habilitacao`
  ADD PRIMARY KEY (`ID_habilitacao`);

--
-- Índices para tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`ID_local`),
  ADD UNIQUE KEY `ID_local_UNIQUE` (`ID_local`);

--
-- Índices para tabela `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`ID_oferta`),
  ADD UNIQUE KEY `ID_oferta_UNIQUE` (`ID_oferta`),
  ADD KEY `fk_Oferta_Tipo_oferta1_idx` (`Tipo_oferta_ID_tipo`),
  ADD KEY `fk_Oferta_Estado_oferta1_idx` (`Estado_oferta_ID_estado`),
  ADD KEY `fk_Oferta_Area1_idx` (`Area_ID_area`),
  ADD KEY `fk_Oferta_Local1_idx` (`Local_ID_local`),
  ADD KEY `fk_Oferta_Regime1_idx` (`Regime_ID_regime`),
  ADD KEY `fk_Oferta_Empresa1_idx` (`Empresa_ID_empresa`);

--
-- Índices para tabela `regime`
--
ALTER TABLE `regime`
  ADD PRIMARY KEY (`ID_regime`);

--
-- Índices para tabela `tipo_oferta`
--
ALTER TABLE `tipo_oferta`
  ADD PRIMARY KEY (`ID_tipo`),
  ADD UNIQUE KEY `ID_tipo_UNIQUE` (`ID_tipo`);

--
-- Índices para tabela `tipo_utilizador`
--
ALTER TABLE `tipo_utilizador`
  ADD PRIMARY KEY (`ID_tipo`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`ID_utilizador`),
  ADD UNIQUE KEY `ID_utilizador_UNIQUE` (`ID_utilizador`),
  ADD KEY `fk_Utilizador_Tipo_utilizador_idx` (`Tipo_utilizador_ID_tipo`),
  ADD KEY `fk_Utilizador_Habilitacao1_idx` (`Habilitacao_ID_habilitacao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `ID_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `candidatura`
--
ALTER TABLE `candidatura`
  MODIFY `ID_candidatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `ID_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `habilitacao`
--
ALTER TABLE `habilitacao`
  MODIFY `ID_habilitacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `local`
--
ALTER TABLE `local`
  MODIFY `ID_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `oferta`
--
ALTER TABLE `oferta`
  MODIFY `ID_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `regime`
--
ALTER TABLE `regime`
  MODIFY `ID_regime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `ID_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `candidatura`
--
ALTER TABLE `candidatura`
  ADD CONSTRAINT `fk_Candidatura_Estado_candidatura1` FOREIGN KEY (`Estado_candidatura_ID_estado`) REFERENCES `estado_candidatura` (`ID_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Candidatura_Oferta1` FOREIGN KEY (`Oferta_ID_oferta`) REFERENCES `oferta` (`ID_oferta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Candidatura_Utilizador1` FOREIGN KEY (`Utilizador_ID_utilizador`) REFERENCES `utilizador` (`ID_utilizador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_Empresa_Area1` FOREIGN KEY (`Area_ID_area`) REFERENCES `area` (`ID_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Empresa_Local1` FOREIGN KEY (`Local_ID_local`) REFERENCES `local` (`ID_local`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `oferta`
--
ALTER TABLE `oferta`
  ADD CONSTRAINT `fk_Oferta_Area1` FOREIGN KEY (`Area_ID_area`) REFERENCES `area` (`ID_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Oferta_Empresa1` FOREIGN KEY (`Empresa_ID_empresa`) REFERENCES `empresa` (`ID_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Oferta_Estado_oferta1` FOREIGN KEY (`Estado_oferta_ID_estado`) REFERENCES `estado_oferta` (`ID_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Oferta_Local1` FOREIGN KEY (`Local_ID_local`) REFERENCES `local` (`ID_local`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Oferta_Regime1` FOREIGN KEY (`Regime_ID_regime`) REFERENCES `regime` (`ID_regime`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Oferta_Tipo_oferta1` FOREIGN KEY (`Tipo_oferta_ID_tipo`) REFERENCES `tipo_oferta` (`ID_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `fk_Utilizador_Habilitacao1` FOREIGN KEY (`Habilitacao_ID_habilitacao`) REFERENCES `habilitacao` (`ID_habilitacao`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Utilizador_Tipo_utilizador` FOREIGN KEY (`Tipo_utilizador_ID_tipo`) REFERENCES `tipo_utilizador` (`ID_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

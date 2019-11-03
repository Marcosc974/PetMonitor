-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Nov-2019 às 02:36
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petmonitor`
--
CREATE DATABASE IF NOT EXISTS `petmonitor` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `petmonitor`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `idGenero` int(11) NOT NULL,
  `descricaoGenero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`idGenero`, `descricaoGenero`) VALUES
(1, 'Macho'),
(2, 'Fêmea');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

CREATE TABLE `pet` (
  `idPet` int(11) NOT NULL,
  `numRegistro` varchar(45) NOT NULL,
  `nomePet` varchar(45) NOT NULL,
  `idade` int(11) NOT NULL,
  `Tutor_idTutor` int(11) NOT NULL,
  `Tipo_idTipo` int(11) NOT NULL,
  `Genero_idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`idPet`, `numRegistro`, `nomePet`, `idade`, `Tutor_idTutor`, `Tipo_idTipo`, `Genero_idGenero`) VALUES
(1, '0504', 'Yoshi', 24, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `posicionamento`
--

CREATE TABLE `posicionamento` (
  `idPosicionamento` int(11) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `Rastreador_idRastreador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posicionamento`
--

INSERT INTO `posicionamento` (`idPosicionamento`, `data_hora`, `latitude`, `longitude`, `Rastreador_idRastreador`) VALUES
(1, '2019-10-30 19:38:23', '-15.7312', '-48.29135', 1),
(2, '2019-10-30 19:39:26', '-15.7272', '-48.28452', 1),
(3, '2019-11-02 18:27:18', '-15.73631', '-48.29032', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rastreador`
--

CREATE TABLE `rastreador` (
  `idRastreador` int(11) NOT NULL,
  `apelido` varchar(45) DEFAULT NULL,
  `data_hora_ativacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Pet_idPet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rastreador`
--

INSERT INTO `rastreador` (`idRastreador`, `apelido`, `data_hora_ativacao`, `Pet_idPet`) VALUES
(1, 'Yoshi', '2019-10-30 19:35:15', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL,
  `descricaoTipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`idTipo`, `descricaoTipo`) VALUES
(1, 'Cão'),
(2, 'Gato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tutor`
--

CREATE TABLE `tutor` (
  `idtutor` int(11) NOT NULL,
  `nometutor` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tutor`
--

INSERT INTO `tutor` (`idtutor`, `nometutor`, `telefone`, `email`) VALUES
(1, 'SUPER MÁRIO', '(61) 9 8258-7446', 'sup@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`idPet`),
  ADD KEY `fk_Pet_Tutor_idx` (`Tutor_idTutor`),
  ADD KEY `fk_Pet_Tipo1_idx` (`Tipo_idTipo`),
  ADD KEY `fk_Pet_Genero1_idx` (`Genero_idGenero`);

--
-- Indexes for table `posicionamento`
--
ALTER TABLE `posicionamento`
  ADD PRIMARY KEY (`idPosicionamento`),
  ADD KEY `fk_Posicionamento_Rastreador1_idx` (`Rastreador_idRastreador`);

--
-- Indexes for table `rastreador`
--
ALTER TABLE `rastreador`
  ADD PRIMARY KEY (`idRastreador`),
  ADD KEY `fk_Rastreador_Pet1_idx` (`Pet_idPet`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`idtutor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `idPet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posicionamento`
--
ALTER TABLE `posicionamento`
  MODIFY `idPosicionamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rastreador`
--
ALTER TABLE `rastreador`
  MODIFY `idRastreador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `idtutor` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `fk_Pet_Genero1` FOREIGN KEY (`Genero_idGenero`) REFERENCES `genero` (`idGenero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pet_Tipo1` FOREIGN KEY (`Tipo_idTipo`) REFERENCES `tipo` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pet_Tutor` FOREIGN KEY (`Tutor_idTutor`) REFERENCES `tutor` (`idTutor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `posicionamento`
--
ALTER TABLE `posicionamento`
  ADD CONSTRAINT `fk_Posicionamento_Rastreador1` FOREIGN KEY (`Rastreador_idRastreador`) REFERENCES `rastreador` (`idRastreador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `rastreador`
--
ALTER TABLE `rastreador`
  ADD CONSTRAINT `fk_Rastreador_Pet1` FOREIGN KEY (`Pet_idPet`) REFERENCES `pet` (`idPet`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

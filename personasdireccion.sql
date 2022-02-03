-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 03, 2022 at 05:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personas`
--

-- --------------------------------------------------------

--
-- Table structure for table `direccionpersona`
--

CREATE TABLE `direccionpersona` (
  `Codigo_persona` int(11) DEFAULT NULL,
  `Id_direccion` int(11) NOT NULL,
  `direcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `direccionpersona`
--

INSERT INTO `direccionpersona` (`Codigo_persona`, `Id_direccion`, `direcion`, `estado`) VALUES
(2, 4, 'Santa Rosa ', 1),
(1, 8, 'Santa Rosa', 1);

--
-- Dumping data for table `tipoidentificacion`
--

INSERT INTO `tipoidentificacion` (`Codigo_tipo_identificacion`, `Descripcion_tipo_identificacion`) VALUES
(1, 'Pasaporte'),
(2, 'Cedula'),
(3, 'Partida nacimiento'),
(4, 'Tarjeta Verde');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `direccionpersona`
--
ALTER TABLE `direccionpersona`
  ADD PRIMARY KEY (`Id_direccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

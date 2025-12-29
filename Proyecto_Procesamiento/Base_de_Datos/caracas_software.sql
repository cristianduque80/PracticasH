-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 06:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caracas software`
--

-- --------------------------------------------------------

--
-- Table structure for table `formulario`
--

CREATE TABLE `formulario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Objetivos` varchar(50) NOT NULL,
  `Descripcion` text NOT NULL,
  `Fecha-Registro` date NOT NULL,
  `Estado` varchar(35) NOT NULL,
  `Priorizacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulario`
--

INSERT INTO `formulario` (`Id`, `Nombre`, `Apellido`, `Titulo`, `Objetivos`, `Descripcion`, `Fecha-Registro`, `Estado`, `Priorizacion`) VALUES
(1, 'Jesus Enrique', 'Hernández Caldera', 'Caracas Software', 'Desarrollar ', ' valor', '2025-03-12', 'Aprobado', 'Baja'),
(2, 'Cristian Emmanuel', 'Duque Rojas', 'Para', 'razon', 'pego', '2024-10-10', 'Aprobado', 'Media'),
(3, 'Jesus Enrique', 'Hernández Caldera', 'Pagina', 'Software', 'quizasa', '2025-07-12', 'Aprobado', 'Alta'),
(4, 'Jesus Enrique', 'Hernández Caldera', 'Web', ' carcas1', 'P.', '2024-12-08', 'Aprobado', 'Urgente'),
(5, 'Cristian Emmanuel', 'Duque Rojas', 'perro', 'gato', 'osa', '2024-11-02', 'Rechazado', NULL),
(6, 'Luis Alberto', 'Ramírez Soto', 'oso', 'paloma', 'rana', '2024-10-02', 'Rechazado', NULL),
(7, 'Jesus Enrique', 'Hernández Caldera', 'tv', 'casa', 'arroz', '2025-07-12', 'Rechazado', NULL),
(8, 'Jesus Enrique', 'Hernández Caldera', 'dwniqj', 'owenjmkd', 'ojmk,', '2025-07-13', 'Aprobado', 'Media'),
(9, 'Luis Alberto', 'Ramirez Soto', 'Casa', 'Construcción', 'Hacer casa', '2025-07-13', 'Aprobado', 'Alta'),
(10, 'Jesus Enrique', 'Hernández Caldera', 'jndkm', 'HErnandez', 'mfcd', '2025-07-13', 'Rechazado', NULL),
(11, 'Jesus Enrique', 'Hernández Caldera', 'sdkhb', 'fedskhdj', 'kjdfsalk', '2025-07-16', 'Aprobado', 'Urgente'),
(12, 'Jesus Enrique', 'Hernández Caldera', 'reljwn', 'kfsjdank', 'fshdbkjKM;', '2025-07-16', 'Aprobado', 'Baja'),
(13, 'Jesus Enrique', 'Hernández Caldera', 'dsvk', 'fhidcnj', 'toma', '2025-07-16', 'Rechazado', NULL),
(14, 'Diana', 'Soto', 'Duque', 'HErnandez', 'cristian jesus', '2025-07-17', 'Aprobado', 'Urgente'),
(15, 'Jesus Enrique', 'Hernández Caldera', 'Alfredo', 'Revisa', 'Codigo', '2025-07-20', 'Rechazado', NULL),
(16, 'María Fernanda', 'González Márquez', 'Hola', 'soy', 'Jesus wjhdbsjzndsakjdas ajdhsajSLMCNVBNASNB Sahasdjxncjhnsxdcnckdnjskadsjakdjsakdcjskajnasksdjsamkdaskdjsakdcnjxmcnjskcjndsmkdnskmdjsdmknsmdkcndmcnmxcnm,m,m', '2025-07-20', 'Pendiente Por Decision Del Comite', NULL),
(17, 'Jesus Enrique', 'Hernández Caldera', 'Hola', 'Hshw', 'Hsva', '2025-07-20', 'Rechazado', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE `registro` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `Contraseña` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Rol` varchar(10) NOT NULL,
  `Departamento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`Id`, `Nombre`, `Apellido`, `Usuario`, `Contraseña`, `Email`, `Rol`, `Departamento`) VALUES
(0, 'Diana', 'Soto', 'Diana Soto', 'PHP_123', 'ds0@g.com', 'Admin', 'Directiva'),
(1, 'Jesus Enrique', 'Hernández Caldera', 'Jesus Hernandez', 'PHP_123', 'jh1@g.com', 'Admin', 'Directiva'),
(2, 'Cristian Emmanuel', 'Duque Rojas', 'Cristian Duque', 'php_123', 'cd2@g.com', 'Admin', 'Directiva'),
(3, 'María Fernanda', 'González Márquez', 'María González', 'PHP_123', 'mg3@g.com', 'Comite', 'Directiva'),
(4, 'Luis Alberto', 'Ramírez Soto', 'Luis Ramírez', 'PHP_123', 'lr4@g.com', 'Comite', 'Sistemas'),
(5, 'Ana Sofía', 'Castillo Peña', 'Ana Castillo', 'PHP_123', 'ac5@g.com', 'Comite', 'Sistemas'),
(6, 'Carlos Daniel', 'Paredes López', 'Carlos Paredes', 'PHP_123', 'cp6@g.com', 'Comite', 'Sistemas'),
(7, 'Valentina Isabel', 'Torres Ruiz', 'Valentina Torres', 'PHP_123', 'vt7@g.com', 'Comite', 'Sistemas'),
(8, 'Jorge Antonio', 'Montoya Silva', 'Jorge Montoya', 'PHP_123', 'jm8@g.com', 'Comite', 'Finanzas'),
(9, 'Gabriela Elena', 'Jiménez Castro', 'Gabriela Jiménez', 'PHP_123', 'gj9@g.com', 'Comite', 'Ventas'),
(10, 'Andrés Felipe', 'Moreno Salas', 'Andrés Moreno', 'PHP_123', 'am10@g.com', 'Usuario', 'Ventas'),
(11, 'Laura Patricia', 'Mejía Herrera', 'Laura Mejía', 'PHP_123', 'lm11@g.com', 'Usuario', 'Finanzas'),
(12, 'Maria Alejandra', 'Chapman Bigot', 'Maria Chapman', 'PHP_123', 'mg12@gmail.com', 'Usuario', 'Sistemas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formulario`
--
ALTER TABLE `formulario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

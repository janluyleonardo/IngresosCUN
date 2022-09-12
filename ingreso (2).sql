-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2022 a las 15:50:56
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ingreso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `ID` bigint(11) NOT NULL,
  `NombreIngresoLaboral` varchar(200) COLLATE utf8_bin NOT NULL,
  `CorreoIngresoLaboral` varchar(300) COLLATE utf8_bin NOT NULL,
  `ModalidadIngresoLaboral` varchar(200) COLLATE utf8_bin NOT NULL,
  `FechaIngresoLaboral` date NOT NULL,
  `HoraIngresoLaboral` time NOT NULL,
  `IpIngresoLaboral` varchar(200) COLLATE utf8_bin NOT NULL,
  `SedeIngresoLaboral` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `DocumentoIngresoLaboral` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`ID`, `NombreIngresoLaboral`, `CorreoIngresoLaboral`, `ModalidadIngresoLaboral`, `FechaIngresoLaboral`, `HoraIngresoLaboral`, `IpIngresoLaboral`, `SedeIngresoLaboral`, `DocumentoIngresoLaboral`) VALUES
(1, 'BRIAN STEVEN CAÑON ROJAS', 'brian_canon@cun.edu.co', 'presencial', '2022-09-08', '03:02:04', '::1', 'Sede A', '1000163634'),
(2, 'Brian', 'asdad', 'asads', '0000-00-00', '12:50:00', '1111', 'asd', '1221');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `ID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

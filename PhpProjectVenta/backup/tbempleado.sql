-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2017 a las 08:42:32
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdprojectoventa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleado`
--

CREATE TABLE `tbempleado` (
  `idEmpleado` int(11) NOT NULL,
  `cedulaEmpleado` varchar(15) NOT NULL,
  `nombreEmpleado` varchar(20) NOT NULL,
  `apellido1Empleado` varchar(20) NOT NULL,
  `apellido2Empleado` varchar(20) NOT NULL,
  `edadEmpleado` int(11) NOT NULL,
  `sexoEmpleado` varchar(20) NOT NULL,
  `estadoEmpleado` varchar(20) NOT NULL,
  `telefonoEmpleado` int(11) NOT NULL,
  `telefono2Empleado` int(11) NOT NULL,
  `correoEmpleado` varchar(50) NOT NULL,
  `direccionEmpleado` varchar(50) NOT NULL,
  `cuentaBancariaEmpleado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`idEmpleado`, `cedulaEmpleado`, `nombreEmpleado`, `apellido1Empleado`, `apellido2Empleado`, `edadEmpleado`, `sexoEmpleado`, `estadoEmpleado`, `telefonoEmpleado`, `telefono2Empleado`, `correoEmpleado`, `direccionEmpleado`, `cuentaBancariaEmpleado`) VALUES
(1, '207210905', 'Brandon', 'Rodriguez', 'Mendez', 23, 'Maasculino', 'Soltero', 62091232, 62091233, 'brandon-ndsi@hotmail.com', 'marsella,venecia', '123987400'),
(2, '124817254', 'David', 'Salas', 'Monge', 23, 'Masculino', 'Soltero', 127634, 0, 'david@hotmail.com', 'riofrio', '231212445');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
  ADD PRIMARY KEY (`idEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2017 a las 07:43:50
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
  `telefono1Empleado` int(11) NOT NULL,
  `telefono2Empleado` int(11) NOT NULL,
  `correoEmpleado` varchar(50) NOT NULL,
  `direccionEmpleado` varchar(50) NOT NULL,
  `cuentaBancariaEmpleado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`idEmpleado`, `cedulaEmpleado`, `nombreEmpleado`, `apellido1Empleado`, `apellido2Empleado`, `edadEmpleado`, `sexoEmpleado`, `estadoEmpleado`, `telefono1Empleado`, `telefono2Empleado`, `correoEmpleado`, `direccionEmpleado`, `cuentaBancariaEmpleado`) VALUES
(1, '207210905', 'Brandon', 'Rodriguez', 'Mendez', 23, 'Maasculino', 'Soltero', 62091232, 62091233, 'brandon-ndsi@hotmail.com', 'marsella,venecia', '123987400'),
(2, '124817254', 'David', 'Salas', 'Monge', 23, 'Masculino', 'Soltero', 127634, 0, 'david@hotmail.com', 'riofrio', '231212445');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfactura`
--

CREATE TABLE `tbfactura` (
  `idFactura` varchar(10) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpersona`
--

CREATE TABLE `tbpersona` (
  `telefono` int(11) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `apellido1Persona` varchar(30) NOT NULL,
  `apellido2Persona` varchar(30) NOT NULL,
  `tipoUsuario` varchar(30) NOT NULL,
  `idUbicacion` varchar(30) NOT NULL,
  `idEmpleado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpersona`
--

INSERT INTO `tbpersona` (`telefono`, `nombreUsuario`, `apellido1Persona`, `apellido2Persona`, `tipoUsuario`, `idUbicacion`, `idEmpleado`) VALUES
(88888888, 'David', 'Salas', 'Lorente', 'Administrador', 'Z2', 'E2'),
(62091232, 'Brandon', 'Rodrigez', 'Mendez', 'Administrador', 'Z1', 'E1'),
(14358765, 'Juan', 'Chavarria', 'Arroyo', 'Administrador', 'Z3', 'E3'),
(12345439, 'Elisabeth', 'Rodrigez', 'Castro', 'Cliente', 'Z4', 'E4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproducto`
--

CREATE TABLE `tbproducto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductoprimo`
--

CREATE TABLE `tbproductoprimo` (
  `idMateriaPrima` varchar(10) NOT NULL,
  `nombreProducto` varchar(40) NOT NULL,
  `precioUnidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbrelacionproducto`
--

CREATE TABLE `tbrelacionproducto` (
  `idProducto` int(20) NOT NULL,
  `idMateriaPrima` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbzona`
--

CREATE TABLE `tbzona` (
  `idUbicacion` varchar(10) NOT NULL,
  `nombreUbicacion` varchar(40) NOT NULL,
  `precioZona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

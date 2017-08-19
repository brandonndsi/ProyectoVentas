-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2017 a las 00:32:57
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdproyectoventa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleado`
--

CREATE TABLE `tbempleado` (
  `idEmpleado` int(11) NOT NULL,
  `cedulaEmpleado` int(11) NOT NULL,
  `contraseñaEmpleado` varchar(30) NOT NULL,
  `correoEmpleado` varchar(50) NOT NULL,
  `cuentaBancariaEmpleado` int(11) NOT NULL,
  `sexoEmpleado` varchar(10) NOT NULL,
  `estadoCivilEmpleado` varchar(20) NOT NULL,
  `edadEmpleado` int(11) NOT NULL,
  `descripcionEmpleado` varchar(100) NOT NULL,
  `salarioBaseEmpleado` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleado`
--

INSERT INTO `tbempleado` (`idEmpleado`, `cedulaEmpleado`, `contraseñaEmpleado`, `correoEmpleado`, `cuentaBancariaEmpleado`, `sexoEmpleado`, `estadoCivilEmpleado`, `edadEmpleado`, `descripcionEmpleado`, `salarioBaseEmpleado`) VALUES
(1, 207210905, '2904017b', 'brandon-ndsi@hotmail.com', 1244251234, 'Masculino', 'Soltero', 23, 'Puede agregar empleados,productos, zonas, etc\r\n', 600000),
(2, 609870234, '12345', 'juaracha@gmail.com', 1265748392, 'Masculino', 'Union Libre', 23, 'Puede agregar empleados,productos, zonas, etc\r\n', 600000),
(3, 304560948, '123', 'salasgates@hotmail.com', 1241454634, 'Masculino', 'Casado', 22, 'Solo puede vender\r\n', 350000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfactura`
--

CREATE TABLE `tbfactura` (
  `idFactura` int(11) NOT NULL,
  `telefonoPersona` int(11) NOT NULL,
  `fechaFactura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmateriaprima`
--

CREATE TABLE `tbmateriaprima` (
  `idMateriaPrima` int(11) NOT NULL,
  `nombreMateriaPrima` varchar(20) NOT NULL,
  `precioMateriaPrima` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpersona`
--

CREATE TABLE `tbpersona` (
  `telefonoPersona` int(11) NOT NULL,
  `nombrePersona` varchar(20) NOT NULL,
  `apellido1Persona` varchar(20) NOT NULL,
  `apellido2Persona` varchar(20) NOT NULL,
  `tipoUsuarioPersona` varchar(20) NOT NULL,
  `idZona` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproducto`
--

CREATE TABLE `tbproducto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(20) NOT NULL,
  `precioProducto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventa`
--

CREATE TABLE `tbventa` (
  `idVenta` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `cantidadProductoVenta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idZona` int(11) NOT NULL,
  `totalVenta` double NOT NULL,
  `pagaVenta` double NOT NULL,
  `vueltoVenta` double NOT NULL,
  `idFactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbzona`
--

CREATE TABLE `tbzona` (
  `idZona` int(11) NOT NULL,
  `nombreZona` varchar(20) NOT NULL,
  `precioZona` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `tbfactura`
--
ALTER TABLE `tbfactura`
  ADD PRIMARY KEY (`idFactura`);

--
-- Indices de la tabla `tbmateriaprima`
--
ALTER TABLE `tbmateriaprima`
  ADD PRIMARY KEY (`idMateriaPrima`);

--
-- Indices de la tabla `tbpersona`
--
ALTER TABLE `tbpersona`
  ADD PRIMARY KEY (`telefonoPersona`);

--
-- Indices de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `tbventa`
--
ALTER TABLE `tbventa`
  ADD PRIMARY KEY (`idVenta`);

--
-- Indices de la tabla `tbzona`
--
ALTER TABLE `tbzona`
  ADD PRIMARY KEY (`idZona`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

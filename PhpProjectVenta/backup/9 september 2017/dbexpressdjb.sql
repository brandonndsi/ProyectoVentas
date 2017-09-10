-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-09-2017 a las 14:06:25
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbexpressdjb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbclientes`
--

CREATE TABLE `tbclientes` (
  `clienteid` int(20) NOT NULL,
  `personaid` varchar(20) NOT NULL,
  `clientedireccionexacta` varchar(200) NOT NULL,
  `clientedescuento` double NOT NULL,
  `clienteacumulado` int(11) NOT NULL,
  `clienteestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbclientes`
--

INSERT INTO `tbclientes` (`clienteid`, `personaid`, `clientedireccionexacta`, `clientedescuento`, `clienteacumulado`, `clienteestado`) VALUES
(1, '4', '300 metros oeste de rio frio', 0.03, 50, 1),
(2, '5', 'barrio san marcos frente a la universidad nacional\r\n', 0.05, 70, 1),
(3, '17', 'cenenterio', 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcontrolproductos`
--

CREATE TABLE `tbcontrolproductos` (
  `productoid` varchar(20) NOT NULL,
  `materiaprimaid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcontrolproductos`
--

INSERT INTO `tbcontrolproductos` (`productoid`, `materiaprimaid`) VALUES
('P1', 'MP1'),
('P2', 'MP1'),
('P3', 'MP34'),
('P3', 'PM7'),
('P4', 'MP1'),
('P4', 'MP4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleadolicencias`
--

CREATE TABLE `tbempleadolicencias` (
  `empleadolicenciaid` varchar(20) NOT NULL,
  `empleadolicenciavigencia` year(4) NOT NULL,
  `vehiculoid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleadolicencias`
--

INSERT INTO `tbempleadolicencias` (`empleadolicenciaid`, `empleadolicenciavigencia`, `vehiculoid`) VALUES
('L1', 2019, '1'),
('L2', 2021, '2'),
('L3', 2025, '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleados`
--

CREATE TABLE `tbempleados` (
  `empleadoid` varchar(20) NOT NULL,
  `personaid` varchar(20) NOT NULL,
  `tipoempleado` varchar(20) NOT NULL,
  `empleadocedula` varchar(20) NOT NULL,
  `empleadocontrasenia` varchar(30) NOT NULL,
  `empleadoedad` int(11) NOT NULL,
  `empleadosexo` varchar(10) NOT NULL,
  `empleadoestadocivil` varchar(20) NOT NULL,
  `empleadocuentabancaria` int(11) NOT NULL,
  `empleadolicenciaid` varchar(20) NOT NULL,
  `empleadoestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbempleados`
--

INSERT INTO `tbempleados` (`empleadoid`, `personaid`, `tipoempleado`, `empleadocedula`, `empleadocontrasenia`, `empleadoedad`, `empleadosexo`, `empleadoestadocivil`, `empleadocuentabancaria`, `empleadolicenciaid`, `empleadoestado`) VALUES
('1', '1', 'Administrador', '207210905', '2904017b', 23, 'Masculino', 'Soltero', 1244251234, 'L2', 1),
('2', '2', 'Motorisado', '609870234', '12345', 23, 'Masculino', 'Union Libre', 1265748392, 'L1', 1),
('3', '3', 'Cajero', '304560948', '123', 22, 'Masculino', 'Casado', 1241454634, 'L3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfacturas`
--

CREATE TABLE `tbfacturas` (
  `facturaid` varchar(50) NOT NULL,
  `empleadoid` varchar(50) NOT NULL,
  `clienteid` varchar(50) NOT NULL,
  `ventafecha` date NOT NULL,
  `ventabruta` double NOT NULL,
  `ventaneta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbfacturas`
--

INSERT INTO `tbfacturas` (`facturaid`, `empleadoid`, `clienteid`, `ventafecha`, `ventabruta`, `ventaneta`) VALUES
('199F', 'E1', 'C2', '2017-09-10', 6100, 5795),
('200F', 'E1', 'C1', '2017-09-08', 6500, 6305),
('207F', 'E3', 'C2', '2017-09-08', 3500, 3325),
('27F', 'E3', 'C1', '2017-09-15', 5500, 5335),
('78F', 'E3', 'C2', '2017-09-20', 6000, 5700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmateriasprimas`
--

CREATE TABLE `tbmateriasprimas` (
  `materiaprimaid` int(11) NOT NULL,
  `materiaprimacodigo` varchar(50) NOT NULL,
  `materiaprimanombre` varchar(50) NOT NULL,
  `materiaprimaprecio` varchar(50) NOT NULL,
  `materiaprimacantidad` varchar(50) NOT NULL,
  `tipomateriaprimaid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmateriasprimas`
--

INSERT INTO `tbmateriasprimas` (`materiaprimaid`, `materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, `materiaprimacantidad`, `tipomateriaprimaid`) VALUES
(1, 'M1', 'tomate', '250', '10', '1'),
(2, 'L1', 'Desinfectante', '800', '15', '2'),
(3, 'M2', 'Lechuga', '500', '25', '1'),
(4, 'M4', 'Pan', '600', '35', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpersonas`
--

CREATE TABLE `tbpersonas` (
  `personaid` int(20) NOT NULL,
  `personanombre` varchar(20) NOT NULL,
  `personaapellido1` varchar(20) NOT NULL,
  `personaapellido2` varchar(20) NOT NULL,
  `personatelefono` int(11) NOT NULL,
  `personacorreo` varchar(50) NOT NULL,
  `zonaid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpersonas`
--

INSERT INTO `tbpersonas` (`personaid`, `personanombre`, `personaapellido1`, `personaapellido2`, `personatelefono`, `personacorreo`, `zonaid`) VALUES
(1, 'Brandon', 'Rodriguez', 'Mendez', 62091232, 'brandon-ndsi@hotmail.com', '1'),
(2, 'Juan', 'Chavarria', 'Arroyo', 14358765, 'juaracha@gmail.com', '2'),
(3, 'David', 'Salas', 'Salas', 73950274, 'salasgates@hotmail.com', '3'),
(4, 'Elisabeth', 'Rodriguez', 'Castro', 12345436, 'elirodri@gmail.com', '2'),
(5, 'Oscar', 'Mejias', 'Morera', 88940376, 'oscmeji@hotmail.com', '2'),
(15, 'da', 'e', 'e', 1111, 'wee@gmail.com', '3'),
(16, 'David rico', 'zalazar', 'lorente', 8888, 'yoansalas76@gmail.com', 'z1'),
(17, 'pedro', 'salas', 'picado', 58968, 'ddsd@gmail.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductos`
--

CREATE TABLE `tbproductos` (
  `productoid` int(11) NOT NULL,
  `productocodigo` varchar(50) NOT NULL,
  `productonombre` varchar(50) NOT NULL,
  `productoprecio` varchar(50) NOT NULL,
  `productoestado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproductos`
--

INSERT INTO `tbproductos` (`productoid`, `productocodigo`, `productonombre`, `productoprecio`, `productoestado`) VALUES
(3, 'M3', 'papas fritas', '120', '1'),
(4, 'M4', 'Pizza grande', '2500', '1'),
(6, 'M7', '2 piesas y un refresco', '2000', '1'),
(7, 'm56', 'fff', '8969', '1'),
(8, 'gfg', 'fdv', '558', '1'),
(9, 'pp', 'cd', '343', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoempleados`
--

CREATE TABLE `tbtipoempleados` (
  `tipoempleado` varchar(20) NOT NULL,
  `tipoempleadosalariobase` double NOT NULL,
  `tipoempleadodescripcion` text NOT NULL,
  `tipoempleadohoraextra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbtipoempleados`
--

INSERT INTO `tbtipoempleados` (`tipoempleado`, `tipoempleadosalariobase`, `tipoempleadodescripcion`, `tipoempleadohoraextra`) VALUES
('Administrador', 600000, 'Puede agregar,modificar,buscar y eliminar:(zonas,productos,cajeros,persona,precios,combos, etc...', 2000),
('Cajero', 350000, 'Puede realizar una venta y registrar personas.', 2000),
('Motorisado', 250000, 'viaja a la direccion de los clientes y reparte el pedido.\r\n', 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipomateriasprimas`
--

CREATE TABLE `tbtipomateriasprimas` (
  `tipomateriaprimaid` int(20) NOT NULL,
  `tipomateriaprimacategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipomateriasprimas`
--

INSERT INTO `tbtipomateriasprimas` (`tipomateriaprimaid`, `tipomateriaprimacategoria`) VALUES
(1, 'Alimento'),
(2, 'Limpieza'),
(3, 'Residuo'),
(4, 'Plastico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbvehiculos`
--

CREATE TABLE `tbvehiculos` (
  `vehiculoid` int(11) NOT NULL,
  `vehiculomodelo` varchar(50) NOT NULL,
  `vehiculoplaca` varchar(50) NOT NULL,
  `vehiculomarca` varchar(50) NOT NULL,
  `vehiculoestado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbvehiculos`
--

INSERT INTO `tbvehiculos` (`vehiculoid`, `vehiculomodelo`, `vehiculoplaca`, `vehiculomarca`, `vehiculoestado`) VALUES
(1, '2014', '4785855', 'Honda', '1'),
(2, '2000', '578696', 'Subaru', '1'),
(3, '2016', '2568955', 'TOYOTA', '1'),
(4, '1990', '6978588', 'Tesla', '1'),
(5, '2017', 'da2566', 'BMV', '1'),
(6, '20', '3342332', 'Subaru impresa', '1'),
(7, '2018', '2018', 'lamborgini', '0'),
(8, '1992', '23', 'subaru', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventas`
--

CREATE TABLE `tbventas` (
  `ventaid` varchar(50) NOT NULL,
  `facturaid` varchar(50) NOT NULL,
  `productoid` varchar(50) NOT NULL,
  `facturacantidadproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbventas`
--

INSERT INTO `tbventas` (`ventaid`, `facturaid`, `productoid`, `facturacantidadproducto`) VALUES
('1', '200F', 'P2', 1),
('2', '207F', 'P1', 1),
('3', '199F', 'P3', 3),
('4', '27F', 'P4', 1),
('5', '78F', 'P1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbzonas`
--

CREATE TABLE `tbzonas` (
  `zonaid` int(11) NOT NULL,
  `zonanombre` varchar(50) NOT NULL,
  `zonaprecio` varchar(50) NOT NULL,
  `zonaestado` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbzonas`
--

INSERT INTO `tbzonas` (`zonaid`, `zonanombre`, `zonaprecio`, `zonaestado`) VALUES
(1, 'rio cuarto', '3500', '1'),
(2, 'Rio Frio', '1500', '1'),
(3, 'Finca 6', '2000', '1'),
(4, 'Finca 11', '3000', '1'),
(5, 'Finca 2', '1000', '1'),
(6, 'La Virgen', '3500', '1'),
(7, 'UNA', '100', '1'),
(8, 'san jose', '155', '1'),
(9, 'tres pino', '2', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD PRIMARY KEY (`clienteid`),
  ADD KEY `personaid` (`personaid`);

--
-- Indices de la tabla `tbcontrolproductos`
--
ALTER TABLE `tbcontrolproductos`
  ADD KEY `productoid` (`productoid`,`materiaprimaid`),
  ADD KEY `materiaprimaid` (`materiaprimaid`);

--
-- Indices de la tabla `tbempleadolicencias`
--
ALTER TABLE `tbempleadolicencias`
  ADD PRIMARY KEY (`empleadolicenciaid`),
  ADD KEY `vehiculoid` (`vehiculoid`);

--
-- Indices de la tabla `tbempleados`
--
ALTER TABLE `tbempleados`
  ADD PRIMARY KEY (`empleadoid`),
  ADD KEY `tipoEmpleado` (`tipoempleado`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `empleadolicenciaid` (`empleadolicenciaid`);

--
-- Indices de la tabla `tbfacturas`
--
ALTER TABLE `tbfacturas`
  ADD PRIMARY KEY (`facturaid`),
  ADD KEY `empleadoid` (`empleadoid`),
  ADD KEY `clienteid` (`clienteid`);

--
-- Indices de la tabla `tbmateriasprimas`
--
ALTER TABLE `tbmateriasprimas`
  ADD PRIMARY KEY (`materiaprimaid`);

--
-- Indices de la tabla `tbpersonas`
--
ALTER TABLE `tbpersonas`
  ADD PRIMARY KEY (`personaid`),
  ADD KEY `zonaid` (`zonaid`);

--
-- Indices de la tabla `tbproductos`
--
ALTER TABLE `tbproductos`
  ADD PRIMARY KEY (`productoid`);

--
-- Indices de la tabla `tbtipoempleados`
--
ALTER TABLE `tbtipoempleados`
  ADD PRIMARY KEY (`tipoempleado`);

--
-- Indices de la tabla `tbtipomateriasprimas`
--
ALTER TABLE `tbtipomateriasprimas`
  ADD PRIMARY KEY (`tipomateriaprimaid`);

--
-- Indices de la tabla `tbvehiculos`
--
ALTER TABLE `tbvehiculos`
  ADD PRIMARY KEY (`vehiculoid`),
  ADD KEY `vehiculoid` (`vehiculoid`);

--
-- Indices de la tabla `tbventas`
--
ALTER TABLE `tbventas`
  ADD PRIMARY KEY (`ventaid`),
  ADD KEY `facturaid` (`facturaid`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `tbzonas`
--
ALTER TABLE `tbzonas`
  ADD PRIMARY KEY (`zonaid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `clienteid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbmateriasprimas`
--
ALTER TABLE `tbmateriasprimas`
  MODIFY `materiaprimaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbpersonas`
--
ALTER TABLE `tbpersonas`
  MODIFY `personaid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tbproductos`
--
ALTER TABLE `tbproductos`
  MODIFY `productoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbtipomateriasprimas`
--
ALTER TABLE `tbtipomateriasprimas`
  MODIFY `tipomateriaprimaid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbvehiculos`
--
ALTER TABLE `tbvehiculos`
  MODIFY `vehiculoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tbzonas`
--
ALTER TABLE `tbzonas`
  MODIFY `zonaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

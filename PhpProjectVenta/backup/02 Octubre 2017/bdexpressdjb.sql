-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2017 a las 05:23:21
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
-- Base de datos: `bdexpressdjb`
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
  `clienteestado` tinyint(1) NOT NULL,
  `zonaid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbclientes`
--

INSERT INTO `tbclientes` (`clienteid`, `personaid`, `clientedireccionexacta`, `clientedescuento`, `clienteacumulado`, `clienteestado`, `zonaid`) VALUES
(7, '5', 'horquetas norte', 0, 0, 1, ''),
(10, '18', 'la victoria', 0, 0, 1, ''),
(12, '19', 'cerquita de aqui', 0, 0, 1, ''),
(13, '20', 'por alla', 0, 0, 1, ''),
(14, '21', 'cerca de mi casa', 0, 0, 1, ''),
(15, '22', 'alla no mas', 0, 0, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcompras`
--

CREATE TABLE `tbcompras` (
  `compraid` int(20) NOT NULL,
  `productoid` varchar(20) NOT NULL,
  `compracantidadproducto` int(40) NOT NULL,
  `compraestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('P1', 'MP1'),
('P2', 'MP1'),
('P2', 'MP1'),
('P3', 'MP34'),
('P3', 'MP34'),
('P3', 'PM7'),
('P3', 'PM7'),
('P4', 'MP1'),
('P4', 'MP1'),
('P4', 'MP4'),
('P4', 'MP4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleadolicencias`
--

CREATE TABLE `tbempleadolicencias` (
  `empleadolicenciaid` varchar(20) NOT NULL,
  `empleadolicenciatipo` varchar(20) NOT NULL,
  `empleadolicenciavigencia` year(4) NOT NULL,
  `vehiculoid` varchar(20) NOT NULL,
  `empleadolicenciasestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleadolicencias`
--

INSERT INTO `tbempleadolicencias` (`empleadolicenciaid`, `empleadolicenciatipo`, `empleadolicenciavigencia`, `vehiculoid`, `empleadolicenciasestado`) VALUES
('L1', 'B1', 2019, '1', 1),
('L2', 'B1', 2021, '2', 1),
('L3', 'B1', 2025, '3', 1);

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
  `facturafecha` date NOT NULL,
  `facturabruta` double NOT NULL,
  `facturaneta` double NOT NULL,
  `facturaestado` tinyint(4) NOT NULL,
  `compraid` varchar(50) NOT NULL,
  `tipocompraid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbfacturas`
--

INSERT INTO `tbfacturas` (`facturaid`, `empleadoid`, `clienteid`, `facturafecha`, `facturabruta`, `facturaneta`, `facturaestado`, `compraid`, `tipocompraid`) VALUES
('199F', 'E1', 'C2', '2017-09-10', 6100, 5795, 1, '', ''),
('200F', 'E1', 'C1', '2017-09-08', 6500, 6305, 1, '', ''),
('207F', 'E3', 'C2', '2017-09-08', 3500, 3325, 1, '', ''),
('27F', 'E3', 'C1', '2017-09-15', 5500, 5335, 1, '', ''),
('78F', 'E3', 'C2', '2017-09-20', 6000, 5700, 1, '', '');

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
  `tipomateriaprimaid` varchar(50) NOT NULL,
  `materiaprimaidestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmateriasprimas`
--

INSERT INTO `tbmateriasprimas` (`materiaprimaid`, `materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, `materiaprimacantidad`, `tipomateriaprimaid`, `materiaprimaidestado`) VALUES
(1, 'M1', 'tomate', '250', '10', '1', 1),
(2, 'L1', 'Desinfectante', '800', '15', '2', 1),
(3, 'M2', 'Lechuga', '500', '25', '1', 1),
(4, 'M4', 'Pan', '600', '35', '1', 1),
(5, 'aksdg', 'dfb', '13', '123', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmillas`
--

CREATE TABLE `tbmillas` (
  `millaid` int(40) NOT NULL,
  `clienteid` int(40) NOT NULL,
  `millacantidad` bigint(40) NOT NULL,
  `millaestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `zonaid` varchar(20) NOT NULL,
  `personaestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpersonas`
--

INSERT INTO `tbpersonas` (`personaid`, `personanombre`, `personaapellido1`, `personaapellido2`, `personatelefono`, `personacorreo`, `zonaid`, `personaestado`) VALUES
(1, 'Brandon', 'Rodriguez', 'Mendez', 62091232, 'brandon-ndsi@hotmail.com', '1', 1),
(2, 'Juan', 'Chavarria', 'Arroyo', 14358765, 'juaracha@gmail.com', '2', 1),
(3, 'David', 'Salas', 'Salas', 73950274, 'salasgates@hotmail.com', '3', 1),
(4, 'Elisabeth', 'Rodriguez', 'Castro', 12345436, 'elirodri@gmail.com', '2', 1),
(5, 'Oscar', 'Mejias', 'Morera', 88940376, 'oscmeji@hotmail.com', '2', 1),
(6, 'hola', 'aaa', 'bbb', 2222, 'aaa@hotmail.com', '1', 1),
(19, 'alba', 'rios', 'carnaval', 23423, 'asdma@mail.com', '2', 1),
(20, 'Ruben', 'chaves', 'sdkjf', 236423, 'rubrxk@hotmai.com', '2', 1),
(21, 'keneth', 'flores', 'rivera', 34534634, 'askjdhas@hot.com', '1', 1),
(22, 'juan', 'roas', 'fernds', 2133342, 'jarofe@mail.com', 'Z1', 1);

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
(8, '8', 'hola', '12321', '1'),
(9, 'P7', 'pizza', '7600', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedores`
--

CREATE TABLE `tbproveedores` (
  `proveedorid` int(11) NOT NULL,
  `personaid` int(11) NOT NULL,
  `materiaprimaid` int(11) NOT NULL,
  `proveedorcantidadproducto` int(11) NOT NULL,
  `proveedortotalproducto` double NOT NULL,
  `proveedorestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproveedores`
--

INSERT INTO `tbproveedores` (`proveedorid`, `personaid`, `materiaprimaid`, `proveedorcantidadproducto`, `proveedortotalproducto`, `proveedorestado`) VALUES
(1, 6, 2, 50, 25000, 1),
(2, 19, 3, 15, 15000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipocompras`
--

CREATE TABLE `tbtipocompras` (
  `tipocompraid` int(11) NOT NULL,
  `timpocmpracondicion` varchar(40) NOT NULL,
  `tipocompraestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoempleados`
--

CREATE TABLE `tbtipoempleados` (
  `tipoempleadoid` varchar(20) NOT NULL,
  `tipoempleadosalariobase` double NOT NULL,
  `tipoempleadodescripcion` text NOT NULL,
  `tipoempleadohoraextra` double NOT NULL,
  `tipoempleadoestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbtipoempleados`
--

INSERT INTO `tbtipoempleados` (`tipoempleadoid`, `tipoempleadosalariobase`, `tipoempleadodescripcion`, `tipoempleadohoraextra`, `tipoempleadoestado`) VALUES
('Administrador', 600000, 'Puede agregar,modificar,buscar y eliminar:(zonas,productos,cajeros,persona,precios,combos, etc...', 2000, 1),
('Motorisado', 250000, 'viaja a la direccion de los clientes y reparte el pedido.\r\n', 2000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipomateriasprimas`
--

CREATE TABLE `tbtipomateriasprimas` (
  `tipomateriaprimaid` int(20) NOT NULL,
  `tipomateriaprimacategoria` varchar(20) NOT NULL,
  `tipomateriasprimasestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipomateriasprimas`
--

INSERT INTO `tbtipomateriasprimas` (`tipomateriaprimaid`, `tipomateriaprimacategoria`, `tipomateriasprimasestado`) VALUES
(1, 'Alimento', 1),
(2, 'Limpieza', 1),
(3, 'Residuo', 1),
(4, 'Plastico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbvehiculos`
--

CREATE TABLE `tbvehiculos` (
  `vehiculoid` int(11) NOT NULL,
  `vehiculomarca` varchar(50) NOT NULL,
  `vehiculoplaca` varchar(50) NOT NULL,
  `vehiculomodelo` varchar(50) NOT NULL,
  `vehiculoestado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbvehiculos`
--

INSERT INTO `tbvehiculos` (`vehiculoid`, `vehiculomarca`, `vehiculoplaca`, `vehiculomodelo`, `vehiculoestado`) VALUES
(1, 'YAMAHA', '1282', 'ybr-150', '1'),
(2, 'TOYOTA', '2568955', '2016', '1'),
(3, 'Honda', '9321', 'cs125', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbzonas`
--

CREATE TABLE `tbzonas` (
  `zonaid` int(20) NOT NULL,
  `zonanombre` varchar(20) NOT NULL,
  `zonaprecio` double NOT NULL,
  `zonaestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbzonas`
--

INSERT INTO `tbzonas` (`zonaid`, `zonanombre`, `zonaprecio`, `zonaestado`) VALUES
(1, 'PuertoViejo', 2000, 1),
(2, 'Horquetas', 1000, 1),
(3, 'Finca6', 1000, 1),
(4, 'Finca11', 500, 1);

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
-- Indices de la tabla `tbcompras`
--
ALTER TABLE `tbcompras`
  ADD PRIMARY KEY (`compraid`);

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
-- Indices de la tabla `tbmillas`
--
ALTER TABLE `tbmillas`
  ADD PRIMARY KEY (`millaid`);

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
-- Indices de la tabla `tbproveedores`
--
ALTER TABLE `tbproveedores`
  ADD PRIMARY KEY (`proveedorid`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `materiaprimaid` (`materiaprimaid`);

--
-- Indices de la tabla `tbtipocompras`
--
ALTER TABLE `tbtipocompras`
  ADD PRIMARY KEY (`tipocompraid`);

--
-- Indices de la tabla `tbtipoempleados`
--
ALTER TABLE `tbtipoempleados`
  ADD PRIMARY KEY (`tipoempleadoid`);

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
-- Indices de la tabla `tbzonas`
--
ALTER TABLE `tbzonas`
  ADD PRIMARY KEY (`zonaid`),
  ADD KEY `zonaid` (`zonaid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `clienteid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tbcompras`
--
ALTER TABLE `tbcompras`
  MODIFY `compraid` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbmateriasprimas`
--
ALTER TABLE `tbmateriasprimas`
  MODIFY `materiaprimaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbmillas`
--
ALTER TABLE `tbmillas`
  MODIFY `millaid` int(40) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbpersonas`
--
ALTER TABLE `tbpersonas`
  MODIFY `personaid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `tbproductos`
--
ALTER TABLE `tbproductos`
  MODIFY `productoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbproveedores`
--
ALTER TABLE `tbproveedores`
  MODIFY `proveedorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbtipocompras`
--
ALTER TABLE `tbtipocompras`
  MODIFY `tipocompraid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbtipomateriasprimas`
--
ALTER TABLE `tbtipomateriasprimas`
  MODIFY `tipomateriaprimaid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbvehiculos`
--
ALTER TABLE `tbvehiculos`
  MODIFY `vehiculoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbzonas`
--
ALTER TABLE `tbzonas`
  MODIFY `zonaid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

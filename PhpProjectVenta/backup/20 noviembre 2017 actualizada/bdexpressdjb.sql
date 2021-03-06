-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2017 a las 14:14:58
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `tbcategoriaproducto`
--

CREATE TABLE `tbcategoriaproducto` (
  `categoriaproductoid` int(11) NOT NULL,
  `categoriaproductonombre` varchar(50) NOT NULL,
  `categoriaproductoestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcategoriaproducto`
--

INSERT INTO `tbcategoriaproducto` (`categoriaproductoid`, `categoriaproductonombre`, `categoriaproductoestado`) VALUES
(1, 'Refrescos', 1),
(2, 'Pizza', 1),
(3, 'Hamburguesas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbclientes`
--

CREATE TABLE `tbclientes` (
  `clienteid` int(20) NOT NULL,
  `personaid` varchar(20) NOT NULL,
  `millaid` int(11) NOT NULL,
  `clientedireccionexacta` varchar(200) NOT NULL,
  `clientedescuento` double NOT NULL,
  `clienteacumulado` int(11) NOT NULL,
  `clienteestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbclientes`
--

INSERT INTO `tbclientes` (`clienteid`, `personaid`, `millaid`, `clientedireccionexacta`, `clientedescuento`, `clienteacumulado`, `clienteestado`) VALUES
(1, '1', 1, 'marsella', 0, 0, 1),
(2, '2', 2, 'la victoria', 0, 0, 1),
(3, '3', 3, 'por alla', 0, 0, 1),
(4, '4', 4, 'cerca de mi casa', 0, 0, 1),
(5, '5', 5, 'alla no mas', 0, 0, 1),
(6, '6', 6, 'erew', 0, 0, 1),
(7, '19', 7, 'rio frio', 0, 0, 0),
(8, '20', 8, 'cerquita de aqui', 0, 0, 0),
(25, '32', 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcombos`
--

CREATE TABLE `tbcombos` (
  `combosid` int(11) NOT NULL,
  `combocodigo` varchar(50) NOT NULL,
  `combonombre` varchar(50) NOT NULL,
  `combosproductoid` text NOT NULL,
  `comboingredientes` varchar(100) NOT NULL,
  `comboprecio` int(11) NOT NULL,
  `comboestado` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcombos`
--

INSERT INTO `tbcombos` (`combosid`, `combocodigo`, `combonombre`, `combosproductoid`, `comboingredientes`, `comboprecio`, `comboestado`) VALUES
(1, 'C1', 'tacos y piza', 'M1,M2,M3,M4', 'salsa', 5000, 1),
(2, 'C2', 'pizzza y refresco', 'M1,M2', 'pizza', 2500, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcombosproductos`
--

CREATE TABLE `tbcombosproductos` (
  `combosproductosid` int(11) NOT NULL,
  `combosid` int(11) NOT NULL,
  `productoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcombosproductos`
--

INSERT INTO `tbcombosproductos` (`combosproductosid`, `combosid`, `productoid`) VALUES
(1, 1, 3),
(2, 2, 3),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcompras`
--

CREATE TABLE `tbcompras` (
  `compraid` int(20) NOT NULL,
  `materiaprima` varchar(20) NOT NULL,
  `compracantidad` int(40) NOT NULL,
  `compraestado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcompras`
--

INSERT INTO `tbcompras` (`compraid`, `materiaprima`, `compracantidad`, `compraestado`) VALUES
(0, 'coca grande', 20, '1'),
(1, 'pizza', 15, '1'),
(2, 'coca mediana', 20, '1');

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
('1', 'B1', 2019, '1', 1),
('2', 'B1', 2021, '2', 1),
('3', 'B1', 2025, '3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleados`
--

CREATE TABLE `tbempleados` (
  `empleadoid` int(11) NOT NULL,
  `personaid` varchar(20) NOT NULL,
  `tipoempleado` varchar(20) NOT NULL,
  `empleadocedula` varchar(20) NOT NULL,
  `empleadofechaingreso` date NOT NULL,
  `empleadocontrasenia` varchar(20) NOT NULL,
  `empleadoedad` varchar(20) NOT NULL,
  `empleadosexo` varchar(10) NOT NULL,
  `empleadoestadocivil` varchar(20) NOT NULL,
  `empleadobanco` varchar(50) NOT NULL,
  `empleadocuentabancaria` varchar(50) NOT NULL,
  `empleadolicenciaid` varchar(20) NOT NULL,
  `empleadoestado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbempleados`
--

INSERT INTO `tbempleados` (`empleadoid`, `personaid`, `tipoempleado`, `empleadocedula`, `empleadofechaingreso`, `empleadocontrasenia`, `empleadoedad`, `empleadosexo`, `empleadoestadocivil`, `empleadobanco`, `empleadocuentabancaria`, `empleadolicenciaid`, `empleadoestado`) VALUES
(1, '1', 'Administrador', '206990365', '2017-10-03', 'Prueba12', '23', 'm', 'soltero', 'Nacional', '256889871', '1', '1'),
(3, '3', 'Motorisado', '207890584', '2017-10-01', '12345', '48', 'm', 'soltero', 'Costa rica', '78965542458', '2', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfacturas`
--

CREATE TABLE `tbfacturas` (
  `facturaid` varchar(50) NOT NULL,
  `ventaid` varchar(50) NOT NULL,
  `empleadoid` varchar(50) NOT NULL,
  `clienteid` varchar(50) NOT NULL,
  `facturafecha` date NOT NULL,
  `facturabruta` double NOT NULL,
  `facturaneta` double NOT NULL,
  `facturaestado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbfacturas`
--

INSERT INTO `tbfacturas` (`facturaid`, `ventaid`, `empleadoid`, `clienteid`, `facturafecha`, `facturabruta`, `facturaneta`, `facturaestado`) VALUES
('1', '1', '1', '3', '2017-09-10', 6100, 5795, 1),
('2', '5', '3', '2', '2017-09-08', 6500, 6305, 1),
('3', '2', '2', '3', '2017-09-08', 3500, 3325, 1),
('4', '3', '1', '4', '2017-09-15', 5500, 5335, 1),
('5', '4', '3', '5', '2017-09-20', 6000, 5700, 1);

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
  `materiaprimaidestado` tinyint(1) NOT NULL,
  `ultimacompra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbmateriasprimas`
--

INSERT INTO `tbmateriasprimas` (`materiaprimaid`, `materiaprimacodigo`, `materiaprimanombre`, `materiaprimaprecio`, `materiaprimacantidad`, `tipomateriaprimaid`, `materiaprimaidestado`, `ultimacompra`) VALUES
(1, 'M1', 'tomate', '250', '10', '1', 1, ''),
(2, 'L1', 'Desinfectante', '800', '15', '2', 1, ''),
(3, 'M2', 'Lechuga', '500', '25', '1', 1, ''),
(4, 'M4', 'Pan', '600', '35', '1', 1, ''),
(5, 'aksdg', 'dfb', '13', '123', '1', 0, '');

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

--
-- Volcado de datos para la tabla `tbmillas`
--

INSERT INTO `tbmillas` (`millaid`, `clienteid`, `millacantidad`, `millaestado`) VALUES
(1, 1, 0, 1),
(2, 2, 45, 1),
(3, 3, 40, 1),
(4, 4, 5, 1),
(5, 5, 0, 1),
(6, 6, 5, 1),
(7, 7, 10, 1),
(8, 8, 0, 1);

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
(1, 'Brandon Daniel', 'Rodriguez', 'MÃ©ndez', 62091232, 'brandon-ndsi@hotmail.com', '1', 1),
(2, 'Juan', 'Chavarria', 'Arroyo', 14358765, 'juaracha@gmail.com', '2', 1),
(3, 'David', 'Salas', 'Salas', 73950274, 'yoansalas76@gmail.com', '3', 1),
(4, 'Elisabeth', 'Rodriguez', 'Castro', 12345436, 'elirodri@gmail.com', '2', 1),
(5, 'Oscar', 'Mejias', 'Morera', 88940376, 'oscmeji@hotmail.com', '2', 1),
(6, 'hola', 'aaa', 'bbb', 2222, 'aaa@hotmail.com', '1', 1),
(19, 'alba', 'rios', 'carnaval', 23423, 'asdma@mail.com', '2', 1),
(20, 'Ruben', 'chaves', 'Angulo', 11236423, 'rubrxk@hotmai.com', '3', 1),
(21, 'keneth', 'flores', 'rivera', 34534634, 'askjdhas@hot.com', '1', 1),
(22, 'juan', 'roas', 'fernds', 2133342, 'jarofe@mail.com', 'Z1', 1),
(30, 'we', 'wreew', 'wer', 32433242, 'ewrew@gmail.com', '23r', 1),
(31, 'natalia', 'angulo', 'aguilera', 78906784, 'natalia@gmail.com', '2', 1),
(32, 'Gorge', 'Arias', 'Arias', 86756432, 'gorge@gmail.com', '2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpreferencias`
--

CREATE TABLE `tbpreferencias` (
  `preferenciasid` int(11) NOT NULL,
  `clienteid` int(11) NOT NULL,
  `productoid` int(11) NOT NULL,
  `preferenciasfecha` date NOT NULL,
  `preferenciasaccion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpreferencias`
--

INSERT INTO `tbpreferencias` (`preferenciasid`, `clienteid`, `productoid`, `preferenciasfecha`, `preferenciasaccion`) VALUES
(1, 5, 4, '2017-10-03', 'v'),
(2, 3, 3, '2017-10-06', 'e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductos`
--

CREATE TABLE `tbproductos` (
  `productoid` int(11) NOT NULL,
  `productocodigo` varchar(50) NOT NULL,
  `categoriaproductoid` int(11) NOT NULL,
  `productonombre` varchar(50) NOT NULL,
  `tamanoid` int(50) NOT NULL,
  `productoprecio` varchar(50) NOT NULL,
  `productocantidad` int(11) NOT NULL,
  `productodescripcion` text NOT NULL,
  `productoestado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproductos`
--

INSERT INTO `tbproductos` (`productoid`, `productocodigo`, `categoriaproductoid`, `productonombre`, `tamanoid`, `productoprecio`, `productocantidad`, `productodescripcion`, `productoestado`) VALUES
(3, 'M1', 2, 'papas', 1, '120', 100, 'son papas', '1'),
(4, 'M2', 2, 'Pizza grande', 3, '250', 100, 'es pizza', '1'),
(6, 'M3', 1, '2 piesas y un refresco', 3, '2000', 100, 'dos piezas', '1'),
(8, 'M4', 2, 'pollo entero', 1, '12321', 100, 'pollo entero', '1'),
(9, 'M5', 3, 'pizza italiana', 3, '7650', 100, 'pizza rica', '1'),
(10, 'M9', 2, 'mm', 3, '5000', 100, 'no es nada', '1'),
(11, 'M10', 2, 'azucar', 1, '12000', 100, 'nada', '1'),
(12, 'M11', 1, 'adasdas', 0, '', 100, '', '1'),
(13, 'J1', 1, 'adasdfd', 2000, '', 100, '', '1'),
(14, 'j2', 1, 'dsgfhfd', 3, '', 100, '4000', '1'),
(15, 'j3', 2, 'kalalsklas', 2, 'ajhdgJHGDJ', 100, '2300', '1'),
(16, 'j52', 2, 'lalala', 0, '5000', 100, 'kjasdhjsadh', '1'),
(17, 'K1', 1, 'cocacola', 0, '1200', 100, 'bebida', '1'),
(18, 'l3', 1, 'loco', 1, '100', 100, 'jHGDj', '1'),
(19, 'l3', 1, 'loco', 1, '100', 100, 'jHGDj', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedores`
--

CREATE TABLE `tbproveedores` (
  `proveedorid` int(11) NOT NULL,
  `personaid` int(11) NOT NULL,
  `materiaprimaid` int(11) NOT NULL,
  `proveedorproductosprimos` text NOT NULL,
  `proveedorestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproveedores`
--

INSERT INTO `tbproveedores` (`proveedorid`, `personaid`, `materiaprimaid`, `proveedorproductosprimos`, `proveedorestado`) VALUES
(1, 6, 2, 'M1,M2', 1),
(2, 19, 3, 'M1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtamano`
--

CREATE TABLE `tbtamano` (
  `tamanoid` int(11) NOT NULL,
  `tamanonombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtamano`
--

INSERT INTO `tbtamano` (`tamanoid`, `tamanonombre`) VALUES
(1, 'grande'),
(2, 'pequeño'),
(3, 'mediano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipo`
--

CREATE TABLE `tbtipo` (
  `tipoid` int(11) NOT NULL,
  `tiponombre` varchar(50) NOT NULL,
  `tipoestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipo`
--

INSERT INTO `tbtipo` (`tipoid`, `tiponombre`, `tipoestado`) VALUES
(1, 'pepsi', 1),
(2, 'coca cola', 1);

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
-- Estructura de tabla para la tabla `tbunidades`
--

CREATE TABLE `tbunidades` (
  `unidadid` int(11) NOT NULL,
  `unidadnombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbunidades`
--

INSERT INTO `tbunidades` (`unidadid`, `unidadnombre`) VALUES
(1, 'kg'),
(2, 'cajas'),
(3, 'litros'),
(4, 'libras'),
(5, 'bolsas');

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
(1, 'YAMAHA', '12845s', '1994', '1'),
(2, 'TOYOTA', '2568955', '2018', '0'),
(3, 'Honda', '4432', '2000', '0'),
(4, 'honda', '3432', '2000', '0'),
(5, 'MISUBICHI', 'lk789', '1999', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventas`
--

CREATE TABLE `tbventas` (
  `ventaid` int(11) NOT NULL,
  `ventaempleado` int(11) NOT NULL,
  `ventaproducto` varchar(20) NOT NULL,
  `ventacantidad` int(11) NOT NULL,
  `ventaestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbventas`
--

INSERT INTO `tbventas` (`ventaid`, `ventaempleado`, `ventaproducto`, `ventacantidad`, `ventaestado`) VALUES
(1, 3, 'coca', 2, 1),
(2, 3, 'fanta', 3, 1),
(3, 3, 'hamburguesa', 1, 1);

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
(4, 'Finca11', 500, 1),
(5, 'San ramon', 2500, 1),
(6, 'puerto gimenes', 2000, 1),
(7, 'RÃ­o gimenes', 2800, 1),
(8, 'Las palmitas', 1500, 1),
(9, 'rr', 432, 0),
(10, 'Marsella', 3000, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbcategoriaproducto`
--
ALTER TABLE `tbcategoriaproducto`
  ADD PRIMARY KEY (`categoriaproductoid`);

--
-- Indices de la tabla `tbclientes`
--
ALTER TABLE `tbclientes`
  ADD PRIMARY KEY (`clienteid`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `millaid` (`millaid`);

--
-- Indices de la tabla `tbcombos`
--
ALTER TABLE `tbcombos`
  ADD PRIMARY KEY (`combosid`);

--
-- Indices de la tabla `tbcombosproductos`
--
ALTER TABLE `tbcombosproductos`
  ADD PRIMARY KEY (`combosproductosid`),
  ADD KEY `combosid` (`combosid`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `tbcompras`
--
ALTER TABLE `tbcompras`
  ADD PRIMARY KEY (`compraid`);

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
  ADD KEY `personaid` (`personaid`),
  ADD KEY `tipoempleado` (`tipoempleado`),
  ADD KEY `empleadolicenciaid` (`empleadolicenciaid`);

--
-- Indices de la tabla `tbfacturas`
--
ALTER TABLE `tbfacturas`
  ADD PRIMARY KEY (`facturaid`),
  ADD KEY `empleadoid` (`empleadoid`),
  ADD KEY `clienteid` (`clienteid`),
  ADD KEY `compraid` (`ventaid`);

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
-- Indices de la tabla `tbpreferencias`
--
ALTER TABLE `tbpreferencias`
  ADD PRIMARY KEY (`preferenciasid`);

--
-- Indices de la tabla `tbproductos`
--
ALTER TABLE `tbproductos`
  ADD PRIMARY KEY (`productoid`),
  ADD KEY `tamano` (`tamanoid`),
  ADD KEY `categoriaproductoid` (`categoriaproductoid`);

--
-- Indices de la tabla `tbproveedores`
--
ALTER TABLE `tbproveedores`
  ADD PRIMARY KEY (`proveedorid`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `materiaprimaid` (`materiaprimaid`);

--
-- Indices de la tabla `tbtamano`
--
ALTER TABLE `tbtamano`
  ADD PRIMARY KEY (`tamanoid`);

--
-- Indices de la tabla `tbtipo`
--
ALTER TABLE `tbtipo`
  ADD PRIMARY KEY (`tipoid`);

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
-- Indices de la tabla `tbunidades`
--
ALTER TABLE `tbunidades`
  ADD PRIMARY KEY (`unidadid`);

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
  ADD PRIMARY KEY (`ventaid`);

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
-- AUTO_INCREMENT de la tabla `tbcategoriaproducto`
--
ALTER TABLE `tbcategoriaproducto`
  MODIFY `categoriaproductoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbclientes`
--
ALTER TABLE `tbclientes`
  MODIFY `clienteid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `tbcombos`
--
ALTER TABLE `tbcombos`
  MODIFY `combosid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbcombosproductos`
--
ALTER TABLE `tbcombosproductos`
  MODIFY `combosproductosid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbmateriasprimas`
--
ALTER TABLE `tbmateriasprimas`
  MODIFY `materiaprimaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbmillas`
--
ALTER TABLE `tbmillas`
  MODIFY `millaid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tbpersonas`
--
ALTER TABLE `tbpersonas`
  MODIFY `personaid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `tbpreferencias`
--
ALTER TABLE `tbpreferencias`
  MODIFY `preferenciasid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbproductos`
--
ALTER TABLE `tbproductos`
  MODIFY `productoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tbproveedores`
--
ALTER TABLE `tbproveedores`
  MODIFY `proveedorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbtamano`
--
ALTER TABLE `tbtamano`
  MODIFY `tamanoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbtipo`
--
ALTER TABLE `tbtipo`
  MODIFY `tipoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbtipomateriasprimas`
--
ALTER TABLE `tbtipomateriasprimas`
  MODIFY `tipomateriaprimaid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbunidades`
--
ALTER TABLE `tbunidades`
  MODIFY `unidadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbvehiculos`
--
ALTER TABLE `tbvehiculos`
  MODIFY `vehiculoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbventas`
--
ALTER TABLE `tbventas`
  MODIFY `ventaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbzonas`
--
ALTER TABLE `tbzonas`
  MODIFY `zonaid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

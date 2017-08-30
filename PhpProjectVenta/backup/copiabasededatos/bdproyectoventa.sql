-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2017 a las 23:31:15
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarempleado` (IN `empleadoid` VARCHAR(20))  NO SQL
SELECT * FROM tbempleados e
    INNER JOIN tbpersonas p ON e.personaid= p.personaid
    INNER JOIN tbzonas z ON p.zonaid= z.zonaid
    INNER JOIN tbtipoempleados t ON e.tipoempleado= t.tipoempleado
    INNER JOIN tbempleadolicencias el ON e.empleadolicenciaid= 	 el.empleadolicenciaid
    INNER JOIN tbvehiculos v ON el.vehiculoid= v.vehiculoid
    WHERE empleadoid = empleadoid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarpersona` (IN `persona` VARCHAR(50))  NO SQL
BEGIN

SELECT * FROM tbpersonas p INNER JOIN tbzonas z ON p.zonaid= z.zonaid 
		 WHERE personaid = personaid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarempleado` (IN `empleado` VARCHAR(50))  NO SQL
DELETE FROM tbempleados WHERE empleadoid=empleadoid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarpersona` (IN `persona` VARCHAR(50))  NO SQL
BEGIN

DELETE FROM tbpersonas WHERE personaid = personaid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarempleados` (IN `empleado` VARCHAR(50))  NO SQL
SELECT * FROM tbempleados e
    INNER JOIN tbpersonas p ON e.personaid= p.personaid
    INNER JOIN tbzonas z ON p.zonaid= z.zonaid
    INNER JOIN tbtipoempleados t ON e.tipoempleado= t.tipoempleado
    INNER JOIN tbempleadolicencias el ON e.empleadolicenciaid= 	 el.empleadolicenciaid
    INNER JOIN tbvehiculos v ON el.vehiculoid= v.vehiculoid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarpersonas` (IN `persona` VARCHAR(50))  NO SQL
BEGIN

SELECT * FROM tbpersonas p INNER JOIN tbzonas z ON p.zonaid= z.zonaid;
            
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbclientes`
--

CREATE TABLE `tbclientes` (
  `clienteid` varchar(20) NOT NULL,
  `personaid` varchar(20) NOT NULL,
  `clientedireccionexacta` varchar(200) NOT NULL,
  `clienteestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbclientes`
--

INSERT INTO `tbclientes` (`clienteid`, `personaid`, `clientedireccionexacta`, `clienteestado`) VALUES
('1', '4', 'Monte verde departamento lily, la victoria, rio frio\r\n', 1),
('2', '5', 'barrio san marcos frente a la universidad nacional\r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcontrolproductos`
--

CREATE TABLE `tbcontrolproductos` (
  `productoid` varchar(50) NOT NULL,
  `materiaprimaid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `facturaid` varchar(20) NOT NULL,
  `personaid` varchar(20) NOT NULL,
  `facturafecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbfacturas`
--

INSERT INTO `tbfacturas` (`facturaid`, `personaid`, `facturafecha`) VALUES
('1', '4', '2017-08-01'),
('2', '4', '2017-08-04'),
('3', '5', '2017-08-04'),
('4', '6', '2017-08-09'),
('6', '5', '2017-08-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmateriasprimas`
--

CREATE TABLE `tbmateriasprimas` (
  `materiaprimaid` varchar(20) NOT NULL,
  `materiaprimanombre` varchar(20) NOT NULL,
  `materiaprimaprecio` double NOT NULL,
  `tipomateriaprimaid` varchar(20) NOT NULL,
  `materiaprimaestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbmateriasprimas`
--

INSERT INTO `tbmateriasprimas` (`materiaprimaid`, `materiaprimanombre`, `materiaprimaprecio`, `tipomateriaprimaid`, `materiaprimaestado`) VALUES
('MP 40', 'Desinfectante', 1500, '2', 1),
('MP1', 'Condimento', 9000, '1', 1),
('MP17', 'Aceite', 10000, '1', 1),
('MP34', 'Torta', 900, '1', 1),
('MP4', 'Tomate', 200, '1', 1),
('MP7', 'Pan', 1200, '1', 1),
('MP8', 'Pollo Entero', 1600, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpersonas`
--

CREATE TABLE `tbpersonas` (
  `personaid` varchar(20) NOT NULL,
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
('1', 'Brandon', 'Rodriguez', 'Mendez', 62091232, 'brandon-ndsi@hotmail.com', 'Z1', 1),
('2', 'Juan', 'Chavarria', 'Arroyo', 14358765, 'juaracha@gmail.com', 'Z3', 1),
('3', 'David', 'Salas', 'Salas', 73950274, 'salasgates@hotmail.com', 'Z4', 1),
('4', 'Elisabeth', 'Rodriguez', 'Castro', 12345436, 'elirodri@gmail.com', 'Z2', 1),
('5', 'Oscar', 'Mejias', 'Morera', 88940376, 'oscmeji@hotmail.com', 'Z2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductos`
--

CREATE TABLE `tbproductos` (
  `productoid` varchar(20) NOT NULL,
  `productonombre` varchar(20) NOT NULL,
  `productoprecio` double NOT NULL,
  `productoestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbproductos`
--

INSERT INTO `tbproductos` (`productoid`, `productonombre`, `productoprecio`, `productoestado`) VALUES
('P1', '1Pieza', 700, 1),
('P2', '2Piezas', 1300, 1),
('P3', '4Piezas', 2500, 1),
('P4', 'HamburquesaJunior', 1300, 1),
('P5', 'Combo1', 4000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproveedores`
--

CREATE TABLE `tbproveedores` (
  `proveedorid` varchar(50) NOT NULL,
  `proveedornombre` varchar(30) NOT NULL,
  `personaid` varchar(50) NOT NULL,
  `materiaprimaid` varchar(50) NOT NULL,
  `proveedorcantidadproducto` int(11) NOT NULL,
  `proveedortotalproducto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproveedores`
--

INSERT INTO `tbproveedores` (`proveedorid`, `proveedornombre`, `personaid`, `materiaprimaid`, `proveedorcantidadproducto`, `proveedortotalproducto`) VALUES
('1', 'Pollo Rey', '6', 'MP8', 50, 80000),
('2', 'Condimentos.S.A', '7', 'MP1', 2, 18000);

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
  `tipomateriaprimaid` varchar(20) NOT NULL,
  `tipomateriaprimacategoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtipomateriasprimas`
--

INSERT INTO `tbtipomateriasprimas` (`tipomateriaprimaid`, `tipomateriaprimacategoria`) VALUES
('1', 'Alimentos'),
('2', 'Limpieza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbvehiculos`
--

CREATE TABLE `tbvehiculos` (
  `vehiculoid` varchar(20) NOT NULL,
  `vehiculoplaca` varchar(20) NOT NULL,
  `vehiculomarca` varchar(20) NOT NULL,
  `vehiculomodelo` year(4) NOT NULL,
  `vehiculoestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbvehiculos`
--

INSERT INTO `tbvehiculos` (`vehiculoid`, `vehiculoplaca`, `vehiculomarca`, `vehiculomodelo`, `vehiculoestado`) VALUES
('1', '407776', 'Honda', 2008, 1),
('2', '608734', 'Hilux', 2017, 1),
('3', '490765', 'Yamaha', 2005, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbventas`
--

CREATE TABLE `tbventas` (
  `ventaid` varchar(20) NOT NULL,
  `empleadoid` varchar(20) NOT NULL,
  `productoid` varchar(11) NOT NULL,
  `ventacantidadproducto` int(11) NOT NULL,
  `ventatotal` double NOT NULL,
  `ventapagacon` double NOT NULL,
  `ventavuelto` double NOT NULL,
  `facturaid` varchar(20) NOT NULL,
  `zonaid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbventas`
--

INSERT INTO `tbventas` (`ventaid`, `empleadoid`, `productoid`, `ventacantidadproducto`, `ventatotal`, `ventapagacon`, `ventavuelto`, `facturaid`, `zonaid`) VALUES
('209', '3', '4', 1, 5500, 5500, 0, '4', '4'),
('300', '2', '3', 3, 6100, 7000, 900, '3', '3'),
('404', '2', '2', 1, 6500, 10000, 35000, '1', '1'),
('507', '3', '1', 1, 3500, 4000, 500, '2', '2'),
('602', '3', '1', 2, 6000, 6000, 0, '5', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbzonas`
--

CREATE TABLE `tbzonas` (
  `zonaid` varchar(20) NOT NULL,
  `zonanombre` varchar(20) NOT NULL,
  `zonaprecio` double NOT NULL,
  `zonaestado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `tbzonas`
--

INSERT INTO `tbzonas` (`zonaid`, `zonanombre`, `zonaprecio`, `zonaestado`) VALUES
('Z1', 'PuertoViejo', 2000, 1),
('Z2', 'Horquetas', 1000, 1),
('Z3', 'Finca6', 1000, 1),
('Z4', 'Finca11', 500, 1);

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
  ADD KEY `materiaprimaid` (`materiaprimaid`),
  ADD KEY `productoid` (`productoid`);

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
  ADD KEY `personaid` (`personaid`);

--
-- Indices de la tabla `tbmateriasprimas`
--
ALTER TABLE `tbmateriasprimas`
  ADD PRIMARY KEY (`materiaprimaid`),
  ADD KEY `tipomateriaprimaid` (`tipomateriaprimaid`);

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
  ADD PRIMARY KEY (`vehiculoid`);

--
-- Indices de la tabla `tbventas`
--
ALTER TABLE `tbventas`
  ADD PRIMARY KEY (`ventaid`),
  ADD KEY `idEmpleado` (`empleadoid`),
  ADD KEY `idProducto` (`productoid`),
  ADD KEY `idZona` (`zonaid`),
  ADD KEY `idFactura` (`facturaid`);

--
-- Indices de la tabla `tbzonas`
--
ALTER TABLE `tbzonas`
  ADD PRIMARY KEY (`zonaid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

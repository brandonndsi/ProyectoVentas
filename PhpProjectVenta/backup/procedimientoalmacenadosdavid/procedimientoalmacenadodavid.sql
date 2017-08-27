
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarempleado`(IN `empleado` VARCHAR(50))
    NO SQL
BEGIN

DELETE FROM tbempleados WHERE empleadocedula=empleado;

END$$
DELIMITER ;

//el crud de tipo de empleado seleccionar

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tipoempleadoseleccionar`(IN `tipo` VARCHAR(50))
BEGIN

SELECT tipoempleado, tipoempleadosalariobase, tipoempleadodescripcion, tipoempleadohoraextra FROM tbtipoempleados WHERE tipoempleado=tipo;

END$$
DELIMITER ;

//tipo de empleado modificar

ELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tipoempleadomodificar`(IN `tipo` VARCHAR(50), IN `tipoe` VARCHAR(50), IN `tiposa` VARCHAR(50), IN `tipodes` VARCHAR(50), IN `tipoho` VARCHAR(50))
    NO SQL
BEGIN

UPDATE tbtipoempleados SET tipoempleado=tipoe,tipoempleadosalariobase=tiposa,tipoempleadodescripcion=tipodes,tipoempleadohoraextra=tipoho WHERE tipoempleado=tipo;

END$$
DELIMITER ;

//tipo empleado eliminare


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tipoempleadoeliminar`(IN `tipo` VARCHAR(50))
BEGIN
 DELETE FROM tbtipoempleados WHERE tipoempleado=tipo;
END$$
DELIMITER ;

//insertar tipo de empleado

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `tipoempleadoinsertar`(IN `tipo` VARCHAR(50), IN `tiposa` VARCHAR(50), IN `tipodes` VARCHAR(50), IN `tipohora` VARCHAR(50))
    NO SQL
BEGIN

INSERT INTO tbtipoempleados(tipoempleado, tipoempleadosalariobase, tipoempleadodescripcion, tipoempleadohoraextra) VALUES (tipo,tiposa,tipodes,tipohora);

END$$
DELIMITER ;
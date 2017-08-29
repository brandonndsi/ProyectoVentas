///buscar empleado
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarempleado`(IN `empleadoid` VARCHAR(20))
    NO SQL
SELECT * FROM tbempleados e
    INNER JOIN tbpersonas p ON e.personaid= p.personaid
    INNER JOIN tbzonas z ON p.zonaid= z.zonaid
    INNER JOIN tbtipoempleados t ON e.tipoempleado= t.tipoempleado
    INNER JOIN tbempleadolicencias el ON e.empleadolicenciaid= 	 el.empleadolicenciaid
    INNER JOIN tbvehiculos v ON el.vehiculoid= v.vehiculoid
    WHERE empleadoid = empleadoid$$
DELIMITER ;

//buscar persona
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarpersona`(IN `persona` VARCHAR(50))
    NO SQL
BEGIN

SELECT * FROM tbpersonas p INNER JOIN tbzonas z ON p.zonaid= z.zonaid 
		 WHERE personaid = personaid;

END$$
DELIMITER ;

//mostrar empleados
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarempleados`(IN `empleado` VARCHAR(50))
    NO SQL
SELECT * FROM tbempleados e
    INNER JOIN tbpersonas p ON e.personaid= p.personaid
    INNER JOIN tbzonas z ON p.zonaid= z.zonaid
    INNER JOIN tbtipoempleados t ON e.tipoempleado= t.tipoempleado
    INNER JOIN tbempleadolicencias el ON e.empleadolicenciaid= 	 el.empleadolicenciaid
    INNER JOIN tbvehiculos v ON el.vehiculoid= v.vehiculoid$$
DELIMITER ;

//mostrar personas
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarpersonas`(IN `persona` VARCHAR(50))
    NO SQL
BEGIN

SELECT * FROM tbpersonas p INNER JOIN tbzonas z ON p.zonaid= z.zonaid;
            
END$$
DELIMITER ;

// eliminar empleado
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarempleado`(IN `empleado` VARCHAR(50))
    NO SQL
DELETE FROM tbempleados WHERE empleadoid=empleadoid$$
DELIMITER ;

// eliminar persona
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarpersona`(IN `persona` VARCHAR(50))
    NO SQL
BEGIN

DELETE FROM tbpersonas WHERE personaid = personaid;

END$$
DELIMITER ;
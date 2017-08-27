DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscarempleado`(IN `empleadoid` VARCHAR(20))
    NO SQL
SELECT * FROM tbempleados e
    INNER JOIN tbpersonas p ON e.personaid= p.personaid
    INNER JOIN tbzonas z ON p.zonaid= z.zonaid
    INNER JOIN tbtipoempleados t ON e.tipoempleado= t.tipoempleado
    INNER JOIN tbempleadolicencias el ON e.empleadolicenciaid= 	 el.empleadolicenciaid
    INNER JOIN tbvehiculos v ON el.vehiculoid= v.vehiculoid$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarempleado`(IN `empleado` VARCHAR(50))
    NO SQL
BEGIN

DELETE FROM tbempleados WHERE empleadocedula=empleado;

END$$
DELIMITER ;
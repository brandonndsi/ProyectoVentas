
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrarzonas`()
    NO SQL
BEGIN

	SELECT * FROM tbzonas;
    

END$$
DELIMITER ;


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminarzona`(IN `id` VARCHAR(50))
    NO SQL
BEGIN
DELETE FROM tbzonas WHERE zonaid=id;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarzona`(IN `id` VARCHAR(50), IN `nombre` VARCHAR(50), IN `precio` VARCHAR(50))
    NO SQL
BEGIN

INSERT INTO `tbzonas`(`zonaid`, `zonanombre`, `zonaprecio`) VALUES (id,nombre,precio);

END$$
DELIMITER ;
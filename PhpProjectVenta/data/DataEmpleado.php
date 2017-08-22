<?php

class DataEmpleado {

    function DataEmpleado() {
        
    }

    function insertar($empleado) {
        $conexion = new DBConexion;
        if ($conexion->conectar() == true) {

            $query = "INSERT INTO tbpersona(idEmpleado,tipoEmpleado,telefonoPersona,cedulaEmpleado,contrasenaEmpleado,correoEmpleado,	
			edadEmpleado,sexoEmpleado,estadoCivilEmpleado,cuentaBancariaEmpleado) VALUES (
                                '" . $empleado->get_idEmpleado() . "',
				'" . $empleado->get_tipoEmpleado() . "',
				'" . $empleado->get_telefonoPersona() . "',
				'" . $empleado->get_cedulaEmpleado() . "',
				'" . $empleado->get_contrasenaEmpleado() . "',
				'" . $empleado->get_correoEmpleado() . "',
				'" . $empleado->get_edadEmpleado() . "',
				'" . $empleado->get_sexoEmpleado() . "',
                                '" . $empleado->get_estadoCivilEmpleado() . "',    
				'" . $empleado->get_cuentaBancariaEmpleado() . "')";

            $result = mysql_query($query);
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    function eliminar($id) {
        $conexion = new DBConexion;
        if ($conexion->conectar() == true) {

            $query = "DELETE FROM tbempleado WHERE idEmpleado=" . $id;
            $result = mysql_query($query);
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    function obtener($id) {
        $conexion = new DBConexion;
        $empleado;

        if ($conexion->conectar() == true) {
            $query = "SELECT idEmpleado,tipoEmpleado,telefonoPersona,cedulaEmpleado,contrasenaEmpleado,correoEmpleado,	
			edadEmpleado,sexoEmpleado,estadoCivilEmpleado,cuentaBancariaEmpleado
			FROM tbempleado INNER JOIN tbpersona ON telefonoPersona= telefonoPersona WHERE idEmpleado=$id";

            $result = mysql_query($query);

            if ($row = mysql_fetch_array($result)) {
                $empleado = new Empleado($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
            }

            if (!$empleado) {
                return false;
            } else {
                return $empleado;
            }
        }
    }

    function modificar($empleado) {
        $conexion = new DBConexion;
        if ($conexion->conectar() == true) {

            $query = "UPDATE tbempleado SET 
					idEmpleado='" . $empleado->get_idEmpleado() . "',
					tipoEmpleado='" . $empleado->get_tipoEmpleado() . "',  
					telefonoPersona='" . $empleado->get_telefonoPersona() . "',
					cedulaEmpleado='" . $empleado->get_cedulaEmpleado() . "',
					contrasenaEmpleado='" . $empleado->get_contrasenaEmpleado() . "',
					correoEmpleado='" . $empleado->get_correoEmpleado() . "',  
					edadEmpleado='" . $empleado->get_edadEmpleado() . "',
					sexoEmpleado='" . $empleado->get_sexoEmpleado() . "',
					estadoCivilEmpleado='" . $empleado->get_estadoCivilEmpleado() . "' 
                                        cuentaBancariaEmpleado='" . $empleado->get_cuentaBancariaEmpleado() . "'    
					WHERE idEmpleado =" . $empleado->get_idEmpleado() . "";
            $result = mysql_query($query);
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //Este metodo es para que se vean los campos en la tabla
    function get_empleados() {
        $conexion = new DBConexion;
        $lista = array();

        if ($conexion->conectar() == true) {
            $query = "SELECT idEmpleado,tipoEmpleado,telefonoPersona,cedulaEmpleado,contrasenaEmpleado,correoEmpleado,	
			edadEmpleado,sexoEmpleado,estadoCivilEmpleado,cuentaBancariaEmpleado
			FROM tbempleado INNER JOIN tbpersona ON telefonoPersona= telefonoPersona";

            $result = mysql_query($query);

            while ($row = mysql_fetch_array($result)) {
                $empleado = new Empleado($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
                array_push($lista, $empleado);
            }

            if (!$lista) {
                return false;
            } else {
                return $lista;
            }
        }
    }
}

?>
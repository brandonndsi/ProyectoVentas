<?php

class DataEmpleado {

    function DataEmpleado() {
        
    }

    function insertar($empleado) {
        $conexion = new DBConexion;
        if ($conexion->conectar() == true) {

            $query = "INSERT INTO tbpersona(idEmpleado,tipoEmpleado,nombrePersona, apellido1Persona, apellido2Persona,
            cedulaEmpleado, telefonoPersona,correoEmpleado,contrasenaEmpleado, edadEmpleado,sexoEmpleado,
            estadoCivilEmpleado,cuentaBancariaEmpleado, idZona, salarioBaseEmpleado, descripcionEmpleado) VALUES (
                '" . $empleado->get_idEmpleado() . "',
		'" . $empleado->get_tipoEmpleado() . "',
		'" . $empleado->get_nombrePersona() . "',
		'" . $empleado->get_apellido1Persona() . "',
		'" . $empleado->get_apellido2Persona() . "',
		'" . $empleado->get_cedulaEmpleado() . "',
		'" . $empleado->get_telefonoPersona() . "',
		'" . $empleado->get_correoEmpleado() . "',
                '" . $empleado->get_contrasenaEmpleado() . "',
                '" . $empleado->get_edadEmpleado() . "',
		'" . $empleado->get_sexoEmpleado() . "',
		'" . $empleado->get_estadoCivilEmpleado() . "',
		'" . $empleado->get_cuentaBancariaEmpleado() . "',
		'" . $empleado->get_idZona() . "',
                '" . $empleado->get_salarioBaseEmpleado() . "',    
		'" . $empleado->get_descripcionEmpleado() . "')";

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
            $query = mysql_query("SELECT * 
                FROM tbempleado e
                INNER JOIN tbpersona p ON e.telefonoPersona= p.telefonoPersona 
                INNER JOIN tbzona z ON p.idZona= z.idZona
                INNER JOIN tbtipoempleado t ON e.tipoEmpleado= t.tipoEmpleado WHERE e.idEmpleado=$id")
                    or die(mysql_error());

            $result = mysql_query($query);

            if ($row = mysql_fetch_array($result)) {
                $empleado = new Empleado($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6],
                $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15]);
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
                nombrePersona='" . $empleado->get_nombrePersona() . "',    
                apellido1Persona='" . $empleado->get_apellido1Persona() . "',
                apellido2Persona='" . $empleado->get_apellido2Persona() . "',    
                cedulaEmpleado='" . $empleado->get_cedulaEmpleado() . "',
		telefonoPersona='" . $empleado->get_telefonoPersona() . "',
		correoEmpleado='" . $empleado->get_correoEmpleado() . "',
		contrasenaEmpleado='" . $empleado->get_contrasenaEmpleado() . "',
		edadEmpleado='" . $empleado->get_edadEmpleado() . "',
		sexoEmpleado='" . $empleado->get_sexoEmpleado() . "',
		estadoCivilEmpleado='" . $empleado->get_estadoCivilEmpleado() . "' 
                cuentaBancariaEmpleado='" . $empleado->get_cuentaBancariaEmpleado() . "'
                idZona='" . $empleado->get_idEmpleado() . "',
                salarioBaseEmpleado='" . $empleado->get_salarioBaseEmpleado() . "',
                descripcionEmpleado='" . $empleado->get_descripcionEmpleado() . "',
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
            $query = mysql_query("SELECT * 
                FROM tbempleado e
                INNER JOIN tbpersona p ON e.telefonoPersona= p.telefonoPersona 
                INNER JOIN tbzona z ON p.idZona= z.idZona
                INNER JOIN tbtipoempleado t ON e.tipoEmpleado= t.tipoEmpleado")
                    or die(mysql_error());

            $result = mysql_query($query);

            while ($row = mysql_fetch_array($result)) {
                $empleado = new Empleado($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], 
                $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13], $row[14], $row[15]);
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
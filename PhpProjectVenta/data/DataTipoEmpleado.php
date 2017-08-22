<?php

class DataTipoEmpleado {

function DataTipoEmpleado() {

}

function obtenerTipoEmpleado($correo, $contraseña){
$conexcion = new DBConexion;
$empleado;

    if ($conexcion->conectar() == true) {
        
        $query = "SELECT * FROM tbempleado WHERE correoPersona=$correo and contrasenaEmpleado=$contraseña";

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
    
}

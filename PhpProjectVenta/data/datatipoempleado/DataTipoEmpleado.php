<?php

class DataTipoEmpleado {

        function DataTipoEmpleado() {
            include('../dbconexion/DBConexion.php');
           private  $conexcion=new DBConexion();
        }

            function obtenerTipoEmpleado($correo, $contraseña){
            $conexcion = new DBConexion;
            $empleado;

                if ($conexcion->conectar() == true) {
                    
                    $query = "SELECT * FROM tbempleado WHERE correoPersona=$correo and contrasenaEmpleado=$contraseña";

                        $result = mysql_query($query);

                        if ($row = mysql_fetch_array($result)) {
                            $empleado = new Empleado($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7],
                            $row[8], $row[9], $row[10], $row[11], $row[12],$row[13], $row[14], $row[15]);
                        }

                                if (!$empleado) {
                                    return false;
                                                } 
                                                else {
                                            return $empleado;
                                                        }
                    }
            }
    
            function tipoempleadoseleccionar($tipoempleado){
                $result;
                $conexion->conectar()==true){
                $result=$conexion->conectar()->query("CALL tipoempleadobuscar('".$tipoempleado."')");

                            }

                return echo json_decode($result);
            }
}


$dat=nw DataTipoEmpleado();
$dat->tipoempleadoseleccionar("Administrador");
print_r($dat);

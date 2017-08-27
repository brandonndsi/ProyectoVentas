<?php

class DataTipoEmpleado {
    
        private $conexion;
        
        //parte de la incluir los datos iniciales al conextarse.
        function DataTipoEmpleado() {
           include('../dbconexion/DBConexion.php');
           $this->conexcion=new DBConexion();
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
                $array= array();
                $this->conexion->crearConexion()->set_charset('utf8');
                
                $tipo=$this->conexion->crearConexion()->query("CALL tipoempleadobuscar('$tipoempleado')");
                while($resultado=$tipo->fetch_assoc()){
                    array_push($array, $resultado);
                }
                            

                return  $array;
            }
}


//$datafe=nw DataTipoEmpleado();
$datafe->tipoempleadoseleccionar("Administrador");
print_r($dat);

?>

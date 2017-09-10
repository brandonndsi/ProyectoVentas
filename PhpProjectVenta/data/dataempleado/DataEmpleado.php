<?php

class DataEmpleado {

    private $conexion;

    function DataEmpleado() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/empleados/Empleados.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarEmpleado($empleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarempleado = $this->conexion->crearConexion()->query("INSERT INTO tbempleados(empleadoid	,
            personaid, tipoempleado, empleadocedula, empleadocontrasenia,
            empleadoedad, empleadosexo,empleadoestadocivil,empleadocuentabancaria, empleadolicenciaid, empleadoestado) VALUES (
                '" . $empleado->get_empleadoid() . "',
		'" . $empleado->get_personaid() . "',
		'" . $empleado->get_tipoempleado() . "',
		'" . $empleado->get_empleadocedula() . "',
		'" . $empleado->get_empleadocontrasenia() . "',
		'" . $empleado->get_empleadoedad() . "',
		'" . $empleado->get_empleadosexo() . "',
		'" . $empleado->get_empleadoestadocivil() . "',
                '" . $empleado->get_empleadocuentabancaria() . "',
                '" . $empleado->get_empleadolicenciaid() . "', 
                '1');");

            $result = mysql_query($insertarempleado);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar
    public function modificarEmpleado($empleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $modificarempleado = $this->conexion->crearConexion()->query("UPDATE tbempleados SET 
		empleadoid='" . $empleado->get_empleadoid() . "',
		personaid='" . $empleado->get_personaid() . "',
                tipoempleado='" . $empleado->get_tipoempleado() . "',    
                empleadocedula='" . $empleado->get_empleadocedula() . "',
                empleadocontrasenia='" . $empleado->get_empleadocontrasenia() . "',    
                empleadoedad='" . $empleado->get_empleadoedad() . "',
		empleadosexo='" . $empleado->get_empleadosexo() . "',
		empleadoestadocivil='" . $empleado->get_empleadoestadocivil() . "',
		empleadocuentabancaria='" . $empleado->get_empleadocuentabancaria() . "',
                empleadolicenciaid='" . $empleado->get_empleadolicenciaid() . "',    
		WHERE empleadoid =" . $empleado->get_empleadoid() . "',
                AND empleadoestado=1;");

            $result = mysql_query($modificarempleado);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //eliminar
    public function eliminarEmpleado($empleadoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {
            $eliminarempleado = $this->conexion->crearConexion()->query("UPDATE `tbempleados` "
                  . "SET `empleadoestado`= 0 WHERE empleadoid='" . $empleadoid . "';");

            $result = mysql_query($eliminarempleado);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //buscar
    public function buscarEmpleado($empleadoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $buscarempleado = $this->conexion->crearConexion()->query("SELECT 'empleadoid',
            'personaid', 'tipoempleado', 'empleadocedula', 'empleadocontrasenia',
            'empleadoedad', 'empleadosexo','empleadoestadocivil','empleadocuentabancaria', 'empleadolicenciaid',
            FROM `tbempleados` WHERE empleadoid='" . $empleadoid . "' AND empleadoestado='1';");
            

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarempleado->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar empleados
    public function mostrarEmpleados() {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $mostrarempleados = $this->conexion->crearConexion()->query("SELECT 'empleadoid',
            'personaid', 'tipoempleado', 'empleadocedula', 'empleadocontrasenia', 'empleadoedad', 
            'empleadosexo','empleadoestadocivil','empleadocuentabancaria', 'empleadolicenciaid',
            FROM `tbempleados` WHERE empleadoestado='1';");
            

            
            while ($resultado = $mostrarempleados->fetch_assoc()) {
                array_push($array, $resultado);
            }
            $this->conexion->cerrarConexion();
            return $array;
            
        }
    }

}

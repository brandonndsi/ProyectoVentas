<?php

class DataEmpleado {

    private $conexion;

    function DataEmpleado() {
        include_once '../dbconexion/Conexcion.php';
        $this->conexion = new Conexion();
    }

    //insertar
    function insertarEmpleado($empleado) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $insertarempleado = $this->conexion->crearConexion()->query("INSERT INTO tbempleados(empleadoid	,
            personaid, tipoempleado, empleadocedula, empleadocontrasenia,
            empleadoedad, empleadosexo,empleadoestadocivil,empleadocuentabancaria, empleadolicenciaid) VALUES (
                '" . $empleado->get_empleadoid() . "',
		'" . $empleado->get_personaid() . "',
		'" . $empleado->get_tipoempleado() . "',
		'" . $empleado->get_empleadocedula() . "',
		'" . $empleado->get_empleadocontrasenia() . "',
		'" . $empleado->get_empleadoedad() . "',
		'" . $empleado->get_empleadosexo() . "',
		'" . $empleado->get_empleadoestadocivil() . "',
                '" . $empleado->get_empleadocuentabancaria() . "',  
		'" . $empleado->get_empleadolicenciaid() . "')");

        $result = mysql_query($insertarempleado);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //eliminar
    function eliminarEmpleado($empleadoid) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $eliminarempleado = $this->conexion->crearConexion()->query("CALL eliminarempleado('$empleadoid')");

        $result = mysql_query($eliminarempleado);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //buscar
    function buscarEmpleado($empleadoid) {

        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $buscarempleado = $this->conexion->crearConexion()->query("CALL buscarempleado('$empleadoid')");

        while ($resultado = $buscarempleado->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

    //modificar
    function modificarEmpleado($empleado) {

        $this->conexion->crearConexion()->set_charset('utf8');

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
		WHERE empleadoid =" . $empleado->get_empleadoid() . "");

        $result = mysql_query($modificarempleado);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //mostrar empleados
    function mostrarEmpleados() {
        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $mostrarempleados = $this->conexion->crearConexion()->query("CALL mostrarempleados");

        while ($resultado = $mostrarempleados->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }
}

<?php

class DataEmpleado {

    private $conexion;

    function DataEmpleado() {
        include_once '../../data/dbconexion/Conexion.php';
        include '../../domain/empleados/Empleados.php';
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
		'" . $empleado->get_empleadoestado() . "')");

            $this->conexion->cerrarConexion();
            return $insertarempleado;
        }
    }

    //modificar
    public function modificarEmpleado($empleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

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
		empleadoestado='" . $empleado->get_empleadoestado() . "',
		WHERE empleadoid =" . $empleado->get_empleadoid() . "");

            $this->conexion->cerrarConexion();
            return $modificarempleado;
        }
    }

    //eliminar
    public function eliminarEmpleado($empleadoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $eliminarempleado = $this->conexion->crearConexion()->query("CALL eliminarempleado('$empleadoid')");

            $this->conexion->cerrarConexion();
            return $eliminarempleado;
        }
    }

    //buscar
    public function buscarEmpleado($empleadoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarempleado = $this->conexion->crearConexion()->query("CALL buscarempleado('$empleadoid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarempleado->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar empleados
    public function mostrarEmpleados() {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarempleados = $this->conexion->crearConexion()->query("CALL mostrarempleados()");

            
            while ($resultado = $mostrarempleados->fetch_assoc()) {
                array_push($array, $resultado);
            }
            $this->conexion->cerrarConexion();
            return $array;
            
        }
    }

}

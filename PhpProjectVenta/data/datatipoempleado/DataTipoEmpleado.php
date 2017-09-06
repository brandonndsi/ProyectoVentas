<?php

class DataTipoEmpleado {

    private $conexion;

    function DataTipoEmpleado() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/tipoempleados/TipoEmpleados.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarTipoEmpleado($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertartipoempleado = $this->conexion->crearConexion()->query("INSERT INTO tbclientes(tipoempleado,
            tipoempleadosalariobase, tipoempleadodescripcion, tipoempleadohoraextra) VALUES (
                '" . $tipoempleado->get_tipoempleado() . "',
		'" . $tipoempleado->get_tipoempleadosalariobase() . "',
                '" . $tipoempleado->get_tipoempleadodescripcion() . "',         
		'" . $tipoempleado->get_tipoempleadohoraextra() . "')");

            $this->conexion->cerrarConexion();
            return $insertartipoempleado;
        }
    }

    //modificar
    public function modificarTipoEmpleado($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificartipoempleado = $this->conexion->crearConexion()->query("UPDATE tbclientes SET 
		tipoempleado='" . $tipoempleado->get_tipoempleado() . "',
		tipoempleadosalariobase='" . $tipoempleado->get_tipoempleadosalariobase() . "',
                tipoempleadodescripcion='" . $tipoempleado->get_tipoempleadodescripcion() . "', 
                tipoempleadohoraextra='" . $tipoempleado->get_tipoempleadohoraextra() . "',   
		WHERE tipoempleado =" . $tipoempleado->get_tipoempleado() . "");

            $this->conexion->cerrarConexion();
            return $modificartipoempleado;
        }
    }

    //eliminar
    public function eliminarTipoEmpleado($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminartipoempleado = $this->conexion->crearConexion()->query("CALL eliminartipoempleado('$tipoempleado')");

            $this->conexion->cerrarConexion();
            return $eliminartipoempleado;
        }
    }

    //buscar
    public function buscarTipoEmpleado($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscartipoempleados = $this->conexion->crearConexion()->query("CALL buscartipoempleados('$tipoempleado')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscartipoempleados->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar
    public function mostrarTipoEmpleados() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrartipoempleados = $this->conexion->crearConexion()->query("CALL mostrartipoempleados()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrartipoempleados->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

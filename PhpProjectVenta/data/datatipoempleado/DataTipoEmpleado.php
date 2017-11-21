<?php

class DataTipoEmpleado {

    private $conexion;

    function DataTipoEmpleado() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/tipoempleados/TipoEmpleados.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarTipo($tipo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $insertartipo = $this->conexion->crearConexion()->query("INSERT INTO `tbtipoempleados`(`tipoempleado`, `tipoempleadosalariobase`, `tipoempleadodescripcion`, `tipoempleadohoraextra`,`tipoempleadoestado`)
                VALUES ('" . $tipo->getTipoEmpleado() . "',
                '" . $tipo->getTipoempleadosalariobase() . "',
                '" . $tipo->getTipoempleadodescripcion() . "',
                '" . $tipo->getTipoempleadohoraextra() . "',1);");

            $result = $insertartipo;
            $this->conexion->cerrarConexion();
            
                return $result;
            
        }
    }

    //modificar
    public function modificarTipo($tipo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificartipo = $this->conexion->crearConexion()->query("UPDATE `tbtipoempleados` SET 
            `tipoempleadosalariobase`='" . $tipo->getTipoempleadosalariobase() . "',
            `tipoempleadodescripcion`='" . $tipo->getTipoempleadodescripcion() . "',
            `tipoempleadohoraextra`='" . $tipo->getTipoempleadohoraextra() . "'
            WHERE tipoempleadoid='" . $tipo->getTipoEmpleado() . "';");

            $result = $modificartipo;
            $this->conexion->cerrarConexion();
            
                return $result;
            
        }
    }

    //eliminar
    public function eliminarTipo($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminartipo = $this->conexion->crearConexion()->query("UPDATE `tbtipoempleados` SET `tipoempleadoestado`= 0 "
            . "WHERE tipoempleadoid='".$tipoempleado."';");


            $this->conexion->cerrarConexion();
            
                return $eliminartipo;
    
        }
    }

    //buscar
    public function buscarTipo($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarempleado = $this->conexion->crearConexion()->query("SELECT * FROM
             `tbtipoempleados` WHERE tipoempleadoid='" . $tipoempleado . "' AND tipoempleadoestado = 1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarempleado->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar productos
    function mostrarTipo() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarempleados = $this->conexion->crearConexion()->query("SELECT * FROM `tbtipoempleados` Where tipoempleadoestado = 1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarempleados->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

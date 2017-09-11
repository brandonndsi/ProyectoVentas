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
            $insertartipo = $this->conexion->crearConexion()->query("INSERT INTO `tbtipoempleados`(`tipoempleado`, 
             `tipoempleadosalariobase`, `tipoempleadodescripcion`, `tipoempleadohoraextra`)VALUES (
                '".$tipo->getTipoEmpleado()."',
                '".$tipo->getTipoempleadosalariobase()."',
                '".$tipo->getTipoempleadodescripcion()."',
                '".$tipo->getTipoempleadohoraextra()."');");

            $result = mysql_query($insertartipo);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar
    public function modificarTipo($tipo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificartipo= $this->conexion->crearConexion()->query("UPDATE `tbtipoempleados` SET 
            `tipoempleadosalariobase`='".$tipo->getTipoempleadosalariobase()."',
            `tipoempleadodescripcion`='".$tipo->getTipoempleadodescripcion()."',
            `tipoempleadohoraextra`='".$tipo->getTipoempleadohoraextra()."'
            WHERE tipoempleado='".$tipo->getTipoEmpleado()."';");

            $result = mysql_query($modificartipo);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
            }
        
    }
    //eliminar
    public function eliminarTipo($tipoempleadoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminartipo = $this->conexion->crearConexion()->query("UPDATE `tbtipoempleados` set 'tipoempleadoestado'=0
                WHERE tipoempleadoid='".$tipoempleadoid."';");
            

            $result = mysql_query($eliminartipo);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //buscar
    public function buscarTipo($tipoempleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();
            $buscarproducto = $this->conexion->crearConexion()->query("SELECT `tipoempleado`, `tipoempleadosalariobase`, `tipoempleadodescripcion`, `tipoempleadohoraextra` FROM
             `tbtipoempleados` WHERE tipoempleado='".$tipoempleado." AND 'tipoempleadoestado = 1;" );

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarproducto->fetch_assoc()) {
                array_push($array, $resultado);
            }
            if (!$array) {
                return false;
            } else {
                return $array;
            }
        }
    }

    //mostrar productos
    function mostrarTipo() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarproductos = $this->conexion->crearConexion()->query("SELECT `tipoempleado`, `tipoempleadosalariobase`, `tipoempleadodescripcion`, `tipoempleadohoraextra` FROM
             `tbtipoempleados` WHERE 'tipoempleadoestado = 1;" );

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarproductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
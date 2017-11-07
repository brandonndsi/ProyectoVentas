<?php

class DataTipo {

    private $conexion;

    function DataTipo() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/tipo/tipo.php';
        $this->conexion = new Conexion();
    }

    

    //insertar Tipo
    public function insertarTipo($tipo) {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            /* Para ingresar el tipo  en la base de datos. */
            $NuevoTipo = $this->conexion->crearConexion()->query("INSERT INTO `tbtipo`(`tiponombre`, `tipoestado`) VALUES 
                ('".$tipo->getTipoNombre()."',
                '".$tipo->getTipoEstado()."');");

            $this->conexion->cerrarConexion();
            return $NuevoTipo;
        }
    }

    //modificar tipo
    public function modificarTipo($tipo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            //modificando lo que es el tipo.
            $actualizandoTipo = $this->conexion->crearConexion()->query("UPDATE `tbtipo` SET tiponombre`='".$tipo->getTipoNombre()."' WHERE tipoid='".$tipo->getTipoId()."'");

            $this->conexion->cerrarConexion();

            return $actualizandoTipo;
        }
    }

    //eliminar tipo
    public function eliminarTipo($tipoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarTipo = $this->conexion->crearConexion()->query("UPDATE `tbtipo` SET `tipoestado`= 1 WHERE tipoid='".$tipoid."';");

            return $eliminarTipo;
        }
    }

    //buscar Tipo
    public function buscarTipo($tipoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarTipo = $this->conexion->crearConexion()->query("SELECT * FROM `tbtipo` WHERE tipoid='".$tipoid."' AND tipoestado=1;");

            $this->conexion->cerrarConexion();
            
            while ($resultado = $buscarTipo->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar Tipo
    public function mostrarTipo() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarTipo = $this->conexion->crearConexion()->query("SELECT * FROM `tbtipo`;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarTipo->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }
}

?>
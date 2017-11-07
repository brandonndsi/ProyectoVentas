<?php

class DataTamano {

    private $conexion;

    function DataTamano() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/tamanio/tamanio.php';
        $this->conexion = new Conexion();
    }

    

    //insertar Tamaños
    public function insertarTamano($tamano) {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            /* Para ingresar el tamaño  en la base de datos. */
            $NuevoTamano = $this->conexion->crearConexion()->query("INSERT INTO 
            `tbtamano`(`tamanonombre`) VALUES ('".$tamano->getTamanoNombre()."');");

            $this->conexion->cerrarConexion();
            return $NuevoTamano;
        }
    }

    //modificar
    public function modificarTamano($tamano) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            //modificando lo que es el proveedor.
            $actualizandoTamano = $this->conexion->crearConexion()->query("UPDATE `tbtamano` SET `tamanonombre`='".$tamano->getTamanoNombre()."' 
                WHERE tamanoid='".$tamano->getTamanoId()."';");

            $this->conexion->cerrarConexion();

            return $actualizandoTamano;
        }
    }

    //eliminar tamanos
    public function eliminarTamano($tamanoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarTamano = $this->conexion->crearConexion()->query("");

            return $eliminarTamano;
        }
    }

    //buscar Tamaños
    public function buscarTamano($tamanoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarTamano = $this->conexion->crearConexion()->query("SELECT * FROM `tbtamano` WHERE tamanoid='".$tamanoid."';");

            $this->conexion->cerrarConexion();
            
            while ($resultado = $buscarTamano->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar Tamaños
    public function mostrarTamano() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarTamano = $this->conexion->crearConexion()->query("SELECT * FROM `tbtamano`");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarTamano->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }
}

?>
<?php

class DataPreferencias {

    private $conexion;

    function DataPreferencias() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../..//domain/preferencias/Preferencias.php';
        $this->conexion = new Conexion();
    }

    //insertar preferencias
    public function insertarPreferencias($preferencias) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarPreferencias = "INSERT INTO `tbpreferencias`(`clienteid`, `productoid`, `preferenciasfecha`, `preferenciasaccion`) VALUES
             ('".$preferencias->getClienteId()."',
             '".$preferencias->getProductoId()."',
             '".$preferencias->getPreferenciasFecha()."',
             '".$preferencias->getPreferenciasAccion()."'";

            $result = $insertarPreferencias;
            $this->conexion->cerrarConexion();
            
                return $result;
            
        }
    }

    //modificar preferencias
    public function modificarPreferencias($preferencias) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarPreferencias = "UPDATE `tbpreferencias` SET 
            `clienteid`='".$preferencias->getClienteId()."',
            `productoid`='".$preferencias->getProductoId()."',
            `preferenciasfecha`='".$preferencias->getPreferenciasFecha()."',
            `preferenciasaccion`='".$preferencias->getPreferenciasAccion()."'
             WHERE prefenciasid='".$preferencias->getPreferenciasId()."'";

            $result = $modificarPreferencias;
            $this->conexion->cerrarConexion();
            
                return $result;
            
        }
    }

    //eliminar preferencias
    Public function eliminarPreferencias($preferenciasid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarPreferencias = "DELETE FROM `tbpreferencias` WHERE preferenciasid='".$preferenciasid."';";

            $result = $eliminarPreferencias;
            $this->conexion->cerrarConexion();
           
                return $result;
            
        }
    }

    //buscar una preferencias
    Public function buscarPreferencias($preferenciasid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $buscarPreferencias = $this->conexion->crearConexion()->query("SELECT * FROM `tbpreferencias` WHERE preferenciasid='".$preferenciasid."';");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarPreferencias->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar las preferencias
    public function mostrarPreferencias() {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarPrenferencias = $this->conexion->crearConexion()->query("SELECT * FROM `tbpreferencias`;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarPreferencias->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

?>
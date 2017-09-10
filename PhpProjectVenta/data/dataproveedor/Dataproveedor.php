<?php

class DataProveedor {

    private $conexion;

    function DataProveedor() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/proveedores/Proveedores.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarProveedor($proveedor) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $insertarproveedor = $this->conexion->crearConexion()->query("INSERT INTO `tbproveedores`(`proveedorid`, 
             `personanombre`, `personaapellido1`, `personaapellido2`,`personatelefono`, `personacorreo`, `zonacodigo`, 
            `materiaprimanombre`, `tipomateriaprimacategoria`,`materiaprimacantidad`, `materiaprimaprecio`, 
            `provedorestado`) VALUES 
            ('" . $proveedor->getProveedorId() . "',
             '" . $proveedor->getPesonaNombre() . "',
             '" . $proveedor->getPersonaApellido1() . "',
             '" . $proveedor->getPersonaApellido2() . "',
             '" . $proveedor->getPesonaTelefono() . "',  
             '" . $proveedor->getPesonaCorreo() . "',
             '" . $proveedor->getZonaCodigo() . "',
             '" . $proveedor->getMateriaprimanombre() . "',
             '" . $proveedor->getTipomateriaprimacategoria() . "',
             '" . $proveedor->getMateriaprimacantidad() . "',
             '" . $proveedor->getMateriaprimaprecio() . "',
             '1'");
            

            $this->conexion->cerrarConexion();

            return $insertarproveedor;
        }
    }

    //modificar
    public function modificarProveedor($proveedor) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarproveedor = $this->conexion->crearConexion()->query("UPDATE `tbproveedores` SET
             `proveedorid`='"  . $proveedor->getProveedorId() . "',
             `personanombre`='". $proveedor->getPesonaNombre() . "',
             `personaapellido1`='" . $proveedor->getPersonaApellido1() . "',
             `personaapellido2`='". $proveedor->getPersonaApellido2() . "',
             `personatelefono`='". $proveedor->getPesonaTelefono() . "',  
             `personacorreo`='". $proveedor->getPesonaCorreo() . "',
             `zonacodigo`='" . $proveedor->getZonaCodigo() . "',
             `materiaprimanombre`='". $proveedor->getMateriaprimanombre() . "',
             `tipomateriaprimacategoria`='". $proveedor->getTipomateriaprimacategoria() . "',
             `materiaprimacantidad`='". $proveedor->getMateriaprimacantidad() . "',
             `materiaprimaprecio`='". $proveedor->getMateriaprimaprecio() . "',
             WHERE proveedorid='" . $vehiculo->getVehiculoid() . "' 
             AND proveedorestado=1;");
            
            $result = mysql_query($modificarproveedor);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //eliminar
    public function eliminarProveedor($proveerdorid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarproveedor = $this->conexion->crearConexion()->query("UPDATE `tbproveedores` "
                    . "SET `proveedorestado`= 0 WHERE proveedorid='" . $proveerdorid . "';");


            $result = mysql_query($eliminarproveedor);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //buscar
    public function buscarProveedor($proveerdorid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();
            $buscarProveedor = $this->conexion->crearConexion()->query("SELECT `proveedorid`, 
            `personanombre`, `personaapellido1`, `personaapellido2`, `personatelefono`,`personacorreo`, `zonacodigo`,
            `materiaprimanombre`, `tipomateriaprimacategoria`, `materiaprimacantidad`,`materiaprimaprecio`
            FROM `tbproveedores` WHERE proveedorid='" . $proveedorid . "' AND proveedorestado='1';");
 

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarproveedor->fetch_assoc()) {
                array_push($array, $resultado);
            }

            return $array;
        }
    }

    //mostrar productos
function mostrarProveedor() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarproveedor = $this->conexion->crearConexion()->query("SELECT `proveedorid`, 
            `personanombre`, `personaapellido1`, `personaapellido2`, `personatelefono`,`personacorreo`, `zonacodigo`,
            `materiaprimanombre`, `tipomateriaprimacategoria`, `materiaprimacantidad`,`materiaprimaprecio`
            FROM `tbproveedores` WHERE proveedorestado='1';");
            
            $this->conexion->cerrarConexion();
            
            while ($resultado = $mostrarproveedor->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

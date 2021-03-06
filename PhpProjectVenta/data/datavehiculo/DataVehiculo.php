<?php

class DataVehiculo {

    private $conexion;

    function DataVehiculo() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/vehiculos/Vehiculos.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarVehiculo($vehiculo) {
        
        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $insertarproducto = $this->conexion->crearConexion()->query("INSERT INTO `tbvehiculos`(
 `vehiculomodelo`, `vehiculoplaca`,
 `vehiculomarca`, `vehiculoestado`) VALUES 
('".$vehiculo->getVehiculomodelo()."',
'".$vehiculo->getVehiculoplaca()."',
'".$vehiculo->getVehiculomarca()."',
'1');");

            $this->conexion->cerrarConexion();
            
                return $insertarproducto;
            
        }
    }

    //modificar
    public function modificarVehiculo($vehiculo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarproducto = $this->conexion->crearConexion()->query("UPDATE `tbvehiculos` SET 
            `vehiculomodelo`='".$vehiculo->getVehiculomodelo()."',
            `vehiculoplaca`='".$vehiculo->getVehiculoplaca()."',
            `vehiculomarca`='".$vehiculo->getVehiculomarca()."'
             WHERE vehiculoid='".$vehiculo->getVehiculoid()."' 
             AND vehiculoestado=1;");
            
               return $modificarproducto;
            }
        
    }

    //eliminar
    public function eliminarVehiculo($vehiculoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarproducto = $this->conexion->crearConexion()->query("UPDATE `tbvehiculos` SET `vehiculoestado`= 0 WHERE vehiculoid='".$vehiculoid."';");

                return $eliminarproducto;
            
        }
    }

    //buscar
    public function buscarVehiculo($vehiculoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();
            $buscarproducto = $this->conexion->crearConexion()->query("SELECT `vehiculoid`, 
                    `vehiculomodelo`, `vehiculoplaca`, `vehiculomarca` 
                    FROM `tbvehiculos` WHERE vehiculoid='".$vehiculoid."' AND vehiculoestado='1';");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarproducto->fetch_assoc()) {
                array_push($array, $resultado);
            }
            
                return $array;
            
        }
    }

    //mostrar productos
    function mostrarVehiculo() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarproductos = $this->conexion->crearConexion()->query("SELECT `vehiculoid`, `vehiculomodelo`, `vehiculoplaca`, `vehiculomarca` FROM `tbvehiculos` WHERE vehiculoestado=1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarproductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }
}

/*$datos= new DataVehiculo();
$vehiculo= new Vehiculos(null,"3432","honda","2000");
$da = $datos->insertarVehiculo($vehiculo);
print_r($da);*/
?>
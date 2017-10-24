<?php
/**
 * Description of VehiculoBusiness
 *
 * @author Juancho
 */
class VehiculoBusiness {
    
   private $DataVehiculo;

    public function VehiculoBusiness() {
        
        require_once '../../data/datavehiculo/DataVehiculo.php';
        $this->DataVehiculo = new DataVehiculo();
        
    }
    public function insertarVehiculo ($vehiculo ) {
        return $this->DataVehiculo->insertarVehiculo($vehiculo );
    }
    
    public function modificarVehiculo ($Vehiculo ){
        return $this->DataVehiculo ->modificarVehiculo ($vehiculo );
    }
    
    public function eliminarVehiculo ($vehiculoid) {
        return $this->DataVehiculo ->eliminarVehiculo ($vehiculoid);
    }
    
    public function mostrarVehiculos() {
        return $this->DataVehiculo ->mostrarVehiculos();
    }
    
    public function buscarVehiculo ($vehiculoid) {
        return $this->DataVehiculo ->buscarVehiculo ($vehiculoid);
    }
  
}

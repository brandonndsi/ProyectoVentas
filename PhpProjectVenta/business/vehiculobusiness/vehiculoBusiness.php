<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data producto y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */

class vehiculoBusiness {

    private $DataVehiculo;

    public function vehiculoBusiness() {
        
        require_once '../../data/datavehiculo/DataVehiculo.php';
        $this->DataVehiculo = new DataVehiculo();
    }
    
    //se encarga de la crear el nuevo producto a la base de datos
    public function insertarVehiculo($vehiculo) {
        return $this->DataVehiculo->insertarVehiculo($vehiculo);
    }
    
    //se encarga de actualizar los datos de la base de datos de producto.
    public function modificarVehiculo($vehiculo){
        return $this->DataVehiculo->modificarVehiculo($vehiculo);
    }
    
    //se encarga de eliminar el producto de la tabla.
    public function eliminarVehiculo($vehiculoid) {
        return $this->DataVehiculo->eliminarVehiculo($vehiculoid);
    }
    
    //se encarga de realizar la consulta y retornar todos los producto
    public function mostrarVehiculo() {
        return $this->DataVehiculo->mostrarVehiculo();
    }
    
    //se encarga de buscar los datos del producto de la base de datos
    public function buscarVehiculo($vehiculoid) {
        return $this->DataVehiculo->buscarVehiculo($vehiculoid);
    }
    
}
/*$da=new productoBusiness();
//$pro=new Productos('P0','fffff', '45555');
$s=$da->eliminarProducto('P0');
print_r($s);*/
?>

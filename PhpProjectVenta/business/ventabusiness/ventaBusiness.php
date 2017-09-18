<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data producto y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */

class ventaBusiness {

    private $DataVenta;

    public function ventaBusiness() {
        
        require_once '../../data/dataventa/DataVenta.php';
        $this->DataVenta = new DataVenta();
    }
    
    //se encarga de la crear el nueva venta a la base de datos
    public function insertarVenta($venta) {
        return $this->DataVenta->insertarVenta($venta);
    }
    
    //se encarga de actualizar los datos de la base de datos de venta.
    public function modificarVenta($venta){
        return $this->DataVenta->modificarVenta($venta);
    }
    
    //se encarga de eliminar el venta de la tabla.
    public function eliminarVenta($ventacodigo) {
        return $this->DataVenta->eliminarVenta($ventacodigo);
    }
    
    //se encarga de realizar la consulta y retornar todos los venta
    public function mostrarVenta() {
        return $this->DataVenta->mostrarVenta();
    }
    
    //se encarga de buscar los datos del venta de la base de datos
    public function buscarVenta($ventacodigo) {
        return $this->DataVenta->buscarVenta($ventacodigo);
    }
    
}
/*$da=new productoBusiness();
//$pro=new Productos('P0','fffff', '45555');
$s=$da->eliminarProducto('P0');
print_r($s);*/
?>

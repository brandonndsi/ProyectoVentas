<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data producto y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */

class ProductoBusiness {

    private $DataProducto;

    public function ProductoBusiness() {
        
        require_once '../../data/dataproducto/DataProducto.php';
        $this->DataProducto = new DataProducto();
    }
    
    //se encarga de la crear el nuevo producto a la base de datos
    public function insertarProducto($producto) {
        return $this->DataProducto->insertarProducto($producto);
    }
    
    //se encarga de actualizar los datos de la base de datos de producto.
    public function modificarProducto($producto){
        return $this->DataProducto->modificarProducto($producto);
    }
    
    //se encarga de eliminar el producto de la tabla.
    public function eliminarProducto($productoid) {
        return $this->DataProducto->eliminarProducto($productoid);
    }
    
    //se encarga de realizar la consulta y retornar todos los producto
    public function mostrarProductos() {
        return $this->DataProducto->mostrarProductos();
    }
    
    //se encarga de buscar los datos del producto de la base de datos
    public function buscarProducto($productoid) {
        return $this->DataProducto->buscarProducto($productoid);
    }
    
}
/*$da=new productoBusiness();
//$pro=new Productos('P0','fffff', '45555');
$s=$da->eliminarProducto('P0');
print_r($s);*/
?>

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
    public function getTBProductoNuevo($producto) {
        return $this->DataProducto->insertar($producto);
    }
    
    //se encarga de actualizar los datos de la base de datos de producto.
    public function getTBProductoActualizar($producto){
        return $this->DataProducto->modificar($producto);
    }
    
    //se encarga de eliminar el producto de la tabla.
    public function getTBProductoEliminar($producto) {
        return $this->DataProducto->eliminar($producto);
    }
    
    //se encarga de realizar la consulta y retornar todos los producto
    public function getTBProductoTodo() {
        return $this->DataProducto->get_producto();
    }
    
    //se encarga de buscar los datos del producto de la base de datos
    public function getTBProductoBuscar($producto) {
        return $this->DataProducto->obtener($producto);
    }
    
}

?>

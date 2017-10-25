<?php

class compraBusiness {

    private $DataCompra;

    public function compraBusiness() {
        
        require_once '../../data/datacompra/DataCompra.php';
        $this->DataCompra = new DataCompra();
    }
    
    //se encarga de la crear el nueva compra a la base de datos
    public function insertarCompra($compra) {
        return $this->DataCompra->agregarCompra($compra);
    }
    
    //se encarga de actualizar los datos de la base de datos de compra.
    public function modificarCompra($compra){
        return $this->DataCompra->modificarCompra($compra);
    }
    
    //se encarga de eliminar el compra de la tabla.
    public function eliminarCompra($compracodigo) {
        return $this->DataCompra->eliminarCompra($compracodigo);
    }
    
    //se encarga de realizar la consulta y retornar todos los compra
    public function mostrarCompra() {
        return $this->DataCompra->mostrarCompra();
    }
    /**
     * manda a llamar al metodo de mostrar todos los productos de la data
     * @return [Array] retorna la consulta en un array de datos.
     */
    public function cargarProducto(){
        return $this->DataCompra->cargarProducto();
    }
    
    //se encarga de buscar los datos del venta de la base de datos
    public function buscarCompra($compracodigo) {
        return $this->DataCompra->buscarCompra($compracodigo);
    }    
}

?>

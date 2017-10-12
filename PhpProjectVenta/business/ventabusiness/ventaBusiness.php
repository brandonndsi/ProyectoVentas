<?php

class ventaBusiness {

    private $DataCompra;

    public function ventaBusiness() {
        
        require_once '../../data/datacompra/DataCompra.php';
        $this->DataCompra = new DataCompra();
    }
    
    //se encarga de la crear el nueva venta a la base de datos
    public function insertarVenta($venta) {
        return $this->DataCompra->insertarCompra($venta);
    }
    
    //se encarga de actualizar los datos de la base de datos de venta.
    public function modificarVenta($venta){
        return $this->DataCompra->modificarCompra($venta);
    }
    
    //se encarga de eliminar el venta de la tabla.
    public function eliminarVenta($ventacodigo) {
        return $this->DataCompra->eliminarCompra($ventacodigo);
    }
    
    //se encarga de realizar la consulta y retornar todos los venta
    public function mostrarVenta() {
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
    public function buscarVenta($ventacodigo) {
        return $this->DataCompra->buscarCompra($ventacodigo);
    }    
}

?>

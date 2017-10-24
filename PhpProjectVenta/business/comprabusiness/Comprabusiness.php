<?php

/**
 * Description of comprabusiness
 *
 * @author Juancho
 */
class CompraBusiness {

    private $DataCompra;

    public function CompraBusiness() {

        require_once '../../data/datacompra/DataCompra.php';
        $this->DataCompra = new DataCompra();
    }

    public function insertarCompra($venta) {
        return $this->DataCompra->insertarCompra($venta);
    }

    public function modificarCompra($venta) {
        return $this->DataCompra->modificarCompra($venta);
    }

    //se encarga de realizar la consulta y retornar todos los empleado
    public function mostrarCompra() {
        return $this->DataCompra->mostrarCompra();
    }

}

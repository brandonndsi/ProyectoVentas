<?php

/**
 * Description of ControlProductos
 *
 * @author Juancho
 */
class ControlProductos {

    private $productoid;
    private $materiaprimaid;

    public function ControlProductos($productoid, $materiaprimaid) {
        $this->productoid = $productoid;
        $this->materiaprimaid = $materiaprimaid;
    }

    public function getProductoid() {
        return $this->productoid;
    }

    public function getMateriaprimaid() {
        return $this->materiaprimaid;
    }

    public function setProductoid($productoid) {
        $this->productoid = $productoid;
    }

    public function setMateriaprimaid($materiaprimaid) {
        $this->materiaprimaid = $materiaprimaid;
    }

}

?>
<?php

/**
 * Descripcion de los combos la parte de los productos para la relacion de los mismos.
 *
 * @author david salas
 */

class CombosProductos {
    
    private $combosproductosid;
    private $combosid;
    private $productoid;
    
    public function CombosProductos($combosproductosid, $combosid, $productoid) {
        $this->combosproductosid = $combosproductosid;
        $this->combosid= $combosid;
        $this->productoid = $productoid;
    }
    public function getCombosProductosId() {
        return $this->combosProductosId;
    }

    public function getCombosId() {
        return $this->combosid;
    }

    public function getProductoId() {
        return $this->productoid;
    }

    public function setCombosId($combosid) {
        $this->combosid = $combosid;
    }

    public function setCombosProductosid($comboproductoid) {
        $this->comboproductoid = $comboproductoid;
    }

    public function setProductosId($productoid) {
        $this->productoid = $productoid;
    }


}

?>
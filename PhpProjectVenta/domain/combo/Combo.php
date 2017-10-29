<?php

/**
 * Descripcion de los combos
 *
 * @author david salas
 */

class Compras {
    
    private $comboid;
    private $comboproductoid;
    private $comboestado;
    
    public function Compras($comboid, $comboproductoid, $comboestado) {
        $this->comboid = $comboid;
        $this->comboproductoid = $comboproductoid;
        $this->comboestado = $comboestado;
    }
    public function getComboid() {
        return $this->comboid;
    }

    public function getComboproductoid() {
        return $this->comboproductoid;
    }

    public function getComboestado() {
        return $this->comboestado;
    }

    public function setComboid($comboid) {
        $this->comboid = $comboid;
    }

    public function setComboproductoid($comboproductoid) {
        $this->comboproductoid = $comboproductoid;
    }

    public function setComboestado($comboestado) {
        $this->comboestado = $comboestado;
    }

}

?>
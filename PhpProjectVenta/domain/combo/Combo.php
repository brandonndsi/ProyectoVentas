<?php

/**
 * Descripcion de los combos para llevar al go mas ordenado de la base de datos
 *
 * @author david salas
 */

class Combo {
    
    private $comboid;
    private $combocodigo;
    private $combonombre;
    private $comboproductoid;
    private $comboingredientes;
    private $comboprecio;
    private $comboestado;
    
    public function Combo($comboid,$combocodigo,$combonombre, $comboproductoid, $comboingredientes,$comboprecio,$comboestado) {
        $this->comboid = $comboid;
        $this->combocodigo=$combocodigo;
        $this->combonombre=$combonombre;
        $this->comboproductoid = $comboproductoid;
        $this->comboingredientes= $comboingredientes;
        $this->comboprecio=$comboprecio;
        $this->comboestado = $comboestado;
    }
    public function getComboPrecio(){
        return $this->comboprecio;
    }
    public function getComboIngredientes(){
        return $this->comboingredientes;
    }
    public function getComboNombre(){
        return $this->combonombre;
    }
    public function getComboCodigo(){
        return $this->combocodigo;
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
    public function setComboPrecio($comboprecio){
        $this->comboprecio=$comboprecio;
    }
    public function setComboIngredientes($comboingredientes){
        $this->comboingredientes=$comboingredientes;
    }
    public function setComboNombre($combonombre){
        $this->combonombre=$combonombre;
    }
    public function setComboCodigo($combocodigo){
        $this->combocodigo =$combocodigo;
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
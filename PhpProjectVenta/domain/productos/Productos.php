<?php

/**
 * Description of Producto
 *
 * @author Juancho
 */
class Productos {

    private $productoid;
    private $productocodigo;
    private $productonombre;
    private $productoprecio;

    public function Productos($productoid,$productocodigo,$productonombre, $productoprecio) {
        $this->productoid = $productoid;
        $this->productocodigo=$productocodigo;
        $this->productonombre = $productonombre;
        $this->productoprecio = $productoprecio;
    }

    public function getProductoid() {
        return $this->productoid;
    }

    public function getProductoCodigo(){
        return $this->productocodigo;
    }
    public function getProductonombre() {
        return $this->productonombre;
    }
    
    public function getProductoprecio() {
        return $this->productoprecio;
    }

    public function setProductoid($productoid) {
        $this->productoid = $productoid;
    }

    public function setProductoCodigo($productocodigo){
        $this->productocodigo = $productocodigo;
    }
    public function setProductonombre($productonombre) {
        $this->productonombre = $productonombre;
    }

    public function setProductoprecio($productoprecio) {
        $this->productoprecio = $productoprecio;
    }

}

<?php

class Productos {

    private $productoid;
    private $productocodigo;
    private $productonombre;
    private $productotamano;
    private $productodescripcion;
    private $productoprecio;

    public function Productos($productoid,$productocodigo,$productonombre, $productotamano, $productodescripcion, $productoprecio) {
        $this->productoid = $productoid;
        $this->productocodigo=$productocodigo;
        $this->productonombre = $productonombre;
        $this->productotamano = $productotamano;
        $this->productodescripcion = $productodescripcion;
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
    function getProductotamano() {
        return $this->productotamano;
    }

    function getProductodescripcion() {
        return $this->productodescripcion;
    }

    function setProductotamano($productotamano) {
        $this->productotamano = $productotamano;
    }

    function setProductodescripcion($productodescripcion) {
        $this->productodescripcion = $productodescripcion;
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

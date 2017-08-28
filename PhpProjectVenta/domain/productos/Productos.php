<?php

/**
 * Description of Producto
 *
 * @author Juancho
 */
class Productos {

    private $productoid;
    private $productonombre;
    private $precioProducto;
    private $productoprecio;

    public function Productos($productoid, $productonombre, $precioProducto, $productoprecio) {
        $this->productoid = $productoid;
        $this->productonombre = $productonombre;
        $this->precioProducto = $precioProducto;
        $this->productoprecio = $productoprecio;
    }

    public function getProductoid() {
        return $this->productoid;
    }

    public function getProductonombre() {
        return $this->productonombre;
    }

    public function getPrecioProducto() {
        return $this->precioProducto;
    }

    public function getProductoprecio() {
        return $this->productoprecio;
    }

    public function setProductoid($productoid) {
        $this->productoid = $productoid;
    }

    public function setProductonombre($productonombre) {
        $this->productonombre = $productonombre;
    }

    public function setPrecioProducto($precioProducto) {
        $this->precioProducto = $precioProducto;
    }

    public function setProductoprecio($productoprecio) {
        $this->productoprecio = $productoprecio;
    }

}

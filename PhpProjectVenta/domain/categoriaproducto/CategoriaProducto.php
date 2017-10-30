<?php
/**
 * Describe las categorias del producto ademas de la entidad para transportar los mismos.
 *
 * @author David salas
 */

class CategoriaProducto {
    
    private $categoriaProductoId;
    private $categoriaProductoNombre;
    private $categoriaProductoEstado;
    
    public function Clientes($categoriaProductoId, $categoriaProductoNombre, $categoriaProductoEstado) {
        $this->categoriaProductoId = $categoriaProductoId;
        $this->categoriaProductoNombre = $categoriaProductoNombre;
        $this->categoriaProductoEstado= $categoriaProductoEstado;
    }
   
    public function getCategoriaProductoId() {
        return $this->categoriaProductoId;
    }

    public function getCategoriaProductoNombre(){
        return $this->categoriaProductoNombre;
    }
    public function getCategoriaProductoEstado(){
        return $this->categoriaProductoEstado;
    }
    public function setCategoriaProductoId($categoriaProductoId) {
        $this->categoriaProductoId = $categoriaProductoId;
    }

    public function setCategoriaProductoNombre($categoriaProductoNombre){
        $this->categoriaProductoNombre=$categoriaProductoNombre;
    }
    public function setCategoriaProductoEstado($categoriaProductoEstado){
        $this->categoriaProductoEstado=$categoriaProductoEstado;
    }
}

?>
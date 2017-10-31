<?php
/**
 * Description of categoriaProductoBusiness
 *
 * @author Juancho
 */
class categoriaProductoBusiness {
     
    private $DataCategoriaProducto;

    public function categoriaProductoBusiness() {
        
        require_once '../../data/datacategoriaproducto/dataCategoriaProducto.php';
        $this->DataCategoriaProducto = new DataCategoriaProducto();
    }
    
    //se encarga de la crear la categoriaProducto en la base de datos
    public function insertarCategoriaProducto($categoriaproducto) {
        return $this->DataCategoriaProducto->insertarCategoriaProducto($categoriaproducto);
    }
    
    //se encarga de actualizar los datos de la base de datos de la categoriaProducto
    public function modificarCategoriaProducto($categoriaproducto){
        return $this->DataCategoriaProducto->modificarCategoriaProducto($categoriaproducto);
    }
    
    //se encarga de eliminar el categoriaProducto de la tabla.
    public function eliminarCategoriaProducto($categoriaproductoid) {
        return $this->DataCategoriaProducto->elimiarCategoriaProducto($categoriaproductoid);
    }
    
    //se encarga de realizar la consulta y retornar todos las categoriaProductos
    public function mostrarCategoriaProducto() {
        return $this->DataCategoriaProducto->mostrarCategoriaProducto();
    }
    
    //se encarga de buscar los datos de la ategoriaProducto de la base de datos
    public function buscarCategoriaProducto($categoriaproductoid) {
        return $this->DataCategoriaProducto->buscarCategoriaProducto($categoriaproductoid);
    }
}

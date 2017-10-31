<?php

/**
 * Description of combosProductosBusiness
 *
 * @author Juancho
 */
class combosProductosBusiness {
    
    private $DataCombosProductos;

    public function combosProductosBusiness() {
        
        require_once '../../data/datacombosproductos/DataCombosProductos.php';
        $this->DataCombosProductos = new DataCombosProductos();
    }
    
    //se encarga de la crear el Comboproductos en la base de datos
    public function insertarCombosProductos($combosproductos) {
        return $this->DataCombosProductos->insertarCombosProductos($combosproductos);
    }
    
    //se encarga de actualizar los datos de la base de datos del combosProductos
    public function modificarCombosProductos($combosproductos){
        return $this->DataCombosProductos->modificarCombosProductos($combosproductos);
    }
    
    //se encarga de eliminar el combosProductos de la tabla.
    public function eliminarCombosproductos($combosproductosid) {
        return $this->DataCombosProductos->elimiarCombosProductos($combosproductosid);
    }
    
    //se encarga de realizar la consulta y retornar todos los combos
    public function mostrarCombosProductos() {
        return $this->DataCombosProductos->mostrarCombosProductos();
    }
    
    //se encarga de buscar los datos de la zona de la base de datos
    public function buscarCombosProductos($combosproductosid) {
        return $this->DataCombosProductos->buscarCombo($combosproductosid);
    }
}

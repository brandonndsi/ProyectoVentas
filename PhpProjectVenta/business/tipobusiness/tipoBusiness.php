<?php


/**
 * Description of tipoBusiness
 *
 * @author Juancho
 */
class tipoBusiness {
   
    private $DataTipo;

    public function tipoBusiness() {
        
        require_once '../../data/datatipo/DataTipo.php';
        $this->DataTipo= new DataTipo();
        
    }    
    //se encarga de introducir el nuevo tipo
    public function insertarTipo($tipo) {
        return $this->DataTipo->insertarTipo($tipo);
    }
    
    //se encarga de actualizar los datos de Tipo en la tabla.
    public function modificarTipo($tipo){
        return $this->DataTipo->modificarTipo($tipo);
    }
    
    //se encarga de eliminar el tioo que desea en la base de datos.
    public function eliminarTipo($tipoid) {
        return $this->DataTipo->eliminarTipo($tipoid);
    }
    
    //se encarga de seleccionar todo los datos del tipo.
    public function mostrartipos() {
        return $this->Datatipo->mostrarTipos();
    }
    
    //se encarga de la busqueda de tipos en la base de datos.
    public function buscarTipo($tipoid) {
        return $this->Datatipo->buscarTipo($tipoid);
    }
}

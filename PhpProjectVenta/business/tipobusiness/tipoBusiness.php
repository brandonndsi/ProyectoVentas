<?php


/**
 * Description of tipoBusiness
 *
 * @author Juancho modificado por david el problema es que las variable de este mae no consistian con las de la data y por ende tube que modificarla
 */
class tipoBusiness {
   
    private $DataTipo;

    public function tipoBusiness() {
        
        require_once '../../data/datatipo/DataTipo.php';
        $this->DataTipo= new DataTipo();
        
    }    
    //se encarga de introducir el nuevo tipo
    public function insertaTipo($tipo) {
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
    public function mostrarTipo() {
        return $this->Datatipo->mostrarTipo();
    }
    
    //se encarga de la busqueda de tipos en la base de datos.
    public function buscarTipo($tipoid) {
        return $this->Datatipo->buscarTipo($tipoid);
    }
}

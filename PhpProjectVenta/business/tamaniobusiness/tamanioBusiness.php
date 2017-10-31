<?php
/**
 * Description of tamanioBusiness
 *
 * @author Juancho
 */
class tamanioBusiness {  
    
    private $DataTamanio;

    public function tamanioBusiness() {
        
        require_once '../../data/datatamanio/DataTamanio.php';
        $this->DataTamanio = new DataTamanio();
    }
    
    //se encarga de la crear el Combo en la base de datos
    public function insertarTamanio($tamanio) {
        return $this->DataTamanio>-insertarTamanio($tamanio);
    }
    
    //se encarga de actualizar los datos de la base de datos del tamanio
    public function modificarTamanio($tamanio){
        return $this->DataTamanio->modificarTamanio($tamanio);
    }
        
    //se encarga de realizar la consulta y retornar todos lOS Tamanio
    public function mostrarTamanio() {
        return $this->DataTamanio->mostrarTamanio();
    }
    
    //se encarga de buscar los datos del tamanio de la base de datos
    public function buscarTamanio($tamanioid) {
        return $this->DataTamanio->buscarTamanio($tamanioid);
    }
}

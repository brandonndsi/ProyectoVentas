<?php

class tamanioBusiness {  
    
    private $DataTamanio;

    public function tamanioBusiness() {
        
        require_once '../../data/datatamano/DataTamano.php';
        $this->DataTamanio = new DataTamano();
    }
    
    //se encarga de la crear el Combo en la base de datos
    public function insertarTamanio($tamanio) {
        return $this->DataTamanio->insertarTamano($tamanio);
    }
    
    //se encarga de actualizar los datos de la base de datos del tamanio
    public function modificarTamanio($tamanio){
        return $this->DataTamanio->modificarTamano($tamanio);
    }
        
    //se encarga de realizar la consulta y retornar todos lOS Tamanio
    public function mostrarTamanio() {
        return $this->DataTamanio->mostrarTamano();
    }
    
    //se encarga de buscar los datos del tamanio de la base de datos
    public function buscarTamanio($tamanioid) {
        return $this->DataTamanio->buscarTamano($tamanioid);
    }
    
    public function eliminarTamanio($tamanioid) {
        return $this->DataTamanio->eliminarTamano($tamanioid);
    }
}

<?php

/**
 * Description of preferenciasBusiness
 *
 * @author Juancho
 */
class preferenciasBusiness {
    
    
    private $DataPreferencias;

    public function preferenciasBusiness() {
        
        require_once '../../data/datapreferencias/DataPreferencias.php';
        $this->DataPreferencias = new DataPreferencias();
    }
    
    //se encarga de la crear el Combo en la base de datos 
    public function insertarPreferencias($preferencias) {
        return $this->DataPreferencias->insertarPreferencias($preferenciasp);
    }
    
    //se encarga de actualizar los datos de la base de datos del las preferencias
    public function modificarPreferencias($preferencias){
        return $this->DataPreferencias->modificarPreferencias($preferencias);
    }
    
    //se encarga de eliminar el combo de la tabla.
    public function eliminarPreferencias($preferenciasid) {
        return $this->DataPreferencias->elimiarPreferencias($preferenciasid);
    }
    
    //se encarga de realizar la consulta y retornar todos los combos
    public function mostrarPreferencias() {
        return $this->DataPreferencias->mostrarPreferencias();
    }
    
    //se encarga de buscar los datos de la zona de la base de datos
    public function buscarPreferencias($preferenciasid) {
        return $this->DataPreferencias->buscarPreferencias($preferenciasid);
    }
}

<?php

class MateriaPrimaBusiness {

    private $DataMateriaPrima;

    public function MateriaPrimaBusiness() {
        
        require_once '../../data/datamateriaprima/DataMateriaPrima.php';
        $this->DataMateriaPrima = new DataMateriaPrima();
    }
    
    //se encarga de la crear el nuevo materiaprima a la base de datos
    public function insertarMateriaPrima($materiaprima) {
        return $this->DataMateriaPrima->insertarMateriaPrima($materiaprima);
    }
    
    //se encarga de actualizar los datos de la base de datos de materia prima.
    public function modificarMateriaPrima($materiaprima){
        return $this->DataMateriaPrima->modificarMateriaPrima($materiaprima);
    }
    
    //se encarga de eliminar la materia prima de la tabla.
    public function eliminarMateriaPrima($materiaprimaid) {
        return $this->DataMateriaPrima->eliminarMateriaPrima($materiaprimaid);
    }
    
    //se encarga de realizar la consulta y retornar todos la materia prima
    public function mostrarMateriaPrima() {
        return $this->DataMateriaPrima->mostrarMateriaPrima();
    }
    
    //se encarga de buscar los datos de materia prima de la base de datos
    public function buscarMateriaPrima($materiaprimaid) {
        return $this->DataMateriaPrima->buscarMateriaPrima($materiaprimaid);
    }
    
}
?>
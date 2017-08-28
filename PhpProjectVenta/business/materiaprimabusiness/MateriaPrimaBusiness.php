<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data materia prima y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */

class MateriaPrimaBusiness {

    private $DataMateriaPrima;

    public function MateriaPrimaBusiness() {
        
        require_once '../../data/datamateriaprima/DataMateriaPrima.php';
        $this->DataMateriaPrima = new DataMateriaPrima();
    }
    
    //se encarga de la crear el nuevo materiaprima a la base de datos
    public function getTBMateriaPrimaNuevo($materiaprima) {
        return $this->DataMateriaPrima->insertar($materiaprima);
    }
    
    //se encarga de actualizar los datos de la base de datos de materia prima.
    public function getTBMateriaPrimaActualizar($materiaprima){
        return $this->DataMateriaPrima->modificar($materiaprima);
    }
    
    //se encarga de eliminar la materia prima de la tabla.
    public function getTBMateriaPrimaEliminar($materiaprima) {
        return $this->DataMateriaPrima->eliminar($materiaprima);
    }
    
    //se encarga de realizar la consulta y retornar todos la materia prima
    public function getTBMateriaPrimaTodo() {
        return $this->DataMateriaPrima>get_materiaprima();
    }
    
    //se encarga de buscar los datos de materia prima de la base de datos
    public function getTBMateriaPrimaBuscar($materiaprima) {
        return $this->DataMateriaPrima->obtener($materiaprima);
    }
    
}
?>
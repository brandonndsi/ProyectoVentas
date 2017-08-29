<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data persona y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */
class tipoEmpleadoBusiness {
    
    private $DataTipoEmpleado;

    public function empleadoBusiness() {
        
        include_once '../../data/datatipoempleado/DataTipoEmpleado.php';
        $this->DataTipoEmpleado = new DataTipoEmpleado();
        
    }
    
    //se encarga de buscar un dato en la tabla y retornar dicho resultado si existe.
    public function buscartipoempleado($tipoempleado){
        return $this->DataTipoEmpleado->buscartipoempleado($tipoempleado);
    }
}

?>
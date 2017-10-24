<?php
/**
 * Descripcion es el encargado de agarrar los datos mandados y efectuar el metodo
 * correspondiente, inbocando a el metodo de data producto y pasandole como parameros los datos
 * recogidos en las variables.
 *
 * @author David Salas Lorente
 */

class zonaBusiness {

    private $DataZona;

    public function zonaBusiness() {
        
        require_once '../../data/datazona/DataZona.php';
        $this->DataZona = new DataZona();
    }
    
    //se encarga de la crear la nueva zona a la base de datos
    public function insertarZona($zona) {
        return $this->DataZona->insertarZona($zona);
    }
    
    //se encarga de actualizar los datos de la base de datos de la zona.
    public function modificarZona($zona){
        return $this->DataZona->modificarZona($zona);
    }
    
    //se encarga de eliminar la zona de la tabla.
    public function eliminarZona($zonaid) {
        return $this->DataZona->eliminarZona($zonaid);
    }
    
    //se encarga de realizar la consulta y retornar todas las zonas
    public function mostrarZona() {
        return $this->DataZona->mostrarZona();
    }
    
    //se encarga de buscar los datos de la zona de la base de datos
    public function buscarZona($zonaid) {
        return $this->DataZona->buscarZona($zonaid);
    }
    
}
/*$da=new zonaBusiness();
//$pro=new Productos('P0','fffff', '45555');
$s=$da->eliminarZona('P0');
print_r($s);*/
?>

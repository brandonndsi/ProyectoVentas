<?php
/**
 * Description of combosProductosBusiness
 *
 * @author Juancho
 */
class comboBusiness{
    
    
    private $DataCombo;

    public function comboBusiness() {
        
        require_once '../../data/datacombo/DataCombo.php';
        $this->DataCombo = new DataCombo();
    }
    
    //se encarga de la crear el Combo en la base de datos
    public function insertarCombo($combo) {
        return $this->DataCombo->insertarCombo($combo);
    }
    
    //se encarga de actualizar los datos de la base de datos del combo
    public function modificarCombo($combo){
        return $this->DataCombo->modificarCombo($combo);
    }
    
    //se encarga de eliminar el combo de la tabla.
    public function eliminarCombo($comboid) {
        return $this->DataCombo->elimiarCombo($comboid);
    }
    
    //se encarga de realizar la consulta y retornar todos los combos
    public function mostrarCombo() {
        return $this->DataCombo->mostrarCombo();
    }
    
    //se encarga de buscar los datos de la zona de la base de datos
    public function buscarCombo($comboid) {
        return $this->DataCombo->buscarCombo($comboid);
    }
    
}
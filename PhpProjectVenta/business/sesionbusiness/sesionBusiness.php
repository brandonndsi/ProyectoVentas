<?php

class sesionBusiness {

    private $DataSesion;

    public function sesionBusiness() {
        
        require_once '../../data/datasesion/dataSesion.php';
        $this->DataSesion = new dataSesion();
    }
    //se encarga de buscar los datos de empleado de la base de datos
    public function logueoEmpleado($email, $password) {
        return $this->DataSesion->logueo($email, $password);
    }  
}
?>
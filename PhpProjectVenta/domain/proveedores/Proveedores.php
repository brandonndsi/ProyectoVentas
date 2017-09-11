<?php
/**
 * Description of Proveedor
 *
 * @author Juancho
 * 
 */

include '../../domain/personas/Personas.php';
class Proveedores extends Personas{

    private $proveedorid;
    private $MateriaPrimaid;
    private $proveedordireccion;
    private $personaid;
    
    
    public function Proveedores($Proveedorid,$personaid,$Proveedordireccion,$Materiaprimaid) {
        $this->proveedorid = $Proveedorid;
        $this->personaid = $personaid;
        $this->proveedordireccion = $Proveedordireccion;
        $this->MateriaPrimaid = $Materiaprimaid;
    }
    
    public function getProveedorId() {
        return $this->proveedorid;
    }

    public function getPersonaId(){
        return $this->personaid;
    }

    public function getProveedorDireccion() {
        return $this->proveedordireccion;
    }

    public function getMateriaPrimaid(){
        return $this->MateriaPrimaid;
    }

    public function setProveedorId($proveedorid) {
        $this->proveedorid = $proveedorid;
    }
    public function setPersonaId($personaid){
        $this->personaid =$personaid;
    }
    public function setProveedorDireccion($proveedordireccion) {
        $this->proveedordireccion = $proveedordireccion;
    }

    public function setMateriaPrimaid($materiaprimaid) {
        $this->MateriaPrimaid = $materiaprimaid;
    }

}

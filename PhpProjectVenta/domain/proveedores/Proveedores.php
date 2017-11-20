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
    private $zonanombre;
    private $proveedorproductosprimos;
    private $personaid;
    private $proveedorProductos;
    private $proveedorUltimaCompra;
    
    
    public function Proveedores($Proveedorid,$personaid,$proveedorproductosprimos,$zonanombre) {
        $this->proveedorid = $Proveedorid;
        $this->personaid = $personaid;
        $this->proveedorproductosprimos = $proveedorproductosprimos;
        $this->zonanombre = $zonanombre;
        $this->proveedorProductos=null;
        $this->proveedorUltimaCompra=null;
    }
    public function getProveedorProductos(){
        return $this->proveedorProductos;
    }
    public function getProductorUltimaCompra(){
        return $this->proveedorUltimaCompra;
    }
    public function getProveedorId() {
        return $this->proveedorid;
    }

    public function getPersonaId(){
        return $this->personaid;
    }

    public function getProveedorProductosPrimos() {
        return $this->proveedorproductosprimos;
    }

    public function getZonaNombre(){
        return $this->zonanombre;
    }
    public function setProveedorProductos($proveedorProductos){
        $this->proveedorProductos=$proveedorProductos;
    }
    public function setProveedorUltimaCompra($proveedorUltimaCompra){
        $this->proveedorUltimaCompra=$proveedorUltimaCompra;

    }
    public function setProveedorId($proveedorid) {
        $this->proveedorid = $proveedorid;
    }
    public function setPersonaId($personaid){
        $this->personaid =$personaid;
    }
    public function setProveedorProductosPrimos($proveedorproductosprimos) {
        $this->proveedorproductosprimos = $proveedorproductosprimos;
    }

    public function setZonaNombre($zonanombre) {
        $this->zonanombre = $zonanombre;
    }

}

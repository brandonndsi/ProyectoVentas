<?php

/**
 * Description of ProveedorBusiness
 *
 * @author Juancho
 */
class ProveedorBusiness {
    
    private $DataProveedor;

    public function proveedorBusiness() {
        
        require_once '../../data/dataproveedor/DataProveedor.php';
        $this->DataProveedor= new DataProveedor();
        
    }
    
    public function insertarProveedor($proveedor) {
        return $this->DataProveedor->insertarProveedor($proveedor);
    }
    
    public function modificarProveedor($proveedor){
        return $this->DataProveedor->modificarProveedor($proveedor);
    }
    
    public function eliminarProveedor($proveedorid) {
        return $this->DataProveedor->eliminarProveedor($proveedorid);
    }
    
    public function mostrarProveedores() {
        return $this->DataProveedor->mostrarProveedors();
    }
    
    public function buscarProveedor($proveedorid) {
        return $this->DataProveedor->buscarProveedor($proveedorid);
    }
}

<?php

class FacturaBusiness {

    private $DataFactura;

    public function FacturaBusiness() {
        
        require_once '../../data/datafactura/DataFactura.php';
        $this->DataFactura = new DataFactura();
    }
    
    public function insertarFactura($factura) {
        return $this->DataFactura->insertarFactura($factura);
    }
    
    public function mostrarFactura() {
        return $this->DataFactura->mostrarFactura();
    }
    
    public function buscarFactura($facturaid) {
        return $this->DataFactura->buscarFactura($facturaid);
    }
}
?>
<?php
/**
 * Description of FacturaBusiness
 *
 * @author Juancho
 */
class FacturaBusiness {
    
     private $DataFactura;

    public function facturaBusiness() {
        
        require_once '../../data/datafacrua/DataFactura.php';
        $this->DataFactura = new DataFactura();
        
    }
    
    //se encarga de seleccionar todo los datos del cliente.
    public function mostrarFacturas() {
        return $this->DataFactura->mostrarFacturas();
    }
    
    //se encarga de la busqueda d elos clientes en la base de datos.
    public function buscarFactura($faccturaid) {
        return $this->DataFactura->buscarFactura($facturaid);
    }
}
?>
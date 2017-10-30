<?php
/**
 * ENCONTRAMOS LAS PREFERENCIAS DE LOS USUSARIOS A LA HORA DE SELECCIONAR LOS DATOS.
 *
 * @author David salas Lorente
 */

class Preferencias {

    private $preferenciasid;
    private $clienteid;
    private $productoid;
    private $preferenciasfecha;
    private $preferenciasaccion;
   
    

    public function Preferencias($preferenciasid, $clienteid, $productoid, $preferenciasfecha, $preferenciasaccion) {
        
        $this->preferenciasid = $preferenciasid;
        $this->clienteid = $clienteid;
        $this->productoid = $productoid;
        $this->preferenciasfecha = $preferenciasfecha;
        $this->preferenciasaccion = $preferenciasaccion;
    }
    

    public function getPreferenciasId() {
        return $this->preferenciasid;
    }

    public function getClienteId() {
        return $this->clienteid;
    }

    public function getProductoId() {
        return $this->productoid;
    }

    public function getPreferenciasFecha() {
        return $this->preferenciasfecha;
    }

    public function getPreferenciasAccion() {
        return $this->preferenciasaccion;
    }

    public function setPreferenciasId($preferenciasid) {
        $this->preferenciasid = $preferenciasid;
    }

    public function setClienteId($clienteid) {
        $this->clienteid = $clienteid;
    }

    public function setProductoId($productoid) {
        $this->productoid = $productoid;
    }

    public function setPreferenciasFecha($preferenciasfecha) {
        $this->preferenciasfecha = $preferenciasfecha;
    }

    public function setPreferenciasAccion($preferenciasaccion) {
        $this->preferenciasaccion = $preferenciasaccion;
    }
}

?>
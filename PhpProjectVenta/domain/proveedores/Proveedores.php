<?php

/**
 * Description of Proveedor
 *
 * @author Juancho
 */
class Proveedores {

    private $proveedorId;
    private $tipoMateriaPrima;

    public function Proveedores($proveedorId, $tipoMateriaPrima) {
        $this->proveedorId = $proveedorId;
        $this->tipoMateriaPrima = $tipoMateriaPrima;
    }

    public function getProveedorId() {
        return $this->proveedorId;
    }

    public function getTipoMateriaPrima() {
        return $this->tipoMateriaPrima;
    }

    public function setProveedorId($proveedorId) {
        $this->proveedorId = $proveedorId;
    }

    public function setTipoMateriaPrima($tipoMateriaPrima) {
        $this->tipoMateriaPrima = $tipoMateriaPrima;
    }

}

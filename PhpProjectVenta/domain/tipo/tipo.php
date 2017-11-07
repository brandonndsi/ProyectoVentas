<?php


class tipo {
    private $tipoid;
    private $tiponombre;
    private $tipoestado;
    
    public function tipo($tipoid, $tiponombre, $tipoestado) {
        $this->tipoid = $tipoid;
        $this->tiponombre = $tiponombre;
        $this->tipoestado = $tipoestado;
    }

    public function getTipoid() {
        return $this->tipoid;
    }

    public function getTiponombre() {
        return $this->tiponombre;
    }

    public function getTipoestado() {
        return $this->tipoestado;
    }

    public function setTipoid($tipoid) {
        $this->tipoid = $tipoid;
    }

    public function setTiponombre($tiponombre) {
        $this->tiponombre = $tiponombre;
    }

    public function setTipoestado($tipoestado) {
        $this->tipoestado = $tipoestado;
    }

}

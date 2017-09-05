<?php
/**
 * Description of Zona
 *
 * @author Juan
 */
class Zonas {
    
    private $zonaid;
    private $zonanombre;
    private $zonaprecio;


    public function Zonas($zonaid, $zonanombre, $zonaprecio) {
       
        $this->zonaid = $zonaid;
        $this->zonanombre = $zonanombre;
        $this->zonaprecio = $zonaprecio;
    }
    public function getZonaid() {
        return $this->zonaid;
    }

    public function getZonanombre() {
        return $this->zonanombre;
    }

    public function getZonaprecio() {
        return $this->zonaprecio;
    }

    public function setZonaid($zonaid) {
        $this->zonaid = $zonaid;
    }

    public function setZonanombre($zonanombre) {
        $this->zonanombre = $zonanombre;
    }

    public function setZonaprecio($zonaprecio) {
        $this->zonaprecio = $zonaprecio;
    }
    
}
?>
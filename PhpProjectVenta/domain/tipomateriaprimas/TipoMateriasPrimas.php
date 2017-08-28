<?php

/**
 * Description of TipoMateriasPrimas
 *
 * @author Juancho
 */
class TipoMateriasPrimas {

    private $tipomateriaprimaid;
    private $tipomateriaprimacategoria;

    public function TipoMateriasPrimas($tipomateriaprimaid, $tipomateriaprimacategoria) {
        $this->tipomateriaprimaid = $tipomateriaprimaid;
        $this->tipomateriaprimacategoria = $tipomateriaprimacategoria;
    }

    public function getTipomateriaprimaid() {
        return $this->tipomateriaprimaid;
    }

    public function getTipomateriaprimacategoria() {
        return $this->tipomateriaprimacategoria;
    }

    public function setTipomateriaprimaid($tipomateriaprimaid) {
        $this->tipomateriaprimaid = $tipomateriaprimaid;
    }

    public function setTipomateriaprimacategoria($tipomateriaprimacategoria) {
        $this->tipomateriaprimacategoria = $tipomateriaprimacategoria;
    }

}

?>

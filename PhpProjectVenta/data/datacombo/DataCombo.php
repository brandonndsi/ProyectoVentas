<?php

class DataCombo {

    private $conexion;

    function DataCombo() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/combo/Combo.php';
        $this->conexion = new Conexion();
    }

    //insertar Combo
    public function insertarCombo($combo) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarCombo= "INSERT INTO `tbcombos`(`comboproductoid`, `comboestado`) VALUES 
            ('".$combo->getComboproductoid()."',
            '".$combo->getComboestado() ."')";

            $result = mysql_query($insertarCombo);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar Combo
    public function modificarCombo($combo){

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $modificarCombo=$this->conexion->crearConexion()->query("UPDATE `tbcombos` SET
             `combocodigo`='".$combo->getComboCodigo()."',
             `combonombre`='".$combo->getComboNombre()."',
             `combosproductoid`='".$combo->getComboproductoid()."',
             `comboingredientes`='".$combo->getComboIngredientes()."',
             `comboprecio`='".$combo->getComboPrecio()."',
             `comboestado`='".$combo->getComboestado()."' 
             WHERE combosid='".$combo->getComboid()."'");
            /* "UPDATE `tbcombos` SET 
            `comboproductoid`='".$combo->getComboproductoid()."'
             WHERE combosid='".$combo->getComboid() ."'";*/

            $result = $modificarCombo;
            $this->conexion->cerrarConexion();
            
                return $result;
            
        }
    }

    //eliminar Combo
    Public function eliminarCombo($comboid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarCombo = "UPDATE `tbcombos` SET `comboestado`= 0 WHERE combosid='".$comboid."';";

            //$result = mysql_query($eliminarCombo);
            $this->conexion->cerrarConexion();
           
                return $eliminarCombo;
            
        }
    }

    //buscar una combo
    Public function buscarCombo($comboid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarCombo = $this->conexion->crearConexion()->query("SELECT * FROM `tbcombos`
                WHERE combosid='".$comboid."';");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarCombo->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar las combo
    public function mostrarCombo() {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarCombo = $this->conexion->crearConexion()->query("SELECT * FROM `tbcombos`;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarCombo->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
$dato=new DataCombo();
$da="1";
print_r($da);

?>
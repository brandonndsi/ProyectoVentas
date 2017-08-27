<?php

class DBConexion {

    var $conect;

    function DBConexion() {
        
    }

    function conectar() {

        if (!($conexion = mysql_connect("localhost", "root", ""))) {
            echo"Error al conectar a la base de datos";
            exit();
        }
        if (!mysql_select_db("bdproyectoventa", $conexion)) {
            echo "Error al seleccionar la base de datos";
            exit();
        }
        $this->conect = $conexion;
        return true;
    }

    function getCon() {
        return $this->conect;
    }

}

?>
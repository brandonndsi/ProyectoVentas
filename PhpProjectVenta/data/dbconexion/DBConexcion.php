<?php

class DBConexion {

    var $conect;
    private $server;
    private $user;
    private $password;
    private $dbname;
    private $conexion;

    function DBConexion() {
        $this->server="localhost";
        $this->user="root";
        $this->password="";
        $this->dbname="bdproyectoventa";
        
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
    //las funciones creadas por mi david salas para conectarse y desconectarse de la base de datos.

    function crearConexion(){
        $this->conexion=mysql_connect($this->server,$this->user,$this->password,$this->dbname);
        return conexion;
    }

    function cerrarConexion(){
        mysql_close($this->conexion);
    }
    //terminacion de la conexion de la base de datos heco por david salas.
}

?>
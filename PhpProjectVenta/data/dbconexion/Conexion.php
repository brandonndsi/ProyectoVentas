<?php
class Conexion {
    
    private $server;
    private $user;
    private $password;
    private $dbname;
    private $conexion;
    
    
    function Conexion(){
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->dbname = "dbacsys";
    }
    
    function crearConexion(){
        $this->conexion  = mysqli_connect($this->server,$this->user,$this->password,$this->dbname);	
        return $this->conexion;
    }
    function cerrarConexion(){
	mysqli_close ($this->conexion);                        
    }
}

?>
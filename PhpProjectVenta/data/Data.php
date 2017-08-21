<?php

class Data {

    private $server;
    private $user;
    private $password;
    private $db;
    public $conexion;
    
    
    public function Data(){
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->db = "bdproyectoventa";
    }
    
    function crearData(){
        $this->conexion  = mysqli_connect($this->server,$this->user,$this->password,$this->db);	
        return $this->conexion;
    }
    function cerrarData(){
	mysqli_close ($this->conexion);                        
    }
    function getConexion(){
        return $this->conexion;
    }
}

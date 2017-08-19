<?php

class Data {

    private $server;
    private $user;
    private $password;
    private $db;
    private $conexion;
    
    
    public function Data(){
        $this->server = "";
        $this->user = "";
        $this->password = "";
        $this->dbname = "";
    }
    
    function crearData(){
        $this->conexion  = mysqli_connect($this->server,$this->user,$this->password,$this->db);	
        return $this->conexion;
    }
    function cerrarData(){
	mysqli_close ($this->conexion);                        
    }
}

<?php

class DataPersona {

    private $conexion;

    function DataPersona() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/personas/Personas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarPersona($persona) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarpersona = "INSERT INTO tbpersonas(personaid, personanombre, personaapellido1,
            personaapellido2, personatelefono, personacorreo, zonaid) VALUES (
            '" . $persona->get_personaid() . "',
            '" . $persona->get_personanombre() . "',
            '" . $persona->get_personaapellido1() . "',
            '" . $persona->get_personaapellido2() . "',
            '" . $persona->get_personatelefono() . "',
            '" . $persona->get_personacorreo() . "',     
            '" . $persona->get_zonaid() . "')";

            $result = mysql_query($insertarpersona);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar
    public function modificarPersona($persona) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarpersona = "UPDATE tbpersonas SET 
		personaid='" . $persona->get_personaid() . "',  
		personanombre='" . $persona->get_personanombre() . "',
		personaapellido1='" . $persona->get_personaapellido1() . "',
		personaapellido2='" . $persona->get_personaapellido2() . "',
                personatelefono='" . $persona->get_personatelefono() . "',
		personacorreo='" . $persona->get_personacorreo() . "',    
                zonaid='" . $persona->get_zonaid() . "',      
		WHERE personaid =" . $persona->get_personaid() . "";

            $result = mysql_query($modificarpersona);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //eliminar
    Public function eliminarPersona($personaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarpersona = $this->conexion->crearConexion()->query("DELETE  FROM tbpersonas 
                where personaid='".$personaid."';");

            $result = mysql_query($eliminarpersona);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //buscar una persona
    Public function buscarPersona($personaid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarpersona = $this->conexion->crearConexion()->query("SELECT personaid,personanombre,
            personaapellido1,personaapellido2,personatelefono,
            personacorreo,zonaid
            FROM tbpersonas 
            WHERE personaid ='".$personaid."';"); 

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarpersona->fetch_assoc()) {
                array_push($array, $resultado);
            }
            if (!$array) {
                return false;
            } else {
                return $array;
            }
        }
    }

    //mostrar las personas
    public function mostrarPersonas() {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarpersona = $this->conexion->crearConexion()->query("SELECT personaid,personanombre,
            personaapellido1,personaapellido2,personatelefono,
            personacorreo,zonaid
            FROM tbpersonas "); 

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarpersona->fetch_assoc()) {
                array_push($array, $resultado);
            }
            if (!$array) {
                return false;
            } else {
                return $array;
            }
        }
    }

}

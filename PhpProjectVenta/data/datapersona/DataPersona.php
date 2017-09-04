<?php

class DataPersona {

    private $conexion;

    function DataPersona() {
        include_once '../../data/dbconexion/Conexcion.php';
        include_once '../../domain/personas/Personas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarPersona($persona) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $insertarpersona = "INSERT INTO tbpersonas(personaid, personanombre, personaapellido1,
            personaapellido2, personatelefono, personacorreo, zonaid, personaestado) VALUES (
            '" . $persona->get_personaid() . "',
            '" . $persona->get_personanombre() . "',
            '" . $persona->get_personaapellido1() . "',
            '" . $persona->get_personaapellido2() . "',
            '" . $persona->get_personatelefono() . "',
            '" . $persona->get_personacorreo() . "',  
            '" . $persona->get_zonaid() . "',     
            '" . $persona->get_personaestado() . "')";

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

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $modificarpersona = "UPDATE tbpersonas SET 
		personaid='" . $persona->get_personaid() . "',  
		personanombre='" . $persona->get_personanombre() . "',
		personaapellido1='" . $persona->get_personaapellido1() . "',
		personaapellido2='" . $persona->get_personaapellido2() . "',
                personatelefono='" . $persona->get_personatelefono() . "',
		personacorreo='" . $persona->get_personacorreo() . "',    
                zonaid='" . $persona->get_zonaid() . "',  
                personaestado='" . $persona->get_personaestado() . "',     
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

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $eliminarpersona = "CALL eliminarpersona('$personaid')";

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

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $buscarpersona = $this->conexion->crearConexion()->query("CALL buscarpersona('$personaid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarpersona->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar las personas
    public function mostrarPersonas() {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $mostrarpersonas = $this->conexion->crearConexion()->query("CALL mostrarpersonas()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarpersonas->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

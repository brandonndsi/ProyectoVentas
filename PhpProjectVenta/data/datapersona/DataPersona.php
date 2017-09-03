<?php

class DataPersona {

    private $conexion;

    function DataPersona() {
        include_once '../dbconexion/Conexcion.php';
        $this->conexion = new Conexion();
    }

    //buscar una persona
    function buscarPersona($personaid) {

        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $buscarpersona = $this->conexion->crearConexion()->query("CALL buscarpersona('$personaid')");

        while ($resultado = $buscarpersona->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

    //eliminar
    function eliminarPersona($personaid) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $eliminarpersona = $this->conexion->crearConexion()->query("CALL eliminarpersona('$personaid')");

        $result = mysql_query($eliminarpersona);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //insertar
    function insertarPersona($persona) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $insertarpersona = $this->conexion->crearConexion()->query("INSERT INTO tbpersonas(personaid, personanombre, personaapellido1,
            personaapellido2, personatelefono, personacorreo, zonaid) VALUES (
            '" . $persona->get_personaid() . "',
            '" . $persona->get_personanombre() . "',
            '" . $persona->get_personaapellido1() . "',
            '" . $persona->get_personaapellido2() . "',
            '" . $persona->get_personatelefono() . "',
            '" . $persona->get_personacorreo() . "',    
            '" . $persona->get_zonaid() . "')");

        $result = mysql_query($insertarpersona);
        if (!$result) {
            return false;
        } else {
            return $result;
        }        
    }

    //modificar
    function modificarPersona($persona) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $modificarpersona = $this->conexion->crearConexion()->query("UPDATE tbpersonas SET 
		personaid='" . $persona->get_personaid() . "',  
		personanombre='" . $persona->get_personanombre() . "',
		personaapellido1='" . $persona->get_personaapellido1() . "',
		personaapellido2='" . $persona->get_personaapellido2() . "',
                personatelefono='" . $persona->get_personatelefono() . "',
		personacorreo='" . $persona->get_personacorreo() . "',    
                zonaid='" . $persona->get_zonaid() . "',    
		WHERE personaid =" . $persona->get_personaid() . "");

        $result = mysql_query($modificarpersona);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //mostrar las personas
    function mostrarPersonas() {

        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $mostrarpersonas = $this->conexion->crearConexion()->query("CALL mostrarpersonas()");

            while ($resultado = $mostrarpersonas->fetch_assoc()) {
            array_push($array, $resultado);
            }
            return $array;
    }
}
$data=new DataPersona();
$da= $data->mostrarPersonas();
print_r($da);
?>
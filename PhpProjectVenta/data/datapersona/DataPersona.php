<?php

class DataPersona {

    function DataPersona() {
        
    }

    function insertar($persona) {
        $conexcion = new DBConexion;
        if ($conexcion->conectar() == true) {

            $query = "INSERT INTO tbpersona(telefonoPersona, nombrePersona, apellido1Persona,
			 apellido2Persona, idZona) VALUES (
                                '" . $persona->get_telefonoPersona() . "',
				'" . $persona->get_nombrePersona() . "',
				'" . $persona->get_apellido1Persona() . "',
				'" . $persona->get_apellido2Persona() . "',
				'" . $persona->get_idZona() . "')";

            $result = mysql_query($query);
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    function eliminar($id) {
        $conexcion = new DBConexion;
        if ($conexcion->conectar() == true) {

            $query = "DELETE FROM tbpersona WHERE telefonoPersona=" . $id;
            $result = mysql_query($query);
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //funcional
    function obtener($id) {
        $conexcion = new DBConexion;
        $persona;

        if ($conexcion->conectar() == true) {

            $query = mysql_query("SELECT * FROM tbpersona p INNER JOIN tbzona z ON p.idZona= z.idZona"
                    . " WHERE telefonoPersona=$id") or die(mysql_error());

            $result = mysql_query($query);

            if ($row = mysql_fetch_array($result)) {
                $persona = new persona($row[0], $row[1], $row[2], $row[3], $row[4]);
            }

            if (!$persona) {
                return false;
            } else {
                return $persona;
            }
        }
    }

    function modificar($persona) {
        $conexcion = new DBConexion;
        if ($conexcion->conectar() == true) {

            $query = "UPDATE tbpersona SET 
		telefonoPersona='" . $persona->get_telefonoPersona() . "',  
		nombrePersona='" . $persona->get_nombrePersona() . "',
		apellido1Persona='" . $persona->get_apellido1Persona() . "',
		apellido2Persona='" . $persona->get_apellido2Persona() . "',
                idZona='" . $persona->get_idZona() . "',    
		WHERE telefonoPersona =" . $persona->get_telefonoPersona() . "";
            
            $result = mysql_query($query);
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //Este metodo es para que se vean los campos en la tabla
    function get_personas() {
        $conexcion = new DBConexion;
        $lista = array();

        if ($conexcion->conectar() == true) {
            $query = mysql_query("SELECT * FROM tbpersona p INNER JOIN tbzona z ON p.idZona= z.idZona") or die(mysql_error());

            $result = mysql_query($query);

            while ($row = mysql_fetch_array($result)) {
                $persona = new persona($row[0], $row[1], $row[2], $row[3], $row[4]);
                array_push($lista, $persona);
            }
            if (!$lista) {
                return false;
            } else {
                return $lista;
            }
        }
    }

}

?>
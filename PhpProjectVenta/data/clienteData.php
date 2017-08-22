<?php

include_once './Data.php';
include '../domain/Persona.php';

class clienteData extends Data {

    function insertTBCliente($cliente) {

        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');
        //Get the last id
        $query = "SELECT MAX(idPersona) AS idPersona  FROM tbpersona";
        $idCont = mysqli_query($conexion, $query);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        // consulta de insertar
        $queryInsert = "INSERT INTO tbpersona VALUES (" . $nextId . ",'" .
                $cliente->getTelefonoCliente() . "','" .
                $cliente->getNombreCliente() . "','" .
                $cliente > getApellido1Cliente() . "," .
                $cliente->getApellido2Cliente() . "," .
                $cliente->getTipoUsuarioCliente() .
                $cliente->getIdZona() . "','" .
                $cliente->getIdCliente() . ");";
        echo "DATOS GUARDADOS";

        $result = mysqli_query($conexion, $queryInsert);
        mysqli_close($conexion);
        
        return $result;
    }

    public function updateTBCliente($cliente) {
        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');
        
        //Consulta de actualizacion
        $queryUpdate = "UPDATE tbpersona SET telefonoPersona='" . $cliente->getTelefonoPersona() .
                "', nombrePersona='" . $cliente->getNombrePersona() .
                "', apellido1Persona='" . $cliente->getApellido1Persona() .
                "', apellido2Persona=" . $cliente->getApellido2Persona() .
                ", tipoUsuarioPersona=" . $cliente->getTipoUsuarioPersona() .
                "', idZona='" . $cliente->getIdZona() .
                "', idEmpleado='" . $cliente->getIdEmpleado() .
                " WHERE telefonoPersona=" . $cliente->getTelefonoPersona() . ";";
        
        echo "DATOS ACTUALIZADOS";

        $result = mysqli_query($conexion, $queryUpdate);
        mysqli_close($conexion);

        return $result;
    }
    
    public function deleteTBCliente($telefonoPersona) {
        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');

        //consulta de eliminar
        $queryDelete = "DELETE from tbpersona where telefonoPersona=" . $telefonoPersona . ";";
        $result = mysqli_query($conexion, $queryDelete);
        mysqli_close($conexion);

        return $result;
    }    
    
    public function getAllTBCliente() {
        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');

        $querySelect = "SELECT * FROM tbpersona;";
        $result = mysqli_query($conexion, $querySelect);
        mysqli_close($conexion);
        $clientes= [];
        while ($row = mysqli_fetch_array($result)) {
            $corrienteCliente = new Persona($row['telefonoPersona'], $row['nombrePersona'], $row['apellido1Persona'],
            $row['apellido2Persona'], $row['tipoUsuarioPersona'], $row['idZona'], $row['idEmpleado']);
            
            array_push($clientes, $corrienteEmpleado);
        }
        return $clientes;
    }    
}

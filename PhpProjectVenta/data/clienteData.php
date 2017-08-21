<?php
/**
 * Description of clienteData
 *
 * @author Nexus
 */
include_once '../domain/Cliente.php';
include './Data.php';
$base="bdproyectoventa";
class clienteData extends Data{
    
    //put your code here
    function insertTBCliente($cliente){
       $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');
       //Get the last id
        $queryGetLastId = "SELECT MAX(idPersona) AS idPersona  FROM tbpersona";
        $idCont = mysqli_query($conexion, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbpersona VALUES (" . $nextId . ",'" .
                $cliente->getTelefonoCliente() . "','" .
                $cliente->getNombreCliente() . "','" .
                $cliente>getApellido1Cliente() . "," .
                $cliente->getApellido2Cliente() . "," .
                $cliente->getTipoUsuarioCliente() . 
                $cliente->getIdZona() . "','" .
                $cliente->getIdCliente(). ");"; 
        echo "DATOS GUARDADOS";
                
        $result = mysqli_query($conexion, $queryInsert);
        mysqli_close($conexion);
    }
}

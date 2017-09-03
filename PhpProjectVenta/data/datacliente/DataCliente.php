<?php

class DataCliente {

    private $conexion;

    function DataCliente() {
        include_once '../../data/dbconexion/Conexion.php';
        $this->conexion = new Conexion();
    }

    //insertar los datos
                function insertarCliente($cliente) {

                    $this->conexion->crearConexion()->set_charset('utf8');

                    $insertarcliente = $this->conexion->crearConexion()->query("INSERT INTO tbclientes(clienteid,
                        personaid, clientedireccionexacta) VALUES (
                            '" . $cliente->get_clienteid() . "',
            		'" . $cliente->get_personaid() . "',  
            		'" . $cliente->get_clientedireccionexacta() . "')");

                    $result = mysql_query($insertarcliente);
                    if (!$result) {
                        return false;
                    } else {
            return $result;
        }
    }

    //eliminar
    function eliminarCliente($clienteid) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $eliminarcliente = $this->conexion->crearConexion()->query("CALL eliminarcliente('$clienteid')");

        $result = mysql_query($eliminarcliente);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //buscar
    function buscarCliente($clienteid) {

        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $buscarcliente = $this->conexion->crearConexion()->query("CALL buscarcliente('$clienteid')");

        while ($resultado = $buscarcliente->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }

    //modificar
    function modificarCliente($cliente) {

        $this->conexion->crearConexion()->set_charset('utf8');

        $modificarcliente = $this->conexion->crearConexion()->query("UPDATE tbclientes SET 
		clienteid='" . $cliente->get_clienteid() . "',
		personaid='" . $cliente->get_personaid() . "',
                clientedireccionexacta='" . $cliente->get_clientedireccionexacta() . "',    
		WHERE clienteid =" . $cliente->get_clienteid() . "");

        $result = mysql_query($modificarcliente);
        if (!$result) {
            return false;
        } else {
            return $result;
        }
    }

    //mostrar clientes
    function mostrarClientes() {
        $array = array();
        $this->conexion->crearConexion()->set_charset('utf8');

        $mostrarclientes = $this->conexion->crearConexion()->query("CALL mostrarcliente()");

        while ($resultado = $mostrarclientes->fetch_assoc()) {
            array_push($array, $resultado);
        }
        return $array;
    }
    
}
/*$datos=new DataCliente();
$d=$datos->mostrarClientes();
print_r($d);*/

?>
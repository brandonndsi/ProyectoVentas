<?php

class DataCliente {

    private $conexion;

    function DataCliente() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/clientes/Clientes.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarCliente($cliente) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $insertarcliente = $this->conexion->crearConexion()->query("INSERT INTO tbclientes(clienteid,
            personaid, clientedireccionexacta, clienteestado) VALUES (
                '" . $cliente->get_clienteid() . "',
		'" . $cliente->get_personaid() . "',
                '" . $cliente->get_clientedireccionexacta() . "',    
		'" . $cliente->get_clienteestado() . "')");

            $result = mysql_query($insertarcliente);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar
    public function modificarCliente($cliente) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $modificarcliente = $this->conexion->crearConexion()->query("UPDATE tbclientes SET 
		clienteid='" . $cliente->get_clienteid() . "',
		personaid='" . $cliente->get_personaid() . "',
                clientedireccionexacta='" . $cliente->get_clientedireccionexacta() . "', 
                clienteestado='" . $cliente->get_clienteestado() . "',    
		WHERE clienteid =" . $cliente->get_clienteid() . "");

            $result = mysql_query($modificarcliente);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //eliminar
    public function eliminarCliente($clienteid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $eliminarcliente = $this->conexion->crearConexion()->query("CALL eliminarcliente('$clienteid')");

            $result = mysql_query($eliminarcliente);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //buscar
    public function buscarCliente($clienteid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $buscarcliente = $this->conexion->crearConexion()->query("CALL buscarcliente('$clienteid')");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarcliente->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar clientes
    public function mostrarClientes() {
        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $mostrarclientes = $this->conexion->crearConexion()->query("CALL mostrarcliente()");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarclientes->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

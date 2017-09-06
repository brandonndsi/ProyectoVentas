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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarcliente = $this->conexion->crearConexion()->query("INSERT INTO tbclientes(clienteid,
            personaid, clientedireccionexacta,clientedescuento, clienteacumulado, clienteestado) VALUES (
                '" . $cliente->get_clienteid() . "',
		'" . $cliente->get_personaid() . "',    
                '" . $cliente->get_clientedireccionexacta() . "',
                '" . $cliente->get_clientedescuento() . "',     
                '" . $cliente->get_clienteacumulado() . "',    
		'" . $cliente->get_clienteestado() . "')");

            $this->conexion->cerrarConexion();
            return $insertarcliente;
            
        }
    }

    //modificar
    public function modificarCliente($cliente) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarcliente = $this->conexion->crearConexion()->query("UPDATE tbclientes SET 
		clienteid='" . $cliente->get_clienteid() . "',
		personaid='" . $cliente->get_personaid() . "',
                clientedireccionexacta='" . $cliente->get_clientedireccionexacta() . "',  
                clientedescuento='" . $cliente->get_clientedescuento() . "',
                clienteacumulado='" . $cliente->get_clienteacumulado() . "', 
                clienteestado='" . $cliente->get_clienteestado() . "',    
		WHERE clienteid =" . $cliente->get_clienteid() . "");

            $this->conexion->cerrarConexion();
            return $modificarcliente;
        }
    }

    //eliminar
    public function eliminarCliente($clienteid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarcliente = $this->conexion->crearConexion()->query("CALL eliminarcliente('$clienteid')");

            $this->conexion->cerrarConexion();
            return $eliminarcliente;
        }
    }

    //buscar
    public function buscarCliente($clienteid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

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
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

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

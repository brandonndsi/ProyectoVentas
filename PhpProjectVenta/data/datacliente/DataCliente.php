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

            $array = array();

            $buscarcliente = $this->conexion->crearConexion()->query("INSERT INTO tbclientes('clienteid',
            'personaid', 'clientedirecionexacta',' clientedescuento', 'clienteacumulado', 'cleinteestado'  VALUES (
                '" . $cliente->get_personaid() . "',
		'" . $cliente->get_clienteDireccionexacta() . "',
		'" . $cliente->get_clientedescuento() . "',
		'" . $cliente->get_clienteacumulado() . "',  
		'1');");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarcliente->fetch_assoc()) {
                array_push($array, $resultado);
            }
            if (!$array) {
                return false;
            } else {
                return $array;
            }
        }
    }

    //modificar
    public function modificarCliente($cliente) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            /* actualiza el nuevo cliente a la base de datos */
            $recuperandoIdcliente = $this->conexion->crearConexion()->query("UPDATE `tbclientes` "
                    . "SET `clientedireccionexacta`='" . $cliente->getClienteDireccionExacta() . "' "
                    . "WHERE clienteid='" . $cliente->getClienteId() . "' AND clienteestado =1;");

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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarcliente = $this->conexion->crearConexion()->query("UPDATE `tbclientes` SET`clienteestado`=0 "
                    . "WHERE clienteid='" . $clienteid . "';");

            return $eliminarCliente;
        }
    }

    //buscar
    public function buscarCliente($clienteid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarcliente = $this->conexion->crearConexion()->query("SELECT  clienteid','personaid', 
            'clientedirecionexacta',' clientedescuento', 'clienteacumulado', FROM `tbclientes` WHERE
             clienteid='".$clienteid."' AND clienteestado=1;");

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

            $mostrarclientes = $this->conexion->crearConexion()->query("SELECT  clienteid','personaid', 
            'clientedirecionexacta',' clientedescuento', 'clienteacumulado', FROM `tbclientes`
            WHERE clienteestado=1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarclientes->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

?>
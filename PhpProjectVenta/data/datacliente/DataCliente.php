<?php

class DataCliente {

    private $conexion;

    function DataCliente() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/clientes/Clientes.php';
        include_once '../../domain/personas/Personas.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarCliente($cliente) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $insertarcliente = $this->conexion->crearConexion()->query("INSERT INTO tbclientes(clienteid,
            personanombre, personaapellido1,personaapellido2, personatelefono, personacorreo, zonaid, clientedireccionexacta) VALUES (
                '" . $cliente->getClienteid() . "',
		'" . $cliente->getPersonanombre() . "',    
                '" . $cliente->getPersonaapellido1() . "',
                '" . $cliente->getPersonaapellido2() . "',     
                '" . $cliente->getPersonatelefono() . "',
                '" . $cliente->getPersonacorreo() . "',     
                '" . $cliente->getZonaid() . "',    
		'" . $cliente->getClientedireccionexacta() . "')");

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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $modificarcliente = $this->conexion->crearConexion()->query("UPDATE tbclientes SET 
		clienteid='" . $cliente->getClienteid() . "',
		personanombre='" . $cliente->getPersonanombre() . "',
                personaapellido1='" . $cliente->getPersonaapellido1() . "',
		personaapellido2='" . $cliente->getPersonaapellido2() . "',
                personatelefono='" . $cliente->getPersonatelefono() . "',  
                personacorreo='" . $cliente->getPersonacorreo() . "',
                zonaid='" . $cliente->getZonaid() . "',     
                clientedireccionexacta='" . $cliente->getClientedireccionexacta() . "',      
		WHERE clienteid =" . $cliente->getClienteid() . "");

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

            $eliminarcliente = $this->conexion->crearConexion()->query("DELETE  FROM tbclientes 
                where clienteid='".$clienteid."';");

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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarcliente = $this->conexion->crearConexion()->query("SELECT e.clienteid,p.personanombre,
            p.personaapellido1,p.personaapellido2,p.personatelefono,
            p.personacorreo,z.zonaprecio,z.zonanombre,e.clientedireccionexacta,
            e.clientedescuento,e.clienteacumulado
            FROM tbclientes e
            INNER JOIN tbpersonas p ON e.personaid= p.personaid
            INNER JOIN tbzonas z ON p.zonaid= z.zonaid
            WHERE e.clienteid ='".$clienteid."';"); 

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

    //mostrar clientes
    public function mostrarClientes() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarcliente = $this->conexion->crearConexion()->query("SELECT e.clienteid,p.personanombre,
            p.personaapellido1,p.personaapellido2,p.personatelefono,
            p.personacorreo,z.zonaprecio,z.zonanombre,e.clientedireccionexacta,
            e.clientedescuento,e.clienteacumulado
            FROM tbclientes e
            INNER JOIN tbpersonas p ON e.personaid= p.personaid
            INNER JOIN tbzonas z ON p.zonaid= z.zonaid");

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

}

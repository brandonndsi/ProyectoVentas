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
            /*Para ingresar nueva persona en la base de datos.*/
           $personanuevo= $this->conexion->crearConexion()->query("INSERT INTO `tbpersonas`(
                `personanombre`,`personaapellido1`, `personaapellido2`, 
                `personatelefono`, `personacorreo`, `zonaid`) VALUES (
                '".$cliente->getPersonaNombre()."',
                '".$cliente->getPersonaApellido1()."',
                '".$cliente->getPersonaApellido2()."',
                '".$cliente->getPersonaTelefono()."',
                '".$cliente->getCorreo()."',
                '".$cliente->getIdZona()."');");

           /*para recupera el id del cliente.*/
            $recuperandoIdPersona=$this->conexion->crearConexion()->query("SELECT `personaid`FROM `tbpersonas` WHERE 
                personanombre='".$cliente->getPersonaNombre()."';");

            /*transformando los datos del id objeto a un string*/
            $con;
            while ($resultado = $recuperandoIdPersona->fetch_assoc()){
                $con=$resultado['personaid'];     
            }
            /*verificamos si es un string ya formulado*/
            if(is_string($con)){
                $cliente->setPersonaId($con);
            }
            /*Creamos el nuevo cliente a la base de datos*/
            $recuperandoIdcliente=$this->conexion->crearConexion()->query("INSERT INTO `tbclientes`(`personaid`, 
            `clientedireccionexacta`, `clientedescuento`, `clienteacumulado`, `clienteestado`) 
            VALUES (
            '".$cliente->getPersonaId()."',
            '".$cliente->getClienteDireccionExacta()."',
            '".$cliente->getClienteDescuento()."',
            '".$cliente->getClienteAcumulado()."',
            '1');");

        $this->conexion->cerrarConexion();

        return $recuperandoIdcliente;
         
        }
    }

    //modificar
    public function modificarCliente($cliente) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

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

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarcliente = $this->conexion->crearConexion()->query("UPDATE `tbclientes` SET`clienteestado`=0 WHERE clienteid='".$clienteid."';");

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
                p.personaapellido1,p.personaapellido2
                ,p.personatelefono,
                p.personacorreo,e.clientedescuento,
                e.clienteacumulado,z.zonaprecio
                ,z.zonanombre,
                e.clientedireccionexacta 
                FROM tbclientes e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON p.zonaid= z.zonaid
                WHERE p.personanombre='".$clienteid."' AND e.clienteestado=1 OR 
                e.clienteid='".$clienteid."' AND e.clienteestado=1 OR
                 p.personatelefono='".$clienteid."' AND e.clienteestado=1;");

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

            $mostrarclientes = $this->conexion->crearConexion()->query("SELECT 
                p.personanombre,
                p.personaapellido1,
                p.personaapellido2,
                p.personatelefono,
                p.personacorreo,e.clientedescuento,
                e.clientedireccionexacta 
                FROM tbclientes e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON p.zonaid= z.zonaid
                WHERE e.personaid=p.personaid AND e.clienteestado=1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarclientes->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

/*$dat=new DataCliente();
$cliente=new Clientes(null,null,"david");
$cliente->setPersonaNombre("davidddd");
                $cliente->setPersonaApellido1("cdd");
                $cliente->setPersonaApellido2("sad");
                $cliente->setPersonaTelefono("2312");
                $cliente->setIdZona("45");
                $cliente->setCorreo("ddd@gmial.com");
$d=$dat->insertarCliente($cliente);
print_r($d);*/
?>
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
                `personatelefono`, `personacorreo`, `zonaid`, `personaestado`) VALUES (
                '".$cliente->getPersonaNombre()."',
                '".$cliente->getPersonaApellido1()."',
                '".$cliente->getPersonaApellido2()."',
                '".$cliente->getPersonaTelefono()."',
                '".$cliente->getCorreo()."',
                '".$cliente->getIdZona()."','1');");

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
            '".$cliente->getClienteAcumulado()."','1');");

                /*lo de las millas del cliente*/
                /*recuperando el id del cliente para meterlo a las millas del cliente.*/
                $ClienteID = $this->conexion->crearConexion()->query("SELECT clienteid FROM `tbclientes` WHERE personaid ='".$cliente->getPersonaId()."';");
                    /*creando las millas del cliente con el id del cliente.*/
            $CreandoMillas = $this->conexion->crearConexion()->query("INSERT INTO `tbmillas`
            (`clienteid`, `millacantidad`, `millaestado`) VALUES (
            '".$ClienteID."',0,1");

        $this->conexion->cerrarConexion();

        return $recuperandoIdcliente;
         
        }
    }

    //modificar
    public function modificarCliente($cliente) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            /*actualiza el nuevo cliente a la base de datos*/
            $recuperandoIdcliente=$this->conexion->crearConexion()->query("UPDATE `tbclientes` SET "
             . "`clientedireccionexacta`='".$cliente->getClienteDireccionExacta()."' WHERE clienteid='"
              .$cliente->getClienteId()."';");

            /*para recupera el id del cliente.*/
            $recuperandoIdPersona=$this->conexion->crearConexion()->query("SELECT `personaid`
                FROM `tbclientes` WHERE 
                clienteid='".$cliente->getClienteId()."';");
            /*actualizando las millas del cliente*/
            $millasActualizar = $this->conexion->crearConexion()->query("UPDATE `tbmillas` SET 
            `millacantidad`='".$cliente->getMillas()."' WHERE clienteid='".$cliente->getClienteId()."';");
            
            /*transformando los datos del id objeto a un string*/
            $con;

            while ($resultado = $recuperandoIdPersona->fetch_assoc()){
                $con=$resultado['personaid'];     
            }
            /*verificamos si es un string ya formulado*/
            if(is_string($con)){
                $cliente->setPersonaId($con);
            }
            
            /*Para ingresar nueva persona en la base de datos.*/
           $personanuevo= $this->conexion->crearConexion()->query("UPDATE `tbpersonas` SET 
            `personanombre`='".$cliente->getPersonaNombre()."',
            `personaapellido1`='".$cliente->getPersonaApellido1()."',
            `personaapellido2`='".$cliente->getPersonaApellido2()."',
            `personatelefono`='".$cliente->getPersonaTelefono()."',
            `personacorreo`='".$cliente->getCorreo()."',
            `zonaid`='".$cliente->getIdZona()."' 
            WHERE personaid='".$cliente->getPersonaId()."';");

        $this->conexion->cerrarConexion();

        return $recuperandoIdcliente;
         
        }
    }

    //eliminar
    public function eliminarCliente($clienteid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarcliente = $this->conexion->crearConexion()->query("UPDATE `tbclientes` SET`clienteestado`=0"
            . " WHERE clienteid='".$clienteid."';");

            return $eliminarCliente;
        }
    }

    //buscar
    public function buscarCliente($clienteid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarcliente = $this->conexion->crearConexion()->query("SELECT 
                e.clienteid,p.personanombre,
                p.personaapellido1,p.personaapellido2
                ,p.personatelefono,
                p.personacorreo,p.zonaid,
                e.clientedireccionexacta 
                FROM tbclientes e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
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

            $mostrarclientes = $this->conexion->crearConexion()->query("SELECT *
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


?>
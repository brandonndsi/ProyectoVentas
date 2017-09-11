<?php

class DataProveedor {

        private $conexion;

    function DataProveedor() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/proveedores/Proveedores.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarProveedor($proveedor) {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            /*Para ingresar nueva persona en la base de datos.*/
           $personaNueva = $this->conexion->crearConexion()->query("INSERT INTO `tbpersonas`( `personanombre`, 
            `personaapellido1`, `personaapellido2`,
            `personatelefono`, `personacorreo`) VALUES 
            ('".$proveedor->getPersonaNombre()."',
            '".$proveedor->getPersonaApellido1()."',
            '".$proveedor->getPersonaApellido2()."',
            '".$proveedor->getPersonaTelefono()."',
            '".$proveedor->getCorreo()."');");

           $Personaid=$this->conexion->crearConexion()->query("SELECT `personaid` FROM `tbpersonas` WHERE personanombre='".$proveedor->getPersonaNombre()."';");

           $con;
            while ($resultado = $Personaid->fetch_assoc()){
                $con=$resultado['personaid'];     
            }
            /*verificamos si es un string ya formulado*/
    
                $proveedor->setPersonaId($con);

            $recuperandoIdProveedor=$this->conexion->crearConexion()->query("INSERT INTO 
            `tbproveedor`( `personaid`, `proveedordireccion`, `proveedorestado`, `materiaprimaid`)
            VALUES ('".$proveedor->getPersonaId()."','".$proveedor->getProveedorDireccion()."',
            '1', '".$proveedor->getMateriaPrimaid()."');");

                $this->conexion->cerrarConexion();


           return  $recuperandoIdProveedor;

         
        }
    }

    //modificar
    public function modificarProveedor($proveedor) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

        //return echo 'hola';
         
        }
    }

    //eliminar
    public function eliminarProveedor($proveedorid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarcliente = $this->conexion->crearConexion()->query("UPDATE `tbproveedor` SET `proveedorestado`=0 WHERE proveedorid='".$proveedorid."';");

            return $eliminarCliente;
        }
    }

    //buscar
    public function buscarProveedor($proveedorid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarProveedor = $this->conexion->crearConexion()->query("SELECT
                e.proveedorid, 
                p.personanombre,
                p.personaapellido1,
                p.personaapellido2,
                p.personatelefono,
                p.personacorreo,
                e.proveedordireccion,
                e.materiaprimaid 
                FROM tbproveedor e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON p.zonaid= z.zonaid
                WHERE e.proveedorid='".$proveedorid."' AND e.proveedorestado=1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarProveedor->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar clientes
    public function mostrarProveedor() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarProveedor = $this->conexion->crearConexion()->query("SELECT
                e.proveedorid, 
                p.personanombre,
                p.personaapellido1,
                p.personaapellido2,
                p.personatelefono,
                p.personacorreo,
                e.proveedordireccion,
                e.materiaprimaid 
                FROM tbproveedor e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON p.zonaid= z.zonaid
                WHERE e.personaid=p.personaid AND e.proveedorestado=1;");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarProveedor->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}

?>
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
            /* Para ingresar nueva persona en la base de datos. */
            $personaNueva = $this->conexion->crearConexion()->query("INSERT INTO `tbpersonas`( `personanombre`, 
            `personaapellido1`, `personaapellido2`,
            `personatelefono`, `personacorreo`) VALUES 
            ('" . $proveedor->getPersonaNombre() . "',
            '" . $proveedor->getPersonaApellido1() . "',
            '" . $proveedor->getPersonaApellido2() . "',
            '" . $proveedor->getPersonaTelefono() . "',
            '" . $proveedor->getCorreo() . "');");

            $Personaid = $this->conexion->crearConexion()->query("SELECT `personaid` FROM `tbpersonas` WHERE personanombre='" . $proveedor->getPersonaNombre() . "';");

            $con;
            while ($resultado = $Personaid->fetch_assoc()) {
                $con = $resultado['personaid'];
            }
            /* verificamos si es un string ya formulado */

            $proveedor->setPersonaId($con);

            $recuperandoIdProveedor = $this->conexion->crearConexion()->query("INSERT INTO 
            `tbproveedores`( `personaid`, `proveedordireccion`, `proveedorestado`, `materiaprimaid`)
            VALUES ('" . $proveedor->getPersonaId() . "','" . $proveedor->getProveedorDireccion() . "',
            '1', '" . $proveedor->getMateriaPrimaid() . "');");

            $this->conexion->cerrarConexion();


            return $recuperandoIdProveedor;
        }
    }

    //modificar
    public function modificarProveedor($proveedor) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            //modificando lo que es el proveedor.
            $actualizandoProveedor = $this->conexion->crearConexion()->query("UPDATE `tbproveedores` SET `proveedordireccion`='" . $proveedor->getProveedorDireccion() . "' ,
            `materiaprimaid`='" . $proveedor->getMateriaPrimaid() . "' 
            WHERE proveedorid='" . $proveedor->getProveedorId() . "';");
            //recuperando lo que es el id de la persona en proveedor.
            $Personaid = $this->conexion->crearConexion()->query("SELECT  `personaid` FROM `tbproveedor` WHERE proveedorid='" . $proveedor->getProveedorId() . "';");

            while ($resultado = $Personaid->fetch_assoc()) {
                $con = $resultado['personaid'];
            }
            /* verificamos si es un string ya formulado */

            $proveedor->setPersonaId($con);
            //modificando el tb persona
            $personanuevo = $this->conexion->crearConexion()->query("UPDATE `tbpersonas` SET 
            `personanombre`='" . $proveedor->getPersonaNombre() . "',
            `personaapellido1`='" . $proveedor->getPersonaApellido1() . "',
            `personaapellido2`='" . $proveedor->getPersonaApellido2() . "',
            `personatelefono`='" . $proveedor->getPersonaTelefono() . "',
            `personacorreo`='" . $proveedor->getCorreo() . "'
            WHERE personaid='" . $proveedor->getPersonaId() . "';");

            $this->conexion->cerrarConexion();

            return $actualizandoProveedor;
        }
    }

    //eliminar
    public function eliminarProveedor($proveedorid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarcliente = $this->conexion->crearConexion()->query("UPDATE `tbproveedores` SET `proveedorestado`=0 WHERE proveedorid='" . $proveedorid . "';");

            return $eliminarCliente;
        }
    }

    //buscar
    public function buscarProveedor($proveedorid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $buscarProveedor = $this->conexion->crearConexion()->query("SELECT *
                FROM tbproveedores e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON z.zonaid= p.zonaid
                INNER JOIN tbmateriasprimas mp ON e.materiaprimaid= mp.materiaprimaid
                WHERE e.proveedorid='" . $proveedorid . "' AND e.proveedorestado=1;");

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

            $mostrarProveedor = $this->conexion->crearConexion()->query("SELECT *
                FROM tbproveedores e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON z.zonaid= p.zonaid
                INNER JOIN tbmateriasprimas mp ON e.materiaprimaid= mp.materiaprimaid
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
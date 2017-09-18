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
            `personaapellido1`, `personaapellido2`,`personatelefono`, `personacorreo`, `zonaid`, `personaestado`) VALUES(
            '" . $proveedor->getPersonaNombre() . "',
            '" . $proveedor->getPersonaApellido1() . "',
            '" . $proveedor->getPersonaApellido2() . "',
            '" . $proveedor->getPersonaTelefono() . "',
            '" . $proveedor->getCorreo() . "',
            '" . $proveedor->getIdZona()."','1');");

            $RePersonaid = $this->conexion->crearConexion()->query("SELECT `personaid` FROM `tbpersonas` "
            . "WHERE personanombre='" . $proveedor->getPersonaNombre() . "';");

            while ($resultado = $RePersonaid->fetch_assoc()) {
                $con = $resultado['personaid'];
            }
            /* verificamos si es un string ya formulado */
             if(is_string($con)){
            $proveedor->setPersonaId($con);
             }

            $recuperandoIdProveedor = $this->conexion->crearConexion()->query("INSERT INTO `tbproveedores`(proveedorid, personaid,
            materiaprimaid, proveedorcantidadproducto, proveedortotalproducto,proveedorestado ) VALUES (
            '" . $proveedor->getProveedorId() . "',
            '" . $proveedor->getPersonaId() . "',
            '" . $proveedor->getMateriaPrimaid() . "',                
            '" . $proveedor->getProveedorcantidadproducto() . "',
            '" . $proveedor->getproveedortotalproducto() . "',
            '1');");

            $this->conexion->cerrarConexion();

            return $recuperandoIdProveedor;
        }
    }

    //modificar
    public function modificarProveedor($proveedor) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            //modificando lo que es el proveedor.
            $actualizandoProveedor = $this->conexion->crearConexion()->query("UPDATE `tbproveedores` SET"
                 . "`materiaprimaid`='" . $proveedor->getMateriaPrimaid()   
                 . " `proveedorcantidadproducto`='" . $proveedor->getProveedorcantidadproducto() 
                 . " `proveortotalproducto`='" . $proveedor->getProveedortotalproducto(). 
                 "'WHERE proveedorid='" . $proveedor->getProveedorId() . "';");

            //recuperando lo que es el id de la persona en proveedor.
            $recuperandoIdPersona = $this->conexion->crearConexion()->query("SELECT `personaid`
                FROM `tbproveedores` WHERE proveedorid='" . $proveedor->getProveedorId() . "';");

            /* transformando los datos del id objeto a un string */
            while ($resultado = $recuperandoIdPersona->fetch_assoc()) {
                $con = $resultado['personaid'];
            }
            /* verificamos si es un string ya formulado */
            if (is_string($con)) {
                $proveedor->setPersonaId($con);
            }

            //modificando el tb persona
            $personanuevo = $this->conexion->crearConexion()->query("UPDATE `tbpersonas` SET 
            `personanombre`='" . $proveedor->getPersonaNombre() . "',
            `personaapellido1`='" . $proveedor->getPersonaApellido1() . "',
            `personaapellido2`='" . $proveedor->getPersonaApellido2() . "',
            `personatelefono`='" . $proveedor->getPersonaTelefono() . "',
            `personacorreo`='" . $proveedor->getCorreo() . "',
            `zonaid`='" . $proveedor->getIdZona() . "' 
            WHERE personaid='" . $proveedor->getPersonaId() . "';");

            $this->conexion->cerrarConexion();

            return $actualizandoProveedor;
        }
    }

    //eliminar
    public function eliminarProveedor($proveedorid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarproveedor = $this->conexion->crearConexion()->query("UPDATE `tbproveedores` "
                    . "SET `proveedorestado`=0 WHERE proveedorid='" . $proveedorid . "';");

            return $eliminarproveedor;
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
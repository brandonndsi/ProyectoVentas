<?php

class DataEmpleado {

    private $conexion;

    function DataEmpleado() {
        include_once '../../data/dbconexion/Conexion.php';
       // include '../../domain/empleados/Empleados.php';
        $this->conexion = new Conexion();
    }

    //insertar
    public function insertarEmpleado($empleado) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $insertarempleado = $this->conexion->crearConexion()->query("INSERT INTO `tbempleados`(`empleadoid`, `personaid`, `tipoempleado`, `empleadocedula`, `empleadofechaingreso`, `empleadocontrasenia`, `empleadoedad`, `empleadosexo`, `empleadoestadocivil`, `empleadobanco`, `empleadocuentabancaria`, `empleadolicenciaid`, `empleadoestado`) VALUES (
                '" .$empleado->getEmpleadoid() . "',
                '" .$empleado->getPersonaid() . "',
                '" .$empleado->getTipoEmpleado() . "',
                '" .$empleado->getEmpleadoCedula() . "',
                '".$empleado->getFechaIngreso()."',
                '".$empleado->getEmpleadoContrasenia()."',
                '".$empleado->getEmpleadoEdad()."',
                '".$empleado->getEmpleadoSexo()."',
                '".$empleado->getEmpleadoEstadoCivil()."',
                '".$empleado->getBanco()."',
                '".$empleado->getEmpleadoCuentaBancaria()."',
                '".$empleado->getEmpleadoLicenciaId()."',
                '1');");

            $result = $insertarempleado;
            $this->conexion->cerrarConexion();
           
                return $result;
            
        }
    }

    //modificar
    public function modificarEmpleado($empleado) {

       if ($this->conexion->crearConexion()->set_charset('utf8')) {

            /*actualiza el nuevo empleado a la base de datos*/
             $recuperandoIdempleado=$this->conexion->crearConexion()->query("UPDATE `tbempleados` SET
            `personaid`='" .$empleado->getPersonaid() . "',
            `tipoempleado`='" .$empleado->getTipoEmpleado() . "',
            `empleadocedula`='" .$empleado->getEmpleadoCedula() . "',
            `empleadofechaingreso`='".$empleado->getFechaIngreso()."',
            `empleadocontrasenia`='".$empleado->getEmpleadoContrasenia()."',`
            empleadoedad`='".$empleado->getEmpleadoEdad()."',
            `empleadosexo`='".$empleado->getEmpleadoSexo()."',
            `empleadoestadocivil`='".$empleado->getEmpleadoEstadoCivil()."',
            `empleadobanco`='".$empleado->getBanco()."',
            `empleadocuentabancaria`='".$empleado->getEmpleadoCuentaBancaria()."',
            `empleadolicenciaid`='".$empleado->getEmpleadoLicenciaId()."'
             WHERE empleadoid='".$empleado->getEmpleadoid() ."';");
            /*para recupera el id del empleado.*/
            $recuperandoIdPersona=$this->conexion->crearConexion()->query("SELECT `personaid`
                FROM `tbempleados` WHERE 
                empleadoid='".$empleado->getEmpleadoId()."';");

            /*transformando los datos del id objeto a un string*/
            while ($resultado = $recuperandoIdPersona->fetch_assoc()){
                $con=$resultado['personaid'];     
            }
            /*verificamos si es un string ya formulado*/
            if(is_string($con)){
                $empleado->setPersonaId($con);
            }
            

            /*Para ingresar nueva persona en la base de datos.*/
           $personanuevo= $this->conexion->crearConexion()->query("UPDATE `tbpersonas` SET 
            `personanombre`='".$empleado->getPersonaNombre()."',
            `personaapellido1`='".$empleado->getPersonaApellido1()."',
            `personaapellido2`='".$empleado->getPersonaApellido2()."',
            `personatelefono`='".$empleado->getPersonaTelefono()."',
            `personacorreo`='".$empleado->getCorreo()."',
            `zonaid`='".$empleado->getIdZona()."' 
            WHERE personaid='".$empleado->getPersonaId()."';");

        $this->conexion->cerrarConexion();

        return $recuperandoIdempleado;
         
        }
    }

    //eliminar
    public function eliminarEmpleado($empleadoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $eliminarempleado = $this->conexion->crearConexion()->query("UPDATE `tbempleados` SET `empleadoestado`=0
             WHERE empleadoid='".$empleadoid."';");

            return $eliminarempleado;
        }
    }

    //buscar
    public function buscarEmpleado($empleadoid) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $buscarempleado = $this->conexion->crearConexion()->query("SELECT *
                FROM tbempleados e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON z.zonaid= p.zonaid
                INNER JOIN tbempleadolicencias el ON el.empleadolicenciaid= e.empleadolicenciaid
                INNER JOIN tbvehiculos v ON v.vehiculoid= el.vehiculoid
                WHERE e.empleadoid='".$empleadoid."' AND e.empleadoestado=1 OR 
                p.personaid= e.personaid AND e.empleadoestado=1;"); 

            $this->conexion->cerrarConexion();
            while ($resultado = $buscarempleado->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    //mostrar empleados
    public function mostrarEmpleados() {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $mostrarempleados = $this->conexion->crearConexion()->query("SELECT *
                FROM tbempleados e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON z.zonaid= p.zonaid");
                //INNER JOIN tbempleadolicencias po ON e.empleadolicenciaid= po.empleadolicenciaid");
                //INNER JOIN tbvehiculos v ON v.vehiculoid= el.vehiculoid");
            
            while ($resultado = $mostrarempleados->fetch_assoc()) {
                array_push($array, $resultado);
            }
            $this->conexion->cerrarConexion();
            return $array;
            
        }
    }

}
/*
$data= new DataEmpleado();
$da="2";
$d=$data->buscarEmpleado($da);
print_r($d);*/

?>
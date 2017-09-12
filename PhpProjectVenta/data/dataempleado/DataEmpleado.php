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

            $insertarempleado = $this->conexion->crearConexion()->query("INSERT INTO tbempleados(empleadoid	,
            personaid, tipoempleado, empleadocedula, empleadocontrasenia,
            empleadoedad, empleadosexo,empleadoestadocivil,empleadocuentabancaria, empleadolicenciaid, empleadoestado) VALUES (
                '" . $empleado->get_empleadoid() . "',
		'" . $empleado->get_personaid() . "',
		'" . $empleado->get_tipoempleado() . "',
		'" . $empleado->get_empleadocedula() . "',
		'" . $empleado->get_empleadocontrasenia() . "',
		'" . $empleado->get_empleadoedad() . "',
		'" . $empleado->get_empleadosexo() . "',
		'" . $empleado->get_empleadoestadocivil() . "',
                '" . $empleado->get_empleadocuentabancaria() . "',
                '" . $empleado->get_empleadolicenciaid() . "',    
		'" . $empleado->get_empleadoestado() . "')");

            $result = mysql_query($insertarempleado);
            $this->conexion->cerrarConexion();
            if (!$result) {
                return false;
            } else {
                return $result;
            }
        }
    }

    //modificar
    public function modificarEmpleado($empleado) {

       if ($this->conexion->crearConexion()->set_charset('utf8')) {

            /*actualiza el nuevo empleado a la base de datos*/
            $recuperandoIdempleado=$this->conexion->crearConexion()->query("UPDATE tbempleados SET 
		empleadoid='" . $empleado->get_empleadoid() . "',
		personaid='" . $empleado->get_personaid() . "',
                tipoempleado='" . $empleado->get_tipoempleado() . "',    
                empleadocedula='" . $empleado->get_empleadocedula() . "',
                empleadocontrasenia='" . $empleado->get_empleadocontrasenia() . "',    
                empleadoedad='" . $empleado->get_empleadoedad() . "',
		empleadosexo='" . $empleado->get_empleadosexo() . "',
		empleadoestadocivil='" . $empleado->get_empleadoestadocivil() . "',
		empleadocuentabancaria='" . $empleado->get_empleadocuentabancaria() . "',
                empleadolicenciaid='" . $empleado->get_empleadolicenciaid() . "',    
		empleadoestado='" . $empleado->get_empleadoestado() . "',
		WHERE empleadoid =" . $empleado->get_empleadoid() . "");

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

            $eliminarempleado = $this->conexion->crearConexion()->query("UPDATE `tbempleadoss` "
            . "SET`empleadoestado`=0 WHERE empleadoid='".$empleadoid."';");

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
                p.personanombre='".$empleadoid."' AND e.empleadoestado=1 OR
                p.personatelefono='".$empleadoid."' AND e.empleadoestado=1;"); 

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
                INNER JOIN tbzonas z ON z.zonaid= p.zonaid
                INNER JOIN tbempleadolicencias el ON el.empleadolicenciaid= e.empleadolicenciaid
                INNER JOIN tbvehiculos v ON v.vehiculoid= el.vehiculoid");

            
            while ($resultado = $mostrarempleados->fetch_assoc()) {
                array_push($array, $resultado);
            }
            $this->conexion->cerrarConexion();
            return $array;
            
        }
    }

}

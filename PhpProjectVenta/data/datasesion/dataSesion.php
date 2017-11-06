<?php

class dataSesion {

    private $conexion;

    function dataSesion() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/empleados/Empleados.php';
        $this->conexion = new Conexion();
    }

    //buscar un empleado
    Public function logueo($email, $password) {

        if ($this->conexion->crearConexion()->set_charset('utf8') == true) {

            $array = array();

            $buscarsesionempleado = $this->conexion->crearConexion()->query("SELECT *
                FROM tbempleados e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbtipoempleados te ON e.tipoempleado= te.tipoempleadoid
                WHERE p.personacorreo='$email' AND e.empleadocontrasenia='$password' AND e.empleadoestado=1");

            $this->conexion->cerrarConexion();
            while ($fila = $buscarsesionempleado->fetch_assoc()) {
                array_push($array, $fila);
            }
            return $array;
        }
    }

}

<?php

include_once 'data.php';
include '../domain/Empleado.php';

class empleadoData extends Data {

    public function insertTBEmpleado($empleado) {
        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');

        //Get the last id
        $query = "SELECT MAX(idEmpleado) AS idEmpleado  FROM tbempleado";
        $idCont = mysqli_query($conexion, $query);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }
        $queryInsert = "INSERT INTO tbempleado VALUES (" . $nextId . ",'" .
                $empleado->getIdEmpleado() . "','" .
                $empleado->getCedulaEmpleado() . "','" .
                $empleado->getContrasenaEmpleado() . "," .
                $empleado->getCorreoEmpleado() . "," .
                $empleado->getCuentaBancariaEmpleado() . 
                $empleado->getSexoEmpleado() . "','" .
                $empleado->getEstadoCivilEmpleado() . "','" .
                $empleado->getEdadEmpleado() . "," .
                $empleado->getSalarioBaseEmpleado() . "," .
                $empleado->getDescripcionEmpleado() . "," . ");";       
                
        $result = mysqli_query($conexion, $queryInsert);
        mysqli_close($conexion);
        return $result;
    }

    public function updateTBEmpleado($empleado) {
        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');
        $queryUpdate = "UPDATE tbempleado SET idEmpleado='" . $empleado->getIdEmpleado() .
                "', cedulaempleado='" . $empleado->getCedulaEmpleado() .
                "', contrasenaEmpleado='" . $empleado->getContrasenaEmpleado() .
                "', correoEmpleado='" . $empleado->getCorreoEmpleado() .
                "', cuentaBancariaEmpleado=" . $empleado->getCuentaBancariaEmpleado() .
                ", sexoEmpleado=" . $empleado->getSexoEmpleado() .
                "', estadoCivilEmpleado='" . $empleado->getEstadoCivilEmpleado() .
                "', edadEmpleado='" . $empleado->getEdadEmpleado() .
                "', descripcionEmpleado='" . $empleado->getDescripcionEmpleado() .
                "', salarioBaseEmpleado=" . $empleado->getSalarioBaseEmpleado() .
                " WHERE idEmpleado=" . $empleado->getIdEmpleado() . ";";

        $result = mysqli_query($conexion, $queryUpdate);
        mysqli_close($conexion);

        return $result;
    }

    public function deleteTBEmpleado($idEmpleado) {
        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');

        $queryDelete = "DELETE from tbempleado where idEmpleado=" . $idEmpleado . ";";
        $result = mysqli_query($conexion, $queryDelete);
        mysqli_close($conexion);

        return $result;
    }

    public function getAllTBEmpleado() {
        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');

        $querySelect = "SELECT * FROM tbempleado;";
       
        $result = mysqli_query($conexion, $querySelect);
        mysqli_close($conexion);
        
        $empleados = [];
        while ($row = mysqli_fetch_array($result)) {
            //$corrienteCliente = new Cliente($idCliente, $nombreCliente, $apellido1Cliente, $apellido2Cliente, $tipoUsuarioCliente, $telefonoCliente, $idZona, $idFactura, $fechaFactura)
            ////$row['idEmpleado'], $row['cedulaEmpleado'], $row['contrasenaEmpleado'], $row['correoEmpleado'],
            //$row['cuentaBancariaEmpleado'], $row['sexoEmpleado'], $row['estadoCivilEmpleado'], $row['edadEmpleado'], $row['descripcionEmpleado'],
            //$row['salarioBaseEmpleado']);
            
            array_push($empleados, $corrienteCliente);
        }
        return $cliente;
    }
}

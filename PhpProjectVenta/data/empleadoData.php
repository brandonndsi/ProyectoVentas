<?php

include_once 'data.php';
include '../domain/Empleado.php';

class empleadoData extends Data {

    public function insertTBEmpleado($empleado) {
        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(idEmpleado) AS idEmpleado  FROM tbempleado";
        $idCont = mysqli_query($conexion, $queryGetLastId);
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
                "', nombreempleado='" . $empleado->getNombreEmpleado() .
                "', apellido1empleado='" . $empleado->getApellido1Empleado() .
                "', apellido2empleado=" . $empleado->getApellido2Empleado() .
                ", edadempleado=" . $empleado->getEdadEmpleado() .
                "', sexoempleado='" . $empleado->getSexoEmpleado() .
                "', estadoempleado='" . $empleado->getEstadoEmpleado() .
                "', estado1empleado='" . $empleado->getTelefonoEmpleado() .
                "', estado2empleado=" . $empleado->getTelefono2Empleado() .
                ", correoempleado=" . $empleado->getCorreoEmpleado() .
                ", direccionempleado=" . $empleado->getDireccionEmpleado() .
                "', cuentabancariaempleado=" . $empleado->getCuentaBancariaEmpleado() .
                " WHERE idtbbull=" . $empleado->getIdTBBull() . ";";

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
            $corrienteEmpleado = new Empleado($row['idEmpleado'], $row['cedulaEmpleado'], $row['nombreEmpleado'], $row['apellido1Empleado'],
            $row['apellido2Empleado'], $row['edadEmpleado'], $row['sexoEmpleado'], $row['estadoEmpleado'], $row['telefonoEmpleado'],
            $row['telefono2Empleado'], $row['correoEmpleado'], $row['direccionEmpleado'], $row['cuentaBancariaEmpleado	']);
            
            array_push($empleados, $corrienteEmpleado);
        }
        return $empleados;
    }

   /* public function getEmpleadoInventary() {
        $conexion = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conexion->set_charset('utf8');

        $querySelect = "select tbempleado.idEmpleado as 'idEmpleado', CONCAT(tbempleado.namebull, "
                . "' - ', tbbull.codebull) as 'bull', tbbull.strawsquantity as "
                . "'strawsquantity' from tbbull group by tbbull.idtbbull; ";
        $result = mysqli_query($conexion, $querySelect);

        $bulls = [];
        while ($row = mysqli_fetch_array($result)) {
            $currentBull = array('idtbbull' => $row['idtbbull'],
                'bull' => $row['bull'],
                'strawsquantity' => $row['strawsquantity']);
            array_push($bulls, $currentBull);
        }

        $newBulls = [];
        foreach ($bulls as $currentBull) {
            $querySelect = "select sum(tbinsemination.strawsquantity) as 'strawsquantity' " .
                    "from tbinsemination where bull =" . $currentBull['idtbbull'] . " group by tbinsemination.bull;";
            $result = mysqli_query($conexion, $querySelect);
            $row = mysqli_fetch_array($result);
            $quantityStrawsUse = $row[0];
            $currentBull['strawsquantity'] = $currentBull['strawsquantity'] - $quantityStrawsUse;
            array_push($newBulls, $currentBull);
        }

        mysqli_close($conexion);
        return $newBulls;
    }*/

}

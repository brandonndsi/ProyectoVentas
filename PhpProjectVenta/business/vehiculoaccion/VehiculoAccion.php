<?php

/**
 * Description of VehiculoAccion
 *
 * @author Juancho
 */
include '../../domain/vehiculos/Vehiculos.php';
if (isset($_POST["nuevo"])) {

    if (isset($_POST['vehiculo']) && isset($_POST['vehiculoplaca'])
          && isset($_POST['vehiculomarca']) && isset($_POST['vehiculomodelo'])) {

        $vehiculoid = $_POST('vehiculoid');
        $vehiculoplaca = $_POST('vehiculoplaca');
        $vehiculomarca = $_POST('vehiculomarca');
        $vehiculomodelo = $_POST('vehiculomodelo');
        
        if (strlen($vehiculoid) > 0 && strlen($vehiculoplaca) > 0 && strlen($vehiculomarca) > 0 &&
                strlen($vehiculomodelo)) {
            if (!is_numeric($vehiculmolero)) {

                $vehiculo = new Vehiculos($vehiculoid, $vehiculoplaca, $vehciulomarca, $vehiculomodelo);
                include '../vehiculobusiness/VehiculoBusiness.php';

                $vehiculoBusiness = new VehiculoBusiness();

                $result = $vehiculoBusiness->insertarVehiculo($vehiculo);

                if ($result == 1) {
                    return header("location: ../../view/registrovehiculo/RegistroVehiculo.php?success=updated");
                } else {

                    return header("location: ../../view/registrovehiculo/RegistroVehiculo.php?error=dbError");
                }
            }
        }
    } else {
        // retorna un error al tratar de ingresar los datos del nuevo cliente
        $error = "ErrorNuevo";
        return $error;
    }
    /*
     * Verifica si la accion es la e actualizar los datos del cliente
     */
} else if (isset($_POST["actualizar"])) {

    if (isset($_POST['vehiculo']) && isset($_POST['vehiculoplaca'])
          && isset($_POST['vehiculomarca']) && isset($_POST['vehiculomodelo'])) {

        $vehiculoid = $_POST('vehiculoid');
        $vehiculoplaca = $_POST('vehiculoplaca');
        $vehiculomarca = $_POST('vehiculomarca');
        $vehiculomodelo = $_POST('vehiculomodelo');
        
        if (strlen($vehiculoid) > 0 && strlen($vehiculoplaca) > 0 && strlen($vehiculomarca) > 0 &&
                strlen($vehiculomodelo)) {
            if (!is_numeric($vehiculomodelo)) {

                $vehiculo = new Vehiculos($vehiculoid, $vehiculoplaca, $vehciulomarca, $vehiculomodelo);
                include '../vehiculobusiness/VehiculoBusiness.php';

                $vehiculoBusiness = new VehiculoBusiness();

                $result = $vehiculoBusiness->insertarVehiculo($vehiculo);

                return header("location: ../../view/registrovehiculo/RegistroVehiculo.php?success=updated");
            }
        }
    } else {
        $error = "ErrorActualizar";
        return $error;
    }
    
} else if (isset($_POST["eliminar"])) {

    if (isset($_POST['vehiculomodelo'])) {

        $vehiculoid = $_POST['vehiculomodelo'];
        include '../vehiculobusiness/VehiculoBusiness.php';

        $vehiculoBusiness = new VehiculoBusiness();

        $result = $vehiculoBusiness->eliminarVehiculo($vehiculoid);

        return header("location: ../../view/registrovehiculo/RegistroVehiculo.php?success=updated");
    } else {
        
        $error = "ErrorEliminar";
        return $error;
    }
} else if (isset($_POST["buscar"])) {

    if (isset($_POST['vehiculomodelo'])) {
        $vehiculoid = $_POST['vehiculomodelo'];

        include '../vehiculobusiness/VehiculoBusiness.php';

        $vehiculoBusiness = new VehiculoBusiness();

        $result = $vehiculoBusiness->buscarVehiculo($vehiculoid);

        return $result;
    } else {
        $error = "ErrorBuscar";
        return $error;
    }

} else if (isset($_POST["todo"])) {


    include '../vehciulobusiness/vehiculoBusiness.php';

    $vehiculoBusiness = new VehiculoBusiness();

    $result = $vehiculoBusiness->mostrarVehiculos();

    return $result;
} else {
    $error = "ErrorTodo";
    return $error;
}
?>


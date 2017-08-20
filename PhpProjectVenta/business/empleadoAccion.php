<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 *
 * @author David Salas.
 */
include './empleadoBusiness.php';

        $idEmpleado;
        $cedulaEmpleado;
        $nombreEmpleado;
        $apellido1Empleado;
        $apellido2Empleado;
        $edadEmpleado;
        $sexoEmpleado;
        $estadoEmpleado;
        $telefono1Empleado;
        $telefono2Empleado;
        $correoEmpleado;
        $direccionEmpleado;
        $cuentaBancariaEmpleado;


if (isset($_POST['update'])) {

    if (isset($_POST['IdEmpleado']) && isset($_POST['CedulaEmpleado']) && isset($_POST['NombreEmpleado']) && isset($_POST['Apellido1Empleado']) && isset($_POST['Apellido2Empleado'])
            && isset($_POST['EdadEmpleado']) && isset($_POST['SexoEmpleado']) && isset($_POST['EstadoEmpleado'])
             && isset($_POST['Telefono1Empleado']) && isset($_POST['Telefono2Empleado']) && isset($_POST['CorreoEmpleado']) && isset($_POST['DireccionEmpleado']) && isset($_POST['CuentaBancariaEmpleado'])) {
             
        $idEmpleado = $_POST['idEmpleado'];
        $cedulaEmpleado = $_POST['CedulaEmpleado'];
        $nombreEmpleado = $_POST['NombreEmpleado'];
        $apellido1Empleado= $_POST['Apellido1Empleado'];
        $apellido2Empleado= $_POST['Apellido2Empleado'];
        $edadEmpleado= $_POST['EdadEmpleado'];
        $sexoEmpleado= $_POST['SexoEmpleado'];
        $estadoEmpleado= $_POST['EstadoEmpleado'];
        $telefono1Empleado= $_POST['Telefono1Empleado'];
        $telefono2Empleado= $_POST['Telefono2Empleado'];
        $correoEmpleado= $_POST['CorreoEmpleado'];
        $direccionEmpleado= $_POST['DireccionEmpleado'];
        $cuentaBancariaEmpleado= $_POST['CuentaBancariaEmpleado'];

        if (strlen($idempleado) > 0 && strlen($cedulaempleado) > 0 && strlen($nombreEmpleado) > 0 && strlen($apellido1Empleado) > 0 
                && strlen($apellido2Empleado) > 0 && strlen($edadEmpleado) > 0 && strlen($telefono1Empleado) > 0 
                && strlen($telefono2Empleado) > 0 && strlen($correoEmpleado) > 0 && strlen($direccionEmpleado) > 0
                && strlen($cuentaBancariaEmpleado) > 0) {
            if (!is_numeric($nombreEmpleado)) {
                $empleado = new empleado($idempleado, $cedulaempleado, $nombreEmpleado, $apellido1Empleado, $apellido2Empleado, $edadEmpleado,
                        $telefono1Empleado, $telefono2Empleado,$correoEmpleado,$direccionEmpleado,$cuentaBancariaEmpleado);

                $empledoBusiness = new empleadoBusiness();

                $result = $empleadoBusiness->updateTBEmpleado($empleado);
                if ($result == 1) {
                    header("location: ../view/personaView.php?success=updated");
                } else {
                    header("location: ../view/personaView.php?error=dbError");
                }
            } else {
                header("location: ../view/personaView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/personaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/personaView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['CedulaEmpleado'])) {

        $idEmpleado = $_POST['CedulaEmpleado'];

        $empleadoBusiness = new empleadoBusiness();
        $result = $empleadoBusiness->deleteTBEmpleado($idEmpleado);

        if ($result == 1) {
            header("location: ../view/personaView.php?success=deleted");
        } else {
            header("location: ../view/personaView.php?error=dbError");
        }
    } else {
        header("location: ../view/personaView.php?error=error");
    }
} else if (isset($_POST['Create'])) {

    if (isset($_POST['CedulaEmpleado']) && isset($_POST['NombreEmpleado']) && isset($_POST['Apellido1Empleado']) && isset($_POST['Apellido2Empleado'])
            && isset($_POST['EdadEmpleado']) && isset($_POST['SexoEmpleado']) && isset($_POST['EstadoEmpleado']) && isset($_POST['Telefono1Empleado'])
             && isset($_POST['Telefono2Empleado']) && isset($_POST['CorreoEmpleado']) && isset($_POST['DireccionEmpleado']) && isset($_POST['CuentaBancariaEmpleado'])) {
            
        $cedulaEmpleado=$_POST['CedulaEmpleado'];
        $nombreEmpleado=$_POST['NombreEmpleado'];
        $apellido1Empleado=$_POST['Apellido1Empleado'];
        $apellido2Empleado=$_POST['Apellido2Empleado'];
        $edadEmpleado=$_POST['EdadEmpleado'];
        $sexoEmpleado=$_POST['SexoEmpleado'];
        $estadoEmpleado=$_POST['EstadoEmpleado'];
        $telefono1Empleado=$_POST['Telefono1Empleado'];
        $telefono2Empleado=$_POST['Telefono2Empleado'];
        $correoEmpleado=$_POST['CorreoEmpleado'];
        $direccionEmpleado=$_POST['DireccionEmpleado'];
        $cuentabancariaEmpleado=$_POST['CuentaBancariaEmpleado'];
        

        if (strlen($cedulaEmpleado) > 0 && strlen($nombreEmpleado) > 0 && strlen($apellido1Empleado) > 0 
                && strlen($apellido2Empleado) > 0 && strlen($edadEmpleado) > 0 
                && strlen($sexoEmpleado) > 0 && strlen($estadoEmpleado) > 0 && strlen($telefono1Empleado) > 0 && strlen($telefono2Empleado) > 0
                 && strlen($correoEmpleado) > 0 && strlen($direccionEmpleado) > 0 && strlen($cuentabancariaEmpleado) > 0) {
            if (!is_numeric($nombreEmpleado)) {
                $empleado = new empleado(0, $cedulaempleado, $nombreEmpleado, $apellido1Empleado, $apellido2Empleado,
                        $edadEmpleado, $sexoEmpleado, $estadoEmpleado,$telefono1Empleado,$telefono2Empleado
                        ,$correoEmpleado,$direccionEmpleado,$cuentabancariaEmpleado);

                $empleadoBusiness = new empleadoBusiness();

                $result = $empleadoBusiness->insertTBEmpleado($empleado);

                if ($result == 1) {
                    header("location: ../view/personaView.php?success=inserted");
                } else {
                    header("location: ../view/personaView.php?error=dbError");
                }
            } else {
                header("location: ../view/personaView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/personaView.php?error=emptyField");
        }
    } else {
        header("location: ../view/personaView.php?error=error");
    }
}
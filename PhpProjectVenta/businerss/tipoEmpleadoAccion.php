<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 *
 * @author David Salas.
 */
include './tipoEmpleadoBusiness.php';

if (isset($_POST['update'])) {

    if (isset($_POST['IdTipoEmpleado']) && isset($_POST['CedulaTipoEmpleado']) && isset($_POST['NombreTipoEmpleado']) && isset($_POST['Apellido1TipoEmpleado']) && isset($_POST['Apellido2TipoEmpleado'])
            && isset($_POST['EdadTipoEmpleado']) && isset($_POST['SexoTipoEmpleado']) && isset($_POST['EstadoTipoEmpleado'])
             && isset($_POST['Telefono1TipoEmpleado']) && isset($_POST['Telefono2TipoEmpleado']) && isset($_POST['CorreoTipoEmpleado']) && isset($_POST['DireccionTipoEmpleado']) && isset($_POST['CuentaBancariaTipoEmpleado'])) {
            
        $idTipoempleado = $_POST['IdTipoEmpleado'];
        $cedulaTipoempleado = $_POST['CedulaTipoEmpleado'];
        $nombreTipoEmpleado = $_POST['NombreTipoEmpleado'];
        $apellido1TipoEmpleado= $_POST['Apellido1TipoEmpleado'];
        $apellido2TipoEmpleado= $_POST['Apellido2TipoEmpleado'];
        $edadTipoEmpleado= $_POST['EdadTipoEmpleado'];
        $sexoTipoEmpleado= $_POST['SexoTipoEmpleado'];
        $estadoTipoEmpleado= $_POST['EstadoTipoEmpleado'];
        $telefono1TipoEmpleado= $_POST['Telefono1TipoEmpleado'];
        $telefono2TipoEmpleado= $_POST['Telefono2TipoEmpleado'];
        $correoTipoEmpleado= $_POST['CorreoTipoEmpleado'];
        $direccionTipoEmpleado= $_POST['DireccionTipoEmpleado'];
        $cuentaBancariaTipoEmpleado= $_POST['CuentaBancariaTipoEmpleado'];

        if (strlen($idTipoempleado) > 0 && strlen($cedulaTipoempleado) > 0 && strlen($nombreTipoEmpleado) > 0 && strlen($apellido1TipoEmpleado) > 0 
                && strlen($apellido2TipoEmpleado) > 0 && strlen($edadTipoEmpleado) > 0 && strlen($telefono1TipoEmpleado) > 0 
                && strlen($telefono2TipoEmpleado) > 0 && strlen($correoTipoEmpleado) > 0 && strlen($direccionTipoEmpleado) > 0
                && strlen($cuentaBancariaTipoEmpleado) > 0) {
            if (!is_numeric($nombreTipoEmpleado)) {
                $empleado = new empleado($idTipoempleado, $cedulaTipoempleado, $nombreTipoEmpleado, $apellido1TipoEmpleado, $apellido2TipoEmpleado, $edadTipoEmpleado,
                        $telefono1TipoEmpleado, $telefono2TipoEmpleado,$correoTipoEmpleado,$direccionTipoEmpleado,$cuentaBancariaTipoEmpleado);

                $tipoEmpledoBusiness = new tipoEmpleadoBusiness();

                $result = $tipoEmpleadoBusiness->updateTBTipoEmpleado($tipoEmpleado);
                if ($result == 1) {
                    header("location: ../view/tipoEmpleadoView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../view/tipoEmpleadoView.php?error=dbError");
                }
            } else {
                header("location: ../view/tipoEmpleadoView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/tipoEmpleadoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/tipoEmpleadoView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idTipoEmpleado'])) {

        $idEmpleado = $_POST['idTipoEmpleado'];

        $tipoEmpleadoBusiness = new tipoEmpleadoBusiness();
        $result = $tipoEmpleadoBusiness->deleteTBTipoEmpleado($idTipoEmpleado);

        if ($result == 1) {
            header("location: ../view/tipoEmpleadoView.php?success=deleted");
        } else {
            header("location: ../view/tipoEmpleadoView.php?error=dbError");
        }
    } else {
        header("location: ../view/tipoEmpleadoView.php?error=error");
    }
} else if (isset($_POST['Create'])) {

    if (isset($_POST['CedulaTipoEmpleado']) && isset($_POST['NombreTipoEmpleado']) && isset($_POST['Apellido1TipoEmpleado']) && isset($_POST['Apellido2TipoEmpleado'])
            && isset($_POST['EdadTipoEmpleado']) && isset($_POST['SexoTipoEmpleado']) && isset($_POST['EstadoTipoEmpleado']) && isset($_POST['Telefono1TipoEmpleado'])
             && isset($_POST['Telefono2TipoEmpleado']) && isset($_POST['CorreoTipoEmpleado']) && isset($_POST['DireccionTipoEmpleado']) && isset($_POST['CuentaBancariaTipoEmpleado'])) {
            
        $cedulaTipoempleado=$_POST['CedulaTipoEmpleado'];
        $nombreTipoempleado=$_POST['NombreTipoEmpleado'];
        $apellido1Tipoempleado=$_POST['Apellido1TipoEmpleado'];
        $apellido2Tipoempleado=$_POST['Apellido2TipoEmpleado'];
        $edadTipoempleado=$_POST['EdadTipoEmpleado'];
        $sexoTipoempleado=$_POST['SexoTipoEmpleado'];
        $estadoTipoempleado=$_POST['EstadoTipoEmpleado'];
        $telefono1Tipoempleado=$_POST['Telefono1TipoEmpleado'];
        $telefono2Tipoempleado=$_POST['Telefono2TipoEmpleado'];
        $correoTipoempleado=$_POST['CorreoTipoEmpleado'];
        $direccionTipoempleado=$_POST['DireccionTipoEmpleado'];
        $cuentabancariaTipoempleado=$_POST['CuentaBancariaTipoEmpleado'];
        

        if (strlen($cedulaTipoempleado) > 0 && strlen($nombreTipoEmpleado) > 0 && strlen($apellido1TipoEmpleado) > 0 
                && strlen($apellido2TipoEmpleado) > 0 && strlen($edadTipoEmpleado) > 0 
                && strlen($sexoTipoEmpleado) > 0 && strlen($estadoTipoEmpleado) > 0 && strlen($telefono1TipoEmpleado) > 0 && strlen($telefono2TipoEmpleado) > 0
                 && strlen($correoTipoEmpleado) > 0 && strlen($direccionTipoEmpleado) > 0 && strlen($cuentaBancariaTipoEmpleado) > 0) {
            if (!is_numeric($nombreTipoEmpleado)) {
                $tipoEmpleado = new tipoEmpleado(0, $cedulaTipoempleado, $nombreTipoEmpleado, $apellido1TipoEmpleado, $apellido2TipoEmpleado,
                        $edadTipoEmpleado, $sexoTipoEmpleado, $estadoTipoEmpleado,$telefono1TipoEmpleado,$telefono2TipoEmpleado
                        ,$correoTipoEmpleado,$direccionTipoEmpleado,$cuentaBancariaTipoEmpleado);

                $tipoEmpleadoBusiness = new tipoEmpleadoBusiness();

                $result = $tipoEmpleadoBusiness->insertTBTipoEmpleado($tipoEmpleado);

                if ($result == 1) {
                    header("location: ../view/tipoEmpleadoView.php?success=inserted");
                } else {
                    header("location: ../view/tipoEmpleadoView.php?error=dbError");
                }
            } else {
                header("location: ../view/tipoEmpleadoView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/tipoEmpleadoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/tipoEmpleadoView.php?error=error");
    }
}

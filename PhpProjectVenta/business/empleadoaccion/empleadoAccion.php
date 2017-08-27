<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 *
 * @author David Salas.
 */

include './empleadoBusiness.php';


if (isset($_POST['update'])) {

    if (isset($_POST['idEmpleado']) && isset($_POST['cedulaEmpleado']) && isset($_POST['contrasenaEmpleado']) && isset($_POST['correoEmpleado']) && isset($_POST['cuentaBancariaEmpleado'])
            && isset($_POST['sexoEmpleado']) && isset($_POST['estadoCivilEmpleado']) && isset($_POST['edadEmpleado'])
             && isset($_POST['salarioBaseEmpleado']) && isset($_POST['descripcionEmpleado'])) {
             
        $idEmpleado = $_POST['idEmpleado'];
        $cedulaEmpleado = $_POST['cedulaEmpleado'];
        $contrasenaEmpleado = $_POST['contrasenaEmpleado'];
        $correoEmpleado= $_POST['correoEmpleado'];
        $cuentaBancariaEmpleado= $_POST['cuentaBancariaEmpleado'];
        $sexoEmpleado= $_POST['sexoEmpleado'];
        $estadoCivilEmpleado= $_POST['estadoCivilEmpleado'];
        $edadEmpleado= $_POST['edadEmpleado'];
        $salarioBaseEmpleado= $_POST['salarioBaseEmpleado'];
        $descripcionEmpleado= $_POST['descripcionEmpleado'];

        if (strlen($idEmpleado) > 0 && strlen($cedulaEmpleado) > 0 && strlen($contrasenaEmpleado) > 0 && strlen($correoEmpleado) > 0 
                && strlen($cuentaBancariaEmpleado) > 0 && strlen($sexoEmpleado) > 0 && strlen($estadoCivilEmpleado) > 0 
                && strlen($edadEmpleado) > 0 && strlen($salarioBaseEmpleado) > 0 && strlen($descripcionEmpleado) > 0) {
            if (is_numeric($cedulaEmpleado)) {
                $Empleado = new Empleado($idEmpleado, $cedulaEmpleado, $contrasenaEmpleado, $correoEmpleado,
                        $cuentaBancariaEmpleado, $sexoEmpleado, $estadoCivilEmpleado, $edadEmpleado, $salarioBaseEmpleado,
                        $descripcionEmpleado);

                $empledoBusiness = new empleadoBusiness();

                $result = $empleadoBusiness->updateTBEmpleado($Empleado);
                if ($result == 1) {
                    header("location: ../view/empleadoView.php?success=updated");
                } else {
                    header("location: ../view/empleadoView.php?error=dbError");
                }
            } else {
                header("location: ../view/empleadoView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/empleadoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/empleadoView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['cedulaEmpleado'])) {

        $idEmplead = $_POST['cedulaEmpleado'];

        $empleadoBusiness = new empleadoBusiness();
        $result = $empleadoBusiness->deleteTBEmpleado($idEmplead);

        if ($result == 1) {
            header("location: ../view/empleadoView.php?success=deleted");
        } else {
            header("location: ../view/empleadoView.php?error=dbError");
        }
    } else {
        header("location: ../view/empleadoView.php?error=error");
    }
} else if (isset($_POST['Create'])) {

    if (isset($_POST['cedulaEmpleado']) && isset($_POST['contrasenaEmpleado']) && isset($_POST['correoEmpleado']) && isset($_POST['cuentaBancariaEmpleado'])
            && isset($_POST['sexoEmpleado']) && isset($_POST['estadoCivilEmpleado']) && isset($_POST['edadEmpleado']) && isset($_POST['salarioBaseEmpleado'])
             && isset($_POST['descripcionEmpleado'])) {
                    
        $cedulaEmpleado=$_POST['CedulaEmpleado'];
        $contrasenaEmpleado=$_POST['contrasenaEmpleado'];
        $correoEmpleado=$_POST['correoEmpleado'];
        $cuentaBancariaEmpleado=$_POST['cuentaBancariaEmpleado'];
        $sexoEmpleado=$_POST['sexoEmpleado'];
        $estadoCivilEmpleado=$_POST['estadoCivilEmpleado'];
        $edadEmpleado=$_POST['edadEmpleado'];
        $salarioBaseEmpleado=$_POST['salarioBaseEmpleado'];
        $descripcionEmpleado=$_POST['descripcionEmpleado'];
        

        if (strlen($cedulaEmpleado) > 0 && strlen($contrasenaEmpleado) > 0 && strlen($correoEmpleado) > 0 
            && strlen($cuentaBancariaEmpleado) > 0 && strlen($sexoEmpleado) > 0 && strlen($estadoCivilEmpleado) > 0 
            && strlen($edadEmpleado) > 0 && strlen($salarioBaseEmpleado) > 0 && strlen($descripcionEmpleado) > 0) {
            
            if (is_numeric($cedulaEmpleado)) {
                $empleado = new Empleado($idEmpleado, $cedulaEmpleado, $contraseñaEmpleado, $correoEmpleado, 
                $cuentaBancariaEmpleado, $sexoEmpleado, $estadoCivilEmpleado, $edadEmpleado, $salarioBaseEmpleado, $descripcionEmpleado);

                $empleadoBusiness = new empleadoBusiness();

                $result = $empleadoBusiness->insertTBEmpleado($empleado);

                if ($result == 1) {
                    header("location: ../view/empleadoView.php?success=inserted");
                } else {
                    header("location: ../view/empleadoView.php?error=dbError");
                }
            } else {
                header("location: ../view/empleadoView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/empleadoView.php?error=emptyField");
        }
    } else {
        header("location: ../view/empleadoView.php?error=error");
    }
}
?>
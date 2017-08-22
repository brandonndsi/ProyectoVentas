<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 *
 * @author David Salas.
 */
include './tipoEmpleadoBusiness.php';

if (isset($_POST['update'])){

    if (isset($_POST['idPersona']) && isset($_POST['nombrePersona']) && isset($_POST['apellido1Persona']) && isset($_POST['apellido2Persona'])
            && isset($_POST['tipoUsuarioPersona']) && isset($_POST['idZona']) && isset($_POST['telefonoPersona']) ) {
          
        $telefonoPersona = $_POST('telefonoPersona');
        $nombrePersona =$_POST('nombrePersona');
        $apellido1Persona =$_POST('apellido1Persona');
        $apellido2Persona = $_POST('apellido2Persona');
        $tipoUsuarioPersona = $_POST('tipoUsuarioPersona');
        $idZona = $_POST('idZona');
        $idEmpleado=$_POST('idPersona');
        
        if (strlen($idEmpleado) > 0 &&strlen($nombrePersona) > 0 && strlen($apellido1Persona) > 0 && strlen($apellido2Persona) > 0 && 
            strlen($tipoUsuarioPersona) > 0 && strlen($idZona) > 0 && strlen($telefonoPersona) > 0 ) {
            if (!is_numeric($nombreTipoEmpleado)) {
                $Persona = new Persona($telefonoPersona, $nombrePersona, $apellido1Persona, 
                        $apellido2Persona, $tipoUsuarioPersona, $idZona, $idEmpleado);
                $tipoEmpledoBusiness = new tipoEmpleadoBusiness();

                $result = $tipoEmpleadoBusiness->updateTBTipoEmpleado($Persona);
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

    if (isset($_POST['idPersona'])) {

        $idEmpleado = $_POST['idPersona'];

        $tipoEmpleadoBusiness = new tipoEmpleadoBusiness();
        $result = $tipoEmpleadoBusiness->deleteTBTipoEmpleado($idEmpleado);

        if ($result == 1) {
            header("location: ../view/tipoEmpleadoView.php?success=deleted");
        } else {
            header("location: ../view/tipoEmpleadoView.php?error=dbError");
        }
    } else {
        header("location: ../view/tipoEmpleadoView.php?error=error");
    }
} else if (isset($_POST['Create'])) {

    if (isset($_POST['nombrePersona']) && isset($_POST['apellido1Persona']) && isset($_POST['apellido2Persona'])
            && isset($_POST['tipoUsuarioPersona']) && isset($_POST['idZona']) && isset($_POST['telefonoPersona']) ) {
          
        $telefonoPersona = $_POST('telefonoPersona');
        $nombrePersona =$_POST('nombrePersona');
        $apellido1Persona =$_POST('apellido1Persona');
        $apellido2Persona = $_POST('apellido2Persona');
        $tipoUsuarioPersona = $_POST('tipoUsuarioPersona');
        $idZona = $_POST('idZona');
        

       if (strlen($nombrePersona) > 0 && strlen($apellido1Persona) > 0 && strlen($apellido2Persona) > 0 && 
            strlen($tipoUsuarioPersona) > 0 && strlen($idZona) > 0 && strlen($telefonoPersona) > 0 ) {
            if (!is_numeric($nombreTipoEmpleado)) {
                $Persona = new Persona($telefonoPersona, $nombrePersona, $apellido1Persona,
                        $apellido2Persona, $tipoUsuarioPersona, $idZona,0);

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

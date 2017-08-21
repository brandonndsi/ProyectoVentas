<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 *
 * @author David Salas.
 */

include './clienteBusiness.php';

    if (isset($_POST['update'])) {

     if (isset($_POST['idPersona']) && isset($_POST['nombrePersona']) && isset($_POST['apellido1Persona']) && isset($_POST['apellido2Persona'])
            && isset($_POST['tipoUsuarioPersona']) && isset($_POST['idZona']) && isset($_POST['telefonoPersona']) ) {
          
        $telefonoPersona = $_POST('telefonoPersona');
        $nombrePersona =$_POST('nombrePersona');
        $apellido1Persona =$_POST('apellido1Persona');
        $apellido2Persona = $_POST('apellido2Persona');
        $tipoUsuarioPersona = $_POST('tipoUsuarioPersona');
        $idZona = $_POST('idZona');
        $IdEmpleado=$_POST('idPersona');
        
        
        if (strlen($IdEmpleado) > 0 &&strlen($nombrePersona) > 0 && strlen($apellido1Persona) > 0 && strlen($apellido2Persona) > 0 && 
            strlen($tipoUsuarioPersona) > 0 && strlen($idZona) > 0 && strlen($telefonoPersona) > 0 ) {
            if (!is_numeric($nombreTipoEmpleado)) {
                $Persona = new Persona($telefonoPersona, $nombrePersona, $apellido1Persona, $apellido2Persona, $tipoUsuarioPersona, $idZona,IdEmpleado);

                $tipoEmpledoBusiness = new tipoEmpleadoBusiness();

                $result = $tipoEmpleadoBusiness->updateTBTipoEmpleado($Persona);
                if ($result == 1) {
                    header("location: ../view/clienteView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../view/clienteView.php?error=dbError");
                }
            } else {
                header("location: ../view/clienteView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/clienteView.php?error=emptyField");
        }
    } else {
        
        header("location: ../view/clienteView.php?error=error");
    }
} else if (isset($_POST['delete'])) {

    if (isset($_POST['idPersona'])) {

        $idCliente = $_POST['idPersona'];

        $clienteBusiness = new clienteBusiness();
        $result = $clienteBusiness->deleteTBCliente($idCliente);

        if ($result == 1) {
            header("location: ../view/clienteView.php?success=deleted");
        } else {
            header("location: ../view/clienteView.php?error=dbError");
        }
    } else {
        header("location: ../view/clienteView.php?error=error");
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
                $Persona = new Persona($telefonoPersona, $nombrePersona, $apellido1Persona, $apellido2Persona, $tipoUsuarioPersona, $idZona,0);

                $clienteBusiness = new clienteBusiness();
                echo 'datos';
                $result = $clienteBusiness->insertTBCliente($Persona);

                if ($result == 1) {
                    header("location: ../view/clienteView.php?success=inserted");
                } else {
                    header("location: ../view/clienteView.php?error=dbError");
                }
            } else {
                header("location: ../view/clienteView.php?error=numberFormat");
            }
        } else {
            header("location: ../view/clienteView.php?error=emptyField");
        }
    } else {
        header("location: ../view/clienteView.php?error=error");
        
    }
}


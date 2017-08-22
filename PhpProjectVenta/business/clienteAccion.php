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

     if (isset($_POST['idCliente']) && isset($_POST['nombreCliente']) && isset($_POST['apellido1Cliente']) && isset($_POST['apellido2Cliente'])
            && isset($_POST['tipoUsuarioCliente']) && isset($_POST['telefonoCliente']) && isset($_POST['idZona']) && isset($_POST['idFactura'])&& isset($_POST['fechaFactura']) ) {
          
        $idCliente= $_POST('idCliente');
        $nombreCliente =$_POST('nombreCliente');
        $apellido1Cliente =$_POST('apellido1Cliente');
        $apellido2Cliente = $_POST('apellido2Cliente');
        $tipoUsuarioCliente = $_POST('tipoUsuarioCliente');
        $telefonoCliente=$_POST('telefonoCliente');
        $idZona = $_POST('idZona');
        $idFactura=$_POST('idFactura');
        $fechaFactura=$_POST('fechaFactura');
            
        if (strlen($idCliente) > 0 &&strlen($nombreCliente) > 0 && strlen($apellido1Cliente) > 0 && strlen($apellido2Cliente) > 0 && 
            strlen($tipoUsuarioCliente) > 0 && strlen($telefonoCliente) > 0 && strlen($idZona) > 0 && strlen($idFactura) > 0 && strlen($fechaFactura) > 0) {
            if (!is_numeric($nombreCliente)) {
                $Cliente = new Cliente($idCliente, $nombreCliente, $apellido1Cliente, $apellido2Cliente, 
                        $tipoUsuarioCliente, $telefonoCliente, $idZona, $idFactura, $fechaFactura);

                $ClienteAccion = new clienteBusiness();

                $result = $ClienteAccion->updateTBCliente($Cliente);
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

    if (isset($_POST['idCliente'])) {

        $idCliente = $_POST['idCliente'];

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

     if (isset($_POST['nombreCliente']) && isset($_POST['apellido1Cliente']) && isset($_POST['apellido2Cliente'])
            && isset($_POST['tipoUsuarioCliente']) && isset($_POST['telefonoCliente']) && isset($_POST['idZona']) 
             && isset($_POST['idFactura']) && isset($_POST['fechaFactura'])) {
          
        $nombreCliente =$_POST('nombreCliente');
        $apellido1CLiente =$_POST('apellido1Cliente');
        $apellido2Cliente = $_POST('apellido2Cliente');
        $tipoUsuarioCliente = $_POST('tipoUsuarioCliente');
        $telefonoCliente = $_POST('telefonoCliente');
        $idZona = $_POST('idZona');
        $idFactura = $_POST('idFactura');
        $fechaFactura = $_POST('fechaFactura');

       if (strlen($nombreCliente) > 0 && strlen($apellido1Cliente) > 0 && strlen($apellido2Cliente) > 0 && 
            strlen($tipoUsuarioPersona) > 0 && strlen($telefonoCliente) > 0 && strlen($idZona) > 0 
             && strlen($idFactura) > 0 && strlen($fechaFactura) > 0 ) {
            if (!is_numeric($nombreCliente)) {
                $Cliente = new Cliente($idCliente, $nombreCliente, $apellido1Cliente, $apellido2Cliente, 
                        $tipoUsuarioCliente, $telefonoCliente, $idZona, $idFactura, $fechaFactura);

                $clienteBusiness = new clienteBusiness();
                echo 'datos';
                $result = $clienteBusiness->insertTBCliente($Cliente);

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


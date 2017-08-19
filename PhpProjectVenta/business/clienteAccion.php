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

    if (isset($_POST['Idcliente']) && isset($_POST['CedulaCliente']) && isset($_POST['NombreCliente']) && isset($_POST['Apellido1Cliente']) && isset($_POST['Apellido2Cliente'])
             && isset($_POST['Telefono1Cliente']) && isset($_POST['Telefono2Cliente']) && isset($_POST['DireccionCliente']) && isset($_POST['IdUbicacion'])) {
            
        $idCliente = $_POST['IdCliente'];
        $cedulaCliente = $_POST['CedulaCliente'];
        $nombreCliente = $_POST['NombreCliente'];
        $apellido1Cliente= $_POST['Apellido1Cliente'];
        $apellido2Cliente= $_POST['Apellido2Cliente'];
        $telefono1Cliente= $_POST['Telefono1Cliente'];
        $telefono2Cliente= $_POST['Telefono2Cliente'];
        $direccionCliente= $_POST['DireccionCliente'];
        $idUbicacion= $_POST['IdUbicacion'];

        if (strlen($idCliente) > 0 && strlen($cedulaCliente) > 0 && strlen($nombreCliente) > 0 && strlen($apellido1Cliente) > 0 
                && strlen($apellido2Cliente) > 0 && strlen($telefono1Cliente) > 0 
                && strlen($telefono2Cliente) > 0 && strlen($direccionCliente) > 0
                && strlen($idUbicacion) > 0) {
            if (!is_numeric($nameCliente)) {
                $cliente = new cliente($idCliente, $cedulaCliente, $nombreCliente, $apellido1Cliente, $apellido2Cliente,
                 $telefono1Cliente, $telefono2Cliente,$direccionCliente,$idUbicacion);

                $clienteBusiness = new clienteBusiness();

                $result = $clienteBusiness->updateTBCliente($cliente);
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

    if (isset($_POST['CedulaCliente']) && isset($_POST['NombreCliente']) && isset($_POST['Apellido1Cliente']) && isset($_POST['Apellido2Cliente'])
            && isset($_POST['Telefono1Cliente']) && isset($_POST['Telefono2Cliente']) && isset($_POST['DireccionCliente']) && isset($_POST['IdUbicacion'])) {
            
        $cedulaCliente=$_POST['CedulaCliente'];
        $nombreCliente=$_POST['NombreCliente'];
        $apellido1Cliente=$_POST['Apellido1Cliente'];
        $apellido2Cliente=$_POST['Apellido2Cliente'];
        $telefono1Cliente=$_POST['Telefono1CLiente'];
        $telefono2CLiente=$_POST['Telefono2Cliente'];
        $direccionCliente=$_POST['DireccionCliente'];
        $idUbicacion=$_POST['IdUbicacion'];
        

        if (strlen($cedulaCliente) > 0 && strlen($nombreCliente) > 0 && strlen($apellido1Cliente) > 0 
                && strlen($apellido2Cliente) > 0  && strlen($telefono1Cliente) > 0 && strlen($telefono2Cliente) > 0
                 && strlen($direccionCliente) > 0 && strlen($idUbicacion) > 0) {
            if (!is_numeric($nombreCliente)) {
                $cliente = new cliente(0, $cedulaCliente, $nombreCliente, $apellido1Cliente, $apellido2Cliente,
                        $telefono1Cliente,$telefono2Cliente,$direccionCliente,$idUbicacion);

                $clienteBusiness = new clienteBusiness();

                $result = $clienteBusiness->insertTBCliente($cliente);

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


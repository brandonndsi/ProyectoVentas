<?php

/**
 * Description of ProveedorBusiness
 *
 * @author Juancho
 */
include '../../domain/proveedores/Proveedores.php';

if (isset($_POST["nuevo"])) {
    if (isset($_POST['proveedorid']) && isset($_POST['MateriaPrimaid']) && isset($_POST['proveedordireccion']) &&
            isset($_POST['personaid']) && isset($_POST['proveedorProductos']) && isset($_POST['proveedorUltimaCompra'])) {

        $proveedorid = $_POST['proveedorid'];
        $MateriaPrimaid = $_POST['MateriaPrimaid'];
        $proveedordireccion = $_POST['proveedordireccion'];
        $personaid = $_POST['personaid'];
        $proveedorProductos = $_POST['proveedorProductos'];
        $proveedorUltimaCompra = $_POST['proveedorUltimaCompra'];


        if (strlen($proveedorid) > 0 && strlen($MateriaPrimaid) > 0 && strlen($proveedordireccion) > 0 &&
                strlen($personaid) > 0 && strlen($proveedorProductos) > 0 && strlen($proveedorUltimaCompra) > 0) {
            if (is_numeric($proveedorid)) {
                $proveedor = new Proveedores($proveedorid, $personaid, $MateriaPrimaid, $proveedordireccion, $personaid, $proveedorProductos, $proveedorUltimaCompra);

                include '../proveedorbusiness/ProveedorBusiness.php';

                $proveedorBusiness = new ProveedorBusiness();

                $result = $proveedorBusiness->insertarProveedor($proveedor);
                if ($result == 1) {
                    return header("location: ../../view/registroproveedor/RegistroProveedor.php?success=updated");
                } else {

                    return header("location: ../../view/registroproveedor/RegistroProveedor.php?error=dbError");
                }
            }
        }
    } else {
        $error = "ErrorNuevo";
        return $error;
    }
   
} else if (isset($_POST["actualizar"])) {

    if (isset($_POST['proveedorid']) && isset($_POST['MateriaPrimaid']) && isset($_POST['proveedordireccion']) &&
            isset($_POST['personaid']) && isset($_POST['proveedorProductos']) && isset($_POST['proveedorUltimaCompra'])) {

        $proveedorid = $_POST['proveedorid'];
        $MateriaPrimaid = $_POST['MateriaPrimaid'];
        $proveedordireccion = $_POST['proveedordireccion'];
        $personaid = $_POST['personaid'];
        $proveedorProductos = $_POST['proveedorProductos'];
        $proveedorUltimaCompra = $_POST['proveedorUltimaCompra'];


        if (strlen($proveedorid) > 0 && strlen($MateriaPrimaid) > 0 && strlen($proveedordireccion) > 0 &&
                strlen($personaid) > 0 && strlen($proveedorProductos) > 0 && strlen($proveedorUltimaCompra) > 0) {
            if (is_numeric($proveedorid)) {
                $proveedor = new Proveedores($proveedorid, $personaid, $MateriaPrimaid, $proveedordireccion, $personaid, $proveedorProductos, $proveedorUltimaCompra);

                include '../proveedorbusiness/ProveedorBusiness.php';

                $proveedorBusiness = new ProveedorBusiness();

                $result = $proveedorBusiness->modificarProveedor($proveedor);

                return header("location: ../../view/registroproveedor/RegistroProveedor.php?success=updated");
            }
        }
    } else {
        $error = "ErrorActualizar";
        return $error;
    }
    
} else if (isset($_POST["eliminar"])) {

    if (isset($_POST['proveedornombre'])) {

        $proveedor = $_POST['proveedornombre'];
        include '../proveedorbusiness/ProveedorBusiness.php';

        $proveedorBusiness = new ProveedorBusiness();

        $result = $proeedorBusiness->eliminarProveedor($proveedor);

        return header("location: ../../view/registroproveedor/RegistroProveedor.php?success=updated");
    } else {
        //esto es porsi a la hora de eliminar el dato es vacio
        $error = "ErrorEliminar";
        return $error;
    }

    
} else if (isset($_POST["buscar"])) {

    if (isset($_POST['proveedornombre'])) {
        $proveedornombre = $_POST['proveedornombre'];

        include '../proveedorbusiness/ProveedorBusiness.php';

        $proveedorBusiness = new ProveedorBusiness();

        $result = $proveedorBusiness->buscarProveedor($proveedornombre);

        return $result;
    } else {
        $error = "ErrorBuscar";
        return $error;
    }

} else if (isset($_POST["todo"])) {

    include '../proveedorbusiness/ProveedorBusiness.php';

    $proveedorBusiness = new ProveedorBusiness();

    $result = $proveedorBusiness->mostrarProveedoress();

    return $result;
} else {
    $error = "ErrorTodo";
    return $error;
}
?>


<?php

include '../../domain/clientes/Clientes.php';

if (isset($_POST["nuevo"])) {

    if (isset($_POST['personanombre']) && isset($_POST['personaapellido1']) &&
            isset($_POST['personaapellido2']) && isset($_POST['personatelefono']) &&
            isset($_POST['personacorreo']) && isset($_POST['zonaid']) && isset($_POST['clientedireccionexacta'])) {


        $personanombre = $_POST['personanombre'];
        $personaapellido1 = $_POST['personaapellido1'];
        $personaapellido2 = $_POST['personaapellido2'];
        $personatelefono = $_POST['personatelefono'];
        $personacorreo = $_POST['personacorreo'];
        $zonaid = $_POST['zonaid'];
        $clientedireccionexacta = $_POST['clientedireccionexacta'];

        if (strlen($personanombre) > 0 && strlen($personaapellido1) > 0 &&
                strlen($personaapellido2) > 0 && strlen($personatelefono) > 0 && strlen($personacorreo) > 0 && strlen($zonaid) > 0 && strlen($clientedireccionexacta) > 0) {
            if (!is_numeric($personanombre)) {

                $cliente = new Clientes(NULL, NULL, $clienteDireccionExacta, $clienteDescuento, $clienteAcumulado, $millas);

                $cliente->setPersonaNombre($personanombre);
                $cliente->setPersonaApellido1($personaapellido1);
                $cliente->setPersonaApellido2($personaapellido2);
                $cliente->setPersonaTelefono($personatelefono);
                $cliente->setCorreo($personacorreo);
                $cliente->setIdZona($zonaid);
                $cliente->setDireccionExacta($clientedireccionexacta);

                include '../../business/clientebusiness/clienteBusiness.php';

                $ClienteBusiness = new clienteBusiness();

                $result = $ClienteBusiness->insertarCliente($cliente);

                return header("location: ../../view/registrocliente/RegistroCliente.php?success=updated");
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

    if (isset($_POST['personanombre']) && isset($_POST['personaapellido1']) &&
            isset($_POST['personaapellido2']) && isset($_POST['personatelefono']) &&
            isset($_POST['clienteid']) &&
            isset($_POST['personacorreo']) && isset($_POST['zonaid']) &&
            isset($_POST['clientedireccionexacta'])) {


        $personanombre = $_POST['personanombre'];
        $personaapellido1 = $_POST['personaapellido1'];
        $personaapellido2 = $_POST['personaapellido2'];
        $personatelefono = $_POST['personatelefono'];
        $personacorreo = $_POST['personacorreo'];
        $clienteid = $_POST['clienteid'];
        $zonaid = $_POST['zonaid'];
        $clientedireccionexacta = $_POST['clientedireccionexacta'];

        if (strlen($personanombre) > 0 && strlen($personaapellido1) > 0 &&
                strlen($personaapellido2) > 0 && strlen($personatelefono) > 0 && strlen($clienteid) > 0 
                && strlen($personacorreo) > 0 && strlen($zonaid) > 0 && strlen($clientedireccionexacta) > 0) {
            if (!is_numeric($personanombre)) {

                $cliente = new Clientes($clienteid, "", $clientedireccionexacta);
                $cliente->setPersonaNombre($personanombre);
                $cliente->setPersonaApellido1($personaapellido1);
                $cliente->setPersonaApellido2($personaapellido2);
                $cliente->setPersonaTelefono($personatelefono);
                $cliente->setIdZona($zonaid);
                $cliente->setCorreo($personacorreo);

                include '../../business/clientebusiness/clienteBusiness.php';
                $ClienteBusiness = new clienteBusiness();
                $result = $ClienteBusiness->modificarCliente($cliente);

                return header("location: ../../view/registrocliente/RegistroCliente.php?success=updated");
            }
        }
    } else {
        // presenta el error al actualizar los datos algun dato esta mal o esta basio.
        $error = "ErrorActualizar";
        return $error;
    }
    /*
     * La accion de eliminar provando si es esta accion la que desea realizar
     */
} else if (isset($_POST["eliminar"])) {

    if (isset($_POST['clienteid'])) {

        $clienteid = $_POST['clienteid'];
        include '../../business/clientebusiness/clienteBusiness.php';

        $ClienteBusiness = new clienteBusiness();

        $result = $ClienteBusiness->eliminarCliente($clienteid);


        return header("location: ../../view/registrocliente/RegistroCliente.php?success=updated");
    } else {
        //esto es porsi a la hora de eliminar el dato es vacio
        $error = "ErrorEliminar";
        return $error;
    }

    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
     */
} else if (isset($_POST["buscar"])) {

    if (isset($_POST['personatelefono'])) {
        $clienteid = $_POST['personatelefono'];

        include '../clientebusiness/clienteBusiness.php';

        $ClienteBusiness = new clienteBusiness();

        $result = $ClienteBusiness->buscarCliente($clienteid);

        return $result;
    } else {
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
        $error = "ErrorBuscar";
        return $error;
        // echo json_encode($error);
    }

    /*
     *  Esta conslta lo que debe devolver es todos los datos de los clientes.   
     */
} else if (isset($_POST["todo"])) {

    include '../clientebusiness/clienteBusiness.php';
    $ClienteBusiness = new clienteBusiness();
    $result = $ClienteBusiness->mostrarClientes();
    
    return $result;
} else {
    //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
    $error = "ErrorTodo";
    return $error;
    // echo json_encode($error);
}
?>

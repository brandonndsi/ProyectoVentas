<?php

/**
 * Description of FacturaAccion
 *
 * @author Juancho
 */
include '../../domain/facturas/Facturas.php';

if (isset($_POST["buscar"])) {

    if (isset($_POST['facturafecha'])) {
        $facturaid = $_POST['facturafecha'];

        include '../facturabusiness/FacturaBusiness.php';

        $facturaBusiness = new FacrutaBusiness();

        $result = $facturaBusiness->buscarFactura($facturaid);

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


    include '../facturabusiness/FacturaBusiness.php';

    $facturaBusiness = new FacturaBusiness();

    $result = $facturaBusiness->mostrarFacturas();

    return $result;
} else {
    //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
    $error = "ErrorTodo";
    return $error;
    // echo json_encode($error);
}
?>
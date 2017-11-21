<?php

include '../../business/facturabusiness/FacturaBusiness.php';
include '../../domain/facturas/Facturas.php';

if (isset($_POST['todo'])) {

    $facturaBusiness = new FacturaBusiness();
    $result = $facturaBusiness->mostrarFactura();

    echo json_encode($result);
} else if (isset($_POST['buscar'])) {

    if (isset($_POST['facturaid'])) {

        $factura = $_POST['facturaid'];
        $facturaBusiness = new FacturaBusiness();
        $result = $facturaBusiness->buscarFactura($factura);

        return $result;
    } else {
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
        $error = "ErrorBuscar";
        return $error;
    }
}    
?>

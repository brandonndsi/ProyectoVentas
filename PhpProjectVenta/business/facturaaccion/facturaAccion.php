<?php

include '../../business/facturabusiness/FacturaBusiness.php';
include '../../domain/facturas/Facturas.php';

if (isset($_POST['todo'])) {

    $facturaBusiness = new FacturaBusiness();
    $result = $facturaBusiness->mostrarFactura();
    
    echo json_encode($result);
    
} else {
    //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
    $error = "ErrorTodo";
    //echo $error;
    
    $facturaBusiness = new FacturaBusiness();
    $result = $facturaBusiness->mostrarFactura();
    
    echo json_encode($result);
    
}
?>

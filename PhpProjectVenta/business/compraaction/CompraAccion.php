<?php

/**
 * Description of compradata
 *
 * @author Juancho
 */
include '../../domain/ventas/Ventas.php';
if (isset($_POST["agregar"])) {

    if (isset($_POST['ventaid']) && isset($_POST['empleadoid']) && isset($_POST['ventacantidadproducto']) &&
        isset($_POST['productoid']) && isset($_POST['zonaid']) && isset($_POST['ventatotal'])&& 
        isset($_POST['ventapagacon']) && isset($_POST['ventavuelto']) && isset($_POST['facturaid'])) {
     
        $ventaid = $_POST['ventaid'];
        $empleadoid = $_POST['empleadoid'];
        $ventacantidadproducto = $_POST['ventacantidadproducto'];
        $zonaid = $_POST['zonaid'];
        $ventatotal = $_POST['ventatotal'];
        $ventapagacon = $_POST['ventapagacon'];
        $ventavuelto = $_POST['ventavuelto'];
        $facturaid = $_POST['facturaid'];

        if (strlen($ventaid) > 0 && strlen($empleadoid) > 0 && strlen($ventacantidadproducto) > 0 && strlen($zonaid) > 0
         && strlen($ventatotal) > 0 && strlen($ventapagacon) > 0 && strlen($ventavuelto) > 0 && strlen($facturaid) > 0 ) {
            if (is_numeric($ventacantidadproducto)) {
                $ventas = new Ventas($ventaid, $personaid, $empleadoid, $ventacantidadproducto, $zonaid, $ventatotal, $ventapagacon, $ventavuelto, $facturaid);

                include '../comprabusiness/CompraBusiness.php';

                $compraBusiness = new CompraBusiness();

                $result = $compraBusiness->insertarCompra($venta);
                if ($result == 1) {
                    return header("location: ../../view/compraview/CompraView.php?success=updated");
                } else {

                    return header("location: ../../view/compraview/CompraView.php?error=dbError");
                }
            }
        }
    } else {
        // retorna un error al tratar de ingresar los datos a la venta/compra
        $error = "ErrorNuevo";
        return $error;
    }
    /*
     * Verifica si la accion es la e actualizar los datos del cliente
     */
} else if (isset($_POST["actualizar"])) {

    if (isset($_POST['ventaid']) && isset($_POST['empleadoid']) && isset($_POST['ventacantidadproducto']) &&
        isset($_POST['productoid']) && isset($_POST['zonaid']) && isset($_POST['ventatotal'])&& 
        isset($_POST['ventapagacon']) && isset($_POST['ventavuelto']) && isset($_POST['facturaid'])) {
        
        $ventaid = $_POST['empleadoid'];
        $empleadoid = $_POST['empleadoid'];
        $ventacantidadproducto = $_POST['ventacantidadproducto'];
        $zonaid = $_POST['zonaid'];
        $ventatotal = $_POST['ventatotal'];
        $ventapagacon = $_POST['ventapagacon'];
        $ventavuelto = $_POST['ventavuelto'];
        $facturaid = $_POST['facturaid'];


        if (strlen($ventaid) > 0 && strlen($empleadoid) > 0 && strlen($ventacantidadproducto) > 0 && strlen($zonaid) > 0
         && strlen($ventatotal) > 0 && strlen($ventapagacon) > 0 && strlen($ventavuelto) > 0 && strlen($facturaid) > 0 ) {
            if (is_numeric($ventacantidadproducto)) {
                $ventas = new Ventas($ventaid, $personaid, $empleadoid, $ventacantidadproducto, $zonaid, $ventatotal, $ventapagacon, $ventavuelto, $facturaid);

                include '../comprabusiness/CompraBusiness.php';

                $compraBusiness = new CompraBusiness();

                $result = $compraBusiness->modificarVenta($venta);

                return header("location: ../../view/compraview/CompraView.php?success=updated");
            }
        }
  }
}

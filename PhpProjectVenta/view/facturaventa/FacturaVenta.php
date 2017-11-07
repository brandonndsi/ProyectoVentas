<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Facturas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

    <?php
    include_once '../../business/facturabusiness/FacturaBusiness.php';
    ?>

</head>

<body>

    <?php
    $facturaBusiness = new FacturaBusiness();
    $allBusiness = $facturaBusiness->mostrarFactura();
    ?>
    <h2>
        Las facturas.
        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a>
    </h2>  
    <form  action="../../business/facturaaccion/facturaAccion.php" method="Post">          
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Fecha</th>
                    <th>Empleado</th>
                </tr>
            </thead>

            <?php foreach ($allBusiness as $current): ?> 
                <tr>
                    <td><input type="hidden" name="facturaid" id="facturaid" value="<?php echo $current['facturaid']; ?>"></td>
                    <td><input type="text" name="facturafecha" class="facturafecha" value="<?php echo $current['facturafecha']; ?>"/> </td>
                    <td><input type="text" name="empleadoid" class="empleadoid" value="<?php echo $current['empleadoid']; ?>"/> </td>
                    <td><a href="?action=ver&id=<?php echo $current['facturaid']; ?> " class="btn btn-info">ver mas</a></td>
                </tr>
            <?php endforeach ?>
        </table>

    </form>

    <?php
    if (isset($_REQUEST['action'])) {

        switch ($_REQUEST['action']) {

            case 'ver':
                $Obtenida = $facturaBusiness->buscarFactura($_REQUEST['id']);
                foreach ($Obtenida as $current) {
                    echo '<form  action="../../business/facturaaccion/facturaAccion.php" method="Post">';
                    echo '<h2>Datos de factura.</h2>';
                    echo '<td><input type="hidden" name="facturaid" value="' . $current['facturaid'] . '"></td>';
                    echo '<p>ID empleado: <input type="text" name="empleadoid" id="empleadoid" 
        value="' . $current['empleadoid'] . '" readonly /></p>';
                    echo '<p>ID persona: <input type="text" name="personaid" id="personaid" 
         value="' . $current['personaid'] . '" readonly /></p>';
                    echo '<p>Tipo Empleado: <input type="text" name="tipoempleadoid"" id="tipoempleadoid" 
         value="' . $current['tipoempleadoid"'] . '" readonly /></p>';
                    echo '<p>ID cliente: <input type="text" name="clienteid" id="clienteid
        "  value="' . $current['clienteid'] . '" readonly /></p>';

                    echo '<p>Direccion: <input type="text" name="cientedireccionexacta" id="cientedireccionexacta
        "  value="' . $current['cientedireccionexacta'] . '" readonly /></p>';
                    echo '<p>Descuento: <input type="text" name="cientedescuento" id="cientedescuento"
        "  value="' . $current['cientedescuento'] . '"  readonly /></p>';
                    echo '<p>Acumulado: <input type="text" name="clienteacumulado" id="clienteacumulado"
        "  value="' . $current['clienteacumulado'] . '"  readonly /></p>';
                    echo '<p>ID compra: <input type="text" name="compraid" id="compraid"
        "  value="' . $current['compraid'] . '"  readonly /></p>';
                    echo '<p>ID producto: <input type="text" name="productoid" id="productoid"
        "  value="' . $current['productoid'] . '"  readonly /></p>';
                    echo '<p>Cantidad Producto: <input type="text" name="compracantidadproducto" id="compracantidadproducto"
        "  value="' . $current['compracantidadproducto'] . '"  readonly /></p>';
                    echo '<p>ID tipo compra: <input type="text" name="tipocompraid" id="tipocompraid"
        "  value="' . $current['tipocompraid'] . '"  readonly /></p>';
                    echo '<p>Fecha: <input type="text" name="facturafecha" id="facturafecha"
        "  value="' . $current['facturafecha'] . '"  readonly /></p>';
                    echo '<p>Bruto: <input type="text" name="facturabruto" id="facturabruto"
        "  value="' . $current['facturabruto'] . '"  readonly /></p>';
                    echo '<p>Neto: <input type="text" name="facturaneto" id="facturaneto"
        "  value="' . $current['facturaneto'] . '"  readonly /></p>';
                    echo '<p><input type="submit"  class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/facturaaccion/facturaAccion.php" method="Post">';
                echo '<h2>Nueva Factura</h2>';
                echo '<p>ID empleado: <input type="text" name="empleadoid" id="empleadoid"/></p>';
                echo '<p>ID persona: <input type="text" name="personaid" id="personaid"/></p>';
                echo '<p>Tipo Empleado: <input type="text" name="tipoempleadoid"" id="tipoempleadoid"/></p>';
                echo '<p>ID cliente: <input type="text" name="clienteid" id="clienteid"/></p>';
                echo '<p>Direccion: <input type="text" name="cientedireccionexacta" id="cientedireccionexacta"/></p>';
                echo '<p>Descuento: <input type="text" name="cientedescuento" id="cientedescuento""/></p>';
                echo '<p>Acumulado: <input type="text" name="clienteacumulado" id="clienteacumulado""/></p>';
                echo '<p>ID compra: <input type="text" name="compraid" id="compraid""/></p>';
                echo '<p>ID producto: <input type="text" name="productoid" id="productoid"/></p>';
                echo '<p>Cantidad Producto: <input type="text" name="compracantidadproducto" id="compracantidadproducto"/></p>';
                echo '<p>ID tipo compra: <input type="text" name="tipocompraid" id="tipocompraid"/></p>';
                echo '<p>Fecha: <input type="text" name="facturafecha" id="facturafecha"/></p>';
                echo '<p>Bruto: <input type="text" name="facturabruto" id="facturabruto"/></p>';
                echo '<p>Neto: <input type="text" name="facturaneto" id="facturaneto"/></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="nuevo" id="nuevo"/></p>';
                echo '</form>';
                break;
        }
    }
    ?> 

<tr>
    <td>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyField") {
                echo '<p style="color: red">Campo(s) vacio(s)</p>';
            } else if ($_GET['error'] == "numberFormat") {
                echo '<p style="color: red">Error, formato de numero</p>';
            } else if ($_GET['error'] == "dbError") {
                echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
            }
        } else if (isset($_GET['success'])) {
            echo '<p style="color: green">Transacción realizada</p>';
        }
        ?>
    </td>
</tr>

</body>
</html>
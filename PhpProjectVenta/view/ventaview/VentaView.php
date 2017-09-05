<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Venta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body >
    <p align="center">
    <form name="form" action="../business/ventaAccion.php" method="Post">
        <strong>
            <p>
                Tomando orden de Express..
            <p>  
        </strong>
        <p> Codigo Producto: <input type="text" name="producto" size="20" required/> 
            Cantidad: <input type="text" name="producto" size="10" required/>
            <input name="agregar" type="button" value="Agregar">
        </p>
    </form>
    
    <?php
    
    $ventaBusiness = new VetnaBusiness();
    $allBusiness = $ventaBusiness->mostrarProductos();
    echo '<h2>Lista de Productos</h2>';
    foreach ($allBusiness as $current) {
        echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post" align="center" >';
        echo '<input type="text" name="productoid" id="productoid" value="' . $current['productoid'] . '"/>';
        echo '<tr>';
        echo '<input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '"/>';
        echo '<input type="text" name="productoprecio" id="productoprecio" value="' . $current['productoprecio'] . '"/>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
    }

    if ($_POST) {
        $productoid = $_POST['productoid'];
        if (isset($productoid)) {
            $buscarBusiness = $productoBusiness->buscarProducto($productoid);
            foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post" align="center" >';
                echo '<input type="text" name="productoid" id="productoid" value="' . $current['productoid'] . '"/>';
                echo '<tr>';
                echo '<input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '"/>';
                echo '<input type="text" name="productoprecio" id="productoprecio" value="' . $current['productoprecio'] . '"/>';
                echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                echo '</tr>';
                echo '</form>';
            }
        }
    }
    ?>
    <p> <a href="../../index.php">Regresar</a> </p>

<tr>
    <td></td>
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
</table>

<footer>
</footer>

</body>
</html>


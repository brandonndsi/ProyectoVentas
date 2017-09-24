<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Venta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php
  include '../../business/ventabusiness/ventaBusiness.php';
  ?>
    
</head>

<body>
    <?php
    $ventaBusiness = new ventaBusiness();
    $allBusiness = $ventaBusiness->mostrarVenta();
    ?>
    <h2>
         Carrrito de compras.
    </h2>  
    <form  action="../../business/ventaaccion/ventaAccion.php" method="Post">          
    <table>
        <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Accion</th>
                </tr>
        </thead>
    <?php foreach ($allBusiness as $current): ?>
        <tr>
        <th><input type="text" name="productocodigo" id="productocodigo" value="<?php echo $current['productocodigo'];?>"/></th>
        <th><input type="text" name="productonombre" id="productonombre" value="<?php echo $current['productonombre'];?>"/></th>
        <th><input type="text" name="productocantidad" id="productocantidad" /></th>
        <th><input type="submit" value="agregar" name="agregar" id="agregar"/></th>
        </tr>
         <?php endforeach ?>
            </table>
    </form>
    <?php
    echo '<h3>Carrito del pedido.</h3>';
     echo '<form  action="../../business/ventaaccion/ventaAccion.php" method="Post"> ';         
    echo '<table>';
        echo '<thead>';
               echo ' <tr>';
                    echo '<th>Codigo</th>';
                    echo '<th>Nombre</th>';
                    echo '<th>Cantidad</th>';
                    echo '<th>Accion</th>';
                echo '</tr>';
        echo '</thead>';
        echo '<tr>';
        echo '<th><input type="text" name="productocodigo" id="productocodigo" value=""/></th>';
        echo '<th><input type="text" name="productonombre" id="productonombre" value=""/></th>';
        echo '<th><input type="text" name="productocantidad" id="productocantidad" value=""/></th>';
        echo '<th><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></th>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Total</th>';
        echo '<th><input type="text" name="productonombre" id="productonombre" value="" readonly /></th>';
        echo '<th>Descuento</th>';
        echo '<th><input type="text" name="productocantidad" id="productocantidad" value="" readonly /></th>';
        echo '</tr>';
            echo '</table>';
    echo '</form>';
    ?>
     <a href="../../index.php">Regresar</a>
</body>
</html>
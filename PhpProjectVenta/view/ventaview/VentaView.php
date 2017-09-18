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
    ?>
    <form  action="../../business/ventaaccion/ventaAccion.php" method="Post">
            <strong>
                <h2>
                    Formulario del carrrito.
                </h2>  
            </strong>
            <table  border="1">
                <thead>
                    <tr>
                        <th class="primerfila" >Codigo</th>
                        <th class="primerfila" >Nombre</th>
                        <th class="primerfila" >Cantidad</th>
                        <th class="primerfila" >Accion</th>
                    </tr>
                </thead>
    <?php
    $allBusiness = $ventaBusiness->mostrarVenta();
    foreach ($allBusiness as $current) {
        echo '<tr>';
        echo '<th><input type="text" name="productoid" id="productoid" value="' . $current['productocodigo'] . '"/></th>';
        echo '<th><input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '"/></th>';
        echo '<th><input type="text" name="productocantidad" id="productocantidad" /></th>';
        echo '<th><input type="submit" value="agregar" name="agregar" id="agregar"/></th>';
        echo '</tr>';
    }
    ?>
            </table>
    <p> <a href="../../index.php">Regresar</a> </p>

</body>
</html>
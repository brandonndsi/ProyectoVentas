<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Venta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

    <?php
    include '../../business/ventabusiness/ventaBusiness.php';
    ?>

</head>

<body>
    <?php
    $ventaBusiness = new ventaBusiness();
    $allBusiness = $ventaBusiness->cargarProducto();
    ?>
    <h2>
        Productos.
        <a href="../../index.php" class="btn btn-secondary">Pagina Principal</a>
    </h2>  
    <table border ="1">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Accion</th>
            </tr>
        </thead>
        <?php foreach ($allBusiness as $current): ?>
            <tr>
                <td><input type="text" name="productocodigo" id="productocodigo" value="<?php echo $current['productocodigo']; ?>" readonly /></td>
                <td><input type="text" name="productonombre" id="productonombre" value="<?php echo $current['productonombre']; ?>" readonly /></td>
                <td><input type="text" name="productoprecio" id="productoprecio" value="<?php echo $current['productoprecio']; ?>" readonly /></td>
                <td>
                    <form  action='../../business/ventaaccion/ventaAccion.php' method='Post'>
                        <input type="hidden" name="productocodigo" id="productocodigo" value="<?php echo $current['productocodigo']; ?>"/>
                        <input type="hidden" name="productonombre" id="productonombre" value="<?php echo $current['productonombre']; ?>"/>
                        <input type="hidden" name="productoprecio" id="productoprecio" value="<?php echo $current['productoprecio']; ?>"/>
                        <input type="text" name="productocantidad" id="productocantidad"/>
                        <input type="submit" class="btn btn-primary" name="agregar" id="agregar" value="Agregar"/>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

    <?php
    include '../../business/ventaaccion/pro.php';
    @session_start(); /* lo que hace es poder sobre escribir los datos de session */
    if (isset($_SESSION["carrito"])) {
        $carrito = $_SESSION["carrito"];

        echo "<h1> lista de compras</h1>";
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Nombre</th>";
        echo "<th>Precio</th>";
        echo "<th>Cantidad</th>";
        echo "<th>SubTotal</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";
        echo "</thead>";
        $total = 0;
        $i = 0;
        echo "<tr>";
        foreach ($carrito as $p) {

            echo "<td>" . $p->codigo . "</td>";
            echo "<td>" . $p->nombre . "</td>";
            echo "<td>$" . $p->precio . "</td>";
            echo "<td>" . $p->cantidad . "</td>";
            echo "<td> $ " . $p->subtotal . "</td>";
            echo "<td>";
            echo "<a href='../../business/ventaaccion/ventaAccion.php?eliminar=$i' class='btn btn-danger'>Eliminar</a>";
            echo "</td>";
            $total += $p->subtotal;
            $i++;
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='4'><b>Total : </b></td>";
        echo "<td colspan='2'><b> $ " . $total . "</b></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='3'>";
        echo "<a href='../../business/ventaaccion/ventaAccion.php' class='btn btn-success'>Procesar</a>";
        echo "</td>";
        echo "<td colspan='3'>";
        echo "<a href='../../business/ventaaccion/ventaAccion.php'class='btn btn-warning'>Cancelar</a>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";

        //echo "cantidad de objetos : ".count($carrito);
    }
    ?>
</body>
</html>
<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Compra de la Materia Prima</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

    <?php
    include '../../business/comprabusiness/compraBusiness.php';
    ?>

</head>

<body>
    <?php
    $compraBusiness = new compraBusiness();
    $allBusiness = $compraBusiness->cargarProducto();
    ?>
    <h2>
        Lista de Productos Primos
        <a href="../../index.php" class="btn btn-secondary">Pagina Principal</a>
    </h2>  



    <table border ="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Stock</th>
                <th>Precio Unitario</th>
                <th>Accion</th>
            </tr>
        </thead>
        <?php foreach ($allBusiness as $current): ?>
            <tr>
                <td><input type="text" name="materiaprimacodigo" id="materiaprimacodigo" value="<?php echo $current['materiaprimacodigo']; ?>" readonly /></td>
                <td><input type="text" name="materiaprimanombre" id="materiaprimanombre" value="<?php echo $current['materiaprimanombre']; ?>" readonly /></td>
                <td><input type="text" name="materiaprimacantidad" id="materiaprimacantidad" value="<?php echo $current['materiaprimacantidad']; ?>" readonly /></td>
                <td><input type="text" name="materiaprimaprecio" id="materiaprimaprecio" value="<?php echo $current['materiaprimaprecio']; ?>" readonly /></td>
                <td>
                    <form  action='../../business/compraaccion/compraAccion.php' method='Post'>
                        <input type="hidden" name="materiaprimacodigo" id="materiaprimacodigo" value="<?php echo $current['materiaprimacodigo']; ?>"/>
                        <input type="hidden" name="materiaprimanombre" id="materiaprimanombre" value="<?php echo $current['materiaprimanombre']; ?>"/>
                        <input type="hidden" name="materiaprimacantidad" id="materiaprimacantidad" value="<?php echo $current['materiaprimacantidad']; ?>"/>
                        <input type="hidden" name="materiaprimaprecio" id="materiaprimaprecio" value="<?php echo $current['materiaprimaprecio']; ?>"/>
                        <input type="submit" class="btn btn-primary" name="agregar" id="agregar" value="Agregar"/>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

    <?php
    include '../../business/compraaccion/pro.php';
    @session_start(); /* lo que hace es poder sobre escribir los datos de session */
    if (isset($_SESSION["carrito"])) {
        $carrito = $_SESSION["carrito"];

        echo "<h1> lista de productos en la compra</h1>";
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Nombre</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Precio Unitario</th>";
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
            echo "<td>" . $p->cantidad . "</td>";
            echo "<td>$" . $p->precio . "</td>";
            echo "<td> $ " . $p->subtotal . "</td>";
            echo "<td>";
            echo "<a href='../../business/compraaccion/compraAccion.php?eliminar=$i' class='btn btn-danger'>Eliminar</a>";
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
        echo '<p>Provedor: <input type = "text" name = "proveedor" id = "proveedor" required/></p>';
        echo '<p>Fecha de Compra: <input type = "date" name = "fechacompra" id = "fechacompra" required/></p>';
        echo "</td>";
        echo "<td colspan='3'>";
        echo "<a href='../../business/compraaccion/compraAccion.php' class='btn btn-success'>Procesar</a>";
        echo "<a href='../../business/compraaccion/compraAccion.php'class='btn btn-warning'>Cancelar</a>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
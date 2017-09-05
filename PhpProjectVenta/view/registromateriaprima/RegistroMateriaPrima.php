<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Materia Prima</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/materiaPrimabusiness/MateriaPrimaBusiness.php';
    ?>
</head>

<body >
    <p align="center">
    <form name="form" action="../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post">
        <strong>
            <p>
                Formulario para insertar nueva Materia Prima a la base de datos.
            <p>  
        </strong>
        <p> ID: <input type="text" name="materiaprimaid" size="45"/>
        </p>
        <p> Tipo Materia Prima: <input type="text" name="tipomateriaprimacategoria" size="45" required placeholder="Cocina"/>
        </p>
        <p> Nombre Materia Prima: <input type="text" name="materiaprimanombre" size="45" required placeholder="Pan Hambuerguesa"/>
        </p>
        <p> Precio: <input type="text" name="materiaprimaprecio" size="45" required placeholder="15000"/>
        </p>
        <p> Cantidad: <input type="text" name="materiaprimacantidad" size="45" placeholder="En numeros"/>
        </p>
        <br>
        <input name="create" type="submit" value="Registrar">

    </form>

    <?php
    $MateriaPrimaBusiness = new MateriaPrimaBusiness();
    $allBusiness = $MateriaPrimaBusiness->mostrarMateriaPrima();
    echo '<h2>Lista de AMteria Primas</h2>';
    foreach ($allBusiness as $current) {
        echo '<form  action="../../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post" align="center" >';
        echo '<input type="text" name="matriaprimaid" id="matriaprimaid" value="' . $current['matriaprimaid'] . '"/>';
        echo '<input type="text" name="tipomateriaprimacategoria" id="tipomateriaprimacategoria" value="' . $current['tipomateriaprimacategoria'] . '"/>';
        echo '<input type="text" name="materiaprimanombre" id="materiaprimanombre" value="' . $current['materiaprimanombre'] . '"/>';
        echo '<input type="text" name="materiaprimaprecio" id="materiaprimaprecio" value="' . $current['materiaprimaprecio'] . '"/>';
        echo '<input type="text" name="materiaprimacantidad" id="materiaprimacantidad" value="' . $current['materiaprimacantidad'] . '"/>';

        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
    }

    if ($_POST) {
        $matriaprimaid = $_POST['matriaprimaid'];
        if (isset($matriaprimaid)) {
            $buscarBusiness = $MateriaPrimaBusiness->buscarMatriaPrima($matriaprimaid);
            foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post" align="center" >';
                echo '<input type="text" name="matriaprimaid" id="matriaprimaid" value="' . $current['matriaprimaid'] . '"/>';
                echo '<input type="text" name="tipomateriaprimacategoria" id="tipomateriaprimacategoria" value="' . $current['tipomateriaprimacategoria'] . '"/>';
                echo '<input type="text" name="materiaprimanombre" id="materiaprimanombre" value="' . $current['materiaprimanombre'] . '"/>';
                echo '<input type="text" name="materiaprimaprecio" id="materiaprimaprecio" value="' . $current['materiaprimaprecio'] . '"/>';
                echo '<input type="text" name="materiaprimacantidad" id="materiaprimacantidad" value="' . $current['materiaprimacantidad'] . '"/>';
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

<footer>
</footer>
</body>
</html>
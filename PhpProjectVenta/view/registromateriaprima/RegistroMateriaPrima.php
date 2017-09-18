<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Materia Prima</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/materiaprimabusiness/MateriaPrimaBusiness.php';
    ?>

</head>
<body>
    <?php
    $materiaprimabusiness = new MateriaPrimaBusiness();
    ?>
    <div class="nuevo"> 
        <p>
        <form  action="../../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post" >
            <strong>
                <h2>
                    Nueva Materia Prima.
                </h2>  
            </strong>
            <p> <table width="50%" border="0">
                <thead>
                    <tr>
                        <th class="primerfila" >Codigo</th>
                        <th class="primerfila" >Nombre</th>
                        <th class="primerfila" >Precio</th>
                        <th class="primerafila" >Cantidad</th>
                        <th class="primerafila" >Tipo</th>

                    </tr>
                </thead>           
                <tr>
                    <td><input type="text" name="materiaprimacodigo" size="10" class="materiaprimacodigo" placeholder="P+numero"/> </td>
                    <td><input type="text" name="materiaprimanombre" size="10" class="materiaprimanombre" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="materiaprimaprecio" size="10" class="materiaprimaprecio" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="materiaprimacantidad" size="10" class="materiaprimacantidad" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="tipomateriaprimaid" size="10" class="tipomateriaprimaid" placeholder="Solo numeros"/> </td>
                    <th class="bot"> <td><input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></th>
                </tr> 

            </table>
            <p>&nbsp;</p> 


        </form>

    </div>

    <?php
    $MateriaPrimaBusiness = new MateriaPrimaBusiness();
    $allBusiness = $MateriaPrimaBusiness->mostrarMateriaPrima();
    echo '<h2>Lista de Materia Primas</h2>';
    echo '<form  action="../../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post"id="mostrar">';
    echo'<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th><th>Codigo</th><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Tipo</th>';
    foreach ($allBusiness as $current) {
        echo '</tr>';
        echo '</thead>';
        echo '<tr>';
        echo '<th >' . $current['materiaprimaid'] . '</th>';
        echo '<th>' . $current['materiaprimacodigo'] . '</th>';
        echo '<th>' . $current['materiaprimanombre'] . '</th>';
        echo '<th>' . $current['materiaprimaprecio'] . '</th>';
        echo '<th>' . $current['materiaprimacantidad'] . '</th>';
        echo '<th>' . $current['tipomateriaprimaid'] . '</th>';
        echo '</tr>';
    }
    echo '</table>';

    echo '</form>';
    
    echo '<h2>Buscar un  materia prima</h2>';
    echo '<form method="post" action="RegistroMateriaPrima.php" >';
    echo '<input type="text" name="materiaprimaid" id="materiaprimaid" placeholder="    id  " />';
    echo '<tr>';

    echo '<td><input type="submit" value="Enviar" name="buscar" id="buscar"/></td>';
    echo '</tr>';
    echo '</form>';
    if ($_POST) {
        $materiaprimaid = $_POST['materiaprimaid'];
        if (isset($materiaprimaid)) {
            $buscarBusiness = $MateriaPrimaBusiness->buscarMateriaPrima($materiaprimaid);
            foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post" >';
                echo '<p> ID: <input type="text" name="materiaprimaid" id="materiaprimaid" value="' . $current['materiaprimaid'] . '"  readonly /></p>';
                echo '<p> Codigo: <input type="text" name="materiaprimacodigo" id="materiaprimacodigo" value="' . $current['materiaprimacodigo'] . '"/></p>';
                echo '<p> Nombre: <input type="text" name="materiaprimanombre" id="materiaprimanombre" value="' . $current['materiaprimanombre'] . '"/></p>';
                echo '<p> Precio: <input type="text" name="materiaprimaprecio" id="materiaprimaprecio" value="' . $current['materiaprimaprecio'] . '"/></p>';
                echo '<p> Cantidad: <input type="text" name="materiaprimacantidad" id="materiaprimacantidad" value="' . $current['materiaprimacantidad'] . '"/></p>';
                echo '<p> Tipo: <input type="text" name="tipomateriaprimaid" id="tipomateriaprimaid" value="' . $current['tipomateriaprimaid'] . '"/></p>';
                echo '<br>';
                echo '<br>';
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

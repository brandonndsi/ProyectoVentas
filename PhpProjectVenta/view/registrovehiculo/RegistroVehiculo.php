<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Vehiculo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script type="text/javascript" src="../../js/Cliente.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/vehiculo.css">
    <?php
    include '../../business/vehiculobusiness/vehiculoBusiness.php';
    ?>
</head>
<body>

    <form name="form" action="../../business/vehiculoaccion/VehiculoAccion.php" method="Post" align="center">
        <strong>
            <p>
                Formulario para insertar el vehiculo a la base de datos.
            <p>  
        </strong>  
        <p> Marca: <input type="text" name="vehiculomarca" id="vehiculomarca" placeholder="solo numeros"/></p>
        <p> Modelo: <input type="text" name="vehiculomodelo" id="vehiculomodelo" placeholder="solo letras"/></p>
        <p> Placa: <input type="text" name="vehiculoplaca" id="vehiculoplaca" placeholder="solo numeros"/></p>
        <br>
        <input name="nuevo" type="submit" id="nuevo" value="Registrar">

    </form>
    <div class="contenedor">
    <?php
    $vehiculoBusiness = new vehiculoBusiness();
    $allBusiness = $vehiculoBusiness->mostrarVehiculo();
    echo '<h2 align="center">Lista de vehiculo</h2>';

        echo '<form  action="../../business/vehiculoaccion/VehiculoAccion.php" method="Post" align="center" id="mostrar">';
        echo'<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th><th>Marca</th><th>Modelo</th>
        <th>Placa</th>';
            foreach ($allBusiness as $current) {
        echo '</tr>';
        echo '</thead>';
        echo '<tr>';
        echo '<th >' . $current['vehiculoid'] . '</th>';
        echo '<th>' . $current['vehiculomarca'] . '</th>';
        echo '<th>' . $current['vehiculomodelo'] . '</th>';
        echo '<th>' . $current['vehiculoplaca'] . '</th>';
        echo '</tr>';
    }
        echo '</table>';

        echo '</form>';
    
    echo '<h2 align="center">Buscar Vehiculo</h2>';
    echo '<form method="post" action="RegistroVehiculo.php" align="center" >';
    echo '<input type="text" name="vehiculoid" id="vechiculoid" placeholder="ID/Nombre"/>';
    echo '<tr>';

    echo '<td><input type="submit" value="Buscar" name="buscar" id="buscar"/></td>';
    echo '</tr>';
    echo '</form>';

    if ($_POST) {
        $vehiculoid = $_POST['vehiculoid'];
        if (isset($vehiculoid)) {
            $buscarBusiness = $vehiculoBusiness->buscarVehiculo($vehiculoid);
            foreach ($buscarBusiness as $current) {
        
        echo '<form  action="../../business/vehiculoaccion/VehiculoAccion.php" method="Post" align="center" >';
        echo '<p> ID: <input type="text" name="vehiculoid" id="vehiculoid" value="' . $current['vehiculoid'] . '"  readonly /></p>';
        echo '<p> Marca: <input type="text" name="vehiculomarca" id="vehiculomarca" value="' . $current['vehiculomarca'] . '"/></p>';
        echo '<p> Modelo: <input type="text" name="vehiculomodelo" id="vehiculomodelo" value="' . $current['vehiculomodelo'] . '"/></p>';
        echo '<p> Placa: <input type="text" name="vehiculoplaca" id="vehiculoplaca" value="' . $current['vehiculoplaca'] . '"/></p>';
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
    </div>
    <p align="center"> <a href="../../index.php">Regresar</a> </p>

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
<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Vehiculo </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../../business/vehiculobusiness/VehiculoBusiness.php';
    ?>

</head>

<body >
    <p align="center">
    <form name="form" action="../business/vehiculoaccion/VehiculoAccion.php" method="Post">
        <strong>
            <p>
                Registrando Vehiculo
            <p>  
        </strong>
        <p> ID: <input type="text" name="vehiculoid" size="45" required placeholder="8888"/>
        </p>         
        <p> Placa: <input type="text" name="vehiculoplaca" size="45" placeholder="sin guiones ni espacios"/>
        </p>
        <p> Marca: <input type="text" name="vehiculomarca" size="45" placeholder="YAMAHA"/>
        </p>
        <p> Modelo: <input type="text" name="vehiculomodelo" size="45" placeholder="YBR125"/>
        </p>
        <br>        
        <input name="create" type="submit" value="Registrar">

    </form>

    <?php
    $vehiculoBusiness = new vehiculoBusiness();
    $allBusiness = $vehiculoBusiness->mostrarVehiculo();
    echo '<h2>Lista de Vehiculos</h2>';
    foreach ($allBusiness as $current) {
        echo '<form  action="../../business/vehiculoaccion/VehiculoAccion.php" method="Post" align="center" >';
        echo '<input type="text" name="vehiculoid" id="vehiculoid" value="' . $current['vehiculoid'] . '"/>';
        echo '<input type="text" name="vehiculoplaca" id="vehiculoplaca" value="' . $current['vehiculoplaca'] . '"/>';
        echo '<input type="text" name="vehiculomarca" id="vehiculomarca" value="' . $current['vehiculomarca'] . '"/>';
        echo '<input type="text" name="vehiculomodelo" id="vehiculomodelo" value="' . $current['vehiculomodelo'] . '"/>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
    }

    if ($_POST) {
        $vehiculoid = $_POST['vehiculoid'];
        if (isset($vehiculoid)) {
            $buscarBusiness = $zonaBusiness->buscarZona($zonaid);
            foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/vehiculoaccion/VehiculoAccion.php" method="Post" align="center" >';
                echo '<input type="text" name="vehiculoid" id="vehiculoid" value="' . $current['vehiculoid'] . '"/>';
                echo '<input type="text" name="vehiculoplaca" id="vehiculoplaca" value="' . $current['vehiculoplaca'] . '"/>';
                echo '<input type="text" name="vehiculomarca" id="vehiculomarca" value="' . $current['vehiculomarca'] . '"/>';
                echo '<input type="text" name="vehiculomodelo" id="vehiculomodelo" value="' . $current['vehiculomodelo'] . '"/>';
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


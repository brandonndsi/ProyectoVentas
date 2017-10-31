<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Vehiculo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">
    
    <?php
    include '../../business/vehiculobusiness/vehiculoBusiness.php';
    ?>
</head>
<body>
    <?php
    $vehiculoBusiness = new vehiculoBusiness();
    $allBusiness = $vehiculoBusiness->mostrarVehiculo();
    ?>
    <h2>
        Formulario Vehiculo
        <a href="?action=registrar" class="btn btn-primary" >Nuevo Vehiculo</a>
        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a>
    </h2>  
    <form  action="RegistroVehiculo.php" method="Post" >
        <table>
            <thead>
                <tr> 
                    <th></th>
                    <th>Marca</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                </tr>
            </thead>           
            <?php foreach ($allBusiness as $current): ?>
                <tr>
                    <td><input type="hidden" name="vehiculoid"  class="vehiculoid" value="<?php echo $current['vehiculoid']; ?>" readonly  /> </td>
                    <td><input type="text" name="vehiculomarca"  class="vehiculomarca" value="<?php echo $current['vehiculomarca']; ?>" readonly /> </td>
                    <td><input type="text" name="vehiculoplaca"  class="vehiculoplaca" value="<?php echo $current['vehiculoplaca']; ?>" readonly /> </td>
                    <td><input type="text" name="vehiculomodelo"  class="vehiculomodelo" value="<?php echo $current['vehiculomodelo']; ?>" readonly /> </td>

                    <td><a href="?action=editar&id=<?php echo $current['vehiculoid']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['vehiculoid']; ?> " class="btn btn-info">Ver mas</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['vehiculoid']; ?> " class="btn btn-danger">Eliminar</a></td>
                </tr> 
            <?php endforeach ?>
        </table>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {

            case 'ver':
                $vehiculoAll = $vehiculoBusiness->buscarVehiculo($_REQUEST['id']);
                foreach ($vehiculoAll as $current) {
                    echo '<form  action="RegistroVehiculo.php" method="Post">';
                    echo '<h2>Datos del Vehiculo</h2>';
                    echo '<p>Marca: <input type="text" name="vehiculomarca" id="vehiculomarca" value="' . $current['vehiculomarca'] . '" readonly /></p>';
                    echo '<p>Placa: <input type="text" name="vehiculoplaca" id="vehiculoplaca"  value="' . $current['vehiculoplaca'] . '" readonly /></p>';
                    echo '<p>Modelo: <input type="text" name="vehiculomodelo" id="vehiculomodelo"  value="' . $current['vehiculomodelo'] . '" readonly /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':
                echo '<form  action="../../business/vehiculoaccion/VehiculoAccion.php" method="Post">';
                echo '<h2>Vehiculo nuevo</h2>';
                echo '<p>Marca: <input type="text" name="vehiculomarca" id="vehiculomarca" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" /></p>';
                echo '<p>Placa: <input type="text" name="vehiculoplaca" id="vehiculoplaca" required /></p>';
                echo '<p>Modelo: <input type="text" name="vehiculomodelo" id="vehiculomodelo" required pattern="[0-9]{4}" /></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="registrar" id="registrar"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $vehiculoBusiness->eliminarVehiculo($_REQUEST['id']);

                header('Location: RegistroVehiculo.php');

                break;

            case 'editar':

                $vehiculoObtenido = $vehiculoBusiness->buscarVehiculo($_REQUEST['id']);
                foreach ($vehiculoObtenido as $current) {
                    echo '<form  action="../../business/vehiculoaccion/VehiculoAccion.php" method="Post">';
                    echo '<h2>Vehiculo editar</h2>';
                    echo '<input type="hidden" name="vehiculoid" id="vehiculoid" value="' . $current['vehiculoid'] . '" readonly/>';
                    echo '<p>Marca: <input type="text" name="vehiculomarca" id="vehiculomarca" value="' . $current['vehiculomarca'] . '" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                    echo '<p>Placa: <input type="text" name="vehiculoplaca" id="vehiculoplaca"  value="' . $current['vehiculoplaca'] . '" /></p>';
                    echo '<p>Modelo: <input type="text" name="vehiculomodelo" id="vehiculomodelo"  value="' . $current['vehiculomodelo'] . '" required pattern="[0-9]{4}"/></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Actualizar" name="actualizar" id="actualizar"/></p>';
                    echo '</form>';
                }
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

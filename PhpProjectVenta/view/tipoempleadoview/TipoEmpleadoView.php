<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tipo Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">
    
    <?php
    include '../../business/tipoempleadobusiness/tipoEmpleadoBusiness.php';
    ?>

</head>
<body>
    <?php
    $tipoEmpleadoBusiness = new tipoEmpleadoBusiness();
    $allBusiness = $tipoEmpleadoBusiness->mostrarTipoEmpleado();
    ?>
    <h2>
        Formulario tipos de empleado
        <a href="?action=registrar" class="btn btn-primary" >Nuevo Tipo Empleado</a>
        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a>
    </h2>  
    <form  action="../../business/tipodeempleadoaccion/tipoEmpleadoAccion.php" method="Post">

        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Salario Base</th>
                    <th>Descripcion</th>
                    <th>Hora Extra</th>
                </tr>
            </thead>           
            <tr>
                <?php foreach ($allBusiness as $current): ?>
                    <td><input type="text" name="tipoempleadoid" class="tipoempleadoid" value="<?php echo $current['tipoempleadoid']; ?>" readonly /> </td>
                    <td><input type="text" name="tipoempleadosalariobase" class="tipoempleadosalariobase" value="<?php echo $current['tipoempleadosalariobase']; ?>" readonly /> </td>
                    <td><input type="text" name="tipoempleadodescripcion" class="tipoempleadodescripcion" value="<?php echo $current['tipoempleadodescripcion']; ?>" readonly />
                    <td><input type="text" name="tipoempleadohoraextra" class="tipoempleadohoraextra" value="<?php echo $current['tipoempleadohoraextra']; ?>" readonly />
                    </td>
                    <td><a href="?action=editar=<?php echo $current['tipoempleado']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver=<?php echo $current['tipoempleado']; ?> " class="btn btn-info">ver mas</a></td>
                    <td><a href="?action=eliminar=<?php echo $current['tipoempleado']; ?> " class="btn btn-danger">Eliminar</a></td>                    
                </tr> 
            <?php endforeach ?>
        </table>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {

            case 'ver':

                $tipoempleadoAll = $tipoEmpleadoBusiness->buscarTipoEmpleado($_REQUEST['id']);
                foreach ($tipoempleadoAll as $current) {
                    echo '<form  action="TipoEmpleadoView.php" method="Post">';
                    echo '<h2>Datos Tipo Empleado</h2>';
                    echo '<p>Tipo Empleado: <input type="text" name="tipoempleado" id="tipoempleado" value="' . $current['tipoempleado'] . '" readonly /></p>';
                    echo '<p>Salario Base: <input type="text" name="tipoempleadosalariobase" id="tipoempleadosalariobase"  value="' . $current['tipoempleadosalariobase'] . '" readonly /></p>';
                    echo '<p>Descripcion: <input type="text" name="tipoempleadodescripcion" id="tipoempleadodescripcion"  value="' . $current['tipoempleadodescripcion'] . '" readonly /></p>';
                    echo '<p>Hora Extra: <input type="text" value="tipoempleadohoraextra" name="tipoempleadohoraextra" id="tipoempleadohoraextra" value="' . $current['tipoempleadohoraextra'] . '" readonly /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/tipodeempleadoaccion/tipoEmpleadoAccion.php" method="Post">';
                echo '<h2>Datos Tipo Empleado</h2>';
                echo '<p>Tipo Empleado: <input type="text" name="tipoempleado" id="tipoempleado" required/></p>';
                echo '<p>Salario Base: <input type="text" name="tipoempleadosalariobase" id="tipoempleadosalariobase" required pattern="[0-9]{2,7}"/></p>';
                echo '<p>Descripcion: <input type="text" name="tipoempleadodescripcion" id="tipoempleadodescripcion" required/></p>';
                echo '<p>Hora Extra: <input type="text" name="tipoempleadohoraextra" id="tipoempleadohoraextra" required pattern="[0-9]{2,4}"/></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="registrar" id="registrar"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $tipoEmpleadoBusiness->eliminarTipoEmpleado($_REQUEST['id']);
                header('Location: TipoEmpleadoView.php');
                break;

            case 'editar':

                $tipoempleadoObtenido = $tipoEmpleadoBusiness->buscarTipoEmpleado($_REQUEST['id']);
                foreach ($tipoempleadoObtenido as $current) {
                    echo '<form  action="../../business/tipodeempleadoaccion/tipoEmpleadoAccion.php" method="Post">';
                    echo '<h2>Tipo empleado editar</h2>';
                    echo '<p>Tipo Empleado: <input type="text" name="tipoempleado" id="tipoempleado" value="' . $current['tipoempleado'] . '"/></p>';
                    echo '<p>Salario Base: <input type="text" name="tipoempleadosalariobase" id="tipoempleadosalariobase"  value="' . $current['tipoempleadosalariobase'] . '" pattern="[0-9]{2,7}"/></p>';
                    echo '<p>Descripcion: <input type="text" name="tipoempleadodescripcion" id="tipoempleadodescripcion"  value="' . $current['tipoempleadodescripcion'] . '" /></p>';
                    echo '<p>Hora Extra: <input type="text" name="tipoempleadohoraextra" id="tipoempleadohoraextra" value="' . $current['tipoempleadohoraextra'] . '" pattern="[0-9]{2,4}"/></p>';
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
        } else if (isset($_GET['ErrorNumero'])) {
            echo '<center><p style="color: red">El precio debe ser solo numeros enteros.</p></center>';
        }
        ?>
    </td>
</tr>
</body>

</html>




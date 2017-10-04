<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tipo Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
                    Formulario tipos de empleado.
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
                    <td><input type="text" name="tipoempleadoid" class="tipoempleadoid" value="<?php echo $current['tipoempleadoid'];?>" readonly /> </td>
                    <td><input type="text" name="tipoempleadosalariobase" class="tipoempleadosalariobase" value="<?php echo $current['tipoempleadosalariobase'];?>" readonly /> </td>
                    <td><input type="text" name="tipoempleadodescripcion" class="tipoempleadodescripcion" value="<?php echo $current['tipoempleadodescripcion'];?>" readonly />
                    <td><input type="text" name="tipoempleadohoraextra" class="tipoempleadohoraextra" value="<?php echo $current['tipoempleadohoraextra'];?>" readonly />
                    </td>
                    <td><a href="?action=editar&id=<?php echo $current['tipoempleado']; ?> ">Modificar</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['tipoempleado']; ?> ">Eliminar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['tipoempleado']; ?> ">ver</a></td>
                </tr> 
                <?php endforeach ?>
            </table>
             <a href="?action=registrar">Nuevo tipo Empleado</a>
        </form>
    
    <?php
if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){

        case 'ver':
             $tipoempleadoAll = $tipoEmpleadoBusiness->buscarTipoEmpleado($_REQUEST['id']);
            foreach ($tipoempleadoAll as $current) {
        echo '<form  action="TipoEmpleadoView.php" method="Post">';
        echo '<h2>Datos Tipo Empleado</h2>';
        echo '<p>Tipo Empleado: <input type="text" name="tipoempleado" id="tipoempleado" value="' . $current['tipoempleado'] . '" readonly /></p>';
        echo '<p>Salario Base: <input type="text" name="tipoempleadosalariobase" id="tipoempleadosalariobase"  value="' . $current['tipoempleadosalariobase'] . '" readonly /></p>';
        echo '<p>Descripcion: <input type="text" name="tipoempleadodescripcion" id="tipoempleadodescripcion"  value="' . $current['tipoempleadodescripcion'] . '" readonly /></p>';
        echo '<p>Hora Extra: <input type="text" value="tipoempleadohoraextra" name="tipoempleadohoraextra" id="tipoempleadohoraextra" value="' . $current['tipoempleadohoraextra'] . '" readonly /></p>';
        echo '<p>Accion: <input type="submit" value="cerrar" name="cerrar" id="cerrar"/></p>';
        echo '</form>';
            }
            break;

        case 'registrar':
        echo '<form  action="../../business/tipodeempleadoaccion/tipoEmpleadoAccion.php" method="Post">';
        echo '<h2>Datos Tipo Empleado</h2>';
        echo '<p>Tipo Empleado: <input type="text" name="tipoempleado" id="tipoempleado"/></p>';
        echo '<p>Salario Base: <input type="text" name="tipoempleadosalariobase" id="tipoempleadosalariobase"/></p>';
        echo '<p>Descripcion: <input type="text" name="tipoempleadodescripcion" id="tipoempleadodescripcion"/></p>';
        echo '<p>Hora Extra: <input type="text" name="tipoempleadohoraextra" id="tipoempleadohoraextra"/></p>';
        echo '<p>Accion: <input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></p>';
        echo '</form>';
            break;

        case 'eliminar':

            $tipoEmpleadoBusiness->eliminarTipoEmpleado($_REQUEST['id']);

            header('Location: TipoEmpleadoView.php');

            break;

        case 'editar':

            $tipoempleadoObtenido= $tipoEmpleadoBusiness->buscarTipoEmpleado($_REQUEST['id']);
            foreach ($tipoempleadoObtenido as $current) {
        echo '<form  action="../../business/tipodeempleadoaccion/tipoEmpleadoAccion.php" method="Post">';
        echo '<h2>Tipo empleado editar</h2>';
        echo '<p>Tipo Empleado: <input type="text" name="tipoempleado" id="tipoempleado" value="' . $current['tipoempleado'] . '"/></p>';
        echo '<p>Salario Base: <input type="text" name="tipoempleadosalariobase" id="tipoempleadosalariobase"  value="' . $current['tipoempleadosalariobase'] . '"/></p>';
        echo '<p>Descripcion: <input type="text" name="tipoempleadodescripcion" id="tipoempleadodescripcion"  value="' . $current['tipoempleadodescripcion'] . '" /></p>';
        echo '<p>Hora Extra: <input type="text" name="tipoempleadohoraextra" id="tipoempleadohoraextra" value="' . $current['tipoempleadohoraextra'] . '"/></p>';
        echo '<p>Accion: <input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></p>';
        echo '</form>';
            }
            break;
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
        } else if (isset($_GET['ErrorNumero'])) {
            echo '<center><p style="color: red">El precio debe ser solo numeros enteros.</p></center>';
        }
        ?>
    </td>
</tr>
</body>

</html>




<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tipo Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/tipoempleadobusiness/tipoEmpleadobusiness.php';
    ?>
</head>

<body >
    <p align="center">
    <form name="form" action="business/tipoempleadoaccion/tipoEmpleadoAction.php" method="Post">
        <strong>
            <p>
                Datos de cada puesto.
            <p>  
        </strong>
        <p> Tipo de Empleado: <input type="text" name="tipoEmpleado" size="35" required placeholder="Solo letras"/>
        </p>         
        <p> Salario Base: <input type="text" name="tipoempleadosalariobase" size="35" required placeholder="Solo letras" />
        </p>
        <p> Descripcion de puesto: <input type="text" name="tipoempleadodescripcion" size="35" required placeholder="Solo numeros"/> 
        </p>
        <p> Tipo de hora extra: <input type="text" name="tipoempleadohoraextra" size="35" required placeholder="Solo numeros"/> 
        </p>

        <input name="create" type="submit" value="Registrar">

    </form>
    <?php
    $tipoEmpleadoBusiness = new tipoEmpleadoBusiness();
    $allBusiness = $tipoEmpleadoBusiness->mostrarTipoEmpleado();
    echo '<h2>Lista Tipos de Empleados</h2>';
    foreach ($allBusiness as $current) {
        echo '<form  action="../../business/tipoempleadoaccion/tipoEmpleadoAccion.php" method="Post" align="center" >';
        echo '<input type="text" name="tipoEmpleado" id="tipoEmpleado" value="' . $current['tipoEmpleado'] . '"/>';
        echo '<input type="text" name="tipoempleadosalariobase" id="tipoempleadosalariobase" value="' . $current['tipoempleadosalariobase'] . '"/>';
        echo '<input type="text" name="tipoempleadodescripcion" id="tipoempleadodescripcion" value="' . $current['tipoempleadodescripcion'] . '"/>';
        echo '<input type="text" name="tipoempleadohoraextra" id="tipoempleadohoraextra" value="' . $current['tipoempleadohoraextra'] . '"/>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
    }

    if ($_POST) {
        $tipoEmpleado = $_POST['tipoEmpleado'];
        if (isset($tipoEmpleado)) {
            $buscarBusiness = $tipoEmpleadoBusiness->buscarTipoEmpleado(tipoEmpleado);
            foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/tipoempleadoaccion/tipoEmpleadoAccion.php" method="Post" align="center" >';
                echo '<input type="text" name="tipoEmpleado" id="tipoEmpleado" value="' . $current['tipoEmpleado'] . '"/>';
                echo '<input type="text" name="tipoempleadosalariobase" id="tipoempleadosalariobase" value="' . $current['tipoempleadosalariobase'] . '"/>';
                echo '<input type="text" name="tipoempleadodescripcion" id="tipoempleadodescripcion" value="' . $current['tipoempleadodescripcion'] . '"/>';
                echo '<input type="text" name="tipoempleadohoraextra" id="tipoempleadohoraextra" value="' . $current['tipoempleadohoraextra'] . '"/>';
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




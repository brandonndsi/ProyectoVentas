<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tipo Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <?php
    include '../../business/tipoempleadobusiness/tipoEmpleadoBusiness.php';
    ?>

</head>
<body align="center">
    <?php
    $tipoEmpleadoBusiness = new tipoEmpleadoBusiness();
    ?>
    <div class="nuevo"> 
        <p align="center">    
        <form  action="../../business/tipodeempleadoaccion/tipoEmpleadoAccion.php" method="Post" align="center" >
            <strong>
                <h2 align="center">
                    Formulario para insertar los tipos de empleados a la base de datos.
                </h2>  
            </strong>
            <p> <table width="50%" border="0" align="center">
                <thead>
                    <tr>
                        <th class="primerfila" >Tipo</th>
                        <th class="primerfila" >Salario Base</th>
                        <th class="primerfila" >Descripcion</th>
                        <th class="primerafila" >Hora Extra</th>

                    </tr>
                </thead>           

                <tr>
                    <td><input type="text" name="tipoempleado" size="10" class="tipoempleado" placeholder="P+numero"/> </td>
                    <td><input type="text" name="tipoempleadosalariobase" size="10" class="tipoempleadosalariobase" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="tipoempleadodescripcion" size="10" class="tipoempleadodescripcion" placeholder="Solo numeros"/>
                    <td><input type="text" name="tipoempleadohoraextra" size="10" class="tipoempleadohoraextra" placeholder="Solo numeros"/>
                    </td>
                    <th class="bot"> <td><input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></th>
                </tr> 

            </table>
            <p>&nbsp;</p> 
        </form>
    </div>

    <div class="mostrar">
        <?php
        $allBusiness = $tipoEmpleadoBusiness->mostrarTipoEmpleado();
        echo '<h2 align="center">Lista de Tipos de Empleados</h2>';
        echo '<form  action="../../business/tipodeempleadoccion/tipoEmpleadoAccion.php" method="Post" align="center" id="mostrar">';
        echo'<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Tipo</th><th>Salario</th><th>Descripcion</th><th>Hora Extra</th>';
        foreach ($allBusiness as $current) {
            echo '</tr>';
            echo '</thead>';
            echo '<tr>';
            echo '<th >' . $current['tipoempleado'] . '</th>';
            echo '<th>' . $current['tipoempleadosalariobase'] . '</th>';
            echo '<th>' . $current['tipoempleadodescripcion'] . '</th>';
            echo '<th>' . $current['tipoempleadohoraextra'] . '</th>';
            echo '</tr>';
        }
        echo '</table>';

        echo '</form>';

        echo '<h2 align="center">Buscar Tipo de Empleado</h2>';
        echo '<form method="post" action="TipoEmpleadoView.php" align="center" >';
        echo '<input type="text" name="tipoempleado" id="tipoempleado" placeholder="ID/Nombre"/>';
        echo '<tr>';

        echo '<td><input type="submit" value="Buscar" name="buscar" id="buscar"/></td>';
        echo '</tr>';
        echo '</form>';

        if ($_POST) {
            $tipoempleado = $_POST['tipoempleado'];
            if (isset($tipoempleado)) {
                $buscarBusiness = $tipoEmpleadoBusiness->buscarTipoEmpleado($tipoempleado);
                foreach ($buscarBusiness as $current) {
                    echo '<form  action="../../business/tipodeempleadoaccion/tipoEmpleadoAccion.php" method="Post" align="center"  >';
                    echo '<input type="text" name="tipoempleado" id="tipoempleado" value="' . $current['tipoempleado'] . '" readonly />';
                    echo '<input type="text" name="tipoempleadosalariobase" id="tipoempleadosalariobase" size="4" value="' . $current['tipoempleadosalariobase'] . '"/>';
                    echo '<input type="text" name="tipoempleadodescripcion" id="tipoempleadodescripcion" size="15" value="' . $current['tipoempleadodescripcion'] . '"/>';
                    echo '<input type="text" name="tipoempleadohoraextra" id="tipoempleadohoraextra"  size="4" value="' . $current['tipoempleadohoraextra'] . '"/>';
                    echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                    echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                    echo '</tr>';
                    echo '</form>';
                }
            }
        }
        ?>
    </div>

    <p> <a href="../../index.php">Regresar</a> </p>

<tr>
    <td></td>
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
</table>
<footer>
</footer>
</body>

</html>




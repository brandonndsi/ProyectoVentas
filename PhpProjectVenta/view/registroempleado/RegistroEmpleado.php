<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../../css/imagen/style.css">
    <?php
    include '../../business/empleadobusiness/empleadoBusiness.php';
    ?>
</head>
<body>
    <div class="nuevo"> 
        <p align="center">

        <form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post" align="center" >
            <strong>
                <h2 align="center">
                    Formulario para insertar a los empleados.
                </h2>  
            </strong>
            <p> <table width="50%" border="0" align="center">
                <thead>
                    <tr>
                        <th class="primerfila" >Nombre</th>
                        <th class="primerfila" >Apellido1</th>
                        <th class="primerfila" >Apellido2</th>
                        <th class="primerfila" >Cedula</th>
                        <th class="primerfila" >Telefono</th>
                        <th class="primerfila" >Correo</th>
                        <th class="primerfila" >Contrasena</th>
                        <th class="primerfila" >Tipo</th>
                        <th class="primerfila" >Edad</th>
                        <th class="primerfila" >Sexo</th>
                        <th class="primerfila" >Esta Civil</th>
                        <th class="primerfila" >Cuenta Bancaria</th>
                        <th class="primerfila" >Zona ID</th>
                        <th class="primerfila" >Tipo de Licencia</th>
                        <th class="primerfila" >Vigencia</th>
                        <th class="primerfila" >Marca de Vehiculo</th>
                        <th class="primerfila" >Placa de Vehiculo</th>                        
                        <th class="primerfila" >Modelo de Vehiculo</th>

                    </tr>
                </thead>           

                <tr>
                    <td><input type="text" name="personanombre" size="10" class="personanombre" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="personaapellido1" size="10" class="personaapellido1" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="personaapellido2" size="10" class="personaapellido2" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="empleadocedula" size="10" class="empleadocedula" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="personatelefono" size="10" class="personatelefono" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="personacorreo" size="10" class="personacorreo" placeholder="Solo @ correo"/> </td>
                    <td><input type="text" name="empleadocontrasenia" size="10" class="empleadocontrasenia" placeholder="Letras y numeros"/> </td>
                    <td><input type="text" name="tipoempleado" size="10" class="tipoempleado" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="empleadoedad" size="10" class="empleadoedad" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="empleadosexo" size="10" class="empleadosexo" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="empleadoestadocivil" size="10" class="empleadoestadocivil" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="empleadocuentabancaria" size="10" class="empleadocuentabancaria" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="zonaid" size="10" class="zonaid" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="empleadotipolicencia" size="10" class="empleadotipolicencia" placeholder="A1,B2,etc"/> </td>
                    <td><input type="text" name="empleadolicenciavigencia" size="10" class="empleadolicenciavigencia" placeholder="Fecha"/> </td>
                    <td><input type="text" name="vehiculomarca" size="10" class="vehiculomarca" placeholder="Toyota, Fredom"/> </td>
                    <td><input type="text" name="vehiculoplaca" size="10" class="vehiculoplaca" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="vehiculomodelo" size="10" class="vehiculomodelo" placeholder="Fecha"/> </td>
                    <th class="bot"> <td><input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></th>
                </tr> 

            </table>
            <p>&nbsp;</p> 
        </form>
    </div>
    <?php
    $empleadoBusiness = new empleadoBusiness();
    $allBusiness = $empleadoBusiness->mostrarEmpleados();
    echo '<h2 align="center">Lista de Empleados</h2>';

    echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post" align="center" id="mostrar">';
    echo'<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th><th>Nombre</th><th>Apellido1</th>
        <th>Apellido2</th><th>Cedula</th><th>Telefono</th>
        <th>Correo</th><th>Contraseña</th>
        <th>Tipo</th><th>Edad</th>
        <th>Sexo</th><th>Estado Civil</th>
        <th>Cuenta Bancaria</th><th>ID Direccion</th>
        <th>Tipo de Licencia</th><th>empleadolicenciavigencia</th><th>Marca del Vehiculo</th>
        <th>Placa del Vehiculo</th><th>Modelo del Vehiculo</th>';
    foreach ($allBusiness as $current) {
        echo '</tr>';
        echo '</thead>';
        echo '<tr>';
        echo '<th>' . $current['personaid'] . '</th>';
        echo '<th>' . $current['personanombre'] . '</th>';
        echo '<th>' . $current['personaapellido1'] . '</th>';
        echo '<th>' . $current['personaapellido2'] . '</th>';
        echo '<th>' . $current['empleadocedula'] . '</th>';
        echo '<th>' . $current['personatelefono'] . '</th>';
        echo '<th>' . $current['personacorreo'] . '</th>';
        echo '<th>' . $current['empleadocontrasenia'] . '</th>';
        echo '<th>' . $current['tipoempleado'] . '</th>';
        echo '<th>' . $current['empleadoedad'] . '</th>';
        echo '<th>' . $current['empleadosexo'] . '</th>';
        echo '<th>' . $current['empleadoestadocivil'] . '</th>';
        echo '<th>' . $current['empleadocuentabancaria'] . '</th>';
        echo '<th>' . $current['zonanombre'] . '</th>';
        echo '<th>' . $current['empleadotipolicencia'] . '</th>';
        echo '<th>' . $current['empleadolicenciavigencia'] . '</th>';
        echo '<th>' . $current['vehiculomarca'] . '</th>';
        echo '<th>' . $current['vehiculoplaca'] . '</th>';
        echo '<th>' . $current['vehiculomodelo'] . '</th>';
        echo '</tr>';
    }
    echo '</table>';

    echo '</form>';

    echo '<h2 align="center">Buscar Empleado</h2>';
    echo '<form method="post" action="RegistroEmpleado.php" align="center" >';
    echo '<input type="text" name="empleadoid" id="empleadoid" placeholder="ID/Nombre"/>';
    echo '<tr>';

    echo '<td><input type="submit" value="Buscar" name="buscar" id="buscar"/></td>';
    echo '</tr>';
    echo '</form>';

    if ($_POST) {
        $empleadoid = $_POST['empleadoid'];
        if (isset($empleadoid)) {
            $buscarBusiness = $empleadoBusiness->buscarEmpleado($empleadoid);
            foreach ($buscarBusiness as $current) {

                echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post" align="center" >';
                echo '<p> ID: <input type="text" name="personaid" id="personaid" value="' . $current['personaid'] . '"  readonly /></p>';
                echo '<p> Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/></p>';
                echo '<p> Apellido1: <input type="text" name="personaapellido1" id="personaApellido1" value="' . $current['personaapellido1'] . '"/></p>';
                echo '<p> Apellido2: <input type="text" name="personaapellido2" id="personaApellido2" value="' . $current['personaapellido2'] . '"/></p>';
                echo '<p> Cedula: <input type="text" name="empleadocedula" id="empleadocedula" value="' . $current['empleadocedula'] . '"/></p>';
                echo '<p> Telefono: <input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/></p>';
                echo '<p> Correo: <input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/></p>';
                echo '<p> Contrasena: <input type="text" name="empleadocontrasenia" id="empleadocontrasenia" value="' . $current['empleadocontrasenia'] . '"/></p>';
                echo '<p> Tipo: <input type="text" name="tipoempleado" id="tipoempleado" value="' . $current['tipoempleado'] . '" /></p>';
                echo '<p> Edad: <input type="text" name="empleadoedad" id="empleadoedad" value="' . $current['empleadoedad'] . '"/></p>';
                echo '<p> Sexo: <input type="text" name="empleadosexo" id="empleadosexo" value="' . $current['empleadosexo'] . '"/></p>';
                echo '<p> Estado Civil: <input type="text" name="empleadoestadocivil" id="empleadoestadocivil" value="' . $current['empleadoestadocivil'] . '"/></p>';
                echo '<p> Cuenta Bancaria: <input type="text" name="empleadocuentabancaria" id="empleadocuentabancaria" value="' . $current['empleadocuentabancaria'] . '"/></p>';
                echo '<p> Direccion: <input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/></p>';
                echo '<p> Tipo de Licencia: <input type="text" name="empleadotipolicencia" id="empleadotipolicencia" value="' . $current['empleadotipolicencia'] . '"/></p>';
                echo '<p> Vigencia de Licencia: <input type="text" name="empleadolicenciavigencia" id="empleadolicenciavigencia" value="' . $current['empleadolicenciavigencia'] . '"/></p>';
                echo '<p> Marca: <input type="text" name="vehiculomarca" id="vehiculomarca" value="' . $current['vehiculomarca'] . '"/></p>';
                echo '<p> Placa: <input type="text" name="vehiculoplaca" id="vehiculoplaca" value="' . $current['vehiculoplaca'] . '"/></p>';
                echo '<p> Modelo: <input type="text" name="vehiculomodelo" id="vehiculomodelo" value="' . $current['vehiculomodelo'] . '"/></p>';
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

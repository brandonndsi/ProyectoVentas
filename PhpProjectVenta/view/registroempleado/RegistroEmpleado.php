<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    include '../../business/empleadobusiness/empleadoBusiness.php';
    ?>
</head>
<body>
    <div class="nuevo"> 
        <p>

        <form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post">
            <strong>
                <h2>
                    Formulario para insertar a los empleados.
                </h2>  
            </strong>
            <p> <table border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido1</th>
                        <th>Apellido2</th>
                        <th>Cedula</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Contrasena</th>
                        <th>Tipo</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Esta Civil</th>
                        <th>Cuenta Bancaria</th>
                        <th>Zona ID</th>
                        <th>Tipo de Licencia</th>
                        <th>Vigencia</th>
                        <th>Marca de Vehiculo</th>
                        <th>Placa de Vehiculo</th>                        
                        <th class="primerfila" >Modelo de Vehiculo</th>

                    </tr>
                </thead>           

                <tr>
                    <th><input type="text" name="personanombre" size="10" class="personanombre" placeholder="Solo letras"/> </th>
                    <th><input type="text" name="personaapellido1" size="10" class="personaapellido1" placeholder="Solo letras"/> </th>
                    <th><input type="text" name="personaapellido2" size="10" class="personaapellido2" placeholder="Solo letras"/> </th>
                    <th><input type="text" name="empleadocedula" size="10" class="empleadocedula" placeholder="Solo numeros"/> </th>
                    <th><input type="text" name="personatelefono" size="10" class="personatelefono" placeholder="Solo numeros"/> </th>
                    <th><input type="text" name="personacorreo" size="10" class="personacorreo" placeholder="Solo @ correo"/> </th>
                    <th><input type="text" name="empleadocontrasenia" size="10" class="empleadocontrasenia" placeholder="Letras y numeros"/> </th>
                    <th><input type="text" name="tipoempleado" size="10" class="tipoempleado" placeholder="Solo letras"/> </th>
                    <th><input type="text" name="empleadoedad" size="10" class="empleadoedad" placeholder="Solo numeros"/> </th>
                    <th><input type="text" name="empleadosexo" size="10" class="empleadosexo" placeholder="Solo letras"/> </th>
                    <th><input type="text" name="empleadoestadocivil" size="10" class="empleadoestadocivil" placeholder="Solo letras"/> </th>
                    <th><input type="text" name="empleadocuentabancaria" size="10" class="empleadocuentabancaria" placeholder="Solo numeros"/> </th>
                    <th><input type="text" name="zonaid" size="10" class="zonaid" placeholder="Solo numeros"/> </th>
                    <th><input type="text" name="empleadotipolicencia" size="10" class="empleadotipolicencia" placeholder="A1,B2,etc"/> </th>
                    <th><input type="text" name="empleadolicenciavigencia" size="10" class="empleadolicenciavigencia" placeholder="Fecha"/> </th>
                    <th><input type="text" name="vehiculomarca" size="10" class="vehiculomarca" placeholder="Toyota, Fredom"/> </th>
                    <th><input type="text" name="vehiculoplaca" size="10" class="vehiculoplaca" placeholder="Solo numeros"/> </th>
                    <th><input type="text" name="vehiculomodelo" size="10" class="vehiculomodelo" placeholder="Fecha"/> </th>
                    <th class="bot"><input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></th>
                </tr> 

            </table>
        </form>
    </div>
    <?php
    $empleadoBusiness = new empleadoBusiness();
    $allBusiness = $empleadoBusiness->mostrarEmpleados();
    echo '<h2>Lista de Empleados</h2>';

    echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post" id="mostrar">';
    echo'<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th></th><th>Cedula</th><th>Nombre</th><th>Apellido1</th>
        <th>Apellido2</th>';
    foreach ($allBusiness as $current) {
        echo '</tr>';
        echo '</thead>';
        echo '<tr>';
        echo '<th><input type="hidden" value="'. $current['personaid'].'" name="personaid" id="personaid"></th>';
        echo '<th><input type="text" value="' . $current['empleadocedula'] . '" name="empleadocedula" id="empleadocedula"</th>';
        echo '<th><input type="text" value="' . $current['personanombre'] . '" name="personanombre" id="personanombre"</th>';
        echo '<th><input type="text" value="' . $current['personaapellido1'] . '" name="personaapellido1" id="personaapellido1"</th>';
        echo '<th><input type="text" value="' . $current['personaapellido2'] . '" name="personaapellido2" id="personaapellido2"</th>';
        
        echo '</tr>';
    }
    echo '</table>';

    echo '</form>';

    echo '<h2>Buscar Empleado</h2>';
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

                echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post">';
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


</body>
</html>

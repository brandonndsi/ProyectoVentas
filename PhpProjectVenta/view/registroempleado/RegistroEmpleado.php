<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

    <!--JS-->  
    <script src="../../js/registroEmpleado.js"></script>

    <?php
    include '../../business/empleadobusiness/empleadoBusiness.php';
    include '../../business/empleadoaccion/empleadoAccion.php';
    ?>
</head>
<body>
    <?php
    $empleadoBusiness = new empleadoBusiness();
    $allBusiness = $empleadoBusiness->mostrarEmpleados();
    ?>
    <h1>
        Empleados
        <a href="?action=registrar" class="btn btn-primary" >Nuevo Empleado</a>
        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a>
    </h1> 

    <form  action="RegistroEmpleado.php" method="Post">

        <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido1</th>
                    <th>Apellido2</th>
                </tr>
            </thead>           
            <?php foreach ($allBusiness as $current): ?> 
                <tr><td></td>
                    <td><input type="hidden" name="empleadoid" id="empleadoid" value="<?php echo $current['empleadoid']; ?>"/></td>
                    <td><input type="text" name="empleadocedula" class="empleadocedula" value="<?php echo $current['empleadocedula']; ?>" readonly /> </td>
                    <td><input type="text" name="personanombre" class="personanombre" value="<?php echo $current['personanombre']; ?>" readonly /> </td>
                    <td><input type="text" name="personaapellido1" class="personaapellido1" value="<?php echo $current['personaapellido1']; ?>" readonly /> </td>
                    <td><input type="text" name="personaapellido2" class="personaapellido2" value="<?php echo $current['personaapellido2']; ?>" readonly /> </td>

                    <td><a href="?action=editar&id=<?php echo $current['empleadoid']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['empleadoid']; ?> " class="btn btn-info">ver mas</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['empleadoid']; ?> " class="btn btn-danger">Eliminar</a></td>

                </tr> 
            <?php endforeach ?>
        </table>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {

        switch ($_REQUEST['action']) {

            case 'ver':
                $Obtenida = $empleadoBusiness->buscarEmpleado($_REQUEST['id']);
                foreach ($Obtenida as $current) {
                    echo '<form  action="RegistroEmpleado.php" method="Post">';
                    echo '<h2>Datos de Empleado.</h2>';
                    echo '<td><input type="hidden" name="empleadoid" value="' . $current['empleadoid'] . '"></td>';
                    echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '" readonly /></p>';
                    echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1" value="' . $current['personaapellido1'] . '" readonly /></p>';
                    echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2" value="' . $current['personaapellido2'] . '" readonly /></p>';
                    echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono"  value="' . $current['personatelefono'] . '" readonly /></p>';
                    echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo"  value="' . $current['personacorreo'] . '" readonly /></p>';
                    echo '<p>Fecha de Ingreso: <input type="date" name="empleadofechaingreso" id="empleadofechaingreso""  value="' . $current['empleadofechaingreso'] . '"  readonly /></p>';
                    echo '<p>Banco: <input type="text" name="empleadobanco" id="empleadobanco""  value="' . $current['empleadobanco'] . '"  readonly /></p>';
                    echo '<p>Cuenta Bancaria: <input type="text" name="empleadocuentabancaria" id="empleadocuentabancaria""  value="' . $current['empleadocuentabancaria'] . '" readonly /></p>';
                    echo '<p>Estado Civil: <input type="text" name="empleadoestadocivil" id="empleadoestadocivil""  value="' . $current['empleadoestadocivil'] . '"  readonly /></p>';
                    echo '<p>Edad: <input type="text" name="empleadoedad" id="empleadoedad""  value="' . $current['empleadoedad'] . '"  readonly /></p>';
                    echo '<p>Sexo: <input type="text" name="empleadosexo" id="empleadosexo""  value="' . $current['empleadosexo'] . '"  readonly /></p>';
                    echo '<p>Tipo de Licencia: <input type="text" name="empleadotipolicencia" id="empleadotipolicencia""  value="' . $current['empleadotipolicencia'] . '"  readonly /></p>';
                    echo '<p>Licencia Vigencia: <input type="text" name="empleadolicenciavigencia" id="empleadolicenciavigencia""  value="' . $current['empleadolicenciavigencia'] . '"  readonly /></p>';
                    echo '<p>Pertene a la Zona: <input type="text" name="zonanombre" id="zonanombre""  value="' . $current['zonanombre'] . '"  readonly /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post">';
                echo '<h2>Nuevo Empleado</h2>';
                echo '<p>Nombre Completo: <input type="text" name="personanombre" id="personanombre" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono" required pattern="[0-9]{8}"/></p>';
                echo '<p>Correo: <input type="email" name="personacorreo" id="personacorreo" placeholder="empleado@express.com pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required/></p>';
                echo '<p>Fecha de Ingreso: <input type="date" name="empleadofechaingreso" step="1" min="2017-01-01" max="2050-12-31" value="000-00-00"> </p>';
                echo '<p>Banco: <select name = "combobanco"> required</p>';
                echo '<option ></option>';
                echo '<option value = "Nacional">Nacional</option>';
                echo '<option value = "CostaRica">Costa Rica</option>';
                echo '<option value = "Popular">Popular</option>';
                echo '<option value = "Citibank">Citibank</option>';
                echo '<option value = "Bac">Bac San José</option>';
                echo '<option value = "Bancrédito">Bancrédito</option>';
                echo '<option value = "Scotia">Scotia Bank</option>';
                echo '<option value = "BCT">BCT</option>';
                echo '<option value = "Davivienda">Davivienda</option>';
                echo '<option value = "Proamerica">Banca Proamerica</option>';
                echo '<option value = "LAFISE">LAFISE</option>';
                echo '<option value = "Cathay">Cathay</option>';
                echo '<option value = "Desyfin">Desyfin</option>';
                echo '  </select>';
                echo '<p> Numero de Cuenta Bancaria: <input type="text" name="empleadocuentabancaria" id="empleadocuentabancaria" required pattern="[0-9]{17,24}"/></p>';
                echo '<p>Estado Civil: <select name = "comboestadocivil"> </p>';
                echo '<option value = "Soltero">Soltero/a</option>';
                echo '<option value = "Casado">Casado/a</option>';
                echo '<option value = "Viudo">Viudo/a</option>';
                echo '<option value = "Divorciado">Divorciado/a</option>';
                echo '<option value = "UnionLibre">Union Libre</option>';
                echo '  </select>';
                echo '<p>Edad: <input type="number" name="empleadoedad" id="empleadoedad" min="18" max="80" pattern="[1-9]{2,3}" required/></p>';
                echo '<p>Sexo: <select name = "combosexo"> required</p>';
                echo '<option value = "Masculino">M</option>';
                echo '<option value = "Femenino">F</option>';
                echo '<option value = "Otro">Otro</option>';
                echo '  </select>';
                echo '<p>Estado De Empleado :<input type = "checkbox" checked = "checked" id = "activo" onchange = "cambiarCheckActivo()" value = "">activo '
                . '<input type = "checkbox" id = "inactivo" onchange = "cambiarCheckInactivo()" value = "">Inactivo </p>';
                echo '<p>Tipo de Licencia: <select name = "combotipolicencia"> required</p>';
                echo '<option </option>';
                echo '<option value = "A1">A1</option>';
                echo '<option value = "A2">A2</option>';
                echo '<option value = "A3">A3</option>';
                echo '<option value = "B1">B1</option>';
                echo '<option value = "B2">B2</option>';
                echo '<option value = "B3">B3</option>';
                echo '<option value = "B4">B4</option>';
                echo '<option value = "C1">C1</option>';
                echo '<option value = "C2">C2</option>';
                echo '<option value = "D1">D1</option>';
                echo '<option value = "D2">D2</option>';
                echo '<option value = "D3">D3</option>';
                echo '<option value = "E1">E1</option>';
                echo '<option value = "E2">E2</option>';
                echo '  </select>';
                echo '<p>Licencia Vigencia: <input type="date" name="Vigencia" step="1" min="2017-01-01" max="2050-12-31" value="0000-00-00"></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="nuevo" id="nuevo"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $empleadoBusiness->eliminarEmpleado($_REQUEST['id']);

                header('Location: RegistroEmpleado.php');

                break;

            case 'editar':

                $CObtenida = $empleadoBusiness->buscarEmpleado($_REQUEST['id']);
                foreach ($CObtenida as $current) {
                    echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post">';
                    echo '<h2>Editar Empleado</h2>';
                    echo '<td><input type="hidden" name="empleadoid" value="' . $current['empleadoid'] . '"></td>';
                    echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" /></p>';
                    echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1" value="' . $current['personaapellido1'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" /></p>';
                    echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2" value="' . $current['personaapellido2'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" /></p>';
                    echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono"  value="' . $current['personatelefono'] . '"  pattern="[0-9]{8}" /></p>';
                    echo '<p>Correo: <input type="email" name="personacorreo" id="personacorreo"  value="' . $current['personacorreo'] . '" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" /></p>';
                    echo '<p>Fecha en la que ingreso: <input type="date" name="empleadofechaingreso" id="empleadofechaingreso"" step="1" min="2017-01-01" max="2080-12-31" value="' . $current['empleadofechaingreso'] . '" /></p>';
                    echo '<p>Banco: <input type="text" name="empleadobanco" id="empleadobanco""  value="' . $current['empleadobanco'] . '" /></p>';
                    echo '<p>Cuenta Bancaria: <input type="text" name="empleadocuentabancaria" id="empleadocuentabancaria""  value="' . $current['empleadocuentabancaria'] . '" pattern="[0-9]{17,24}" /></p>';
                    echo '<p>Estado Civil: <input type="text" name="empleadoestadocivil" id="empleadoestadocivil""  value="' . $current['empleadoestadocivil'] . '"  /></p>';
                    echo '<p>Edad: <input type="number" name="empleadoedad" id="empleadoedad""  value="' . $current['empleadoedad'] . '"   min="18" max="80" pattern="[1-9]{2,3}" /></p>';
                    echo '<p>Sexo: <input type="text" name="empleadosexo" id="empleadosexo""  value="' . $current['empleadosexo'] . '"  /></p>';
                    echo '<p>Tipo de Licencia: <input type="text" name="empleadotipolicencia" id="empleadotipolicencia""  value="' . $current['empleadotipolicencia'] . '"  /></p>';
                    echo '<p>Licencia Vigencia: <input type="date" name="empleadolicenciavigencia" id="empleadolicenciavigencia"" step="1" min="2017-01-01" max="2050-12-31" value="' . $current['empleadolicenciavigencia'] . '" /></p>';
                    echo '<p>Zona Nombre: <input type="text" name="zonanombre" id="zonanombre""  value="' . $current['zonanombre'] . '" /></p>';
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

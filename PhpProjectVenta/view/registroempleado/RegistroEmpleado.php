<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

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
                <h2>
                    Empleados.
                </h2> 

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
                    <td><input type="text" name="empleadocedula" class="empleadocedula" value="<?php echo $current['empleadocedula']; ?>"/> </td>
                    <td><input type="text" name="personanombre" class="personanombre" value="<?php echo $current['personanombre']; ?>"/> </td>
                    <td><input type="text" name="personaapellido1" class="personaapellido1" value="<?php echo $current['personaapellido1']; ?>"/> </td>
                    <td><input type="text" name="personaapellido2" class="personaapellido2" value="<?php echo $current['personaapellido2']; ?>"/> </td>
                    <td><a href="?action=editar&id=<?php echo $current['empleadoid']; ?> ">Modificar</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['empleadoid']; ?> ">Eliminar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['empleadoid']; ?> ">ver</a></td>
                    
                </tr> 
                 <?php endforeach ?>
            </table>
            <a href="?action=registrar">Nuevo Empleado.</a>
        </form>

        <?php
        if(isset($_REQUEST['action'])){

        switch($_REQUEST['action']){

        case 'ver':
             $Obtenida= $empleadoBusiness->buscarEmpleado($_REQUEST['id']);
            foreach ($Obtenida as $current) {
        echo '<form  action="RegistroEmpleado.php" method="Post">';
        echo '<h2>Datos de Empleado.</h2>';
        echo '<td><input type="hidden" name="empleadoid" value="' . $current['empleadoid'] . '"></td>';
        echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre" 
        value="' . $current['personanombre'] . '" readonly /></p>';
        echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1" 
         value="' . $current['personaapellido1'] . '" readonly /></p>';
        echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2" 
         value="' . $current['personaapellido2'] . '" readonly /></p>';
        echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono
        "  value="' . $current['personatelefono'] . '" readonly /></p>';
        echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo
        "  value="' . $current['personacorreo'] . '" readonly /></p>';
        echo '<p>Cuenta Bancaria: <input type="text" name="empleadocuentabancaria" id="empleadocuentabancaria"
        "  value="' . $current['empleadocuentabancaria'] . '" readonly /></p>';
         echo '<p>Estado Civil: <input type="text" name="empleadoestadocivil" id="empleadoestadocivil"
        "  value="' . $current['empleadoestadocivil'] . '"  readonly /></p>';
         echo '<p>Edad: <input type="text" name="empleadoedad" id="empleadoedad"
        "  value="' . $current['empleadoedad'] . '"  readonly /></p>';
        echo '<p>Sexo: <input type="text" name="empleadosexo" id="empleadosexo"
        "  value="' . $current['empleadosexo'] . '"  readonly /></p>';
        echo '<p>Tipo de Licencia: <input type="text" name="empleadotipolicencia" id="empleadotipolicencia"
        "  value="' . $current['empleadotipolicencia'] . '"  readonly /></p>';
        echo '<p>Licencia Vigencia: <input type="text" name="empleadolicenciavigencia" id="empleadolicenciavigencia"
        "  value="' . $current['empleadolicenciavigencia'] . '"  readonly /></p>';
        echo '<p>Zona Nombre: <input type="text" name="zonanombre" id="zonanombre"
        "  value="' . $current['zonanombre'] . '"  readonly /></p>';
        echo '<p>Accion: <input type="submit" value="cerrar" name="cerrar" id="cerrar"/></p>';
        echo '</form>';
            }
            break;

        case 'registrar':

        echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post">';
        echo '<h2>Nueva Empleado</h2>';
        echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre"/></p>';
        echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1"/></p>';
        echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2"/></p>';
        echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono"/></p>';
        echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo"/></p>';
        echo '<p>Cuenta Bancaria: <input type="text" name="empleadocuentabancaria" id="empleadocuentabancaria"/></p>';
        echo '<p>Estado Civil: <input type="text" name="empleadoestadocivil" id="empleadoestadocivil"/></p>';
        echo '<p>Edad: <input type="text" name="empleadoedad" id="empleadoedad"/></p>';
        echo '<p>Sexo: <input type="text" name="empleadosexo" id="empleadosexo"/></p>';
        echo '<p>Tipo de Licencia: <input type="text" name="empleadotipolicencia" id="empleadotipolicencia"/></p>';
        echo '<p>Licencia Vigencia: <input type="text" name="empleadolicenciavigencia" id="empleadolicenciavigencia"/></p>';
        echo '<p>Zona Nombre: <input type="text" name="zonanombre" id="zonanombre"/></p>';
        echo '<p>Accion: <input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></p>';
        echo '</form>';
            break;

        case 'eliminar':

            $empleadoBusiness->eliminarEmpleado($_REQUEST['id']);

            header('Location: RegistroEmpleado.php');

            break;

        case 'editar':

            $CObtenida= $empleadoBusiness->buscarEmpleado($_REQUEST['id']);
            foreach ($CObtenida as $current) {
        echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post">';
        echo '<h2>Editar Empleado</h2>';
        echo '<td><input type="hidden" name="empleadoid" value="' . $current['empleadoid'] . '"></td>';
        echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre" 
        value="' . $current['personanombre'] . '" /></p>';
        echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1" 
         value="' . $current['personaapellido1'] . '" /></p>';
        echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2" 
         value="' . $current['personaapellido2'] . '" /></p>';
        echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono
        "  value="' . $current['personatelefono'] . '" /></p>';
        echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo
        "  value="' . $current['personacorreo'] . '" /></p>';
        echo '<p>Cuenta Bancaria: <input type="text" name="empleadocuentabancaria" id="empleadocuentabancaria"
        "  value="' . $current['empleadocuentabancaria'] . '" /></p>';
         echo '<p>Estado Civil: <input type="text" name="empleadoestadocivil" id="empleadoestadocivil"
        "  value="' . $current['empleadoestadocivil'] . '"  /></p>';
         echo '<p>Edad: <input type="text" name="empleadoedad" id="empleadoedad"
        "  value="' . $current['empleadoedad'] . '"  /></p>';
        echo '<p>Sexo: <input type="text" name="empleadosexo" id="empleadosexo"
        "  value="' . $current['empleadosexo'] . '"  /></p>';
        echo '<p>Tipo de Licencia: <input type="text" name="empleadotipolicencia" id="empleadotipolicencia"
        "  value="' . $current['empleadotipolicencia'] . '"  /></p>';
        echo '<p>Licencia Vigencia: <input type="text" name="empleadolicenciavigencia" id="empleadolicenciavigencia"
        "  value="' . $current['empleadolicenciavigencia'] . '" /></p>';
        echo '<p>Zona Nombre: <input type="text" name="zonanombre" id="zonanombre"
        "  value="' . $current['zonanombre'] . '" /></p>';
        echo '<p>Accion: <input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></p>';
        echo '</form>';
            }
            break;
    }
}
        ?>
   
<a href="../../index.php">Regresar</a>
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

<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/empleadobusiness/empleadoBusiness.php';
    ?>
</head>

<body >
    <p align="center">
    <form name="form" action="../business/clienteAccion.php" method="Post">
        <strong>
            <h2>
                Formulario nuevo Empleado.
            </h2>  
        </strong>

        <p> ID: <input type="text" name="empleadoid" size="45" placeholder=" 8888"/>
        </p>         
        <p> Nombre: <input type="text" name="personanombre" size="45" required placeholder="Pedro"/>
        </p>
        <p> Primer Apellido: <input type="text" name="personaapellido1" size="45" required placeholder="Rojas"/>
        </p>
        <p> Segundo Apellido: <input type="text" name="personaapellido2" size="45" placeholder="Rojas"/>
        </p>
        <p> Numero Cedula: <input type="text" name="empleadocedula" size="45" placeholder="sin guiones, ni espacios"/>
        </p>
        <p> Tipo Empleado: <input type="text" name="tipoempleado" size="45" required placeholder="Cajero, Chofer, Cocinas"/>
        </p>
        <p> Contraseña de Sistema: <input type="text" name="empleadocontrasenia" size="45" required placeholder="Password"/>
        </p>
        <p> Edad: <input type="text" name="empleadoedad" size="45" required placeholder="años cumplidos" />
        </p>
        <p> Numero de Telefono: <input type="text" name="personatelefono" size="45" required placeholder="sin guiones, ni espacios" />
        </p>
        <p> Corrreo Electronico: <input type="email" name="personacorreo" size="45" required placeholder="PedroRojas@espress.com"/>
        </p>
        <p>Sexo: <input type="radio" name="empleadosexo" value="hombre" checked="checked" /> Hombre
            <input type="radio" name="empleadosexo" value="mujer" /> Mujer
        </p>
        <p> Estado civil: <input type="text" name="empleadoestadocivil" size="45" placeholder="Soltero, casado, viudo, union libre, divorsiado"/>
        </p>
        <p> Numero de cuenta Bancaria: <input type="text" name="empleadocuentabancaria" size="45" required placeholder="sin guiones, ni espacios"/>
        </p>
        <p> ID Direccion: <input type="text" name="zonaid" size="45" required placeholder="consecutivo"/>
        </p>        
        <p> Tipo de liciencia de conducir: <input type="text" name="empleadolicenciaid" size="45" required placeholder="A1, A2, B1"/>
        </p>
        <p> Vigencia Licencia: <input type="text" name="empleadolicenciavigencia" size="45" required placeholder="12-06-2018"/>
        </p>
        <p> vehiculo Id: <input type="text" name="vehiculoid" size="45" required placeholder="Placa vehiculo asignado"/>
        </p>
        <br>

        <input name="create" type="submit" value="Registrar">
        <?php
        ?>
    </form>
    
    <?php
    
        $empleadoBusiness = new empleadoBusiness();
        $allBusiness = $empleadoBusiness->mostrarEmpleados();
        echo '<h2 align="center">Lista de Empleados</h2>';
        foreach ($allBusiness as $current) {
            echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post" align="center" >';
            echo '<input type="text" name="empleadoid" id="empleadoid" value="' . $current['empleadoid'] . '"/>';
            echo '<input type="text" name="clienteid" id="clienteid" value="' . $current['clienteid'] . '"/>';
            echo '<input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/>';
            echo '<input type="text" name="personaapellido1" id="personaapellido1" value="' . $current['personaapellido1'] . '"/>';
            echo '<input type="text" name="personaapellido2" id="personaapellido2" value="' . $current['personaapellido2'] . '"/>';
            echo '<input type="text" name="empladocedula" id="empladocedula" value="' . $current['empladocedula'] . '"/>';
            echo '<input type="text" name="tipoempleado" id="tipoempleado" value="' . $current['tipoempleado'] . '"/>';
            echo '<input type="text" name="empleadocontrasenia" id="empleadocontrasenia" value="' . $current['empleadocontrasenia'] . '"/>';
            echo '<input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/>';
            echo '<input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/>';
            echo '<input type="text" name="empleadosexo" id="empleadosexo" value="' . $current['empleadosexo'] . '"/>';
            echo '<input type="text" name="empleadoestadocivil" id="empleadoestadocivil" value="' . $current['empleadoestadocivil'] . '"/>';
            echo '<input type="text" name="empleadocuentabancaria" id="empleadocuentabancaria" value="' . $current['empleadocuentabancaria'] . '"/>';
            echo '<input type="text" name="zonaid" id="zonaid" value="' . $current['zonaid'] . '"/>';
            echo '<input type="text" name="empleadolicenciaid" id="empleadolicenciaid" value="' . $current['empleadolicenciaid'] . '"/>';
            echo '<input type="text" name="empleadolicenciavigencia" id="empleadolicenciavigencia" value="' . $current['empleadolicenciavigencia'] . '"/>';
            echo '<input type="text" name="vehiculoid" id="vehiculoid" value="' . $current['vehiculoid'] . '"/>';

            echo '<br>';
            echo '<br>';
            echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
            echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
            echo '</tr>';
            echo '</form>';
        }
        echo '<h2 align="center">Buscar Empleado</h2>';
        echo '<form method="post" action="RegistroEmpleado.php" align="center" >';
        echo '<input type="text" name="empleadocedula" id="empleadocedula" placeholder="numero cedula"/>';
        echo '<tr>';

        echo '<td><input type="submit" value="Buscar" name="buscar" id="buscar"/></td>';
        echo '</tr>';
        echo '</form>';

        if ($_POST) {
            $empleadocedula = $_POST['empleadocedula'];
            if (isset($empleadocedula)) {
                $buscarBusiness = $empleadoBusiness->buscarempleado($empleadocedula);
                foreach ($buscarBusiness as $current) {
                    echo '<form  action="../../business/empleadoaccion/empleadoAccion.php" method="Post" align="center" >';
                    echo '<input type="text" name="empleadoid" id="empleadoid" value="' . $current['empleadoid'] . '"/>';
                    echo '<input type="text" name="clienteid" id="clienteid" value="' . $current['clienteid'] . '"/>';
                    echo '<input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/>';
                    echo '<input type="text" name="personaapellido1" id="personaapellido1" value="' . $current['personaapellido1'] . '"/>';
                    echo '<input type="text" name="personaapellido2" id="personaapellido2" value="' . $current['personaapellido2'] . '"/>';
                    echo '<input type="text" name="empladocedula" id="empladocedula" value="' . $current['empladocedula'] . '"/>';
                    echo '<input type="text" name="tipoempleado" id="tipoempleado" value="' . $current['tipoempleado'] . '"/>';
                    echo '<input type="text" name="empleadocontrasenia" id="empleadocontrasenia" value="' . $current['empleadocontrasenia'] . '"/>';
                    echo '<input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/>';
                    echo '<input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/>';
                    echo '<input type="text" name="empleadosexo" id="empleadosexo" value="' . $current['empleadosexo'] . '"/>';
                    echo '<input type="text" name="empleadoestadocivil" id="empleadoestadocivil" value="' . $current['empleadoestadocivil'] . '"/>';
                    echo '<input type="text" name="empleadocuentabancaria" id="empleadocuentabancaria" value="' . $current['empleadocuentabancaria'] . '"/>';
                    echo '<input type="text" name="zonaid" id="zonaid" value="' . $current['zonaid'] . '"/>';
                    echo '<input type="text" name="empleadolicenciaid" id="empleadolicenciaid" value="' . $current['empleadolicenciaid'] . '"/>';
                    echo '<input type="text" name="empleadolicenciavigencia" id="empleadolicenciavigencia" value="' . $current['empleadolicenciavigencia'] . '"/>';
                    echo '<input type="text" name="vehiculoid" id="vehiculoid" value="' . $current['vehiculoid'] . '"/>';
                    echo '</tr>';
                    echo '</form>';
                }
            }
        }
    ?>
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


<footer>
</footer>
</body>
</html>

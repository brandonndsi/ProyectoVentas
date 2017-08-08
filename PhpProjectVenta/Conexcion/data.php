<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> DATA </title>
    </head>
    <body>
        <?php
        if (!($conexion = mysql_connect('localhost', 'root', ''))) {

            exit();
        } else {

            mysql_select_db("bdproyectoventa", $conexion);

            $query = mysql_query("select * from tbempleado") or die(mysql_error());
            ?>

            <table>
                <tr>
                    <td colspan="10"> MySQL PHP SELECT QUERY </td>      
                </tr>
                <tr>
                    <td> Id </td>
                    <td> Cedula </td>
                    <td> Nombre </td>
                    <td> Apellido 1 </td>
                    <td> Apellido 2 </td>
                    <td> Telefono </td>
                    <td> Correo</td>
                    <td> Edad</td>
                    <td> Sexo</td>
                    <td> Estado Civil</td>         
                </tr>
                <?php
                while ($row = mysql_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $row["idEmpleado"]; ?></td>
                        <td><?php echo $row["cedulaEmpleado"]; ?> </td>
                        <td><?php echo $row["nombreEmpleado"]; ?></td>
                        <td><?php echo $row["apellido1Empleado"]; ?></td>
                        <td><?php echo $row["apellido2Empleado"]; ?></td>
                        <td><?php echo $row["telefonoEmpleado"]; ?></td>
                        <td><?php echo $row["correoEmpleado"]; ?></td>
                        <td><?php echo $row["edadEmpleado"]; ?></td>
                        <td><?php echo $row["sexoEmpleado"]; ?></td>
                        <td><?php echo $row["estadoEmpleado"]; ?></td>

                    </tr>

                    <?php
                }
            }
            ?>
        </table>

    </body>
</html>


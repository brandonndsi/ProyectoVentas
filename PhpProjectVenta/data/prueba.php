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

            mysql_select_db("bdexpressdjb", $conexion);
            /// funciona para distribuidor    
            $query = mysql_query("SELECT *
                FROM tbempleados e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON z.zonaid= p.zonaid
                INNER JOIN tbempleadolicencias el ON el.empleadolicenciaid= e.empleadolicenciaid
                INNER JOIN tbvehiculos v ON v.vehiculoid= el.vehiculoid
                WHERE empleadoid=1 AND empleadoestado=1;");     
            
            ?>

            <table>
                <tr>
                    <td colspan="10"> PRUEBA DE SELECIONAR EL DISTRIBUIDOR</td>      
                </tr>
                <tr>
                    <td> Id </td>
                    <td> Nombre </td>
                    <td> Apellido1 </td>
                    <td> Apellido2 </td>
                    <td> Cedula </td>
                    <td> Tel </td>
                    <td> Correo </td>
                    <td> Contrasena </td>
                    <td> Tipo </td>
                    <td> Edad </td>
                    <td> Sexo </td>
                    <td> Estado Civil </td>
                    <td> Cuenta </td>
                    <td> Zona </td>
                    <td> Tipo Licencia </td>
                    <td> Vigencia </td>
                    <td> Marca </td>
                    <td> Placa </td>
                    <td> Modelo </td>
                           
                </tr>
                <?php
                while ($row = mysql_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $row["empleadoid"]; ?></td>
                        <td><?php echo $row["personanombre"]; ?></td>
                        <td><?php echo $row["personaapellido1"]; ?></td> 
                        <td><?php echo $row["personaapellido2"]; ?></td>
                        <td><?php echo $row["empleadocedula"]; ?></td> 
                        <td><?php echo $row["personatelefono"]; ?></td>
                        <td><?php echo $row["personacorreo"]; ?></td> 
                        <td><?php echo $row["empleadocontrasenia"]; ?></td>
                        <td><?php echo $row["tipoempleado"]; ?></td> 
                        <td><?php echo $row["empleadoedad"]; ?></td>
                        <td><?php echo $row["empleadosexo"]; ?></td>
                        <td><?php echo $row["empleadoestadocivil"]; ?></td>
                        <td><?php echo $row["empleadocuentabancaria"]; ?></td>
                        <td><?php echo $row["zonanombre"]; ?></td>
                        <td><?php echo $row["empleadotipolicencia"]; ?></td>
                        <td><?php echo $row["empleadolicenciavigencia"]; ?></td>
                        <td><?php echo $row["vehiculomarca"]; ?></td>
                        <td><?php echo $row["vehiculoplaca"]; ?></td>
                        <td><?php echo $row["vehiculomodelo"]; ?></td>
                        
                    </tr>

                    <?php
                }
            }
            ?>
        </table>

    </body>
</html>


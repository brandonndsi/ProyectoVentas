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
                FROM tbproveedores e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbzonas z ON z.zonaid= p.zonaid
                INNER JOIN tbmateriasprimas mp ON e.materiaprimaid= mp.materiaprimaid
                WHERE e.personaid=p.personaid AND e.proveedorestado=1;");     
            
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
                    <td> Tel </td>
                    <td> Correo </td>
                    <td> Direccion </td>
                    <td> Materia </td>

                           
                </tr>
                <?php
                while ($row = mysql_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $row["proveedorid"]; ?></td>
                        <td><?php echo $row["personanombre"]; ?></td>
                        <td><?php echo $row["personaapellido1"]; ?></td> 
                        <td><?php echo $row["personaapellido2"]; ?></td>
                        <td><?php echo $row["personatelefono"]; ?></td> 
                        <td><?php echo $row["personacorreo"]; ?></td>
                        <td><?php echo $row["zonanombre"]; ?></td> 
                        <td><?php echo $row["materiaprimanombre"]; ?></td>
                        
                    </tr>

                    <?php
                }
            }
            ?>
        </table>

    </body>
</html>


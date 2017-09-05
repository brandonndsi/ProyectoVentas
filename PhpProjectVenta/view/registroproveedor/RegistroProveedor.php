<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Proveedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/proveedorbusiness/proveedorBusiness.php';
    ?>
</head>

<body >
    <p align="center">
    <form name="form" action=".../../business/proveedoraccion/proveedorAccion.php" method="Post">
        <strong>
            <p>
                Formulario para insertar el Proveedor a la base de datos.
            <p>  
        </strong>
        <p> ID: <input type="text" name="proveedorid" size="45" placeholder="8888"/>
        </p>         
        <p> Nombre: <input type="text" name="personanombre" size="45" required placeholder="Pedro"/>
        </p>
        <p> Primer Apellido: <input type="text" name="personaapellido1" size="45" required placeholder="Rojas"/>
        </p>
        <p> Segundo Apellido: <input type="text" name="personaapellido2" size="45" placeholder="Rojas"/>
        </p>
        <p> Numero de Telefono: <input type="text" name="personatelefono" size="45" required placeholder="sin espacios ni guiones" />
        </p>
        <p> Corrreo Electronico: <input type="text" name="personacorreo" size="45" required placeholder="PedroRojas@espress.com" />
        </p>
        <p> Direccion Exacta: <input type="text" name="idzona" size="45" required placeholder="Distrito, barrio, mas señas"/>
        </p>
        <p> Tipo Materia Prima: <input type="text" name="tipomateriaprima" size="45" requiredplaceholder="Limpieza, Cocina, otro"/>
        </p>

        <br>
        <input name="create" type="submit" value="Registrar">

    </form>
    <?php
    $proveedorBusiness = new proveedorBusiness();
    $allBusiness = $proveedorBusiness->mostrarProveedor();
    echo '<h2>Lista de Proveedores</h2>';
    foreach ($allBusiness as $current) {
        echo '<form  action="../../business/proveedoraccion/proveedorAccion.php" method="Post" align="center" >';
        echo '<input type="text" name="proveedorid" id="proveedorid" value="' . $current['proveedorid'] . '"/>';
        echo '<input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/>';
        echo '<input type="text" name="personaapellido1" id="personaapellido1" value="' . $current['personaapellido1'] . '"/>';
        echo '<input type="text" name="personaapellido2" id="personaapellido2" value="' . $current['personaapellido2'] . '"/>';
        echo '<input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/>';
        echo '<input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/>';
        echo '<input type="text" name="idzona" id="idzona" value="' . $current['idzona'] . '"/>';
        echo '<input type="text" name="tipomateriaprima" id="tipomateriaprima" value="' . $current['tipomateriaprima'] . '"/>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
    }

    if ($_POST) {
        $proveedorid = $_POST['proveedorid'];
        if (isset($proveedorid)) {
            $buscarBusiness = $proveedorBusiness->buscarProveedor($proveedorid);
            foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/zonaaccion/ZonaAccion.php" method="Post" align="center" >';
                echo '<input type="text" name="proveedorid" id="proveedorid" value="' . $current['proveedorid'] . '"/>';
                echo '<input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/>';
                echo '<input type="text" name="personaapellido1" id="personaapellido1" value="' . $current['personaapellido1'] . '"/>';
                echo '<input type="text" name="personaapellido2" id="personaapellido2" value="' . $current['personaapellido2'] . '"/>';
                echo '<input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/>';
                echo '<input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/>';
                echo '<input type="text" name="idzona" id="idzona" value="' . $current['idzona'] . '"/>';
                echo '<input type="text" name="tipomateriaprima" id="tipomateriaprima" value="' . $current['tipomateriaprima'] . '"/>';
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

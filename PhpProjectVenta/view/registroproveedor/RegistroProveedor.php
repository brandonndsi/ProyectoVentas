<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Proveedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
    <?php
    include '../../business/proveedorbusiness/ProveedorBusiness.php';
    ?>

</head>
<body align="center">
    <div class="nuevo"> 
        <p align="center">

        <form  action="../../business/proveedoraccion/ProveedorAccion.php" method="Post" align="center" >
            <strong>
                <h2 align="center">
                    Formulario para insertar los proveedores a la base de datos.
                </h2>  
            </strong>
            <p> <table width="50%" border="0" align="center">
                <thead>
                    <tr>
                        <th class="primerfila" >Nombre</th>
                        <th class="primerfila" >Apellido1</th>
                        <th class="primerfila" >Apellido2</th>
                        <th class="primerfila" >Telefono</th>
                        <th class="primerfila" >Correo</th>
                        <th class="primerfila" >Zona ID</th>
                        <th class="primerfila" >Materia Prima ID</th>
                        <th class="primerfila" >Cantidad</th>
                        <th class="primerfila" >Total:</th>

                    </tr>
                </thead>           

                <tr>
                    <td><input type="text" name="personanombre" size="10" class="personanombre" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="personaapellido1" size="10" class="personaapellido1" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="personaapellido2" size="10" class="personaapellido2" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="personatelefono" size="10" class="personatelefono" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="personacorreo" size="10" class="personacorreo" placeholder="Solo @ correo"/> </td>
                    <td><input type="text" name="zonaid" size="10" class="zonaid" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="materiaprimacodigo" size="10" class="materiaprimacodigo" placeholder=" Numeros y letras"/> </td>
                    <td><input type="text" name="proveedorcantidadproducto" size="10" class="proveedorcantidadproducto" placeholder="Solo numeros"/> </td>
                    <td><input type="text" name="proveedortotalproducto" size="10" class="proveedortotalproducto" placeholder="Solo numeros"/> </td>
                    <th class="bot"> <td><input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></th>
                </tr> 

            </table>
            <p>&nbsp;</p> 
        </form>
    </div>   

    <?php
    $ProveedorBusiness = new ProveedorBusiness();
    $allBusiness = $ProveedorBusiness->mostrarProveedor();
    echo '<h2 align="center">Lista de Proveedor</h2>';

    echo '<form  action="../../business/proveedoraccion/ProveedorAccion.php" method="Post" align="center" id="mostrar">';
    echo'<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th><th>Nombre</th><th>Apellido1</th>
        <th>Apellido2</th><th>Telefono</th><th>Correo</th>
        <th>Direccion</th><th>Materia Prima</th>';
    foreach ($allBusiness as $current) {
        echo '</tr>';
        echo '</thead>';
        echo '<tr>';
        echo '<th >' . $current['proveedorid'] . '</th>';
        echo '<th >' . $current['personanombre'] . '</th>';
        echo '<th>' . $current['personaapellido1'] . '</th>';
        echo '<th>' . $current['personaapellido2'] . '</th>';
        echo '<th>' . $current['personatelefono'] . '</th>';
        echo '<th>' . $current['personacorreo'] . '</th>';
        echo '<th>' . $current['zonanombre'] . '</th>';
        echo '<th>' . $current['materiaprimanombre'] . '</th>';
        echo '</tr>';
    }
    echo '</table>';

    echo '</form>';

    echo '<h2 align="center">Buscar Proveedor</h2>';
    echo '<form method="post" action="RegistroProveedor.php" align="center" >';
    echo '<input type="text" name="proveedorid" id="proveedorid" placeholder="ID/Nombre"/>';
    echo '<tr>';

    echo '<td><input type="submit" value="Buscar" name="buscar" id="buscar"/></td>';
    echo '</tr>';
    echo '</form>';

    if ($_POST) {
        $proveedorid = $_POST['proveedorid'];
        if (isset($proveedorid)) {
            $buscarBusiness = $ProveedorBusiness->buscarProveedor($proveedorid);
            foreach ($buscarBusiness as $current) {

                echo '<form  action="../../business/proveedoraccion/ProveedorAccion.php" method="Post" align="center" >';
                echo '<p> ID: <input type="text" name="proveedorid" id="proveedorid" value="' . $current['proveedorid'] . '"  readonly /></p>';
                echo '<p> Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/></p>';
                echo '<p> Apellido1: <input type="text" name="personaapellido1" id="personaApellido1" value="' . $current['personaapellido1'] . '"/></p>';
                echo '<p> Apellido2: <input type="text" name="personaapellido2" id="personaApellido2" value="' . $current['personaapellido2'] . '"/></p>';
                echo '<p> Telefono: <input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/></p>';
                echo '<p> Correo: <input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/></p>';
                echo '<p> Zona ID: <input type="text" name="zonaid" id="zonaid" value="' . $current['zonaid'] . '"/></p>';
                echo '<p> Materia Prima: <input type="text" name="materiaprimanombre" id="materiaprimanombre" value="' . $current['materiaprimanombre'] . '"/></p>';
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

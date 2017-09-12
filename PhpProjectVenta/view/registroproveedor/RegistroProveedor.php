<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Proveedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/proveedor.css">
    <?php
  include '../../business/proveedorbusiness/ProveedorBusiness.php';
  ?>
    
</head>
<body align="center">
        <div class="contenedor">
    <form  action="../../business/proveedoraccion/ProveedorAccion.php" method="Post" align="center">
        <strong>
            <p>
                Formulario para insertar los datos de proveedor.
            <p>  
        </strong>  
        <p> Nombre: <input type="text" name="personanombre" id="personanombre" placeholder="solo letras"/></p>
        <p> Apellido1: <input type="text" name="personaapellido1" id="personaApellido1" placeholder="solo letras"/></p>
        <p> Apellido2: <input type="text" name="personaapellido2" id="personaApellido2" placeholder="solo letras"/></p>
        <p> Telefono: <input type="text" name="personatelefono" id="personatelefono" placeholder="solo numeros"/></p>
        <p> Correo: <input type="text" name="personacorreo" id="personacorreo" placeholder="solo correo @"></p>
        <p> zona ID: <input type="text" name="zonaid" id="zonaid" placeholder="solo numeros"/></p>
        <p> Direccion: <input type="text" name="proveedordireccion" id="proveedordireccion" placeholder="solo letras"/></p>
        <br>
        <input name="nuevo" type="submit" id="nuevo" value="Registrar">

    </form>
   <!-- -->
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
        <th>Direccion</th>';
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
        echo '<th>' . $current['proveedordireccion'] . '</th>';
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
        echo '<p> Zona ID: <input type="text" name="zonaid" id="zonaid" value="' . $current['materiaprimaid'] . '"/></p>';
        echo '<p> Direccion: <input type="text" name="proveedordireccion" id="proveedordireccion" value="' . $current['proveedordireccion'] . '"/></p>';
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

<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/clientebusiness/clienteBusiness.php';
    ?>
</head>
<body >
    <p align="center">
    <form name="form" action="../business/clienteaccion/clienteAccion.php" method="Post" align="center">
        <strong>
            <p>
                Formulario para insertar el cliente a la base de datos.
            <p>  
        </strong>
        <p> ID: <input type="text" name="personaid" size="45" placeholder="8888"/>
        </p>         
        <p> Nombre: <input type="text" name="personanombre" size="45" required placeholder="Pedro"/>
        </p>
        <p> Primer Apellido: <input type="text" name="personaapellido1" size="45" required placeholder="Rojas"/>
        </p>
        <p> Segundo Apellido: <input type="text" name="personaapellido2" size="45" placeholder="Rojas"/>
        </p>
        <p> Numero de Telefono: <input type="text" name="personatelefono" size="45" required placeholder="Sin guiones ni espacios" />
        </p>
        <p> Corrreo Electronico: <input type="email" name="personacorreo" size="45" required placeholder="PredrpRojas@express.com"/>
        </p>
        <p> ID Direccion: <input type="text" name="zonaid" size="45" required placeholder="autoincrementado"/>
        </p>        
        <br>
        <input name="create" type="submit" value="Registrar">

    </form>

    <?php
    $clienteBusiness = new clienteBusiness();
    $allBusiness = $clienteBusiness->mostrarClientes();
    echo '<h2 align="center">Lista de Clientes</h2>';
    foreach ($allBusiness as $current) {
        echo '<form  action="../../business/clienteaccion/clienteAccion.php" method="Post" align="center" >';
        echo '<p> ID: <input type="text" name="clienteid" id="clienteid" value="' . $current['clienteid'] . '"/></p>';
        echo '<p> Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/></p>';
        echo '<p> Apellido1: <input type="text" name="personaapellido1" id="personaApellido1" value="' . $current['personaapellido1'] . '"/></p>';
        echo '<p> Apellido2: <input type="text" name="personaapellido2" id="personaApellido2" value="' . $current['personaapellido2'] . '"/></p>';
        echo '<p> Telefono: <input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/></p>';
        echo '<p> Correo: <input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/></p>';
        echo '<p> Descuento: <input type="text" name="clientedescuento" id="clientedescuento" value="' . $current['clientedescuento'] . '"/></p>';
        echo '<p> Acumula: <input type="text" name="clienteacumulado" id="clienteacumulado" value="' . $current['clienteacumulado'] . '"/></p>';
        echo '<p> Zona Precio: <input type="text" name="zonaprecio" id="zonaprecio" value="' . $current['zonaprecio'] . '"/></p>';
        echo '<p> Zona Nombre: <input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/></p>';
        echo '<p> Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta" value="' . $current['clientedireccionexacta'] . '"/></p>';
        echo '<br>';
        echo '<br>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
    }
    echo '<h2 align="center">Buscar cliente</h2>';
    echo '<form method="post" action="RegistroCliente.php" align="center" >';
    echo '<input type="text" name="personatelefono" id="personatelefono" placeholder="numero celular"/>';
    echo '<tr>';

    echo '<td><input type="submit" value="Buscar" name="buscar" id="buscar"/></td>';
    echo '</tr>';
    echo '</form>';

    if ($_POST) {
        $personatelefono = $_POST['personatelefono'];
        if (isset($personatelefono)) {
            $buscarBusiness = $clienteBusiness->buscarcliente($personatelefono);
            foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/clienteaccion/ClienteAccion.php" method="Post" align="center" >';
        echo '<p> ID: <input type="text" name="clienteid" id="clienteid" value="' . $current['clienteid'] . '"/></p>';
        echo '<p> Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/></p>';
        echo '<p> Apellido1: <input type="text" name="personaapellido1" id="personaApellido1" value="' . $current['personaapellido1'] . '"/></p>';
        echo '<p> Apellido2: <input type="text" name="personaapellido2" id="personaApellido2" value="' . $current['personaapellido2'] . '"/></p>';
        echo '<p> Telefono: <input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/></p>';
        echo '<p> Correo: <input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/></p>';
        echo '<p> Descuento: <input type="text" name="clientedescuento" id="clientedescuento" value="' . $current['clientedescuento'] . '"/></p>';
        echo '<p> Acumula: <input type="text" name="clienteacumulado" id="clienteacumulado" value="' . $current['clienteacumulado'] . '"/></p>';
        echo '<p> Zona Precio: <input type="text" name="zonaprecio" id="zonaprecio" value="' . $current['zonaprecio'] . '"/></p>';
        echo '<p> Zona Nombre: <input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/></p>';
        echo '<p> Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta" value="' . $current['clientedireccionexacta'] . '"/></p>';
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

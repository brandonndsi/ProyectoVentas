<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script type="text/javascript" src="../../js/Cliente.js"></script>
    <style href="../../css/cliente.css">
</style>
    <?php
    include '../../business/clientebusiness/clienteBusiness.php';
    ?>
</head>
<body >
    <p align="center">
    <form name="form" action="../../business/clienteaccion/clienteAccion.php" method="Post" align="center">
        <strong>
            <p>
                Formulario para insertar el cliente a la base de datos.
            <p>  
        </strong>  
        <p> Nombre: <input type="text" name="personanombre" id="personanombre" placeholder="solo letras"/></p>
        <p> Apellido1: <input type="text" name="personaapellido1" id="personaApellido1" placeholder="solo letras"/></p>
        <p> Apellido2: <input type="text" name="personaapellido2" id="personaApellido2" placeholder="solo letras"/></p>
        <p> Telefono: <input type="text" name="personatelefono" id="personatelefono" placeholder="solo numeros"/></p>
        <p> Correo: <input type="text" name="personacorreo" id="personacorreo" placeholder="solo correo @"></p>
        <p> Descuento: <input type="text" name="clientedescuento" id="clientedescuento" placeholder="solo numeros"/></p>
        <p> Acumula: <input type="text" name="clienteacumulado" id="clienteacumulado" placeholder="solo numeros"/></p>
        <p> zona ID: <input type="text" name="zonaid" id="zonaid" placeholder="solo numeros"/></p>
        <p> Estado: <input type="text" name="clienteestado" id="clienteestado" placeholder="solo 1 o 0"/></p>
        <p> Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta" placeholder="solo letras"/></p>

        <br>
        <input name="nuevo" type="submit" onclick="validarEnvia()" value="Registrar">

    </form>

    <?php
    $clienteBusiness = new clienteBusiness();
    $allBusiness = $clienteBusiness->mostrarClientes();
    echo '<h2 align="center">Lista de Clientes</h2>';
    foreach ($allBusiness as $current) {
        

        echo '<form  action="../../business/clienteaccion/clienteAccion.php" method="Post" align="center" >';
        echo'<table>';
        echo '<tr><td><strong>ID</strong></td><td><strong>Nombre</strong></td><td><strong>Apellido1</strong></td>
        <td><strong>Apellido2</strong></td><td><strong>Telefono</strong></td><td><strong>Correo</strong></td>
        <td><strong>Descuento</strong></td><td><strong>Acumulado</strong></td><td><strong>Zona Precio</strong></td><td><strong>Zona Nombre</strong></td><td><strong>Direccion</strong></td></tr>';
        echo '<tr>';
        echo '<td><input type="text" name="clienteid" id="clienteid" value="' . $current['clienteid'] . '"/></td>';
        echo '<td><input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/></td>';
        echo '<td><input type="text" name="personaapellido1" id="personaApellido1" value="' . $current['personaapellido1'] . '"/></td>';
        echo '<td><input type="text" name="personaapellido2" id="personaApellido2" value="' . $current['personaapellido2'] . '"/></td>';
        echo '<td><input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/></td>';
        echo '<td><input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/></td>';
        echo '<td><input type="text" name="clientedescuento" id="clientedescuento" value="' . $current['clientedescuento'] . '"/></td>';
        echo '<td><input type="text" name="clienteacumulado" id="clienteacumulado" value="' . $current['clienteacumulado'] . '"/></td>';
        echo '<td><input type="text" name="zonaprecio" id="zonaprecio" value="' . $current['zonaprecio'] . '"/></td>';
        echo '<td><input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/></td>';
        echo '<td><input type="text" name="clientedireccionexacta" id="clientedireccionexacta" value="' . $current['clientedireccionexacta'] . '"/></td>';
        echo '<br>';
        echo '<br>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</table>';
        echo '</form>';
    }
    echo '<h2 align="center">Buscar cliente</h2>';
    echo '<form method="post" action="RegistroCliente.php" align="center" >';
    echo '<input type="text" name="personatelefono" id="personatelefono" placeholder="ID/Nombre/Telefono"/>';
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

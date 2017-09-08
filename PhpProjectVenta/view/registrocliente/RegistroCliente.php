<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script type="text/javascript" src="../../js/Cliente.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/cliente.css">
    <?php
    include '../../business/clientebusiness/clienteBusiness.php';
    /*include '../../business/clienteaccion/clienteAccion.php';*/
    ?>
</head>
<body>

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
       <!-- <p> Descuento: <input type="text" name="clientedescuento" id="clientedescuento" placeholder="solo numeros"/></p>
        <p> Acumula: <input type="text" name="clienteacumulado" id="clienteacumulado" placeholder="solo numeros"/></p> -->
        <p> zona ID: <input type="text" name="zonaid" id="zonaid" placeholder="solo numeros"/></p>
        <!--<p> Estado: <input type="text" name="clienteestado" id="clienteestado" placeholder="solo 1 o 0"/></p> -->
        <p> Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta" placeholder="solo letras"/></p>

        <br>
        <input name="nuevo" type="submit" onclick="validarEnvia()" value="Registrar">

    </form>
    <div class="contenedor">
    <?php
    $clienteBusiness = new clienteBusiness();
    $allBusiness = $clienteBusiness->mostrarClientes();
    echo '<h2 align="center">Lista de Clientes</h2>';

        echo '<form  action="../../business/clienteaccion/clienteAccion.php" method="Post" align="center" id="mostrar">';
        echo'<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nombre</th><th>Apellido1</th>
        <th>Apellido2</th><th>Telefono</th><th>Correo</th>
        <th>Descuento</th><th>Direccion</th>';
            foreach ($allBusiness as $current) {
        echo '</tr>';
        echo '</thead>';
        echo '<tr>';
        echo '<th >' . $current['personanombre'] . '</th>';
        echo '<th>' . $current['personaapellido1'] . '</th>';
        echo '<th>' . $current['personaapellido2'] . '</th>';
        echo '<th>' . $current['personatelefono'] . '</th>';
        echo '<th>' . $current['personacorreo'] . '</th>';
        echo '<th>' . $current['clientedescuento'] . '</th>';
        echo '<th>' . $current['clientedireccionexacta'] . '</th>';
        echo '</tr>';
    }
        echo '</table>';

        echo '</form>';
    
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
        
        echo '<form  action="../../business/clienteaccion/clienteAccion.php" method="Post" align="center" >';
        echo '<p> ID: <input type="text" name="clienteid" id="clienteid" value="' . $current['clienteid'] . '"  readonly /></p>';
        echo '<p> Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/></p>';
        echo '<p> Apellido1: <input type="text" name="personaapellido1" id="personaApellido1" value="' . $current['personaapellido1'] . '"/></p>';
        echo '<p> Apellido2: <input type="text" name="personaapellido2" id="personaApellido2" value="' . $current['personaapellido2'] . '"/></p>';
        echo '<p> Telefono: <input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/></p>';
        echo '<p> Correo: <input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/></p>';
       /* echo '<p> Descuento: <input type="text" name="clientedescuento" id="clientedescuento" value="' . $current['clientedescuento'] . '"/></p>';
        echo '<p> Acumula: <input type="text" name="clienteacumulado" id="clienteacumulado" value="' . $current['clienteacumulado'] . '"/></p>';
        echo '<p> Zona Precio: <input type="text" name="zonaprecio" id="zonaprecio" value="' . $current['zonaprecio'] . '"/></p>';*/
        echo '<p> Zona Nombre: <input type="text" name="zonaid" id="zonaid" value="' . $current['zonaid'] . '"/></p>';
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

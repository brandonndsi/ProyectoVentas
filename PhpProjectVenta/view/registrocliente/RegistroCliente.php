<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/clientebusiness/clienteBusiness.php';
    ?>
</head>
<body>

    <div class="nuevo"> 

        <form  action="../../business/clienteaccion/clienteAccion.php" method="Post">
            <strong>
                <h2>
                    Formulario para insertar los clientes a la base de datos.
                </h2>  
            </strong>
            <table  border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th >Apellido1</th>
                        <th >Apellido2</th>
                        <th >Telefono</th>
                        <th >Correo</th>
                        <th >Zona ID</th>
                        <th >Direccion</th>
                        <th >Accion</th>

                    </tr>
                </thead>           

                <tr>
                    <th><input type="text" name="personanombre" size="10" class="personanombre" placeholder="Solo letras"/> </th>
                    <th><input type="text" name="personaapellido1" size="10" class="personaapellido1" placeholder="Solo letras"/> </th>
                    <th><input type="text" name="personaapellido2" size="10" class="personaapellido2" placeholder="Solo letras"/> </th>
                    <th><input type="text" name="personatelefono" size="10" class="personatelefono" placeholder="Solo numeros"/> </th>
                    <th><input type="text" name="personacorreo" size="10" class="personacorreo" placeholder="Solo @ correo"/> </th>
                    <th><input type="text" name="zonaid" size="10" class="zonaid" placeholder="Solo numeros"/> </th>
                    <th><input type="text" name="clientedireccionexacta" size="10" class="clientedireccionexacta" placeholder="Letras y numeros"/> </th>
                    <th><input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></th>
                </tr> 

            </table>
        </form>

    </div>
    <div class="contenedor">
        <?php
        $clienteBusiness = new clienteBusiness();
        $allBusiness = $clienteBusiness->mostrarClientes();
        echo '<h2>Lista de Clientes</h2>';

        echo '<form  action="../../business/clienteaccion/clienteAccion.php" method="Post" id="mostrar">';
        echo'<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Id</th><th>Nombre</th><th>Apellido1</th>
        <th>Apellido2</th><th>Telefono</th><th>Correo</th>
        <th>Descuento</th><th>Direccion</th>';
        echo '</tr>';
        echo '</thead>';
        foreach ($allBusiness as $current) {
            
            echo '<tr>';
            echo '<th>' . $current['clienteid'] . '</th>';
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

        echo '<h2>Buscar cliente</h2>';
        echo '<form method="post" action="RegistroCliente.php">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Buscar</th>';
        echo '<th>Accion</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tr>';
        echo '<th><input type="text" name="personatelefono" id="personatelefono" placeholder="ID/Nombre/Telefono"/></th>';
        echo '<th><input type="submit" value="Buscar" name="buscar" id="buscar"/></th>';
        echo '</tr>';
        echo '</form>';

        if ($_POST) {
            $personatelefono = $_POST['personatelefono'];
            if (isset($personatelefono)) {
                $buscarBusiness = $clienteBusiness->buscarcliente($personatelefono);
                foreach ($buscarBusiness as $current) {

                    echo '<form  action="../../business/clienteaccion/clienteAccion.php" method="Post">';
                    echo '<p> ID: <input type="text" name="clienteid" id="clienteid" value="' . $current['clienteid'] . '"  readonly /></p>';
                    echo '<p> Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '"/></p>';
                    echo '<p> Apellido1: <input type="text" name="personaapellido1" id="personaApellido1" value="' . $current['personaapellido1'] . '"/></p>';
                    echo '<p> Apellido2: <input type="text" name="personaapellido2" id="personaApellido2" value="' . $current['personaapellido2'] . '"/></p>';
                    echo '<p> Telefono: <input type="text" name="personatelefono" id="personatelefono" value="' . $current['personatelefono'] . '"/></p>';
                    echo '<p> Correo: <input type="text" name="personacorreo" id="personacorreo" value="' . $current['personacorreo'] . '"/></p>';
                    echo '<p> Zona ID: <input type="text" name="zonaid" id="zonaid" value="' . $current['zonaid'] . '"/></p>';
                    echo '<p> Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta" value="' . $current['clientedireccionexacta'] . '"/></p>';
                    echo '<br/>';
                    echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                    echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                    echo '</tr>';
                    echo '</form>';
                }
            }
        }
        ?>
    </div>
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


</body>
</html>

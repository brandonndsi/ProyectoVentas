<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

    <?php
    include '../../business/clientebusiness/clienteBusiness.php';
    ?>
</head>
<body>
    <?php
    $clienteBusiness = new clienteBusiness();
    $allBusiness = $clienteBusiness->mostrarClientes();
    ?>
    <h2>
        Lista de Clientes
        <a href="?action=registrar" class="btn btn-primary"> Nuevo cliente</a>
        <a href="../../index.php" class="btn btn-secondary">Pagina Principal</a>

    </h2> 
    <form  action="RegistroCliente.php" method="Post">
        <table>
            <thead>
                <tr><th></th>
                    <th>Nombre</th>
                    <th >Apellido1</th>
                    <th >Apellido2</th>
                </tr>
            </thead> 
            <?php foreach ($allBusiness as $current): ?>           
                <tr>
                    <th><input type="hidden" name="clienteid" class="clienteid" value="<?php echo $current['clienteid']; ?>"/> </th>
                    <th><input type="text" name="personanombre" class="personanombre" value="<?php echo $current['personanombre']; ?>"/> </th>
                    <th><input type="text" name="personaapellido1" class="personaapellido1" value="<?php echo $current['personaapellido1']; ?>"/> </th>
                    <th><input type="text" name="personaapellido2" class="personaapellido2" value="<?php echo $current['personaapellido2']; ?>"/> </th>

                    <td><a href="?action=editar&id=<?php echo $current['clienteid']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['clienteid']; ?> "class="btn btn-info">ver mas</a></td> 
                    <td><a href="?action=eliminar&id=<?php echo $current['clienteid']; ?> "class="btn btn-danger">Eliminar</a></td>                    
                </tr> 
            <?php endforeach ?>
        </table>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {

        switch ($_REQUEST['action']) {

            case 'ver':
                $Obtenida = $clienteBusiness->buscarCliente($_REQUEST['id']);
                foreach ($Obtenida as $current) {
                    echo '<form  action="RegistroCliente.php" method="Post">';
                    echo '<h2>Datos Cliente.</h2>';
                    echo '<td><input type="hidden" name="clienteid" value="' . $current['clienteid'] . '"></td>';
                    echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '" readonly /></p>';
                    echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1"  value="' . $current['personaapellido1'] . '" readonly /></p>';
                    echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2"  value="' . $current['personaapellido2'] . '" readonly /></p>';
                    echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono"  value="' . $current['personatelefono'] . '" readonly /></p>';
                    echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo"  value="' . $current['personacorreo'] . '" readonly /></p>';
                    echo '<p>Zona id: <input type="text" name="zonaid" id="zonaid""  value="' . $current['zonaid'] . '" readonly /></p>';
                    echo '<p>Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta""  value="' . $current['clientedireccionexacta'] . '"  readonly /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/clienteaccion/clienteAccion.php" id="formregistro" method="Post">';
                echo '<h2>Nuevo Cliente</h2>';
                echo '<p>Nombre Completo: <input type="text" name="personanombre" id="personanombre" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono" required pattern="[0-9]{8}"/></p>';
                echo '<p>Correo: <input type="email" name="personacorreo" id="personacorreo" placeholder="empleado@express.com pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required/></p>';
                echo '<p>Zona Id: <input type="text" name="zonaid" id="zonaid" required/></p>';
                echo '<p>Direccion: <textarea name="clientedireccionexacta" id="clientedireccionexacta" rows="4" cols="50" form="formregistro" ></textarea></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="registrar" id="registrar"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $clienteBusiness->eliminarCliente($_REQUEST['id']);

                header('Location: RegistroCliente.php');

                break;

            case 'editar':

                $CObtenida = $clienteBusiness->buscarCliente($_REQUEST['id']);
                foreach ($CObtenida as $current) {
                    echo '<form  action="../../business/clienteaccion/clienteAccion.php" method="Post">';
                    echo '<h2>Editar Cliente</h2>';
                    echo '<td><input type="hidden" name="clienteid" value="' . $current['clienteid'] . '"></td>';
                    echo '<p>Nombre Completo: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" /></p>';
                    echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1"  value="' . $current['personaapellido1'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" /></p>';
                    echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2"  value="' . $current['personaapellido2'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})" /></p>';
                    echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono"  value="' . $current['personatelefono'] . '" pattern="[0-9]{8}"/></p>';
                    echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo"  value="' . $current['personacorreo'] . '" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" /></p>';
                    echo '<p>Zona id: <input type="text" name="zonaid" id="zonaid""  value="' . $current['zonaid'] . '" /></p>';
                    echo '<p>Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta""  value="' . $current['clientedireccionexacta'] . '" /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Actualizar" name="actualizar" id="actualizar"/></p>';
                    echo '</form>';
                }
                break;
        }
    }
    ?>
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

<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/clientebusiness/clienteBusiness.php';
    ?>
</head>
<body>
 <?php
        /*placeholder="ID/Nombre/Telefono"*/
        $clienteBusiness = new clienteBusiness();
        $allBusiness = $clienteBusiness->mostrarClientes();
 ?>
         <h2>
                Lista de Clientes.
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
                    
                    <td><a href="?action=editar&id=<?php echo $current['clienteid']; ?> ">Modificar</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['clienteid']; ?> ">Eliminar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['clienteid']; ?> ">ver</a></td> 
                </tr> 
                 <?php endforeach ?>
            </table>
             <a href="?action=registrar">Nuevo Cliete</a>
        </form>

         <?php
        if(isset($_REQUEST['action'])){

        switch($_REQUEST['action']){

        case 'ver':
             $Obtenida= $clienteBusiness->buscarCliente($_REQUEST['id']);
            foreach ($Obtenida as $current) {
        echo '<form  action="RegistroCliente.php" method="Post">';
        echo '<h2>Datos Cliente.</h2>';
        echo '<td><input type="hidden" name="clienteid" value="' . $current['clienteid'] . '"></td>';
        echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '" readonly /></p>';
        echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1"  value="' . $current['personaapellido1'] . '" readonly /></p>';
        echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2"  value="' . $current['personaapellido2'] . '" readonly /></p>';
        echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono
        "  value="' . $current['personatelefono'] . '" readonly /></p>';
        echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo
        "  value="' . $current['personacorreo'] . '" readonly /></p>';
        echo '<p>Zona id: <input type="text" name="zonaid" id="zonaid"
        "  value="' . $current['zonaid'] . '" readonly /></p>';
         echo '<p>Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta"
        "  value="' . $current['clientedireccionexacta'] . '"  readonly /></p>';
        echo '<p>Accion: <input type="submit" value="cerrar" name="cerrar" id="cerrar"/></p>';
        echo '</form>';
            }
            break;

        case 'registrar':

        echo '<form  action="../../business/clienteaccion/clienteAccion.php" method="Post">';
        echo '<h2>Nueva Cliente</h2>';
        echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre"/></p>';
        echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1"/></p>';
        echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2"/></p>';
        echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono"/></p>';
        echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo"/></p>';
        echo '<p>Zona id: <input type="text" name="zonaid" id="zonaid"/></p>';
        echo '<p>Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta"/></p>';
        echo '<p>Accion: <input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></p>';
        echo '</form>';
            break;

        case 'eliminar':

            $clienteBusiness->eliminarCliente($_REQUEST['id']);

            header('Location: RegistroCliente.php');

            break;

        case 'editar':

            $CObtenida= $clienteBusiness->buscarCliente($_REQUEST['id']);
            foreach ($CObtenida as $current) {
        echo '<form  action="../../business/clienteaccion/clienteAccion.php" method="Post">';
        echo '<h2>Editar Cliente</h2>';
        echo '<td><input type="hidden" name="clienteid" value="' . $current['clienteid'] . '"></td>';
        echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre" value="' . $current['personanombre'] . '" /></p>';
        echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1"  value="' . $current['personaapellido1'] . '" /></p>';
        echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2"  value="' . $current['personaapellido2'] . '" /></p>';
        echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono
        "  value="' . $current['personatelefono'] . '" /></p>';
        echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo
        "  value="' . $current['personacorreo'] . '" /></p>';
        echo '<p>Zona id: <input type="text" name="zonaid" id="zonaid"
        "  value="' . $current['zonaid'] . '" /></p>';
        echo '<p>Direccion: <input type="text" name="clientedireccionexacta" id="clientedireccionexacta"
        "  value="' . $current['clientedireccionexacta'] . '" /></p>';
        echo '<p>Accion: <input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></p>';
        echo '</form>';
            }
            break;
    }
}
        ?>
        
    <a href="../../index.php">Regresar</a>
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

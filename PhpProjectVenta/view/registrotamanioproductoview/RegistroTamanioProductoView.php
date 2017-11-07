<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tamaños. </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

    <?php
    include '../../business/tamaniobusiness/tamanioBusiness.php';
    ?>
</head>
<body>
    <?php
    $tamanioBusiness = new tamanioBusiness();
    $allBusiness = $tamanioBusiness->mostrarTamanio();
    ?>

    <h2>Tamaños.
        <a href="?action=registrar" class="btn btn-primary">Nuevo Tamaño</a>
        <a href="../registroproducto/RegistroProducto.php" class="btn btn-warning">Atras</a> 
        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a> 
    </h2>
    
    <form  action="../../business/tamanioaccion/tamanioAccion.php" method="Post" >
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <?php foreach ($allBusiness as $current): ?>           
                <tr>
                    <td><input type="text" id="tamanoid" name="tamanoid" class="tamanoid"  value="<?php echo $current['tamanoid']; ?>" readonly/> </td>
                    <td><input type="text" id="tamanonombre" name="tamanonombre" class="tamanonombre" value="<?php echo $current['tamanonombre']; ?>" readonly/> </td>

                    <td><a href="?action=editar&id=<?php echo $current['tamanoid']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['tamanoid']; ?> " class="btn btn-info">Ver mas</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['tamanoid']; ?> " class="btn btn-danger">Eliminar</a></td>
                </tr> 
            <?php endforeach ?>
        </table>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {

            case 'ver':
                $categoriaObtenida = $tamanioBusiness->buscarCategoriaProducto($_REQUEST['id']);
                foreach ($categoriaObtenida as $current) {
                    echo '<form  action="RegistroCategoriaProductoView.php" method="Post">';
                    echo '<h2>Datos de la Categoria</h2>';
                    echo '<p>Codigo: <input type="text" name="tamanoid" id="tamanoid" value="' . $current['tamanoid'] . '" readonly /></p>';
                    echo '<p>Nombre: <input type="text" name="tamanonombre" id="tamanonombre" value="' . $current['tamanonombre'] . '" readonly /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/tamanioaccion/tamanioAccion.php" method="Post">';
                echo '<h2>Nueva Categoria</h2>';
                echo '<p>Nuevo: <input type="text" name="tamanonombre" id="tamanonombre" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="nuevo" id="nuevo"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $tamanioBusiness->eliminarTamanio($_REQUEST['id']);

                header('Location: RegistroTamanioProductoView.php');

                break;

            case 'editar':

                $proObtenida = $tamanioBusiness->modificarTamanio($_REQUEST['id']);
                foreach ($proObtenida as $current) {
                    echo '<form  action="../../business/tamanioaccion/tamanioAccion.php" method="Post">';
                    echo '<h2>Editar Categoria</h2>';
                    echo '<input type="hidden" name="tamanoid" id="tamanoid"  value="' . $current['tamanoid'] . '"  readonly />';
                    echo '<p>Ingrese uno Nuevo: <input type="text" name="tamanonombre" id="tamanonombre" value="' . $current['tamanonombre'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Actualizar" name="actualizar" id="actualizar"/></p>';
                    echo '</form>';
                }
                break;
        }
    }
    ?>
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
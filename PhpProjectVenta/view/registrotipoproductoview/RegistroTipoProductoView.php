<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tipos </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

    <?php
    include '../../business/tipobusiness/tipoBusiness.php';
    ?>
</head>
<body>
    <?php
    $tipoBusiness = new tipoBusiness();
    $allBusiness = $tipoBusiness->mostrartipo();
    ?>

    <h2>Tipo de los productos.
        <a href="?action=registrar" class="btn btn-primary">Nueva Categoria</a>
        <a href="../registroproducto/RegistroProducto.php" class="btn btn-warning">Atras</a> 
        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a> 
    </h2>
    
    <form  action="../../business/tipoaccion/tipoAccion.php" method="Post" >
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <?php foreach ($allBusiness as $curren): ?>           
                <tr>
                    <td><input type="text" id="tipoid" name="tipoid" class="tipoid"  value="<?php echo $curren['tipoid']; ?>" readonly/> </td>
                    <td><input type="text" id="tiponombre" name="tiponombre" class="tiponombre" value="<?php echo $curren['tiponombre']; ?>" readonly/> </td>

                    <td><a href="?action=editar&id=<?php echo $curren['tipoid']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver&id=<?php echo $curren['tipoid']; ?> " class="btn btn-info">Ver mas</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $curren['tipoid']; ?> " class="btn btn-danger">Eliminar</a></td>
                </tr> 
            <?php endforeach ?>
        </table>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {

            case 'ver':
                $categoriaObtenida = $tipoBusiness->buscarTipo($_REQUEST['id']);
                foreach ($categoriaObtenida as $current) {
                    echo '<form  action="RegistroCategoriaProductoView.php" method="Post">';
                    echo '<h2>Tipos de Productos</h2>';
                    echo '<p>Id: <input type="text" name="categoriaproductoid" id="categoriaproductoid" value="' . $current['categoriaproductoid'] . '" readonly /></p>';
                    echo '<p>Nombre: <input type="text" name="categoriaproductonombre" id="categoriaproductonombre" value="' . $current['categoriaproductonombre'] . '" readonly /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/tipoaccion/tipoAccion.php" method="Post">';
                echo '<h2>Nuevo Tipo</h2>';
                echo '<p>Ingrese el Nuevo Tipo: <input type="text" name="categoriaproductonombre" id="categoriaproductonombre" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="nuevo" id="nuevo"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $tipoBusiness->eliminarTipo($_REQUEST['id']);

                header('Location: RegistroTipoProductoView.php');

                break;

            case 'editar':

                $proObtenida = $tipoBusiness->modificarTipo($_REQUEST['id']);
                foreach ($proObtenida as $current) {
                    echo '<form  action="../../business/tipoaccion/tipoAccion.php" method="Post">';
                    echo '<h2>Editar el Tipo</h2>';
                    echo '<input type="hidden" name="categoriaproductoid" id="categoriaproductoid"  value="' . $current['categoriaproductoid'] . '"  readonly />';
                    echo '<p>Ingrese el nuevo Tipo de Producto: <input type="text" name="categoriaproductonombre" id="categoriaproductonombre" value="' . $current['categoriaproductonombre'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
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
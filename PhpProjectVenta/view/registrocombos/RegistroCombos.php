<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Producto </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

    <?php
    include '../../business/combobusiness/comboBusiness.php';
    ?>
</head>
<body>
    <?php
    $comboBusiness = new ComboBusiness();
    $allBusiness = $comboBusiness->mostrarCombo();
    ?>

    <h2>Combos.
        <a href="?action=registrar" class="btn btn-primary">Nuevo Producto</a>
        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a> 
    </h2>
    
    <form  action="../../business/comboaccion/ComboAccion.php" method="Post" >
        <table>
            <thead>
                <tr><th></th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Ingredientes</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <?php foreach ($allBusiness as $current): ?>           
                <tr><td><input type="hidden" name="combosid" id="combosid" value="<?php echo $current['combosid']; ?>"></td>
                    <td><input type="text" id="combocodigo" name="combocodigo" class="combocodigo"  value="<?php echo $current['combocodigo']; ?>" readonly/> </td>
                    <td><input type="text" id="combonombre" name="combonombre" class="combonombre" value="<?php echo $current['combonombre']; ?>" readonly/> </td>
                    <td><input type="text" id="combosproductoid" name="combosproductoid" class="combosproductoid" value="<?php echo $current['comboingredientes']; ?>" readonly/> </td>
                    <td><input type="text" id="comboprecio" name="comboprecio" class="comboprecio" value="<?php echo $current['comboprecio']; ?>" readonly/> </td>

                    <td><a href="?action=editar&id=<?php echo $current['combosid']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['combosid']; ?> " class="btn btn-info">Ver mas</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['combosid']; ?> " class="btn btn-danger">Eliminar</a></td>
                </tr> 
            <?php endforeach ?>
        </table>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {

            case 'ver':
                $comboObtenida = $comboBusiness->buscarCombo($_REQUEST['id']);
                foreach ($comboObtenida as $current) {
                    echo '<form  action="RegistroCombos.php" method="Post">';
                    echo '<h2>Datos del combo</h2>';
                    echo '<p>Codigo: <input type="text" name="combocodigo" id="combocodigo" value="' . $current['combocodigo'] . '" readonly /></p>';
                    echo '<p>Nombre: <input type="text" name="combonombre" id="combonombre" value="' . $current['combonombre'] . '" readonly /></p>';
                    echo '<p>Ingredientes: <input type="text" name="combosproductoid" id="combosproductoid" value="' . $current['combosproductoid'] . '" readonly /></p>';
                    echo '<p>Precio: <input type="text" name="comboprecio" id="comboprecio"  value="' . $current['comboprecio'] . '" readonly /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/comboaccion/ComboAccion.php" method="Post">';
                echo '<h2>Nuevo Combo</h2>';
                echo '<p>Codigo: <input type="text" name="productocodigo" id="productocodigo" required></p>';
                echo '<p>Nombre: <input type="text" name="productonombre" id="productonombre" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"></p>';
                echo '<p>Ingredientes: <input type="text" name="combosproductoid" id="combosproductoid"></p>';
                echo '<p>Precio: <input type="text" name="productoprecio" id="productoprecio" required pattern="[0-9]{3,5}"></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="registrar" id="registrar"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $comboBusiness->eliminarCombo($_REQUEST['id']);

                header('Location: RegistroCombos.php');

                break;

            case 'editar':

                $proObtenida = $comboBusiness->modificarCombo($_REQUEST['id']);
                foreach ($proObtenida as $current) {
                    echo '<form  action="../../business/comboaccion/ComboAccion.php" method="Post">';
                    echo '<h2>Editar Combo</h2>';
                    echo '<input type="hidden" name="productoid" id="productoid"  value="' . $current['productoid'] . '"  readonly />';
                    echo '<p>Codigo: <input type="text" name="productocodigo" id="productocodigo" value="' . $current['productocodigo'] . '"/></p>';
                    echo '<p>Nombre: <input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                    echo '<p>Nombre: <input type="text" name="combosproductoid" id="combosproductoid" value="' . $current['combosproductoid'] . '"/></p>';
                    echo '<p>Precio: <input type="text" name="productoprecio" id="productoprecio"  value="' . $current['productoprecio'] . '" required pattern="[0-9]{3,5}"/></p>';
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
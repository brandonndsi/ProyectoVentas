<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Producto </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <?php
    include '../../business/productobusiness/ProductoBusiness.php';
    ?>
</head>
<body>
    <?php
    $productoBusiness = new ProductoBusiness();
    $allBusiness = $productoBusiness->mostrarProductos();
    ?>
                <h2>Producto.</h2>  
        <form  action="../../business/productoaccion/ProductoAccion.php" method="Post" >
        <table>
                <thead>
                    <tr><th></th>
                        <th>Codigo</th>
                        <th>Producto</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <?php foreach ($allBusiness as $current): ?>           
                <tr><td><input type="hidden" name="productoid" id="productoid" value="<?php echo $current['productoid']; ?>"></td>
                    <td><input type="text" id="productocodigo" name="productocodigo" class="productocodigo"  value="<?php echo $current['productocodigo']; ?>"/> </td>
                    <td><input type="text" id="productonombre" name="productonombre" class="productonombre" value="<?php echo $current['productonombre']; ?>"/> </td>
                    <td><input type="text" id="productoprecio" name="productoprecio" class="productoprecio" value="<?php echo $current['productoprecio']; ?>"/> </td>

                    <td><a href="?action=editar&id=<?php echo $current['productoid']; ?> ">Modificar</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['productoid']; ?> ">Eliminar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['productoid']; ?> ">ver</a></td>
            
                </tr> 
                 <?php endforeach ?>
            </table>
            <a href="?action=registrar">Nuevo Producto</a>
        </form>

<?php
if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){

        case 'ver':
             $productoObtenida= $productoBusiness->buscarProducto($_REQUEST['id']);
            foreach ($productoObtenida as $current) {
        echo '<form  action="RegistroProducto.php" method="Post">';
        echo '<h2>Datos del producto</h2>';
        echo '<p>Codigo: <input type="text" name="productocodigo" id="productocodigo" value="' . $current['productocodigo'] . '" readonly /></p>';
        echo '<p>Nombre: <input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '" readonly /></p>';
        echo '<p>Precio: <input type="text" name="productoprecio" id="productoprecio"  value="' . $current['productoprecio'] . '" readonly /></p>';
        echo '<p>Accion: <input type="submit" value="cerrar" name="cerrar" id="cerrar"/></p>';
        echo '</form>';
            }
            break;

        case 'registrar':

        echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post">';
        echo '<h2>Nuevo Productor</h2>';
        echo '<p>Codigo: <input type="text" name="productocodigo" id="productocodigo"></p>';
        echo '<p>Nombre: <input type="text" name="productonombre" id="productonombre"></p>';
        echo '<p>Precio: <input type="text" name="productoprecio" id="productoprecio"></p>';
        echo '<p>Accion: <input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></p>';
        echo '</form>';
            break;

        case 'eliminar':

            $productoBusiness->eliminarProducto($_REQUEST['id']);

            header('Location: RegistroProducto.php');

            break;

        case 'editar':

            $proObtenida= $productoBusiness->buscarProducto($_REQUEST['id']);
            foreach ($proObtenida as $current) {
        echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post">';
        echo '<h2>Editar Productor</h2>';
        echo '<input type="hidden" name="productoid" id="productoid"  value="' . $current['productoid'] . '"  readonly />';
        echo '<p>Codigo: <input type="text" name="productocodigo" id="productocodigo" value="' . $current['productocodigo'] . '"/></p>';
        echo '<p>Nombre: <input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '"/></p>';
        echo '<p>Precio: <input type="text" name="productoprecio" id="productoprecio"  value="' . $current['productoprecio'] . '"/></p>';
        echo '<p>Accion: <input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></p>';
        echo '</form>';
            }
            break;
    }
}
?>
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
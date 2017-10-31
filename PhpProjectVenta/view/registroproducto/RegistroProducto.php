<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Producto </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">
    <link rel="stylesheet" href="../../css/menu.css" >
    
    <?php
    include '../../business/productobusiness/ProductoBusiness.php';
    ?>
</head>
<body>

    <div class="menu">
        <?php
        include("menuProductos.php");
        ?>
    </div>

    <?php
    $productoBusiness = new ProductoBusiness();
    $allBusiness = $productoBusiness->mostrarProductos();
    ?>

    <div class="col-sm-7 col-md-7">
        <div class="well panel panel-info">
            <center><h1 >AGREGAR VENTA </h1></center>
            <div class="form-group">
                <center><h2>Lista de los Productos.
                        <a href="?action=registrar" class="btn btn-primary">Nuevo Producto</a>
                        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a> 
                    </h2></center>

                <center><form  action="../../business/productoaccion/ProductoAccion.php" method="Post" >
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
                                    <td><input type="text" id="productocodigo" name="productocodigo" class="productocodigo"  value="<?php echo $current['productocodigo']; ?>" readonly/> </td>
                                    <td><input type="text" id="productonombre" name="productonombre" class="productonombre" value="<?php echo $current['productonombre']; ?>" readonly/> </td>
                                    <td><input type="text" id="productoprecio" name="productoprecio" class="productoprecio" value="<?php echo $current['productoprecio']; ?>" readonly/> </td>

                                    <td><a href="?action=editar&id=<?php echo $current['productoid']; ?> " class="btn btn-primary">Editar</a></td>
                                    <td><a href="?action=ver&id=<?php echo $current['productoid']; ?> " class="btn btn-info">Ver mas</a></td>
                                    <td><a href="?action=eliminar&id=<?php echo $current['productoid']; ?> " class="btn btn-danger">Eliminar</a></td>
                                </tr> 
                            <?php endforeach ?>
                        </table>
                    </form></center>
            </div>

            <?php
            if (isset($_REQUEST['action'])) {
                switch ($_REQUEST['action']) {

                    case 'ver':
                        $productoObtenida = $productoBusiness->buscarProducto($_REQUEST['id']);
                        foreach ($productoObtenida as $current) {
                            echo '<form  action="RegistroProducto.php" method="Post">';
                            echo '<h2>Datos del producto</h2>';
                            echo '<p>Codigo: <input type="text" name="productocodigo" id="productocodigo" value="' . $current['productocodigo'] . '" readonly /></p>';
                            echo '<p>Nombre: <input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '" readonly /></p>';
                            echo '<p>Tamaño: <input type="text" name="tamanonombre" id="tamanonombre" value="' . $current['tamanonombre'] . '" readonly /></p>';
                            echo '<p>Descripcion: <input type="text" name="productodescripcion" id="productodescripcion" value="' . $current['productodescripcion'] . '" readonly /></p>';
                            echo '<p>Precio: <input type="text" name="productoprecio" id="productoprecio"  value="' . $current['productoprecio'] . '" readonly /></p>';
                            echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                            echo '</form>';
                        }
                        break;

                    case 'registrar':

                        echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post">';
                        echo '<h2>Nuevo Productor</h2>';
                        echo '<p>Codigo: <input type="text" name="productocodigo" id="productocodigo" required></p>';
                        echo '<p>Nombre: <input type="text" name="productonombre" id="productonombre" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"></p>';
                        echo '<p>Tamaño: <select name = "combotamanio"></p>';
                        echo '<option ></option>';
                        echo '<option value = "Grande">Grande</option>';
                        echo '<option value = "Mediano">Mediano</option>';
                        echo '<option value = "Pequeno">Pequeño</option>';
                        echo '</select>';
                        echo '<p>Descripcion: <input type="text" name="productodescripcion" id="productodescripcion"></p>';
                        echo '<p>Precio: <input type="text" name="productoprecio" id="productoprecio" required pattern="[0-9]{3,5}"></p>';
                        echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="registrar" id="registrar"/></p>';
                        echo '</form>';
                        break;

                    case 'eliminar':

                        $productoBusiness->eliminarProducto($_REQUEST['id']);

                        header('Location: RegistroProducto.php');

                        break;

                    case 'editar':

                        $proObtenida = $productoBusiness->buscarProducto($_REQUEST['id']);
                        foreach ($proObtenida as $current) {
                            echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post">';
                            echo '<h2>Editar Productor</h2>';
                            echo '<input type="hidden" name="productoid" id="productoid"  value="' . $current['productoid'] . '"  readonly />';
                            echo '<p>Codigo: <input type="text" name="productocodigo" id="productocodigo" value="' . $current['productocodigo'] . '"/></p>';
                            echo '<p>Nombre: <input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                            echo '<p>Tamaño: <input type="text" name="tamanonombre" id="tamanonombre" value="' . $current['tamanonombre'] . '"/></p>';
                            echo '<p>Descripcion: <input type="text" name="productodescripcion" id="productodescripcion" value="' . $current['productodescripcion'] . '"/></p>';
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
        </div>

    </div>
</body>
</html>
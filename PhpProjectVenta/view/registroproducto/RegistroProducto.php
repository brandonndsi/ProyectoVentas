<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Producto </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <?php
    include '../../business/productobusiness/ProductoBusiness.php';
    ?>
</head>
<body>
    <?php
    $productoBusiness = new ProductoBusiness();
    ?>
    <div class="nuevo"> 
        <p>
        <form  action="../../business/productoaccion/ProductoAccion.php" method="Post" >
            <strong>
                <h2>
                    Nuevo producto.
                </h2>  
            </strong>
            <p> <table width="50%" border="0">
                <thead>
                    <tr>
                        <th class="primerfila" >Codigo</th>
                        <th class="primerfila" >Producto</th>
                        <th class="primerfila" >Precio</th>
                        <th class="primerafila" >Ingredientes</th>
                        <th class="primerafila" >Accion</th>

                    </tr>
                </thead>           
                <tr>
                    <td><input type="text" name="productocodigo" size="10" class="productocodigo" placeholder="P+numero"/> </td>
                    <td><input type="text" name="productonombre" size="10" class="productonombre" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="productoprecio" size="10" class="productoprecio" placeholder="Solo numeros"/> </td>
                    <td><SELECT NAME="ingredientes">
                            <?php
                            $allBusiness = $productoBusiness->mostrarMaterial();

                            foreach ($allBusiness as $current) {

                                echo '<option>' . $current['materiaprimanombre'] . '</option>';
                            }
                            ?>
                        </SELECT>
                    </td>
                    <th class="bot"> <td><input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></th>
                </tr> 

            </table>
            <p>&nbsp;</p> 


        </form>

    </div>
    <div class="mostrar">

        <?php
        $allBusiness = $productoBusiness->mostrarProductos();
        echo '<h2>Lista de Productos</h2>';
        echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post" id="mostrar">';
        echo'<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th><th>Codigo</th><th>Nombre</th><th>Precio</th>';
        foreach ($allBusiness as $current) {
            echo '</tr>';
            echo '</thead>';
            echo '<tr>';
            echo '<th >' . $current['productoid'] . '</th>';
            echo '<th>' . $current['productocodigo'] . '</th>';
            echo '<th>' . $current['productonombre'] . '</th>';
            echo '<th>' . $current['productoprecio'] . '</th>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</form>';
        echo '<h2>Buscar Producto</h2>';
        echo '<form method="post" action="RegistroProducto.php">';
        echo '<input type="text" name="productoid" id="productoid" placeholder="ID/Nombre"/>';
        echo '<tr>';

        echo '<td><input type="submit" value="Buscar" name="buscar" id="buscar"/></td>';
        echo '</tr>';
        echo '</form>';
        if ($_POST) {
            $productoid = $_POST['productoid'];
            if (isset($productoid)) {
                $buscarBusiness = $productoBusiness->buscarProducto($productoid);
                foreach ($buscarBusiness as $current) {
                    echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post">';
                    echo '<p> ID: <input type="text" name="productoid" id="productoid" value="' . $current['productoid'] . '"  readonly /></p>';
                    echo '<p> Codigo: <input type="text" name="productocodigo" id="productocodigo" value="' . $current['productocodigo'] . '"/></p>';
                    echo '<p> Nombre: <input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '"/></p>';
                    echo '<p> Precio: <input type="text" name="productoprecio" id="productoprecio" value="' . $current['productoprecio'] . '"/></p>';
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

    <p> <a href="../../index.php">Regresar</a> </p>

<tr>
    <td></td>
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
        } else if (isset($_GET['ErrorNumero'])) {
            echo '<center><p style="color: red">El precio debe ser solo numeros enteros.</p></center>';
        }
        ?>
    </td>
</tr>
</table>
</body>

</html>
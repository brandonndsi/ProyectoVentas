<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Producto </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <link rel="stylesheet" type="text/css" href="../../css/producto.css">

<?php
  include '../../business/productobusiness/ProductoBusiness.php';
  ?>
    
</head>
<body align="center">
<?php
$productoBusiness = new ProductoBusiness();
?>
       <div class="nuevo"> 
    <p align="center">
    <form  action="../../business/productoaccion/ProductoAccion.php" method="Post" align="center" >
        <strong>
            <h2>
               Nuevo producto.
            </h2>  
        </strong>
        <p> <table width="50%" border="0" align="center">
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
                        
                    echo '<option>'.$current['materiaprimanombre'].'</option>';
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
            //$productoBusiness = new ProductoBusiness();
            $allBusiness = $productoBusiness->mostrarProductos();
                echo '<h2>Formulario de carga de datos actualizar y eliminar</h2>';
            foreach ($allBusiness as $current) {
                echo '<tr>';
                echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post" align="center"  >';
                echo '<input type="text" name="productoid" id="productoid" size="4" value="' . $current['productoid'] . '" readonly />';
                echo '<input type="text" name="productocodigo" id="productocodigo"  size="4" value="' . $current['productocodigo'] . '"/>';
                echo '<input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '"/>';
                echo '<input type="text" name="productoprecio" id="productoprecio" size="4"  value="' . $current['productoprecio'] . '"/>';
                echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                echo '</tr>';
                echo '</form>';

            }

                echo '<h2>Buscar un solo Producto</h2>';
                echo '<form method="post" action="RegistroProducto.php" align="center" >';
                echo '<input type="text" name="productoid" id="productoid" placeholder="    id/codigo/precio" />';
                echo '<tr>';

                echo '<td><input type="submit" value="Enviar" name="buscar" id="buscar"/></td>';
                echo '</tr>';
                echo '</form>';

                if($_POST){
                $productoid=$_POST['productoid'];
                if(isset($productoid)){
                $buscarBusiness=$productoBusiness->buscarProducto($productoid);
                foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post" align="center" >';
                echo '<tr>';
                echo '<input type="text" name="productoid" id="productoid" size="4"  value="' . $current['productoid'] . '" readonly />';
                echo '<input type="text" name="productocodigo" id="productocodigo"  size="4" value="' . $current['productocodigo'] . '"/>';
                echo '<input type="text" name="productonombre" id="productonombre" value="' . $current['productonombre'] . '"/>';
                echo '<input type="text" name="productoprecio" id="productoprecio" size="4"  value="' . $current['productoprecio'] . '"/>';
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
                        }else if (isset($_GET['ErrorNumero'])){
                          echo '<center><p style="color: red">El precio debe ser solo numeros enteros.</p></center>';  
                        }
                    ?>
                </td>
            </tr>
       </table>
    <footer>
    </footer>
</body>

</html>
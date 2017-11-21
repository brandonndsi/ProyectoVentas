<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <!--CSS-->    
        <link rel="stylesheet" href="../../css/estilo.css">
        <title>Orden de Compra</title>
        <?php
        include '../../business/productobusiness/ProductoBusiness.php';
        ?>
    </head>
    <body>  

        <?php
        $productoBusiness = new ProductoBusiness();
        $allBusiness = $productoBusiness->mostrarProductos();
        ?>

        <div class="form-group">

            <center>
                <h2>
                    <div id="container">
                        <table width="80%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                            <a>Productos mas Vistos</a>
                            <br>   
                            <a href="../registroeventotoview/RegistroEventoView.php" class="btn btn-info">Agregados</a>
                            <a> </a>
                            <a href="../productonocompradosview/productoNoCompradoView.php"  class="btn btn-info">Eliminados</a>
                            <a> </a>
                            <a href="../registrotipoproducto/RegistroTipoProducto.php"  class="btn btn-info">Mas Vistos</a>
                            <a> </a>
                            <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a> <span style="font-size:16px;" class="pull-right glyphicon glyphicon-home"></span></a>          
                            </tr>
                            <tr>
                                <td width="200" align="right">
                                    <form action="OrdenCompraView.php" method="post">
                                        <input type="text" name="consulta" style="border:1px solid #CCC; color: #333; width:210px; height:30px;" placeholder="Buscar Producto..." />
                                        <input type="submit" class="btn btn-info" value="Buscar" name="buscar" id="buscar"/>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </h2>
            </center>
            <center>
                <form  action="../../business/productoaccion/ProductoAccion.php" method="Post" >
                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="70%" style="border:1px solid #030; color:#033;">
                        <thead>
                            <tr>
                                <th colspan="8" align="center" height="55px" style="border-bottom:1px solid #030; background: #030; color:#FFF;"> Seleccione los Productos </th>
                            </tr>
                            <tr height="30px">
                                <th></th>
                                <th style="border-bottom:1px solid #333;"> Categoria </th>
                                <th style="border-bottom:1px solid #333;"> Nombre </th>
                                <th style="border-bottom:1px solid #333;"> Tamano </th>
                                <th style="border-bottom:1px solid #333;"> Precio </th>
                                <th style="border-bottom:1px solid #333;"> Stock </th>
                                <th style="border-bottom:1px solid #333;"> Hacer Pedido </th>
                            </tr>
                            <?php foreach ($allBusiness as $current): ?>
                                <tr>
                                    <td><input type="hidden" name="productoid"  class="productoid" value="<?php echo $current['productoid']; ?>" readonly  /> </td>
                                    <td><input type="text" name="categoriaproductonombre"  class="categoriaproductonombre" value="<?php echo $current['categoriaproductonombre']; ?>" readonly /> </td>
                                    <td><input type="text" name="productonombre"  class="productonombre" value="<?php echo $current['productonombre']; ?>" readonly /> </td>
                                    <td><input type="text" name="tamanonombre"  class="tamanonombre" value="<?php echo $current['tamanonombre']; ?>" readonly /> </td>
                                    <td><input type="text" name="productoprecio"  class="productoprecio" value="<?php echo $current['productoprecio']; ?>" readonly /> </td>
                                    <td><input type="text" name="productocantidad"  class="productocantidad" value="<?php echo $current['productocantidad']; ?>" readonly /> </td>         
                                    <td><a href="?action=registrar" class="btn btn-danger">Elegir</a></td>
                                </tr> 
                            <?php endforeach ?> 
                            <tr align="center" style="height:35px">
                                <td style="border-bottom:1px solid #333;"> </td>
                                <td style="border-bottom:1px solid #333;">  </td>
                                <td style="border-bottom:1px solid #333;"> </td>
                                <td style="border-bottom:1px solid #333;"> </td>
                                <td style="border-bottom:1px solid #333;"> </td>
                                <td style="border-bottom:1px solid #333;"> </td>
                                <td></td>
                            </tr>
                        </thead>    
                    </table>
                </form>
            </center>
        </div
        <?php
        if (isset($_REQUEST['action'])) {
            switch ($_REQUEST['action']) {

                case 'registrar':

                    echo '<form  action="../../business/productoaccion/ProductoAccion.php" method="Post">';
                    echo '<table border="0" align="center"> ';
                    echo '<tr>';
                    echo '<td align="right"> Fecha Actual: </td>';
                    echo ' <td> <input type="text" name="facturafecha" id="facturafecha" value="" readonly> </td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td align="right">Cliente:</td>';
                    echo '<td>';
                    echo '<select name = "clientes" id = "clienteid" readonly>';
                    echo '<option></option>';
                    echo '</select>';
                    echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td align = "right">Categoria:</td>';
                    echo '<td><input type = "text" id = "categoriaproductonombre" name = "categoriaproductonombre" value = "" readonly><br></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td align = "right">Nombre Producto:</td>';
                    echo '<td><input type = "text" id = "productonombre" name = "productonombre" value = "" readonly><br></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td align = "right">Cantidad:</td>';
                    echo '<td><input type = "text" id = "ventacantidad" name = "ventacantidad" value = "" placeholder = "Cantidad" required></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<tr>';
                    echo '<td align = "right">Precio Venta:</td>';
                    echo '<td><input type = "text"  value = "" readonly><br></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td align = "right">Descuento:</td>';
                    echo '<td><input type = "text" id = "clientedescuento" name = "clientedescuento" value = "" required></td>';
                    echo '</tr>';
                    echo '<td align = "right">Monto Total Neto:</td>';
                    echo '<td><input type = "text" id = "facturaneta" name = "facturaneta" value = "" readonly></td>';
                    echo '<td><input type = "submit" class="btn btn-warning" name = "calculate" value = "Calcular" id = "btncalc"></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td align = "right">Monto con que Paga:</td>';
                    echo '<td><input type = "text" placeholder = "Monto Recibido"></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td align = "right">Devolver:</td>';
                    echo '<td><input type = "text" value = "" readonly></td>';
                    echo '</tr>';
                    echo '<br>';
                    echo '<tr  align="center">';
                    echo ' <td>&nbsp;  </td>';
                    echo '<td>';
                    echo '<br>';
                    echo '<input type="button" class="btn btn-success" height:40px; width:105px; border-radius:3px;  name="nuevo" id="nuevo" value="Agregar">';
                    echo '</form>';
                    echo '<input type="button" class="btn btn-danger" height:40px; width:105px; border-radius:3px; value="Cancelar"></a>';
                    echo '</td>';
                    echo '</tr>';
                    echo '</table>';
            }
        }
        ?>

    </body>
</html>

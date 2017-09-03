<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Factura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
</head>

<body >
    <p align="center">
    <form name="form" action="../business/facturaAccion.php" method="Post">
        <strong>
            <p>
                Procesando pedido...
            <p>  
        </strong>
        <p> ID Factura: <input type="text" name="facturaid" size="45"  placeholder="8888" />
        </p>
        <p> <table width="50%" border="0" align="letf">
             <thead>
                <tr>
                    <th class="primerfila" >Codigo</th>
                    <th class="primerfila" >Cantidad</th>
                    <th class="primerfila" >Producto</th>
                    <th class="primerfila" >Precio</th>
                    <th class="sin" >&nbsp;</th>
                    <th class="sin" >&nbsp;</th>
                    <th class="sin" >&nbsp;</th>                
                </tr>
            </thead>           
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    
                    
                    
                </tr>
                <tr>
                    <td><output type="text" name="codigo" size="10" class="centrado"/> </td>
                    <td><output type="text" name="cantidad" size="10" class="centrado"/> </td>
                    <td><output type="text" name="producto" size="10" class="centrado"/> </td>
                    <td><output type="text" name="codigo" size="10" class="centrado"/> </td>
                    <td> </td>                    
                </tr> 
                           
        </table>
        <p>&nbsp;</p>    
        <br>
        </p>
        <p> Total Venta: <output type="text" name="ventatotal" size="45" />
        </p>
        <p> Cancela con: <output type="text" name="ventaparacon" size="45"  />
        </p>
        <p> Cambio: <output type="text" name="ventavuelo" size="45"  />
        </p>
        <p> Cliente: <output type="text" name="cliente" size="45" />
        </p>
        <p> Zona: <output type="text" name="zonoid" size="45"  />
        </p>
        <input name="procesar" type="submit" value="Procesar">
        
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
        <?php
        ?>
    </form>

    <footer>
    </footer>
</body>
</html>


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
                    <td><input type="text" name="codigo" size="10" class="centrado"/> </td>
                    <td><input type="text" name="cantidad" size="10" class="centrado"/> </td>
                    <td><input type="text" name="producto" size="10" class="centrado"/> </td>
                    <td><input type="text" name="codigo" size="10" class="centrado"/> </td>
                    <td> </td>                    
                </tr> 
                           
        </table>
        <p>&nbsp;</p>    
        <br>
        </p>
        <p> Total Venta: <input type="text" name="ventatotal" size="45" required/>
        </p>
        <p> Cancela con: <input type="text" name="ventaparacon" size="45" required />
        </p>
        <p> Cambio: <input type="text" name="ventavuelo" size="45" required />
        </p>
        <p> ID Factura: <input type="text" name="facturaid" size="45" required />
        </p>
        <p> Cliente: <input type="text" name="cliente" size="45" required />
        </p>
        <p> Zona: <input type="text" name="zonoid" size="45" required />
        </p>
        <input name="create" type="submit" value="Procesar">
        
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
        <?php
        ?>
    </form>

    <footer>
    </footer>
</body>
</html>


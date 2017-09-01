<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Venta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body >
    <p align="center">
    <form name="form" action="../business/clienteAccion.php" method="Post">
        <strong>
            <p>
                Tomando orden de Express..
            <p>  
        </strong>
        <p> Codigo Producto: <input type="text" name="producto" size="20" required/> 
            Cantidad: <input type="text" name="producto" size="10" required/>
        </p>
        <p><input name="create" type="submit" value="Agregar"></p>
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
        <p><a href="facturaventa/FacturaVenta.php" onClick="window.open(this.href, 'width=450,height=300'); return false;">
           <input type="button" value="Procesar Pedido"></a>
        </p>
        
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
    </form>

    <footer>
    </footer>
</body>
</html>


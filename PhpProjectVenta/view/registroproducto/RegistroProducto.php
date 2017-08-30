<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Producto </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
</head>

<body >
         
    <p align="center">
    <form name="form" action="business/productoaccion/ProductoAccion.php" method="Post">
        <strong>
            <p>
               Registrando Producto
            <p>  
        </strong>
        <p> <table width="50%" border="0" align="letf">
             <thead>
                <tr>
                    <th class="primerfila" >Codigo</th>
                    <th class="primerfila" >Producto</th>
                    <th class="primerfila" >Precio</th>
                    <th class="sin" >&nbsp;</th>
                    <th class="sin" >&nbsp;</th>
                    <th class="sin" >&nbsp;</th>                    
                    <th class="sin" >&nbsp;</th>
                    <th class="sin" >&nbsp;</th>                
                </tr>
            </thead>           
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    
                    <th class="bot"> <input type="button" name="del" id="del" value="Eliminar"></th> 
                    <th class="bot"> <input type="button"  name="up" id="up" value="Modificar"></th> 
                    
                </tr>
                <tr>
                    <td><input type="text" name="codigo" size="10" class="centrado"/> </td>
                    <td><input type="text" name="producto" size="10" class="centrado"/> </td>
                    <td><input type="text" name="codigo" size="10" class="centrado"/> </td>
                    <th class="bot"> <input type="submit" name="del" id="del" value="Agregar"></th>
                </tr> 
           
        </table>
        <p>&nbsp;</p> 
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
        <?php
        ?>
    </form>

    <footer>
    </footer>
</body>
</html>

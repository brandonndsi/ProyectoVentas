<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Catalogo </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   
</head>

<body >
     <?php
    include ("conexion.php");
    ?>
    
    <p align="center">
    <form name="form" action="../business/catalogoAccion.php" method="Post">
        <strong>
            <p>
               Esta es una muestra del menu
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
                </tr>
                <tr>
                    
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

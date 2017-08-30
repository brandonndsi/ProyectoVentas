<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Zona</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
</head>

<body >
    <p align="center">
    <form name="form" action="business/zonaaccion/zonaAction.php" method="Post">
        <strong>
            <p>
                Registrando Datos de Zona
            <p>  
        </strong>
        <p> ID: <input type="text" name="ventaid" size="35"/>
        </p>         
        <p> Nombre: <input type="text" name="nombre" size="35" required/>
        </p>
        <p> Precio: <input type="text" name="precio" size="35" required/> 
        </p>
       
        <input name="create" type="submit" value="Registrar">
        <input name="create" type="submit" value="Modificar">
        <input name="create" type="submit" value="Eliminar">
        <input name="create" type="submit" value="Mostrar">
        
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
        <?php
        ?>
    </form>

    <footer>
    </footer>
</body>
</html>


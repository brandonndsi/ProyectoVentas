<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Vehiculo </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
</head>

<body >
    <p align="center">
    <form name="form" action="../business/clienteAccion.php" method="Post">
        <strong>
            <p>
               Registrando Vehiculo
            <p>  
        </strong>
        <p> ID: <input type="text" name="vehiculoid" size="45" required/>
        </p>         
        <p> Placa: <input type="text" name="vehiculoplaca" size="45"/>
        </p>
        <p> Marca: <input type="text" name="vehiculomarca" size="45"/>
        </p>
        <p> Modelo: <input type="text" name="vehiculomodelo" size="45"/>
        </p>
        <br>        
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


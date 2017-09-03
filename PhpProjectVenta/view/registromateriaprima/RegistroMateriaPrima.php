<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Materia Prima</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
</head>

<body >
    <p align="center">
    <form name="form" action="../business/clienteAccion.php" method="Post">
        <strong>
            <p>
                Formulario para insertar nueva Materia Prima a la base de datos.
            <p>  
        </strong>
        <p> ID: <input type="text" name="materiaprimaid" size="45"/>
        </p>
        <p> Tipo Materia Prima: <input type="text" name="$tipomateriaprimacategoria" size="45" required placeholder="Cocina"/>
        </p>
        <p> Nombre Materia Prima: <input type="text" name="materiaprimanombre" size="45" required placeholder="Pan Hambuerguesa"/>
        </p>
        <p> Precio: <input type="text" name="$materiaprimaprecio" size="45" required placeholder="15000"/>
        </p>
        <p> Cantidad: <input type="text" name="apellido2" size="45" placeholder="En numeros"/>
        </p>
        <br>
        <input name="create" type="submit" value="Registrar">
        <input name="create" type="submit" value="Modificar">
        <input name="create" type="submit" value="Eliminar">
        <input name="create" type="submit" value="Mostrar">
        
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
        
    </form>

    <footer>
    </footer>
</body>
</html>
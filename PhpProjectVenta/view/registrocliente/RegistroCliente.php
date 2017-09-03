<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
</head>

<body >
    <p align="center">
    <form name="form" action="../business/clienteAccion.php" method="Post">
        <strong>
            <p>
                Formulario para insertar el cliente a la base de datos.
            <p>  
        </strong>
        <p> ID: <input type="text" name="cliented" size="45"/>
        </p>         
        <p> Nombre: <input type="text" name="nombre" size="45" required/>
        </p>
        <p> Primer Apellido: <input type="text" name="apellido1" size="45" required/>
        </p>
        <p> Segundo Apellido: <input type="text" name="apellido2" size="45" />
        </p>
        <p> Numero de Telefono: <input type="text" name="telefono" size="45" required />
        </p>
        <p> Corrreo Electronico: <input type="text" name="correo" size="45" required />
        </p>
        <p> ID Direccion: <input type="text" name="zonaid" size="45" required/>
        </p>
        <p> Direccion Exacta: <input type="text" name="zonanombre" size="45" required/>
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

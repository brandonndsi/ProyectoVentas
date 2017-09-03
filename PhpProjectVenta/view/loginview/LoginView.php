<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pagina de Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
</head>

<body >
    <p align="center">
    <form name="form" action="../business/LoginAccion.php" method="Post">
        <strong>
            <p>
               Iniciar Secion para continuar
            <p>  
        </strong>
        <p> ID: <input type="text" name="id" size="45" required/>
        </p>         
        <p> Contraseña: <input type="password" name="contrasena" size="45" required/>
        </p>
        <br>

        <input name="create" type="submit" value="Enviar">
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
        <?php
        ?>
    </form>

    <footer>
    </footer>
</body>
</html>

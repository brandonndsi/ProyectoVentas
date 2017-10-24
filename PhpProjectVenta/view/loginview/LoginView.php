<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pagina de Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

</head>

<body >
    <p align="center">
    <form name="form" action="../business/LoginAccion.php" method="Post">
        <strong>
            <h1>
                ¡Bienvenido al sistema de ventas express!
            </h1>  
        </strong>
        <p>
            Por favor inicie Secion con sus credenciales para continuar.
        <p>
        <p> ID: <input type="text" name="email" size="45" required="Escriba su correo" placeholder="empleado@express.com"/>
        </p>         
        <p> Contraseña: <input type="password" name="contrasena" size="45" required placeholder="password"/>
        </p>
        <br>

        <input name="create" class="btn btn-primary" type="submit" value="Iniciar">
        <p> <a href="javascript:window.history.go(-1);" class="btn btn-secondary">Regresar</a> </p>
        <?php
        ?>
    </form>

    <footer>
    </footer>
</body>
</html>

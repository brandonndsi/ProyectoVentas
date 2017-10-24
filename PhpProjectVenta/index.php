<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Sistema de Ventas
        </title>
    </head>
    <body>
        <?php
        /* notas importante */
        /* el carrito es de la seccion de compras por ello es que cuando el redirecciona la compra
          a lo que es el index tambien manda el carrito el cual preguntamos si esta inicializado y lo
          guardamos en una variable la cual luego servira para salir de  la seccion que teniamos */
        session_start();
        if (isset($_SESSION["carrito"])) {
            $carrito = $_SESSION["carrito"];
            session_unset($carrito);
            session_destroy();
        }
        include ('view/VentanaPrincipalView.php');
        ?>

    </body>
</html>

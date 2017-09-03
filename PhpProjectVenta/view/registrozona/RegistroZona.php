<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Zona</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

</head>

<body >
    <p align="center">
        <?php

        function revisar() {
            if (formulario . zonaid == "") {
                alert('Debes escribir el ID zona');
                return false;
            }
            if (formulario . zonanomre == "") {
                alert('Debes ecribit el nombre de la zona');
                return false;
            }
            if (formulario . zonaprecio == "") {
                alert('Debes escribir el precio de la zona');
                return false;
            }
        }
        ?>

    <form name="form" action="business/zonaaccion/zonaAction.php" method="Post" onsubmit="return revisar()">
        <strong>
            <p>
                Registrando Datos de Zona
            <p>  
        </strong>

        <p> ID: <input type="text" name="zonaid" size="35" placeholder="Solo numeros"/>
        </p>         
        <p> Nombre: <input type="text" name="zonanombre" size="35" required placeholder="Solo letras" />
        </p>
        <p> Precio: <input type="text" name="zonaprecio" size="35" required placeholder="Solo numeros"/> 
        </p>

        <input name="create" type="submit" value="Registrar">
        <input name="create" type="submit" value="Modificar">
        <input name="create" type="submit" value="Eliminar">
        <input name="create" type="submit" value="Mostrar">

        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
<?php ?>
    </form>

    <footer>
    </footer>
</body>
</html>


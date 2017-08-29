<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rapidos Expres Empleados </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include "../view/..";
    ?>
</head>

<body>
    <p align="center">
    <form>
        <strong>
            <p>
                Hora de Trabajar!
            <p> 
                <br>
            <p>
                Selecione la opcion deseada:
            <p>
        </strong>
        <p><a href="ventaview/VentaView.php" onClick="window.open(this.href, 'width=450,height=300'); return false;">
           <input type="button" value="Realizar Venta"></a>
        </p>
        <p><a href="registrocliente/RegistroCliente.php" onClick="window.open(this.href, 'width=450,height=300'); return false;">
                <input name="Gestionar Cliente" type="submit" value="Gestionar Cliente"></a>
        </p>
        <p><a href="catalogo/Catalogo.php" onClick="window.open(this.href, 'width=450,height=300'); return false;">
           <input type="button" value="Catalogo"></a>
        </p>

        <br>
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>

    </form>
    <?php
    
    ?>
    <footer>
    </footer>
</body>
</html>
<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rapidos Expres </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <script src="../js/jquery/jquery-3.2.1.min.js"></script>
    <?php
    //include ("registroproducto/RegistroProducto.php");
    
    ?>
</head>

<body>
    <p align="center">
    <form>
        <strong>
            <p>
                Bienvenido Administrador !
            <p> 
                <br>
            <p>
                Selecione la opcion deseada:
            <p>
        </strong>
        <p><a  href="view/ventaview/VentaView.php" target="_parent">
           <input type="button" value="Realizar Venta"></a>
        </p>
        <p> <a  href="view/registroproducto/RegistroProducto.php" target="_parent">
               <input name="Gestionar Producto" type="button" value="Gestionar Producto" > </a><!--onclick="location.href=RegistrarProduto.php"-->
            <a  href="view/registrozona/RegistroZona.php" target="_parent">
               <input name="Gestionar Zona" type="button" value="Gestionar Zona"></a>
            <a href="view/registrovehiculo/RegistroVehiculo.php" target="_parent">
                <input name="Gestionar Vehiculo" type="button" value="Gestionar Vehiculo"></a>
        </p>
        <p>
            <a href="view/registrocliente/RegistroCliente.php" target="_parent">
                <input name="Gestionar Cliente" type="button" value="Gestionar Cliente"></a>
            <a href="view/registroempleado/RegistroEmpleado.php" target="_parent">
            <input name="Gestionar Empleado" type="button" value="Gestionar Empleado"></a>
            <a href="view/registroproveedor/RegistroProveedor.php" target="_parent">
            <input name="Gestionar Proveedor" type="button" value="Gestionar Proveedor"></a> 
        </p>

        <br>
        <p> <a href="index.php">Regresar</a> </p>

    </form>

    <?php
    
    ?>
    <footer>
    </footer>
</body>
</html>

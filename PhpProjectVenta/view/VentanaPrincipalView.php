<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rapidos Expres </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
        <p><a  href="view/registroproducto/RegistroProducto.php" target="_parent">
           <input type="button" value="Realizar Venta"></a>
        </p>
        <p> <a  href="view/registroproducto/RegistroProducto.php" target="_parent">
               <input name="Gestionar Producto" type="button" value="Gestionar Producto" > </a><!--onclick="location.href=RegistrarProduto.php"-->
            <a  href="view/registrozona/RegistroZona.php" target="_parent">
               <input name="Gestionar Zona" type="submit" value="Gestionar Zona"></a>
            <a href="view/registrovehiculo/RegistroVehiculo.php" target="_parent">
                <input name="Gestionar Vehiculo" type="submit" value="Gestionar Vehiculo"></a>
        </p>
        <p>
            <a href="registrocliente/RegistroCliente.php" onClick="window.open(this.href, 'width=450,height=300'); return false;">
                <input name="Gestionar Cliente" type="submit" value="Gestionar Cliente"></a>
            <a href="registroempleado/RegistroEmpleado.php" onClick="window.open(this.href, 'width=450,height=300'); return false;">
            <input name="Gestionar Empleado" type="submit" value="Gestionar Empleado"></a>
            <a href="registroproveedor/RegistroProveedor.php" onClick="window.open(this.href, 'width=450,height=300'); return false;">
            <input name="Gestionar Proveedor" type="submit" value="Gestionar Proveedor"></a> 
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

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
        <p><a  href="ventaview/VentaView.php" target="_parent">
                <input name="RealizarVenta" type="button" value="Realizar Venta"></a>
            <a  href="registromateriaprima/RegistroMatreiaPrima.php" target="_parent">
                <input name="Registro Materia Prima" type="button" value="Registro Materia Prima"></a>
            <a href="tipoempleadoview/TipoEmpleadoView.php" target="_parent">
                <input name="VerTipoEmpleado" type="button" value="Ver Tipo Empleado"></a> 
        </p>
        <p> <a  href="registroproducto/RegistroProducto.php" target="_parent">
                <input name="Gestionar Producto" type="button" value="Gestionar Producto" > </a><!--onclick="location.href=RegistrarProduto.php"-->
            <a  href="registrozona/RegistroZona.php" target="_parent">
                <input name="Gestionar Zona" type="button" value="Gestionar Zona"></a>
            <a href="registrovehiculo/RegistroVehiculo.php" target="_parent">
                <input name="Gestionar Vehiculo" type="button" value="Gestionar Vehiculo"></a>
        </p>
        <p>
            <a href="registrocliente/RegistroCliente.php" target="_parent">
                <input name="Gestionar Cliente" type="button" value="Gestionar Cliente"></a>
            <a href="registroempleado/RegistroEmpleado.php" target="_parent">
                <input name="Gestionar Empleado" type="button" value="Gestionar Empleado"></a>
            <a href="registroproveedor/RegistroProveedor.php" target="_parent">
                <input name="Gestionar Proveedor" type="button" value="Gestionar Proveedor"></a> 
        </p>
        <p>
            
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

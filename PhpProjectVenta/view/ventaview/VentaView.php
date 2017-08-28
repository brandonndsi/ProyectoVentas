<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include "../business/clienteBusiness.php";
    ?>
</head>

<body >
    <p align="center">
    <form name="form" action="../business/clienteAccion.php" method="Post">
        <strong>
            <p>
                Procesando pedido. LLenar todos los campos..
            <p>  
        </strong>
        <p> ID: <input type="text" name="ventaid" size="45"/>
        </p>         
        <p> Empleado: <input type="text" name="nombre" size="45" required/>
        </p>
        <p> Codigo Producto: <input type="text" name="producto" size="20" required/> 
            Cantidad: <input type="text" name="producto" size="10" required/>
        </p>
        <p><input name="create" type="submit" value="Agregar"></p>
        <p> Total Venta: <input type="text" name="ventatotal" size="45" required/>
        </p>
        <p> Cancela con: <input type="text" name="ventaparacon" size="45" required />
        </p>
        <p> Cambio: <input type="text" name="ventavuelo" size="45" required />
        </p>
        <p> ID Factura: <input type="text" name="facturaid" size="45" required />
        </p>
        <p> Cliente: <input type="text" name="cliente" size="45" required />
        </p>
        <p> Zona: <input type="text" name="zonoid" size="45" required />
        </p>
        <input name="create" type="submit" value="Procesar">
        <?php
        ?>
    </form>

    <footer>
    </footer>
</body>
</html>


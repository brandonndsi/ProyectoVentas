<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Tipo Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
</head>

<body >
    <p align="center">
    <form name="form" action="business/tipoempleadoaccion/tipoempleadozonaAction.php" method="Post">
        <strong>
            <p>
                Datos de cada puesto.
            <p>  
        </strong>
        <p> Tipo de Empleado: <input type="text" name="tipoEmpleado" size="35" required placeholder="Solo letras"/>
        </p>         
        <p> Salario Base: <input type="text" name="tipoempleadosalariobase" size="35" required placeholder="Solo letras" />
        </p>
        <p> Descripcion de puesto: <input type="text" name="tipoempleadodescripcion" size="35" required placeholder="Solo numeros"/> 
        </p>
        <p> Tipo de hora extra: <input type="text" name="tipoempleadohoraextra" size="35" required placeholder="Solo numeros"/> 
        </p>
       
        <input name="create" type="submit" value="Registrar">
        <input name="create" type="submit" value="Modificar">
        <input name="create" type="submit" value="Eliminar">
        <input name="create" type="submit" value="Mostrar">
        
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
        <?php
        ?>
    </form>

    <footer>
    </footer>
</body>
</html>




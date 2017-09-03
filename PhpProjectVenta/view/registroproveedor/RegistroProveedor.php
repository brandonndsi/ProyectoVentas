<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Proveedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body >
    <p align="center">
    <form name="form" action="../business/clienteAccion.php" method="Post">
        <strong>
            <p>
                Formulario para insertar el Proveedor a la base de datos.
            <p>  
        </strong>
        <p> ID: <input type="text" name="proveedorid" size="45" placeholder="8888"/>
        </p>         
        <p> Nombre: <input type="text" name="personaNombre" size="45" required placeholder="Pedro"/>
        </p>
        <p> Primer Apellido: <input type="text" name="personaApellido1" size="45" required placeholder="Rojas"/>
        </p>
        <p> Segundo Apellido: <input type="text" name="personaApellido2" size="45" placeholder="Rojas"/>
        </p>
        <p> Numero de Telefono: <input type="text" name="personaTelefono" size="45" required placeholder="sin espacios ni guiones" />
        </p>
        <p> Corrreo Electronico: <input type="text" name="correo" size="45" required placeholder="PedroRojas@espress.com" />
        </p>
        <p> Direccion Exacta: <input type="text" name="idzona" size="45" required placeholder="Distrito, barrio, mas señas"/>
        </p>
        <p> Tipo Materia Prima: <input type="text" name="tipomateriaprima" size="45" requiredplaceholder="Limpieza, Cocina, otro"/>
        </p>
        
        <br>
        <input name="create" type="submit" value="Registrar">
        <input name="create" type="submit" value="Modificar">
        <input name="create" type="submit" value="Eliminar">
        <input name="create" type="submit" value="Mostrar">
        
        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>
        
    </form>

    <footer>
    </footer>
</body>
</html>

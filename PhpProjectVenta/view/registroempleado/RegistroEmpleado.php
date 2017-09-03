<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registrar Empleado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<body >
    <p align="center">
    <form name="form" action="../business/clienteAccion.php" method="Post">
        <strong>
            <p>
                Formulario para insertar el Empleado a la base de datos.
            <p>

        </strong>

        <p> ID: <input type="text" name="empleadoid" size="45"/>
        </p>         
        <p> Nombre: <input type="text" name="personaNombre" size="45" required/>
        </p>
        <p> Primer Apellido: <input type="text" name="personaApellido1" size="45" required/>
        </p>
        <p> Segundo Apellido: <input type="text" name="personaApellido2" size="45" />
        </p>
        <p> Numero Cedula: <input type="text" name="empleadocedula" size="45"/>
        </p>
        <p> Tipo Empleado: <input type="text" name="tipoempleado" size="45" required/>
        </p>
        <p> Contraseña de Sistema: <input type="text" name="empleadocontrasenia" size="45" required/>
        </p>
        <p> Edad: <input type="text" name="empleadoedad" size="45" required />
        </p>
        <p> Numero de Telefono: <input type="text" name="personaTelefono" size="45" required />
        </p>
        <p> Corrreo Electronico: <input type="text" name="correo" size="45" required />
        </p>
        <p>Sexo: <input type="radio" name="sexo" value="hombre" checked="checked" /> Hombre
        <input type="radio" name="empleadosexo" value="mujer" /> Mujer
        </p>
        <p> Estado civil: <input type="text" name="empleadoestadocivil" size="45"/>
        </p>
        <p> Numero de cuenta Bancaria: <input type="text" name="empleadocuentabancaria" size="45" required/>
        </p>
        <p> ID Direccion: <input type="text" name="zonaid" size="45" required/>
        </p>
        <p> Direccion Exacta: <input type="text" name="zonanombre" size="45" required/>
        </p>
        <p> Precio Zona: <input type="text" name="zonaprecio" size="45" required/>
        </p>
        <p> Tipo de liciencia de conducir: <input type="text" name="empleadolicenciaid" size="45" required/>
        </p>
        <p> Vigencia Licencia: <input type="text" name="empleadolicenciavigencia" size="45" required/>
        </p>
        <p> vehiculo Id: <input type="text" name="vehiculoid" size="45" required/>
        </p>
        <br>
        
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

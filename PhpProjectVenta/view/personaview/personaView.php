<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ventana Cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
    include "../business/clienteBusiness.php";
    ?>
</head>

<body  bgcolor="#303030" text="E5E5E5" font face="tahoma" font size="3">
    <p align="center">
    <form name="form" action="../business/clienteAccion.php" method="Post">
        <strong>
        <h2>
            Formulario para insertar el cliente a la base de datos.
        </h2>
            <hr size="8" color="ffffff" width="100%" align=" left">
            </strong>
        <h5>
            Nombre: 
            <input name="nombrePersona" type="text" size="45" required>
        </h5>
        <h5>
            Primer Apellido: 
            <input name="apellido1Persona" type="text" size="45" required>
        </h5>
        <h5>
            Segundo apellido: 
            <input name="apellido2Persona" type="text" size="45" required>
        </h5>
        <h5>
            Tipo de Usuario: 
            <input name="tipoUsuarioPersona" type="text" size="45" required>
        </h5>
        <h5>
            Zona: 
            <input name="idzona" type="text" size="45" required>
        </h5>
        <h5>
            TelefonoPersona: 
            <input name="telefono Persona" type="text" size="45" required>
        </h5>
        
        <hr size="4" color="ffffff" width="100%" align="left">
        <input name="create" type="submit" value="Enviar">
        <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyField") {
                            echo '<p style="color: red">Campo(s) vacio(s)</p>';
                        } else if ($_GET['error'] == "numberFormat") {
                            echo '<p style="color: red">Error, formato de numero</p>';
                        } else if ($_GET['error'] == "dbError") {
                            echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                        }
                    } else if (isset($_GET['success'])) {
                        echo '<p style="color: green">Transacción realizada</p>';
                    }
                    ?>
    </form>
        
        
    </p>
    <footer>
    </footer>
</body>
</html>

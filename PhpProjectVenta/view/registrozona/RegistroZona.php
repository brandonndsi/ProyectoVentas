<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Zona</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <?php
    include '../../business/zonabusiness/zonaBusiness.php';
    ?>

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
                alert('Debes ecribir el nombre de la zona');
                return false;
            }
            if (formulario . zonaprecio == "") {
                alert('Debes escribir el precio de la zona');
                return false;
            }
        }
        ?>

    <form name="form" action="../../business/zonaaccion/zonaAction.php" method="Post" onsubmit="return revisar()">
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

        <input name="nuevo" type="submit" value="Registrar" id="nuevo">

        <p> <a href="javascript:window.history.go(-1);">Regresar</a> </p>

    </form>
    <?php
    $zonaBusiness = new zonaBusiness();
    $allBusiness = $zonaBusiness->mostrarZona();
    echo '<h2>Lista de Zonas</h2>';
    foreach ($allBusiness as $current) {
        echo '<form  action="../../business/zonaaccion/ZonaAccion.php" method="Post" align="center" >';
        echo '<input type="text" name="zonaid" id="zonaid" value="' . $current['zonaid'] . '"/>';
        echo '<input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/>';
        echo '<input type="text" name="zonaprecio" id="zonaprecio" value="' . $current['zonaprecio'] . '"/>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
    }

    if ($_POST) {
        $zonaid = $_POST['zonaid'];
        if (isset($zonaid)) {
            $buscarBusiness = $zonaBusiness->buscarZona($zonaid);
            foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/zonaccion/ZonaAccion.php" method="Post" align="center" >';
                echo '<input type="text" name="zonaid" id="zonaid" value="' . $current['zonaid'] . '"/>';
                echo '<input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/>';
                echo '<input type="text" name="zonaprecio" id="zonaprecio" value="' . $current['zonaprecio'] . '"/>';
                echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                echo '</tr>';
                echo '</form>';
            }
        }
    }
    ?>
    <p> <a href="../../index.php">Regresar</a> </p>

    <footer>
    </footer>
</body>
</html>


<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Zona</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/zona.css">

    <?php
    include '../../business/zonabusiness/zonaBusiness.php';
    ?>

</head>

<body align="center">
    <?php
    $zonaBusiness = new zonaBusiness();
    ?>
    <div class="nuevo"> 
        <p align="center">
            
        <form  action="../../business/zonaaccion/zonaAction.php" method="Post" align="center" >
            <strong>
                <h2 align="center">
                    Formulario para insertar las zonas a la base de datos.
                </h2>  
            </strong>
            <p> <table width="50%" border="0" align="center">
                <thead>
                    <tr>
                        <th class="primerfila" >Nombre</th>
                        <th class="primerfila" >Precio</th>

                    </tr>
                </thead>           

                <tr>
                    <td><input type="text" name="zonanombre" size="10" class="zonanombre" placeholder="Solo letras"/> </td>
                    <td><input type="text" name="zonaprecio" size="10" class="zonaprecio" placeholder="Solo numeros"/> </td>
                    <th class="bot"> <td><input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></th>
                </tr> 

            </table>
            <p>&nbsp;</p> 


        </form>

    </div>
    <?php
    $allBusiness = $zonaBusiness->mostrarZona();
        echo '<h2 align="center">Lista de Zonas</h2>';

        echo '<form  action="../../business/zonaaccion/zonaAction.php" method="Post" align="center" id="mostrar">';
        echo'<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID</th><th>Nombre</th><th>Precio</th>';
        foreach ($allBusiness as $current) {
            echo '</tr>';
            echo '</thead>';
            echo '<tr>';
            echo '<th >' . $current['zonaid'] . '</th>';
            echo '<th>' . $current['zonanombre'] . '</th>';
            echo '<th>' . $current['zonaprecio'] . '</th>';
            echo '</tr>';
        }
        echo '</table>';

        echo '</form>';

        echo '<h2 align="center">Buscar Zona</h2>';
        echo '<form method="post" action="RegistroZona.php" align="center" >';
        echo '<input type="text" name="zonaid" id="zonaid" placeholder="ID/Nombre"/>';
        echo '<tr>';

        echo '<td><input type="submit" value="Buscar" name="buscar" id="buscar"/></td>';
        echo '</tr>';
        echo '</form>';


        if ($_POST) {
            $zonaid = $_POST['zonaid'];
            if (isset($zonaid)) {
                $buscarBusiness = $zonaBusiness->buscarZona($zonaid);
                foreach ($buscarBusiness as $current) {

                    echo '<form  action="../../business/zonaaccion/zonaAction.php" method="Post" align="center" >';
                    echo '<p> ID: <input type="text" name="zonaid" id="zonaid" value="' . $current['zonaid'] . '"  readonly /></p>';
                    echo '<p> Nombre: <input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/></p>';
                    echo '<p> Precio: <input type="text" name="zonaprecio" id="zonaprecio" value="' . $current['zonaprecio'] . '"/></p>';
                    echo '<br>';
                    echo '<br>';
                    echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
                    echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
                    echo '</tr>';
                    echo '</form>';
                }
            }
        }
    ?>
    <p> <a href="../../index.php">Regresar</a> </p>
<tr>
    <td>
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
    </td>
</tr>

<footer>
</footer>
</body>
</html>


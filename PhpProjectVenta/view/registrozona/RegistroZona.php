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
               Nuevo producto.
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
    echo '<h2>Lista de Zonas</h2>';
    foreach ($allBusiness as $current) {

        echo '<form  action="../../business/zonaaccion/zonaAction.php" method="Post" align="center" >';
        echo '<input type="text" name="zonaid" id="zonaid"  size="4" value="' . $current['zonaid'] . '"  readonly />';
        echo '<input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/>';
        echo '<input type="text" name="zonaprecio" id="zonaprecio" size="4"  value="' . $current['zonaprecio'] . '"/>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
    }

                echo '<h2>Buscar un solo Zona</h2>';
                echo '<form method="post" action="RegistroZona.php" align="center" >';
                echo '<input type="text" name="zonaid" id="zonaid" placeholder="    id  " />';
                echo '<tr>';

                echo '<td><input type="submit" value="Enviar" name="buscar" id="buscar"/></td>';
                echo '</tr>';
                echo '</form>';

    if ($_POST) {
        $zonaid = $_POST['zonaid'];
        if (isset($zonaid)) {
            $buscarBusiness = $zonaBusiness->buscarZona($zonaid);
            foreach ($buscarBusiness as $current) {
                echo '<form  action="../../business/zonaaccion/zonaAction.php" method="Post" align="center" >';
                echo '<input type="text" name="zonaid" id="zonaid" size="4" value="' . $current['zonaid'] . '"  readonly />';
                echo '<input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/>';
                echo '<input type="text" name="zonaprecio" id="zonaprecio" size="4" value="' . $current['zonaprecio'] . '"/>';
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


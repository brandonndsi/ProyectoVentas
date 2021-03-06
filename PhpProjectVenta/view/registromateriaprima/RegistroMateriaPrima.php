<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Materia Prima</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">
    
    <?php
    include '../../business/materiaprimabusiness/MateriaPrimaBusiness.php';
    ?>

</head>
<body>
    <?php
    $materiaprimabusiness = new MateriaPrimaBusiness();
    $allBusiness = $materiaprimabusiness->mostrarMateriaPrima();
    ?>
    <h2>
        Materia Prima.
        <a href="?action=registrar" class="btn btn-primary" >Nueva Materia Prima</a>
        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a>
    </h2>  
    <form  action="RegistroMateriaPrima.php" method="Post" >
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Precio de ultima compra</th>
                </tr>
            </thead>  
            <?php foreach ($allBusiness as $current): ?>         
                <tr>
                    <td><input type="hidden" name="materiaprimaid" value="materiaprimaid"></td>
                    <td><input type="text" id="materiaprimacodigo" name="materiaprimacodigo" class="materiaprimacodigo" value="<?php echo $current['materiaprimacodigo']; ?>" readonly /> </td>
                    <td><input type="text" id="materiaprimanombre" name="materiaprimanombre" class="materiaprimanombre" value="<?php echo $current['materiaprimanombre']; ?>" readonly /> </td>
                    <td><input type="text" id="materiaprimaprecio" name="materiaprimaprecio" class="materiaprimaprecio" value="<?php echo $current['materiaprimaprecio']; ?>" readonly /> </td>
                    <td><input type="text" id="materiaprimaprecio" name="materiaprimaprecio" class="materiaprimaprecio" value="<?php echo $current['materiaprimaprecio']; ?>" readonly /> </td>

                    <td><a href="?action=editar&id=<?php echo $current['materiaprimaid']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['materiaprimaid']; ?> " class="btn btn-info">Ver mas</a></td> 
                    <td><a href="?action=eliminar&id=<?php echo $current['materiaprimaid']; ?> " class="btn btn-danger">Eliminar</a></td>  
                </tr> 
            <?php endforeach ?>
        </table>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {

        switch ($_REQUEST['action']) {

            case 'ver':
                $maObtenida = $materiaprimabusiness->buscarMateriaPrima($_REQUEST['id']);
                foreach ($maObtenida as $current) {
                    echo '<form  action="RegistroMateriaPrima.php" method="Post">';
                    echo '<h2>Datos Materia Prima.</h2>';
                    echo '<td><input type="hidden" name="materiaprimaid" value="' . $current['materiaprimaid'] . '"></td>';
                    echo '<p>Codigo: <input type="text" name="materiaprimacodigo" id="materiaprimacodigo" value="' . $current['materiaprimacodigo'] . '" readonly /></p>';
                    echo '<p>Nombre: <input type="text" name="materiaprimanombre" id="materiaprimanombre"  value="' . $current['materiaprimanombre'] . '" readonly /></p>';
                    echo '<p>Cantidad: <input type="text" name="materiaprimacantidad" id="materiaprimacantidad"  value="' . $current['materiaprimacantidad'] . '" readonly /></p>';
                    echo '<p>Precio Actual: <input type="text" name="materiaprimaprecio" id="materiaprimaprecio"  value="' . $current['materiaprimaprecio'] . '" readonly /></p>';
                    echo '<p>Precio Anterior: <input type="text" name="ultimacompra" id="ultimacompra" value="'.$current['ultimacompra'].'" readonly /></p>';
                    echo '<p>Tipo materia prima id: <input type="text" name="tipomateriaprimaid" id="tipomateriaprimaid" value="'.$current['tipomateriaprimaid'].'" readonly /></p>';
                    echo '<p>Tipo Materia Prima Nombre: <input type="text" name="tipomateriaprimaid" id="tipomateriaprimaid" value="'.$current['tipomateriaprimacategoria'].'" readonly /></p>';

                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post">';
                echo '<h2>Nueva Materia Prima</h2>';
                echo '<p>Codigo: <input type="text" name="materiaprimacodigo" id="materiaprimacodigo" required/></p>';
                echo '<p>Nombre: <input type="text" name="materiaprimanombre" id="materiaprimanombre" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                echo '<p>Cantidad: <input type="text" name="materiaprimacantidad" id="materiaprimacantidad" required pattern="[0-9]{1,5}"/></p>';
                /*echo '<p>Unidad: <select name = "combobanco"> required</p>';
                echo '<option ></option>';
                echo '<option value = "Kilogramos">Kilogramos</option>';
                echo '<option value = "Gramos">Gramos</option>';
                echo '<option value = "Litros">Litros</option>';
                echo '<option value = "Libras">Libras</option>';
                echo '<option value = "Cajas">Cajas</option>';
                echo '<option value = "Bolsas">Bolsas</option>';
                echo '  </select>';*/
                echo '<p>Precio Actual: <input type="text" name="materiaprimaprecio" id="materiaprimaprecio" required pattern="[0-9]{2,7}"/></p>';
                echo '<p> Ultimo Precio: <input type="text" name="ultimacompra" id="ultimacompra" </p>';
                echo '<p> Tipo Materiaprima Id: <input type="text" name ="tipomateriaprimaid" id="tipomateriaprimaid"/> </p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="nuevo" id="nuevo"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $materiaprimabusiness->eliminarMateriaPrima($_REQUEST['id']);
                
                header('Location: RegistroMateriaPrima.php');

                break;

            case 'editar':

                $materiaObtenida = $materiaprimabusiness->buscarMateriaPrima($_REQUEST['id']);
                foreach ($materiaObtenida as $current) {
                    echo '<form  action="../../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post">';
                    echo '<h2>Editar Materia Prima</h2>';
                    echo '<input type="hidden" name="materiaprimaid" id="materiaprimaid"  value="' . $current['materiaprimaid'] . '"  readonly />';
                    echo '<p>Codigo: <input type="text" name="materiaprimacodigo" id="materiaprimacodigo" value="' . $current['materiaprimacodigo'] . '" /></p>';
                    echo '<p>Nombre: <input type="text" name="materiaprimanombre" id="materiaprimanombre"  value="' . $current['materiaprimanombre'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                    echo '<p>Cantidad: <input type="text" name="materiaprimacantidad" id="materiaprimacantidad"  value="' . $current['materiaprimacantidad'] . '" pattern="[0-9]{1,5}"/></p>';
                     echo '<p>Precio Actual: <input type="text" name="materiaprimaprecio" id="materiaprimaprecio"  value="' . $current['materiaprimaprecio'] . '" pattern="[0-9]{2,7}"/></p>';
                    echo '<p>Precio Anterior: <input type="text" name="ultimacompra" id="ultimacompra" value="'.$current['ultimacompra'].'"/></p>';
                    echo '<p>tipomateriaprimaid: <input type="text" name="tipomateriaprimaid" id="tipomateriaprimaid" value="'.$current['tipomateriaprimaid'].'" /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Actualizar" name="actualizar" id="actualizar"/></p>';
                    echo '</form>';
                }
                break;
        }
    }
    ?>
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

</body>
</html>

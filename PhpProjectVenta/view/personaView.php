<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ventana Persona</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php
    //include '../business/clienteBusiness.php';
    //Include '../business/empleadoBusiness.php';
    //include '../business/tipoEmpleadoBusiness.php';
    ?>

</head>

<body  bgcolor="#303030" text="E5E5E5" font face="tahoma" font size="3">
    <p align="center">
    <form name="form" action="insetarCliente.php" method="Post">
        <strong>
            
        
        <h2>
            Formulario para insertar el cliente a la base de datos.
        </h2>
            <hr size="8" color="ffffff" width="100%" align=" left">
            </strong>
        <h5>
            Cedula: 
            <input name="cedulaCliente" type="text" size="45" required>
        </h5>
        <h5>
            Nombre: 
            <input name="nombreCliente" type="text" size="45" required>
        </h5>
        <h5>
            Primer Apellido: 
            <input name="apellido1Cliente" type="text" size="45" required>
        </h5>
        <h5>
            Segundo apellido: 
            <input name="apellido2Cliente" type="text" size="45" required>
        </h5>
        <h5>
            Tipo de Usuario: 
            <input name="tipoCliente" type="text" size="45" required>
        </h5>
        <h5>
            Zona: 
            <input name="zonaCliente" type="text" size="45" required>
        </h5>
        <hr size="4" color="ffffff" width="100%" align="left">
        <input name="Enviar" type="submit" value="Enviar">
    </form>
        
        
    </p>
            <?php
            /*
elefonoPersona;
private $nombrePersona;
private $apellido1Persona;
private $apellido2Persona;
private $tipoUsuarioPersona;
private $idZona;
private $idEmpleado;
             *              */
           /* $empleadoBusiness = new empleadoBusiness();
            $allEmpleados = $EmpleadoBusiness->getAllTBEmpleado();
            foreach ($allEmpleados as $current) {
                echo '<form method="post" enctype="multipart/form-data" action="../business/bullAction.php">';
                echo '<input type="hidden" name="idBull" value="' . $current->getIdTBBull() . '">';
                echo '<tr>';
                echo '<input type="hidden" name="ranch" id="ranch" value="' . $current->getRanchTBBull() . '"/>';
                echo '<td><input type="text" name="code" id="code" value="' . $current->getCodeTBBull() . '"/></td>';
                echo '<td><input type="text" name="name" id="name" value="' . $current->getNameTBBull() . '"/></td>';
                echo '<td><input type="text" name="commercialcase" id="commercialcase" value="' . $current->getCommercialCaseTBBull() . '"/></td>';
                echo '<td><input type="date" name="buydate" id="buydate" value="' . $current->getBuyDateTBBull() . '"/></td>';
                echo '<td><input type="number" name="strawsquantity" id="sstrawsquantity" value="' . $current->getStrawsQuantityTBBull() . '"/></td>';
                echo '<td><input type="number" name="strawsprice" id="sstrawsprice" value="' . $current->getStrawsPriceTBBull() . '"/></td>';
                echo '<td><input type="submit" value="Actualizar" name="update" id="update"/></td>';
                echo '<td><input type="submit" value="Eliminar" name="delete" id="delete"/></td>';
                echo '</tr>';
                echo '</form>';
            }*/
            ?>

                    <?php
                    /*if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyField") {
                            echo '<p style="color: red">Campo(s) vacio(s)</p>';
                        } else if ($_GET['error'] == "numberFormat") {
                            echo '<p style="color: red">Error, formato de numero</p>';
                        } else if ($_GET['error'] == "dbError") {
                            echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
                        }
                    } else if (isset($_GET['success'])) {
                        echo '<p style="color: green">Transacción realizada</p>';
                    }*/
                    ?>
  

    <footer>
    </footer>
</body>
</html>

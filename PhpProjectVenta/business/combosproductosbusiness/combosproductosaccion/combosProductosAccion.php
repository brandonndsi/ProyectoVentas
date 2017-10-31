<?php

/**
 * Description of combossProductosAccion
 *
 * @author Juancho
 */
include '../../domain/combosproductos/CombosProductos.php';
if (isset($_POST['nuevo'])) {

    if (isset($_POST['comboid'])&& isset($_POST['productoid'])) {

        $combosid = $_POST['comboid'];
        $productoid = $_POST['productoid'];

        if (strlen($productoid) > 0 && strlen($combosid) > 0 ){
            
                $combosproductos = new CombosProductos(null, null);

                $combosproductos->setCombosid($combosid);
                $combosproductos->setProductoid($productoid);


                include '../combosproductosbusiness/combosProductosBusiness.php';

                $combosProductosBusiness = new combosProductosBusiness();

                $result = $combosProductosBusiness->insertarCombosProductos($combosproductos);

                return header("location: ../../view/registrocombosProductos/RegistroCombosProductos.php?success=updated");
            
        }
    } else {
        // retorna un error al tratar de ingresar los datos del combosProductos
        $error = "ErrorNuevo";
        return $error;
    }
    /*
     * Verifica si la accion es la de actualizar los datos del combosProductos
     */
} else if (isset($_POST['actualizar'])) {
    if (isset($_POST['combosproductosid']) && isset($_POST['combosid']) && isset($_POST['productoid'])) {

        $combosproductosid = $_POST['combosproductosid'];
        $combosid = $_POST['combosid'];
        $productoid = $_POST['productoid'];

        if (strlen($combosproductosid) > 0 && strlen($combosid) > 0 && strlen($productoid) > 0 ) {
            if (is_numeric($combosid)) {

                $combosproducto = new CombosProductos($combosproductoid,"","");

                $combosproducto->setComboid($combosid);
                $combosproducto->setProductoid($productoid);

                include '../combosproductosbusiness/CombosproductosBusiness.php';

                $combosProductosBusiness = new combosproductosBusiness();

                $result = $combosProductosBusiness->modificarCombosProductos($combosproductos);

                return header("location: ../../view/registrocombo/RegistroCombo.php?success=updated");
            }
        }
    } else {
        // presenta el error al actualizar los datos algun dato esta mal o esta basio.
        $error = "ErrorActualizar";
        return $error;
    }
    /*
     * La accion de eliminar provando si es esta accion la que desea realizar
     */
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['combosproductosid'])) {

        $combosproductos = $_POST['comboid'];

        include '../combobusiness/comboBusiness.php';

        $combosProductosBusiness = new combosproductosBusiness();

        $result = $combosProductosBusiness->eliminarCombosProductos($combosproductos);

        return header("location: ../../view/registrocombosproductos/RegistroCombosProductos.php?success=updated");
    } else {
        //esto es porsi a la hora de eliminar el dato es vacio
        $error = "ErrorEliminar";
        return $error;
    }

    /*
     *  Esta consulta lo que debe devolver es el datos del combosproductos.   
     */
} else if (isset($_POST['buscar'])) {

    if (isset($_POST['combosproductosid'])) {

        $combosproductos = $_POST['combosproductosid'];

        include '../combosproductosbusiness/combosProductosBusiness.php';

        $combosProductosBusiness = new combosproductosBusiness();

        $result = $combosProductosBusiness->buscarCombosProductos($combosproductos);

        return $result;
    } else {
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
        $error = "ErrorBuscar";
        return $error;
    }

    /*
     *  Esta conuslta lo que debe devolver es todos los datos de los comboproductos   
     */
} else if (isset($_POST['todo'])) {


    include '../combosproductosbusiness/CombosProductosBusiness.php';

    $combosProductosBusiness = new combosproductosBusiness();

    $result = $combosProductosBusiness->mostrarCombosProductos();

    return $result;
} else {
    //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
    $error = "ErrorTodo";
    return $error;
}
?>
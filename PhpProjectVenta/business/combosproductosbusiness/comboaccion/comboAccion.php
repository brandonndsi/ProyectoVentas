<?php
/**
 * Description of comboAccion
 *
 * @author Juancho
 */
include '../../domain/combo/Combo.php';
if (isset($_POST['nuevo'])) {

    if (isset($_POST['productoid'])) {

        $productoid = $_POST['productoid'];

        if (strlen($productoid) > 0 ) {
            
                $combo = new Combos(null);

                $combo->setProductoid($productoid);


                include '../combobusiness/comboBusiness.php';

                $comboBusiness = new comboBusiness();

                $result = $comboBusiness->insertarCombo($combo);

                return header("location: ../../view/registrocombo/RegistroCombo.php?success=updated");
            
        }
    } else {
        // retorna un error al tratar de ingresar los datos del combo
        $error = "ErrorNuevo";
        return $error;
    }
    /*
     * Verifica si la accion es la de actualizar los datos del combo
     */
} else if (isset($_POST['actualizar'])) {
    if (isset($_POST['comboid']) && isset($_POST['productoid'])) {

        $comboid = $_POST['comboid'];
        $productoid = $_POST['productoid'];

        if (strlen($comboid) > 0 && strlen($productoid) > 0 ) {
            if (is_numeric($comboid)) {

                $combo = new Combos($comboid,"");

                $combo->setProductoid($productoid);

                include '../combobusiness/comboBusiness.php';

                $comboBusiness = new comboBusiness();

                $result = $comboBusiness->modificarCombo($combo);

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

    if (isset($_POST['comboid'])) {

        $combo = $_POST['comboid'];

        include '../combobusiness/comboBusiness.php';

        $comboBusiness = new comboBusiness();

        $result = $comboBusiness->eliminarCombo($combo);

        return header("location: ../../view/registrocombo/RegistroCombo.php?success=updated");
    } else {
        //esto es porsi a la hora de eliminar el dato es vacio
        $error = "ErrorEliminar";
        return $error;
    }

    /*
     *  Esta consulta lo que debe devolver es el datos del combo.   
     */
} else if (isset($_POST['buscar'])) {

    if (isset($_POST['comboid'])) {

        $combo = $_POST['comboid'];

        include '../combobusiness/comboBusiness.php';

        $comboBusiness = new comboBusiness();

        $result = $comboBusiness->buscarCombo($combo);

        return $result;
    } else {
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
        $error = "ErrorBuscar";
        return $error;
    }

    /*
     *  Esta conuslta lo que debe devolver es todos los datos de los combos.   
     */
} else if (isset($_POST['todo'])) {


    include '../combobusiness/comboBusiness.php';

    $comboBusiness = new comboBusiness();

    $result = $comboBusiness->mostrarCombo();

    return $result;
} else {
    //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
    $error = "ErrorTodo";
    return $error;
}
?>
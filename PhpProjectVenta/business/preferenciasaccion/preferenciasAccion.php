<?php
/**
 * Description of preferenciasAccion
 *
 * @author Juancho
 */
include '../../domain/preferencias/Preferencias.php';
if (isset($_POST['nuevo'])) {

    if (isset($_POST['clienteid'])&&isset($_POST['productoid'])
        &&isset($_POST['preferenciasfecha'])&&isset($_POST['prefereciasaccion'])) {

        $clienteid = $_POST['clienteid'];
        $productoid = $_POST['productoid'];
        $preferenciasfecha = $_POST['preferenciasfecha'];
        $preferenciasaccion = $_POST['prefereciasaccion'];        

        if (strlen($clienteid) > 0&& strlen($productoid) > 0&& strlen($preferenciasfecha) > 0
            && strlen($preferenciasaccion) > 0 ) {
            
                $preferencia = new Preferencias(null, null, $preferenciasfecha, $preferenciasaccion);

                $preferencia->setClienteid($clienteid);
                $preferencia->setProductoid($productoid);

                include '../preferenciasbusiness/preferenciasBusiness.php';

                $preferenciasBusiness = new preferenciasBusiness();

                $result = $preferenciasBusiness->insertarPreferencias($preferencias);

                return header("location: ../../view/registropreferencias/RegistroPreferencias.php?success=updated");
            
        }
    } else {
        // retorna un error al tratar de ingresar los datos del las preferencias
        $error = "ErrorNuevo";
        return $error;
    }
    /*
     * Verifica si la accion es la de actualizar los datos del preferencias
     */
} else if (isset($_POST['actualizar'])) {
    if (isset($_POST['preferenciasid']) && isset($_POST['productoid']) && isset($_POST['clienteid']) 
            && isset($_POST['preferenciasfecha']) && isset($_POST['preferenciasaccion'])) {

        $preferenciasid = $_POST['preferenciasid'];
        $clienteid = $_POST['clienteid'];
        $productoid = $_POST['productoid'];
        $preferenciasfecha = $_POST['preferenciasfecha'];
        $preferenciasaccion = $_POST['preferenciasaccion'];

        if (strlen($preferenciasid)>0 && strlen($clienteid) > 0&& strlen($productoid) > 0&& strlen($preferenciasfecha) > 0
            && strlen($preferenciasaccion) > 0 ) {
            if (is_numeric($clienteid)) {

                 $preferencia = new Preferencias(null, null, $preferenciasfecha, $preferenciasaccion);

                $preferencia->setClienteid($clienteid);
                $preferencia->setProductoid($productoid);

                include '../preferenciasbusiness/preferenciasBusiness.php';

                $preferenciasBusiness = new preferenciasBusiness();

                $result = $preferenciasBusiness->modificarPreferencias($preferencias);

                return header("location: ../../view/registropreferencias/RegistroPreferencias.php?success=updated");
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

    if (isset($_POST['preferenciasid'])) {

        $preferencias = $_POST['preferenciasid'];

        include '../preferenciasbusiness/preferenciasBusiness.php';

        $preferenciasBusiness = new preferenciasBusiness();

        $result = $preferenciasBusiness->eliminarPreferencias($preferencias);

        return header("location: ../../view/registropreferencias/RegistroPreferencias.php?success=updated");
    } else {
        //esto es porsi a la hora de eliminar el dato es vacio
        $error = "ErrorEliminar";
        return $error;
    }

    /*
     *  Esta consulta lo que debe devolver es el datos de las preferencias.   
     */
} else if (isset($_POST['buscar'])) {

    if (isset($_POST['preferenciasid'])) {

        $preferencias = $_POST['preferenciasid'];

        include '../preferenciasbusiness/preferenciasBusiness.php';

        $preferenciasBusiness = new preferenciasBusiness();

        $result = $preferenciasBusiness->buscarPreferencias($preferencias);

        return $result;
    } else {
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
        $error = "ErrorBuscar";
        return $error;
    }

    /*
     *  Esta conuslta lo que debe devolver es todos los datos de las preferencias.   
     */
} else if (isset($_POST['todo'])) {


    include '../preferenciasbusiness/preferenciasBusiness.php';

    $preferenciasBusiness = new preferenciasBusiness();

    $result = $preferenciasBusiness->mostrarPreferencias();

    return $result;
} else {
    //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
    $error = "ErrorTodo";
    return $error;
}
?>
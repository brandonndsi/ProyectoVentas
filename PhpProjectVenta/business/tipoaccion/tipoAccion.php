<?php
/**
 * Description of tipoAccion
 *
 * @author Juancho
 */
include '../../domain/tipo/Tipo.php';
if (isset($_POST['nuevo'])) {

    if (isset($_POST['tiponombre'])) {

        $productoid = $_POST['tiponombre'];

        if ( strlen($tiponombre) > 0 ) {
            
                $tipo = new Tipos($tiponombre);

                include '../tipobusiness/tipoBusiness.php';

                $tipoBusiness = new tipoBusiness();

                $result = $tipoBusiness->insertaTipo($tipo);

                return header("location: ../../view/registrotipo/RegistroTipo.php?success=updated");
            
        }
    } else {
        // retorna un error al tratar de ingresar los datos  
        $error = "ErrorNuevo";
        return $error;
    }
    /*
     * Verifica si la accion es la de actualizar los datos 
     */
} else if (isset($_POST['actualizar'])) {
    if (isset($_POST['tipoid']) && isset($_POST['tiponombre'])) {

        $tiponombre = $_POST['tiponombre'];

        if (strlen($tipoid) > 0 && strlen($tiponombre) > 0 ) {
            if (is_numeric($tipoid)) {

                $tipo = new Tipos($tipoid, $tiponombre);

                include '../tipobusiness/tipoBusiness.php';

                $tipoBusiness = new tipoBusiness();

                $result = $tipoBusiness->modificarTipo($tipo);

                return header("location: ../../view/registrotipo/RegistroTipo.php?success=updated");
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

    if (isset($_POST['tipoid'])) {

        $tipo = $_POST['tipoid'];

        include '../tipobusiness/tipoBusiness.php';

        $tipoBusiness = new tipoBusiness();

        $result = $tipoBusiness->eliminarTipo($tipo);

        return header("location: ../../view/registrotipo/RegistroTipo.php?success=updated");
    } else {
        //esto es porsi a la hora de eliminar el dato es vacio
        $error = "ErrorEliminar";
        return $error;
    }

    /*
     *  Esta consulta lo que debe devolver es el datos  
     */
} else if (isset($_POST['buscar'])) {

    if (isset($_POST['tipoid'])) {

        $combo = $_POST['tipoid'];

        include '../tipobusiness/tipoBusiness.php';

        $tipoBusiness = new tipoBusiness();

        $result = $tipoBusiness->buscarTipo($tipo);

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


    include '../tipobusiness/tipoBusiness.php';

    $tipoBusiness = new tipoBusiness();

    $result = $tipoBusiness->mostrarTipo();

    return $result;
} else {
    //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
    $error = "ErrorTodo";
    return $error;
}
?>
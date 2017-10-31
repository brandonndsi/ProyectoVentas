<?php
/**
 * Description of tamanioAccion
 *
 * @author Juancho
 */
include '../../domain/tamanio/tamanio.php';
if (isset($_POST['nuevo'])) {

    if (isset($_POST['tamanionombre'])) {

        $tamanionombre = $_POST['tamanionombre'];

        if (strlen($tamanionombre) > 0 ) {
            
                $tamanio = new tamanios($tamanionombre);

                include '../tamaniobusiness/tamanioBusiness.php';

                $tamanioBusiness = new tamanioBusiness();

                $result = $tamanioBusiness->insertarTamanio($tamanio);

                return header("location: ../../view/registrotamanio/RegistroTamanio.php?success=updated");
            
        }
    } else {
        // retorna un error al tratar de ingresar los datos del tamanio
        $error = "ErrorNuevo";
        return $error;
    }
    /*
     * Verifica si la accion es la de actualizar los datos del tamanio
     */
} else if (isset($_POST['actualizar'])) {
    if (isset($_POST['tamanioid']) && isset($_POST['tamanionombre'])) {

        $tamanioid = $_POST['tamanioid'];
        $tamanionombre = $_POST['tamaninombre'];

        if (strlen($tamanioid) > 0 && strlen($tamanionombre) > 0 ) {
            if (is_numeric($tamanioid)) {

                $tamanio = new Tamanios($tamanioid,$tamanionombre);

                include '../tamaniobusiness/tamanioBusiness.php';

                $tamanioBusiness = new tamanioBusiness();

                $result = $tamanioBusiness->modificarTamanio($tamanio);

                return header("location: ../../view/registrotamanio/RegistroTamanio.php?success=updated");
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

    if (isset($_POST['tamanioid'])) {

        $tamanio = $_POST['tamanioid'];

        include '../tamaniobusiness/tamanioBusiness.php';

        $tamanioBusiness = new tamanioBusiness();

        $result = $tamanioBusiness->eliminarTamanio($tamanio);

        return header("location: ../../view/registrocombo/RegistroCombo.php?success=updated");
    } else {
        //esto es porsi a la hora de eliminar el dato es vacio
        $error = "ErrorEliminar";
        return $error;
    }

    /*
     *  Esta consulta lo que debe devolver es el datos del tamanio.   
     */
} else if (isset($_POST['buscar'])) {

    if (isset($_POST['tamanioid'])) {

        $tamanio = $_POST['tamanioid'];

        include '../tamaniobusiness/tamanioBusiness.php';

        $tamanioBusiness = new tamanioBusiness();

        $result = $tamanioBusiness->buscarTamanio($tamanio);

        return $result;
    } else {
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
        $error = "ErrorBuscar";
        return $error;
    }

    /*
     *  Esta conuslta lo que debe devolver es todos los datos de los tamanios.   
     */
} else if (isset($_POST['todo'])) {


    include '../tamaniobusiness/tamanioBusiness.php';

    $tamanioBusiness = new tamanioBusiness();

    $result = $tamanioBusiness->mostrarTamanio();

    return $result;
} else {
    //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
    $error = "ErrorTodo";
    return $error;
}
?>
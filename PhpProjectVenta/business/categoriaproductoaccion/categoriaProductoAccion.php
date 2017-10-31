<?php
/**
 * Description of categoriaProductoAccion
 *
 * @author Juancho
 */
include '../../domain/categoriaproductoaccion/CcategoriaProductoAccion.php';
if (isset($_POST['nuevo'])) {

    if (isset($_POST['categoriaProductonombre'])) {

        $categoriaproductonombre = $_POST['categoriaProductonombre'];

        if (strlen($categoriaproductonombre) > 0 ) {
            
                $categoriaProducto = new CategoriasProductos($categoriaproductonombre);

                include '../categoriaproductobusiness/categoriaProductoBusiness.php';

                $categoriaProductoBusiness = new categoriaProductoBusiness();

                $result = $categoriaProductoBusiness->insertarCategoriaProducto($categoriaproducto);

                return header("location: ../../view/registrocategoriaproducto/RegistroCategoriaProducto.php?success=updated");
            
        }
    } else {
        // retorna un error al tratar de ingresar los datos de la categoriaProducto
        $error = "ErrorNuevo";
        return $error;
    }
    /*
     * Verifica si la accion es la de actualizar los datos de la categoriaProducto
     */
} else if (isset($_POST['actualizar'])) {
    if (isset($_POST['categoriaproductoid']) && isset($_POST['categoriaproductonombre'])) {

        $categoriaproductoid = $_POST['categoriaproductoid'];
        $categoriaproductonombre = $_POST['categoriaproductonombre'];

        if (strlen($categoriaproductoid) > 0 && strlen($categoriaproductonombre) > 0 ) {
            if (is_numeric($categoriaproductoid)) {

                $categoriaproducto = new categoriaProductos($categoriaproductoid,$categoriaproductonombre);


                include '../categoriaproductobusinesscategoriaProductoBusiness.php';

                $categoriaProductoBusiness = new categoriaProductoBusiness();

                $result = $categoriaProductoBusiness->modificarCategoriaProducto($categoriaproducto);

                return header("location: ../../view/registrocategoriaproducto/Registrocategoriaproducto.php?success=updated");
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

    if (isset($_POST['categoriaproductoid'])) {

        $categoriaproducto = $_POST['categoriaproductoid'];

        include '../categoriaproductobusiness/categoriaProductoBusiness.php';

        $categoriaProductoBusiness = new categoriaProductoBusiness();

        $result = $categoriaProductoBusiness->eliminarCategoriaProducto($categoriaproducto);

        return header("location: ../../view/registrocategoriaproducto/RegistroCategoriaProducto.php?success=updated");
    } else {
        //esto es porsi a la hora de eliminar el dato es vacio
        $error = "ErrorEliminar";
        return $error;
    }

    /*
     *  Esta consulta lo que debe devolver es el datos de la categoriaProducto.   
     */
} else if (isset($_POST['buscar'])) {

    if (isset($_POST['categoriaProductoid'])) {

        $combo = $_POST['categoriaproductoid'];

        include '../categoriaproductobusiness/categoriaProductoBusiness.php';

        $categoriaProductoBusiness = new categoriaProductoBusiness();

        $result = $categoriaProductoBusiness->buscarCategoriaProducto($categoriaproducto);

        return $result;
    } else {
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
        $error = "ErrorBuscar";
        return $error;
    }

    /*
     *  Esta conuslta lo que debe devolver es todos los datos de las categoriaProductos.   
     */
} else if (isset($_POST['todo'])) {


    include '../categoriaproductobusiness/categoriaProductoBusiness.php';

    $categoriaProductoBusiness = new categoriaProductoBusiness();

    $result = $categoriaProductoBusiness->mostrarCategoriaProducto();

    return $result;
} else {
    //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
    $error = "ErrorTodo";
    return $error;
}
?>
<?php

/* 
 Autor david  salas lorente  Tools | Templates
 * and open the template in the editor.
 */
$accion = $_POST['accion'];//busca la accion a realizar 
 
    if($accion=="nuevo"){

    if (isset($_POST['productoid']) && isset($_POST['productonombre']) 
           && isset($_POST['productoprecio'])) {
             
        $productoid = $_POST['productoid'];
        $productonombre = $_POST['productonombre'];
        $productoprecio = $_POST['productoprecio'];
        
        if (strlen($productoid) > 0 && strlen($productonombre) > 0 
                && strlen($productoprecio) > 0) {
            if (is_numeric($productoid)) {
                
                $producto = new Productos($productoid, $productonombre, $productoprecio, $productoprecio);
                
                include '../productobusiness/ProductoBusiness.php';

            $productoBusiness=new ProductoBusiness();

             $result= $productoBusiness->getTBProductoNuevo($producto);

             echo json_encode($result);     }
             
            }
             
         }else  {
             // retorna un error al tratar de ingresar los datos del nuevo cliente
               $error="ErrorNuevo";
               echo json_encode($error);
             } 
        /*
         * Verifica si la accion es la e actualizar los datos del cliente
         */
    }else if($accion=="actualizar"){
        
           if (isset($_POST['productoid']) && isset($_POST['productonombre']) 
           && isset($_POST['productoprecio'])) {
             
        $productoid = $_POST['productoid'];
        $productonombre = $_POST['productonombre'];
        $productoprecio = $_POST['productoprecio'];
        
        if (strlen($productoid) > 0 && strlen($productonombre) > 0 
                && strlen($productoprecio) > 0) {
            if (is_numeric($productoid)) {
                
                $producto = new Productos($productoid, $productonombre, $productoprecio, $productoprecio);
                
                include '../productobusiness/ProductoBusiness.php';

            $productoBusiness=new ProductoBusiness();

             $result= $productoBusiness->getTBProductoActualizar($producto);
            echo json_encode($result);}
            
            }
            
    }else       {
        // presenta el error al actualizar los datos algun dato esta mal o esta basio.
                    $error="ErrorActualizar";
                   echo json_encode($error);
                } 
    /*
     * La accion de eliminar provando si es esta accion la que desea realizar
     */
    }else if($accion=="eliminar"){
        
    if(isset($_POST['productoid'])){
        
            $producto=$_POST['productoid'];
            
             include '../productobusiness/ProductoBusiness.php';

            $ProductoBusiness=new ProductoBusiness();
           
            $result= $ProductoBusiness->getTBProductoEliminar($producto);
            
            echo json_encode($result);
        
    }else{
        //esto es porsi a la hora de eliminar el dato es vacio
         $error="ErrorEliminar";
        echo json_encode($error);
    }
    
    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
      */
    } else if($accion=="buscar"){
        
       if(isset($_POST['productoid'])){
           
           $producto=$_POST['productoid'];
            
             include '../productobusiness/ProductoBusiness.php';

            $ProductoBusiness=new ProductoBusiness();
           
            $result= $ProductoBusiness->getTBProductoBuscar($producto);
            
            echo json_encode($result); 
    
        
    }else{
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
         $error="ErrorBuscar";
        echo json_encode($error);
    }
    
    /*
     *  Esta conslta lo que debe devolver es todos los datos de los clientes.   
      */
    }else  if($accion=="todo"){
        
            
             include '../productobusiness/ProductoBusiness.php';

            $ProductoBusiness=new ProductoBusiness();
           
            $result= $ProductoBusiness->getTBProductoTodo();
            
            echo json_encode($result);  
            
    }else{
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                echo json_encode($error);
                }
    
?>
<?php

/* 
 Autor david  salas lorente  Tools | Templates
 * and open the template in the editor.
 */
//$accion = $_POST['accion'];//busca la accion a realizar 
include '../../domain/productos/Productos.php';
    if(isset($_POST['nuevo'])){

    if (isset($_POST['productocodigo']) && isset($_POST['productonombre']) 
           && isset($_POST['productoprecio'])) {
       
        $productocodigo = $_POST['productocodigo'];
        $productonombre = $_POST['productonombre'];
        $productoprecio = $_POST['productoprecio'];
        
        if (strlen($productocodigo) > 0 && strlen($productonombre) > 0 
                && strlen($productoprecio) > 0) {
            if (is_numeric($productoprecio)) {
            
                $producto = new Productos(null,$productocodigo, $productonombre, $productoprecio);
                 
                include '../productobusiness/ProductoBusiness.php';

            $productoBusiness=new ProductoBusiness();

             $result= $productoBusiness->insertarProducto($producto);
             
                
                   return header("location: ../../view/registroproducto/RegistroProducto.php?success=updated");
                
                  }
                  return  header("location: ../../view/registroproducto/RegistroProducto.php?ErrorNumero=updated");
             
            }
             
         }else  {
             // retorna un error al tratar de ingresar los datos del nuevo cliente
               $error="ErrorNuevo";
               return $error;
             } 
        /*
         * Verifica si la accion es la e actualizar los datos del cliente
         */
    }else if(isset($_POST['actualizar'])){
           if (isset($_POST['productocodigo']) && isset($_POST['productonombre']) 
           && isset($_POST['productoprecio']) && isset($_POST['productoid'])) {
             
        $productoid = $_POST['productoid'];
        $productocodigo = $_POST['productocodigo'];
        $productonombre = $_POST['productonombre'];
        $productoprecio = $_POST['productoprecio'];
        
        if (strlen($productoid) > 0 && strlen($productocodigo) > 0 && strlen($productonombre) > 0 
                && strlen($productoprecio) > 0) {
            if (is_numeric($productoid)) {
                
                $producto = new Productos($productoid,$productocodigo, $productonombre, $productoprecio);
                
                include '../productobusiness/ProductoBusiness.php';

            $productoBusiness=new ProductoBusiness();

             $result= $productoBusiness->modificarProducto($producto);
            
                 return   header("location: ../../view/registroproducto/RegistroProducto.php?success=updated");
                         }
             
            }
            
            
            
    }else       {
        // presenta el error al actualizar los datos algun dato esta mal o esta basio.
                    $error="ErrorActualizar";
                   return $error;
                } 
    /*
     * La accion de eliminar provando si es esta accion la que desea realizar
     */
    }else if(isset($_POST['eliminar'])){
        
    if(isset($_POST['productoid'])){
        
            $producto=$_POST['productoid'];
            
             include '../productobusiness/ProductoBusiness.php';

            $ProductoBusiness=new ProductoBusiness();
           
            $result= $ProductoBusiness->eliminarProducto($producto);
            
             return   header("location: ../../view/registroproducto/RegistroProducto.php?success=updated");
        
    }else{
        //esto es porsi a la hora de eliminar el dato es vacio
         $error="ErrorEliminar";
        return $error;
    }
    
    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
      */
    } else if(isset($_POST['buscar'])){
        
       if(isset($_POST['productoid'])){
           
           $producto=$_POST['productoid'];
            
             include '../productobusiness/ProductoBusiness.php';

            $ProductoBusiness=new ProductoBusiness();
           
            $result= $ProductoBusiness->buscarProducto($producto);
            
            return $result; 
    
        
    }else{
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
         $error="ErrorBuscar";
        return $error;
    }
    
    /*
     *  Esta conuslta lo que debe devolver es todos los datos de los productos.   
      */
    }else  if(isset($_POST['todo'])){
        
            
             include '../productobusiness/ProductoBusiness.php';

            $ProductoBusiness=new ProductoBusiness();
           
            $result= $ProductoBusiness->mostrarProductos();
            
            return $result;  
            
    }elseif(isset($_POST['materia'])){
        
            
             include '../productobusiness/ProductoBusiness.php';

            $ProductoBusiness=new ProductoBusiness();
           
            $result= $ProductoBusiness->mostrarMaterial();
            
            return $result;  
            
    }else{
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                return $error;
                }
    
?>
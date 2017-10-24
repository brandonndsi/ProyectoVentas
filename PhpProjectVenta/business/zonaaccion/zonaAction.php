<?php

/* 
 Autor david  salas lorente  Tools | Templates
 * and open the template in the editor.
 */
//$accion = $_POST['accion'];//busca la accion a realizar 
include '../../domain/zonas/Zonas.php';
    if(isset($_POST['nuevo'])){

    if (isset($_POST['zonaid']) && isset($_POST['zonanombre']) 
           && isset($_POST['zonaprecio'])) {
       
        $zonaid = $_POST['zonaid'];
        $zonanombre = $_POST['zonanombre'];
        $zonaprecio = $_POST['zonaprecio'];
        
        if (strlen($zonaid) > 0 && strlen($zonanombre) > 0 
                && strlen($zonaprecio) > 0) {
            if (!is_numeric($zonaid)) {
            
                $zona = new Zonas($zonaid, $zonanombre, $zonaprecio);
                 
                include '../zonabusiness/zonaBusiness.php';

            $zonaBusiness=new zonaBusiness();

             $result= $zonaBusiness->insertarZona($zona);
             
                 if ($result == 1) {
                   return header("location: ../../view/registrozona/RegistroZona.php?success=updated");
                } else {
                
                 return   header("location: ../../view/registrozona/RegistroZona.php?error=dbError");
                         }
                  }
             
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
           if (isset($_POST['zonaid']) && isset($_POST['zonanombre']) 
           && isset($_POST['zonaprecio'])) {
             
        $zonaid = $_POST['zonaid'];
        $zonanombre = $_POST['zonanombre'];
        $zonaprecio = $_POST['zonaprecio'];
        
        if (strlen($zonaid) > 0 && strlen($zonanombre) > 0 
                && strlen($zonaprecio) > 0) {
            if (!is_numeric($zonaid)) {
                
                $zona = new Zonas($zonaid, $zonanombre, $zonaprecio);
                
                include '../zonabusiness/zonaBusiness.php';

            $zonaBusiness=new zonaBusiness();

             $result= $zonaBusiness->modificarZona($zona);
            
                 return   header("location: ../../view/registrozona/RegistroZona.php?success=updated");
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
        
    if(isset($_POST['zonaid'])){
        
            $zona=$_POST['zonaid'];
            
             include '../zonabusiness/zonaBusiness.php';

            $zonaBusiness=new zonaBusiness();
           
            $result= $zonaBusiness->eliminarZona($zona);
            
             return   header("location: ../../view/registrozona/RegistroZona.php?success=updated");
        
    }else{
        //esto es porsi a la hora de eliminar el dato es vacio
         $error="ErrorEliminar";
        return $error;
    }
    
    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
      */
    } else if(isset($_POST['buscar'])){
        
       if(isset($_POST['zonaid'])){
           
           $zona=$_POST['zonaid'];
            
             include '../zonabusiness/zonaBusiness.php';

            $zonaBusiness=new zonaBusiness();
           
            $result= $zonaBusiness->buscarZona($zona);
            
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
        
            
             include '../zonabusiness/zonaBusiness.php';

            $zonaBusiness=new zonaBusiness();
           
            $result= $zonaBusiness->mostrarZona();
            
            return $result;  
            
    }else{
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                return $error;
                }
    
?>
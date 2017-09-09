<?php

include '../../domain/vehiculos/Vehiculos.php';

    if(isset($_POST['nuevo'])){

    if (isset($_POST['vehiculomodelo']) && isset($_POST['vehiculoplaca']) 
           && isset($_POST['vehiculomarca'])) {
       
        $vehiculomodelo = $_POST['vehiculomodelo'];
        $vehiculoplaca = $_POST['vehiculoplaca'];
        $vehiculomarca = $_POST['vehiculomarca'];
        
        if (strlen($vehiculomodelo) > 0 && strlen($vehiculoplaca) > 0 
                && strlen($vehiculomarca) > 0) {
            if (is_numeric($vehiculoplaca)) {
            
                $vehiculo=new Vehiculos(null, $vehiculoplaca, $vehiculomarca, $vehiculomodelo);
                 
                include '../../business/vehiculobusiness/vehiculoBusiness.php';

            $vehiculoBusiness=new vehiculoBusiness();

             $result= $vehiculoBusiness->insertarVehiculo($vehiculo);
             
                   return header("location: ../../view/registrovehiculo/RegistroVehiculo.php?success=updated");
                
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
           if (isset($_POST['vehiculoid']) && isset($_POST['vehiculoplaca']) 
           && isset($_POST['vehiculomarca'])
           && isset($_POST['vehiculomodelo'])) {
             
        $vehiculoid = $_POST['vehiculoid'];
        $vehiculoplaca = $_POST['vehiculoplaca'];
        $vehiculomarca = $_POST['vehiculomarca'];
        $vehiculomodelo = $_POST['vehiculomodelo'];
        
        if (strlen($vehiculoid) > 0 && strlen($vehiculoplaca) > 0 
                && strlen($vehiculomarca) > 0
                && strlen($vehiculomodelo) > 0) {
            if (!is_numeric($vehiculomarca)) {
                
                $vehiculo = new Vehiculos($vehiculoid, $vehiculoplaca, $vehiculomarca, $vehiculomodelo);
                
                include '../../business/vehiculobusiness/vehiculoBusiness.php';

            $vehiculoBusiness=new vehiculoBusiness();

            $result= $vehiculoBusiness->modificarVehiculo($vehiculo);
            
                 return   header("location: ../../view/registrovehiculo/RegistroVehiculo.php?success=updated");
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
        
    if(isset($_POST['vehiculoid'])){
        
            $vehiculoid=$_POST['vehiculoid'];
            
             include '../../business/vehiculobusiness/vehiculoBusiness.php';

            $vehiculoBusiness=new vehiculoBusiness();
           
            $result= $vehiculoBusiness->eliminarVehiculo($vehiculoid);
            
             return   header("location: ../../view/registrovehiculo/RegistroVehiculo.php?success=updated");
        
    }else{
        //esto es porsi a la hora de eliminar el dato es vacio
         $error="ErrorEliminar";
        return $error;
    }
    
    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
      */
    } else if(isset($_POST['buscar'])){
        
       if(isset($_POST['vehiculoid'])){
           
           $vehiculoid=$_POST['$vehiculoid'];
            
             include '../../business/vehiculobusiness/vehiculoBusiness.php';

            $vehiculoBusiness=new vehiculoBusiness();
           
            $result= $vehiculoBusiness->buscarVehiculo($vehiculoid);
            
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
        
            
             include '../vehiculobusiness/vehiculoBusiness.php';

            $vehiculoBusiness=new vehiculoBusiness();
           
            $result= $vehiculoBusiness->mostrarVehiculo();
            
            return $result;  
            
    }else{
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                return $error;
                }
    
?>
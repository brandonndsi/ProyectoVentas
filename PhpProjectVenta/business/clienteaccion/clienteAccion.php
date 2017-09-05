<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 *
 * @author David Salas.
 */
    
    //$accion = $_POST['accion'];//busca la accion a realizar 
    include '../../domain/personas/Personas.php';
    if(isset($_POST["nuevo"])){
       
       if (isset($_POST['clienteid']) && isset($_POST['perosnanombre']) && isset($_POST['personapellido1']) 
           && isset($_POST['personapellido2']) && isset($_POST['personacorreo'])
            && isset($_POST['personatelefono']) && isset($_POST['zonaid'])) {
          
        
        $clienteid = $_POST('clienteid');
        $personanombre =$_POST('personanombre');
        $personaapellido1 =$_POST('personaapellido1');
        $personaapellido2 = $_POST('personaapellido2');
        $personatelefono = $_POST('personatelefono');
        $zonaid = $_POST('zonaid');
        $personacorreo = $_POST('personacorreo');

       if (strlen($clienteid) > 0 && strlen($personanombre) > 0 && strlen($personaapellido1) > 0 && 
            strlen($personaapellido2) > 0 && strlen($personatelefono) > 0 
            && strlen($zonaid) > 0 && strlen($personacorreo) > 0 ) {
            if (!is_numeric($personanombre)) {
                
                $cliente=new Personas($clienteid, $personanombre, $personaapellido1, $personaapellido2, $personatelefono, $zonaid, $personacorreo);
            include '../clientebusiness/clienteBusiness.php';

            $ClienteBusiness=new clienteBusiness();

             $result= $ClienteBusiness->insertarCliente($cliente);

             if ($result == 1) {
                   return header("location: ../../view/registrocliente/RegistroCliente.php?success=updated");
                } else {
                
                 return   header("location: ../../view/registrocliente/RegistroCliente.php?error=dbError");
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
    }else if(isset($_POST["actualizar"])){
        
      if (strlen($clienteid) > 0 && strlen($personanombre) > 0 && strlen($personaapellido1) > 0 && 
            strlen($personaapellido2) > 0 && strlen($personatelefono) > 0 
            && strlen($zonaid) > 0 && strlen($personacorreo) > 0 ) {
          
          
       $clienteid = $_POST('clienteid');
        $personanombre =$_POST('personanombre');
        $personaapellido1 =$_POST('personaapellido1');
        $personaapellido2 = $_POST('personaapellido2');
        $personatelefono = $_POST('personatelefono');
        $zonaid = $_POST('zonaid');
        $personacorreo = $_POST('personacorreo');

       if (strlen($clienteid) > 0 && strlen($personanombre) > 0 && strlen($personaapellido1) > 0 && 
            strlen($personaapellido2) > 0 && strlen($personatelefono) > 0 
            && strlen($zonaid) > 0 && strlen($personacorreo) > 0 ) {
            if (!is_numeric($personanombre)) {
          
                $cliente=new Personas($clienteid, $personanombre, $personaapellido1, $personaapellido2, $personatelefono, $zonaid, $personacorreo);
           include '../clientebusiness/clienteBusiness.php';
           
           $ClienteBusiness=new clienteBusiness();
           
            $result= $ClienteBusiness->modificarCliente($cliente);
            
            return   header("location: ../../view/registrocliente/RegistroCliente.php?success=updated");
            
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
    }else if(isset($_POST["eliminar"])){
        
    if(isset($_POST['personatelefono'])){
        
            $clienteid=$_POST['personatelefono'];
           include '../clientebusiness/clienteBusiness.php';
           
           $ClienteBusiness=new clienteBusiness();
           
            $result= $ClienteBusiness->eliminarCliente($clienteid);
            
            return   header("location: ../../view/registrocliente/RegistroCliente.php?success=updated");
        
    }else{
        //esto es porsi a la hora de eliminar el dato es vacio
         $error="ErrorEliminar";
        return $error;
    }
    
    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
      */
    } else if(isset($_POST["buscar"])){
        
       if(isset($_POST['personatelefono'])){
           $clienteid=$_POST['personatelefono'];
            
           include '../clientebusiness/clienteBusiness.php';
           
           $ClienteBusiness=new clienteBusiness();
           
            $result= $ClienteBusiness->buscarCliente($clienteid);
            
            return $result; 
    
        
    }else{
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
        $error="ErrorBuscar";
        return $error;
       // echo json_encode($error);
    }
    
    /*
     *  Esta conslta lo que debe devolver es todos los datos de los clientes.   
      */
    }else  if(isset($_POST["todo"])){
        
            
           include '../clientebusiness/clienteBusiness.php';
           
           $ClienteBusiness=new clienteBusiness();
           
            $result= $ClienteBusiness->mostrarClientes();
           
            return $result;  
            
    }else       {
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                return $error;
               // echo json_encode($error);
                }
    

?>
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
    if($accion=="nuevo"){
       
       if (isset($_POST['clientenombre']) && isset($_POST['clienteapellido1']) && isset($_POST['clienteapellido2'])
               && isset($_POST['clientecorreo'])
            && isset($_POST['clientetelefono']) 
             && isset($_POST['direccionexacta']) && isset($_POST['zonaid'])) {
          
        $clientenombre =$_POST('clientenombre');
        $clienteapellido1 =$_POST('clienteapellido1');
        $clienteapellido2 = $_POST('clienteapellido2');
        $clienteTelefono = $_POST('clientetelefono');
        $zonaid = $_POST('zonaid');
        $clientecorreo = $_POST('clientecorreo');
        $direccionexacta = $_POST('direccionexacta');

       if (strlen($clientenombre) > 0 && strlen($clienteapellido1) > 0 && strlen($clienteapellido2) > 0 && 
            strlen($clientecorreo) > 0 && strlen($clienteTelefono) > 0 
            && strlen($zonaid) > 0 && strlen($direccionexacta) > 0 ) {
            if (!is_numeric($nombreCliente)) {
                
                $cliente=new Personas($clienteTelefono, $clientenombre, $clienteapellido1, $clienteapellido2, $zonaid, $clientecorreo);
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
    }else if($accion=="actualizar"){
        
      if (isset($_POST['clientenombre']) && isset($_POST['clienteapellido1']) && isset($_POST['clienteapellido2'])
            && isset($_POST['clientecorreo']) && isset($_POST['clientetelefono'])
             && isset($_POST['direccionexacta']) && isset($_POST['zonaid'])) {
          
        $clienteNombre =$_POST('clientenombre');
        $clienteApellido1 =$_POST('clienteapellido1');
        $clienteApellido2 = $_POST('clienteapellido2');
        $clienteCorreo = $_POST('clientecorreo');
        $clienteTelefono = $_POST('clientetelefono');
        $zonaId= $_POST('zonaid');
        $direccionexacta = $_POST('direccionexacta');

       if (strlen($clienteNombre) > 0 && strlen($clienteApellido1) > 0 && strlen($clienteApellido2) > 0 && 
            strlen($clienteCorreo) > 0 && strlen($clienteTelefono) > 0 && strlen($zonaId) > 0 
            && strlen($direccionexacta) > 0 ) {
            if (!is_numeric($clienteNombre)) {
          
                $cliente=new Personas($clienteTelefono, $clienteNombre, $clienteApellido1, $clienteApellido2, $zonaId, $clienteCorreo);
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
    }else if($accion=="eliminar"){
        
    if(isset($_POST['clientetelefono'])){
        
            $clienteid=$_POST['clientetelefono'];
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
    } else if($accion=="buscar"){
        
       if(isset($_POST['clientetelefono'])){
           $clienteid=$_POST['clientetelefono'];
            
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
    }else  if($accion=="todo"){
        
            
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
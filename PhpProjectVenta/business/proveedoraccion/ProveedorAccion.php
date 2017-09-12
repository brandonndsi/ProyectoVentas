<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 *
 * @author David Salas.
 */

    include '../../domain/proveedores/Proveedores.php';

    if(isset($_POST["nuevo"])){
       
       if (isset($_POST['personanombre']) && isset($_POST['personaapellido1']) && 
        isset($_POST['personaapellido2']) && isset($_POST['personatelefono']) && 
        isset($_POST['personacorreo']) && isset($_POST['zonaid'])
        && isset($_POST['proveedordireccion'])) {
          
        
        $personanombre =$_POST['personanombre'];
        $personaapellido1 =$_POST['personaapellido1'];
        $personaapellido2 = $_POST['personaapellido2'];
        $personatelefono = $_POST['personatelefono'];
        $personacorreo = $_POST['personacorreo'];
        $zonaid=$_POST['zonaid'];
        $proveedordireccion=$_POST['proveedordireccion'];

       if (strlen($personanombre) > 0 && strlen($personaapellido1) > 0 && 
            strlen($personaapellido2) > 0 && strlen($personatelefono) > 0 
            && strlen($personacorreo) > 0 && strlen($zonaid) > 0 
            && strlen($proveedordireccion) > 0) {
            if (!is_numeric($personanombre)) {
                
               $proveedor = new Proveedores(null,$proveedordireccion,$zonaid);

                $proveedor->setPersonaNombre($personanombre);
                $proveedor->setPersonaApellido1($personaapellido1);
                $proveedor->setPersonaApellido2($personaapellido2);
                $proveedor->setPersonaTelefono($personatelefono);
                $proveedor->setCorreo($personacorreo);
                
                
            include '../../business/proveedorbusiness/ProveedorBusiness.php';

            $ProveedorBusiness=new ProveedorBusiness();

             $result= $ProveedorBusiness->insertarProveedor($proveedor);
             
        return header("location: ../../view/registroproveedor/RegistroProveedor.php?success=updated");
                
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
        
     if (isset($_POST['personanombre']) && isset($_POST['personaapellido1']) && 
        isset($_POST['personaapellido2']) && isset($_POST['personatelefono']) &&
        isset($_POST['proveedorid']) && isset($_POST['personacorreo']) 
        && isset($_POST['zonaid']) && isset($_POST['proveedordireccion'])) {
          
        
        $personanombre =$_POST['personanombre'];
        $personaapellido1 =$_POST['personaapellido1'];
        $personaapellido2 = $_POST['personaapellido2'];
        $personatelefono = $_POST['personatelefono'];
        $personacorreo = $_POST['personacorreo'];
        $clienteid =$_POST['proveedorid'];
        $zonaid=$_POST['zonaid'];
        $proveedordireccion=$_POST['proveedordireccion'];

       if (strlen($personanombre) > 0 && strlen($personaapellido1) > 0 && 
            strlen($personaapellido2) > 0 && strlen($personatelefono) > 0 
            && strlen($clienteid) >0 && strlen($personacorreo) > 0 
            && strlen($zonaid) > 0 && strlen($proveedordireccion) > 0) {
            if (!is_numeric($personanombre)) {
                
               $proveedor=new Proveedores($clienteid,null,$proveedordireccion,$zonaid);
                
                $proveedor->setPersonaNombre($personanombre);
                $proveedor->setPersonaApellido1($personaapellido1);
                $proveedor->setPersonaApellido2($personaapellido2);
                $proveedor->setPersonaTelefono($personatelefono);
                $proveedor->setCorreo($personacorreo);
                
                
            include '../../business/proveedorbusiness/ProveedorBusiness.php';

            $ProveedorBusiness=new ProveedorBusiness();
           
            $result= $ProveedorBusiness->modificarProveedor($proveedor);
            
            return   header("location: ../../view/registroproveedor/RegistroProveedor.php?success=updated");
            
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
        
    if(isset($_POST['proveedorid'])){
        
            $proveedorid=$_POST['proveedorid'];
           include '../../business/proveedorbusiness/ProveedorBusiness.php';
           
           $ProveedorBusiness=new ProveedorBusiness();
           
            $result= $ProveedorBusiness->eliminarProveedor($proveedorid);
         
            
            return   header("location: ../../view/registroproveedor/RegistroProveedor.php?success=updated");
        
    }else{
        //esto es porsi a la hora de eliminar el dato es vacio
         $error="ErrorEliminar";
        return $error;
    }
    
    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
      */
    } else if(isset($_POST["buscar"])){
        
       if(isset($_POST['proveedorid'])){
           $proveedorid=$_POST['proveedorid'];
            
           include '../proveedorbusiness/ProveedorBusiness.php';
           
           $ProveedorBusiness=new ProveedorBusiness();
           
            $result= $ProveedorBusiness->buscarProveedor($proveedorid);
            
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
        
            
           include '../proveedorbusiness/ProveedorBusiness.php';
           
           $ProveedorBusiness=new ProveedorBusiness();
           
            $result= $ProveedorBusiness->mostrarProductor();
           
            return $result;  
            
    }else       {
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                return $error;
               // echo json_encode($error);
                }
    

?>

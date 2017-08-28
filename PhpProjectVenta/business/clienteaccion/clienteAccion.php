<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 *
 * @author David Salas.
 */
    
    $accion = $_POST['accion'];//busca la accion a realizar 
 
    if($accion=="nuevo"){
       
       if (isset($_POST['clientenombre']) && isset($_POST['clienteapellido1']) && isset($_POST['clienteapellido2'])
            && isset($_POST['clientetipousuario']) && isset($_POST['clientetelefono']) && isset($_POST['idzona']) 
             && isset($_POST['idfactura']) && isset($_POST['fechafactura'])) {
          
        $nombreCliente =$_POST('clientenombre');
        $apellido1CLiente =$_POST('clienteapellido1');
        $apellido2Cliente = $_POST('clienteapellido2');
        $tipoUsuarioCliente = $_POST('clientetipousuario');
        $telefonoCliente = $_POST('clientetelefono');
        $idZona = $_POST('idzona');
        $idFactura = $_POST('idfactura');
        $fechaFactura = $_POST('fechafactura');

       if (strlen($nombreCliente) > 0 && strlen($apellido1Cliente) > 0 && strlen($apellido2Cliente) > 0 && 
            strlen($tipoUsuarioPersona) > 0 && strlen($telefonoCliente) > 0 && strlen($idZona) > 0 
             && strlen($idFactura) > 0 && strlen($fechaFactura) > 0 ) {
            if (!is_numeric($nombreCliente)) {
                $cliente = new Cliente($idCliente, $nombreCliente, $apellido1Cliente, $apellido2Cliente, 
                        $tipoUsuarioCliente, $telefonoCliente, $idZona, $idFactura, $fechaFactura);
            
            include '../clientebusiness/clienteBusiness.php';

            $ClienteBusiness=new clienteBusiness();

             $result= $ClienteBusiness->getTBClienteNuevo($cliente);

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
        
        if(isset($_POST['clienteid']) && isset($_POST['clientenombre']) && isset($_POST['clienteapellido1']) && isset($_POST['clienteapellido2'])
            && isset($_POST['clientetipousuario']) && isset($_POST['clientetelefono']) && isset($_POST['idzona']) && isset($_POST['idfactura'])&& isset($_POST['fechafactura']) ){
            
        $idCliente= $_POST('clienteid');
        $nombreCliente =$_POST('clientenombre');
        $apellido1Cliente =$_POST('clienteapellido1');
        $apellido2Cliente = $_POST('clienteapellido2');
        $tipoUsuarioCliente = $_POST('clientetipousuario');
        $telefonoCliente=$_POST('clientetelefono');
        $idZona = $_POST('idzona');
        $idFactura=$_POST('idfactura');
        $fechaFactura=$_POST('fechafactura');
            
        if (strlen($idCliente) > 0 &&strlen($nombreCliente) > 0 && strlen($apellido1Cliente) > 0 && strlen($apellido2Cliente) > 0 && 
            strlen($tipoUsuarioCliente) > 0 && strlen($telefonoCliente) > 0 && strlen($idZona) > 0 && strlen($idFactura) > 0 && strlen($fechaFactura) > 0) {
            if (!is_numeric($clientenombre)) {
                $cliente = new Cliente($idCliente, $nombreCliente, $apellido1Cliente, $apellido2Cliente, 
                        $tipoUsuarioCliente, $telefonoCliente, $idZona, $idFactura, $fechaFactura);
                
           include '../clientebusiness/clienteBusiness.php';
           
           $ClienteBusiness=new clienteBusiness();
           
            $result= $ClienteBusiness->getTBClienteActualizar($cliente);
            
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
        
    if(isset($_POST['clientenombre'])){
        
            $cliente=$_POST['clientenombre'];
           include '../clientebusiness/clienteBusiness.php';
           
           $ClienteBusiness=new clienteBusiness();
           
            $result= $ClienteBusiness->getTBClienteEliminar($cliente);
            
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
        
       if(isset($_POST['clientenombre'])){
           $clientenombre=$_POST['clientenombre'];
            
           include '../clientebusiness/clienteBusiness.php';
           
           $ClienteBusiness=new clienteBusiness();
           
            $result= $ClienteBusiness->getTBClienteBuscar($clientenombre);
            
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
        
      if(isset($_POST['dsd'])){
            
           include '../clientebusiness/clienteBusiness.php';
           
           $ClienteBusiness=new clienteBusiness();
           
            $result= $ClienteBusiness->getTBClienteTodo();
            
            echo json_encode($result);  
            
    }else       {
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                echo json_encode($error);
                }
    }else{
        /*
         * Esto es por si la accion a la que esta consultando es vacia o no conside con ninguna.
         */
       $error="ErrorAccion";
        echo json_encode($error); 
        
    }
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$accion = $_POST['accion'];//busca la accion a realizar 
 
    if($accion=="nuevo"){

    if (isset($_POST['materiaprimaprecio']) && isset($_POST['materiaprimaid']) 
           && isset($_POST['materiaprimanombre']) && isset($_POST['tipomateriaprimaid'])) {
             
        $materiaprimaprecio = $_POST['materiaprimaprecio'];
        $materiaprimaid = $_POST['materiaprimaid'];
        $materiaprimanombre = $_POST['materiaprimanombre'];
        $tipomateriaprimaid = $_POST['tipomateriaprimaid'];
        
        if (strlen($materiaprimatipoempleadosalariobase) > 0 && strlen($materiaprimatipoempleadodescripcion) > 0 
                && strlen($materiaprimatipoempleadohoraextra) > 0 && strlen($materiaprimatipoEmpleado) > 0) {
            if (!is_numeric($tipoEmpleado)) {
                
                $tipoEmpleado = new TipoEmpleados($tipoEmpleado, $tipoempleadosalariobase, 
                 $tipoempleadodescripcion, $tipoempleadohoraextra);
                
                include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();

             $result= $MateriaPrimaBusiness->getTBMateriaPrimaNuevo($tipoEmpleado);

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
        
         if (isset($_POST['materiaprimaprecio']) && isset($_POST['materiaprimaid']) 
           && isset($_POST['materiaprimanombre']) && isset($_POST['tipomateriaprimaid'])) {
             
        $materiaprimaprecio = $_POST['materiaprimaprecio'];
        $materiaprimaid = $_POST['materiaprimaid'];
        $materiaprimanombre = $_POST['materiaprimanombre'];
        $tipomateriaprimaid = $_POST['tipomateriaprimaid'];
        
        if (strlen($materiaprimatipoempleadosalariobase) > 0 && strlen($materiaprimatipoempleadodescripcion) > 0 
                && strlen($materiaprimatipoempleadohoraextra) > 0 && strlen($materiaprimatipoEmpleado) > 0) {
            if (!is_numeric($tipoEmpleado)) {
                
                $tipoEmpleado = new TipoEmpleados($tipoEmpleado, $tipoempleadosalariobase, 
                 $tipoempleadodescripcion, $tipoempleadohoraextra);
                
                include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();

             $result= $MateriaPrimaBusiness->getTBMateriaPrimaActualizar($tipoEmpleado);
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
        
    if(isset($_POST['materiaprimanombre'])){
        
            $empleado=$_POST['materiaprimanombre'];
             include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();
           
            $result= $tipoEmpleadoBusiness->getTBMateriaPrimaEliminar($empleado);
            
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
        
       if(isset($_POST['materiaprimanombre'])){
           $empleadonombre=$_POST['materiaprimanombre'];
            
             include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();
           
            $result= $tipoEmpleadoBusiness->getTBMateriaPrimaBuscar($empleadonombre);
            
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
        
            
             include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();
           
            $result= $TipoEmpleadoBusiness->getTBMateriaPrimaTodo();
            
            echo json_encode($result);  
            
    }else{
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                echo json_encode($error);
                }
    
?>

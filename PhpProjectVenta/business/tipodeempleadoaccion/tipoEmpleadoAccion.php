<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 * @author David Salas.
 */
//$accion = $_POST['accion'];//busca la accion a realizar 
include '../../domain/tipoempleados/TipoEmpleados.php';
    if(isset($_POST["nuevo"])){

    if (isset($_POST['tipoempleado']) && isset($_POST['tipoempleadodescripcion']) 
           && isset($_POST['tipoempleadosalariobase']) && isset($_POST['tipoempleadohoraextra'])) {
             
        $tipoEmpleado = $_POST['tipoempleado'];
        $tipoempleadodescripcion = $_POST['tipoempleadodescripcion'];
        $tipoempleadosalariobase = $_POST['tipoempleadosalariobase'];
        $tipoempleadohoraextra = $_POST['tipoempleadohoraextra'];
        
        if (strlen($tipoempleadosalariobase) > 0 && strlen($tipoempleadodescripcion) > 0 && strlen($tipoempleadohoraextra) > 0 && 
            strlen($tipoEmpleado) > 0) {
            if (!is_numeric($tipoEmpleado)) {
                
                $tipoEmpleador = new TipoEmpleados($tipoEmpleado, $tipoempleadosalariobase, 
                 $tipoempleadodescripcion, $tipoempleadohoraextra);
                
                include '../tipoempleadobusiness/tipoEmpleadoBusiness.php';

            $tipoEmpleadoBusiness=new tipoEmpleadoBusiness();

             $result= $tipoEmpleadoBusiness->insertarTipoEmpleado($tipoEmpleador);

             if ($result == 1) {
                   return header("location: ../../view/tipoempleadoview/TipoEmpleadoView.php?success=updated");
                } else {
                
                 return   header("location: ../../view/tipoempleadoview/TipoEmpleadoView.php?error=dbError");
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
        
        if (isset($_POST['tipoempleado']) && isset($_POST['tipoempleadodescripcion']) 
           && isset($_POST['tipoempleadosalariobase']) && isset($_POST['tipoempleadohoraextra'])) {
             
        $tipoEmpleado = $_POST['tipoempleado'];
        $tipoempleadodescripcion = $_POST['tipoempleadodescripcion'];
        $tipoempleadosalariobase = $_POST['tipoempleadosalariobase'];
        $tipoempleadohoraextra = $_POST['tipoempleadohoraextra'];
        
        if (strlen($tipoempleadosalariobase) > 0 && strlen($tipoempleadodescripcion) > 0 && strlen($tipoempleadohoraextra) > 0 && 
            strlen($tipoEmpleado) > 0) {
            if (!is_numeric($tipoEmpleado)) {
                
                $tipoEmpleador = new TipoEmpleados($tipoEmpleado, $tipoempleadosalariobase, 
                 $tipoempleadodescripcion, $tipoempleadohoraextra);
                
           include '../tipoempleadobusiness/tipoEmpleadoBusiness.php';
           
           $tipoEmpleadoBusiness=new tipoEmpleadoBusiness();
           
            $result= $tipoEmpleadoBusiness->modificarTipoEmpleado($tipoEmpleador);
            
            return   header("location: ../../view/tipoempleadoview/TipoEmpleadoView.php?success=updated");
            
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
        
    if(isset($_POST['tipoempleado'])){
        
            $empleado=$_POST['tipoempleado'];
           include '../tipoempleadobusiness/tipoEmpleadoBusiness.php';
           
           $tipoEmpleadoBusiness=new tipoEmpleadoBusiness();
           
            $result= $tipoEmpleadoBusiness->eliminarTipoEmpleado($empleado);
            
            return   header("location: ../../view/tipoempleadoview/TipoEmpleadoView.php?success=updated");
        
    }else{
        //esto es porsi a la hora de eliminar el dato es vacio
         $error="ErrorEliminar";
        return $error;
    }
    
    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
      */
    } else if(isset($_POST["buscar"])){
        
       if(isset($_POST['tipoempleado'])){
           $empleadonombre=$_POST['tipoempleado'];
            
           include '../tipoempleadobusiness/tipoEmpleadoBusiness.php';
           
           $tipoEmpleadoBusiness=new tipoEmpleadoBusiness();
           
            $result= $tipoEmpleadoBusiness->buscarTipoEmpleado($empleadonombre);
            
            return $result; 
    
        
    }else{
        //lo que hace es retornar el error en un json el cual informa que algun
        // dato de busqueda no esta bieno no se encontro nada
         $error="ErrorBuscar";
        return $error;
    }
    
    /*
     *  Esta conslta lo que debe devolver es todos los datos de los clientes.   
      */
    }else  if(isset($_POST["todo"])){
        
            
           include '../tipoempleadobusiness/tipoEmpleadoBusiness.php';
           
           $tipoEmpleadoBusiness=new tipoEmpleadoBusiness();
           
            $result= $tipoEmpleadoBusiness->mostrarTipoEmpleado();
            
            return $result;  
            
    }else{
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                return $error;
                }
    
?>
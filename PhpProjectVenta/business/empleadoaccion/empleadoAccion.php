<?php
/**
 * Descripcion valida que los datos y la accion a realizar sean correcta sino redirecciona
 * a paguinas de error y si los datos y la accion es correcta imboca a la businerss para
 * que se haga cargo de los datos y el metodo a efectuar.
 *
 * @author David Salas.
 */

    //$accion = $_POST['accion'];//busca la accion a realizar 
    include '../../domain/empleados/Empleados.php';
    if(isset($_POST["nuevo"])){

    if (isset($_POST['empleadoid']) && isset($_POST['personaid']) && isset($_POST['tipoempleado']) && 
            isset($_POST['empleadocedula']) && isset($_POST['empleadocontrasenia'])
            && isset($_POST['empleadoedad']) && isset($_POST['empleadosexo']) && isset($_POST['empleadoestadocivil'])
             && isset($_POST['empleadocuentabancaria']) && isset($_POST['empleadolicenciaid'])) {
             
        $empleadoid = $_POST['empleadoid'];
        $personaid = $_POST['perdonaid'];
        $empleadotipo = $_POST['tipoempleado'];
        $empleadocedula = $_POST['empleadocedula'];
        $empleadocontrasena= $_POST['empleadocontrasena'];
        $empleadoedad= $_POST['empleadoedad'];
        $empleadosexo= $_POST['empleadosexo'];
        $empleadoestadoCivil= $_POST['empleadoestadocivil'];
        $empleadocuentabancaria= $_POST['empleadocuentabancaria'];
        $empleadolicenciaid= $_POST['empleadolicenciaid'];
        
        if (strlen($empleadoid) > 0 && strlen($personaid) > 0 && strlen($empeladotipo) > 0 && 
            strlen($empleadocedula) > 0 && strlen($empleadocontrasena) > 0 && strlen($empleadoedad) > 0 
             && strlen($empleadosexo) > 0 && strlen($empleadoestadoCivil) >
             0 && strlen($empleadoestadocuentabancaria) > 0  && strlen($empleadolicenciaid) > 0) {
            if (is_numeric($empleadocedula)) {
                $empleado = new Empleados($empleadoid, $personaid, $empleadotipo, $empleadocedula, 
                 $empleadocontrasena, $empleadoedad, $empleadosexo, $empleadoestadoCivil, 
                  $empleadocuentabancaria, $empleadolicenciaid);
                
                include '../empleadobusiness/empleadoBusiness.php';

            $empleadoBusiness=new empleadoBusiness();

             $result= $empleadoBusiness->insertarEmpleado($empleado);
                if ($result == 1) {
                   return header("location: ../../view/registroempleado/RegistroEmpleado.php?success=updated");
                } else {
                
                 return   header("location: ../../view/registroempleado/RegistroEmpleado.php?error=dbError");
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
        
        if (isset($_POST['empleadoid']) && isset($_POST['personaid']) && isset($_POST['tipoempleado']) && 
            isset($_POST['empleadocedula']) && isset($_POST['empleadocontrasena'])
            && isset($_POST['empleadoedad']) && isset($_POST['empleadosexo']) && isset($_POST['empleadoestadocivil'])
             && isset($_POST['empleadocuentabancaria']) && isset($_POST['empleadolicenciaid'])) {
             
        $empleadoid = $_POST['empleadoid'];
        $personaid = $_POST['perdonaid'];
        $empleadotipo = $_POST['tipoempleado'];
        $empleadocedula = $_POST['empleadocedula'];
        $empleadocontrasena= $_POST['empleadocontrasena'];
        $empleadoedad= $_POST['empleadoedad'];
        $empleadosexo= $_POST['empleadosexo'];
        $empleadoestadoCivil= $_POST['empleadoestadocivil'];
        $empleadocuentabancaria= $_POST['empleadocuentabancaria'];
        $empleadolicenciaid= $_POST['empleadolicenciaid'];
        
        if (strlen($empleadoid) > 0 && strlen($personaid) > 0 && strlen($empeladotipo) > 0 && 
            strlen($empleadocedula) > 0 && strlen($empleadocontrasena) > 0 && strlen($empleadoedad) > 0 
             && strlen($empleadosexo) > 0 && strlen($empleadoestadoCivil) >
             0 && strlen($empleadoestadocuentabancaria) > 0  && strlen($empleadolicenciaid) > 0) {
            if (is_numeric($empleadocedula)) {
                $empleado = new Empleados($empleadoid, $personaid, $empleadotipo, $empleadocedula, 
                 $empleadocontrasena, $empleadoedad, $empleadosexo, $empleadoestadoCivil, 
                  $empleadocuentabancaria, $empleadolicenciaid);
           include '../empleadobusiness/empleadoBusiness.php';
           
           $empleadoBusiness=new empleadoBusiness();
           
            $result= $empleadoBusiness->modificarEmpleado($empleado);
            
            return header("location: ../../view/registroempleado/RegistroEmpleado.php?success=updated");
            
            
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
        
    if(isset($_POST['clientenombre'])){
        
            $empleado=$_POST['clientenombre'];
           include '../empleadobusiness/empleadoBusiness.php';
           
           $empleadoBusiness=new empleadoBusiness();
           
            $result= $empleadoBusiness->eliminarEmpleado($empleado);
            
            return header("location: ../../view/registroempleado/RegistroEmpleado.php?success=updated");
        
    }else{
        //esto es porsi a la hora de eliminar el dato es vacio
         $error="ErrorEliminar";
        return $error;
    }
    
    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
      */
    } else if(isset($_POST["buscar"])){
        
       if(isset($_POST['clientenombre'])){
           $empleadonombre=$_POST['clientenombre'];
            
           include '../empleadobusiness/empleadoBusiness.php';
           
           $empleadoBusiness=new empleadoBusiness();
           
            $result= $empleadoBusiness->buscarEmpleado($empleadonombre);
            
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
        
            
           include '../empleadobusiness/empleadoBusiness.php';
           
           $empleadoBusiness=new empleadoBusiness();
           
            $result= $empleadoBusiness->mostrarEmpleados();
            
            return $result;  
            
    }else{
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                return $error;
                }
    
?>
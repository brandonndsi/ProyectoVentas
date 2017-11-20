<?php

  include '../../domain/materiaprimas/MateriaPrimas.php';
    if(isset($_POST["nuevo"])){

    if (isset($_POST['materiaprimaprecio']) && isset($_POST['materiaprimacantidad']) 
        && isset($_POST['materiaprimanombre'])&& isset($_POST['materiaprimacodigo'])
       && isset($_POST['tipomateriaprimaid'])&& isset($_POST['ultimacompra'])) {
             
        $materiaprimaprecio = $_POST['materiaprimaprecio'];
        $materiaprimacodigo = $_POST['materiaprimacodigo'];
        $materiaprimanombre = $_POST['materiaprimanombre'];
        $materiaprimacantidad = $_POST['materiaprimacantidad'];
        $tipomateriaprimaid = $_POST['tipomateriaprimaid'];
        $ultimacompra = $_POST['ultimacompra'];
        
        if (strlen($materiaprimaprecio) > 0 && strlen($materiaprimacodigo) > 0 
            && strlen($materiaprimanombre) > 0 && strlen($materiaprimacantidad) > 0
            && strlen($tipomateriaprimaid) > 0 && strlen($ultimacompra) > 0 ) {

            if (is_numeric($materiaprimaprecio)) {
                //MateriasPrimas($materiaprimaid,$materiaprimacodigo, $materiaprimanombre, //$materiaprimaprecio, $materiaprimacantidad, $materiaprimatipoid)
                $materiaprimas = new MateriasPrimas(null,$materiaprimacodigo, $materiaprimanombre,
                        $materiaprimaprecio, $materiaprimacantidad,$tipomateriaprimaid);
                $materiaprimas->setMateriaPrimaUltimaCompra($ultimacompra);
                
                include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();

             $result= $MateriaPrimaBusiness->insertarMateriaPrima($materiaprimas);
            if ($result =="true") {
                   return header("location: ../../view/registromateriaprima/RegistroMateriaPrima.php?success=updated");
                } else {
                
                 return   header("location: ../../view/registromateriaprima/RegistroMateriaPrima.php?error=dbError");
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
        
         if (isset($_POST['materiaprimaprecio']) && isset($_POST['materiaprimacantidad']) 
        && isset($_POST['materiaprimanombre'])&& isset($_POST['materiaprimacodigo'])
       && isset($_POST['tipomateriaprimaid'])&& isset($_POST['ultimacompra'])
            && isset($_POST['materiaprimaid'])) {
        $materiaprimaid = $_POST['materiaprimaid'];
        $materiaprimaprecio = $_POST['materiaprimaprecio'];
        $materiaprimacodigo = $_POST['materiaprimacodigo'];
        $materiaprimanombre = $_POST['materiaprimanombre'];
        $materiaprimacantidad = $_POST['materiaprimacantidad'];
        $tipomateriaprimaid = $_POST['tipomateriaprimaid'];
        $ultimacompra = $_POST['ultimacompra'];
        
        if (strlen($materiaprimaprecio) > 0 && strlen($materiaprimacodigo) > 0 
            && strlen($materiaprimanombre) > 0 && strlen($materiaprimacantidad) > 0
            && strlen($tipomateriaprimaid) > 0 && strlen($ultimacompra) > 0 
                && strlen($materiaprimaid)) {

            if (is_numeric($materiaprimaprecio)) {
                //MateriasPrimas($materiaprimaid,$materiaprimacodigo, $materiaprimanombre, //$materiaprimaprecio, $materiaprimacantidad, $materiaprimatipoid)
                $materiaprimas = new MateriasPrimas($materiaprimaid,$materiaprimacodigo, $materiaprimanombre,
                        $materiaprimaprecio, $materiaprimacantidad,$tipomateriaprimaid);
                $materiaprimas->setMateriaPrimaUltimaCompra($ultimacompra);
                
                include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();

             $result= $MateriaPrimaBusiness->modificarMateriaPrima($materiaprimas);
             
            return header("location: ../../view/registromateriaprima/RegistroMateriaPrima.php?success=updated");
            
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
        
    if(isset($_POST['materiaprimaid'])){
        
            $materias=$_POST['materiaprimaid'];
            
             include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();
           
            $result= $MateriaPrimaBusiness->eliminarMateriaPrima($materias);
            
            return header("location: ../../view/registromateriaprima/RegistroMateriaPrima.php?success=updated");
        
    }else{
        //esto es porsi a la hora de eliminar el dato es vacio
         $error="ErrorEliminar";
        return $error;
    }
    
    /*
     *  Esta consulta lo que debe devolver es el datos del cliente.por nombre   
      */
    } else if(isset($_POST["buscar"])){
        
       if(isset($_POST['materiaprimaid'])){
           $materias=$_POST['materiaprimaid'];
            
             include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();
           
            $result= $MateriaPrimaBusiness->buscarMateriaPrima($materias);
            
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
        
            
             include '../materiaprimabusiness/MateriaPrimaBusiness.php';

            $MateriaPrimaBusiness=new MateriaPrimaBusiness();
           
            $result= $MateriaPrimaBusiness->mostrarMateriaPrima();
            
            return $result;  
            
    }else{
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                return $error;
                }
    
?>

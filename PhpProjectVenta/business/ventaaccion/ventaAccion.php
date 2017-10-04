<?php

include '../../domain/ventas/Ventas';

if(isset($_POST['todo'])){
        
            
              include '../ventabusiness/ventaBusiness.php';

            $ventaBusiness=new ventaBusiness();
           
            $result= $ventaBusiness->mostrarVenta();
            
            return $result;  
            
    }else{
        //esto lo que retorna es un json  que dice que hay un error al tratar de obtener todos lo datos
                $error="ErrorTodo";
                return $error;
                }
    
?>
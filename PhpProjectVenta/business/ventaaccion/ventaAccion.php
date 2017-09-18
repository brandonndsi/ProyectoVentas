<?php

/* 
 Autor david  salas lorente  Tools | Templates
 * and open the template in the editor.
 */
//$accion = $_POST['accion'];//busca la accion a realizar 
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
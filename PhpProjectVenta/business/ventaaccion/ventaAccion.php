<?php

/*include '../../domain/ventas/Ventas';*/
include 'pro.php';

if(isset($_POST['todo'])){
        
            
              include '../ventabusiness/ventaBusiness.php';

            $ventaBusiness=new ventaBusiness();
           
            $result= $ventaBusiness->mostrarVenta();
            
            return $result;  
            
    }else if(isset($_POST['agregar'])){

    	$p = new pro();
    	$p->codigo = $_POST['productocodigo'];
    	$p->nombre = $_POST['productonombre'];
    	$p->cantidad = $_POST['productocantidad'];
        $p->precio = $_POST['productoprecio'];
        $p->subtotal = $p->precio* $p->cantidad;

    	session_start();
        
    	if(isset($_SESSION["carrito"])){
    		$carrito =$_SESSION["carrito"];
    	}else{
    		$carrito = array();
    	}
    	array_push($carrito,$p);
    	$_SESSION["carrito"]=$carrito;

    	header("location: ../../view/compraview/CompraView.php");

    	
    }else if(isset($_GET['eliminar'])){
        $index=$_GET['eliminar'];
        session_start();
        if(isset($_SESSION["carrito"])){
            $carrito =$_SESSION["carrito"];
            unset($carrito[$index]);
            $carrito = array_values($carrito);/*reordena el carrito indises*/

            $_SESSION["carrito"] = $carrito;

            if(count($carrito)==0){
                session_unset($carrito);
                session_destroy();
            }
        }
        header("location: ../../view/compraview/CompraView.php");
    }else if(isset($_POST['actualizar'])){
        session_start();
        if(isset($_SESSION["carrito"])){
            
        }

    }
?>
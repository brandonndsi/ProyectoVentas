<?php 
session_start();

if($_SESSION['personacorreo']){	
	session_destroy();
	header("location:../../view/loginview/LoginView.php");
}
else{
	header("location:../../view/loginview/LoginView.php");
}
?>

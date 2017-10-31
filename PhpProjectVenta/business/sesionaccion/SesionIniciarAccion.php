<?php

//Recibimos los datos enviados desde el formulario
$correoPersona = $_POST['personacorreo'];
$contraseniaPersona = $_POST['empleadocontrasenia'];

if (isset($correoPersona)) {
    
    //Proceso de conexion con la base de datos
    //$conexion =new Conexion();
   // $conex = $this->conexion->crearConexion();
$conexion = mysql_connect("localhost", "root","");
mysql_database("bdexpressdjb",$conexion) or die ("No se pudo realizar la conexion");
            //or die("ERROR con la base de datos");

    //Inicio de variables de sesion
    //Consultar si los datos est�n guardados en la base de datos

    if ($conexion == true) {
        $consulta = "SELECT *
                FROM tbempleados e
                INNER JOIN tbpersonas p ON e.personaid= p.personaid
                INNER JOIN tbtipoempleados te ON e.tipoempleado= te.tipoempleadoid
                WHERE p.personacorreo='$correoPersona' AND e.empleadocontrasenia='$contraseniaPersona' AND e.empleadoestado=1";

        $result = mysql_query($consulta);

        if ($fila = mysql_fetch_array($result)) {

            session_start();
            $_SESSION['personaid'] = $fila['personaid'];
            $_SESSION['empleadocedula'] = $fila['empleadocedula'];
            $_SESSION['personacorreo'] = $fila['personacorreo'];
            $_SESSION['personanombre'] = $fila['personanombre'];

            if ($fila['tipoempleado'] == "Administrador") {
                header("Location: ../../view/ventanaprincipalview/VentanaPrincipalView.php");
            } else {
                header("Location: ../../view/ventanaprincipalcajeroView/VentanaPrincipalCajeroView.php");
            }
        } else {
            header("location:../../view/loginview/LoginView.php");
        }//Si el usuario existe
    }//De la conexion
} else {
    header("location:../../view/loginview/LoginView.php");
}//isset($correoPersona)
?>
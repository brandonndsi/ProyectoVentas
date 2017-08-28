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
        
        if (strlen($empleadoid) > 0 && strlen($personaid) > 0 && strlen($empleadotipo > 0 && strlen($empleadocedula) > 0 && strlen($empleadocontrasena) > 0 
                && strlen($empleadoedad) > 0 && strlen($empleadosexo) > 0 && strlen($empleadoestadocivil) > 0 
                && strlen($empleadocuentabancaria) > 0 && strlen($empleadolicenciaid) > 0) {
            if (is_numeric($cedulaEmpleado)) {
                $Empleado = new Empleado($idEmpleado, $cedulaEmpleado, $contrasenaEmpleado, $correoEmpleado,
                        $cuentaBancariaEmpleado, $sexoEmpleado, $estadoCivilEmpleado, $edadEmpleado, $salarioBaseEmpleado,
                        $descripcionEmpleado);

?>
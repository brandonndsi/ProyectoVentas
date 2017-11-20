<?php
class DataHistorial{

private $Conexion;

function DataHistorial(){
include '../../data/dbconexion/Conexion.php';
include '../../data/datahistorial/DataHistorial.php';
$this->Conexion = new Conexion();

}
function insertarHistorial($historial){

}

function mostrarHistoralFecha($historialfecha){

}

function mostrarHistorialMasVendidos($historialmasvendido){

}

function mostrarHistorialMenosVendidos($historialmenosvendido){

}

function mostrarHistorialCliente($historialCliente){

}

function mostrarHistorialPorDia($historialdia){

}

}


?>
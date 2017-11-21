<?php

  include '../../domain/personas/Personas.php';
  
class Empleados extends Personas {

    private $empleadoid;
    private $personaid;
    private $tipoempleado;
    private $empleadocedula;
    private $empleadocontrasenia;
    private $fechaingreso;
    private $empleadoedad;
    private $empleadosexo;
    private $empleadoestadocivil;
    private $empleadobanco;
    private $empleadocuentabancaria;
    private $empleadolicenciaid;

    public function Empleados($empleadoid, $personaid, $tipoempleado, $empleadocedula, $empleadocontrasenia,$fechaingreso,$empleadoedad, $empleadosexo, $empleadoestadocivil,$empleadobanco, $empleadocuentabancaria, $empleadolicenciaid) {
        $this->empleadoid = $empleadoid;
        $this->personaid = $personaid;
        $this->tipoempleado = $tipoempleado;
        $this->empleadocedula = $empleadocedula;
        $this->empleadocontrasenia = $empleadocontrasenia;
        $this->fechaingreso = $fechaingreso;
        $this->empleadoedad = $empleadoedad;
        $this->empleadosexo = $empleadosexo;
        $this->empleadoestadocivil = $empleadoestadocivil;
        $this->empleadobanco = $empleadobanco;
        $this->empleadocuentabancaria = $empleadocuentabancaria;
        $this->empleadolicenciaid = $empleadolicenciaid;
    }
    public function getEmpleadoBanco(){
        return $this->empleadobanco;
    }
    public function getFechaIngreso(){
        return $this->fechaingreso;
    }
    public function getEmpleadoid() {
        return $this->empleadoid;
    }

    public function getPersonaid() {
        return $this->personaid;
    }

    public function getTipoEmpleado() {
        return $this->tipoempleado;
    }

    public function getEmpleadoCedula() {
        return $this->empleadocedula;
    }

    public function getEmpleadoContrasenia() {
        return $this->empleadocontrasenia;
    }

    public function getEmpleadoEdad() {
        return $this->empleadoedad;
    }

    public function getEmpleadoSexo() {
        return $this->empleadosexo;
    }

    public function getEmpleadoEstadoCivil() {
        return $this->empleadoestadocivil;
    }

    public function getEmpleadoCuentaBancaria() {
        return $this->empleadocuentabancaria;
    }

    public function getEmpleadoLicenciaId() {
        return $this->empleadolicenciaid;
    }
    public function setBanco($banco){
        $this->banco = $banco;
    }
    public function setFechaIngreso($fechaingreso){
        $this->fechaingreso =$fechaingreso;
    }
    public function setEmpleadoId($empleadoid) {
        $this->empleadoid = $empleadoid;
    }

    public function setPersonaId($personaid) {
        $this->personaid = $personaid;
    }

    public function setTipoEmpleado($tipoempleado) {
        $this->tipoempleado = $tipoempleado;
    }

    public function setEmpleadoCedula($empleadocedula) {
        $this->empleadocedula = $empleadocedula;
    }

    public function setEmpleadoContrasenia($empleadocontrasenia) {
        $this->empleadocontrasenia = $empleadocontrasenia;
    }

    public function setEmpleadoEdad($empleadoedad) {
        $this->empleadoedad = $empleadoedad;
    }

    public function setEmpleadoSexo($empleadosexo) {
        $this->empleadosexo = $empleadosexo;
    }

    public function setEmpleadoEstadoCivil($empleadoestadocivil) {
        $this->empleadoestadocivil = $empleadoestadocivil;
    }

    public function setEmpleadoCuentaBancaria($empleadocuentabancaria) {
        $this->empleadocuentabancaria = $empleadocuentabancaria;
    }

    public function setEmpleadoLicenciaId($empleadolicenciaid) {
        $this->empleadolicenciaid = $empleadolicenciaid;
    }
}

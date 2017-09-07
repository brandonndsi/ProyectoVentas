<?php
/**
 * Description of Persona
 *
 * @author Juancho
 */
 include '../../domain/zonas/Zonas.php';
 
class Personas extends Zonas {

    private $personaTelefono;
    private $personaNombre;
    private $personaApellido1;
    private $personaApellido2;
    private $correo;
    private $idZona;
   
    

    public function Personas($personaTelefono, $personaNombre, $personaApellido1, $personaApellido2, $idZona, $correo) {
        
        $this->personaTelefono = $personaTelefono;
        $this->personaNombre = $personaNombre;
        $this->personaApellido1 = $personaApellido1;
        $this->personaApellido2 = $personaApellido2;
        $this->idZona = $idZona;
        $this->correo = $correo;
    }
    

    public function getPersonaTelefono() {
        return $this->personaTelefono;
    }

    public function getPersonaNombre() {
        return $this->personaNombre;
    }

    public function getPersonaApellido1() {
        return $this->personaApellido1;
    }

    public function getPersonaApellido2() {
        return $this->personaApellido2;
    }

    public function getIdZona() {
        return $this->idZona;
    }
    
    public function getCorreo() {
        return $this->correo;
    }

    public function setPersonaTelefono($personaTelefono) {
        $this->personaTelefono = $personaTelefono;
    }

    public function setPersonaNombre($personaNombre) {
        $this->personaNombre = $personaNombre;
    }

    public function setPersonaApellido1($personaApellido1) {
        $this->personaApellido1 = $personaApellido1;
    }

    public function setPersonaApellido2($personaApellido2) {
        $this->personaApellido2 = $personaApellido2;
    }

    public function setIdZona($idZona) {
        $this->idZona = $idZona;
    }
    public function setCorreo($correo) {
        $this->correo = $correo;
    }

}

?>
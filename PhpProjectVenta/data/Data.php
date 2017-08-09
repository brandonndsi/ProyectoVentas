<?php

class Data {

    public $server;
    public $user;
    public $password;
    public $db;
    public $connection;
    public $isActive;

    /* constructor */

    public function Data() {
        $hostName = gethostname();

        switch ($hostName) {
            case "empleado": //Office's PC
                $this->isActive = false;
                $this->server = "localhost";
                $this->user = "root";
                $this->password = "";
                $this->db = "bdprojectoventa";
                break;
            default: //Hosting
                $this->isActive = false;
                $this->server = "x.x.x.x";
                $this->user = "xxxxxxx";
                $this->password = "xxxxxxx";
                $this->db = "xxxxxxxxxx";
                break;
        }
    }

}

<?php

class user_tbl_organizer{

    private $id;
    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $rut;
    private $email;
    private $celular;
    private $password;
    private $fecha_registro;
    private $activo;
    private $acceso;

    public function __construct($id, $nombre, $apellido_paterno, $apellido_materno, $rut, $email, $celular, $password, $fecha_registro, $activo, $acceso) {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido_paterno = $apellido_paterno;
        $this->apellido_materno = $apellido_materno;
        $this->rut = $rut;
        $this->email = $email;
        $this->celular = $celular;
        $this->password = $password;
        $this->fecha_registro = $fecha_registro;
        $this->activo = $activo;
        $this->acceso = $acceso;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_nombre() {
        return $this->nombre;
    }

    public function obtener_apellido_paterno() {
        return $this->apellido_paterno;
    }

    public function obtener_apellido_materno() {
        return $this->apellido_materno;
    }

    public function obtener_rut() {
        return $this->rut;
    }

    public function obtener_email() {
        return $this->email;
    }

    public function obtener_celular() {
        return $this->celular;
    }

    public function obtener_password() {
        return $this->password;
    }

    public function obtener_fecha_registro() {
        return $this->fecha_registro;
    }

    public function obtener_activo() {
        return $this->activo;
    }

    public function obtener_acceso() {
        return $this->acceso;
    }
}
?>
<?php

class class_tabla_empresarios {

    private $id;
    private $codigo_empresario;
    private $plan_negocio;
    private $descripcion;
    private $cofinanciamiento;
    private $aporte_empresarial;
    private $total;
    private $rut;
    private $nombre;
    private $apellido_paterno;
    private $apellido_materno;
    private $direccion_particular;
    private $comuna_direccion_particular;
    private $direccion;
    private $comuna;
    private $provincia;
    private $telefono;
    private $celular;
    private $email;
    private $rut_razon_social;
    private $razon_social;
    private $rut_representante;
    private $representante;
    private $persona_juridica;
    private $tipo_juridica;
    private $rut_evaluador;
    private $rut_asesor;
    private $rut_ejecutivo;
    private $estado;
    private $utm_north;
    private $utm_east;
    private $utm_zone;
    private $utm_hemisferio;

    public function __construct(
    $id, $codigo_empresario, $plan_negocio, $descripcion, $cofinanciamiento, $aporte_empresarial, $total, $rut, $nombre, $apellido_paterno, $apellido_materno, $direccion_particular, $comuna_direccion_particular, $direccion, $comuna, $provincia, $telefono, $celular, $email, $rut_razon_social, $razon_social, $rut_representante, $representante, $persona_juridica, $tipo_juridica, $rut_evaluador, $rut_asesor, $rut_ejecutivo, $estado, $utm_north, $utm_east, $utm_zone, $utm_hemisferio
    ) {
        $this->id = $id;
        $this->codigo_empresario = $codigo_empresario;
        $this->plan_negocio = $plan_negocio;
        $this->descripcion = $descripcion;
        $this->cofinanciamiento = $cofinanciamiento;
        $this->aporte_empresarial = $aporte_empresarial;
        $this->total = $total;
        $this->rut = $rut;
        $this->nombre = $nombre;
        $this->apellido_paterno = $apellido_paterno;
        $this->apellido_materno = $apellido_materno;
        $this->direccion_particular = $direccion_particular;
        $this->comuna_direccion_particular = $comuna_direccion_particular;
        $this->direccion = $direccion;
        $this->comuna = $comuna;
        $this->provincia = $provincia;
        $this->telefono = $telefono;
        $this->celular = $celular;
        $this->email = $email;
        $this->rut_razon_social = $rut_razon_social;
        $this->razon_social = $razon_social;
        $this->rut_representante = $rut_representante;
        $this->representante = $representante;
        $this->persona_juridica = $persona_juridica;
        $this->tipo_juridica = $tipo_juridica;
        $this->rut_evaluador = $rut_evaluador;
        $this->rut_asesor = $rut_asesor;
        $this->rut_ejecutivo = $rut_ejecutivo;
        $this->estado = $estado;
        $this->utm_north = $utm_north;
        $this->utm_east = $utm_east;
        $this->utm_zone = $utm_zone;
        $this->utm_hemisferio = $utm_hemisferio;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_codigo_empresario() {
        return $this->codigo_empresario;
    }

    public function obtener_plan_negocio() {
        return $this->plan_negocio;
    }

    public function obtener_descripcion() {
        return $this->descripcion;
    }

    public function obtener_cofinanciamiento() {
        return $this->cofinanciamiento;
    }

    public function obtener_aporte_empresarial() {
        return $this->aporte_empresarial;
    }

    public function obtener_total() {
        return $this->total;
    }

    public function obtener_rut() {
        return $this->rut;
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

    public function obtener_direccion_particular() {
        return $this->direccion_particular;
    }

    public function obtener_comuna_direccion_particular() {
        return $this->comuna_direccion_particular;
    }

    public function obtener_direccion() {
        return $this->direccion;
    }

    public function obtener_comuna() {
        return $this->comuna;
    }

    public function obtener_provincia() {
        return $this->provincia;
    }

    public function obtener_telefono() {
        return $this->telefono;
    }

    public function obtener_celular() {
        return $this->celular;
    }

    public function obtener_email() {
        return $this->email;
    }

    public function obtener_rut_razon_social() {
        return $this->rut_razon_social;
    }

    public function obtener_razon_social() {
        return $this->razon_social;
    }

    public function obtener_rut_representante() {
        return $this->rut_representante;
    }

    public function obtener_representante() {
        return $this->representante;
    }

    public function obtener_persona_juridica() {
        return $this->persona_juridica;
    }

    public function obtener_tipo_juridica() {
        return $this->tipo_juridica;
    }

    public function obtener_rut_evaluador() {
        return $this->rut_evaluador;
    }

    public function obtener_rut_asesor() {
        return $this->rut_asesor;
    }

    public function obtener_rut_ejecutivo() {
        return $this->rut_ejecutivo;
    }

    public function obtener_estado() {
        return $this->estado;
    }

    public function obtener_utm_north() {
        return $this->utm_north;
    }

    public function obtener_utm_east() {
        return $this->utm_east;
    }

    public function obtener_utm_zone() {
        return $this->utm_zone;
    }

    public function obtener_utm_hemisferio() {
        return $this->utm_hemisferio;
    }

}

<?php

class class_tabla_archivos {

    private $id;
    private $codigo_empresario;
    private $archivo;
    private $extension;
    private $ruta;
    private $descripcion;
    private $tipo;
    private $fecha;
    private $asignacion;
    private $grupo;

    public function __construct(
    $id, $codigo_empresario, $archivo, $extension, $ruta, $descripcion, $tipo, $fecha, $asignacion, $grupo) {

        $this->id = $id;
        $this->codigo_empresario = $codigo_empresario;
        $this->archivo = $archivo;
        $this->extension = $extension;
        $this->ruta = $ruta;
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->fecha = $fecha;
        $this->asignacion = $asignacion;
        $this->grupo = $grupo;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_codigo_empresario() {
        return $this->codigo_empresario;
    }

    public function obtener_archivo() {
        return $this->archivo;
    }

    public function obtener_extension() {
        return $this->extension;
    }

    public function obtener_ruta() {
        return $this->ruta;
    }

    public function obtener_descripcion() {
        return $this->descripcion;
    }

    public function obtener_tipo() {
        return $this->tipo;
    }

    public function obtener_fecha() {
        return $this->fecha;
    }

    public function obtener_asignacion() {
        return $this->asignacion;
    }

    public function obtener_grupo() {
        return $this->grupo;
    }

}

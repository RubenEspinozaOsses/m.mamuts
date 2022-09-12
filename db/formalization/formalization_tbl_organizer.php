<?php

class class_tabla_formalizacion {

    private $id;
    private $codigo_empresario;
    private $fecha_inicio;
    private $fecha_termino;
    private $dias;
    private $tipo_documento;

    public function __construct($id, $codigo_empresario, $fecha_inicio, $fecha_termino, $dias, $tipo_documento) {
        $this->id = $id;
        $this->codigo_empresario = $codigo_empresario;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_termino = $fecha_termino;
        $this->dias = $dias;
        $this->tipo_documento = $tipo_documento;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_codigo_empresario() {
        return $this->codigo_empresario;
    }

    public function obtener_fecha_inicio() {
        return $this->fecha_inicio;
    }

    public function obtener_fecha_termino() {
        return $this->fecha_termino;
    }

    public function obtener_dias() {
        return $this->dias;
    }

    public function obtener_tipo_documento() {
        return $this->tipo_documento;
    }

}

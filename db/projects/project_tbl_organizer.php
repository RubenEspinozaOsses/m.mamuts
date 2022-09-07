<?php

class class_tabla_proyectos{

    private $id;
    private $codigo_bp;
    private $instrumento;
    private $proyecto;
    private $periodo;
    private $cobertura;
    private $fuente_financiamiento;
    private $codigo_sap_oh;
    private $codigo_sap_operaciones;
    private $estado;

    public function __construct(
    $id, $codigo_bp, $instrumento, $proyecto, $periodo, $cobertura, $fuente_financiamiento, $codigo_sap_oh, $codigo_sap_operaciones, $estado
    ) {
        $this->id = $id;
        $this->codigo_bp = $codigo_bp;
        $this->instrumento = $instrumento;
        $this->proyecto = $proyecto;
        $this->periodo = $periodo;
        $this->cobertura = $cobertura;
        $this->fuente_financiamiento = $fuente_financiamiento;
        $this->codigo_sap_oh = $codigo_sap_oh;
        $this->codigo_sap_operaciones = $codigo_sap_operaciones;
        $this->estado = $estado;
    }


    public function obtener_id() {
        return $this->id;
    }

    public function obtener_codigo_bp() {
        return $this->codigo_bp;
    }

    public function obtener_instrumento() {
        return $this->instrumento;
    }

    public function obtener_proyecto() {
        return $this->proyecto;
    }

    public function obtener_periodo() {
        return $this->periodo;
    }

    public function obtener_cobertura() {
        return $this->cobertura;
    }

    public function obtener_fuente_financiamiento() {
        return $this->fuente_financiamiento;
    }

    public function obtener_codigo_sap_oh() {
        return $this->codigo_sap_oh;
    }

    public function obtener_codigo_sap_operaciones() {
        return $this->codigo_sap_operaciones;
    }

    public function obtener_estado() {
        return $this->estado;
    }

}

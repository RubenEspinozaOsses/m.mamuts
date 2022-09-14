<?php

class class_tabla_presupuestos {

    private $id;
    private $codigo_empresario;
    private $codigo_item;
    private $codigo_subitem;
    private $cofinanciamiento_pt;
    private $aporte_empresarial_pt;
    private $total_pt;
    private $cofinanciamiento_cer;
    private $aporte_empresarial_cer;
    private $total_cer;
    private $cofinanciamiento_25p;
    private $aporte_empresarial_25p;
    private $total_25p;
    private $cofinanciamiento_fin;
    private $aporte_empresarial_fin;
    private $total_fin;
    private $detalle;

    public function __construct(
    $id, $codigo_empresario, $codigo_item, $codigo_subitem, $cofinanciamiento_pt, $aporte_empresarial_pt, $total_pt, $cofinanciamiento_cer, $aporte_empresarial_cer, $total_cer, $cofinanciamiento_25p, $aporte_empresarial_25p, $total_25p, $cofinanciamiento_fin, $aporte_empresarial_fin, $total_fin, $detalle
    ) {

        $this->id = $id;
        $this->codigo_empresario = $codigo_empresario;
        $this->codigo_item = $codigo_item;
        $this->codigo_subitem = $codigo_subitem;
        $this->cofinanciamiento_pt = $cofinanciamiento_pt;
        $this->aporte_empresarial_pt = $aporte_empresarial_pt;
        $this->total_pt = $total_pt;
        $this->cofinanciamiento_cer = $cofinanciamiento_cer;
        $this->aporte_empresarial_cer = $aporte_empresarial_cer;
        $this->total_cer = $total_cer;
        $this->cofinanciamiento_25p = $cofinanciamiento_25p;
        $this->aporte_empresarial_25p = $aporte_empresarial_25p;
        $this->total_25p = $total_25p;
        $this->cofinanciamiento_fin = $cofinanciamiento_fin;
        $this->aporte_empresarial_fin = $aporte_empresarial_fin;
        $this->total_fin = $total_fin;
        $this->detalle = $detalle;
    }

    public function obtener_id() {
        return $this->id;
    }


    public function obtener_codigo_empresario() {
        return $this->codigo_empresario;
    }

    public function obtener_codigo_item() {
        return $this->codigo_item;
    }

    public function obtener_codigo_subitem() {
        return $this->codigo_subitem;
    }

    public function obtener_cofinanciamiento_pt() {
        return $this->cofinanciamiento_pt;
    }

    public function obtener_aporte_empresarial_pt() {
        return $this->aporte_empresarial_pt;
    }

    public function obtener_total_pt() {
        return $this->total_pt;
    }

    public function obtener_cofinanciamiento_cer() {
        return $this->cofinanciamiento_cer;
    }

    public function obtener_aporte_empresarial_cer() {
        return $this->aporte_empresarial_cer;
    }

    public function obtener_total_cer() {
        return $this->total_cer;
    }

    public function obtener_cofinanciamiento_25p() {
        return $this->cofinanciamiento_25p;
    }

    public function obtener_aporte_empresarial_25p() {
        return $this->aporte_empresarial_25p;
    }

    public function obtener_total_25p() {
        return $this->total_25p;
    }

    public function obtener_cofinanciamiento_fin() {
        return $this->cofinanciamiento_fin;
    }

    public function obtener_aporte_empresarial_fin() {
        return $this->aporte_empresarial_fin;
    }

    public function obtener_total_fin() {
        return $this->total_fin;
    }
    public function obtener_detalle() {
        return $this->detalle;
    }
}

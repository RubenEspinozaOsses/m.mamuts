<?php

class class_tabla_rendiciones {

    private $id;
    private $codigo_rendicion;
    private $codigo_empresario;
    private $codigo_item;
    private $codigo_subitem;
    private $descripcion;
    private $cofinanciamiento;
    private $aporte_empresarial;
    private $total;
    private $aporte_extra;
    private $total_con_iva;
    private $rut_proveedor;
    private $tipo_documento;
    private $numero_documento;
    private $fecha_documento;
    private $fecha_pago;
    private $numero_cheque;
    private $medio_pago;
    private $modalidad_pago;

    public function __construct(
    $id, $codigo_rendicion, $codigo_empresario, $codigo_item, $codigo_subitem, $descripcion, $cofinanciamiento, $aporte_empresarial, $total, $aporte_extra, $total_con_iva, $rut_proveedor, $tipo_documento, $numero_documento, $fecha_documento, $fecha_pago, $numero_cheque, $medio_pago, $modalidad_pago
    ) {
        $this->id = $id;
        $this->codigo_rendicion = $codigo_rendicion;
        $this->codigo_empresario = $codigo_empresario;
        $this->codigo_item = $codigo_item;
        $this->codigo_subitem = $codigo_subitem;
        $this->descripcion = $descripcion;
        $this->cofinanciamiento = $cofinanciamiento;
        $this->aporte_empresarial = $aporte_empresarial;
        $this->total = $total;
        $this->aporte_extra = $aporte_extra;
        $this->total_con_iva = $total_con_iva;
        $this->rut_proveedor = $rut_proveedor;
        $this->tipo_documento = $tipo_documento;
        $this->numero_documento = $numero_documento;
        $this->fecha_documento = $fecha_documento;
        $this->fecha_pago = $fecha_pago;
        $this->numero_cheque = $numero_cheque;
        $this->medio_pago = $medio_pago;
        $this->modalidad_pago = $modalidad_pago;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_codigo_rendicion() {
        return $this->codigo_rendicion;
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

    public function obtener_aporte_extra() {
        return $this->aporte_extra;
    }

    public function obtener_total_con_iva() {
        return $this->total_con_iva;
    }

    public function obtener_rut_proveedor() {
        return $this->rut_proveedor;
    }

    public function obtener_tipo_documento() {
        return $this->tipo_documento;
    }

    public function obtener_numero_documento() {
        return $this->numero_documento;
    }

    public function obtener_fecha_documento() {
        return $this->fecha_documento;
    }

    public function obtener_fecha_pago() {
        return $this->fecha_pago;
    }

    public function obtener_numero_cheque() {
        return $this->numero_cheque;
    }

    public function obtener_medio_pago() {
        return $this->medio_pago;
    }

    public function obtener_modalidad_pago() {
        return $this->modalidad_pago;
    }

}

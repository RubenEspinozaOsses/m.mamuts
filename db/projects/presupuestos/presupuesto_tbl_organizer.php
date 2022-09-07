<?php

class class_tabla_presupuestos_bp {

    private $id;
    private $codigo_bp;
    private $item_bp;
    private $monto_bp;

    public function __construct(
    $id, $codigo_bp, $item_bp, $monto_bp
    ) {
        $this->id = $id;
        $this->codigo_bp = $codigo_bp;
        $this->item_bp = $item_bp;
        $this->monto_bp = $monto_bp;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_codigo_bp() {
        return $this->codigo_bp;
    }

    public function obtener_item_bp() {
        return $this->item_bp;
    }

    public function obtener_monto_bp() {
        return $this->monto_bp;
    }

}

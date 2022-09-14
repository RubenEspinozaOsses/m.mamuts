<?php

class class_tabla_item_proyectos {

    private $id;
    private $codigo_bp;
    private $codigo_item;
    private $item;
    private $codigo_subitem;
    private $subitem;
    private $tipo;

    public function __construct($id, $codigo_bp, $codigo_item, $item, $codigo_subitem, $subitem, $tipo) {

        $this->id = $id;
        $this->codigo_bp = $codigo_bp;
        $this->codigo_item = $codigo_item;
        $this->item = $item;
        $this->codigo_subitem = $codigo_subitem;
        $this->subitem = $subitem;
        $this->tipo = $tipo;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_codigo_bp() {
        return $this->codigo_bp;
    }

    public function obtener_codigo_item() {
        return $this->codigo_item;
    }

    public function obtener_item() {
        return $this->item;
    }

    public function obtener_codigo_subitem() {
        return $this->codigo_subitem;
    }

    public function obtener_subitem() {
        return $this->subitem;
    }

    public function obtener_tipo() {
        return $this->tipo;
    }

}

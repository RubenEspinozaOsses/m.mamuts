<?php

class class_tabla_tipo_formalizacion {

    private $id;
    private $nombre_documento;
    private $tipo_documento;

    public function __construct($id, $nombre_documento, $tipo_documento) {
        $this->id = $id;
        $this->nombre_documento = $nombre_documento;
        $this->tipo_documento = $tipo_documento;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_nombre_documento() {
        return $this->nombre_documento;
    }

    public function obtener_tipo_documento() {
        return $this->tipo_documento;
    }

}

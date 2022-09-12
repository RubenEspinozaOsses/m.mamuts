<?php

class class_tabla_dias_extras_empresario {

    private $id;
    private $dias_extras;
    private $codigo_empresario;

    public function __construct($id, $dias_extras,$codigo_empresario
    ) {
        $this->id = $id;
        $this->dias_extras = $dias_extras;
        $this->codigo_empresario = $codigo_empresario;
    }

    public function obtener_id() {
        return $this->id;
    }

    public function obtener_dias_extras() {
        return $this->dias_extras;
    }

    public function obtener_codigo_empresario() {
        return $this->codigo_empresario;
    }

}

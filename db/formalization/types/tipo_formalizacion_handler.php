<?php

include 'tipo_formalizacion_tbl_organizer.php';

class class_operar_tipo_formalizacion {

    public static function listar_tipo_formalizacion($conexion) {

        $tipo_formalizacion = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM tipo_formalizacion ORDER BY id ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $tipo_formalizacion[] = new class_tabla_tipo_formalizacion(
                                $fila['id'], $fila['nombre_documento'], $fila['tipo_documento']);
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $tipo_formalizacion;
    }

}

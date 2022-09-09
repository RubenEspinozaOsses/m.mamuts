<?php

include 'formalization_tbl_organizer.php';

class class_operar_formalizacion {

    public static function listar_formalizacion($conexion) {

        $formalizacion = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM formalizacion ORDER BY codigo_empresario ASC, fecha_inicio ASC, fecha_termino DESC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $formalizacion[] = new class_tabla_formalizacion($fila['id'], $fila['codigo_empresario'], $fila['fecha_inicio'], $fila['fecha_termino'], $fila['dias'], $fila['tipo_documento']);
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $formalizacion;
    }

    public static function buscar_formalizacion_id($id, $conexion) {
        $formalizacion = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM formalizacion WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $formalizacion = new class_tabla_formalizacion(
                            $resultado['id'], $resultado['codigo_empresario'], $resultado['fecha_inicio'], $resultado['fecha_termino'], $resultado['dias'], $resultado['tipo_documento']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $formalizacion;
    }

    public static function eliminar_formalizacion_id($id, $conexion) {
        $eliminado = false;

        if (isset($conexion)) {
            try {

                $sql = "DELETE FROM formalizacion WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $eliminado;
    }

    public static function modificar_formalizacion_id($id, $codigo_empresario, $fecha_inicio, $fecha_termino, $dias, $tipo_documento, $conexion) {
        $formalizacion_modificado = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE formalizacion SET id=:id, codigo_empresario=:codigo_empresario, fecha_inicio=:fecha_inicio, fecha_termino=:fecha_termino, dias=:dias,  tipo_documento=:tipo_documento WHERE id=:id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_inicio', $fecha_inicio, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_termino', $fecha_termino, PDO::PARAM_STR);
                $sentencia->bindParam(':dias', $dias, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_documento', $tipo_documento, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $formalizacion_modificado = true;
                } else {
                    $formalizacion_modificado = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $formalizacion_modificado;
    }

    public static function listar_formalizacion_codigo_empresario($codigo_empresario, $conexion) {

        $formalizacion = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM formalizacion WHERE codigo_empresario = :codigo_empresario ORDER BY codigo_empresario ASC, fecha_inicio ASC, fecha_termino DESC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $formalizacion[] = new class_tabla_formalizacion($fila['id'], $fila['codigo_empresario'], $fila['fecha_inicio'], $fila['fecha_termino'], $fila['dias'], $fila['tipo_documento']);
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $formalizacion;
    }

    public static function insertar_formalizacion($formalizacion, $conexion) {
        $formalizacion_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO formalizacion(
                        id,
                        codigo_empresario,
                        fecha_inicio,
                        fecha_termino,
                        dias,
                        tipo_documento
                        )
                        VALUES(
                        :id,
                        :codigo_empresario,
                        :fecha_inicio,
                        :fecha_termino,
                        :dias,
                        :tipo_documento
                        )";

                $sentencia = $conexion->prepare($sql);

                $value_id = $formalizacion->obtener_id();
                $value_codigo_empresario = $formalizacion->obtener_codigo_empresario();
                $value_fecha_inicio = $formalizacion->obtener_fecha_inicio();
                $value_fecha_termino = $formalizacion->obtener_fecha_termino();
                $value_dias = $formalizacion->obtener_dias();
                $value_tipo_documento = $formalizacion->obtener_tipo_documento();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $value_codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_inicio', $value_fecha_inicio, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_termino', $value_fecha_termino, PDO::PARAM_STR);
                $sentencia->bindParam(':dias', $value_dias, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_documento', $value_tipo_documento, PDO::PARAM_STR);

                $formalizacion_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $formalizacion_insertado;
    }

    public static function importar_formalizacion($formalizacion, $conexion) {
        $formalizacion_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO formalizacion(
                        id,
                        codigo_empresario,
                        fecha_inicio,
                        fecha_termino,
                        dias,
                        tipo_documento
                        )
                        VALUES(
                        :id,
                        :codigo_empresario,
                        :fecha_inicio,
                        :fecha_termino,
                        :dias,
                        :tipo_documento
                        )
                        ON DUPLICATE KEY UPDATE
                        id=:id, 
                        codigo_empresario=:codigo_empresario, 
                        fecha_inicio=:fecha_inicio, 
                        fecha_termino=:fecha_termino, 
                        dias=:dias, 
                        tipo_documento=:tipo_documento
                        ";

                $sentencia = $conexion->prepare($sql);

                $value_id = $formalizacion->obtener_id();
                $value_codigo_empresario = $formalizacion->obtener_codigo_empresario();
                $value_fecha_inicio = $formalizacion->obtener_fecha_inicio();
                $value_fecha_termino = $formalizacion->obtener_fecha_termino();
                $value_dias = $formalizacion->obtener_dias();
                $value_tipo_documento = $formalizacion->obtener_tipo_documento();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $value_codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_inicio', $value_fecha_inicio, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_termino', $value_fecha_termino, PDO::PARAM_STR);
                $sentencia->bindParam(':dias', $value_dias, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_documento', $value_tipo_documento, PDO::PARAM_STR);

                $formalizacion_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $formalizacion_insertado;
    }

    public static function listar_formalizacion_codigo_bp($codigo_bp, $conexion) {

        $formalizacion = array();
        $formalizacion_filtrar = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM formalizacion WHERE tipo_documento = :tipo_documento ORDER BY codigo_empresario ASC, fecha_inicio ASC, fecha_termino DESC";

                $tipo_documento = 'co';

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':tipo_documento', $tipo_documento, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $formalizacion[] = new class_tabla_formalizacion($fila['id'], $fila['codigo_empresario'], $fila['fecha_inicio'], $fila['fecha_termino'], $fila['dias'], $fila['tipo_documento']);
                    }
                }
                $longitud_formalizacion = count($formalizacion);
                for ($i = 0; $i < $longitud_formalizacion; $i++) {
                    $id_codigo_empresario = $formalizacion[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $id_codigo_bp = $array_id_codigo_empresario[0];
                    if ($codigo_bp == $id_codigo_bp) {
                        $formalizacion_filtrar[] = new class_tabla_formalizacion(
                                $formalizacion[$i]->obtener_id(), $formalizacion[$i]->obtener_codigo_empresario(), $formalizacion[$i]->obtener_fecha_inicio(), $formalizacion[$i]->obtener_fecha_termino(), $formalizacion[$i]->obtener_dias(), $formalizacion[$i]->obtener_tipo_documento()
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $formalizacion_filtrar;
    }

}

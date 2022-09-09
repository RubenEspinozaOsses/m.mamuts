<?php

include 'entrepeneut_extrad_tbl_handler.php';

class class_operar_dias_extras_empresario {

    public static function listar_dias_extras($conexion) {

        $dias_extras = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM dias_extras_empresario ORDER BY codigo_empresario ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $dias_extras[] = new class_tabla_dias_extras_empresario(
                                $fila['id'], $fila['dias_extras'], $fila['codigo_empresario']);
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $dias_extras;
    }

    public static function modificar_dias_extras($id, $dias_extras, $codigo_empresario, $conexion) {
        $dias_extras_modificar = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE dias_extras_empresario SET dias_extras=:dias_extras, codigo_empresario=:codigo_empresario WHERE id=:id";


                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':dias_extras', $dias_extras, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $dias_extras_modificar = true;
                } else {
                    $dias_extras_modificar = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $dias_extras_modificar;
    }

    public static function buscar_dias_extras_codigo_empresario($codigo_empresario, $conexion) {
        $dias_extras_codigo_empresario = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM dias_extras_empresario WHERE codigo_empresario=:codigo_empresario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $dias_extras_codigo_empresario = new class_tabla_dias_extras_empresario(
                            $resultado['id'], $resultado['dias_extras'], $resultado['codigo_empresario']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $dias_extras_codigo_empresario;
    }

    public static function insertar_dias_extras($dias_extras, $conexion) {
        $dias_extras_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO dias_extras_empresario(
                        id,
                        dias_extras,
                        codigo_empresario
                        )
                        VALUES(
                        :id,
                        :dias_extras,
                        :codigo_empresario
                        )";

                $sentencia = $conexion->prepare($sql);

                $value_id = $dias_extras->obtener_id();
                $value_dias_extras = $dias_extras->obtener_dias_extras();
                $value_codigo_empresario = $dias_extras->obtener_codigo_empresario();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':dias_extras', $value_dias_extras, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $value_codigo_empresario, PDO::PARAM_STR);

                $dias_extras_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $dias_extras_insertado;
    }

}

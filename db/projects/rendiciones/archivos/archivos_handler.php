<?php

include 'archivos_tbl.php';

class class_operar_archivos {

    public static function listar_archivos_empresario($codigo_empresario, $conexion) {

        $archivos = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM archivos WHERE codigo_empresario = :codigo_empresario ORDER BY CASE WHEN grupo = '1' THEN 'zzz-1' WHEN grupo = '2' THEN 'zzz-2' WHEN grupo = '3' THEN 'zzz-3' ELSE grupo END ASC, fecha DESC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $archivos[] = new class_tabla_archivos(
                                $fila['id'], $fila['codigo_empresario'], $fila['archivo'], $fila['extension'], $fila['ruta'], $fila['descripcion'], $fila['tipo'], $fila['fecha'], $fila['asignacion'], $fila['grupo']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $archivos;
    }

    public static function eliminar_archivos_id($id, $conexion) {
        $eliminado = false;

        if (isset($conexion)) {
            try {

                $sql = "DELETE FROM archivos WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $eliminado;
    }

    public static function modificar_archivos_id($id, $codigo_empresario, $archivo, $extension, $ruta, $descripcion, $tipo, $fecha, $asignacion, $grupo, $conexion) {

        $archivos_modificado = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE archivos SET 
                        codigo_empresario=:codigo_empresario,                        
                        archivo=:archivo, 
                        extension=:extension, 
                        ruta=:ruta, 
                        descripcion=:descripcion, 
                        tipo=:tipo, 
                        fecha=:fecha,
                        asignacion=:asignacion,
                        grupo=:grupo

                        WHERE id = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':archivo', $archivo, PDO::PARAM_STR);
                $sentencia->bindParam(':extension', $extension, PDO::PARAM_STR);
                $sentencia->bindParam(':ruta', $ruta, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha', $fecha, PDO::PARAM_STR);
                $sentencia->bindParam(':asignacion', $asignacion, PDO::PARAM_STR);
                $sentencia->bindParam(':grupo', $grupo, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $archivos_modificado = true;
                } else {
                    $archivos_modificado = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $archivos_modificado;
    }

    public static function buscar_archivos_id($id, $conexion) {
        $archivos = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM archivos WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $archivos = new class_tabla_archivos($resultado['id'], $resultado['codigo_empresario'], $resultado['archivo'], $resultado['extension'], $resultado['ruta'], $resultado['descripcion'], $resultado['tipo'], $resultado['fecha'], $resultado['asignacion'], $resultado['grupo']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $archivos;
    }

    public static function insertar_archivos($archivos, $conexion) {
        $archivos_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO archivos(
                        id,
                        codigo_empresario,                        
                        archivo,
                        extension,
                        ruta,
                        descripcion,
                        tipo,
                        fecha,
                        asignacion,
                        grupo
                        )
                        
                        VALUES(
                        :id,
                        :codigo_empresario,                        
                        :archivo,
                        :extension,
                        :ruta,
                        :descripcion,
                        :tipo,
                        :fecha,
                        :asignacion,
                        :grupo
                        )";

                

                $sentencia = $conexion->prepare($sql);
                
                $value_id = $archivos->obtener_id();
                
                $value_codigo_empresario = $archivos->obtener_codigo_empresario();
                $value_archivo = $archivos->obtener_archivo();
                $value_extension = $archivos->obtener_extension();
                $value_ruta = $archivos->obtener_ruta();
                $value_descripcion = $archivos->obtener_descripcion();
                $value_tipo = $archivos->obtener_tipo();
                $value_fecha = $archivos->obtener_fecha();
                $value_asignacion = $archivos->obtener_asignacion();
                $value_grupo = $archivos->obtener_grupo();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $value_codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':archivo', $value_archivo, PDO::PARAM_STR);
                $sentencia->bindParam(':extension', $value_extension, PDO::PARAM_STR);
                $sentencia->bindParam(':ruta', $value_ruta, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $value_descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $value_tipo, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha', $value_fecha, PDO::PARAM_STR);
                $sentencia->bindParam(':asignacion', $value_asignacion, PDO::PARAM_STR);
                $sentencia->bindParam(':grupo', $value_grupo, PDO::PARAM_STR);
                $archivos_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $archivos_insertado;
    }

    public static function listar_archivos_empresario_grupo($codigo_empresario, $grupo, $conexion) {

        $archivos = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM archivos WHERE codigo_empresario =:codigo_empresario AND grupo=:grupo ORDER BY CASE WHEN grupo = '1' THEN 'zzz-1' WHEN grupo = '2' THEN 'zzz-2' WHEN grupo = '3' THEN 'zzz-3' ELSE grupo END ASC, fecha DESC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':grupo', $grupo, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $archivos[] = new class_tabla_archivos(
                                $fila['id'], $fila['codigo_empresario'], $fila['archivo'], $fila['extension'], $fila['ruta'], $fila['descripcion'], $fila['tipo'], $fila['fecha'], $fila['asignacion'], $fila['grupo']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $archivos;
    }

    public static function listar_archivos_codigo_rendicion($asignacion, $conexion) {

        $archivos = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM archivos WHERE asignacion = :asignacion ORDER BY fecha DESC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':asignacion', $asignacion, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $archivos[] = new class_tabla_archivos(
                                $fila['id'], $fila['codigo_empresario'], $fila['archivo'], $fila['extension'], $fila['ruta'], $fila['descripcion'], $fila['tipo'], $fila['fecha'], $fila['asignacion'], $fila['grupo']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $archivos;
    }

}

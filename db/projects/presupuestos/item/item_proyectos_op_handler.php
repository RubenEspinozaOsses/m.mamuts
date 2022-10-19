<?php

include 'item_proyectos_tbl_organizer.php';

class class_operar_item_proyectos {

    public static function insertar_item_proyectos($item_proyectos, $conexion) {
        $item_proyectos_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO item_proyectos(
                        codigo_bp,
                        codigo_item,
                        item,
                        codigo_subitem,
                        subitem,
                        tipo
                        )
                        VALUES(
                        :codigo_bp,
                        :codigo_item,
                        :item,
                        :codigo_subitem,
                        :subitem,
                        :tipo
                        )";

                $sentencia = $conexion->prepare($sql);

                $value_codigo_bp = $item_proyectos->obtener_codigo_bp();
                $value_codigo_item = $item_proyectos->obtener_codigo_item();
                $value_item = $item_proyectos->obtener_item();
                $value_codigo_subitem = $item_proyectos->obtener_codigo_subitem();
                $value_subitem = $item_proyectos->obtener_subitem();
                $value_tipo = $item_proyectos->obtener_tipo();

                $sentencia->bindParam(':codigo_bp', $value_codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_item', $value_codigo_item, PDO::PARAM_STR);
                $sentencia->bindParam(':item', $value_item, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $value_codigo_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':subitem', $value_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $value_tipo, PDO::PARAM_STR);

                $item_proyectos_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $item_proyectos_insertado;
    }

    public static function listar_item_proyectos($conexion) {

        $item_proyectos = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM item_proyectos ORDER BY codigo_bp ASC, item ASC, codigo_subitem ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $item_proyectos[] = new class_tabla_item_proyectos(
                                $fila['id'], $fila['codigo_bp'], $fila['codigo_item'], $fila['item'], $fila['codigo_subitem'], $fila['subitem'], $fila['tipo']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $item_proyectos;
    }

    public static function eliminar_item_proyectos_id($id, $conexion) {
        $eliminado = false;

        if (isset($conexion)) {
            try {

                $sql = "DELETE FROM item_proyectos WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $eliminado;
    }

    public static function modificar_item_proyectos_id($id, $codigo_bp, $codigo_item, $item, $codigo_subitem, $subitem, $tipo, $conexion) {
        $item_proyectos_modificado = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE item_proyectos SET codigo_bp=:codigo_bp, codigo_item=:codigo_item, item=:item, codigo_subitem=:codigo_subitem, subitem=:subitem, tipo=:tipo WHERE id=:id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_item', $codigo_item, PDO::PARAM_STR);
                $sentencia->bindParam(':item', $item, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $codigo_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':subitem', $subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $tipo, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $item_proyectos_modificado = true;
                } else {
                    $item_proyectos_modificado = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $item_proyectos_modificado;
    }

    public static function buscar_item_proyectos_id($id, $conexion) {
        $item_proyectos = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM item_proyectos WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $item_proyectos = new class_tabla_item_proyectos(
                            $resultado['id'], $resultado['codigo_bp'], $resultado['codigo_item'], $resultado['item'], $resultado['codigo_subitem'], $resultado['subitem'], $resultado['tipo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $item_proyectos;
    }

    public static function buscar_item_proyectos_subitem($codigo_bp, $codigo_subitem, $conexion) {
        $item_proyectos_subitem = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM item_proyectos WHERE codigo_bp=:codigo_bp AND codigo_subitem=:codigo_subitem";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $codigo_subitem, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $item_proyectos_subitem = new class_tabla_item_proyectos(
                            $resultado['id'], $resultado['codigo_bp'], $resultado['codigo_item'], $resultado['item'], $resultado['codigo_subitem'], $resultado['subitem'], $resultado['tipo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $item_proyectos_subitem;
    }

    public static function importar_item_proyectos($item_proyectos, $conexion) {
        $item_proyectos_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO item_proyectos(
                        id,
                        codigo_bp,
                        codigo_item,
                        item,
                        codigo_subitem,
                        subitem,
                        tipo
                        )
                        VALUES(
                        :id,
                        :codigo_bp,
                        :codigo_item,
                        :item,
                        :codigo_subitem,
                        :subitem,
                        :tipo
                        )
                        ON DUPLICATE KEY UPDATE
                        id=:id,
                        codigo_bp=:codigo_bp,
                        codigo_item=:codigo_item,
                        item=:item,
                        codigo_subitem=:codigo_subitem,
                        subitem=:subitem,
                        tipo=:tipo
                        ";

                $sentencia = $conexion->prepare($sql);

                $value_id = $item_proyectos->obtener_id();
                $value_codigo_bp = $item_proyectos->obtener_codigo_bp();
                $value_codigo_item = $item_proyectos->obtener_codigo_item();
                $value_item = $item_proyectos->obtener_item();
                $value_codigo_subitem = $item_proyectos->obtener_codigo_subitem();
                $value_subitem = $item_proyectos->obtener_subitem();
                $value_tipo = $item_proyectos->obtener_tipo();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_bp', $value_codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_item', $value_codigo_item, PDO::PARAM_STR);
                $sentencia->bindParam(':item', $value_item, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $value_codigo_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':subitem', $value_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $value_tipo, PDO::PARAM_STR);

                $item_proyectos_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $item_proyectos_insertado;
    }

    public static function listar_item_proyectos_codigo_bp($codigo_bp, $conexion) {

        $item_proyectos = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM item_proyectos WHERE codigo_bp = :codigo_bp ORDER BY tipo ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $item_proyectos[] = new class_tabla_item_proyectos(
                                $fila['id'],
                                $fila['codigo_bp'],
                                $fila['codigo_item'],
                                $fila['item'],
                                $fila['codigo_subitem'],
                                $fila['subitem'],
                                $fila['tipo']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $item_proyectos;
    }

    public static function buscar_item_proyectos_item_subitem($codigo_bp, $codigo_item, $codigo_subitem, $conexion) {
        $item_proyectos_item_subitem = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM item_proyectos WHERE codigo_bp=:codigo_bp AND codigo_item=:codigo_item AND codigo_subitem=:codigo_subitem";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_item', $codigo_item, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $codigo_subitem, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $item_proyectos_item_subitem = new class_tabla_item_proyectos(
                            $resultado['id'], $resultado['codigo_bp'], $resultado['codigo_item'], $resultado['item'], $resultado['codigo_subitem'], $resultado['subitem'], $resultado['tipo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $item_proyectos_item_subitem;
    }

}

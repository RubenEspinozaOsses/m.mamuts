<?php

include 'project_tbl_organizer.php';
include 'presupuestos/presupuesto_bp_tbl_organizer.php';

class class_operar_proyectos {

    public static function insertar_proyectos($proyectos, $conexion) {
        $proyectos_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO proyectos(
                        codigo_bp,
                        instrumento,
                        proyecto,
                        periodo,
                        cobertura,
                        fuente_financiamiento,
                        codigo_sap_oh,
                        codigo_sap_operaciones,
                        estado
                        )
                        VALUES(
                        :codigo_bp,
                        :instrumento,
                        :proyecto,
                        :periodo,
                        :cobertura,
                        :fuente_financiamiento,
                        :codigo_sap_oh,
                        :codigo_sap_operaciones,
                        :estado
                        )";

                $sentencia = $conexion->prepare($sql);

                $value_codigo_bp = $proyectos->obtener_codigo_bp();
                $value_instrumento = $proyectos->obtener_instrumento();
                $value_proyecto = $proyectos->obtener_proyecto();
                $value_periodo = $proyectos->obtener_periodo();
                $value_cobertura = $proyectos->obtener_cobertura();
                $value_fuente_financiamiento = $proyectos->obtener_fuente_financiamiento();
                $value_codigo_sap_oh = $proyectos->obtener_codigo_sap_oh();
                $value_codigo_sap_operaciones = $proyectos->obtener_codigo_sap_operaciones();
                $value_estado = $proyectos->obtener_estado();

                $sentencia->bindParam(':codigo_bp', $value_codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':instrumento', $value_instrumento, PDO::PARAM_STR);
                $sentencia->bindParam(':proyecto', $value_proyecto, PDO::PARAM_STR);
                $sentencia->bindParam(':periodo', $value_periodo, PDO::PARAM_STR);
                $sentencia->bindParam(':cobertura', $value_cobertura, PDO::PARAM_STR);
                $sentencia->bindParam(':fuente_financiamiento', $value_fuente_financiamiento, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_sap_oh', $value_codigo_sap_oh, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_sap_operaciones', $value_codigo_sap_operaciones, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $value_estado, PDO::PARAM_STR);

                $proyectos_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $proyectos_insertado;
    }

    public static function existe_codigo_bp($codigo_bp, $conexion) {
        $codigo_bp_existente = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM proyectos WHERE codigo_bp=:codigo_bp";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();

                if (count($resultado)) {
                    $codigo_bp_existente = true;
                } else {
                    $codigo_bp_existente = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $codigo_bp_existente;
    }

    public static function listar_proyectos($conexion) {

        $proyectos = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM proyectos ORDER BY periodo DESC, codigo_bp DESC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $proyectos[] = new class_tabla_proyectos(
                                $fila['id'], $fila['codigo_bp'], $fila['instrumento'], $fila['proyecto'], $fila['periodo'], $fila['cobertura'], $fila['fuente_financiamiento'], $fila['codigo_sap_oh'], $fila['codigo_sap_operaciones'], $fila['estado']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $proyectos;
    }

    public static function buscar_proyectos_id($id, $conexion) {
        $proyectos = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM proyectos WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $proyectos = new class_tabla_proyectos(
                            $resultado['id'], $resultado['codigo_bp'], $resultado['instrumento'], $resultado['proyecto'], $resultado['periodo'], $resultado['cobertura'], $resultado['fuente_financiamiento'], $resultado['codigo_sap_oh'], $resultado['codigo_sap_operaciones'], $resultado['estado']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $proyectos;
    }

    public static function eliminar_proyectos_id($id, $conexion) {
        $eliminado = false;

        if (isset($conexion)) {
            try {

                $sql = "DELETE FROM proyectos WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $eliminado;
    }

    public static function modificar_proyectos_id(
    $id, $codigo_bp, $instrumento, $proyecto, $periodo, $cobertura, $fuente_financiamiento, $codigo_sap_oh, $codigo_sap_operaciones, $estado, $conexion) {

        $proyectos_modificado = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE proyectos SET 
                        codigo_bp=:codigo_bp, 
                        instrumento=:instrumento, 
                        proyecto=:proyecto, 
                        periodo=:periodo, 
                        cobertura=:cobertura, 
                        fuente_financiamiento=:fuente_financiamiento, 
                        codigo_sap_oh=:codigo_sap_oh, 
                        codigo_sap_operaciones=:codigo_sap_operaciones, 
                        estado=:estado WHERE id=:id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':instrumento', $instrumento, PDO::PARAM_STR);
                $sentencia->bindParam(':proyecto', $proyecto, PDO::PARAM_STR);
                $sentencia->bindParam(':periodo', $periodo, PDO::PARAM_STR);
                $sentencia->bindParam(':cobertura', $cobertura, PDO::PARAM_STR);
                $sentencia->bindParam(':fuente_financiamiento', $fuente_financiamiento, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_sap_oh', $codigo_sap_oh, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_sap_operaciones', $codigo_sap_operaciones, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $proyectos_modificado = true;
                } else {
                    $proyectos_modificado = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $proyectos_modificado;
    }

    public static function buscar_proyectos_codigo_bp($codigo_bp, $conexion) {
        $proyectos = null;
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM proyectos WHERE codigo_bp = :codigo_bp";
                
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                if (!empty($resultado)) {
                    $proyectos = new class_tabla_proyectos(
                            $resultado['id'], $resultado['codigo_bp'], $resultado['instrumento'], $resultado['proyecto'], $resultado['periodo'], $resultado['cobertura'], $resultado['fuente_financiamiento'], $resultado['codigo_sap_oh'], $resultado['codigo_sap_operaciones'], $resultado['estado']
                    );
                }else {
                    echo "Error: ".$resultado['id'];
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $proyectos;
    }

    public static function listar_proyectos_activos($conexion) {

        $proyectos = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM proyectos WHERE estado = :estado ORDER BY periodo DESC, codigo_bp DESC";
                $estado = "Activo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $proyectos[] = new class_tabla_proyectos(
                                $fila['id'], $fila['codigo_bp'], $fila['instrumento'], $fila['proyecto'], $fila['periodo'], $fila['cobertura'], $fila['fuente_financiamiento'], $fila['codigo_sap_oh'], $fila['codigo_sap_operaciones'], $fila['estado']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $proyectos;
    }

    public static function importar_proyectos($proyectos, $conexion) {
        $proyectos_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO proyectos (
                        id,
                        codigo_bp,
                        instrumento,
                        proyecto,
                        periodo,
                        cobertura,
                        fuente_financiamiento,
                        codigo_sap_oh,
                        codigo_sap_operaciones,
                        estado                        
                        )
                        VALUES(
                        :id,
                        :codigo_bp,
                        :instrumento,
                        :proyecto,
                        :periodo,
                        :cobertura,
                        :fuente_financiamiento,
                        :codigo_sap_oh,
                        :codigo_sap_operaciones,
                        :estado
                        )
                        ON DUPLICATE KEY UPDATE
                        id=:id,
                        codigo_bp=:codigo_bp,
                        instrumento=:instrumento,
                        proyecto=:proyecto,
                        periodo=:periodo,
                        cobertura=:cobertura,
                        fuente_financiamiento=:fuente_financiamiento,
                        codigo_sap_oh=:codigo_sap_oh,
                        codigo_sap_operaciones=:codigo_sap_operaciones,
                        estado  =:estado
                        ";

                $sentencia = $conexion->prepare($sql);

                $value_id = $proyectos->obtener_id();
                $value_codigo_bp = $proyectos->obtener_codigo_bp();
                $value_instrumento = $proyectos->obtener_instrumento();
                $value_proyecto = $proyectos->obtener_proyecto();
                $value_periodo = $proyectos->obtener_periodo();
                $value_cobertura = $proyectos->obtener_cobertura();
                $value_fuente_financiamiento = $proyectos->obtener_fuente_financiamiento();
                $value_codigo_sap_oh = $proyectos->obtener_codigo_sap_oh();
                $value_codigo_sap_operaciones = $proyectos->obtener_codigo_sap_operaciones();
                $value_estado = $proyectos->obtener_estado();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_bp', $value_codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':instrumento', $value_instrumento, PDO::PARAM_STR);
                $sentencia->bindParam(':proyecto', $value_proyecto, PDO::PARAM_STR);
                $sentencia->bindParam(':periodo', $value_periodo, PDO::PARAM_STR);
                $sentencia->bindParam(':cobertura', $value_cobertura, PDO::PARAM_STR);
                $sentencia->bindParam(':fuente_financiamiento', $value_fuente_financiamiento, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_sap_oh', $value_codigo_sap_oh, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_sap_operaciones', $value_codigo_sap_operaciones, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $value_estado, PDO::PARAM_STR);

                $proyectos_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $proyectos_insertado;
    }

    public static function listar_presupuestos_bp_codigo_bp($codigo_bp, $conexion) {

        $presupuestos_bp = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM presupuestos_bp WHERE codigo_bp = :codigo_bp ORDER BY item_bp ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $presupuestos_bp[] = new class_tabla_presupuestos_bp(
                                $fila['id'], $fila['codigo_bp'], $fila['item_bp'], $fila['monto_bp']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $presupuestos_bp;
    }

    public static function insertar_presupuestos_bp($presupuestos_bp, $conexion) {
        $presupuestos_bp_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO presupuestos_bp(
                        codigo_bp,
                        item_bp,
                        monto_bp
                        )
                        VALUES(
                        :codigo_bp,
                        :item_bp,
                        :monto_bp
                        )";

                $sentencia = $conexion->prepare($sql);

                $value_codigo_bp = $presupuestos_bp->obtener_codigo_bp();
                $value_item_bp = $presupuestos_bp->obtener_item_bp();
                $value_monto_bp = $presupuestos_bp->obtener_monto_bp();

                $sentencia->bindParam(':codigo_bp', $value_codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':item_bp', $value_item_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':monto_bp', $value_monto_bp, PDO::PARAM_STR);

                $presupuestos_bp_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $presupuestos_bp_insertado;
    }

    public static function modificar_presupuestos_bp_id($id, $codigo_bp, $item_bp, $monto_bp, $conexion) {

        $presupuestos_bp_modificado = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE presupuestos_bp SET 
                        codigo_bp=:codigo_bp, 
                        item_bp=:item_bp, 
                        monto_bp=:monto_bp 
                        WHERE id=:id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':item_bp', $item_bp, PDO::PARAM_STR);
                $sentencia->bindParam(':monto_bp', $monto_bp, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $presupuestos_bp_modificado = true;
                } else {
                    $presupuestos_bp_modificado = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $presupuestos_bp_modificado;
    }

}
?>
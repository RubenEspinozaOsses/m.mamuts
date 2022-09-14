<?php

include 'presupuesto_op_tbl_organizer.php';

class class_operar_presupuestos {

    public static function listar_presupuestos_empresario($codigo_empresario, $conexion) {

        $presupuestos = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM presupuestos WHERE codigo_empresario=:codigo_empresario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $fila['detalle'] = '';
                        $presupuestos[] = new class_tabla_presupuestos(
                                $fila['id'], $fila['codigo_empresario'], $fila['codigo_item'], $fila['codigo_subitem'], $fila['cofinanciamiento_pt'], $fila['aporte_empresarial_pt'], $fila['total_pt'], $fila['cofinanciamiento_cer'], $fila['aporte_empresarial_cer'], $fila['total_cer'], $fila['cofinanciamiento_25p'], $fila['aporte_empresarial_25p'], $fila['total_25p'], $fila['cofinanciamiento_fin'], $fila['aporte_empresarial_fin'], $fila['total_fin'], $fila['detalle']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $presupuestos;
    }

    public static function listar_presupuestos($conexion) {

        $presupuestos = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM presupuestos ORDER BY codigo_empresario ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $presupuestos[] = new class_tabla_presupuestos(
                                $fila['id'], $fila['codigo_empresario'], $fila['codigo_item'], $fila['codigo_subitem'], $fila['cofinanciamiento_pt'], $fila['aporte_empresarial_pt'], $fila['total_pt'], $fila['cofinanciamiento_cer'], $fila['aporte_empresarial_cer'], $fila['total_cer'], $fila['cofinanciamiento_25p'], $fila['aporte_empresarial_25p'], $fila['total_25p'], $fila['cofinanciamiento_fin'], $fila['aporte_empresarial_fin'], $fila['total_fin'], $fila['detalle']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $presupuestos;
    }

    public static function importar_presupuestos($presupuestos, $conexion) {
        $presupuestos_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO presupuestos (
                        id,
                        codigo_empresario,
                        codigo_item,
                        codigo_subitem,
                        cofinanciamiento_pt,
                        aporte_empresarial_pt,
                        total_pt,
                        cofinanciamiento_cer,
                        aporte_empresarial_cer,
                        total_cer,
                        cofinanciamiento_25p,
                        aporte_empresarial_25p,
                        total_25p,
                        cofinanciamiento_fin,
                        aporte_empresarial_fin,
                        total_fin,
                        detalle
                        )
                        VALUES(
                        :id,
                        :codigo_empresario,
                        :codigo_item,
                        :codigo_subitem,
                        :cofinanciamiento_pt,
                        :aporte_empresarial_pt,
                        :total_pt,
                        :cofinanciamiento_cer,
                        :aporte_empresarial_cer,
                        :total_cer,
                        :cofinanciamiento_25p,
                        :aporte_empresarial_25p,
                        :total_25p,
                        :cofinanciamiento_fin,
                        :aporte_empresarial_fin,
                        :total_fin,
                        :detalle
                        )
                        
                        ON DUPLICATE KEY UPDATE
                        
                        codigo_empresario=:codigo_empresario,
                        codigo_item=:codigo_item, 
                        codigo_subitem=:codigo_subitem, 
                        cofinanciamiento_pt=:cofinanciamiento_pt, 
                        aporte_empresarial_pt=:aporte_empresarial_pt, 
                        total_pt=:total_pt, 
                        cofinanciamiento_cer=:cofinanciamiento_cer, 
                        aporte_empresarial_cer=:aporte_empresarial_cer, 
                        total_cer=:total_cer, 
                        cofinanciamiento_25p=:cofinanciamiento_25p, 
                        aporte_empresarial_25p=:aporte_empresarial_25p, 
                        total_25p=:total_25p, 
                        cofinanciamiento_fin=:cofinanciamiento_fin, 
                        aporte_empresarial_fin=:aporte_empresarial_fin, 
                        total_fin=:total_fin,
                        detalle=:detalle
                        ";

                $sentencia = $conexion->prepare($sql);

                $value_id = $presupuestos->obtener_id();
                $value_codigo_empresario = $presupuestos->obtener_codigo_empresario();
                $value_codigo_item = $presupuestos->obtener_codigo_item();
                $value_codigo_subitem = $presupuestos->obtener_codigo_subitem();
                $value_cofinanciamiento_pt = $presupuestos->obtener_cofinanciamiento_pt();
                $value_aporte_empresarial_pt = $presupuestos->obtener_aporte_empresarial_pt();
                $value_total_pt = $presupuestos->obtener_total_pt();
                $value_cofinanciamiento_cer = $presupuestos->obtener_cofinanciamiento_cer();
                $value_aporte_empresarial_cer = $presupuestos->obtener_aporte_empresarial_cer();
                $value_total_cer = $presupuestos->obtener_total_cer();
                $value_cofinanciamiento_25p = $presupuestos->obtener_cofinanciamiento_25p();
                $value_aporte_empresarial_25p = $presupuestos->obtener_aporte_empresarial_25p();
                $value_total_25p = $presupuestos->obtener_total_25p();
                $value_cofinanciamiento_fin = $presupuestos->obtener_cofinanciamiento_fin();
                $value_aporte_empresarial_fin = $presupuestos->obtener_aporte_empresarial_fin();
                $value_total_fin = $presupuestos->obtener_total_fin();
                $value_detalle = $presupuestos->obtener_detalle();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $value_codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_item', $value_codigo_item, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $value_codigo_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento_pt', $value_cofinanciamiento_pt, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial_pt', $value_aporte_empresarial_pt, PDO::PARAM_STR);
                $sentencia->bindParam(':total_pt', $value_total_pt, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento_cer', $value_cofinanciamiento_cer, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial_cer', $value_aporte_empresarial_cer, PDO::PARAM_STR);
                $sentencia->bindParam(':total_cer', $value_total_cer, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento_25p', $value_cofinanciamiento_25p, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial_25p', $value_aporte_empresarial_25p, PDO::PARAM_STR);
                $sentencia->bindParam(':total_25p', $value_total_25p, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento_fin', $value_cofinanciamiento_fin, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial_fin', $value_aporte_empresarial_fin, PDO::PARAM_STR);
                $sentencia->bindParam(':total_fin', $value_total_fin, PDO::PARAM_STR);
                $sentencia->bindParam(':detalle', $value_detalle, PDO::PARAM_STR);

                $presupuestos_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $presupuestos_insertado;
    }

    public static function eliminar_presupuestos_id($id, $conexion) {
        $eliminado = false;

        if (isset($conexion)) {
            try {

                $sql = "DELETE FROM presupuestos WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $eliminado;
    }

    public static function modificar_presupuestos_id($id, $codigo_empresario, $codigo_item, $codigo_subitem, $cofinanciamiento_pt, $aporte_empresarial_pt, $total_pt, $cofinanciamiento_cer, $aporte_empresarial_cer, $total_cer, $cofinanciamiento_25p, $aporte_empresarial_25p, $total_25p, $cofinanciamiento_fin, $aporte_empresarial_fin, $total_fin, $detalle, $conexion) {

        $presupuestos_modificado = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE presupuestos SET codigo_empresario=:codigo_empresario, codigo_item=:codigo_item, codigo_subitem=:codigo_subitem,  cofinanciamiento_pt=:cofinanciamiento_pt, aporte_empresarial_pt=:aporte_empresarial_pt, total_pt=:total_pt, cofinanciamiento_cer=:cofinanciamiento_cer, aporte_empresarial_cer=:aporte_empresarial_cer, total_cer=:total_cer, cofinanciamiento_25p=:cofinanciamiento_25p, aporte_empresarial_25p=:aporte_empresarial_25p, total_25p=:total_25p, cofinanciamiento_fin=:cofinanciamiento_fin, aporte_empresarial_fin=:aporte_empresarial_fin, total_fin=:total_fin, detalle=:detalle WHERE id=:id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_item', $codigo_item, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $codigo_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento_pt', $cofinanciamiento_pt, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial_pt', $aporte_empresarial_pt, PDO::PARAM_STR);
                $sentencia->bindParam(':total_pt', $total_pt, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento_cer', $cofinanciamiento_cer, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial_cer', $aporte_empresarial_cer, PDO::PARAM_STR);
                $sentencia->bindParam(':total_cer', $total_cer, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento_25p', $cofinanciamiento_25p, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial_25p', $aporte_empresarial_25p, PDO::PARAM_STR);
                $sentencia->bindParam(':total_25p', $total_25p, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento_fin', $cofinanciamiento_fin, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial_fin', $aporte_empresarial_fin, PDO::PARAM_STR);
                $sentencia->bindParam(':total_fin', $total_fin, PDO::PARAM_STR);
                $sentencia->bindParam(':detalle', $detalle, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $presupuestos_modificado = true;
                } else {
                    $presupuestos_modificado = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $presupuestos_modificado;
    }

    public static function listar_presupuestos_codigo_bp($codigo_bp, $conexion) {

        $presupuestos = array();
        $presupuestos_codigo_bp = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM presupuestos ORDER BY codigo_empresario ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $presupuestos[] = new class_tabla_presupuestos(
                                $fila['id'], $fila['codigo_empresario'], $fila['codigo_item'], $fila['codigo_subitem'], $fila['cofinanciamiento_pt'], $fila['aporte_empresarial_pt'], $fila['total_pt'], $fila['cofinanciamiento_cer'], $fila['aporte_empresarial_cer'], $fila['total_cer'], $fila['cofinanciamiento_25p'], $fila['aporte_empresarial_25p'], $fila['total_25p'], $fila['cofinanciamiento_fin'], $fila['aporte_empresarial_fin'], $fila['total_fin'], $fila['detalle']
                        );
                    }
                }


                $longitud_presupuestos = count($presupuestos);
                for ($i = 0; $i < $longitud_presupuestos; $i++) {
                    $id_codigo_empresario = $presupuestos[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $id_codigo_bp = $array_id_codigo_empresario[0];
                    if ($codigo_bp == $id_codigo_bp) {
                        $presupuestos_codigo_bp[] = new class_tabla_presupuestos(
                                $presupuestos[$i]->obtener_id(), $presupuestos[$i]->obtener_codigo_empresario(), $presupuestos[$i]->obtener_codigo_item(), $presupuestos[$i]->obtener_codigo_subitem(), $presupuestos[$i]->obtener_cofinanciamiento_pt(), $presupuestos[$i]->obtener_aporte_empresarial_pt(), $presupuestos[$i]->obtener_total_pt(), $presupuestos[$i]->obtener_cofinanciamiento_cer(), $presupuestos[$i]->obtener_aporte_empresarial_cer(), $presupuestos[$i]->obtener_total_cer(), $presupuestos[$i]->obtener_cofinanciamiento_25p(), $presupuestos[$i]->obtener_aporte_empresarial_25p(), $presupuestos[$i]->obtener_total_25p(), $presupuestos[$i]->obtener_cofinanciamiento_fin(), $presupuestos[$i]->obtener_aporte_empresarial_fin(), $presupuestos[$i]->obtener_total_fin(), $presupuestos[$i]->obtener_detalle());
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $presupuestos_codigo_bp;
    }

    public static function buscar_presupuestos_id($id, $conexion) {
        $presupuestos = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM presupuestos WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $presupuestos = new class_tabla_presupuestos(
                            $resultado['id'], $resultado['codigo_empresario'], $resultado['codigo_item'], $resultado['codigo_subitem'], $resultado['cofinanciamiento_pt'], $resultado['aporte_empresarial_pt'], $resultado['total_pt'], $resultado['cofinanciamiento_cer'], $resultado['aporte_empresarial_cer'], $resultado['total_cer'], $resultado['cofinanciamiento_25p'], $resultado['aporte_empresarial_25p'], $resultado['total_25p'], $resultado['cofinanciamiento_fin'], $resultado['aporte_empresarial_fin'], $resultado['total_fin'], $resultado['detalle']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $presupuestos;
    }

}

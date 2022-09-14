<?php

include 'rendiciones_tbl_organizer.php';

class class_operar_rendiciones {

    public static function listar_rendiciones_empresario($codigo_empresario, $conexion) {

        $rendiciones = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM rendiciones WHERE codigo_empresario=:codigo_empresario ORDER BY FIELD(fecha_pago, '0001-01-01') DESC, fecha_pago ASC, numero_documento ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $rendiciones[] = new class_tabla_rendiciones(
                                $fila['id'], $fila['codigo_rendicion'], $fila['codigo_empresario'], $fila['codigo_item'], $fila['codigo_subitem'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['aporte_extra'], $fila['total_con_iva'], $fila['rut_proveedor'], $fila['tipo_documento'], $fila['numero_documento'], $fila['fecha_documento'], $fila['fecha_pago'], $fila['numero_cheque'], $fila['medio_pago'], $fila['modalidad_pago']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $rendiciones;
    }

    public static function importar_rendiciones($rendiciones, $conexion) {
        $rendiciones_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO rendiciones (
                        id,
                        codigo_rendicion,
                        codigo_empresario,
                        codigo_item,
                        codigo_subitem,
                        descripcion,
                        cofinanciamiento,
                        aporte_empresarial,
                        total,
                        aporte_extra,
                        total_con_iva,
                        rut_proveedor,
                        tipo_documento,
                        numero_documento,
                        fecha_documento,
                        fecha_pago,
                        numero_cheque,
                        medio_pago,
                        modalidad_pago
                        )
                        VALUES(
                        :id,
                        :codigo_rendicion,
                        :codigo_empresario,
                        :codigo_item,
                        :codigo_subitem,
                        :descripcion,
                        :cofinanciamiento,
                        :aporte_empresarial,
                        :total,
                        :aporte_extra,
                        :total_con_iva,
                        :rut_proveedor,
                        :tipo_documento,
                        :numero_documento,
                        :fecha_documento,
                        :fecha_pago,
                        :numero_cheque,
                        :medio_pago,
                        :modalidad_pago
                        )
                        
                        ON DUPLICATE KEY UPDATE
                        
                        codigo_empresario=:codigo_empresario,
                        codigo_rendicion=:codigo_rendicion,
                        codigo_item=:codigo_item, 
                        codigo_subitem=:codigo_subitem, 
                        descripcion=:descripcion, 
                        cofinanciamiento=:cofinanciamiento, 
                        aporte_empresarial=:aporte_empresarial, 
                        total=:total, 
                        aporte_extra=:aporte_extra, 
                        total_con_iva=:total_con_iva, 
                        rut_proveedor=:rut_proveedor, 
                        tipo_documento=:tipo_documento, 
                        numero_documento=:numero_documento, 
                        fecha_documento=:fecha_documento, 
                        fecha_pago=:fecha_pago, 
                        numero_cheque=:numero_cheque, 
                        medio_pago=:medio_pago, 
                        modalidad_pago=:modalidad_pago 
                        ";

                $sentencia = $conexion->prepare($sql);

                $value_id = $rendiciones->obtener_id();
                $value_codigo_rendicion = $rendiciones->obtener_codigo_rendicion();
                $value_codigo_empresario = $rendiciones->obtener_codigo_empresario();
                $value_codigo_item = $rendiciones->obtener_codigo_item();
                $value_codigo_subitem = $rendiciones->obtener_codigo_subitem();
                $value_descripcion = $rendiciones->obtener_descripcion();
                $value_cofinanciamiento = $rendiciones->obtener_cofinanciamiento();
                $value_aporte_empresarial = $rendiciones->obtener_aporte_empresarial();
                $value_total = $rendiciones->obtener_total();
                $value_aporte_extra = $rendiciones->obtener_aporte_extra();
                $value_total_con_iva = $rendiciones->obtener_total_con_iva();
                $value_rut_proveedor = $rendiciones->obtener_rut_proveedor();
                $value_tipo_documento = $rendiciones->obtener_tipo_documento();
                $value_numero_documento = $rendiciones->obtener_numero_documento();
                $value_fecha_documento = $rendiciones->obtener_fecha_documento();
                $value_fecha_pago = $rendiciones->obtener_fecha_pago();
                $value_numero_cheque = $rendiciones->obtener_numero_cheque();
                $value_medio_pago = $rendiciones->obtener_medio_pago();
                $value_modalidad_pago = $rendiciones->obtener_modalidad_pago();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_rendicion', $value_codigo_rendicion, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $value_codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_item', $value_codigo_item, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $value_codigo_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $value_descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento', $value_cofinanciamiento, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial', $value_aporte_empresarial, PDO::PARAM_STR);
                $sentencia->bindParam(':total', $value_total, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_extra', $value_aporte_extra, PDO::PARAM_STR);
                $sentencia->bindParam(':total_con_iva', $value_total_con_iva, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_proveedor', $value_rut_proveedor, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_documento', $value_tipo_documento, PDO::PARAM_STR);
                $sentencia->bindParam(':numero_documento', $value_numero_documento, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_documento', $value_fecha_documento, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_pago', $value_fecha_pago, PDO::PARAM_STR);
                $sentencia->bindParam(':numero_cheque', $value_numero_cheque, PDO::PARAM_STR);
                $sentencia->bindParam(':medio_pago', $value_medio_pago, PDO::PARAM_STR);
                $sentencia->bindParam(':modalidad_pago', $value_modalidad_pago, PDO::PARAM_STR);

                $rendiciones_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $rendiciones_insertado;
    }

    public static function eliminar_rendiciones_id($id, $conexion) {
        $eliminado = false;

        if (isset($conexion)) {
            try {

                $sql = "DELETE FROM rendiciones WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $eliminado;
    }

    public static function modificar_rendiciones_id($id, $codigo_rendicion, $codigo_empresario, $codigo_item, $codigo_subitem, $descripcion, $cofinanciamiento, $aporte_empresarial, $total, $aporte_extra, $total_con_iva, $rut_proveedor, $tipo_documento, $numero_documento, $fecha_documento, $fecha_pago, $numero_cheque, $medio_pago, $modalidad_pago, $conexion) {

        $rendiciones_modificado = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE rendiciones SET 
                codigo_rendicion=:codigo_rendicion,
                codigo_empresario=:codigo_empresario,
                codigo_item=:codigo_item,
                codigo_subitem=:codigo_subitem,
                descripcion=:descripcion,
                cofinanciamiento=:cofinanciamiento,
                aporte_empresarial=:aporte_empresarial,
                total=:total,
                aporte_extra=:aporte_extra,
                total_con_iva=:total_con_iva,
                rut_proveedor=:rut_proveedor,
                tipo_documento=:tipo_documento,
                numero_documento=:numero_documento,
                fecha_documento=:fecha_documento,
                fecha_pago=:fecha_pago,
                numero_cheque=:numero_cheque,
                medio_pago=:medio_pago,
                modalidad_pago=:modalidad_pago
                WHERE id = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_rendicion', $codigo_rendicion, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_item', $codigo_item, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $codigo_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento', $cofinanciamiento, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial', $aporte_empresarial, PDO::PARAM_STR);
                $sentencia->bindParam(':total', $total, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_extra', $aporte_extra, PDO::PARAM_STR);
                $sentencia->bindParam(':total_con_iva', $total_con_iva, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_proveedor', $rut_proveedor, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_documento', $tipo_documento, PDO::PARAM_STR);
                $sentencia->bindParam(':numero_documento', $numero_documento, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_documento', $fecha_documento, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_pago', $fecha_pago, PDO::PARAM_STR);
                $sentencia->bindParam(':numero_cheque', $numero_cheque, PDO::PARAM_STR);
                $sentencia->bindParam(':medio_pago', $medio_pago, PDO::PARAM_STR);
                $sentencia->bindParam(':modalidad_pago', $modalidad_pago, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $rendiciones_modificado = true;
                } else {
                    $rendiciones_modificado = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $rendiciones_modificado;
    }

    public static function buscar_rendiciones_id($id, $conexion) {
        $rendiciones = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM rendiciones WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $rendiciones = new class_tabla_rendiciones(
                            $resultado['id'], $resultado['codigo_rendicion'], $resultado['codigo_empresario'], $resultado['codigo_item'], $resultado['codigo_subitem'], $resultado['descripcion'], $resultado['cofinanciamiento'], $resultado['aporte_empresarial'], $resultado['total'], $resultado['aporte_extra'], $resultado['total_con_iva'], $resultado['rut_proveedor'], $resultado['tipo_documento'], $resultado['numero_documento'], $resultado['fecha_documento'], $resultado['fecha_pago'], $resultado['numero_cheque'], $resultado['medio_pago'], $resultado['modalidad_pago']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $rendiciones;
    }

    public static function insertar_rendiciones($rendiciones, $conexion) {
        $rendiciones_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO rendiciones(
                        id,
                        codigo_rendicion,
                        codigo_empresario,
                        codigo_item,
                        codigo_subitem,
                        descripcion,
                        cofinanciamiento,
                        aporte_empresarial,
                        total,
                        aporte_extra,
                        total_con_iva,
                        rut_proveedor,
                        tipo_documento,
                        numero_documento,
                        fecha_documento,
                        fecha_pago,
                        numero_cheque,
                        medio_pago,
                        modalidad_pago
                        )
                        
                        VALUES(
                        :id,
                        :codigo_rendicion,
                        :codigo_empresario,
                        :codigo_item,
                        :codigo_subitem,
                        :descripcion,
                        :cofinanciamiento,
                        :aporte_empresarial,
                        :total,
                        :aporte_extra,
                        :total_con_iva,
                        :rut_proveedor,
                        :tipo_documento,
                        :numero_documento,
                        :fecha_documento,
                        :fecha_pago,
                        :numero_cheque,
                        :medio_pago,
                        :modalidad_pago
                        )";

                $sentencia = $conexion->prepare($sql);

                $value_id = $rendiciones->obtener_id();
                $value_codigo_rendicion = $rendiciones->obtener_codigo_rendicion();
                $value_codigo_empresario = $rendiciones->obtener_codigo_empresario();
                $value_codigo_item = $rendiciones->obtener_codigo_item();
                $value_codigo_subitem = $rendiciones->obtener_codigo_subitem();
                $value_descripcion = $rendiciones->obtener_descripcion();
                $value_cofinanciamiento = $rendiciones->obtener_cofinanciamiento();
                $value_aporte_empresarial = $rendiciones->obtener_aporte_empresarial();
                $value_total = $rendiciones->obtener_total();
                $value_aporte_extra = $rendiciones->obtener_aporte_extra();
                $value_total_con_iva = $rendiciones->obtener_total_con_iva();
                $value_rut_proveedor = $rendiciones->obtener_rut_proveedor();
                $value_tipo_documento = $rendiciones->obtener_tipo_documento();
                $value_numero_documento = $rendiciones->obtener_numero_documento();
                $value_fecha_documento = $rendiciones->obtener_fecha_documento();
                $value_fecha_pago = $rendiciones->obtener_fecha_pago();
                $value_numero_cheque = $rendiciones->obtener_numero_cheque();
                $value_medio_pago = $rendiciones->obtener_medio_pago();
                $value_modalidad_pago = $rendiciones->obtener_modalidad_pago();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_rendicion', $value_codigo_rendicion, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $value_codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_item', $value_codigo_item, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_subitem', $value_codigo_subitem, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $value_descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento', $value_cofinanciamiento, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial', $value_aporte_empresarial, PDO::PARAM_STR);
                $sentencia->bindParam(':total', $value_total, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_extra', $value_aporte_extra, PDO::PARAM_STR);
                $sentencia->bindParam(':total_con_iva', $value_total_con_iva, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_proveedor', $value_rut_proveedor, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_documento', $value_tipo_documento, PDO::PARAM_STR);
                $sentencia->bindParam(':numero_documento', $value_numero_documento, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_documento', $value_fecha_documento, PDO::PARAM_STR);
                $sentencia->bindParam(':fecha_pago', $value_fecha_pago, PDO::PARAM_STR);
                $sentencia->bindParam(':numero_cheque', $value_numero_cheque, PDO::PARAM_STR);
                $sentencia->bindParam(':medio_pago', $value_medio_pago, PDO::PARAM_STR);
                $sentencia->bindParam(':modalidad_pago', $value_modalidad_pago, PDO::PARAM_STR);

                $rendiciones_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $rendiciones_insertado;
    }

    public static function listar_rendiciones_empresario_proveedor($codigo_empresario, $conexion) {

        $rendiciones = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM rendiciones WHERE codigo_empresario=:codigo_empresario ORDER BY proveedor ASC, tipo_documento ASC, numero_documento ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $rendiciones[] = new class_tabla_rendiciones(
                                $fila['id'], $fila['codigo_rendicion'], $fila['codigo_empresario'], $fila['codigo_item'], $fila['codigo_subitem'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['aporte_extra'], $fila['total_con_iva'], $fila['rut_proveedor'], $fila['tipo_documento'], $fila['numero_documento'], $fila['fecha_documento'], $fila['fecha_pago'], $fila['numero_cheque'], $fila['medio_pago'], $fila['modalidad_pago']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $rendiciones;
    }

    public static function listar_rendiciones_codigo_bp($codigo_bp, $conexion) {

        $rendiciones = array();
        $rendiciones_codigo_bp = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM rendiciones ORDER BY FIELD(fecha_pago, '0001-01-01') DESC, fecha_pago DESC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_bp', $codigo_bp, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $rendiciones[] = new class_tabla_rendiciones(
                                $fila['id'], $fila['codigo_rendicion'], $fila['codigo_empresario'], $fila['codigo_item'], $fila['codigo_subitem'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['aporte_extra'], $fila['total_con_iva'], $fila['rut_proveedor'], $fila['tipo_documento'], $fila['numero_documento'], $fila['fecha_documento'], $fila['fecha_pago'], $fila['numero_cheque'], $fila['medio_pago'], $fila['modalidad_pago']
                        );
                    }
                }


                $longitud_rendiciones = count($rendiciones);
                for ($i = 0; $i < $longitud_rendiciones; $i++) {
                    $id_codigo_empresario = $rendiciones[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $id_codigo_bp = $array_id_codigo_empresario[0];
                    if ($codigo_bp == $id_codigo_bp) {
                        $rendiciones_codigo_bp[] = new class_tabla_rendiciones(
                                $rendiciones[$i]->obtener_id(), $rendiciones[$i]->obtener_codigo_rendicion(), $rendiciones[$i]->obtener_codigo_empresario(), $rendiciones[$i]->obtener_codigo_item(), $rendiciones[$i]->obtener_codigo_subitem(), $rendiciones[$i]->obtener_descripcion(), $rendiciones[$i]->obtener_cofinanciamiento(), $rendiciones[$i]->obtener_aporte_empresarial(), $rendiciones[$i]->obtener_total(), $rendiciones[$i]->obtener_aporte_extra(), $rendiciones[$i]->obtener_total_con_iva(), $rendiciones[$i]->obtener_rut_proveedor(), $rendiciones[$i]->obtener_tipo_documento(), $rendiciones[$i]->obtener_numero_documento(), $rendiciones[$i]->obtener_fecha_documento(), $rendiciones[$i]->obtener_fecha_pago(), $rendiciones[$i]->obtener_numero_cheque(), $rendiciones[$i]->obtener_medio_pago(), $rendiciones[$i]->obtener_modalidad_pago()
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $rendiciones_codigo_bp;
    }

}

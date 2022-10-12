<?php

include 'entrepeneur_tbl_organizer.php';

class class_operar_empresarios {

    public static function insertar_empresarios($empresarios, $conexion) {
        $empresarios_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO empresarios(
                        id,
                        codigo_empresario,                        
                        plan_negocio,
                        descripcion,
                        cofinanciamiento,
                        aporte_empresarial,
                        total,
                        rut,
                        nombre,
                        apellido_paterno,
                        apellido_materno,
                        direccion_particular,
                        comuna_direccion_particular,
                        direccion,
                        comuna,
                        provincia,
                        telefono,
                        celular,
                        email,
                        rut_razon_social,
                        razon_social,
                        rut_representante,
                        representante,
                        persona_juridica,
                        tipo_juridica,
                        rut_evaluador,
                        rut_asesor,
                        rut_ejecutivo,
                        estado,
                        utm_north,
                        utm_east,
                        utm_zone,
                        utm_hemisferio 
                        )
                        
                        VALUES(
                        :id,
                        :codigo_empresario,
                        :plan_negocio,
                        :descripcion,
                        :cofinanciamiento,
                        :aporte_empresarial,
                        :total,
                        :rut,
                        :nombre,
                        :apellido_paterno,
                        :apellido_materno,
                        :direccion_particular,
                        :comuna_direccion_particular,
                        :direccion,
                        :comuna,
                        :provincia,
                        :telefono,
                        :celular,
                        :email,
                        :rut_razon_social,
                        :razon_social,
                        :rut_representante,
                        :representante,
                        :persona_juridica,
                        :tipo_juridica,
                        :rut_evaluador,
                        :rut_asesor,
                        :rut_ejecutivo,
                        :estado,
                        :utm_north,
                        :utm_east,
                        :utm_zone,
                        :utm_hemisferio 
                        )";

                $sentencia = $conexion->prepare($sql);

                $value_id = $empresarios->obtener_id();
                $value_codigo_empresario = $empresarios->obtener_codigo_empresario();
                $value_plan_negocio = $empresarios->obtener_plan_negocio();
                $value_descripcion = $empresarios->obtener_descripcion();
                $value_cofinanciamiento = $empresarios->obtener_cofinanciamiento();
                $value_aporte_empresarial = $empresarios->obtener_aporte_empresarial();
                $value_total = $empresarios->obtener_total();
                $value_rut = $empresarios->obtener_rut();
                $value_nombre = $empresarios->obtener_nombre();
                $value_apellido_paterno = $empresarios->obtener_apellido_paterno();
                $value_apellido_materno = $empresarios->obtener_apellido_materno();
                $value_direccion_particular = $empresarios->obtener_direccion_particular();
                $value_comuna_direccion_particular = $empresarios->obtener_comuna_direccion_particular();
                $value_direccion = $empresarios->obtener_direccion();
                $value_comuna = $empresarios->obtener_comuna();
                $value_provincia = $empresarios->obtener_provincia();
                $value_telefono = $empresarios->obtener_telefono();
                $value_celular = $empresarios->obtener_celular();
                $value_email = $empresarios->obtener_email();
                $value_rut_razon_social = $empresarios->obtener_rut_razon_social();
                $value_razon_social = $empresarios->obtener_razon_social();
                $value_rut_representante = $empresarios->obtener_rut_representante();
                $value_representante = $empresarios->obtener_representante();
                $value_persona_juridica = $empresarios->obtener_persona_juridica();
                $value_tipo_juridica = $empresarios->obtener_tipo_juridica();
                $value_rut_evaluador = $empresarios->obtener_rut_evaluador();
                $value_rut_asesor = $empresarios->obtener_rut_asesor();
                $value_rut_ejecutivo = $empresarios->obtener_rut_ejecutivo();
                $value_estado = $empresarios->obtener_estado();
                $value_utm_north = $empresarios->obtener_utm_north();
                $value_utm_east = $empresarios->obtener_utm_east();
                $value_utm_zone = $empresarios->obtener_utm_zone();
                $value_utm_hemisferio = $empresarios->obtener_utm_hemisferio();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $value_codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':plan_negocio', $value_plan_negocio, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $value_descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento', $value_cofinanciamiento, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial', $value_aporte_empresarial, PDO::PARAM_STR);
                $sentencia->bindParam(':total', $value_total, PDO::PARAM_STR);
                $sentencia->bindParam(':rut', $value_rut, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre', $value_nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido_paterno', $value_apellido_paterno, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido_materno', $value_apellido_materno, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion_particular', $value_direccion_particular, PDO::PARAM_STR);
                $sentencia->bindParam(':comuna_direccion_particular', $value_comuna_direccion_particular, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion', $value_direccion, PDO::PARAM_STR);
                $sentencia->bindParam(':comuna', $value_comuna, PDO::PARAM_STR);
                $sentencia->bindParam(':provincia', $value_provincia, PDO::PARAM_STR);
                $sentencia->bindParam(':telefono', $value_telefono, PDO::PARAM_STR);
                $sentencia->bindParam(':celular', $value_celular, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $value_email, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_razon_social', $value_rut_razon_social, PDO::PARAM_STR);
                $sentencia->bindParam(':razon_social', $value_razon_social, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_representante', $value_rut_representante, PDO::PARAM_STR);
                $sentencia->bindParam(':representante', $value_representante, PDO::PARAM_STR);
                $sentencia->bindParam(':persona_juridica', $value_persona_juridica, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_juridica', $value_tipo_juridica, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_evaluador', $value_rut_evaluador, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_asesor', $value_rut_asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_ejecutivo', $value_rut_ejecutivo, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $value_estado, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_north', $value_utm_north, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_east', $value_utm_east, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_zone', $value_utm_zone, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_hemisferio', $value_utm_hemisferio, PDO::PARAM_STR);

                $empresarios_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $empresarios_insertado;
    }

    public static function listar_empresarios($conexion) {

        $empresarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function eliminar_empresarios_id($id, $conexion) {
        $eliminado = false;

        if (isset($conexion)) {
            try {

                $sql = "DELETE FROM empresarios WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $eliminado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $eliminado;
    }

    public static function modificar_empresarios_id(
    $id, $codigo_empresario, $plan_negocio, $descripcion, $cofinanciamiento, $aporte_empresarial, $total, $rut, $nombre, $apellido_paterno, $apellido_materno, $direccion_particular, $comuna_direccion_particular, $direccion, $comuna, $provincia, $telefono, $celular, $email, $rut_razon_social, $razon_social, $rut_representante, $representante, $persona_juridica, $tipo_juridica, $rut_evaluador, $rut_asesor, $rut_ejecutivo, $estado, $utm_north, $utm_east, $utm_zone, $utm_hemisferio, $conexion) {

        $empresarios_modificado = false;

        if (isset($conexion)) {
            try {

                $sql = "UPDATE empresarios SET 
                        codigo_empresario=:codigo_empresario, 
                        plan_negocio=:plan_negocio, 
                        descripcion=:descripcion, 
                        cofinanciamiento=:cofinanciamiento, 
                        aporte_empresarial=:aporte_empresarial, 
                        total=:total, 
                        rut=:rut, 
                        nombre=:nombre, 
                        apellido_paterno=:apellido_paterno, 
                        apellido_materno=:apellido_materno, 
                        direccion_particular=:direccion_particular, 
                        comuna_direccion_particular=:comuna_direccion_particular, 
                        direccion=:direccion, 
                        comuna=:comuna, 
                        provincia=:provincia, 
                        telefono=:telefono, 
                        celular=:celular, 
                        email=:email, 
                        rut_razon_social=:rut_razon_social, 
                        razon_social=:razon_social, 
                        rut_representante=:rut_representante, 
                        representante=:representante, 
                        persona_juridica=:persona_juridica, 
                        tipo_juridica=:tipo_juridica, 
                        rut_evaluador=:rut_evaluador, 
                        rut_asesor=:rut_asesor, 
                        rut_ejecutivo=:rut_ejecutivo, 
                        estado=:estado,
                        utm_north=:utm_north, 
                        utm_east=:utm_east, 
                        utm_zone=:utm_zone, 
                        utm_hemisferio=:utm_hemisferio
                        WHERE id=:id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':plan_negocio', $plan_negocio, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento', $cofinanciamiento, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial', $aporte_empresarial, PDO::PARAM_STR);
                $sentencia->bindParam(':total', $total, PDO::PARAM_STR);
                $sentencia->bindParam(':rut', $rut, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido_paterno', $apellido_paterno, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido_materno', $apellido_materno, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion_particular', $direccion_particular, PDO::PARAM_STR);
                $sentencia->bindParam(':comuna_direccion_particular', $comuna_direccion_particular, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion', $direccion, PDO::PARAM_STR);
                $sentencia->bindParam(':comuna', $comuna, PDO::PARAM_STR);
                $sentencia->bindParam(':provincia', $provincia, PDO::PARAM_STR);
                $sentencia->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $sentencia->bindParam(':celular', $celular, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_razon_social', $rut_razon_social, PDO::PARAM_STR);
                $sentencia->bindParam(':razon_social', $razon_social, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_representante', $rut_representante, PDO::PARAM_STR);
                $sentencia->bindParam(':representante', $representante, PDO::PARAM_STR);
                $sentencia->bindParam(':persona_juridica', $persona_juridica, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_juridica', $tipo_juridica, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_evaluador', $rut_evaluador, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_asesor', $rut_asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_ejecutivo', $rut_ejecutivo, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_north', $utm_north, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_east', $utm_east, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_zone', $utm_zone, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_hemisferio', $utm_hemisferio, PDO::PARAM_STR);

                $sentencia->execute();
                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $empresarios_modificado = true;
                } else {
                    $empresarios_modificado = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $empresarios_modificado;
    }

    public static function buscar_empresarios_id($id, $conexion) {
        $empresarios = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM empresarios WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $empresarios = new class_tabla_empresarios(
                            $resultado['id'], $resultado['codigo_empresario'], $resultado['plan_negocio'], $resultado['descripcion'], $resultado['cofinanciamiento'], $resultado['aporte_empresarial'], $resultado['total'], $resultado['rut'], $resultado['nombre'], $resultado['apellido_paterno'], $resultado['apellido_materno'], $resultado['direccion_particular'], $resultado['comuna_direccion_particular'], $resultado['direccion'], $resultado['comuna'], $resultado['provincia'], $resultado['telefono'], $resultado['celular'], $resultado['email'], $resultado['rut_razon_social'], $resultado['razon_social'], $resultado['rut_representante'], $resultado['representante'], $resultado['persona_juridica'], $resultado['tipo_juridica'], $resultado['rut_evaluador'], $resultado['rut_asesor'], $resultado['rut_ejecutivo'], $resultado['estado'], $resultado['utm_north'], $resultado['utm_east'], $resultado['utm_zone'], $resultado['utm_hemisferio']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $empresarios;
    }

    public static function buscar_empresarios_rut($rut, $conexion) {
        $empresarios = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM empresarios WHERE rut=:rut";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut', $rut, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $empresarios = new class_tabla_empresarios(
                            $resultado['id'], $resultado['codigo_empresario'], $resultado['plan_negocio'], $resultado['descripcion'], $resultado['cofinanciamiento'], $resultado['aporte_empresarial'], $resultado['total'], $resultado['rut'], $resultado['nombre'], $resultado['apellido_paterno'], $resultado['apellido_materno'], $resultado['direccion_particular'], $resultado['comuna_direccion_particular'], $resultado['direccion'], $resultado['comuna'], $resultado['provincia'], $resultado['telefono'], $resultado['celular'], $resultado['email'], $resultado['rut_razon_social'], $resultado['razon_social'], $resultado['rut_representante'], $resultado['representante'], $resultado['persona_juridica'], $resultado['tipo_juridica'], $resultado['rut_evaluador'], $resultado['rut_asesor'], $resultado['rut_ejecutivo'], $resultado['estado'], $resultado['utm_north'], $resultado['utm_east'], $resultado['utm_zone'], $resultado['utm_hemisferio']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $empresarios;
    }

    public static function listar_empresarios_asesor_activo($rut_asesor, $conexion) {

        $empresarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_asesor = :rut_asesor AND estado = :estado ORDER BY apellido_paterno ASC";

                $estado = 'Activo';

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_asesor', $rut_asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function listar_empresarios_asesor($rut_asesor, $conexion) {

        $empresarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_asesor = :rut_asesor ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_asesor', $rut_asesor, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function listar_empresarios_ejecutivo($rut_ejecutivo, $conexion) {

        $empresarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_ejecutivo = :rut_ejecutivo ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_ejecutivo', $rut_ejecutivo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function importar_empresarios($empresarios, $conexion) {
        $empresarios_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "INSERT INTO empresarios (
                        id,
                        codigo_empresario,
                        plan_negocio,
                        descripcion,
                        cofinanciamiento,
                        aporte_empresarial,
                        total,
                        rut,
                        nombre,
                        apellido_paterno,
                        apellido_materno,
                        direccion_particular,
                        comuna_direccion_particular,
                        direccion,
                        comuna,
                        provincia,
                        telefono,
                        celular,
                        email,
                        rut_razon_social,
                        razon_social,
                        rut_representante,
                        representante,
                        persona_juridica,
                        tipo_juridica,
                        rut_evaluador,
                        rut_asesor,
                        rut_ejecutivo,
                        estado,
                        utm_north,
                        utm_east,
                        utm_zone,
                        utm_hemisferio
                        )
                        VALUES(
                        :id,
                        :codigo_empresario,
                        :plan_negocio,
                        :descripcion,
                        :cofinanciamiento,
                        :aporte_empresarial,
                        :total,
                        :rut,
                        :nombre,
                        :apellido_paterno,
                        :apellido_materno,
                        :direccion_particular,
                        :comuna_direccion_particular,
                        :direccion,
                        :comuna,
                        :provincia,
                        :telefono,
                        :celular,
                        :email,
                        :rut_razon_social,
                        :razon_social,
                        :rut_representante,
                        :representante,
                        :persona_juridica,
                        :tipo_juridica,
                        :rut_evaluador,
                        :rut_asesor,
                        :rut_ejecutivo,
                        :estado,
                        :utm_north,
                        :utm_east,
                        :utm_zone,
                        :utm_hemisferio
                        )
                        
                        ON DUPLICATE KEY UPDATE
                        
                        codigo_empresario=:codigo_empresario, 
                        plan_negocio=:plan_negocio, 
                        descripcion=:descripcion, 
                        cofinanciamiento=:cofinanciamiento, 
                        aporte_empresarial=:aporte_empresarial, 
                        total=:total, 
                        rut=:rut, 
                        nombre=:nombre, 
                        apellido_paterno=:apellido_paterno, 
                        apellido_materno=:apellido_materno, 
                        direccion_particular=:direccion_particular, 
                        comuna_direccion_particular=:comuna_direccion_particular, 
                        direccion=:direccion, 
                        comuna=:comuna, 
                        provincia=:provincia, 
                        telefono=:telefono, 
                        celular=:celular, 
                        email=:email, 
                        rut_razon_social=:rut_razon_social, 
                        razon_social=:razon_social, 
                        rut_representante=:rut_representante, 
                        representante=:representante, 
                        persona_juridica=:persona_juridica, 
                        tipo_juridica=:tipo_juridica, 
                        rut_evaluador=:rut_evaluador, 
                        rut_asesor=:rut_asesor, 
                        rut_ejecutivo=:rut_ejecutivo, 
                        estado=:estado,
                        utm_north=:utm_north, 
                        utm_east=:utm_east, 
                        utm_zone=:utm_zone, 
                        utm_hemisferio=:utm_hemisferio
                        ";

                $sentencia = $conexion->prepare($sql);

                $value_id = $empresarios->obtener_id();
                $value_codigo_empresario = $empresarios->obtener_codigo_empresario();
                $value_plan_negocio = $empresarios->obtener_plan_negocio();
                $value_descripcion = $empresarios->obtener_descripcion();
                $value_cofinanciamiento = $empresarios->obtener_cofinanciamiento();
                $value_aporte_empresarial = $empresarios->obtener_aporte_empresarial();
                $value_total = $empresarios->obtener_total();
                $value_rut = $empresarios->obtener_rut();
                $value_nombre = $empresarios->obtener_nombre();
                $value_apellido_paterno = $empresarios->obtener_apellido_paterno();
                $value_apellido_materno = $empresarios->obtener_apellido_materno();
                $value_direccion_particular = $empresarios->obtener_direccion_particular();
                $value_comuna_direccion_particular = $empresarios->obtener_comuna_direccion_particular();
                $value_direccion = $empresarios->obtener_direccion();
                $value_comuna = $empresarios->obtener_comuna();
                $value_provincia = $empresarios->obtener_provincia();
                $value_telefono = $empresarios->obtener_telefono();
                $value_celular = $empresarios->obtener_celular();
                $value_email = $empresarios->obtener_email();
                $value_rut_razon_social = $empresarios->obtener_rut_razon_social();
                $value_razon_social = $empresarios->obtener_razon_social();
                $value_rut_representante = $empresarios->obtener_rut_representante();
                $value_representante = $empresarios->obtener_representante();
                $value_persona_juridica = $empresarios->obtener_persona_juridica();
                $value_tipo_juridica = $empresarios->obtener_tipo_juridica();
                $value_rut_evaluador = $empresarios->obtener_rut_evaluador();
                $value_rut_asesor = $empresarios->obtener_rut_asesor();
                $value_rut_ejecutivo = $empresarios->obtener_rut_ejecutivo();
                $value_estado = $empresarios->obtener_estado();
                $value_utm_north = $empresarios->obtener_utm_north();
                $value_utm_east = $empresarios->obtener_utm_east();
                $value_utm_zone = $empresarios->obtener_utm_zone();
                $value_utm_hemisferio = $empresarios->obtener_utm_hemisferio();

                $sentencia->bindParam(':id', $value_id, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empresario', $value_codigo_empresario, PDO::PARAM_STR);
                $sentencia->bindParam(':plan_negocio', $value_plan_negocio, PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $value_descripcion, PDO::PARAM_STR);
                $sentencia->bindParam(':cofinanciamiento', $value_cofinanciamiento, PDO::PARAM_STR);
                $sentencia->bindParam(':aporte_empresarial', $value_aporte_empresarial, PDO::PARAM_STR);
                $sentencia->bindParam(':total', $value_total, PDO::PARAM_STR);
                $sentencia->bindParam(':rut', $value_rut, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre', $value_nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido_paterno', $value_apellido_paterno, PDO::PARAM_STR);
                $sentencia->bindParam(':apellido_materno', $value_apellido_materno, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion_particular', $value_direccion_particular, PDO::PARAM_STR);
                $sentencia->bindParam(':comuna_direccion_particular', $value_comuna_direccion_particular, PDO::PARAM_STR);
                $sentencia->bindParam(':direccion', $value_direccion, PDO::PARAM_STR);
                $sentencia->bindParam(':comuna', $value_comuna, PDO::PARAM_STR);
                $sentencia->bindParam(':provincia', $value_provincia, PDO::PARAM_STR);
                $sentencia->bindParam(':telefono', $value_telefono, PDO::PARAM_STR);
                $sentencia->bindParam(':celular', $value_celular, PDO::PARAM_STR);
                $sentencia->bindParam(':email', $value_email, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_razon_social', $value_rut_razon_social, PDO::PARAM_STR);
                $sentencia->bindParam(':razon_social', $value_razon_social, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_representante', $value_rut_representante, PDO::PARAM_STR);
                $sentencia->bindParam(':representante', $value_representante, PDO::PARAM_STR);
                $sentencia->bindParam(':persona_juridica', $value_persona_juridica, PDO::PARAM_STR);
                $sentencia->bindParam(':tipo_juridica', $value_tipo_juridica, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_evaluador', $value_rut_evaluador, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_asesor', $value_rut_asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_ejecutivo', $value_rut_ejecutivo, PDO::PARAM_STR);
                $sentencia->bindParam(':estado', $value_estado, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_north', $value_utm_north, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_east', $value_utm_east, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_zone', $value_utm_zone, PDO::PARAM_STR);
                $sentencia->bindParam(':utm_hemisferio', $value_utm_hemisferio, PDO::PARAM_STR);

                $empresarios_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $empresarios_insertado;
    }

    public static function listar_empresarios_asesor_ejecutivo($rut_asesor, $rut_ejecutivo, $conexion) {

        $empresarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_asesor = :rut_asesor AND rut_ejecutivo = :rut_ejecutivo ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_asesor', $rut_asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_ejecutivo', $rut_ejecutivo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function existe_codigo_empresario($codigo_empresario, $conexion) {

        $codigo_empresario_existente = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM empresarios WHERE codigo_empresario=:codigo_empresario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();


                if (count($resultado)) {
                    $codigo_empresario_existente = true;
                } else {
                    $codigo_empresario_existente = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $codigo_empresario_existente;
    }

    public static function buscar_empresarios_codigo_empresario($codigo_empresario, $conexion) {
        $empresarios = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM empresarios WHERE codigo_empresario=:codigo_empresario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':codigo_empresario', $codigo_empresario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $empresarios = new class_tabla_empresarios(
                            $resultado['id'], $resultado['codigo_empresario'], $resultado['plan_negocio'], $resultado['descripcion'], $resultado['cofinanciamiento'], $resultado['aporte_empresarial'], $resultado['total'], $resultado['rut'], $resultado['nombre'], $resultado['apellido_paterno'], $resultado['apellido_materno'], $resultado['direccion_particular'], $resultado['comuna_direccion_particular'], $resultado['direccion'], $resultado['comuna'], $resultado['provincia'], $resultado['telefono'], $resultado['celular'], $resultado['email'], $resultado['rut_razon_social'], $resultado['razon_social'], $resultado['rut_representante'], $resultado['representante'], $resultado['persona_juridica'], $resultado['tipo_juridica'], $resultado['rut_evaluador'], $resultado['rut_asesor'], $resultado['rut_ejecutivo'], $resultado['estado'], $resultado['utm_north'], $resultado['utm_east'], $resultado['utm_zone'], $resultado['utm_hemisferio']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $empresarios;
    }

    public static function listar_empresarios_codigo_bp_asesor_filtrar($codigo_bp, $rut_asesor, $conexion) {

        $empresarios = array();
        $empresarios_filtrar = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_asesor = :rut_asesor AND (estado = :estado1 OR estado = :estado2) ORDER BY apellido_paterno ASC";

                $estado1 = 'Activo';
                $estado2 = 'Observado';

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_asesor', $rut_asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':estado1', $estado1, PDO::PARAM_STR);
                $sentencia->bindParam(':estado2', $estado2, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
                $longitud_empresarios = count($empresarios);
                for ($i = 0; $i < $longitud_empresarios; $i++) {
                    $id_codigo_empresario = $empresarios[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $id_codigo_bp = $array_id_codigo_empresario[0];
                    if ($codigo_bp == $id_codigo_bp) {
                        $empresarios_filtrar[] = new class_tabla_empresarios(
                                $empresarios[$i]->obtener_id(), $empresarios[$i]->obtener_codigo_empresario(), $empresarios[$i]->obtener_plan_negocio(), $empresarios[$i]->obtener_descripcion(), $empresarios[$i]->obtener_cofinanciamiento(), $empresarios[$i]->obtener_aporte_empresarial(), $empresarios[$i]->obtener_total(), $empresarios[$i]->obtener_rut(), $empresarios[$i]->obtener_nombre(), $empresarios[$i]->obtener_apellido_paterno(), $empresarios[$i]->obtener_apellido_materno(), $empresarios[$i]->obtener_direccion_particular(), $empresarios[$i]->obtener_comuna_direccion_particular(), $empresarios[$i]->obtener_direccion(), $empresarios[$i]->obtener_comuna(), $empresarios[$i]->obtener_provincia(), $empresarios[$i]->obtener_telefono(), $empresarios[$i]->obtener_celular(), $empresarios[$i]->obtener_email(), $empresarios[$i]->obtener_rut_razon_social(), $empresarios[$i]->obtener_razon_social(), $empresarios[$i]->obtener_rut_representante(), $empresarios[$i]->obtener_representante(), $empresarios[$i]->obtener_persona_juridica(), $empresarios[$i]->obtener_tipo_juridica(), $empresarios[$i]->obtener_rut_evaluador(), $empresarios[$i]->obtener_rut_asesor(), $empresarios[$i]->obtener_rut_ejecutivo(), $empresarios[$i]->obtener_estado(), $empresarios[$i]->obtener_utm_north(), $empresarios[$i]->obtener_utm_east(), $empresarios[$i]->obtener_utm_zone(), $empresarios[$i]->obtener_utm_hemisferio()
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios_filtrar;
    }

    public static function listar_empresarios_codigo_bp_filtrar($codigo_bp, $conexion) {

        $empresarios = array();
        $empresarios_filtrar = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
                $longitud_empresarios = count($empresarios);
                for ($i = 0; $i < $longitud_empresarios; $i++) {
                    $id_codigo_empresario = $empresarios[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $id_codigo_bp = $array_id_codigo_empresario[0];
                    if ($codigo_bp == $id_codigo_bp) {
                        $empresarios_filtrar[] = new class_tabla_empresarios(
                                $empresarios[$i]->obtener_id(), $empresarios[$i]->obtener_codigo_empresario(), $empresarios[$i]->obtener_plan_negocio(), $empresarios[$i]->obtener_descripcion(), $empresarios[$i]->obtener_cofinanciamiento(), $empresarios[$i]->obtener_aporte_empresarial(), $empresarios[$i]->obtener_total(), $empresarios[$i]->obtener_rut(), $empresarios[$i]->obtener_nombre(), $empresarios[$i]->obtener_apellido_paterno(), $empresarios[$i]->obtener_apellido_materno(), $empresarios[$i]->obtener_direccion_particular(), $empresarios[$i]->obtener_comuna_direccion_particular(), $empresarios[$i]->obtener_direccion(), $empresarios[$i]->obtener_comuna(), $empresarios[$i]->obtener_provincia(), $empresarios[$i]->obtener_telefono(), $empresarios[$i]->obtener_celular(), $empresarios[$i]->obtener_email(), $empresarios[$i]->obtener_rut_razon_social(), $empresarios[$i]->obtener_razon_social(), $empresarios[$i]->obtener_rut_representante(), $empresarios[$i]->obtener_representante(), $empresarios[$i]->obtener_persona_juridica(), $empresarios[$i]->obtener_tipo_juridica(), $empresarios[$i]->obtener_rut_evaluador(), $empresarios[$i]->obtener_rut_asesor(), $empresarios[$i]->obtener_rut_ejecutivo(), $empresarios[$i]->obtener_estado(), $empresarios[$i]->obtener_utm_north(), $empresarios[$i]->obtener_utm_east(), $empresarios[$i]->obtener_utm_zone(), $empresarios[$i]->obtener_utm_hemisferio()
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios_filtrar;
    }

    public static function listar_empresarios_codigo_bp_asesor_ejecutivo_filtrar($codigo_bp, $rut_asesor, $rut_ejecutivo, $conexion) {

        $empresarios = array();
        $empresarios_filtrar = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_asesor = :rut_asesor AND rut_ejecutivo = :rut_ejecutivo ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_asesor', $rut_asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_ejecutivo', $rut_ejecutivo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
                $longitud_empresarios = count($empresarios);
                for ($i = 0; $i < $longitud_empresarios; $i++) {
                    $id_codigo_empresario = $empresarios[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $id_codigo_bp = $array_id_codigo_empresario[0];
                    if ($codigo_bp == $id_codigo_bp) {
                        $empresarios_filtrar[] = new class_tabla_empresarios(
                                $empresarios[$i]->obtener_id(), $empresarios[$i]->obtener_codigo_empresario(), $empresarios[$i]->obtener_plan_negocio(), $empresarios[$i]->obtener_descripcion(), $empresarios[$i]->obtener_cofinanciamiento(), $empresarios[$i]->obtener_aporte_empresarial(), $empresarios[$i]->obtener_total(), $empresarios[$i]->obtener_rut(), $empresarios[$i]->obtener_nombre(), $empresarios[$i]->obtener_apellido_paterno(), $empresarios[$i]->obtener_apellido_materno(), $empresarios[$i]->obtener_direccion_particular(), $empresarios[$i]->obtener_comuna_direccion_particular(), $empresarios[$i]->obtener_direccion(), $empresarios[$i]->obtener_comuna(), $empresarios[$i]->obtener_provincia(), $empresarios[$i]->obtener_telefono(), $empresarios[$i]->obtener_celular(), $empresarios[$i]->obtener_email(), $empresarios[$i]->obtener_rut_razon_social(), $empresarios[$i]->obtener_razon_social(), $empresarios[$i]->obtener_rut_representante(), $empresarios[$i]->obtener_representante(), $empresarios[$i]->obtener_persona_juridica(), $empresarios[$i]->obtener_tipo_juridica(), $empresarios[$i]->obtener_rut_evaluador(), $empresarios[$i]->obtener_rut_asesor(), $empresarios[$i]->obtener_rut_ejecutivo(), $empresarios[$i]->obtener_estado(), $empresarios[$i]->obtener_utm_north(), $empresarios[$i]->obtener_utm_east(), $empresarios[$i]->obtener_utm_zone(), $empresarios[$i]->obtener_utm_hemisferio()
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios_filtrar;
    }

    public static function listar_empresarios_asesor_ejecutivo_filtrar($rut_asesor, $rut_ejecutivo, $conexion) {

        $empresarios = array();
        $empresarios_filtrar = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_asesor = :rut_asesor AND rut_ejecutivo = :rut_ejecutivo ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_asesor', $rut_asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':rut_ejecutivo', $rut_ejecutivo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'],
                                $fila['codigo_empresario'],
                                $fila['plan_negocio'],
                                $fila['descripcion'],
                                $fila['cofinanciamiento'],
                                $fila['aporte_empresarial'],
                                $fila['total'],
                                $fila['rut'],
                                $fila['nombre'],
                                $fila['apellido_paterno'],
                                $fila['apellido_materno'],
                                $fila['direccion_particular'],
                                $fila['comuna_direccion_particular'],
                                $fila['direccion'],
                                $fila['comuna'],
                                $fila['provincia'],
                                $fila['telefono'],
                                $fila['celular'],
                                $fila['email'],
                                $fila['rut_razon_social'],
                                $fila['razon_social'],
                                $fila['rut_representante'],
                                $fila['representante'],
                                $fila['persona_juridica'],
                                $fila['tipo_juridica'],
                                $fila['rut_evaluador'],
                                $fila['rut_asesor'],
                                $fila['rut_ejecutivo'],
                                $fila['estado'],
                                $fila['utm_north'],
                                $fila['utm_east'],
                                $fila['utm_zone'],
                                $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function listar_empresarios_codigo_bp_ejecutivo_filtrar($codigo_bp, $rut_ejecutivo, $conexion) {

        $empresarios = array();
        $empresarios_filtrar = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_ejecutivo = :rut_ejecutivo ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_ejecutivo', $rut_ejecutivo, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
                $longitud_empresarios = count($empresarios);
                for ($i = 0; $i < $longitud_empresarios; $i++) {
                    $id_codigo_empresario = $empresarios[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $id_codigo_bp = $array_id_codigo_empresario[0];
                    if ($codigo_bp == $id_codigo_bp) {
                        $empresarios_filtrar[] = new class_tabla_empresarios(
                                $empresarios[$i]->obtener_id(), $empresarios[$i]->obtener_codigo_empresario(), $empresarios[$i]->obtener_plan_negocio(), $empresarios[$i]->obtener_descripcion(), $empresarios[$i]->obtener_cofinanciamiento(), $empresarios[$i]->obtener_aporte_empresarial(), $empresarios[$i]->obtener_total(), $empresarios[$i]->obtener_rut(), $empresarios[$i]->obtener_nombre(), $empresarios[$i]->obtener_apellido_paterno(), $empresarios[$i]->obtener_apellido_materno(), $empresarios[$i]->obtener_direccion_particular(), $empresarios[$i]->obtener_comuna_direccion_particular(), $empresarios[$i]->obtener_direccion(), $empresarios[$i]->obtener_comuna(), $empresarios[$i]->obtener_provincia(), $empresarios[$i]->obtener_telefono(), $empresarios[$i]->obtener_celular(), $empresarios[$i]->obtener_email(), $empresarios[$i]->obtener_rut_razon_social(), $empresarios[$i]->obtener_razon_social(), $empresarios[$i]->obtener_rut_representante(), $empresarios[$i]->obtener_representante(), $empresarios[$i]->obtener_persona_juridica(), $empresarios[$i]->obtener_tipo_juridica(), $empresarios[$i]->obtener_rut_evaluador(), $empresarios[$i]->obtener_rut_asesor(), $empresarios[$i]->obtener_rut_ejecutivo(), $empresarios[$i]->obtener_estado(), $empresarios[$i]->obtener_utm_north(), $empresarios[$i]->obtener_utm_east(), $empresarios[$i]->obtener_utm_zone(), $empresarios[$i]->obtener_utm_hemisferio()
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios_filtrar;
    }

    public static function listar_empresarios_codigo_bp_asesor_todos_filtrar($codigo_bp, $rut_asesor, $conexion) {

        $empresarios = array();
        $empresarios_filtrar = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_asesor = :rut_asesor ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_asesor', $rut_asesor, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
                $longitud_empresarios = count($empresarios);
                for ($i = 0; $i < $longitud_empresarios; $i++) {
                    $id_codigo_empresario = $empresarios[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $id_codigo_bp = $array_id_codigo_empresario[0];
                    if ($codigo_bp == $id_codigo_bp) {
                        $empresarios_filtrar[] = new class_tabla_empresarios(
                                $empresarios[$i]->obtener_id(), $empresarios[$i]->obtener_codigo_empresario(), $empresarios[$i]->obtener_plan_negocio(), $empresarios[$i]->obtener_descripcion(), $empresarios[$i]->obtener_cofinanciamiento(), $empresarios[$i]->obtener_aporte_empresarial(), $empresarios[$i]->obtener_total(), $empresarios[$i]->obtener_rut(), $empresarios[$i]->obtener_nombre(), $empresarios[$i]->obtener_apellido_paterno(), $empresarios[$i]->obtener_apellido_materno(), $empresarios[$i]->obtener_direccion_particular(), $empresarios[$i]->obtener_comuna_direccion_particular(), $empresarios[$i]->obtener_direccion(), $empresarios[$i]->obtener_comuna(), $empresarios[$i]->obtener_provincia(), $empresarios[$i]->obtener_telefono(), $empresarios[$i]->obtener_celular(), $empresarios[$i]->obtener_email(), $empresarios[$i]->obtener_rut_razon_social(), $empresarios[$i]->obtener_razon_social(), $empresarios[$i]->obtener_rut_representante(), $empresarios[$i]->obtener_representante(), $empresarios[$i]->obtener_persona_juridica(), $empresarios[$i]->obtener_tipo_juridica(), $empresarios[$i]->obtener_rut_evaluador(), $empresarios[$i]->obtener_rut_asesor(), $empresarios[$i]->obtener_rut_ejecutivo(), $empresarios[$i]->obtener_estado(), $empresarios[$i]->obtener_utm_north(), $empresarios[$i]->obtener_utm_east(), $empresarios[$i]->obtener_utm_zone(), $empresarios[$i]->obtener_utm_hemisferio()
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios_filtrar;
    }

    public static function buscar_empresarios_rut_razon_social($rut_razon_social, $conexion) {
        $empresarios = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM empresarios WHERE rut_razon_social=:rut_razon_social";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_razon_social', $rut_razon_social, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $empresarios = new class_tabla_empresarios(
                            $resultado['id'], $resultado['codigo_empresario'], $resultado['plan_negocio'], $resultado['descripcion'], $resultado['cofinanciamiento'], $resultado['aporte_empresarial'], $resultado['total'], $resultado['rut'], $resultado['nombre'], $resultado['apellido_paterno'], $resultado['apellido_materno'], $resultado['direccion_particular'], $resultado['comuna_direccion_particular'], $resultado['direccion'], $resultado['comuna'], $resultado['provincia'], $resultado['telefono'], $resultado['celular'], $resultado['email'], $resultado['rut_razon_social'], $resultado['razon_social'], $resultado['rut_representante'], $resultado['representante'], $resultado['persona_juridica'], $resultado['tipo_juridica'], $resultado['rut_evaluador'], $resultado['rut_asesor'], $resultado['rut_ejecutivo'], $resultado['estado'], $resultado['utm_north'], $resultado['utm_east'], $resultado['utm_zone'], $resultado['utm_hemisferio']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $empresarios;
    }

    public static function listar_empresarios_asesor_activo_observado($rut_asesor, $conexion) {

        $empresarios = array();
        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM empresarios WHERE (rut_asesor =:rut_asesor) AND (estado =:estado1 OR estado =:estado2) ORDER BY apellido_paterno ASC";

                $estado1 = 'Activo';
                $estado2 = 'Observado';

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_asesor', $rut_asesor, PDO::PARAM_STR);
                $sentencia->bindParam(':estado1', $estado1, PDO::PARAM_STR);
                $sentencia->bindParam(':estado2', $estado2, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function listar_empresarios_rut_razon_social_activo($rut_razon_social, $conexion) {

        $empresarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE (rut_razon_social=:rut_razon_social) AND (estado=:estado1 OR estado=:estado2) ORDER BY apellido_paterno ASC";

                $estado1 = 'Activo';
                $estado2 = 'Cerrado';

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_razon_social', $rut_razon_social, PDO::PARAM_STR);
                $sentencia->bindParam(':estado1', $estado1, PDO::PARAM_STR);
                $sentencia->bindParam(':estado2', $estado2, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function listar_empresarios_activo($conexion) {

        $empresarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE estado=:estado ORDER BY apellido_paterno ASC";

                $estado = 'Activo';

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function listar_empresarios_rut_persona_razon_social($rut, $conexion) {

        $empresarios = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE (rut_razon_social=:rut OR rut=:rut) ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut', $rut, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios;
    }

    public static function listar_empresarios_codigo_bp_rut_razon_social($codigo_bp, $rut_razon_social, $conexion) {

        $empresarios = array();
        $empresarios_filtrar = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios WHERE rut_razon_social =:rut_razon_social ORDER BY apellido_paterno ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut_razon_social', $rut_razon_social, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
                $longitud_empresarios = count($empresarios);
                for ($i = 0; $i < $longitud_empresarios; $i++) {
                    $id_codigo_empresario = $empresarios[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $id_codigo_bp = $array_id_codigo_empresario[0];
                    if ($codigo_bp == $id_codigo_bp) {
                        $empresarios_filtrar[] = new class_tabla_empresarios(
                                $empresarios[$i]->obtener_id(), $empresarios[$i]->obtener_codigo_empresario(), $empresarios[$i]->obtener_plan_negocio(), $empresarios[$i]->obtener_descripcion(), $empresarios[$i]->obtener_cofinanciamiento(), $empresarios[$i]->obtener_aporte_empresarial(), $empresarios[$i]->obtener_total(), $empresarios[$i]->obtener_rut(), $empresarios[$i]->obtener_nombre(), $empresarios[$i]->obtener_apellido_paterno(), $empresarios[$i]->obtener_apellido_materno(), $empresarios[$i]->obtener_direccion_particular(), $empresarios[$i]->obtener_comuna_direccion_particular(), $empresarios[$i]->obtener_direccion(), $empresarios[$i]->obtener_comuna(), $empresarios[$i]->obtener_provincia(), $empresarios[$i]->obtener_telefono(), $empresarios[$i]->obtener_celular(), $empresarios[$i]->obtener_email(), $empresarios[$i]->obtener_rut_razon_social(), $empresarios[$i]->obtener_razon_social(), $empresarios[$i]->obtener_rut_representante(), $empresarios[$i]->obtener_representante(), $empresarios[$i]->obtener_persona_juridica(), $empresarios[$i]->obtener_tipo_juridica(), $empresarios[$i]->obtener_rut_evaluador(), $empresarios[$i]->obtener_rut_asesor(), $empresarios[$i]->obtener_rut_ejecutivo(), $empresarios[$i]->obtener_estado(), $empresarios[$i]->obtener_utm_north(), $empresarios[$i]->obtener_utm_east(), $empresarios[$i]->obtener_utm_zone(), $empresarios[$i]->obtener_utm_hemisferio()
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios_filtrar;
    }

    public static function listar_empresarios_codigo_bp_activo($conexion) {

        $empresarios = array();
        $empresarios_filtrar = array();

        if (isset($conexion)) {

            try {

                $sql = "SELECT * FROM empresarios ORDER BY apellido_paterno, apellido_materno, nombre ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $empresarios[] = new class_tabla_empresarios(
                                $fila['id'], $fila['codigo_empresario'], $fila['plan_negocio'], $fila['descripcion'], $fila['cofinanciamiento'], $fila['aporte_empresarial'], $fila['total'], $fila['rut'], $fila['nombre'], $fila['apellido_paterno'], $fila['apellido_materno'], $fila['direccion_particular'], $fila['comuna_direccion_particular'], $fila['direccion'], $fila['comuna'], $fila['provincia'], $fila['telefono'], $fila['celular'], $fila['email'], $fila['rut_razon_social'], $fila['razon_social'], $fila['rut_representante'], $fila['representante'], $fila['persona_juridica'], $fila['tipo_juridica'], $fila['rut_evaluador'], $fila['rut_asesor'], $fila['rut_ejecutivo'], $fila['estado'], $fila['utm_north'], $fila['utm_east'], $fila['utm_zone'], $fila['utm_hemisferio']
                        );
                    }
                }
                $longitud_empresarios = count($empresarios);
                for ($i = 0; $i < $longitud_empresarios; $i++) {
                    $id_codigo_empresario = $empresarios[$i]->obtener_codigo_empresario();
                    $array_id_codigo_empresario = array();
                    $array_id_codigo_empresario = explode("-", $id_codigo_empresario);
                    $codigo_bp = $array_id_codigo_empresario[0];

                    $proyectos = class_operar_proyectos::buscar_proyectos_codigo_bp($codigo_bp, $conexion);
                    $activo = $proyectos->obtener_estado();
                    
                    if ($activo == "Activo") {
                        $empresarios_filtrar[] = new class_tabla_empresarios(
                                $empresarios[$i]->obtener_id(), $empresarios[$i]->obtener_codigo_empresario(), $empresarios[$i]->obtener_plan_negocio(), $empresarios[$i]->obtener_descripcion(), $empresarios[$i]->obtener_cofinanciamiento(), $empresarios[$i]->obtener_aporte_empresarial(), $empresarios[$i]->obtener_total(), $empresarios[$i]->obtener_rut(), $empresarios[$i]->obtener_nombre(), $empresarios[$i]->obtener_apellido_paterno(), $empresarios[$i]->obtener_apellido_materno(), $empresarios[$i]->obtener_direccion_particular(), $empresarios[$i]->obtener_comuna_direccion_particular(), $empresarios[$i]->obtener_direccion(), $empresarios[$i]->obtener_comuna(), $empresarios[$i]->obtener_provincia(), $empresarios[$i]->obtener_telefono(), $empresarios[$i]->obtener_celular(), $empresarios[$i]->obtener_email(), $empresarios[$i]->obtener_rut_razon_social(), $empresarios[$i]->obtener_razon_social(), $empresarios[$i]->obtener_rut_representante(), $empresarios[$i]->obtener_representante(), $empresarios[$i]->obtener_persona_juridica(), $empresarios[$i]->obtener_tipo_juridica(), $empresarios[$i]->obtener_rut_evaluador(), $empresarios[$i]->obtener_rut_asesor(), $empresarios[$i]->obtener_rut_ejecutivo(), $empresarios[$i]->obtener_estado(), $empresarios[$i]->obtener_utm_north(), $empresarios[$i]->obtener_utm_east(), $empresarios[$i]->obtener_utm_zone(), $empresarios[$i]->obtener_utm_hemisferio()
                        );
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $empresarios_filtrar;
    }

}

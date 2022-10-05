<?php


include '../db/entrepeneur/entrepeneur_handler.php';
include '../db/projects/project_handler.php';
include '../db/user/user_handler.php';
include '../db/formalization/formalization_handler.php';
include '../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../sys/db_config.php';
include '../db/formalization/types/tipo_formalizacion_handler.php';
include '../db/projects/rendiciones/archivos/archivos_handler.php';
include '../arch_val/arch_val.php';

conexion::abrir_conexion();



$rut_empresario = $_GET['rut_empresario'];

$rut_empresario_real = base64_decode($rut_empresario);

$empresarios = class_operar_empresarios::buscar_empresarios_rut($rut_empresario_real, conexion::obtener_conexion());
$formalizacion = class_operar_formalizacion::listar_formalizacion_codigo_empresario($empresarios->obtener_codigo_empresario(), conexion::obtener_conexion());
$codigo_bp = explode('-', $empresarios->obtener_codigo_empresario())[0];
$proyecto = class_operar_proyectos::buscar_proyectos_codigo_bp($codigo_bp, conexion::obtener_conexion());
$tipos_formalizacion = class_operar_tipo_formalizacion::listar_tipo_formalizacion(conexion::obtener_conexion());



$c = 0;
foreach ($_FILES["archivos"]['tmp_name'] as $key => $tmp_name) {
    
    $c = $c + 1;
    $fname = array();
    $fname = explode(".", $_FILES['archivos']['name'][$key]);
    $extension_archivo = end($fname);
    $nombre_archivo = str_replace('.' . $extension_archivo, '', $_FILES['archivos']['name'][$key]);
    $extension_archivo = strtolower($extension_archivo);

    $error_subir = 0;
    $error_txt = '';

    if ($_FILES['archivos']["error"][$key] > 0) {
        $error_subir = $error_subir + 1;
        $error_txt = 'Error de lectura';
    }
    if ($_FILES['archivos']["size"][$key] > 15000000) {
        $error_subir = $error_subir + 1;
        $error_txt = 'Archivo mayor a 15 MB';
    }

    if (tipo_ext($extension_archivo) !== "Imagen") {
        $error_subir = $error_subir + 1;
        $error_txt = 'No es un archivo imagen';
    }

    if ($error_subir > 0) {
        $error = '<img src=' . '"imgx/122.png"' . 'height=15px width=15px>';
        $error_info = '&nbsp;&nbsp;<img src=' . '"imgx/067.png"' . 'height=15px width=15px data-toggle="tooltip" data-placement="right" title="' . $error_txt . '">';
    } else {
        $error_info = '';
        $codigo_archivo = chr(rand(65, 90)) . rand(1, 9) . chr(rand(65, 90)) . rand(1, 9) . chr(rand(65, 90)) . rand(1, 9) . chr(rand(65, 90)) . rand(1, 9);
        $archivo_nuevo = $empresarios->obtener_rut_razon_social() . '_' . $codigo_bp . '_' . $codigo_archivo;
        $ruta = $codigo_bp . '/' . $empresarios->obtener_rut_razon_social();
        $eta_ejecucion = $_POST['eta-ejecucion'];
        $grupo = 'fot-'.$eta_ejecucion;
        $descripcion = tipo_arc($grupo);
        $tipo_archivo = tipo_ext($extension_archivo);
        $fecha = date("Y-m-d");
        $asignacion = '-----';
        $sigla = tipo_doc($descripcion);
        $archivo_nuevo = $archivo_nuevo . '_' . $sigla;

        if (!file_exists('cdx/' . $codigo_bp)) {
            mkdir('cdx/' . $codigo_bp, 0777);
        }
        if (!file_exists('cdx/' . $codigo_bp . '/' . $empresarios->obtener_rut_razon_social())) {
            mkdir('cdx/' . $codigo_bp . '/' . $empresarios->obtener_rut_razon_social(), 0777);
        }

        conexion::abrir_conexion();

        $archivos = new class_tabla_archivos('', $empresarios -> obtener_codigo_empresario(), $archivo_nuevo, $extension_archivo, $ruta, $descripcion, $tipo_archivo, $fecha, $asignacion, $grupo);
        $archivos_insertado = class_operar_archivos::insertar_archivos($archivos, conexion::obtener_conexion());
        move_uploaded_file($_FILES['archivos']['tmp_name'][$key], 'cdx/' . $ruta . '/' . $_FILES['archivos']['name'][$key]);
        rename('cdx/' . $ruta . '/' . $_FILES['archivos']['name'][$key], 'cdx/' . $ruta . '/' . $archivo_nuevo . '.' . $extension_archivo);
        conexion::cerrar_conexion();
        $error = '<img src=' . '"imgx/123.png"' . 'height=15px width=15px>';
    }
    echo '<div class="col-md-4">' . $error . '&nbsp;&nbsp;' . $nombre_archivo . '.' . $extension_archivo . $error_info . '</div>';
    
}
header('Refresh:1;url=../pages/user_interfaces/empresario/menu/subirfotos.php?rut_empresario='.$rut_empresario);
?>
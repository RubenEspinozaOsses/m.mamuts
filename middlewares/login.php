<?php
include '../sys/db_config.php';
include '../var_val/login_val.php';
include '../db/user/user_handler.php';
include '../sys/db_variables.php';
include '../sys/control_sesion.php';



conexion::abrir_conexion();

$rut = $_POST['rut'];
$password = $_POST['password'];

$login_valido = false;
$error = '';

if (preg_match("/[0-9]{7,8}[-]{0,1}[0-9Kk]{1}/", $rut)
|| preg_match("/[0-9]{1,2}.[0-9]{3}.[0-9]{3}-[0-9Kk]{1}/", $rut)) {
    $validador = new login_val($rut, $password);
    $login_valido = $validador->login_valido();
}else {
    $error = 'Rut invalido';
}


if (!$login_valido) {
    header("refresh:1;url=../pages/login.php");
    echo "<center><span>$error, intente nuevamente</span></center>";
} else {
    $password = '';
    
    $rut = str_replace(".", "", $rut);
    $usuario = class_operar_usuarios::buscar_usuarios_rut($rut, conexion::obtener_conexion());
    $user_id = $usuario->obtener_id();

    control_sesion::iniciar_sesion(
        $usuario->obtener_id(),
        $usuario->obtener_nombre(),
        $usuario->obtener_apellido_paterno(),
        $usuario->obtener_apellido_materno(),
        $usuario->obtener_rut(),
        $usuario->obtener_acceso(),
        tiempo_sesion
    );



    header('Refresh:2;url=../pages/user_interfaces/seleccionar_empresario.php');
}

conexion::cerrar_conexion();

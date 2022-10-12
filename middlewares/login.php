<?php
include '../sys/db_config.php';
include '../var_val/login_val.php';
include '../db/user/user_handler.php';
include '../sys/db_variables.php';
include '../sys/control_sesion.php';



conexion::abrir_conexion();

$rut = $_POST['rut'];
$password = $_POST['password'];


$validador = new login_val($rut, $password);

$login_valido = $validador -> login_valido();
//echo "<script type='text/javascript'>alert('$login_valido');</script>";


if (!$login_valido) {
    header("refresh:1;url=../pages/login.php");
    echo "<script type='text/javascript'>alert('Hubo un problema con su login1, intente nuevamente');</script>";

    
} else {
    $password = '';

    $usuario = class_operar_usuarios::buscar_usuarios_rut($rut, conexion::obtener_conexion());
    $user_id = $usuario -> obtener_id();

    echo "$user_id -> Es la id";
    control_sesion::iniciar_sesion(
        $usuario->obtener_id(),
        $usuario->obtener_nombre(),
        $usuario->obtener_apellido_paterno(),
        $usuario->obtener_apellido_materno(),
        $usuario->obtener_rut(),
        $usuario->obtener_acceso(),
        tiempo_sesion);

    session_start();
    echo "<br>";
    echo $_SESSION['id_usuario_m'] . " -> es la id de la sesion";

    header('Refresh:4;url=../pages/user_interfaces/seleccionar_empresario.php');

    
}

conexion::cerrar_conexion();

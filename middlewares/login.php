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


if (!$login_valido) {
    header("refresh:3;url=../pages/login.php");
    echo "<script type='text/javascript'>alert('Hubo un problema con su login1, intente nuevamente');</script>";

    
} else {
    $password = '';

    $usuario = class_operar_usuarios::buscar_usuarios_rut($rut, conexion::obtener_conexion());
    $user_id = $usuario -> obtener_id();
    //echo "<script type='text/javascript'>alert('$user_id')</script>";


    control_sesion::iniciar_sesion($usuario->obtener_id(), $usuario->obtener_nombre(), $usuario->obtener_apellido_paterno(), $usuario->obtener_apellido_materno(), $usuario->obtener_rut(), $usuario->obtener_acceso(), tiempo_sesion);

    header('Refresh:3;url=../pages/user_interfaces/seleccionar_empresario.php');

    
}

conexion::cerrar_conexion();

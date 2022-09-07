<?php
include_once '../sys/db_config.php';
include_once '../var_val/login_val.php';
include_once '../db/user/user_handler.php';
include_once '../sys/db_variables.php';



$conexion = conexion::abrir_conexion();

$rut = $_POST['rut'];
$password = $_POST['password'];


$validador = new login_val($rut, $password);

if (!$validador->login_valido()) {
    header("refresh:1;url=../pages/login.php");
    echo "<script type='text/javascript'>alert('Hubo un problema con su login, intente nuevamente');</script>";

    
} else {
    $password = '';

    $usuario = class_operar_usuarios::buscar_usuarios_rut($rut, $conexion);

    control_sesion::iniciar_sesion($usuario->obtener_id(), $usuario->obtener_nombre(), $usuario->obtener_apellido_paterno(), $usuario->obtener_apellido_materno(), $usuario->obtener_rut(), $usuario->obtener_acceso(), tiempo_sesion);

    header('Location:' . '../pages/user_interfaces/seleccionar_empresario.php');

    
}

conexion::cerrar_conexion();
?>
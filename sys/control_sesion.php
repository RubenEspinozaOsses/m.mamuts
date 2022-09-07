<?php

class control_sesion {

    public static function iniciar_sesion($id_usuario, $nombre_usuario, $apellido_paterno_usuario, $apellido_materno_usuario, $rut_usuario, $acceso_usuario, $tiempo_sesion) {
        if (session_id() == '') {
            session_start();
        }

        $_SESSION['id_usuario'] = $id_usuario;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['apellido_paterno_usuario'] = $apellido_paterno_usuario;
        $_SESSION['apellido_materno_usuario'] = $apellido_materno_usuario;
        $_SESSION['rut_usuario'] = $rut_usuario;
        $_SESSION['acceso_usuario'] = $acceso_usuario;
        $_SESSION['tiempo'] = time();

        setcookie(session_name(), session_id(), time() + $tiempo_sesion);
    }

    public static function cerrar_sesion() {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['id_usuario'])) {
            unset($_SESSION['id_usuario']);
        }

        if (isset($_SESSION['nombre_usuario'])) {
            unset($_SESSION['nombre_usuario']);
        }

        if (isset($_SESSION['apellido_paterno_usuario'])) {
            unset($_SESSION['apellido_paterno_usuario']);
        }

        if (isset($_SESSION['apellido_materno_usuario'])) {
            unset($_SESSION['apellido_materno_usuario']);
        }
        if (isset($_SESSION['rut_usuario'])) {
            unset($_SESSION['rut_usuario']);
        }
        if (isset($_SESSION['acceso_usuario'])) {
            unset($_SESSION['acceso_usuario']);
        }
        session_destroy();
    }

    public static function sesion_iniciada() {
        if (session_id() == '') {
            session_start();
        }
        if (isset($_SESSION['id_usuario']) && isset($_SESSION['nombre_usuario']) && isset($_SESSION['apellido_paterno_usuario']) && isset($_SESSION['apellido_materno_usuario']) && isset($_SESSION['rut_usuario']) && isset($_SESSION['acceso_usuario'])) {
            return true;
        } else {
            return false;
        }
    }

}
?>
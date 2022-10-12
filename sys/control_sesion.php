<?php

class control_sesion {

    public static function iniciar_sesion(
        $id_usuario,
        $nombre_usuario,
        $apellido_paterno_usuario,
        $apellido_materno_usuario,
        $rut_usuario, $acceso_usuario,
        $tiempo_sesion) {
        if (session_id() == '') {
            session_start();
        }

        $_SESSION['id_usuario_m'] = $id_usuario;
        $_SESSION['nombre_usuario_m'] = $nombre_usuario;
        $_SESSION['apellido_paterno_usuario_m'] = $apellido_paterno_usuario;
        $_SESSION['apellido_materno_usuario_m'] = $apellido_materno_usuario;
        $_SESSION['rut_usuario_m'] = $rut_usuario;
        $_SESSION['acceso_usuario_m'] = $acceso_usuario;
        $_SESSION['tiempo_m'] = time();

        setcookie(session_name(), session_id(), time() + $tiempo_sesion);

        
    }

    public static function cerrar_sesion() {
        if (session_id() == '') {
            session_start();
        }

        if (isset($_SESSION['id_usuario_m'])) {
            unset($_SESSION['id_usuario_m']);
        }

        if (isset($_SESSION['nombre_usuario_m'])) {
            unset($_SESSION['nombre_usuario_m']);
        }

        if (isset($_SESSION['apellido_paterno_usuario_m'])) {
            unset($_SESSION['apellido_paterno_usuario_m']);
        }

        if (isset($_SESSION['apellido_materno_usuario_m'])) {
            unset($_SESSION['apellido_materno_usuario_m']);
        }
        if (isset($_SESSION['rut_usuario_m'])) {
            unset($_SESSION['rut_usuario_m']);
        }
        if (isset($_SESSION['acceso_usuario_m'])) {
            unset($_SESSION['acceso_usuario_m']);
        }
        session_destroy();
    }

    public static function sesion_iniciada() {
        if (session_id() == '') {
            session_start();
        }
        if (isset($_SESSION['id_usuario_m']) && isset($_SESSION['nombre_usuario_m']) && isset($_SESSION['apellido_paterno_usuario_m']) && isset($_SESSION['apellido_materno_usuario_m']) && isset($_SESSION['rut_usuario_m']) && isset($_SESSION['acceso_usuario_m'])) {
            return true;
        } else {
            return false;
        }
    }

}
?>
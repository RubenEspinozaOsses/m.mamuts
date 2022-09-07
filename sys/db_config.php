<?php

class conexion {

    private static $conexion;

    public static function abrir_conexion() {
        if (!isset(self::$conexion)) {
            try {
                //echo 'Conexion Correcta';
                include_once 'db_variables.php';
                self::$conexion = new PDO('mysql:host=' . NOMBRE_SERVIDOR . ';dbname=' . NOMBRE_BASE_DATOS, NOMBRE_USUARIO, PASSWORD);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec("SET CHARACTER SET utf8");
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die("Error de Conexión");
            }
        }
    }

    public static function cerrar_conexion() {
        if (isset(self::$conexion)) {
            //echo 'Conexión Cerrada';
            self::$conexion = null;
        }
    }

    public static function obtener_conexion() {
        //echo 'Conexión Iniciada';
        return self::$conexion;
    }

}
?>
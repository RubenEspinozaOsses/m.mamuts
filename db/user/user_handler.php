<?php

include 'user_tbl_organizer.php';

class class_operar_usuarios {

    

    public static function existe_rut($rut, $conexion) {
        $rut_existente = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarios WHERE rut=:rut";

                

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':rut', $rut, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();


                if (count($resultado)) {
                    $rut_existente = true;
                } else {
                    $rut_existente = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $rut_existente;
    }

    public static function existe_usuarios_rut($rut, $conexion) {
        $usuarios = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM usuarios WHERE rut = :rut";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut', $rut, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuarios = new user_tbl_organizer(
                            $resultado['id'], $resultado['nombre'], $resultado['apellido_paterno'], $resultado['apellido_materno'], $resultado['rut'], $resultado['email'], $resultado['celular'], $resultado['password'], $resultado['fecha_registro'],$resultado['activo'],$resultado['acceso']);
                }
            } catch (PDOException $ex) {
                echo 'ERROR' . $ex->getMessage();
            }
        }
        return $usuarios;
    }

    

    public static function buscar_usuarios_id($id, $conexion) {
        $usuarios = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM usuarios WHERE id = :id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuarios = new user_tbl_organizer(
                            $resultado['id'], $resultado['nombre'], $resultado['apellido_paterno'], $resultado['apellido_materno'], $resultado['rut'], $resultado['email'], $resultado['celular'], $resultado['password'], $resultado['fecha_registro'], $resultado['activo'], $resultado['acceso']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuarios;
    }

    
    
    public static function buscar_usuarios_rut($rut, $conexion) {
        $usuarios = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM usuarios WHERE rut = :rut";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':rut', $rut, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    //echo "<script type='text/javascript'>alert('Se encontro su usuario');</script>";
                    $usuarios = new user_tbl_organizer(
                            $resultado['id'], $resultado['nombre'], $resultado['apellido_paterno'], $resultado['apellido_materno'], $resultado['rut'], $resultado['email'],$resultado['celular'], $resultado['password'], $resultado['fecha_registro'],$resultado['activo'],$resultado['acceso']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuarios;
    }

}
?>
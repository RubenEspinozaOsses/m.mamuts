<?php

class login_val {

    private $rut;
    private $msg_rut;
    private $msg_password;

    public function __construct($rut, $password) {
        $this->rut = "";
        $this->msg_rut = $this->validar_rut($rut, $password);
        $this->msg_password = $this->validar_password($password);
    }

    private function variable_iniciada($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_rut($rut, $password) {
        if (!$this->variable_iniciada($rut)) {
            return "Ingrese un usuario válido";
        }
        if (!$this->valida_caracteres($rut)) {
            return "Ingrese un usuario válido";
        }
        if (!$this->valida_rut($rut)) {
            return "Ingrese un usuario válido";
        } else {
            $rut = preg_replace('/[.-]/i', '', $rut);
            $dv = strtoupper(substr($rut, -1));
            $numero = substr($rut, 0, strlen($rut) - 1);
            $rut = $numero . '-' . $dv;
            $usuario = class_operar_usuarios::existe_usuarios_rut($rut, conexion::obtener_conexion());
            if ((is_null($usuario)) || !password_verify($password, $usuario->obtener_password())) {
                return "Ingrese un usuario válido";
            } else {
                if ($usuario->obtener_activo() == "0") {
                    return "Usuario Suspendido";
                }
            }
            $this->rut = $rut;
        }
        return "";
    }

    private function validar_password($password) {
        if (!$this->variable_iniciada($password)) {
            return "Ingrese una contraseña válida";
        } else {
            $this->password = $password;
        }
        return "";
    }

    public function login_valido() {
        if ($this->msg_rut === "" && $this->msg_password === "") {
            return true;
        } else {
            return false;
        }
    }

    public function obtener_rut() {
        return $this->rut;
    }

    public function obtener_msg_rut() {
        return $this->msg_rut;
    }

    public function obtener_msg_password() {
        return $this->msg_password;
    }

//----
    function valida_rut($rut) {
        $rut = preg_replace('/[.-]/i', '', $rut);
        $dv = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11)
            $dvr = 0;
        if ($dvr == 10)
            $dvr = 'K';
        if ($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }

    function valida_caracteres($rut) {
        $permitidos = "kK0123456789-.";
        for ($i = 0; $i < strlen($rut); $i++) {
            if (strpos($permitidos, substr($rut, $i, 1)) === false) {
                return false;
            }
        }
        return true;
    }

}
?>
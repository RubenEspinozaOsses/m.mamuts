<?php
    include '../sys/control_sesion.php';
    control_sesion::cerrar_sesion();
    header("refresh:1;url=../pages/login.php");
?>

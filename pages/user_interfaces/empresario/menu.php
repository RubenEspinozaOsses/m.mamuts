<?php
include '../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../db/projects/project_handler.php';
include '../../../db/user/user_handler.php';
include '../../../db/formalization/formalization_handler.php';
include '../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../sys/db_config.php';

conexion::abrir_conexion();

session_start();
if (!isset($_SESSION['id_usuario_m'])) {

  conexion::cerrar_conexion();
  control_sesion::cerrar_sesion();

  echo "Inicie sesion nuevamente";
  header("refresh:1;url=../../login.php");
}



$rut_empresario = $_GET['rut_empresario'];

$rut_empresario_real = base64_decode($rut_empresario);

$empresario = class_operar_empresarios::buscar_empresarios_rut($rut_empresario_real, conexion::obtener_conexion());


?>



<!doctype html>
<html lang="en">

<head>
    <title><?php echo $empresario->obtener_nombre() ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/menu/style.css">
</head>

<body style="color: #170963;">

    <nav class="navbar">
        <div class="container-fluid">

            <a href="../seleccionar_empresario.php" class="card navbar-left">
                <img src="../../../img/back.png" alt="" class="navbar-button">

            </a>
            <?php session_start() ?>
            <div class="d-flex-3 me-3" style="color: white;">
                <span><?php echo $_SESSION['nombre_usuario_m']
                            . " " . $_SESSION['apellido_paterno_usuario_m']
                            . " " . $_SESSION['apellido_materno_usuario_m'] ?></span>
                <span>
                    <button class="btn"
                    data-bs-toggle="collapse"
                    data-bs-target="#opciones_usuario"
                    aria-expanded="false" aria-controls="opciones_usuario">
                        <img src="../../../img/user.png" alt="User" width="30px" height="30px">
                    </button>

                </span>
                <div class="collapse" id="opciones_usuario">
                    <span>
                        <a href="../../../middlewares/logout.php" style="color: white;">
                            Cerrar Sesion
                        </a>
                    </span>
                </div>
            </div>
        </div>

    </nav>

    <h1 class="text-center title">
        <?php
        $n = $empresario->obtener_nombre();
        $ap = $empresario->obtener_apellido_paterno();
        $am = $empresario->obtener_apellido_materno();

        echo "$n $ap $am";
        ?>
    </h1>

    <div class="container justify-content-sm-center">

        <div class="row">
            <div class="col">
                <div class="card border-white">
                    <a href="./menu/antecedentes.php?rut_empresario=<?php echo $rut_empresario ?>" class="menu-button">
                        <img src="../../../img/antecedentes.png" alt="Antecedentes" class="menu-icon"><br>
                        <h6>Antecedentes</h6>
                    </a>

                </div>
            </div>
            <div class="col">
                <div class="card border-white">
                    <a href="./menu/presupuesto.php?rut_empresario=<?php echo $rut_empresario ?>" class="menu-button">
                        <img src="../../../img/presupuesto.png" alt="Presupuesto" class="menu-icon"><br>
                        <h6>Presupuesto</h6>
                    </a>
                </div>
            </div>
        </div>

        <hr style="color: white;" />

        <div class="row">
            <div class="col">
                <div class="card border-white">
                    <a href="./menu/rendiciones.php?rut_empresario=<?php echo $rut_empresario ?>" class="menu-button">
                        <img src="../../../img/rendiciones.png" alt="Rendiciones" class="menu-icon"><br>
                        <h6>Rendiciones</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card border-white">
                    <a href="./menu/subirfotos.php?rut_empresario=<?php echo $rut_empresario ?>" class="menu-button">
                        <img src="../../../img/subirfoto.png" alt="Subir Fotos" class="menu-icon"><br>
                        <h6>Subir Fotos</h6>
                    </a>
                </div>
            </div>
        </div>

        <hr style="color: white;" />

        <div class="row">
            <div class="col">
                <div class="card border-white">
                    <a href="./menu/archivos.php?rut_empresario=<?php echo $rut_empresario ?>" class="menu-button">
                        <img src="../../../img/archivos.png" alt="Archivos" class="menu-icon"><br>
                        <h6>Archivos</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="transparent-element">

                </div>
            </div>
        </div>

    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>
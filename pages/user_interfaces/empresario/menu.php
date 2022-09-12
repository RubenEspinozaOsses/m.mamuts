<?php
include '../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../db/projects/project_handler.php';
include '../../../db/user/user_handler.php';
include '../../../db/formalization/formalization_handler.php';
include '../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../sys/db_config.php';

conexion::abrir_conexion();

$empresario = class_operar_empresarios::buscar_empresarios_rut(base64_decode($_GET['rut_empresario']), conexion::obtener_conexion());


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
                <img src="../../../img/mamuts1.png" alt="" width="30" height="30" background-color="black">

            </a>
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
                    <a href="" class="menu-button">
                        <img src="../../../img/mamuts1.png" alt="Antecedentes">
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card border-white">
                    <a href="" class="menu-button">
                        <img src="../../../img/mamuts1.png" alt="Antecedentes">
                    </a>
                </div>
            </div>
        </div>

        <hr style="color: white;" />

        <div class="row">
            <div class="col">
                <div class="card border-white">
                    <a href="" class="menu-button">
                        <img src="../../../img/mamuts1.png" alt="Antecedentes">
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card border-white">
                    <a href="" class="menu-button">
                        <img src="../../../img/mamuts1.png" alt="Antecedentes">
                    </a>
                </div>
            </div>
        </div>

        <hr style="color: white;" />

        <div class="row">
            <div class="col">
                <div class="card border-white">
                    <a href="" class="menu-button">
                        <img src="../../../img/mamuts1.png" alt="Antecedentes">
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card border-white">
                    <a href="" class="menu-button">
                        <img src="../../../img/mamuts1.png" alt="Antecedentes">
                    </a>
                </div>
            </div>
        </div>

    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>
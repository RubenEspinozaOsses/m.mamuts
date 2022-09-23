<?php
include '../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../db/projects/project_handler.php';
include '../../../db/user/user_handler.php';
include '../../../db/formalization/formalization_handler.php';
include '../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../sys/db_config.php';

conexion::abrir_conexion();



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
                <img src="../../../img/mamuts1.png" alt="" class="navbar-button">

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
                    <a href="./menu/antecedentes.php?rut_empresario=<?php echo $rut_empresario ?>" class="menu-button">
                        <img src="../../../img/mamuts1.png" alt="Antecedentes"><br>
                        <h6>Antecedentes</h6>
                    </a>
                    
                </div>
            </div>
            <div class="col">
                <div class="card border-white">
                    <a href="./menu/presupuesto.php?rut_empresario=<?php echo $rut_empresario ?>" class="menu-button">
                        <img src="../../../img/mamuts1.png" alt="Presupuesto"><br>
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
                        <img src="../../../img/mamuts1.png" alt="Rendiciones"><br>
                        <h6>Rendiciones</h6>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card border-white">
                    <a href="./menu/subirfotos.php?rut_empresario=<?php echo $rut_empresario ?>" class="menu-button">
                        <img src="../../../img/mamuts1.png" alt="Subir Fotos"><br>
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
                        <img src="../../../img/mamuts1.png" alt="Archivos"><br>
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
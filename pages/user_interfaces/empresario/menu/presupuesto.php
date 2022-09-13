<?php
include '../../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../../db/projects/project_handler.php';
include '../../../../db/user/user_handler.php';
include '../../../../db/formalization/formalization_handler.php';
include '../../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../../sys/db_config.php';

conexion::abrir_conexion();



$rut_empresario = $_GET['rut_empresario'];

$rut_empresario_real = base64_decode($rut_empresario);

$empresario = class_operar_empresarios::buscar_empresarios_rut($rut_empresario_real, conexion::obtener_conexion());
$pre_empresarios = null; //class_operar_presupuestos::buscar_presupuestos_rut();



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
    <link rel="stylesheet" href="../../../../css/presupuesto/style.css">
</head>

<body style="color: #170963;">

    <nav class="navbar">
        <div class="container-fluid">

            <a href="../menu.php?rut_empresario=<?php echo $_GET['rut_empresario'] ?>" class="card navbar-left">
                <img src="../../../../img/mamuts1.png" alt="" width="30" height="30" background-color="black">

            </a>
        </div>
    </nav>

    <h1 class="title">

    </h1>

    <div class="container justify-content-sm">

        <?php
        $sercotec_total = 0;
        $aporte_total = 0;
        $total_resultante = 0;

        foreach ($pre_empresarios as $presupuesto) {
        ?>
            <h3 class="title">
                <?php
                echo $presupuesto->obtener_nombre_item();
                ?>
            </h3>
            <div class="card">
                <div class="row">
                    <div class="col no-right">
                        <div class="card card-left">
                            <div class="card-title text-center">

                                <h6>Sercotec</h6>

                            </div>
                            <hr>
                            <div class="card-body">
                                <?php
                                $sercotec_total += $presupuesto->obtener_sercotec();
                                echo $presupuesto->obtener_sercotec();
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col no-both">
                        <div class="card card-middle">
                            <div class="card-title text-center">

                                <h6>Aporte</h6>

                            </div>
                            <hr>
                            <div class="card-body">

                                <?php
                                $aporte_total += $presupuesto->obtener_aporte();
                                echo $presupuesto->obtener_aporte();
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="col no-left">
                        <div class="card card-right">
                            <div class="card-title text-center">

                                <h6>Total</h6>

                            </div>
                            <hr>
                            <div class="card-body">
                                <?php
                                $total_resultante += $presupuesto->obtener_total();
                                echo $presupuesto->obtener_total();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr class="border-white">


        <?php
        }

        ?>
        <hr class="border-white">

        <h3 class="title text-center">
            Total
        </h3>

        <div class="card">
            <div class="row">
                <div class="col no-right">
                    <div class="card card-left">
                        <div class="card-title text-center">

                            <h6>Sercotec</h6>

                        </div>
                        <hr>
                        <div class="card-body">
                            <p class="text-center">
                                <?php
                                echo $sercotec_total;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col no-both">
                    <div class="card card-middle">
                        <div class="card-title text-center">

                            <h6>Aporte</h6>

                        </div>
                        <hr>
                        <div class="card-body">

                            <p class="text-center">
                                <?php
                                echo $aporte_total;
                                ?>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col no-left">
                    <div class="card card-right">
                        <div class="card-title text-center">

                            <h6>Total</h6>

                        </div>
                        <hr>
                        <div class="card-body">
                            <p class="text-center">
                                <?php
                                echo $total_resultante;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>
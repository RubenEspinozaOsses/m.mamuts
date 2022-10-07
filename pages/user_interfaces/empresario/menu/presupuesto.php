<?php
include '../../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../../db/projects/project_handler.php';
include '../../../../db/user/user_handler.php';
include '../../../../db/formalization/formalization_handler.php';
include '../../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../../db/projects/presupuestos/presupuesto_op_handler.php';
include '../../../../db/projects/presupuestos/item/item_proyectos_op_handler.php';
include '../../../../sys/db_config.php';

conexion::abrir_conexion();



$rut_empresario = $_GET['rut_empresario'];

$rut_empresario_real = base64_decode($rut_empresario);

$empresario = class_operar_empresarios::buscar_empresarios_rut($rut_empresario_real, conexion::obtener_conexion());
$pre_empresarios = class_operar_presupuestos::listar_presupuestos_empresario($empresario->obtener_codigo_empresario(), conexion::obtener_conexion());
$codigo_bp = explode('-', $empresario->obtener_codigo_empresario())[0];
$subitems_e = class_operar_item_proyectos::listar_item_proyectos_codigo_bp($codigo_bp, conexion::obtener_conexion());


?>

<!doctype html>
<html lang="en">

<head>
    <title><?php echo $empresario->obtener_nombre() ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
    crossorigin="anonymous">
    
    <link
    rel="stylesheet"
    href="../../../../css/presupuesto/style.css">
</head>

<body style="color: #170963;">

    <nav class="navbar">
        <div class="container-fluid">

            <a href="../menu.php?rut_empresario=<?php echo $_GET['rut_empresario'] ?>" class="card navbar-left">
                <img src="../../../../img/back.png" alt="" class="navbar-button">

            </a>
        </div>
    </nav>

    <h1 class="title">

    </h1>

    <div class="container justify-content-sm-center">

        <?php
        $sercotec_total = 0;
        $aporte_total = 0;
        $total_resultante = 0;


        $i = 0;
        foreach ($pre_empresarios as $presupuesto) {
            if ($presupuesto->obtener_cofinanciamiento_fin() > 0
            || $presupuesto->obtener_aporte_empresarial_fin() > 0
            || $presupuesto->obtener_total_fin() > 0) {


        ?>

                <h5 class="title text-center">
                    <?php
                    echo $subitems_e[$i]->obtener_subitem();

                    ?>
                </h5>
                <div class="card card-presupuesto">
                    <div class="row">
                        <div class="col no-right">
                            <div class="card card-left">
                                <div class="card-title text-center align-middle">

                                    <h6>Sercotec</h6>

                                </div>
                                <hr class="mc-divider">
                                <div class="card-body">
                                    <h3 class="text-center align-middle">
                                        <?php
                                        $sercotec_total += $presupuesto->obtener_cofinanciamiento_fin();
                                        echo $presupuesto->obtener_cofinanciamiento_fin();
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col no-both">
                            <div class="card card-middle">
                                <div class="card-title text-center align-middle">

                                    <h6>Aporte</h6>

                                </div>
                                <hr class="mc-divider">
                                <div class="card-body">
                                    <h3 class="text-center">
                                        <?php
                                        $aporte_total += $presupuesto->obtener_aporte_empresarial_fin();
                                        echo $presupuesto->obtener_aporte_empresarial_fin();
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col no-left">
                            <div class="card card-right">
                                <div class="card-title text-center align-middle">

                                    <h6>Total</h6>

                                </div>
                                <hr class="mc-divider">
                                <div class="card-body">
                                    <h3 class="text-center align-middle">
                                        <?php
                                        $total_resultante += $presupuesto->obtener_total_fin();
                                        echo $presupuesto->obtener_total_fin();
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <hr class="border-white">


        <?php
            }
            $i++;
        }

        ?>
        <hr class="border-white">

        <h3 class="title text-center">
            Total
        </h3>

        <div class="card card-presupuesto">
            <div class="row">
                <div class="col no-right">
                    <div class="card card-left">
                        <div class="card-title text-center align-middle">

                            <h6>Sercotec</h6>

                        </div>
                        <hr>
                        <div class="card-body">
                            <h3 class="text_center">
                                <?php
                                echo $sercotec_total;
                                ?>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col no-both">
                    <div class="card card-middle">
                        <div class="card-title text-center align-middle">

                            <h6>Aporte</h6>

                        </div>
                        <hr>
                        <div class="card-body">

                            <h3 class="text-center">
                                <?php
                                echo $aporte_total;
                                ?>
                            </h3>

                        </div>
                    </div>
                </div>

                <div class="col no-left">
                    <div class="card card-right">
                        <div class="card-title text-center align-middle">

                            <h6>Total</h6>

                        </div>
                        <hr>
                        <div class="card-body">
                            <h3 class="text-center">
                                <?php
                                echo $total_resultante;
                                ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr class="white-border">
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
    crossorigin="anonymous"></script>

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
    crossorigin="anonymous"></script>
</body>

</html>
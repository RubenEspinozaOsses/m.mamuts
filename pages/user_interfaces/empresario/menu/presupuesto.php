<?php
include '../../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../../db/projects/project_handler.php';
include '../../../../db/user/user_handler.php';
include '../../../../db/formalization/formalization_handler.php';
include '../../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../../db/projects/presupuestos/presupuesto_op_handler.php';
include '../../../../db/projects/presupuestos/item/item_proyectos_op_handler.php';
include '../../../../db/projects/rendiciones/rendiciones_op_handler.php';
include '../../../../sys/db_config.php';

conexion::abrir_conexion();



$rut_empresario = $_GET['rut_empresario'];

$rut_empresario_real = base64_decode($rut_empresario);

$empresario = class_operar_empresarios::buscar_empresarios_rut($rut_empresario_real, conexion::obtener_conexion());
$pre_empresarios = class_operar_presupuestos::listar_presupuestos_empresario(
    $empresario->obtener_codigo_empresario(),
    conexion::obtener_conexion()
);

$rendiciones = class_operar_rendiciones::listar_rendiciones_empresario(
    $empresario->obtener_codigo_empresario(),
    conexion::obtener_conexion()
);

$codigo_bp = explode('-', $empresario->obtener_codigo_empresario())[0];
$subitems_e = class_operar_item_proyectos::listar_item_proyectos_codigo_bp($codigo_bp, conexion::obtener_conexion());
$nombres_si = array();
$index_nombre = 0;
foreach ($pre_empresarios as $p) {
    $cod_item = $p->obtener_codigo_item();
    $cod_sitem = $p->obtener_codigo_subitem();
    $tiene_valor = $p->obtener_cofinanciamiento_fin() > 0
        || $p->obtener_aporte_empresarial_fin() > 0
        || $p->obtener_total_fin() > 0;
    foreach ($subitems_e as $si) {
        if (
            $cod_item == $si->obtener_codigo_item()
            && $cod_sitem == $si->obtener_codigo_subitem()
            && $tiene_valor
        ) {
            $nombres_si[$index_nombre] = $si->obtener_subitem();

            $index_nombre++;
        }
    }
    
}

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
                <img src="../../../../img/back.png" alt="" class="navbar-button">

            </a>
            <?php session_start() ?>
            <div class="d-flex-3 me-3" style="color: white;">
                <span><?php echo $_SESSION['nombre_usuario_m']
                            . " " . $_SESSION['apellido_paterno_usuario_m']
                            . " " . $_SESSION['apellido_materno_usuario_m'] ?></span>
                <span>
                    <button class="btn" data-bs-toggle="collapse" data-bs-target="#opciones_usuario" aria-expanded="false" aria-controls="opciones_usuario">
                        <img src="../../../../img/user.png" alt="User" width="30px" height="30px">
                    </button>

                </span>
                <div class="collapse" id="opciones_usuario">
                    <span>
                        <a href="../../../../middlewares/logout.php" style="color: white;">
                            Cerrar Sesion
                        </a>
                    </span>
                </div>
            </div>
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
            if (
                $presupuesto->obtener_cofinanciamiento_fin() > 0
                || $presupuesto->obtener_aporte_empresarial_fin() > 0
                || $presupuesto->obtener_total_fin() > 0
            ) {

        ?>

                <h5 class="title text-center">
                    <?php
                    echo $nombres_si[$i];

                    ?>
                </h5>
                <div class="container">
                    <div class="card card-presupuesto w-100">
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
                                            echo number_format(
                                                $presupuesto->obtener_cofinanciamiento_fin(),
                                                '0',
                                                ',',
                                                '.'
                                            );

                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>

                            <div class="col no-left">
                                <div class="card card-middle">
                                    <div class="card-title text-center align-middle">

                                        <h6>Aporte</h6>

                                    </div>
                                    <hr class="mc-divider">
                                    <div class="card-body">
                                        <h3 class="text-center">
                                            <?php
                                            $aporte_total += $presupuesto->obtener_aporte_empresarial_fin();
                                            echo number_format(
                                                $presupuesto->obtener_aporte_empresarial_fin(),
                                                '0',
                                                ',',
                                                '.'
                                            )
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card card-right">
                                    <div class="card-title text-center align-middle">

                                        <h6>Total</h6>

                                    </div>
                                    <hr class="mc-divider">
                                    <div class="card-body">
                                        <h3 class="text-center align-middle">
                                            <?php
                                            $total_resultante += $presupuesto->obtener_total_fin();
                                            echo number_format($presupuesto->obtener_total_fin(), '0', ',', '.')
                                            ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                        <a
                        class="btn"
                        data-bs-toggle="collapse"
                        href="#plan-inversion-<?php
                        echo $i
                        ?>"
                        role="button"
                        aria-expanded="false"
                        aria-controls="plan-inversion-<?php
                        echo $i
                        ?>">
                            Plan de Inversión
                        </a>
                        <div class="collapse" id="plan-inversion-<?php echo $i ?>">
                            <div class="card card-body">
                                <p>
                                    <?php

                                        if ($presupuesto -> obtener_detalle() == ''
                                        || $presupuesto -> obtener_detalle() == 'Sin información') {
                                            echo "Sin información";
                                        } else {
                                            echo $presupuesto -> obtener_detalle();
                                        }
                                    
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    </div>
                    





                </div>

                <hr class="border-white">


        <?php
                $i++;
            }
        }

        ?>
        <hr class="border-white">

        <div class="container">
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
                                    echo number_format($sercotec_total, '0', ',', '.');
                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col no-left">
                        <div class="card card-middle">
                            <div class="card-title text-center align-middle">

                                <h6>Aporte</h6>

                            </div>
                            <hr>
                            <div class="card-body">

                                <h3 class="text-center">
                                    <?php

                                    echo number_format($aporte_total, '0', ',', '.');
                                    ?>
                                </h3>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-title text-center align-middle">

                                <h6 class="align-middle">Total</h6>

                            </div>
                            <hr>
                            <div class="card-body">
                                <h3 class="text-center">
                                    <?php
                                    echo number_format($total_resultante, '0', ',', '.');

                                    ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <hr class="white-border">
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>
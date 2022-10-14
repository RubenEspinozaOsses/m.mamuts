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

$codigo_bp = explode('-', $empresario->obtener_codigo_empresario())[0];
$rendiciones = class_operar_rendiciones::listar_rendiciones_empresario(
    $empresario->obtener_codigo_empresario(),
    conexion::obtener_conexion());
    
$presupuestos = class_operar_presupuestos::listar_presupuestos_empresario(
    $empresario->obtener_codigo_empresario(),
    conexion::obtener_conexion());

$items = class_operar_item_proyectos::listar_item_proyectos_codigo_bp(
    $codigo_bp,
    conexion::obtener_conexion());

$proyecto = class_operar_proyectos::buscar_proyectos_codigo_bp(
    $codigo_bp,
    conexion::obtener_conexion());


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

    <link rel="stylesheet" href="../../../../css/rendiciones/style.css">
</head>

<body style="color: #170963;">

    <nav class="navbar">
        <div class="container-fluid">

            <a
            href="../menu.php?rut_empresario=<?php echo $_GET['rut_empresario'] ?>"
            class="card navbar-left cancel-transparent">
                <img src="../../../../img/back.png" alt="" width="30" height="30" background-color="black">

            </a>
        </div>
    </nav>

    <h1 class="title text-center">
        Rendiciones
    </h1>


    <br>



    <?php
    function subitemDiferentes($rendiciones)
    {
        $recolectados = array();
        $i = 0;
        foreach ($rendiciones as $rendicion) {
            if (!in_array($rendicion->obtener_codigo_subitem(), $recolectados)) {
                $recolectados[$i] = $rendicion->obtener_codigo_subitem();
                $i++;
            }
        }
        return $recolectados;
    }
    if (count($rendiciones) > 0) {
        $ren_map = array();
    $recolectados = subitemDiferentes($rendiciones);

    ?>

    <div class="page-wrap gradient-primary">
        <div class="container">
            <div class="overflow-auto">
                <div class="row justify-content-center">
                    <div>
                        <div class="row justify-content-center">
                            <?php
                            $montos_finales = array();
                            $saldos_finales = array();
                            $nombres_si = array();
                            $descripciones = array();
                            $i = 0;
                            foreach ($recolectados as $cod_si) {
                                $monto = 0;
                                $cofinanciamiento = 0;
                                $aporte_empresarial = 0;
                                $saldo = 0;
                                foreach ($rendiciones as $rendicion) {
                                    if ($rendicion->obtener_codigo_subitem() == $cod_si) {
                                        $nombres_si[$i] = class_operar_item_proyectos::buscar_item_proyectos_subitem(
                                            $codigo_bp,
                                            $cod_si,
                                            conexion::obtener_conexion()
                                        )->obtener_subitem();
                                        $cofinanciamiento += $rendicion->obtener_cofinanciamiento();
                                        $aporte_empresarial += $rendicion->obtener_aporte_empresarial();
                                        $descripciones[$i] = $rendicion->obtener_descripcion();
                                    }
                                }
                                foreach ($presupuestos as $presupuesto) {
                                    if ($presupuesto->obtener_codigo_subitem() == $cod_si) {
                                        $monto += $presupuesto->obtener_total_fin();
                                        $saldos_finales[$i] = $presupuesto->obtener_total_fin()
                                            - $cofinanciamiento
                                            - $aporte_empresarial;
                                    }
                                }
                                $montos_finales[$i] = $monto;

                            ?>
                                <div class="row card w-75 zero-margin card-container">
                                    <div class="col">
                                        <h6 class="card-title text-center fit-word">
                                            <?php echo $nombres_si[$i]; ?>
                                        </h6>
                                        <hr class="divider">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card card-left no-border">
                                                        <div class="card-title text-center">
                                                            Monto
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="text-center">
                                                                <?php
                                                                echo $montos_finales[$i];
                                                                ?>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card card-right no-border">
                                                        <div class="card-title text-center">
                                                            Saldo
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="text-center">
                                                                <?php
                                                                echo $saldos_finales[$i];
                                                                ?>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer row override-col">

                                        <a
                                        class="card-link col override-col text-center"
                                        href='detalles_rendiciones/detalles.php?
                                        rut_empresario=<?php echo base64_encode($rut_empresario_real) ?>&
                                        codigo_bp=<?php echo base64_encode($codigo_bp) ?>&
                                        cod_si=<?php echo base64_encode($cod_si) ?>&
                                        nom_si=<?php echo base64_encode($nombres_si[$i]) ?>'>
                                            Facturas
                                        </a>

                                        <a
                                        href=""
                                        class="card-link col override-col text-center"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#plan-inversion-<?php echo $i ?>"
                                        aria-expanded="false"
                                        aria-controls="plan-inversion-<?php echo $i ?>">
                                            Plan Inversion
                                        </a>
                                        <div class="container collapse" id="plan-inversion-<?php echo $i ?>">
                                            <div class="card">
                                                <div class="card-body override-card-body">
                                                    <div class="text-center fit-word">
                                                        <?php echo $descripciones[$i] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>


                                </div>





                                <hr class="border-white">
                            <?php
                                $i++;
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
    } else {
        echo "<center><span>No hay rendiciones para este empresario</span></center>";
    }
    ?>
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
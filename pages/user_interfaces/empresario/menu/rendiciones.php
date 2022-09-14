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
$rendiciones = class_operar_rendiciones::listar_rendiciones_empresario($empresario->obtener_codigo_empresario(), conexion::obtener_conexion());
$presupuestos = class_operar_presupuestos::listar_presupuestos_empresario($empresario->obtener_codigo_empresario(), conexion::obtener_conexion());
$items = class_operar_item_proyectos::listar_item_proyectos_codigo_bp($codigo_bp, conexion::obtener_conexion());


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
    <link rel="stylesheet" href="../../../../css/rendiciones/style.css">
</head>

<body style="color: #170963;">

    <nav class="navbar">
        <div class="container-fluid">

            <a href="../menu.php?rut_empresario=<?php echo $_GET['rut_empresario'] ?>" class="card navbar-left">
                <img src="../../../../img/mamuts1.png" alt="" width="30" height="30" background-color="black">

            </a>
        </div>
    </nav>

    <h1 class="title text-center">
        Rendiciones
    </h1>
    <div class="page-wrap gradient-primary">
        <div class="container">
            <div class="overflow-auto">
                <div class="row justify-content-center">
                    <div>
                        <div class="row justify-content-center">
                            <?php
                            $i = 0;
                            $c_presupuestos = count($presupuestos);
                            foreach ($rendiciones as $rendicion) {
                            ?>
                                <div class="row card w-50 zero-margin">
                                    <div class="col card w-75 card-75 zero-margin">
                                        <h6 class="card-title text-center">
                                            <?php
                                            echo $items[$i]->obtener_subitem();
                                            ?>
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
                                                                    $total_presupuesto = 0;
                                                                    foreach ($presupuestos as $presupuesto){
                                                                        $total_presupuesto += $presupuesto -> obtener_total_fin();
                                                                    }
                                                                    echo $total_presupuesto;
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
                                                                367.008
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col on-same-line">
                                        <a href="" class="card-link"> <img src="../../../../img/mamuts1.png" alt="" width="30" height="24" background-color="black"></a>
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

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>
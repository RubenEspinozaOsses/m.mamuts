<?php

include '../../../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../../../db/projects/project_handler.php';
include '../../../../../db/user/user_handler.php';
include '../../../../../db/formalization/formalization_handler.php';
include '../../../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../../../db/projects/presupuestos/presupuesto_op_handler.php';
include '../../../../../db/projects/presupuestos/item/item_proyectos_op_handler.php';
include '../../../../../db/projects/rendiciones/rendiciones_op_handler.php';
include '../../../../../db/projects/rendiciones/archivos/archivos_handler.php';
include '../../../../../sys/db_config.php';

conexion::abrir_conexion();



$rut_empresario_real = base64_decode($_GET['rut_empresario']);
$codigo_bp = base64_decode($_GET['codigo_bp']);
$cod_si = base64_decode($_GET['cod_si']);

$empresario = class_operar_empresarios::buscar_empresarios_rut($rut_empresario_real, conexion::obtener_conexion());

$rendiciones = class_operar_rendiciones::listar_rendiciones_empresario($empresario->obtener_codigo_empresario(), conexion::obtener_conexion());
$presupuestos = class_operar_presupuestos::listar_presupuestos_empresario($empresario->obtener_codigo_empresario(), conexion::obtener_conexion());
$items = class_operar_item_proyectos::listar_item_proyectos_codigo_bp($codigo_bp, conexion::obtener_conexion());
$archivos = class_operar_archivos::listar_archivos_empresario($empresario->obtener_codigo_empresario(), conexion::obtener_conexion());


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Rendiciones</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../../../css/archivos/style.css">

</head>

<body>

    <nav class="navbar">
        <div class="container-fluid">

            <a href="../rendiciones.php?rut_empresario=<?php echo $_GET['rut_empresario']; ?>">
                <img src="../../../../../img/mamuts1.png" alt="" width="30" height="30" background-color="black">

            </a>
        </div>
    </nav>

    <h2 class="title">
        <?php
        echo base64_decode($_GET['nom_si']);
        ?>
    </h2>

    <div class="container">
        <div class="row">

            <div class="col">

                <div class="card w-75 main-card">

                    <div class="card-title title">
                        <h5 class="text-center align-middle">
                            Factura electronica nro 3993
                        </h5>
                    </div>
                    <hr class="divider">
                    <div class="row card-body middle-cc-container zero-margin">
                        <div class="middle-cc col on-same-line">
                            <div class="card rect-border zero-margin">
                                <div class="card-title">
                                    <h6 class="text-center">
                                        Sercotec + Aporte
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <p class="desglose-sa">
                                        823859 + 16477
                                    </p>
                                    <div class="card-title">
                                        <h4>
                                            840.336
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="middle-cc col on-same-line">
                            <div class="card rect-border">
                                a
                            </div>
                        </div>
                        <div class="middle-cc col on-same-line">
                            <div class="card rect-border">
                                a
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        a
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
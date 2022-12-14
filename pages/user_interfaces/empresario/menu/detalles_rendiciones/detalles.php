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

session_start();
if (!isset($_SESSION['id_usuario_m'])) {

  conexion::cerrar_conexion();
  control_sesion::cerrar_sesion();

  echo "Inicie sesion nuevamente";
  header("refresh:1;url=../../../../login.php");
}


$rut_empresario_real = base64_decode($_GET['rut_empresario']);
$codigo_bp = base64_decode($_GET['codigo_bp']);
$cod_si = base64_decode($_GET['cod_si']);

$empresario = class_operar_empresarios::buscar_empresarios_rut(
    $rut_empresario_real,
    conexion::obtener_conexion());

$rendiciones = class_operar_rendiciones::listar_rendiciones_empresario(
    $empresario->obtener_codigo_empresario(),
    conexion::obtener_conexion());
    
$presupuestos = class_operar_presupuestos::listar_presupuestos_empresario(
    $empresario->obtener_codigo_empresario(),
    conexion::obtener_conexion());

$items = class_operar_item_proyectos::listar_item_proyectos_codigo_bp(
    $codigo_bp,
    conexion::obtener_conexion());

$archivos = class_operar_archivos::listar_archivos_empresario(
    $empresario->obtener_codigo_empresario(),
    conexion::obtener_conexion());

$rendiciones_especificas = array();

$i = 0;
foreach ($rendiciones as $rendicion) {
    if ($rendicion->obtener_codigo_subitem() == $cod_si) {
        $rendiciones_especificas[$i] = $rendicion;
        $i++;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles Rendiciones</title>

    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
    crossorigin="anonymous">

    <link
    rel="stylesheet"
    href="../../../../../css/detalles_rendiciones/style.css">

</head>

<body>

    <nav class="navbar">
        <div class="container-fluid">

            <a
            href="../rendiciones.php?rut_empresario=<?php echo $_GET['rut_empresario']; ?>"
            class="card navbar-left cancel-transparent">
                <img src="../../../../../img/back.png" alt="" width="30" height="30" background-color="black">

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
                        <img src="../../../../../img/user.png" alt="User" width="30px" height="30px">
                    </button>

                </span>
                <div class="collapse" id="opciones_usuario">
                    <span>
                        <a href="../../../../../middlewares/logout.php" style="color: white;">
                            Cerrar Sesion
                        </a>
                    </span>
                </div>
            </div>
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

                <?php
                foreach ($rendiciones_especificas as $rendicion) {

                ?>
                    <div class="card w-80 main-card">

                        <div class="card-title title">
                            <h5 class="text-center align-middle">
                                Factura electronica numero <?php echo $rendicion->obtener_numero_documento() ?>
                            </h5>
                        </div>
                        <hr class="divider">
                        <div class="row card-body middle-cc-container zero-margin">
                            <div class="middle-cc col on-same-line">
                                <div class="card rect-border zero-margin card-left smaller-card">
                                    <div class="card-title">
                                        <h6 class="text-center">
                                            SCT + Aporte
                                        </h6>
                                    </div>
                                    <hr class="divider">
                                    <div class="card-body">
                                        <div class="card-title text-center">
                                            <h4>
                                                <?php
                                                $sa = ($rendicion->obtener_aporte_empresarial()
                                                + $rendicion->obtener_cofinanciamiento());
                                                echo number_format($sa, '0', ',', '.');
                                                ?>
                                            </h4>
                                        </div>
                                        <p class="desglose-sa text-center" id="detsercapor">
                                            ( <?php
                                                echo number_format(
                                                    $rendicion->obtener_cofinanciamiento(), '0', ',', '.'
                                                );
                                            ?> + <?php
                                                echo number_format(
                                                    $rendicion->obtener_aporte_empresarial(), '0', ',', '.'
                                                );
                                            ?> )
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <div class="middle-cc col on-same-line">
                                <div class="card rect-border zero-margin smaller-card">
                                    <div class="card-title">
                                        <h6 class="text-center">
                                            Extra
                                        </h6>
                                    </div>
                                    <hr class="divider">
                                    <div class="card-body">

                                        <div class="card-title">
                                            <h4 class="text-center align-middle">
                                                <?php
                                                echo number_format(
                                                    $rendicion->obtener_aporte_extra(), '0', ',', '.'
                                                );
                                                ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                        <div class="middle-cc col on-same-line">
                                <div class="card rect-border card-right zero-margin smaller-card">
                                    <div class="card-title">
                                        <h6 class="text-center">
                                            Total
                                        </h6>
                                    </div>
                                    <hr class="divider">
                                    <div class="card-body">

                                        <div class="card-title text-center">
                                            <h4>
                                                <?php
                                                    echo number_format(
                                                        $rendicion->obtener_total_con_iva(), '0', ',', '.'
                                                    );
                                                ?>
                                                
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center align-middle">
                            <?php
                                if ($rendicion -> obtener_fecha_pago() == '0001-01-01') {
                                    echo "<h6>Pendiente</h6>";
                                } else {
                                    $fecha = $rendicion->obtener_fecha_pago();
                                    echo "<h6>Pagado [$fecha]</h6>";
                                }
                            ?>
                            
                        </div>
                    </div>
                    <hr class="white-divider">

                <?php
                }
                ?>

            </div>

        </div>
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


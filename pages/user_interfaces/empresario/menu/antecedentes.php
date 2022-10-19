<?php
include '../../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../../db/projects/project_handler.php';
include '../../../../db/user/user_handler.php';
include '../../../../db/formalization/formalization_handler.php';
include '../../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../../sys/db_config.php';
include '../../../../db/formalization/types/tipo_formalizacion_handler.php';

conexion::abrir_conexion();

session_start();
if (!isset($_SESSION['id_usuario_m'])) {

  conexion::cerrar_conexion();
  control_sesion::cerrar_sesion();

  echo "Inicie sesion nuevamente";
  header("refresh:1;url=../../../login.php");
}

$rut_empresario = $_GET['rut_empresario'];

$rut_empresario_real = base64_decode($rut_empresario);

$empresario = class_operar_empresarios::buscar_empresarios_rut($rut_empresario_real, conexion::obtener_conexion());
$empresa = null;
$plan_trabajo = null; //elementos de proyectos
$formalizacion = class_operar_formalizacion::listar_formalizacion_codigo_empresario(
    $empresario->obtener_codigo_empresario(),
    conexion::obtener_conexion());

$codigo_bp = explode(
    '-',
    $empresario->obtener_codigo_empresario())[0];

$proyecto = class_operar_proyectos::buscar_proyectos_codigo_bp(
    $codigo_bp,
    conexion::obtener_conexion());

$tipos_formalizacion = class_operar_tipo_formalizacion::listar_tipo_formalizacion(conexion::obtener_conexion());




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

    <link rel="stylesheet" href="../../../../css/antecedentes/style.css">
</head>

<body style="color: #170963;">

    <nav class="navbar">
        <div class="container-fluid">

            <a href="../menu.php?rut_empresario=<?php echo $_GET['rut_empresario'] ?>" class="card navbar-left">
                <img src="../../../../img/back.png" alt="" width="30" height="30" background-color="black">

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


    <h1 class="title text-center">
        Antecedentes
    </h1>

    <div class="container justify-content-sm-center">

        <div class="card-deck">
            <div class="card">
                <h5 class="card-title indentation">
                    Empresario
                </h5>
                <div class="card-body">
                    <div class="row">

                        <div class="col">
                            <h6>Nombre Empresario</h6>
                            <p>
                                <?php
                                $n = $empresario->obtener_nombre();
                                $ap = $empresario->obtener_apellido_paterno();
                                $am = $empresario->obtener_apellido_materno();

                                echo "$n $ap $am";

                                ?>
                            </p>
                        </div>

                        <div class="col">
                            <h6>Direccion</h6>
                            <p>
                                <?php
                                echo $empresario->obtener_direccion_particular();
                                ?>
                            </p>
                        </div>

                        <div class="col">
                            <h6>Celular</h6>
                            <p>
                                <?php
                                echo $empresario->obtener_celular();
                                ?>
                            </p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col">
                            <h6>Rut Empresario</h6>
                            <p>
                                <?php
                                echo $empresario->obtener_rut();
                                ?>
                            </p>
                        </div>

                        <div class="col">
                            <h6>Email</h6>
                            <p>
                                <?php
                                echo $empresario->obtener_email();
                                ?>
                            </p>
                        </div>

                        <?php
                        if ($empresario->obtener_telefono() != 0) {
                        ?>

                            <div class="col">
                                <h6>Telefono</h6>
                                <p>
                                    <?php
                                    echo $empresario->obtener_telefono();
                                    ?>
                                </p>
                            </div>


                        <?php
                        }

                        ?>

                    </div>
                </div>
            </div>
            <hr class="border-white">
            <div class="card">
                <h5 class="card-title indentation">
                    Empresa
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6>
                                Razon Social
                            </h6>
                            <p><?php echo $empresario->obtener_razon_social();  ?></p>
                        </div>
                        <div class="col">
                            <h6>
                                Rut Razon Social
                            </h6>
                            <p>
                                <?php echo $empresario->obtener_rut_razon_social(); ?>
                            </p>
                        </div>
                        <div class="col">
                            <h6>
                                Representate
                            </h6>
                            <p>
                                <?php

                                $representate = $empresario->obtener_representante();

                                echo "$representate";
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6>
                                Persona Juridica
                            </h6>
                            <p>
                                <?php echo $empresario->obtener_persona_juridica(); ?>
                            </p>
                        </div>
                        <div class="col">
                            <h6>
                                Direccion
                            </h6>
                            <p>
                                <?php echo $empresario->obtener_direccion(); ?>
                            </p>
                        </div>
                        <div class="col">
                            <h6>
                                Rut Representante
                            </h6>
                            <p>
                                <?php echo $empresario->obtener_rut_representante(); ?>
                            </p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <h6>
                                Tipo Juridica
                            </h6>
                            <p>
                                <?php echo $empresario->obtener_tipo_juridica(); ?>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <hr class="border-white">
            <div class="card">
                <h5 class="card-title indentation">
                    Plan de trabajo
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h6>Instrumento</h6>
                            <p>
                                <?php echo $proyecto->obtener_instrumento(); ?>
                            </p>
                        </div>
                        <div class="col">
                            <h6>Plan negocio</h6>
                            <p>
                                <?php echo $empresario->obtener_plan_negocio(); ?>
                            </p>
                        </div>
                        <div class="col">
                            <h6>Sercotec</h6>
                            <p>
                                <?php
                                echo number_format(
                                $empresario->obtener_cofinanciamiento(),
                                    '0',
                                    ',',
                                    '.'
                                )
                                ?>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h6>Proyecto</h6>
                            <p>
                                <?php echo $proyecto->obtener_proyecto(); ?>
                            </p>
                        </div>
                        <div class="col">
                            <h6>Descripcion</h6>
                            <p>
                                <?php echo $empresario->obtener_descripcion(); ?>
                            </p>
                        </div>
                        <div class="col">
                            <h6>Aporte Empresarial</h6>
                            <p>
                                <?php echo number_format($empresario->obtener_aporte_empresarial(), '0', ',', '.'); ?>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h6>Estado</h6>
                            <p>
                                <?php echo $proyecto->obtener_estado(); ?>
                            </p>
                        </div>
                        <div class="col">
                            <h6>Total</h6>
                            <p>
                                <?php
                                $total = $empresario->obtener_aporte_empresarial()
                                + $empresario->obtener_cofinanciamiento();
                                echo number_format($total, '0', ',', '.')
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="border-white">
            <div class="card">
                <h5 class="card-title indentation">
                    Formalizacion
                </h5>
                <div class="card-body">
                    <?php
                    $i = 1;
                    foreach ($formalizacion as $f) {
                        $nombre_documento = '';
                        foreach ($tipos_formalizacion as $t){
                            if ($f -> obtener_tipo_documento() == $t -> obtener_tipo_documento()){
                                $nombre_documento = $t -> obtener_nombre_documento();
                            }
                        }
                    ?>
                        
                        <div class="row">
                            <div class="col">
                                <p>
                                    Documento <?php echo $i++ ?>
                                </p>
                                <br>
                                <hr class="border-white">
                            </div>
                            <div class="col">
                                <?php
                                    $fecha_inicio = $f->obtener_fecha_inicio();
                                    $fecha_fin = $f->obtener_fecha_termino();
                                    $dias_totales = (strtotime($fecha_fin) - strtotime($fecha_inicio)) / 86400;
                                ?>
                                <?php
                                    echo $nombre_documento;
                                ?> del <?php
                                    echo $fecha_inicio
                                ?> al <?php
                                    echo $fecha_fin;
                                ?> [<?php
                                        echo $dias_totales;
                                    ?> dias] [<?php
                                        echo round($dias_totales /30, PHP_ROUND_HALF_UP)
                                    ?> meses]
                            </div>
                        </div>
                    <?php
                    }

                    ?>
                </div>
            </div>
            <hr class="border-white">
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
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
$empresa = null;
$plan_trabajo = null; //elementos de proyectos
$formalizacion = class_operar_formalizacion::listar_formalizacion_codigo_empresario($empresario->obtener_codigo_empresario(), conexion::obtener_conexion())



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
    <link rel="stylesheet" href="../../../../css/antecedentes/style.css">
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

                                $representate = $empresario -> obtener_representante();

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
                                <?php echo $empresario -> obtener_rut_representante(); ?>
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
                    <p>
                        hola
                    </p>
                </div>
            </div>
            <hr class="border-white">
            <div class="card">
                <h5 class="card-title indentation">
                    Formalizacion
                </h5>
                <div class="card-body">
                    <?php
                    foreach ($formalizacion as $f) {
                    ?>

                        <a href="">
                            Nombre [<?php echo $f->obtener_fecha_inicio() ?> - <?php echo $f->obtener_fecha_termino() ?>]
                        </a>
                        <br>
                    <?php
                    }

                    ?>
                </div>
            </div>
            <hr class="border-white">
        </div>

    </div>







    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>
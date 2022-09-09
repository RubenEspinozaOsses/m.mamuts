<?php
include '../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../db/projects/project_handler.php';
include '../../../db/user/user_handler.php';
include '../../../db/formalization/formalization_handler.php';
include '../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../sys/db_config.php';

conexion::abrir_conexion();

$empresario = class_operar_empresarios::buscar_empresarios_rut(base64_decode($_GET['rut_empresario']), conexion::obtener_conexion());


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

</head>

<body style="color: #170963;">

  <h1 style="text-align: center; padding-top: 2%;">
    Detalles Empresario
  </h1>
  <div class="container" style="padding-top: 2%;">
    <div class="card-deck">
      <div class="overflow-auto">
        <div class="card bg-primary-outlined" style="border-color: #170963;">
          <div class="card">
            <div class="card-body">

              <h5 class="card-title text-left">
                <?php
                $nombre_empresario = $empresario->obtener_nombre();
                $ap_pat = $empresario->obtener_apellido_paterno();
                $ap_mat = $empresario->obtener_apellido_materno();

                echo "$nombre_empresario $ap_pat $ap_mat";
                ?>
              </h5>
              <p class="card-text" style="padding-left: 3%;">
                Rut
                <?php

                $rut_empresario = base64_decode($_GET['rut_empresario']);

                echo "$rut_empresario";


                ?>
              </p>


            </div>
          </div>


          <div class="card">
            <div class="card-body">

              <h5 class="card-title text-left">
                Proyecto
              </h5>
              <p class="card-text w-50" style="padding-left: 3%;">

                <?php

                $codigo_bp = explode('-', $empresario->obtener_codigo_empresario())[0];
                $proyecto = class_operar_proyectos::buscar_proyectos_codigo_bp($codigo_bp, conexion::obtener_conexion());

                echo $proyecto->obtener_proyecto();


                ?>
              </p>


            </div>
          </div>

          <div class="card">
            <div class="card-body">

              <h5 class="card-title text-left">
                Empresa
              </h5>
              <div class="card" style="border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;">
                <div class="card-body">

                  <h6 class="card-title text-left">
                    <?php
                    $empresa = $empresario->obtener_razon_social();
                    $rut_empresa = $empresario->obtener_rut_razon_social();

                    echo "$empresa ($rut_empresa)";
                    ?>
                  </h6>


                </div>
              </div>

              <div class="card" style="border: 0px solid transparent">
                <div class="card-body">

                  <h6 class="card-title text-left">
                    Asesor
                    <?php
                    $rut_asesor = $empresario->obtener_rut_asesor();
                    $asesor = class_operar_usuarios::buscar_usuarios_rut($rut_asesor, conexion::obtener_conexion());

                    $n = $asesor->obtener_nombre();
                    $ap = $asesor->obtener_apellido_paterno();
                    $am = $asesor->obtener_apellido_materno();
                    echo "$n $ap $am <br />";
                    ?>
                  </h6>

                  <div class="white-space: nowrap">
                    <h6 class="card-title" style="display: inline-block;">
                      Estado
                    </h6>
                    <div class="text-muted" style="display: inline-block;">
                      <?php
                      
                        
                        $estado = $proyecto -> obtener_estado();
                        $formalizacion = class_operar_formalizacion::listar_formalizacion_codigo_empresario($empresario -> obtener_codigo_empresario(), conexion::obtener_conexion());
                        $fecha_hoy = date('Y-m-d');
                        
                        $fecha_termino = $formalizacion[0] -> obtener_fecha_termino();

                        $dias_extra = class_operar_dias_extras_empresario::buscar_dias_extras_codigo_empresario($empresario -> obtener_codigo_empresario(), conexion::obtener_conexion());

                        $dias_restantes = ((strtotime($fecha_termino) - strtotime($fecha_hoy)) / 86400) + $dias_extra;


                        
                        echo $estado == "Activo" ? "$estado, quedan $dias_restantes dias" : "$estado";
                      
                      ?>
                    </div>
                  </div>

                </div>

              </div>




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
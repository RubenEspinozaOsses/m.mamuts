<?php
include '../../sys/control_sesion.php';
include '../../sys/db_config.php';
session_start();
if (!isset($_SESSION['id_usuario'])) {

  conexion::cerrar_conexion();
  control_sesion::cerrar_sesion();

  echo "Inicie sesion nuevamente";
  header("refresh:4;url=../login.php");
} else if ($_SESSION['acceso_usuario'] == 2) { ?>

  <!doctype html>
  <html lang="en">

  <head>
    <title>Menu Empresarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>

  <!-- <body onload="load()"> -->

  <body>

    <?php

    include '../../db/entrepeneur/entrepeneur_handler.php';

    conexion::abrir_conexion();

    $rut_asesor = $_SESSION['rut_usuario'];

    //echo "<script type='text/javascript'>console.log('$rut_asesor')</script>";

    $empresarios = class_operar_empresarios::listar_empresarios_asesor_activo_observado($rut_asesor, conexion::obtener_conexion());
    $cantidad_empresarios = count($empresarios);

    //echo "<script type='text/javascript'>console.log('$empresarios')</script>";

    /*for ($i = 0; $i < $cantidad_empresarios; $i++){
        $nombre = $empresarios[$i] -> obtener_nombre();
        echo "<h3>$nombre</h3>";
      }*/

    conexion::cerrar_conexion();
    ?>

    <nav class="navbar" style="background-color: #170963;">
      <div class="container-fluid">
        <a class="navbar-brand ml-auto" href="#" data-bs-toggle="collapse" data-bs-target="#search" aria-expanded="false" aria-controls="search">
          <img src="../../img/mamuts1.png" alt="" width="30" height="24">
        </a>


        <a href="" class="card" onclick="">
          <img src="../../img/mamuts1.png" alt="" width="30" height="24" background-color="black">

        </a>
      </div>




      <div class="collapse" id="search" style="margin: 0 auto; text-align: center;">
        <div class="container-fluid">
          <input type="text" id="textfield" placeholder="Buscar empresario" class="form-control" onkeyup="buscar()">
          </input>

        </div>

      </div>
    </nav>

    <div class="page-wrap gradient-primary">



      <div class="container">
        <div class="overflow-auto">
          <div id="empresarios" style="padding-top: 10px; padding-bottom: 10px; margin: auto;">


            <?php
            for ($i = 0; $i < $cantidad_empresarios; $i++) {
              $nombre = $empresarios[$i]->obtener_nombre();
              $rut_empresa = $empresarios[$i]->obtener_rut_razon_social();
              $rut_empresario = $empresarios[$i]->obtener_rut();
            ?>


              <div class="row d-flex justify-content-center" style="margin-left: auto; margin-right: auto;">
                <div class="card col-md-6" style="width: 18rem; white-space: nowrap; padding: 0px; border-color:#170963; display: inline-block;">
                  <div class="card w-75" style="padding: 0px; display: inline-block; border-top-right-radius: 0rem;border-bottom-right-radius: 0rem; border-color: transparent; border-right-color: #170963;">
                    <div class="card-body">
                      <div class="col-3">
                        <h5 class="card-title col"><?php echo $nombre ?></h5>
                      </div>
                      <div class="col-3">
                        <h6 class="card-subtitle mb-2 text-muted col-3">Rut Empresa</h6>
                      </div>

                      <p class="card-text col"><?php echo $rut_empresa ?></p>


                      <div class="card-footer text-center row" style="background-color: white;">
                        <a href="./empresario/detalles.php?rut_empresario=<?php echo base64_encode($rut_empresario) ?>" class="card-link col">Detalles <img src="../../img/mamuts1.png" alt="" width="30" height="24" background-color="black"></a>
                      </div>

                    </div>
                  </div>

                  <div class="w-25 col text-center align-top" style="display: inline-block; margin: auto;  padding-top: 25%;">
                    <a href="./empresario/menu.php?rut_empresario=<?php echo base64_encode($rut_empresario) ?>" class="card-link col"> <img src="../../img/mamuts1.png" alt="" width="30" height="24" background-color="black"></a>
                  </div>

                </div>
                <hr style="color: white;" />
              </div>




            <?php
            }
            ?>

          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="../../js/pages/user_interfaces/seleccionar_empresario.js">

    </script>
  </body>

  </html>

<?php
}
?>
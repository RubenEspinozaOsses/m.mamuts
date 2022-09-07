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


    <div class="container">
      <div class="col-12 col-md-6 col-lg-3">
        <div id="empresarios" style="width: 50rem; padding: 10px; margin: 0 auto;" class="row">


          <?php
            for ($i = 0; $i < $cantidad_empresarios; $i++){
              $nombre = $empresarios[$i] -> obtener_nombre();
              $rut_empresa = $empresarios[$i] -> obtener_rut_razon_social();
              $rut_empresario = $empresarios[$i] -> obtener_rut();
          ?>


          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title"><?php echo $nombre ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Rut Empresa</h6>
              <p class="card-text"><?php echo $rut_empresa ?></p>
              <a href="./empresario/detalles.php?rut_empresario=<?php echo base64_encode($rut_empresario) ?>" class="card-link">Detalles</a>
              <a href="./empresario/menu.php?rut_empresario=<?php echo base64_encode($rut_empresario) ?>" class="card-link">Menu</a>
            </div>
          </div>

          <?php 
            }
          ?>

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
<?php
include '../../sys/control_sesion.php';
include '../../sys/db_config.php';
session_start();
//echo $_SESSION['id_usuario_m'] . " -> es la id guardada en la sesion" . "<br>";
if (!isset($_SESSION['id_usuario_m'])) {

  conexion::cerrar_conexion();
  control_sesion::cerrar_sesion();

  echo "Inicie sesion nuevamente";
  header("refresh:4;url=../login.php");
}
include '../../db/entrepeneur/entrepeneur_handler.php';

conexion::abrir_conexion();

$rut_asesor = $_SESSION['rut_usuario_m'];
$empresarios = null;
$mostrar = false;
if ($_SESSION['acceso_usuario_m'] == 1) {
  include '../../db/projects/project_handler.php';
  $empresarios_obtenidos = class_operar_empresarios::listar_empresarios(
    conexion::obtener_conexion()
  );

  $empresarios = array();

  $proyectos = class_operar_proyectos::listar_proyectos_activos(conexion::obtener_conexion());
  $i = 0;
  foreach ($proyectos as $p) {
    foreach ($empresarios_obtenidos as $e){
      $codigo_bp = explode('-', $e->obtener_codigo_empresario())[0];
      
      if ($p -> obtener_codigo_bp() == $codigo_bp) {
        //echo $codigo_bp . "<br>";
        $empresarios[$i] = $e;
        $i++;
        break;
      }
    }
  }
  $mostrar = true;
} elseif ($_SESSION['acceso_usuario_m'] == 2) {
  $empresarios = class_operar_empresarios::listar_empresarios_asesor_activo_observado(
    $rut_asesor,
    conexion::obtener_conexion()
  );
  $mostrar = true;
}

if ($mostrar) {
?>
  <!doctype html>
  <html lang="en">

  <head>
    <title>Menu Empresarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/seleccionar_empresario/style1.css">
  </head>

  <body>

    <?php



    $cantidad_empresarios = count($empresarios);
    //echo "<script type='text/javascript'>console.log('$rut_asesor');console.log('$cantidad_empresarios');</script>";


    conexion::cerrar_conexion();
    ?>

    <nav class="navbar">
      <div class="container-fluid">
        <a class="navbar-brand ml-auto" href="#" data-bs-toggle="collapse" data-bs-target="#search" aria-expanded="false" aria-controls="search">
          <img src="../../img/buscar.png" alt="" width="30" height="30">
        </a>



      </div>




      <div class="collapse" id="search">
        <div class="container-fluid">
          <input type="text" id="textfield" placeholder="Buscar empresario" class="form-control" onkeyup="buscar()">
          </input>

        </div>

      </div>
    </nav>

    <h1 class="title text-center">
      Empresarios
    </h1>

    <div class="page-wrap gradient-primary">



      <div class="container">
        <div class="overflow-auto">
          <div id="empresarios">


            <?php
            for ($i = 0; $i < $cantidad_empresarios; $i++) {
              $nombre = $empresarios[$i]->obtener_nombre();
              $apellido_paterno = $empresarios[$i]->obtener_apellido_paterno();
              $apellido_materno = $empresarios[$i]->obtener_apellido_materno();
              $rut_empresa = $empresarios[$i]->obtener_rut_razon_social();
              $rut_empresario = $empresarios[$i]->obtener_rut();
            ?>


              <div class="row d-flex justify-content-center detail-container">
                <div class="card col-md-6 card-container w-100">
                  <div class="card">
                    <div class="card-body">
                      <div class="col">
                        <h5 class="card-title fit-word"><?php echo $apellido_paterno . " "
                                                      . $apellido_materno . ", "
                                                      . $nombre ?>
                        </h5>
                      </div>
                      <div class="col-3">
                        <h6 class="card-subtitle mb-2 text-muted col-3">Rut Empresa</h6>
                      </div>

                      <p class="card-text col"><?php echo $rut_empresa ?></p>


                      <div class="card-footer text-center row" style="background-color: white;">
                        <a href="./empresario/detalles.php?rut_empresario=<?php echo base64_encode($rut_empresario) ?>" class="card-link col">Detalles</a>

                        <a href="./empresario/menu.php?rut_empresario=<?php echo base64_encode($rut_empresario) ?>" class="card-link col">Menu</a>
                      </div>

                    </div>
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

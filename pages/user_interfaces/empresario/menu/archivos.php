<?php
include '../../../../db/entrepeneur/entrepeneur_handler.php';
include '../../../../db/projects/project_handler.php';
include '../../../../db/user/user_handler.php';
include '../../../../db/formalization/formalization_handler.php';
include '../../../../db/entrepeneur/entrepeneur_extrad_handler.php';
include '../../../../db/projects/rendiciones/archivos/archivos_handler.php';
include '../../../../sys/db_config.php';

conexion::abrir_conexion();



$rut_empresario = $_GET['rut_empresario'];

$rut_empresario_real = base64_decode($rut_empresario);

$empresario = class_operar_empresarios::buscar_empresarios_rut($rut_empresario_real, conexion::obtener_conexion());
$archivos = class_operar_archivos::listar_archivos_empresario(
  $empresario->obtener_codigo_empresario(),
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
  <link rel="stylesheet" href="../../../../css/archivos/style.css">
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
    Descargar Archivos
  </h1>

  <div class="container-fluid d-flex justify-content-center">
    <input type="text" id="textfield" placeholder="Buscar archivos" class="form-control w-50" onkeyup="buscar()">
    </input>

  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="card w-75">
        <div id="file-container" class="card-body">
          <?php
          $id = 0;
          foreach ($archivos as $a) {


          ?>
            <div class="row overflow-auto">
              <?php
              $nombre = $a->obtener_archivo();
              $extension = $a->obtener_extension();
              $ruta = $a->obtener_ruta();

              $descripcion = $a->obtener_descripcion();
              $ruta_base = '../../../../';
              $icono = '';
              $img_icon = 'img/jpg.png';
              switch ($extension) {
                case 'jpg':
                  $icono = $ruta_base . $img_icon;
                  break;
                case 'png':
                  $icono = $ruta_base . $img_icon;
                  break;
                case 'jpeg':
                  $icono = $ruta_base . $img_icon;
                  break;
                case 'pdf':
                  $icono = $ruta_base . 'img/pdf.png';
                  break;
                case 'docx':
                  $icono = $ruta_base . 'img/texto.png';
                  break;
                case 'doc':
                  $icono = $ruta_base . 'img/texto.png';
                  break;
                default:
                  $icono = $ruta_base . 'img/mamuts1.png';
                  break;
              }
              ?>
              <div class="col justify-content-center text-center">
                <img src="<?php echo $icono ?>" class="file-icon" alt="Icono" />
              </div>
              <div class="col justify-content-center w-10 file-name">
              <a
                href="../<?php echo $ruta_base
                . "cdx/"
                . $ruta
                . "/"
                . $nombre
                . "."
                . $extension  ?>"
                >
                <?php echo $nombre . "." . $extension  ?>
              </a>
              </div>
              
              <hr>
            </div>


          <?php
          }
          ?>

        </div>




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

  <script src="../../../../js/pages/user_interfaces/archivos/files.js"></script>
</body>

</html>
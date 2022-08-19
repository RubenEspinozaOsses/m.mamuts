<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">

</head>

<body>

  <div class="text-center">
    <img src="../img/mamuts1.png" class="rounded" alt="Mamut" style="background-color: #170963;">
  </div>

  <form action="./user_interfaces/seleccionar_empresario.php">
    <div class="mb-3" style="padding-left: 20px; padding-top: 20px;">
      <label for="rut" class="form-label">Rut</label>
      <input type="text" class="form-control" name="rut" id="rut" aria-describedby="emailHelpId" placeholder="Ingrese su rut" onkeydown="rutValido()">
      <small id="help-login" class="form-text text-muted"></small>

      <div class="mb-3">
        <label for="" class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="" id="password" placeholder="Ingrese su contraseña">
      </div>

      <small class="form-text text-muted" style="padding: 20px;">
        <a href="./recoverpassword.php">
          Olvido su contraseña?
        </a>
      </small>
    </div>




    <div style="text-align:center;">
      <button type="submit" class="btn btn-primary" id="login">
        <img src="../img/mamuts1.png" alt="LogIn" style="width:32px; height:32px; border-color: #170963;">
      </button>
    </div>
  </form>





  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

  <script src="../js/pages/login.js"></script>
</body>

</html>
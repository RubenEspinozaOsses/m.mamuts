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

<body onload="load()">

  <nav class="navbar" style="background-color: #170963;">
    <div class="container-fluid">
      <a class="navbar-brand ml-auto" href="#" data-bs-toggle="collapse" data-bs-target="#search" aria-expanded="false" aria-controls="search">
        <img src="../../img/mamuts1.png" alt="" width="30" height="24">
      </a>
    </div>


    <div class="collapse" id="search">
      <div class="container-fluid">
        <input type="text" id="textfield" placeholder="Buscar empresario" class="form-control" onkeyup="buscar()">
        </input>

      </div>

    </div>
  </nav>


  <div class="card-deck" style="border-color: #170963; border-width: 30px;">

    <div id="empresarios" style="width: 50rem; padding: 10px; margin: 0 auto; overflow-x: scroll;" class="row">

    </div>

  </div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <script src="../../js/pages/user_interfaces/seleccionar_empresario.js">

  </script>
</body>

</html>
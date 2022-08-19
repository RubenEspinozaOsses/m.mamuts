<!doctype html>
<html lang="en">

<head>
    <title>Recover Password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <div class="text-center">
        <a href="./login.php">
            <img src="../img/mamuts4.png" class="rounded" alt="Volver"
                style="background-color: #170963; width: 10%; height: 10%;">
        </a>
    </div>


    <form action="action.php">
        <div class="mb-3" style="margin-left: 20px; margin-top: 20px;">
            <input type="text" class="form-control" name="rut-recover" id="rut-recover" aria-describedby="helpId"
                placeholder="Ingrese su Rut" onkeydown="rutValido()">
            <small id="helpId" class="form-text text-muted" style="margin-left: 20px; margin-top: 20px">Le enviaremos un
                correo con los pasos a seguir</small>
        </div>
        <div style="text-align:center;">
            <button type="submit" class="btn btn-primary">
                <img src="../img/mamuts1.png" alt="LogIn" style="width:32px; height:32px; border-color: #170963;">
            </button>
        </div>
    </form>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>
    <script src="../js/pages/recoverpassword.js"></script>
</body>

</html>
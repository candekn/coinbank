<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Coinbank</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php $button= isset($_GET["button"]) ? $_GET["button"] : null; ?>
<div class="card-header">
    <div class="float-right">
        <div class="btn btn-primary"><a class="btn-link" href="Index.php?button=ingresar">Ingresar</a></div>
        <div class="btn btn-primary"><a class="btn-link" href="Index.php?button=registrarse">Registrarse</a></div>
    </div>
</div>
<div class="container-fluid">
    <div class="card" <?php if($button=="ingresar"){echo "style='max-width: 500px; margin:
    auto'"; }  else{echo "style='display:none'";} ?>>
        <div class="card-body">
            <h4 class="card-title mb-4 mt-1">Ingrese sus datos: </h4>
            <form action="procesarLogin.php" method="post">
                <div class="form-group">

                        <label>Email: </label>
                        <input class="form-control" type="email" name="email"
                               required>

                </div>
                <div class="form-group">

                        <label>Contraseña: </label>
                        <input class="form-control" type="password" name="pass" required>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"
                            style="max-width: 200px; margin: auto; margin-bottom:
                            10px">Ingresar</button>

                    <button type="reset" class="btn btn-primary btn-block" style="max-width:
                     200px; margin: auto">Cancelar</button>
                </div>
            </form>
        </div> <!--cardbody-->
    </div> <!--card-->
</div>





</body>
</html>

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
<?php 
    $button= isset($_GET["button"]) ? $_GET["button"] : null;
?>
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

                    <a href="/coinbank/index.php" class="btn btn-primary btn-block" style="max-width:
                     200px; margin: auto">Cancelar</a>
                </div>
            </form>
        </div> <!--cardbody-->
    </div> <!--card-->
</div>

<!-- Registro -->
<div class="container -fluid formIndex" <?php if($button=="registrarse"){echo "style='max-width: 500px; margin:
    auto'"; }  else{echo "style='display:none'";} ?>>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4 mt-1">Ingrese sus datos: </h4>
            <form id="formularioRegistro" method="post" enctype="multipart/form-data">
            <!-- PASO UNO INFO PRINCIPAL -->
                <div class="paso" style="display:block;">
                    <div class="form-group">
                            <label>Nombre: </label>
                            <input class="form-control" type="email" name="nombre">
                    </div>
                    <div class="form-group">
                            <label>Apellido: </label>
                            <input class="form-control" type="text" name="apellido">
                    </div>
                    <div class="form-group">
                            <label>Email: </label>
                            <input class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                            <label>Teléfono: </label>
                            <input class="form-control" type="number" name="telefono">
                    </div>
                    <div class="form-group">
                            <label>Dirección: </label>
                            <input class="form-control" type="text" name="direccion">
                    </div>
                    <div class="form-group">
                            <label>Contraseña: </label>
                            <input class="form-control" type="password" name="contraseña">
                    </div>
                    <div class="form-group">
                            <label>Repetir Contraseña: </label>
                            <input class="form-control" type="password" name="contraseñaDos">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block next"
                                style="max-width: 200px; margin: auto; margin-bottom:
                                10px">Seguiente</button>
                    </div>
                </div>

                <!-- PASO DOS DNI -->
                <div class="paso" style="display:none;">
                    <div class="form-group">
                            <label>Dni: </label>
                            <input class="form-control" type="number" name="dni">
                    </div>
                    <div class="form-group">
                            <label>Imagen del DNI (frente): </label>
                            <input class="form-control" type="file" name="dniFront">
                    </div>
                    <div class="form-group">
                            <label>Imagen del DNI (dorso): </label>
                            <input class="form-control" type="file" name="dniBack">
                    </div>
                    
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block next"
                                style="max-width: 200px; margin: auto; margin-bottom:
                                10px">Seguiente</button>

                        <button type="reset" class="btn btn-primary btn-block prev" style="max-width:
                        200px; margin: auto">Atrás</button>
                    </div>
                </div>

                <!-- PASO TRES TARJETA CRÉDITO -->
                <div class="paso" style="display:none;">
                    <div class="form-group">
                            <label>Nombre que aparece en la tarjeta de crédito: </label>
                            <input class="form-control" type="text" name="nombreTarjeta">
                    </div>
                    <div class="form-group">
                            <label>Número de tarjeta: </label>
                            <input class="form-control" type="number" name="numeroTarjeta">
                    </div>
                    <div class="form-group">
                            <label>fecha de vencimiento: </label>
                            <input class="form-control" type="date" name="fechaVencimiento">
                    </div>
                    <div class="form-group">
                            <label>Código de seguridad: </label>
                            <input class="form-control" type="number" max="3" name="codigoSeguridad">
                    </div>
                    
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block next"
                                style="max-width: 200px; margin: auto; margin-bottom:
                                10px">Seguiente</button>

                        <button type="reset" class="btn btn-primary btn-block prev" style="max-width:
                        200px; margin: auto">Atrás</button>
                    </div>
                </div>
                <!-- PASO CUATRO WALLETS -->
                <div class="paso" style="display:none;">
                    <div class="form-group">
                            <label>Nombre que aparece en la tarjeta de crédito: </label>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">PataConde</label>
                            </div>
                    </div>
                    
                    <div class="form-group">
                        <button id="submitButton" type="button" class="btn btn-primary btn-block"
                                style="max-width: 200px; margin: auto; margin-bottom:
                                10px">Registrarse</button>

                        <button type="reset" class="btn btn-primary btn-block prev" style="max-width:
                        200px; margin: 2% auto 2% auto">Atrás</button>
                        
                        <a href="/coinbank/index.php" class="btn btn-primary btn-block prev" style="max-width:
                        200px; margin: auto">Cancelar</a>
                    </div>
                </div>
            </form>
        </div> <!--cardbody-->
    </div> <!--card-->
</div>
<script src="./js/registro.js"></script>
</body>
</html>

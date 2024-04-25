<?php
require_once "clases/conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$sql = "SELECT * from usuarios where nombre='admin'";
$result = mysqli_query($conexion, $sql);
$validar = 0;
if (mysqli_num_rows($result) > 0) {
    $validar = 1;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Martin Gutierrez, and Bootstrap contributors">
    <meta name="generator" content="v 1.3">
    <title>Multivendor</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/heroes/">

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/heroes.css" rel="stylesheet">
    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="librerias/funciones.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->

</head>

<body>

    <main>
        <div class="b-example-divider"></div>
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-3">Bienvenido</h1>
                    <p class="col-lg-10 fs-4">Sistema de gestion de Diseño e Impresión Multivendor del Norte S.A de C.V.</p>
                </div>
                
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 border rounded-3 bg-light" id="frmLogin">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
                            <label for="floatingInput">Usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                            <label for="floatingPassword">Contraseña</label>
                        </div>
                        <span class="w-100 btn btn-lg btn-primary" id="entrarSistema">Iniciar Sesión</span>
                        <hr class="my-4">
                        <small class="text-muted">Sistema para uso interno Multivendor del Norte S.A. de C.V.</small>
                    </form>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#entrarSistema').click(function() {
                    vacios = validarFormVacio('frmLogin');
                    if (vacios > 0) {
                        alert("Debes llenar todos los campos!!");
                        return false;
                    }
                    datos = $('#frmLogin').serialize();
                    $.ajax({
                        type: "POST",
                        data: datos,
                        url: "procesos/regLogin/login.php",
                        success: function(r) {
                            if (r == 1) {
                                window.location = "vistas/inicio.php";
                            } else {
                                alert("No se pudo acceder :(");
                            }
                        }
                    });
                });
            });
        </script>
    </main>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
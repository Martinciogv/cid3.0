<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Martin Gutierrez" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Multivendor del Norte S.A. de C.V.</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .bg-gris {
            background-color: #6A6A6A;
        }
        .bg-rojo {
            background-color: #CF041D;
        }
        .bg-naranja {
            background-color: #FF9700;
        }
        .bg-amarillo {
            background-color: #E6CA01;
        }
        .bg-verde {
            background-color: #027A1C;
        }
        .bg-azul {
            background-color: #002EFF;
        }
        .bg-gris {
            background-color: #6A6A6A;
        }
        .bg-rojo {
            background-color: #CF041D;
        }
        .bg-naranja {
            background-color: #FF9700;
        }
        .bg-amarillo {
            background-color: #E6CA01;
        }
        .bg-verde {
            background-color: #027A1C;
        }
        .bg-azul {
            background-color: #002EFF;
        }
        .badge-gris {
            background-color: #6A6A6A;
        }

        .badge-rojo {
            background-color: #CF041D;
        }

        .badge-naranja {
            background-color: #FF9700;
        }

        .badge-amarillo {
            background-color: #E6CA01;
        }

        .badge-verde {
            background-color: #027A1C;
        }

        .badge-azul {
            background-color: #002EFF;
        }
   
    </style>
    <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">Multivendor S.A. de C.V.</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">

            <div class="nav-item text-nowrap">

                <a class="nav-link px-4" href="../procesos/salir.php">Usuario: <?php echo $_SESSION['usuario'] ?> -- Cerrar
                    sesión</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-4">
                    <ul class="nav flex-column">
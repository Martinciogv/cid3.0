<?php
session_start();

// Comprobación de sesión y privilegios
if (isset($_SESSION['usuario'], $_SESSION['priv'])) {
    require_once "../clases/Conexion.php";
    $c = new conectar();
    $conexion = $c->conexion();
    $pagina_actual = basename($_SERVER['PHP_SELF']);

    // Incluir archivos necesarios
    include('includes/headers.php');
    include('includes/menu.php');

    // Obtener el ID de la orden
    $nik = mysqli_real_escape_string($conexion, (strip_tags($_GET["nik"], ENT_QUOTES)));

    // Consulta SQL para obtener los detalles de la orden
    $sql = "SELECT o.id_orden, u.nombre AS nombre_usuario, c.nombre AS nombre_cliente, c.email, c.telefono, o.ttrabajo, o.fecha_entrega, o.medida, o.material, o.cantidad, o.formato, o.descripcion_, o.notas, o.tarchivos, o.ubi, o.acabados, o.fecha_imp, o.descri, o.disenador, o.pro, o.estado, o.fechaOrden
            FROM orden AS o          
            INNER JOIN clientes AS c ON o.id_cliente = c.id_cliente
            INNER JOIN usuarios AS u ON o.id_usuario = u.id_usuario
            WHERE o.id_orden = $nik ";
    $result = mysqli_query($conexion, $sql);
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Orden de Diseño</title>
        <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" />
        <style>
            /* Estilos personalizados */
            @media print {
                #btn-imprimir {
                    display: none;
                }
            }
        </style>
    </head>

    <body>
        <?php while ($mostrarI = mysqli_fetch_assoc($result)) : ?>
            <div class="container " id="printDiseno">
                <div class="row text-center">
                    <!-- Encabezado -->
                    <div class="col-sm-4"> 
                        <img src="../img/cid.png" width="300" />
                    </div>
                    <div class="col-sm-4">
                        <h3>ORDEN DE DISEÑO</h3>
                    </div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info" id="btn-imprimir">Imprimir</button>
                        <h3>Folio diseño # <?php echo $mostrarI['id_orden'] ?></h3>
                    </div>
                </div>

                <!-- Datos generales -->
                <div class="card card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Cliente</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['nombre_cliente'] ?>">
                        </div>
                        <div class="col-sm-4">
                            <label>Correo</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['email'] ?>">
                        </div>
                        <div class="col-sm-4">
                            <label>Teléfono</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['telefono'] ?>">
                        </div>
                    </div>
                    <!-- Datos trabajo diseño -->
                    <hr>
                    <div class="row">
                        <div class="col-sm-2">
                            <label>Diseño</label>
                            <input type="date" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['fecha_entrega'] ?>">
                        </div>
                        <div class="col-sm-2">
                            <label>Impresión</label>
                            <input type="date" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['fecha_imp'] ?>">
                        </div>
                        <div class="col-sm-2">
                            <label>Estado</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['estado'] ?>">
                        </div>
                        <div class="col-sm-2">
                            <label>Usuario</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['nombre_usuario'] ?>">
                        </div>
                        <div class="col-sm-2">
                            <label>Diseñador</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['disenador'] ?>">
                        </div>
                        <div class="col-sm-2">
                            <label>Proveedor</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['pro'] ?>">
                        </div>
                    </div>
                    <!-- Datos trabajo -->
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Trabajo</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['ttrabajo'] ?>">
                        </div>
                        <div class="col-sm-3">
                            <label>Medida</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['medida'] ?>">
                        </div>
                        <div class="col-sm-3">
                            <label>Material</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['material'] ?>">
                        </div>
                        <div class="col-sm-3">
                            <label>Formato</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['formato'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <label>Descripción</label>
                            <textarea class="form-control"><?php echo $mostrarI['descripcion_'] ?></textarea>
                        </div>
                        <div class="col-sm-6">
                            <label>Notas</label>
                            <textarea class="form-control"><?php echo $mostrarI['notas'] ?></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label>Tipo de archivo</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['tarchivos'] ?>">
                        </div>
                        <div class="col-sm-4">
                            <label>Cantidad</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['cantidad'] ?>">
                        </div>
                        <div class="col-sm-4">
                            <label>Acabados</label>
                            <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI['acabados'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label>Ubicación</label>
                            <textarea class="form-control"><?php echo $mostrarI['ubi'] ?></textarea>
                        </div>
                        <div class="col-sm-12">
                            <label>Descripción</label>
                            <textarea class="form-control"><?php echo $mostrarI['descri'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <!-- Scripts y enlaces a bibliotecas -->
        <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
        <script src="../librerias/assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/sidebars.js"></script>

        <script>
            $(document).ready(function() {
                $("#btn-imprimir").on("click", function() {
                    imprimirAreaEspecifica();
                });
            });

            function imprimirAreaEspecifica() {
                var contenido = $("#printDiseno").html();
                var ventana = window.open('', 'Imprimir', 'height=800,width=600');
                var opcionesImpresion = {
                    orientation: "landscape"
                };
                ventana.document.write('<html><head><title>Impresión</title>');
                ventana.document.write('</head><body>');
                ventana.document.write(contenido);
                ventana.document.write('</body></html>');
                ventana.print(opcionesImpresion);
                ventana.document.close();
            }
        </script>
    </body>

    </html>
<?php
} else {
    header("location:../index.php");
}
?>
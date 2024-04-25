<?php
session_start();
if (isset($_SESSION['usuario'], $_SESSION['priv'])) {
    require_once "../clases/Conexion.php";
    $c = new conectar();
    $conexion = $c->conexion();
    // Obtén la URL actual
    $pagina_actual = basename($_SERVER['PHP_SELF']);
    include('includes/headers.php');
    include('includes/menu.php');
?>
    <?php

    $nik = mysqli_real_escape_string($conexion, (strip_tags($_GET["nik"], ENT_QUOTES)));

    $sql = ("SELECT 
    ser.id_servicios, u.nombre, cli.nombre, cli.email, cli.telefono, ser.fec_entrega, ser.fol_dis, ser.servicios, ser.document, ser.ubicacion, ser.esp, ser.anticipo, ser.estado, ser.fechaSErvicio
            FROM servicios AS ser 
            INNER JOIN clientes AS cli
            ON ser.id_cliente = cli.id_cliente
            INNER JOIN usuarios AS u
            ON ser.id_usuario = u.id_usuario
            where ser.id_servicios = $nik ");
    $result = mysqli_query($conexion, $sql);
    while ($mostrar = mysqli_fetch_row($result)) {
    ?>
        <style>
            @media print {
                #btn-imprimir {
                    display: none;
                }
            }
        </style>

        <div id="printImpresion">
            <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
            <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
            <div class="row" text-center>
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <h3>ORDEN DE IMPRESIÓN</h3>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <img src="../img/cid.png" width="300" />
                </div>
                <div class="col-sm-6">
                </div>
                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-header text-center">
                            NOTA DE IMPRESIÓN
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Folio # <?php echo $mostrar[0]; ?></li>
                            <li class="list-group-item">Fecha - <?php echo $mostrar[13]; ?></li>
                            <?php
                            if ($mostrar[6] != '0') { ?>
                                <li class="list-group-item">Folio DIS # <?php echo $mostrar[6]; ?></li>
                        </ul>
                    <?php } else { ?>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <div class="card card-body ">
                <div class="row">
                    <div class="col-sm-4">
                        <label>Cliente</label>
                        <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[2]; ?>">
                    </div>
                    <div class="col-sm-4">
                        <label>Correo</label>
                        <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[3]; ?>">
                    </div>
                    <div class="col-sm-4">
                        <label>Teléfono</label>
                        <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[4]; ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-8">
                        <label>Servicios</label>
                        <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[7]; ?>">
                    </div>
                    <div class="col-sm-2">
                        <label>Fecha de entrega</label>
                        <input type="date" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[5]; ?>">
                    </div>
                    <div class="col-sm-2">
                        <label>Usuario</label>
                        <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[1]; ?>">
                    </div>
                    <P></P>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label>Especificaciones</label>
                        <textarea class="form-control form-control-sm input-sm" aria-label="With textarea" rows="5"><?php echo $mostrar[10]; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label>Documentos</label>
                        <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[8]; ?>">
                    </div>
                    <div class="col-sm-6">
                        <label>Ubicación</label>
                        <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[9]; ?>">
                    </div>
                    <div class="col-sm-2">
                        <label>Anticipo</label>
                        <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[11]; ?>">
                    </div>
                    <div class="col-sm-2">
                        <label>Estado</label>
                        <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[12]; ?>">
                    </div>
                </div>
            </div>
            <p></p>
            <button type="button" class="btn btn-dark" id="btn-imprimir">Imprimir</button>

        <?php
    }
        ?>
        <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" />
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
                var contenido = $("#printImpresion").html();
                var ventana = window.open('', 'Imprimir', 'height=800,width=600');
                var opcionesImpresion = {
                    orientation: "landscape"
                };
                ventana.document.write('<html><head><title>Impresión</title>');
                ventana.document.write('</head><body>');
                ventana.document.write(contenido);
                ventana.document.write('</body></html>');
                ventana.print(opcionesImpresion); // Aquí se imprime con las opciones
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
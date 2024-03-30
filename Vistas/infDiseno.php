<?php
session_start();
if (isset($_SESSION['usuario'], $_SESSION['priv'])) {
    require_once "../clases/Conexion.php";
    $c = new conectar();
    $conexion = $c->conexion();
    $pagina_actual = basename($_SERVER['PHP_SELF']);
    include('includes/headers.php');
    include('includes/menu.php');
?>
    <?php

    $nik = mysqli_real_escape_string($conexion, (strip_tags($_GET["nik"], ENT_QUOTES)));

    $sql = ("SELECT 
    o.id_orden, u.nombre, c.nombre, c.email, c.telefono,  o.ttrabajo, o.fecha_entrega, o.medida, o.material, o.formato, o.descripcion_, o.notas, o.tarchivos, o.ubi, o.acabados, o.fecha_imp, o.descri, o.disenador, 
    o.pro, o.estado, o.fechaOrden
            FROM orden AS o          
            INNER JOIN clientes AS c
            ON o.id_cliente = c.id_cliente
            INNER JOIN usuarios AS u
            ON o.id_usuario = u.id_usuario
            where o.id_orden = $nik ");
    $result = mysqli_query($conexion, $sql);
    while ($mostrarI = mysqli_fetch_row($result)) {


    ?>
        <div class="container text-center" id="printDiseno">
            <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
            <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                @media print {
                    #btn-imprimir {
                        display: none;
                    }
                }
            </style>
        <div class="row">
                <div class="col-sm-4">
                    <img src="../img/cid.png" width="300" />
                </div>
                <div class="col-sm-4">
                  
                    <h3>ORDEN DE DISEÑO</h3>
                </div>
                <div class="col-sm-4">
                <button id="btn-imprimir">Imprimir</button>
                <h3>Folio diseño # <?php echo $mostrarI[0] ?></h3>
                </div>
            </div>    
        

        <div class="card card-body ">
            <div class="row">
                <div class="col-sm-4">
                    <label>Cliente</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[2] ?>">
                </div>
                <div class="col-sm-4">
                    <label>Correo</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[3] ?>">
                </div>
                <div class="col-sm-4">
                    <label>Teléfono</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[4] ?>">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-2">
                    <label>Diseño</label>
                    <input type="date" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[6] ?>">
                </div>
                <div class="col-sm-2">
                    <label>Impresión</label>
                    <input type="date" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[15] ?>">
                </div>

                <div class="col-sm-2">
                    <label>Estado</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[19] ?>">
                </div>
                <div class="col-sm-2">
                    <label>Usuario</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[1] ?>">
                </div>
                <div class="col-sm-2">
                    <label>Diseñador</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[17] ?>">
                </div>
                <div class="col-sm-2">
                    <label>Proveedor</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[18] ?>">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <label>Trabajo</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[5] ?>">
                </div>
                <div class="col-sm-3">
                    <label>Medida</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[7] ?>">
                </div>
                <div class="col-sm-3">
                    <label>Material</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[8] ?>">
                </div>
                <div class="col-sm-3">
                    <label>Formato</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[9] ?>">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label>Descripción</label>
                    <textarea class="form-control"><?php echo $mostrarI[10] ?></textarea>
                    
                </div>
                <div class="col-sm-6">
                    <label>Notas</label>
                    <textarea class="form-control"><?php echo $mostrarI[11] ?></textarea>
                                    </div>
            </div>


            <div class="row">
                <div class="col-sm-2">
                    <label>Tipo de archivo</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[12] ?>">
                </div>
                <div class="col-sm-6">
                    <label>Ubicación</label>
                    <input type="text" class="form-control form-control-sm" value="<?php echo $mostrarI[13] ?>">
                </div>
                <div class="col-sm-4">
                    <label>Acabados</label>
                    <input type="text" class="form-control form-control-sm input-sm" value="<?php echo $mostrarI[14] ?>">
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <label>Descripción</label>
                    <textarea class="form-control"><?php echo $mostrarI[16] ?></textarea>
                    
                </div>

            </div>
        </div>






        </div>


    <?php
    }
    ?>











    <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>

    <script src="../librerias/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sidebars.js"></script>
    </body>

    </html>
    <script>
        $(document).ready(function() {
            $('#iddatatableServicios').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json"
                }
            });

        });
    </script>
    <script type="text/javascript">
        function agregaFrmEditarS(idservicios) {
            $.ajax({
                type: "POST",
                data: "idservicios=" + idservicios,
                url: "../procesos/servicios/mostrarServicio.php",
                success: function(r) {
                    dato = jQuery.parseJSON(r);

                    $('#id_serviciosU').val(dato['id_servicios']);
                    $('#id_clienteU').val(dato['id_cliente']);
                    $('#fec_entregaU').val(dato['fec_entrega']);
                    $('#fecha_entregaU').val(dato['fecha_entrega']);
                    $('#serviciosU').val(dato['servicios']);
                    $('#documentU').val(dato['document']);
                    $('#ubicacionU').val(dato['ubicacion']);
                    $('#espU').val(dato['esp']);
                    $('#statusU').val(dato['estado']);

                }
            });
        }
    </script>
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
                ventana.print(opcionesImpresion); // Aquí se imprime con las opciones
                ventana.document.close();
            }
        </script>









<?php
} else {
    header("location:../index.php");
}
?>
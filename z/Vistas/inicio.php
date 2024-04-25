<?php
session_start();
if (isset($_SESSION['usuario'], $_SESSION['priv'])) {
    require_once "../clases/Conexion.php";
    $c = new conectar();
    $conexion = $c->conexion();
  
    $pagina_actual = basename($_SERVER['PHP_SELF']);
    include('includes/headers.php');
    include('includes/menu.php');

    $colores = [
        'PENDIENTE' => 'gris',
        'IMPRESIÓN' => 'amarillo',
        'ACABADOS' => 'verde',
        'ENTREGADO' => 'azul',
        'RETENIDO' => 'rojo',
        'DISEÑO' => 'naranja',
        'VoBo' => 'amarillo',
        'PRODUCCIÓN' => 'verde',
        'FINALIZADO' => 'azul',
    ];

    $modalDIS = [
        'PENDIENTE' => 'pendienteD',
        'RETENIDO' => 'retenido',
        'DISEÑO' => 'diseno',
        'VoBo' => 'vobo',
        'PRODUCCIÓN' => 'produccion',
        'FINALIZADO' => 'finalizado',
    ];

    $estadosIMP = ['PENDIENTE', 'IMPRESIÓN', 'ACABADOS', 'ENTREGADO'];
    $totalesIMP = [];

    foreach ($estadosIMP as $estado) {
        $sql = "SELECT estado FROM servicios WHERE estado = '$estado'";
        $query = mysqli_query($conexion, $sql);
        $totalesIMP[$estado] = mysqli_num_rows($query);
    }

    $estadosDIS = ['PENDIENTE', 'RETENIDO', 'DISEÑO', 'VoBo', 'PRODUCCIÓN', 'FINALIZADO'];
    $totalesDIS = [];

    foreach ($estadosDIS as $estado) {
        $sql = "SELECT estado FROM orden WHERE estado = '$estado'";
        $query = mysqli_query($conexion, $sql);
        $totalesDIS[$estado] = mysqli_num_rows($query);
    }
?>

    <div class="card">
        <div class="card-header text-center">
            <h3>INFORME IMPRESIONES</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($estadosIMP as $estadoIMP) : ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-<?php echo $colores[$estadoIMP]; ?> text-white text-center mb-4">
                            <div class="card-body">
                                <h3><?php echo strtoupper($estadoIMP); ?></h3>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="col-md-6">
                                    <h2><?php echo $totalesIMP[$estadoIMP]; ?></h2>
                                </div>
                                <div class="col-md-6">
                                    <a href="" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?php echo ucfirst(strtolower($estadoIMP)); ?>">Ver detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <p></p>
    <div class="card">
        <div class="card-header text-center">
            <h3>INFORME DISEÑO</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <?php foreach ($estadosDIS as $estado) : ?>
                    <div class="col-xl-3 col-md-6 center">
                        <div class="card bg-<?php echo $colores[$estado]; ?> text-white text-center mb-4">
                            <div class="card-body">
                                <h3><?php echo strtoupper($estado); ?></h3>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="col-md-6">
                                    <h3><?php echo $totalesDIS[$estado]; ?></h3>
                                </div>
                                <div class="col-md-6">
                                    <a href="" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?php echo $modalDIS[$estado]; ?>">Ver detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php

    $statuses = [
        'PENDIENTE' => ['title' => 'PENDIENTES', 'class' => ' bg-gris text-bg-danger'],
        'IMPRESIÓN' => ['title' => 'EN IMPRESIÓN', 'class' => 'bg-amarillo text-bg-danger'],
        'ACABADOS' => ['title' => 'ACABADOS', 'class' => 'bg-verde text-bg-danger'],
        'ENTREGADO' => ['title' => 'ENTREGADOS', 'class' => 'bg-azul text-bg-danger'],
    ];


    foreach ($statuses as $status => $data) {
    ?>

        <div class="modal fade" id="modal<?php echo ucfirst(strtolower($status)); ?>" tabindex="-1" aria-labelledby="modal<?php echo ucfirst(strtolower($status)); ?>" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal<?php echo ucfirst(strtolower($status)); ?>"><?php echo $data['title']; ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-condensed table-bordered" id="id<?php echo strtolower($status); ?>">
                            <thead style="background-color: #7D3C98;color: white; font-weight: bold;">
                                <tr>
                                    <td style="width:2%">Folio</td>
                                    <td style="width:10%">Cliente</td>
                                    <td style="width:10%">Servicio</td>
                                    <td style="width:20%">Diseño</td>
                                    <td style="width:20%">Especificaciones</td>
                                    <td style="width:10%">Entrega</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = ("SELECT ser.id_servicios, cli.nombre, ser.servicios, ser.fol_dis, ser.esp, ser.fec_entrega, ser.estado
                            FROM servicios AS ser 
                            INNER JOIN clientes AS cli
                            ON ser.id_cliente = cli.id_cliente
                            WHERE ser.estado = '$status'");
                                $result = mysqli_query($conexion, $sql);
                                while ($mSer = mysqli_fetch_row($result)) {
                                ?>
                                    <tr>
                                        <td><a href="infImpresion.php?nik=<?php echo $mSer[0]; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><?php echo $mSer[0]; ?></a></td>
                                        <td><?php echo $mSer[1]; ?></td>
                                        <td><?php echo $mSer[2]; ?></td>
                                        <td><?php echo $mSer[3]; ?></td>
                                        <td><?php echo $mSer[4]; ?></td>
                                        <td><?php echo $mSer[5]; ?></td>

                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>


    <?php

    $modals = array(
        array("id" => "modalpendienteD", "titulo" => "PENDIENTES", "estado" => "PENDIENTE"),
        array("id" => "modalretenido", "titulo" => "EN RETENIDO", "estado" => "RETENIDO"),
        array("id" => "modaldiseno", "titulo" => "EN DISEÑO", "estado" => "DISEÑO"),
        array("id" => "modalvobo", "titulo" => "EN Vo. Bo.", "estado" => "VoBo"),
        array("id" => "modalproduccion", "titulo" => "EN PRODUCCIÓN", "estado" => "PRODUCCIÓN"),
        array("id" => "modalfinalizado", "titulo" => "FINALIZADOS", "estado" => "FINALIZADO")
    );

    foreach ($modals as $modal) {
        $modalID = $modal["id"];
        $modalTitulo = $modal["titulo"];
        $modalEstado = $modal["estado"];
    ?>


        <div class="modal fade" id="<?php echo $modalID; ?>" tabindex="-1" aria-labelledby="<?php echo $modalID; ?>" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="<?php echo $modalID; ?>"><?php echo $modalTitulo; ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-condensed table-bordered" id="id<?php echo $modalEstado; ?>">
                            <thead style="background-color: #dc3545;color: white; font-weight: bold;">
                                <tr>
                                    <td style="width:2%">Folio</td>
                                    <td style="width:15%">Cliente</td>
                                    <td style="width:25%">Trabajo</td>
                                    <td style="width:10%">Entrega</td>
                                    <td style="width:10%">Diseñador</td>
                                    <td style="width:10%">Proveedor</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT ord.id_orden, c.nombre, ord.ttrabajo, ord.fecha_entrega, ord.disenador, ord.pro, ord.estado
                                    FROM orden AS ord
                                    INNER JOIN clientes AS c
                                    ON ord.id_cliente = c.id_cliente
                                    WHERE ord.estado = '$modalEstado'";

                                $result = mysqli_query($conexion, $sql);

                                while ($verD = mysqli_fetch_row($result)) {
                                ?>
                                    <tr>
                                        <td><a href="infDiseno.php?nik=<?php echo $verD[0]; ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                                <?php echo $verD[0]; ?></a></td>
                                        <td><?php echo $verD[1]; ?></td>
                                        <td><?php echo $verD[2]; ?></td>
                                        <td><?php echo $verD[3]; ?></td>
                                        <td><?php echo $verD[4]; ?></td>
                                        <td><?php echo $verD[5]; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <?php
    }
    ?>


    </body>
    <?php
    include('includes/librerias.php');

    ?>
    <script>
        $(document).ready(function() {
            var tableIds = [
                <?php

                $estados = ["Pendiente", "Impresion", "Acabados", "Entregados", "pendientesDiseno", "Retenido", "Diseno", "Vobo", "produccion", "finalizado"];
                foreach ($estados as $estado) {
                    echo "'#id$estado', ";
                }
                ?>
            ];

            for (var i = 0; i < tableIds.length; i++) {
                initializeDataTable(tableIds[i]);
            }
        });

        // Función para inicializar la tabla DataTable
        function initializeDataTable(tableIds) {
            $(tableIds).DataTable({
                "info": true,
                scrollY: '650px',
                scrollCollapse: true,
                paging: true,
                "ordering": true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json"
                }
            });
        }
    </script>




    </html>

<?php
} else {
    header("location:../index.php");
}
?>
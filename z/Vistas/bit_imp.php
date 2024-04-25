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
    <style>
        .centrar {
            text-align: center;
        }
    </style>
    <p></p>
    <div class="card">
        <div class="card-header text-center">
            <h3>BITACORA DE IMPRESIÓN</h3>
        </div>

        <div class="card-body">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="col-sm-8">
                            <form class="form-inline" method="get">
                                <div class="form-group">
                                    <select name="filter" class="form-control form-control-sm" onchange="form.submit()">
                                        <option value="1">SELECIONAR ESTADO</option>
                                        <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                                        <option value="0">ACTIVOS</option>
                                        <option value="PENDIENTE">PENDIENTE</option>
                                        <option value="IMPRESION">IMPRESIÓN</option>
                                        <option value="ACABADOS">ACABADOS</option>
                                        <option value="ENTREGADO">ENTREGADO</option>
                                    </select>

                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover table-condensed table-bordered" id="iddatatableServicios">
                        <thead style="background-color: #7D3C98;color: white; font-weight: bold;">
                            <tr>
                                <td width="2%">IMP <br> DIS</td>
                                <td width="10%">Cliente</td>
                                <td width="10%">Servicio</td>
                                <td width="14%">Especificaiones</td>
                                <td width="3%">Entrega</td>
                                <td width="1%">Estado</td>
                                <td width="3%">Editar</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $filter = (isset($_GET['filter']) ? $_GET['filter'] : NULL);

                            $sql = "SELECT ser.id_servicios, cli.nombre, ser.servicios, ser.fol_dis, ser.esp, ser.fec_entrega, ser.estado
    FROM servicios AS ser 
    INNER JOIN clientes AS cli ON ser.id_cliente = cli.id_cliente";

                            if ($filter) {
                                $sql .= " WHERE ser.estado = ?";
                            } else {
                                $sql .= " WHERE ser.estado != 'Entregado'";
                            }

                            $stmt = $conexion->prepare($sql);
                            if ($filter) {
                                $stmt->bind_param("s", $filter);
                            }
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($mSer = $result->fetch_row()) {

                                $currentDate = date("Y-m-d");
                                $entregaDate = $mSer[5];
                                $diff = strtotime($entregaDate) - strtotime($currentDate);
                                $daysRemaining = floor($diff / (60 * 60 * 24));
                                if ($daysRemaining < 0) {
                                    $daysRemaining = '<span class="badge badge-rojo text-bg-danger">Vencido</span>';
                                } elseif ($daysRemaining == 1) {
                                    $daysRemaining = '<span class="badge badge-amarillo text-bg-warning">' . $daysRemaining . ' día</span>';
                                } else {
                                    $daysRemaining = '<span class="badge badge-verde text-bg-danger">' . $daysRemaining . ' días</span>';
                                }
                            ?>
                                <tr>
                                    <td>
                                        <?php
                                        if ($mSer[3] == '0') {
                                            echo 'IMP -<a href="infImpresion.php?nik=' . $mSer[0] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . $mSer[0] . '</a>';
                                        } else {
                                            echo 'IMP -<a href="infImpresion.php?nik=' . $mSer[0] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . $mSer[0] . '</a> <br>
                                            DIS -<a href="infDiseno.php?nik=' . $mSer[3] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . $mSer[3] . '</a>';
                                        }
                                        ?>
                                    <td><?php echo $mSer[1] ?></td>
                                    <td><?php echo $mSer[2] ?></td>
                                    <td><?php echo $mSer[4] ?></td>
                                    <td><?php echo $daysRemaining; ?><br> <?php echo $mSer[5] ?> </td>
                                    <td><?php
                                        if ($mSer[6] == 'PENDIENTE') {
                                            echo '<span class="badge badge-rojo text-bg-danger">PENDIENTE</span>';
                                        } else if ($mSer[6] == 'IMPRESIÓN') {
                                            echo '<span class="badge badge-naranja text-bg-danger">IMPRESIÓN</span>';
                                        } else if ($mSer[6] == 'ACABADOS') {
                                            echo '<span class="badge badge-verde text-bg-danger">ACABADOS</span>';
                                        } else if ($mSer[6] == 'ENTREGADO') {
                                            echo '<span class="badge badge-gris text-bg-danger">ENTREGADO</span>';
                                        }
                                        ?>
                                    </td>


                                    <td>
                                        <a href="" class=" btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalServicioEditar" onclick="agregaFrmEditarS('<?php echo $mSer[0] ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a>
                                        <a href="" class=" btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalServicioFinalizar" onclick="agregaFrmFinalizarS('<?php echo $mSer[0] ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                            </svg></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>



        </div>
        </body>
        <?php
        include('includes/librerias.php');
        include('includes/modal.php');
        ?>
        <script>
            $(document).ready(function() {
                $('#iddatatableServicios').DataTable({
                    "info": false,
                    scrollY: '350px',
                    scrollCollapse: true,
                    paging: false,
                    "ordering": true,
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

                        $('#id_serviciosEdit').val(dato['id_servicios']);
                        $('#id_clienteEdit').val(dato['id_cliente']);
                        $('#fec_entregaEdit').val(dato['fec_entrega']);
                        $('#fecha_entregaEdit').val(dato['fecha_entrega']);
                        $('#fol_disEdit').val(dato['fol_dis']);
                        $('#serviciosEdit').val(dato['servicios']);
                        $('#documentEdit').val(dato['document']);
                        $('#ubicacionEdit').val(dato['ubicacion']);
                        $('#anticipoEdit').val(dato['anticipo']);
                        $('#espEdit').val(dato['esp']);
                        $('#estadoEdit').val(dato['estado']);

                    }
                });
            }
        </script>
        <script type="text/javascript">
            function agregaFrmFinalizarS(idservicios) {
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
                        $('#fol_disU').val(dato['fol_dis']);
                        $('#serviciosU').val(dato['servicios']);
                        $('#documentU').val(dato['document']);
                        $('#ubicacionU').val(dato['ubicacion']);
                        $('#espU').val(dato['esp']);
                        $('#estadoU').val(dato['estado']);

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
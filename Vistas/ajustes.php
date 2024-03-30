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

                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-condensed table-bordered" id="iddatatableServicios">
                <thead style="background-color: #7D3C98;color: white; font-weight: bold;">
                    <tr>
                        <td width="2%">IMP <br> DIS</td>
                        <td width="1%">Estado</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT ser.id_servicios, ser.fol_dis, ser.estado
                            FROM servicios AS ser ";
                    $sql .= " WHERE ser.estado = ser.estado";

                    $stmt = $conexion->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($mSer = $result->fetch_array(MYSQLI_NUM)) {
                    ?>
                        <tr>
                            <td>
                                <?php
                                if ($mSer[1] == '0') {
                                    echo 'IMP -<a href="ai.php?nik=' . $mSer[0] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . $mSer[0] . '</a>';
                                } else {
                                    echo 'IMP -<a href="ai.php?nik=' . $mSer[0] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . $mSer[0] . '</a> <br>
                                            DIS -<a href="ad.php?nik=' . $mSer[1] . '"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>' . $mSer[1] . '</a>';
                                }
                                ?>
                            </td>
                            <td><?php
                                if ($mSer[2] == 'PENDIENTE') {
                                    echo '<span class="badge badge-rojo text-bg-danger">PENDIENTE</span>';
                                } else if ($mSer[2] == 'IMPRESIÓN') {
                                    echo '<span class="badge badge-naranja text-bg-danger">IMPRESIÓN</span>';
                                } else if ($mSer[2] == 'ACABADOS') {
                                    echo '<span class="badge badge-verde text-bg-danger">ACABADOS</span>';
                                } else if ($mSer[2] == 'ENTREGADO') {
                                    echo '<span class="badge badge-gris text-bg-danger">ENTREGADO</span>';
                                }
                                ?>
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
                "ordering": false,
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

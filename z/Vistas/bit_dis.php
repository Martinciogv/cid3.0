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
    <style>
        .centrar {
            text-align: center;
        }
    </style>

    <p></p>

    <div class="card">
        <div class="card-header text-center">
            <h3>BITACORA DE DISEÑO</h3>
        </div>

        <div class="card-body">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-3">
                        <form class="form-inline" method="get">
                            <div class="form-group">
                                <select name="filter" class="form-control form-control-sm" onchange="form.submit()">
                                    <option value="0">SELECIONAR ESTADO</option>
                                    <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                                    <option value="0">ACTIVOS </option>
                                    <option value="PENDIENTE">PENDIENTE</option>
                                    <option value="RETENIDO">RETENIDO</option>
                                    <option value="DISEÑO">DISEÑO</option>
                                    <option value="VOBO">Vo.Bo.</option>
                                    <option value="PRODUCCIÓN">PRODUCCIÓN </option>
                                    <option value="FINALIZADO"> FINALIZADO </option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-hover table-condensed table-bordered table table-sm" id="idbitacoraDiseno">
                    <thead style="background-color: #dc3545;color: white; font-weight: bold;">
                        <tr>
                            <td style="width:1%">Folio</td>
                            <td style="width:7%">Cliente</td>
                            <td style="width:9%">Trabajo</td>
                            <td style="width:2%">Entrega</td>
                            <td style="width:1%">Diseñador</td>
                            <td style="width:1%">Proveedor</td>
                            <td style="width:1%">Estado</td>
                            <td style="width:2%">Editar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($filter) {
                            $sql = "SELECT ord.id_orden, c.nombre, ord.ttrabajo, ord.fecha_entrega, ord.disenador, ord.pro, ord.estado
                        FROM orden AS ord
                        INNER JOIN clientes AS c
                        ON ord.id_cliente = c.id_cliente  WHERE ord.estado = '$filter' ";
                        } else {
                            $sql = "SELECT ord.id_orden, c.nombre, ord.ttrabajo, ord.fecha_entrega, ord.disenador, ord.pro, ord.estado
                            FROM orden AS ord
                            INNER JOIN clientes AS c
                            ON ord.id_cliente = c.id_cliente WHERE ord.estado != 'FINALIZADO'";
                        }
                        $result = mysqli_query($conexion, $sql);

                        while ($verD = mysqli_fetch_row($result)) {
                            $currentDate = date("Y-m-d");
                            $entregaDate = $verD[3];
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
                                <td><a href="infDiseno.php?nik=<?php echo $verD[0] ?>"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        <?php echo $verD[0] ?></a></td>
                                <td><?php echo $verD[1] ?></td>
                                <td><?php echo $verD[2] ?></td>
                                <td><?php echo $daysRemaining; ?><br> <?php echo $verD[3] ?> </td>

                                <td><?php echo $verD[4] ?></td>
                                <td><?php echo $verD[5] ?></td>
                                <td><?php
                                    if ($verD[6] == 'PROCESO') {
                                        echo '<span class="badge badge-gris text-bg-danger">PENDIENTE</span>';
                                    } else if ($verD[6] == 'PENDIENTE') {
                                        echo '<span class="badge badge-gris text-bg-danger">PENDIENTE</span>';
                                    } else if ($verD[6] == 'RETENIDO') {
                                        echo '<span class="badge badge-rojo text-bg-danger">RETENIDO</span>';
                                    } else if ($verD[6] == 'DISEÑO') {
                                        echo '<span class="badge badge-naranja text-bg-danger">DISEÑO</span>';
                                    } else if ($verD[6] == 'VoBo') {
                                        echo '<span class="badge badge-amarillo text-bg-danger">Vo.Bo.</span>';
                                    } else if ($verD[6] == 'PRODUCCIÓN') {
                                        echo '<span class="badge badge-verde text-bg-danger">PRODUCCIÓN</span>';
                                    } else if ($verD[6] == 'FINALIZADO') {
                                        echo '<span class="badge badge-azul text-bg-danger">FINALIZADO</span>';
                                    }

                                    ?>
                                </td>

                                <td style="text-align: center;">
                                    <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalDisenoEditar" onclick="agregaFrmEditar('<?php echo $verD[0] ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg></a>
                                    <a href="" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalDisenoEnviar" onclick="agregaFrmEnviar('<?php echo $verD[0] ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                                            <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z" />
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

    <?php
    include('includes/modal.php');

    ?>


    <script type="text/javascript">
        function agregaFrmEditar(idorden) {
            $.ajax({
                type: "POST",
                data: "idorden=" + idorden,
                url: "../procesos/diseno/mostrarOrden.php",
                success: function(r) {
                    dato = jQuery.parseJSON(r);

                    $('#idordenE').val(dato['id_orden']);
                    $('#id_usuarioE').val(dato['id_usuario']);
                    $('#id_clienteE').val(dato['id_cliente']);
                    $('#ttrabajoE').val(dato['ttrabajo']);
                    $('#medidaE').val(dato['medida']);
                    $('#materialE').val(dato['material']);
                    $('#cantidadE').val(dato['cantidad']);
                    $('#f_salidaE').val(dato['f_salida']);
                    $('#formatE').val(dato['format']);
                    $('#descripcion_E').val(dato['descripcion_']);
                    $('#notasE').val(dato['notas']);
                    $('#tarchivosE').val(dato['tarchivos']);
                    $('#ubiE').val(dato['ubi']);
                    $('#acabadosE').val(dato['acabados']);
                    $('#fecha_entregE').val(dato['fecha_entrega']);
                    $('#fecha_impE').val(dato['fecha_imp']);
                    $('#descriE').val(dato['descri']);
                    $('#disenaE').val(dato['disena']);
                    $('#proE').val(dato['pro']);
                    $('#estadoE').val(dato['estado']);
                    $('#fechaOrdenE').val(dato['fechaOrden']);

                }
            });
        }

        function agregaFrmEnviar(idorden) {
            $.ajax({
                type: "POST",
                data: "idorden=" + idorden,
                url: "../procesos/diseno/mostrarOrden.php",
                success: function(r) {
                    dato = jQuery.parseJSON(r);

                    $('#idordenEN').val(dato['id_orden']);
                    $('#id_usuarioEN').val(dato['id_usuario']);
                    $('#id_clienteEN').val(dato['id_cliente']);
                    $('#ttrabajoEN').val(dato['ttrabajo']);
                    $('#medidaEN').val(dato['medida']);
                    $('#materialEN').val(dato['material']);
                    $('#cantidadEN').val(dato['cantidad']);
                    $('#f_salidaEN').val(dato['f_salida']);
                    $('#formatEN').val(dato['format']);
                    $('#descripcion_EN').val(dato['descripcion_']);
                    $('#notasEN').val(dato['notas']);
                    $('#tarchivosEN').val(dato['tarchivos']);
                    $('#ubiEN').val(dato['ubi']);
                    $('#acabadosEN').val(dato['acabados']);
                    $('#fecha_entregEN').val(dato['fecha_entrega']);
                    $('#fecha_impEN').val(dato['fecha_imp']);
                    $('#descriEN').val(dato['descri']);
                    $('#disenaEN').val(dato['disena']);
                    $('#proEN').val(dato['pro']);
                    $('#estadoEN').val(dato['estado']);
                    $('#fechaOrdenEN').val(dato['fechaOrden']);

                }
            });
        }
    </script>



    </body>
    <?php
    include('includes/librerias.php');
    ?>
    <script>
        $(document).ready(function() {
            $('#idbitacoraDiseno').DataTable({
                "info": false,
                scrollY: '650px',
                scrollCollapse: true,
                paging: false,
                "ordering": true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json"
                }
            });
        });
    </script>

    </html>
<?php
} else {
    header("location:../index.php");
}
?>
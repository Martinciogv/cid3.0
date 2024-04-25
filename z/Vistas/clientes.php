<?php
session_start();
if (isset($_SESSION['usuario'], $_SESSION['priv'])) {
    require_once "../clases/Conexion.php";
    $c = new conectar();
    $conexion = $c->conexion();
    $sql = "SELECT `id_cliente`, `nombre`, `email`, `telefono`, `ocupacion`, `fecha_cumple` FROM `clientes`";
    $result = mysqli_query($conexion, $sql);

    // Obtén la URL actual
    $pagina_actual = basename($_SERVER['PHP_SELF']);
    include('includes/headers.php');
    include('includes/menu.php');

?>
    <p></p>

    <div class="card">
        <div class="card-header text-center">
            <h3>Administrador de clientes</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                    <form action="../procesos/clientes/regCliente.php" method="POST" autocomplete="off">
                        <H4>NUEVO CLIENTE</H4>
                        <label>Nombre</label>
                        <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" required="">
                        <label>Email</label>
                        <input type="text" class="form-control form-control-sm" id="email" name="email">
                        <label>Telefono</label>
                        <input type="text" class="form-control form-control-sm" id="telefono" name="telefono" required="">
                        <label>Ocupación</label>
                        <input type="text" class="form-control form-control-sm" id="ocupacion" name="ocupacion">
                        <label>Fecha de cumpleaños</label>
                        <input type="date" name="fecha_cumple" class="form-control form-control-sm">
                        <p></p>
                        <input type="submit" name="guardarCliente" class="btn btn-success btn-block" value="Guardar">
                    </form>
                </div>

                <div class="col-sm-9">
                    <table class="table table-hover table-condensed table-bordered" id="tablaClientes">
                        <thead style="background-color: #dc3545;color: white; font-weight: bold;">
                            <tr>
                                <td style="width: 2%">Id</td>
                                <td style="width: 30%;">Nombre</td>
                                <td style="width: 10%;">E-mail</td>
                                <td style="width: 10%;">Telefono</td>
                                <td style="width: 10%;">Ocupacion</td>
                                <td style="width: 10%;">Cumpleaños</td>
                                <td style="width: 10%;">Editar</td>
                                <?php
                                if ($_SESSION['priv'] == "1" || $_SESSION['priv'] == "2") :
                                ?>

                                    <td style="width: 10%;">Eliminar</td>
                                <?php
                                endif;
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($mos = mysqli_fetch_row($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $mos[0] ?></td>
                                    <td><?php echo $mos[1] ?></td>
                                    <td><?php echo $mos[2] ?></td>
                                    <td><?php echo $mos[3] ?></td>
                                    <td><?php echo $mos[4] ?></td>
                                    <td><?php echo $mos[5] ?></td>
                                    <td style="text-align: center;">
                                        <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarCliente" onclick="obtenDatosCliente('<?php echo $mos[0] ?>')">Editar</a>
                                    </td>
                                    <?php
                                    if ($_SESSION['priv'] == "1" || $_SESSION['priv'] == "2") :
                                    ?>
                                        <td style="text-align: center;">
                                            <a href="../procesos/clientes/eliminarClientes.php?id_cliente=<?php echo $mos['0'] ?>" class="btn btn-sm btn-danger">Eliminar
                                                <i class="far fa-trash-alt"></i>
                                        </td>
                                </tr>
                            <?php
                                    endif;
                            ?>

                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            </body>
            <?php
            include('includes/modal.php');
            include('includes/librerias.php');
            ?>

            <script>
                $(document).ready(function() {
                    $('#tablaClientes').DataTable({
                        "info": false,
                        scrollY: '400px',
                        scrollCollapse: true,
                        paging: false,
                        "language": {
                            "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json"
                        }
                    });
                });
            </script>

            <script type="text/javascript">
                function obtenDatosCliente(idcliente) {
                    $.ajax({
                        type: "POST",
                        data: "idcliente=" + idcliente,
                        url: "../procesos/clientes/mostrarclientes.php",
                        success: function(r) {
                            dato = jQuery.parseJSON(r);
                            $('#idclienteUp').val(dato['id_cliente']);
                            $('#nombreUp').val(dato['nombre']);
                            $('#emailUp').val(dato['email']);
                            $('#telefonoUp').val(dato['telefono']);
                            $('#ocupacionUp').val(dato['ocupacion']);
                            $('#fecha_cumpleUp').val(dato['fecha_cumple']);

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
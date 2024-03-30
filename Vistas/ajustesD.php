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
            <h3>AJUSTES</h3>
        </div>
        <div class="column column center">
            <div class="row">

                <div class="col-sm-2">
                    <H4>DISEÑO</H4>
                    <label>ID</label>
                    <input type="text" class="form-control input-sm" id="ID_dis" name="ID_dis">
                    <label>CLIENTE</label>
                    <input type="text" class="form-control input-sm" id="CLI_dis" name="CLI_dis">
                    <p></p>
                    <div class="">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                    </div>
                </div>

                <div class="col-sm-8">
                    <table class="table table-hover table-condensed table-bordered table table-sm" id="idbitacoraDiseno">
                        <thead style="background-color: #dc3545;color: white; font-weight: bold;">
                            <tr>
                                <td >F</td>
                                <td >U</td>
                                <td >C</td>
                                <td >T</td>
                                
                              
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT `id_orden`, `id_usuario`, `id_cliente`, `ttrabajo`, `medida`, `material`, `cantidad`,
                                            `f_salida`, `formato`, `descripcion_`, `notas`, `tarchivos`, `ubi`, `acabados`, `fecha_entrega`, `fecha_imp`,
                                            `descri`, `disenador`, `pro`, `estado`, `fechaOrden`
                                            FROM orden";
                            $result = mysqli_query($conexion, $sql);

                            while ($verD = mysqli_fetch_row($result)) {
                            ?>
                                <tr>
                                <td><?php echo $verD[0] ?></td>
                                    <td><?php echo $verD[1] ?></td>
                                    <td><?php echo $verD[2] ?></td>
                                    <td><?php echo $verD[3] ?></td>
                                    
                                    
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            </body>
            <?php
            include('includes/librerias.php');
            include('includes/modal.php');
            ?>

            </html>

        <?php
    } else {
        header("location:../index.php");
    }
        ?>
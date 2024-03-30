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
    ser.id_servicios, u.nombre, cli.nombre, cli.email, cli.telefono, ser.fec_entrega, ser.fol_dis, ser.servicios, ser.document, ser.ubicacion, ser.esp, ser.anticipo, ser.estado
    FROM servicios AS ser 
    INNER JOIN clientes AS cli
    ON ser.id_cliente = cli.id_cliente
    INNER JOIN usuarios AS u
    ON ser.id_usuario = u.id_usuario
    where ser.id_servicios = $nik ");
$result = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_row($result)) {
?>

<div class="container text-center" id="printImpresion">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="row">
        <div class="col-sm-4">
            <img src="../img/cid.png" width="300" />
        </div>
        <div class="col-sm-4">
            <h3></h3>
            <h3>ORDEN DE IMPRESIÓN</h3>
        </div>
        <div class="col-sm-4">

            <h3>Folio impresión #<?php echo $mostrar[0]; ?></h3>
            <?php
            if ($mostrar[6] != '0') { ?>
                <h3>Folio diseño #<?php echo $mostrar[6]; ?></h3>
            <?php } else { ?>
            <?php } ?>
        </div>
    </div>

    <form action="../procesos/servicios/actI.php" method="POST" autocomplete="off">
        <div class="card card-body ">
            <div class="row">
                <div class="col-sm-4">
                    <input type="hidden" name="id_servicio" value="<?php echo $mostrar[0]; ?>">
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
            </div>
            <p></p>
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
                    <select name="estadoEdit" id="estadoEdit" class="form-control form-control-sm input-sm" value="<?php echo $mostrar[12]; ?>">
                        <option value="PENDIENTE">PENDIENTE</option>
                        <option value="IMPRESIÓN">IMPRESIÓN</option>
                        <option value="ACABADOS">ACABADOS</option>
                        <option value="ENTREGADO">ENTREGADO</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <?php
    }
    ?>
        </form>
        <link href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet" />
        <script src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>

        <script src="../librerias/assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../js/sidebars.js"></script>
        </body>
        </html>

    <?php
} else {
    header("location:../index.php");
}
?>

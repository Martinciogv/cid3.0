<?php
session_start();
if (isset($_SESSION['usuario'], $_SESSION['priv'])) {
require_once "../clases/Conexion.php";
$c = new conectar();
$conexion = $c->conexion();

$sql="SELECT `id_usuario`, `nombre`, `password`, `priv`, `fechaCaptura` FROM `usuarios`";
$result=mysqli_query($conexion,$sql);

// Obtén la URL actual
 $pagina_actual = basename($_SERVER['PHP_SELF']);
 include('includes/headers.php');
 include('includes/menu.php');

?>
<p></p>

<div class="card">
    <div class="card-header text-center">
        <h3>USUARIOS</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-3">
                <form action="../procesos/usuario/registrarUsuarios.php" method="POST" autocomplete="off">
                    <H4>NUEVO USUARIO</H4>
                    <label>Nombre</label>
                    <input type="text-uppercase" class="form-control form-control-sm" name="nombre" id="nombre">
                    <label>Password</label>
                    <input type="text" class="form-control form-control-sm" name="password" id="password">
                    <div class="form-group">
                        <label class="col-sm-4  control-label">Privilegio</label>
                        <div class="col-sm-12">
                            <select name="priv" class="form-control form-control-sm">
                                <option value="0">Sin definir</option>
                                <option value="1">Administrador</option>
                                <option value="2">Diseñador</option>
                                <option value="3">Ventas</option>
                                <option value="4">Soporte</option>
                            </select>
                        </div>
                    </div>
                    <p></p>
                    <input type="submit" name="save_user" class="btn btn-success btn-block" value="Guardar">
                </form>
            </div>


            <div class="col-sm-9">
                <table class="table table-hover table-condensed table-bordered" id="tablaUsuario">
                    <thead style="background-color: #dc3545;color: white; font-weight: bold;">
                        <tr>
                            <td style="width: 2%;">Id</td>
                            <td style="width: 30%;">Nombre</td>
                            <td style="width: 10%;">Privilegio</td>
                            <td style="width: 10%;">Alta</td>
                            <td style="width: 10%;">Editar</td>
                            <td style="width: 10%;">Eliminar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
			                            while ($mos=mysqli_fetch_row($result)) {
				                            ?>
                        <tr>
                            <td><?php echo $mos[0] ?></td>
                            <td><?php echo $mos[1] ?></td>
                            <td><?php
                                            if($mos[3]=='0'){
                                                echo 'Sin definir';
                                            }
                                            else if($mos[3]=='1'){
                                                echo 'Administrador';
                                            }
                                            else if($mos[3]=="2"){
                                                echo "Diseñador";
                                            }
                                            else if($mos[3]=="3"){
                                                echo "Ventas";
                                            }
                                            else if($mos[3]=="4"){
                                                echo "Soporte";
                                            }
                                            ?></td>
                            <td><?php echo $mos[4] ?></td>
                            <td style="text-align: center;">
                                <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalEditarUsuario"
                                    onclick="agregaFrmEditar('<?php echo $mos[0] ?>')">Editar</a>
                            </td>
                            <td style="text-align: center;">
                                <a href="../procesos/usuario/eliminarUsuario.php?id_usuario=<?php echo $mos['0'] ?>"
                                    class="btn btn-sm btn-danger">Eliminar
                                    <i class="far fa-trash-alt"></i>
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
include('includes/modal.php');

?>




<?php 
include('includes/librerias.php');
?>

    </html>

    <script>
    $(document).ready(function() {
        $('#tablaUsuario').DataTable({
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
    function agregaFrmEditar(idusuario) {
        $.ajax({
            type: "POST",
            data: "idusuario=" + idusuario,
            url: "../procesos/usuario/mostrarUsuario.php",
            success: function(r) {
                dato = jQuery.parseJSON(r);
                $('#idusuarioU').val(dato['id_usuario']);
                $('#nombreU').val(dato['nombre']);
                $('#privU').val(dato['priv']);

            }
        });
    }
    </script>

    <?php
} else {
    header("location:../index.php");
}
?>
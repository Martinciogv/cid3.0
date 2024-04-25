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
    <p></p>
    <div class="card">
        <div class="card-header text-center">
            <h3>ORDEN DE DISEÑO</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-sm-12">
                    <form action="../procesos/diseno/regDisenador.php" method="POST" autocomplete="off">
                        <div class="container">
                            <div class="row">

                                <div class="col-sm-4 text">
                                    <label>Selecciona Cliente</label>
                                    <div class="input-group mb-3">
                                        <button type="button" class="input-group-text" data-bs-toggle="modal" data-bs-target="#modalAgregarCliente">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                                <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                            </svg>
                                        </button>
                                        <select class="form-control form-control-sm" id="cliente" name="cliente" required>
                                            <?php

                                            $sql_last_id = "SELECT id_cliente FROM clientes ORDER BY id_cliente DESC LIMIT 1";
                                            $result_last_id = mysqli_query($conexion, $sql_last_id);
                                            $last_id_row = mysqli_fetch_assoc($result_last_id);
                                            $last_id = $last_id_row['id_cliente'];


                                            $sql = "SELECT id_cliente, nombre FROM clientes ORDER BY nombre ASC";
                                            $result = mysqli_query($conexion, $sql);
                                            while ($cliente = mysqli_fetch_assoc($result)) :
                                            ?>
                                                <option value="<?= $cliente['id_cliente'] ?>" <?= ($cliente['id_cliente'] == $last_id) ? 'selected' : '' ?>>
                                                    <?= $cliente['nombre'] ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                <div class="col-sm-6">
                                    <label>Tipo de trabajo</label>
                                    <input type="text" name="ttrabajo" class="form-control form-control-sm" placeholder="Tipo de trabajo" required>
                                </div>
                            
                            
                            </div>
                                <div class="col-sm-4 text">
                                    <label>Usuario</label>
                                    <div class="input-group mb-3">
                                        <button type="button" class="input-group-text" for="inputGroupSelect01"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg></button>
                                        <select class="form-control input-sm form-control-sm" id="usuarioD" name="usuarioD" required>
                                            <option value="<?php echo $_SESSION['iduser'] ?>">
                                                <?php echo $_SESSION['usuario'] ?>
                                            </option>
                                            <?php
                                            $sql = "SELECT id_usuario,nombre from usuarios ORDER BY nombre ASC";
                                            $result = mysqli_query($conexion, $sql);
                                            while ($usuario = mysqli_fetch_row($result)) :
                                            ?>
                                                <option value="<?php echo $usuario[0] ?>"><?php echo $usuario[1] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <p></p>

                                <hr>
                                <div class="col-sm-6">
                                    <label>Tipo de trabajo</label>
                                    <input type="text" name="ttrabajo" class="form-control form-control-sm" placeholder="Tipo de trabajo" required>
                                </div>
                                <div class="col-sm-4 text">
                                </div>
                                <div class="col-sm-2">
                                    <label>Fecha de entrega</label>
                                    <select id="fecha_entrega_dis" name="fecha_entrega_dis" class="form-control form-control-sm">
                                        <option value="<?= date("Y-m-d"); ?>">1 día</option>
                                        <option value="<?= date("Y-m-d", strtotime("+1 day")); ?>">2 días</option>
                                        <option value="<?= date("Y-m-d", strtotime("+2 day")); ?>">3 días</option>
                                        <option value="<?= date("Y-m-d", strtotime("+3 day")); ?>">4 días</option>
                                        <option value="<?= date("Y-m-d", strtotime("+4 day")); ?>">5 días</option>
                                    </select>
                                </div>
                            </div>
                            <p></p>

                            <div class="row">

                                <div class="col-sm-6">
                                    <label>Descripción del diseño</label>
                                    <textarea name="descripcion_" class="form-control form-control-sm" placeholder="Descripción" required></textarea>
                                </div>

                                <div class="col-sm-6">
                                    <label>Notas del diseño</label>
                                    <textarea name="notas" class="form-control form-control-sm" placeholder="Notas" required></textarea>
                                </div>
                            </div>
                            <p></p>
                            <div class="row">

                                <div class="col-sm-2">
                                    <label>Tipo de archivo</label>
                                    <select name="t_arc" class="form-control form-control-sm">
                                        <option value="JPG">JPG</option>
                                        <option value="PDF">PDF</option>
                                        <option value="OTROS">OTROS</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label>Ubicación</label>
                                    <select name="ubic" class="form-control form-control-sm">
                                        <option value="CARP. COMPARTIDA">CARP. COMPARTIDA</option>
                                        <option value="SERVIDOR">SERVIDOR</option>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <label>DISEÑADOR</label>
                                    <select name="disenador" class="form-control form-control-sm">
                                        <option value="S/A">S/A</option>
                                        <option value="ROGER">ROGER</option>
                                        <option value="FERNANDA">FERNANDA</option>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <label>Proveedor</label>
                                    <select name="pro" class="form-control form-control-sm">
                                        <option value="S/A">S/A</option>
                                        <option value="INTERNO">INTERNO</option>
                                        <option value="EXTERNO">EXTERNO</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label>Estado</label>
                                    <select name="estado" class="form-control form-control-sm">
                                        <option value="PENDIENTE">PENDIENTE</option>
                                        <option value="RETENIDO">RENTENIDO</option>
                                        <option value="DISEÑO">DISEÑO</option>
                                        <option value="VoBo">Vo.Bo.</option>
                                        <option value="PRODUCCIÓN">PRODUCCIÓN</option>
                                        <option value="FINALIZADO">FINALIZADO</option>
                                    </select>
                                </div>
                            </div>
                            <p></p>
                            <hr>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Fecha de entrega</label>
                                    <select id="fecha_entrega_imp" name="fecha_entrega_imp" class="form-control form-control-sm">
                                        <option value="<?= date("Y-m-d"); ?>">1 día</option>
                                        <option value="<?= date("Y-m-d", strtotime("+1 day")); ?>">2 días</option>
                                        <option value="<?= date("Y-m-d", strtotime("+2 day")); ?>">3 días</option>
                                        <option value="<?= date("Y-m-d", strtotime("+3 day")); ?>">4 días</option>
                                        <option value="<?= date("Y-m-d", strtotime("+4 day")); ?>">5 días</option>
                                    </select>
                                </div>



                                <div class="col-sm-4">
                                    <label>Medida</label>
                                    <input type="text" name="medida" class="form-control form-control-sm" placeholder="Medida" required>
                                </div>
                                <div class="col-sm-2">
                                    <label>Material</label>
                                    <input type="text" name="material" class="form-control form-control-sm" placeholder="Marterial" required>
                                </div>


                                <div class="col-sm-2">
                                    <label>Cantidad</label>
                                    <input type="text" name="cantidad" class="form-control form-control-sm" placeholder="Cantidad" required>
                                </div>

                                <div class="col-sm-2">
                                    <label>Conjuto</label>
                                    <select name="format" class="form-control form-control-sm">
                                        <option value="IMRPESIONES">Impresiones</option>
                                        <option value="JUEGOS">Juegos</option>
                                        <option value="PIEZAS">Piezas</option>
                                    </select>

                                </div>

                                <div class="col-sm-2">
                                    <label>Formato de salida</label>
                                    <select name="format" class="form-control form-control-sm">
                                        <option value="CARTA">Carta</option>
                                        <option value="OFICIO">Oficio</option>
                                        <option value="TABLOIDE">Tabloide</option>
                                        <option value="12x18">12x18</option>
                                        <option value="13x19">13x19</option>
                                        <option value="13x36">13x36</option>
                                        <option value="0">Otro</option>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <label>Especificar otro formato</label>
                                    <input type="text" name="otro" class="form-control form-control-sm" placeholder="Otros">
                                </div>

                                <div class="col-sm-2">
                                    <label>Formato</label>
                                    <select name="t_formato" class="form-control form-control-sm">
                                        <option value="VERTICAL">VERTICAL</option>
                                        <option value="HORIZONTAL">HORIZONTAL</option>
                                        <option value="CUADRADO">CUADRADO</option>
                                    </select>
                                </div>
                            </div>
                            <p></p>
                            <br>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Acabados</label>
                                <textarea name="acabados" class="form-control" placeholder="Acabados"></textarea>
                            </div>

                            <div class="col-sm-6">
                                <label>Detalle para impresión</label>
                                <textarea name="descri" class="form-control" placeholder="Descripción"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <p></p>
                                <button name="guardar" type="submit" class="btn btn-primary">Registrar Ahora</button>
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
        </body>
        <?php
        include('includes/modal.php');
        include('includes/librerias.php');
        ?>

        </html>
    <?php
} else {
    header("location:../index.php");
}
    ?>
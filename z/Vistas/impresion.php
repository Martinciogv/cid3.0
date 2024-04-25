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
            <h3>ORDEN DE IMPRESIÓN</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="col-sm-12">
                    <form action="../procesos/servicios/regServicios.php" method="POST" autocomplete="off">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-5">
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

                                            // Generar opciones del select
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

                                <div class="col-sm-4">
                                    <label>Fecha de entrega</label>
                                    <select id="fecha_entrega" name="fecha_entrega" class="form-control form-control-sm">
                                        <option value="<?= date("Y-m-d"); ?>">1 día</option>
                                        <option value="<?= date("Y-m-d", strtotime("+1 day")); ?>">2 días</option>
                                        <option value="<?= date("Y-m-d", strtotime("+2 day")); ?>">3 días</option>
                                        <option value="<?= date("Y-m-d", strtotime("+3 day")); ?>">4 días</option>
                                        <option value="<?= date("Y-m-d", strtotime("+4 day")); ?>">5 días</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>Usuario</label>
                                    <div class="input-group mb-3">
                                        <button type="button" class="input-group-text">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg>
                                        </button>
                                        <select class="form-control form-control-sm" id="usuario" name="usuario" required>
                                            <option value="<?= $_SESSION['iduser'] ?>"><?= $_SESSION['usuario'] ?></option>
                                            <?php
                                            $sql = "SELECT id_usuario, nombre FROM usuarios ORDER BY nombre ASC";
                                            $result = mysqli_query($conexion, $sql);
                                            while ($usuario = mysqli_fetch_assoc($result)) :
                                            ?>
                                                <option value="<?= $usuario['id_usuario'] ?>"><?= $usuario['nombre'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h2>Servicios</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p></p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="COPIAS, " id="flexCheckDefault" name="servicio[]" checked>
                                                <label class="form-check-label" for="flexCheckDefault">Copias</label>
                                            </div>
                                            <p></p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="IMPRESIONES, " id="flexCheckChecked" name="servicio[]">
                                                <label class="form-check-label" for="flexCheckChecked">Impresiones</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <p></p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="ESCANEO, " id="flexCheckDefault" name="servicio[]">
                                                <label class="form-check-label" for="flexCheckDefault">Escaner</label>
                                            </div>
                                            <p></p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="PLOTEO, " id="flexCheckChecked" name="servicio[]">
                                                <label class="form-check-label" for="flexCheckChecked">Plotteo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Documentos</label>
                                            <input type="text" class="form-control form-control-sm" id="doc" name="doc" placeholder="Cantidad de documentos">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Ubicación</label>
                                            <select name="ubi" class="form-control form-control-sm">
                                                <option value="Mostrador">Mostrador</option>
                                                <option value="E-Mail">E-Mail</option>
                                                <option value="WhatsApp">WhatsApp</option>
                                                <option value="Servidor">Servidor</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Anticipo</label>
                                            <input type="text" class="form-control form-control-sm" id="anticipoS" name="anticipoS" placeholder="Opcional $/%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Especificaciones</label>
                                    <textarea id="espe" name="espe" class="form-control" rows="5" placeholder="Especificar claramente" required></textarea>
                                </div>
                                <input type="hidden" value="PENDIENTE" name="estado">
                                <input type="hidden" value="0" name="fol_dis">
                            </div>
                            <p></p>
                            <div class="row">
                                <div class="col-sm-10">
                                </div>
                                <div class="col-sm-2">
                                    <button name="guardar" type="submit" class="btn btn-primary">Registrar Ahora</button>
                                </div>

                    </form>

                </div>
            </div>


            </body>
            <?php
            include('includes/librerias.php');
         
            include('includes/modal_cliente.php');
            ?>

            </html>


        <?php
    } else {
        header("location:../index.php");
    }
        ?>
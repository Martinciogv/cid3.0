
<!--modal agregar cliente -->
<div class="modal fade" id="modalAgregarCliente" tabindex="-1" aria-labelledby="modalAgregarCliente" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAgregarCliente">Agrega Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../procesos/clientes/regCliente.php" method="POST">
                    <label>Nombre</label>
                    <input type="text" class="form-control input-sm" id="nombre" name="nombre" required="">
                    <label>Email</label>
                    <input type="text" class="form-control input-sm" id="email" name="email" required="">
                    <label>Telefono</label>
                    <input type="text" class="form-control input-sm" id="telefono" name="telefono" required="">
                    <label>Ocupación</label>
                    <input type="text" class="form-control input-sm" id="ocupacion" name="ocupacion">
                    <label>Fecha de cumpleaños</label>
                    <input type="date" name="fecha_cumple" class="form-control">
                    <p></p>
                    <div class="">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                            Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
</div>


<!--modal editar cliente-->
<div class="modal fade" id="modalEditarCliente" tabindex="-1" aria-labelledby="modalEditarCliente" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditarCliente">Editar Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../procesos/clientes/actualizarClientes.php" method="POST" autocomplete="off">
                    <input type="text" hidden="" id="idclienteUp" name="idclienteUp">
                    <label>Nombre</label>
                    <input type="text" class="form-control input-sm" id="nombreUp" name="nombreUp" required="">
                    <label>Email</label>
                    <input type="text" class="form-control input-sm" id="emailUp" name="emailUp">
                    <label>Telefono</label>
                    <input type="text" class="form-control input-sm" id="telefonoUp" name="telefonoUp" required="">
                    <label>Ocupación</label>
                    <input type="text" class="form-control input-sm" id="ocupacionUp" name="ocupacionUp">
                    <label>Fecha de cumpleaños</label>
                    <input type="date" name="fecha_cumpleUp" class="form-control">
                    <p></p>
                    <input type="submit" name="save_user" class="btn btn-success btn-block" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>
</div>

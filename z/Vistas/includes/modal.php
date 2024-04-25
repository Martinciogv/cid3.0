 <!--modal agregar usuario-->
 <div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuario" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="modalEditarUsuario">Editar Usuario</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="../procesos/usuario/actualizarUsuario.php" method="POST" autocomplete="off">
                     <input type="text" hidden="" id="idusuarioU" name="idusuarioU">
                     <label>Nombre</label>
                     <input type="text-uppercase" class="form-control form-control-sm" name="nombreU" id="nombreU">
                     <div class="form-group">
                         <label class="col-sm-4 control-label">Privilegio</label>
                         <div class="col-sm-12">
                             <select name="privU" id="privU" class="form-control">
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
                 </form>
             </div>
         </div>
     </div>
 </div>
 </div>


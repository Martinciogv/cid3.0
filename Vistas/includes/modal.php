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
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                         <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                             Guardar</button>
                     </div>

                 </form>
             </div>

         </div>
     </div>
 </div>
 </div>


 <!--modal Editar-->
 <div class="modal fade" id="modalServicioEditar" tabindex="-1" aria-labelledby="modalServicioEditar" aria-hidden="true">
     <div class="modal-dialog modal-lg ">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="modalServicioEditar">Editar</h1>
             </div>
             <div class="modal-body">
                 <form action="../procesos/servicios/editServicios.php" method="POST" autocomplete="off">
                     <div class="container">
                         <div class="row">
                             <div class="col-sm-8">
                                 <input type="hidden" id="id_serviciosEdit" name="id_serviciosEdit">
                                 <label>Servicios</label>
                                 <input type="text" class="form-control form-control-sm" id="serviciosEdit" name="serviciosEdit">
                             </div>
                             <div class="col-sm-4">
                                 <label>Documentos</label>
                                 <input type="text" class="form-control form-control-sm" id="documentEdit" name="documentEdit" placeholder="Cantidad de documentos">
                             </div>
                             <div class="col-sm-12">
                                 <label>Ubicación</label>
                                 <input type="text" class="form-control form-control-sm" id="ubicacionEdit" name="ubicacionEdit" placeholder="Cantidad de documentos">
                             </div>
                             <div class="col-sm-12">
                                 <label>Especificaciones</label>
                                 <textarea id="espEdit" name="espEdit" class="form-control form-control-sm" placeholder="Especificar claramente" required></textarea>
                             </div>
                             <div class="col-sm-4">
                                 <label>Anticipo</label>
                                 <input type="text" class="form-control form-control-sm" id="anticipoEdit" name="anticipoEdit" placeholder="Opcional $/%">
                             </div>
                             <div class="col-sm-4">
                                 <label>Estado</label>
                                 <select name="estadoEdit" id="estadoEdit" class="form-control">
                                     <option value="PENDIENTE">PENDIENTE</option>
                                     <option value="IMPRESIÓN">IMPRESIÓN</option>
                                     <option value="ACABADOS">ACABADOS</option>
                                     <option value="ENTREGADO">ENTREGADO</option>
                                 </select>
                             </div>
                             <input type="hidden" id="fol_disEdit" name="fol_disEdit">
                             <div class="row">
                                 <div class="col-sm-4">
                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                     <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                                         Guardar</button>
                                 </div>
                             </div>

                 </form>
             </div>

         </div>
     </div>
 </div>
 </div>
 </div>

 <!--modal estado-->
 <div class="modal fade" id="modalServicioFinalizar" tabindex="-1" aria-labelledby="modalServicioFinalizar" aria-hidden="true">
     <div class="modal-dialog ">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="modalServicioFinalizar">Finalizar</h1>
             </div>
             <div class="modal-body">
                 <form action="../procesos/servicios/finServicios.php" method="POST" autocomplete="off">
                     <div class="row">
                         <div class="col-sm-12">
                             <input type="hidden" id="id_serviciosU" name="id_serviciosU">
                             <div class="col-sm-6">
                                 <label>Estado</label>
                                 <select name="estadoU" id="estadoU" class="form-control">
                                     <option value="PENDIENTE">PENDIENTE</option>
                                     <option value="IMPRESIÓN">IMPRESIÓN</option>
                                     <option value="ACABADOS">ACABADOS</option>
                                     <option value="ENTREGADO">ENTREGADO</option>

                                 </select>
                             </div>

                             <input type="hidden" id="fol_disU" name="fol_disU">
                             <input type="hidden" id="EstU" name="EstU" value="FINALIZADO">
                             <div class="form-check form-switch">
                                 <label class="form-check-label" for="flexSwitchCheckChecked">Finalizar en
                                     diseño</label>

                                 <input class="form-check-input" type="checkbox" role="switch" name="valor" id="valor" value="1">

                             </div>
                             <p></p>
                             <div class="">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                 <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                                     Guardar</button>
                             </div>

                 </form>
             </div>

         </div>
     </div>
 </div>
 </div>
 </div>


 <!-- Modal enviar DISEÑO -->
 <div class="modal fade" id="modalDisenoEnviar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Enviar orden a Impresión</h1>
             </div>
             <div class="modal-body">
                 <form action="../procesos/diseno/enviaDiseno.php" method="POST" autocomplete="off">
                     <div class="row">
                         <input type="hidden" value="<?php echo $_SESSION['iduser'] ?>" name="id_usuarioEN">
                         <input type="hidden" id="id_clienteEN" name="id_clienteEN">
                         <div class="col-sm-2">
                             <label>Orden</label>
                             <input type="text" class="form-control form-control-sm input-sm" id="idordenEN" name="idordenEN">
                         </div>
                         <div class="col-sm-5">
                             <label>Trabajo</label>
                             <input type="text" class="form-control form-control-sm input-sm" id="ttrabajoEN" name="ttrabajoEN">
                         </div>
                         <div class="col-sm-5">
                             <label>Fecha de entrega</label>
                             <input type="date" name="fecha_entregEN" class="form-control form-control-sm" step="1" id="fecha_entregEN">
                         </div>
                         <div class="col-sm-6">
                             <label>Cantidad</label>
                             <input type="text" class="form-control form-control-sm input-sm" id="cantidadEN" name="cantidadEN">
                         </div>
                         <div class="col-sm-6">
                             <label>Material</label>
                             <input type="text" class="form-control form-control-sm input-sm" id="materialEN" name="materialEN">
                         </div>
                         <div class="col-sm-6">
                             <label>Formato de salida</label>
                             <input type="text" class="form-control form-control-sm input-sm" id="f_salidaEN" name="f_salidaEN">
                         </div>
                         <div class="col-sm-6">
                             <label>Formato</label>
                             <input type="text" class="form-control form-control-sm input-sm" id="formatEN" name="formatEN">
                             </select>
                         </div>

                         <div class="col-sm-12">
                             <label>Acabados</label>
                             <input type="text" class="form-control form-control-sm input-sm" id="acabadosEN" name="acabadosEN">
                         </div>

                     </div>
                     <div class="row">
                         <div class="col-sm-12">
                             <label>Observaciones</label>
                             <textarea id="observacionesEN" name="observacionesEN" class="form-control form-control-sm input-sm"></textarea>
                         </div>
                         <div class="col-sm-12">
                             <label>Ubicación del archivo</label>
                             <input type="text" class="form-control form-control-sm input-sm" id="ubiEN" name="ubiEN">
                         </div>
                     </div>
                     <input type="hidden" value="PENDIENTE" name="estadoEN">
                     <input type="hidden" value="0" name="docuEN">
                     <input type="hidden" value="0" name="antiEN">

                     <p></p>
                     <div class="">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                         <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                             Guardar</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 </div>

 <!--modal Editar DISEÑO-->


 <div class="modal fade" id="modalDisenoEditar" tabindex="-1" aria-labelledby="modalDisenoEditar" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="modalDisenoEditar">Editar Orden de Diseño</h1>
             </div>
             <div class="modal-body">
                 <form action="../procesos/diseno/editDiseno.php" method="POST" autocomplete="off">
                     <d class="row">
                         <div class="col-sm-12">
                             <div class="row">
                                 <div class="col-sm-2">
                                     <label>Orden</label>
                                     <input type="text" class="form-control form-control-sm input-sm" id="idordenE" name="idordenE">
                                 </div>
                                 <div class="col-sm-4">
                                     <label>Trabajo</label>
                                     <input type="text" class="form-control form-control-sm input-sm" id="ttrabajoE" name="ttrabajoE">
                                 </div>
                                 <div class="col-sm-3">
                                     <label>Fecha de entrega</label>
                                     <input type="date" name="fecha_entregE" class="form-control form-control-sm" step="1" id="fecha_entregE">
                                 </div>
                                 <div class="col-sm-3">
                                     <label>Fecha de entrega</label>
                                     <input type="date" name="fecha_impE" class="form-control form-control-sm" step="1" id="fecha_impE">
                                 </div>
                                 <div class="col-sm-4">
                                     <label>Asignacion</label>
                                     <select name="disenaE" id="disenaE" class="form-control form-control-sm">
                                         <option value="S/A">S/A</option>
                                         <option value="ROGER">ROGER</option>
                                         <option value="FERNANDA">FERNANDA</option>
                                     </select>
                                 </div>
                                 <div class="col-sm-4">
                                     <label>Proveedor</label>
                                     <select name="proE" id="proE" class="form-control form-control-sm">
                                         <option value="S/A">S/A</option>
                                         <option value="INTERNO">INTERNO</option>
                                         <option value="EXTERNO">EXTERNO</option>
                                     </select>
                                 </div>
                                 <div class="col-sm-4">
                                     <label>Estado</label>
                                     <select name="estadoE" id="estadoE" class="form-control form-control-sm">
                                         <option value="PENDIENTE">PENDIENTE</option>
                                         <option value="RETENIDO">RETENIDO</option>
                                         <option value="DISEÑO">DISEÑO</option>
                                         <option value="VoBo">Vo.Bo.</option>
                                         <option value="PRODUCCIÓN">PRODUCCIÓN</option>
                                         <option value="FINALIZADO">FINALIZADO</option>
                                     </select>
                                 </div>
                                 <div class="col-sm-4">
                                     <label>Cantidad</label>
                                     <input type="text" name="cantidadE" id="cantidadE" class="form-control form-control-sm" placeholder="Cantidad" required>
                                 </div>
                                 <div class="col-sm-4">
                                     <label>Formato de salida</label>
                                     <input type="text" name="f_salidaE" id="f_salidaE" class="form-control form-control-sm" placeholder="Otros">
                                 </div>
                                 <div class="col-sm-4">
                                     <label>Formato</label>
                                     <select name="formatoE" id="formatoE" class="form-control form-control-sm">
                                         <option value="VERTICAL">VERTICAL</option>
                                         <option value="HORIZONTAL">HORIZONTAL</option>
                                         <option value="CUADRADO">CUADRADO</option>
                                     </select>
                                 </div>
                                 <div class="col-sm-12">
                                     <label>Acabados</label>
                                     <input type="text" class="form-control form-control-sm input-sm" id="acabadosE" name="acabadosE">
                                 </div>
                                 <div class="col-sm-12">
                                     <label>Ubicación</label>
                                     <input type="text" name="ubiE" id="ubiE" class="form-control form-control-sm">
                                 </div>
                                 <div class="col-sm-12">
                                     <label>Descripción</label>
                                     <textarea name="descriE" class="form-control form-control-sm" id="descriE"></textarea>
                                 </div>
                                 <p></p>
                                 <div class="">
                                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                     <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>
                                         Guardar</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
 </div>
 </div>
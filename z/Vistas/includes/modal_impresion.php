
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

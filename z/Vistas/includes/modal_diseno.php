

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
                         <!--MODIFICAR DIAS-->
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
                     </div>

                     <div class="row">
                         <div class="col-sm-4">
                             <label>Cantidad de archivos</label>
                             <input type="text" class="form-control form-control-sm input-sm" id="docuEN" name="docuEN">
                         </div>
                         <div class="col-sm-8">
                             <label>Ubicación del archivo</label>
                             <textarea id="ubiEN" name="ubiEN" class="form-control form-control-sm input-sm"></textarea>

                         </div>
                     </div>
                     <input type="hidden" value="PENDIENTE" name="estadoEN">

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
                                            <?php 
                                            $cont= 0;
                                            foreach($actividades_evaluadas as $act_sin_ev) { ?>
                                                <div class="col-lg-3">
                                                        <div class="member-team">

                                                        <?php
                                                        if (isset($act_sin_ev['Activity']['Image']['Image']['nombre'])) { ?>
                                                           <center> <img style="height:185px;" src="<?php echo $abs_base;?>uploads/<?php echo $act_sin_ev['Activity']['Image']['Image']['nombre'];?>" class="img-responsive"/></center>
                                                        <?php }  else { ?>
                                                           <center><img style="height:185px;" src="<?php echo $abs_base;?>images/imagen_default_vcm.jpg"/></center>
                                                        <?php } ?>
                                                        <div class="clear-fix"></div>
                                                        <span class="label label-sm label-warning pull-right" onclick="$('#Modal_evaluadas_<?php echo $cont; ?>').modal();">Ver mas...</span> 
                                                        <div class="clearfix"></div>
                                                        <a href="<?php echo $abs_base."activities/ficha/".$act_sin_ev['Activity']['id'];?>">
                                                            <h4 style="text-transform: uppercase;"><strong><?php echo $act_sin_ev['Activity']['nombre']; ?> 

                                                                <small></small>
                                                            </strong>                                                        
                                                            </h4>
                                                        </a>
                                                            <p><?php echo $act_sin_ev['Activity']['descripcion_actividad']; ?></p>
                                                             
                                                         </div>
                                                    
                                                </div>
                                            <?php 
                                            $cont++;
                                            } ?>




















        <?php 
        $cont= 0;
        foreach($actividades_evaluadas as $act_sin_ev) { ?>

                  <!-- Modal FECHAS EJECUCION PROYECTO-->
                <div id="Modal_evaluadas_<?php echo $cont; ?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-body">




                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="profile">
                                            <div style="margin-bottom: 15px" class="row">
                                                <div class="col-xs-12 col-sm-8">
                                                    <h2>
                                                        <?php echo $act_sin_ev['Activity']['nombre']; ?></h2>
                                                   
                                                    <p>
                                                        <strong>Descripción de la actividad:</strong> <?php echo $act_sin_ev['Activity']['descripcion_actividad']; ?></p><!-- esta debe ser la misma mostrada en el dashboard-->
                                                        <strong>Comentario de la actividad:</strong> <?php echo $act_sin_ev['Review']['0']['comentariosactividad']; ?></p>
                                                        
                                                         <p>

                                                        <?php 
                                                        foreach($act_sin_ev['ActivityInstitution'] as $inst) { ?>


                                                        <strong>Entidad con la que se relaciona:</strong> <?php echo $inst['nombre']; ?></p>
                                                    
                                                        <p>
                                                        <strong>Contacto:</strong> <?php echo $inst['contacto']; ?></p>

                                                        <?php } ?>

                                                    
                                                </div>
                                                <div class="col-xs-12 col-sm-4 text-center">
                                                    
<figcaption class="ratings"><p>
<?php 
for($i=1; $i <= 5; $i++ ) { 
    if ($i <= $act_sin_ev['Activity']['evaluacion']) { ?>
        <a href="#"><span class="fa fa-star"></span></a>
    <?php } else  { ?>
    
        <a href="#"><span class="fa fa-star-o"></span></a>
    <?php } ?>
<?php } ?>
   


</p></figcaption>                                                    

                                                </div>
                                            </div>
                                            <div class="row text-center divider">
                                                <div class="col-xs-12 col-sm-6 emphasis">
                                                    <h2>
                                                        <strong><?php echo $act_sin_ev['Activity']['costoactividad']; ?></strong></h2>
                                                    <p>
                                                        <small>Costo <br/>actividad</small>
                                                    </p>
                                                    
                                                </div>
                                                <div class="col-xs-12 col-sm-3 emphasis">
                                                    <h2>
                                                        <strong><?php echo $act_sin_ev['Activity']['numeroparticipantes']; ?></strong></h2><!-- en el caso de que no se haya seleccionado alguno de los publicos debe aparecer 0-->
                                                    <p>
                                                        <small>Participantes<br/> Interno</small>
                                                    </p>
                                                   
                                                </div>
                                                <div class="col-xs-12 col-sm-3 emphasis">
                                                    <h2>
                                                        <strong><?php echo $act_sin_ev['Activity']['numeroexternos']; ?></strong></h2>
                                                    <p>
                                                        <small>Participantes<br/> Externo</small>
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>

                  </div>
                </div> 
        <?php 
        $cont++;
        } ?>

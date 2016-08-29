                <!--BREADCRUMB-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Home</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo $abs_base.'home/usuario';?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                   
                      
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--CONTENIDO-->
                <div class="page-content">
                    <div id="tab-general">
                       
                           <div class="row">
                                    <div class="col-lg-12">
                                      <h2 class="mbxl">Tus últimas actividades cargadas</h2>
                                       <!--Actividades sin evaluar-->
                                        <div class="panel panel-red">
                                            <div class="panel-heading">
                                                Actividades Sin Evaluar
                                            </div>
                                            <div class="panel-body pan">
                                                <div class="note note-danger">
                                                <?php
                                                if ($actividades_sin_evaluar) { ?>
                                                    <h4 class="box-heading">Recuerda! Tienes actividades sin evaluar</h4>
                                                    <p>Recuerda que si no evaluas la información no quedará la actividad cargada.</p>
                                                <?php } else  { ?>
                                                    <h4 class="box-heading">NO Tienes actividades sin evaluar</h4>
                                                <?php } ?>
                                                    
                                                </div>
                                            <div class="row" id="lista_sin_evaluar">

                                            <?php 
                                            $cont= 0;
                                            foreach($actividades_sin_evaluar as $act_sin_ev) { ?>
                                                <div class="col-lg-3">
                                                        <div class="member-team">

                                                        <?php
                                                        if (isset($act_sin_ev['Activity']['Image']['Image']['nombre'])) { ?>
                                                            <center><img class="imagenTerminada" style="height:185px;" src="<?php echo $abs_base;?>uploads/<?php echo $act_sin_ev['Activity']['Image']['Image']['nombre'];?>" class="img-responsive"/></center>
                                                        <?php }  else { ?>
                                                            <center><img class="imagenTerminada" style="height:185px;" src="<?php echo $abs_base;?>images/imagen_default_vcm.jpg"/></center>
                                                        <?php } ?>
                                                        <div clasS="clear-fix"></div>
                                                        <span class="label label-sm label-warning pull-right" onclick="$('#Modal_sin_evaluar_<?php echo $cont; ?>').modal();" style="cursor: pointer;">Ver mas...</span> 
                                                        <div class="clearfix"></div>
                                                        <a href="<?php echo $abs_base."activities/evaluate/".$act_sin_ev['Activity']['id'];?>">
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
        foreach($actividades_sin_evaluar as $act_sin_ev) { ?>

                  <!-- Modal FECHAS EJECUCION PROYECTO-->
                <div id="Modal_sin_evaluar_<?php echo $cont; ?>" class="modal fade" role="dialog">
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
                                                         <p>

                                                        <?php 
                                                        foreach($act_sin_ev['ActivityInstitution'] as $inst) { ?>


                                                        <strong>Entidad con la que se relaciona:</strong> <?php echo $inst['nombre']; ?></p>
                                                    
                                                        <p>
                                                        <strong>Contacto:</strong> <?php echo $inst['contacto']; ?></p>

                                                        <?php } ?>

                                                    
                                                </div>
                                                <div class="col-xs-12 col-sm-4 text-center">
                                                    
                                                    

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
        $cont++;} ?>  


                                            </div>

                                                <?php
                                                if ($actividades_sin_evaluar) { ?>
            <div>
                <div class="paginate_sin_evaluar">                   
                </div>
            </div>

        <script type="text/javascript">
        $(function() {
            $(".paginate_sin_evaluar").paginate({
                count       : <?php echo $cant_pag_sin_ev; ?>,
                start       : 1,
                display     : 10,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){


                                            paginate_sin_ev(page);


                                          }
            });


        });

  function paginate_sin_ev(page) {
            url = siteurl + 'home/paginate_sin_ev';
            var pagina = page;
            $.ajax({
                url: url,
                type: "POST",
                data: { pagina: pagina},
                success: function(result) {
                    $('#lista_sin_evaluar').html(result);
                } // <-- add this
            });   
  }




        </script>   

                                  <?php } ?>


                                        </div>
                                    </div>
                                    <!--termino actividades sin evaluar-->
                                    <!--Actividades guardadas-->
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                Actividades Guardadas no terminadas
                                            </div>
                                            <div class="panel-body pan">

                                                <div class="note note-success">
                                                <?php
                                                if ($actividades_sin_enviar) { ?>
                                                    <h4 class="box-heading">Recuerda! Tienes actividades sin enviar</h4>
                                                <?php } else  { ?>
                                                    <h4 class="box-heading">NO Tienes actividades sin enviar</h4>
                                                <?php } ?>
                                                    
                                                </div>                                            
                                                <div class="row" id="lista_sin_enviar">


                                            <?php 
                                            foreach($actividades_sin_enviar as $act_sin_env) { ?>



                                                    <div class="col-lg-3">
                                                        <div class="member-team">

                                                           <a href="<?php echo $abs_base.'activities/edit/'.$act_sin_env['Activity']['id']; ?>"><h3><?php echo $act_sin_env['Activity']['nombre']; ?>
                                                                <small></small>
                                                            </h3>
                                                            <p><?php echo $act_sin_env['Activity']['descripcion_actividad']; ?></p></a>
                                                             
                                                        </div>
                                                    </div>

                                            <?php } ?>



                                                </div>

                                                <?php
                                                if ($actividades_sin_enviar) { ?>
            <div>
                <div class="paginate_sin_enviar">                   
                </div>
            </div>

        <script type="text/javascript">
        $(function() {
            $(".paginate_sin_enviar").paginate({
                count       : <?php echo $cant_pag_sin_enviar; ?>,
                start       : 1,
                display     : 10,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){


                                            paginate_sin_enviar(page);


                                          }
            });


        });

  function paginate_sin_enviar(page) {
            url = siteurl + 'home/paginate_sin_enviar';
            var pagina = page;
            $.ajax({
                url: url,
                type: "POST",
                data: { pagina: pagina},
                success: function(result) {
                    $('#lista_sin_enviar').html(result);
                } // <-- add this
            });   
  }




        </script>  
<?php } ?>
                                            </div>
                                        </div>
                                    <!--termino actividades guardadas-->
                                    <!--actividades Finalizadas-->



                                       <?php
                                                if ($actividades_evaluadas) { ?>
                                     <div class="row">
                                                       <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <select id="principio" class="form-control">
                                                                    <option value="0">Principios</option>
                                                                <?php
                                                                foreach($beginnings as $key => $begin) { ?>

                                                                    <option value="<?php echo $key; ?>"><?php echo $begin; ?></option>
                                                                <?php } ?>
                                                                  
                                                                </select></div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <select id="ambito" class="form-control">
                                                                    <option value="0">Ámbitos</option>

                                                                <?php
                                                                foreach($scopes as $key => $scope) { ?>

                                                                    <option value="<?php echo $key; ?>"><?php echo $scope; ?></option>

                                                                <?php } ?>

                                                               </select>
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-lg-3">
                                                            <div class="form-group">
                                                                <select id="entidad" class="form-control">
                                                                    <option value="0">Entidades</option>

                                                                <?php
                                                                foreach($entities as $key => $entity) { ?>
                                                                    <option value="<?php echo $key; ?>"><?php echo $entity; ?></option>
                                                                <?php } ?>

                                                               </select>
                                                            </div>
                                                        </div>
                                                         <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <select id="orden" class="form-control">
                                                                    <option value="0" >Orden Ascendente</option>
                                                                    <option value="1" >Orden Descendente</option>
                                                                </select></div>
                                                        </div>



                                                         <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-primary" onclick="buscar(1);">
                                                                Buscar</button>
                                                            </div>
                                                        </div>



                                                    </div>
                                        <div class="row" id="lista_evaluadas">

                                            <?php 
                                            $cont= 0;
                                            foreach($actividades_evaluadas as $act_sin_ev) { ?>
                                                <div class="col-lg-3">
                                                        <div class="member-team">

                                                        <?php
                                                        if (isset($act_sin_ev['Activity']['Image']['Image']['nombre'])) { ?>
                                                           <center> <img class="imagenTerminada" style="height:185px;" src="<?php echo $abs_base;?>uploads/<?php echo $act_sin_ev['Activity']['Image']['Image']['nombre'];?>" class="img-responsive"/></center>
                                                        <?php }  else { ?>
                                                           <center><img class="imagenTerminada" style="height:185px;" src="<?php echo $abs_base;?>images/imagen_default_vcm.jpg"/></center>
                                                        <?php } ?>
                                                        <div class="clear-fix"></div>
                                                        <span class="label label-sm label-warning pull-right" onclick="$('#Modal_evaluadas_<?php echo $cont; ?>').modal();" style="cursor: pointer;">Ver mas...</span> 
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




                                        </div>

            <div>
                <div class="pag_evaluadas">                   
                </div>
            </div>

        <script type="text/javascript">
        $(function() {
            $(".pag_evaluadas").paginate({
                count       : <?php echo $cant_pag; ?>,
                start       : 1,
                display     : 10,
                border                  : true,
                border_color            : '#fff',
                text_color              : '#fff',
                background_color        : 'black',  
                border_hover_color      : '#ccc',
                text_hover_color        : '#000',
                background_hover_color  : '#fff', 
                images                  : false,
                mouse                   : 'press',
                onChange                : function(page){


                                            paginate_normal(page);


                                          }
            });


        });

  function paginate_normal(page) {
            url = siteurl + 'home/paginate_normal';
            var pagina = page;
            $.ajax({
                url: url,
                type: "POST",
                data: { pagina: pagina},
                success: function(result) {
                    $('#lista_evaluadas').html(result);
                } // <-- add this
            });   
  }




        </script>   

										<div class="form-actions text-left pal">
                                                    <a type="submit" class="btn btn-primary" href="<?php echo $abs_base.'activities/listado/terminadas'; ?>">
                                                        Ver todas las actividades terminadas</a>
                                                </div>
                                    </div>
                                </div>
                            <?php }  else  { ?>
                                        <h4 class="box-heading">NO Tienes actividades evaluadas</h4>
                            <?php } ?>
                            
                            </div>
                            
                       
                    </div>
                </div>
                <!--END CONTENT-->






<script>

  function buscar(page) {
            url = siteurl + 'home/buscar';
            var principio = $('#principio').val();
            var ambito = $('#ambito').val();
            var entidad = $('#entidad').val();
            var orden = $('#orden').val();
            var pagina = page;
            $.ajax({
                url: url,
                type: "POST",
                data: { principio: principio, ambito: ambito, entidad: entidad, orden: orden, pagina: pagina},
                success: function(result) {
                    $('#lista_evaluadas').html(result);
                } // <-- add this
            });   
  }

</script>        
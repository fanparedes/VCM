 <!--BREADCRUMB-->

                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Actividades Duoc UC</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;


                        <?php
                        $rol_usuario = $this->Session->read('Auth.User.role');
                        ?>
                        <?php
                        if ($rol_usuario == 'Usuario') { ?>

                          <a href="<?php echo $abs_base.'home/usuario';?>">Home</a>
                          <?php } 

                        if ($rol_usuario == 'Administrativo') { ?>

                          <a href="<?php echo $abs_base.'home/administrativo';?>">Home</a>
                          <?php } 
                        if ($rol_usuario == 'Admin') { ?>

                          <a href="<?php echo $abs_base.'home/usuario';?>">Home</a>
                          <?php } 

                          ?>


                        &nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                   
                        <li class="active"><i class="fa fa-file-o fa-fw"></i>Actividades Duoc UC</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--BREADCRUMB-->
                <?php echo $this->Form->create('Activity', array('url' => array('controller' => 'activities', 'action' => 'listado'), 'id'=> 'form_actividad', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
                <!--CONTENIDO-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                          <div class="col-lg-12"></div>
                          <div class="col-lg-12">
                            
                            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div id="grid-layout-table-1" class="box jplist">
                                    <div class="jplist-ios-button"><i class="fa fa-sort"></i>jPList Actions</div>
                                    <div class="jplist-panel box panel-top">
                                    <!-- cargar id de donde viene el listado -->
                                    <input type="hidden" name="id_direeccion" id="id_direeccion" value="<?php echo $id ?>">
                                    <!-- boton principios -->
                                    <div class="col-sm-2">
                                      <div class="btn-group ">
                                        <button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Principios" aria-expanded="true">
                                          <span class="multiselect-selected-text">Principios</span> <b class="caret"></b>
                                        </button>
                                        <ul class="multiselect-container dropdown-menu ">
                                        <?php 
                                          foreach($beginnings as $key => $beginning) { ?>
                                            <li >
                                              <a tabindex="0">
                                                <label class="checkbox">
                                                <input type="checkbox" name="data[Beginning][<?php echo $key;?>]" value="<?php echo $key; ?>"> <?php echo $beginning; ?>
                                                </label>
                                              </a>
                                            </li>
                                        <?php 
                                          } 
                                        ?>
                                        </ul>
                                      </div>
                                    </div>
                                    <!-- boton ambitos -->
                                    <div class="col-sm-2">
                                      <div class="btn-group">
                                        <button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Ámbitos" aria-expanded="true">
                                          <span class="multiselect-selected-text">Ámbitos</span> <b class="caret"></b>
                                        </button>
                                        <ul class="multiselect-container dropdown-menu">
                                        <?php 
                                          foreach($scopes as $key => $scope) { ?>
                                            <li >
                                              <a tabindex="0">
                                                <label class="checkbox">
                                                  <input type="checkbox" name="data[Scope][<?php echo $key;?>]" value="<?php echo $key; ?>"> <?php echo $scope; ?>
                                                </label>
                                              </a>
                                            </li>
                                        <?php 
                                          } 
                                        ?>
                                        </ul>
                                      </div>
                                    </div>
                                    <!-- boton entidades -->
                                    <div class="col-sm-2">
                                      <div class="btn-group">
                                        <button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Entidades" aria-expanded="true">
                                          <span class="multiselect-selected-text">Entidades</span> <b class="caret"></b>
                                        </button>
                                        <ul class="multiselect-container dropdown-menu">
                                        <?php 
                                          foreach($entities as $key => $entity) { ?>
                                            <li >
                                              <a tabindex="0">
                                                <label class="checkbox">
                                                  <input type="checkbox" name="data[Entity][<?php echo $key;?>]" value="<?php echo $key; ?>"> <?php echo $entity; ?>
                                                </label>
                                              </a>
                                            </li>
                                        <?php 
                                          } 
                                        ?>
                                        </ul>
                                      </div>
                                    </div>
                                    <!-- boton Recursos -->
                                    <div class="col-sm-2">
                                      <div class="btn-group">
                                        <button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Recursos" aria-expanded="true">
                                          <span class="multiselect-selected-text">Recursos</span> <b class="caret"></b>
                                        </button>
                                        <ul class="multiselect-container dropdown-menu">
                                          <li >
                                            <a tabindex="0">
                                              <label class="checkbox">
                                                <input type="checkbox"  name="data[Recursos][0]" value="0"> Interno
                                              </label>
                                            </a>
                                          </li>
                                          <li>
                                            <a tabindex="0">
                                              <label class="checkbox">
                                                <input type="checkbox" name="data[Recursos][1]" value="1"> Externo
                                              </label>
                                            </a>
                                          </li>
                                          <li class="">
                                            <a tabindex="0">
                                              <label class="checkbox">
                                                <input type="checkbox" name="data[Recursos][2]" value="2"> Mixto
                                              </label>
                                            </a>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                    <!-- boton Evaluacion -->
                                    <div class="col-sm-2">
                                      <div class="btn-group">
                                        <button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Evaluación" aria-expanded="true">
                                          <span class="multiselect-selected-text">Evaluación</span> <b class="caret"></b>
                                        </button>
                                        <ul class="multiselect-container dropdown-menu">
                                          <li >
                                            <a tabindex="0">
                                              <label class="checkbox">
                                                <input type="checkbox" name="data[Estrellas][5]" value="5"> 5 Estrellas
                                              </label>
                                            </a>
                                          </li>
                                          <li>
                                            <a tabindex="0">
                                              <label class="checkbox">
                                                <input type="checkbox" name="data[Estrellas][4]" value="4"> 4 Estrellas
                                              </label>
                                            </a>
                                          </li>
                                          <li class="">
                                            <a tabindex="0">
                                              <label class="checkbox">
                                                <input type="checkbox" name="data[Estrellas][3]" value="3"> 3 Estrellas
                                              </label>
                                            </a>
                                          </li>
                                          <li class="">
                                            <a tabindex="0">
                                              <label class="checkbox">
                                                <input type="checkbox" name="data[Estrellas][2]" value="2"> 2 Estrellas
                                              </label>
                                            </a>
                                          </li>
                                          <li class="">
                                            <a tabindex="0">
                                              <label class="checkbox">
                                                <input type="checkbox" name="data[Estrellas][1]" value="1"> 1 Estrellas
                                              </label>
                                            </a>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                    <!-- boton buscar -->
                                     <div class="col-lg-2">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary" onclick="paginate(1);">
                                            Buscar</button>
                                        </div>
                                    </div>
                                    <!-- filtros select -->
                                      <div class="text-filter-box" >
                                        <div class="input-group" ><span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input name="data[Activity][nombre]" id="nombre" type="text" value="" placeholder="Filtro por Nombre" class="form-control" style="width:250px;"/>
                                      </div></div>
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <select name="data[Activity][anno]" id="anno" class="form-control">
                                                                    <option value="0">Año</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                </select>
                                                              </div>
                                                        </div>



                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <select name="data[Activity][mes]" id="mes" class="form-control">
                                                                    <option value="0">Mes</option>
                                                                    <option value="1">Enero</option>
                                                                    <option value="2">Febrero</option>
                                                                    <option value="3">Marzo</option>
                                                                    <option value="4">Abril</option>
                                                                    <option value="5">Mayo</option>
                                                                    <option value="6">Junio</option>
                                                                    <option value="7">Julio</option>
                                                                    <option value="8">Agosto</option>
                                                                    <option value="9">Septiembre</option>
                                                                    <option value="10">Octubre</option>
                                                                    <option value="11">Noviembre</option>
                                                                    <option value="12">Diciembre</option> 
                                                                </select>
                                                              </div>
                                                        </div>


                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <select name="data[Activity][hito]" id="hito" class="form-control">
                                                                    <option value="Hito">Actividad Hito</option>
                                                                    <option value="1">Si</option>
                                                                    <option value="0">No</option>
                                                                    <option value="all">Todas</option>
                                                                </select>
                                                              </div>
                                                        </div>

                                     
                                         
                                    </div>
                                    <div class="row">
                      											<div class="col-md-6"><!-- BOTONES -->
                                            <?php //echo $this->Html->link('boton', '/Pdf/class/reporte_exportar_general.php', array('target'=>"_blank")); ?>
                                              <?php
                      												echo $this->Html->link('<i class="fa fa-download"></i> &nbsp; Descargar fichas en PDF', array(
                      													'controller' => 'activities',
                      													'action' => 'exportar_pdf'),
                      													array(
                      														'class' => 'btn btn-blue',
                      														'escape' => false
                      														)
                      													);
                      												?>
                      												<?php
                      												echo $this->Html->link('<span class="fa fa-gear"></span>&nbsp; Exportar a Excel', array(
                      													'controller' => 'activities',
                      													'action' => 'exportar_excel'),
                      													array(
                      														'class' => 'btn btn-green dropdown-toggle',
                      														'escape' => false
                      														)
                      													);
                      												?>
                      											</div>
                      							</div>
                                    <!--actividades-->
                                    <div class="box text-shadow"  id="lista_evaluadas">
                                        <table class="demo-tbl">



                                            <?php 
                                            $cont= 0;
                                            $contador = 0;
                                            foreach($actividades_evaluadas as $act_sin_ev) { 
                                              $contador++;
                                            ?>
                                        <!--<item>1</item>-->
                                            <tr class="tbl-item"><!--<img/>-->
                                               <td class="img"> <a href="<?php echo $abs_base.'activities/ficha/'.$act_sin_ev['Activity']['id'];?>">
                                               

													<?php
                                                        if (isset($act_sin_ev['Activity']['Image']['Image']['nombre'])) { ?>
                                                           <center> <img style="width:120px;" src="<?php echo $abs_base;?>uploads/<?php echo $act_sin_ev['Activity']['Image']['Image']['nombre'];?>" class="img-responsive"/></center>
                                                        <?php }  else { ?>
                                                           <center><img style="width:120px;" src="<?php echo $abs_base;?>images/imagen_default_vcm.jpg"/></center>
                                                        <?php } ?>

                                               </a></td>
                                                <!--<data></data>-->
                                                <td class="td-block"><p class="date"><?php echo substr($this->Ingenia->formatearFecha($act_sin_ev['Activity']['fechainicio_proyecto']),0, 10); ?></p>

                                                  <a href="<?php echo $abs_base.'activities/ficha/'.$act_sin_ev['Activity']['id'];?>">  <p class="title"><?php echo $act_sin_ev['Activity']['nombre']; ?></p></a>
                                                  <p>Autor: <?php echo $act_sin_ev['Activity']['Usuario']['Usuario']['nombre']." ".$act_sin_ev['Activity']['Usuario']['Usuario']['apellidos'];?></p>

                                                  <!--REVISADA-->  




                                                        <div class="checkbox">
                                                        <!--Este check sólo lo verá el administrador-->
                                                                <label>

                                                                <?php
																$usuario = $this->Session->read('Auth');
																$rol = $usuario['User']['role'];												
																if ($rol == 'Administrativo'):
																	if ($act_sin_ev['Activity']['revisado'] == 0) { ?>

																		<input id="check_<?php echo $act_sin_ev['Activity']['id']; ?>" tabindex="5" type="checkbox" />

																	<?php }  else { ?>
																		<input tabindex="5" type="checkbox" checked="checked" disabled="disabled"/>

																	<?php } 
																	echo '&nbsp; REVISADA';
																endif;
																?>
	
                                                                    </label>  
																<?php if ($rol == 'Administrativo'): ?>
																	<button type="button" class="btn btn-blue pull-right" onclick="$('#Modal_comentarios_<?php echo $cont; ?>').modal();">Comentarios</button>
																<?php endif; ?>	
                                                        </div>
                                                        <br/>



                                                        <!--Este check sólo lo verá el administrador-->
														<p class="desc"><?php echo $act_sin_ev['Activity']['descripcion_actividad']; ?></p>

													   <span class="label label-sm label-warning pull-left" onclick="$('#Modal_evaluadas_<?php echo $cont; ?>').modal();">Ver mas...</span> 
                                                   </td>
                                            </tr>
                                  
                                  
                                                                           <?php 
                                            $cont++;
                                            } ?>



        <?php 
        $cont= 0;
        foreach($actividades_evaluadas as $act_sin_ev) { 

?>

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

                                           
                                            
                                        </table>

        <?php 
        $cont= 0;
        foreach($actividades_evaluadas as $act_sin_ev) { ?>

                  <!-- Modal FECHAS EJECUCION PROYECTO-->
                <div id="Modal_comentarios_<?php echo $cont; ?>" class="modal fade" role="dialog">


                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Comentarios de la Actividad</h4>
                          </div>
                          <div class="modal-body">
                                                    <div id="box_comentarios_<?php echo $act_sin_ev['Activity']['id']; ?>">
                                                        <table class="table-bordered table" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>USUARIO
                                                                    </th>
                                                                    <th>COMENTARIO
                                                                    </th>
                                                                    <th>FECHA
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                foreach($act_sin_ev['Commentarios'] as $comment) { ?>
                                                                <tr>
                                                                    <td><?php echo $comment['username']; ?>
                                                                    </td>
                                                                    <td><?php echo $comment['comentario']; ?>
                                                                    </td>
                                                                    <td><?php echo $comment['created']; ?>
                                                                    </td>
                                                                <tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <hr>

                                          <div class="col-sm-12">
                                            <label class="">Comentario</label> 
                                          </div>           
                                           <div class="col-sm-12">
                                                <textarea id="comentario_<?php echo $act_sin_ev['Activity']['id']; ?>" maxlength="200" row="20" placeholder="Ingresa un nuevo comentario." class="form-control" /></textarea>
                                          </div>           
                                                        

                                          <div class="clearfix"></div>  
                                          <br><br>                                           
                                          <div class="col-sm-7 controls">
                                                <button type="button" class="btn btn-blue pull-right" onclick="envia_comentario(<?php echo $act_sin_ev['Activity']['id']; ?>);">Enviar</button>
                                          </div>   
                                          <div class="clearfix"></div>  
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

        <?php 
        $cont= 0;
        foreach($actividades_evaluadas as $act_sin_ev) { ?>

                <div id="modal_revision_<?php echo $act_sin_ev['Activity']['id']; ?>" class="modal fade" role="dialog">


                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">REVISION DE ACTIVIDAD</h4>
                          </div>
                          <div class="modal-body">

                                          <div class="col-sm-12">
                                            <p>¿Está seguro que desea marcar la actividad com revisada?</p>
                                            <p>Una vez realizada la acción, no se puede desmarcar.</p>
                                          </div>           
         
                                                        

                                          <div class="clearfix"></div>  
                                          <br>                             
                                          <div class="col-sm-7 controls">

                                          </div>   
                                          <div class="clearfix"></div>  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-green" onclick="revisar(<?php echo $act_sin_ev['Activity']['id']; ?>)">Si</button>
                            <button type="button" class="btn btn-red" onclick="no_revisar(<?php echo $act_sin_ev['Activity']['id']; ?>)">No</button>
                          </div>
                        </div>

                      </div>
                </div> 

        <?php 
        $cont++;
        } ?>

        <script>
        <?php 
        $cont= 0;
        foreach($actividades_evaluadas as $act_sin_ev) { ?>
            $('#check_<?php echo $act_sin_ev["Activity"]["id"]; ?>').on('ifChecked', function(event){
              $('#modal_revision_<?php echo $act_sin_ev["Activity"]["id"]; ?>').modal({backdrop: 'static'});
            });

        <?php } ?>
        </script>
                                    </div>

<script>




  function revisar(id) {
            url = siteurl + 'activities/revisar';
                $.ajax({
                    url: url,
                    type: "POST",
                    data: { id_activity: id},
                    success: function(result) {
                        $('#modal_revision_' + id).modal('hide');
                        
                        $('#check_' + id).iCheck('disable');

                    } // <-- add this
                });
  }

  function no_revisar(id) {

                        $('#modal_revision_' + id).modal('hide');
                        
                        $('#check_' + id).iCheck('uncheck');

  }  


  function envia_comentario(id) {
            url = siteurl + 'activities/agrega_comentario';
            var comentario = $('#comentario_' + id).val();
            if ($.trim(comentario) != '')  {        
                $.ajax({
                    url: url,
                    type: "POST",
                    data: { comentario: comentario,  id_activity: id},
                    success: function(result) {
                        $('#box_comentarios_' + id).html(result);
                        $('#box_comentarios_' + id).fadeIn(500);
                        $('#comentario_' + id).val('');
                    } // <-- add this
                });
            }   
  }

</script>


                                   
                                    <div class="jplist-panel box panel-bottom">
                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <select name="data[Activity][paginas]" id="paginas" class="form-control" onchange="paginate(1);">
                                                                    <option value="3"> 3 por página</option>
                                                                    <option value="5"> 5 por página</option>
                                                                    <option value="10"  selected ='selected'> 10 por página</option>
                                                                    <option value="1000">Todas</option>
                                                                </select>
                                                              </div>
                                                        </div>
                                                        <input type="hidden" value="0" id="pagina" name="data[Activity][pagina]" >


                                                        <div class="col-lg-2">
                                                            <div class="form-group">
                                                                <select name="data[Activity][orden]" id="orden" class="form-control" onchange="paginate(1);">
                                                                    <option value="0"> Orden alfab.</option>
                                                                    <option value="1"> Fecha asc.</option>
                                                                    <option value="2"> Fecha desc.</option>
																	<option value="3" selected ='selected'> Por ID.</option>
                                                                </select>
                                                              </div>
                                                        </div>

            <div class="col-lg-6">
                <div class="pag_evaluadas">                   
                </div>
            </div>

        <script type="text/javascript">

  $(function() {
    //console.log(<?php echo $cant_rs; ?>)
    $(".pag_evaluadas").paginate({
        count       : <?php echo ceil($cant_rs/10); ?>,
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
        onChange                : function(page){ paginate(page);}
    });
  });

  function paginate(page) {
    var id_direeccion = $("#id_direeccion").val();
    url = siteurl + 'activities/listado_ajax/'+id_direeccion;
    $('#pagina').val(page);
    $('#lista_evaluadas').html('<center><img src="'+siteurl+'/images/cargando.gif"></center>');
    var datos = $('#form_actividad').serialize();
    $.ajax({
        url: url,
        type: "POST",
        async: true,
        data: $('#form_actividad').serialize(),
        success: function(result) {
            $('#lista_evaluadas').html(result);
            var _paginas = $("#_paginas").val();
            var _pagina = $("#_pagina").val();

            $(".pag_evaluadas").paginate({
                count       : _paginas,
                start       : _pagina,
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
                onChange                : function(page){ paginate(page);}
            });
        } // <-- add this
    });   
  }




        </script>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
                </form>
                <!--END CONTENT-->
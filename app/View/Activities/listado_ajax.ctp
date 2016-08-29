                                            
<?php
  /*echo $this->Html->css('style_paginate.css');
  echo $this->Html->script('jquery-1.10.2.min.js'); 
  echo $this->Html->script('jquery-ui.js');
  echo $this->Html->script('bootstrap.min.js');
  echo $this->Html->script('jquery.paginate.js');
  echo $this->Html->script('icheck.min.js');   */

?>
<script>

    //BEGIN CHECKBOX & RADIO
    if($('#demo-checkbox-radio').length <= 0){
        $('input[type="checkbox"]:not(".switch")').iCheck({
            checkboxClass: 'icheckbox_minimal-grey',
            increaseArea: '20%' // optional
        });
        $('input[type="radio"]:not(".switch")').iCheck({
            radioClass: 'iradio_minimal-grey',
            increaseArea: '20%' // optional
        });
    }
    //END CHECKBOX & RADIO
</script>

<table class="demo-tbl">
<input type="hidden" name="_paginas" id="_paginas" value="<?php echo $_paginas ?>">
<input type="hidden" name="_pagina" id="_pagina" value="<?php echo $_pagina ?>">
  <?php 
        $cont= 0;
				$actividades_evaluadas = array_merge($actividades_evaluadas);
        $_offset = $_pagina>1 ? ((($_pagina*10)+1)-11) : '0';
        //$_offset = $_pagina>1 ? ($_offset-10) : $_offset;
				/*echo $_paginas.' paginas<br>';
				echo $_pagina.' pagina<br>';
				echo $_offset.' offset<br>';
				echo $_registros_totales.' totales<br>';
				echo $_limite.' limite<br>';*/

        for($z=$_offset;$z<($_registros_totales);$z++){
          ?>
          <!--<item>1</item>-->
          <tr class="tbl-item"><!--<img/>-->
            <td class="img">
            
              <a href="<?php echo $abs_base.'activities/ficha/'.$actividades_evaluadas[$z]['Activity']['id'];?>">
              <?php
                $nombre_imagen  = (string) isset($actividades_evaluadas[$z]['Activity']['Image']['Image']['nombre']) ? $actividades_evaluadas[$z]['Activity']['Image']['Image']['nombre'] : '';
                if (isset($actividades_evaluadas[$z]['Activity']['Image']['Image']['nombre']) && file_exists(WWW_ROOT.'uploads'.DS.$nombre_imagen)) { ?>
                <center> 
                  <img style="width:120px;" src="<?php echo $abs_base;?>uploads/<?php echo $actividades_evaluadas[$z]['Activity']['Image']['Image']['nombre'];?>" class="img-responsive"/>
                </center>
              <?php 
                }  
                else { 
              ?>
                <center>
                  <img style="width:120px;" src="<?php echo $abs_base;?>images/imagen_default_vcm.jpg"/>
                </center>
              <?php 
                } 
              ?>
              </a>
            </td>
            <!--<data></data>-->
            <td class="td-block">
              <p class="date"><?php echo substr($this->Ingenia->formatearFecha($actividades_evaluadas[$z]['Activity']['fechainicio_proyecto']),0, 10); ?></p>
              <a href="<?php echo $abs_base.'activities/ficha/'.$actividades_evaluadas[$z]['Activity']['id'];?>"> 
                <p class="title"><?php echo $actividades_evaluadas[$z]['Activity']['nombre']; ?></p>
              </a>
              <p>Autor: <?php echo $actividades_evaluadas[$z]['Activity']['Usuario']['Usuario']['nombre']." ".$actividades_evaluadas[$z]['Activity']['Usuario']['Usuario']['apellidos'];?></p>
              <!--REVISADA-->  
              <div class="checkbox">
                <!--Este check sólo lo verá el administrador-->
                <label>
                  <?php
                    $usuario = $this->Session->read('Auth');
                    $rol = $usuario['User']['role'];												
                    if ($rol == 'Administrativo'):
                      if ($actividades_evaluadas[$z]['Activity']['revisado'] == 0) { ?>
                        <input id="check_<?php echo $actividades_evaluadas[$z]['Activity']['id']; ?>" tabindex="5" type="checkbox" />

                  <?php 
                      }else { 
                  ?>
                      <input tabindex="5" type="checkbox" checked="checked" disabled="disabled"/>

                  <?php 
                    } 
                    echo '&nbsp; REVISADA';
                    endif;
                  ?>
                </label>  
                <?php 
                  if ($rol == 'Administrativo'): 
                ?>
                  <button type="button" class="btn btn-blue pull-right" onclick="$('#Modal_comentarios_<?php echo $cont; ?>').modal();">Comentarios</button>
                <?php 
                  endif; 
                ?>	
              </div>
              <br/>
              <!--Este check sólo lo verá el administrador-->
              <p class="desc"><?php echo $actividades_evaluadas[$z]['Activity']['descripcion_actividad']; ?></p>
              <span class="label label-sm label-warning pull-left" onclick="$('#Modal_evaluadas_<?php echo $cont; ?>').modal();">Ver mas...</span> 
            </td>
          </tr>
          <?php 

            $cont++;
            if($_limite ==  $cont){
              die;
            }
        } 
  ?>



        <?php 
        $cont= 0;
        //print_r($actividades_evaluadas);
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
  <!--BREADCRUMB-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                           Registro de resultados</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo $abs_base.'home/usuario';?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Charts</a>&nbsp;&nbsp;<i class="fa fa-tachometer"></i>&nbsp;&nbsp;</li>
                        <li class="active">Registro de resultados</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--BREADCRUMB-->
                <!--CONTENIDO-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                          <div class="col-lg-12">
                            <div class="panel income db mbm">
                              <div class="panel-body">
                                <div class="panel-body pan">
                                  <div class="form-group mbn">
                                    <div class="col-lg-9">
                                      <div class="panel panel-grey">
                                        <div class="panel-heading"> Selecciona Actividad</div>
                                        <div class="panel-body pan">

                                          <?php echo $this->Form->create('Activity', array('url' => array('action' => 'evaluate'))); ?>


                                          <!--BUSCAR ACTIVIDAD-->
                                            <div class="form-body pal">
                                           		<div class="form-group">
                                                <select class="form-control" name="actividad_id" id="actividad_id">
                                                  <?php
                                                if ($actividades_sin_evaluar) {
                                                  foreach($actividades_sin_evaluar as $key => $act) { ?>
                                                      <option value="<?php echo $key; ?>"><?php echo $act; ?></option>
                                                  <?php } 
                                                } else { ?>
                                                      <option value="0">SIN ACTIVIDADES POR EVALUAR</option>
                                                <?php } ?>

                                                </select>

                                              
                                            </div>
                                            </div>

                                            <div class="form-actions text-right pal">
                                            <?php
                                            if ($actividades_sin_evaluar) { ?>
                                              <button type="button" class="btn btn-primary" onclick="evaluar();"> Enviar</button>
                                            <?php } ?>

                                            </div>
                                          </form>
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

                <!--fin CONTENIDO-->
               
<script>

function evaluar() {
  var id = $('#actividad_id').val();
  location.href = "<?php echo $abs_base;?>activities/evaluate/" + id;
}
</script>
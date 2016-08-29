                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Gestión Ambitos</div> 
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo $abs_base.'home/admin'; ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                   
                        <li class="active"><i class="fa fa-file-o fa-fw"></i>Gestión Ambitos</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--BREADCRUMB-->
                <!-- COMIENZA Contenido-->
              <div class="page-content">
              <?php echo $this->Form->create('Scope', array('id' => 'form_actividad', 'class' => 'form-horizontal')); ?>
                <div id="tab-general">
                        <div class="row mbl">

                            <div class="col-lg-12">
                                  
                              <div class="row">
                    <div class="col-md-12">

                        <div class="row mtl">

                             <!-- IMAGEN REFERENCIAL DE ACTIVIDAD-->
 							<!-- COMIENZA FORMULARIO-->
                            <div class="col-md-12">
                               
                                <div id="generalTabContent" class="tab-content">
                                    <div id="tab-edit" class="tab-pane fade in active">  
                                      <h3>Crear Ambito</h3>
                                      <a href="<?php echo $abs_base.'scopes/index'; ?>" class="btn btn-red pull-right"  style="margin-top:-47px;">Cancelar</a>
                                      <div class="clearfix"></div>
                                      
                                      <hr>
                                          <div class="form-group">
                                                  <div class="col-sm-12 controls">
                                                    <div class="row">


                                                        <div class="col-xs-12">

                                          <div class="col-sm-12">
                                            <label class="col-sm-3 control-label">Nombre</label> 

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                        <input id="nombre" maxlength="50" name="data[Scope][ambito]" type="text" placeholder="" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                          </div>           

                                          <div class="clearfix"></div>  
                                          <br><br>                                           
                                          <div class="col-sm-7 controls">
															<button type="button" class="btn btn-blue pull-right" onclick="valida_formulario();">Enviar</button>
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
                                
                            
                     
                            
                        </div>
                    </div>
                    </div>
                    </form>
                </div>
                <!--FIN CONTENIDO-->
                

<script>
    function valida_formulario() {
      var error = [];
if ($.trim($('#nombre').val()) == '') {
    error.push('Los campos no deben estar vacíos.');
}
      if (error.length == 0) {
        document.forms['form_actividad'].submit();
      } else {
        var listado = error.join("<div class='clearfix'></div>");
        $("#lista_errores").html(listado);
        $("#Modal_validacion").modal();
        return;
      }
    }
</script>                          

  <!-- Modal PORCENTAJES FINANCIAMIENTO-->
<div id="Modal_validacion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">VALIDACION DEL FORMULARIO</h4>
      </div>
      <div class="modal-body">
        <p>Estimado Usuario.</p>
        <p></p>
        <div id="lista_errores">
        </div>
        <div class="clearfix"></div>
        <br>
        <p>Si tiene alguna duda al respecto, favor de comunicarse con la mesa de ayuda.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>                        
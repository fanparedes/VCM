    <div class="page-form" style="margin:5% auto 0 auto;">
        <div class="panel panel-blue">
            <div class="panel-body pan">
            <?php echo $this->Form->create('Usuario', array('class' => 'form-horizontal')); ?>		
                <div class="form-body pal">
                  <div class="form-group">
                    <div class="col-md-9 text-center">
                        <h1>&nbsp;                      </h1>
                        <div class="col-md-3">
                          <div class="col-md-12 text-center"><img src="<?php echo $abs_base;?>images/logo_login.png"/><br />
                          </div>
                        </div>
     
                    </div>
                  </div>
                    <div class="form-group">
                        <label for="inputName" class="col-md-3 control-label">
                            Usuario:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-user"></i>
                                <?php echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Username', 'div' => 'field', 'class' => 'form-control')); ?>

                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-md-3 control-label">
                            Password:</label>
                        <div class="col-md-9">
                            <div class="input-icon right">
                                <i class="fa fa-lock"></i>
                                <?php echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Contraseña', 'div' => 'field', 'class' => 'form-control')); ?>
                                </div>
                        </div>
                    </div>
                    <div class="form-group mbn">
                        <div class="col-lg-12" align="right">
                            <div class="form-group mbn">
                                <div class="col-lg-3">
                                    &nbsp;
                                </div>
                                <div class="col-lg-9">
                                    <button type="submit" class="btn btn-default">
                                        Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-lg-12 text-center">
                
                <!-- Trigger the modal with a button -->
<p style="cursor: pointer;" type="button" data-toggle="modal" data-target="#myModal">Olvidaste tu clave?</p>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Olvido de Contraseña</h4>
      </div>
      <div class="modal-body">
        <p>Estimado, si ha olvidado la contraseña, favor de comunicarse con la mesa de ayuda.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
        </div>
    </div>




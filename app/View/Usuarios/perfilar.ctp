                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Gestión de Perfiles</div> 
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard_a.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                   
                        <li class="active"><i class="fa fa-file-o fa-fw"></i>Gestión Perfiles</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--BREADCRUMB-->
                <!-- COMIENZA Contenido-->
              <div class="page-content">
              <?php echo $this->Form->create('Usuario', array('class' => 'form-horizontal')); ?>
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
                                      <h3>Agregar y Perfilar Usuarios</h3>
                                          <div class="form-group">
                                            <label class="col-sm-3 control-label">Perfil Actual</label> 

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                        <?php
                                                          if ($usuario['Usuario']['role'] == null) {
                                                            $perfil = 'Sin perfil asignado.';
                                                          } else {
                                                            $perfil = $usuario['Usuario']['role'];
                                                          }
                                                        ?>
                                                          <input disabled="disabled" value="<?php echo $perfil;?>" type="text" class="form-control"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-sm-3 control-label">Perfil Nuevo</label> 

                                                <div class="col-sm-9 controls">
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                          <input type="hidden" value="<?php echo $usuario['Usuario']['id'];?>" name="data[Usuario][id]">
                                                          <select name="data[Usuario][role]" class="form-control">
                                                            <option value="Admin">
                                                              Admin
                                                            </option>
                                                            <option value="Administrativo">
                                                              Administrativo
                                                            </option>
                                                            <option value="Usuario">
                                                              Usuario
                                                            </option>
                                                          </select>
                                                        </div>
                                                    </div>
                                                </div>
                                          </div>
                      										  <hr/>
                      										  <br/><br/>
                                          <button type="submit" class="btn btn-red btn-block">Enviar</button>
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

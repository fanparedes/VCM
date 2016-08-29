                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Gestión de Perfiles</div> 
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo $abs_base.'home/admin'; ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                   
                        <li class="active"><i class="fa fa-file-o fa-fw"></i>Gestión Perfiles</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--BREADCRUMB-->
                <!-- COMIENZA Contenido-->
              <div class="page-content">
              <form class="form-horizontal">
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
                                                  <div class="col-sm-12 controls">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                          <table class="table table-bordered table-hover">
                                                            <thead> 
                                                              <tr>
                                                                <th>
                                                                <?php echo $this->Paginator->sort('apellido_pat', 'Ap. Pat'); ?>
                                                                    
                                                                </th>
                                                                <th>
                                                                <?php echo $this->Paginator->sort('apellido_mat', 'Ap. Mat'); ?>
                                                                   
                                                                </th>
                                                                <th>
                                                                <?php echo $this->Paginator->sort('nombre', 'Nombre'); ?>
                                                                    
                                                                </th>
                                                                <th>
                                                                <?php echo $this->Paginator->sort('username', 'Username'); ?>
                                                                    
                                                                </th>
                                                                <th>
                                                                <?php echo $this->Paginator->sort('rut', 'Rut'); ?>
                                                                    
                                                                </th>
                                                                <th>
                                                                <?php echo $this->Paginator->sort('estado', 'Estado'); ?>
                                                                  
                                                                </th>
                                                                <th>
                                                                 Acción
                                                                </th>

                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                          <?php
                                                          foreach($dmusers as  $dmuser) { ?>
                                                              <tr>

                                                              <td>
                                                                <?php echo $dmuser['Dmuser']['apellido_pat'];?>
                                                              </td>
                                                              <td>
                                                                <?php echo $dmuser['Dmuser']['apellido_mat'];?>
                                                              </td>
                                                              <td>
                                                                <?php echo $dmuser['Dmuser']['nombre1'];?>
                                                              </td>
                                                              <td>
                                                                <?php echo $dmuser['Dmuser']['username'];?>
                                                              </td>
                                                              <td>
                                                                <?php echo $dmuser['Dmuser']['rut'].'-'.$dmuser['Dmuser']['dv_rut'];?>
                                                              </td>
                                                              <td>
                                                                <?php echo $dmuser['Dmuser']['estado'];?>
                                                              </td>
                                                              <td>
                                                                <a href="<?php echo $abs_base.'usuarios/importar_usuario/'.$dmuser['Dmuser']['cod_funcionario']; ?>" class="btn btn-green btn-block" >Agregar/Actualizar</a>
                                                              </td>
                                                              </tr>

                                                          <?php } ?>

                                                            </tbody>
                                                            </table>
  <p>
  <?php
  echo $this->Paginator->counter(array(
    'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} totales, empezando en el  {:start}, y terminando en el {:end}')
  ));
  ?>  </p>
  <div class="paging">
  <?php
    echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
  ?>
  </div>
                                                          </div>

                                                          <div class="clearfix"></div>
                                                          

                                                          <hr>

                                                        <div class="col-xs-12">
                                                          <table id="tabla_users">
                                                            <thead> 
                                                              <tr>
                                                                <th>
                                                                  Apellidos
                                                                </th>
                                                                <th>
                                                                  Nombre
                                                                </th>
                                                                <th>
                                                                  Username  
                                                                </th>
                                                                <th>
                                                                  Perfil
                                                                </th>
                                                                <th>
                                                                  Estado
                                                                </th>
                                                                <th>
                                                                 Acción
                                                                </th>

                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                          <?php
                                                          foreach($usuarios as  $usuario) { ?>
                                                              <tr>

                                                              <td>
                                                                <?php echo $usuario['Usuario']['apellidos'];?>
                                                              </td>
                                                              <td>
                                                                <?php echo $usuario['Usuario']['nombre'];?>
                                                              </td>
                                                              <td>
                                                                <?php echo $usuario['Usuario']['username'];?>
                                                              </td>
                                                              <td>
                                                                <?php 
                                                                if ($usuario['Usuario']['role'] == null) {
                                                                  $perfil = "Perfil sin asignar";
                                                                } else {
                                                                  $perfil = $usuario['Usuario']['role'];
                                                                }
                                                                echo $perfil;?>
                                                              </td>
                                                              <td>
                                                                <?php echo $usuario['Usuario']['activo'];?>
                                                              </td>
                                                              <td>
                                                                <a href="<?php echo $abs_base.'usuarios/perfilar/'.$usuario['Usuario']['id']; ?>" class="btn btn-green btn-block" >Editar</a>
                                                              </td>
                                                              </tr>

                                                          <?php } ?>

                                                            </tbody>
                                                            </table>
                                                          </div>





















                                                    </div>
                                                </div>
                                          </div>

                      										  <hr/>
                      										  <br/><br/>
                                        
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
  $(document).ready(function(){
      $('#tabla_users').DataTable();
  });


</script>
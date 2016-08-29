<!--BREADCRUMB-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Home</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="<?php echo $abs_base.'home/administrativo';?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                   
                      
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
                           <div class="row"></div>	

                          </div>
                          <div class="col-lg-12">
                            
                            <div class="page-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel">
                    <?php echo $this->Form->create('Activity', array('url' => array('controller' => 'home', 'action' => 'administrativo'), 'id'=> 'form_actividad', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>

						<div class="panel-body">
    						<div class="col-md-10">
                                <div class="col-sm-2">

                             <div class="btn-group "><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Principios" aria-expanded="true"><span class="multiselect-selected-text">Principios</span> <b class="caret"></b></button>
                                    <ul class="multiselect-container dropdown-menu ">
                                    <?php 
                                    foreach($beginnings as $key => $beginning) { ?>

                                        <li ><a tabindex="0">
                                            <label class="checkbox">
                                            <input type="checkbox" name="data[Beginning][<?php echo $key;?>]" value="<?php echo $key; ?>"> <?php echo $beginning; ?></label></a>
                                        </li>

                                    <?php } ?>
                                    </ul>
                                 </div>
                            </div>
                             
                            

                               <div class="col-sm-2">
                                    
                                 <div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Principios" aria-expanded="true"><span class="multiselect-selected-text">Ámbitos</span> <b class="caret"></b></button>
                                    <ul class="multiselect-container dropdown-menu">
                                    <?php 
                                    foreach($scopes as $key => $scope) { ?>

                                        <li ><a tabindex="0">
                                            <label class="checkbox">
                                            <input type="checkbox" name="data[Scope][<?php echo $key;?>]" value="<?php echo $key; ?>"> <?php echo $scope; ?></label></a>
                                        </li>

                                    <?php } ?>
                                    </ul>
                                 </div>
                             </div>
                            
                             <div class="col-sm-2">
                                    
                                   
                                    <div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Entidades" aria-expanded="true"><span class="multiselect-selected-text">Entidades</span> <b class="caret"></b></button>
                                    <ul class="multiselect-container dropdown-menu">
                                    <?php 
                                    foreach($entities as $key => $entity) { ?>

                                        <li ><a tabindex="0">
                                            <label class="checkbox">
                                            <input type="checkbox" name="data[Entity][<?php echo $key;?>]" value="<?php echo $key; ?>"> <?php echo $entity; ?></label></a>
                                        </li>

                                    <?php } ?>
                                    </ul>
                                    </div>
                                </div>
                            
                             <div class="col-sm-2">
                                    
                                    <div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Entidades" aria-expanded="true"><span class="multiselect-selected-text">Recursos</span> <b class="caret"></b></button>
                                    <ul class="multiselect-container dropdown-menu">
                                    <li ><a tabindex="0">
                                    <label class="checkbox">
                                    <input type="checkbox"  name="data[Recursos][0]" value="0"> Interno</label></a></li>
                                    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="data[Recursos][1]" value="1"> Externo</label></a></li>
                                    <li class=""><a tabindex="0"><label class="checkbox"><input type="checkbox" name="data[Recursos][2]" value="2"> Mixto</label></a></li>
                                   </ul>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    
                                    <div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Entidades" aria-expanded="true"><span class="multiselect-selected-text">Evaluación</span> <b class="caret"></b></button>
                                    <ul class="multiselect-container dropdown-menu">
                                    <li ><a tabindex="0">
                                    <label class="checkbox">
                                    <input type="checkbox" name="data[Estrellas][5]" value="5"> 5 Estrellas</label></a></li>
                                    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" name="data[Estrellas][4]" value="4"> 4 Estrellas</label></a></li>
                                    <li class=""><a tabindex="0"><label class="checkbox"><input type="checkbox" name="data[Estrellas][3]" value="3"> 3 Estrellas</label></a></li>
                                     <li class=""><a tabindex="0"><label class="checkbox"><input type="checkbox" name="data[Estrellas][2]" value="2"> 2 Estrellas</label></a></li>
                                      <li class=""><a tabindex="0"><label class="checkbox"><input type="checkbox" name="data[Estrellas][1]" value="1"> 1 Estrellas</label></a></li>
                                   </ul>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                    </div>
                                </div>
                            </div>
						</div>

                    </form>

         
                               <div class="row mbl">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-body">





                                        <div class="row">
                                            <div class="col-md-8">


<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#menu1">Resultados Actividades</a></li>

</ul>

<div class="tab-content">
  <div id="menu1" class="tab-pane fade in active">

                                                <div id="grafico1" style="width: 100%; height: 300px">
</div>

  </div>

</div>
                                                    






<script>

$(function () {
    chart2 = new Highcharts.Chart({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            renderTo : 'grafico1',
            type: 'pie'
        },
        title: {
            text: 'Actividades Resultados Positivos / Negativos'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Positivos',
                y: <?php echo $cant_positivos; ?>
            }, {
                name: 'Negativos',
                y: <?php echo $cant_negativos; ?>
            }]
        }]
    });
});
</script>

                                                
                                            </div>
                                            <div class="col-md-4">
                                                <h4 class="mbm">Status</h4>
                                                <?php if (isset($por_ter)):?>
													<!--debe poder exportar los datos en excel de los datos de las fichas filtradas--><span class="task-item">Fichas terminadas<small class="pull-right text-muted"><?php echo $por_ter; ?>%</small><div
														class="progress progress-sm">
														<div role="progressbar" aria-valuenow="<?php echo $por_ter; ?>" aria-valuemin="0" aria-valuemax="100"
															style="width: <?php echo $por_ter; ?>%;" class="progress-bar progress-bar-orange">
															<span class="sr-only"><?php echo $por_ter; ?>% </span></div>
													</div>
													</span><!--debe poder exportar los datos en excel de los datos de las fichas filtradas--><span>Fichas en proceso<small class="pull-right text-muted"><?php echo $por_pro; ?>%</small><div
														class="progress progress-sm">
														<div role="progressbar" aria-valuenow="<?php echo $por_pro; ?>" aria-valuemin="0" aria-valuemax="100"
															style="width: <?php echo $por_pro; ?>%;" class="progress-bar progress-bar-blue">
															<span class="sr-only"><?php echo $por_pro; ?>%</span></div>
													</div>
													</span><!--debe poder exportar los datos en excel de los datos de las fichas filtradas--><span>Actividades resultados positivos<small class="pull-right text-muted"><?php echo $por_pos; ?>%</small><div
														class="progress progress-sm">
														<div role="progressbar" aria-valuenow="<?php echo $por_pos; ?>" aria-valuemin="0" aria-valuemax="100"
															style="width: <?php echo $por_pos; ?>%;" class="progress-bar progress-bar-green">
															<span class="sr-only"><?php echo $por_pos; ?>%</span></div>
													</div>
													</span><!--debe poder exportar los datos en excel de los datos de las fichas filtradas--><span>Actividades resultados negativos<small class="pull-right text-muted"><?php echo $por_neg; ?>%</small><div class="progress progress-sm">
														<div role="progressbar" aria-valuenow="<?php echo $por_neg; ?>" aria-valuemin="0" aria-valuemax="100"
															style="width: <?php echo $por_neg; ?>%;" class="progress-bar progress-bar-yellow">
															<span class="sr-only"><?php echo $por_neg; ?>% Complete (success)</span></div>
													</div>
													</span><!--debe poder exportar los datos en excel de los datos de las fichas filtradas--><span>Total de fichas cargadas<small class="pull-right text-muted"><?php echo $total_act; ?></small><div
														class="progress progress-sm">
														<div role="progressbar" aria-valuenow="<?php echo $total_act; ?>" aria-valuemin="0" aria-valuemax="<?php echo $total_act; ?>"
															style="width: <?php echo $total_act; ?>%;" class="progress-bar progress-bar-pink">
															<span class="sr-only"><?php echo $total_act; ?>%</span></div>
													</div>
													</span><!--debe poder exportar los datos en excel de los datos de las fichas filtradas-->
												<?php else:  ?>
													<div>No se han encontrado actividades con los criterios de búsqueda seleccionados.</div>
												
												<?php endif; ?>
                                            </div>
                                        </div>


                                            </div>

                                        </div>
                                        <div class="container-fluid">
                                            <div class="col-md-12">
                                                <?php
                                                echo $this->Html->link('<span class="fa fa-gear"></span>&nbsp; Exportar a Excel', array(
                                                    'controller' => 'home',
                                                    'action' => 'exportar_estadistica'),
                                                    array(
                                                        'class' => 'btn btn-green dropdown-toggle',
                                                        'escape' => false
                                                        )
                                                    );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
</div>
                              
                                <div class="jplist-panel box panel-bottom">
                                  <div data-control-type="pagination" data-control-name="paging" data-control-action="paging" data-control-animate-to-top="true" class="jplist-pagination"></div>

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
                <!--END CONTENT-->
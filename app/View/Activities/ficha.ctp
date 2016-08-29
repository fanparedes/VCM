				<!--BREADCRUMB-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Información de Actividad</div>
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
                   
                        <li class="active"><i class="fa fa-file-o fa-fw"></i><a href="<?php echo $abs_base.'activities/listado';?>"> Actividades Duoc UC</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                         <li class="active"><i class="fa fa-file-o fa-fw"></i>Actividad</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--BREADCRUMB PAGE-->
                <!--BEGIN CONTENIDO-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                
                                            <div class="col-md-12">
                                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                                </div>
                                            </div>
                                
                            </div>
                            <h2 class="mbxl"><?php echo $activity['Activity']['nombre']; ?>  </h2>
							<div class="row">
											<div class="col-md-6"><!-- BOTONES -->
                        <?php
												echo $this->Html->link('<i class="fa fa-download"></i> &nbsp; Descargar ficha PDF', array(
													'controller' => 'activities',
													'action' => 'exporta_pdf_ficha',
													$activity['Activity']['id']),
													array(
														'class' => 'btn btn-blue',
														'escape' => false
														)
													);
												?>
												<?php
												echo $this->Html->link('<span class="fa fa-gear"></span>&nbsp; Exportar a Excel', array(
													'controller' => 'activities',
													'action' => 'exportar_excel_ficha',
													$activity['Activity']['id']),
													array(
														'class' => 'btn btn-green dropdown-toggle',
														'escape' => false
														)
													);
												?>
											</div>
							</div>
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p><b>Origen demanda:</b><?php
                                    if ($activity['Activity']['actividad_hito'] == 1) { ?>
                                        Interna
                                    <?php }  else { ?>
                                        Externa
									<?php } ?>
									</p>
									<p><b>Descripción:</b> <?php echo $activity['Activity']['descripcion_actividad']; ?></p>
									<p><b>Pertenece:</b>
									   <?php
									   foreach($activity['Headquarter'] as $sede) {
											echo $sede['nombre_sede']." / ";

									   } ?>
									   <?php
									   foreach($activity['School'] as $sede) {
											echo $sede['nombre_escuela']." / ";

									   } ?>
									   <?php
									   foreach($activity['Central'] as $sede) {
											echo $sede['nombre']." / ";

									   } ?>
                                   </p>
								    <p><b>Se enmarca el proyecto en:</b></p>
								    <p><?php echo $activity['Activity']['proyectoglobal']; ?></p>
								</div>
								<div class="col-md-4 col-md-offset-2">
									<figcaption class="ratings"><p>
										<?php 
										for($i=1; $i <= 5; $i++ ) { 
											if ($i <= $activity['Review']['0']['puntuacionarea']) { ?>
												<!-- <a href="#"><span class="fa fa-star"></span></a> -->
											<?php } else  { ?>
											
												<!-- <a href="#"><span class="fa fa-star-o"></span></a> -->
											<?php } ?>
									<?php } ?>
									</p></figcaption>     
									<div><?php //echo $activity['Review']['0']['involucramientoarea']; ?></div>								
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p><b>Fechas de la Actividad:</b></p>
									<p><?php echo $this->Time->format($activity['Activity']['fechainicio_proyecto'], '%d-%m-%Y'); ?> al <?php echo $this->Time->format($activity['Activity']['fechafinal_proyecto'], '%d-%m-%Y'); ?></p>								
								</div>
								<div class="col-md-4 col-md-offset-2">
									<figcaption class="ratings"><p>
										<?php 
										for($i=1; $i <= 5; $i++ ) { 
											if ($i <= $activity['Review']['0']['puntuacionplazo']) { ?>
												<!-- <a href="#"><span class="fa fa-star"></span></a> -->
											<?php } else  { ?>
											
												<!-- <a href="#"><span class="fa fa-star-o"></span></a>-->
											<?php } ?>
										<?php } ?>
										</p>
									</figcaption> 
									<div><?php //echo $activity['Review']['0']['cumplimientoplazos']; ?></div>									
								</div>
							</div>
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p><b>Nombre del responsable: </b> <?php echo $activity['Activity']['responsable']; ?></p>
									<p><b>Cargo: </b><?php echo $activity['Activity']['cargoresponsable']; ?></p>
									<p><b>Email: </b><a href="mailto:<?php echo $activity['Activity']['mail_responsable']; ?>" target="_blank"><?php echo $activity['Activity']['mail_responsable']; ?></a></p>
															
								</div>
								<div class="col-md-4 col-md-offset-2">
						
								</div>
							</div>
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p><b>La actividad pertenece algún convenio:</b> <?php echo $activity['Activity']['convenio_si_no']; ?> </p>							
								</div>
								<div class="col-md-4 col-md-offset-2">
						
								</div>
							</div>
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col-md-6">
									<p><b> Sus entidades relacionadas son:</b></p>
									<ul>
                                      <?php
									   foreach($activity['Entity'] as $entidad) {
											echo "<li>".$entidad['entidades']."</li>";
									   } 
									   ?>
									</ul>	
									<p><b>Objetivo General y Específicos:</b> <?php echo $activity['Activity']['objetivo_general']; ?></p>
									<ul>
									   <?php
									   foreach($activity['Objetive'] as $objetivo) {
											echo "<li>".$objetivo['objetivo']."</li>";

									   } ?>
									</ul>
								</div>
								<div class="col-md-4 col-md-offset-2">
									<!-- <b>Puntuación Entidades</b><br>-->
									<figcaption class="ratings"><p>
											<?php 
												if ($activity['Review']['0']['entidadesrelacionadas'] == 0) { ?>
													<!-- <strong>LOGRADO</strong>-->
												<?php } else  { ?>
													<!-- <strong>NO LOGRADO</strong>-->
												<?php } ?>
											   


											</p></figcaption>     
											<div><?php //echo $activity['Review']['0']['entidades']; ?></div>
									<!-- <b>Puntuación objetivos:</b><br>-->
									<figcaption class="ratings">
									<?php 
									for($i=1; $i <= 5; $i++ ) { 
										if ($i <= $activity['Review']['0']['puntuacionobjetivo']) { ?>
											<!-- <a href="#"><span class="fa fa-star"></span></a>-->
										<?php } else  { ?>
										
											<!-- <a href="#"><span class="fa fa-star-o"></span></a>-->
										<?php } ?>
									<?php } ?>
									</figcaption>     
									<div><?php //echo $activity['Review']['0']['cumplimientoobjetivos']; ?></div>
								</div>
							</div>
							<div class="row">
								<br>
							</div>	
							<div class="row">
								<div class="col-md-10">
									<p><b>Públicos abordados son:</b></p>										 
										 <?php
										 foreach($activity['Internal'] as $internal) { ?>
										<div class="row">
											<div class="col-md-6"><?php echo "".$internal['publico'].""; ?></div>
											<div class="col-md-2"><?php //echo $internal['ActivityInternal']['comentario']; ?></div>
											<div class="col-md-3 ">
												<figcaption class="ratings pull-right" style="margin-top:0px;!important;">
												<?php 
												for($i=1; $i <= 5; $i++ ) { 
													if ($i <= $internal['ActivityInternal']['evaluacion']) { ?>
														<!-- <a href="#"><span class="fa fa-star"></span></a>-->
													<?php } else  { ?>
													
														<!-- <a href="#"><span class="fa fa-star-o"></span></a>-->
													<?php } ?>
												<?php } ?>
												</figcaption>
												<br>
											</div>  					   
										</div>
										<?php } ?>
								</div>
							</div>
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col-md-10">
									<p><b><?php echo $activity['Activity']['numeroparticipantes']; ?></b></p>
                                     <?php
                                   foreach($activity['External'] as $external) { ?>

									<div class="row">
										<div class="col-md-6"><?php     echo "".$external['publicoexterno'].""; ?></div>
										<div class="col-md-2"><?php //echo $external['ActivityExternal']['comentario']; ?></div>
										<div class="col-md-3">
											<figcaption class="ratings pull-right" style="margin-top:0px!important">
												<?php 
												for($i=1; $i <= 5; $i++ ) { 
													if ($i <= $external['ActivityExternal']['evaluacion']) { ?>
														<!-- <a href="#"><span class="fa fa-star"></span></a>-->
													<?php } else  { ?>
													
														<!-- <a href="#"><span class="fa fa-star-o"></span></a>-->
													<?php } ?>
												<?php } ?>
											</figcaption> 
										</div>  
									</div>

									<?php } ?>
									<p><b><?php echo $activity['Activity']['numeroexternos']; ?></b></p>    
								</div>
							</div>
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col-md-6">
										<p><b>Beneficiarios del proyecto:</b><?php echo $activity['Activity']['beneficiados']; ?></p>
								</div>
								<div class="col-md-4 col-md-offset-2">
									<figcaption class="ratings">
										<p>
										<?php 
										for($i=1; $i <= 5; $i++ ) { 
											if ($i <= $activity['Review']['0']['puntuacionprincipios']) { ?>
												<!-- <a href="#"><span class="fa fa-star"></span></a>-->
											<?php } else  { ?>
											
												<!-- <a href="#"><span class="fa fa-star-o"></span></a>-->
											<?php } ?>
										<?php } ?>
										   


										</p>
									</figcaption>     
									<br><?php //echo $activity['Review']['0']['cumplimientoprincipios']; ?>
									</div> 
							</div>
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col-md-6">
										<p><b>Principios comprendidos:</b></p>
										<?php
									   foreach($activity['Beginning'] as $principio) {
											echo '<span class="label label-sm label-success">'.$principio['principio'].' / </span>';

																		   } ?>
																			 </p>
										 <p><?php echo $activity['Activity']['justificacionprincipios']; ?>
										</p>
								</div>
								<div class="col-md-4 col-md-offset-2">
									<figcaption class="ratings">
										<p>
										<?php 
										for($i=1; $i <= 5; $i++ ) { 
											if ($i <= $activity['Review']['0']['puntuacionprincipios']) { ?>
												<!-- <a href="#"><span class="fa fa-star"></span></a>-->
											<?php } else  { ?>
											
												<!-- <a href="#"><span class="fa fa-star-o"></span></a>-->
											<?php } ?>
										<?php } ?>
										   


										</p>
									</figcaption>     
									<br><?php //echo $activity['Review']['0']['cumplimientoprincipios']; ?>
									</div> 
							</div>
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col-md-10">
										<p><b>Ámbitos de acción son:</b></p>									
									<?php
									   foreach($activity['Scope'] as $ambito) { ?>
										<div class="row">
											<div class="col-md-8">											
												<?php    echo $ambito['ambito']; ?>
											</div>
											<div class="col-md-3">
												<figcaption class="ratings pull-right" style="margin-top:0px!important; margin-left:50px;"><p>
												<?php 
												for($i=1; $i <= 5; $i++ ) { 
													if ($i <= $ambito['ActivityScope']['evaluacion']) { ?>
														<!-- <a href="#"><span class="fa fa-star"></span></a>-->
													<?php } else  { ?>
													
														<!-- <a href="#"><span class="fa fa-star-o"></span></a>-->
													<?php } ?>
												<?php } ?>
												</p></figcaption>     
												<div><?php //echo $ambito['ActivityScope']['comentario']; ?></div>											
											</div>
										</div>
										 <?php                             } ?>								       
								</div>
								<div class="col-md-4 col-md-offset-2">
								</div>
							</div>
							<div class="row">
								<br>
							</div>
							<div class="row">
								<div class="col-md-6">
									 <p><b>Monto estimado: </b>$<?php echo $activity['Activity']['costoactividad']; ?></p>									 
																	<?php
																	if ($activity['Activity']['financiamiento_i_e_m'] == 0) { ?>
																		<p><b>Su fuente de recursos será:  </b> 
																			Interna
																		</p>
																		<p><b>Dirección Central: </b><?php echo $activity['Activity']['direccioncentral']; ?>% </p>
																		<p><b>Sedes: </b><?php echo $activity['Activity']['sedesporcentaje']; ?>% </p>
																		<p><b>Escuelas: </b><?php echo $activity['Activity']['escuelasporcentaje']; ?>%</p>
																	<?php } ?>
																	<?php
																	if ($activity['Activity']['financiamiento_i_e_m'] == 1) { ?>
																		<p>
																			<b>Su fuente de recursos será:</b>	Externa
																		 </p>
																		<p><b>Fondos Concursables: </b><?php echo $activity['Activity']['fondoconcursable']; ?>% </p>
																		<p><b>Entorno Productivo: </b> <?php echo $activity['Activity']['entornoproductivo']; ?>%</p>
																		<p><b>Entidades Académicas: </b> <?php echo $activity['Activity']['entidadesacademicas']; ?>%</p>
																		<p><b>Donaciones: </b> <?php echo $activity['Activity']['donacionesporcentaje']; ?>%</p>
																	<?php } ?>
																	<?php
																	if ($activity['Activity']['financiamiento_i_e_m'] == 2) { ?>
																		<p><b>Su fuente de recursos será:</b> 
																			Mixta
																		 </p>
																		<p><b>Dirección Central: </b><?php echo $activity['Activity']['direccioncentral']; ?>% </p>
																		<p><b>Sedes: </b><?php echo $activity['Activity']['sedesporcentaje']; ?>%</p>
																		<p><b>Escuelas: </b><?php echo $activity['Activity']['escuelasporcentaje']; ?>%</p>
																		<p><b>Fondos Concursables: </b><?php echo $activity['Activity']['fondoconcursable']; ?>%</p>
																		<p><b>Entorno Productivo: </b><?php echo $activity['Activity']['entornoproductivo']; ?>%</p>
																		<p><b>Entidades Académicas: </b><?php echo $activity['Activity']['entidadesacademicas']; ?>%</p>
																		<p><b>Donaciones:</b> <?php echo $activity['Activity']['donacionesporcentaje']; ?>%</p>
																	<?php } ?>
								</div>
								<div class="col-md-4 col-md-offset-2">
								<figcaption class="ratings">
									<?php 
										if ($activity['Review']['0']['presupuesto'] == 0) { ?>
											<!-- <strong>LOGRADO</strong>-->
										<?php } else  { ?>
											<!-- <strong>NO LOGRADO</strong>-->
										<?php } ?>		
									</figcaption>     
									<p><?php //echo "Equipo Humano: $".$activity['Review']['0']['contratacionequipohumano']; ?></p>
									<p><?php //echo "Instalación: $".$activity['Review']['0']['instalacion']; ?></p>
									<p><?php //echo "Otros Gastos: $".$activity['Review']['0']['otrosgastos']; ?></p>
								</div>
							</div>
							<!-- IMÁGENES -->
							<div class="row">
                                    <div class="col-lg-12">
										<h4 class="mbxl">Imágenes de la actividad <!-- estas se deberán cargar cuando se carguen en el reporte de resultados--></h4>
									</div>
									<div class="clearfix"></div>
                                     <?php
									foreach($activity['Image'] as $image) { 
										if ($image['tipo'] == 1) {
										?>
                                            <div class="col-lg-3">
                                                <div class="member-team"><img src="<?php echo $abs_base.'uploads/'.$image['nombre']; ?>" class="img-responsive"/>
 
                                                </div>
                                            </div>
                                   <?php } } ?>
                            </div>
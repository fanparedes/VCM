<div>
	<img src="<?php echo $abs_base;?>images/logo_pdf.png" style="margin-top:-10px;"/>
</div>
<h2 class="mbxl" style="font-size: 40px; width: 70%"><?php echo $activity['Activity']['nombre']; ?>  </h2>
<hr />
<br />

<div class="row">
	<div class="col-md-6">
		<p><b>Origen demanda:</b><?php
											if ($activity['Activity']['actividad_hito'] == 0) { ?>
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
</div>
<div class="row">
	<div class="col-md-6">
		<p><b>Fechas de la Actividad:</b></p>
		<p><?php echo $this->Time->format($activity['Activity']['fechainicio_proyecto'], '%d-%m-%Y'); ?> al <?php echo $this->Time->format($activity['Activity']['fechafinal_proyecto'], '%d-%m-%Y'); ?></p>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<p><b>Nombre del responsable: </b> <?php echo $activity['Activity']['responsable']; ?></p>
		<p><b>Cargo: </b><?php echo $activity['Activity']['cargoresponsable']; ?></p>
		<p><b>Email: </b><a href="mailto:<?php echo $activity['Activity']['mail_responsable']; ?>" target="_blank"><?php echo $activity['Activity']['mail_responsable']; ?></a></p>

	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<p><b>La actividad pertenece algún convenio:</b> <?php echo $activity['Activity']['convenio_si_no']; ?> </p>
	</div>
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
</div>
<div class="row">
	<div class="col-md-10">
		<p><b>Públicos abordados son:</b></p>
			 <?php
			 foreach($activity['Internal'] as $internal) { ?>
			<div class="row">
				<div class="col-md-6"><?php echo "".$internal['publico'].""; ?></div>
			</div>
			<?php } ?>
	</div>
</div>
<div class="row">
	<div class="col-md-10">
		<p><b><?php echo $activity['Activity']['numeroparticipantes']; ?></b></p>
											 <?php
										 foreach($activity['External'] as $external) { ?>

		<div class="row">
			<div class="col-md-6"><?php     echo "".$external['publicoexterno'].""; ?></div>
		</div>

		<?php } ?>
		<p><b><?php echo $activity['Activity']['numeroexternos']; ?></b></p>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
			<p><b>Beneficiarios del proyecto:</b><?php echo $activity['Activity']['beneficiados']; ?></p>
	</div>
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
</div>
<div class="row">
	<div class="col-md-10">
			<p><b>Ámbito de acción son:</b></p>
		<?php
			 foreach($activity['Scope'] as $ambito) { ?>
			<div class="row">
				<div class="col-md-8">
					<?php    echo $ambito['ambito']; ?>
				</div>
			</div>
			 <?php                             } ?>
	</div>
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
</div>
<div class="row">
											<div class="col-lg-12">
			<h4 class="mbxl">Imágenes de la actividad <!-- estas se deberï¿½n cargar cuando se carguen en el reporte de resultados--></h4>
		</div>
		<div class="clearfix"></div>
		<table>
			<tr>
											 <?php
		foreach($activity['Image'] as $image) {
			if ($image['tipo'] == 1) {
			?>
															<td width="130px">
																		<img width="100%" src="<?php echo $abs_base.'uploads/'.$image['nombrefisico']; ?>" class="img-responsive" />
															</td>
										 <?php } } ?>
									 </tr>
									 </table>
							</div>

<table border="1">
	<tr>
		<td>Nombre:</td>
		<td><?php echo $activity['Activity']['nombre']; ?> </td>
	</tr>
	<tr>
		<td>Descripción:</td>
		<td><?php echo $activity['Activity']['descripcion_actividad']; ?></td>
	</tr>
	<tr>
		<td>Pertenece:</td>
		<td>
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
		</td>
	</tr>
	<tr>
		<td>Se enmarca el proyecto en:</td>
		<td><?php echo $activity['Activity']['proyectoglobal']; ?></td>
	</tr>
	<tr>
		<td>Fechas de la Actividad:</td>
		<td><?php echo $this->Ingenia->formatearFecha($activity['Activity']['fechainicio_proyecto']); ?> al <?php echo $this->Ingenia->formatearFecha($activity['Activity']['fechafinal_proyecto']); ?></td>
	</tr>
	<tr>
		<td>Nombre del responsable:</td>
		<td><?php echo $activity['Activity']['responsable']; ?></td>
	</tr>
	<tr>
		<td>Cargo:</td>
		<td><?php echo $activity['Activity']['cargoresponsable']; ?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><a href="mailto:<?php echo $activity['Activity']['mail_responsable']; ?>" target="_blank"><?php echo $activity['Activity']['mail_responsable']; ?></td>
	</tr>
	<tr>
		<td>La actividad pertenece algún convenio:</td>
		<td><?php echo $activity['Activity']['convenio_si_no']; ?></td>
	</tr>
	<tr>
		<td>Sus entidades relacionadas son:</td>
		<td><ul>
          <?php
		   foreach($activity['Entity'] as $entidad) {
				echo "<li>".$entidad['entidades']."</li>";
		   }
		   ?>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Objetivo General y Específicos:</td>
		<td><?php echo $activity['Activity']['objetivo_general']; ?>
			<ul>
			   <?php
			   foreach($activity['Objetive'] as $objetivo) {
					echo "<li>".$objetivo['objetivo']."</li>";

			   } ?>
			</ul>
		</td>
	</tr>
	<tr>
		<td>Públicos abordados son:</td>
		<td><?php
			foreach($activity['Internal'] as $internal) { ?>
		 		<?php echo "".$internal['publico'].""; ?>
			<?php } ?>
			<?php echo $activity['Activity']['numeroparticipantes']; ?>
			<?php
               foreach($activity['External'] as $external) { ?>
               <?php     echo "".$external['publicoexterno'].""; ?>
				<?php } ?>
				<?php echo $activity['Activity']['numeroexternos']; ?>
		</td>
	</tr>
	<tr>
		<td>Beneficiarios del proyecto:</td>
		<td><?php echo $activity['Activity']['beneficiados']; ?></td>
	</tr>
	<tr>
		<td>Principios comprendidos:</td>
		<td><?php
		   foreach($activity['Beginning'] as $principio) {
				echo $principio['principio'];
				} ?>
			 <?php echo $activity['Activity']['justificacionprincipios']; ?>
		</td>
	</tr>
	<tr>
		<td>ÃÁmbitos de acción son:</td>
		<td><?php
		   foreach($activity['Scope'] as $ambito) {
		   	echo $ambito['ambito'];
		   	} ?>
		</td>
	</tr>
	<tr>
		<td>Monto estimado:</td>
		<td>$<?php echo $activity['Activity']['costoactividad']; ?></p>
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
					<b>Su fuente de recursos serÃ¡:</b>	Externa
				 </p>
				<p><b>Fondos Concursables: </b><?php echo $activity['Activity']['fondoconcursable']; ?>% </p>
				<p><b>Entorno Productivo: </b> <?php echo $activity['Activity']['entornoproductivo']; ?>%</p>
				<p><b>Entidades Académicas: </b> <?php echo $activity['Activity']['entidadesacademicas']; ?>%</p>
				<p><b>Donaciones: </b> <?php echo $activity['Activity']['donacionesporcentaje']; ?>%</p>
			<?php } ?>
			<?php
			if ($activity['Activity']['financiamiento_i_e_m'] == 2) { ?>
				<p><b>Su fuente de recursos será¡:</b>
					Mixta
				 </p>
				<p><b>Dirección Central: </b><?php echo $activity['Activity']['direccioncentral']; ?>% </p>
				<p><b>Sedes: </b><?php echo $activity['Activity']['sedesporcentaje']; ?>%</p>
				<p><b>Escuelas: </b><?php echo $activity['Activity']['escuelasporcentaje']; ?>%</p>
				<p><b>Fondos Concursables: </b><?php echo $activity['Activity']['fondoconcursable']; ?>%</p>
				<p><b>Entorno Productivo: </b><?php echo $activity['Activity']['entornoproductivo']; ?>%</p>
				<p><b>Entidades Académicas: </b><?php echo $activity['Activity']['entidadesacademicas']; ?>%</p>
				<p><b>Donaciones:</b> <?php echo $activity['Activity']['donacionesporcentaje']; ?>%</p>
			<?php } ?></td>
	</tr>
</table>

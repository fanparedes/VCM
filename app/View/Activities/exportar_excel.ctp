<?php
	$userAgent = $_SERVER[HTTP_USER_AGENT];
	$userAgent = strtolower ($userAgent);

	if (strpos($userAgent, "windows")):
?>
<html>
<head>
   <meta http-equiv="content-type" content="text/html; ISO-8859-1">
</head>

<body>
<table border="1">
	<thead>
		<tr>
			<th><?php echo  utf8_decode('ID actividad'); ?></th>
			<th><?php echo  utf8_decode('Nombre de usuario'); ?></th>
			<th><?php echo  utf8_decode('Nombre de Actividad'); ?></th>
			<th><?php echo  utf8_decode('Actividad Hito'); ?></th>
			<th><?php echo  utf8_decode('Origen de proyecto'); ?></th>
			<th><?php echo  utf8_decode('Breve descripción de la Actividad'); ?></th>
			<th><?php echo  utf8_decode('Pertenece'); ?></th>
			<th><?php echo  utf8_decode('Escuelas a las que pertenece'); ?></th>
			<th><?php echo  utf8_decode('Sedes a las que pertenece'); ?></th>
			<th><?php echo  utf8_decode('Áreas centrales a las que pertenece'); ?></th>
			<th><?php echo  utf8_decode('Nombre del proyecto en el qué se enmarca'); ?></th>
			<th><?php echo  utf8_decode('Ingresar Fechas'); ?></th>
			<th><?php echo  utf8_decode('Nombre del responsable de la actividad'); ?></th>
			<th><?php echo  utf8_decode('Cargo'); ?></th>
			<th><?php echo  utf8_decode('Mail'); ?></th>
			<th><?php echo  utf8_decode('Convenio al que pertenece la actividad'); ?></th>
			<th><?php echo  utf8_decode('Vigencia del convenio'); ?></th>
			<th><?php echo  utf8_decode('Breve descripción del convenio'); ?></th>
			<th><?php echo  utf8_decode('Objetivo General de la actividad'); ?></th>
			<th><?php echo  utf8_decode('Objetivos específicos'); ?></th>
			<th><?php echo  utf8_decode('Principios de la política que aborda'); ?></th>
			<th><?php echo  utf8_decode('Justificación de principios abordados'); ?></th>
			<th><?php echo  utf8_decode('Público abordado Interno'); ?></th>
			<th><?php echo  utf8_decode('Número de participantes aprox.'); ?></th>
			<th><?php echo  utf8_decode('Público abordado Externo'); ?></th>
			<th><?php echo  utf8_decode('Número de participantes aprox.'); ?></th>
			<th><?php echo  utf8_decode('Beneficiados de la implementación del proyecto'); ?></th>
			<th><?php echo  utf8_decode('Ámbitos de acción en los que se enmarca la actividad'); ?></th>
			<th><?php echo  utf8_decode('Asocie el área a la que más se asimile su actividad (elija una)'); ?></th>
			<th><?php echo  utf8_decode('Entidades Relacionadas'); ?></th>
			<th><?php echo  utf8_decode('Detalle Entidades'); ?></th>
			<th><?php echo  utf8_decode('Nombre de la entidad con la que se relaciona'); ?></th>
			<th><?php echo  utf8_decode('Cargo'); ?></th>
			<th><?php echo  utf8_decode('Detalle datos de contacto'); ?></th>
			<th><?php echo  utf8_decode('Costo de la actividad'); ?></th>
			<th><?php echo  utf8_decode('Fuentes de financiamiento'); ?></th>
			<th><?php echo  utf8_decode('Fuente de financiamiento Interno'); ?></th>
			<th><?php echo  utf8_decode('Fuente de financiamiento Externo'); ?></th>
			<th><?php echo  utf8_decode('Detalle de presupuesto'); ?></th>
			<th><?php echo  utf8_decode('Principales hitos de la actividad'); ?></th>
			<th><?php echo  utf8_decode('Incidencias de la actividad'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			if(is_array($actividades_evaluadas)){
				foreach ($actividades_evaluadas as $activity) {
					echo '<tr>';
					echo '<td>'.$activity['Activity']['id'].'</td>';
					echo '<td>';
					if(is_array($activity['Activity']['Usuario'])){
						foreach ($activity['Activity']['Usuario'] as $row) {
							echo $row['nombre'].' '.$row['apellidos'];
						}
					}
					echo '</td>';
					echo '<td>'.$activity['Activity']['nombre'].'</td>';
					echo '<td>';
					if($activity['Activity']['actividad_hito']<>1){
						echo 'No';
					}else{
						echo 'Si';
					}
					echo '</td>';
					echo '<td>';
					if($activity['Activity']['origen_del_proyecto']=='0'){
						echo 'Demanda Interna';
					}elseif($activity['Activity']['origen_del_proyecto']=='1'){
						echo 'Demanda Externa';
					}
					echo '</td>';
					echo '<td>'.$activity['Activity']['descripcion_actividad'].'</td>';
					echo '<td>';
					if(is_array($activity['Headquarter']) && count($activity['Headquarter'])>0){
						if(count($activity['School'])>0 || count($activity['Central'])>0){
							echo 'Sede - ';
						}else{
							echo 'Sede';
						}
						
					}
					if(is_array($activity['School']) && count($activity['School'])>0){
						if(count($activity['Headquarter'])>0 || count($activity['Central'])>0){
							echo 'Escuela - ';
						}else{
							echo 'Escuela';
						}
					}
					if(is_array($activity['Central']) && count($activity['Central'])>0){
						if(count($activity['Headquarter'])>0 || count($activity['School'])>0){
							echo 'Áreas Centrales - ';
						}else{
							echo 'Áreas Centrales';
						}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['School'])){
						$i=0;
						foreach($activity['School'] as $sede) {
							$i++;
							if(count($activity['School'])==$i){
								echo $sede['nombre_escuela'];
							}else{
								echo $sede['nombre_escuela']." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['Headquarter'])){
						$i=0;
						foreach($activity['Headquarter'] as $sede) {
							$i++;
							if(count($activity['Headquarter'])==$i){
								echo $sede['nombre_sede'];
							}else{
								echo $sede['nombre_sede']." - ";
							}
		 				}	
					}
					echo '</td>';
					
					echo '<td>';
					if(is_array($activity['Central'])){
						$i=0;
						foreach($activity['Central'] as $sede) {
							$i++;
							if(count($activity['Central'])==$i){
								echo $sede['nombre'];
							}else{
								echo $sede['nombre']." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>'.$activity['Activity']['proyectoglobal'].'</td>';
					echo '<td>'.$this->Time->format($activity['Activity']['fechainicio_proyecto'], '%d-%m-%Y').' al '.$this->Time->format($activity['Activity']['fechafinal_proyecto'], '%d-%m-%Y').'</td>';
					echo '<td>'.$activity['Activity']['responsable'].'</td>';
					echo '<td>'.$activity['Activity']['cargoresponsable'].'</td>';
					echo '<td><a href="mailto:'.$activity['Activity']['mail_responsable'].'" target="_blank">'.$activity['Activity']['mail_responsable'].'</td>';
					echo '<td>'.$activity['Activity']['convenio_si_no'].'</td>';
					echo '<td>';
					if($activity['Activity']['convenioindefinido']=='1'){
						echo $this->Time->format($activity['Activity']['convenioinicio'], '%d-%m-%Y').' - Indefinido';
					}elseif($activity['Activity']['convenio_si_no']!=''){
						echo $this->Time->format($activity['Activity']['convenioinicio'], '%d-%m-%Y').' al '.$this->Time->format($activity['Activity']['conveniofin'], '%d-%m-%Y');
					}
					echo '</td>';
					echo '<td>'.$activity['Activity']['descripcionconvenio'].'</td>';
					echo '<td>'.$activity['Activity']['objetivo_general'].'</td>';
					echo '<td>';
					if(is_array($activity['Objetive'])){
						foreach($activity['Objetive'] as $objetivo) {
							$i++;
							if(count($activity['Objetive'])==$i){
								echo $objetivo['objetivo'];
							}else{
								echo $objetivo['objetivo']." - ";
							}

		 			   	}
					}
	 			   	echo '</td>';
					echo '<td>';
					if(is_array($activity['Beginning'])){
						$i=0;
						foreach($activity['Beginning'] as $principio) {
							$i++;
							if(count($activity['Beginning'])==$i){
								echo $principio['principio'];
							}else{
								echo $principio['principio']." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>'.$activity['Activity']['justificacionprincipios'].'</td>';
					echo '<td>';
					if(is_array($activity['Internal'])){
						$i=0;
						foreach($activity['Internal'] as $internal) {
							$i++;
							if(count($activity['Internal'])==$i){
								echo $internal['publico'];
							}else{
								echo $internal['publico']." - ";
							}
			 			}
			 			
					}
					echo '</td>';
					echo '<td>'.$activity['Activity']['numeroparticipantes'].'</td>';
					echo '<td>';
		 			if(is_array($activity['External'])){
		 				$i=0;
		 				foreach($activity['External'] as $external) {
		 					$i++;
		 					if(count($activity['External'])==$i){
		 						echo $external['publicoexterno'];
		 					}else{
		 						echo $external['publicoexterno']." - ";
		 					}
		 				}
		 			}
					echo '</td>';
					echo '<td>'.$activity['Activity']['numeroexternos'].'</td>';
					echo '<td>'.$activity['Activity']['beneficiados'].'</td>';
					echo '<td>';
					if(is_array($activity['Scope'])){
						$i=0;
						foreach($activity['Scope'] as $ambito) {
							$i++;
							if(count($activity['Scope'])==$i){
								echo $ambito['ambito'];	
							}else{
								echo $ambito['ambito']." - ";
							}
							
						}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['Area'])){
						$i=0;
						foreach($activity['Area'] as $entidad) {
							$i++;
							if(count($activity['Area'])==$i){
								echo $entidad['area'];
							}else{
								echo $entidad['area']." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['Entity'])){
						$i=0;
						foreach($activity['Entity'] as $entidad) {
							$i++;
							if(count($activity['Entity'])==$i){
								echo $entidad['entidades'];
							}else{
								echo $entidad['entidades']." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>'.$activity['Activity']['detalleentidades'].'</td>';

					echo '<td>';
					if(is_array($activity['ActivityInstitution'])){
						$i=0;
						foreach($activity['ActivityInstitution'] as $institution) {
							$i++;
							if(count($activity['ActivityInstitution'])==$i){
								echo $institution['nombre'];
							}else{
								echo $institution['nombre']." - ";
							}
		 					
		 			   	}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['ActivityInstitution'])){
						$i=0;
						foreach($activity['ActivityInstitution'] as $institution) {
							$i++;
							if(count($activity['ActivityInstitution'])==$i){
								echo $institution['cargo'];
							}else{
								echo $institution['cargo']." - ";
							}
		 			   	}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['ActivityInstitution'])){
						$i=0;
						foreach($activity['ActivityInstitution'] as $institution) {
							$i++;
							if(count($activity['ActivityInstitution'])==$i){
								echo $institution['contacto'];
							}else{
								echo $institution['contacto']." - ";
							}
		 			   	}
					}
					echo '</td>';

					echo '<td>'.$activity['Activity']['costoactividad'].'</td>';
					echo '<td>';
					if ($activity['Activity']['financiamiento_i_e_m'] == 0){
						echo 'Interna';
					}elseif ($activity['Activity']['financiamiento_i_e_m'] == 1){
						echo 'Externa';
					}elseif ($activity['Activity']['financiamiento_i_e_m'] == 2){
						echo 'Mixta';
					}

					echo '</td>';
					echo '<td>';
					if ($activity['Activity']['financiamiento_i_e_m'] == 0) {
						echo utf8_decode(' <b>Dirección Central:').' </b>'.$activity['Activity']['direccioncentral'].'% -';
		 				echo ' <b>Sedes: </b>'.$activity['Activity']['sedesporcentaje'].'% -';
		 				echo ' <b>Escuelas: </b>'.$activity['Activity']['escuelasporcentaje'].'% ';
		 			}
		 			
					echo '</td>';
					echo '<td>';
					if ($activity['Activity']['financiamiento_i_e_m'] == 1) {
		 				echo ' <b>Fondos Concursables: </b>'.$activity['Activity']['fondoconcursable'].'% - ';
		 				echo ' <b>Entorno Productivo: </b>'.$activity['Activity']['entornoproductivo'].'% - ';
		 				echo ' <b>Entidades Académicas: </b>'.$activity['Activity']['entidadesacademicas'].'% - ';
		 				echo ' <b>Donaciones: </b>'.$activity['Activity']['donacionesporcentaje'].'% ';
		 			}
					echo '</td>';
					echo '<td>'.$activity['Activity']['detallepresupuesto'].'</td>';
					echo '<td>';
					if(is_array($activity['Milestone'])){
						$i=0;
						foreach($activity['Milestone'] as $institution) {
							$i++;
							if(count($activity['Milestone'])==$i){
								echo $institution['objetivo'];
							}else{
								echo $institution['objetivo']." - ";
							}
		 			   	}
					}
					echo '</td>';
					echo '<td>';
					if($activity['Activity']['in_activosocial']=='1'){
						echo utf8_decode('Fortalece a la institución como un actor social relevante <br>');
					}
					if($activity['Activity']['in_desarrolloacademico']=='1'){
						echo utf8_decode('Aporta al desarrollo académico profesional y formación de los estudiantes <br>');
					}
					if($activity['Activity']['in_empleabilidad']=='1'){
						echo utf8_decode('Aumenta las posibilidades de empleabilidad de los titulados <br>');
					}
					echo '</td>';
					echo '</tr>';
				}
			}else{
				echo '<td colspan="41">No existen datos! </td>';
			}
			
		?>
	</tbody>
</table>
</body></html>
<?php else: ?>
	<html>
<head>
   <meta http-equiv="content-type" content="text/html; ISO-8859-1">
</head>

<body>
	<table border="1">
		<thead>
			<tr>
			<th><?php echo  ('ID actividad'); ?></th>
			<th><?php echo  ('Nombre de usuario'); ?></th>
			<th><?php echo  ('Nombre de Actividad'); ?></th>
			<th><?php echo  ('Actividad Hito'); ?></th>
			<th><?php echo  ('Origen de proyecto'); ?></th>
			<th><?php echo  ('Breve descripción de la Actividad'); ?></th>
			<th><?php echo  ('Pertenece'); ?></th>
			<th><?php echo  ('Escuelas a las que pertenece'); ?></th>
			<th><?php echo  ('Sedes a las que pertenece'); ?></th>
			<th><?php echo  ('Áreas centrales a las que pertenece'); ?></th>
			<th><?php echo  ('Nombre del proyecto en el qué se enmarca'); ?></th>
			<th><?php echo  ('Ingresar Fechas'); ?></th>
			<th><?php echo  ('Nombre del responsable de la actividad'); ?></th>
			<th><?php echo  ('Cargo'); ?></th>
			<th><?php echo  ('Mail'); ?></th>
			<th><?php echo  ('Convenio al que pertenece la actividad'); ?></th>
			<th><?php echo  ('Vigencia del convenio'); ?></th>
			<th><?php echo  ('Breve descripción del convenio'); ?></th>
			<th><?php echo  ('Objetivo General de la actividad'); ?></th>
			<th><?php echo  ('Objetivos específicos'); ?></th>
			<th><?php echo  ('Principios de la política que aborda'); ?></th>
			<th><?php echo  ('Justificación de principios abordados'); ?></th>
			<th><?php echo  ('Público abordado Interno'); ?></th>
			<th><?php echo  ('Número de participantes aprox.'); ?></th>
			<th><?php echo  ('Público abordado Externo'); ?></th>
			<th><?php echo  ('Número de participantes aprox.'); ?></th>
			<th><?php echo  ('Beneficiados de la implementación del proyecto'); ?></th>
			<th><?php echo  ('Ámbitos de acción en los que se enmarca la actividad'); ?></th>
			<th><?php echo  ('Asocie el área a la que más se asimile su actividad (elija una)'); ?></th>
			<th><?php echo  ('Entidades Relacionadas'); ?></th>
			<th><?php echo  ('Detalle Entidades'); ?></th>
			<th><?php echo  ('Nombre de la entidad con la que se relaciona'); ?></th>
			<th><?php echo  ('Cargo'); ?></th>
			<th><?php echo  ('Detalle datos de contacto'); ?></th>
			<th><?php echo  ('Costo de la actividad'); ?></th>
			<th><?php echo  ('Fuentes de financiamiento'); ?></th>
			<th><?php echo  ('Fuente de financiamiento Interno'); ?></th>
			<th><?php echo  ('Fuente de financiamiento Externo'); ?></th>
			<th><?php echo  ('Detalle de presupuesto'); ?></th>
			<th><?php echo  ('Principales hitos de la actividad'); ?></th>
			<th><?php echo  ('Incidencias de la actividad'); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php
			if(is_array($actividades_evaluadas)){
				foreach ($actividades_evaluadas as $activity) {
					echo '<tr>';
					echo '<td>'.$activity['Activity']['id'].'</td>';
					echo '<td>';
					if(is_array($activity['Activity']['Usuario'])){
						foreach ($activity['Activity']['Usuario'] as $row) {
							echo $row['nombre'].' '.$row['apellidos'];
						}
					}
					echo '</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['nombre'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>';
					if($activity['Activity']['actividad_hito']<>1){
						echo 'No';
					}else{
						echo 'Si';
					}
					echo '</td>';
					echo '<td>';
					if($activity['Activity']['origen_del_proyecto']=='0'){
						echo 'Demanda Interna';
					}elseif($activity['Activity']['origen_del_proyecto']=='1'){
						echo 'Demanda Externa';
					}
					echo '</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['descripcion_actividad'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>';
					
					if(is_array($activity['Headquarter']) && count($activity['Headquarter'])>0){
						if(count($activity['School'])>0 || count($activity['Central'])>0){
							echo 'Sede - ';
						}else{
							echo 'Sede';
						}
						
					}
					if(is_array($activity['School']) && count($activity['School'])>0){
						if(count($activity['Headquarter'])>0 || count($activity['Central'])>0){
							echo 'Escuela - ';
						}else{
							echo 'Escuela';
						}
					}
					if(is_array($activity['Central']) && count($activity['Central'])>0){
						if(count($activity['Headquarter'])>0 || count($activity['School'])>0){
							echo 'Áreas Centrales - ';
						}else{
							echo 'Áreas Centrales';
						}
					}

					echo '</td>';
					echo '<td>';
					if(is_array($activity['School'])){
						$i=0;
						foreach($activity['School'] as $sede) {
							$i++;
							if(count($activity['School']) == $i){
								echo mb_convert_encoding($sede['nombre_escuela'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($sede['nombre_escuela'],'UTF-8', 'ISO-8859-1')." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['Headquarter'])){
						$i=0;
						foreach($activity['Headquarter'] as $sede) {
							$i++;
							if(count($activity['Headquarter'])==$i){
								echo mb_convert_encoding($sede['nombre_sede'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($sede['nombre_sede'],'UTF-8', 'ISO-8859-1')." - ";
							}
		 				}
					}
					echo '</td>';
					
					echo '<td>';
					if(is_array($activity['Central'])){
						$i=0;
						foreach($activity['Central'] as $sede) {
							$i++;
							if(count($activity['Central'])==$i){
								echo mb_convert_encoding($sede['nombre'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($sede['nombre'],'UTF-8', 'ISO-8859-1')." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['proyectoglobal'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>'.$this->Time->format($activity['Activity']['fechainicio_proyecto'], '%d-%m-%Y').' al '.$this->Time->format($activity['Activity']['fechafinal_proyecto'], '%d-%m-%Y').'</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['responsable'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['cargoresponsable'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td><a href="mailto:'.$activity['Activity']['mail_responsable'].'" target="_blank">'.$activity['Activity']['mail_responsable'].'</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['convenio_si_no'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>';
					if($activity['Activity']['convenioindefinido']=='1'){
						echo $this->Time->format($activity['Activity']['convenioinicio'], '%d-%m-%Y').' - Indefinido';
					}elseif($activity['Activity']['convenio_si_no']!=''){
						echo $this->Time->format($activity['Activity']['convenioinicio'], '%d-%m-%Y').' al '.$this->Time->format($activity['Activity']['conveniofin'], '%d-%m-%Y');
					}
					echo '</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['descripcionconvenio'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['objetivo_general'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>';
					if(is_array($activity['Objetive'])){
						foreach($activity['Objetive'] as $objetivo) {
		 					echo $objetivo['objetivo']." - ";

		 			   	}
					}
	 			   	echo '</td>';
					echo '<td>';
					if(is_array($activity['Beginning'])){
						$i=0;
						foreach($activity['Beginning'] as $principio) {
							$i++;
							if(count($activity['Beginning'])==$i){
								echo mb_convert_encoding($principio['principio'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($principio['principio'],'UTF-8', 'ISO-8859-1')." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['justificacionprincipios'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>';
					if(is_array($activity['Internal'])){
						$i=0;
						foreach($activity['Internal'] as $internal) {
							$i++;
							if(count($activity['Internal'])==$i){
								echo mb_convert_encoding($internal['publico'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($internal['publico'],'UTF-8', 'ISO-8859-1')." - ";
							}
			 			}
			 			
					}
					echo '</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['numeroparticipantes'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>';
		 			if(is_array($activity['External'])){
		 				$i=0;
		 				foreach($activity['External'] as $external) {
		 					$i++;
		 					if(count($activity['External'])==$i){
		 						echo mb_convert_encoding($external['publicoexterno'],'UTF-8', 'ISO-8859-1');
		 					}else{
		 						echo mb_convert_encoding($external['publicoexterno'],'UTF-8', 'ISO-8859-1')." - ";
		 					}
		 				}
		 			}
					echo '</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['numeroexternos'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['beneficiados'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>';
					if(is_array($activity['Scope'])){
						$i=0;
						foreach($activity['Scope'] as $ambito) {
							$i++;
							if(count($activity['Scope'])==$i){
								echo mb_convert_encoding($ambito['ambito'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($ambito['ambito'],'UTF-8', 'ISO-8859-1')." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['Area'])){
						$i=0;
						foreach($activity['Area'] as $entidad) {
							$i++;
							if(count($activity['Area'])==$i){
								echo mb_convert_encoding($entidad['area'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($entidad['area'],'UTF-8', 'ISO-8859-1')." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['Entity'])){
						$i=0;
						foreach($activity['Entity'] as $entidad) {
							$i++;
							if(count($activity['Entity'])==$i){
								echo mb_convert_encoding($entidad['entidades'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($entidad['entidades'],'UTF-8', 'ISO-8859-1')." - ";
							}
						}
					}
					echo '</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['detalleentidades'],'UTF-8', 'ISO-8859-1').'</td>';

					echo '<td>';
					if(is_array($activity['ActivityInstitution'])){
						$i=0;
						foreach($activity['ActivityInstitution'] as $institution) {
							$i++;
							if(count($activity['ActivityInstitution'])==$i){
								echo mb_convert_encoding($institution['nombre'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($institution['nombre'],'UTF-8', 'ISO-8859-1')." - ";
							}
		 			   	}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['ActivityInstitution'])){
						$i=0;
						foreach($activity['ActivityInstitution'] as $institution) {
							$i++;
							if(count($activity['ActivityInstitution'])==$i){
								echo mb_convert_encoding($institution['cargo'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($institution['cargo'],'UTF-8', 'ISO-8859-1')." - ";
							}
		 			   	}
					}
					echo '</td>';
					echo '<td>';
					if(is_array($activity['ActivityInstitution'])){
						$i=0;
						foreach($activity['ActivityInstitution'] as $institution) {
							$i++;
							if(count($activity['ActivityInstitution'])==$i){
								echo mb_convert_encoding($institution['contacto'],'UTF-8', 'ISO-8859-1');
							}else{
								echo mb_convert_encoding($institution['contacto'],'UTF-8', 'ISO-8859-1')." - ";
							}
		 			   	}
					}
					echo '</td>';

					echo '<td>'.mb_convert_encoding($activity['Activity']['costoactividad'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>';
					if ($activity['Activity']['financiamiento_i_e_m'] == 0){
						echo 'Interna';
					}elseif ($activity['Activity']['financiamiento_i_e_m'] == 1){
						echo 'Externa';
					}elseif ($activity['Activity']['financiamiento_i_e_m'] == 2){
						echo 'Mixta';
					}

					echo '</td>';
					echo '<td>';
					if ($activity['Activity']['financiamiento_i_e_m'] == 0) {
						echo ' <b>Dirección Central: </b>'.mb_convert_encoding($activity['Activity']['direccioncentral'],'UTF-8', 'ISO-8859-1').'%  - ';
		 				echo ' <b>Sedes: </b>'.mb_convert_encoding($activity['Activity']['sedesporcentaje'],'UTF-8', 'ISO-8859-1').'%  - ';
		 				echo ' <b>Escuelas: </b>'.mb_convert_encoding($activity['Activity']['escuelasporcentaje'],'UTF-8', 'ISO-8859-1').'% ';
		 			}
		 			
					echo '</td>';
					echo '<td>';
					if ($activity['Activity']['financiamiento_i_e_m'] == 1) {
		 				echo ' <b>Fondos Concursables: </b>'.mb_convert_encoding($activity['Activity']['fondoconcursable'],'UTF-8', 'ISO-8859-1').'% ;';
		 				echo ' <b>Entorno Productivo: </b>'.mb_convert_encoding($activity['Activity']['entornoproductivo'],'UTF-8', 'ISO-8859-1').'% ;';
		 				echo ' <b>Entidades Académicas: </b>'.mb_convert_encoding($activity['Activity']['entidadesacademicas'],'UTF-8', 'ISO-8859-1').'% -';
		 				echo ' <b>Donaciones: </b>'.mb_convert_encoding($activity['Activity']['donacionesporcentaje'],'UTF-8', 'ISO-8859-1').'% ';
		 			}
					echo '</td>';
					echo '<td>'.mb_convert_encoding($activity['Activity']['detallepresupuesto'],'UTF-8', 'ISO-8859-1').'</td>';
					echo '<td>';
					if(is_array($activity['Milestone'])){
						foreach($activity['Milestone'] as $institution) {
							echo mb_convert_encoding($institution['objetivo']." - ",'UTF-8', 'ISO-8859-1')." - ";
		 			   	}
					}
					echo '</td>';
					echo '<td>';
					if($activity['Activity']['in_activosocial']=='1'){
						echo 'Fortalece a la institución como un actor social relevante <br>';
					}
					if($activity['Activity']['in_desarrolloacademico']=='1'){
						echo 'Aporta al desarrollo académico profesional y formación de los estudiantes <br> ';
					}
					if($activity['Activity']['in_empleabilidad']=='1'){
						echo 'Aumenta las posibilidades de empleabilidad de los titulados <br> ';
					}
					echo '</td>';
					echo '</tr>';
				}
			}else{
				echo '<td colspan="41">No existen datos! </td>';
			}
			
		?>
	</tbody>
</table>
</body></html>
<?php endif;?>
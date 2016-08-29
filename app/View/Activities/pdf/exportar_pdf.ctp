<?php
	//header("Content-type: application/pdf"); 
	header('Content-Disposition: attachment; filename="ficha_'.date("d-m-Y").'.pdf"');
    

    //$pdf->AliasNbPages();

    	if(is_array($actividades_evaluadas)){
			foreach ($actividades_evaluadas as $activity) {
				$pertenece = '';
				if(is_array($activity['School'])){
					foreach($activity['School'] as $sede) {
						$pertenece .= $sede['nombre_escuela']." / ";
					}
				}
				if(is_array($activity['Headquarter'])){
					foreach($activity['Headquarter'] as $sede) {
						$pertenece .= $sede['nombre_sede']." / ";
	 				}
				}
				if(is_array($activity['Central'])){
					foreach($activity['Central'] as $sede) {
						$pertenece .= $sede['nombre']." / ";
					}
				}

				
				//header
				$fpdf->AddPage();
				// Logo
			    $fpdf->Image($abs_base.'images/logo_pdf.png',10,8,33);
			    // Arial bold 15
			    $fpdf->SetFont('Arial','B',15);
			    // Movernos a la derecha
			    $fpdf->Cell(80);
			    // Título
			    $fpdf->Cell(30,10,$activity['Activity']['nombre'],0,0,'C');
			    // Salto de línea
			    $fpdf->Ln(20);

			    //contenido 

				$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Breve descripción:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$activity['Activity']['descripcion_actividad'], 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Pertenece:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$pertenece, 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Proyecto en el qué se enmarca:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$activity['Activity']['proyectoglobal'], 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Fechas de la Actividad:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$this->Time->format($activity['Activity']['fechainicio_proyecto'], '%d-%m-%Y').' al '.$this->Time->format($activity['Activity']['fechafinal_proyecto'], '%d-%m-%Y'), 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Nombre del responsable:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$activity['Activity']['responsable'], 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Cargo:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$activity['Activity']['cargoresponsable'], 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Email:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$activity['Activity']['mail_responsable'], 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Pertenece algún convenio:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$activity['Activity']['convenio_si_no'], 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Entidades relacionadas son:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,'', 0, 'L');
		    	$fpdf->Ln(0);
		    	if(is_array($activity['Entity'])){
					foreach($activity['Entity'] as $entidad) {
						$entidades = $entidad['entidades'];
						$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(40,5,'');
				    	$fpdf->SetFont('Arial','',10);
				    	$fpdf->Cell(30);
				    	$fpdf->MultiCell(0,5,$entidades, 0, 'L');
				    	$fpdf->Ln(0);
					}
				}
				$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Objetivo General y Específicos:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,'', 0, 'L');
		    	$fpdf->Ln(0);
		    	if(is_array($activity['Objetive'])){
					foreach($activity['Objetive'] as $objetivo) {
						$objetivo = $objetivo['objetivo'];
						$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(40,5,'');
				    	$fpdf->SetFont('Arial','',10);
				    	$fpdf->Cell(30);
				    	$fpdf->MultiCell(0,5,$objetivo, 0, 'L');
				    	$fpdf->Ln(0);
					}
				}
				$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Públicos abordados son:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,'', 0, 'L');
		    	$fpdf->Ln(0);
		    	if(is_array($activity['Internal'])){
					foreach($activity['Internal'] as $internal) {
						$internal = $internal['publico'];
						$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(40,5,'');
				    	$fpdf->SetFont('Arial','',10);
				    	$fpdf->Cell(30);
				    	$fpdf->MultiCell(0,5,$internal, 0, 'L');
				    	$fpdf->Ln(0);
					}
				}
						$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(40,5,'');
				    	$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(30);
				    	$fpdf->MultiCell(0,5,$activity['Activity']['numeroparticipantes'], 0, 'L');
				    	$fpdf->Ln(0);
		    	if(is_array($activity['External'])){
					foreach($activity['External'] as $external) {
						$external = $external['publicoexterno'];
						$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(40,5,'');
				    	$fpdf->SetFont('Arial','',10);
				    	$fpdf->Cell(30);
				    	$fpdf->MultiCell(0,5,$external, 0, 'L');
				    	$fpdf->Ln(0);
					}
				}
						$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(40,5,'');
				    	$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(30);
				    	$fpdf->MultiCell(0,5,$activity['Activity']['numeroexternos'], 0, 'L');
				    	$fpdf->Ln(0);
				$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Beneficiarios del proyecto:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$activity['Activity']['beneficiados'], 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Principios comprendidos:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,'', 0, 'L');
		    	$fpdf->Ln(0);
		    	if(is_array($activity['Beginning'])){
					foreach($activity['Beginning'] as $principio) {
						$principio = $principio['principio'];
						$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(40,5,'');
				    	$fpdf->SetFont('Arial','',10);
				    	$fpdf->Cell(30);
				    	$fpdf->MultiCell(0,5,$principio, 0, 'L');
				    	$fpdf->Ln(0);
					}
				}
						$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(40,5,'');
				    	$fpdf->SetFont('Arial','B',10);
				    	$fpdf->Cell(30);
				    	$fpdf->MultiCell(0,5,$activity['Activity']['justificacionprincipios'], 0, 'L');
				    	$fpdf->Ln(0);
				$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Monto estimado:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	$fpdf->MultiCell(0,5,$activity['Activity']['costoactividad'], 0, 'L');
		    	$fpdf->Ln(0);
		    	$fpdf->SetFont('Arial','B',10);
		    	$fpdf->Cell(40,5,'Su fuente de recursos será:');
		    	$fpdf->SetFont('Arial','',10);
		    	$fpdf->Cell(30);
		    	if ($activity['Activity']['financiamiento_i_e_m'] == 0){
					$fuente_fin = 'Interna';
				}elseif ($activity['Activity']['financiamiento_i_e_m'] == 1){
					$fuente_fin = 'Externa';
				}elseif ($activity['Activity']['financiamiento_i_e_m'] == 2){
					$fuente_fin = 'Mixta';
				}
				$fpdf->MultiCell(0,5,$fuente_fin, 0, 'L');
		    	$fpdf->Ln(0);
		    	if ($activity['Activity']['financiamiento_i_e_m'] == 0) {
					$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Dirección Central:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['direccioncentral'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Sedes:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['sedesporcentaje'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Escuelas:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['escuelasporcentaje'].' %', 0, 'L');
			    	$fpdf->Ln(0);
	 			}
	 			if ($activity['Activity']['financiamiento_i_e_m'] == 2) {
	 				$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Dirección Central:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['direccioncentral'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Sedes:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['sedesporcentaje'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Escuelas:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['escuelasporcentaje'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Fondos Concursables:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['fondoconcursable'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Entorno Productivo:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['entornoproductivo'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Entidades Académicas:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['entidadesacademicas'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Donaciones:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['donacionesporcentaje'].' %', 0, 'L');
			    	$fpdf->Ln(0);
	 			}
				if ($activity['Activity']['financiamiento_i_e_m'] == 1) {
	 				$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Fondos Concursables:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['fondoconcursable'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Entorno Productivo:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['entornoproductivo'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Entidades Académicas:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['entidadesacademicas'].' %', 0, 'L');
			    	$fpdf->Ln(0);
			    	$fpdf->SetFont('Arial','B',10);
			    	$fpdf->Cell(40,5,'Donaciones:');
			    	$fpdf->SetFont('Arial','',10);
			    	$fpdf->Cell(30);
			    	$fpdf->MultiCell(0,5,$activity['Activity']['donacionesporcentaje'].' %', 0, 'L');
			    	$fpdf->Ln(0);
	 			}
	 			foreach($activity['Image'] as $image) {
					if ($image['tipo'] == 1) {
						$fpdf->Image($abs_base.'uploads/'.$image['nombrefisico']);
					}
				}


		    	//footer
		    	// Posición: a 1,5 cm del final
			    $fpdf->SetY(-15);
			    // Arial itálica 8
			    $fpdf->SetFont('Arial','I',8);
			    // Color del texto en gris
			    //$fpdf->SetTextColor(128);
			    // Número de página
			    $fpdf->Cell(0,10,'Pag. '.$fpdf->PageNo(),0,0,'C');
			}
		}
		

    $fpdf->Output();

    echo $content_for_layout;
?>
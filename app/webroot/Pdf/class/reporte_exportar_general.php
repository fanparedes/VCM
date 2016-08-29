<?php
session_start();

//$datos = $_SESSION['buscar_actividad'];
var_dump($_SESSION);
/*require('fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

$pdf->Cell(40,10,'¡Hola, Mundo!');
		if(is_array($datos)){
			foreach ($datos as $activity) {
				$pdf->AddPage();
				$pdf->SetFont('Arial','B',16);
				$pdf->Cell(40,10,'¡Hola, Mundo!');
			}
		}

$pdf->Output();*/
?>
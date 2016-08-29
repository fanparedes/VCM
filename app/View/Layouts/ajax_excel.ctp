<?php
    header('Content-Type: application/force-download');
    header("Content-Type: application/ms-excel; charset=UTF-8");
    header('Content-Disposition: attachment; filename=Reporte_Actividades_'.date("dmYHis").'.xls');
    header('Content-Transfer-Encoding: binary');
?>
<?php 
	echo  $this->fetch('content'); 
	exit;
?>

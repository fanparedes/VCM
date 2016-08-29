<?php
//require_once ('database.php');
//session_start();
	class ReporteGeneral{
		public static function loadReporte($var){
			
			$_SESSION['buscar_actividad'] = $var;
				//var_dump($_SESSION['buscar_actividad']);		
		}
	}
//ReporteGeneral::loadReporte();
?>
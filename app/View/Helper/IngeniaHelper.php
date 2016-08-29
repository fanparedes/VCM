<?php 

class IngeniaHelper extends AppHelper {    
  
	//ESTA FUNCIÓN FORMATEA LA FECHA QUE SACA DE ORIGEN DE LA BASE DE DATOS Y LA FORMATEA AL ESTILO ESPAÑOL
	public function formatearFecha($fecha) {
		if (($fecha) == null) {
			return false;		
		}
		$ano = substr($fecha,0,4);		
		$mes = substr($fecha,5,2);
		$dia = substr($fecha,8,2);
		$hora = substr($fecha,11,8);
		$formateo = $dia;
		$formateo .= '-'.$mes;
		$formateo .= '-'.$ano;
		$formateo .= ' '.$hora;
		return $formateo;
	}
}


?>
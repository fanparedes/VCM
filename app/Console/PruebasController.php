<?php
	App::uses('AppController', 'Controller');
	
	class PruebasController extends AppController {
	
		var $name = 'Pruebas';
		var $uses = array('Prueba');
		var $helpers = array('Form');
                
		
                
		function beforeFilter(){
			  
		}
	
	
		function index(){
				echo 'hola';
				$pruebas = $this->Prueba->find('all');
				$this->set('pruebas', $pruebas);	
				if(!empty($this->data)){
					echo var_dump($this->data);
					
					
				}
			
		}
	
	
	}
		
		
?>
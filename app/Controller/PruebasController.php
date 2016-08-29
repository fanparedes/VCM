<?php
	App::uses('AppController', 'Controller');
	
	class PruebasController extends AppController {
	
		var $name = 'Pruebas';
		var $uses = array('Prueba');
		var $helpers = array('Form', 'Session');
		 public $components = array('Flash');
                
		
                
		function beforeFilter(){
			  
		}
	
	
		function index(){				
				$pruebas = $this->Prueba->find('all');				
				$this->set('pruebas', $pruebas);	
				if(!empty($this->data)){										
					$this->Prueba->id = 1;
					if ($this->Prueba->save($this->request->data)){						
						 $this->Flash->set('Prueba Creada!');			
						return $this->redirect(array('controller' => 'Pruebas', 'action' => 'index'));
					}
				}
		}
	}
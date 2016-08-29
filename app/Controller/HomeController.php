<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Activity', 'Objetive', 'Milestone', 'ActivityHeadquarter', 'ActivitySchool', 'ActivityCentral', 'ActivityBeginning', 'ActivityExternal', 'ActivityInternal', 'ActivityScope', 'ActivityArea', 'ActivityEntity', 'Central', 'Headquarter', 'School', 'Beginning', 'Internal', 'External', 'Scope', 'Entity', 'Area', 'Image', 'ActivityInstitution');
	public $layout = "vcm";
	public $components = array('Session');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */


	public function paginate_sin_ev() {
		$this->layout= "ajax";
		$page = $this->request->data['pagina'];
		$id_usuario = $this->Session->read('Auth.User.id');

		$actividades_sin_evaluar = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 1,
						'Activity.user_id' => $id_usuario
					),
				'limit' => 4,
				'order' => 'Activity.id desc',
				'page' => $page
			));

		foreach($actividades_sin_evaluar as $key_act_1 => $act_1) {
			$imagen = $this->Image->find('first', array(
					'conditions' => array(
							'Image.tipo' => '0',
							'Image.activity_id' => $act_1['Activity']['id']
						)
				)
			);
			$actividades_sin_evaluar[$key_act_1]['Activity']['Image'] = $imagen;
		}
		$this->set('actividades_sin_evaluar', $actividades_sin_evaluar);

	}


	public function paginate_sin_enviar() {
		$this->layout= "ajax";
		$page = $this->request->data['pagina'];
		$id_usuario = $this->Session->read('Auth.User.id');		
		$actividades_sin_enviar = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 0,
						'Activity.user_id' => $id_usuario
					),
				'limit' => 4,
				'order' => 'Activity.id desc',
				'page' => $page
			));
		$this->set('actividades_sin_enviar', $actividades_sin_enviar);		
	}

	public function round_up($value, $places)
		{
		    $mult = pow(10, abs($places));
		     return $places < 0 ?
		    ceil($value / $mult) * $mult :
		        ceil($value * $mult) / $mult;
		}

	public function usuario() {
		$id_usuario = $this->Session->read('Auth.User.id');
		$actividades_sin_evaluar = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 1,
						'Activity.user_id' => $id_usuario
					),
				'order' => 'Activity.id desc'
			));

		$cant_act1 = count($actividades_sin_evaluar);
		$cant_pag_tmp1 = $cant_act1 / 4;

		$cant_pag_sin_ev = $this->round_up($cant_pag_tmp1, 0);
		if($cant_pag_sin_ev == 0) {
			$cant_pag_sin_ev = 1;
		}

		$this->set('cant_pag_sin_ev', $cant_pag_sin_ev);

		$actividades_sin_evaluar = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 1,
						'Activity.user_id' => $id_usuario
					),
				'limit' => 4,
				'order' => 'Activity.id desc'
			));

		foreach($actividades_sin_evaluar as $key_act_1 => $act_1) {
			$imagen = $this->Image->find('first', array(
					'conditions' => array(
							'Image.tipo' => '0',
							'Image.activity_id' => $act_1['Activity']['id']
						)
				)
			);
			$actividades_sin_evaluar[$key_act_1]['Activity']['Image'] = $imagen;
		}
		$this->set('actividades_sin_evaluar', $actividades_sin_evaluar);



		$actividades_sin_enviar = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 0,
						'Activity.user_id' => $id_usuario
					),
				'order' => 'Activity.id desc'
			));

		$cant_act2 = count($actividades_sin_enviar);
		$cant_pag_tmp2 = $cant_act2 / 4;

		$cant_pag_sin_enviar = $this->round_up($cant_pag_tmp2, 0);


		if($cant_pag_sin_enviar == 0) {
			$cant_pag_sin_enviar = 1;
		}

		$this->set('cant_pag_sin_enviar', $cant_pag_sin_enviar);

		$actividades_sin_enviar = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 0,
						'Activity.user_id' => $id_usuario
					),
				'limit' => 4,
				'order' => 'Activity.id desc'
			));
		$this->set('actividades_sin_enviar', $actividades_sin_enviar);


		$actividades_evaluadas = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 2,
						'Activity.user_id' => $id_usuario
					),
				'order' => 'Activity.id desc'
			));
		$cant_act = count($actividades_evaluadas);
		$actividades_evaluadas = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 2,
						'Activity.user_id' => $id_usuario
					),
				'limit' => 4,
				'order' => 'Activity.id desc'
			));
		foreach($actividades_evaluadas as $key_act_1 => $act_1) {
			$imagen = $this->Image->find('first', array(
					'conditions' => array(
							'Image.tipo' => '0',
							'Image.activity_id' => $act_1['Activity']['id']
						)
				)
			);
			$actividades_evaluadas[$key_act_1]['Activity']['Image'] = $imagen;
		}
		$this->set('actividades_evaluadas', $actividades_evaluadas);

		$cant_pag_tmp = $cant_act / 4;

		$cant_pag = $this->round_up($cant_pag_tmp, 0);
		$this->set('cant_pag', $cant_pag);


		// filtro

		//principios

		$beginnings = $this->Beginning->find('list', array(
				'recursive' => -1
			));
		$this->set('beginnings', $beginnings);

		// ambitos

		$scopes = $this->Scope->find('list', array(
				'recursive' => -1
			));
		$this->set('scopes', $scopes);


		// entidades

		$entities = $this->Entity->find('list', array(
				'recursive' => -1
			));
		$this->set('entities', $entities);


	}

	public function buscar() {

		$id_usuario = $this->Session->read('Auth.User.id');
		$this->layout= "ajax";
		$page = $this->request->data['pagina'];





		$this->Activity->unbindModel(
        	array('hasMany' => array('Objetive', 'Milestone', 'Image'),
        			'hasAndBelongsToMany' => array( 'Central', 'External','Headquarter','Internal', 'School', 'Area')
        	)
    	);

		$this->Activity->Behaviors->load('Containable');

		if ($this->request->data['orden'] == 0) {
			$orden = "Activity.id desc";
		} else {
			$orden = "Activity.id asc";
		}

		$actividades_evaluadas = $this->Activity->find('all',array('contain' => array(
				'Review' => array(),
				'ActivityInstitution' => array(),
				'Beginning' => array(
					'conditions' => array('Beginning.id' => $this->request->data['principio']
						),
					'fields' => array('Beginning.id')
				),
				'Entity' => array(
					'conditions' => array(
							'Entity.id' => $this->request->data['entidad']
						),
					'fields' => array('Entity.id')

				),
				'Scope' => array(
					'conditions' => array(
							'Scope.id' => $this->request->data['ambito']
						),
					'fields' => array('Scope.id')

				)
				)
				,
				'conditions' => array(
						'Activity.estado' => 2,
						'Activity.user_id' => $id_usuario
					),
				'order' => $orden
			));

		foreach($actividades_evaluadas as $key_act_1 => $act_1) {
			$imagen = $this->Image->find('first', array(
					'conditions' => array(
							'Image.tipo' => '0',
							'Image.activity_id' => $act_1['Activity']['id']
						)
				)
			);
			$actividades_evaluadas[$key_act_1]['Activity']['Image'] = $imagen;
		}

		$act_tmp = array();

		foreach($actividades_evaluadas as $act) {
			if ((!$act['Beginning']) and (!$act['Scope']) and (!$act['Entity'])) {
				
			} else {
				$act_tmp[] = $act; 
			}
		}
		$cant_act = count($act_tmp);
		$act_tmp_tmp = array();
		$cont_act = 0;
		$comienzo = (($page -1 ) *4);
		$termino = ($page* 4);
		foreach($act_tmp as $act1) {
			if ( ($comienzo < $cont_act) and ($cont_act <= $termino)) {
				$act_tmp_tmp[] = $act1;
			}
			$cont_act++;

		}		
		$actividades_evaluadas = $act_tmp_tmp;

		$this->set('actividades_evaluadas', $actividades_evaluadas);

		$cant_pag_tmp = $cant_act / 4;

		$cant_pag = $this->round_up($cant_pag_tmp, 0);
		if($cant_pag == 0) {
			$cant_pag = 1;
		}

		$this->set('cant_pag', $cant_pag);
		$this->set('pag_actual', $page);



	}

	public function paginate_normal() {
		$page = $this->request->data['pagina'];
		$id_usuario = $this->Session->read('Auth.User.id');
		$this->layout= "ajax";
				$actividades_evaluadas = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 2,
						'Activity.user_id' => $id_usuario
					),
				'order' => 'Activity.id desc'
			));
		$cant_act = count($actividades_evaluadas);
		$actividades_evaluadas = $this->Activity->find('all', array(
				'conditions' => array(
						'Activity.estado' => 2,
						'Activity.user_id' => $id_usuario
					),
				'limit' => 4,
				'order' => 'Activity.id desc',
				'page' => $page
			));

		foreach($actividades_evaluadas as $key_act_1 => $act_1) {
			$imagen = $this->Image->find('first', array(
					'conditions' => array(
							'Image.tipo' => '0',
							'Image.activity_id' => $act_1['Activity']['id']
						)
				)
			);
			$actividades_evaluadas[$key_act_1]['Activity']['Image'] = $imagen;
		}
		$this->set('actividades_evaluadas', $actividades_evaluadas);

		$cant_pag_tmp = $cant_act / 4;

		$cant_pag = $this->round_up($cant_pag_tmp, 0);
		$this->set('cant_pag', $cant_pag);

	}
	

	public function administrativo() {

		if ($this->request->is('post')) { //SI ESTÁ FILTRANDO...
			
			if ((count($this->request->data) == 0)){ //Busqueda del home
				return $this->redirect(array('controller' => 'home', 'action' => 'administrativo'));				
			}
			$this->Session->write('busqueda_home', $this->request->data);
	  		$id_usuario = $this->Session->read('Auth.User.id');				
				$actividades_evaluadas = $this->Activity->find('all', array(
					'conditions' => array(
								//'Activity.estado' => 2
							)
						)
				);
			$actividades_evaluadas = $this->filtroActividades($actividades_evaluadas, $this->request->data);
						
			$this->set('actividades_evaluadas', $actividades_evaluadas);
			$total_act = count($actividades_evaluadas);
			if ($total_act > 0){
				$cant_positivos = 0;
				$cant_negativos = 0;
				$cant_terminadas = 0;
				$cant_proceso = 0;		

				foreach($actividades_evaluadas as $act) {
					if($act['Activity']['estado'] == 2) {
						$cant_terminadas++;
					}
					if($act['Activity']['estado'] == 1) {
						$cant_proceso++;
					}
				}		

				$por_ter = round(((100 * $cant_terminadas) / $total_act), 1, PHP_ROUND_HALF_UP);
				$por_pro = round(((100 * $cant_proceso) / $total_act), 1, PHP_ROUND_HALF_UP);
				$this->set('por_ter', $por_ter);
				$this->set('por_pro', $por_pro);	
				
				foreach($actividades_evaluadas as $act) {
					if($act['Activity']['evaluacion'] > 2) {
						$cant_positivos++;
					} else {
						$cant_negativos++;
					}

				}
				$this->set('total_act', $total_act);
				$this->set('cant_positivos', $cant_positivos);
				$this->set('cant_negativos', $cant_negativos);		

				$por_pos = round(((100 * $cant_positivos) / $total_act), 1, PHP_ROUND_HALF_UP);
				$por_neg = round(((100 * $cant_negativos) / $total_act), 1, PHP_ROUND_HALF_UP);
				$this->set('por_pos', $por_pos);
				$this->set('por_neg', $por_neg);				
					
			}
			else {
				echo '<script>alert("No se han encontrado actividades con los criterios de busqueda")</script>';				
			}

			//principios

			$beginnings = $this->Beginning->find('list', array(
					'recursive' => -1
				));
			$this->set('beginnings', $beginnings);

			// ambitos

			$scopes = $this->Scope->find('list', array(
					'recursive' => -1
				));
			$this->set('scopes', $scopes);


			// entidades

			$entities = $this->Entity->find('list', array(
					'recursive' => -1
				));
			$this->set('entities', $entities);	
				return;
		}else{
			$this->Session->write('busqueda_home', '');
		}
		
		//SI NO ES UN FILTRO

			$actividades_evaluadas = $this->Activity->find('all', array(
					'conditions' => array(
								//'Activity.estado' => 2
							)
						)
				);
				//var_dump($actividades_evaluadas);
			$total_act = count($actividades_evaluadas); 
			$cant_positivos = 0;
			$cant_negativos = 0;
			$cant_terminadas = 0;
			$cant_proceso = 0;
			
			foreach($actividades_evaluadas as $act) {
				if($act['Activity']['estado'] == 2) {
					$cant_terminadas++;
				}
				if($act['Activity']['estado'] == 1) {
					$cant_proceso++;
				}
			}
			
			$por_ter = round(((100 * $cant_terminadas) / $total_act), 1, PHP_ROUND_HALF_UP);
			$por_pro = round(((100 * $cant_proceso) / $total_act), 1, PHP_ROUND_HALF_UP);
			$this->set('por_ter', $por_ter);
			$this->set('por_pro', $por_pro);	
			
			
			
			foreach($actividades_evaluadas as $act) {
				if($act['Activity']['evaluacion'] > 2) {
					$cant_positivos++;
				} else {
					$cant_negativos++;
				}

			}
			$this->set('total_act', $total_act);
			$this->set('cant_positivos', $cant_positivos);
			$this->set('cant_negativos', $cant_negativos);

			$por_pos = round(((100 * $cant_positivos) / $total_act), 1, PHP_ROUND_HALF_UP);
			$por_neg = round(((100 * $cant_negativos) / $total_act), 1, PHP_ROUND_HALF_UP);
			$this->set('por_pos', $por_pos);
			$this->set('por_neg', $por_neg);				
		// filtro

		//principios

		$beginnings = $this->Beginning->find('list', array(
				'recursive' => -1
			));
		$this->set('beginnings', $beginnings);

		// ambitos

		$scopes = $this->Scope->find('list', array(
				'recursive' => -1
			));
		$this->set('scopes', $scopes);

		// entidades

		$entities = $this->Entity->find('list', array(
				'recursive' => -1
			));
		$this->set('entities', $entities);	


	}

	public function exportar_estadistica() {
		$this->layout = 'ajax_excel';
		$this->request->data = $this->Session->read('busqueda_home');

		if (count($this->request->data)>0) { //SI ESTÁ FILTRANDO...
			
			if ((count($this->request->data) == 0)){ //Busqueda del home
				return $this->redirect(array('controller' => 'home', 'action' => 'administrativo'));				
			}

	  		$id_usuario = $this->Session->read('Auth.User.id');				
				$actividades_evaluadas = $this->Activity->find('all', array(
					'conditions' => array(
								//'Activity.estado' => 2
							)
						)
				);
			
			$actividades_evaluadas = $this->filtroActividades($actividades_evaluadas, $this->request->data);
						
			$this->set('actividades_evaluadas', $actividades_evaluadas);
			$total_act = count($actividades_evaluadas);
			if ($total_act > 0){
				$cant_positivos = 0;
				$cant_negativos = 0;
				$cant_terminadas = 0;
				$cant_proceso = 0;		

				foreach($actividades_evaluadas as $act) {
					if($act['Activity']['estado'] == 2) {
						$cant_terminadas++;
					}
					if($act['Activity']['estado'] == 1) {
						$cant_proceso++;
					}
				}		

				$por_ter = round(((100 * $cant_terminadas) / $total_act), 1, PHP_ROUND_HALF_UP);
				$por_pro = round(((100 * $cant_proceso) / $total_act), 1, PHP_ROUND_HALF_UP);
				$this->set('por_ter', $por_ter);
				$this->set('por_pro', $por_pro);	
				
				foreach($actividades_evaluadas as $act) {
					if($act['Activity']['evaluacion'] > 2) {
						$cant_positivos++;
					} else {
						$cant_negativos++;
					}

				}
				$this->set('total_act', $total_act);
				$this->set('cant_positivos', $cant_positivos);
				$this->set('cant_negativos', $cant_negativos);		

				$por_pos = round(((100 * $cant_positivos) / $total_act), 1, PHP_ROUND_HALF_UP);
				$por_neg = round(((100 * $cant_negativos) / $total_act), 1, PHP_ROUND_HALF_UP);
				$this->set('por_pos', $por_pos);
				$this->set('por_neg', $por_neg);				
					
			}
			else {
				echo '<script>alert("No se han encontrado actividades con los criterios de busqueda")</script>';				
			}

			//principios

			$beginnings = $this->Beginning->find('list', array(
					'recursive' => -1
				));
			$this->set('beginnings', $beginnings);

			// ambitos

			$scopes = $this->Scope->find('list', array(
					'recursive' => -1
				));
			$this->set('scopes', $scopes);


			// entidades

			$entities = $this->Entity->find('list', array(
					'recursive' => -1
				));
			$this->set('entities', $entities);	
				return;
		}

		//SI NO ES UN FILTRO

			$actividades_evaluadas = $this->Activity->find('all', array(
					'conditions' => array(
								//'Activity.estado' => 2
							)
						)
				);
				//var_dump($actividades_evaluadas);
			$total_act = count($actividades_evaluadas); 
			$cant_positivos = 0;
			$cant_negativos = 0;
			$cant_terminadas = 0;
			$cant_proceso = 0;
			
			foreach($actividades_evaluadas as $act) {
				if($act['Activity']['estado'] == 2) {
					$cant_terminadas++;
				}
				if($act['Activity']['estado'] == 1) {
					$cant_proceso++;
				}
			}
			
			$por_ter = round(((100 * $cant_terminadas) / $total_act), 1, PHP_ROUND_HALF_UP);
			$por_pro = round(((100 * $cant_proceso) / $total_act), 1, PHP_ROUND_HALF_UP);
			$this->set('por_ter', $por_ter);
			$this->set('por_pro', $por_pro);	
			
			
			
			foreach($actividades_evaluadas as $act) {
				if($act['Activity']['evaluacion'] > 2) {
					$cant_positivos++;
				} else {
					$cant_negativos++;
				}

			}
			$this->set('total_act', $total_act);
			$this->set('cant_positivos', $cant_positivos);
			$this->set('cant_negativos', $cant_negativos);

			$por_pos = round(((100 * $cant_positivos) / $total_act), 1, PHP_ROUND_HALF_UP);
			$por_neg = round(((100 * $cant_negativos) / $total_act), 1, PHP_ROUND_HALF_UP);
			$this->set('por_pos', $por_pos);
			$this->set('por_neg', $por_neg);				
		// filtro

		//principios

		$beginnings = $this->Beginning->find('list', array(
				'recursive' => -1
			));
		$this->set('beginnings', $beginnings);

		// ambitos

		$scopes = $this->Scope->find('list', array(
				'recursive' => -1
			));
		$this->set('scopes', $scopes);

		// entidades

		$entities = $this->Entity->find('list', array(
				'recursive' => -1
			));
		$this->set('entities', $entities);	


	}

	public function admin() {

	}
	
	
	//ESTA FUNCIÓN FILTRARÁ LAS ACTIVIDADES 
	private function filtroActividades($actividades, $filtro){
			//PRINCIPIOS
			$filtroPrincipios = $this->hayFiltros($filtro, 'Beginning');
			if (count($filtroPrincipios)>0){
				$actividades = $this->filtroPrincipios($actividades, $filtroPrincipios, 'Beginning');
			} 
 			$filtroAmbitos = $this->hayFiltros($filtro, 'Scope');
			if (count($filtroAmbitos)>0){
				$actividades = $this->filtroPrincipios($actividades, $filtroAmbitos, 'Scope');
			}
   			$filtroEntidades = $this->hayFiltros($filtro, 'Entity');
			if (count($filtroEntidades)>0){
				$actividades = $this->filtroPrincipios($actividades, $filtroEntidades, 'Entity');
			}  
  			$filtroRecursos = $this->hayFiltros($filtro, 'Recursos');			
			if (count($filtroRecursos)>0){
				$actividades = $this->filtroFinanciamiento($actividades, $filtroRecursos);
			} 
			$filtroEstrellas = $this->hayFiltros($filtro, 'Estrellas');			
			if (count($filtroEstrellas)>0){
				$actividades = $this->filtroEstrellas($actividades, $filtroEstrellas);
			}  		
			return ($actividades);
	}
	
	
	//Esta función devolverá un array con los principios que se han mandado filtrar en un array (p.ej 1,2,3)
	private function hayFiltros($filtro, $tipoFiltro){
		$arrayFiltros = array();
		if (isset($this->request->data[$tipoFiltro]) && !empty($this->request->data[$tipoFiltro])) {						
						foreach ($this->request->data[$tipoFiltro] as $principio){
							array_push($arrayFiltros, $principio);
						}
						return ($arrayFiltros);
		}
	}
	
	
	private function filtroPrincipios($actividades, $filtro, $tipoFiltro){
		$numeroPrincipios = count($filtro);	
		foreach ($actividades as $key => $actividad){	
			$aciertos = 0;
			$principiosActividad = count($actividad[$tipoFiltro]);
			if ($principiosActividad <> $numeroPrincipios){ //si la actividad no tiene el mismo numero de filtros ya no es una actividad válida
				unset($actividades[$key]);				
			}
			else{ //Si tiene el mismo número hay que comprobar que sean los mismos.
				if (!$this->compruebaFiltros($actividad[$tipoFiltro], $filtro, $tipoFiltro)){
					unset($actividades[$key]);	
				}
				
			}	
		}
		return $actividades;		
	}
	
	//ESTE MÉTODO COMPROBARA SI LOS FILTROS PASADOS SON IGUALES A LOS QUE CONTIENE LA ACTIVIDAD
	private function compruebaFiltros($datosActividad, $filtro, $tipoFiltro){
			$arrayFinal = array();
			foreach($datosActividad as $dato){								
				array_push($arrayFinal, $dato['id']);			
			}
			if (count(array_diff($arrayFinal, $filtro)) == 0){
				return true;
			}
			else{
				return false;
			}
	}
	
	//ESTE MÉTODO ES DIFERENTE YA QUE NECESITO OBTENER LAS ACTIVIDADES CUYO FINANCIAMIENTO SEA FINACIAMIENTO_IEM 0,1,2
	
	private function filtroFinanciamiento($actividades, $filtros){
			foreach ($actividades as $key => $actividad){	
				if (!in_array($actividad['Activity']['financiamiento_i_e_m'], $filtros)){
					unset($actividades[$key]);				
				}				
			}
		return $actividades;
	}

	private function filtroEstrellas($actividades, $filtros){
			foreach ($actividades as $key => $actividad){	
				if (!in_array($actividad['Activity']['evaluacion'], $filtros)){
					unset($actividades[$key]);				
				}				
			}
		return $actividades;
	}
	
	
	
	
}

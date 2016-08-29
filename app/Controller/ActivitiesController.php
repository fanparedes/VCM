
<?php
//error_reporting(E_ALL);
ini_set('display_errors', 0);
App::uses('AppController', 'Controller');
/**
 * Activities Controller
 *
 * @property Activity $Activity
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
 set_time_limit(0);
class ActivitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session', 'RequestHandler');
	public $layout = "vcm";
	public $uses = array('Activity', 'Objetive', 'Milestone', 'ActivityHeadquarter', 'ActivitySchool', 'ActivityCentral', 'ActivityBeginning', 'ActivityExternal', 'ActivityInternal', 'ActivityScope', 'ActivityArea', 'ActivityEntity', 'Central', 'Headquarter', 'School', 'Beginning', 'Internal', 'External', 'Scope', 'Entity', 'Area', 'Image', 'ActivityInstitution', 'Review', 'Observation', 'Usuario');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Activity->recursive = 0;
		$this->set('activities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function ficha($id = null) {
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
		$this->set('activity', $this->Activity->find('first', $options));
		
	}


/**
 * exportar_excel_ficha method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function exportar_excel_ficha($id = null) {
		$this->layout = 'ajax_excel';
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
		$actividades_evaluadas = $this->Activity->find('first', $options);

		$user = $this->Usuario->find('first', array(
				'conditions' => array(
						'Usuario.id' => $actividades_evaluadas['Activity']['user_id']
					)
			)
		);
			$actividades_evaluadas['Activity']['Usuario'] = $user;

		$this->set('activity', $actividades_evaluadas);

	}

	/**
	 * exporta_pdf_ficha method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
		public function exporta_pdf_ficha($id = null) {
			//$this->layout = 'ajax_pdf';
			
			App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
			$this->layout = 'pdf';
			//Configure::write('debug', 2);
			$this->response->type('pdf');

			$this->set('fpdf', new FPDF('P','mm','A4'));
			if (!$this->Activity->exists($id)) {
				throw new NotFoundException(__('Invalid activity'));
			}
	    	//$this->set('data', 'Hello, PDF world');

			//$id_usuario = $this->Session->read('Auth.User.id');
			//Configure::write('debug', 2);


			$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
			
			$actividades_evaluadas = $this->Activity->find('all', $options);

			foreach($actividades_evaluadas as $key_act_1 => $act_1) {
				$user = $this->Usuario->find('first', array(
						'conditions' => array(
								'Usuario.id' => $act_1['Activity']['user_id']
							)
					)
				);
				$actividades_evaluadas[$key_act_1]['Activity']['Usuario'] = $user;
			}
			//print_r($actividades_evaluadas);
			$this->set('actividades_evaluadas', $actividades_evaluadas);	
			$this->render('pdf');
		}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = "vcm";
		if ($this->request->is('post')) {
			 
			// SANITIZAMOS LOS TEXTOS QUE LLEGAN DESDE EL FORMULARIO
			
			$nombre=isset($this->request->data['Activity']['nombre']) ? str_replace("\n",'',$this->request->data['Activity']['nombre']) : '';
			$descripcion_actividad=isset($this->request->data['Activity']['descripcion_actividad']) ? str_replace("\n",'',$this->request->data['Activity']['descripcion_actividad']) : '';
			$proyectoglobal=isset($this->request->data['Activity']['proyectoglobal']) ? str_replace("\n",'',$this->request->data['Activity']['proyectoglobal']) : '';
			$responsable=isset($this->request->data['Activity']['responsable']) ? str_replace("\n",'',$this->request->data['Activity']['responsable']) : '';
			$cargoresponsable=isset($this->request->data['Activity']['cargoresponsable']) ? str_replace("\n",'',$this->request->data['Activity']['cargoresponsable']) : '';
			$mail_responsable=isset($this->request->data['Activity']['mail_responsable']) ? str_replace("\n",'',$this->request->data['Activity']['mail_responsable']) : '';
			$objetivo_general=isset($this->request->data['Activity']['objetivo_general']) ? str_replace("\n",'',$this->request->data['Activity']['objetivo_general']) : '';
			$justificacionprincipios=isset($this->request->data['Activity']['justificacionprincipios']) ? str_replace("\n",'',$this->request->data['Activity']['justificacionprincipios']) : '';
			$beneficiados=isset($this->request->data['Activity']['beneficiados']) ? str_replace("\n",'',$this->request->data['Activity']['beneficiados']) : '';
			$detalleentidades=isset($this->request->data['Activity']['detalleentidades']) ? str_replace("\n",'',$this->request->data['Activity']['detalleentidades']) : '';
			$nombreentidad1=isset($this->request->data['Activity']['nombreentidad1']) ? str_replace("\n",'',$this->request->data['Activity']['nombreentidad1']) : '';
			$cargoentidad1=isset($this->request->data['Activity']['cargoentidad1']) ? str_replace("\n",'',$this->request->data['Activity']['cargoentidad1']) : '';
			$detallecontacto1=isset($this->request->data['Activity']['detallecontacto1']) ? str_replace("\n",'',$this->request->data['Activity']['detallecontacto1']) : '';
			$detallepresupuesto=isset($this->request->data['Activity']['detallepresupuesto']) ? str_replace("\n",'',$this->request->data['Activity']['detallepresupuesto']) : '';

			$this->request->data['Activity']['nombre'] 					= $nombre;
			$this->request->data['Activity']['descripcion_actividad'] 	= $descripcion_actividad;
			$this->request->data['Activity']['proyectoglobal'] 			= $proyectoglobal;
			$this->request->data['Activity']['responsable'] 			= $responsable;
			$this->request->data['Activity']['cargoresponsable'] 		= $cargoresponsable;
			$this->request->data['Activity']['mail_responsable'] 		= $mail_responsable;
			$this->request->data['Activity']['objetivo_general'] 		= $objetivo_general;
			$this->request->data['Activity']['justificacionprincipios'] = $justificacionprincipios;
			$this->request->data['Activity']['beneficiados'] 			= $beneficiados;
			$this->request->data['Activity']['detalleentidades'] 		= $detalleentidades;
			$this->request->data['Activity']['nombreentidad1'] 			= $nombreentidad1;
			$this->request->data['Activity']['cargoentidad1'] 			= $cargoentidad1;
			$this->request->data['Activity']['detallecontacto1'] 		= $detallecontacto1;
			$this->request->data['Activity']['detallepresupuesto'] 		= $detallepresupuesto;
			
			//FIN DE LA SANITIZACIÓN
			
			
			if ($this->data['Activity']['guardar'] == 1) {
				$this->request->data['Activity']['estado'] = '0';
			} else {
				$this->request->data['Activity']['estado'] = '1';
			}

			$id_usuario = $this->Session->read('Auth.User.id');
			$this->request->data['Activity']['user_id'] = $id_usuario;


			if (isset($this->data['Activity']['actividad_hito'])) {
				$this->request->data['Activity']['actividad_hito'] = '1';
			}

			if (isset($this->data['Activity']['demanda_interna'])) {
				$this->request->data['Activity']['origen_del_proyecto'] = '0';
			} else {
				$this->request->data['Activity']['origen_del_proyecto'] = '1';
			}

			if (isset($this->data['Activity']['por_interno'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '0';
			}
			if (isset($this->data['Activity']['por_externo'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '1';
			}
			if (isset($this->data['Activity']['por_mixto'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '2';
			}

			if (isset($this->data['Activity']['convenioindefinido'])) {
				$this->request->data['Activity']['convenioindefinido'] = '1';
			}


			if (isset($this->data['Activity']['por_interno'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '0';
			}
			if (isset($this->data['Activity']['por_externo'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '1';
			}
			if (isset($this->data['Activity']['por_mixto'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '2';
			}


			if (isset($this->data['Activity']['in_activosocial'])) {
				$this->request->data['Activity']['in_activosocial'] = '1';
			}
			if (isset($this->data['Activity']['in_desarrolloacademico'])) {
				$this->request->data['Activity']['in_desarrolloacademico'] = '1';
			}
			if (isset($this->data['Activity']['in_empleabilidad'])) {
				$this->request->data['Activity']['in_empleabilidad'] = '1';
			}
			if (isset($this->data['Activity']['proyecto_anual'])) {
				$this->request->data['Activity']['proyecto_anual'] = '1';
			}



			//  grabado sedes asociadas
			if (isset($this->request->data['Activity']['sedes'])) {
				foreach($this->request->data['Activity']['sedes'] as $key_sedes => $sedes) {
					$data_head = array('ActivityHeadquarter' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'headquarter_id' => $key_sedes
						));
					$this->ActivityHeadquarter->create();
					$this->ActivityHeadquarter->save($data_head);
				}
			}


			//  grabado escuelas asociadas
			if (isset($this->request->data['Activity']['escuelas'])) {
				foreach($this->request->data['Activity']['escuelas'] as $key_escuela => $escuela) {
					$data_escuela = array('ActivitySchool' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'school_id' => $key_escuela
						));
					$this->ActivitySchool->create();
					$this->ActivitySchool->save($data_escuela);
				}
			}


			//  grabado areas centrales asociadas
			if (isset($this->request->data['Activity']['centrales'])) {
				foreach($this->request->data['Activity']['centrales'] as $key_central => $central) {
					$data_central = array('ActivityCentral' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'central_id' => $key_central
						));
					$this->ActivityCentral->create();
					$this->ActivityCentral->save($data_central);
				}
			}

			//  grabado principios asociadas
			if (isset($this->request->data['Activity']['principios'])) {
				foreach($this->request->data['Activity']['principios'] as $key_principios => $principios) {
					$data_beg = array('ActivityBeginning' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'beginning_id' => $key_principios
						));
					$this->ActivityBeginning->create();
					$this->ActivityBeginning->save($data_beg);
				}
			}


			//  grabado personal interno asociadas
			if (isset($this->request->data['Activity']['internal'])) {
				foreach($this->request->data['Activity']['internal'] as $key_internal => $internal) {
					$data_internal = array('ActivityInternal' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'internal_id' => $key_internal
						));
					$this->ActivityInternal->create();
					$this->ActivityInternal->save($data_internal);
				}
			}

			//  grabado personal externo asociadas
			if (isset($this->request->data['Activity']['external'])) {
				foreach($this->request->data['Activity']['external'] as $key_external => $external) {
					$data_external = array('ActivityExternal' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'external_id' => $key_external
						));
					$this->ActivityExternal->create();
					$this->ActivityExternal->save($data_external);
				}
			}


			//  grabado ambitos asociadas
			if (isset($this->request->data['Activity']['ambitos'])) {
				foreach($this->request->data['Activity']['ambitos'] as $key_scope => $scope) {
					$data_scope = array('ActivityScope' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'scope_id' => $key_scope
						));
					$this->ActivityScope->create();
					$this->ActivityScope->save($data_scope);
				}
			}


			// grabado Area Asociada

			$data_area = array('ActivityArea' => array(
					'activity_id' => $this->request->data['Activity']['id'],
					'area_id' => $this->request->data['Activity']['area']
				));
			$this->ActivityArea->create();
			$this->ActivityArea->save($data_area);



			//  grabado entidades asociadas
			if (isset($this->request->data['Activity']['entidades'])) {
				foreach($this->request->data['Activity']['entidades'] as $key_ent => $entity) {
					$data_ent = array('ActivityEntity' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'entity_id' => $key_ent
						));
					$this->ActivityEntity->create();
					$this->ActivityEntity->save($data_ent);
				}
			}

			//  grabado imagen
			if($this->data['Activity']["imagen"]["tmp_name"] <> null) {
				$extension = end( explode('.', $this->data['Activity']["imagen"]["name"]) );
				if (move_uploaded_file($this->data['Activity']["imagen"]["tmp_name"],
				          "uploads/" . $this->request->data['Activity']['id'].'_00_.'.$extension)) {
				}
				$data_image = array('Image' => array(
								'activity_id' => $this->request->data['Activity']['id'],
								'tipo' => 0,
								'nombre' =>  $this->request->data['Activity']['id'].'_00_.'.$extension,
								'nombrefisico' => $this->request->data['Activity']['id'].'_00_.'.$extension
							));
				$this->Image->create();
				$this->Image->save($data_image);

				$file = fopen($this->webroot."log_imagenes.txt", "a");
				fwrite($file, "=====================LOG IMAGENES ".date("d/m/Y H:i:s")."================================" . PHP_EOL);
				fwrite($file, "TIPO IMAGEN: ".$this->request->data['Activity']['id'].'_00_.'.$extension . PHP_EOL);
				fwrite($file, "Arreglo: ".($data_image) . PHP_EOL);
				fwrite($file, "========================================================================================" . PHP_EOL);
				fclose($file);
			}


			if ($this->Activity->save($this->request->data)) {
				$this->Flash->success(__('La actividad ha sido guardada correctamente.'));
				return $this->redirect(array('controller' => 'home', 'action' => 'usuario'));
			} else {
				$this->Flash->error(__('La actividad, no pudo ser guardada. Pruebe más tarde.'));
			}
		}

		$this->Activity->create();
		$this->Activity->save($this->request->data);
		$id_activity = $this->Activity->id;
		$this->set('id_activity', $id_activity);


		$centrals =  $this->Central->find('list');
		$this->set('centrals', $centrals);

		$headquarters =  $this->Headquarter->find('list');
		$this->set('headquarters', $headquarters);

		$schools =  $this->School->find('list');
		$this->set('schools', $schools);

		$beginnings = $this->Beginning->find('all', array(
				'order' => 'Beginning.id asc'
			));
		$this->set('beginnings', $beginnings);

		$internals = $this->Internal->find('all', array(
				'order' => 'Internal.id asc'
			));
		$this->set('internals', $internals);

		$externals = $this->External->find('all', array(
				'order' => 'External.id asc'
			));
		$this->set('externals', $externals);

		$scopes = $this->Scope->find('all', array(
				'order' => 'Scope.id asc'
			));
		$this->set('scopes', $scopes);

		$areas = $this->Area->find('all', array(
				'order' => 'Area.id asc'
			));
		$this->set('areas', $areas);

		$entities = $this->Entity->find('all', array(
				'order' => 'Entity.id asc'
			));
		$this->set('entities', $entities);

	}

	public function agrega_obj_esp() {
		$this->layout = "ajax";
		$data = array('Objetive' => array(
				'objetivo' => utf8_decode($this->data['objetivo']),
				'activity_id' => $this->data['id_activity']
			)
		);
		$this->Objetive->save($data);
		$objetives = $this->Objetive->find('list', array(
				'order' => 'Objetive.id ASC',
				'conditions' => array(
						'Objetive.activity_id' => $this->data['id_activity']
					)
			));
		$this->set('objetives', $objetives);

	}

	public function agrega_hito() {
		$this->layout = "ajax";
		$data = array('Milestone' => array(
				'objetivo' => utf8_decode($this->data['hito']),
				'activity_id' => $this->data['id_activity']
			)
		);
		$this->Milestone->save($data);
		$milestones = $this->Milestone->find('list', array(
				'order' => 'Milestone.id ASC',
				'conditions' => array(
						'Milestone.activity_id' => $this->data['id_activity']
					)
			));
		$this->set('milestones', $milestones);

	}

/**
 * | method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {	
		
		 
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		if ($this->request->is(array('post', 'put'))) {
			// SANITIZAMOS LOS TEXTOS QUE LLEGAN DESDE EL FORMULARIO
			$nombre=isset($this->request->data['Activity']['nombre']) ? str_replace("\n",'',$this->request->data['Activity']['nombre']) : '';
			$descripcion_actividad=isset($this->request->data['Activity']['descripcion_actividad']) ? str_replace("\n",'',$this->request->data['Activity']['descripcion_actividad']) : '';
			$proyectoglobal=isset($this->request->data['Activity']['proyectoglobal']) ? str_replace("\n",'',$this->request->data['Activity']['proyectoglobal']) : '';
			$responsable=isset($this->request->data['Activity']['responsable']) ? str_replace("\n",'',$this->request->data['Activity']['responsable']) : '';
			$cargoresponsable=isset($this->request->data['Activity']['cargoresponsable']) ? str_replace("\n",'',$this->request->data['Activity']['cargoresponsable']) : '';
			$mail_responsable=isset($this->request->data['Activity']['mail_responsable']) ? str_replace("\n",'',$this->request->data['Activity']['mail_responsable']) : '';
			$objetivo_general=isset($this->request->data['Activity']['objetivo_general']) ? str_replace("\n",'',$this->request->data['Activity']['objetivo_general']) : '';
			$justificacionprincipios=isset($this->request->data['Activity']['justificacionprincipios']) ? str_replace("\n",'',$this->request->data['Activity']['justificacionprincipios']) : '';
			$beneficiados=isset($this->request->data['Activity']['beneficiados']) ? str_replace("\n",'',$this->request->data['Activity']['beneficiados']) : '';
			$detalleentidades=isset($this->request->data['Activity']['detalleentidades']) ? str_replace("\n",'',$this->request->data['Activity']['detalleentidades']) : '';
			$nombreentidad1=isset($this->request->data['Activity']['nombreentidad1']) ? str_replace("\n",'',$this->request->data['Activity']['nombreentidad1']) : '';
			$cargoentidad1=isset($this->request->data['Activity']['cargoentidad1']) ? str_replace("\n",'',$this->request->data['Activity']['cargoentidad1']) : '';
			$detallecontacto1=isset($this->request->data['Activity']['detallecontacto1']) ? str_replace("\n",'',$this->request->data['Activity']['detallecontacto1']) : '';
			$detallepresupuesto=isset($this->request->data['Activity']['detallepresupuesto']) ? str_replace("\n",'',$this->request->data['Activity']['detallepresupuesto']) : '';

			$this->request->data['Activity']['nombre'] 					= $nombre;
			$this->request->data['Activity']['descripcion_actividad'] 	= $descripcion_actividad;
			$this->request->data['Activity']['proyectoglobal'] 			= $proyectoglobal;
			$this->request->data['Activity']['responsable'] 			= $responsable;
			$this->request->data['Activity']['cargoresponsable'] 		= $cargoresponsable;
			$this->request->data['Activity']['mail_responsable'] 		= $mail_responsable;
			$this->request->data['Activity']['objetivo_general'] 		= $objetivo_general;
			$this->request->data['Activity']['justificacionprincipios'] = $justificacionprincipios;
			$this->request->data['Activity']['beneficiados'] 			= $beneficiados;
			$this->request->data['Activity']['detalleentidades'] 		= $detalleentidades;
			$this->request->data['Activity']['nombreentidad1'] 			= $nombreentidad1;
			$this->request->data['Activity']['cargoentidad1'] 			= $cargoentidad1;
			$this->request->data['Activity']['detallecontacto1'] 		= $detallecontacto1;
			$this->request->data['Activity']['detallepresupuesto'] 		= $detallepresupuesto;
			
			//FIN DE LA SANITIZACIÓN
		 
		 
		 
			if ($this->data['Activity']['guardar'] == 1) {
				$this->request->data['Activity']['estado'] = '0';
			} else {
				$this->request->data['Activity']['estado'] = '1';
			}


			if (isset($this->data['Activity']['actividad_hito'])) {
				$this->request->data['Activity']['actividad_hito'] = '1';
			}

			if (isset($this->data['Activity']['demanda_interna'])) {
				$this->request->data['Activity']['origen_del_proyecto'] = '0';
			} else {
				$this->request->data['Activity']['origen_del_proyecto'] = '1';
			}

			if (isset($this->data['Activity']['por_interno'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '0';
			}
			if (isset($this->data['Activity']['por_externo'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '1';
			}
			if (isset($this->data['Activity']['por_mixto'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '2';
			}

			if (isset($this->data['Activity']['convenioindefinido'])) {
				$this->request->data['Activity']['convenioindefinido'] = '1';
			}


			if (isset($this->data['Activity']['por_interno'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '0';
			}
			if (isset($this->data['Activity']['por_externo'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '1';
			}
			if (isset($this->data['Activity']['por_mixto'])) {
				$this->request->data['Activity']['financiamiento_i_e_m'] = '2';
			}


			if (isset($this->data['Activity']['in_activosocial'])) {
				$this->request->data['Activity']['in_activosocial'] = '1';
			} else {
				$this->request->data['Activity']['in_activosocial'] = '0';
			}
			if (isset($this->data['Activity']['in_desarrolloacademico'])) {
				$this->request->data['Activity']['in_desarrolloacademico'] = '1';
			} else {
				$this->request->data['Activity']['in_desarrolloacademico'] = '0';
			}
			if (isset($this->data['Activity']['in_empleabilidad'])) {
				$this->request->data['Activity']['in_empleabilidad'] = '1';
			} else {
				$this->request->data['Activity']['in_empleabilidad'] = '0';
			}
			if (isset($this->data['Activity']['proyecto_anual'])) {
				$this->request->data['Activity']['proyecto_anual'] = '1';
			}


			//  eliminado sedes asociadas
					$this->ActivityHeadquarter->deleteAll(array('ActivityHeadquarter.activity_id' => $id), false);


			//  eliminado escuelas asociadas
					$this->ActivitySchool->deleteAll(array('ActivitySchool.activity_id' => $id), false);


			//  eliminado areas centrales asociadas
					$this->ActivityCentral->deleteAll(array('ActivityCentral.activity_id' => $id), false);

			//  eliminado principios asociadas
					$this->ActivityBeginning->deleteAll(array('ActivityBeginning.activity_id' => $id), false);


			//  eliminado personal interno asociadas
					$this->ActivityInternal->deleteAll(array('ActivityInternal.activity_id' => $id), false);

			//  eliminado personal externo asociadas
					$this->ActivityExternal->deleteAll(array('ActivityExternal.activity_id' => $id), false);


			//  eliminado ambitos asociadas
					$this->ActivityScope->deleteAll(array('ActivityScope.activity_id' => $id), false);


			// eliminado Area Asociada

					$this->ActivityArea->deleteAll(array('ActivityArea.activity_id' => $id), false);

			//  eliminado entidades asociadas
					$this->ActivityEntity->deleteAll(array('ActivityEntity.activity_id' => $id), false);



			//  grabado sedes asociadas
			if (isset($this->request->data['Activity']['sedes'])) {
				foreach($this->request->data['Activity']['sedes'] as $key_sedes => $sedes) {
					$data_head = array('ActivityHeadquarter' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'headquarter_id' => $key_sedes
						));
					$this->ActivityHeadquarter->create();
					$this->ActivityHeadquarter->save($data_head);
				}
			}


			//  grabado escuelas asociadas
			if (isset($this->request->data['Activity']['escuelas'])) {
				foreach($this->request->data['Activity']['escuelas'] as $key_escuela => $escuela) {
					$data_escuela = array('ActivitySchool' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'school_id' => $key_escuela
						));
					$this->ActivitySchool->create();
					$this->ActivitySchool->save($data_escuela);
				}
			}


			//  grabado areas centrales asociadas
			if (isset($this->request->data['Activity']['centrales'])) {
				foreach($this->request->data['Activity']['centrales'] as $key_central => $central) {
					$data_central = array('ActivityCentral' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'central_id' => $key_central
						));
					$this->ActivityCentral->create();
					$this->ActivityCentral->save($data_central);
				}
			}

			//  grabado principios asociadas
			if (isset($this->request->data['Activity']['principios'])) {
				foreach($this->request->data['Activity']['principios'] as $key_principios => $principios) {
					$data_beg = array('ActivityBeginning' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'beginning_id' => $key_principios
						));
					$this->ActivityBeginning->create();
					$this->ActivityBeginning->save($data_beg);
				}
			}


			//  grabado personal interno asociadas
			if (isset($this->request->data['Activity']['internal'])) {
				foreach($this->request->data['Activity']['internal'] as $key_internal => $internal) {
					$data_internal = array('ActivityInternal' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'internal_id' => $key_internal
						));
					$this->ActivityInternal->create();
					$this->ActivityInternal->save($data_internal);
				}
			}

			//  grabado personal externo asociadas
			if (isset($this->request->data['Activity']['external'])) {
				foreach($this->request->data['Activity']['external'] as $key_external => $external) {
					$data_external = array('ActivityExternal' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'external_id' => $key_external
						));
					$this->ActivityExternal->create();
					$this->ActivityExternal->save($data_external);
				}
			}


			//  grabado ambitos asociadas
			if (isset($this->request->data['Activity']['ambitos'])) {
				foreach($this->request->data['Activity']['ambitos'] as $key_scope => $scope) {
					$data_scope = array('ActivityScope' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'scope_id' => $key_scope
						));
					$this->ActivityScope->create();
					$this->ActivityScope->save($data_scope);
				}
			}


			// grabado Area Asociada

			$data_area = array('ActivityArea' => array(
					'activity_id' => $this->request->data['Activity']['id'],
					'area_id' => $this->request->data['Activity']['area']
				));
			$this->ActivityArea->create();
			$this->ActivityArea->save($data_area);



			//  grabado entidades asociadas
			if (isset($this->request->data['Activity']['entidades'])) {
				foreach($this->request->data['Activity']['entidades'] as $key_ent => $entity) {
					$data_ent = array('ActivityEntity' => array(
							'activity_id' => $this->request->data['Activity']['id'],
							'entity_id' => $key_ent
						));
					$this->ActivityEntity->create();
					$this->ActivityEntity->save($data_ent);
				}
			}


			//  grabado imagen
			if($this->data['Activity']["imagen"]["tmp_name"] <> null) {
				$extension = end( explode('.', $this->data['Activity']["imagen"]["name"]) );
				if (move_uploaded_file($this->data['Activity']["imagen"]["tmp_name"],
				          "uploads/" . $this->request->data['Activity']['id'].'_00_.'.$extension)) {
				}
				$data_image = array('Image' => array(
								'activity_id' => $this->request->data['Activity']['id'],
								'tipo' => 0,
								'nombre' => $this->request->data['Activity']['id'].'_00_.'.$extension,
								'nombrefisico' => $this->request->data['Activity']['id'].'_00_.'.$extension
							));
				$this->Image->create();
				$this->Image->save($data_image);


				$file = fopen($this->webroot."log_imagenes.txt", "a");
				fwrite($file, "=====================LOG IMAGENES ".date("d/m/Y H:i:s")."================================" . PHP_EOL);
				fwrite($file, "TIPO IMAGEN: ".$this->request->data['Activity']['id'].'_00_.'.$extension . PHP_EOL);
				fwrite($file, "Arreglo: ".($data_image) . PHP_EOL);
				fwrite($file, "========================================================================================" . PHP_EOL);
				fclose($file);
			}




			if ($this->Activity->save($this->request->data)) {
				$this->Flash->success(__('La actividad ha sido guardada.'));
				return $this->redirect(array('controller' => 'home', 'action' => 'usuario'));
			} else {
				$this->Flash->error(__('La actividad no pudo ser guardada.'));
			}
		} else {
			$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
			$this->request->data = $this->Activity->find('first', $options);






		$this->set('id_activity', $id);

		$listado_sedes = array();
		foreach($this->request->data['Headquarter'] as $head) {
			$listado_sedes[] = $head['cod_sede'];
		}
		$this->set('listado_sedes', $listado_sedes);

		$listado_escuelas = array();
		foreach($this->request->data['School'] as $school) {
			$listado_escuelas[] = $school['cod_escuela'];
		}
		$this->set('listado_escuelas', $listado_escuelas);

		$listado_central = array();
		foreach($this->request->data['Central'] as $central) {
			$listado_central[] = $central['id'];
		}
		$this->set('listado_central', $listado_central);


		$listado_principios = array();
		foreach($this->request->data['Beginning'] as $beginning) {
			$listado_principios[] = $beginning['id'];
		}
		$this->set('listado_principios', $listado_principios);


		$listado_internals = array();
		foreach($this->request->data['Internal'] as $internal) {
			$listado_internals[] = $internal['id'];
		}
		$this->set('listado_internals', $listado_internals);


		$listado_externals = array();
		foreach($this->request->data['External'] as $external) {
			$listado_externals[] = $external['id'];
		}
		$this->set('listado_externals', $listado_externals);


		$listado_ambitos = array();
		foreach($this->request->data['Scope'] as $scope) {
			$listado_ambitos[] = $scope['id'];
		}
		$this->set('listado_ambitos', $listado_ambitos);


		$listado_areas = array();
		foreach($this->request->data['Area'] as $area) {
			$listado_areas[] = $area['id'];
		}
		$this->set('listado_areas', $listado_areas);


		$listado_entidades = array();
		foreach($this->request->data['Entity'] as $entity) {
			$listado_entidades[] = $entity['id'];
		}
		$this->set('listado_entidades', $listado_entidades);

		$listado_cont_entidades = $this->ActivityInstitution->find('all',array(
				'conditions' => array(
						'ActivityInstitution.activity_id' => $id
					)
			));
		$this->set('listado_cont_entidades', $listado_cont_entidades);

		$listado_hitos = $this->Milestone->find('list', array(
				'order' => 'Milestone.id desc',
				'conditions' => array(
						'Milestone.activity_id' => $id
					)
			));
		$this->set('listado_hitos', $listado_hitos);
		
		
		
		
		
		$listado_objetivos = $this->Objetive->find('list', array(
				'order' => 'Objetive.id desc',
				'conditions' => array(
						'Objetive.activity_id' => $id
					)
			));
		$this->set('listado_objetivos', $listado_objetivos);



		$centrals =  $this->Central->find('list');
		$this->set('centrals', $centrals);

		$headquarters =  $this->Headquarter->find('list');
		$this->set('headquarters', $headquarters);

		$schools =  $this->School->find('list');
		$this->set('schools', $schools);

		$beginnings = $this->Beginning->find('all', array(
				'order' => 'Beginning.id asc'
			));
		$this->set('beginnings', $beginnings);

		$internals = $this->Internal->find('all', array(
				'order' => 'Internal.id asc'
			));
		$this->set('internals', $internals);

		$externals = $this->External->find('all', array(
				'order' => 'External.id asc'
			));
		$this->set('externals', $externals);

		$scopes = $this->Scope->find('all', array(
				'order' => 'Scope.id asc'
			));
		$this->set('scopes', $scopes);

		$areas = $this->Area->find('all', array(
				'order' => 'Area.id asc'
			));
		$this->set('areas', $areas);

		$entities = $this->Entity->find('all', array(
				'order' => 'Entity.id asc'
			));
		$this->set('entities', $entities);



		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Activity->id = $id;
		if (!$this->Activity->exists()) {
			throw new NotFoundException(__('Invalid activity'));
		}
		//$this->request->allowMethod('post', 'delete', 'delete_act');

		$this->Activity->unbindModel(
        	array('hasMany' => array('Objetive', 'Milestone'),
        			'hasAndBelongsToMany' => array('Area', 'Beginning', 'Central', 'Entity', 'External','Headquarter','Internal', 'School', 'Scope')
        	)
    	);





		if ($this->Activity->delete()) {

			//  eliminado sedes asociadas
					$this->ActivityHeadquarter->deleteAll(array('ActivityHeadquarter.activity_id' => $id), false);


			//  eliminado escuelas asociadas
					$this->ActivitySchool->deleteAll(array('ActivitySchool.activity_id' => $id), false);


			//  eliminado areas centrales asociadas
					$this->ActivityCentral->deleteAll(array('ActivityCentral.activity_id' => $id), false);

			//  eliminado principios asociadas
					$this->ActivityBeginning->deleteAll(array('ActivityBeginning.activity_id' => $id), false);


			//  eliminado personal interno asociadas
					$this->ActivityInternal->deleteAll(array('ActivityInternal.activity_id' => $id), false);

			//  eliminado personal externo asociadas
					$this->ActivityExternal->deleteAll(array('ActivityExternal.activity_id' => $id), false);


			//  eliminado ambitos asociadas
					$this->ActivityScope->deleteAll(array('ActivityScope.activity_id' => $id), false);


			// eliminado Area Asociada

					$this->ActivityArea->deleteAll(array('ActivityArea.activity_id' => $id), false);

			//  eliminado entidades asociadas
					$this->ActivityEntity->deleteAll(array('ActivityEntity.activity_id' => $id), false);

			//  eliminado objetivos asociadas
					$this->Objetive->deleteAll(array('Objetive.activity_id' => $id), false);

			//  eliminado hitos asociadas
					$this->Milestone->deleteAll(array('Milestone.activity_id' => $id), false);


			$this->Flash->success(__('La actividad ha sido borrada.'));
		} else {
			$this->Flash->error(__('La actividad no se pudo borrar. '));
		}
		return $this->redirect(array('controller' => 'home', 'action' => 'usuario'));
	}

	public function delete_ajax() {
		$this->layout = "ajax";
		$id = $this->data['id_activity'];
		$this->Activity->id = $id;
		if (!$this->Activity->exists()) {
			throw new NotFoundException(__('Invalid activity'));
		}


		$this->Activity->unbindModel(
        	array('hasMany' => array('Objetive', 'Milestone'),
        			'hasAndBelongsToMany' => array('Area', 'Beginning', 'Central', 'Entity', 'External','Headquarter','Internal', 'School', 'Scope')
        	)
    	);

		$this->request->allowMethod('post', 'delete');
		if ($this->Activity->delete()) {

			//  eliminado sedes asociadas
					$this->ActivityHeadquarter->deleteAll(array('ActivityHeadquarter.activity_id' => $id), false);


			//  eliminado escuelas asociadas
					$this->ActivitySchool->deleteAll(array('ActivitySchool.activity_id' => $id), false);


			//  eliminado areas centrales asociadas
					$this->ActivityCentral->deleteAll(array('ActivityCentral.activity_id' => $id), false);

			//  eliminado principios asociadas
					$this->ActivityBeginning->deleteAll(array('ActivityBeginning.activity_id' => $id), false);


			//  eliminado personal interno asociadas
					$this->ActivityInternal->deleteAll(array('ActivityInternal.activity_id' => $id), false);

			//  eliminado personal externo asociadas
					$this->ActivityExternal->deleteAll(array('ActivityExternal.activity_id' => $id), false);


			//  eliminado ambitos asociadas
					$this->ActivityScope->deleteAll(array('ActivityScope.activity_id' => $id), false);


			// eliminado Area Asociada

					$this->ActivityArea->deleteAll(array('ActivityArea.activity_id' => $id), false);

			//  eliminado entidades asociadas
					$this->ActivityEntity->deleteAll(array('ActivityEntity.activity_id' => $id), false);

			//  eliminado objetivos asociadas
					$this->Objetive->deleteAll(array('Objetive.activity_id' => $id), false);

			//  eliminado hitos asociadas
					$this->Milestone->deleteAll(array('Milestone.activity_id' => $id), false);



		}
	}

	public function evaluate($id = null) {

		if ($this->request->is(array('post', 'put'))) {

			$id_activity = $this->data['Review']['activity_id'];
			
			//SANITIZAMOS LOS DATOS QUE LLEGAN PARA LOS \NotFoundException
			$this->request->data['Review']['involucramientoarea'] = str_replace("\n",'',$this->request->data['Review']['involucramientoarea']);
			$this->request->data['Review']['cumplimientoplazos'] = str_replace("\n",'',$this->request->data['Review']['cumplimientoplazos']);
			$this->request->data['Review']['cumplimientoobjetivos'] = str_replace("\n",'',$this->request->data['Review']['cumplimientoobjetivos']);
			$this->request->data['Review']['cumplimientoprincipios'] = str_replace("\n",'',$this->request->data['Review']['involucramientoarea']);
			$this->request->data['Review']['extensionaprendizaje'] = str_replace("\n",'',$this->request->data['Review']['extensionaprendizaje']);
			$this->request->data['Review']['entidades'] = str_replace("\n",'',$this->request->data['Review']['entidades']);
			$this->request->data['Review']['justificacionhitos'] = str_replace("\n",'',$this->request->data['Review']['justificacionhitos']);
			$this->request->data['Review']['comentariosactividad'] = str_replace("\n",'',$this->request->data['Review']['comentariosactividad']);
			//FIN SANITIZAR DATOS
			


			//grabado internals
			$estrellas_internal = 0;
			$cont_internal = 0;
				foreach($this->request->data['Internal'] as $key_internal => $internal) {

					$inter = $this->ActivityInternal->find('first', array(
							'conditions' => array(
									'ActivityInternal.internal_id' => $key_internal,
									'ActivityInternal.activity_id' => $id_activity
								)
						));

					$data_internal = array('ActivityInternal' => array(
							'id' => $inter['ActivityInternal']['id'],
							'evaluacion' => $internal['puntuacion'],
							'comentario' => $internal['comentario']
						));
					$this->ActivityInternal->save($data_internal);
					$estrellas_internal = $estrellas_internal + $internal['puntuacion'];
					$cont_internal++;
				}


			//grabado external
			$estrellas_external = 0;
			$cont_external = 0;

				foreach($this->request->data['External'] as $key_external => $external) {

					$inter = $this->ActivityExternal->find('first', array(
							'conditions' => array(
									'ActivityExternal.external_id' => $key_external,
									'ActivityExternal.activity_id' => $id_activity
								)
						));

					$data_external = array('ActivityExternal' => array(
							'id' => $inter['ActivityExternal']['id'],
							'evaluacion' => $external['puntuacion'],
							'comentario' => $external['comentario']
						));
					$this->ActivityExternal->save($data_external);
					$estrellas_external = $estrellas_external + $external['puntuacion'];
					$cont_external++;
				}


			//grabado scope
			$estrellas_scope = 0;
			$cont_scope = 0;

				foreach($this->request->data['Scope'] as $key_scope => $scope) {

					$inter = $this->ActivityScope->find('first', array(
							'conditions' => array(
									'ActivityScope.scope_id' => $key_scope,
									'ActivityScope.activity_id' => $id_activity
								)
						));

					$data_scope = array('ActivityScope' => array(
							'id' => $inter['ActivityScope']['id'],
							'evaluacion' => $scope['puntuacion']
						));
					$this->ActivityScope->save($data_scope);
					$estrellas_scope = $estrellas_scope + $scope['puntuacion'];
					$cont_scope++;
				}


			//grabado milestone
			$logrados_milestone = 0;
			$cont_milestone = 0;

				foreach($this->request->data['Milestone'] as $key_milestone => $milestone) {

					$inter = $this->Milestone->find('first', array(
							'conditions' => array(
									'Milestone.id' => $key_milestone
								)
						));

					$data_milestone = array('Milestone' => array(
							'id' => $inter['Milestone']['id'],
							'evaluacion' => $milestone['puntuacion']
						));
					$this->Milestone->save($data_milestone);

					$cont_milestone++;

					if ($milestone['puntuacion'] == '0') {
						$logrados_milestone = $logrados_milestone + 2;
					} else {
						$logrados_milestone = $logrados_milestone + 5;
					}

				}

			//
			//  grabado imagen

			if($this->data['Image']["imagen1"]["tmp_name"] <> null) {
				$extension = end( explode('.', $this->data['Image']["imagen1"]["name"]) );
				if (move_uploaded_file($this->data['Image']["imagen1"]["tmp_name"],
				          "uploads/" . $id_activity.'_01_.'.$extension)) {
				}
				$data_image = array('Image' => array(
								'activity_id' => $id_activity,
								'tipo' => 1,
								'nombre' => $id_activity.'_01_.'.$extension,
								'nombrefisico' => $id_activity.'_01_.'.$extension
							));
				$this->Image->create();
				$this->Image->save($data_image);

				$file = fopen($this->webroot."log_imagenes.txt", "a");
				fwrite($file, "=====================LOG IMAGENES ".date("d/m/Y H:i:s")."================================" . PHP_EOL);
				fwrite($file, "TIPO IMAGEN 01: ".$this->request->data['Activity']['id'].'_00_.'.$extension . PHP_EOL);
				fwrite($file, "Arreglo: ".($data_image) . PHP_EOL);
				fwrite($file, "========================================================================================" . PHP_EOL);
				fclose($file);
			}

			if($this->data['Image']["imagen2"]["tmp_name"] <> null) {
				$extension = end( explode('.', $this->data['Image']["imagen2"]["name"]) );
				if (move_uploaded_file($this->data['Image']["imagen2"]["tmp_name"],
				          "uploads/" . $id_activity.'_02_.'.$extension)) {
				}
				$data_image = array('Image' => array(
								'activity_id' => $id_activity,
								'tipo' => 1,
								'nombre' => $id_activity.'_02_.'.$extension,
								'nombrefisico' => $id_activity.'_02_.'.$extension
							));
				$this->Image->create();
				$this->Image->save($data_image);

				$file = fopen($this->webroot."log_imagenes.txt", "a");
				fwrite($file, "=====================LOG IMAGENES ".date("d/m/Y H:i:s")."================================" . PHP_EOL);
				fwrite($file, "TIPO IMAGEN 02: ".$this->request->data['Activity']['id'].'_00_.'.$extension . PHP_EOL);
				fwrite($file, "Arreglo: ".($data_image) . PHP_EOL);
				fwrite($file, "========================================================================================" . PHP_EOL);
				fclose($file);
			}

			if($this->data['Image']["imagen3"]["tmp_name"] <> null) {
				$extension = end( explode('.', $this->data['Image']["imagen3"]["name"]) );
				if (move_uploaded_file($this->data['Image']["imagen3"]["tmp_name"],
				          "uploads/" .$id_activity.'_03_.'. $extension)) {
				}
				$data_image = array('Image' => array(
								'activity_id' => $id_activity,
								'tipo' => 1,
								'nombre' => $id_activity.'_03_.'.$extension,
								'nombrefisico' => $id_activity.'_03_.'.$extension
							));
				$this->Image->create();
				$this->Image->save($data_image);

				$file = fopen($this->webroot."log_imagenes.txt", "a");
				fwrite($file, "=====================LOG IMAGENES ".date("d/m/Y H:i:s")."================================" . PHP_EOL);
				fwrite($file, "TIPO IMAGEN 03: ".$this->request->data['Activity']['id'].'_00_.'.$extension . PHP_EOL);
				fwrite($file, "Arreglo: ".($data_image) . PHP_EOL);
				fwrite($file, "========================================================================================" . PHP_EOL);
				fclose($file);
			}

			if($this->data['Image']["imagen4"]["tmp_name"] <> null) {
				$extension = end( explode('.', $this->data['Image']["imagen4"]["name"]) );
				if (move_uploaded_file($this->data['Image']["imagen4"]["tmp_name"],
				          "uploads/" .$id_activity.'_04_.'. $extension)) {
				}
				$data_image = array('Image' => array(
								'activity_id' => $id_activity,
								'tipo' => 1,
								'nombre' => $id_activity.'_04_.'.$extension,
								'nombrefisico' => $id_activity.'_04_.'.$extension
							));
				$this->Image->create();
				$this->Image->save($data_image);

				$file = fopen($this->webroot."log_imagenes.txt", "a");
				fwrite($file, "=====================LOG IMAGENES ".date("d/m/Y H:i:s")."================================" . PHP_EOL);
				fwrite($file, "TIPO IMAGEN 04: ".$this->request->data['Activity']['id'].'_00_.'.$extension . PHP_EOL);
				fwrite($file, "Arreglo: ".($data_image) . PHP_EOL);
				fwrite($file, "========================================================================================" . PHP_EOL);
				fclose($file);
			}


			$this->request->data['Review']['user_id'] = $this->Session->read('Auth.User.id');
			$this->request->data['Review']['activity_id'] = $id_activity;

			$this->request->data['Internal'] = array();
			$this->request->data['External'] = array();
			$this->request->data['Milestone'] = array();
			$this->request->data['Scope'] = array();
			$this->request->data['Image'] = array();


			$logrados = 0;
			if($this->request->data['Review']['entidadesrelacionadas'] == '0') {
				$logrados = $logrados + 2;
			} else {
				$logrados = $logrados + 6;
			}
			if($this->request->data['Review']['presupuesto'] == '0') {
				$logrados = $logrados + 2;
			} else {
				$logrados = $logrados + 6;
			}


			$cantidad_estrella = 9 + $cont_scope + $cont_external + $cont_internal + $cont_milestone;
			$suma_estrellas = $estrellas_scope + $estrellas_external + $estrellas_internal + $this->request->data['Review']['puntuacionarea'] + $this->request->data['Review']['puntuacionplazo'] + $this->request->data['Review']['puntuacionobjetivo'] + $this->request->data['Review']['puntuacionprincipios'] + $this->request->data['Review']['relevancia'] + $this->request->data['Review']['pertinencia'] + $this->request->data['Review']['abordo'] + $logrados_milestone + $logrados;
			$promedio = $suma_estrellas / $cantidad_estrella;

			$promedio = round($promedio);

			$this->Activity->id = $id_activity;
			$this->Activity->saveField('estado', 2);
			$this->Activity->saveField('evaluacion', $promedio);

			if ($this->Review->save($this->request->data)) {
				$this->Flash->success(__('La evaluaci&oacute;n ha sido guardada exitosamente.'));
				return $this->redirect(array('controller' => 'home', 'action' => 'usuario'));
			} else {
				$this->Flash->error(__('La evaluaci&oacute;n no ha sido guardada. Intente nuevamente.'));
				return $this->redirect(array('controller' => 'home', 'action' => 'usuario'));
			}



		 }

		$activity = $this->Activity->find('first', array(
				'conditions' => array(
						'Activity.id' => $id
					)
			));
		$this->set('activity', $activity);

	}



	public function evaluate_sel($id = null) {
		$id_usuario = $this->Session->read('Auth.User.id');
		$actividades_sin_evaluar = $this->Activity->find('list', array(
				'conditions' => array(
						'Activity.estado' => 1,
						'Activity.user_id' => $id_usuario
					),
				'order' => 'Activity.nombre desc',
				'fields' => array('id', 'nombre')
			));

		$this->set('actividades_sin_evaluar', $actividades_sin_evaluar);
	}

	public function agrega_entidad() {
		$this->layout = "ajax";

		$data = array('ActivityInstitution' => array(
				'nombre' => utf8_decode($this->data['nombre']),
				'cargo' => utf8_decode($this->data['cargo']),
				'contacto' => utf8_decode($this->data['contacto']),
				'activity_id' => $this->data['id_activity']
			)
		);
		$this->ActivityInstitution->save($data);
		$entities = $this->ActivityInstitution->find('all', array(
				'order' => 'ActivityInstitution.id desc',
				'conditions' => array(
						'ActivityInstitution.activity_id' => $this->data['id_activity']
					)
			));
		$this->set('entities', $entities);

	}


	public function delete_ent_ajax() {

		$this->layout = "ajax";
		$id = $this->data['id_activity'];

		$this->ActivityInstitution->id = $this->data['id_entidad'];;
		$this->request->allowMethod('post', 'delete');
		$this->ActivityInstitution->delete();
		$entities = $this->ActivityInstitution->find('all', array(
				'order' => 'ActivityInstitution.id desc',
				'conditions' => array(
						'ActivityInstitution.activity_id' => $this->data['id_activity']
					)
			));
		$this->set('entities', $entities);
	}
////////////////////////////////////////////////////////////////////
	public function listado($id = null) {
		$id_usuario = $this->Session->read('Auth.User.id');
		$rol_usuario = $this->Session->read('Auth.User.role');

		$this->guardabusquedasession('');

		if ($rol_usuario == 'Administrativo') {
			$actividades_evaluadas = $this->Activity->find('all', array(
						'conditions' => array(
									'Activity.estado' => 2
								),
								'limit' => 10, 
								'offset' => 0,
								'page' => 1,
								'order' => 'Activity.id desc'
							)
					);
		} else {
			if($id == 'terminadas'){
				$actividades_evaluadas = $this->Activity->find('all', array(
						'conditions' => array(
									'Activity.estado' => 2,
									// SE ELIMINA EL FILTRO DEL ROL PARA MOSTRAR TODAS LAS ACTIVIDADES A LOS USUARIOS Y A LOS ADMINISTRADORES
									// JESCOBAR 18-05-2016
									'Activity.user_id' => $id_usuario
								),
								'limit' => 10, 
								'offset' => 0,
								'page' => 1,
								'order' => 'Activity.id desc'
							)
					);
			}else{
				$actividades_evaluadas = $this->Activity->find('all', array(
						'conditions' => array(
									'Activity.estado' => 2
								),
								'limit' => 10, 
								'offset' => 0,
								'page' => 1,
								'order' => 'Activity.id desc'
							)
					);
			}
			
		}


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

		foreach($actividades_evaluadas as $key_act_1 => $act_1) {
			$user = $this->Usuario->find('first', array(
					'conditions' => array(
							'Usuario.id' => $act_1['Activity']['user_id']
						)
				)
			);
			$actividades_evaluadas[$key_act_1]['Activity']['Usuario'] = $user;
		}

		$cant_act = count($actividades_evaluadas);
		$this->set('cant_act', $cant_act);
		$this->set('actividades_evaluadas', $actividades_evaluadas);
		$cant_pag_tmp = $cant_act / 10;

		$cant_pag = $this->round_up($cant_pag_tmp, 0);
		$this->set('cant_pag', $cant_pag);

		$total_actv = $this->Activity->find('all', array(
			'conditions' => array(
						'Activity.estado' => 2
					),
					'order' => 'Activity.id desc'
				)
		);

		$this->set('count', $cant_act);
		$this->set('cant_rs', count($total_actv));
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
		$this->set('id', $id);
return;

	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function listado_ajax($id = null) {
		//$this->layout ="ajax";

		$id_usuario = $this->Session->read('Auth.User.id');

		$this->guardabusquedasession($this->request->data);
		

		$options = array();
		$orden = '';
		$page = 1;
		$limit = 10;
		$offset = 0;

		
		$rol_usuario = $this->Session->read('Auth.User.role');
		//var_dump($_POST['data']);

		if ($this->request->data['Activity']['orden'] == 0) {
			$orden = 'Activity.nombre asc ';
		} else {
			if ($this->request->data['Activity']['orden'] == 1) {
				$orden = 'Activity.fechainicio_proyecto asc ';
			} else {
				if ($this->request->data['Activity']['orden'] == 2) {
					$orden = 'Activity.fechainicio_proyecto desc';
				}
				else
				{
					if ($this->request->data['Activity']['orden'] == 3) {
					$orden = 'Activity.id desc';
				}
			}
		}
		}

		if ($this->request->data['Activity']['pagina'] <> 0) {
			$page = $this->request->data['Activity']['pagina'];
		}
		
		if ($this->request->data['Activity']['paginas'] <> 0) {
			$limit = $this->request->data['Activity']['paginas'];
		}
		
		if ($this->request->data['Activity']['paginas'] <> 0  && $this->request->data['Activity']['pagina'] <> 0) {
			$offset = (($this->request->data['Activity']['paginas'] * $this->request->data['Activity']['pagina']) + 1);
		}



		$this->Activity->unbindModel(
        	array('hasMany' => array('Objetive', 'Milestone', 'Image'),
        			'hasAndBelongsToMany' => array( 'Central', 'External','Headquarter','Internal', 'School', 'Area')
        	)
    	);
		
		$this->Activity->Behaviors->load('Containable');
		
		if($id == 'terminadas'){
			$actividades_evaluadas = $this->Activity->find('all', array(
				'conditions' => array(
							'Activity.estado' => 2,
							'Activity.user_id' => $id_usuario
						),
						'order' => $orden
						//'page' => $page,
						//'limit' => $limit,
						//'offset' => $offset
					
					)
			);
		}else{
			$actividades_evaluadas = $this->Activity->find('all', array(
				'conditions' => array(
							'Activity.estado' => 2
						),
						'order' => $orden
						//'page' => $page,
						//'limit' => $limit,
						//'offset' => $offset
					
					)
			);
		}
		
		
		$actividades_evaluadas = $this->filtroActividades($actividades_evaluadas, $this->request->data);			
		//print_r($actividades_evaluadas);
		$cant_act = count($actividades_evaluadas);

		foreach($actividades_evaluadas as $key_act_1 => $act_1) {
			$user = $this->Usuario->find('first', array(
					'conditions' => array(
							'Usuario.id' => $act_1['Activity']['user_id']
						)
				)
			);
			$actividades_evaluadas[$key_act_1]['Activity']['Usuario'] = $user;
		}
		foreach($actividades_evaluadas as $key_act_1 => $act_1) {
			$imagen = $this->Image->find('first', array(
					'conditions' => array(
							'Image.tipo' => '0',
							'Image.activity_id' => $act_1['Activity']['id']
						)
				)
			);
			$actividades_evaluadas[$key_act_1]['Activity']['Image'] = $imagen;
			//var_dump($imagen);
		}

		//$this->Session->setFlash($actividades_evaluadas, 'filtros_busqueda');
		/*require_once(WWW_ROOT.'Pdf'.DS.'class'.DS.'reporte_general.php');
		ReporteGeneral::loadReporte($actividades_evaluadas);*/

		$this->set('actividades_evaluadas', $actividades_evaluadas);

		if ($this->request->data['Activity']['paginas'] == 0) {
			$this->request->data['Activity']['paginas'] = 1;
		}
		
		$cant_pag_tmp = $cant_act / $this->request->data['Activity']['paginas'];

		$cant_pag = $this->round_up($cant_pag_tmp, 0);
		$this->set('cant_pag', $cant_pag);
		$this->set('page', $page);
		$this->set('count', $cant_act);
		
		$this->set('_registros_totales', $cant_act);
		$this->set('_paginas', $this->round_up($cant_act / $limit, 0));
		$this->set('_pagina', $page);
		$this->set('_limite', $limit);
		$this->set('_offset', $offset);

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
			// //
			// Filtro Nombre
			$actividades = $this->filtroNombre($actividades);
			// Filtro Año
			$actividades = $this->filtroAno($actividades);
			// Filtro Mes
			$actividades = $this->filtroMes($actividades);
			// Filtro Hito
			$actividades = $this->filtroHito($actividades);
		
			return ($actividades);
	}
	
	// Filtro Nombre
	private function filtroNombre($actividades){
		$Busqueda = '';
		$a = array("Á", "É", "Í", "Ó", "Ú", "á", "é", "í", "ó", "ú", "Ñ", "ñ");
		$b = array("A", "E", "I", "O", "U", "a", "e", "i", "o", "u");
		$aa = array(utf8_decode("Á"), utf8_decode("É"), utf8_decode("Í"), utf8_decode("Ó"), utf8_decode("Ú"), utf8_decode("á"), utf8_decode("é"), utf8_decode("í"), utf8_decode("ó"), utf8_decode("ú"));
		$bb = array("A", "E", "I", "O", "U", "a", "e", "i", "o", "u");
		if (isset($this->request->data['Activity']['nombre']) && !empty($this->request->data['Activity']['nombre']) && $this->request->data['Activity']['nombre'] != '') 
		{	
			foreach ($actividades as $key => $actividad)
			{	
				$Busqueda = stripos(str_replace($aa, $bb,$actividad['Activity']['nombre']), str_replace($a, $b, trim($this->request->data['Activity']['nombre'])));
				
				if ($Busqueda === false) {
					unset($actividades[$key]);	
				}
			}
		}
		return $actividades;
	}
	
	// Filtro Ano
	private function filtroAno($actividades){
		if (isset($this->request->data['Activity']['anno']) && !empty($this->request->data['Activity']['anno']) && $this->request->data['Activity']['anno'] != '' && $this->request->data['Activity']['anno'] > 0) 
		{	
			foreach ($actividades as $key => $actividad)
			{	
				$fechainicio_proyecto = explode('-', $actividad['Activity']['fechainicio_proyecto']);
				if ($fechainicio_proyecto[0] != $this->request->data['Activity']['anno']) {
					unset($actividades[$key]);	
				}
			}
		}
		return $actividades;
	}
	
	// Filtro Mes
	private function filtroMes($actividades){
		if (isset($this->request->data['Activity']['mes']) && !empty($this->request->data['Activity']['mes']) && $this->request->data['Activity']['mes'] != '' && $this->request->data['Activity']['mes'] > 0) 
		{	
			foreach ($actividades as $key => $actividad)
			{	
				$fechainicio_proyecto = explode('-', $actividad['Activity']['fechainicio_proyecto']);
				if ($fechainicio_proyecto[1] != $this->request->data['Activity']['mes']) {
					unset($actividades[$key]);	
				}
			}
		}
		return $actividades;
	}
	
	// Filtro Hito
	private function filtroHito($actividades){
		if (isset($this->request->data['Activity']['hito']) && !empty($this->request->data['Activity']['hito']) && $this->request->data['Activity']['hito'] != '' && $this->request->data['Activity']['hito'] != 'Hito' && $this->request->data['Activity']['hito'] != 'all' && $this->request->data['Activity']['hito'] >= 0) 
		{	
			foreach ($actividades as $key => $actividad)
			{	
				if ($actividad['Activity']['actividad_hito'] != $this->request->data['Activity']['hito']) {
					unset($actividades[$key]);	
				}
			}
		}
		return $actividades;
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
	
	
	public function exportar_pdf (){
		App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));

		ini_set('memory_limit', '512M'); 

		$this->layout = 'pdf';
		//Configure::write('debug', 2);
		$this->response->type('pdf');

		$this->set('fpdf', new FPDF('P','mm','A4'));
    	//$this->set('data', 'Hello, PDF world');

		//$id_usuario = $this->Session->read('Auth.User.id');
		//Configure::write('debug', 2);

		$this->request->data = $this->Session->read('busqueda');
		
		$actividades_evaluadas = $this->Activity->find('all', array('order' => 'Activity.id desc'));

		$actividades_evaluadas = $this->filtroActividades($actividades_evaluadas, $this->request->data);

		foreach($actividades_evaluadas as $key_act_1 => $act_1) {
			$user = $this->Usuario->find('first', array(
					'conditions' => array(
							'Usuario.id' => $act_1['Activity']['user_id']
						)
				)
			);
			$actividades_evaluadas[$key_act_1]['Activity']['Usuario'] = $user;
		}
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
		//print_r($actividades_evaluadas);
		$this->set('actividades_evaluadas', $actividades_evaluadas);	
		$this->render('pdf');
	}

	public function exportar_excel (){
		$this->layout = 'ajax_excel';

		$this->request->data = $this->Session->read('busqueda');

		$id_usuario = $this->Session->read('Auth.User.id');

		//$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
		$options = '';
		$actividades_evaluadas = $this->Activity->find('all', $options);

		$actividades_evaluadas = $this->filtroActividades($actividades_evaluadas, $this->request->data);

		foreach($actividades_evaluadas as $key_act_1 => $act_1) {
			$user = $this->Usuario->find('first', array(
					'conditions' => array(
							'Usuario.id' => $act_1['Activity']['user_id']
						)
				)
			);
			$actividades_evaluadas[$key_act_1]['Activity']['Usuario'] = $user;
		}

		$this->set('actividades_evaluadas', $actividades_evaluadas);

	}

	private function guardabusquedasession ($data){
		$this->Session->write('busqueda', $data);
	}

	public function round_up($value, $places)
		{
		    $mult = pow(10, abs($places));
		     return $places < 0 ?
		    ceil($value / $mult) * $mult :
		        ceil($value * $mult) / $mult;
		}

	public function agrega_comentario() {
		$this->layout = "ajax";
		$data = array('Observation' => array(
				'comentario' => utf8_decode($this->data['comentario']),
				'activity_id' => $this->data['id_activity'],
				'username' => $this->Session->read('Auth.User.username')

			)
		);
		$this->Observation->save($data);
		$observations = $this->Observation->find('all', array(
				'order' => 'Observation.id desc',
				'conditions' => array(
						'Observation.activity_id' => $this->data['id_activity']
					)
			));
		$this->set('observations', $observations);

	}

	public function revisar() {
		$id = $this->data['id_activity'];
		$data = array('Activity' => array(
				'id' => $id,
				'revisado' => '1'
			));
		$this->Activity->save($data);
		$this->render('/Elements/ajaxreturn');
	}

}

<?php
App::uses('AppController', 'Controller', 'LdapAdministrativo');




class UsuariosController extends AppController {
	public $uses = array('LdapAdministrativo','LdapAcademico','Usuario', 'Escuela','EscuelaUsuario', 'Dmuser');
	public $components = array('Paginator', 'Session');
	public $helpers = array('Ingenia');
	public $layout = "vcm";


    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'sso');
    }

    public function index() {
        $usuarios = $this->Usuario->find('all');
        $this->set('Usuarios', $usuarios);
    }
	
	/* LISTADO DE USUARIOS */
	public function listado() {	
		$this->Paginator->settings = $this->paginate;		
		$usuarios = $this->Paginator->paginate('Usuario');
		$this->set('usuarios', $usuarios);
    }

    public function view($id = null) {
        $this->Usuario->id = $id;
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Invalid Usuario'));
        }
        $this->set('Usuario', $this->Usuario->findById($id));
    }

    public function add() {
		$escuelas = $this->Escuela->find('list', array('fields' => array('Escuela.id', 'Escuela.nombre')));
		$this->set('escuelas', $escuelas);
        if ($this->request->is('post')) {	
			$id = $this->lastId('Usuario');	
			$this->request->data['Usuario']['id'] = $id;			
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('El usuario se ha salvado correctamente.'));
                return $this->redirect(array('action' => 'listado'));
            }
			else{
				$this->Flash->error(
					__('Hubo un error al salvar al usuario.')
				);
			}
        }
    }

    public function edit($id = null) {
        $this->Usuario->id = $id;
		$escuelas = $this->Escuela->find('list', array('fields' => array('Escuela.id', 'Escuela.nombre')));		
		$this->set('escuelas', $escuelas);
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Invalid Usuario'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
			$this->EscuelaUsuario->borrarCarreras($id);
            if ($this->Usuario->save($this->request->data)) {
                $this->Flash->success(__('El usuario se ha editado correctamente.'));
                return $this->redirect(array('action' => 'listado'));
            }
			else{
				$this->Flash->error(
					__('Hubo un error al salvar al usuario.')
				);
			}
        } else {
            $this->request->data = $this->Usuario->findById($id);
            unset($this->request->data['Usuario']['password']);
        }
    }

	/* PARÁMETRO LLEGA POR FORMULARIO POST */
    public function delete() {
        $this->request->allowMethod('post');		
        $this->Usuario->id = $this->data['Usuario']['id'];
        if (!$this->Usuario->exists()) {
            throw new NotFoundException(__('Invalid Usuario'));
			$this->Flash->error(__('El usuario no existe en la bd.'));
			return $this->redirect(array('action' => 'index'));
        }
        if ($this->Usuario->delete()) {
            $this->Flash->success(__('Usuario borrado correctamente'));
            return $this->redirect(array('action' => 'listado'));
        }
        $this->Flash->error(__('El usuario no pudo ser borrado.'));
        return $this->redirect(array('action' => 'listado'));
    }
	
	
	
	public function login() {
		$this->layout = "login";
		if(!empty($this->data) && $this->request->is('post')){				
				$nombre_usuario = trim($this->data['Usuario']['username']);	
				$password = trim($this->data['Usuario']['password']);				
				if(!empty($nombre_usuario) && !empty($password)) {						
					/**
					*  1.- Si no existe en la BD se gatilla error de usuario
					*/
					$status = $this->verifica_usuario($nombre_usuario);
					if ($status == 'error') {
						$this->Flash->error(__('Ha ocurrido un error al intentar acceder a su cuenta, favor contactar a la mesa de ayuda.'));
						$this->redirect(array('action'=>'login'));
					}

					/** 2.- De lo contrario validar contra ldap Administrativo*/
					$ldap_response = $ldap_response_administrativo = $this->LdapAdministrativo->connect($nombre_usuario,$password);	
					$ldap_response_administrativo['status'] = 'success';
					if($ldap_response_administrativo['status'] == 'error'){
						$ldap_response = $ldap_response_academico = $this->LdapAcademico->connect($nombre_usuario,$password);	
						#debug($ldap_response);
						#exit();

					}
					#debug($ldap_response);
					#exit();
					$ldap_response['status'] = 'success';
					if($ldap_response['status'] == 'error'){
						$this->Flash->error(__('Usuario inválido'));
						$this->redirect(array('action'=>'login'));
					}elseif($ldap_response['status'] == 'success'){						
						$administrativo = $this->Usuario->find('first', array('conditions'=>array('username'=>strtolower($ldap_response['username']))));
						#debug($this->Usuario->getLastQuery());
						if(empty($administrativo)){							
							$this->Flash->error(__('En nuestros registros sus credenciales no se encuentran vigentes.'));							
						}else{							
							$this->Flash->success(__('Bienvenido a VCM'));
							$this->request->data['Usuario']['username'] = strtolower($this->request->data['Usuario']['username']);
							$usuario_log = $this->Usuario->find('first', array(
									'conditions' => array(
											'Usuario.username' => $this->request->data['Usuario']['username']
										)
								));
							$usuario_login = $usuario_log['Usuario'];
							
							$this->Auth->login($usuario_login);

							if ($usuario_login['role'] == 'Admin') {
								$this->redirect(array('controller' => 'home', 'action'=>'admin'));
							} elseif ($usuario_login['role'] == 'Administrativo') {
								$this->redirect(array('controller' => 'home', 'action'=>'administrativo'));
							} elseif ($usuario_login['role'] == 'Usuario') {
								$this->redirect(array('controller' => 'home', 'action'=>'usuario'));
							} else {
								$this->Flash->success('Estimado, Ud. no tiene los permisos para ingresar. Comunicarse con mesa de ayuda.');
								$this->redirect(array('controller' => 'usuarios', 'action'=>'logout'));
							}
						}
					}else{
						$this->Flash->error(__('Ha ocurrido un error al intentar acceder a su cuenta, favor contactar a la mesa de ayuda.'));
						$this->redirect(array('action'=>'login'));
					}				
				}else{
					$this->Flash->error(__('Ingrese ambos campos para poder acceder.'),'mensaje-error');
					$this->redirect(array('action'=>'login'));
				}			
			}	
	}

	function verifica_usuario($username = null) {
		$username = trim(strtoupper($username)); 
		$usuario = $this->Dmuser->find('first', array(
				'conditions' => array(
						'Dmuser.username' => $username
					)
			));

		$username = strtolower($username);

		if ($usuario) {
			$usuario_local = $this->Usuario->find('first', array(
					'conditions' => array(
							'Usuario.username' => $username
						)
				));
			if ($usuario_local) {
				$data_user = array('Usuario' => array(
						'apellidos' => $usuario['Dmuser']['apellido_pat']." ".$usuario['Dmuser']['apellido_mat'],
						'activo' => $usuario['Dmuser']['estado'],
						'username' => $username,
						'nombre' => $usuario['Dmuser']['nombre1'],
						'id' => $usuario_local['Usuario']['id']
					));
				if ($this->Usuario->save($data_user)) {
					return "success";	
				} else {
					return "error";		
				}
			} else {
				$data_user = array('Usuario' => array(
						'apellidos' => $usuario['Dmuser']['apellido_pat']." ".$usuario['Dmuser']['apellido_mat'],
						'activo' => $usuario['Dmuser']['estado'],
						'username' => $username,
						'nombre' => $usuario['Dmuser']['nombre1'],
						'role' => 'Usuario'
					));
				if ($this->Usuario->save($data_user)) {
					return "success";	
				} else {
					return "error";		
				}
			}
		} else {
			return "error";
		}
	}
	

	public function logout() {		
		if ($this->Auth->logout()){
			$this->Flash->success(__('Ud. se ha desconectado correctamente'));	
			return $this->redirect(array('controller' => 'usuarios', 'action' => 'login'));	
		}
		else{
			$this->Flash->error(__('La sesión no pudo cerrarse correctamente'));
		}
	}

	public function gestion() {

		$this->Paginator->settings = $this->paginate;		
		$dmusers = $this->Paginator->paginate('Dmuser');
		$this->set('dmusers', $dmusers);		

		$usuarios = $this->Usuario->find('all', array(
				'order' => 'Usuario.apellidos asc',
				'recursive' => -1
			));
		$this->set('usuarios', $usuarios);

	}

	public function importar_usuario($id = null) {
		$dmuser = $this->Dmuser->find('first', array(
				'conditions' => array(
						'Dmuser.cod_funcionario' => $id
					)
			));

		$si_usuario = $this->Usuario->find('first', array(
				'conditions' => array(
						'Usuario.username' => strtolower($dmuser['Dmuser']['username'])
					)
			));
		if ($si_usuario) {
			$data_usuario = array('Usuario' => array(
				'nombre' => $dmuser['Dmuser']['nombre1'],
				'apellidos' => $dmuser['Dmuser']['apellido_pat'].' '.$dmuser['Dmuser']['apellido_mat'] ,
				'username' => strtolower($dmuser['Dmuser']['username']),
				'activo' => $dmuser['Dmuser']['estado'],
				'id' => $si_usuario['Usuario']['id']
			));
			$this->Flash->success(__('El usuario se ha actualizado correctamente'));	
		} else {
			$data_usuario = array('Usuario' => array(
				'nombre' => $dmuser['Dmuser']['nombre1'],
				'apellidos' => $dmuser['Dmuser']['apellido_pat'].' '.$dmuser['Dmuser']['apellido_mat'] ,
				'username' => strtolower($dmuser['Dmuser']['username']),
				'activo' => $dmuser['Dmuser']['estado']
			));
			$this->Flash->success(__('El usuario se ha agregado correctamente. Proceda a perfilar.'));	
		}

		if($this->Usuario->save($data_usuario)) {
			return $this->redirect(array('controller' => 'usuarios', 'action' => 'gestion'));	
		} else {
			$this->Flash->success(__('Error al agregar al usuario. Por favor intente nuevamente.'));	
			return $this->redirect(array('controller' => 'usuarios', 'action' => 'gestion'));	
		}
	}

	public function perfilar($id = null) {

		if(!empty($this->data) && $this->request->is('post')) {
			if($this->Usuario->save($this->request->data)) {
				return $this->redirect(array('controller' => 'usuarios', 'action' => 'gestion'));	
			} else {
				$this->Flash->success(__('Error al asignar perfil. Por favor intente nuevamente.'));	
				return $this->redirect(array('controller' => 'usuarios', 'action' => 'gestion'));	
			}

		} else {

		}

		$usuario = $this->Usuario->find('first', array(
				'conditions' => array(
						'Usuario.id' => $id
					),
				'recursive' => -1
			));
		$this->set('usuario', $usuario);

	}

	public function sso() {
		$username = $_POST['username'];
		$hash_env = $_POST['hash'];
		$archivo = fopen(WWW_ROOT."sso.txt", "r");
		$codetxt  = fgets($archivo);
		fclose($archivo);
		$hash = md5($username.$codetxt);
		if ($hash == $hash_env) {
			
			$username = strtolower($username);
			$usuario_log = $this->Usuario->find('first', array(
					'conditions' => array(
							'Usuario.username' => $username
						)
				));
			if ($usuario_log) {		
				$usuario_login = $usuario_log['Usuario'];
				$this->Auth->login($usuario_login);
				if ($usuario_login['role'] == 'Admin') {
					$this->Flash->success(__('Bienvenido a VCM'));
					$this->redirect(array('controller' => 'home', 'action'=>'admin'));
				} elseif ($usuario_login['role'] == 'Administrativo') {
					$this->Flash->success(__('Bienvenido a VCM'));
					$this->redirect(array('controller' => 'home', 'action'=>'administrativo'));
				} elseif ($usuario_login['role'] == 'Usuario') {
					$this->Flash->success(__('Bienvenido a VCM'));
					$this->redirect(array('controller' => 'home', 'action'=>'usuario'));
				} else {
					$this->Flash->success('Estimado, Ud. no tiene los permisos para ingresar. Comunicarse con mesa de ayuda.');
					$this->redirect(array('controller' => 'usuarios', 'action'=>'logout'));
				}
			} else {
				$this->Flash->success('Estimado, Ud. no tiene los permisos para ingresar. Comunicarse con mesa de ayuda.');
				$this->redirect(array('controller' => 'usuarios', 'action'=>'logout'));
			}
		}
		
	}	

}

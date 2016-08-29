<?php
//error_reporting(0);
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $uses = array('Permiso');


	public $components = array(
        'Session',
        'Flash',
		'DebugKit.Toolbar',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'usuarios',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'usuarios',
                'action' => 'login',
                'home'
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish',
					'userModel' => 'Usuario',
                    'authError' => 'You don\'t have access here.'
                                                
                )
            )
        )
    );

    public function beforeFilter() {

        $this->Auth->allow('/','index', 'view', 'login', 'logout', 'add', 'edit', 'delete', 'agrega_obj_esp', 'agrega_hito', 'delete_ajax', 'usuario', 'admin', 'evaluate', 'listado', 'gestion', 'importar_usuario', 'perfilar', 'listado', 'evaluate_sel', 'agrega_entidad', 'delete_ent_ajax', 'buscar', 'paginate_normal', 'paginate_sin_ev', 'ficha', 'listado_ajax', 'delete_act', 'sso', 'exporta_pdf_ficha', 'exportar_excel', 'exportar_pdf');


        $controller = $this->params['controller'];
        //echo var_dump($controller);
        $action = $this->params['action'];
        //echo var_dump($action);
        $role = $this->Session->read('Auth.User.role');
        //echo var_dump($role);
        if (($action != 'login' && $controller!='uploads') && ($controller!=''  && $action!='' && $role!='')) {         
            if (!$this->Permiso->acl_check($controller, $action, $role)) {
                $this->Flash->success(__('Ud. no tiene permisos para entrar a esta p&aacute;gina.'));
                return $this->redirect(array('controller' => 'usuarios', 'action' => 'login'));
            }
        }

        /*if ($action <> 'login') {         
            if (!$this->Permiso->acl_check($controller, $action, $role)) {
                $this->Flash->success(__('Ud. no tiene permisos para entrar a esta p&aacute;gina.'));
                 return $this->redirect(array('controller' => 'usuarios', 'action' => 'login'));
            }
        }*/

     
        $this->_setAbsBase();
    }
	
	public function lastId($modelo){
		$id = $this->$modelo->find('first', array('order' => ('id desc'), 'fields' => array('id')));
		$id = $id[$modelo]['id'];
		$id = intval($id)+1;		
		return $id;
	}
	 
    function _setAbsBase() {
      $s = empty($_SERVER['HTTPS']) ? '' : ($_SERVER['HTTPS'] == 'on') ? 's' : '';
      $p = strtolower($_SERVER['SERVER_PROTOCOL']);
      $protocol = substr($p, 0, strpos($p, '/')) . $s;
      $port = ($_SERVER['SERVER_PORT'] == '80') ? '' : (':'.$_SERVER['SERVER_PORT']);
      $this->absBase = $protocol . '://' . $_SERVER['SERVER_NAME'] . $port . $this->base.'/';
      //$this->set('abs_base', '/'.basename(dirname(APP)).'/');
      $this->set('abs_base', $this->absBase);
    }
}
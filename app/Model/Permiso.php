<?php
App::uses('AppModel', 'Model');
/**
 * School Model
 *
 */
class Permiso extends AppModel {

/**
 * Display field
 *
 * @var string
 */

	var $useTable = 'ACL';	

	public function acl_check($controller = null, $action = null, $role = null) {


		$permiso = $this->find('first', array(
				'conditions' => array(
					'Permiso.controller' => $controller,
					'Permiso.action' => $action,
					'Permiso.role' => $role
					)
			));
		if ($action <> 'sso') {
			if ($permiso) {
				if ($permiso['Permiso']['allow'] == 1) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return true;
		}

	}
}

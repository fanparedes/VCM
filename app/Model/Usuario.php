<?php
// app/Model/User.php
App::uses('AppModel', 'Model');App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Usuario extends AppModel {
	public $name = 'Usuario';	
	public $useTable = 'Usuarios';	
	
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'El nombre de usuario es obligatorio'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'La contraseña es requerida'
            )
        ),
        /* 'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ) */
    );		
	
	public function beforeSave($options = array()) {
		if (isset($this->data['Usuario']['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->request->data['Usuario']['password'] = $passwordHasher->hash(
				$this->request->data['Usuario']['password']
			);
		}
		return true;
	}

	
	
	
	
}	
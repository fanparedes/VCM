<?php
App::uses('AppModel', 'Model');

class ActivityBeginning extends AppModel {
	var $name = 'ActivityBeginning';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'activity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Beginning' => array(
			'className' => 'Beginning',
			'foreignKey' => 'beginning_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

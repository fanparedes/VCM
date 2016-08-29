<?php
App::uses('AppModel', 'Model');

class ActivityInstitution extends AppModel {
	var $name = 'ActivityInstitution';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'activity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

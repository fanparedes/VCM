<?php
App::uses('AppModel', 'Model');

class ActivityHeadquarter extends AppModel {
	var $name = 'ActivityHeadquarter';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'activity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Headquarter' => array(
			'className' => 'Headquarter',
			'foreignKey' => 'headquarter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');

class ActivityCentral extends AppModel {
	var $name = 'ActivitySchool';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'activity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Central' => array(
			'className' => 'Central',
			'foreignKey' => 'central_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

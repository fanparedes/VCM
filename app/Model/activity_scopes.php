<?php
App::uses('AppModel', 'Model');

class ActivityScope extends AppModel {
	var $name = 'ActivityScope';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'activity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Scope' => array(
			'className' => 'Scope',
			'foreignKey' => 'scope_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

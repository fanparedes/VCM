<?php
App::uses('AppModel', 'Model');

class ActivityInternal extends AppModel {
	var $name = 'ActivityInternal';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'activity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Internal' => array(
			'className' => 'Internal',
			'foreignKey' => 'internal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

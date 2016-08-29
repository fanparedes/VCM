<?php
App::uses('AppModel', 'Model');

class ActivityExternal extends AppModel {
	var $name = 'ActivityExternal';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'activity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'External' => array(
			'className' => 'External',
			'foreignKey' => 'external_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

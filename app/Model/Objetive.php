<?php
App::uses('AppModel', 'Model');
/**
 * Objetive Model
 *
 * @property Activity $Activity
 */
class Objetive extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'objetivo';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'activity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');
/**
 * Activity Model
 *
 */
class Activity extends AppModel {

	var $hasAndBelongsToMany = array(
		'Area' => array(
			'className' => 'Area',
			'joinTable' => 'activity_areas',
			'foreignKey' => 'activity_id',
			'associationForeignKey' => 'area_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Beginning' => array(
			'className' => 'Beginning',
			'joinTable' => 'activity_beginnings',
			'foreignKey' => 'activity_id',
			'associationForeignKey' => 'beginning_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Central' => array(
			'className' => 'Central',
			'joinTable' => 'activity_centrals',
			'foreignKey' => 'activity_id',
			'associationForeignKey' => 'central_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Entity' => array(
			'className' => 'Entity',
			'joinTable' => 'activity_entities',
			'foreignKey' => 'activity_id',
			'associationForeignKey' => 'entity_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'External' => array(
			'className' => 'External',
			'joinTable' => 'activity_externals',
			'foreignKey' => 'activity_id',
			'associationForeignKey' => 'external_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Headquarter' => array(
			'className' => 'Headquarter',
			'joinTable' => 'activity_headquarters',
			'foreignKey' => 'activity_id',
			'associationForeignKey' => 'headquarter_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Internal' => array(
			'className' => 'Internal',
			'joinTable' => 'activity_internals',
			'foreignKey' => 'activity_id',
			'associationForeignKey' => 'internal_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'School' => array(
			'className' => 'School',
			'joinTable' => 'activity_schools',
			'foreignKey' => 'activity_id',
			'associationForeignKey' => 'school_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Scope' => array(
			'className' => 'Scope',
			'joinTable' => 'activity_scopes',
			'foreignKey' => 'activity_id',
			'associationForeignKey' => 'scope_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)

	);

	var $hasMany = array(
		'Objetive' => array(
			'className' => 'Objetive',
			'foreignKey' => 'activity_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Milestone' => array(
			'className' => 'Milestone',
			'foreignKey' => 'activity_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'activity_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'id DESC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ActivityInstitution' => array(
			'className' => 'ActivityInstitution',
			'foreignKey' => 'activity_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Review' => array(
			'className' => 'Review',
			'foreignKey' => 'activity_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Commentarios' => array(
			'className' => 'Observation',
			'foreignKey' => 'activity_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)	
	);	

}

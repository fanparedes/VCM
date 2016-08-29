<?php
App::uses('AppModel', 'Model');
/**
 * School Model
 *
 */
class School extends AppModel {

/**
 * Display field
 *
 * @var string
 */

	var $displayField = 'nombre_escuela';
	var $useTable = 'EA_ESCUELAS';	
	var $primaryKey = 'cod_escuela';
	var $name = 'School';	
}

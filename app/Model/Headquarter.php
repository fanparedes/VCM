<?php
App::uses('AppModel', 'Model');
/**
 * Headquarters Model
 *
 */
class Headquarter extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	var $displayField = 'nombre_sede';
	var $useTable = 'EA_SEDES';	
	var $primaryKey = 'cod_sede';
	var $name = 'Headquarter';
}

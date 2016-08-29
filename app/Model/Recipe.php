<?php
class Recipe extends AppModel {
			
	var $useTable = 'Recipes';
	var $primaryKey = 'ID';
	var $name = 'Recipe';	
	
	public $belongsTo = array('Usuario');
   
/* 	public $hasOne = array(
        'Profile' => array(
            'className' => 'Profile',
            'conditions' => array(
				'User.id = Profile.user_id',
			),
			'foreignKey'  => t,
            'associatedKey'   => 'id'
        ),  */
}
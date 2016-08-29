<?php
class Pueblo extends AppModel {
			
	var $useTable = 'Pueblos';
	var $primaryKey = 'ID';
	var $name = 'Pueblos';	
	
	//public $hasOne = array('Profile');   
	public $hasAndBelongsToMany = array('Usuario'); 

}